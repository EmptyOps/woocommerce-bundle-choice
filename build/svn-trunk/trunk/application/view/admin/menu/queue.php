<?php
defined( 'ABSPATH' ) || exit;
$form = array();

wbc()->load->model('admin/eowbc_queue');

$form['id']='eowbc_queue';
$form['title']='Sync Queue';
$form['method']='POST';
$form['tabs'] = true;

$form['data'] = \eo\wbc\model\admin\Eowbc_Queue::instance()->get( \eo\wbc\controllers\admin\menu\page\Queue::get_form_definition() );
$form['attr']= array('data-is_per_tab_save="true"');


wbc()->load->model('admin\form-builder');
eo\wbc\model\admin\Form_Builder::instance()->build($form);
// wbc()->load->asset('js','admin/configuration');	
