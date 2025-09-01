<?php
if(!class_exists('EO_WBC_Support')) {

    class EO_WBC_Support
    {        
        public static function eo_wbc_create_attribute($args){

            if(function_exists('wc_create_attribute')) {

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
                    'attribute_type'    => 'select',
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

        public static function eo_wbc_get_cart_url() {        
            return function_exists('wc_get_cart_url')?wc_get_cart_url():apply_filters( 'woocommerce_get_cart_url', self::eo_wbc_support_get_page_permalink( 'cart' ));
        }

        public static function eo_wbc_get_product($product_id){
            return function_exists('wc_get_product')?wc_get_product($product_id):WC()->product_factory->get_product($product_id,array());
        }
        
        public static function eo_wbc_has_shortcode($content, $tag){
            return function_exists('has_shortcode')
                        ?
                    has_shortcode($content,$tag)
                        :
                    self::eo_wbc_wp_has_shortcode($content,$tag);
        }

        public static function eo_wbc_get_product_variation_attributes( $variation_id ) {       
            if(is_null($variation_id))
            {
                 return ''; 
            }
            else
            {           
                return function_exists('wc_get_product_variation_attributes')
                            ?
                                wc_get_product_variation_attributes($variation_id)
                                :
                                self::eo_wbc_support_get_product_variation_attributes($variation_id);   
            }        
        }
        
        private static function eo_wbc_support_get_product_variation_attributes( $variation_id ) {
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
        private function eo_wbc_wp_has_shortcode( $content, $tag ) {
                if ( false === strpos( $content, '[' ) ) {
                        return false;
                }
        
            if ( self::eo_wbc_wp_shortcode_exists( $tag ) ) {
                        preg_match_all( '/' . get_shortcode_regex() . '/', $content, $matches, PREG_SET_ORDER );
                        if ( empty( $matches ) )
                                return false;
        
                        foreach ( $matches as $shortcode ) {
                                if ( $tag === $shortcode[2] ) {
                                        return true;
                                } elseif ( ! empty( $shortcode[5] ) && self::eo_wbc_wp_has_shortcode( $shortcode[5], $tag ) ) {
                                        return true;
                                }
                        }
                }
                return false;
         }
        private function eo_wbc_wp_shortcode_exists( $tag ) {
                global $shortcode_tags;
                return array_key_exists( $tag, $shortcode_tags );
        }

        public static function array_column($input = null, $columnKey = null, $indexKey = null) { 
            
            $argc = func_num_args();
            $params = func_get_args();
            if ($argc < 2) {
                trigger_error("array_column() expects at least 2 parameters, {$argc} given", E_USER_WARNING);
                return null;
            }
            
            if (!is_array($params[0])) {
                trigger_error(
                    'array_column() expects parameter 1 to be array, ' . gettype($params[0]) . ' given',
                    E_USER_WARNING
                );
                return null;
            }
            
            if (!is_int($params[1]) && !is_float($params[1]) && !is_string($params[1]) && $params[1] !== null && !(is_object($params[1]) && method_exists($params[1], '__toString'))) {
                trigger_error('array_column(): '.__('The index key should be either a string or an integer','woo-bundle-choice') , E_USER_WARNING);
                return false;
            }
            
            if (isset($params[2]) && !is_int($params[2]) && !is_float($params[2]) && !is_string($params[2]) && !(is_object($params[2]) && method_exists($params[2], '__toString'))) {
                trigger_error('array_column(): '.__('The index key should be either a string or an integer','woo-bundle-choice') , E_USER_WARNING);
                return false;
            }
            
            $paramsInput = $params[0];
            $paramsColumnKey = ($params[1] !== null) ? (string) $params[1] : null;
            $paramsIndexKey = null;
            if (isset($params[2])) {
                if (is_float($params[2]) || is_int($params[2])) {
                    $paramsIndexKey = (int) $params[2];
                }
                else {
                    $paramsIndexKey = (string) $params[2];
                }
            }
            
            $resultArray = array();
            foreach ($paramsInput as $row) {
                $key = $value = null;
                $keySet = $valueSet = false;
                if ($paramsIndexKey !== null && array_key_exists($paramsIndexKey, $row)) {
                    $keySet = true;
                    $key = (string) $row[$paramsIndexKey];
                }
                
                if ($paramsColumnKey === null) {
                    $valueSet = true;
                    $value = $row;
                }
                elseif (is_array($row) && array_key_exists($paramsColumnKey, $row)) {
                    $valueSet = true;
                    $value = $row[$paramsColumnKey];
                }
                
                if ($valueSet) {
                    if ($keySet) {
                        $resultArray[$key] = $value;
                    }
                    else {
                        $resultArray[] = $value;
                    }
                }
            }
            
            return $resultArray;
        }
        //EO_WBC_Support::get_term_by_term_taxonomy_id
        public static function get_term_by_term_taxonomy_id($id){
            
            global $wpdb;
            $term = $wpdb->get_row( $wpdb->prepare( "SELECT t.*, tt.* FROM $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id WHERE term_taxonomy_id = %s", $id ) . " LIMIT 1" );

            return empty($term)?FALSE:$term;
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
    }
}