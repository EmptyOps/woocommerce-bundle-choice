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
							'title'=>eowbc_lang('General - Woo Choice Plugin'),
							'menu_title'=>eowbc_lang('General - Woo Choice Plugin'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-configuration',
							'template'=>'admin/menu/configuration',
							'position'=>1
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
							'title'=>eowbc_lang('Mapping'),
							'menu_title'=>eowbc_lang('Mapping'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-mapping',
							'template'=>'admin/menu/mapping',
							'position'=>2
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
							'title'=>eowbc_lang('Settings & Status'),
							'menu_title'=>eowbc_lang('Settings & Status'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-setting-status',
							'template'=>'admin/menu/setting-status',
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
			$features = unserialize(wbc()->options->get_option('setting_status_setting_status_setting','features',serialize(array())));
					
			if(empty($features['price_control'])) {
				unset($submenu[6]);
			}
			$menu['submenu'] = $submenu;
			$menu = apply_filters( 'eowbc_menu', $menu );

			$this->add_message($features,$menu);

			return $menu;
		}

		public function get_icon_url() {
			return esc_url(apply_filters( 'eowbc_icon_url',constant('EOWBC_ICON')));
		}

		public function add_message($features,$menu) {	
		
			if(!empty($features) and is_array($features)){
				$active_feature = '';
				if(!empty($features['ring_builder'])) {
					$active_feature = 'ring_builder';
				} elseif (!empty($features['rapnet_api'])) {
					$active_feature = 'rapnet_api';
				} elseif (!empty($features['glowstar_api'])) {
					$active_feature = 'glowstar_api';
				}
				$primary_features = array('ring_builder'=>'Ring Builder','rapnet_api'=>'Pair Maker','glowstar_api'=>'Guidance Tool');
				if(!empty($active_feature) and array_key_exists($active_feature,$primary_features)) {

					if(wbc()->options->get_option('configuration','config_category',0) != 1 or wbc()->options->get_option('configuration','config_map',0) != 1){						
						add_action( 'admin_notices',function() use($primary_features,$active_feature){
							printf('<div class="ui negative message"><i class="close icon"></i><div class="header">Required</div><p>You have enabled <strong>%s</strong> but the configuration is still incomplete please complete it by adding sample data or your own data. Then it will be visible on your website frontend.</p></div>',$primary_features[$active_feature]);
						});
					}
				}
			}

			if( !empty(get_option('eowbc_error_count',0)) or !empty(get_option('eowbc_warning_count',0)) ){
				$message_type = 'warning'; /*negative*/
				$message_title = 'Warning';
				$error_message = array();
				if( !empty(get_option('eowbc_error_count',0)) ) {
					$message_type = 'negative';
					$message_title = 'Error';
					$error_message[] = get_option('eowbc_error_count',0).' Error ';
				}

				if( !empty(get_option('eowbc_warning_count',0)) ) {					
					$error_message[] = get_option('eowbc_warning_count',0).' Warning ';
				}

				$error_message = implode(' and ', $error_message);

				add_action( 'admin_notices',function() use($message_type,$message_title,$error_message){
					printf('<div class="ui %s message"><i class="close icon"></i><div class="header">%s</div><p>WooCommerce Bundle Choice have noticed <strong>%s</strong>, would you like to have a look or <a href="%s">report to the support</a>.</p></div>',$message_type,$message_title,$error_message,admin_url('admin.php?page=eowbc-setting-status'));
				});

			}
			
			
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
