<?php


/*
*	pair builder template for Sample data.
*/

namespace eo\wbc\model\admin\sample_data\data_templates;

defined( 'ABSPATH' ) || exit;

class Pair_Builder_Data_Template extends Sample_Data_Template {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

    public function set_configs_after_categories($catat_category) {

        // update_option('eo_wbc_first_name','Diamond Shape');//FIRST : NAME
        wbc()->options->update_option('configuration','first_name',$catat_category[0]['id']/*'Diamond Shape'*/);
        // update_option('eo_wbc_first_slug','eo_diamond_shape_cat');//FIRST : SLUG
        wbc()->options->update_option('configuration','first_slug',$catat_category[0]['slug']/*'eo_diamond_shape_cat'*/);
        // update_option('eo_wbc_first_url','/product-category/eo_diamond_shape_cat/');//FIRST : NAME
        wbc()->options->update_option('configuration','first_url','/product-category/eo_diamond_shape_cat/');
        
        // update_option('eo_wbc_second_name','Setting Shape');//SECOND : NAME
        wbc()->options->update_option('configuration','second_name',$catat_category[1]['id']/*'Setting Shape'*/);
        // update_option('eo_wbc_second_slug','eo_setting_shape_cat');//SECOND : SLUG
        wbc()->options->update_option('configuration','second_slug',$catat_category[1]['slug']/*'eo_setting_shape_cat'*/);
        // update_option('eo_wbc_second_url','/product-category/eo_setting_shape_cat/');//SECOND : URL   
        wbc()->options->update_option('configuration','second_url','/product-category/eo_setting_shape_cat/');

        // update_option('eo_wbc_config_category',1);
        wbc()->options->update_option('configuration','config_category',1);
        // update_option('eo_wbc_config_map',1);    
        wbc()->options->update_option('configuration','config_map',1);
        // update_option('eo_wbc_btn_setting','0');
        wbc()->options->update_option('configuration','buttons_page','0');  //set('eo_wbc_btn_setting','0');
        // update_option('eo_wbc_btn_position','begining');
        wbc()->options->set('eo_wbc_btn_position','begining');              //TODO I think its DEPRECATED starting from DP update. remove it if its no loger used. 

    }

    public function set_configs_after_attributes() {

        wbc()->options->update_option('filters_filter_setting','filter_setting_status','filter_setting_status');
    }

}
