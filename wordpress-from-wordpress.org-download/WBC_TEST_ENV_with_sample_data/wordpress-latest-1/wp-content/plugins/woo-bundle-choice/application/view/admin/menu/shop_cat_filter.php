<?php

$form = array();

$form['id']='eowbc_shop_category_filter';
$form['title']='Filters for Shop/Category Page';
$form['method']='POST';
$form['tabs'] = true;



wbc()->load->model('admin/eowbc_shop_category_filter');

$form['data'] = \eo\wbc\model\admin\Eowbc_Shop_Category_Filter::instance()->get(\eo\wbc\controllers\admin\menu\page\Shop_Category_Filter::get_form_definition());
$form['attr']= array('data-is_per_tab_save="true"');

// wbc()->load->model('admin\form-builder');
\eo\wbc\model\admin\Form_Builder::instance()->build($form);
wbc()->load->asset('js','admin/filter');

wbc()->load->asset('js','admin/tiny-feature/shortcode-filter');
wbc()->load->asset('js','admin/tiny-feature/shop-cat');
