<?php
namespace eo\wbc\controllers\admin\menu;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Admin_Menu' ) ) {
	class Admin_Menu {

		private static $_instance;
		public static function instance() {
		if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;
			}

			return self::$_instance;
		}

		private function __construct() {
			// no implementation.
		}

		public function get_menu_structure() {
			
			$menu = array(
				'title'=>eowbc_lang('Home'),
				'menu_title'=>eowbc_lang('WooCommerce Bundle Choice'),
				'capability'=>'manage_options',
				'slug'=>'eowbc',
				'template'=>'admin/menu/home',
				'icon'=>$this->get_icon_url(),
				'position'=>$this->get_position()
			);

			$submenu = array(

						array(
							'parent_slug'=>null,
							'title'=>eowbc_lang('Setup WooCommerce Product Bundle Choice'),
							'menu_title'=>eowbc_lang('Setup WooCommerce Product Bundle Choice'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-install',
							'template'=>'admin/init-install',							
							'position'=>0
						),
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Configuration'),
							'menu_title'=>eowbc_lang('Configuration'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-configuration',
							'template'=>'admin/menu/configuration',
							'position'=>1
						),
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Mapping'),
							'menu_title'=>eowbc_lang('Mapping'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-mapping',
							'template'=>'admin/menu/mapping',
							'position'=>2
						),
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Filters'),
							'menu_title'=>eowbc_lang('Filters'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-filters',
							'template'=>'admin/menu/filters',
							'position'=>3
						),
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Appearance'),
							'menu_title'=>eowbc_lang('Appearance'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-appearance',
							'template'=>'admin/menu/appearance',
							'position'=>4
						),
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Tiny Features'),
							'menu_title'=>eowbc_lang('Tiny Features'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-tiny-features',
							'template'=>'admin/menu/tiny_features',
							'position'=>4
						),
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Price Control(Beta)'),
							'menu_title'=>eowbc_lang('Price Control(Beta)'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-price-control',
							'template'=>'admin/menu/price_control',
							'position'=>4
						),
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Logs'),
							'menu_title'=>eowbc_lang('Logs'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-logs',
							'template'=>'admin/menu/logs',
							'position'=>6
						),
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Extensions'),
							'menu_title'=>eowbc_lang('Extensions'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-extensions',
							'template'=>'admin/menu/extensions',
							'position'=>5
						),
					);
			$menu['submenu'] = $submenu;
			$menu = apply_filters( 'eowbc_menu', $menu );
			return $menu;
		}

		public function get_icon_url() {
			return esc_url(apply_filters( 'eowbc_icon_url',constant('EOWBC_ICON')));
		}

		public function get_position() {

			$position = apply_filters( 'eowbc_menu_position', 66);

			if(is_numeric($position)) {

				return intval($position);


			} else {

				return 66;
			}
		}
	}
}		
