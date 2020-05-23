<?php

defined( 'ABSPATH' ) || exit;
$form = array();

$form['id']='eowbc_tiny_features';
$form['title']='Tiny Features';
$form['method']='POST';
$form['tabs'] = true;
$form['data'] = array(
						'tiny_features_home_filter'=>array(
							
								'label'=>'Filters for Home',
								'form'=>array(											
										)							
							),
						'tiny_features_shop_cat_filter'=>array(
								'label'=>'Filters for Shop/Category Page',
								'form'=>array(									
									)
							),
						'tiny_features_item_page_option'=>array(
								'label'=>'Options UI for Item Page',
								'form'=>array()
									
							),
						'tiny_features_specification_view'=>array(
								'label'=>'Specifications View for Item Page',
								'form'=>array(
									'tiny_features_devider_specification_view'=>array(
											'label'=>'Specification View Configuration',
											'type'=>'devider',
										),
									'tiny_features_specification_view_status'=>array(
											'label'=>'Enable Specifications View?',
											'type'=>'checkbox',
											'value'=>array(wbc()->options->get_option('tiny_features','specification_view_status')),
											'options'=>array('specification_view_status'=>' Check here to enable specification view at product page.'),
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									
									'tiny_features_devider_specification_view_more_config'=>array(
											'label'=>'',
											'type'=>'devider',
										),
									'tiny_features_specification_view_shortcode_status'=>array(
											'label'=>'Shortcode Status',
											'type'=>'checkbox',
											'value'=>array(wbc()->options->get_option('tiny_features','specification_view_shortcode_status')),
											'options'=>array('specification_view_shortcode_status'=>' Check here to enable shortcode feature of specification view at product page (Use <strong>[woo-bundle-choice-specification-view] </strong> as Shortcode).'),
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
											'visible_info'=>array( 'label'=>eowbc_lang('(Please clean product description area on product page for better UI/UX.)'),
												'type'=>'visible_info',
												'class'=>array('small'),
												// 'size_class'=>array('sixteen','wide'),
											),											
										),
									'tiny_features_specification_view_default_status'=>array(
											'label'=>'At Default Position - Item/Product Page',
											'type'=>'checkbox',
											'value'=>array(wbc()->options->get_option('tiny_features','specification_view_default_status')),
											'options'=>array('specification_view_default_status'=>'Check here to enable shortcode feature of specification view at specification section on product page.'),
											'class'=>array(),
											'size_class'=>array('eight','wide'),
											'inline'=>true,
										),
									'tiny_features_save_specification_view'=>array(
												'label'=>'Save',
												'type'=>'button',		
												'class'=>array('primary'),
												'attr'=>array("data-action='save'")	
											)
									)									
								)
							);

wbc()->load->model('admin\form-builder');
eo\wbc\model\admin\Form_Builder::instance()->build($form);
//wbc()->load->asset('js','admin/configuration');