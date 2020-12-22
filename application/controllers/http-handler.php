<?php 

namespace eo\wbc\controllers;
use eo\wbc\controllers\admin\menu\Admin_Menu_Factory;
use eo\wbc\controllers\admin\Admin;
use eo\wbc\controllers\Public_Handler;

use eo\wbc\controllers\visual_tools\WP_Bakery;
use eo\wbc\controllers\visual_tools\Elementor;
use eo\wbc\controllers\visual_tools\WP_Beaver;

defined( 'ABSPATH' ) || exit;

class Http_Handler {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		// no implementation
	}

	public static function process(){

		do_action( 'before_process_request', array(self::instance(),'preprocess_request') );		
		$enable_wpbakery = true;
		$enable_elementor = false;
		$enable_beaver = false;

		if($enable_wpbakery and class_exists('Vc_Manager') and defined('WPB_PLUGIN_FILE')){
			add_action('init',function(){
				WP_Bakery::instance()->init();
			});
		}

		if($enable_elementor and defined('ELEMENTOR_PLUGIN_BASE')){
			add_action('init',function(){
				Elementor::instance()->init();
			});
		}

		if($enable_beaver){
			add_action('init',function(){
				WP_Beaver::instance()->init();
			});
		}
		
		if(is_admin()){

			do_action( 'wbc_before_process_admin_request' );	
			// Process as admin request.								
			Admin::process();
			// call up request method here.
			do_action( 'wbc_after_process_admin_request' );
		} else {
			do_action( 'wbc_before_process_public_request' );			
			// Process as public request.			
			Public_Handler::process();
			// call up request method here
			do_action( 'wbc_after_process_public_request' );			
		}

		do_action( 'after_process_request', array(self::instance(),'postprocess_request') );
	}

}
