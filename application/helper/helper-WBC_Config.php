<?php 
defined( 'ABSPATH' ) || exit;

class WBC_Config {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function get_all_feature() {
		return array_replace($this->get_features(),$this->get_bonus_features());
	}

	public function get_features() {
		return apply_filters('sp_wbc_features',array(
			'ring_builder'=>'Ring Builder',
			'api_integrations'=>'Diamond APIs Integrations',
			'pair_maker'=>'Pair Maker',
			'guidance_tool'=>'Guidance Tool',
		));
	}

	public function get_bonus_features() {
		return array(			
			'filters_shortcode'=>'Shortcode Filters',
			'filters_shop_cat'=>'Filters for Shop/Category Page',
			'opts_uis_item_page'=>'Options UI for Item Page',
			'spec_view_item_page'=>'Specifications View for Item Page',
			'price_control'=>'Price Control',
		);
	}

	public function get_available_samples() {
		return array('ring_builder','pair_maker','filters_shop_cat');
	}

	public function get_inventory_types() {
		return array(
			'jewelry'=>'Jewelry',
			'clothing'=>'Clothing',
			'home_decor'=>'Home Decor',
			'others'=>'Others'
		);
	} 

	public function get_builders() {
		return array(
			'ring_builder'=>'Ring Builder',
			'pair_maker'=>'Pair Maker',
			'guidance_tool'=>'Guidance Tool',
			'filters_shop_cat'=>'Shop/Category Page'
		);
	}
}
