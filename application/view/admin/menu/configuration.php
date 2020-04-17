<?php
defined( 'ABSPATH' ) || exit;


$form = array();

$form['id']='eowbc_configuration';
$form['title']='Configuration';
$form['method']='POST';
$form['tabs'] = true;
$form['data'] = array(
						'automation'=>array(
							
								'label'=>'Automatic Configuration',
								'form'=>array(
											'business_type'=>array(
												'label'=>'What do you stand for?',
												'type'=>'select',
												'value'=>'jewelery',
												'options'=>array('jewelery'=>'Jewelery','clothing'=>'Clothing','home_decor'=>'Home Decor','others'=>'Others'),
												'class'=>array('fluid'),
												'size_class'=>array('eight','wide'),
												'inline'=>true,
											),
											'automation_link'=>array(
												'label'=>'Click here for automated configuration and setup',
												'type'=>'link',
												'attr'=>array("href='".admin_url('admin.php?page=eowbc&automated_install=1')."'"),
												'class'=>array('secondary')	
											),
											'save_automation'=>array(
												'label'=>'Save',
												'type'=>'button',
												'attr'=>array("href='".admin_url('admin.php?page=eowbc&automated_install=1')."'"),
												'class'=>array('primary')	
											)
										)							
							),
						'buttons_conf'=>array(
								'label'=>'Buttons',
								'form'=>array(
									'buttons_page'=>array(
											'label'=>'Choice button position',
											'type'=>'select',
											'value'=>'0',
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
									'devider_make_pair'=>array(
											'label'=>'Make Pair Button',
											'type'=>'devider',
										),
									'enable_make_pair'=>array(
											'label'=>'Enabled?',
											'type'=>'checkbox',
											'value'=>array(),
											'options'=>array('make_pair_status'=>'Make pair button status.'),
											'class'=>array()
										),
									'label_make_pair'=>array(
											'label'=>'Button label',
											'type'=>'text',
											'value'=>'',
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									'save_buttons_conf'=>array(
												'label'=>'Save',
												'type'=>'button',		
												'class'=>array('primary')	
											)
									)
							),
						'navigation_conf'=>array(
								'label'=>'Navigations',
								'form'=>array(
									'devider_first_cat'=>array(
											'label'=>'First Category',
											'type'=>'devider',
										),
									'first_name'=>array(
											'label'=>'Name',
											'type'=>'select',
											'value'=>'',
											'options'=>array(),
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									'first_icon'=>array(
											'label'=>'Upload Icon',
											'type'=>'icon',
											'value'=>'',
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									'devider_second_cat'=>array(
											'label'=>'Second Category',
											'type'=>'devider',
										),
									'second_name'=>array(
											'label'=>'Name',
											'type'=>'select',
											'value'=>'',
											'options'=>array(),
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									'second_icon'=>array(
											'label'=>'Upload Icon',
											'type'=>'icon',
											'value'=>'',
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									'devider_preview'=>array(
											'label'=>'Preview',
											'type'=>'devider',
										),
									'preview_name'=>array(
											'label'=>'Name',
											'type'=>'text',
											'value'=>'',
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									'preview_icon'=>array(
											'label'=>'Upload Icon',
											'type'=>'icon',
											'value'=>'0',
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
									'save_buttons_conf'=>array(
												'label'=>'Save',
												'type'=>'button',		
												'class'=>array('primary')	
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
