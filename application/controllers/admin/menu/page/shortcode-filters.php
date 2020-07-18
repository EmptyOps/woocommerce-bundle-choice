<?php
namespace eo\wbc\controllers\admin\menu\page;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Shortcode_Filters' ) ) {
	class Shortcode_Filters extends Filters {

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
			
			if(isset($form_definition['d_fconfig']['form']['d_fconfig_builder'])) {
				unset($form_definition['d_fconfig']['form']['d_fconfig_builder']);
			}
			if(isset($form_definition['altr_filt_widgts']['form']['builder_altr_filt_widgts'])){
				unset($form_definition['altr_filt_widgts']['form']['builder_altr_filt_widgts']);
			}
			
			$form_definition['filter_setting']['label'] = 'Shortcode';
			$form_definition['d_fconfig']['label'] = 'Filter Configuration';

			$sh_filter_setting = array(
				'shortcode_label'=>array(
					'label'=>eowbc_lang('Shortcode'),
					'type'=>'label',
					'class'=>array('fluid'),
				),
				'shortcode'=>array(
					'label'=>'<strong>[wbc-shortcode-filter]</strong>',
					'type'=>'label',
					'class'=>array('fluid'),
				),
				'shortcode_help'=>array(
					'label'=>eowbc_lang('Put above shortcode anywhere where you want to display filters, it is recommended to use the Elementor Shortcode widget if you are using Elementor on particular page'),
					'type'=>'visible_info',
					'class'=>array('small'),
				),
				'shortcode_multiple'=>array(
					'label'=>'If you want to use more than one shortcode based filters then please <a href="http://sphereplugins.com/contact-us" target="_blank">contact us</a>',
					'type'=>'visible_info',
					'class'=>array('fluid'),
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

			// unset($form_definition['sc_filter_setting']['form']['filter_setting_status']);
			// unset($form_definition['sc_filter_setting']['form']['filter_setting_price_filter_width']);
			// unset($form_definition['sc_filter_setting']['form']['filter_setting_alternate_slider_ui']);	

			$fields_to_keep = array('filter_setting_filter','filter_setting_submit_btn');
			foreach ($form_definition['sc_filter_setting']['form'] as $key => $value) {
				if( !in_array($key, $fields_to_keep)) {
					unset($form_definition['sc_filter_setting']['form'][$key]);
				}
			}		

			$form_definition['sc_filter_setting']['form'] = array_merge($sh_filter_setting,$form_definition['sc_filter_setting']['form']);

			return $form_definition;
		}

	}
}		

wbc()->load->asset('js','admin/tiny-feature/shortcode-filter');
wbc()->load->asset('js','admin/tiny-feature/shop-cat');
