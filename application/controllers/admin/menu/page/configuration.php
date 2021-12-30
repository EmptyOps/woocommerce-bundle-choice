<?php
namespace eo\wbc\controllers\admin\menu\page;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Configuration' ) ) {
	class Configuration {

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

		public static function get_form_definition( $is_add_sample_values = false ) {
			
			wbc()->load->model('admin/form-builder');
			wbc()->load->model('category-attribute');

			// check it out link
			$check_it_out_link_type = 'skip';
			$check_it_out_link_label = 'Check it out!';
			$check_it_out_link = '';
			$lbl_txt = 'Congratulations! It seems that you have completed the setup process, click below link to check it out in working on your website.';
			$active_feature = \eo\wbc\controllers\admin\menu\Admin_Menu::active_pair_builder_feature();
			if( !empty($active_feature) && \eo\wbc\controllers\admin\menu\Admin_Menu::is_pair_builder_feature_all_setup() ) {
			
				$configuration_buttons_page = wbc()->options->get_option('configuration','buttons_page',false);
				if( $configuration_buttons_page===0 or $configuration_buttons_page==='0' ) {			
					$check_it_out_link_type = 'link';
					$check_it_out_link = site_url('index.php/design-your-own-ring');
		        }
		        elseif( $configuration_buttons_page==1 or $configuration_buttons_page==3 ) {			
					$check_it_out_link_type = 'link';
					$check_it_out_link = site_url( /*'?#wbc_' only add hashtag to url if required since the user is not setting position on home page they will find our where it is displayed so unnecessarily putting #wbc_ is not good and annoying.*/);
		        }
		        elseif( $configuration_buttons_page==2 ) {			
					$check_it_out_link_type = 'label';
					$check_it_out_link_label = 'You have choose to display buttons using Shortcode only, so please go to the page in which you put the Shortcode to check it.';
					$lbl_txt = 'Congratulations! It seems that you have completed the setup process.';
		        }
			}

			$bonus_features = unserialize(wbc()->options->get_option('setting_status_setting_status_setting','bonus_features',serialize(array())));

			$sample_data = array();
			$sample_data = do_action('eowbc_additional_sample_data',$sample_data);

			$form_definition = 	
					array(
						'config_automation'=>array(
							
								'label'=>'Sample Data',
								'form'=>array(
											'config_automation_section'=>array('label'=>'Install Sample Data','type'=>'segment','desc'=>'Install the sample data containing categorys, attributes and products.'
											),
											'saved_tab_key'=>array(
												'type'=>'hidden',
												'value'=>'',
											),
											'add_sample_data'=>array(
												'label'=>'Add Sample Data',
												'type'=>'devider',
												// 'class'=>array('fluid'),
												// 'size_class'=>array('eight','wide')
											),
											
											'config_automation_shop_category_link'=>(!empty($bonus_features['filters_shop_cat'])?array(
												'label'=>'Click here for automated configuration and setup Shop/Category Filters',
												'type'=>'link',
												'attr'=>array("href='".admin_url('admin.php?page=eowbc&eo_wbc_view_auto_jewel=1&f=filters_shop_cat')."'"),
												'class'=>array('secondary'),
												'visible_info'=>array( 'label'=>'Please visit at '.site_url(get_option('woocommerce_permalinks')['category_base'].'eo_diamond_shape_cat/'),
													'type'=>'visible_info',
													'class'=>array('fluid', 'small'),
													'size_class'=>array('sixteen','wide'),
												),	
											):array()),

											'config_automation_shop_category_link_visible_info'=>(!empty($bonus_features['filters_shop_cat'])?
												array(
													'label'=>'Please visit at '.site_url(get_option('woocommerce_permalinks')['category_base'].'/eo_diamond_shape_cat/')." OR ".site_url(get_option('woocommerce_permalinks')['category_base'].'/eo_setting_shape_cat/')."</br>(The URLs will works with default setting of permalink, if you are using any other setting then follow accodingly)",
													'type'=>'visible_info',
													'class'=>array('fluid', 'medium'),
													'size_class'=>array('sixteen','wide'),
													'inline'=>false,
												):array()),

											'config_automation_link'=>array(
												'label'=>'Click here for automated configuration and setup',
												'type'=>'link',
												'attr'=>array("href='".admin_url('admin.php?page=eowbc&eo_wbc_view_auto_jewel=1&f='.$active_feature)."'"),
												'class'=>array('secondary')	
											),
											'config_automation_visible_info'=>array(
												'label'=>eowbc_lang('We recommend that you try sample data if you have not yet, in addition to providing the preview of how plugin look like on frontend of your website, sample data & configurations will also serve as boilerplate template for configuring the plugin.'),
												'type'=>'visible_info',
												'class'=>array('fluid', 'medium'),
												'size_class'=>array('sixteen','wide'),
												'inline'=>false,
											),
											
											

											/*'config_save_automation'=>array(
												'label'=>'Save',
												'type'=>'button',				
												'class'=>array('primary'),
												'attr'=>array("data-action='save'")
											)*/
											'check_it_out_status'=>array(
												'label'=>'Setup Status',
												'type'=>($check_it_out_link_type != 'skip' ?'devider':$check_it_out_link_type),
												// 'class'=>array('fluid'),
												// 'size_class'=>array('eight','wide')
											),
											'check_it_out_msg'=>array(
												'label'=>$lbl_txt,
												'type'=>($check_it_out_link_type != 'skip' ?'label':$check_it_out_link_type)
											),
											'check_it_out_link'=>array(
												'label'=>$check_it_out_link_label,
												'type'=>$check_it_out_link_type,
												'attr'=>array("href='".$check_it_out_link."'"),
												'class'=>array('secondary')	
											)
										)							
							),
						'config_buttons_conf'=>array(
								'label'=>'Buttons',
								'form'=>array(
									'config_buttons_conf_section'=>array('label'=>'Configure Guidence Buttons','type'=>'segment','desc'=>"Configure the guidence buttona and it's behaviours on the page."
											),
									'buttons_page'=>array(
											'label'=>'Choice button position',
											'type'=>'select',
											'value'=>wbc()->options->get_option('configuration','buttons_page'),
											'validate'=>array('required'=>''),
											'sanitize'=>'sanitize_text_field',
											'options'=>array(
													'0'=>'Custom landing page',
													'1'=>'Home page only',
													'2'=>'Shortcode only',
													'3'=>'Home page and Shortcode'
												),
											'class'=>array('fluid'),
											'size_class'=>array('eight','wide','required'),
											'inline'=>true,
										),
									'visible_info'=>array( 'label'=>'Choose where you want to display the two Start With with Action buttons. If you choose custom landing page a sample landing page will be provided. The Shortcode for the buttons widget is <strong>[woo-bundle-choice-btn]</strong>.',
											'type'=>'visible_info',
											'class'=>array('fluid', 'small'),
											'size_class'=>array('sixteen','wide'),
										),
									'config_buttons_position'=>array(
											'label'=>'Choose where you want to display buttons on home page',
											'type'=>'link',
											'attr'=>array("href='".admin_url('customize.php?autofocus[control]=btn_position_setting_selector_btn')."'"),
											'class'=>array('secondary'/*,'hidden'*/)	
										),
									'config_view_custom_landing_link'=>array(
											'label'=>'View how landing page will look like',
											'type'=>'link',
											'attr'=>array("href='".get_permalink(get_page_by_path('design-your-own-ring'))."'"),
											'class'=>array('secondary'/*,'hidden'*/)	
										),
									'config_devider_make_pair'=>array(
											'label'=>'Make Pair Button',
											'type'=>'devider'
										),
									'config_make_pair_visible_info'=>array( 'label'=>'Make Pair button is a interesting feature for ring builder, pair maker for clothing(be sure to not confuse pair maker with make pair button), etc. If you enable this feature the Make Pair button will appear on item page even if the user is not on the builder process e.g. on diamond page user would see "Add To Ring" button.',
												'type'=>'visible_info',
												'class'=>array('fluid', 'medium'),
												'size_class'=>array('sixteen','wide'),
											),
									'enable_make_pair'=>array(
											'label'=>'Enabled?',
											'type'=>'checkbox',
											'value'=>'',
											'sanitize'=>'sanitize_text_field',
											'options'=>array('1'=>'Make pair button status.'),
											'is_id_as_name'=>true,
											'class'=>array()
										),
									'label_make_pair'=>array(
											'label'=>'Button label',
											'type'=>'text',
											'validate'=>/*( !empty($_POST['enable_make_pair'])?array('required'=>''):array())*/array('validate_if'=>array('enable_make_pair'=>array('required'=>''))),
											'value'=>wbc()->options->get_option('configuration','label_make_pair'),
											'class'=>array(),
											'size_class'=>array('eight','wide','required'),
											'inline'=>true,
										),
									'label_make_pair_visible_info'=>array( 'label'=>'Set applicable text for button e.g. "Add to Ring" if its for jewelry site. Applicable only if switch above is enabled.',
												'type'=>'visible_info',
												'class'=>array('fluid', 'small'),
												'size_class'=>array('sixteen','wide'),
											),
									'config_buttons_conf_save_btn'=>array(
												'label'=>'Save',
												'type'=>'button',		
												'class'=>array('secondary'),
												'attr'=>array("data-action='save'",'data-tab_key="config_buttons_conf"')	
											)
									)
							),
						'config_navigation_conf'=>array(
								'label'=>'Navigations Steps( Breadcrumb )',
								'form'=>array(
									'config_navigation_conf_section'=>array('label'=>'Configure Navigation Steps','type'=>'segment','desc'=>'Configure the navigarion steps and alter the UI of the breadcrumb.'
									),
									'devider_first_cat'=>array(
											'label'=>'First Category',
											'type'=>'devider',
										),
									'first_name'=>array(
											'label'=>'Name',
											'type'=>'select',
											'value'=>wbc()->options->get_option('configuration','first_name'),
											'validate'=>array('required'=>''),
											'sanitize'=>'sanitize_text_field',
											'options'=>\eo\wbc\model\Category_Attribute::instance()->get_category(),
											'class'=>array('fluid'),
											'size_class'=>array('eight','wide','required'),
											'inline'=>true,
										),
									'first_icon'=>array(
											'label'=>'Icon',
											'type'=>'icon',
											'value'=>wbc()->options->get_option('configuration','first_icon'),
											// 'validate'=>array('required'=>''),
											'sanitize'=>'sanitize_text_field',
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									'config_devider_second_cat'=>array(
											'label'=>'Second Category',
											'type'=>'devider',
										),
									'second_name'=>array(
											'label'=>'Name',
											'type'=>'select',
											'value'=>wbc()->options->get_option('configuration','second_name'),
											'validate'=>array('required'=>''),
											'sanitize'=>'sanitize_text_field',
											'options'=>\eo\wbc\model\Category_Attribute::instance()->get_category(),
											'class'=>array('fluid'),
											'size_class'=>array('eight','wide','required'),
											'inline'=>true,
										),
									'second_icon'=>array(
											'label'=>'Icon',
											'type'=>'icon',
											'value'=>wbc()->options->get_option('configuration','second_icon'),
											// 'validate'=>array('required'=>''),
											'sanitize'=>'sanitize_text_field',
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									'config_devider_preview'=>array(
											'label'=>'Preview',
											'type'=>'devider',
										),
									'preview_name'=>array(
											'label'=>'Name',
											'type'=>'text',
											'value'=>wbc()->options->get_option('configuration','preview_name'),
											'validate'=>array('required'=>''),
											'sanitize'=>'sanitize_text_field',
											'class'=>array('fluid'),
											'size_class'=>array('eight','wide','required'),
											'inline'=>true,
										),
									'preview_icon'=>array(
											'label'=>'Icon',
											'type'=>'icon',
											'value'=>wbc()->options->get_option('configuration','preview_icon'),
											// 'validate'=>array('required'=>''),
											'sanitize'=>'sanitize_text_field',
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,

										),
									'devider_alternate_breadcrumb'=>array(
											'label'=>' ',
											'type'=>'devider',
										),	
									'config_alternate_breadcrumb'=>array(
										'label'=>'Alternate Breadcrumb Widgets',
										'type'=>'radio',
										'value'=>wbc()->options->get_option('configuration','config_alternate_breadcrumb','default'),
										'validate'=>array('required'=>''),
										'sanitize'=>'sanitize_text_field',
										'options'=>apply_filters('eowbc_alternate_breadcrumb',array('default'=>'Default','template_1'=>'Template 1','template_2'=>'Template 2')),
										'class'=>array(),										
										'size_class'=>array('required'),
										'visible_info'=>array( 'label'=>'( Switch to other look of breadcrumb. )',
											'type'=>'visible_info',
											'class'=>array('fluid', 'small'),
											'size_class'=>array('sixteen','wide'),
										),	
									),		
									'config_advance_begin'=>array(
										'type'=>'accordian',
										'section_type'=>'start',
										'class'=>array('field'),
										'label'=>'<span class="ui large text">Advanced Setting</span>',
									),									
									'config_clickable_breadcrumb'=>array(
										'label'=>'Clickable Breadcrumbs?',
										'type'=>'checkbox',
										'value'=>'',
										'sanitize'=>'sanitize_text_field',
										'options'=>array('1'=>'Make Breadcrumbs clickable?.'),
										'is_id_as_name'=>true,
										'class'=>array()
									),							
									'config_advance_end'=>array(
										'type'=>'accordian',
										'section_type'=>'end'
									),
									'config_navigation_conf_save_btn'=>array(
												'label'=>'Save',
												'type'=>'button',		
												'class'=>array('secondary'),
												'attr'=>array("data-action='save'",'data-tab_key="config_navigation_conf"')	
											)
									)
							),						
					);
			
			if(!empty($sample_data)){

				$form_definition['config_automation']['form'] = array_merge($form_definition['config_automation']['form'],$sample_data);
			}
					
			$features = unserialize(wbc()->options->get_option('setting_status_setting_status_setting','features',serialize(array())));
					
			if(!empty($features['pair_maker'])) {
				$form_definition['config_extra_conf'] = array(
							'label'=>'Extra',
							'form'=>array(									
								
								'config_devider_pair_maker'=>array(
										'label'=>'Pair Maker Configuration',
										'type'=>'devider',
									),
								/*'config_pair_maker_status'=>array(
										'label'=>'Pair Maker Status',
										'type'=>'checkbox',
										'value'=>array(wbc()->options->get_option('configuration','pair_maker_status')),
										'options'=>array('config_pair_maker_status'=>' Check here to enable pair maker view at second step of category page.'),
										'class'=>array(),
										'size_class'=>array('eight','wide'),
										'inline'=>true,
									),*/
								// 'pair_maker_upper_card'=>array(
								// 		'label'=>'Upper card',
								// 		'type'=>'radio',
								// 		'value'=>wbc()->options->get_option('configuration','pair_maker_upper_card'),
								// 		'sanitize'=>'sanitize_text_field',
								// 		'options'=>array('first'=>'First Category','second'=>'Second Category'),
								// 		'class'=>array(),
								// 		'size_class'=>array('eight','wide'),
								// 		'inline'=>true,
								// 	),					
								'pair_maker_upper_card'=>array(
									'label'=>'Upper Card',
									'type'=>'radio',
									'value'=>'1',
									'sanitize'=>'sanitize_text_field',
									'options'=>array('1'=>'First Category','2'=>'Second Category'),
									'class'=>array(),										
									'size_class'=>array(),
									'visible_info'=>array( 'label'=>'Mark the category\'s card to be always shown at top of other. For example, in clothing should be a top wear category, so you should select either first or second category here based on where you set top wear category i.e. if it is first category setting in navigation or second.',
										'type'=>'visible_info',
										'class'=>array('fluid', 'small'),
										'size_class'=>array('sixteen','wide'),
									),	
								),				
								'config_extra_conf_save_btn'=>array(
											'label'=>'Save',
											'type'=>'button',		
											'class'=>array('secondary'),
											'attr'=>array("data-action='save'",'data-tab_key="config_extra_conf"')
										)
								)
						);
			}

			if($is_add_sample_values) {
				//loop through form tabs and set (random) sample values for each field  
				foreach ($form_definition as $key => $tab) {
			    	foreach ($tab["form"] as $fk => $fv) {
					    //here we can override any particular field which needs specific sample values 
					    if( $fv["type"] == "text" || $fv["type"] == "hidden" || $fv["type"] == "textarea" ) {	//non numeric 
							$form_definition[$key]["form"][$fk]["sample_values"] = array( "abc", "xyz", "def", "uvw" );
					    } 
					    else if( $fv["type"] == "color" ) {	
							$form_definition[$key]["form"][$fk]["sample_values"] = array( "red", "white", "green", "black" );
					    } 
					    
					    //no need to set for select/radio/checkboxes as we can use sample from its available options 
						
					}
			    }
			}
			$form_definition = apply_filters('eowbc_admin_form_configuration', $form_definition );
			return $form_definition;

		}

	}
}		
