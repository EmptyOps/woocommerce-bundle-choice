<?php
namespace eo\wbc\controllers\admin\menu\page;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Theme_Adaption' ) ) {
	class Theme_Adaption {

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

			//Run Check list
			$table = array();
			$table['id']='eowbc_run_check_list';
			$table['head'] = array(
								0=>array(
									// 0=>array(
									// 	'is_header' => 1, 
									// 	'val' => '',
									// 	'is_checkbox' => true, 
									// 	'sanitize'=>'sanitize_text_field',
									// 	'checkbox'=> array('id'=>'dummy','value'=>array(),'options'=>array('row0_col0_chk'=>''),'options_attrs'=>array('row0_col0_chk'=>array('data-action="bulk_select_all"', 'data-bulk_table_id="'.$table["id"].'"')),'class'=>'','where'=>'in_table')
									// ),
									0=>array(
										'is_header' => 1, 
										'val' => 'Page Section',
										'field_id'=>'eo_wbc_page_section'
									),
									1=>array(
										'is_header' => 1, 
										'val' => 'Run Check',
										'field_id'=>'eo_wbc_run_check'
									),
									2=>array(
										'is_header' => 1, 
										'val' => 'Status',
										'field_id'=>'eo_wbc_status'
									),
								),
							);
			$table['body'] = array(
								0=>array(
									0=>array(
										'val' => eowbc_lang('No page sections available to check.'),
										'colspan' => 3, 
										'class'=> 'red'
									),
								),
							);

			//result list
			$result_table = array();
			$result_table['id']='eowbc_result_list';
			$result_table['head'] = array(
								0=>array(
									0=>array(
										'is_header' => 1, 
										'val' => 'Page Section',
										'field_id'=>'eo_wbc_page_section'
									),
									1=>array(
										'is_header' => 1, 
										'val' => 'Required',
										'field_id'=>'eo_wbc_required'
									),
									2=>array(
										'is_header' => 1, 
										'val' => 'Key',
										'field_id'=>'eo_wbc_key'
									),
									3=>array(
										'is_header' => 1, 
										'val' => 'Type',
										'field_id'=>'eo_wbc_type'
									),
									4=>array(
										'is_header' => 1, 
										'val' => 'Tested On URL',
										'field_id'=>'eo_wbc_testedOn_url'
									),
									5=>array(
										'is_header' => 1, 
										'val' => 'Result',
										'field_id'=>'eo_wbc_result'
									),
								),
							);
			$result_table['body'] = array(
								0=>array(
									0=>array(
										'val' => eowbc_lang('No results available yet'),
										'colspan' => 6, 
										'class'=> 'red'
									),
								),
							);

			$form_definition = array(
				'theme_adaption_general'=>array(
					'label'=>'General Settings',
					'form'=> array(
						'theme_adaption_run_check_section'=>array('label'=>'Run Check','type'=>'segment','desc'=>'Click on links in Run Check column next to the each Page Sections and then refresh this page to see its status'
						),
						'saved_tab_key'=>array(
							'type'=>'hidden',
							'value'=>'',
							'sanitize'=>'sanitize_text_field',
						),
						// 'theme_adaption_general_tab_visible_info'=>array(
						// 	'label'=>eowbc_lang('(Determine how the product theme_adaption should behave. For example AND means product belongs to both category/attribute A and B, OR means product belongs to either of category/attribute A or B)'),
						// 	'type'=>'visible_info',
						// 	'class'=>array('fluid', 'medium'),
						// 	'size_class'=>array('sixteen','wide'),
						// 	'inline'=>false,
						// ), 
						'list'=>array_merge( $table , array(
							'type'=>'table' )
						), 


						'theme_adaption_result_section'=>array('label'=>'Results','type'=>'segment','desc'=>'If the results are false for any mandatory items then you can set alternate hooks or selector if they are supported in your theme, to do so visit the Selector tab on the admin panel. And if that does not help then contact support.'
						),
						'resultlist'=>array_merge( $result_table , array(
							'type'=>'table' )
						), 
					)
				),							
				// 'map_creation_modification'=>array(
				// 		'label'=>"Map creation and modification",
				// 		'form'=>array(
				// 			'map_creation_modification_section'=>array('label'=>'Add/Edit product maps','type'=>'segment','desc'=>'Add or Edit the product maps.'
				// 			),
				// 			$table["id"].'_bulk'=>array(
				// 				// 'label'=>'Bulk Actions',
				// 				'type'=>'select',
				// 				'value'=>'',
				// 				'sanitize'=>'sanitize_text_field',
				// 				'options'=>array(''=>eowbc_lang('Bulk Actions'), 'delete'=>'Delete'),
				// 				'class'=>array('fluid'),
				// 				'size_class'=>array('two','wide'),
				// 				'next_inline'=>true,
				// 				'inline'=>true,
				// 			),
				// 			'd_fconfig_submit_btn_bulk'=>array(
				// 				'label'=>'Apply',
				// 				'type'=>'button',
				// 				'class'=>array('secondary'),
				// 				// 'size_class'=>array('eight','wide'),
				// 				'prev_inline'=>true,
				// 				'inline'=>true,
				// 				'attr'=>array('data-tab_key="map_creation_modification"', 'data-bulk_table_id="'.$table["id"].'"', 'data-action="bulk"' )
				// 			),
				// 			'list'=>array_merge( $table , array(
				// 				'type'=>'table' )
				// 			), 
				// 			'map_creation_modification_id'=>array(
				// 				'type'=>'hidden',
				// 				'value'=>'',
				// 				'sanitize'=>'sanitize_text_field',
				// 			),
				// 			'save_sec_title'=>array(
				// 				'label'=>"Add/Edit Maps",
				// 				'type'=>'label',
				// 				'size_class'=>array('eight','wide')
				// 			),
				// 			'range_first'=>array(
				// 				'type'=>'checkbox',
				// 				'value'=>array(''),
				// 				'sanitize'=>'sanitize_text_field',
				// 				'options'=>array('1'=>eowbc_lang('Select range?')),
				// 				'is_id_as_name'=>true,
				// 				'inline_class'=>array('three'),
				// 				'style'=>'normal_without_parent_div',
				// 				'next_inline'=>true,
				// 				'inline'=>true,								
				// 			),
				// 			'emptylabel'=>array(
				// 				'label'=>'<------------->',
				// 				'type'=>'label',
				// 				//'class'=>array('fluid'),
				// 				'size_class'=>array('two','wide'),
				// 				'prev_inline'=>true,
				// 				'next_inline'=>true,
				// 				'inline'=>true,
				// 			),
				// 			'range_second'=>array(
				// 				'type'=>'checkbox',
				// 				'value'=>array(''),
				// 				'sanitize'=>'sanitize_text_field',
				// 				'options'=>array('1'=>eowbc_lang('Select range?')),
				// 				'is_id_as_name'=>true,
				// 				'style'=>'normal_without_parent_div',
				// 				'prev_inline'=>true,
				// 				'inline'=>true,
				// 			),

				// 			'eo_wbc_first_category'=>array(
				// 				'label'=>'First field',
				// 				'type'=>'select',
				// 				'value'=>'',
				// 				'sanitize'=>'sanitize_text_field',
				// 				'validate'=>array('required'=>''),
				// 				'options'=>$dropdown_opts_first_cat,	//array('0'=>'Category 1', '1'=>'Category 2','2'=>'Attribute 1', '3'=>'Attribute 2',),
				// 				'class'=>array('fluid','search','clearable'),
				// 				'inline_class'=>array('three'),
				// 				'next_inline'=>true,
				// 				'inline'=>true,
				// 				'size_class'=>array('required'),
				// 			),
				// 			'emptylabel1'=>array(
				// 				'label'=>'<------------->',
				// 				'type'=>'label',
				// 				//'class'=>array('fluid'),
				// 				'size_class'=>array('two','wide'),
				// 				'prev_inline'=>true,
				// 				'next_inline'=>true,
				// 				'inline'=>true,
				// 			),
				// 			'eo_wbc_second_category'=>array(
				// 				'label'=>'Second field',
				// 				'type'=>'select',
				// 				'value'=>'',
				// 				'sanitize'=>'sanitize_text_field',
				// 				'validate'=>array('required'=>''),
				// 				'options'=>$dropdown_opts_second_cat,	//array('0'=>'Category 1', '1'=>'Category 2','2'=>'Attribute 1', '3'=>'Attribute 2',),
				// 				'class'=>array('fluid','search','clearable'),
				// 				'prev_inline'=>true,
				// 				'inline'=>true,
				// 				'size_class'=>array('required'),
				// 			),

				// 			'eo_wbc_first_category_range'=>array(
				// 				'type'=>'select',
				// 				'value'=>'',
				// 				'sanitize'=>'sanitize_text_field',
				// 				'options'=>$dropdown_opts_first_cat,	//array('0'=>'Category 1', '1'=>'Category 2','2'=>'Attribute 1', '3'=>'Attribute 2',),
				// 				'class'=>array('fluid'),
				// 				'inline_class'=>array('three', 'range_section'),
				// 				'next_inline'=>true,
				// 				'inline'=>true,
				// 				'size_class'=>array('required'),
				// 			),
				// 			'emptylabel2'=>array(
				// 				'label'=>'<------------->',
				// 				'type'=>'label',
				// 				//'class'=>array('fluid'),
				// 				'size_class'=>array('two','wide'),
				// 				'prev_inline'=>true,
				// 				'next_inline'=>true,
				// 				'inline'=>true,
				// 			),
				// 			'eo_wbc_second_category_range'=>array(
				// 				'type'=>'select',
				// 				'value'=>'',
				// 				'sanitize'=>'sanitize_text_field',
				// 				'options'=>$dropdown_opts_second_cat,	//array('0'=>'Category 1', '1'=>'Category 2','2'=>'Attribute 1', '3'=>'Attribute 2',),
				// 				'class'=>array('fluid'),
				// 				'prev_inline'=>true,
				// 				'inline'=>true,
				// 				'size_class'=>array('required'),
				// 			),

				// 			'eo_wbc_first_category_vis_info'=>array( 
				// 				'label'=>'Select sub-category or attribute from first category.',
				// 				'type'=>'visible_info',
				// 				'class'=>array('fluid', 'small','field'),
				// 				'inline_class'=>array('three'),
				// 				'next_inline'=>true,
				// 				'inline'=>true,
				// 			),
				// 			'emptylabel3'=>array(
				// 				'label'=>'<------------->',
				// 				'type'=>'label',
				// 				//'class'=>array('fluid'),
				// 				'size_class'=>array('two','wide'),
				// 				'prev_inline'=>true,
				// 				'next_inline'=>true,
				// 				'inline'=>true,
				// 			),
				// 			'eo_wbc_second_category_vis_info'=>array(
				// 				'label'=>'Select sub-category or attribute from second category.',
				// 				'type'=>'visible_info',
				// 				'class'=>array('fluid', 'small','field'),
				// 				'prev_inline'=>true,
				// 				'inline'=>true,
				// 			),

				// 			'eo_wbc_add_discount'=>array(
				// 				'no_label' => true,
				// 				'type'=>'text',
				// 				'value'=>'0',
				// 				'sanitize'=>'sanitize_text_field',
				// 				'size_class'=>array('one','wide'),
				// 				// 'prev_inline'=>true,
				// 				// 'next_inline'=>true,
				// 				// 'inline'=>true,

				// 				'visible_info'=>array( 'label'=>'Discount rate in %',
				// 					'type'=>'visible_info',
				// 					'class'=>array('fluid', 'small'),
				// 					'size_class'=>array('eight','wide','required'),
				// 				),
				// 			),
							
				// 			'map_creation_modification_save_btn'=>array(
				// 				'label'=>eowbc_lang('Save'),
				// 				'type'=>'button',
				// 				'class'=>array('secondary'),
				// 				//'size_class'=>array('eight','wide'),
				// 				'inline'=>false,
				// 				'attr'=>array('data-tab_key="map_creation_modification"', 'data-action="save"'),
				// 			)
				// 		)
					// ),
				
			);
			
			$form_definition = apply_filters('eowbc_admin_form_theme_adaption',$form_definition);

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
