<?php
/*
*	SP Product class 
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

	public static function createFromArray($data_array){
		$this->create();
	}

	protected static function create() {
		// TODO bind to the sample data sample product creation flow(and that should also be adhering to and following the data layer structure defs) where there is either product factory or entire function(s) to do so 

		//	TODO and extensions which needs product factory related operations are also supposed to rely on this class for such operations 

	}

	public static function get_image_id($product){

		if( wbc()->sanitize->get('is_test') == 1 ) {
			
			wbc_pr("wbc SP_Product get_image_id");
			echo "<pre>";
			debug_print_backtrace();
			echo "</pre>";
			wbc_pr("vdgfghrdg");
		}

		return $product->get_image_id();

		
	}

	public static function get_gallery_image_ids($product){

		return $product->get_gallery_image_ids();

	}

}
