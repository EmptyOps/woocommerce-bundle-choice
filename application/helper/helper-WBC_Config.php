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
			'ring_builder'=>eowbc_lang('Ring Builder'),
			'api_integrations'=>eowbc_lang('Diamond APIs Integrations'),
			'pair_maker'=>eowbc_lang('Pair Maker'),
			'guidance_tool'=>eowbc_lang('Guidance Tool'),
		);
	}

	public function get_bonus_features() {
		return array(			
			'filters_shortcode'=>eowbc_lang('Shortcode Filters'),
			'filters_shop_cat'=>eowbc_lang('Filters for Shop/Category Page'),
			'opts_uis_item_page'=>eowbc_lang('Options UI for Item Page'),
			'spec_view_item_page'=>eowbc_lang('Specifications View for Item Page'),
			'price_control'=>eowbc_lang('Price Control'),
		);
	}

	public function get_available_samples() {
		return array('ring_builder','pair_maker');
	}

	public function get_inventory_types() {
		return array(
			'jewelry'=>eowbc_lang('Jewelry'),
			'clothing'=>eowbc_lang('Clothing'),
			'home_decor'=>eowbc_lang('Home Decor'),
			'others'=>eowbc_lang('Others')
		);
	} 

	public function get_builders() {
		return array(
			'ring_builder'=>eowbc_lang('Ring Builder'),
			'pair_maker'=>eowbc_lang('Pair Maker'),
			'guidance_tool'=>eowbc_lang('Guidance Tool')
		);
	}
}
