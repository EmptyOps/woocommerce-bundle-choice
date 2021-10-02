<?php
namespace eo\wbc\controllers\admin\menu\page;

defined( 'ABSPATH' ) || exit;

class Setting_status {

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
		$__features = wbc()->config->get_features();
		unset($__features['api_integrations']);

		$form_definition = array(
					'setting_status_setting'=>array(
						'label'=>'Settings',
						'form'=>array(
							'setting_status_setting_section'=>array('label'=>'Plugin Feature Setting','type'=>'segment','desc'=>'Enable and Disable the plugin\'s features.'
											),
							'saved_tab_key'=>array(
								'type'=>'hidden',
								'value'=>'',
							),
							'inventory_type'=>array(
								'label'=>'Inventory Type',
								'type'=>'select',
								'value'=>'',	//wbc()->options->get_option('setting_staus','inventory_type'),
								'validate'=>array('required'=>''),
								'sanitize'=>'sanitize_text_field',
								'options'=>array('jewelry'=>'Jewelry','clothing'=>'Clothing','home_decor'=>'Home Decor','others'=>'Others'),
								'class'=>array('fluid'),
								'size_class'=>array('eight','wide','required'),
								'inline'=>true,
							),
							'features'=>array(
								'label'=>'Choose features',
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>array(),
								'options'=>array_replace($__features,array(									
									'rapnet_api'=>'Rapnet (You will need paid <a href="https://sphereplugins.com/product/woocommerce-rapnet-integration-extension/" target="_blank">extension</a>)',
									'glowstar_api'=>'GlowStar Diamond API (API service is free, but you will need paid <a href="https://sphereplugins.com/product/diamond-api-integration/" target="_blank">extension</a>)',
									'jbdiamond_api'=>'JB Diamond API (API service is free, but you will need paid <a href="https://sphereplugins.com/product/diamond-api-integration/" target="_blank">extension</a>)',
									'srk_api'=>'SRK Diamond API (API service is free, but you will need paid <a href="https://sphereplugins.com/product/diamond-api-integration/" target="_blank">extension</a>)',		
									)),
								'class'=>array('fluid'),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
								'grouped'=>true
							),
							'bonus_feature_devider'=>array(
								'label'=>eowbc_lang('Bonus Features'),
								'type'=>'devider',
							),
							'bonus_features'=>array(
								'label'=>'Choose Bonus features',
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>array(),
								'options'=>wbc()->config->get_bonus_features(),
								'class'=>array('fluid'),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
								'grouped'=>true
							),
							'save'=>array(
								'label'=>'Save',
								'type'=>'button',				
								'class'=>array('secondary'),
								'attr'=>array('data-tab_key="setting_status_setting"', "data-action='save'")
							)
						)							
					),
					'setting_status_log'=>array(
						'label'=>'Logs',
						'form'=>array(
							'setting_status_log_section'=>array('label'=>'System Log for the Plugin','type'=>'segment','desc'=>'The plugin\'s core error reporting system.'
											),
							'visible_info'=>array( 
								'label'=>'Following error details will be sent to '.constant('EOWBC_NAME').'\'s Support Team',
								'type'=>'devider',
								// 'class'=>array('fluid', 'small'),
								// 'size_class'=>array('sixteen','wide'),
							),
							'send_error_log_subject_label'=>array(
								'label'=>eowbc_lang('Subject'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('three','wide'),
								// 'next_inline'=>true,
								// 'inline'=>true,
							),
							'send_error_log_subject'=>array(
								'type'=>'text',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'class'=>array('fluid'),
								'size_class'=>array('sixteen','wide'),
								// 'inline'=>true,
							),
							'eo_wbc_view_error_label'=>array(
								'label'=>eowbc_lang('Error logs & installed plugins etc. details'),
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('sixteen','wide')
							),
							'eo_wbc_view_error'=>array(
								'type'=>'textarea',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'attr'=>array('style="width:100%; border: 1px solid #ddd;"','data-init="1"'),
								'class'=>array('fluid','eo_wbc_view_error'),
								'size_class'=>array('sixteen','wide')
							),
							'send_error_log_agree_terms'=>array(
								'type'=>'checkbox',
								'value'=>array(),
								'sanitize'=>'sanitize_text_field',
								'options'=>array('1'=>'I agree with Sphere Plugins <a href="https://sphereplugins.com/terms-conditions/" target="_blank">Terms</a> & <a href="https://sphereplugins.com/privacy-policy/" target="_blank">Privacy Policy</a>'),
								'options_attrs'=>array('1'=>array("onchange=\"if(jQuery(this)[0].checked){ jQuery('#btn_send_error_report').removeClass('disabled'); } else { jQuery('#btn_send_error_report').addClass('disabled'); }\"")),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								'size_class'=>array('required'),
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),
							'btn_cancel'=>array(
								'label'=>eowbc_lang('Cancel'),
								'type'=>'button',				
								'class'=>array('secondary','inverted'),
								'attr'=>array("data-action='cancel'"/*'onclick="window.location.href=document.referrer"'*/),
								'next_inline'=>true,
								'inline'=>true,
							),
							'btn_send_error_report'=>array(
								'label'=>((get_option('eowbc_error_count',0) or get_option('eowbc_warning_count',0)) ? eowbc_lang('Send error report'):''),
								'type'=>'button',				
								'class'=>array('secondary','disabled'),
								'attr'=>array('data-tab_key="setting_status_log"', "data-action='save'"),
								'prev_inline'=>true,
								'inline'=>true,
							),
							'clear_log_and_return'=>array(
								'label'=>eowbc_lang('Clear Log and Return'),
								'type'=>'link',
								'attr'=>array("href='".admin_url('admin.php?page=eowbc-setting-status&action=clear&ref='.
								(empty($_SERVER['HTTP_REFERER'])? admin_url('admin.php?page=eowbc-setting-status'):$_SERVER['HTTP_REFERER']))."'"),
								'class'=>array(/*'secondary','hidden'*/)	
							)
						)
					),
					'advanced_config'=>array(
						'label'=>'Advanced Configuration',
						'form'=> array(	
							'advanced_config_section'=>array('label'=>'Plugin\'s Advance Configuration','type'=>'segment','desc'=>'Advance configuration for the advance uses.'
												),						
							'internal_url'=>array(
								'label'=>eowbc_lang('Internal Routing URL'),
								'type'=>'text',								
								'class'=>array('fluid'),		
								'validate'=>array('url'=>''),
								'inline'=>false,
								'visible_info'=>array( 
									'label'=>eowbc_lang('This setting is needed in exceptional scenarios where site setup or structure requires setting a specific URL for some operations.'),
									'type'=>'visible_info',
									'class'=>array('small'),
									'size_class'=>array('eight','wide'),
								),		
							),
							'remove_index_php'=>array(
								'label'=>eowbc_lang('Remove index.php from link?'),
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>array(),
								'options'=>array('remove_index_php'=>'Remove index.php'),
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
							),							
							'submit_button'=>array(
								'label'=>eowbc_lang('Save'),
								'type'=>'button',
								'class'=>array('secondary'),
								//'size_class'=>array('eight','wide'),
								'attr'=>array("data-action='save'",'data-tab_key="advanced_config"'),
								'inline'=>false
							),
						)						
					),

				);
	    
	    return apply_filters('sp_wbc_setting_status_form_defination',$form_definition);
	}

}	
