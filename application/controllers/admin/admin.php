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

		//Hook to update product prices as per the price control feature on the product update feature.		
		$bonus_features = array_filter(unserialize(wbc()->options->get_option('setting_status_setting_status_setting','bonus_features',serialize(array()))));
        if(!empty($bonus_features['price_control'])){
            wbc()->load->model('admin/eowbc_price_control_save_update_prices');
			add_action( 'save_post',array(\eo\wbc\model\admin\Eowbc_Price_Control_Save_Update_Prices::instance(),'update_prices'),10,3);
        }
		
		// If the setup wizard is ran then save the status.
		if(!empty(wbc()->sanitize->get('setup_wizard_run'))) {
			wbc()->options->update_option('_system','setup_wizard_run', 1);
		}
		
		if(!empty(wbc()->sanitize->get('page')) and wbc()->sanitize->get('page')=='eowbc' and ( (!empty(wbc()->sanitize->get('eo_wbc_view_auto_jewel')) and wbc()->sanitize->get('eo_wbc_view_auto_jewel') == 1) or (!empty(wbc()->sanitize->get('eo_wbc_view_auto_textile')) and wbc()->sanitize->get('eo_wbc_view_auto_textile') == 1) ) ){        	
        	if( isset($_GET['eo_wbc_view_auto_jewel']) && wbc()->sanitize->get('eo_wbc_view_auto_jewel') == 1 ) {

        		//	perform initial task
				self::instance()->init();

				if( !empty(wbc()->sanitize->get('f')) ) {

					$enabled_features = explode(",", wbc()->sanitize->get('f'));

	        		// // apply_filters('eo_wbc_admin_sample_data_add_jewelry',array(\eo\wbc\controllers\admin\sample_data\Jewelry::instance(),'init'));	
	        		// \eo\wbc\controllers\admin\sample_data\Jewelry::instance()->init();
	        		// TODO here we need to clean and accurate session management to call the second feature's sample data process after the first is done in case there are more than one feature enabled or simply we can do url management to pass the remaining features in a get param. -- We must do this when add sample data for features that can be enabled together.

					do_action('wbc_auto_sample_class');					

	        		foreach ($enabled_features as $efk => $efv) {
	        			if( in_array($efv, wbc()->config->get_available_samples()) ) {
		        			$class = str_replace(" ", "_", ucwords( str_replace("_", " ", $efv) ) );
		        			$class = '\\eo\\wbc\\controllers\\admin\\sample_data\\' . $class;
		        			
	        				if( class_exists($class) ) {
		        				$class::instance()->init();	
		        				break;
	        				}
	        			}
	        		}
				}
        		
        	}
        } else {

        	//	show/render menu and pages
			self::instance()->menu();

			if(!empty(wbc()->sanitize->get('page')) and wbc()->sanitize->get('page')=='eowbc' and !empty(wbc()->sanitize->get('wbc_setup')) ) {
	            //Setup_Wizard::instance()->init();    
	            // add_action('admin_init',function(){
					//Setup_Wizard::instance()->init();
					
					//	perform initial task 
					self::instance()->init();
					
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

		$menu_items = $menu->get_menu();
		$menu_slugs = array();
		if(!empty($menu_items['submenu']) and is_array($menu_items['submenu'])){

			$menu_slugs = array_column($menu_items['submenu'],'slug');			
		}
		$menu_slugs[]=$menu_items['slug'];
		$page_slug = wbc()->sanitize->get('page');
		if(!empty($page_slug) and in_array($page_slug,$menu_slugs)){

			//	perform initial task 
			self::instance()->init();
		}

		Admin_Menu_Factory::instance()->build_menu($menu);
	}

	public function init() {
		
		if(wp_doing_ajax()){
			return;
		}

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

                if(wbc()->sanitize->get('action')!=='elementor') {
					if(!did_action( 'wp_enqueue_media' )){
						wp_enqueue_media();	
					}
				}

			}, 10 );
			
		});
	}	
}
