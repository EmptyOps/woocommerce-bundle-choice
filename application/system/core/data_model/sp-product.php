<?php
/**
 *	SP Product class 
 *	NOTE: This class hierarchy of these clasees will contain janral code related to CRUD operations and so on functions. so it means that if there is any extension specific code then that need to be implemented in that specific extension class which is extended from this class only, that is necessary to ensure that wbc free layer has only relevant and neat code. and beyond the extension specific classes thar might be sum exception like dapii extenshone has its specific different classes for handling the crud operations and factory logic related to category, attribute and product and so on, and that exception is assumed to be kept separate always wich mins that dapii code will never be merged or synced in any way with this class hierarchy and its layers.
 *
 */

namespace eo\wbc\system\core\data_model;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\data_model\SP_Entity;

class SP_Product extends SP_Entity {

	private static $_instance = null;

	public static function instance() {

		throw new Exception("Sorry, singleton instance method not supported for this class. Always use construct method to create object.", 1);
	}

	public function __construct() {

		throw new Exception("Default construct method is not supported. Use class function createFromArray etc. to create product or its object.", 1);
	}

	public static function is_product_exist( $sku, $extra_args ) {

		// TODO in future if it become necessary then should search by meta of api_unique_key to ensure that schema definition do not break even if woo is not maintaining unique skus
		return !empty( wc_get_product_id_by_sku($sku) );
	}

	public static function get_product_id( $sku, $extra_args ) {

		// TODO in future if it become necessary then should search by meta of api_unique_key to ensure that schema definition do not break even if woo is not maintaining unique skus
		return wc_get_product_id_by_sku($sku);
	}

	public static function createFromJson(){

		throw new Exception("not implemented yet.", 1);
	}

	public static function createFromSerialized(){

		throw new Exception("not implemented yet.", 1);
	}

	public static function createFromArray( $platform_key, $platform_name, $data_array, $args = array() ){

		NOTE: This class hierarchy of these clasees will contain janral code related to CRUD operations and so on functions. so it means that if there is any extension specific code then that need to be implemented in that specific extension class which is extended from this class only, that is necessary to ensure that wbc free layer has only relevant and neat code. and beyond the extension specific classes thar might be sum exception like dapii extenshone has its specific different classes for handling the crud operations and factory logic related to category, attribute and product and so on, and that exception is assumed to be kept separate always wich mins that dapii code will never be merged or synced in any way with this class hierarchy and its layers.

		foreach($data_array as $data_key=>$data){

			self::create($data, $args);
		
		}

	}

	protected static function create($data, $args = array()) {

		// TODO bind to the sample data sample product creation flow(and that should also be adhering to and following the data layer structure defs) where there is either product factory or entire function(s) to do so 

		//	TODO and extensions which needs product factory related operations are also supposed to rely on this class for such operations 

		if (empty($args['is_do_not_transform_older_to_new_format'])) {

			$res = parent::transform_older_format_to_new_format($data, $args);

			if ($res['type' == 'success']) {
		
				$data = $res['data_new_format'];
			} else {

				ACTIVE_TODO_OC_START
				-- we need to mange the error hendling mens the value that is retan from the here shuold be shown as error messeg to the user interface on admin and so on -- to h && -- to harshil
					--	here as soon as we get chance we need to show this errors on the user interface pages of the admin sample_data and so that debugging become easeir -- to h && to harshil
				ACTIVE_TODO_OC_END
				return $res;
			}

		}

		$product_obj = null;

		// creat product oject if it is update mode
		if(!empty($data['sku']['value'])) {

			if( wbc()->sanitize->get('is_test') == 1 or wbc()->sanitize->get('is_light_test') == 1) {
	
				wbc_pr("SP_Product create inner if 6");
			}

			$product_id = wc_get_product_id_by_sku(trim($data['sku']['value']));

			$product_obj = wc_get_product($product_id);

		}


		// creat product oject if it is insert mode
		if(is_wp_error($product_obj) or empty($product_obj)){
				
			if( wbc()->sanitize->get('is_test') == 1 ) {
	
				wbc_pr("SP_Product create if 9.111111");
			}

			if($data['type']['value'] == 'simple') {

				$product_obj = new WC_Product_Simple();
			} else {

				$product_obj = new WC_Product_Variable();
			}

			$product_obj->set_stock_quantity(1);
		}


		$attributes = array();

		foreach ($data as $field) {

			if( wbc()->sanitize->get('is_test') == 1 or wbc()->sanitize->get('is_light_test') == 1) {
	
				wbc_pr("SP_Product create inner 10");
			}

			// -- may be we need to upgred this or if thar is no necessity of coundishon than remove it. -- to h & -- to b(done)
			if(/*empty($field[0 -- key chenge karvanu baki che]) or*/ empty($field['key'])){
				continue;
			}

			// if( strpos($field['column_name'], 'attr_') !== FALSE ) {
			// 	continue;
			// }

			// if( wbc()->sanitize->get('is_test') == 1 ) {
			// 	echo "<pre>";
			// 	print_r($field); 
			// }
			
			switch ($field['key']) {
				case 'title'/*'name'*/:
					$product_obj->set_name($field['value']);
					break;					
				case 'short_desc':	//	added support for short desc on 06-03-2022 -- hiren
					
					// if( wbc()->sanitize->get('is_test') == 1 ) {

					// 	wbc_pr("Product_Factory create_product short_desc");
					// 	wbc_pr($field[1]);
					// }
					
					$product_obj->set_short_description( sanitize_text_field($field['value']) );
					break;
				case 'content'/*'long_desc'*/:
					
					// if( wbc()->sanitize->get('is_test') == 1 ) {

					// 	wbc_pr("Product_Factory create_product long_desc");
					// 	wbc_pr($field[1]);
					// }
					
					$product_obj->set_description( sanitize_text_field($field['value']) );
					break;					
				case 'sku':

					// if( wbc()->sanitize->get('is_test') == 1 ) {
						
					// 	wbc_pr("Product_Factory create_product SKU");
					// 	wbc_pr($field[1]);
					// }

					if(wc_product_has_unique_sku( $product_obj->get_id(), $field['value'] )){

						$product_obj->set_sku($field['value']);

					} else {

						//	TODO do necessary exception management here and then from here should return false instead of throwing the exception but yeah that is only after confirming the flow here and ensuring proper flow and exception management 
						
						
						throw new \Exception("Duplicate sku found", 1);
						
					}
					break;
				case 'regular_price':
					$regular_price = $field['value'];
					if($type == 'simple') {

						$product_obj->set_regular_price($field['value']);
					}
					break;

				case 'sales_price':
					$sales_price = $field['value'];
					//$p->set_sale_price($field[1]);
					break;
				case 'lenght':
					$product_obj->set_length($field['value']);
					break;									
				case 'width':
					$product_obj->set_width($field['value']);
					break;
				case 'height':
					$product_obj->set_height($field['value']);
					break;
				case 'weight':
					$product_obj->set_weight($field['value']);
					break;
				default:	
					break;
					// if(substr($field['key'],0,3)=='pa_'){

					// 	$attributes[/*$field[2]*/ \eo\ssm_dt\model\data_model\SP_SSM_DT_Data_Layer::field_key_to_legacy_key($field['key'], 'attr')] = $field['value'];
					// }
			}
		}

		if (!empty($data['category']['value'])) {

			$cat_ids = array();

			foreach($data['category']['value'] as $cat_key=>$cat_slug){

				$cat_ids[$cat_key] = wbc()->wc->slug_to_id('prod_cat', $cat_slug);
			}

			$product_obj->set_category_ids($cat_ids);
		}


		// save or update the product
		$product_obj->save();

		$product_id = $product_obj->get_id();


		if (!empty($data['thumb']['value'])) {
			
			$img_id=wbc()->wp->add_image_gallary($data['thumb']['value']);

			if($img_id){	
				set_post_thumbnail( $product_id,$img_id );
			}
		}

		ACTIVE_TODO In future whenever any extension or plugin required the image to be passed from the directory path means the directory path need to be supported at that time we need to add support for it. otherwise mark it as todo by third revision if no such requirement comes up. -- to h
		if(!empty($data['images']['value']) and is_array($data['images']['value'])){

			$imgs = array();
			foreach ($data['images']['value'] as $img) {
				$imgid = wbc()->wp->add_image_gallary($this->data_template->gallay_img.$img);
				if(!empty($imgid)){
					array_push( $imgs, $imgid);	
				}					
			}

			update_post_meta($product_id,"_product_image_gallery",implode(',', $imgs));
		}


		if(!empty($data['attribute']['value'])){

			$attributes = array();

			foreach ($data['attribute']['value'] as $_tax => $_val_attribute_data) {

				//$_val = explode('|',$_val['value']);
				$_val = $_val_attribute_data['value'];
				
				if(is_array($_val) and !empty($_val)){
					
					foreach ($_val as $key => $value) {
						
						$tax_term = term_exists( $value['value'], $_tax );
						if ( ! $tax_term ) {								
							$tax_term = wp_insert_term( $value['value'], $_tax );								
						}

						if(!empty($tax_term) and !is_wp_error($tax_term)){
							$term_slug = wbc()->wc->get_term_by('term_taxonomy_id',$tax_term['term_taxonomy_id'],$_tax);	
							if(!empty($term_slug->slug) and !is_wp_error($term_slug)) {
								$_val[$key] = $term_slug->slug;
							}
						}

					}						
					
				}
				
				-- formet conform karvanu che
				//$data['attribute'][$_tax]['value'] = implode('|',$_val);	
				$attributes[$_tax] = $_val_attribute_data;	
				$attributes[$_tax]['value'] = implode('|',$_val);	
			}	

			update_post_meta( $product_id, '_product_attributes', $attributes );

			foreach ($attributes as $attr_index => $attribute) {
				wp_set_object_terms( $product_id, explode('|',$attribute['value']) , $attr_index );					
			}

		}


		$parent_id = $product_id;
		if(!empty($data['variation']['value'])){

			foreach ($data['variation']['value'] as $var_index => $variation) {						

				if(!empty($variation['terms'])){					 
					foreach($variation['terms'] as $taxonomy=>$term_array){
							
						if( ! taxonomy_exists($taxonomy) ){						            
				            register_taxonomy(
				                $taxonomy,
				               'product_variation',
				                array(
				                    'hierarchical' => false,
				                    'label' => ucfirst( substr($taxonomy,3)),
				                    'query_var' => true,
				                    'rewrite' => array( 'slug' => sanitize_title(substr($taxonomy ,3) ) ), // The base slug
				                )
				            );
				        }
						
						$tax_term = term_exists( $term_array['label'], $taxonomy );
						if ( ! $tax_term ) {								
							$tax_term = wp_insert_term( $term_array['label'], $taxonomy );								
						} 
						if(!empty($tax_term) and !is_wp_error($tax_term)){
	    					$term_slug = wbc()->wc->get_term_by('term_taxonomy_id',$tax_term['term_taxonomy_id'],$taxonomy);
	    					if(!empty($term_slug->slug) and !is_wp_error($term_slug)) {
	    						$variation['terms'][$taxonomy] = $term_slug->slug;	    					
	    					}
	    				}
    				}

    				$var_ = null;

    				ACTIVE_TODO Below we are finding the variation id explicitly and then updateing variation instead of inserting it if applicable. but the draw back might be that if the wc variation classes or any woocommerce functions are supporting mins creating as well as finding variation id and updating as applicable for the creation/updation of the variation then we may like to use it. this is maybe quite necessory for the frontend opreshons because if we need to use this function for frontend then explicitly finding variation id like below might be costly and expensive. so lets try to do this as sun as we need it or may be max by first or second revision. -- to h 
    				$var_id = \eo\wbc\model\publics\data_model\SP_WBC_Variations::get_default_variation_id($product_obj,$variation['terms']);

    				if (!empty($var_id)) {

    					// Create a WC_Product_Variation object
						$var_ = wc_get_product($var_id);

						if (is_a($var_, 'WC_Product_Variation')) {

						    die('variation ID '.$var_->get_id().' and actual id '.$var_id);
						} else {
						    die('Invalid variation ID');
						}

    				} else {

    					$var_ = new \WC_Product_Variation();

    				}

					$var_->set_props(
						array(
							'parent_id'     => $parent_id,							
							'regular_price' => $variation['regular_price'],
							'sale_price' => $variation['price']
						)
					);
					-- upar banvvine var use karvano che
					$var_->set_attributes($variation['terms']);	

					// $img_id=$this->add_image_gallary($variation['thumb']);
					// $var_->set_post_thumbnail( $variation['id'],$img_id );
					
					ACTIVE_TODO_OC_START
					ACTIVE_TODO for any extensions if we required to update variation and at that time if it is required that these flow is not adapting to update the variation then we need to find the applicable variation based on the variation attributes that is set above and then just update variation instead of the creating new variation object above. and even if nothing such thing comes up then also lets do it by first revision or second revision. -- to h & -- to b
					ACTIVE_TODO_OC_END
					$var_->save();

					do_action('wbc_sp_product_create_after_save_variation', $var_->get_id(), $variation);

				}				
			}	

			// $_product = wc_get_product($parent_id);
			-- upar banvvine var use karvano che
			$product_obj->set_default_attributes($data['variation'][0]['terms']);					
			$product_obj->save();

		} elseif (!empty($data['regular_price']['value'])) {

			ACTIVE_TODO in below update_post_meta call statements thar are defrant price set in the woocommerce. and so far as per as i know we are using regular_price and sales_price so we need to bring some clarity on what other fields the woocommerce is using for. as well as we need to bring some clarity on our sample data fields as well for example below we seem to be supporting sale_price as well so we need to check if that has any us_e otherwise we need to stop using that in our sample data array format as well. that is better for bringing simplicity and synchronization in the data and woocommerce flows. -- to h & -- to b		
			update_post_meta( $parent_id, '_regular_price',$data['regular_price']['value'] );
			update_post_meta( $parent_id, '_price', $data['sale_price']['value']);						
			update_post_meta( $parent_id, '_sales_price', $data['price']['value']);
			update_post_meta( $parent_id, '_sale_price', $data['sale_price']['value']);				
			update_post_meta( $parent_id, '_manage_stock','no' );	

			NOTE: this is simple type leyar but we are reusing variation hook here also jast like sp_variation leyers. 
			do_action('wbc_sp_product_create_after_save_variation', $parent_id, $data);

		}

		return $product_id;

	}

	public static function get_image_id($product){

		return $product->get_image_id();	
	}

	public static function get_gallery_image_ids($product){

		return $product->get_gallery_image_ids();

	}

}
