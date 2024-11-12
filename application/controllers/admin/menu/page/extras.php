<?php
namespace eo\wbc\controllers\admin\menu\page;

defined('ABSPATH') || exit;

if (!class_exists('Extras')) {
	class Extras {

		private static $_instance;
		public static function instance() {
			if (!isset(self::$_instance)) {
				self::$_instance = new self;
			}

			return self::$_instance;
		}

		private function __construct() {
			// no implementation.
		}

		public static function get_form_definition($is_add_sample_values = false) {

			$page_slug = wbc()->sanitize->get('page');
			$plugin_slug = null;
			$extras_config = null;

			if(!empty($page_slug)){
				
				$plugin_slug = explode("---", $page_slug)[0];
				$extras_config = apply_filters('sp_wbc_extras_config', $plugin_slug);
			}
			
			wbc()->load->model('admin/form-builder');

			$form_definition = array(
				'extras_general' => array(
					'label' => 'General',
					'form' => array(
						'extras_general_section' => array(
							'label' => 'General',
							'type' => 'segment',
							'desc' => 'Nothing available here yet'
						),
						'resolver_path'=>array(
							'type'=>'hidden',
							'value'=>constant('EOWBC_DIRECTORY').'application/controllers/ajax/eowbc_extras.php',
						),
						'saved_tab_key' => array(
							'type' => 'hidden',
							'value' => '',
							'sanitize' => 'sanitize_text_field',
						),
						// 'extras_general_tab_visible_info'=>array(
						// 	'label'=>eowbc_lang('(Determine how the product extra should behave. For example AND means product belongs to both category/attribute A and B, OR means product belongs to either of category/attribute A or B)'),
						// 	'type'=>'visible_info',
						// 	'class'=>array('fluid', 'medium'),
						// 	'size_class'=>array('sixteen','wide'),
						// 	'inline'=>false,
						// ), 

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

			if( empty($extras_config['configuration_section']['is_skip_this_section']) ) {

				$form_definition['extras_configuration'] =  array(
					'label' => 'Configuration',
					'form' => array(
						'extras_configuration_section' => array(
							'label' => 'Configuration',
							'type' => 'segment',
							'desc' => 'Extras configuration'
						),
						'token' => array(
							'label' => 'Token',
							'type' => 'text',
							'sanitize' => 'sanitize_text_field',
							'value' => '',
							'class' => array(),
						),
						--	aa switch na setting tabal view ma enabal on cetegory page switch sathe compare karavu.
						'activate' => array(
							'label' => 'Activate',
							'type' => 'checkbox',
							'sanitize' => 'sanitize_text_field',
							'value' => array(),
							'options' => array('activate' => ' '),
							'class' => array(),
							'size_class' => array('eight','wide'),
							'inline' => true,
							'eas' => array('ihk' => null --	value need to be passed here extras config mathi avase., 'ep' => ''--	value need to be passed here extras config mathi avase., 'au' => ''--	value need to be passed here extras config mathi avase., 'dap' => true),
						),
						'activate_main_fk' => array(
							'type' => 'hidden',
							'value' => 'activate',
							--	underscort and singlatone function appen karavanu avse te nichena fild ma pan karavu.
							'easf' => 'activate',
						),
						'extras_save_btn' => array(
							'label' => eowbc_lang('Save'),
							'type' => 'button',
							'class' => array('secondary'),
							//'size_class'=>array('eight','wide'),
							'inline' => false,
							'attr' => array('data-tab_key="extras_configuration"', 'data-action="save"'),
						)
					),
				);
			}

			$form_definition = apply_filters('eowbc_admin_form_extras', $form_definition);

			if ($is_add_sample_values) {
				//loop through form tabs and set (random) sample values for each field  
				foreach ($form_definition as $key => $tab) {
					foreach ($tab["form"] as $fk => $fv) {
						//here we can override any particular field which needs specific sample values 
						if ($fv["type"] == "text" || $fv["type"] == "hidden" || $fv["type"] == "textarea") {	//non numeric 
							$form_definition[$key]["form"][$fk]["sample_values"] = array("abc", "xyz", "def", "uvw");
						} else if ($fv["type"] == "color") {
							$form_definition[$key]["form"][$fk]["sample_values"] = array("red", "white", "green", "black");
						}

						//no need to set for select/radio/checkboxes as we can use sample from its available options 

					}
				}
			}

			return $form_definition;

		}

	}
}
