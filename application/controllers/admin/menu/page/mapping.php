<?php
namespace eo\wbc\controllers\admin\menu\page;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Mapping' ) ) {
	class Mapping {

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
										'val' => eowbc_lang('No map(s) exists, please add some maps.'),
										'colspan' => 4, 
										'class'=> 'red'
									),
								),
							);

			$form_definition = array(
				'prod_mapping_pref'=>array(
					'label'=>'Product mapping preference',
					'form'=> array(
						'saved_tab_key'=>array(
							'type'=>'hidden',
							'value'=>'',
							),
						'mapping_preference_tab_visible_info'=>array(
							'label'=>eowbc_lang('(Determine how the product mapping should behave. For example AND means product belongs to both category/attribute A and B, OR means product belongs to either of category/attribute A or B)'),
							'type'=>'visible_info',
							'class'=>array('fluid', 'medium'),
							'size_class'=>array('sixteen','wide'),
							'inline'=>false,
						), 
						'prod_mapping_pref_category'=>array(
							'label'=>eowbc_lang('Category'),
							'type'=>'radio',
							'value'=>'and',
							'options'=>array( 'and'=> eowbc_lang('AND'),'or'=>eowbc_lang('OR') ),
							'class'=>array('fluid'),						
							// 'size_class'=>array('eight','wide'),
							'inline'=>false,
						),
						'prod_mapping_pref_attribute'=>array(
							'label'=>eowbc_lang('Attribute'),
							'type'=>'radio',
							'value'=>'or',
							'options'=>array( 'and'=> eowbc_lang('AND'),'or'=>eowbc_lang('OR') ),
							'class'=>array('fluid'),						
							// 'size_class'=>array('eight','wide'),
							'inline'=>false,
						),
						'submit_btn'=>array(
							'label'=>eowbc_lang('Save'),
							'type'=>'button',
							'class'=>array('secondary'),
							//'size_class'=>array('eight','wide'),
							'inline'=>false,
							'attr'=>array('data-tab_key="prod_mapping_pref"', 'data-action="save"'),
						)
					)
				),							
				'map_creation_modification'=>array(
						'label'=>"Map creation and modification",
						'form'=>array( 
							$table["id"].'_bulk'=>array(
								// 'label'=>'Bulk Actions',
								'type'=>'select',
								'value'=>'',
								'options'=>array(''=>eowbc_lang('Bulk Actions'), 'delete'=>'Delete'),
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
								'attr'=>array('data-tab_key="map_creation_modification"', 'data-bulk_table_id="'.$table["id"].'"', 'data-action="bulk"' )
							),
							'list'=>array_merge( $table , array(
								'type'=>'table' )
							), 

							'save_sec_title'=>array(
								'label'=>"Add New Maps",
								'type'=>'label',
								'size_class'=>array('eight','wide')
							),
							'range_first'=>array(
								'type'=>'checkbox',
								'value'=>array(''),
								'options'=>array('range_first'=>eowbc_lang('Select range?')),
								'inline_class'=>array('three'),
								'style'=>'normal_without_parent_div',
								'next_inline'=>true,
								'inline'=>true,
							),
							'emptylabel'=>array(
								'label'=>'<------------->',
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('two','wide'),
								'prev_inline'=>true,
								'next_inline'=>true,
								'inline'=>true,
							),
							'range_second'=>array(
								'type'=>'checkbox',
								'value'=>array(''),
								'options'=>array('range_second'=>eowbc_lang('Select range?')),
								'style'=>'normal_without_parent_div',
								'prev_inline'=>true,
								'inline'=>true,
							),

							'eo_wbc_first_category'=>array(
								'type'=>'select',
								'value'=>'',
								'options'=>array('0'=>'Category 1', '1'=>'Category 2','2'=>'Attribute 1', '3'=>'Attribute 2',),
								'class'=>array('fluid'),
								'inline_class'=>array('three'),
								'next_inline'=>true,
								'inline'=>true,
							),
							'emptylabel1'=>array(
								'label'=>'<------------->',
								'type'=>'label',
								//'class'=>array('fluid'),
								// 'size_class'=>array('two','wide'),
								'prev_inline'=>true,
								'next_inline'=>true,
								'inline'=>true,
							),
							'eo_wbc_second_category'=>array(
								'type'=>'select',
								'value'=>'',
								'options'=>array('0'=>'Category 1', '1'=>'Category 2','2'=>'Attribute 1', '3'=>'Attribute 2',),
								'class'=>array('fluid'),
								'prev_inline'=>true,
								'inline'=>true,
							),

							'eo_wbc_first_category_range'=>array(
								'type'=>'select',
								'value'=>'',
								'options'=>array('0'=>'Category 1', '1'=>'Category 2','2'=>'Attribute 1', '3'=>'Attribute 2',),
								'class'=>array('fluid'),
								'inline_class'=>array('three', 'range_section'),
								'next_inline'=>true,
								'inline'=>true,
							),
							'emptylabel2'=>array(
								'label'=>'<------------->',
								'type'=>'label',
								//'class'=>array('fluid'),
								// 'size_class'=>array('two','wide'),
								'prev_inline'=>true,
								'next_inline'=>true,
								'inline'=>true,
							),
							'eo_wbc_second_category_range'=>array(
								'type'=>'select',
								'value'=>'',
								'options'=>array('0'=>'Category 1', '1'=>'Category 2','2'=>'Attribute 1', '3'=>'Attribute 2',),
								'class'=>array('fluid'),
								'prev_inline'=>true,
								'inline'=>true,
							),

							'eo_wbc_first_category_vis_info'=>array( 
								'label'=>'Select sub-category or attribute from first category.',
								'type'=>'visible_info',
								'class'=>array('fluid', 'small'),
								'inline_class'=>array('three'),
								'next_inline'=>true,
								'inline'=>true,
							),
							'emptylabel3'=>array(
								'label'=>'<------------->',
								'type'=>'label',
								//'class'=>array('fluid'),
								// 'size_class'=>array('two','wide'),
								'prev_inline'=>true,
								'next_inline'=>true,
								'inline'=>true,
							),
							'eo_wbc_second_category_vis_info'=>array(
								'label'=>'Select sub-category or attribute from second category.',
								'type'=>'visible_info',
								'class'=>array('fluid', 'small'),
								'prev_inline'=>true,
								'inline'=>true,
							),

							'eo_wbc_add_discount'=>array(
								'no_label' => true,
								'type'=>'text',
								'value'=>'0',
								'size_class'=>array('one','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,

								'visible_info'=>array( 'label'=>'Discount rate in %',
									'type'=>'visible_info',
									'class'=>array('fluid', 'small'),
									'size_class'=>array('eight','wide'),
								),
							),
							
							'submit_btn'=>array(
								'label'=>eowbc_lang('Save New Map'),
								'type'=>'button',
								'class'=>array('secondary'),
								//'size_class'=>array('eight','wide'),
								'inline'=>false,
								'attr'=>array('data-tab_key="map_creation_modification"', 'data-action="save"'),
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
