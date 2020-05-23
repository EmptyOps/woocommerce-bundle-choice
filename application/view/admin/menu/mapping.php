<?php
defined( 'ABSPATH' ) || exit;

//map list
$table = array();
$table['id']='eowbc_price_control_methods_list';
$table['head'] = array(
					0=>array(
						0=>array(
							'is_header' => 1, 
							'val' => '',
							'is_checkbox' => true, 
							'checkbox'=> array('id'=>'dummy','value'=>array(),'options'=>array('row0_col0_chk'=>''),'class'=>'','where'=>'in_table')
						),
						1=>array(
							'is_header' => 1, 
							'val' => 'First Term'
						),
						2=>array(
							'is_header' => 1, 
							'val' => 'Second Term'
						),
						3=>array(
							'is_header' => 1, 
							'val' => 'Discount'
						),
					),
				);
$table['body'] = array(
					0=>array(
						0=>array(
							'val' => 'No map(s) exists, please add some maps.',
							'colspan' => 4, 
							'class'=> 'red'
						),
					),
				);


wbc()->load->model('admin\form-builder');

$form = array();

$form['id']='eowbc_mapping';
$form['title']='Mapping Settings';
$form['method']='POST';
$form['tabs'] = true;
$form['data'] = array(
						'prod_mapping_pref'=>array(
							'label'=>'Product mapping preference',
							'form'=> array(
								'first_category'=>array(
									'label'=>eowbc_lang('First Category'),
									'type'=>'checkbox',
									'value'=>array('fc1'),
									'options'=>array('fc1'=>'Default(Grid View)','fc2'=>'Expand/Collapse'),
									'class'=>array('fluid'),						
									// 'size_class'=>array('eight','wide'),
									'inline'=>false,

									'visible_info'=>array( 'label'=>eowbc_lang('Applies to first category page in the ring builder process'),
										'type'=>'visible_info',
										'class'=>array('small'),
										// 'size_class'=>array('sixteen','wide'),
									),
								),
								'second_category'=>array(
									'label'=>eowbc_lang('Second Category'),
									'type'=>'checkbox',
									'value'=>array('sc1'),
									'options'=>array('sc1'=>'Default(Grid View)','sc2'=>'Expand/Collapse'),
									'class'=>array('fluid'),						
									// 'size_class'=>array('eight','wide'),
									'inline'=>false,

									'visible_info'=>array( 'label'=>eowbc_lang('Applies to second category page in the ring builder process'),
										'type'=>'visible_info',
										'class'=>array('small'),
										// 'size_class'=>array('sixteen','wide'),
									),
								),
								'submit_btn'=>array(
									'label'=>eowbc_lang('Save'),
									'type'=>'button',
									'class'=>array('secondary'),
									//'size_class'=>array('eight','wide'),
									'inline'=>false,
								)
							)
						),							
						'map_creation_modification'=>array(
								'label'=>"Map creation and modification",
								'form'=>array( 'list'=>array_merge( $table , array(
										'type'=>'table' )
									), 

									'save_sec_title'=>array(
										'label'=>"Add New Maps",
										'type'=>'label',
										'size_class'=>array('eight','wide')
									),
									'filter_label'=>array(
										'label'=>eowbc_lang('Filter'),
										'type'=>'label',
										//'class'=>array('fluid'),
										'size_class'=>array('three','wide'),
										'next_inline'=>true,
										'inline'=>true,
									),
									'filter'=>array(
										'type'=>'select',
										'value'=>'',
										'options'=>array('0'=>'Category 1', '1'=>'Category 2','2'=>'Attribute 1', '3'=>'Attribute 2',),
										'class'=>array('fluid'),
										'size_class'=>array('three','wide'),
										'prev_inline'=>true,
										'next_inline'=>true,
										'inline'=>true,
									),
									'label_label'=>array(
										'label'=>eowbc_lang('Label'),
										'type'=>'label',
										//'class'=>array('fluid'),
										'size_class'=>array('three','wide'),
										'prev_inline'=>true,
										'next_inline'=>true,
										'inline'=>true,
									),
									'label'=>array(
										'no_label' => true,
										//'placeholder'=>eowbc_lang('Sales Price'),
										'type'=>'text',
										'value'=>'0',
										//'options'=>array(),
										//'class'=>array('fluid'),
										'size_class'=>array('three','wide'),
										'prev_inline'=>true,
										'next_inline'=>true,
										'inline'=>true,
									),
									'is_advanced'=>array(
										'type'=>'checkbox',
										'value'=>array('chk_1'),
										'options'=>array('chk_1'=>'Is it advanced filter?'),
										'class'=>array('fluid'),
										'style'=>'normal',
										'prev_inline'=>true,
										'inline'=>true,
									),

									'column_width_label'=>array(
										'label'=>eowbc_lang('Column Width'),
										'type'=>'label',
										//'class'=>array('fluid'),
										'size_class'=>array('three','wide'),
										'next_inline'=>true,
										'inline'=>true,
									),
									'column_width'=>array(
										'no_label' => true,
										'type'=>'text',
										'value'=>'0',
										'size_class'=>array('three','wide'),
										'prev_inline'=>true,
										'next_inline'=>true,
										'inline'=>true,
									),
									'ordering_label'=>array(
										'label'=>eowbc_lang('Ordering'),
										'type'=>'label',
										//'class'=>array('fluid'),
										'size_class'=>array('three','wide'),
										'prev_inline'=>true,
										'next_inline'=>true,
										'inline'=>true,
									),
									'ordering'=>array(
										'no_label' => true,
										'type'=>'text',
										'value'=>'0',
										'size_class'=>array('three','wide'),
										'prev_inline'=>true,
										'next_inline'=>true,
										'inline'=>true,
									),
									'input_type_label'=>array(
										'label'=>eowbc_lang('Input Type'),
										'type'=>'label',
										//'class'=>array('fluid'),
										'size_class'=>array('three','wide'),
										'prev_inline'=>true,
										'next_inline'=>true,
										'inline'=>true,
									),
									'input_type'=>array(
										'type'=>'select',
										'value'=>'',
										'options'=>array('0'=>'Icon Only'),
										'class'=>array('fluid'),
										'size_class'=>array('three','wide'),
										'prev_inline'=>true,
										'inline'=>true,
									),
									
									'icon_size_label'=>array(
										'label'=>eowbc_lang('Icon Size'),
										'type'=>'label',
										//'class'=>array('fluid'),
										'size_class'=>array('three','wide'),
										'next_inline'=>true,
										'inline'=>true,
									),
									'icon_size'=>array(
										'no_label' => true,
										'type'=>'text',
										'value'=>'0',
										'size_class'=>array('three','wide'),
										'prev_inline'=>true,
										'next_inline'=>true,
										'inline'=>true,
									),
									'icon_label_size_label'=>array(
										'label'=>eowbc_lang('Icon Label Size'),
										'type'=>'label',
										//'class'=>array('fluid'),
										'size_class'=>array('three','wide'),
										'prev_inline'=>true,
										'next_inline'=>true,
										'inline'=>true,
									),
									'icon_label_size'=>array(
										'no_label' => true,
										'type'=>'text',
										'value'=>'0',
										'size_class'=>array('three','wide'),
										'prev_inline'=>true,
										'next_inline'=>true,
										'inline'=>true,
									),
									'add_reset_link'=>array(
										'type'=>'checkbox',
										'value'=>array('chk_1'),
										'options'=>array('chk_1'=>'Add reset link?'),
										'class'=>array('fluid'),
										'style'=>'normal',
										'prev_inline'=>true,
										'inline'=>true,
									),

									'submit_btn'=>array(
										'label'=>eowbc_lang('Save New Map'),
										'type'=>'button',
										'class'=>array('secondary'),
										//'size_class'=>array('eight','wide'),
										'inline'=>false,
									)
								)
							),
						
					);

// wbc()->load->model('admin\form-builder');
eo\wbc\model\admin\Form_Builder::instance()->build($form);
