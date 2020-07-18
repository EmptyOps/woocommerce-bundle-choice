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

			unset($form_definition['s_fconfig']);
			
			unset($form_definition['d_fconfig']['form']['d_fconfig_builder']);
			unset($form_definition['altr_filt_widgts']['form']['builder_altr_filt_widgts']);
			$form_definition['d_fconfig']['label'] = 'Filter Configuration';

			$sh_filter_setting = array(
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
				),
				'shop_cat_filter_category'=>array(
					'label'=>eowbc_lang('Category'),
					'type'=>'select',
					'value'=>wbc()->options->get_option('filters_sc_filter_setting','shop_cat_filter_category'),
					'force_value'=>1,
					'sanitize'=>'sanitize_text_field',
					'options'=>\eo\wbc\model\Category_Attribute::instance()->get_category(),
					'class'=>array('fluid'),
					'inline'=>false,
					'visible_info'=>array( 'label'=>eowbc_lang('( Select category on which to show filter widget. )'),
						'type'=>'visible_info',
						'class'=>array('small'),
					),
					'size_class'=>array('transition','hidden','required')
				),
			);

			if(!empty($form_definition) and is_array($form_definition)){				
				foreach ($form_definition as $form_key => $form_value) {
					
					$form_definition['sc_'.$form_key] = $form_value;

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

			unset($form_definition['sc_filter_setting']['form']['filter_setting_status']);
			unset($form_definition['sc_filter_setting']['form']['filter_setting_price_filter_width']);
			unset($form_definition['sc_filter_setting']['form']['filter_setting_alternate_slider_ui']);			

			$form_definition['sc_filter_setting']['form'] = array_merge($sh_filter_setting,$form_definition['sc_filter_setting']['form']);

			return $form_definition;
		}

	}
}		

wbc()->load->asset('js','admin/tiny-feature/shortcode-filter');
wbc()->load->asset('js','admin/tiny-feature/shop-cat');
