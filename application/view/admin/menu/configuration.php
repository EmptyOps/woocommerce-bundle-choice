<?php
defined( 'ABSPATH' ) || exit;
$form = array();

$form['id']='eowbc_configuration';
$form['title']='General';
$form['method']='POST';
$form['tabs'] = true;
$form['data'] = array(
						'config_automation'=>array(
							
								'label'=>'Sample Data',
								'form'=>array(
											'config_automation_visible_info'=>array(
												'label'=>eowbc_lang('This section will help you add sample data and configurations automatically so that you can preview how it would like after complete setup.'),
												'type'=>'visible_info',
												'class'=>array('fluid', 'medium'),
												'size_class'=>array('sixteen','wide'),
												'inline'=>false,
											),		
											'config_automation_link'=>array(
												'label'=>'Click here for automated configuration and setup',
												'type'=>'link',
												'attr'=>array("href='".admin_url('admin.php?page=eowbc&eo_wbc_view_auto_jewel=1')."'"),
												'class'=>array('secondary')	
											),
											/*'config_save_automation'=>array(
												'label'=>'Save',
												'type'=>'button',				
												'class'=>array('primary'),
												'attr'=>array("data-action='save'")
											)*/
										)							
							),
						'config_buttons_conf'=>array(
								'label'=>'Buttons',
								'form'=>array(
									'config_buttons_page'=>array(
											'label'=>'Choice button position',
											'type'=>'select',
											'value'=>wbc()->options->get_option('configuration','buttons_page'),
											'options'=>array(
													'0'=>'Custom landing page',
													'1'=>'Home page only',
													'2'=>'Shortcode only',
													'3'=>'Home page and Shortcode'
												),
											'class'=>array('fluid'),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									'config_buttons_position'=>array(
												'label'=>'Choose where you want to display buttons on home page',
												'type'=>'link',
												'attr'=>array("href='".admin_url('customize.php?autofocus[control]=btn_position_setting_selector_btn')."'"),
												'class'=>array('secondary'/*,'hidden'*/)	
											),
									'config_devider_make_pair'=>array(
											'label'=>'Make Pair Button',
											'type'=>'devider',
										),
									'config_enable_make_pair'=>array(
											'label'=>'Enabled?',
											'type'=>'checkbox',
											'value'=>array(wbc()->options->get_option('configuration','enable_make_pair')),
											'options'=>array('config_enable_make_pair'=>'Make pair button status.'),
											'class'=>array()
										),
									'config_label_make_pair'=>array(
											'label'=>'Button label',
											'type'=>'text',
											'value'=>wbc()->options->get_option('configuration','label_make_pair'),
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									'config_save_buttons_conf'=>array(
												'label'=>'Save',
												'type'=>'button',		
												'class'=>array('primary'),
												'attr'=>array("data-action='save'")	
											)
									)
							),
						'config_navigation_conf'=>array(
								'label'=>'Navigations Steps( Breadcrumb )',
								'form'=>array(
									'devider_first_cat'=>array(
											'label'=>'First Category',
											'type'=>'devider',
										),
									'config_first_name'=>array(
											'label'=>'Name',
											'type'=>'select',
											'value'=>wbc()->options->get_option('configuration','first_name'),
											'options'=>eo\wbc\model\Category_Attribute::instance()->get_category(),
											'class'=>array('fluid'),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									'config_first_icon'=>array(
											'label'=>'Icon',
											'type'=>'icon',
											'value'=>wbc()->options->get_option('configuration','first_icon'),
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									'config_devider_second_cat'=>array(
											'label'=>'Second Category',
											'type'=>'devider',
										),
									'config_second_name'=>array(
											'label'=>'Name',
											'type'=>'select',
											'value'=>wbc()->options->get_option('configuration','second_name'),
											'options'=>eo\wbc\model\Category_Attribute::instance()->get_category(),
											'class'=>array('fluid'),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									'config_second_icon'=>array(
											'label'=>'Icon',
											'type'=>'icon',
											'value'=>wbc()->options->get_option('configuration','second_icon'),
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									'config_devider_preview'=>array(
											'label'=>'Preview',
											'type'=>'devider',
										),
									'config_preview_name'=>array(
											'label'=>'Name',
											'type'=>'text',
											'value'=>wbc()->options->get_option('configuration','preview_name'),
											'class'=>array('fluid'),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									'config_preview_icon'=>array(
											'label'=>'Icon',
											'type'=>'icon',
											'value'=>wbc()->options->get_option('configuration','preview_icon'),	
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									'devider_alternate_breadcrumb'=>array(
											'label'=>' ',
											'type'=>'devider',
										),	
									'config_alternate_breadcrumb'=>array(
										'label'=>'Alternate Breadcrumb',
										'type'=>'radio',
										'value'=>wbc()->options->get_option('configuration','config_alternate_breadcrumb','default'),
										'options'=>array('default'=>'Default','template_1'=>'Template 1','template_2'=>'Template 2'),
										'class'=>array(),
										'visible_info'=>array( 'label'=>'( Switch to other look of breadcrumb. )',
											'type'=>'visible_info',
											'class'=>array('fluid', 'small'),
											'size_class'=>array('sixteen','wide'),
										),	
									),								
									'config_save_buttons_conf'=>array(
												'label'=>'Save',
												'type'=>'button',		
												'class'=>array('primary'),
												'attr'=>array("data-action='save'")	
											)
									)
							),						
					);
					
					$features = unserialize(wbc()->options->get_option('setting_status_setting_status_setting','features',serialize(array())));
					
					if(!empty($features['pair_maker'])) {
						$form['data']['config_extra_conf'] = array(
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
										'config_pair_maker_upper_card'=>array(
												'label'=>'Icon',
												'type'=>'radio',
												'value'=>wbc()->options->get_option('configuration','pair_maker_upper_card'),
												'options'=>array('first'=>'First Category','second'=>'Second Category'),
												'class'=>array(),
												'size_class'=>array('eight','wide'),
												'inline'=>true,
											),								
										'config_save_buttons_conf'=>array(
													'label'=>'Save',
													'type'=>'button',		
													'class'=>array('primary'),
													'attr'=>array("data-action='save'")
												)
										)
								);
					}
/*$form['data'] = array(

					'eowbc_configuration_section_visible_info'=>array(
						'label'=>eowbc_lang('(Set pricing method to update price in bulk. For eg.: based on gold,diamond price changes, you might want to bulk update prices.)'),
						'type'=>'visible_info',
						'class'=>array('fluid', 'medium'),
						'size_class'=>array('sixteen','wide'),
						'inline'=>false,
						), 
					'form_text'=>array(
						'label'=>'Form Text',
						'type'=>'text',
						'value'=>'0',
						'options'=>array(),
						'class'=>array('fluid'),
						'size_class'=>array('sixteen','wide'),
						'inline'=>true,

						'visible_info'=>array( 'label'=>'lorem ipsum lorem ipsum lorem ipsum lorem ipsumlorem ipsum lorem ipsum',
								'type'=>'visible_info',
								'class'=>array('fluid', 'small'),
								'size_class'=>array('sixteen','wide'),
							),

						'info_icon'=>array( 'text'=>'lorem ipsum lorem ipsum lorem ipsum lorem ipsumlorem ipsum lorem ipsum',
								'type'=>'info_icon',
								'inline'=>true,
							),
						),	
					'form_textare'=>array(
						'label'=>'Form Textasf asdf ',
						'type'=>'text',
						'value'=>'0',
						'options'=>array(),
						'class'=>array('fluid'),
						'size_class'=>array('eight','wide'),
						'inline'=>false,
						),
					'sele'=>array(
						'label'=>'Seletc test',
						'type'=>'select',
						'value'=>'0',
						'options'=>array('in'=>'India','pk'=>'Pakistan'),
						'class'=>array('fluid'),
						'size_class'=>array('eight','wide'),
						'inline'=>false,
						),
					'tarea'=>array(
						'label'=>'fill area',
						'type'=>'textarea',*/
						/*'value'=>'0',*/
						/*'options'=>array(),
						'class'=>array('fluid'),
						'size_class'=>array('eight','wide'),
						'inline'=>false,
						),
					'radio'=>array(
						'label'=>'Radio Check?',
						'type'=>'radio',
						'value'=>'lbl_1',
						'options'=>array('lbl_1'=>'Label 1','lbl_2'=>'Label 2','lbl_3'=>'Label 3'),
						'class'=>array('fluid'),						
						),
					'checkbox'=>array(
						'label'=>'chech Check?',
						'type'=>'checkbox',
						'value'=>array('chk_1','chk_3'),
						'options'=>array('chk_1'=>'Label 1','chk_2'=>'Label 2','chk_3'=>'Label 3'),
						'class'=>array('fluid'),						
						)
				);*/


wbc()->load->model('admin\form-builder');
eo\wbc\model\admin\Form_Builder::instance()->build($form);
wbc()->load->asset('js','admin/configuration');	
