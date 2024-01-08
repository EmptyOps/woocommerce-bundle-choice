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

	public static function createFromArray( $platform_key, $platform_name, $data_array ){

		NOTE: This class hierarchy of these clasees will contain janral code related to CRUD operations and so on functions. so it means that if there is any extension specific code then that need to be implemented in that specific extension class which is extended from this class only, that is necessary to ensure that wbc free layer has only relevant and neat code. and beyond the extension specific classes thar might be sum exception like dapii extenshone has its specific different classes for handling the crud operations and factory logic related to category, attribute and product and so on, and that exception is assumed to be kept separate always wich mins that dapii code will never be merged or synced in any way with this class hierarchy and its layers.

		foreach($data_array as $data_key=>$data){

			self::create($data);
		
		}

	}

	protected static function create($data) {

		// TODO bind to the sample data sample product creation flow(and that should also be adhering to and following the data layer structure defs) where there is either product factory or entire function(s) to do so 

		//	TODO and extensions which needs product factory related operations are also supposed to rely on this class for such operations 

		
		$product_obj = null;

		// creat product oject if it is update mode
		if(!empty($data['sku']['key'])) {

			if( wbc()->sanitize->get('is_test') == 1 or wbc()->sanitize->get('is_light_test') == 1) {
	
				wbc_pr("SP_Product create inner if 6");
			}

			$product_id = wc_get_product_id_by_sku(trim($data['sku']['key']));

			$product_obj = wc_get_product($product_id);

		}


		// creat product oject if it is insert mode
		if(is_wp_error($product_obj) or empty($product_obj)){
				
			if( wbc()->sanitize->get('is_test') == 1 ) {
	
				wbc_pr("SP_Product create if 9.111111");
			}

			if($type == 'simple') {

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

			-- may be we need to upgred this or if thar is no necessity of coundishon than remove it. -- to h & -- to b
			if(empty($field[0 -- key chenge karvanu baki che]) or empty($field['key'])){
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
				case 'name':
					$product_obj->set_name($field['value']);
					break;					
				case 'short_desc':	//	added support for short desc on 06-03-2022 -- hiren
					
					// if( wbc()->sanitize->get('is_test') == 1 ) {

					// 	wbc_pr("Product_Factory create_product short_desc");
					// 	wbc_pr($field[1]);
					// }
					
					$product_obj->set_short_description( sanitize_text_field($field['value']) );
					break;
				case 'long_desc':
					
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

					if(substr($field['key'],0,3)=='pa_'){

						$attributes[/*$field[2]*/ \eo\ssm_dt\model\data_model\SP_SSM_DT_Data_Layer::field_key_to_legacy_key($field['key'], 'attr')] = $field['value'];
					}
			}
		}


		if(!empty($attributes)){

			$__attributes = array();
			///////////////// 01-03-2022  -- @shraddha //////////////
			$__variation_data = array();
			///////////////// 01-03-2022  -- @shraddha //////////////

			foreach ($attributes as $attr=>$value) {
				
				$taxonomy = wbc()->wc->get_taxonomy_by_slug($attr);
				
				if($taxonomy and !is_wp_error($taxonomy)){
					$tax_data= array (
								'attribute_name'     => $taxonomy->name,
								'attribute_taxonomy' => $taxonomy->slug,
								'attribute_id'       => $taxonomy->id,
								'term_ids'           => array(),
							);
					
					$term = get_term_by('name',$value,$taxonomy->slug);

					if(is_wp_error($term) or empty($term)){

						$term = term_exists( $value, $taxonomy->slug );
					}

					if(is_wp_error($term) or empty($term)){

						$term = wp_insert_term( $value, $taxonomy->slug );
					}

					$term = (array)$term;

					if(!isset($tax_data['term_ids'])){
						$tax_data['term_ids'] = array();
					}

					if(!is_wp_error($term) and isset($term['term_id'])) {
						$tax_data['term_ids'][] = $term['term_id'];
					}

					$_attribute      = new WC_Product_Attribute();

					$_attribute->set_id( $tax_data['attribute_id'] );
					$_attribute->set_name( $tax_data['attribute_taxonomy'] );
					$_attribute->set_options( $tax_data['term_ids'] );
					$_attribute->set_position( 1 );
					$_attribute->set_visible( true );
					$_attribute->set_variation( false );

					$__attributes[] = $_attribute;						
				}
			}

			$product_obj->set_attributes( $__attributes );			
		}


		// save or update the product
		$product_obj->save();

	}

	public static function get_image_id($product){

		return $product->get_image_id();	
	}

	public static function get_gallery_image_ids($product){

		return $product->get_gallery_image_ids();

	}

}
