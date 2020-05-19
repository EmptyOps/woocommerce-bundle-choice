<?php
namespace eo\wbc\controllers\admin\menu\page;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Filters' ) ) {
	class Filters {

		private static $_instance;
		public static function instance() {
		if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;
			}

			return self::$_instance;
		}

		private function __construct() {
			// no implementation.
		}

		public static function get_form_definition( $is_add_sample_values = false ) {
			
			wbc()->load->model('admin/form-builder');

			//Diamond Page Filter Configuration's list
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
						'val' => 'Filter'
					),
					2=>array(
						'is_header' => 1, 
						'val' => 'Label'
					),
					3=>array(
						'is_header' => 1, 
						'val' => 'Advance Filter'
					),
					4=>array(
						'is_header' => 1, 
						'val' => 'Input Type'
					),
					5=>array(
						'is_header' => 1, 
						'val' => 'Column Width'
					),
					6=>array(
						'is_header' => 1, 
						'val' => 'Ordering'
					),
				),
			);
			$table['body'] = array(
				// 0=>array(
				// 	0=>array(
				// 		'is_header' => 0, 
				// 		'val' => '',
				// 		'is_checkbox' => true, 
				// 		'checkbox'=> array('id'=>'dummy','value'=>array('row0_col0_chk'),'options'=>array('row0_col0_chk'=>''),'class'=>'','where'=>'in_table')
				// 	),
				// 	1=>array(
				// 		'val' => 'Diamond'
				// 	),
				// 	2=>array(
				// 		'val' => 'Diamond'
				// 	),
				// 	3=>array(
				// 		'val' => 'No'
				// 	),
				// 	4=>array(
				// 		'val' => 'Input Type'
				// 	),
				// 	5=>array(
				// 		'val' => 'Column Width'
				// 	),
				// 	6=>array(
				// 		'val' => 'Ordering'
				// 	),
				// ),
				0=>array(
					0=>array( 
						'val' => eowbc_lang("No filter(s) exists, please add some filters."),
						'colspan' => 7
					),
				),
			);

			//Setting Page Filter Configuration's list
			$sett_table = array();
			$sett_table['id']='eowbc_price_control_methods_list';
			$sett_table['head'] = array(
				0=>array(
					0=>array(
						'is_header' => 1, 
						'val' => '',
						'is_checkbox' => true, 
						'checkbox'=> array('id'=>'dummy','value'=>array(),'options'=>array('row0_col0_chk'=>''),'class'=>'','where'=>'in_table')
					),
					1=>array(
						'is_header' => 1, 
						'val' => 'Filter'
					),
					2=>array(
						'is_header' => 1, 
						'val' => 'Label'
					),
					3=>array(
						'is_header' => 1, 
						'val' => 'Advance Filter'
					),
					4=>array(
						'is_header' => 1, 
						'val' => 'Input Type'
					),
					5=>array(
						'is_header' => 1, 
						'val' => 'Column Width'
					),
					6=>array(
						'is_header' => 1, 
						'val' => 'Ordering'
					),
				),
			);
			$sett_table['body'] = array(
				// 0=>array(
				// 	0=>array(
				// 		'is_header' => 0, 
				// 		'val' => '',
				// 		'is_checkbox' => true, 
				// 		'checkbox'=> array('id'=>'dummy','value'=>array('row0_col0_chk'),'options'=>array('row0_col0_chk'=>''),'class'=>'','where'=>'in_table')
				// 	),
				// 	1=>array(
				// 		'val' => 'Diamond'
				// 	),
				// 	2=>array(
				// 		'val' => 'Diamond'
				// 	),
				// 	3=>array(
				// 		'val' => 'No'
				// 	),
				// 	4=>array(
				// 		'val' => 'Input Type'
				// 	),
				// 	5=>array(
				// 		'val' => 'Column Width'
				// 	),
				// 	6=>array(
				// 		'val' => 'Ordering'
				// 	),
				// ),
				0=>array(
					0=>array( 
						'val' => eowbc_lang("No filter(s) exists, please add some filters."),
						'colspan' => 7
					),
				),
			);

			$form_definition = array(
				'altr_filt_widgts'=>array(
					'label'=>'Alternate Filter Widgets',
					'form'=> array(
						'saved_tab_key'=>array(
							'type'=>'hidden',
							'value'=>'',
							),
						'first_category'=>array(
							'label'=>eowbc_lang('First Category'),
							'type'=>'radio',
							'value'=>'fc1',
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
							'type'=>'radio',
							'value'=>'sc1',
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
							'attr'=>array('data-tab_key="altr_filt_widgts"'),
						)
					)
				),							
				'd_fconfig'=>array(
						'label'=>"Diamond Page Filter Configuration",
						'form'=>array( 'bulk_action'=>array(
								// 'label'=>'Bulk Actions',
								'type'=>'select',
								'value'=>'',
								'options'=>array(''=>eowbc_lang('Bulk Actions'), '1'=>'Delete'),
								'class'=>array('fluid'),
								'size_class'=>array('two','wide'),
								'next_inline'=>true,
								'inline'=>true,
							),
							'd_fconfig_submit_btn_bulk'=>array(
								'label'=>'Apply',
								'type'=>'button',
								'class'=>array('secondary'),
								// 'size_class'=>array('eight','wide'),
								'prev_inline'=>true,
								'inline'=>true,
							),
							'list'=>array_merge( $table , array(
								'type'=>'table' )
							), 

							'save_sec_title'=>array(
								'label'=>"Add Diamond Shape's filter",
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
							'd_fconfig_is_advanced'=>array(
								'type'=>'checkbox',
								'value'=>array('1'),
								'options'=>array('1'=>'Is it advanced filter?'),
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
							'd_fconfig_add_reset_link'=>array(
								'type'=>'checkbox',
								'value'=>array('1'),
								'options'=>array('1'=>'Add reset link?'),
								'class'=>array('fluid'),
								'style'=>'normal',
								'prev_inline'=>true,
								'inline'=>true,
							),

							'submit_btn'=>array(
								'label'=>eowbc_lang('Save'),
								'type'=>'button',
								'class'=>array('secondary'),
								//'size_class'=>array('eight','wide'),
								'inline'=>false,
								'attr'=>array('data-tab_key="d_fconfig"'),
							)
						)
					),
				's_fconfig'=>array(
						'label'=>"Settings Page Filter Configuration",
						'form'=>array( 'bulk_action'=>array(
								// 'label'=>'Bulk Actions',
								'type'=>'select',
								'value'=>'',
								'options'=>array(''=>eowbc_lang('Bulk Actions'), '1'=>'Delete'),
								'class'=>array('fluid'),
								'size_class'=>array('two','wide'),
								'next_inline'=>true,
								'inline'=>true,
							),
							's_fconfig_submit_btn_bulk'=>array(
								'label'=>'Apply',
								'type'=>'button',
								'class'=>array('secondary'),
								// 'size_class'=>array('eight','wide'),
								'prev_inline'=>true,
								'inline'=>true,
							),
							'list'=>array_merge( $sett_table, array(
								'type'=>'table' )
							), 

							'save_sec_title'=>array(
								'label'=>"Add Setting Shape's filter",
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
							's_fconfig_is_advanced'=>array(
								'type'=>'checkbox',
								'value'=>array('1'),
								'options'=>array('1'=>'Is it advanced filter?'),
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
							's_fconfig_add_reset_link'=>array(
								'type'=>'checkbox',
								'value'=>array('1'),
								'options'=>array('1'=>'Add reset link?'),
								'class'=>array('fluid'),
								'style'=>'normal',
								'prev_inline'=>true,
								'inline'=>true,
							),

							'submit_btn'=>array(
								'label'=>eowbc_lang('Save'),
								'type'=>'button',
								'class'=>array('secondary'),
								//'size_class'=>array('eight','wide'),
								'inline'=>false,
								'attr'=>array('data-tab_key="s_fconfig"'),
							)
						)
					),
				
				
			);

			if($is_add_sample_values) {
				//loop through form tabs and set (random) sample values for each field  
				foreach ($form_definition as $key => $tab) {
			    	foreach ($tab["form"] as $fk => $fv) {
					    //here we can override any particular field which needs specific sample values 
					    if( $fv["type"] == "text" || $fv["type"] == "hidden" || $fv["type"] == "textarea" ) {	//non numeric 
							$form_definition[$key]["form"][$fk]["sample_values"] = array( "abc", "xyz", "def", "uvw" );
					    } 
					    else if( $fv["type"] == "color" ) {	
							$form_definition[$key]["form"][$fk]["sample_values"] = array( "red", "white", "green", "black" );
					    } 
					    
					    //no need to set for select/radio/checkboxes as we can use sample from its available options 
						
					}
			    }
			}

			return $form_definition;

		}

	}
}		
