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
			/* Language function - comment */ 
			$check_it_out_link_label =  __('Check it out!','woo-bundle-choice');
			$check_it_out_link = '';
			/* Language function - comment */
			$lbl_txt = __('Congratulations! It seems that you have completed the setup process, click below link to check it out in working on your website.','woo-bundle-choice');
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
					/* Language function - comment */
					$check_it_out_link_label = __('You have choose to display buttons using Shortcode only, so please go to the page in which you put the Shortcode to check it.','woo-bundle-choice');
					$lbl_txt = __('Congratulations! It seems that you have completed the setup process.','woo-bundle-choice');
		        }
			}

			$form_definition = 	
					array(
						'config_automation'=>array(
								/* Language function - comment */
								'label'=>__('Sample Data','woo-bundle-choice'),
								'form'=>array(
											'saved_tab_key'=>array(
												'type'=>'hidden',
												'value'=>'',
											),
											'add_sample_data'=>array(
												/* Language function - comment */
												'label'=>__('Add Sample Data','woo-bundle-choice'),
												'type'=>'devider',
												// 'class'=>array('fluid'),
												// 'size_class'=>array('eight','wide')
											),
											'config_automation_link'=>array(
												/* Language function - comment */
												'label'=>__('Click here for automated configuration and setup','woo-bundle-choice'),
												'type'=>'link',
												'attr'=>array("href='".admin_url('admin.php?page=eowbc&eo_wbc_view_auto_jewel=1&f='.$active_feature)."'"),
												'class'=>array('secondary')	
											),
											'config_automation_visible_info'=>array(
												/* Language function - comment */
												'label'=>__('We recommend that you try sample data if you have not yet, in addition to providing the preview of how plugin look like on frontend of your website, sample data & configurations will also serve as boilerplate template for configuring the plugin.','woo-bundle-choice'),
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
												/* Language function - comment */
												'label'=>__('Setup Status','woo-bundle-choice'),
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
							    /* Language function - comment */
								'label'=>__('Buttons','woo-bundle-choice'),
								'form'=>array(
									'buttons_page'=>array(
										    /* Language function - comment */
											'label'=>__('Choice button position','woo-bundle-choice'),
											'type'=>'select',
											'value'=>wbc()->options->get_option('configuration','buttons_page'),
											'validate'=>array('required'=>''),
											'sanitize'=>'sanitize_text_field',
											'options'=>array(
													/* Language function - comment */
													'0'=>__('Custom landing page','woo-bundle-choice'),
													'1'=>__('Home page only','woo-bundle-choice'),
													'2'=>__('Shortcode only','woo-bundle-choice'),
													'3'=>__('Home page and Shortcode','woo-bundle-choice')
												),
											'class'=>array('fluid'),
											'size_class'=>array('eight','wide','required'),
											'inline'=>true,
										),
									/* Language function - comment */
									'visible_info'=>array( 'label'=>__('Choose where you want to display the two Start With with Action buttons. If you choose custom landing page a sample landing page will be provided. The Shortcode for the buttons widget is <strong>[woo-bundle-choice-btn]</strong>.','woo-bundle-choice'),
											'type'=>'visible_info',
											'class'=>array('fluid', 'small'),
											'size_class'=>array('sixteen','wide'),
										),
									'config_buttons_position'=>array(
										    /* Language function - comment */
											'label'=>__('Choose where you want to display buttons on home page','woo-bundle-choice'),
											'type'=>'link',
											'attr'=>array("href='".admin_url('customize.php?autofocus[control]=btn_position_setting_selector_btn')."'"),
											'class'=>array('secondary'/*,'hidden'*/)	
										),
									'config_view_custom_landing_link'=>array(
											/* Language function - comment */
											'label'=>__('View how landing page will look like','woo-bundle-choice'),
											'type'=>'link',
											'attr'=>array("href='".get_permalink(get_page_by_path('design-your-own-ring'))."'"),
											'class'=>array('secondary'/*,'hidden'*/)	
										),
									'config_devider_make_pair'=>array(
											/* Language function - comment */
											'label'=>__('Make Pair Button','woo-bundle-choice'),
											'type'=>'devider'
										),
									/* Language function - comment */
									'config_make_pair_visible_info'=>array( 'label'=>__('Make Pair button is a interesting feature for ring builder, pair maker for clothing(be sure to not confuse pair maker with make pair button), etc. If you enable this feature the Make Pair button will appear on item page even if the user is not on the builder process e.g. on diamond page user would see "Add To Ring" button.','woo-bundle-choice'),
												'type'=>'visible_info',
												'class'=>array('fluid', 'medium'),
												'size_class'=>array('sixteen','wide'),
											),
									'enable_make_pair'=>array(
											/* Language function - comment */
											'label'=>__('Enabled?','woo-bundle-choice'),
											'type'=>'checkbox',
											'value'=>'',
											'sanitize'=>'sanitize_text_field',
											'options'=>array('1'=>'Make pair button status.'),
											'is_id_as_name'=>true,
											'class'=>array()
										),
									'label_make_pair'=>array(
											/* Language function - comment */
											'label'=>__('Button label','woo-bundle-choice'),
											'type'=>'text',
											'validate'=>/*( !empty($_POST['enable_make_pair'])?array('required'=>''):array())*/array('validate_if'=>array('enable_make_pair'=>array('required'=>''))),
											'value'=>wbc()->options->get_option('configuration','label_make_pair'),
											'class'=>array(),
											'size_class'=>array('eight','wide','required'),
											'inline'=>true,
										),
									/* Language function - comment */
									'label_make_pair_visible_info'=>array( 'label'=>__('Set applicable text for button e.g. "Add to Ring" if its for jewelry site. Applicable only if switch above is enabled.','woo-bundle-choice'),
												'type'=>'visible_info',
												'class'=>array('fluid', 'small'),
												'size_class'=>array('sixteen','wide'),
											),
									'config_buttons_conf_save_btn'=>array(
												/* Language function - comment */
												'label'=>__('Save','woo-bundle-choice'),
												'type'=>'button',		
												'class'=>array('primary'),
												'attr'=>array("data-action='save'",'data-tab_key="config_buttons_conf"')	
											)
									)
							),
						'config_navigation_conf'=>array(
								/* Language function - comment */
								'label'=>__('Navigations Steps( Breadcrumb )','woo-bundle-choice'),
								'form'=>array(
									'devider_first_cat'=>array(
											/* Language function - comment */
											'label'=>__('First Category','woo-bundle-choice'),
											'type'=>'devider',
										),
									'first_name'=>array(
											/* Language function - comment */
											'label'=>__('Name','woo-bundle-choice'),
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
											/* Language function - comment */
											'label'=>__('Icon','woo-bundle-choice'),
											'type'=>'icon',
											'value'=>wbc()->options->get_option('configuration','first_icon'),
											// 'validate'=>array('required'=>''),
											'sanitize'=>'sanitize_text_field',
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									'config_devider_second_cat'=>array(
											/* Language function - comment */
											'label'=>__('Second Category','woo-bundle-choice'),
											'type'=>'devider',
										),
									'second_name'=>array(
											/* Language function - comment */
											'label'=>__('Name','woo-bundle-choice'),
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
											/* Language function - comment */
											'label'=>__('Icon','woo-bundle-choice'),
											'type'=>'icon',
											'value'=>wbc()->options->get_option('configuration','second_icon'),
											// 'validate'=>array('required'=>''),
											'sanitize'=>'sanitize_text_field',
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									'config_devider_preview'=>array(
										    /* Language function - comment */
											'label'=>__('Preview','woo-bundle-choice'),
											'type'=>'devider',
										),
									'preview_name'=>array(
										     /* Language function - comment */
											'label'=>__('Name','woo-bundle-choice'),
											'type'=>'text',
											'value'=>wbc()->options->get_option('configuration','preview_name'),
											'validate'=>array('required'=>''),
											'sanitize'=>'sanitize_text_field',
											'class'=>array('fluid'),
											'size_class'=>array('eight','wide','required'),
											'inline'=>true,
										),
									'preview_icon'=>array(
											/* Language function - comment */
											'label'=>__('Icon','woo-bundle-choice'),
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
										/* Language function - comment */
										'label'=>__('Alternate Breadcrumb Widgets','woo-bundle-choice'),
										'type'=>'radio',
										'value'=>wbc()->options->get_option('configuration','config_alternate_breadcrumb','default'),
										'validate'=>array('required'=>''),
										'sanitize'=>'sanitize_text_field',
										/* Language function - comment */
										'options'=>array('default'=>__('Default','woo-bundle-choice'),'template_1'=>__('Template 1','woo-bundle-choice'),'template_2'=>__('Template 2','woo-bundle-choice')/*,'template_3'=>'Template 3'*/),
										'class'=>array(),										
										'size_class'=>array('required'),
										/* Language function - comment */
										'visible_info'=>array( 'label'=>__('( Switch to other look of breadcrumb. )','woo-bundle-choice'),
											'type'=>'visible_info',
											'class'=>array('fluid', 'small'),
											'size_class'=>array('sixteen','wide'),
										),	
									),		
									'config_advance_begin'=>array(
										'type'=>'accordian',
										'section_type'=>'start',
										'class'=>array('field'),
										'label'=>_e('<span class="ui large text">Advanced Setting</span>','woo-bundle-choice'),
									),									
									'config_clickable_breadcrumb'=>array(
										/* Language function - comment */
										'label'=>__('Clickable Breadcrumbs?','woo-bundle-choice'),
										'type'=>'checkbox',
										'value'=>'',
										'sanitize'=>'sanitize_text_field',
										/* Language function - comment */
										'options'=>array('1'=>__('Make Breadcrumbs clickable?.','woo-bundle-choice')),
										'is_id_as_name'=>true,
										'class'=>array()
									),							
									'config_advance_end'=>array(
										'type'=>'accordian',
										'section_type'=>'end'
									),
									'config_navigation_conf_save_btn'=>array(
										/* Language function - comment */
												'label'=>__('Save','woo-bundle-choice'),
												'type'=>'button',		
												'class'=>array('primary'),
												'attr'=>array("data-action='save'",'data-tab_key="config_navigation_conf"')	
											)
									)
							),						
					);
					
			$features = unserialize(wbc()->options->get_option('setting_status_setting_status_setting','features',serialize(array())));
					
			if(!empty($features['pair_maker'])) {
				$form_definition['config_extra_conf'] = array(
						/* Language function - comment */
							'label'=>__('Extra','woo-bundle-choice'),
							'form'=>array(									
								
								'config_devider_pair_maker'=>array(
										/* Language function - comment */
										'label'=>__('Pair Maker Configuration','woo-bundle-choice'),
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
									/* Language function - comment */
									'label'=>__('Upper Card','woo-bundle-choice'),
									'type'=>'radio',
									'value'=>'1',
									'sanitize'=>'sanitize_text_field',
									/* Language function - comment */
									'options'=>array('1'=>__('First Category','woo-bundle-choice'),'2'=>__('Second Category','woo-bundle-choice')),
									'class'=>array(),										
									'size_class'=>array(),
									/* Language function - comment */
									'visible_info'=>array( 'label'=>__('Mark the category\'s card to be always shown at top of other. For example, in clothing should be a top wear category, so you should select either first or second category here based on where you set top wear category i.e. if it is first category setting in navigation or second.','woo-bundle-choice'),
										'type'=>'visible_info',
										'class'=>array('fluid', 'small'),
										'size_class'=>array('sixteen','wide'),
									),	
								),				
								'config_extra_conf_save_btn'=>array(
											/* Language function - comment */
											'label'=>__('Save','woo-bundle-choice'),
											'type'=>'button',		
											'class'=>array('primary'),
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
