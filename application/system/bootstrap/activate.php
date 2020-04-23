<?php

defined( 'ABSPATH' ) || exit;

namespace eo\wbc\system\bootstrap;
use \eo\wbc\helper\EOWBC_Options; 

class Activate {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}
		return self::$_instance;
	}

	private function __construct() {

		$this->init_options();
		$this->add_pages();
	}	

	public function init_options() {
		$init_options = array(
							'category_count'=>2,
							'first_name'=>"",
							'first_slug'=>"",
							'first_url'=>"",
							'second_name'=>"",
							'second_slug'=>"",
							'second_url'=>"",
							'collection_name'=>"Preview",
							'review_page'=>"/eo-wbc-product-review/",
							'config_category'=>0,
							'config_map'=>0
						);
        if(!empty($init_options)) {
        	foreach ($init_options as $option=>$value) {
				if(empty(EOWBC_Options::get_option($option, false))){
					EOWBC_Options::set_option($option, $value);
				}
        	}
        	return true;
        }
        return false;
	}

	public function add_pages() {
		
		if( function_exists('get_page_by_path') ){

			if(!isset(get_page_by_path('eo-wbc-product-review')->ID)) {
				$product_review_page_id = wp_insert_post(array(
	                'post_type' => 'page',
	                'post_title' => 'Product Review',
	                'post_name'=>'eo-wbc-product-review',
	                'post_content' => '',
	                'post_status' => 'publish',
	                'post_author' => get_current_user_id(),
	            ));

	            if(!empty($product_review_page_id)){
	                update_post_meta($product_review_page_id, '_wp_page_template','');
	            }
			}
            
            if( !isset(get_page_by_path('design-your-own-ring')->ID) ) {

            	$post_content='<div class="ui inverted segment">
	                            <div class="ui active inverted fluid placeholder">
	                                 <div class="rectangular">
	                                    <img src="'.plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/asset/banner.jpg').'"/>
	                                 </div>
	                            </div>
	                        </div>
	                        <br/><br/>
	                        <!-- wp:shortcode -->
	                            [woo-bundle-choice-btn]
	                        <!-- /wp:shortcode -->
	                        <div class="ui segment fluid">
	                            <div class="ui three cards">
	                              <div class="ui inverted card">
	                                <div class="content">
	                                  <div class="ui inverted placeholder">
	                                    <div class="rectangular"><img src="'.plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/asset/diamond-sample.png').'"/></div>
	                                  </div>
	                                </div>
	                              </div>
	                              <div class="ui inverted card">
	                                <div class="content">
	                                  <div class="ui inverted placeholder">
	                                    <div class="rectangular" style="padding-bottom: 25%;"><img class="ui small image" style="height: 50%;width: 50%;margin-left: 25%;margin-top: 25%;"  src="'.plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/asset/right-arrow-sample.png').'"/></div>
	                                  </div>
	                                </div>
	                              </div>
	                              <div class="ui inverted card">
	                                <div class="content">
	                                  <div class="ui inverted placeholder">
	                                    <div class="rectangular"><img src="'.plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/asset/ring-sample.png').'"/></div>
	                                  </div>
	                                </div>
	                              </div>
	                            </div>
	                        </div>';

	            $home_sample_post_id = wp_insert_post(array(
	                'post_type' => 'page',
	                'post_title' => 'Design your own ring',
	                'post_name'=>'design-your-own-ring',
	                'post_content' =>$post_content,

	                'post_status' => 'publish',
	                'post_author' => get_current_user_id(),
	            ));

	            if(!empty($home_sample_post_id)){
	                update_post_meta($home_sample_post_id, '_wp_page_template','');
	            }            
            }
            
        }        
	}
}
