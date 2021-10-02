<?php
namespace eo\wbc\controllers\admin\menu\page;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Shop_Category_Filter' ) ) {
	class Shop_Category_Filter extends Filters {

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

			wbc()->load->model('category-attribute');

			$form_definition = parent::get_form_definition();

			// update labels, remove unnecessary tabs
			unset($form_definition['s_fconfig']);
			unset($form_definition['filter_set']);
			
			if(isset($form_definition['d_fconfig']['form']['d_fconfig_builder'])) {
				unset($form_definition['d_fconfig']['form']['d_fconfig_builder']);
			}
			if(isset($form_definition['altr_filt_widgts']['form']['builder_altr_filt_widgts'])){
				unset($form_definition['altr_filt_widgts']['form']['builder_altr_filt_widgts']);
			}

			$form_definition["filter_setting"]["form"]["price_filter_first_cat"]["label"] = "Price Filter";
			$form_definition["filter_setting"]["form"]["hide_price_filter_first_cat"]["options"]["1"] = "Hide Price Filter?";

			$form_definition['altr_filt_widgts']['form']['first_category_altr_filt_widgts']['label'] = 'Widgets';
			unset($form_definition['altr_filt_widgts']['form']['second_category_altr_filt_widgts']);
			
			$form_definition['d_fconfig']['label'] = 'Filter Configuration';
			$form_definition['d_fconfig']['form']['d_fconfig_save_sec_title']['label'] = 'Add Filter Field';

			// add new fields 
			$sh_filter_setting = array(
				'sh_shop_cat_filter_section'=>array('label'=>'Configure the Shop/Category Filters','type'=>'segment','desc'=>'Change the behaviours of the filters on the shop and category page.'
											),

				'sh_shop_cat_filter_location'=>array(
					'label'=>eowbc_lang('Filter Location'),
					'type'=>'checkbox',
					'value'=>array(wbc()->options->get_option('filters_sc_filter_setting','sc_shop_cat_filter_location_shop'),wbc()->options->get_option('filters_sc_filter_setting','sc_shop_cat_filter_location_cat')),
					'force_value'=>1,
					'sanitize'=>'sanitize_text_field',
					'options'=>array('sc_shop_cat_filter_location_shop'=>'Shope Page','sc_shop_cat_filter_location_cat'=>'Category Page'),
					'class'=>array('fluid'),
					'inline'=>false,
					'visible_info'=>array( 'label'=>eowbc_lang('( Specify on which page you want to display filter, if you select category then you will be asked to select category on which you want to display the filter. )'),
						'type'=>'visible_info',
						'class'=>array('small'),
					),
					'inject_at'=>1,
				),
				'shop_cat_filter_category'=>array(
					'label'=>eowbc_lang('Category'),
					'type'=>'select',
					'value'=>wbc()->options->get_option('filters_sc_filter_setting','shop_cat_filter_category'),
					/*'force_value'=>1,*/
					'validate'=>array('validate_if'=>array('sc_shop_cat_filter_location_cat'=>array('required'=>''))),
					'sanitize'=>'sanitize_text_field',
					'validate'=>array('validate_if'=>array('sc_shop_cat_filter_location_cat'=>array('required'=>''))),
					'options'=>\eo\wbc\model\Category_Attribute::instance()->get_category(),
					'class'=>array('fluid','multiple','clearable'),
					'field_attr'=>array('multiple=""'),
					'inline'=>false,
					'visible_info'=>array( 'label'=>eowbc_lang('( Select category on which to show filter widget. Applicable only when category page option is enabled from above. )'),
						'type'=>'visible_info',
						'class'=>array('small'),
					),
					'size_class'=>array('required'),
					'inject_at'=>2,					
				),
			);
			
			// add prefix
			if(!empty($form_definition) and is_array($form_definition)){				
				foreach ($form_definition as $form_key => $form_value) {
					
					$form_definition['sc_'.$form_key] = $form_value;
					$form_definition['sc_'.$form_key]['attr'] = array('data-clean_tab_key="'.$form_key.'"');

					if(!empty($form_value['form']) and is_array($form_value)){
						foreach ($form_value['form'] as $frm_key => $frm_value) {
							if (!empty($frm_value['attr'])){
								foreach ($frm_value['attr'] as $frm_value_attr_key => $frm_value_attr_val) {
									if(strpos($frm_value_attr_val,'data-tab_key') !== false){
										$frm_value['attr'][$frm_value_attr_key] = str_replace('data-tab_key="','data-tab_key="sc_',$frm_value_attr_val);	
									}									
								}
							}
							$form_definition['sc_'.$form_key]['form'][$frm_key] = $frm_value;	
							//$form_definition['sc_'.$form_key]['form']['sc_'.$frm_key] = $frm_value;			
							//unset($form_definition['sc_'.$form_key]['form'][$frm_key]);
						}
					}					
					unset($form_definition[$form_key]);
				}
			}

			// remove unnecessary fields
			$fields_to_keep = array('filter_setting_btnfilter_now','filter_setting_reset_now','filter_setting_filter','filter_setting_slider_max_lblsize','filter_setting_submit_btn','price_filter_first_cat','hide_price_filter_first_cat','price_filter_order_first_cat','price_filter_prefix_postfix_devider','price_filter_prefix','price_filter_postfix','config_advance_begin','filter_setting_advance_two_tabs','filter_setting_advance_first_tabs','filter_setting_advance_first_category','filter_setting_advance_second_tabs','filter_setting_advance_second_category','config_advance_end','filter_setting_advance_two_tabs_divider');
			foreach ($form_definition['sc_filter_setting']['form'] as $key => $value) {
				if( !in_array($key, $fields_to_keep)) {
					unset($form_definition['sc_filter_setting']['form'][$key]);
				}
			}		

			// merge new fields
			// $form_definition['sc_filter_setting']['form'] = array_merge($sh_filter_setting,$form_definition['sc_filter_setting']['form']);
			$indat = 0;
			$tmp = $form_definition['sc_filter_setting']['form'];
			$form_definition['sc_filter_setting']['form'] = array();
			foreach ($tmp as $key => $value) {
				foreach ($sh_filter_setting as $kinner => $vinner) {
					if( isset($vinner["inject_at"]) && $vinner["inject_at"] == $indat ) {
						$form_definition['sc_filter_setting']['form'][$kinner] = $vinner;
						$indat++;
					}
				}

				$form_definition['sc_filter_setting']['form'][$key] = $value;
				$indat++;
			}	

			//wbc()->common->pr($form_definition['sc_d_fconfig']['form']);

			$form_definition['sc_d_fconfig']['form'] = wbc()->common->array_insert_before($form_definition['sc_d_fconfig']['form'],'d_fconfig_filter','filter_category',array(
					'label'=>eowbc_lang('Category'),
					'type'=>'select',
					'value'=>'',					
					'sanitize'=>'sanitize_text_field',
					'options'=>\eo\wbc\model\Category_Attribute::instance()->get_category(),
					'class'=>array('fluid'/*,'multiple'*/),
					/*'field_attr'=>array('multiple=""'),*/
					'inline'=>false,
					'visible_info'=>array( 'label'=>eowbc_lang('If you leave it empty the filter field will be added to all categories if you enabled and selected categories from configuration, and on shop page if you enabled shop page from configuration.'),
						'type'=>'visible_info',
						'class'=>array('small'),
					),
					/*'size_class'=>array('transition','hidden','required'),*/
				));
			$form_definition['sc_d_fconfig']['form']['list']['head'][0][]= array('is_header' => 1,
                      'val' => 'Category Page',
                      'field_id' => 'filter_category',
                    );
			//wbc()->common->pr($form_definition['sc_d_fconfig']['form']);
			return $form_definition;
		}

	}
}		
