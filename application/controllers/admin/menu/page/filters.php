<?php
namespace eo\wbc\controllers\admin\menu\page;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Filters' ) ) {
	class Filters extends \eo\wbc\controllers\admin\Controller {

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
	            'hierarchical' => false,
	            'show_option_none' => '',
	            'hide_empty' => false,
	            'parent' => (wbc()->wc->get_term_by('slug',$slug,'product_cat')?wbc()->wc->get_term_by('slug',$slug,'product_cat')->term_id:''),
	            'taxonomy' => 'product_cat'
	        ));
	        
	        // $category_option_list='';
	        
	        foreach ($map_base as $base) {
	        	
	            // $category_option_list.= "<option data-type='0' data-slug='{$base->slug}' value='".$base->term_id."'>".$prefix.$base->name."</option>".eo_wbc_prime_category_($base->slug,' --');
	            $opts_arr[$base->term_taxonomy_id] = array( 'label'=>$prefix.$base->name, 'attr'=>' data-type="0" data-slug="'.$base->slug.'" ' );
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
	        	$opts_arr['pa_'.$item->attribute_id] = array( 'label'=>$item->attribute_label, 'attr'=>' data-type="1" data-slug="'.$item->attribute_name.'" ' );          
	        }
	        // return $attributes;
	        return $opts_arr;
	    }

		public static function get_form_definition( $is_add_sample_values = false ) {
			
			wbc()->load->model('admin/form-builder');
			wbc()->load->model('category-attribute');
			$inventory_type = wbc()->options->get_option('setting_status_setting_status_setting','inventory_type','');			
			
			$features = unserialize(wbc()->options->get_option('setting_status_setting_status_setting','features',serialize(array())));

			$filter_sets = unserialize(wbc()->options->get_option_group('filters_filter_set',"a:0:{}"));
			//wbc()->common->pr($filter_sets);
			if(!empty($filter_sets) and is_array($filter_sets)){
				foreach ($filter_sets as $filter_sets_key => $filter_sets_val) {
					$filter_sets[$filter_sets_key] = $filter_sets_val['filter_set_name'];
				}
			}
			

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
						'val' => 'Filter',
						'field_id'=>'d_fconfig_filter'
					),
					2=>array(
						'is_header' => 1, 
						'val' => 'Label',
						'field_id'=>'d_fconfig_label'
					),
					3=>array(
						'is_header' => 1, 
						'val' => 'Advance Filter',
						'field_id'=>'d_fconfig_is_advanced'
					),
					4=>array(
						'is_header' => 1, 
						'val' => 'Column Width',
						'field_id'=>'d_fconfig_column_width'
					),
					5=>array(
						'is_header' => 1, 
						'val' => 'Template',
						'field_id'=>'filter_template'
					),
					6=>array(
						'is_header' => 1, 
						'val' => 'Ordering',
						'field_id'=>'d_fconfig_ordering'
					),
					7=>array(
						'is_header' => 1, 
						'val' => 'Input Type',
						'field_id'=>'d_fconfig_input_type'
					),
					8=>array(
						'is_header' => 1, 
						'val' => 'Icon Size',
						'field_id'=>'d_fconfig_icon_size'
					),
					9=>array(
						'is_header' => 1, 
						'val' => 'Icon Label Size',
						'field_id'=>'d_fconfig_icon_label_size'
					),
					10=>array(
						'is_header' => 1, 
						'val' => 'Add reset link?',
						'field_id'=>'d_fconfig_add_reset_link'
					),
					11=>array(
						'is_header' => 1, 
						'val' => 'Filter Set',
						'field_id'=>'d_fconfig_set'
					)
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
						'colspan' => 12
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
						'val' => 'Filter',
						'field_id'=>'s_fconfig_filter'
					),
					2=>array(
						'is_header' => 1, 
						'val' => 'Label',
						'field_id'=>'s_fconfig_label'
					),
					3=>array(
						'is_header' => 1, 
						'val' => 'Advance Filter',
						'field_id'=>'s_fconfig_is_advanced'
					),
					4=>array(
						'is_header' => 1, 
						'val' => 'Column Width',
						'field_id'=>'s_fconfig_column_width'
					),
					5=>array(
						'is_header' => 1, 
						'val' => 'Template',
						'field_id'=>'filter_template'
					),
					6=>array(
						'is_header' => 1, 
						'val' => 'Ordering',
						'field_id'=>'s_fconfig_ordering'
					),
					7=>array(
						'is_header' => 1, 
						'val' => 'Input Type',
						'field_id'=>'s_fconfig_input_type'
					),
					8=>array(
						'is_header' => 1, 
						'val' => 'Icon Size',
						'field_id'=>'s_fconfig_icon_size'
					),
					9=>array(
						'is_header' => 1, 
						'val' => 'Icon Label Size',
						'field_id'=>'s_fconfig_icon_label_size'
					),
					10=>array(
						'is_header' => 1, 
						'val' => 'Add reset link?',
						'field_id'=>'s_fconfig_add_reset_link'
					),
					11=>array(
						'is_header' => 1, 
						'val' => 'Filter Set',
						'field_id'=>'s_fconfig_set'
					)
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
						'colspan' => 12
					),
				),
			);


			//Setting Page Filter Configuration's list
			$filter_set_table = array();
			$filter_set_table['id']='filter_sets_list';
			$filter_set_table['head'] = array(
				0=>array(
					0=>array(
						'is_header' => 1, 
						'val' => '',
						'is_checkbox' => true, 
						'sanitize'=>'sanitize_text_field',
						'checkbox'=> array('id'=>'dummy','value'=>array(),'options'=>array('row0_col0_chk'=>''), 'options_attrs'=>array('row0_col0_chk'=>array('data-action="bulk_select_all"', 'data-bulk_table_id="'.$filter_set_table["id"].'"')),'class'=>'','where'=>'in_table')
					),
					1=>array(
						'is_header' => 1,
						'val' => 'Filter Set',
						'field_id'=>'filter_set_name'
					),					
				),
			);
			$filter_set_table['body'] = array(
				
				0=>array(
					0=>array( 
						'val' => eowbc_lang("No filter(s) exists, please add some filters."),
						'colspan' => 1
					),
				),
			);

			$form_definition = array(
				'filter_setting'=>array(
						'label'=>"Configuration",
						'form'=>array(
							'filter_setting_section'=>array('label'=>'Filters Configuration','type'=>'segment','desc'=>'Global setting for the filters.'
									),
							'filter_setting_filter'=>array(
									'label'=>'Filter Configuration',
									'type'=>'devider',
								),
							'filter_setting_status'=>array(
									'label'=>'Filter Status',
									'type'=>'checkbox',
									'sanitize'=>'sanitize_text_field',
									'value'=>array('filter_setting_status'),
									'options'=>array('filter_setting_status'=>' Check here to enable horizontal filter bar'),
									'class'=>array(),
									'size_class'=>array('eight','wide'),
									'inline'=>true,
								),
							'filter_setting_price_filter_width'=>array(
								'label'=>'Price filter\'s column width',
								'type'=>'text',
								'validate'=>array('required'=>'','postfix'=>['%']),
								'sanitize'=>'sanitize_text_field',
								'value'=>wbc()->options->get_option('filters_filter_setting','filter_setting_price_filter_width','50%'),
								'class'=>array(),
								'size_class'=>array('eight','wide','required'),
								'inline'=>true,
							),								
							'filter_setting_alternate_slider_ui'=>array(
								'label'=>'Alternate Ticked Slider Widget',
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>array(wbc()->options->get_option('filters_filter_setting','filter_setting_alternate_slider_ui')),
								'options'=>array('filter_setting_alternate_slider_ui'=>' Check here to enable alternate UI view for filter sliders.'),
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
							),
							'filter_setting_numeric_slider_seperator'=>array(
								'label'=>'Numeric Filter Separator',
								'type'=>'text',
								'sanitize'=>'sanitize_text_field',
								'value'=>'.',
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
							),
							'filter_setting_slider_max_lblsize'=>array(
								'label'=>'Slider Options Text Limit',
								'type'=>'text',
								'sanitize'=>'sanitize_text_field',
								'value'=>'6',
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>false,
								'visible_info'=>array( 
									'label'=>eowbc_lang('You can truncate longer option texts that are displayed for filters of input type slider. The maximum number characters that will be displayed on your website filters depend on the integer value you set here. '),
									'type'=>'visible_info',
									'class'=>array('small'),
									// 'size_class'=>array('sixteen','wide'),
								),
							),
							'filter_icon_wrap_label'=>array(
									'label'=>'Wrap icon filter label',
									'type'=>'checkbox',
									'sanitize'=>'sanitize_text_field',
									'value'=>array(),
									'options'=>array('filter_icon_wrap_label'=>' '),
									'class'=>array(),
									'size_class'=>array('eight','wide'),
									'inline'=>true,
								),
							'filter_icon_wrap_filter_label'=>array(
									'label'=>'Word Wrap Icon Filter Labels',
									'type'=>'text',
									'sanitize'=>'sanitize_text_field',
									'value'=>'0',									
									'class'=>array(),
									'size_class'=>array('eight','wide'),
									'visible_info'=>array( 
									'label'=>eowbc_lang('Specify here to limit the number of word that is displayed on icon filters, it is sometime useful to keep it visually appealing.'),
									'type'=>'visible_info',
									'class'=>array('small'),
									'size_class'=>array('eight','wide'),
									),
								),
							'filter_setting_btnfilter_now'=>array(
								'label'=>'Show Apply Filters Button',
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>array(),
								'options'=>array('filter_setting_btnfilter_now'=>' '),
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
								'visible_info'=>array( 
									'label'=>eowbc_lang('If enabled the ajax search on each change of filter will not fire but the Apply Filters. This is useful if your website has many filters and user would normally filter on many of them.'),
									'type'=>'visible_info',
									'class'=>array('small'),
									'size_class'=>array('eight','wide'),
								),
							),
							'filter_setting_reset_now'=>array(
								'label'=>'Show Reset Filters Button',
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>array(),
								'options'=>array('filter_setting_reset_now'=>' '),
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
								'visible_info'=>array( 
									'label'=>eowbc_lang('If enabled the Reset Filters buttons will be displayed.'),
									'type'=>'visible_info',
									'class'=>array('small'),
									'size_class'=>array('eight','wide'),
								),
							),
							'price_filter_first_cat'=>array(
								'label'=>'First Category',
								'type'=>'devider',
							),
							'hide_price_filter_first_cat'=>array(
								'label'=>'Hide Price Filter',
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>'',
								'options'=>array('1'=>' Hide Price Filter for First Category?'),
								'is_id_as_name'=>true,
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
							),	
							'price_filter_order_first_cat'=>array(
								'label'=>'Display Order',
								'type'=>'text',
								'sanitize'=>'sanitize_text_field',
								'value'=>'',
								'class'=>array(),
								'size_class'=>array('two','wide'),
								'inline'=>true,
							),		
							'price_filter_second_cat'=>array(
								'label'=>'Second Category',
								'type'=>'devider',
							),
							'hide_price_filter_second_cat'=>array(
								'label'=>'Hide Price Filter',
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>'',
								'options'=>array('1'=>' Hide Price Filter for Second Category?'),
								'is_id_as_name'=>true,
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
							),	
							'price_filter_order_second_cat'=>array(
								'label'=>'Display Order',
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
								'label'=>'Prefix currency symbol for price filter',
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>array(),
								'options'=>array('price_filter_prefix'=>'Add Prefix'),
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,								
							),
							'price_filter_postfix'=>array(
								'label'=>'Postfix currency symbol for price filter',
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>array(),
								'options'=>array('price_filter_postfix'=>'Add Postfix'),
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,								
							),
							'config_advance_begin'=>array(
								'type'=>'accordian',
								'section_type'=>'start',
								'class'=>array('field'),
								'label'=>'<span class="ui large text">Advanced Setting</span>',
							),
							'filter_setting_advance_two_tabs_divider'=>array(
								'label'=>'Two tabs setting',
								'type'=>'devider',
							),
							'filter_setting_advance_two_tabs'=>array(
								'label'=>' ',
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>array(),
								'options'=>array('filter_setting_advance_two_tabs'=>'Enable/Disable two tabs for the First(or Diamond) category filters'),
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
							),
							'filter_setting_advance_first_tabs'=>array(
								'label'=>'Select first tab\'s filter set' ,
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'validate'=>array(),
								'options'=>$filter_sets,
								'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
							),
							'filter_setting_advance_first_category'=>array(
								'label'=>'Category for First Filter Set',
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'options'=> \eo\wbc\controllers\admin\menu\page\Filters::eo_wbc_prime_category_(),
								'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
							),
							'filter_setting_advance_second_tabs'=>array(
								'label'=>'Select second tab\'s filter set' ,
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'validate'=>array(),
								'options'=>$filter_sets,
								'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
							),
							'filter_setting_advance_second_category'=>array(
								'label'=>'Category for Second Filter Set',
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'options'=> \eo\wbc\controllers\admin\menu\page\Filters::eo_wbc_prime_category_(),
								'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
							),
							'config_advance_end'=>array(
								'type'=>'accordian',
								'section_type'=>'end'
							),
							'filter_setting_submit_btn'=>array(
								'label'=>eowbc_lang('Save'),
								'type'=>'button',								
								'class'=>array('secondary'),
								//'size_class'=>array('eight','wide'),
								'inline'=>false,
								'attr'=>array('data-tab_key="filter_setting"', 'data-action="save"'),
							)							
						)
					),
				'altr_filt_widgts'=>array(
					'label'=>'Alternate Filter Widgets',
					'form'=> array(
						'altr_filt_widgts_section'=>array('label'=>'Alternate Filter Widgets UI','type'=>'segment','desc'=>'Set the template of the filter UI for Desktop/Mobile or add custom CSS.'
						),

						'saved_tab_key'=>array(
							'type'=>'hidden',
							'value'=>'',
							),

						'first_category_altr_filt_widgts'=>array(
							'label'=>eowbc_lang('First Category'),
							'type'=>'radio',
							'value'=>'fc1',
							'validate'=>array('required'=>''),
							'sanitize'=>'sanitize_text_field',
							'options'=>apply_filters('eowbc_alternate_filter',array('fc1'=>'Default(Grid View)','fc2'=>'Template 1 (Expand/Collapse)','fc3'=>'Template 2','fc4'=>'Template 3','fc5'=>'Template 4')),
							'class'=>array('fluid'),						
							'size_class'=>array('required'),
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
							'validate'=>array('required'=>''),
							'sanitize'=>'sanitize_text_field',
							'options'=>apply_filters('eowbc_alternate_filter',array('sc1'=>'Default(Grid View)','sc2'=>'Template 1 (Expand/Collapse)','sc3'=>'Template 2','sc4'=>'Template 3','sc5'=>'Template 4')),
							'class'=>array('fluid'),						
							'size_class'=>array('required'),
							'inline'=>false,

							'visible_info'=>array( 'label'=>eowbc_lang('Applies to second category page in the ring builder process'),
								'type'=>'visible_info',
								'class'=>array('small'),
								// 'size_class'=>array('sixteen','wide'),
							),
						),
						'filter_setting_additional_css'=>array(
							'label'=>eowbc_lang('Additional CSS'),
							'type'=>'textarea',
							'value'=>'',
							'sanitize'=>'sanitize_text_field',							
							'class'=>array('fluid'),						
							'size_class'=>array('sixteen','wide'),
							//'size_class'=>array('eight','wide','transition',(array_intersect(array(wbc()->options->get_option('filters_altr_filt_widgts','second_category_altr_filt_widgts'),wbc()->options->get_option('filters_altr_filt_widgts','first_category_altr_filt_widgts')),array('fc4','sc4'))?'':'hidden')),
							'inline'=>false,

							'visible_info'=>array( 'label'=>eowbc_lang('Applies to all templates  of both categories.'),
								'type'=>'visible_info',
								'class'=>array('small'),
								// 'size_class'=>array('sixteen','wide'),
							),
						),
						'filter_setting_alternate_mobile'=>array(
								'label'=>'Alternate Mobile Filter Widget',
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
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

						'label'=>(($inventory_type==='jewelry' and $is_ring_builder)?"Diamond":"First")." Page Filter Configuration",
						'form'=>array( 
							'd_fconfig_section'=>array('label'=>'Manage filters of '.(($inventory_type==='jewelry' and $is_ring_builder)?"Diamond":"First"),'type'=>'segment','desc'=>'Add/Edit the filters and set their orderings.'
							),

							$table["id"].'_bulk'=>array(
								// 'label'=>'Bulk Actions',
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
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
								'label'=>"Add Filter Field",
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
							'd_fconfig_set'=>array(
								'label'=>'Filter Set',
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'validate'=>array(),
								'options'=>$filter_sets,
								'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								'visible_info'=>array( 
									'label'=>eowbc_lang('You can use this set name to group your filters in different sets which you can use to display on different pages based on shortcode or two tab settings e.g. Natural Diamond Tab & Lab Grown Diamond Tab.'),
									'type'=>'visible_info',
									'class'=>array('small'),
									// 'size_class'=>array('sixteen','wide'),
								),
							),							
							'd_fconfig_filter'=>array(
								'label'=>'Filter',
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'validate'=>array('required'=>''),
								'options'=> apply_filters('eowbc_admin_filter_filters', \eo\wbc\controllers\admin\menu\page\Filters::eo_wbc_attributes_( \eo\wbc\controllers\admin\menu\page\Filters::eo_wbc_prime_category_() ) ),	//array_replace(\eo\wbc\model\Category_Attribute::instance()->get_category(),\eo\wbc\model\Category_Attribute::instance()->get_attributs()),
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
								'label'=>eowbc_lang('Ordering'),
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
								'label'=>eowbc_lang('Input Type'),
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'validate'=>array('required'=>''),
								'options'=>array('icon'=>'Icon Only','icon_text'=>'Icon and Text','numeric_slider'=>'Numeric slider','text_slider'=>'Text slider','checkbox'=>'Checkbox','toggle_column'=>'Toggle Column','button'=>'Button'),
								'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),
							'd_fconfig_note_label'=>array(
								'label'=>"<strong>Note:Since you want to use icons with attributes filter this plugin will enable icon option for attributes on woocommerce page, so please set icons from there.</strong>",
								'type'=>"label",
								'size_class'=>array('transition','hidden')
							),
							'd_fconfig_is_single_select'=>array(
								'label'=>' ',
								'type'=>'checkbox',
								'value'=>array(),
								'sanitize'=>'sanitize_text_field',
								'options'=>array('1'=>'Allow only single selection.'),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',	
								'attr'=>array('data-toggle="d_fconfig_is_single_select"'),							
							),
							'd_fconfig_icon_size_label'=>array(
								'label'=>eowbc_lang('Icon Size'),
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
								'label'=>eowbc_lang('Icon Label Size'),
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
								'options'=>array('1'=>'Add reset link?'),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								// 'prev_inline'=>true,
								// 'inline'=>true,
								'visible_info'=>array( 
									'label'=>eowbc_lang('Reset action is not suported yet with the Template 3.'),
									'type'=>'visible_info',
									'class'=>array('small'),
									// 'size_class'=>array('sixteen','wide'),
								),
							),
							'd_fconfig_add_help'=>array(
								'type'=>'checkbox',
								'value'=>array(),
								'sanitize'=>'sanitize_text_field',
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
								/*'sanitize'=>'sanitize_text_field',*/
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
								'options'=>array('1'=>'Enabled?'),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),
							'config_advance_begin'=>array(
								'type'=>'accordian',
								'section_type'=>'start',
								'class'=>array('field'),
								'label'=>'<span class="ui large text">Advanced Setting</span>',
							),									
							'd_fconfig_non_auto_adjust'=>array(
								'label'=>'Disable auto adjust lable?',
								'type'=>'checkbox',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'options'=>array('1'=>' '),
								'is_id_as_name'=>true,
								'class'=>array()
							),
							'd_fconfig_slider_max_lblsize'=>array(
								'label'=>'Slider Options Text Limit',
								'type'=>'text',
								'sanitize'=>'sanitize_text_field',
								'value'=>'',
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>false,
								'visible_info'=>array( 
									'label'=>eowbc_lang('You can truncate longer option texts that are displayed for filters of input type slider. The maximum number characters that will be displayed on your website filters depend on the integer value you set here. '),
									'type'=>'visible_info',
									'class'=>array('small'),
									// 'size_class'=>array('sixteen','wide'),
								),
							),
							'config_advance_end'=>array(
								'type'=>'accordian',
								'section_type'=>'end'
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

						'label'=>($inventory_type==='jewelry'?"Settings":"Second")." Page Filter Configuration",
						'form'=>array( 
							'd_fconfig_section'=>array('label'=>'Manage filters of '.(($inventory_type==='jewelry' and $is_ring_builder)?"Settings":"Second"),'type'=>'segment','desc'=>'Add/Edit the filters and set their orderings.'
							),

							$sett_table["id"].'_bulk'=>array(
								// 'label'=>'Bulk Actions',
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
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
								'label'=>"Add Filter Field",
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
							's_fconfig_set'=>array(
								'label'=>'Filter Set',
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'validate'=>array(),
								'options'=>$filter_sets,
								'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								'visible_info'=>array( 
									'label'=>eowbc_lang('You can use this set name to group your filters in different sets which you can use to display on different pages based on shortcode or two tab settings e.g. Natural Diamond Tab & Lab Grown Diamond Tab.'),
									'type'=>'visible_info',
									'class'=>array('small'),
									// 'size_class'=>array('sixteen','wide'),
								),
							),							
							's_fconfig_filter'=>array(
								'label'=>eowbc_lang('Filter'),
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'validate'=>array('required'=>''),
								'options'=>apply_filters('eowbc_admin_filter_filters',  \eo\wbc\controllers\admin\menu\page\Filters::eo_wbc_attributes_( \eo\wbc\controllers\admin\menu\page\Filters::eo_wbc_prime_category_() ) ),	//array_replace(\eo\wbc\model\Category_Attribute::instance()->get_category(),\eo\wbc\model\Category_Attribute::instance()->get_attributs()),
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
								'label'=>eowbc_lang('Ordering'),
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
								'label'=>eowbc_lang('Input Type'),
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'validate'=>array('required'=>''),
								'options'=>array('icon'=>'Icon Only','icon_text'=>'Icon and Text','numeric_slider'=>'Numeric slider','text_slider'=>'Text slider','checkbox'=>'Checkbox','toggle_column'=>'Toggle Column','button'=>'Button'),
								'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),
							's_fconfig_note_label'=>array(
								'label'=>"<strong>Note:Since you want to use icons with attributes filter this plugin will enable icon option for attributes on woocommerce page, so please set icons from there.</strong>",
								'type'=>"label",
								'size_class'=>array('transition','hidden')
							),
							's_fconfig_is_single_select'=>array(
								'label'=>' ',
								'type'=>'checkbox',
								'value'=>array(),
								'sanitize'=>'sanitize_text_field',
								'options'=>array('1'=>'Allow only single selection.'),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',								
								'attr'=>array('data-toggle="s_fconfig_is_single_select"'),
							),
							's_fconfig_icon_size_label'=>array(
								'label'=>eowbc_lang('Icon Size'),
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
								'label'=>eowbc_lang('Icon Label Size'),
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
								'options'=>array('1'=>'Add reset link?'),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								// 'prev_inline'=>true,
								// 'inline'=>true,
								'visible_info'=>array( 
									'label'=>eowbc_lang('Reset action is not suported yet with the Template 3.'),
									'type'=>'visible_info',
									'class'=>array('small'),
									// 'size_class'=>array('sixteen','wide'),
								),
							),
							's_fconfig_add_help'=>array(
								'type'=>'checkbox',
								'value'=>array(),
								'sanitize'=>'sanitize_text_field',
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
								/*'sanitize'=>'sanitize_text_field',*/
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
								'options'=>array('1'=>'Enabled?'),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),	
							'config_advance_begin'=>array(
								'type'=>'accordian',
								'section_type'=>'start',
								'class'=>array('field'),
								'label'=>'<span class="ui large text">Advanced Setting</span>',
							),									
							's_fconfig_non_auto_adjust'=>array(
								'label'=>'Disable auto adjust lable?',
								'type'=>'checkbox',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'options'=>array('1'=>' '),
								'is_id_as_name'=>true,
								'class'=>array()
							),
							's_fconfig_slider_max_lblsize'=>array(
								'label'=>'Slider Options Text Limit',
								'type'=>'text',
								'sanitize'=>'sanitize_text_field',
								'value'=>'',
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>false,
								'visible_info'=>array( 
									'label'=>eowbc_lang('You can truncate longer option texts that are displayed for filters of input type slider. The maximum number characters that will be displayed on your website filters depend on the integer value you set here. '),
									'type'=>'visible_info',
									'class'=>array('small'),
									// 'size_class'=>array('sixteen','wide'),
								),
							),
							'config_advance_end'=>array(
								'type'=>'accordian',
								'section_type'=>'end'
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
				'filter_set'=>array(

						'label'=>__("Filter Sets",'woo-bundle-choice'),
						'form'=>array( 							
							'filter_set_section'=>array('label'=>'Manage filters sets','type'=>'segment','desc'=>'Group filters and manage their groups.'
							),
							$filter_set_table["id"].'_bulk'=>array(
								// 'label'=>'Bulk Actions',
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'options'=>array(''=>eowbc_lang('Bulk Actions'), 'delete'=>'Delete','activate'=>'Activate','deactivate'=>'Deactivate'),
								'class'=>array('fluid'),
								'size_class'=>array('two','wide'),
								'next_inline'=>true,
								'inline'=>true,
							),
							'filter_set_submit_btn_bulk'=>array(
								'label'=>'Apply',
								'type'=>'button',
								'class'=>array('secondary'),
								// 'size_class'=>array('eight','wide'),
								'prev_inline'=>true,
								'inline'=>true,
								'attr'=>array('data-tab_key="filter_set"', 'data-bulk_table_id="'.$filter_set_table["id"].'"', 'data-action="bulk"' )
							),
							'list'=>array_merge( $filter_set_table, array(
								'type'=>'table' )
							), 

							'filter_set_add_title'=>array(
								'label'=>"Add Filter Set",
								'type'=>'label',
								'size_class'=>array('eight','wide')
							),							
							'filter_set_id'=>array(
								'type'=>'hidden',
								'value'=>'',								
								'sanitize'=>'sanitize_text_field',
							),
							'filter_set_name'=>array(
								'label'=>__('Filter Set Name','woo-bundle-choice'),
								'type'=>'text',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'validate'=>array('required'=>''),
								'class'=>array('fluid'),
								'size_class'=>array('three','wide','required'),
								'visible_info'=>array( 
									'label'=>eowbc_lang('You can use this set name to group your filters in different sets which you can use to display on different pages based on shortcode or two tab settings e.g. Natural Diamond Tab & Lab Grown Diamond Tab.'),
									'type'=>'visible_info',
									'class'=>array('small'),
									// 'size_class'=>array('sixteen','wide'),
								),
							),	
							'filter_set_add_enabled'=>array(
								'type'=>'hidden',
								'value'=>true,					
							),													
							'filter_sets_submit_btn'=>array(
								'label'=>eowbc_lang('Save'),
								'type'=>'button',
								'class'=>array('secondary'),
								//'size_class'=>array('eight','wide'),
								'inline'=>false,
								'attr'=>array('data-tab_key="filter_set"', 'data-action="save"'),
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
