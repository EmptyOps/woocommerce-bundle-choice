<?php


/*
*	Sample data ring builder Model.
*/

namespace eo\wbc\model\admin\sample_data;

defined( 'ABSPATH' ) || exit;

wbc()->load->model('admin/sample_data/eowbc_sample_data');

class Eowbc_Filters_Shop_Cat extends Eowbc_Sample_Data {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		$this->number_of_step = 3;
		$this->data_template = \eo\wbc\model\admin\sample_data\data_templates\Filters_Shop_Cat_Data_Template::instance();
		$this->tab_key_prefix='sc_';

		$this->form_defination=\eo\wbc\controllers\admin\menu\page\Shop_Category_Filter::instance()->get_form_definition();

		add_action('eowbc_automation_post_sample_filters',array($this,'save_configuration'),10,2);
	}

	public function save_configuration($__cat__, $__att__) {
		wbc()->options->update_option('filters_sc_filter_setting','sc_shop_cat_filter_location_cat','sc_shop_cat_filter_location_cat');

		wbc()->options->update_option('filters_sc_filter_setting','shop_cat_filter_category',($__cat__['eo_diamond_shape_cat'][0].",".$__cat__['eo_setting_shape_cat'][0]));

	}

}
