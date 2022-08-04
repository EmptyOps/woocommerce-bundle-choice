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
							'prod_field'=>array(
								// 'post_title'=>'name',	
								array( 'legacy_key'=> 'post_title', 'map_def_key'=>'name', 'requirement'=>'mandatory' ),

								// ACTIVE_TODO sku as mandatory field so need to have array structure so that it can be easily extended whenever required, maybe something like below is simple 
								array( 'legacy_key'=> 'woo_sku', 'map_def_key'=>'sku', 'requirement'=>'mandatory' ),

								array( 'legacy_key'=> 'regular_price', 'map_def_key'=>'regular_price', 'requirement'=>'mandatory' ),

								array( 'legacy_key'=> 'sales_price', 'map_def_key'=>'sales_price', 'requirement'=>'' ),
							)
					);
			
			$prod_structure_def = apply_filters('sp_data_layer_product_structure_def', $prod_structure_def);

			return $prod_structure_def;

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

	}

}