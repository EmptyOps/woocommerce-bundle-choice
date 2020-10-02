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
		return array(
			/* Language function - comment */ 
			'ring_builder'=>__('Ring Builder','woo-bundle-choice'),
			'api_integrations'=>__('Diamond APIs Integrations','woo-bundle-choice'),
			'pair_maker'=>__('Pair Maker','woo-bundle-choice'),
			'guidance_tool'=>__('Guidance Tool','woo-bundle-choice'),
		);
	}

	public function get_bonus_features() {
		return array(		
			/* Language function - comment */	
			'filters_shortcode'=>__('Shortcode Filters','woo-bundle-choice'),
			'filters_shop_cat'=>__('Filters for Shop/Category Page','woo-bundle-choice'),
			'opts_uis_item_page'=>__('Options UI for Item Page','woo-bundle-choice'),
			'spec_view_item_page'=>__('Specifications View for Item Page','woo-bundle-choice'),
			'price_control'=>__('Price Control','woo-bundle-choice'),
		);
	}

	public function get_available_samples() {
		return array('ring_builder','pair_maker');
	}

	public function get_inventory_types() {
		return array(
			/* Language function - comment */
			'jewelry'=>__('Jewelry','woo-bundle-choice'),
			'clothing'=>__('Clothing','woo-bundle-choice'),
			'home_decor'=>__('Home Decor','woo-bundle-choice'),
			'others'=>__('Others','woo-bundle-choice')
		);
	} 

	public function get_builders() {
		return array(
			/* Language function - comment */
			'ring_builder'=>__('Ring Builder','woo-bundle-choice'),
			'pair_maker'=>__('Pair Maker','woo-bundle-choice'),
			'guidance_tool'=>__('Guidance Tool','woo-bundle-choice')
		);
	}
}
