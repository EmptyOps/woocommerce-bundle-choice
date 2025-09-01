<?php
defined( 'ABSPATH' ) || exit;

wbc()->load->model('admin\form-builder');
wbc()->load->model('admin/eowbc_filters');

$form = array();

$form['id']='eowbc_filters';
$form['title']='Filter Settings';
$form['method']='POST';
$form['tabs'] = true;

$form['data'] = eo\wbc\model\admin\Eowbc_Filters::instance()->get( eo\wbc\controllers\admin\menu\page\Filters::get_form_definition() );
$form['attr']= array('data-is_per_tab_save="true"');

// wbc()->load->model('admin\form-builder');
\eo\wbc\model\admin\Form_Builder::instance()->build($form);
wbc()->load->asset('js','admin/filter');
