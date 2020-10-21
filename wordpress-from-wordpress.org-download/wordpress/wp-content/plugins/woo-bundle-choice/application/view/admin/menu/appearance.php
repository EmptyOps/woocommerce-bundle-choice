<?php
defined( 'ABSPATH' ) || exit;

wbc()->load->model('admin/form-builder');
wbc()->load->model('admin/eowbc_appearance');

$form = array();

$form['id']='eowbc_appearance';
$form['title']='Appearance Settings';
$form['method']='POST';
$form['tabs'] = true;

$form['data'] = eo\wbc\model\admin\Eowbc_Appearance::instance()->get( eo\wbc\controllers\admin\menu\page\Appearance::get_form_definition() );
$form['attr']= array('data-is_per_tab_save="true"');
// $form['submit_button'] = array(
// 							'label'=>eowbc_lang('Save Appearance Settings'),
// 							'type'=>'button',
// 							'class'=>array('primary'),
// 							//'size_class'=>array('eight','wide'),
// 							'attr'=>array("data-action='save'"),
// 							'inline'=>false
// 						);

// wbc()->load->model('admin\form-builder');
eo\wbc\model\admin\Form_Builder::instance()->build($form);
