<?php
/*
*	WBC Data Layer class 
*/

namespace eo\wbc\model\data_model;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\data_model\SP_Data_Layer;

if( !class_exists('\\eo\wbc\model\data_model\SP_WBC_Data_Layer') ) {

	class SP_WBC_Data_Layer extends SP_Data_Layer {

		private static $_instance = null;

		public static function instance() {

			throw new Exception("Sorry, singleton instance method not supported for this class. Always use construct method to create object.", 1);
		}

		public function __construct() {
			//"Sorry, only construct method with platform_key etc parameters is supported, so pass platform_key etc parameters as parameters to construct method. Default construct method is not supported."
			throw new Exception("This is particularly a definition class, so creating instance would never be necessary but if it ever becomes necessary then construct will be supported to create object.", 1);
		}

		/**
		 *	Category structure definition
		 */
		public static function cat_structure_def(){
			return array(
				'mandatory'=> array(

				), 
				'optional'=> array(

				)
			);
		}

		/**
		 *	Product structure definition
		 */
		public static function prod_structure_def(){

			$prod_structure_def = array( 
							'prod_cat'=>array(

							), 
							'attr'=>array(

							),
							'variation'=>array(
								array( 'legacy_key'=> 'meta', 'map_def_key'=>'meta', 'meta_key'=>'sp_variations_data need to confirm exact key', 'requirement'=>'' )
							),
						);
			
			return apply_filters('sp_data_layer_product_structure_def', $prod_structure_def);

			

		}

		public static function prod_structure_def_rendering_dd($args = array()) {

			$dropdown_options = array();

			$dropdown_options = apply_filters('sp_data_layer_prod_structure_def_rendering_dd', $dropdown_options, $args);

			// NOTE: prod_structure_def function should be called and of use to those which supports entire loop and so on. like dapii, tableview and so on. 
			$prod_structure_def = self::prod_structure_def();

			foreach($prod_structure_def as $type => $val) {

				if( $type == 'prod_cat' ) {

					if(empty($args['filter_by']) || !empty($args['filter_by']['prod_cat']) ) {

		            	$dropdown_options = array_replace($dropdown_options, wbc()->wc->get_productCats('', 'detailed'));

		            }

	            } elseif( $type == 'attr' ) {

	            	if(empty($args['filter_by']) || !empty($args['filter_by']['attr']) ) {

		            	$dropdown_options = array_replace($dropdown_options, wbc()->wc->get_productAttributes(/*'detailed'*/  apply_filters(/*'sp_dapii_data_mapping_general_fields'*/'sp_dapii_data_mapping_attribute_field_format','detailed') ));

		            }
		        }
			}

			return $dropdown_options;

		}

		/**
		 *	Attribute structure definition
		 */
		public static function attr_structure_def(){
			return array(
				'mandatory'=> array(

				), 
				'optional'=> array(

				)
			);
		}

	    public static function to_column_names_schema($map_fields, $sp_eids=null, $column_names = array()) {
	
			foreach ($sp_eids as $key => $value) {
				
				if( $value["type"] == "variations" && $value["val"] == "meta" ) {
					$column_names[$key] = $value["type"]."__".$value["val"]."__".$key;
				}
				else {

					$column_names[$key] = $value["type"]."__".$value["val"];
				}
			}

			return $column_names;
	    }


		public static function to_column_names($map_fields, $sp_eids=null) {

			if(wbc()->sanitize->get('is_test') == 1) {
			
				wbc_pr("SP_WBC_Data_Layer to_column_names 11");
			}

			//debug_print_backtrace();
	    	$column_names = self::to_column_names_schema($map_fields,$sp_eids/*,$column_names*/);

	    	return apply_filters('sp_data_layer_to_column_names', $column_names, $map_fields, $sp_eids);
	    }
	}

}