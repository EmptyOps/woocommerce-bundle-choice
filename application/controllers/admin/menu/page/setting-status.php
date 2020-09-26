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
						/* Language function - comment */ 
						'label'=>__('Settings','woo-bundle-choice'),
						'form'=>array(
							'saved_tab_key'=>array(
							'type'=>'hidden',
							'value'=>'',
							),
							'inventory_type'=>array(
								/* Language function - comment */ 
								'label'=>__('Inventory Type','woo-bundle-choice'),
								'type'=>'select',
								'value'=>'',	//wbc()->options->get_option('setting_staus','inventory_type'),
								'validate'=>array('required'=>''),
								'sanitize'=>'sanitize_text_field',
								/* Language function - comment */ 
								'options'=>array('jewelry'=>__('Jewelry','woo-bundle-choice'),'clothing'=>__('Clothing','woo-bundle-choice'),'home_decor'=>__('Home Decor','woo-bundle-choice'),'others'=>__('Others','woo-bundle-choice')),
								'class'=>array('fluid'),
								'size_class'=>array('eight','wide','required'),
								'inline'=>true,
							),
							'features'=>array(
								/* Language function - comment */ 
								'label'=>__('Choose features','woo-bundle-choice'),
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>array(),
								'options'=>array_replace($__features,array(	
									/* Language function - comment */ 								
									'rapnet_api'=>__('Rapnet (You will need paid <a href="https://sphereplugins.com/product/woocommerce-rapnet-integration-extension/" target="_blank">extension</a>)','woo-bundle-choice'),
									'glowstar_api'=>__('GlowStar Diamond API (API service is free, but you will need paid <a href="https://sphereplugins.com/product/diamond-api-integration/" target="_blank">extension</a>)','woo-bundle-choice'),
									'jbdiamond_api'=>__('JB Diamond API (API service is free, but you will need paid <a href="https://sphereplugins.com/product/diamond-api-integration/" target="_blank">extension</a>)','woo-bundle-choice'),
									'srk_api'=>__('SRK Diamond API (API service is free, but you will need paid <a href="https://sphereplugins.com/product/diamond-api-integration/" target="_blank">extension</a>)','woo-bundle-choice'),		
									)),
								'class'=>array('fluid'),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
								'grouped'=>true
							),
							'bonus_feature_devider'=>array(
								/* Language function - comment */ 
								'label'=>__('Bonus Features','woo-bundle-choice'),
								'type'=>'devider',
							),
							'bonus_features'=>array(
								/* Language function - comment */ 
								'label'=>__('Choose Bonus features','woo-bundle-choice'),
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
								/* Language function - comment */ 
								'label'=>__('Save','woo-bundle-choice'),
								'type'=>'button',				
								'class'=>array('primary'),
								'attr'=>array('data-tab_key="setting_status_setting"', "data-action='save'")
							)
						)							
					),
					'setting_status_log'=>array(
						/* Language function - comment */ 
						'label'=>__('Logs','woo-bundle-choice'),
						'form'=>array(
							'visible_info'=>array( 
								/* Language function - comment */ 
								'label'=>__('Following error details will be sent to '.constant('EOWBC_NAME').'\'s Support Team','woo-bundle-choice'),
								'type'=>'devider',
								// 'class'=>array('fluid', 'small'),
								// 'size_class'=>array('sixteen','wide'),
							),
							'send_error_log_subject_label'=>array(
								/* Language function - comment */ 
								'label'=>__('Subject','woo-bundle-choice'),
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
								/* Language function - comment */ 
								'label'=>__('Error logs & installed plugins etc. details','woo-bundle-choice'),
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
								/* Language function - comment */ 
								'options'=>array('1'=>__('I agree with Sphere Plugins <a href="https://sphereplugins.com/terms-conditions/" target="_blank">Terms</a> & <a href="https://sphereplugins.com/privacy-policy/" target="_blank">Privacy Policy</a>','woo-bundle-choice')),
								'options_attrs'=>array('1'=>array("onchange=\"if(jQuery(this)[0].checked){ jQuery('#btn_send_error_report').removeClass('disabled'); } else { jQuery('#btn_send_error_report').addClass('disabled'); }\"")),
								'is_id_as_name'=>true,
								'class'=>array('fluid'),
								'style'=>'normal',
								'size_class'=>array('required'),
								// 'prev_inline'=>true,
								// 'inline'=>true,
							),
							'btn_cancel'=>array(
								/* Language function - comment */ 
								'label'=>__('Cancel','woo-bundle-choice'),
								'type'=>'button',				
								'class'=>array('secondary'),
								'attr'=>array("data-action='cancel'"/*'onclick="window.location.href=document.referrer"'*/),
								'next_inline'=>true,
								'inline'=>true,
							),
							'btn_send_error_report'=>array(
								/* Language function - comment */ 
								'label'=>((get_option('eowbc_error_count',0) or get_option('eowbc_warning_count',0)) ? __('Send error report','woo-bundle-choice'):''),
								'type'=>'button',				
								'class'=>array('primary','disabled'),
								'attr'=>array('data-tab_key="setting_status_log"', "data-action='save'"),
								'prev_inline'=>true,
								'inline'=>true,
							),
							'clear_log_and_return'=>array(
								/* Language function - comment */ 
								'label'=>__('Clear Log and Return','woo-bundle-choice'),
								'type'=>'link',
								'attr'=>array("href='".admin_url('admin.php?page=eowbc-setting-status&action=clear&ref='.
		(empty($_SERVER['HTTP_REFERER'])? admin_url('admin.php?page=eowbc-setting-status'):$_SERVER['HTTP_REFERER']))."'"),
								'class'=>array(/*'secondary','hidden'*/)	
							)
						)
					),
					'advanced_config'=>array(
						/* Language function - comment */ 
						'label'=>__('Advanced Configuration','woo-bundle-choice'),
						'form'=> array(							
							'internal_url'=>array(
								/* Language function - comment */ 
								'label'=>__('Internal Routing URL','woo-bundle-choice'),
								'type'=>'text',								
								'class'=>array('fluid'),		
								'validate'=>array('url'=>''),
								'inline'=>false,
								'visible_info'=>array( 
									/* Language function - comment */ 
									'label'=>__('This setting is needed in exceptional scenarios where site setup or structure requires setting a specific URL for some operations.','woo-bundle-choice'),
									'type'=>'visible_info',
									'class'=>array('small'),
									'size_class'=>array('eight','wide'),
								),		
							),
							'remove_index_php'=>array(
								/* Language function - comment */ 
								'label'=>__('Remove index.php from link?','woo-bundle-choice'),
								'type'=>'checkbox',
								'sanitize'=>'sanitize_text_field',
								'value'=>array(),
								/* Language function - comment */ 
								'options'=>array('remove_index_php'=>__('Remove index.php','woo-bundle-choice')),
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
							),							
							'submit_button'=>array(
								/* Language function - comment */ 
								'label'=>__('Save','woo-bundle-choice'),
								'type'=>'button',
								'class'=>array('primary'),
								//'size_class'=>array('eight','wide'),
								'attr'=>array("data-action='save'",'data-tab_key="advanced_config"'),
								'inline'=>false
							),
						)						
					),

				);
	    
	    return $form_definition;
	}

}	
