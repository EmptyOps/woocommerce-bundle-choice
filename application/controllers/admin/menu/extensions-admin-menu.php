<?php
namespace eo\wbc\controllers\admin\menu;

defined( 'ABSPATH' ) || exit;

use eo\wbc\model\SP_Extension;

if ( ! class_exists( 'Extensions_Admin_Menu' ) ) {
	class Extensions_Admin_Menu extends Admin_Menu {

		private static $_instance;

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

		public function SP_Extension() {			
			return $this->SP_Extension;
		}

		public function get_menu(){
			$menu = array();
			$submenu = array();
			$menu['submenu_only'] = true;

			$submenu[] = array(
				'parent_slug'=>'eowbc',
				'title'=>eowbc_lang('General').' - '.$this->SP_Extension->extension_name().' - '.constant('EOWBC_NAME'),
				'menu_title'=>$this->SP_Extension->extension_name(),	//eowbc_lang('WooCommerce Bundle Choice'),
				'capability'=>'manage_options',
				'slug'=>$this->SP_Extension->admin_page_slug(),	// 'eowbc',
				'template'=>$this->SP_Extension->admin_page_template(),	//	'admin/menu/home',
				'template_dir'=>constant(strtoupper( $this->SP_Extension->singleton_function() ).'_TEMPLATE_DIR'),	
				'icon'=>$this->get_icon_url__( $this->SP_Extension->extension_slug() ),
				'position'=>$this->get_position__( $this->SP_Extension->extension_slug() )
			);

			//if there are additional requirement of menu by particular extensions, then should publish filters from here or just read to the config class? I think config class is clean, faster and simple


			if( wbc()->sanitize->get('page') == $this->SP_Extension->admin_page_slug() || ( wbc()->sanitize->get('page') == $this->SP_Extension->extension_slug().'---theme-adaption' || wbc()->sanitize->get('page') == $this->SP_Extension->extension_slug().'---sp-queue' ) ) {

				//config array should be defined, if not then do not add submenu
	            if( isset($this->SP_Extension->singleton_function()()->config) && method_exists($this->SP_Extension->singleton_function()()->config, 'required_hooks_n_filters_etc') ) {
					
					$config = $this->SP_Extension->singleton_function()()->config->required_hooks_n_filters_etc();
					if( is_array($config) && sizeof($config) > 0 ) {

						$submenu[] = $this->define_theme_adaption_menu();

					}
				}

				//check if applicable to add submenu 
	            if( apply_filters( 'sp_queue_applicable', $this->SP_Extension->extension_slug() ) ) {
					
					$submenu[] = $this->define_queue_menu();
				}
			}

			$menu['submenu'] = $submenu;
	
			return $menu;
		}

		public function get_menu_structure() {			

			$menu = $this->get_menu();
			// if(empty($menu['title'])) { 

			// 	if( !empty($menu['submenu']) ) {
			// 		add_filter('eowbc_menu',function($menu_eowbc) use($menu) { 
			// 			foreach ($menu['submenu'] as $smk => $submenu) {
			// 				$menu_eowbc['submenu'][] = $submenu;
			// 			}

			// 			wbc()->common->pr($menu_eowbc);
			// 			wp_die();
			// 			return $menu_eowbc;
			// 		}, 10, 1);
			// 	}

			// 	return null;
			// }
			
			$menu = apply_filters( 'spext_admin_menu', $menu, $this->SP_Extension->extension_slug() );
	
			$this->add_message__($menu);

			return $menu;
		}

		public function define_theme_adaption_menu() {

			$theme_adaption_menu = parent::define_theme_adaption_menu();
			$theme_adaption_menu['parent_slug'] = 'eowbc';	// $this->SP_Extension->admin_page_slug();
			$theme_adaption_menu['title'] = eowbc_lang('Theme Adaption').' - '.$this->SP_Extension->extension_name().' - '.constant('EOWBC_NAME');
			$theme_adaption_menu['slug'] = $this->SP_Extension->extension_slug().'---theme-adaption';

			return $theme_adaption_menu;
		}

		protected function define_queue_menu() {

			$theme_adaption_menu = parent::define_queue_menu();
			$theme_adaption_menu['parent_slug'] = 'eowbc';	// $this->SP_Extension->admin_page_slug();
			$theme_adaption_menu['title'] = eowbc_lang('Sync Queue').' - '.$this->SP_Extension->extension_name().' - '.constant('EOWBC_NAME');
			$theme_adaption_menu['slug'] = $this->SP_Extension->extension_slug().'---sp-queue';

			return $theme_adaption_menu;
		}

		public function get_icon_url__( $extension_slug ) {
			return esc_url( apply_filters( 'spext_icon_url', constant( strtoupper($this->SP_Extension->singleton_function() ).'_ICON'), $extension_slug  ) );
		}

		public function add_message__($menu) {	
		
			parent::add_theme_adaption_message($this->SP_Extension->extension_slug());
		}

		public function get_position__( $extension_slug ) {

			$position = apply_filters( 'spext_menu_position', $extension_slug, 66);

			if(is_numeric($position)) {

				return intval($position);


			} else {

				return 66;
			}
		}
	}
}		
