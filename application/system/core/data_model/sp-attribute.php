<?php
/*
*	SP Attribute class 
NOTE: This class will be counted janral cod related to CRUD operations and so on functions. so it means that if there is extension specific code then that need to be implemented in that specific extension class within extended from this class only, that is necessary to ensure that wbc free layer has only reliant and neat code. and devnandi extension specific classes thar my be sum aksapson lick dapii extshone has its specific different classes for handling the crowd oppressions and factor logic related to category, attribute and product and so on, and that exshapshon is assumed to be capt separate allows wish mins that dapi code will never be merged or sinked in any way with the class hierarchy and its layers.
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

	public static function createFromArray($data_array){

		throw new Exception("not implemented yet.", 1);

		self::create();
	}

	protected static function create() {
		// TODO bind to the sample data sample attribute creation flow(and that should also be adhering to and following the data layer structure defs) where there is either attribute factory or entire function(s) to do so 

		//	TODO and extensions which needs attribute factory related operations are also supposed to rely on this class for such operations 

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
