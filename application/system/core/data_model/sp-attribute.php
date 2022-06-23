<?php
/*
*	SP Attribute class 
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

	public function __construct( $platform_key, $platform_name ) {

		$this->platform_key = $platform_key;
		$this->platform_name = $platform_name;
	}

	public function __construct() {
		throw new Exception("Sorry, only construct method with platform_key etc parameters is supported, so pass platform_key etc parameters as parameters to construct method. Default construct method is not supported.", 1);
	}

	public static function createFromJson(){
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}

	public static function createFromSerialized(){
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}

	public static function createFromArray(){
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
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

	public function option_terms(){

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
