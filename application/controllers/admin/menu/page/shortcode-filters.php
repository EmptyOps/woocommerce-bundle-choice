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
			unset($form_definition['filter_set']);
			
			if(isset($form_definition['d_fconfig']['form']['d_fconfig_builder'])) {
				unset($form_definition['d_fconfig']['form']['d_fconfig_builder']);
			}
			if(isset($form_definition['altr_filt_widgts']['form']['builder_altr_filt_widgts'])){
				unset($form_definition['altr_filt_widgts']['form']['builder_altr_filt_widgts']);
			}
			
			$form_definition['filter_setting']['label'] = 'Configuration & Shortcode';

			$form_definition['altr_filt_widgts']['form']['first_category_altr_filt_widgts']['label'] = 'Widgets';
			unset($form_definition['altr_filt_widgts']['form']['second_category_altr_filt_widgts']);

			$form_definition['d_fconfig']['label'] = 'Filter Configuration';
			$form_definition['d_fconfig']['form']['d_fconfig_save_sec_title']['label'] = 'Add Filter Field';

			$sh_filter_setting = array(
				'filter_setting_filter_section'=>array('label'=>'Configure the Shortcode Behaviour','type'=>'segment','desc'=>'Configure the behaviour of the shortcode and it\'s functionality.'
											),
				'filter_setting_filter'=> $form_definition['filter_setting']['form']['filter_setting_filter'], 
				'redirect_url'=>array(
					'label'=>eowbc_lang('Redirect URL'),
					'type'=>'text',
					'validate'=>array('required'=>''),
					'sanitize'=>'sanitize_text_field',
					'value'=>'',
					'class'=>array(),
					'size_class'=>array('eight','wide','required'),
					'inline'=>true,
				),	
				'redirect_url_help'=>array(
					'label'=>eowbc_lang('Set the redirect URL to which you want to redirect user after they hit the search button on filter. Default is set to default URL of WooCommerce shop page.'),
					'type'=>'visible_info',
					'class'=>array('small'),
				),
				'shortcode_label'=>array(
					'label'=>eowbc_lang('Shortcode'),
					'type'=>'label',
					'class'=>array('fluid'),
				),
				'shortcode'=>array(
					'label'=>'<strong>[wbc-shortcode-filters]</strong>',
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
					
					$form_definition['shortflt_'.$form_key] = $form_value;
					$form_definition['shortflt_'.$form_key]['attr'] = array('data-clean_tab_key="'.$form_key.'"');

					if(!empty($form_value['form']) and is_array($form_value)){
						foreach ($form_value['form'] as $frm_key => $frm_value) {
							if (!empty($frm_value['attr'])){
								foreach ($frm_value['attr'] as $frm_value_attr_key => $frm_value_attr_val) {
									if(strpos($frm_value_attr_val,'data-tab_key') !== false){
										$frm_value['attr'][$frm_value_attr_key] = str_replace('data-tab_key="','data-tab_key="shortflt_',$frm_value_attr_val);	
									}									
								}
							}
							$form_definition['shortflt_'.$form_key]['form'][$frm_key] = $frm_value;	
							//$form_definition['shortflt_'.$form_key]['form']['shortflt_'.$frm_key] = $frm_value;			
							//unset($form_definition['shortflt_'.$form_key]['form'][$frm_key]);
						}
					}					
					unset($form_definition[$form_key]);
				}
			}

			// unset($form_definition['shortflt_filter_setting']['form']['filter_setting_status']);
			// unset($form_definition['shortflt_filter_setting']['form']['filter_setting_price_filter_width']);
			// unset($form_definition['shortflt_filter_setting']['form']['filter_setting_alternate_slider_ui']);	

			$fields_to_keep = array('filter_setting_submit_btn','filter_setting_slider_max_lblsize','config_advance_begin','filter_setting_advance_two_tabs','filter_setting_advance_first_tabs','filter_setting_advance_second_tabs','config_advance_end','filter_setting_advance_two_tabs_divider');
			foreach ($form_definition['shortflt_filter_setting']['form'] as $key => $value) {
				if( !in_array($key, $fields_to_keep)) {
					unset($form_definition['shortflt_filter_setting']['form'][$key]);
				}
			}		

			$form_definition['shortflt_filter_setting']['form'] = array_merge($sh_filter_setting,$form_definition['shortflt_filter_setting']['form']);

			return $form_definition;
		}

	}
}		
