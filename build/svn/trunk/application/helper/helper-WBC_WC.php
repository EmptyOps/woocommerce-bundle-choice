<?php

/*
*   woocommerce helper class
*/
defined( 'ABSPATH' ) || exit;

class WBC_WC {

    private static $_instance = null;

    public static function instance() {
        if ( ! isset( self::$_instance ) ) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    private function __construct() {
        
    }

    public function wc_placeholder_img_src() {
        return wc_placeholder_img_src();
    }

    public function slug2slug($slug) {
        $term = get_term_by('slug',$slug,'product_cat');
        if(!empty($term) and !is_wp_error($term)) {
             return $term->slug;
        }
        return $slug;
    }

    public function get_term_by($field,$key,$taxonomy='') {

        
        if($field == 'id'){
            if(!empty($taxonomy)){
                $term = get_term_by($field,$key,$taxonomy);
            } else {
                $term = get_term_by($field,$key);
            }

            if(class_exists('SitePress')) {
                if( !empty($term) and !is_wp_error($term) ) {
                    $term_slug = $term->slug;

                    if(!empty($taxonomy)){
                        return get_term_by('slug',$term_slug,$taxonomy);
                    } else {
                        return get_term_by('slug',$term_slug);
                    }
                    
                }    
            }
            return $term;        
        } else {

            if(!empty($taxonomy)){
                return get_term_by($field,$key,$taxonomy);
            } else {
                return get_term_by($field,$key);
            }            
        }
    }

    public function get_term_children($id, $taxonomy='product_cat', $format='name', $product = null) {

        $terms_html = array();

        $children_ids = get_term_children( $id, $taxonomy );
        
        foreach($children_ids as $children_id){
            
            if ($product != null and !has_term( $children_id, 'product_cat', $product->get_id() ) ) { 

                continue;
            }

            $term = null;

            if ($format != 'image') {

                $term = get_term( $children_id, $taxonomy ); 

            }
            
            
            if( $format == 'name' ) {

                $terms_html[] = $term->name;  
            } elseif( $format == 'image' ) {

                $thumbnail_id = get_term_meta( $children_id, 'thumbnail_id', true );
                $cat_image = wp_get_attachment_url( $thumbnail_id );
                if(!empty($cat_image) and !is_wp_error($cat_image)){

                    $terms_html[] = $cat_image; 

                }
                                 
            } else {
                
                $term_link = get_term_link( $term, $taxonomy ); 
                if ( is_wp_error( $term_link ) ) $term_link = '';

                $terms_html[] = '<a href="' . esc_url( $term_link ) . '" rel="tag" class="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</a>';
            }
        }

        //added on 24-12-2022 
        if (!is_array($terms_html)) {

            $terms_html = array($terms_html);

        }

        if( $format == 'name' ) {

            return implode( ', ', $terms_html );
    
        } elseif( $format == 'image' ) {

            return implode( '|', $terms_html );

        } else {
            
            return '<span class="subcategories-category-id-' . esc_attr($id) . '">' . esc_html(implode( ', ', $terms_html )) . '</span>';
        }
    }

    /////// @shraddha ///////
    public function get_sub_category_of_category_in_product($id, $product, $format='name') {

        // ACTIVE_TODO right now we are getting category using a separate get_term_children call but in future we should rely on $product object to get category structure of category and sub-category and from their at the sub-category to get the benefits of cashing and so on of woocommerce.

        return $this->get_term_children($id,'product_cat',$format, $product);

    }

    public function is_wc_endpoint_url( $endpoint = false ) {
        
        if(function_exists('is_wc_endpoint_url')) {         
            return is_wc_endpoint_url($endpoint);
        } else {

            global $wp;
            $wc_endpoints = WC()->query->query_vars;
            
            if ( false !== $endpoint ) {
                if ( ! isset( $wc_endpoints[ $endpoint ] ) ) {
                    return false;
                } else {
                    $endpoint_var = $wc_endpoints[ $endpoint ];
                }            
                return isset( $wp->query_vars[ $endpoint_var ] );
            } else {
                foreach ( $wc_endpoints as $key => $value ) {
                    if ( isset( $wp->query_vars[ $key ] ) ) {
                        return true;
                    }
                }            
                return false;
            }
        }
    }

    public function get_terms($parent_id = 0, $orderby = 'menu_order',$taxonomy='product_cat') {
        
        $term_list =array();
        if(class_exists('SitePress')) {
            global $wpdb;
            if($taxonomy==='product_cat'){
                $query = "SELECT ".$wpdb->term_taxonomy.".term_id FROM ".$wpdb->term_taxonomy." WHERE ".$wpdb->term_taxonomy.".parent=".$parent_id;
            } else {
                $query = "SELECT ".$wpdb->term_taxonomy.".term_id FROM ".$wpdb->term_taxonomy." WHERE ".$wpdb->term_taxonomy.".taxonomy='".$taxonomy."'";
            }

            $result = $wpdb->get_results($query,'ARRAY_A');
            $result = array_column($result,'term_id');
            $term_list = array();
            foreach ($result as $term_id) {
                $term_list[$term_id] = wbc()->wc->get_term_by('id',$term_id,$taxonomy);
            }               
        } else {
            if($taxonomy==='product_cat'){
                $term_list = get_terms($taxonomy, array('hide_empty' => 0, 'orderby' => $orderby, 'parent'=>$parent_id,'lang'=>''));
            } else{
            
                $term_list = get_terms($taxonomy,array('hide_empty' => 0, 'orderby' => $orderby,'lang'=>''));
            }            
        }
        return $term_list;
    }

    public static function eo_wbc_get_cart_url() {        
        return function_exists('wc_get_cart_url')?wc_get_cart_url():apply_filters( 'woocommerce_get_cart_url', self::eo_wbc_support_get_page_permalink( 'cart' ));
    }

    public function eo_wbc_get_product($product_id){
        return function_exists('wc_get_product')?wc_get_product($product_id):WC()->product_factory->get_product($product_id,array());
    }

    public function get_product($product_id){
        // wrapping up long name to short name, the wrapping up
        // function is to be removed in future.
        return $this->eo_wbc_get_product($product_id);
    }

    public static function eo_wbc_create_attribute($args){

        if(function_exists('wc_create_attribute')) {
                        
            add_filter('product_attributes_type_selector',function($type){
                $type['button']=__('Button','woo-bundle-choice');
                $type['color']=__('Color','woo-bundle-choice');
                $type['image']=__('Icon','woo-bundle-choice');
                $type['image_text']=__('Icons with Text','woo-bundle-choice');
                $type['dropdown_image']=__('Dropdown with Icons','woo-bundle-choice');
                $type['dropdown_image_only']=__('Dropdown with Icons Only','woo-bundle-choice');
                $type['dropdown']=__('Dropdown','woo-bundle-choice');
                return $type;
            });

            return wc_create_attribute($args);

        } else{

             global $wpdb;

            $slug = $args['slug'];

            if ( strlen( $slug ) >= 28 ) {
                return new WP_Error( 'invalid_product_attribute_slug_too_long', sprintf( __( 'Name "%s" is too long (28 characters max). Shorten it, please.', 'woocommerce' ), $slug ), array( 'status' => 400 ) );
            } elseif ( wc_check_if_attribute_name_is_reserved( $slug ) ) {
                return new WP_Error( 'invalid_product_attribute_slug_reserved_name', sprintf( __( 'Name "%s" is not allowed because it is a reserved term. Change it, please.', 'woocommerce' ), $slug ), array( 'status' => 400 ) );
            } elseif ( taxonomy_exists( wc_attribute_taxonomy_name( $args['name'] ) ) ) {
                return new WP_Error( 'invalid_product_attribute_slug_already_exists', sprintf( __( 'Name "%s" is already in use. Change it, please.', 'woocommerce' ), $args['name'] ), array( 'status' => 400 ) );
            }

            $data = array(
                'attribute_label'   => $args['name'],
                'attribute_name'    => $args['slug'],
                'attribute_type'    => (empty($args['type'])?'select':$args['type']),
                'attribute_orderby' => 'menu_order',
                'attribute_public'  => 1, // Enable archives ==> true (or 1)
            );

            $results = $wpdb->insert( "{$wpdb->prefix}woocommerce_attribute_taxonomies", $data );

            if ( is_wp_error( $results ) ) {
                return new WP_Error( 'cannot_create_attribute', $results->get_error_message(), array( 'status' => 400 ) );
            }

            $id = $wpdb->insert_id;

            do_action('woocommerce_attribute_added', $id, $data);

            wp_schedule_single_event( time(), 'woocommerce_flush_rewrite_rules' );

            delete_transient('wc_attribute_taxonomies');
            return $id;
        }
    }

    public static function eo_wbc_get_product_variation_attributes( $variation_id ,$variation_data=array()) {

        if(is_null($variation_id))
        {
             return ''; 
        }
        else
        {           
            $variation_meta=function_exists('wc_get_product_variation_attributes')
                        ?
                            wc_get_product_variation_attributes($variation_id)
                            :
                            self::eo_wbc_support_get_product_variation_attributes($variation_id);   

            $var_attrs=array();                            
            foreach ($variation_meta as $taxonomy => $term_slug) {
                $attribute_taxonomy = $taxonomy;
                $taxonomy=substr($taxonomy,strlen('attribute_'));
                $taxonomy_name='';
                
                $taxonomies=wc_get_attribute_taxonomies();

                foreach ($taxonomies as $tax) {
                    if('pa_'.$tax->attribute_name==$taxonomy){
                        $taxonomy_name=$tax->attribute_label;
                    }
                }
                if(empty($term_slug) and !empty($variation_data) and isset($variation_data[$attribute_taxonomy])){
                    $term_slug = (string)$variation_data[$attribute_taxonomy];
                }

                $term_data = wbc()->wc->get_term_by('slug',$term_slug,$taxonomy);                
                if(!is_wp_error($term_data) and !empty($term_data->name)){
                    $var_attrs[]=($taxonomy_name?$taxonomy_name.': ':'').$term_data->name;    
                }  
                //$var_attrs[]=($taxonomy_name?$taxonomy_name.': ':'').get_term_by('slug',$term_slug,$taxonomy)->name;                    
            }
            return array_filter($var_attrs);
        }        
    }
    
    public static function eo_wbc_support_get_product_variation_attributes( $variation_id ) {
        if(function_exists('wc_get_product_variation_attributes')){
            return wc_get_product_variation_attributes($variation_id);
        }

        // Build variation data from meta.        
        $all_meta                = get_post_meta( $variation_id );
        $parent_id               = wp_get_post_parent_id( $variation_id );
        $parent_attributes       = array_filter( (array) get_post_meta( $parent_id, '_product_attributes', true ) );
        $found_parent_attributes = array();
        $variation_attributes    = array();
        
        if(empty($all_meta)) return array();

        // Compare to parent variable product attributes and ensure they match.
        foreach ( $parent_attributes as $attribute_name => $options ) {
            if ( ! empty( $options['is_variation'] ) ) {
                $attribute                 = 'attribute_' . sanitize_title( $attribute_name );
                $found_parent_attributes[] = $attribute;
                if ( ! array_key_exists( $attribute, $variation_attributes ) ) {
                    $variation_attributes[ $attribute ] = ''; // Add it - 'any' will be asumed.
                }
            }
        }
        
        // Get the variation attributes from meta.
        foreach ( $all_meta as $name => $value ) {
            // Only look at valid attribute meta, and also compare variation level attributes and remove any which do not exist at parent level.
            if ( 0 !== strpos( $name, 'attribute_' ) || ! in_array( $name, $found_parent_attributes ) ) {
                unset( $variation_attributes[ $name ] );
                continue;
            }
            /**
             * Pre 2.4 handling where 'slugs' were saved instead of the full text attribute.
             * Attempt to get full version of the text attribute from the parent.
             */
            if ( sanitize_title( $value[0] ) === $value[0] && version_compare( get_post_meta( $parent_id, '_product_version', true ), '2.4.0', '<' ) ) {
                foreach ( $parent_attributes as $attribute ) {
                    if ( 'attribute_' . sanitize_title( $attribute['name'] ) !== $name ) {
                        continue;
                    }
                    $text_attributes = self::eo_wbc_support_get_text_attributes( $attribute['value'] );
                    
                    foreach ( $text_attributes as $text_attribute ) {
                        if ( sanitize_title( $text_attribute ) === $value[0] ) {
                            $value[0] = $text_attribute;
                            break;
                        }
                    }
                }
            }
            
            $variation_attributes[ $name ] = $value[0];
        }
        
        return $variation_attributes;
    }
    
    private function eo_wbc_support_get_text_attributes( $raw_attributes ){
        return array_filter( array_map( 'trim', explode( WC_DELIMITER, html_entity_decode( $raw_attributes, ENT_QUOTES, get_bloginfo( 'charset' ) ) ) ), array(self,'eo_wbc_support_get_text_attributes_filter_callback') );
    }
    
    private function eo_wbc_support_get_text_attributes_filter_callback( $value ){
        return '' !== $value;
    }
    
    private static function eo_wbc_support_get_page_permalink( $page ) {
        $page_id   = wc_get_page_id( $page );
        $permalink = 0 < $page_id ? get_permalink( $page_id ) : get_home_url();
        return apply_filters( 'woocommerce_get_' . $page . '_page_permalink', $permalink );
    }

    public static function eo_wbc_get_attribute( $id ) {

        if(function_exists('wc_get_attribute')){
            return wc_get_attribute($id);
        } else {

            foreach (wc_get_attribute_taxonomies() as $attributes) {                    

                if($attributes->attribute_id==$id){

                    $data                    = $attributes;
                    $attribute               = new stdClass();
                    $attribute->id           = (int) $data->attribute_id;
                    $attribute->name         = $data->attribute_label;
                    $attribute->slug         = wc_attribute_taxonomy_name( $data->attribute_name );
                    $attribute->type         = $data->attribute_type;
                    $attribute->order_by     = $data->attribute_orderby;
                    $attribute->has_archives = (bool) $data->attribute_public;
                    return $attribute;
                }                    
            }
            return null;               
        }
    } 

    public function get_taxonomy_by_slug($slug){
        if(!empty($slug)){
            
            $attributes = wc_get_attribute_taxonomies();

            if(!empty($attributes)){
                foreach ($attributes as $attribute) {
                    
                    if(wc_attribute_taxonomy_name($attribute->attribute_name)==$slug){

                        $data                    = $attribute;
                        $attr               = new stdClass();
                        $attr->id           = (int) $data->attribute_id;
                        $attr->name         = $data->attribute_label;
                        $attr->slug         = wc_attribute_taxonomy_name( $data->attribute_name );
                        $attr->type         = $data->attribute_type;
                        $attr->order_by     = $data->attribute_orderby;
                        $attr->has_archives = (bool) $data->attribute_public;
                        return $attr;
                    }                    
                }
                return false;   
            } else {
                return false;
            }       
        }
    }

    public function get_currency_symbol() {
        return get_woocommerce_currency_symbol();
    }

    public function wc_permalink(string $key){
        $permalink = get_option('woocommerce_permalinks',array());
        if(empty($permalink)){
            $permalink['category_base'] = untrailingslashit('product-category');
        }

        if(empty($permalink) or empty($permalink[$key])){
            return '';
        } else {
            return $permalink[$key];
        }
    }

    public function get_cat_name($term_id){

        $term = $this->get_term_by( 'id', $term_id, 'product_cat' );
        
        return $term->name;
    }

    public function get_cat_image($id, $slug = null, $name = null) {

        $term_id = null;

        if( !empty($id) ) {

            $term_id = $id;     

        } elseif(!empty($slug)) {

            $term = $this->get_term_by( 'slug', $slug, 'product_cat' );

            if(!empty($term) and !is_wp_error($term)){
                
                $term_id = $term->term_id;
            }

        } elseif(!empty($name)) {

            $term = $this->get_term_by( 'name', $name, 'product_cat' );

            if(!empty($term) and !is_wp_error($term)){
                
                $term_id = $term->term_id;
            }

        }

        if (!empty($term_id)) {
            
            $thumbnail_id = get_term_meta( $term_id, 'thumbnail_id', true );
            $cat_image = wp_get_attachment_url( $thumbnail_id );
            if(!empty($cat_image) and !is_wp_error($cat_image)){

                return $cat_image; 

            }

        }
            
        return null;

    }

    public function get_single_product_top_cat_name(){

        if ( is_product() ) {
            
            global $post;

            // $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) );
            $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'term_id', 'order' => 'ASC' ) );

            if ( ! empty( $terms ) ) {
                $main_term = $terms[0];
                // $ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
                // if ( ! empty( $ancestors ) ) {
                //     $ancestors = array_reverse( $ancestors );
                //     // first element in $ancestors has the root category ID
                //     // get root category object
                //     $root_cat = get_term( $ancestors[0], 'product_cat' );
                // }
                // else {
                //     // root category would be $main_term if no ancestors exist
                // }

                if(!empty($main_term)) {

                    return $main_term->name;
                }
            }
            else {
                // no category assigned to the product
            }
        }

        return null;
    }

    public function get_productCats($parent_slug = '', $format = '', $sp_eid_type_value = 'prod_cat', $is_return_data_only = false){
        
        $parent = '';
        if( !empty($parent_slug) ) {
            $parent_term = get_term_by('slug',$parent_slug,'product_cat');
            if( $parent_term ) {
                $parent = $parent_term->term_id;
            } 
        }
        $separator = wbc()->config->separator();
        $map_base = get_categories(array(
            'hierarchical' => 1,
            'show_option_none' => '',
            'hide_empty' => 0,
            'parent' => $parent,
            'taxonomy' => 'product_cat'
        ));
          
        $option_list=null;    
        if( empty($format) ) {

            $option_list=array();    
        } elseif( $format == 'detailed_dropdown' ) {
            $option_list='';    
        } elseif( $format == 'detailed' || $format == 'detailed_slug') {
            $option_list=array();
        } elseif( $format == 'term_taxonomy_id_with_slug_label') {
            $option_list=array();
        } elseif( $format == 'id_and_title' ) {
            $option_list=array();
        } elseif( $format == 'opts_detailed' ) {
            $option_list=array();
        } elseif( $format == 'opts_detailed' ) {
            $option_list=array();
        }

        if(is_array($map_base) and !empty($map_base)) {
          foreach ($map_base as $base) {        
            if( empty($format) ) {

                $option_list[$base->term_id] = $base->slug;
            } elseif( $format == 'detailed_dropdown' ) {
                $option_list.='<div class="item" data-value="'. esc_attr($base->term_id) .'" data-sp_eid="'. esc_attr($separator) .'prod_cat'.esc_attr($separator).esc_attr($base->term_id).'">'.esc_html(str_replace("'","\'",$base->name)).'</div>'.$this->get_productCats($base->slug, $format, $sp_eid_type_value);
            } elseif( $format == 'detailed' || $format == 'detailed_slug') {
                $option_list[$base->term_id] = array('label'=> (( $format == 'detailed_slug' ? str_replace("'","\'",$base->name).'('.$base->slug.')' : str_replace("'","\'",$base->name) )), 'attr'=>' data-sp_eid="'.esc_attr($separator).esc_attr($sp_eid_type_value).esc_attr($separator).esc_attr($base->term_id).esc_attr($separator).'" ', $format);

                $option_list = array_replace($option_list, self::get_productCats($base->slug, $format, $sp_eid_type_value)); //array_merge($option_list, self::get_productCats($base->slug, $format));

            } elseif( $format == 'term_taxonomy_id_with_slug_label') {
                $option_list[$base->term_taxonomy_id] = array('label'=> str_replace("'","\'",$base->name).'('.$base->slug.')', $format);

                $option_list = array_replace($option_list, self::get_productCats($base->slug, $format, $sp_eid_type_value, $is_return_data_only)); //array_merge($option_list, self::get_productCats($base->slug, $format));

            } elseif( $format == 'id_and_title' ) {
               
                $option_list[$base->term_id] = $base->name;
            } elseif( $format == 'opts_detailed' ) {

                // ACTIVE_TODO/TODO right now we are not supporting parent child structure because it is not necessary in the calling layers just because the slugs are unique for the category so it is not necessary. but if require then we can apply the structure here and at that time need to make necessary changes on the calling layer in dapii and so on. and if nothing comes up then simply mark it as TODO and remove ACTIVE_TODO by third revision -- to h  
                if($is_return_data_only) {

                    $option_list[$base->term_id] = array('label'=>/*str_replace("'","\'",*/$base->name/*)*/, 'slug'=>$base->slug, 'sp_eid'=>$separator.$sp_eid_type_value.$separator.$base->term_id, 'parent_slug'=>$base->slug, 'parent_sp_eid'=>$separator.$sp_eid_type_value.$separator.$base->term_id);
                } else {

                    $option_list[$base->term_id] = array(
                        'attr' => ' data-sp_eid="' . esc_attr($separator) . esc_attr($sp_eid_type_value) . esc_attr($separator) . esc_attr($base->term_id) . '" ',
                        'label' => (str_replace("'", "\'", $base->name)),
                        'slug' => $base->slug
                    );

                }

                $option_list = array_replace($option_list, self::get_productCats($base->slug, $format, $sp_eid_type_value,$is_return_data_only)); //array_merge($option_list, self::get_productCats($base->slug, $format));
            }
          }
        }

        return $option_list;
    }

    public function get_productAttributes($format = '', $is_return_data_only = false){

        $attributes = null;
        if(function_exists('wc_get_attribute_taxonomies')){
          $attributes = wc_get_attribute_taxonomies();
        }
        $separator = wbc()->config->separator();
        $option_list=null;    
        if( empty($format) ) {

            $option_list=array();    
        } elseif( $format == 'detailed_dropdown' ) {
            $option_list='<div class="divider"></div><div class="header">'.esc_html__('Attributes','diamond-api-integrator').'</div>';
        } elseif( $format == 'detailed' ) {
            $option_list=array();
        } elseif( $format == 'detailed_vattr' ) {
            $option_list=array();
        } elseif( $format == 'id_and_title' ) {
            $option_list=array();
        } elseif( $format == 'opts_id_and_title' ) {
            $option_list=array();
        } elseif( $format == 'opts_detailed' ) {
            $option_list=array();
        } elseif( $format == 'detailed_sp_eid' ) {
            $option_list=array();
        }

        if(is_array($attributes) and !empty($attributes)){
            foreach ($attributes as $attribute) {        
                if( empty($format) ) {

                    $option_list[$attribute->attribute_id] = 'pa_'.$attribute->attribute_name.'';
                } elseif( $format == 'detailed_dropdown' ) {

                    $option_list .= '<div class="item" data-value="pa_' . esc_attr($attribute->attribute_name) . '" data-sp_eid="' . esc_attr($separator) . 'attr' . esc_attr($separator) . esc_attr($attribute->attribute_id) . '">' . esc_html($attribute->attribute_label) . '</div>';

                } elseif( $format == 'detailed' ) {

                    $option_list['pa_' . $attribute->attribute_name] = array(
                        'label' => ($attribute->attribute_label),
                        'attr' => 'data-sp_eid="' . esc_attr(($separator) . 'attr' . ($separator) . ($attribute->attribute_id) . ($separator)) . '" ',
                        $format
                    ); 

                } elseif( $format == 'detailed_vattr' ) {

                    // temp comment (run on api demo) @s
                    // $option_list['pa_'.$attribute->attribute_name] = array('label'=>$attribute->attribute_label, 'attr'=>'data-sp_eid="'.$separator.'attr'.$separator.$attribute->attribute_id.'" ', $format);  

                    $option_list['pa_' . $attribute->attribute_name] = array(
                        'label' => ($attribute->attribute_label . '(use for variations)'),
                        'attr' => 'data-sp_eid="' . esc_attr(($separator) . 'attr' . ($separator) . ($attribute->attribute_id) . ($separator) . 'vattr' . ($separator)) . '" ',
                        $format
                    );  

                } elseif( $format == 'id_and_title' ) {
                    $option_list[$attribute->attribute_id] = $attribute->attribute_label;
                } elseif( $format == 'opts_id_and_title' ) {

                    foreach (get_terms(['taxonomy' => wc_attribute_taxonomy_name($attribute->attribute_name),'hide_empty' => false]) as $term) {
 
                        $option_list[$term->term_taxonomy_id] = $term->name;  
                    }
                } elseif( $format == 'opts_detailed' ) {

                    foreach (get_terms(['taxonomy' => wc_attribute_taxonomy_name($attribute->attribute_name),'hide_empty' => false]) as $term) {

                        /*ACTIVE_TODO_OC_START
                        ACTIVE_TODO mostly for the notes and if applicable then keep in mind that we have just added attr_opt based sp_eid support for the attribute option which was so far missing and we were most probabely actualy doing a big error by using attr type of sp_eid as the type of the attribute options. so it should be well noted that so far everywere for attribute option the attr type is being used and that need to be rectified as soon as we get chance. -- to h
                        ACTIVE_TODO_OC_END*/
                        if($is_return_data_only) {
                            
                            $option_list[$term->term_taxonomy_id] = array('sp_eid'=>$separator.'attr_opt'.$separator.$term->term_taxonomy_id, 'slug'=>$term->slug, 'label'=>$term->name, 'attr_slug'=>'pa_'.$attribute->attribute_name, 'attr_sp_eid'=>$separator.'attr'.$separator.$attribute->attribute_id.$separator ); 

                        } else {

                            $option_list[$term->term_taxonomy_id] = array(
                                'attr' => 'data-sp_eid="' . esc_attr(($separator) . 'attr_opt' . ($separator) . /*$attribute->attribute_id*/ ($term->term_taxonomy_id) . ($separator) . ($separator) . ($term->term_id) . ($separator)) . '" ',
                                'label' => ($term->name),
                                'slug' => $term->slug
                            );
                        }
                    }
                } elseif( $format == 'detailed_sp_eid' ) {

                    $option_list[$separator.'attr'.$separator.$attribute->attribute_id] = array('label'=>$attribute->attribute_label, $format); 
                }
            }
        }
        return $option_list;
    }

    ////// 29-04-2022 -- @shraddha -- for options attribute //////

    public static function eo_wbc_attributes($opts_arr=array()) {        
        // $taxonomies="";
        $separator = wbc()->config->separator();

        if(function_exists('wc_get_attribute_taxonomies')){
          $attributes = wc_get_attribute_taxonomies();
        } 
        foreach ($attributes as $attribute) {                 
            // $taxonomies.="<div class='divider'></div><div class='header'>".($attribute->attribute_label?$attribute->attribute_label:$attribute->attribute_name)."</div>";
            $opts_arr[wbc()->common->stringToKey( ($attribute->attribute_label?$attribute->attribute_label:$attribute->attribute_name) )] = array( 'label'=>($attribute->attribute_label?$attribute->attribute_label:$attribute->attribute_name), 'is_header'=>true );                  
            foreach (get_terms(['taxonomy' => wc_attribute_taxonomy_name($attribute->attribute_name),'hide_empty' => false]) as $term) {

                // $taxonomies.="<div class='item' data-value='".$term->term_taxonomy_id."'>".$term->name."</div>";   
                // commented and changed on 31-01-2023
                // $opts_arr[$term->term_taxonomy_id] = array( 'label'=>$term->name , 'attr'=>'data-sp_eid="'.$separator.'attr'.$separator.$term->term_taxonomy_id.' " ');  
                $opts_arr[$term->term_taxonomy_id] = array(
                    'label' => ($term->name),
                    'attr' => 'data-sp_eid="' . esc_attr(($separator) . 'attr' . ($separator) . ($term->term_taxonomy_id) . ($separator)) . '" '
                );

            }
        }
        // return $taxonomies;
        return $opts_arr;
    } 

    ////// 29-04-2022 -- @shraddha -- for options category //////
    public static function eo_wbc_prime_category($slug='',$prefix='',$opts_arr=array()) {

        $separator = wbc()->config->separator();
        $map_base = get_categories(array(
            'hierarchical' => false,
            'show_option_none' => '',
            'hide_empty' => 0,
            'parent' => !empty(wbc()->wc->get_term_by('slug',$slug,'product_cat')) ?wbc()->wc->get_term_by('slug',$slug,'product_cat')->term_id : '',
            'taxonomy' => 'product_cat'
        ));
        
        $category_option_list='';
        
        foreach ($map_base as $base) {            

            $parent_name='';
            if(!empty($base->parent)) {
                $parent_name = (!empty(wbc()->wc->get_term_by('id',$base->parent,'product_cat')) ?' - '.wbc()->wc->get_term_by('id',$base->parent,'product_cat')->name : '');
            }


            $opts_arr[$base->term_id] = array( 'label'=>$prefix.$base->name.$parent_name, 'attr'=>' data-sp_eid="'.esc_attr($separator.'prod_cat'.$separator.$base->term_id).' " ', );
            $opts_arr = self::instance()->eo_wbc_prime_category($base->slug, $prefix.'-',$opts_arr);
        }

        // return $category_option_list;
        return $opts_arr;
    }
    ////// 29-04-2022 -- @shraddha -- for options attribute/category //////
    public static function wc_data_detailed_dropdown() {

        $attribute = self::instance()->eo_wbc_attributes();
        $categories = self::instance()->eo_wbc_prime_category();
        return array_replace($attribute, $categories);

    }  
     
    public function is_variable($product){

        if( $product->is_type( 'variable' )){
           return true;
        }

        return false;
    }

    public function is_variation_object($product){

        if(is_a( $product, 'WC_Product_Variable' ) or is_a( $product, 'WC_Product_Variation' )){
           return true;
        }

        return false;
    }

    public function is_wc_object($product){

        if(is_a( $product, 'WC_Product' ) or is_a( $product, 'WC_Product_Variable' ) or is_a( $product, 'WC_Product_Variation' )){
           return true;
        }

        return false;
    }

    public function get_terms_order_data(){

        $attributes = array();        
       
        foreach (wc_get_attribute_taxonomies() as $taxonomy) {
            
            
            $terms=get_terms(array('taxonomy'=>wc_attribute_taxonomy_name($taxonomy->attribute_name),'hide_empty'=>false));

            if(is_wp_error($terms)){

                $terms=get_terms(wc_attribute_taxonomy_name($taxonomy->attribute_name),array('hide_empty'=>false));
            }
            
            if(!empty($terms) and !is_wp_error($terms)){
               
                $terms_collaction = array();                
                foreach ($terms as $term_key => $term_value) {                    
                    $terms_collaction[str_replace(' ','_',trim($term_value->name))] = $term_key;
                    
                }
                $attributes[wc_attribute_taxonomy_name($taxonomy->attribute_name)] = $terms_collaction;
            }            
        }       
        return $attributes;

    }

    // credit : https://stackoverflow.com/questions/12798665/wordpress-get-category-id-from-url
    public function get_category_by_url($url=null, $result_format='id', $is_based_on_wp_api=false, $is_based_on_url=false, $is_based_on_category_title=false) {
    
        if( empty($url) ) {

            $url = wbc()->common->get_current_url();
        } 

        $wp_category = null;
        if($is_based_on_wp_api) {

            foreach( (get_the_category()) as $category) {
                
                if ( get_category_link($category->cat_ID) == $url ) {
                    
                    $wp_category = $category;
                    
                    break;
                }
            }
        } elseif($is_based_on_url) {

            // global $wp;
            // $current_url = home_url( add_query_arg( array(), $wp->request ) );
            $current_url = $url;

            $url_array = explode('?',$current_url); 

            $url_array = explode('/',$url_array[0]); 
            $retVal = !empty($url_array[5]) ? $url_array[5] : $url_array[4] ;
            // /*$idObj*/$wp_category = get_category_by_slug($retVal); 
            // $wp_category = get_term_by( 'slug', $retVal, 'product_cat' ); 
            $wp_category = wbc()->wc->get_term_by( 'slug', $retVal, 'product_cat' ); 
            // echo /*$idObj*/$wp_category->name

        } elseif($is_based_on_category_title) {

            $cur_cat = get_cat_ID( single_cat_title("",false) ); //get the cat id
            /*$category*/$wp_category = &get_category($cur_cat);
            // /*$category*/$wp_category->slug; //get cat slug
        }

        if($result_format == 'id') {

            return $wp_category->cat_ID;
        } elseif($result_format == 'slug') {

            return $wp_category->slug;
        } else {

            return $wp_category;
        }
    }

    public function attribute_taxonomy_name_by_id($attribute_id) {

        return wc_attribute_taxonomy_name_by_id((int) $attribute_id);
    }

    public function slug_to_id($type, $slug) {

        if($type == 'prod_cat') {

            $term = $this->get_term_by( 'slug', $slug, 'product_cat' );

            if(!empty($term) and !is_wp_error($term)){
                
                return $term->term_id;
            }

        } elseif($type == 'attr') {

            
            if(function_exists('wc_get_attribute_taxonomies')){
                
                $attributes = wc_get_attribute_taxonomies();
                
                foreach($attributes as $attribute_obj) {

                    if( $attribute_obj->attribute_name == $slug ) {

                        return $attribute_obj->attribute_id;
                    }
                }
            }

        } else {

        }

        return null;
    } 

    public function is_shop_or_category() {

        return ( is_shop() || is_product_category() ); 
    }

    public function id_to_slug($type, $id) {

        if($type == 'prod_cat') {

            // yet to implement
            /*$term = $this->get_term_by( 'slug', $slug, 'product_cat' );

            if(!empty($term) and !is_wp_error($term)){
                
                return $term->term_id;
            }*/

        } elseif($type == 'attr') {

            $attribute = wc_get_attribute( $id );
            
            if(!empty($attribute) and !is_wp_error($attribute)){
                
                return $attribute->slug;
            }

        } elseif($type == 'attr_opt') {

            $term = get_term( $id );
            
            if(!empty($term) and !is_wp_error($term)){
                
                return $term->slug;
            }
        }
    }

    public function slug_to_label($type, $slug, $taxonomy=null) {

        if($type == 'prod_cat') {

            $taxonomy = 'product_cat'; 

            $term = $this->get_term_by('slug',$slug,$taxonomy);

            if(!empty($term) and !is_wp_error($term)) {
                 return $term->name;
            }
            

        } elseif($type == 'attr') {

            $taxonomy = $slug; 

            if( strpos($taxonomy, 'pa_') !== 0 ) {

                $taxonomy   = 'pa_' . $taxonomy; 
            }

            return wc_attribute_label( $taxonomy );
            
        } elseif($type == 'attr_opt') {

            if( strpos($taxonomy, 'pa_') !== 0 ) {

                $taxonomy   = 'pa_' . $taxonomy; 
            }

            $term = $this->get_term_by('slug',$slug,$taxonomy);

            if(!empty($term) and !is_wp_error($term)) {
                 return $term->name;
            }

        } else {

        }

        return null;
    } 


    public function parent_category_id($category_id) {

        //firstly, load data for your child category
        $child = get_term_by( 'id', $category_id, 'product_cat' )/*get_category($category_id)*/;

        //from your child category, grab parent ID
        $parent = $child->parent;

        //load object for parent category
        $parent_cat = get_term_by( 'id', $parent, 'product_cat' )/*get_category($parent)*/;

        /*ACTIVE_TODO_OC_START
        ACTIVE_TODO here we are using term_taxonomy_id but we are not sure if term_id is right or term_taxonomy_id is right. normaly term_taxonomy_id is what that is used to determine the wp_query quired object's category id. but anyway now we should understand clearly the whole taxonomy data structure. so tthat we can clearly confirm this point as well. let just do it by second revision -- to h
        ACTIVE_TODO_OC_END*/
        return $parent_cat->term_taxonomy_id;
    }

    public function product_has_category($categories_to_check, $product_id) {

        if ( has_term( $categories_to_check, 'product_cat', $product_id ) ) { 

            return true;
        }
        
        return false;
    }
}

function wbc_is_shop_or_category() {

    wbc()->wc->is_shop_or_category();
}
