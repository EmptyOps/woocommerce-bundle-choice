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

		public function get_menu(){
			$menu = array(
				'title'=>eowbc_lang('Home').' - '.constant('EOWBC_NAME'),
				'menu_title'=>constant('EOWBC_NAME'),	//eowbc_lang('BUNDLOICE (formerly Woo Choice Plugin)'),
				'capability'=>'manage_options',
				'slug'=>'eowbc',
				'template'=>'admin/menu/home',
				'icon'=>$this->get_icon_url(),
				'position'=>$this->get_position()
			);

			$submenu = array(

						array(
							'parent_slug'=>null,
							'title'=>eowbc_lang('Setup').' '.constant('EOWBC_NAME'),	//eowbc_lang('Setup BUNDLOICE (formerly Woo Choice Plugin)'),
							'menu_title'=>eowbc_lang('Setup BUNDLOICE (formerly Woo Choice Plugin)'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-install',
							'template'=>'admin/init-install',							
							'position'=>0
						),
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('General').' - '.constant('EOWBC_NAME'),	//eowbc_lang('General - BUNDLOICE (formerly Woo Choice Plugin)'),
							'menu_title'=>eowbc_lang('General'),	//eowbc_lang('General - BUNDLOICE (formerly Woo Choice Plugin)'),
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
							'title'=>eowbc_lang('Appearance').' - '.constant('EOWBC_NAME'),	//eowbc_lang('Appearance'),
							'menu_title'=>eowbc_lang('Appearance'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-appearance',
							'template'=>'admin/menu/appearance',
							'position'=>4
						),
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Bonus Features').' - '.constant('EOWBC_NAME'),	//eowbc_lang('Tiny Features'),
							'menu_title'=>eowbc_lang('Bonus Features'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-tiny-features',
							'template'=>'admin/menu/tiny_features',
							'position'=>5
						),
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Shortcode Filters').' - '.constant('EOWBC_NAME'),	//eowbc_lang('Tiny Features'),
							'menu_title'=>eowbc_lang('Shortcode Filters'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-shortcode-filters',
							'template'=>'admin/menu/shortcode_filters',
							'position'=>6
						),	
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Filters for Shop/Category Page').' - '.constant('EOWBC_NAME'),	//eowbc_lang('Tiny Features'),
							'menu_title'=>eowbc_lang('Filters for Shop/Category Page'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-shop-cat-filter',
							'template'=>'admin/menu/shop_cat_filter',
							'position'=>7
						),						
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Price Control(Beta)').' - '.constant('EOWBC_NAME'),	//eowbc_lang('Price Control(Beta)'),
							'menu_title'=>eowbc_lang('Price Control(Beta)'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-price-control',
							'template'=>'admin/menu/price_control',
							'position'=>8
						),
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Settings & Status').' - '.constant('EOWBC_NAME'),	//eowbc_lang('Settings & Status'),
							'menu_title'=>eowbc_lang('Settings & Status'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-setting-status',
							'template'=>'admin/menu/setting-status',
							'position'=>9
						),
						array(
							'parent_slug'=>'eowbc',
							'title'=>eowbc_lang('Extensions').' - '.constant('EOWBC_NAME'),	//eowbc_lang('Extensions'),
							'menu_title'=>eowbc_lang('Extensions'),
							'capability'=>'manage_options',
							'slug'=>'eowbc-extensions',
							'template'=>'admin/menu/extensions',
							'position'=>10
						),
						$this->define_theme_adaption_menu()
					);
			$features = unserialize(wbc()->options->get_option('setting_status_setting_status_setting','features',serialize(array())));			
			if(empty($features['ring_builder']) and empty($features['pair_maker']) and empty($features['guidance_tool'])) {
				unset($submenu[1]);
				unset($submenu[2]);
				unset($submenu[3]);
				unset($submenu[4]);
			}

			/*if(empty($features['price_control'])) {
				unset($submenu[8]);			
			}*/

			$bonus_features = unserialize(wbc()->options->get_option('setting_status_setting_status_setting','bonus_features',serialize(array())));			

			if(empty($bonus_features['price_control'])) {
				unset($submenu[8]);
			}

			if(empty($bonus_features['opts_uis_item_page']) and empty($bonus_features['spec_view_item_page'])){
				unset($submenu[5]);
			}

			if(empty($bonus_features['filters_shortcode'])) {
				unset($submenu[6]);
			}

			if(empty($bonus_features['filters_shop_cat'])) {
				unset($submenu[7]);
			}

			$menu['submenu'] = $submenu;
			return $menu;
		}

		public function get_menu_structure() {			
			
			$menu = apply_filters( 'eowbc_menu', $this->get_menu());
	
			$features = unserialize(wbc()->options->get_option('setting_status_setting_status_setting','features',serialize(array())));

			$this->add_message($features,$menu);

			return $menu;
		}

		public function define_theme_adaption_menu() {
			return 	array(
					'parent_slug'=>'eowbc',
					'title'=>eowbc_lang('Theme Adaption').' - '.constant('EOWBC_NAME'),
					'menu_title'=>eowbc_lang('Theme Adaption'),
					'capability'=>'manage_options',
					'slug'=>'woo-bundle-choice---theme-adaption',
					'template'=>'admin/menu/theme-adaption',
					'position'=>111 
				);
		}

		protected function define_queue_menu() {
			return 	array(
					'parent_slug'=>'eowbc',
					'title'=>eowbc_lang('Sync Queue').' - '.constant('EOWBC_NAME'),
					'menu_title'=>eowbc_lang('Sync Queue'),
					'capability'=>'manage_options',
					'slug'=>'woo-bundle-choice---sp-queue',
					'template'=>'admin/menu/queue',
					'position'=>121 
				);
		}

		public function get_icon_url() {
			return esc_url(apply_filters( 'eowbc_icon_url',constant('EOWBC_ICON')));
		}

		public static function active_pair_builder_feature() {			
			
			$features = unserialize(wbc()->options->get_option('setting_status_setting_status_setting','features',serialize(array())));

			if(!empty($features) and is_array($features)){
				$active_feature = '';
				if(!empty($features['ring_builder'])) {
					$active_feature = 'ring_builder';
				} elseif (!empty($features['pair_maker'])) {
					$active_feature = 'pair_maker';
				} elseif (!empty($features['guidance_tool'])) {
					$active_feature = 'guidance_tool';
				}
				
				return $active_feature;
			}

			return null;
		}

		public static function pair_builder_features_list() {		
			// TODO we must create a config class or folder and put all configs there. When implemented instead of returning array from here call that function from here	
			return wbc()->config->get_builders();
			//return array('ring_builder'=>'Ring Builder','pair_maker'=>'Pair Maker','guidance_tool'=>'Guidance Tool');
		}

		public static function is_pair_builder_feature_all_setup() {			
			
			$active_feature = Admin_Menu::active_pair_builder_feature();
			$primary_features = Admin_Menu::pair_builder_features_list();
			if(!empty($active_feature) and array_key_exists($active_feature,$primary_features)) {

				if(wbc()->options->get_option('configuration','config_category',0) != 1 or wbc()->options->get_option('configuration','config_map',0) != 1){
					return false;
				}

			}

			return true;
		}


		public function add_message($features,$menu) {	
		
			//supposed to be shown on any page of admin panel
			if( !Admin_Menu::is_pair_builder_feature_all_setup() ) {

				$active_feature = Admin_Menu::active_pair_builder_feature();
				$primary_features = Admin_Menu::pair_builder_features_list();

				add_action( 'admin_notices',function() use($primary_features,$active_feature){
					//printf('<div class="ui negative message"><i class="close icon"></i><div class="header">Required</div><p>Since you enabled <strong>%s</strong> you need to complete setup to make it work on your website, either add sample data from General -> Sample Data tab or add Filters and Mapping in respective Tabs as well as finish the required settings in the General -> Buttons and General -> Navigations Steps( Breadcrumb ) Tabs</p></div>',$primary_features[$active_feature]);
					
					printf(
					    '<div class="notice notice-error is-dismissible"><p>Since you enabled <strong>%s</strong> you need to complete setup to make it work on your website, either <a href="%s">add sample data</a> or simply <a href="%s">complete setup wizard</a>.</p></div>',
					    esc_html($primary_features[$active_feature]),
					    esc_url(admin_url('admin.php?page=eowbc&eo_wbc_view_auto_jewel=1&f=' . $active_feature)),
					    esc_url(admin_url('admin.php?page=eowbc&wbc_setup=1'))
					);

					/*printf('<div class="notice notice-error is-dismissible"><p><strong>Required</strong> Since you enabled <strong>%s</strong> you need to complete setup to make it work on your website, either add sample data from General -> Sample Data tab or add Filters and Mapping in respective Tabs as well as finish the required settings in the General -> Buttons and General -> Navigations Steps( Breadcrumb ) Tabs</p></div>',$primary_features[$active_feature]);*/
				});
			}

			//supposed to be shown on any page of admin panel
			if( !empty(get_option('eowbc_error_count',0)) or !empty(get_option('eowbc_warning_count',0)) ){
				$message_type = 'warning'; /*negative*/
				$message_title = 'Warning';
				$error_message = array();
				if( !empty(get_option('eowbc_error_count',0)) ) {
					$message_type = 'error';
					$message_title = 'Error';
					$error_message[] = get_option('eowbc_error_count',0).' Error ';
				}

				if( !empty(get_option('eowbc_warning_count',0)) ) {					
					$error_message[] = get_option('eowbc_warning_count',0).' Warning ';
				}

				$error_message = implode(' and ', $error_message);

				add_action( 'admin_notices',function() use($message_type,$message_title,$error_message){
					//printf('<div class="ui %s message"><i class="close icon"></i><div class="header">%s</div><p>'.constant('EOWBC_NAME').' have noticed <strong>%s</strong>, would you like to <a href="%s">have a look</a> or <a href="%s">report to the support</a>.</p></div>',$message_type,$message_title,$error_message,admin_url('admin.php?page=eowbc-setting-status&atol=setting_status_log'),admin_url('admin.php?page=eowbc-setting-status&atol=setting_status_log'));
					// printf('<div class="notice notice-%s is-dismissible"><p><strong>%s</strong> '.constant('EOWBC_NAME').' have noticed <strong>%s</strong>, would you like to <a href="%s">have a look</a> or <a href="%s">report to the support</a>.</p></div>',$message_type,$message_title,$error_message,admin_url('admin.php?page=eowbc-setting-status&atol=setting_status_log'),admin_url('admin.php?page=eowbc-setting-status&atol=setting_status_log'));
					printf(
					    '<div class="notice notice-%s is-dismissible"><p><strong>%s</strong> %s have noticed <strong>%s</strong>, would you like to <a href="%s">have a look</a> or <a href="%s">report to the support</a>.</p></div>',
					    esc_attr($message_type),
					    esc_html($message_title),
					    esc_html(constant('EOWBC_NAME')),
					    esc_html($error_message),
					    esc_url(admin_url('admin.php?page=eowbc-setting-status&atol=setting_status_log')),
					    esc_url(admin_url('admin.php?page=eowbc-setting-status&atol=setting_status_log'))
					);
				});

			}
			
			//supposed to be shown on any page of admin panel
			if( wbc()->options->get('eo_wbc_mapping_error_report',false) ) {
				$message_type = 'warning';
				$message_title = "Warning";

				$referrer = wbc()->options->get('eo_wbc_mapping_error_report',false);
				add_action( 'admin_notices',function() use($referrer,$message_type,$message_title){
					//printf('<div class="ui %s message"><i class="close icon"></i><div class="header">%s</div><p>One user has reported mapping issue at this <a href="%s" target="_blank">link</a>, please ensure you have added mapping to connect products from first to second step. If you like assistance on this <a href="%s">you can contact support</a></p></div>',$message_type,$message_title,$referrer,admin_url('admin.php?page=eowbc-setting-status&atol=setting_status_log'));
					// printf('<div class="notice notice-%s is-dismissible"><p><strong>%s</strong> One user has reported mapping issue at this <a href="%s" target="_blank">link</a>, please ensure you have added mapping to connect products from first to second step. If you like assistance on this <a href="%s">you can contact support</a></p></div>',$message_type,$message_title,$referrer,admin_url('admin.php?page=eowbc-setting-status&atol=setting_status_log'));
					printf(
					    '<div class="notice notice-%s is-dismissible"><p><strong>%s</strong> One user has reported a mapping issue at this <a href="%s" target="_blank">link</a>, please ensure you have added mapping to connect products from the first to the second step. If you would like assistance with this, <a href="%s">you can contact support</a>.</p></div>',
					    esc_attr($message_type),
					    esc_html($message_title),
					    esc_url($referrer),
					    esc_url(admin_url('admin.php?page=eowbc-setting-status&atol=setting_status_log'))
					);

				});

				wbc()->options->delete('eo_wbc_mapping_error_report');
			}

			$this->add_theme_adaption_message('woo-bundle-choice');

		}

		public function add_theme_adaption_message($plugin_slug) {	
			$theme_adaption_config = apply_filters('sp_wbc_theme_adaption_config',$plugin_slug);
			if( wbc()->common->isEmptyArr( $theme_adaption_config) ) {
				return false;
			}
		
			//notification if theme adaption check is not ran: supposed to be shown on any page of admin panel 
				// with options Run and Close
				$theme_adcheck_result = wbc()->options->get_option_group('thadcr_'.$plugin_slug,array());
				if( wbc()->common->isEmptyArr( $theme_adcheck_result ) ) {
					$this->add_notification( 'error','Run Theme Adaption Check','You should run Theme Adaption Check at earliest, click on the link provided below to view Theme Adaption status and then you can run it from there. It will help ensure that our plugin is adapting smoothly to your website frontend theme.',admin_url('admin.php?page='.$plugin_slug.'---theme-adaption'),'Continue');

				}
				else 
				{
					// show notification when theme is changed and for that theme the theme adaption check is not ran yet 
					$curr_theme_key = \eo\wbc\model\utilities\Eowbc_Theme_Adaption_Check::current_theme_key();			
					if( !isset($theme_adcheck_result[$curr_theme_key]) ) {
						$this->add_notification( 'error','Run Theme Adaption Check for your new Theme','It seems that your website theme is changed so we suggest you run Theme Adaption Check, click on the link provided below to view Theme Adaption status and then you can run it from there. It will help ensure that our plugin is adapting smoothly to your new theme.',admin_url('admin.php?page='.$plugin_slug.'---theme-adaption'),'Continue');

					}
					else {
						//notification if theme adaption check has any critical error or concern but not warnings: supposed to be shown on any page of admin panel 
						// with options Check, Close and Don't show again
						$is_notify = false;
						foreach ($theme_adcheck_result as $theme_key => $sections) {

							if( $theme_key != $curr_theme_key ) {
								continue;
							}

							foreach ($sections as $section_key => $section) {

								foreach ($section as $required_key => $items) {

									if( $required_key != 'mandatory' ) {
										continue;
									}

									foreach ($items as $itemkey => $item) {

										if( $item['result'] == 0 ) {
											$is_notify = true;
											break;
										}
									}

									if( $is_notify )	break;
								}	
								
								if( $is_notify )	break;
							}

							if( $is_notify )	break;
						}

						if( $is_notify ) {
							$this->add_notification( 'error','There are some critical errors with Theme Adaption','Click on the link provided below to review the errors and to work towards the resolution.',admin_url('admin.php?page='.$plugin_slug.'---theme-adaption'),'Review Errors');

						}

					}
				}

		}

		public function add_notification($message_type,$message_title,$message,$action_link,$action_text) {

			add_action( 'admin_notices',function() use($message_type,$message_title,$message,$action_link,$action_text){
				// printf('<div class="notice notice-%s is-dismissible"><p><strong>%s</strong> <br>%s</p><p><a href="%s"><strong>%s</strong></a></p></div>',$message_type,$message_title,$message,$action_link,$action_text);
				printf(
				    '<div class="notice notice-%s is-dismissible"><p><strong>%s</strong> <br>%s</p><p><a href="%s"><strong>%s</strong></a></p></div>',
				    esc_attr($message_type),
				    esc_html($message_title),
				    esc_html($message),
				    esc_url($action_link),
				    esc_html($action_text)
				);

			});
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
