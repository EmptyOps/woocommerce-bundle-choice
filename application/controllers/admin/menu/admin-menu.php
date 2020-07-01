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
				'title'=>eowbc_lang('Home').' - '.constant('EOWBC_NAME'),
				'menu_title'=>constant('EOWBC_NAME'),	//eowbc_lang('WooCommerce Bundle Choice'),
				'capability'=>'manage_options',
				'slug'=>'eowbc',
				'template'=>'admin/menu/home',
				'icon'=>$this->get_icon_url(),
				'position'=>$this->get_position()
			);

			$submenu = array(

						array(
							'parent_slug'=>null,
							'title'=>eowbc_lang('Setup').' '.constant('EOWBC_NAME'),	//eowbc_lang('Setup WooCommerce Product Bundle Choice'),
							'menu_title'=>eowbc_lang('Setup WooCommerce Product Bundle Choice'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-install',
							'template'=>'admin/init-install',							
							'position'=>0
						),
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('General').' - '.constant('EOWBC_NAME'),	//eowbc_lang('General - Woo Choice Plugin'),
							'menu_title'=>eowbc_lang('General'),	//eowbc_lang('General - Woo Choice Plugin'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-configuration',
							'template'=>'admin/menu/configuration',
							'position'=>1
						),
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Filters').' - '.constant('EOWBC_NAME'),	//eowbc_lang('Filters'),
							'menu_title'=>eowbc_lang('Filters'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-filters',
							'template'=>'admin/menu/filters',
							'position'=>2
						),
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Mapping').' - '.constant('EOWBC_NAME'),	//eowbc_lang('Mapping'),
							'menu_title'=>eowbc_lang('Mapping'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-mapping',
							'template'=>'admin/menu/mapping',
							'position'=>3
						),						
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Mapping').' - '.constant('EOWBC_NAME'),	//eowbc_lang('Mapping'),
							'menu_title'=>eowbc_lang('Mapping'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-mapping',
							'template'=>'admin/menu/mapping',
							'position'=>2
						),						
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Appearance').' - '.constant('EOWBC_NAME'),	//eowbc_lang('Appearance'),
							'menu_title'=>eowbc_lang('Appearance'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-appearance',
							'template'=>'admin/menu/appearance',
							'position'=>4
						),
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Tiny Features').' - '.constant('EOWBC_NAME'),	//eowbc_lang('Tiny Features'),
							'menu_title'=>eowbc_lang('Tiny Features'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-tiny-features',
							'template'=>'admin/menu/tiny_features',
							'position'=>5
						),
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Price Control(Beta)').' - '.constant('EOWBC_NAME'),	//eowbc_lang('Price Control(Beta)'),
							'menu_title'=>eowbc_lang('Price Control(Beta)'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-price-control',
							'template'=>'admin/menu/price_control',
							'position'=>6
						),
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Settings & Status').' - '.constant('EOWBC_NAME'),	//eowbc_lang('Settings & Status'),
							'menu_title'=>eowbc_lang('Settings & Status'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-setting-status',
							'template'=>'admin/menu/setting-status',
							'position'=>7
						),
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Extensions').' - '.constant('EOWBC_NAME'),	//eowbc_lang('Extensions'),
							'menu_title'=>eowbc_lang('Extensions'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-extensions',
							'template'=>'admin/menu/extensions',
							'position'=>8
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
							printf('<div class="ui negative message"><i class="close icon"></i><div class="header">Required</div><p>Since you enabled <strong>%s</strong> you need to complete setup to make it work on your website, either add sample data from General -> Sample Data tab or add Filters and Mapping in respective Tabs as well as finish the required settings in the General -> Buttons and General -> Navigations Steps( Breadcrumb ) Tabs</p></div>',$primary_features[$active_feature]);
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
					printf('<div class="ui %s message"><i class="close icon"></i><div class="header">%s</div><p>'.constant('EOWBC_NAME').' have noticed <strong>%s</strong>, would you like to <a href="%s">have a look</a> or <a href="%s">report to the support</a>.</p></div>',$message_type,$message_title,$error_message,admin_url('admin.php?page=eowbc-setting-status&atol=setting_status_log'),admin_url('admin.php?page=eowbc-setting-status&atol=setting_status_log'));
				});

			}
			
			if( wbc()->options->get('eo_wbc_mapping_error_report',false) ) {

				$referrer = wbc()->options->get('eo_wbc_mapping_error_report',false);
				add_action( 'admin_notices',function() use($referrer){
					printf('<div class="ui %s message"><i class="close icon"></i><div class="header">%s</div><p>One user has reported mapping issue at this <a href="%s" target="_blank">link</a>, please ensure you have added mapping to connect products from first to second step. If you like assistance on this <a href="%s">you can contact support</a></p></div>',$referrer,admin_url('admin.php?page=eowbc-setting-status&atol=setting_status_log'));
				});

				wbc()->options->delete('eo_wbc_mapping_error_report');
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
