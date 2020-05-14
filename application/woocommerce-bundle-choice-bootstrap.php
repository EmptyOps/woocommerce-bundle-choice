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
			
			add_action( "wp_ajax_nopriv_eowbc_ajax",array($this,'ajax'),10);
			add_action( "wp_ajax_eowbc_ajax",array($this,'ajax'),10);

		} else {			
			/*if(class_exists('Http_Handler')){*/
				Http_Handler::process();				
			/*}*/
		}	
	}

	public function ajax(){
		if(!empty($_POST['_wpnonce']) and !empty($_POST['resolver'])) {
			
			$resolver_path = constant('EOWBC_DIRECTORY').'application/controllers/ajax/'.sanitize_text_field($_POST['resolver']).'.php';
						
			if(file_exists($resolver_path)){
				require_once $resolver_path;
			}
		}
		die();
	}

	public static function activate( $network_wide /*$network_wide hiren commented argument as that seems to be a problem as to why WP is not calling this function but anyway its not verified if it fixes the problem and works with all versions and standards so do the needful */ ) {
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

