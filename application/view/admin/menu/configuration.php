<?php
defined( 'ABSPATH' ) || exit;
$form = array();

wbc()->load->model('admin/sp_wbc_configuration');

$form['id']='sp_wbc_configuration';
$form['title']='General';
$form['method']='POST';
$form['tabs'] = true;

$form['data'] = \eo\wbc\model\admin\SP_WBC_Configuration::instance()->get( \eo\wbc\controllers\admin\menu\page\Configuration::get_form_definition() );
$form['attr']= array('data-is_per_tab_save="true"');


wbc()->load->model('admin\form-builder');
eo\wbc\model\admin\Form_Builder::instance()->build($form);
wbc()->load->asset('js','admin/configuration');	
