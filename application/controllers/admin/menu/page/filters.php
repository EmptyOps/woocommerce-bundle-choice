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

		public static function eo_wbc_prime_category_($slug='',$prefix='',$opts_arr=array())
	    {
	        $map_base = get_categories(array(
	            'hierarchical' => 1,
	            'show_option_none' => '',
	            'hide_empty' => 1,
	            'parent' => (get_term_by('slug',$slug,'product_cat')?get_term_by('slug',$slug,'product_cat')->term_id:''),
	            'taxonomy' => 'product_cat'
	        ));
	        
	        // $category_option_list='';
	        
	        foreach ($map_base as $base) {

	            // $category_option_list.= "<option data-type='0' data-slug='{$base->slug}' value='".$base->term_id."'>".$prefix.$base->name."</option>".eo_wbc_prime_category_($base->slug,' --');
	            $opts_arr[$base->term_id] = array( 'label'=>$prefix.$base->name, 'attr'=>' data-type="0" data-slug="'.$base->slug.'" ' );
		        $opts_arr = \eo\wbc\controllers\admin\menu\page\Filters::eo_wbc_prime_category_($base->slug,'--',$opts_arr);

	        }

	        // return $category_option_list;
	        return $opts_arr;
	    }

		public static function eo_wbc_attributes_($opts_arr=array())
	    {
	        // $attributes="";        
	        foreach (wc_get_attribute_taxonomies() as $item) {                     
	        	// $attributes .= "<option data-type='1' data-slug='{$item->attribute_name}' value='{$item->attribute_id}'>{$item->attribute_label}</option>";  
	        	$opts_arr[$item->attribute_id] = array( 'label'=>$item->attribute_label, 'attr'=>' data-type="1" data-slug="'.$item->attribute_name.'" ' );          
	        }
	        // return $attributes;
	        return $opts_arr;
	    }

		public static function get_form_definition( $is_add_sample_values = false ) {
			
			wbc()->load->model('admin/form-builder');
			wbc()->load->model('category-attribute');
			$inventory_type = wbc()->options->get_option('setting_status_setting_status_setting','inventory_type','');			
			//Diamond Page Filter Configuration's list
			$table = array();
			$table['id']='eowbc_price_control_methods_list';
			$table['head'] = array(
				0=>array(
					0=>array(
						'is_header' => 1, 
						'val' => '',
						'is_checkbox' => true, 
						'checkbox'=> array('id'=>'dummy','value'=>array(),'options'=>array('row0_col0_chk'=>''), 'options_attrs'=>array('row0_col0_chk'=>array('data-action="bulk_select_all"', 'data-bulk_table_id="'.$table["id"].'"')),'class'=>'','where'=>'in_table')
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
						'val' => 'Column Width'
					),
					5=>array(
						'is_header' => 1, 
						'val' => 'Ordering'
					),
					6=>array(
						'is_header' => 1, 
						'val' => 'Input Type'
					),
					7=>array(
						'is_header' => 1, 
						'val' => 'Icon Size'
					),
					8=>array(
						'is_header' => 1, 
						'val' => 'Icon Label Size'
					),
					9=>array(
						'is_header' => 1, 
						'val' => 'Add reset link?'
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
						'colspan' => 10
					),
				),
			);

			//Setting Page Filter Configuration's list
			$sett_table = array();
			$sett_table['id']='eowbc_price_control_sett_methods_list';
			$sett_table['head'] = array(
				0=>array(
					0=>array(
						'is_header' => 1, 
						'val' => '',
						'is_checkbox' => true, 
						'checkbox'=> array('id'=>'dummy','value'=>array(),'options'=>array('row0_col0_chk'=>''), 'options_attrs'=>array('row0_col0_chk'=>array('data-action="bulk_select_all"', 'data-bulk_table_id="'.$sett_table["id"].'"')),'class'=>'','where'=>'in_table')
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

						'val' => 'Column Width'
					),
					5=>array(
						'is_header' => 1, 
						'val' => 'Ordering'
					),
					6=>array(
						'is_header' => 1, 
						'val' => 'Input Type'
					),
					7=>array(
						'is_header' => 1, 
						'val' => 'Icon Size'
					),
					8=>array(
						'is_header' => 1, 
						'val' => 'Icon Label Size'
					),
					9=>array(
						'is_header' => 1, 
						'val' => 'Add reset link?'
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
				'filter_setting'=>array(
						'label'=>"Configuration",
						'form'=>array( 
							'filter_setting_filter'=>array(
									'label'=>'Filter Configuration',
									'type'=>'devider',
								),
							'filter_setting_status'=>array(
									'label'=>'Filter Status',
									'type'=>'checkbox',
									'value'=>array(wbc()->options->get_option('filters_filter_setting','config_filter_status')),
									'options'=>array('config_filter_status'=>' Check here to enable horizontal filter bar at category page.'),
									'class'=>array(),
									'size_class'=>array('eight','wide'),
									'inline'=>true,
								),
							'filter_setting_price_filter_width'=>array(
								'label'=>'Price filter\'s column width',
								'type'=>'text',
								'value'=>wbc()->options->get_option('filters_filter_setting','filter_setting_price_filter_width','50%'),
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
							),								
							'filter_setting_alternate_slider_ui'=>array(
								'label'=>'Alternate ticked slider UI',
								'type'=>'checkbox',
								'value'=>array(wbc()->options->get_option('filters_filter_setting','filter_setting_alternate_slider_ui')),
								'options'=>array('filter_setting_alternate_slider_ui'=>' Check here to enable alternate UI for filter sliders.'),
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
							),						
							'filter_setting_submit_btn'=>array(
								'label'=>eowbc_lang('Save'),
								'type'=>'button',
								'class'=>array('secondary'),
								//'size_class'=>array('eight','wide'),
								'inline'=>false,
								'attr'=>array('data-tab_key="altr_filt_widgts"', 'data-action="save"'),
							)							
						)
					),
				'altr_filt_widgts'=>array(
					'label'=>'Alternate Filter Widgets',
					'form'=> array(
						'saved_tab_key'=>array(
							'type'=>'hidden',
							'value'=>'',
							),

						'first_category_altr_filt_widgts'=>array(
							'label'=>eowbc_lang('First Category'),
							'type'=>'radio',
							'value'=>'fc1',
							'options'=>array('fc1'=>'Default(Grid View)','fc2'=>'Template 1 (Expand/Collapse)','fc3'=>'Template 2','fc4'=>'Template 3'),
							'class'=>array('fluid'),						
							// 'size_class'=>array('eight','wide'),
							'inline'=>false,

							'visible_info'=>array( 'label'=>eowbc_lang('Applies to first category page in the ring builder process'),
								'type'=>'visible_info',
								'class'=>array('small'),
								// 'size_class'=>array('sixteen','wide'),
							),
						),

						'second_category_altr_filt_widgts'=>array(
							'label'=>eowbc_lang('Second Category'),
							'type'=>'radio',
							'value'=>'sc1',
							'options'=>array('fc1'=>'Default(Grid View)','fc2'=>'Template 1 (Expand/Collapse)','fc3'=>'Template 2','fc4'=>'Template 3'),
							'class'=>array('fluid'),						
							// 'size_class'=>array('eight','wide'),
							'inline'=>false,

							'visible_info'=>array( 'label'=>eowbc_lang('Applies to second category page in the ring builder process'),
								'type'=>'visible_info',
								'class'=>array('small'),
								// 'size_class'=>array('sixteen','wide'),
							),
						),
						'filter_setting_alternate_mobile'=>array(
								'label'=>'Alternate mobile filters view',
								'type'=>'checkbox',
								'value'=>array(wbc()->options->get_option('filters_filter_setting','filter_setting_alternate_mobile')),
								'options'=>array('filter_setting_alternate_mobile'=>' Check here to enable alternate filter view for mobile.'),
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
							),
						'submit_btn'=>array(
							'label'=>eowbc_lang('Save'),
							'type'=>'button',
							'class'=>array('secondary'),
							//'size_class'=>array('eight','wide'),
							'inline'=>false,
							'attr'=>array('data-tab_key="altr_filt_widgts"', 'data-action="save"'),
						)
					)
				),							
				'd_fconfig'=>array(
						'label'=>($inventory_type==='jewelery'?"Diamond":"First")." Page Filter Configuration",
						'form'=>array( $table["id"].'_bulk'=>array(
								// 'label'=>'Bulk Actions',
								'type'=>'select',
								'value'=>'',
								'options'=>array(''=>eowbc_lang('Bulk Actions'), 'delete'=>'Delete','activate'=>'Activate','deactivate'=>'Deactivate'),
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
								'attr'=>array('data-tab_key="d_fconfig"', 'data-bulk_table_id="'.$table["id"].'"', 'data-action="bulk"' )
							),
							'list'=>array_merge( $table , array(
								'type'=>'table' )
							), 
							'd_fconfig_save_sec_title'=>array(
								'label'=>"Add Diamond Shape's filter",
								'type'=>'label',
								'size_class'=>array('eight','wide')
							),
							'd_fconfig_filter_label'=>array(
								'label'=>eowbc_lang('Filter'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_filter'=>array(
								'type'=>'select',
								'value'=>'',
								'options'=>\eo\wbc\controllers\admin\menu\page\Filters::eo_wbc_attributes_( \eo\wbc\controllers\admin\menu\page\Filters::eo_wbc_prime_category_() ),	//array_replace(\eo\wbc\model\Category_Attribute::instance()->get_category(),\eo\wbc\model\Category_Attribute::instance()->get_attributs()),
								'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'attr'=>array("onchange=\"document.getElementById('d_fconfig_type').value=this.options[this.selectedIndex].getAttribute('data-type')\"")
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_type'=>array(
							'type'=>'hidden',
							'value'=>'',
							),
							'd_fconfig_dependent'=>array(
							'type'=>'hidden',
							'value'=>'',
							),
							'd_fconfig_label_label'=>array(
								'label'=>eowbc_lang('Label'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_label'=>array(
								'no_label' => true,
								//'placeholder'=>eowbc_lang('Sales Price'),
								'type'=>'text',
								'value'=>'0',
								//'options'=>array(),
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_is_advanced'=>array(
								'type'=>'checkbox',
								'value'=>array('1'),
								'options'=>array('1'=>'Is it advanced filter?'),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),

							'd_fconfig_column_width_label'=>array(
								'label'=>eowbc_lang('Column Width'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_column_width'=>array(
								'no_label' => true,
								'type'=>'text',
								'value'=>'0',
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_ordering_label'=>array(
								'label'=>eowbc_lang('Ordering'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_ordering'=>array(
								'no_label' => true,
								'type'=>'text',
								'value'=>'0',
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_input_type_label'=>array(
								'label'=>eowbc_lang('Input Type'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_input_type'=>array(
								'type'=>'select',
								'value'=>'',
								'options'=>array('icon'=>'Icon Only','icon_text'=>'Icon and Text','numeric_slider'=>'Numeric slider','text_slider'=>'Text slider','checkbox'=>'Checkbox'),
								'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),
							
							'd_fconfig_icon_size_label'=>array(
								'label'=>eowbc_lang('Icon Size'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_icon_size'=>array(
								'no_label' => true,
								'type'=>'text',
								'value'=>'0',
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_icon_label_size_label'=>array(
								'label'=>eowbc_lang('Icon Label Size'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_icon_label_size'=>array(
								'no_label' => true,
								'type'=>'text',
								'value'=>'0',
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_add_reset_link'=>array(
								'type'=>'checkbox',
								'value'=>array('1'),
								'options'=>array('1'=>'Add reset link?'),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_add_help'=>array(
								'type'=>'checkbox',
								'value'=>array(),
								'options'=>array('1'=>'Add help text?'),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_add_help_text'=>array(
								'label'=>'Help Text',
								'type'=>'textarea',
								'value'=>'',
								'attr'=>array('style="width:100%;"'),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								'size_class'=>array('sixteen','wide')
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_add_enabled'=>array(
								'type'=>'checkbox',
								'value'=>array('1'),
								'options'=>array('1'=>'Enabled?'),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_note_label'=>array(
								'label'=>"<strong>Note:Since you want to use icons with attributes filter this plugin will enable icon option for attributes on woocommerce page, so please set icons from there.</strong>",
								'type'=>"label",
								'size_class'=>array('transition','hidden')
							),
							'd_fconfig_submit_btn'=>array(
								'label'=>eowbc_lang('Save'),
								'type'=>'button',
								'class'=>array('secondary'),
								//'size_class'=>array('eight','wide'),
								'inline'=>false,
								'attr'=>array('data-tab_key="d_fconfig"', 'data-action="save"'),
							)
						)
					),
				's_fconfig'=>array(
						'label'=>($inventory_type==='jewelery'?"Settings":"Second")." Page Filter Configuration",
						'form'=>array( $sett_table["id"].'_bulk'=>array(
								// 'label'=>'Bulk Actions',
								'type'=>'select',
								'value'=>'',
								'options'=>array(''=>eowbc_lang('Bulk Actions'), 'delete'=>'Delete','activate'=>'Activate','deactivate'=>'Deactivate'),
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
								'attr'=>array('data-tab_key="s_fconfig"', 'data-bulk_table_id="'.$sett_table["id"].'"', 'data-action="bulk"' )
							),
							'list'=>array_merge( $sett_table, array(
								'type'=>'table' )
							), 

							's_fconfig_save_sec_title'=>array(
								'label'=>"Add Setting Shape's filter",
								'type'=>'label',
								'size_class'=>array('eight','wide')
							),
							's_fconfig_filter_label'=>array(
								'label'=>eowbc_lang('Filter'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_filter'=>array(
								'type'=>'select',
								'value'=>'',
								'options'=>\eo\wbc\controllers\admin\menu\page\Filters::eo_wbc_attributes_( \eo\wbc\controllers\admin\menu\page\Filters::eo_wbc_prime_category_() ),	//array_replace(\eo\wbc\model\Category_Attribute::instance()->get_category(),\eo\wbc\model\Category_Attribute::instance()->get_attributs()),
								'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'attr'=>array("onchange=\"document.getElementById('s_fconfig_type').value=this.options[this.selectedIndex].getAttribute('data-type')\"")
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_type'=>array(
							'type'=>'hidden',
							'value'=>'',
							),
							's_fconfig_dependent'=>array(
							'type'=>'hidden',
							'value'=>'',
							),
							's_fconfig_label_label'=>array(
								'label'=>eowbc_lang('Label'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_label'=>array(
								'no_label' => true,
								//'placeholder'=>eowbc_lang('Sales Price'),
								'type'=>'text',
								'value'=>'0',
								//'options'=>array(),
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_is_advanced'=>array(
								'type'=>'checkbox',
								'value'=>array('1'),
								'options'=>array('1'=>'Is it advanced filter?'),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),

							's_fconfig_column_width_label'=>array(
								'label'=>eowbc_lang('Column Width'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_column_width'=>array(
								'no_label' => true,
								'type'=>'text',
								'value'=>'0',
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_ordering_label'=>array(
								'label'=>eowbc_lang('Ordering'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_ordering'=>array(
								'no_label' => true,
								'type'=>'text',
								'value'=>'0',
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_input_type_label'=>array(
								'label'=>eowbc_lang('Input Type'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_input_type'=>array(
								'type'=>'select',
								'value'=>'',
								'options'=>array('icon'=>'Icon Only','icon_text'=>'Icon and Text','numeric_slider'=>'Numeric slider','text_slider'=>'Text slider','checkbox'=>'Checkbox'),
								'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),
							
							's_fconfig_icon_size_label'=>array(
								'label'=>eowbc_lang('Icon Size'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_icon_size'=>array(
								'no_label' => true,
								'type'=>'text',
								'value'=>'0',
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_icon_label_size_label'=>array(
								'label'=>eowbc_lang('Icon Label Size'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_icon_label_size'=>array(
								'no_label' => true,
								'type'=>'text',
								'value'=>'0',
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_add_reset_link'=>array(
								'type'=>'checkbox',
								'value'=>array('1'),
								'options'=>array('1'=>'Add reset link?'),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_add_help'=>array(
								'type'=>'checkbox',
								'value'=>array(),
								'options'=>array('1'=>'Add help text?'),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_add_help_text'=>array(
								'label'=>'Help Text',
								'type'=>'textarea',
								'value'=>'',
								'attr'=>array('style="width:100%;"'),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								'size_class'=>array('sixteen','wide')
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_add_enabled'=>array(
								'type'=>'checkbox',
								'value'=>array('1'),
								'options'=>array('1'=>'Enabled?'),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_note_label'=>array(
								'label'=>"<strong>Note:Since you want to use icons with attributes filter this plugin will enable icon option for attributes on woocommerce page, so please set icons from there.</strong>",
								'type'=>"label",
								'size_class'=>array('transition','hidden')
							),
							's_fconfig_submit_btn'=>array(
								'label'=>eowbc_lang('Save'),
								'type'=>'button',
								'class'=>array('secondary'),
								//'size_class'=>array('eight','wide'),
								'inline'=>false,
								'attr'=>array('data-tab_key="s_fconfig"', 'data-action="save"'),
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
