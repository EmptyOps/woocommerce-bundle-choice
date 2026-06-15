<?php
defined( 'ABSPATH' ) || exit;

$form = array();

$form['id']='sp_wbc_shortcode_filters';
$form['title']='Display Filters using Shortcode';
$form['method']='POST';
$form['tabs'] = true;



wbc()->load->model('admin/sp_wbc_shortcode_filters');

$form['data'] = \eo\wbc\model\admin\SP_WBC_Shortcode_Filters::instance()->get(\eo\wbc\controllers\admin\menu\page\Shortcode_Filters::get_form_definition());
$form['attr']= array('data-is_per_tab_save="true"');

// wbc()->load->model('admin\form-builder');
\eo\wbc\model\admin\Form_Builder::instance()->build($form);
wbc()->load->asset('js','admin/filter');

