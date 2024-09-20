<?php


/*
*	Variations swatches ring builder Model.
*/

namespace eo\wbc\model\admin\sample_data;

defined( 'ABSPATH' ) || exit;

wbc()->load->model('admin/sample_data/eowbc_sample_data');

class Eowbc_Opts_Uis_Item_Page extends Eowbc_Sample_Data {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		$this->number_of_step = 3;
		$this->data_template = \eo\wbc\model\admin\sample_data\data_templates\Opts_Uis_Item_Page_Data_Template::instance();
		
		// -- aa shopcate ma se ringbuilder ma nathi
		// $this->tab_key_prefix='sc_';

		// -- aa shopcate ma se ringbuilder ma nathi
		// $this->form_defination=\eo\wbc\controllers\admin\menu\page\Shop_Category_Filter::instance()->get_form_definition();

		add_action('eowbc_automation_post_sample_filters',array($this,'save_configuration'),10,2);
	}

	public function save_configuration($__cat__, $__att__) {
		// -- aa shopcate ma se ringbuilder ma nathi
		// wbc()->options->update_option('filters_sc_filter_setting','sc_shop_cat_filter_location_cat','sc_shop_cat_filter_location_cat');

		// wbc()->options->update_option('filters_sc_filter_setting','shop_cat_filter_category',($__cat__['eo_diamond_shape_cat'][0].",".$__cat__['eo_setting_shape_cat'][0]));

		wbc()->options->update_option_group('filters_filter_set',serialize(array(
	    		'6085411b707ad' => array(
	    			'filter_sets_list_bulk' => '',
		            'filter_set_id' => '',
		            'filter_set_name' => 'Natural Diamond',
		            'filter_set_add_enabled' => '1',
		        ),
		        '6085412e4cc9b' => array(
		            'filter_sets_list_bulk' => '',
		            'filter_set_id' => '',
		            'filter_set_name' => 'Lab-Grown Diamond',
		            'filter_set_add_enabled' => '1',
		        )
		   	)
	    ));

		// -- Two tabs settings are not applicable to swatches
	    // wbc()->options->update_option('filters_sc_filter_setting','filter_setting_advance_two_tabs','filter_setting_advance_two_tabs');

		// wbc()->options->update_option('filters_sc_filter_setting','filter_setting_advance_first_tabs','6085411b707ad');

	    // wbc()->options->update_option('filters_sc_filter_setting','filter_setting_advance_first_category',$__cat__['eo_diamond_shape_cat'][0]);
	    
	    // wbc()->options->update_option('filters_sc_filter_setting','filter_setting_advance_second_tabs','6085412e4cc9b');

	    // wbc()->options->update_option('filters_sc_filter_setting','filter_setting_advance_second_category',$__cat__['eo_lab_diamond_shape_cat'][0]);

	}

}
