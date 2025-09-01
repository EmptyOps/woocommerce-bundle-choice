<?php
/**
 *	Extensions bootstrap class 
 *  This class handles and take care of common logic for extensions bootstrap process 
 *  TODO publish actions in this class and process appliable logic from extension child class of this class, whenever necessary. 
 */


namespace eo\wbc;
if (!defined('ABSPATH')) exit;

use eo\wbc\model\SP_Extension;

use eo\wbc\system\bootstrap\Extensions_Activate;
use eo\wbc\system\bootstrap\Extensions_Deactivate;
use eo\wbc\system\bootstrap\Extensions_Uninstall;

// use eo\wbc\controllers\Ajax_Handler;
use eo\wbc\controllers\Extensions_Http_Handler;

class SP_Extensions_Bootstrap {

	private static $_instance = null;

	private $SP_Extension = null;

	public static function instance() {

		throw new Exception("Sorry, singleton instance method not supported for this class. Always use construct method to create object.", 1);
		
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct( SP_Extension $SP_Extension ) {

		if( empty($SP_Extension) ) {
			throw new Exception("Sorry, only construct method with SP_Extension class object are supported, so pass SP_Extension object as parameter to construct method. Default construct method is not supported.", 1);
		}

		$this->SP_Extension = $SP_Extension;
	}

	public function run() {

		add_action( 'init', function() {
			
			$this->migrate();
		}, 999 );

	if( wbc()->sanitize->get('is_test') == 1 ) {

		wbc_pr("SP_Extensions_Bootstrap run1");	 
	}
		//TODO implement below hooks for extensions when necessary
		// add_filter( 'widget_text', 'do_shortcode' );
		// add_action('created_term', array(\eo\wbc\controllers\admin\Term_Meta::instance(),'save_terms'), 10, 3);
		// add_action('edit_term', array(\eo\wbc\controllers\admin\Term_Meta::instance(),'save_terms'), 10, 3);

		// add_action('woocommerce_attribute_added', array(\eo\wbc\controllers\admin\Term_Meta::instance(),'save_taxonomy_form'), 10,2);
		// add_action('woocommerce_attribute_updated', array(\eo\wbc\controllers\admin\Term_Meta::instance(),'save_taxonomy_form'), 10, 2);

		
		//TODO implement below hooks for extensions when necessary
		// //Add form to the attribute page
  //   	if(!empty(wbc()->sanitize->get('post_type')) and wbc()->sanitize->get('post_type')=='product' and !empty(wbc()->sanitize->get('page')) and wbc()->sanitize->get('page')=='product_attributes'){

  //   		\eo\wbc\controllers\admin\Term_Meta::instance()->add_taxonomy_type();
    		
  //   	} elseif ( !empty(wbc()->sanitize->get('post_type')) and wbc()->sanitize->get('post_type')=='product' and !empty(wbc()->sanitize->get('taxonomy')) and strpos(wbc()->sanitize->get('taxonomy'), 'pa_')!==false ) {
    		
  //   		\eo\wbc\controllers\admin\Term_Meta::instance()->add_attrubute_term_form(wbc()->sanitize->get('taxonomy'));    		

  //   	} elseif (!empty(wbc()->sanitize->get('post_type')) and wbc()->sanitize->get('post_type')=='product' and !empty(wbc()->sanitize->get('taxonomy'))) {
  //   		\eo\wbc\controllers\admin\Category_Meta::instance()->add_category_term_form(wbc()->sanitize->get('taxonomy'));
  //   	}

		//TODO implement below hooks for extensions when necessary
    	// // call in builder tools
    	// $this->visual_composer();

		if((function_exists('is_ajax') and is_ajax()) or defined('WP_AJAX')) {
			
			if( wbc()->sanitize->get('is_test') == 1 ) {

				wbc_pr("SP_Extensions_Bootstrap run2");	 
			}
			//TODO implement below hooks for extensions when necessary
			// add_action( "wp_ajax_nopriv_eowbc_ajax",array($this,'ajax'),10);
			// add_action( "wp_ajax_eowbc_ajax",array($this,'ajax'),10);

		} else {	
			
			if( wbc()->sanitize->get('is_test') == 1 ) {

				wbc_pr("SP_Extensions_Bootstrap run3");	 
			}
			// system core
			$this->system_core();

			/*if(class_exists('Http_Handler')){*/
				$Extensions_Http_Handler = new Extensions_Http_Handler( $this->SP_Extension );
				Extensions_Http_Handler::process__($Extensions_Http_Handler);				
			/*}*/
		}	
	}

	public function visual_composer(){
		///////////////////////////////////////////////////
		$enable_wpbakery = true;
		$enable_elementor = false;
		$enable_beaver = false;
		
		if($enable_wpbakery and class_exists('Vc_Manager') and defined('WPB_PLUGIN_FILE')){
			/*add_action('init',function(){*/
				\eo\wbc\controllers\visual_tools\WP_Bakery::instance()->system_init();
			/*});*/
		}

		if($enable_elementor and defined('ELEMENTOR_PLUGIN_BASE')){
			/*add_action('init',function(){*/
				\eo\wbc\controllers\visual_tools\Elementor::instance()->system_init();
			/*});*/
		}

		if($enable_beaver){
			/*add_action('init',function(){*/
				\eo\wbc\controllers\visual_tools\WP_Beaver::instance()->system_init();
			/*});*/
		}
		///////////////////////////////////////////////////
	}

	public function ajax(){

		if(!empty(wbc()->sanitize->post('email_header_template')) and !empty(wbc()->sanitize->post('email_body_template'))) {
			require_once constant('EOWBC_DIRECTORY').'application/controllers/ajax/common_email_handler.php';
			
		} elseif(!empty(wbc()->sanitize->post('_wpnonce')) and !empty(wbc()->sanitize->post('resolver'))) {	

			$resolver_path = constant('EOWBC_DIRECTORY').'application/controllers/ajax/'.sanitize_text_field(wbc()->sanitize->post('resolver')).'.php';				
			if(!empty(wbc()->sanitize->post('resolver_path'))){
				$resolver_path =wbc()->sanitize->post('resolver_path');
			}		
			if(file_exists($resolver_path)){
				require_once $resolver_path;
			} else {
				echo false;
			}
		}
		die();
	}

	private function system_core(){
	
		//	core loaders
		//
		if( method_exists($this->SP_Extension->singleton_function()(), 'system_core_loader') ) {
			$this->SP_Extension->singleton_function()()->system_core_loader();
		}

		//	core init 
		//
		if( method_exists($this->SP_Extension->singleton_function()(), 'system_core_init') ) {
			
			$this->SP_Extension->singleton_function()()->system_core_init();
		}

	}

	public static function safe_load() {
		wbc()->define_constants();			
		wbc()->load_tools();	
		wbc()->load_helpers();
		wbc()->load_library();
	}

	public static function activate( $network_wide /*$network_wide hiren commented argument as that seems to be a problem as to why WP is not calling this function but anyway its not verified if it fixes the problem and works with all versions and standards so do the needful */ ) {			

		if ( ! current_user_can( 'activate_plugins' ) ) return;
		self::safe_load();
		$plugin = isset( $_REQUEST['plugin'] ) ? sanitize_text_field($_REQUEST['plugin']) : '';
		check_admin_referer( "activate-plugin_{$plugin}" );
		(new Extensions_Activate( new SP_Extension( $plugin ) ))->run();
	}

	public static function deactivate( $network_wide ) {
		//TODO auto loader should take care of it, if not then instead load it using the wbc loader instead of using direct require once
		// if(!class_exists('eo\wbc\system\bootstrap\Activate')){
		// 	require_once plugin_dir_path( __FILE__ ).'system/bootstrap/deactivate.php';
		// }

		if ( ! current_user_can( 'activate_plugins' ) ) return;
		self::safe_load();
		$plugin = isset( $_REQUEST['plugin'] ) ? sanitize_text_field($_REQUEST['plugin']) : '';
		check_admin_referer( "deactivate-plugin_{$plugin}" );
		(new Extensions_Deactivate( new SP_Extension( $plugin ) ))->run();
	}

	public static function uninstall( $network_wide ) {
		//TODO auto loader should take care of it, if not then instead load it using the wbc loader instead of using direct require once
		// if(!class_exists('eo\wbc\system\bootstrap\Activate')){
		// 	require_once plugin_dir_path( __FILE__ ).'system/bootstrap/uninstall.php';
		// }

		if ( ! current_user_can( 'activate_plugins' ) ) return;
		check_admin_referer( 'bulk-plugins' );
		if ( __FILE__ != WP_UNINSTALL_PLUGIN  ) return;
		self::safe_load();
		(new Extensions_Uninstall( new SP_Extension( $plugin ) ))->run();
	}	

	public function migrate() {
		//TODO implement migration for extensions when necessary
		// wbc()->migration->run();
	}

}	

