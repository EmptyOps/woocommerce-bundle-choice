<?php 

namespace eo\wbc\controllers\admin;
use eo\wbc\controllers\admin\menu\Admin_Menu_Factory;
use eo\wbc\controllers\admin\menu\Admin_Menu;

use eo\wbc\system\bootstrap\Setup_Wizard;

defined( 'ABSPATH' ) || exit;

class Admin {

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

		do_action( 'wbc_before_admin_process_request' );		
		
		//	perform initial task
		self::instance()->init();

		if(!empty(wbc()->sanitize->get('page')) and wbc()->sanitize->get('page')=='eowbc' and ( (!empty(wbc()->sanitize->get('eo_wbc_view_auto_jewel')) and wbc()->sanitize->get('eo_wbc_view_auto_jewel') == 1) or (!empty(wbc()->sanitize->get('eo_wbc_view_auto_textile')) and wbc()->sanitize->get('eo_wbc_view_auto_textile') == 1) ) ){        	
        	if( isset($_GET['eo_wbc_view_auto_jewel']) && wbc()->sanitize->get('eo_wbc_view_auto_jewel') == 1 ) {
        		// apply_filters('eo_wbc_admin_sample_data_add_jewelry',array(\eo\wbc\controllers\admin\sample_data\Jewelry::instance(),'init'));	
        		\eo\wbc\controllers\admin\sample_data\Jewelry::instance()->init();
        	}
        } else {
        	//	show/render menu and pages
			self::instance()->menu();

			if(!empty(wbc()->sanitize->get('page')) and wbc()->sanitize->get('page')=='eowbc' and !empty(wbc()->sanitize->get('wbc_setup')) ) {
	            //Setup_Wizard::instance()->init();    
	            // add_action('admin_init',function(){
					//Setup_Wizard::instance()->init();
					
					Setup_Wizard::instance()->build_setup_page();
				// }); 
	        }
        }        

        //Initiate Orders Page
        \eo\wbc\controllers\admin\orders\Orders::instance()->init(); 
	
		do_action( 'wbc_after_admin_process_request' );
	}

	public function menu() {
		//	pass the instence of admin menu to menu factory to build it.
		$menu = Admin_Menu::instance();
		Admin_Menu_Factory::instance()->build_menu($menu);
	}

	public function init() {

		add_action('admin_init',function(){

			do_action( 'eowbc_save_settings' );
			//	admin side init actions.
			//	save admin form's data at init as some taxonomy are registered at this hook.
			add_action( 'admin_enqueue_scripts',function(){
				wp_register_style('eowbc_fomantic_css',constant('EOWBC_ASSET_URL').'css/fomantic/semantic.min.css');
				wp_enqueue_style('eowbc_fomantic_css');

				wp_register_style('eowbc_admin_css',constant('EOWBC_ASSET_URL').'css/admin-css.css');
				wp_enqueue_style('eowbc_admin_css');

				wp_register_script('eowbc_fomantic_js',constant('EOWBC_ASSET_URL').'js/fomantic/semantic.min.js');
				wp_enqueue_script('eowbc_fomantic_js');

				wp_register_script('eowbc_admin_js',constant('EOWBC_ASSET_URL').'js/admin-js.js');
				
				wp_localize_script(
                    'eowbc_admin_js',
                    'eowbc_object',
                    array('admin_url'=>admin_url( 'admin-ajax.php'))
                );            
                wp_enqueue_script('eowbc_admin_js');
			}, 10 );
			wp_enqueue_media();
		});
	}	
}
