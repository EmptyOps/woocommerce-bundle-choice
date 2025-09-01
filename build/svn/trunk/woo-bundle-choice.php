<?php
// return false;
/**
 *
 * @link https://wordpress.org/plugins/woo-bundle-choice/
 * @since 1.0.0
 * @package woo-bundle-choice
 *
 * @wordpress-plugin
 * Plugin Name: BUNDLOICE (formerly Woo Choice Plugin) | Ring Builder | Loose Diamond Search Pages - Variation Swatches - Pair Maker | Guidance Tool
 * Plugin URI: https://wordpress.org/plugins/woo-bundle-choice/
 * Description: Product bundling as ring builder for jewelry, pair maker for clothing and guidance tool for home decor, cosmetics etc. Product bundling as per user's choice.
 * Version: 1.0.24
 * Author: Sphere Plugins
 * Author URI: https://sphereplugins.com/
 * License: GPLv3+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: woo-bundle-choice
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) exit;

//load autoloader file
//load error detection and handler class

if(!class_exists('Woo_Bundle_Choice') ) {

	class Woo_Bundle_Choice {

		private static $_instance = null;

		public static function instance() {
			if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;
			}
 
			return self::$_instance;
		}

		private function __construct() {			
			//do nothing, construct_init will be called from plugins_loaded hook
		}

		public function construct_init() {			
			// define constant before our work bwgins.
			$this->define_constants();
			// load neccesary tools.
			$this->load_tools();			
			// load helper functions.
			$this->load_helpers();
			// load library.
			$this->load_library();		

			// explcit class loader. call it if the settings are defined in the config file. 
			if( property_exists($this, 'config') && method_exists($this->config, 'explicit_class_loader_config') ) {

				$singleton_functionUpper = 'WBC';
				$explicit_class_loader_config = $this->config->explicit_class_loader_config( $singleton_functionUpper );

				$this->load->explicit_class_loader( $explicit_class_loader_config );
			}

			// begin the work.
			$this->init();
		}

		public function load_tools() {
			
			/*
			*	define the list of tools to be preloaded.
			*	the array filled with file name <tool->[tool-name] syntex,
			*	where the tool_name should only be added to the list.
			*/

			$tools = array('error-handler','autoload','cache-manager');

			if(!empty($tools)){

				foreach ($tools as $tool) {
					require_once constant('EOWBC_TOOLS_DIR')."tool-${tool}.php";
				}	
			}
		}

		public function load_helpers() {
			
			/*
			*	define the list of helpers to be preloaded.
			*	the array filled with file name <helper->[helper-name] syntex,
			*	where the tool_name should only be added to the list.
			*/

			$helpers = array('options'=>'WBC_Options','lang'=>'WBC_language','wc'=>'WBC_WC','common'=>'WBC_Common','session'=>'WBC_Session','wp'=>'WBC_WP','config'=>'WBC_Config','theme'=>'WBC_Theme','file'=>'WBC_File', 'currency'=>'WBC_Currency');

			if(!empty($helpers)){

				foreach ($helpers as $helper=>$helper_class) {					
					require_once constant('EOWBC_HELPERS_DIR')."helper-${helper_class}.php";
					$this->$helper = $helper_class::instance();
				}	
			}
		}

		public function load_library() {
			
			/*
			*	define the list of library to be preloaded.
			*	the array filled with file name <lib->[lib-name] syntex,
			*	where the lib_name should only be added to the list.
			*/


			$library = array('load'=>'WBC_Loader','migration'=>'WBC_Migration','sanitize'=>'WBC_Sanitize','validate'=>'WBC_Validate','rest'=>'WBC_REST');

			if(!empty($library)){

				foreach ($library as $lib=>$lib_class) {
					require_once constant('EOWBC_LIBRARY_DIR')."lib-${lib}.php";
					$this->$lib = $lib_class::instance();
				}	
			}
		}

		public function define_constants() {
			//load plugin.php to get access to get_plugin_data method.
			require_once ABSPATH.'wp-admin/includes/plugin.php';

			$plugin_data = get_plugin_data(__FILE__);

			defined('EOWBC_DIRECTORY') || define('EOWBC_DIRECTORY', plugin_dir_path( __FILE__ ));
			defined('EOWBC_BASE_DIRECTORY') || define('EOWBC_BASE_DIRECTORY', basename(__DIR__));
			
			defined('EOWBC_NAME') || define('EOWBC_NAME', 'Woo Choice Plugin' /*$plugin_data['Name']*/);
			defined('EOWBC_FILE') || define('EOWBC_FILE', __FILE__);
			defined('EOWBC_VERSION') || define('EOWBC_VERSION', $plugin_data['Version']);

			defined('EOWBC_ASSET_DIR') || define('EOWBC_ASSET_DIR', constant('EOWBC_DIRECTORY').'asset/');
			defined('EOWBC_ASSET_URL') || define('EOWBC_ASSET_URL', plugins_url(constant('EOWBC_BASE_DIRECTORY')).'/asset/');
			
			defined('EOWBC_MIGRATION_DIR') || define('EOWBC_MIGRATION_DIR', constant('EOWBC_DIRECTORY').'application/migration/');			
			defined('EOWBC_TOOLS_DIR') || define('EOWBC_TOOLS_DIR', constant('EOWBC_DIRECTORY').'application/system/tools/');
			defined('EOWBC_HELPERS_DIR') || define('EOWBC_HELPERS_DIR', constant('EOWBC_DIRECTORY').'application/helper/');
			defined('EOWBC_LIBRARY_DIR') || define('EOWBC_LIBRARY_DIR', constant('EOWBC_DIRECTORY').'application/library/');
			defined('EOWBC_TEMPLATE_DIR') || define('EOWBC_TEMPLATE_DIR', constant('EOWBC_DIRECTORY').'application/view/');

			defined('WBC_TEMPLATE_DIR_EXTENDED') || define('WBC_TEMPLATE_DIR_EXTENDED', constant('EOWBC_DIRECTORY').'templates/');

			defined('EOWBC_LOG_DIR') || define('EOWBC_LOG_DIR', constant('EOWBC_ASSET_DIR').'logs/');

			defined('EOWBC_ICON') || define('EOWBC_ICON', constant('EOWBC_ASSET_URL').'icon/mini.png');
			defined('EOWBC_JUMBO_ICON') || define('EOWBC_JUMBO_ICON', constant('EOWBC_ASSET_URL').'/icon/jumbo.png');
			defined('EOWBC_ICON_SVG') || define('EOWBC_ICON_SVG', constant('EOWBC_ASSET_URL').'/icon/bundle_logo.svg');
		}

		public function theme_adaption_check() {

			// admin 
			if( is_admin() ) {
				$page_slug = wbc()->sanitize->get('page');
				if( strpos($page_slug, "---theme-adaption") !== FALSE ) {
					$curr_plugin_slug = explode("---", $page_slug)[0];

					if( $curr_plugin_slug == 'woo-bundle-choice' ) {

						add_filter('sp_wbc_theme_adaption_config', function( $plugin_slug ) {

							if( $plugin_slug == 'woo-bundle-choice' ) {
								return wbc()->config->required_hooks_n_filters_etc();
							}
						}, 10, 1);
					}

				}
			}

			//add action 
			if( !empty(wbc()->sanitize->get('thadc')) && wbc()->sanitize->get('thadc') == 1 ) {
				add_action('sp_wbc_theme_adaption_check',function(){
					wbc()->load->model('utilities/eowbc_theme_adaption_check');
					eo\wbc\model\utilities\Eowbc_Theme_Adaption_Check::instance()->check( wbc()->config->required_hooks_n_filters_etc() );
				});
			}
			
		}

		public function init() {
			/*ACTIVE_TODO_OC_START
			ACTIVE_TODO we need to create one function or flow to call all such hooks related binding from root class init function of this class end sp_index class.
			ACTIVE_TODO_OC_END*/
			\eo\wbc\model\data_model\SP_WBC_Product::hooks();

			do_action( 'before_eowbc_load' );
			
			\eo\wbc\controllers\admin\Customizer::instance()->run();
			$bootstrap = eo\wbc\WooCommerce_Bundle_Choice_Bootstrap::instance()->run();

			// //TODO temp. hiren added on around 23-04-2020, to manually test activate class
			// eo\wbc\WooCommerce_Bundle_Choice_Bootstrap::activate();						
			do_action( 'after_eowbc_load' );

			// added on 01-01-2022
			$this->theme_adaption_check();
		}
	}


	add_action( 'plugins_loaded', function() {
		// echo "bundle choice";
		// echo "<br>";
		if(function_exists('wc')){
			wbc()->construct_init();

			// ACTIVE_TODO the eowbc_lang function and extension lang function are no more supposed to be used, so we need to replace call to these functions with standard gettext call functions like __, _e and so on. and in the new gettext call implementation we have used standard function like __, _e and so on and not used the eowbc_lang and so on, so lets do change the call asap in the alredy implemented gettext calls.
			// 	ACTIVE_TODO and as soon as above is done we need to mark the eowbc_lang and extension lang and so on as deprecated. 
			load_plugin_textdomain( 'woo-bundle-choice', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );

			//run base service for theme adaption check 
			eo\wbc\model\UI_Builder::instance()->theme_adaption_check();
		}
		
	},999);

	if(!function_exists('wbc')){

		function wbc(){
			return Woo_Bundle_Choice::instance();
		}	
	}
	
	if(!class_exists('eo\wbc\WooCommerce_Bundle_Choice_Bootstrap')){
		require_once plugin_dir_path( __FILE__ ).'/application/woocommerce-bundle-choice-bootstrap.php';
	}

	register_activation_hook( __FILE__, 'eo\wbc\WooCommerce_Bundle_Choice_Bootstrap::activate');
	register_deactivation_hook( __FILE__, 'eo\wbc\WooCommerce_Bundle_Choice_Bootstrap::deactivate');
	register_uninstall_hook( __FILE__,'eo\wbc\WooCommerce_Bundle_Choice_Bootstrap::uninstall');

	//Add Setting Link adjecent to Plugin Name in Admin's Plugin Panel
	add_filter('plugin_action_links_'.plugin_basename(__FILE__),function($links){
	    
	    $links[] = '<a href="' .
	        admin_url( 'admin.php?page=eowbc-setting-status' ) .
	        '">' . __('Settings','woo-bundle-choice') . '</a>';
	        return $links;
	},30);
}
