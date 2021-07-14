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
		// No implementation for safty.
	}

	public function run() {
		
		add_action( 'init', function() {
			$this->migrate();
		}, 999 );


		add_filter( 'widget_text', 'do_shortcode' );
		add_action('created_term', array(\eo\wbc\controllers\admin\Term_Meta::instance(),'save_terms'), 10, 3);
		add_action('edit_term', array(\eo\wbc\controllers\admin\Term_Meta::instance(),'save_terms'), 10, 3);

		add_action('woocommerce_attribute_added', array(\eo\wbc\controllers\admin\Term_Meta::instance(),'save_taxonomy_form'), 10,2);
		add_action('woocommerce_attribute_updated', array(\eo\wbc\controllers\admin\Term_Meta::instance(),'save_taxonomy_form'), 10, 2);

		
		
		//Add form to the attribute page
    	if(!empty(wbc()->sanitize->get('post_type')) and wbc()->sanitize->get('post_type')=='product' and !empty(wbc()->sanitize->get('page')) and wbc()->sanitize->get('page')=='product_attributes'){

    		\eo\wbc\controllers\admin\Term_Meta::instance()->add_taxonomy_type();
    		
    	} elseif ( !empty(wbc()->sanitize->get('post_type')) and wbc()->sanitize->get('post_type')=='product' and !empty(wbc()->sanitize->get('taxonomy')) and strpos(wbc()->sanitize->get('taxonomy'), 'pa_')!==false ) {
    		
    		\eo\wbc\controllers\admin\Term_Meta::instance()->add_attrubute_term_form(wbc()->sanitize->get('taxonomy'));    		

    	} elseif (!empty(wbc()->sanitize->get('post_type')) and wbc()->sanitize->get('post_type')=='product' and !empty(wbc()->sanitize->get('taxonomy'))) {
    		\eo\wbc\controllers\admin\Category_Meta::instance()->add_category_term_form(wbc()->sanitize->get('taxonomy'));
    	}

    	// call in builder tools
    	$this->visual_composer();

		if((function_exists('is_ajax') and is_ajax()) or defined('WP_AJAX')) {
			
			add_action( "wp_ajax_nopriv_eowbc_ajax",array($this,'ajax'),10);
			add_action( "wp_ajax_eowbc_ajax",array($this,'ajax'),10);

		} else {			
			/*if(class_exists('Http_Handler')){*/
				Http_Handler::process();				
			/*}*/

			if(!empty(wbc()->sanitize->get('eo_wbc_filter'))) {
				\eo\wbc\controllers\ajax\Filter::instance()->filter();				
			}
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
		Activate::instance()->run();
	}

	public static function deactivate( $network_wide ) {
		if(!class_exists('eo\wbc\system\bootstrap\Activate')){
			require_once plugin_dir_path( __FILE__ ).'system/bootstrap/deactivate.php';
		}
		if ( ! current_user_can( 'activate_plugins' ) ) return;
		self::safe_load();
		$plugin = isset( $_REQUEST['plugin'] ) ? sanitize_text_field($_REQUEST['plugin']) : '';
		check_admin_referer( "deactivate-plugin_{$plugin}" );
		Deactivate::instance()->run();
	}

	public static function uninstall( $network_wide ) {
		if(!class_exists('eo\wbc\system\bootstrap\Activate')){
			require_once plugin_dir_path( __FILE__ ).'system/bootstrap/uninstall.php';
		}
		if ( ! current_user_can( 'activate_plugins' ) ) return;
		check_admin_referer( 'bulk-plugins' );
		if ( __FILE__ != WP_UNINSTALL_PLUGIN  ) return;
		self::safe_load();
		Uninstall::instance()->run();
	}	

	public function migrate() {
		wbc()->migration->run();
	}

}	

