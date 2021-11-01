<?php
namespace eo\wbc\controllers\admin\menu\page;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Related_Mapping' ) ) {
	class Related_Mapping extends Mapping {

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

		public static function get_form_definition( $is_add_sample_values = false ,$prefix = '') {
			
			wbc()->load->model('admin/form-builder');
			wbc()->load->model('category-attribute');

			$dropdown_opts_second_cat = $dropdown_opts_first_cat = apply_filters('eowbc_admin_form_mapping_first_cat',\eo\wbc\controllers\admin\menu\page\Mapping::eo_wbc_attributes( \eo\wbc\controllers\admin\menu\page\Mapping::eo_wbc_prime_category(/*wbc()->options->get_option('configuration','first_slug')*/'',' ') ));
			// $dropdown_opts_second_cat = apply_filters('eowbc_admin_form_mapping_second_cat',\eo\wbc\controllers\admin\menu\page\Mapping::eo_wbc_attributes( \eo\wbc\controllers\admin\menu\page\Mapping::eo_wbc_prime_category(''/*wbc()->options->get_option('configuration','second_slug')*/,' ') ));

			//map list
			$table = array();
			$table['id']=$prefix.'_list';
			$table['head'] = array(
								array(
									array(
										'is_header' => 1, 
										'val' => '',
										'is_checkbox' => true, 
										'sanitize'=>'sanitize_text_field',
										'checkbox'=> array('id'=>'dummy','value'=>array(),'options'=>array('row0_col0_chk'=>''),'options_attrs'=>array('row0_col0_chk'=>array('data-action="bulk_select_all"', 'data-bulk_table_id="'.$table["id"].'"')),'class'=>'','where'=>'in_table')
									),
									array(
										'is_header' => 1, 
										'val' => 'First Term',
										'field_id'=>'first_term'
									),
									array(
										'is_header' => 1, 
										'val' => 'Second Term',
										'field_id'=>'second_term'
									),									
								),
							);
			$table['body'] = array(
								array(
									array(
										'val' => eowbc_lang('No map(s) exists, please add some maps.'),
										'colspan' => 3, 
										'class'=> 'red'
									),
								),
							);

			$form_definition = array(
				$prefix.'_preference'=>array(
					'label'=>'Product mapping preference',
					'form'=> array(
						'prod_mapping_pref_section'=>array('label'=>'Configure product mapping','type'=>'segment','desc'=>'Configure the product mapping settings.'
						),
						'saved_tab_key'=>array(
							'type'=>'hidden',
							'value'=>'',
							'sanitize'=>'sanitize_text_field',
							),
						'mapping_preference_tab_visible_info'=>array(
							'label'=>eowbc_lang('(Determine how the product mapping should behave. For example AND means product belongs to both category/attribute A and B, OR means product belongs to either of category/attribute A or B)'),
							'type'=>'visible_info',
							'class'=>array('fluid', 'medium'),
							'size_class'=>array('sixteen','wide'),
							'inline'=>false,
						), 
						'pref_category'=>array(
							'label'=>eowbc_lang('Category'),
							'type'=>'radio',
							'sanitize'=>'sanitize_text_field',
							'value'=>'and',
							'validate'=>array('required'=>''),
							'options'=>array( 'and'=> eowbc_lang('AND'),'or'=>eowbc_lang('OR') ),
							'class'=>array('fluid'),						
							'size_class'=>array('eight','wide','required'),
							'inline'=>false,
						),
						'pref_attribute'=>array(
							'label'=>eowbc_lang('Attribute'),
							'type'=>'radio',
							'value'=>'or',
							'validate'=>array('required'=>''),
							'sanitize'=>'sanitize_text_field',
							'options'=>array( 'and'=> eowbc_lang('AND'),'or'=>eowbc_lang('OR') ),
							'class'=>array('fluid'),						
							'size_class'=>array('eight','wide','required'),
							'inline'=>false,
						),
						'submit_btn'=>array(
							'label'=>eowbc_lang('Save'),
							'type'=>'button',
							'class'=>array('secondary'),
							//'size_class'=>array('eight','wide'),
							'inline'=>false,
							'attr'=>array('data-tab_key="'.$prefix.'_preference"', 'data-action="save"'),
						)
					)
				),							
				$prefix.'_map_master'=>array(
						'label'=>"Map creation and modification",
						'form'=>array(
							'map_creation_modification_section'=>array('label'=>'Add/Edit product maps','type'=>'segment','desc'=>'Add or Edit the product maps.'
							),
							$table["id"].'_bulk'=>array(
								// 'label'=>'Bulk Actions',
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
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
								'attr'=>array('data-tab_key="'.$prefix.'_map_master"', 'data-bulk_table_id="'.$table["id"].'"', 'data-action="bulk"' )
							),
							'list'=>array_merge( $table , array(
								'type'=>'table' )
							), 
							$prefix.'_map_master_id'=>array(
								'type'=>'hidden',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
							),
							'save_sec_title'=>array(
								'label'=>"Add/Edit Maps",
								'type'=>'label',
								'size_class'=>array('eight','wide')
							),							
							
							'first_term_set_all'=>array( 
								'label'=>'All?',
								'type'=>'checkbox',
								'class'=>array('toggle','checkbox','checked'),
								'value'=>1,
								'inline_class'=>array('three'),
								'next_inline'=>true,
								'inline'=>true,
								'visible_info'=>array( 
									'label'=>eowbc_lang('Use this to set a simple rule for product fields, it is easiest way to set rules.'),
									'type'=>'visible_info',
									'class'=>array('small'),
									'size_class'=>array('foure','wide'),
								),
							),
							'emptylabel4'=>array(
								'label'=>'<------------->',
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('two','wide','first_option'),
								'prev_inline'=>true,
								'next_inline'=>true,
								'inline'=>true,
							),
							'second_term_down_limit'=>array(
								'label'=>'Down side limit',
								'type'=>'number',
								'class'=>array('fluid', 'small','field'),
								'size_class'=>array('first_option'),
								'prev_inline'=>true,
								'inline'=>true,
								'visible_info'=>array( 
									'label'=>eowbc_lang('Specify the number of units to go down in the range of field values, if you are setting rule on attribute then unit of field values would be a single attribute option withing the attribute option range.'),
									'type'=>'visible_info',
									'class'=>array('small'),
									'size_class'=>array('foure','wide'),
									'attr'=>array('style'=>'display:block;')
								),
							),
							'first_term_attribute'=>array(
								'label'=>'Product Fields',
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								/*'validate'=>array('required'=>''),*/
								'options'=>array_replace(array('__price__'=>'Price'),\eo\wbc\model\Category_Attribute::instance()->get_attributs()),
								'class'=>array('fluid','search','clearable'),
								'inline_class'=>array('three'),
								'next_inline'=>true,
								'inline'=>true,
								'size_class'=>array('first_option'),
								/*'size_class'=>array('required'),*/
							),
							'emptylabel5'=>array( 
								'label'=>'&nbsp;',
								'type'=>'label',				
								'size_class'=>array('two','wide','first_option'),
								'prev_inline'=>true,
								'next_inline'=>true,
								'inline'=>true,							
							),							
							'second_term_upper_limit'=>array(
								'label'=>'Upper side limit',
								'type'=>'number',
								'class'=>array('fluid', 'small','field'),
								'size_class'=>array('first_option'),
								'prev_inline'=>true,
								'inline'=>true,
								'visible_info'=>array( 
									'label'=>eowbc_lang('Specify the number of units to go up in the range of field values, if you are setting rule on attribute then unit of field values would be a single attribute option withing the attribute option range.'),
									'type'=>'visible_info',
									'class'=>array('small'),
									'size_class'=>array('foure','wide'),
									'attr'=>array('style'=>'display:block;')
								),
							),

							'first_term'=>array(
								'label'=>'First field',
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								/*'validate'=>array('required'=>''),*/
								'options'=>$dropdown_opts_first_cat,	//array('0'=>'Category 1', '1'=>'Category 2','2'=>'Attribute 1', '3'=>'Attribute 2',),
								'class'=>array('fluid','search','clearable'),
								'inline_class'=>array('three'),
								'next_inline'=>true,
								'inline'=>true,
								'size_class'=>array('second_option hidden'),
								/*'size_class'=>array('required'),*/
							),
							'emptylabel1'=>array(
								'label'=>'<------------->',
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('two','wide','second_option hidden'),
								'prev_inline'=>true,
								'next_inline'=>true,
								'inline'=>true,
							),
							'second_term'=>array(
								'label'=>'Second field',
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								/*'validate'=>array('required'=>''),*/
								'options'=>$dropdown_opts_second_cat,	//array('0'=>'Category 1', '1'=>'Category 2','2'=>'Attribute 1', '3'=>'Attribute 2',),
								'class'=>array('fluid','search','clearable'),
								'prev_inline'=>true,
								'inline'=>true,
								'size_class'=>array('second_option hidden'),
								/*'size_class'=>array('required'),*/
							),

							'first_term_range'=>array(
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'options'=>$dropdown_opts_first_cat,	//array('0'=>'Category 1', '1'=>'Category 2','2'=>'Attribute 1', '3'=>'Attribute 2',),
								'class'=>array('fluid'),
								'inline_class'=>array('three', 'range_section'),
								'next_inline'=>true,
								'inline'=>true,
								'size_class'=>array('second_option hidden'),
								/*'size_class'=>array('required'),*/
							),
							'emptylabel2'=>array(
								'label'=>'<------------->',
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('two','wide','second_option hidden'),
								'prev_inline'=>true,
								'next_inline'=>true,
								'inline'=>true,
							),
							'second_term_range'=>array(
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'options'=>$dropdown_opts_second_cat,	//array('0'=>'Category 1', '1'=>'Category 2','2'=>'Attribute 1', '3'=>'Attribute 2',),
								'class'=>array('fluid'),
								'prev_inline'=>true,
								'inline'=>true,
								'size_class'=>array('second_option hidden'),
								/*'size_class'=>array('required'),*/
							),

							'eo_wbc_first_category_vis_info'=>array( 
								'label'=>'Select sub-category or attribute from first category.',
								'type'=>'visible_info',
								'class'=>array('fluid', 'small','field'),
								'inline_class'=>array('three'),
								'next_inline'=>true,
								'inline'=>true,
								'size_class'=>array('second_option hidden'),
							),
							'emptylabel3'=>array(
								'label'=>'<------------->',
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('two','wide','second_option hidden'),
								'prev_inline'=>true,
								'next_inline'=>true,
								'inline'=>true,
							),
							'eo_wbc_second_category_vis_info'=>array(
								'label'=>'Select sub-category or attribute from second category.',
								'type'=>'visible_info',
								'class'=>array('fluid', 'small','field'),
								'prev_inline'=>true,
								'inline'=>true,
								'size_class'=>array('second_option hidden'),
							),




							$prefix.'_map_master_save'=>array(
								'label'=>eowbc_lang('Save'),
								'type'=>'button',
								'class'=>array('secondary'),
								//'size_class'=>array('eight','wide'),
								'inline'=>false,
								'attr'=>array('data-tab_key="'.$prefix.'_map_master"', 'data-action="save"'),
							)
						)
					),
				
			);
						
			return $form_definition;

		}

	}
}		
