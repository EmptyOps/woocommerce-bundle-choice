<?php
defined( 'ABSPATH' ) || exit;


$form = array();

$form['id']='eowbc_price_control';
$form['title']=eowbc_lang('Price Control(Beta)');
$form['method']='POST';

$form['data'] = array(

					//section - should be sub array? I think yes... may... be...

					'price_control_section_visible_info'=>array(
						'label'=>eowbc_lang('(Set pricing method to update price in bulk. For eg.: based on gold,diamond price changes, you might want to bulk update prices.)'),
						'type'=>'visible_info',
						'class'=>array('fluid', 'medium'),
						'size_class'=>array('sixteen','wide'),
						'inline'=>false,
						), 
					'price_control_field'=>array(
						'label'=>eowbc_lang('Field'),
						'type'=>'select',
						'value'=>'0',
						'options'=>array('in'=>'India','pk'=>'Pakistan'),
						'class'=>array('fluid'),
						'size_class'=>array('eight','wide'),
						'inline'=>false,
						), 
					'price_control_submit_btn'=>array(
						'label'=>eowbc_lang('Add Pricing Method'),
						'type'=>'button',
						'class'=>array('secondary'),
						//'size_class'=>array('eight','wide'),
						'inline'=>false,
						)
				);


wbc()->load->model('admin\form-builder');
eo\wbc\model\admin\Form_Builder::instance()->build($form);


//pricing methods list
$table = array();
$table['id']='eowbc_price_control_methods_list';
$table['head'] = array(
					0=>array(
						0=>array(
							'is_header' => 1, 
							'val' => 'Field',
							'align'=>'left'
						),
						1=>array(
							'is_header' => 1, 
							'val' => 'Type',
							'align'=>'left'
						),
						2=>array(
							'is_header' => 1, 
							'val' => 'Compare'
						),
						3=>array(
							'is_header' => 1, 
							'val' => 'Value'
						),
					),
				);
$table['body'] = array(
					0=>array(
						0=>array(
							'is_header' => 0, 
							'val' => 'Diamond',
							'align'=>'left'
						),
						1=>array(
							'val' => 'Category',
							'align'=>'left'
						),
						2=>array(
							'val' => ''
						),
						3=>array(
							'val' => ''
						),
					),
				);

// wbc()->load->model('admin\table-builder');
// eo\wbc\model\admin\Table_Builder::instance()->build($table);

$form = array();

$form['id']='eowbc_price_control_pricing_method';
$form['title']= '';	// eowbc_lang('Pricing Method');
$form['method']='POST';

$form['data'] = array(

					//section - should be sub array? I think yes... may... be...

					'pricing_method_list'=>array_merge( $table , array(
						'type'=>'table' )
						), 
					'regular_price_label'=>array(
						'label'=>eowbc_lang('Regular Price'),
						'type'=>'label',
						//'class'=>array('fluid'),
						'size_class'=>array('three','wide'),
						'next_inline'=>true,
						'inline'=>true,
						),
					'regular_price'=>array(
						//'label'=>eowbc_lang('Regular Price'),
						'no_label' => true,
						'placeholder'=>eowbc_lang('Regular Price'),
						'type'=>'text',
						'value'=>'0',
						'options'=>array(),
						//'class'=>array('fluid'),
						'size_class'=>array('three','wide'),
						'prev_inline'=>true,
						'next_inline'=>true,
						'inline'=>true,
						),
					'sales_price_label'=>array(
						'label'=>eowbc_lang('Sales Price'),
						'type'=>'label',
						//'class'=>array('fluid'),
						'size_class'=>array('three','wide'),
						'prev_inline'=>true,
						'next_inline'=>true,
						'inline'=>true,
						),
					'sales_price'=>array(
						//'label'=>eowbc_lang('Sales Price'),
						'no_label' => true,
						'placeholder'=>eowbc_lang('Sales Price'),
						'type'=>'text',
						'value'=>'0',
						'options'=>array(),
						//'class'=>array('fluid'),
						'size_class'=>array('three','wide'),
						'prev_inline'=>true,
						'inline'=>true,
						),
					'submit_btn'=>array(
						'label'=>eowbc_lang('Save Pricing Method'),
						'type'=>'button',
						'class'=>array('secondary'),
						//'size_class'=>array('eight','wide'),
						'inline'=>false,
						)
				);

wbc()->load->model('admin\form-builder');
eo\wbc\model\admin\Form_Builder::instance()->build($form);


//save and update prices
$table = array();
$table['id']='eowbc_save_update_prices_list';
$table['head'] = array(
					0=>array(
						0=>array(
							'is_header' => 1, 
							'val' => 'Action'
						),
						1=>array(
							'is_header' => 1, 
							'val' => 'Price',
							'align'=>'left'
						),
						2=>array(
							'is_header' => 1, 
							'val' => 'Rules'
						),
					),
				);
$table['body'] = array(
					0=>array(
						0=>array(
							'is_header' => 0, 
							'is_icon' => true, 
							'icon_class' => 'close link', 
							'val' => 'x'
						),
						1=>array(
							'val' => 'Regular Price:5<br>Sales Price:4',
							'align'=>'left'
						),
						2=>array(
							'val' => '[Uncategorized]'
						),
					),
				);
// wbc()->load->model('admin\table-builder');
// eo\wbc\model\admin\Table_Builder::instance()->build($table);

$form = array();
$form['id']='eowbc_price_control_save_update_prices';
$form['title']= '';	// eowbc_lang('Pricing Method');
$form['method']='POST';

$form['data'] = array(

					//section - should be sub array? I think yes... may... be...

					'save_update_prices_list'=>array_merge( $table , array(
						'type'=>'table' )
						), 
					'submit_btn'=>array(
						'label'=>eowbc_lang('Save and Update Prices'),
						'type'=>'button',
						'class'=>array('secondary'),
						//'size_class'=>array('eight','wide'),
						'inline'=>false,

						'visible_info'=>array( 'label'=>'(Upon clicking the \'Save and Update Prices\' button, it may take some time to update product prices in bulk.)',
								'type'=>'visible_info',
								'class'=>array('fluid', 'small'),
								'size_class'=>array('sixteen','wide'),
							),
						)
				);

wbc()->load->model('admin\form-builder');
eo\wbc\model\admin\Form_Builder::instance()->build($form);
