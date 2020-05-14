<?php
defined( 'ABSPATH' ) || exit;

wbc()->load->model('admin\form-builder');

$form = array();

$form['id']='eowbc_appearance';
$form['title']='Appearance Settings';
$form['method']='POST';
$form['tabs'] = true;
$form['data'] = array(
						'wid_btns'=>array(
							
								'label'=>'Buttons Widget',
								'form'=> array_merge( eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "tagline", "Tagline", $hide_defaults=array("backcolor","hovercolor","bordercolor","radius","font","textcolor"), $additional_fields=array(), $info_text_overrides=array("text"=>"Title line of the button widget section") ), 
										array(
											'def_button'=>array(
												'label'=>eowbc_lang('Default Button'),
												'type'=>'checkbox',
												'value'=>array('1'),
												'options'=>array('1'=>' '),
												'class'=>array('fluid'),						
												// 'size_class'=>array('eight','wide'),
												'inline'=>false,

												'visible_info'=>array( 'label'=>eowbc_lang('Use default button styling or custom styling'),
													'type'=>'visible_info',
													'class'=>array('small'),
													// 'size_class'=>array('sixteen','wide'),
												),
											),

										), eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "button", "Button", $hide_defaults=array("font","bordercolor"), $additional_fields=array(), $info_text_overrides=array() )
									)							
							),
						'breadcrumb'=>array(
								'label'=>'Breadcrumb',
								'form'=>eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "breadcrumb", "Breadcrumb", $hide_defaults=array("hovercolor","bordercolor","text","font","textcolor"), $additional_fields=array( array("field_id"=>"breadcrumb_num_icon","field_label"=>"Breadcrumb Number Icon","type"=>"color"), array("field_id"=>"breadcrumb_title","field_label"=>"Breadcrumb Title","type"=>"color"), array("field_id"=>"breadcrumb_actions","field_label"=>"Breadcrumb Actions","type"=>"color"), array("field_id"=>"breadcrumb_showhide_icons","field_label"=>"Breadcrumb Show/Hide Icons","type"=>"checkbox") ), $info_text_overrides=array("breadcrumb_showhide_icons"=>'You can upload icon from configuration page, <a href="wp-admin/admin.php?page=eo-wbc-setting">click here</a> to go to configuration'), "active_inactive" )
							),
						'filters'=>array(
								'label'=>'Filters',
								'form'=>array_merge( eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "header", "Header", $hide_defaults=array("text","backcolor","hovercolor","bordercolor","radius"), $additional_fields=array(), $info_text_overrides=array("font"=>"Font family to be used in filters", "textcolor"=>"Color for headers in filters widget") ), eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "labels", "Labels", $hide_defaults=array("text","backcolor","hovercolor","bordercolor","radius","font"), $additional_fields=array(), $info_text_overrides=array("font"=>"Font family to be used in filters") ),  eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "rest_filters", "rest_filters", $hide_defaults=array("text","textcolor","backcolor","hovercolor","bordercolor","radius","font"), $additional_fields=array( array("field_id"=>"slider_nodes","field_label"=>"Slider Nodes","type"=>"color"), array("field_id"=>"slider_track","field_label"=>"Slider Track","type"=>"color"), array("field_id"=>"icon_size","field_label"=>"Icon Size","type"=>"text"), array("field_id"=>"icon_label_size","field_label"=>"Icon Label Size","type"=>"text") ), $info_text_overrides=array("slider_track"=>"Sets the specified color to slider's tracks between nodes", "icon_size"=>"Define size of icon at filter in px", "icon_label_size"=>"Define size of icon label in rem"), $special_type=null, $default_values = array("icon_size"=>"50px", "icon_label_size"=>"0.78571429rem") )
								)
							),
						'product_page'=>array(
								'label'=>'Product Page',
								'form'=>array(
											'fc_atc_button_text'=>array(
												'label'=>eowbc_lang('First Category Add to Cart Button Text'),
												'type'=>'text',
												'value'=>'',
												'class'=>array('fluid'),						
												'size_class'=>array('eight','wide'),
												'inline'=>false,

												'visible_info'=>array( 'label'=>eowbc_lang('Text to be shown on add to cart button on product page for the first category'),
													'type'=>'visible_info',
													'class'=>array('small'),
													// 'size_class'=>array('sixteen','wide'),
												),
											),
											'sc_atc_button_text'=>array(
												'label'=>eowbc_lang('Second Category Add to Cart Button Text'),
												'type'=>'text',
												'value'=>'',
												'class'=>array('fluid'),						
												'size_class'=>array('eight','wide'),
												'inline'=>false,

												'visible_info'=>array( 'label'=>eowbc_lang('Text to be shown on add to cart button on product page for the second category'),
													'type'=>'visible_info',
													'class'=>array('small'),
													// 'size_class'=>array('sixteen','wide'),
												),
											)
										)
							)
						
						
					);

// wbc()->load->model('admin\form-builder');
eo\wbc\model\admin\Form_Builder::instance()->build($form);
