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

					move to asana 
					// ACTIVE_TODO below we have commented the statement and simplified the structure of this kind of prod_structure_def, rendering dd and so on hook based structures. however if it is affecting fundamental flow or if the reusability is compromised significantly then we should give it a second thought and maybe enable below kind of layer. if nothing such thing comes up then simply mark it is as TODO by second revision. -- to h 	
					// 	INVALID 
					// 	ACTIVE_TODO there can be a solution to above point if we call this function "at last" from the below function of to_column_names then both the reusability can be ensured to optimum level as well as the other layers binding to this layer s hooks does not get affected. but anyway then if they have to do something on some specific data that is then reprocessed from here then that would be a big problem. so maybe the simplified structure of depending on if and not doing anything as default in else is good idea. 
					// 		INVALID 
					// 		ACTIVE_TODO maybe the standard and natural solution to this problem is that this function should not be called from the base function of to_column_names below and instead this function s entire layer should also be added in the add filter hook that this function should bind simply so yeah we do not need to depend on any other loading sequence to ensure that this add function s add filter hook is bound on time. 
					// 		INVALID 
								all above points are invalid now but in future we may like to take into consideration the last points above s idea of even adding filter hook binding ofor the to_column_names_schema function layer 
					$column_names[$key] = $value["type"]."__".$value["val"];
				}
			}

			return $column_names;
	    }


		public static function to_column_names($map_fields, $sp_eids=null) {

			//debug_print_backtrace();
	    	$column_names = self::to_column_names_schema($map_fields,$sp_eids/*,$column_names*/);

	    	return apply_filters('sp_data_layer_to_column_names', $column_names, $map_fields, $sp_eids);
	    }
	}

}