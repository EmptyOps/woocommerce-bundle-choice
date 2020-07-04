<?php
defined( 'ABSPATH' ) || exit;
$form = array();

wbc()->load->model('admin/eowbc_configuration');

$form['id']='eowbc_configuration';
$form['title']='General';
$form['method']='POST';
$form['tabs'] = true;

$form['data'] = \eo\wbc\model\admin\Eowbc_Configuration::instance()->get( \eo\wbc\controllers\admin\menu\page\Configuration::get_form_definition() );
$form['attr']= array('data-is_per_tab_save="true"');


wbc()->load->model('admin\form-builder');
eo\wbc\model\admin\Form_Builder::instance()->build($form);
wbc()->load->asset('js','admin/configuration');	
