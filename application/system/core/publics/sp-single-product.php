<?php
/*
*	SP Single Product class 
*/

namespace eo\wbc\system\core\publics;

defined( 'ABSPATH' ) || exit;

class SP_Single_Product extends Eowbc_Base_Model_Publics {

	private static $_instance = null;

	public static function instance() {
		
		throw new Exception("Sorry, singleton instance method not supported for this class. Always use construct method to create object.", 1);

		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct() {

	}

	protected function page_title(){
		if ( empty(wbc()->platform->platform_key()) ) {
            /*Hide the category Title*/
            add_filter( 'woocommerce_page_title','__return_false');
		}
	}

	protected function sidebars_widgets(){
        /*Hide sidebar and make content area full width.*/
        if(apply_filters('eowbc_filter_sidebars_widgets',true)){
            add_filter( 'sidebars_widgets',function($sidebars_widgets ) {
                return array( false );
            });
        }                
        /*End --Hide sidebar and make content area full width.*/
	}

	protected function add_to_cart_text(){
        add_filter('woocommerce_product_add_to_cart_text',function($add_to_cart_text,$product){
            return __('View','WooCommerce');
        },10,2);
	}

	private function filter_horizontal_location_action(){
		return 'woocommerce_before_shop_loop';
	}

	private function filter_vertical_location_action(){
		return 'woocommerce_sidebar';
	}

	protected function is_horizontal_filters($is_shop_cat_filter) {
		if ($is_shop_cat_filter) {
			//	TODO there doesn't seem any control at the moment for defining the horizontal or vertical style of the filter, so need enable the switch in extended admin module for shop cat filter and for now relying on the main filter module's switch 
			if( wbc()->options->get_option('filters_filter_setting','filter_setting_status','filter_setting_status') ) {
				return true;
			}
			else {
				return false;
			}
			
		}
		else {
			if( wbc()->options->get_option('filters_filter_setting','filter_setting_status','filter_setting_status') ) {
				return true;
			}
			else {
				return false;
			}

		}
	}

	protected function filter_container_location_action( $is_shop_cat_filter, $is_shortcode_filter ){
		//check if horizontal filters enabled and return action accordingly that sets the filter container on appropriate location
		if( wp_is_mobile() ) {
			return $this->filter_horizontal_location_action();
		}
		if( $is_shortcode_filter ) {
			//	just return default 
			return $this->filter_horizontal_location_action();
		}
		else {
			if( $this->is_horizontal_filters($is_shop_cat_filter) ) {
				return $this->filter_horizontal_location_action();
			}
			else {
				return $this->filter_vertical_location_action();
			}

		}
	}

	protected function loop_box_overrides( $feedObj, $extra_args = array()){
		//do nothing as there is no override in the core features except some add cart button text etc. matters for which functions defined in this class		
	}

	protected function pagination_page( $layer, $page ){
		//there is no override in the core features
	}

	protected function pagination_per_page( $layer,$per_page ){
		//there is no override in the core features
	}

	protected function no_products_found(){
		//	TODO move the implementation here from the publics category class	
	}

}
