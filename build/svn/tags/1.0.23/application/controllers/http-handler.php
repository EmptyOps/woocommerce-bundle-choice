<?php 

namespace eo\wbc\controllers;
use eo\wbc\controllers\admin\menu\Admin_Menu_Factory;
use eo\wbc\controllers\admin\Admin;
use eo\wbc\controllers\Public_Handler;

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
