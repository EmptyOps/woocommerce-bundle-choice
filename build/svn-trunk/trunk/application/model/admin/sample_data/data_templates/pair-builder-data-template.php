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

    private $first_icon = 'first_icon.png';
    private $second_icon = 'second_icon.png';
    private $preview_icon = 'preview_icon.png';

	private function __construct() {
	}

    public function set_configs_after_categories($catat_category,$feature_key = 'ring_builder') {

        if( (($feature_key==='ring_builder' and wbc()->sanitize->post('feature_key')!=='ring_builder') OR empty($feature_key) ) AND !empty(wbc()->sanitize->post('feature_key')) )  {
            $feature_key = wbc()->sanitize->post('feature_key');
        }

        if($feature_key === 'ring_builder'){
            $feature_key = '';
        } else {
            $feature_key = $feature_key.'_';
        }

        $_img_url= constant('EOWBC_ASSET_URL').'img/sample_data/'.$this->asset_folder.'/';
        $sample_data_instance = \eo\wbc\model\admin\sample_data\Eowbc_Sample_Data::instance();


        // update_option('eo_wbc_first_name','Diamond Shape');//FIRST : NAME
        wbc()->options->update_option('configuration',$feature_key.'first_name',$catat_category[0]['id']/*'Diamond Shape'*/);
        // update_option('eo_wbc_first_slug','eo_diamond_shape_cat');//FIRST : SLUG
        wbc()->options->update_option('configuration',$feature_key.'first_slug',$catat_category[0]['slug']/*'eo_diamond_shape_cat'*/);
        // update_option('eo_wbc_first_url','/product-category/eo_diamond_shape_cat/');//FIRST : NAME

        $category_base = wbc()->wc->wc_permalink('category_base');

        wbc()->options->update_option('configuration',$feature_key.'first_url',"/{$category_base}/".$catat_category[0]['slug'].'/');

        $first_icon = $sample_data_instance->add_image_gallary($_img_url.$this->first_icon);
        
        if(!empty($first_icon)){
            wbc()->options->update_option('configuration',$feature_key.'first_icon',$first_icon);
        }

        
        // update_option('eo_wbc_second_name','Setting Shape');//SECOND : NAME
        wbc()->options->update_option('configuration',$feature_key.'second_name',$catat_category[1]['id']/*'Setting Shape'*/);
        // update_option('eo_wbc_second_slug','eo_setting_shape_cat');//SECOND : SLUG
        wbc()->options->update_option('configuration',$feature_key.'second_slug',$catat_category[1]['slug']/*'eo_setting_shape_cat'*/);
        // update_option('eo_wbc_second_url','/product-category/eo_setting_shape_cat/');//SECOND : URL   
        wbc()->options->update_option('configuration',$feature_key.'second_url',"/{$category_base}/".$catat_category[1]['slug'].'/');

        $second_icon = $sample_data_instance->add_image_gallary($_img_url.$this->second_icon);

        if(!empty($second_icon)){
            wbc()->options->update_option('configuration',$feature_key.'second_icon',$second_icon);
        }


        wbc()->options->update_option('configuration',$feature_key.'preview_name','Preview');    
        $preview_icon = $sample_data_instance->add_image_gallary($_img_url.$this->preview_icon);
        if(!empty($preview_icon)){
            wbc()->options->update_option('configuration',$feature_key.'preview_icon',$preview_icon);
        }

        // update_option('eo_wbc_config_category',1);
        wbc()->options->update_option('configuration',$feature_key.'config_category',1);
        // update_option('eo_wbc_config_map',1);    
        wbc()->options->update_option('configuration',$feature_key.'config_map',1);
        // update_option('eo_wbc_btn_setting','0');
        wbc()->options->update_option('configuration',$feature_key.'buttons_page','0');  //set('eo_wbc_btn_setting','0');
        // update_option('eo_wbc_btn_position','begining');
        wbc()->options->set('eo_wbc_btn_position','begining');              //TODO I think its DEPRECATED starting from DP update. remove it if its no loger used. 
    }

    public function set_configs_after_attributes() {

        wbc()->options->update_option('filters_filter_setting','filter_setting_status','filter_setting_status');
    }

}
