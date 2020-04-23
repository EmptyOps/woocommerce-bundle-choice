<?php
defined( 'ABSPATH' ) || exit;
$form = array();

$form['id']='eowbc_configuration';
$form['title']='Configuration';
$form['method']='POST';
$form['tabs'] = true;
$form['data'] = array(
						'config_automation'=>array(
							
								'label'=>'Automatic Configuration',
								'form'=>array(
											'config_business_type'=>array(
												'label'=>'What do you stand for?',
												'type'=>'select',
												'value'=>wbc()->options->get_option('configuration','business_type'),
												'options'=>array('jewelery'=>'Jewelery','clothing'=>'Clothing','home_decor'=>'Home Decor','others'=>'Others'),
												'class'=>array('fluid'),
												'size_class'=>array('eight','wide'),
												'inline'=>true,
											),
											'config_automation_link'=>array(
												'label'=>'Click here for automated configuration and setup',
												'type'=>'link',
												'attr'=>array("href='".admin_url('admin.php?page=eowbc&automated_install=1')."'"),
												'class'=>array('secondary')	
											),
											'config_save_automation'=>array(
												'label'=>'Save',
												'type'=>'button',				
												'class'=>array('primary'),
												'attr'=>array("data-action='save'")
											)
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
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
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
								'label'=>'Navigations',
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
											'class'=>array(),
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
											'class'=>array(),
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
											'class'=>array(),
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
									'config_save_buttons_conf'=>array(
												'label'=>'Save',
												'type'=>'button',		
												'class'=>array('primary'),
												'attr'=>array("data-action='save'")	
											)
									)
							),
						'config_extra_conf'=>array(
								'label'=>'Extra',
								'form'=>array(
									'config_devider_filter'=>array(
											'label'=>'Filter Configuration',
											'type'=>'devider',
										),
									'config_filter_status'=>array(
											'label'=>'Filter Status',
											'type'=>'checkbox',
											'value'=>array(wbc()->options->get_option('configuration','filter_status')),
											'options'=>array('config_filter_status'=>' Check here to enable horizontal filter bar at category page.'),
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									
									'config_devider_pair_maker'=>array(
											'label'=>'Pair Maker Configuration',
											'type'=>'devider',
										),
									'config_pair_maker_status'=>array(
											'label'=>'Pair Maker Status',
											'type'=>'checkbox',
											'value'=>array(wbc()->options->get_option('configuration','pair_maker_status')),
											'options'=>array('config_pair_maker_status'=>' Check here to enable pair maker view at second step of category page.'),
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
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
							)
						
						
					);
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
