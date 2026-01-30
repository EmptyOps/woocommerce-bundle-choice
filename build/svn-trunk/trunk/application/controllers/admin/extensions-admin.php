<?php 
/**
 *	Extensions admin class 
 *  This class handles and take care of common logic for extensions admin process 
 *  TODO publish actions in this class and process appliable logic from extension child class of this class, whenever necessary. 
 */

namespace eo\wbc\controllers\admin;

use eo\wbc\model\SP_Extension;

use eo\wbc\controllers\admin\menu\Admin_Menu_Factory;
use eo\wbc\controllers\admin\menu\Extensions_Admin_Menu;

use eo\wbc\system\bootstrap\Extensions_Setup_Wizard;

defined( 'ABSPATH' ) || exit;

class Extensions_Admin extends Admin {

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

	public static function process__( Extensions_Admin $Extensions_Admin) {

		do_action( 'spext_before_admin_process_request' );

		// TODO implement setup wizard flow as per the parameters of the extensions setup wizard class and so on 		
		// // If the setup wizard is ran then save the status.
		// if(!empty(wbc()->sanitize->get('setup_wizard_run'))) {
		// 	wbc()->options->update_option('_system','setup_wizard_run', 1);
		// }
		
		// TODO implement sample data automation flow as per the parameters of the extensions sample data automation class and so on 		
		if(false && !empty(wbc()->sanitize->get('page')) and wbc()->sanitize->get('page')=='eowbc' and ( (!empty(wbc()->sanitize->get('eo_wbc_view_auto_jewel')) and wbc()->sanitize->get('eo_wbc_view_auto_jewel') == 1) or (!empty(wbc()->sanitize->get('eo_wbc_view_auto_textile')) and wbc()->sanitize->get('eo_wbc_view_auto_textile') == 1) ) ){        	
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
			$Extensions_Admin->menu();

			// TODO implement it when setup wizard is impolemented for the extensions 
			if(false and !empty(wbc()->sanitize->get('page')) and wbc()->sanitize->get('page')=='eowbc' and !empty(wbc()->sanitize->get('wbc_setup')) ) {
	            //Setup_Wizard::instance()->init();    
	            // add_action('admin_init',function(){
					//Setup_Wizard::instance()->init();
					
					//	perform initial task 
					self::instance()->init();
					
					Setup_Wizard::instance()->build_setup_page();
				// }); 
	        }
        }        
	
		do_action( 'spext_after_admin_process_request' );
	}

	public function menu() {
		//	pass the instence of admin menu to menu factory to build it.
		$menu = new Extensions_Admin_Menu( $this->SP_Extension );

		$menu_items = $menu->get_menu();
		$menu_slugs = array();
		if(!empty($menu_items['submenu']) and is_array($menu_items['submenu'])){

			$menu_slugs = array_column($menu_items['submenu'],'slug');			
		}

		if( !empty($menu_items['slug'] ) ) {	
			$menu_slugs[]=$menu_items['slug'];
		}

		$page_slug = wbc()->sanitize->get('page');
		if(!empty($page_slug) and in_array($page_slug,$menu_slugs)){

			add_filter('sp_is_legacy_admin_page', function($status) {

				return false;
			});

			//	perform initial task 
			$this->init();
		}

		Admin_Menu_Factory::instanceForExtensions()->build_menu($menu);
	}

	public function init() {
		
		parent::init();

	}	
}
