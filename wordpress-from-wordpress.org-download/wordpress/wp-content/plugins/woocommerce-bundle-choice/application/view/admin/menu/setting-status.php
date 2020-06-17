<?php
defined( 'ABSPATH' ) || exit;
$form = array();

wbc()->load->model('admin/eowbc_setting_status');
wbc()->load->model('admin/form-builder');

$form['id']='eowbc_setting_staus';
$form['title']='Setting & Status';
$form['method']='POST';
$form['tabs'] = true;
$form['data'] = \eo\wbc\model\admin\Eowbc_Setting_Status::instance()->get( eo\wbc\controllers\admin\menu\page\Setting_Status::get_form_definition());

wbc()->load->model('admin\form-builder');
eo\wbc\model\admin\Form_Builder::instance()->build($form);
wbc()->load->asset('js','admin/setting_status');	
