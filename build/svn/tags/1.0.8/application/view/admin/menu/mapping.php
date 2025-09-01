<?php
defined( 'ABSPATH' ) || exit;


wbc()->load->model('admin\form-builder');
wbc()->load->model('admin/eowbc_mapping');

$form = array();

$form['id']='eowbc_mapping';
$form['title']= eowbc_lang('Mapping Settings</strong><br/><p class="ui grey test">(These settings control the connection between diamonds and ring in the ring builder process.)</p><strong>');
$form['method']='POST';
$form['tabs'] = true;
$form['data'] = eo\wbc\model\admin\Eowbc_Mapping::instance()->get( eo\wbc\controllers\admin\menu\page\Mapping::get_form_definition() );
$form['attr']= array('data-is_per_tab_save="true"');

// wbc()->load->model('admin\form-builder');
eo\wbc\model\admin\Form_Builder::instance()->build($form);

wbc()->load->asset('js','admin/mapping');	
