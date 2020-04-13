<?php


namespace eo\wbc;
/**
 *	Plugins's main class to begin all the oprations.
 */
if (!defined('ABSPATH')) exit;



use eo\wbc\system\bootstrap\Activate;
use eo\wbc\system\bootstrap\Deactivate;
use eo\wbc\system\bootstrap\Uninstall;

use eo\wbc\controllers\Ajax_Handler;
use eo\wbc\controllers\Http_Handler;

class WooCommerce_Bundle_Choice_Bootstrap {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {			

		if((function_exists('is_ajax') and is_ajax()) or defined('WP_AJAX')) {

			if(class_exists('Ajax_Handler'))
				Ajax_Handler::process();			

		} else {			
			if(class_exists('Http_Handler'))
				echo "http_handler";
				/*die();*/
				Http_Handler::process();				
		}	
	}

	public static function activate( $network_wide ) {
		if ( ! current_user_can( 'activate_plugins' ) ) return;
		$plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
		check_admin_referer( "activate-plugin_{$plugin}" );
		Activate::instance();
	}

	public static function deactivate( $network_wide ) {
		if ( ! current_user_can( 'activate_plugins' ) ) return;
		$plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
		check_admin_referer( "deactivate-plugin_{$plugin}" );
		Deactivate::instance();
	}

	public static function uninstall( $network_wide ) {

		if ( ! current_user_can( 'activate_plugins' ) ) return;
		check_admin_referer( 'bulk-plugins' );
		if ( __FILE__ != WP_UNINSTALL_PLUGIN  ) return;
		Uninstall::instance();
	}		
}	

