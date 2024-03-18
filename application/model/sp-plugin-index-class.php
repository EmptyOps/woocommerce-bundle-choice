<?php
/**
 *	SP Plugin index class 
 *  This class handles and take care of common logic for any SP Plugin's index class 
 *  TODO publish actions in this class and process appliable logic from plugin's index child class of this class, whenever necessary. 
 */


namespace eo\wbc\model;

if (!defined('ABSPATH')) exit;

use \eo\wbc\SP_Extensions_Bootstrap;
use eo\wbc\model\utilities\Eowbc_Theme_Adaption_Check;

if(!class_exists('SP_Plugin_Index_Class') ) {

	class SP_Plugin_Index_Class {

		private static $_instance = null;

		private $FILE = null;

		private $SP_Extension = null;

		public static function instance() {

			throw new Exception("Sorry, there is no point in supporting singleton instance method for this class. Use the instance method of the particular plugin's index class means child class of this class.", 1);

			if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;
			}

			return self::$_instance;
		}

		private function __construct() {			
			//do nothing, construct_init will be called from plugins_loaded hook
		}

		public function construct_init($childClassObj) {			

			// define constant before our work bwgins.
			$this->define_constants();

			// load neccesary tools.
			$this->load_tools();			
			// load helper functions.
			$this->load_helpers();
			// load library.
			$this->load_library();		

			// explcit class loader. call it if the settings are defined in the config file. 
			if( property_exists($this->SP_Extension->singleton_function()(), 'config') && method_exists($this->SP_Extension->singleton_function()()->config, 'explicit_class_loader_config') ) {
				$this->explicit_class_loader();
			}

			// begin the work.  
			$this->__init( $childClassObj );

			//TODO Temporary, only till the init method of extensions are not refactored 
			if( method_exists($childClassObj, 'init') ) {
				$childClassObj->init();
			}

		}

		public function getSP_Extension() {			
			return $this->SP_Extension;
		}

		public function SP_Extension() {			
			return $this->getSP_Extension();
		}

		public function setFILE($FILE) {			

			if( $FILE == __FILE__ ) {
				throw new Exception("Invalid root file path detected, pass __FILE__ as value in this function and if still problem persist then contact Sphere Plugins library development team", 1);
			}

			$this->FILE = $FILE;
		}

		public function getFILE() {			

			if( $this->FILE == null ) {
				throw new Exception("Null root file path detected, call setFILE function on this class's object and pass __FILE__ as value to the function and if still problem persist then contact Sphere Plugins library development team", 1);
			}

			return $this->FILE;
		}

		public function load_tools() {
			
			// TODO not implemented yet, implement as and when necessary for extensions 
			return false; 

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

      		$singleton_functionUpper = strtoupper( $this->SP_Extension->singleton_function() );
			$helpers = array('config'=>$singleton_functionUpper.'_Config');

			if(!empty($helpers)){

				foreach ($helpers as $helper=>$helper_class) {					
					if( file_exists(constant($singleton_functionUpper.'_HELPERS_DIR')."helper-${helper_class}.php") ) {
						require_once constant($singleton_functionUpper.'_HELPERS_DIR')."helper-${helper_class}.php";
						// $this->$helper = $helper_class::instance();
						$this->SP_Extension->singleton_function()()->set_helper( $helper, $helper_class::instance() );
					}
				}	
			}
		}

		public function set_helper($helper, $helper_class_instance) {
			$this->$helper = $helper_class_instance;
		}

		public function load_library() {

			// TODO not implemented yet, implement as and when necessary for extensions 
			return false; 

			/*
			*	define the list of library to be preloaded.
			*	the array filled with file name <lib->[lib-name] syntex,
			*	where the lib_name should only be added to the list.
			*/


			// TODO I think migration library maybe needed in near future for the extensions, but yeah other are not necessary at all 
			$library = array('load'=>'WBC_Loader','migration'=>'WBC_Migration','sanitize'=>'WBC_Sanitize','validate'=>'WBC_Validate','rest'=>'WBC_REST');

			if(!empty($library)){

				foreach ($library as $lib=>$lib_class) {
					require_once constant('EOWBC_LIBRARY_DIR')."lib-${lib}.php";
					$this->$lib = $lib_class::instance();
				}	
			}
		}

		public function explicit_class_loader() {

			$singleton_functionUpper = strtoupper( $this->SP_Extension->singleton_function() );
			$explicit_class_loader_config = $this->SP_Extension->singleton_function()()->config->explicit_class_loader_config( $singleton_functionUpper );

			wbc()->load->explicit_class_loader( $explicit_class_loader_config );
		}

		public function define_constants() {
			//load plugin.php to get access to get_plugin_data method.
			require_once ABSPATH.'wp-admin/includes/plugin.php';

			$plugin_dir_path = plugin_dir_path( $this->getFILE() );

			$plugin_data = get_plugin_data( $this->getFILE() );

			$singleton_functionUpper = strtoupper( $this->SP_Extension->singleton_function() );

			defined( $singleton_functionUpper.'_DIRECTORY') || define($singleton_functionUpper.'_DIRECTORY', method_exists($this->SP_Extension, 'DIRECTORY') ? $this->SP_Extension->DIRECTORY() : $plugin_dir_path );
			
			// defined('EOWBC_BASE_DIRECTORY') || define('EOWBC_BASE_DIRECTORY', basename(__DIR__));
			defined( $singleton_functionUpper.'_BASE_DIRECTORY') || define($singleton_functionUpper.'_BASE_DIRECTORY', method_exists($this->SP_Extension, 'BASE_DIRECTORY') ? $this->SP_Extension->BASE_DIRECTORY() : basename($plugin_dir_path) );
			
			// defined('EOWBC_NAME') || define('EOWBC_NAME', 'Woo Choice Plugin' /*$plugin_data['Name']*/);
			defined( $singleton_functionUpper.'_NAME') || define($singleton_functionUpper.'_NAME', method_exists($this->SP_Extension, 'NAME') ? $this->SP_Extension->NAME() : $plugin_data['Name'] );
			// defined('EOWBC_FILE') || define('EOWBC_FILE', __FILE__);
			// defined('EOWBC_VERSION') || define('EOWBC_VERSION', $plugin_data['Version']);

			// defined('EOWBC_ASSET_DIR') || define('EOWBC_ASSET_DIR', constant('EOWBC_DIRECTORY').'asset/');
			defined( $singleton_functionUpper.'_ASSET_DIR') || define($singleton_functionUpper.'_ASSET_DIR', method_exists($this->SP_Extension, 'ASSET_DIR') ? $this->SP_Extension->ASSET_DIR() : constant($singleton_functionUpper.'_DIRECTORY').'assets/' );
			// defined('EOWBC_ASSET_URL') || define('EOWBC_ASSET_URL', plugins_url(constant('EOWBC_BASE_DIRECTORY')).'/asset/');
			defined( $singleton_functionUpper.'_ASSET_URL') || define($singleton_functionUpper.'_ASSET_URL', method_exists($this->SP_Extension, 'ASSET_URL') ? $this->SP_Extension->ASSET_URL() : plugins_url(constant($singleton_functionUpper.'_BASE_DIRECTORY')).'/assets/' );
			
			// defined('EOWBC_MIGRATION_DIR') || define('EOWBC_MIGRATION_DIR', constant('EOWBC_DIRECTORY').'application/migration/');			
			// defined('EOWBC_TOOLS_DIR') || define('EOWBC_TOOLS_DIR', constant('EOWBC_DIRECTORY').'application/system/tools/');
			// defined('EOWBC_HELPERS_DIR') || define('EOWBC_HELPERS_DIR', constant('EOWBC_DIRECTORY').'application/helper/');
			defined( $singleton_functionUpper.'_HELPERS_DIR') || define($singleton_functionUpper.'_HELPERS_DIR', method_exists($this->SP_Extension, 'HELPERS_DIR') ? $this->SP_Extension->HELPERS_DIR() : constant($singleton_functionUpper.'_DIRECTORY').'application/helper/' );
			// defined('EOWBC_LIBRARY_DIR') || define('EOWBC_LIBRARY_DIR', constant('EOWBC_DIRECTORY').'application/library/');
			// defined('EOWBC_TEMPLATE_DIR') || define('EOWBC_TEMPLATE_DIR', constant('EOWBC_DIRECTORY').'application/view/');
			defined( $singleton_functionUpper.'_TEMPLATE_DIR') || define($singleton_functionUpper.'_TEMPLATE_DIR', method_exists($this->SP_Extension, 'TEMPLATE_DIR') ? $this->SP_Extension->TEMPLATE_DIR() : constant($singleton_functionUpper.'_DIRECTORY').'application/view/' );

			//new _TEMPLATE_DIR
			defined( $singleton_functionUpper.'_TEMPLATE_DIR_EXTENDED') || define($singleton_functionUpper.'_TEMPLATE_DIR_EXTENDED', method_exists($this->SP_Extension, 'TEMPLATE_DIR_EXTENDED') ? $this->SP_Extension->TEMPLATE_DIR() : constant($singleton_functionUpper.'_DIRECTORY').'templates/' );

			// defined('EOWBC_LOG_DIR') || define('EOWBC_LOG_DIR', constant('EOWBC_ASSET_DIR').'logs/');

			// defined('EOWBC_ICON') || define('EOWBC_ICON', constant('EOWBC_ASSET_URL').'icon/mini.png');
			defined( $singleton_functionUpper.'_ICON') || define($singleton_functionUpper.'_ICON', method_exists($this->SP_Extension, 'ICON') ? $this->SP_Extension->ICON() : constant($singleton_functionUpper.'_ASSET_DIR').'icon/mini.png' );
			// defined('EOWBC_JUMBO_ICON') || define('EOWBC_JUMBO_ICON', constant('EOWBC_ASSET_URL').'/icon/jumbo.png');
			// defined('EOWBC_ICON_SVG') || define('EOWBC_ICON_SVG', constant('EOWBC_ASSET_URL').'/icon/bundle_logo.svg');
		}

		public function theme_adaption_check() {

			// admin 
			if( is_admin() ) {
				$page_slug = wbc()->sanitize->get('page');
				if( strpos($page_slug, "---theme-adaption") !== FALSE ) {
					$curr_plugin_slug = explode("---", $page_slug)[0];

					if( $curr_plugin_slug == $this->SP_Extension->extension_slug() ) {

						add_filter('sp_wbc_theme_adaption_config', function( $plugin_slug ) {

							if( $plugin_slug == $this->SP_Extension->extension_slug() ) {
								return $this->SP_Extension->singleton_function()()->config->required_hooks_n_filters_etc();
							}
						}, 10, 1);
					}

				}
			}

			//add action 
			if( !empty(wbc()->sanitize->get('thadc')) && wbc()->sanitize->get('thadc') == 1 ) {
				add_action('sp_wbc_theme_adaption_check',function(){
					wbc()->load->model('utilities/eowbc_theme_adaption_check');
					\eo\wbc\model\utilities\Eowbc_Theme_Adaption_Check::instance()->check( $this->SP_Extension->singleton_function()()->config->required_hooks_n_filters_etc() );
				},20);
			}
			
		}

		public function __init( $childClassObj ) {

			if( wbc()->sanitize->get('is_test') == 1 ) {

				wbc_pr("SP_Plugin_Index_Class __init");
			}

			//	NOTE: below hook dependancy is commented because there is no need of it. however here it is critical to note that just like none of wbc extensions or theme can work without wbc installed, none of them would function properly if the plugins_loaded priority order is not maitained in ASC order means wbc first and then followed by extensions, theme and library and so on. and based on the assumption that ASC order will always be maintained the below hook dependancy is commented so all wbc extensions, themes and library and so on must follow that. 
			// add_action( 'after_eowbc_load', function() use($childClassObj) {

				do_action( 'before_spext_init', $this->SP_Extension->extension_slug() );
				
				// TODO implement customizer flow that is specific for extensions, only if necessary. 
				// \eo\wbc\controllers\admin\Customizer::instance()->run();

				(new SP_Extensions_Bootstrap( $this->SP_Extension ))->run();

				do_action( 'after_spext_init', $this->SP_Extension->extension_slug() );

				$childClassObj->theme_adaption_check();

			// });

		}

		public function plugin_load_process( SP_Extension $SP_Extension ) {
			$this->SP_Extension = $SP_Extension; 

			//Add Admin Panel Link adjecent to Plugin Name in WP Admin's Plugin Page
			add_filter('plugin_action_links_'. plugin_basename( $this->getFILE() ),function($links){
			    
			    $links[] = '<a href="' .
			        esc_url(admin_url( 'admin.php?page='.$this->SP_Extension->admin_page_slug() )) .
			        '">' . esc_html__('Admin Panel',$this->SP_Extension->extension_slug())  . '</a>';
			        return $links;




			        
			},30);
			if(file_exists(plugin_dir_path( $this->getFILE() ).'vendor/autoload.php'))
			{
				require_once plugin_dir_path( $this->getFILE() ).'vendor/autoload.php';	
			}
			//TODO create a common base for sample data wizard process, just in upcoming days and then transfor below extension specific code to common means all epb mentions will be replaced. but yeah keep some sample data adding code which is in tm ui repo to be there only
			if( false ) {
				// require_once plugin_dir_path( $this->getFILE() ).'vendor/autoload.php';	
				add_action( 'wbc_auto_sample_class',function() {		
					if(!empty(wbc()->sanitize->get('eo_wbc_view_auto_jewel')) and !empty(wbc()->sanitize->get('f'))) {
						
						

						$class = str_replace(' ','_',ucwords(str_replace('_', ' ', wbc()->sanitize->get('f'))));
						$namespace_class = '\\sp\\epb\\controller\\admin\\sample_data\\' . $class;
						
						if( class_exists($namespace_class) ) {
							$namespace_class::instance()->init();	
						}
					}		
				});	

				add_filter('wbc_auto_sample_class_ajax',function($class_file){
					
					$class = str_replace(' ','_',ucwords(str_replace('_', ' ', wbc()->sanitize->post('feature_key'))));

					$namespace_class = '\\sp\\epb\\model\\admin\\sample_data\\' . $class;
					
					if( class_exists($namespace_class) ) {
						return $namespace_class;
					}
					return $class_file;
				});
			}

			// ACTIVE_TODO temp. remove below temp when we finalize the implementation of the activate, deactivate and uninstall callback. and lets do it as soon as we get the chance, as this is critical for occasional maintainance, especially gathering user feedbacks or running campaigns on activate actions, user experience and so on. maybe lets do it in 2nd or 3rd even if there is no demand in particular. -- to h 
			if( false ) {

				register_activation_hook( $this->getFILE(), 'SP_Extensions_Bootstrap::activate');
				register_deactivation_hook( $this->getFILE(), 'SP_Extensions_Bootstrap::deactivate');
				register_uninstall_hook( $this->getFILE(), 'SP_Extensions_Bootstrap::uninstall');
			}

		}

	}
}