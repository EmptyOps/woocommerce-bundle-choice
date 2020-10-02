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
			
			$features = unserialize(wbc()->options->get_option('setting_status_setting_status_setting','features',serialize(array())));

			$is_ring_builder = (!empty($features['ring_builder']));
			//Diamond Page Filter Configuration's list
			$table = array();
			$table['id']='eowbc_price_control_methods_list';
			$table['head'] = array(
				0=>array(
					0=>array(
						'is_header' => 1, 
						'val' => '',
						'sanitize'=>'sanitize_text_field',
						'is_checkbox' => true, 
						'checkbox'=> array('id'=>'dummy','value'=>array(),'options'=>array('row0_col0_chk'=>''), 'options_attrs'=>array('row0_col0_chk'=>array('data-action="bulk_select_all"', 'data-bulk_table_id="'.$table["id"].'"')),'class'=>'','where'=>'in_table')
					),
					1=>array(
						'is_header' => 1, 
						'val' => __('Filter','woo-bundle-choice'),
						'field_id'=>'d_fconfig_filter'
					),
					2=>array(
						'is_header' => 1, 
						'val' => __('Label','woo-bundle-choice'),
						'field_id'=>'d_fconfig_label'
					),
					3=>array(
						'is_header' => 1,
						'val' => __('Advance Filter','woo-bundle-choice'),
						'field_id'=>'d_fconfig_is_advanced'
					),
					4=>array(
						'is_header' => 1, 
						'val' => __('Column Width','woo-bundle-choice'),
						'field_id'=>'d_fconfig_column_width'
					),
					5=>array(
						'is_header' => 1, 
						'val' => __('Template','woo-bundle-choice'),
						'field_id'=>'filter_template'
					),
					6=>array(
						'is_header' => 1, 
						'val' => __('Ordering','woo-bundle-choice'),
						'field_id'=>'d_fconfig_ordering'
					),
					7=>array(
						'is_header' => 1, 
						'val' => ('Input Type'),
						'field_id'=>'d_fconfig_input_type'
					),
					8=>array(
						'is_header' => 1, 
						'val' => ('Icon Size'),
						'field_id'=>'d_fconfig_icon_size'
					),
					9=>array(
						'is_header' => 1,
						'val' => __('Icon Label Size','woo-bundle-choice'),
						'field_id'=>'d_fconfig_icon_label_size'
					),
					10=>array(
						'is_header' => 1,  
						'val' => __('Add reset link?','woo-bundle-choice'),
						'field_id'=>'d_fconfig_add_reset_link'
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
						'val' => __('No filter(s) exists, please add some filters.','woo-bundle-choice'),
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
						'sanitize'=>'sanitize_text_field',
						'checkbox'=> array('id'=>'dummy','value'=>array(),'options'=>array('row0_col0_chk'=>''), 'options_attrs'=>array('row0_col0_chk'=>array('data-action="bulk_select_all"', 'data-bulk_table_id="'.$sett_table["id"].'"')),'class'=>'','where'=>'in_table')
					),
					1=>array(
						'is_header' => 1, 
						'val' => __('Filter','woo-bundle-choice'),
						'field_id'=>'s_fconfig_filter'
					),
					2=>array(
						'is_header' => 1,
						'val' => __('Label','woo-bundle-choice'),
						'field_id'=>'s_fconfig_label'
					),
					3=>array(
						'is_header' => 1, 
						'val' => __('Advance Filter','woo-bundle-choice'),
						'field_id'=>'s_fconfig_is_advanced'
					),
					4=>array(
						'is_header' => 1, 
						'val' => __('Column Width','woo-bundle-choice'),
						'field_id'=>'s_fconfig_column_width'
					),
					5=>array(
						'is_header' => 1, 
						'val' => __('Template','woo-bundle-choice'),
						'field_id'=>'filter_template'
					),
					6=>array(
						'is_header' => 1, 
						'val' => __('Ordering','woo-bundle-choice'),
						'field_id'=>'s_fconfig_ordering'
					),
					7=>array(
						'is_header' => 1, 
						'val' => __('Input Type','woo-bundle-choice'),
						'field_id'=>'s_fconfig_input_type'
					),
					8=>array(
						'is_header' => 1,  
						'val' => __('Icon Size','woo-bundle-choice'),
						'field_id'=>'s_fconfig_icon_size'
					),
					9=>array(
						'is_header' => 1, 
						'val' => __('Icon Label Size','woo-bundle-choice'),
						'field_id'=>'s_fconfig_icon_label_size'
					),
					10=>array(
						'is_header' => 1,
						'val' => __('Add reset link?','woo-bundle-choice'),
						'field_id'=>'s_fconfig_add_reset_link'
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
						'val' => __('No filter(s) exists, please add some filters.','woo-bundle-choice'),
						'colspan' => 7
					),
				),
			);

			$form_definition = array(
				'filter_setting'=>array( 
						'label'=>__('Configuration','woo-bundle-choice'),
						'form'=>array( 
							'filter_setting_filter'=>array(
									'label'=>__('Filter Configuration','woo-bundle-choice'),
									'type'=>'devider',
								),
							'filter_setting_status'=>array( 
									'label'=>__('Filter Status','woo-bundle-choice'),
									'type'=>'checkbox',
									'sanitize'=>'sanitize_text_field',
									'value'=>array('filter_setting_status'),
									'options'=>array('filter_setting_status'=>__(' Check here to enable horizontal filter bar','woo-bundle-choice')),
									'class'=>array(),
									'size_class'=>array('eight','wide'),
									'inline'=>true,
								),
							'filter_setting_price_filter_width'=>array(
								'label'=>__('Price filter\'s column width','woo-bundle-choice'),
								'type'=>'text',
								'validate'=>array('required'=>'','postfix'=>['%']),
								'sanitize'=>'sanitize_text_field',
								'value'=>wbc()->options->get_option('filters_filter_setting','filter_setting_price_filter_width','50%'),
								'class'=>array(),
								'size_class'=>array('eight','wide','required'),
								'inline'=>true,
							),								
							'filter_setting_alternate_slider_ui'=>array( 
								'label'=>__('Alternate Ticked Slider Widget','woo-bundle-choice'),
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>array(wbc()->options->get_option('filters_filter_setting','filter_setting_alternate_slider_ui')),
								'options'=>array('filter_setting_alternate_slider_ui'=>__(' Check here to enable alternate UI view for filter sliders.','woo-bundle-choice')),
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
							),
							'filter_setting_numeric_slider_seperator'=>array(
								'label'=>__('Numeric Filter Separator','woo-bundle-choice'),
								'type'=>'text',
								'sanitize'=>'sanitize_text_field',
								'value'=>'.',
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
							),
							'filter_setting_slider_max_lblsize'=>array(
								'label'=>__('Slider Options Text Limit','woo-bundle-choice'),
								'type'=>'text',
								'sanitize'=>'sanitize_text_field',
								'value'=>'6',
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>false,
								'visible_info'=>array( 
									'label'=>__('You can truncate longer option texts that are displayed for filters of input type slider. The maximum number characters that will be displayed on your website filters depend on the integer value you set here. ','woo-bundle-choice'),
									'type'=>'visible_info',
									'class'=>array('small'),
									// 'size_class'=>array('sixteen','wide'),
								),
							),
							'filter_icon_wrap_label'=>array(
									'label'=>__('Wrap icon filter label','woo-bundle-choice'),
									'type'=>'checkbox',
									'sanitize'=>'sanitize_text_field',
									'value'=>array(),
									'options'=>array('filter_icon_wrap_label'=>' '),
									'class'=>array(),
									'size_class'=>array('eight','wide'),
									'inline'=>true,
								),
							'filter_icon_wrap_filter_label'=>array(
									'label'=>__('Word Wrap Icon Filter Labels','woo-bundle-choice'),
									'type'=>'text',
									'sanitize'=>'sanitize_text_field',
									'value'=>'0',									
									'class'=>array(),
									'size_class'=>array('eight','wide'),
									'visible_info'=>array( 
									'label'=>__('Specify here to limit the number of word that is displayed on icon filters, it is sometime useful to keep it visually appealing.','woo-bundle-choice'),
									'type'=>'visible_info',
									'class'=>array('small'),
									'size_class'=>array('eight','wide'),
									),
								),
							'filter_setting_btnfilter_now'=>array(
								'label'=>__('Show Apply Filters Button','woo-bundle-choice'),
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>array(),
								'options'=>array('filter_setting_btnfilter_now'=>' '),
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
								'visible_info'=>array( 
									'label'=>__('If enabled the ajax search on each change of filter will not fire but the Apply Filters. This is useful if your website has many filters and user would normally filter on many of them.','woo-bundle-choice'),
									'type'=>'visible_info',
									'class'=>array('small'),
									'size_class'=>array('eight','wide'),
								),
							),
							'filter_setting_reset_now'=>array(
								'label'=>__('Show Reset Filters Button','woo-bundle-choice'),
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>array(),
								'options'=>array('filter_setting_reset_now'=>' '),
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
								'visible_info'=>array( 
									'label'=>__('If enabled the Reset Filters buttons will be displayed.','woo-bundle-choice'),
									'type'=>'visible_info',
									'class'=>array('small'),
									'size_class'=>array('eight','wide'),
								),
							),
							'price_filter_first_cat'=>array(
								'label'=>__('First Category','woo-bundle-choice'),
								'type'=>'devider',
							),
							'hide_price_filter_first_cat'=>array(
								'label'=>__('Hide Price Filter','woo-bundle-choice'),
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>'',
								'options'=>array('1'=>__(' Hide Price Filter for First Category?','woo-bundle-choice')),
								'is_id_as_name'=>true,
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
							),	
							'price_filter_order_first_cat'=>array(
								'label'=>__('Display Order','woo-bundle-choice'),
								'type'=>'text',
								'sanitize'=>'sanitize_text_field',
								'value'=>'',
								'class'=>array(),
								'size_class'=>array('two','wide'),
								'inline'=>true,
							),		
							'price_filter_second_cat'=>array(
								'label'=>__('Second Category','woo-bundle-choice'),
								'type'=>'devider',
							),
							'hide_price_filter_second_cat'=>array(
								'label'=>__('Hide Price Filter','woo-bundle-choice'),
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>'',
								'options'=>array('1'=>__(' Hide Price Filter for Second Category?','woo-bundle-choice')),
								'is_id_as_name'=>true,
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
							),	
							'price_filter_order_second_cat'=>array(
								'label'=>__('Display Order','woo-bundle-choice'),
								'type'=>'text',
								'sanitize'=>'sanitize_text_field',
								'value'=>'',
								'class'=>array(),
								'size_class'=>array('two','wide'),
								'inline'=>true,
							),
							'price_filter_prefix_postfix_devider'=>array(
								'label'=>' ',
								'type'=>'devider',
							),		
							'price_filter_prefix'=>array(
								'label'=>__('Prefix currency symbol for price filter','woo-bundle-choice'),
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>array(),
								'options'=>array('price_filter_prefix'=>__('Add Prefix','woo-bundle-choice')),
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,								
							),
							'price_filter_postfix'=>array(
								'label'=>__('Postfix currency symbol for price filter','woo-bundle-choice'),
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>array(),
								'options'=>array('price_filter_postfix'=>__('Add Postfix','woo-bundle-choice')),
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,								
							),
							'filter_setting_submit_btn'=>array(
								'label'=>__('Save','woo-bundle-choice'),
								'type'=>'button',								
								'class'=>array('secondary'),
								//'size_class'=>array('eight','wide'),
								'inline'=>false,
								'attr'=>array('data-tab_key="filter_setting"', 'data-action="save"'),
							)							
						)
					),
				'altr_filt_widgts'=>array( 
					'label'=>__('Alternate Filter Widgets','woo-bundle-choice'),
					'form'=> array(
						'saved_tab_key'=>array(
							'type'=>'hidden',
							'value'=>'',
							),

						'first_category_altr_filt_widgts'=>array(
							'label'=>__('First Category','woo-bundle-choice'),
							'type'=>'radio',
							'value'=>'fc1',
							'validate'=>array('required'=>''),
							'sanitize'=>'sanitize_text_field',
							'options'=>array('fc1'=>__('Default(Grid View)','woo-bundle-choice'),'fc2'=>__('Template 1 (Expand/Collapse)','woo-bundle-choice'),'fc3'=>__('Template 2','woo-bundle-choice'),'fc4'=>__('Template 3','woo-bundle-choice'),'fc5'=>__('Template 4','woo-bundle-choice')),
							'class'=>array('fluid'),						
							'size_class'=>array('required'),
							'inline'=>false,

							'visible_info'=>array( 'label'=>__('Applies to first category page in the ring builder process','woo-bundle-choice'),
								'type'=>'visible_info',
								'class'=>array('small'),
								// 'size_class'=>array('sixteen','wide'),
							),
						),

						'second_category_altr_filt_widgts'=>array(
							'label'=>__('Second Category','woo-bundle-choice'),
							'type'=>'radio',
							'value'=>'sc1',
							'validate'=>array('required'=>''),
							'sanitize'=>'sanitize_text_field',
							'options'=>array('sc1'=>__('Default(Grid View)','woo-bundle-choice'),'sc2'=>__('Template 1 (Expand/Collapse)','woo-bundle-choice'),'sc3'=>__('Template 2','woo-bundle-choice'),'sc4'=>__('Template 3','woo-bundle-choice'),'sc5'=>__('Template 4','woo-bundle-choice')),
							'class'=>array('fluid'),						
							'size_class'=>array('required'),
							'inline'=>false,

							'visible_info'=>array( 'label'=>__('Applies to second category page in the ring builder process','woo-bundle-choice'),
								'type'=>'visible_info',
								'class'=>array('small'),
								// 'size_class'=>array('sixteen','wide'),
							),
						),
						'filter_setting_additional_css'=>array(
							'label'=>__('Additional CSS','woo-bundle-choice'),
							'type'=>'textarea',
							'value'=>'',
							'sanitize'=>'sanitize_text_field',							
							'class'=>array('fluid'),						
							'size_class'=>array('sixteen','wide'),
							//'size_class'=>array('eight','wide','transition',(array_intersect(array(wbc()->options->get_option('filters_altr_filt_widgts','second_category_altr_filt_widgts'),wbc()->options->get_option('filters_altr_filt_widgts','first_category_altr_filt_widgts')),array('fc4','sc4'))?'':'hidden')),
							'inline'=>false,

							'visible_info'=>array( 'label'=>__('Applies to all templates  of both categories.','woo-bundle-choice'),
								'type'=>'visible_info',
								'class'=>array('small'),
								// 'size_class'=>array('sixteen','wide'),
							),
						),
						'filter_setting_alternate_mobile'=>array(
								'label'=>__('Alternate Mobile Filter Widget','woo-bundle-choice'),
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>array(wbc()->options->get_option('filters_filter_setting','filter_setting_alternate_mobile')),
								'options'=>array('filter_setting_alternate_mobile'=>__(' Check here to enable alternate filter view for mobile.','woo-bundle-choice')),
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
							),
						'submit_btn'=>array(
							'label'=>__('Save','woo-bundle-choice'),
							'type'=>'button',
							'class'=>array('secondary'),
							//'size_class'=>array('eight','wide'),
							'inline'=>false,
							'attr'=>array('data-tab_key="altr_filt_widgts"', 'data-action="save"'),
						)
					)
				),							
				'd_fconfig'=>array(

						'label'=>(($inventory_type==='jewelry' and $is_ring_builder)?"Diamond":__('First','woo-bundle-choice')).__(' Page Filter Configuration','woo-bundle-choice'),
						'form'=>array( $table["id"].'_bulk'=>array(
								// 'label'=>'Bulk Actions',
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'options'=>array(''=>__('Bulk Actions','woo-bundle-choice'), 'delete'=>__('Delete','woo-bundle-choice'),'activate'=>__('Activate','woo-bundle-choice'),'deactivate'=>__('Deactivate','woo-bundle-choice')),
								'class'=>array('fluid'),
								'size_class'=>array('two','wide'),
								'next_inline'=>true,
								'inline'=>true,
							),
							'd_fconfig_submit_btn_bulk'=>array(
								'label'=>__('Apply','woo-bundle-choice'),
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
								'label'=>__('Add Filter Field','woo-bundle-choice'),
								'type'=>'label',
								'size_class'=>array('eight','wide')
							),
							/*'d_fconfig_filter_label'=>array(
								'label'=>eowbc_lang('Filter'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								// 'next_inline'=>true,
								// 'inline'=>true,
							),*/
							'd_fconfig_id'=>array(
								'type'=>'hidden',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
							),
							'd_fconfig_filter'=>array(
								'label'=>__('Filter','woo-bundle-choice'),
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'validate'=>array('required'=>''),
								'options'=>\eo\wbc\controllers\admin\menu\page\Filters::eo_wbc_attributes_( \eo\wbc\controllers\admin\menu\page\Filters::eo_wbc_prime_category_() ),	//array_replace(\eo\wbc\model\Category_Attribute::instance()->get_category(),\eo\wbc\model\Category_Attribute::instance()->get_attributs()),
								'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								// 'attr'=>array("onchange=\"document.getElementById('d_fconfig_type').value=this.options[this.selectedIndex].getAttribute('data-type')\"")
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_elements'=>array(
								'label'=>eowbc_lang('Show Selected Only'),
								'type'=>'select',
								'value'=>'',
								'options'=>array(),
								'is_id_as_name'=>true,
								'class'=>array('fluid','additions','search','multiple','clearable'),							
								'field_attr'=>array('multiple=""'),
								'size_class'=>array('three','wide'),
								'inline'=>false,
								'visible_info'=>array( 
									'label'=>eowbc_lang('If you select items from this field then filter will show that items only on front end, and if you leave it blank it will show all sub categories of the category you selected above or all terms of the attribute if you selected attribute above.'),
									'type'=>'visible_info',
									'class'=>array('small'),
									// 'size_class'=>array('sixteen','wide'),
								),							
							),
							'd_fconfig_type'=>array(
								'type'=>'hidden',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
							),
							'd_fconfig_dependent'=>array(
								'type'=>'hidden',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
							),
							'd_fconfig_label_label'=>array( 
								'label'=>__('Label','woo-bundle-choice'),
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
								'sanitize'=>'sanitize_text_field',
								//'options'=>array(),
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_is_advanced'=>array(
								'type'=>'checkbox',
								'value'=>array(),
								'sanitize'=>'sanitize_text_field',
								'options'=>array('1'=>__('Is it advanced filter?','woo-bundle-choice')),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),

							'd_fconfig_column_width_label'=>array( 
								'label'=>__('Column Width','woo-bundle-choice'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_column_width'=>array(
								'no_label' => true,
								'type'=>'text',
								'value'=>'0',
								'sanitize'=>'sanitize_text_field',
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_ordering_label'=>array(
								'label'=>__('Ordering','woo-bundle-choice'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_ordering'=>array(
								'no_label' => true,
								'type'=>'text',
								'value'=>'0',
								'sanitize'=>'sanitize_text_field',
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							/*'d_fconfig_input_type_label'=>array(
								'label'=>eowbc_lang('Input Type'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),*/
							'd_fconfig_input_type'=>array( 
								'label'=>__('Input Type','woo-bundle-choice'),
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'validate'=>array('required'=>''),

								'options'=>array('icon'=>__('Icon Only','woo-bundle-choice'),'icon_text'=>__('Icon and Text','woo-bundle-choice'),'numeric_slider'=>__('Numeric slider','woo-bundle-choice'),'text_slider'=>__('Text slider','woo-bundle-choice'),'checkbox'=>__('Checkbox','woo-bundle-choice'),'toggle_column'=>__('Toggle Column','woo-bundle-choice'),'button'=>__('Button','woo-bundle-choice')),

								'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_note_label'=>array(
								'label'=>__('<strong>Note:Since you want to use icons with attributes filter this plugin will enable icon option for attributes on woocommerce page, so please set icons from there.</strong>','woo-bundle-choice'),
								'type'=>"label",
								'size_class'=>array('transition','hidden')
							),
							'd_fconfig_is_single_select'=>array(
								'label'=>' ',
								'type'=>'checkbox',
								'value'=>array(),
								'sanitize'=>'sanitize_text_field', 
								'options'=>array('1'=>__('Allow only single selection.','woo-bundle-choice')),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',	
								'attr'=>array('data-toggle="d_fconfig_is_single_select"'),							
							),
							'd_fconfig_icon_size_label'=>array(
								'label'=>__('Icon Size','woo-bundle-choice'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								'attr'=>array('data-toggle="d_fconfig_icon_size_label"'),
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_icon_size'=>array(
								'no_label' => true,
								'type'=>'text',
								'value'=>'0',
								'sanitize'=>'sanitize_text_field',
								'size_class'=>array('three','wide'),
								'attr'=>array('data-toggle="d_fconfig_icon_size"'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_icon_label_size_label'=>array(
								'label'=>__('Icon Label Size','woo-bundle-choice'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								'attr'=>array('data-toggle="d_fconfig_icon_label_size_label"'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_icon_label_size'=>array(
								'no_label' => true,
								'type'=>'text',
								'value'=>'0',
								'sanitize'=>'sanitize_text_field',
								'size_class'=>array('three','wide'),
								'attr'=>array('data-toggle="d_fconfig_icon_label_size"'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_add_reset_link'=>array(
								'type'=>'checkbox',
								'value'=>array('1'),
								'sanitize'=>'sanitize_text_field',
								'options'=>array('1'=>__('Add reset link?','woo-bundle-choice')),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								// 'prev_inline'=>true,
								// 'inline'=>true,
								'visible_info'=>array( 
									'label'=>__('Reset action is not suported yet with the Template 3.','woo-bundle-choice'),
									'type'=>'visible_info',
									'class'=>array('small'),
									// 'size_class'=>array('sixteen','wide'),
								),
							),
							'd_fconfig_add_help'=>array(
								'type'=>'checkbox',
								'value'=>array(),
								'sanitize'=>'sanitize_text_field', 
								'options'=>array('1'=>__('Add help text?','woo-bundle-choice')),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_add_help_text'=>array(
								'label'=>__('Help Text','woo-bundle-choice'),
								'type'=>'textarea',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
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
								'sanitize'=>'sanitize_text_field',
								'options'=>array('1'=>__('Enabled?','woo-bundle-choice')),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),							
							'd_fconfig_submit_btn'=>array(
								'label'=>__('Save','woo-bundle-choice'),
								'type'=>'button',
								'class'=>array('secondary'),
								//'size_class'=>array('eight','wide'),
								'inline'=>false,
								'attr'=>array('data-tab_key="d_fconfig"', 'data-action="save"'),
							)
						)
					),
				's_fconfig'=>array(
 
						'label'=>($inventory_type==='jewelry'?"Settings":__('Second','woo-bundle-choice')).__(' Page Filter Configuration','woo-bundle-choice'),
						'form'=>array( $sett_table["id"].'_bulk'=>array(
								// 'label'=>'Bulk Actions',
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'options'=>array(''=>__('Bulk Actions','woo-bundle-choice'), 'delete'=>__('Delete','woo-bundle-choice'),'activate'=>__('Activate','woo-bundle-choice'),'deactivate'=>__('Deactivate','woo-bundle-choice')),
								'class'=>array('fluid'),
								'size_class'=>array('two','wide'),
								'next_inline'=>true,
								'inline'=>true,
							),
							's_fconfig_submit_btn_bulk'=>array( 
								'label'=>__('Apply','woo-bundle-choice'),
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
								'label'=>__('Add Filter Field','woo-bundle-choice'),
								'type'=>'label',
								'size_class'=>array('eight','wide')
							),
							/*'s_fconfig_filter_label'=>array(
								'label'=>eowbc_lang('Filter'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								// 'next_inline'=>true,
								// 'inline'=>true,
							),*/
							's_fconfig_id'=>array(
								'type'=>'hidden',
								'value'=>'',								
								'sanitize'=>'sanitize_text_field',
							),
							's_fconfig_filter'=>array(
								'label'=>__('Filter','woo-bundle-choice'),
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'validate'=>array('required'=>''),
								'options'=>\eo\wbc\controllers\admin\menu\page\Filters::eo_wbc_attributes_( \eo\wbc\controllers\admin\menu\page\Filters::eo_wbc_prime_category_() ),	//array_replace(\eo\wbc\model\Category_Attribute::instance()->get_category(),\eo\wbc\model\Category_Attribute::instance()->get_attributs()),
								'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								// 'attr'=>array("onchange=\"document.getElementById('s_fconfig_type').value=this.options[this.selectedIndex].getAttribute('data-type')\"")
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_elements'=>array(
								'label'=>eowbc_lang('Show Selected Only'),
								'type'=>'select',
								'value'=>'',
								'options'=>array(),
								'is_id_as_name'=>true,
								'class'=>array('fluid','additions','search','multiple','clearable'),							
								'field_attr'=>array('multiple=""'),
								'size_class'=>array('three','wide'),
								'inline'=>false,
								'visible_info'=>array( 
									'label'=>eowbc_lang('If you select items from this field then filter will show that items only on front end, and if you leave it blank it will show all sub categories of the category you selected above or all terms of the attribute if you selected attribute above.'),
									'type'=>'visible_info',
									'class'=>array('small'),
									// 'size_class'=>array('sixteen','wide'),
								),							
							),
							's_fconfig_type'=>array(
								'type'=>'hidden',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
							),
							's_fconfig_dependent'=>array(
								'type'=>'hidden',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
							),
							's_fconfig_label_label'=>array(
								'label'=>__('Label','woo-bundle-choice'),
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
								'sanitize'=>'sanitize_text_field',
								//'options'=>array(),
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_is_advanced'=>array(
								'type'=>'checkbox',
								'value'=>array(),
								'sanitize'=>'sanitize_text_field',
								'options'=>array('1'=>__('Is it advanced filter?','woo-bundle-choice')),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),

							's_fconfig_column_width_label'=>array(
								'label'=>__('Column Width','woo-bundle-choice'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_column_width'=>array(
								'no_label' => true,
								'type'=>'text',
								'value'=>'0',
								'sanitize'=>'sanitize_text_field',
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_ordering_label'=>array(
								'label'=>__('Ordering','woo-bundle-choice'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_ordering'=>array(
								'no_label' => true,
								'type'=>'text',
								'value'=>'0',
								'sanitize'=>'sanitize_text_field',
								'size_class'=>array('three','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							/*'s_fconfig_input_type_label'=>array(
								'label'=>eowbc_lang('Input Type'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),*/
							's_fconfig_input_type'=>array( 
								'label'=>__('Input Type','woo-bundle-choice'),
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',

								'validate'=>array('required'=>''), 
								'options'=>array('icon'=>__('Icon Only','woo-bundle-choice'),'icon_text'=>__('Icon and Text','woo-bundle-choice'),'numeric_slider'=>__('Numeric slider','woo-bundle-choice'),'text_slider'=>__('Text slider','woo-bundle-choice'),'checkbox'=>__('Checkbox','woo-bundle-choice'),'toggle_column'=>__('Toggle Column','woo-bundle-choice'),'button'=>__('Button','woo-bundle-choice')),

								'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_note_label'=>array( 
								'label'=>__('<strong>Note:Since you want to use icons with attributes filter this plugin will enable icon option for attributes on woocommerce page, so please set icons from there.</strong>','woo-bundle-choice'),
								'type'=>"label",
								'size_class'=>array('transition','hidden')
							),
							's_fconfig_is_single_select'=>array(
								'label'=>' ',
								'type'=>'checkbox',
								'value'=>array(),
								'sanitize'=>'sanitize_text_field',
								'options'=>array('1'=>__('Allow only single selection.','woo-bundle-choice')),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',								
								'attr'=>array('data-toggle="s_fconfig_is_single_select"'),
							),
							's_fconfig_icon_size_label'=>array(
								'label'=>__('Icon Size','woo-bundle-choice'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								'attr'=>array('data-toggle="s_fconfig_icon_size_label"'),
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_icon_size'=>array(
								'no_label' => true,
								'type'=>'text',
								'value'=>'0',
								'sanitize'=>'sanitize_text_field',
								'size_class'=>array('three','wide'),
								'attr'=>array('data-toggle="s_fconfig_icon_size"'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_icon_label_size_label'=>array(
								'label'=>__('Icon Label Size','woo-bundle-choice'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								'attr'=>array('data-toggle="s_fconfig_icon_label_size_label"'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_icon_label_size'=>array(
								'no_label' => true,
								'type'=>'text',
								'value'=>'0',
								'sanitize'=>'sanitize_text_field',
								'size_class'=>array('three','wide'),
								'attr'=>array('data-toggle="s_fconfig_icon_label_size"')
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_add_reset_link'=>array(
								'type'=>'checkbox',
								'value'=>array('1'),
								'sanitize'=>'sanitize_text_field',
								'options'=>array('1'=>__('Add reset link?','woo-bundle-choice')),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								// 'prev_inline'=>true,
								// 'inline'=>true,
								'visible_info'=>array( 
									'label'=>__('Reset action is not suported yet with the Template 3.','woo-bundle-choice'),
									'type'=>'visible_info',
									'class'=>array('small'),
									// 'size_class'=>array('sixteen','wide'),
								),
							),
							's_fconfig_add_help'=>array(
								'type'=>'checkbox',
								'value'=>array(),
								'sanitize'=>'sanitize_text_field', 
								'options'=>array('1'=>__('Add help text?','woo-bundle-choice')),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_add_help_text'=>array(
								'label'=>__('Help Text','woo-bundle-choice'),
								'type'=>'textarea',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
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
								'sanitize'=>'sanitize_text_field', 
								'options'=>array('1'=>__('Enabled?','woo-bundle-choice')),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),							
							's_fconfig_submit_btn'=>array(
								'label'=>__('Save','woo-bundle-choice'),
								'type'=>'button',
								'class'=>array('secondary'),
								//'size_class'=>array('eight','wide'),
								'inline'=>false,
								'attr'=>array('data-tab_key="s_fconfig"', 'data-action="save"'),
							)
						)
					),
				
			);


			$form_definition=apply_filters('eowbc_admin_form_filters',$form_definition);

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
