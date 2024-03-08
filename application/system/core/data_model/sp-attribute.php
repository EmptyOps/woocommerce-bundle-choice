<?php
/**
 *	SP Attribute class 
 *	NOTE: This class hierarchy of these clasees will contain janral code related to CRUD operations and so on functions. so it means that if there is any extension specific code then that need to be implemented in that specific extension class which is extended from this class only, that is necessary to ensure that wbc free layer has only relevant and neat code. and beyond the extension specific classes thar might be sum exception like dapii extenshone has its specific different classes for handling the crud operations and factory logic related to category, attribute and product and so on, and that exception is assumed to be kept separate always wich mins that dapii code will never be merged or synced in any way with this class hierarchy and its layers.
 *
 */

namespace eo\wbc\system\core\data_model;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\data_model\SP_Entity;

class SP_Attribute extends SP_Entity {

	private static $_instance = null;

	private $platform_key = null;
	private $platform_name = null;

	public static function instance() {

		throw new Exception("Sorry, singleton instance method not supported for this class. Always use construct method to create object.", 1);
	}

	public function __construct() {
		throw new Exception("Default construct method is not supported. Use class function createFromArray etc. to create product or its object.", 1);
	}

	public static function is_attribute_exist( $slug, $extra_args ) {

		throw new Exception("not implemented yet.", 1);
	}

	public static function get_attribute_id( $slug, $extra_args ) {
		
		throw new Exception("not implemented yet.", 1);
	}

	public static function createFromJson(){

		throw new Exception("not implemented yet.", 1);
	}

	public static function createFromSerialized(){

		throw new Exception("not implemented yet.", 1);
	}

	public static function createFromArray( $platform_key, $platform_name, $data_array, $args = array() ){

		// NOTE: This class hierarchy of these clasees will contain janral code related to CRUD operations and so on functions. so it means that if there is any extension specific code then that need to be implemented in that specific extension class which is extended from this class only, that is necessary to ensure that wbc free layer has only relevant and neat code. and beyond the extension specific classes thar might be sum exception like dapii extenshone has its specific different classes for handling the crud operations and factory logic related to category, attribute and product and so on, and that exception is assumed to be kept separate always wich mins that dapii code will never be merged or synced in any way with this class hierarchy and its layers.

		foreach($data_array as $data_key=>$data){

			self::create($data, $args);
		
		}

	}

	protected static function create($data, $args = array()) {

		// TODO bind to the sample data sample attribute creation flow(and that should also be adhering to and following the data layer structure defs) where there is either attribute factory or entire function(s) to do so 

		//	TODO and extensions which needs attribute factory related operations are also supposed to rely on this class for such operations 
	    				        
		if (empty($args['is_do_not_transform_older_to_new_format'])) {

			$res = parent::transform_older_format_to_new_format($data, $args);

			if ($res['type'] == 'success') {
		
				$data = $res['data_new_format'];
			} else {

				// ACTIVE_TODO_OC_START
				// -- we need to mange the error hendling mens the value that is retan from the here shuold be shown as error messeg to the user interface on admin and so on -- to h && -- to harshil
				// 	--	here as soon as we get chance we need to show this errors on the user interface pages of the admin sample_data and so that debugging become easeir -- to h && to harshil
				// ACTIVE_TODO_OC_END
				return $res;
			}
		}

		if(!isset($data['label']['value']) && !isset($data['terms']['value'])) return;

		//adding post data to store data in posts
		$attribute_data = array(
	        'name'   => wp_unslash($data['label']['value']),
	        'slug'    => empty($data['slug']['value']) ? wc_sanitize_taxonomy_name(wp_unslash($data['label']['value'])) : $data['slug']['value'],
	        'type'    => (empty($data['type']['value'])?'select':$data['type']['value']),
	        'order_by' => 'menu_order',
	        'has_archives'  => 1, // Enable archives ==> true (or 1)
	    );		

		$id = wbc()->wc->slug_to_id( 'attr', $attribute_data['slug'] );

		if (empty($id)) {

			$id = wbc()->wc->eo_wbc_create_attribute( $attribute_data );

		}

		// @mahesh - added to store the ribbon color from sample data
		if(!empty($id) and !is_wp_error($id) and !empty($data['ribbon_color']['value'])) {
			update_term_meta($id,'wbc_ribbon_color',$data['ribbon_color']['value']);
		}
		
		if( ! taxonomy_exists('pa_'.$attribute_data['slug']) ){	
			register_taxonomy(
                'pa_'.$attribute_data['slug'],
                array( 'product', 'product_variation' ),
                array(
                    'hierarchical' => false,
                    'label' => ucfirst($attribute_data['slug']),
                    'query_var' => true,
                    'rewrite' => array( 'slug' => sanitize_title($attribute_data['slug'])),
                )
            );		 
        }

		/*if( ! taxonomy_exists('pa_'.$data['slug']) ){						            		    			
            register_taxonomy(
                'pa_'.$data['slug'],
               	array( 'product','product_variation' )			                
            );
        }*/ 				

		if(empty($data['range']['value'])){
    		
			if(!empty($data['terms']['value'])){

	    		foreach ($data['terms']['value'] as $term_index=>$term)  {		

					if( ! term_exists( $term['label'], 'pa_'.$attribute_data['slug']) ) {

						$attr_term_id = wp_insert_term( $term['label'],'pa_'.$attribute_data['slug'],array('slug' => sanitize_title($term['label']),'description'=>$term['desc']) ); 
						
						if(!empty($attr_term_id) and !is_wp_error($attr_term_id)) {

	    					$_attr_term_id = null;
	    					if(is_array($attr_term_id)) {

	    						$_attr_term_id=isset($attr_term_id['term_id']) ? $attr_term_id['term_id'] : null;

	    						if(!empty($_attr_term_id)) {

	    							if(!empty($term['thumb'])){
										$thumb_id=0;
			    						$thumb_id = wbc()->wp->add_image_gallary($term['thumb']);
			    						update_term_meta( $_attr_term_id, 'pa_'.$attribute_data['slug'].'_attachment', wp_get_attachment_url( $thumb_id ) );
	    								update_term_meta( $_attr_term_id, sanitize_title($term['label']).'_attachment', wp_get_attachment_url( $thumb_id ) );
			    					}

			    					if (!empty($term['terms_meta']['image'])) {

			    						$wbc_attachment_id = wbc()->wp->add_image_gallary($term['terms_meta']['image']);

    									$wbc_attachment_src =wp_get_attachment_url( $wbc_attachment_id );
    									function_exists( 'update_term_meta' ) ? update_term_meta( $_attr_term_id,'wbc_attachment',$wbc_attachment_src) : update_metadata( 'woocommerce_term', $_attr_term_id,'wbc_attachment',$wbc_attachment_src);

			    					}

			    					if (!empty($term['terms_meta']['image_thumb'])) {

			    						$wbc_attachment_id = wbc()->wp->add_image_gallary($term['terms_meta']['image_thumb']);

    									$wbc_attachment_src =wp_get_attachment_url( $wbc_attachment_id );
    									function_exists( 'update_term_meta' ) ? update_term_meta( $_attr_term_id,'wbc_attachment_thumb',$wbc_attachment_src) : update_metadata( 'woocommerce_term', $_attr_term_id,'wbc_attachment_thumb',$wbc_attachment_src);

			    					}

			    					if (!wbc_isEmptyArr(/*$data['terms_order'])*/$term['terms_order'])) {

			    						update_term_meta($_attr_term_id, 'order', /*$data['terms_order'][$term_index]*/$term['terms_order']);
			    					
				    					// wbc_pr(get_term_meta($_attr_term_id,'order'));
				    					// die();
			    					}

	    							if(!empty($data['type']['value']) and !empty($term['terms_meta']) and is_array($term['terms_meta'])){

	    								switch ($data['type']['value']) {
	    									case 'color':
	    									
	    										function_exists( 'update_term_meta' ) ? update_term_meta( $_attr_term_id,'wbc_color',$term['terms_meta']['color_code']) : update_metadata( 'woocommerce_term', $_attr_term_id,'wbc_color',$term['terms_meta']['color_code']);
	    										break;
	    										
	    									case 'image':				
	    									case 'image_text':	
	    									case 'dropdown_image':
	    									case 'dropdown_image_only':

	    										// below code is moved abowe the switch case statement in the comen leyer of hadling the images and thumbs
		    									// $wbc_attachment_id = $this->add_image_gallary($term['terms_meta']['image']);

		    									// $wbc_attachment_src =wp_get_attachment_url( $wbc_attachment_id );
		    									// function_exists( 'update_term_meta' ) ? update_term_meta( $_attr_term_id,'wbc_attachment',$wbc_attachment_src) : update_metadata( 'woocommerce_term', $_attr_term_id,'wbc_attachment',$wbc_attachment_src);

	    										break;
	    								}
	    							}
	    						}		    						
	    					}

	    					do_action('wbc_sp_attribute_create_after_save_term', $_attr_term_id, $term);
						}		    								    			
		    		}
		    	}
			}
    	} else {
    		
    		if(!empty($data['terms']['min']['value']) && !empty($data['terms']['max']['value'])) {
    			
    			for($i=(float)$data['terms']['min']['value'];$i<=(int)$data['terms']['max']['value'];$i=round($i+0.1,1)){
    				
    				if( ! term_exists( $i, 'pa_'.$attribute_data['slug']) ){					    					
    					
						wp_insert_term( $i, 'pa_'.$attribute_data['slug'],array('slug' => sanitize_title($i)));

						do_action('wbc_sp_attribute_create_after_save_term', null/*here we are not passing the term data sins here term is created autometicliy in the range. so when we suport the term array of range mins the terms can be passed for creating the term within the range at that time we need to pass it */, null/*here we are not passing the term data sins here term is created autometicliy in the range. so when we suport the term array of range mins the terms can be passed for creating the term within the range at that time we need to pass it */); 
					}
    			}
    		}			    		
    	}	    					    	
	
	   	return $id; //$data;


	}

	public function set_platform_key(){
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}

	public function set_platform_name(){
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}

	public function platform_key(){
		return $this->platform_key;
	}

	public function platform_name(){
		return $this->platform_name;
	}

	public function attribute_display_name(){

	}

	public static function option_terms(){

		// ACTIVE_TODO below hook is unimplemented yet so refer to the plugins we were exploring 
		add_action( 'woocommerce_product_option_terms', function($attribute_taxonomy){

		}, 99, 1 );

	}

	public static function variation_attribute_name($attribute){

		return wc_variation_attribute_name( $attribute );

	}

	public static function variation_option_name( $term_name, $term, $attribute, $product){

		return apply_filters( 'woocommerce_variation_option_name', $term_name, $term, $attribute, $product );

	}

	public static function get_product_terms($product_id, $attribute, $args = array()){

		return wc_get_product_terms($product_id, $attribute, $args);

	}

	public static  function get_wc_attribute_taxonomy( $attribute_name ) {

		//ACTIVE_TODO we may very soon like to implement the caching here, if the loading time or overall speed is concern then this would be high priority 
		global $wpdb;

		$attribute_name = str_replace( 'pa_', '', wc_sanitize_taxonomy_name( $attribute_name ) );

		$attribute_taxonomy = $wpdb->get_row( "SELECT * FROM " . $wpdb->prefix . "woocommerce_attribute_taxonomies WHERE attribute_name='{$attribute_name}'" );

			
		return $attribute_taxonomy;
	}
}
