<?php

namespace eo\wbc\system\bootstrap;
use eo\wbc\system\bootstrap\Setup_Wizard;

defined( 'ABSPATH' ) || exit;

class Activate {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}
		return self::$_instance;
	}

	private function __construct() {		
	}	

	public function run() {
		// wp_die('activate run called...');
		$this->init_options();
		$this->add_pages();
		$this->add_table();

		// commented since now being called on each page load, from admin class
		// $this->migrate();

		add_action( 'activated_plugin',function($plugin){
			if( in_array($plugin,array('woocommerce-bundle-choice/woocommerce-bundle-choice.php','woocommerce-bundle-choice/woo-bundle-choice.php','woo-bundle-choice/woocommerce-bundle-choice.php','woo-bundle-choice/woo-bundle-choice.php') ) ) {
		
				//setup wizard: check here if it's first time activate and setup wizard not ran yet then only run it		
				//wbc()->options->update_option('eo_wbc','inventory_type','');
				$eo_wbc_inventory_type = wbc()->options->get_option('_system','setup_wizard_run', false);
				if( empty($eo_wbc_inventory_type) ) {
					//add admin page
		           exit(wp_redirect( admin_url('admin.php?page=eowbc&wbc_setup=1')));            
				}		
			}			
		});
		
	}

	public function add_table() {
		/**
         * create table to store orders in a SETS form that are recived from customers
         */
        global $wpdb;
        $eo_wbc_order_map= $wpdb->prefix."eo_wbc_order_maps";
        if($wpdb->get_var( "SHOW TABLES LIKE '$eo_wbc_order_map'" ) != $eo_wbc_order_map)
        {
            $sql = "CREATE TABLE `$eo_wbc_order_map`( ";
            $sql .= "  `order_id`  int(11) NOT NULL, ";
            $sql .= "  `order_map` text NOT NULL, ";
            $sql .= "  PRIMARY KEY(`order_id`)";
            $sql .= ") ".$wpdb->get_charset_collate().";";
            require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
            dbDelta($sql);
        }
        
        /**
         * create table to store maps between product that is created by admin
         */
        $eo_wbc_cat_map= $wpdb->prefix."eo_wbc_cat_maps";
        require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
        
        if($wpdb->get_var( "show tables like '$eo_wbc_cat_map'" ) != $eo_wbc_cat_map)
        {
            $sql='';
            $sql = "CREATE TABLE `$eo_wbc_cat_map` ( ";
            $sql .= " `first_cat_id` VARCHAR(125) NOT NULL , `second_cat_id` VARCHAR(125) NOT NULL, `discount` VARCHAR(20) not null DEFAULT '0%', PRIMARY KEY (`first_cat_id`, `second_cat_id`)";
            $sql .= ") ".$wpdb->get_charset_collate().";";                        
            dbDelta($sql);            
        }
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
				if(empty(wbc()->options->get_option('configuration',$option, false))){
					wbc()->options->update_option('configuration',$option, $value);
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

            	$post_content='<div class="ui inverted segment" style="margin: auto; !important">
	                            <div class="ui active inverted fluid placeholder" style="margin: auto; !important">
	                                 <div class="rectangular">
	                                    <img src="'./*plugins_url(basename(constant('EO_WBC_PLUGIN_DIR'))*/constant('EOWBC_ASSET_URL').'/img/banner.jpg'.'"/>
	                                 </div>
	                            </div>
	                        </div>
	                        <br/><br/>
	                        <!-- wp:shortcode -->
	                            [woo-bundle-choice-btn]
	                        <!-- /wp:shortcode -->
	                        <div class="ui segment fluid" style="margin: auto; !important">
	                            <div class="ui three cards">
	                              <div class="ui inverted card">
	                                <div class="content">
	                                  <div class="ui inverted placeholder" style="margin: auto; !important">
	                                    <div class="rectangular"><img src="'./*plugins_url(basename(constant('EO_WBC_PLUGIN_DIR'))*/constant('EOWBC_ASSET_URL').'/img/diamond-sample.png'.'"/></div>
	                                  </div>
	                                </div>
	                              </div>
	                              <div class="ui inverted card">
	                                <div class="content">
	                                  <div class="ui inverted placeholder" style="margin: auto; !important">
	                                    <div class="rectangular" style="padding-bottom: 25%;"><img class="ui small image" style="height: 50%;width: 50%;margin-left: 25%;margin-top: 25%;"  src="'./*plugins_url(basename(constant('EO_WBC_PLUGIN_DIR'))*/constant('EOWBC_ASSET_URL').'/img/right-arrow-sample.png'.'"/></div>
	                                  </div>
	                                </div>
	                              </div>
	                              <div class="ui inverted card">
	                                <div class="content">
	                                  <div class="ui inverted placeholder" style="margin: auto; !important">
	                                    <div class="rectangular"><img src="'./*plugins_url(basename(constant('EO_WBC_PLUGIN_DIR'))*/constant('EOWBC_ASSET_URL').'/img/ring-sample.png'.'"/></div>
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

	public function migrate() {
		wbc()->migration->run();
	}
}
