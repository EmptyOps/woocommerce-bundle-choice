<?php
defined( 'ABSPATH' ) || exit;
$form = array();

wbc()->load->model('admin/sp_wbc_theme_adaption');

$form['id']='sp_wbc_theme_adaption';
$form['title']='Theme Adaption';
$form['method']='POST';
$form['tabs'] = true;

$form['data'] = \eo\wbc\model\admin\SP_WBC_Theme_Adaption::instance()->get( \eo\wbc\controllers\admin\menu\page\Theme_Adaption::get_form_definition() );
$form['attr']= array('data-is_per_tab_save="true"');


wbc()->load->model('admin\form-builder');
eo\wbc\model\admin\Form_Builder::instance()->build($form);
// wbc()->load->asset('js','admin/configuration');	
