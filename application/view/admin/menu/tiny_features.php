<?php

defined( 'ABSPATH' ) || exit;

wbc()->load->model('category-attribute');


$disabled_class = array();
$label_class = array();
if(wbc()->options->get_option('tiny_features','tiny_features_unlock_swatches_shop_page') == 1) {
	// array_merge(array1)
	$disabled_class = array();
	$label_class = array();
}else{

	$disabled_class = array('disabled');
	$label_class = array('ui','grey','text');
}


$form = array();

$filter_table = array();
$filter_table['id']='eowbc_filter_widget_table';
$filter_table['head'] = array(
	0=>array(
		0=>array(
			'is_header' => 1, 
			'val' => '',
			'is_checkbox' => true, 
			'checkbox'=> array('id'=>'dummy','value'=>array(),'options'=>array('row0_col0_chk'=>''), 'options_attrs'=>array('row0_col0_chk'=>array('data-action="bulk_select_all"', 'data-bulk_table_id="'.$filter_table["id"].'"')),'class'=>'','where'=>'in_table')
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
$filter_datas =  unserialize(wbc()->options->get_option('tiny_feature','filter_widget',"a:0:{}"));
if(empty($filter_datas)){
	$filter_table['body'] = array(				
		0=>array(
			0=>array( 
				'val' => eowbc_lang("No filter(s) exists, please add some filters."),
				'colspan' => '10" class="tiny_filter_no_filter_found" style="text-align: center'
			),
		),
	);
} else {
	foreach ($filter_datas as $filter_name => $filter_data) {
		$type = $filter_data['type'];
		if($type === 'true'||$type === true){
			$attribute = eo\wbc\model\Category_Attribute::instance()->get_attribute($filter_name);
			$filter_data['name'] = $attribute->attribute_label;
		} else {
			$category = eo\wbc\model\Category_Attribute::instance()->get_single_category($filter_name);			
			$filter_data['name'] = $category->name;
		}
		$filter_table['body'][]= array(
			array(
				'is_header' => 0, 
				'val' => '',
				'is_checkbox' => true, 
				'checkbox'=> array('id'=>'dummy','value'=>array(),'options'=>array($filter_name=>' '),'class'=>'','where'=>'in_table')
			),
			array('val'=>$filter_data['name']),
			array('val'=>$filter_data['label']),
			array('val'=> (empty($filter_data['advance'])?'No':'Yes') ),
			array('val'=>$filter_data['column_width']),
			array('val'=>$filter_data['order']),
			array('val'=>$filter_data['input']),
			array('val'=>(empty($filter_data['icon_size'])?'-':$filter_data['icon_size'])),
			array('val'=>(empty($filter_data['font_size'])?'-':$filter_data['font_size'])),
			array('val'=>(empty($filter_data['reset']))?'No':'Yes'),
		);		
	}	
}

$shortcode_table = array();
$shortcode_table['id']='eowbc_shortcode_table';
$shortcode_table['head'] = array(
	array(				
		array(
			'is_header' => 1, 
			'val' => 'Label'
		),
		array(
			'is_header' => 1, 
			'val' => 'Unique Name'
		),
		array(
			'is_header' => 1, 
			'val' => 'Type'
		),
		array(
			'is_header' => 1, 
			'val' => 'Parent'
		),
		array(
			'is_header' => 1, 
			'val' => 'Remove'
		),		
	),
);

$shortcode_table['body'] = array(
	array(
		array( 
			'val' => eowbc_lang("No filter(s) exists, please add some filters."),
			'colspan' => '10" class="tiny_shortcode_no_filter_found" style="text-align: center'
		),
	),
);

// ------ aa sample data mate ni field muki ana mate var banavela se @a 154.2 -------
wbc()->load->model('admin/form-builder');
wbc()->load->model('category-attribute');

// check it out link
$check_it_out_link_type = 'skip';
$check_it_out_link_label = 'Check it out!';
$check_it_out_link = '';
$lbl_txt = 'Congratulations! It seems that you have completed the setup process, click below link to check it out in working on your website.';
$active_feature = \eo\wbc\controllers\admin\menu\Admin_Menu::active_pair_builder_feature();
if( !empty($active_feature) && \eo\wbc\controllers\admin\menu\Admin_Menu::is_pair_builder_feature_all_setup() ) {

	$configuration_buttons_page = wbc()->options->get_option('configuration','buttons_page',false);
	if( $configuration_buttons_page===0 or $configuration_buttons_page==='0' ) {			
		$check_it_out_link_type = 'link';
		$check_it_out_link = site_url('index.php/design-your-own-ring');
    }
    elseif( $configuration_buttons_page==1 or $configuration_buttons_page==3 ) {			
		$check_it_out_link_type = 'link';
		$check_it_out_link = site_url( /*'?#wbc_' only add hashtag to url if required since the user is not setting position on home page they will find our where it is displayed so unnecessarily putting #wbc_ is not good and annoying.*/);
    }
    elseif( $configuration_buttons_page==2 ) {			
		$check_it_out_link_type = 'label';
		$check_it_out_link_label = 'You have choose to display buttons using Shortcode only, so please go to the page in which you put the Shortcode to check it.';
		$lbl_txt = 'Congratulations! It seems that you have completed the setup process.';
    }
}

$bonus_features = unserialize(wbc()->options->get_option('setting_status_setting_status_setting','bonus_features',serialize(array())));

// ------

$form['id']='eowbc_tiny_features';
$form['title']='Tiny Features';
$form['method']='POST';
$form['tabs'] = true;
$form['data'] = array(
	
	'tiny_features_item_page_option'=>array(
			'label'=>'Swatches UI for Item Page',
			'form'=>array(
				/*'tiny_features_option_ui_toggle_status'=>array(
					'label'=>eowbc_lang('Toggle Button Enabled?'),
					'type'=>'checkbox',
					'value'=>array(wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_status')),
					'sanitize'=>'sanitize_text_field',
					'options'=>array('tiny_features_option_ui_toggle_status'=>'Toggle Button Status'),
					'class'=>array('fluid'),						
					// 'size_class'=>array('eight','wide'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('Enables the toogle buton to toggle the variation form at product page.'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					),
				),	*/
				'tiny_features_general_tab_start'=>array(
					'type'=>'accordian',
					'section_type'=>'start',
					'class'=>array('field', 'styled'),
					'label'=>'<span class="ui large text">General</span>',
				),					
				'tiny_features_dropdown_icon_only'=>array(
					'label'=>eowbc_lang('Display Icon Only on Dropdown?'),
					'type'=>'checkbox',
					'value'=>array(wbc()->options->get_option('tiny_features','tiny_features_dropdown_icon_only')),
					'sanitize'=>'sanitize_text_field',
					'options'=>array('tiny_features_dropdown_icon_only'=>' '),
					'class'=>array('fluid'),						
					// 'size_class'=>array('eight','wide'),
					'inline'=>false,					
				),			
				'add_sample_data'=>array(
					'label'=>'Add Sample Data',
					'type'=>'devider',
					// 'class'=>array('fluid'),
					// 'size_class'=>array('eight','wide')
				),

				'config_automation_link'=>array(
					'label'=>'Click here for automated configuration and setup',
					'type'=>'link',
					'attr'=>array("href='".admin_url("admin.php?setup_wizard_run=1&page=eowbc&eo_wbc_view_auto_jewel=1&f=opts_uis_item_page")."'"),
					'class'=>array('secondary')	
				),
				'config_automation_visible_info'=>array(
					'label'=>eowbc_lang('We recommend that you try sample data if you have not yet, in addition to providing the preview of how plugin look like on frontend of your website, sample data & configurations will also serve as boilerplate template for configuring the plugin.'),
					'type'=>'visible_info',
					'class'=>array('fluid', 'medium'),
					'size_class'=>array('sixteen','wide'),
					'inline'=>false,
				),
				
				

				/*'config_save_automation'=>array(
					'label'=>'Save',
					'type'=>'button',				
					'class'=>array('primary'),
					'attr'=>array("data-action='save'")
				)*/
				'check_it_out_status'=>array(
					'label'=>'Setup Status',
					'type'=>($check_it_out_link_type != 'skip' ?'devider':$check_it_out_link_type),
					// 'class'=>array('fluid'),
					// 'size_class'=>array('eight','wide')
				),
				'check_it_out_msg'=>array(
					'label'=>$lbl_txt,
					'type'=>($check_it_out_link_type != 'skip' ?'label':$check_it_out_link_type)
				),
				'check_it_out_link'=>array(
					'label'=>$check_it_out_link_label,
					'type'=>$check_it_out_link_type,
					'attr'=>array("href='".$check_it_out_link."'"),
					'class'=>array('secondary')	
				),								
				'tiny_features_general_tab_end'=>array(
					'type'=>'accordian',
					'section_type'=>'end'
				),
				
				'tiny_features_styling_tab_start'=>array(
					'type'=>'accordian',
					'section_type'=>'start',
					'class'=>array('field', 'styled'),
					'label'=>'<span class="ui large text">Global Styling And Settings</span>',
				),
				'tiny_features_disabled_unavailable_variation'=>array(
					'label'=>eowbc_lang('Behavior for Unavailable Variation'),
					'type'=>'select',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_disabled_unavailable_variation'),
					'options'=>array('blur_with_cross'=>'Blur with cross','blur_without_cross'=>'Blur without cross','hide'=>'Hide'),
					'sanitize'=>'sanitize_text_field',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide'/*,'required'*/),
					'attr'=>array(),					
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang(''),
						'type'=>'visible_info',
						'class'=>array('small','fluid'),
						// 'size_class'=>array('sixteen','wide'),
					),
					'attr'=>array("min='0',max='10'")					
				),	
				'tiny_features_disabled_attribute_style'=>array(
					'label'=>eowbc_lang('Behavior for Out of Stock Variation'),
					'type'=>'select',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_disabled_attribute_style','blur_with_cross'),
					'options'=>array('blur_with_cross'=>'Blur with cross','blur_without_cross'=>'Blur without cross','hide'=>'Hide'),
					'sanitize'=>'sanitize_text_field',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide'/*,'required'*/),
					'attr'=>array(),					
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('Disabled attribute will be hide / blur.</br>
										Note: Disable ajax threshold doesn\'t apply this feature.'),
						'type'=>'visible_info',
						'class'=>array('small','fluid'),
						// 'size_class'=>array('sixteen','wide'),
					),
					'attr'=>array("min='0',max='10'")					
				),		
				'tiny_features_ajax_variation_threshold'=>array(
					'label'=>eowbc_lang('Ajax Variation Threshold'),
					'type'=>'text',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_ajax_variation_threshold',30),
					'sanitize'=>'sanitize_text_field',
					'class'=>array('fluid'),						
					'size_class'=>array('eight','wide'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('By default, if the no. of product variations is less than 30, the product availability check is through JavaScript. If greater than 30, the ajax method is used. This field can control the threshold value of 30.'),
						'type'=>'visible_info',
						'class'=>array('small','fluid'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),				
				'tiny_features_styling_tab_end'=>array(
					'type'=>'accordian',
					'section_type'=>'end'
				),

				'tiny_features_product_page_tab_start'=>array(
					'type'=>'accordian',
					'section_type'=>'start',
					'class'=>array('field', 'styled'),
					'label'=>'<span class="ui large text">Product Page</span>',
				),
				'tiny_features_option_ui_toggle_init_status'=>array(
					'label'=>eowbc_lang('Show variation form at initial?'),
					'type'=>'checkbox',
					'value'=>array(wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_init_status')),
					'sanitize'=>'sanitize_text_field',
					'options'=>array('tiny_features_option_ui_toggle_init_status'=>'Variation Form Visiblity'),
					'class'=>array('fluid'),						
					// 'size_class'=>array('eight','wide'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('Enables to set the variation form open at initial.'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					),
				),	
				'tiny_features_hide_sku_category_product_page'=>array(
					'label'=>eowbc_lang('Hide SKU,Categories sections?'),
					'type'=>'checkbox',
					'value'=>array(wbc()->options->get_option('tiny_features','tiny_features_hide_sku_category_product_page')),
					'sanitize'=>'sanitize_text_field',
					'options'=>array('tiny_features_hide_sku_category_product_page'=>' '),
					'class'=>array('fluid'),						
					// 'size_class'=>array('eight','wide'),
					'inline'=>false,					
				),								
				'product_page_hide_first_variation_form'=>array(
					'label'=>'Hide first category\'s variation menu',
					'type'=>'checkbox',
					'sanitize'=>'sanitize_text_field',
					'value'=>array(wbc()->options->get_option('tiny_features','product_page_hide_first_variation_form')),
					'options'=>array('1'=>' '),
					'is_id_as_name'=>true,
					'class'=>array(),
					'visible_info'=>array( 'label'=>'If enabled the variation selection table for first category\'s products will be hidden if default variations are set',
						'type'=>'visible_info',
						'class'=>array('fluid', 'small'),
						'size_class'=>array('sixteen','wide'),
					),	
				), 
				'product_page_hide_second_variation_form'=>array(
					'label'=>'Hide second category\'s variation menu',
					'type'=>'checkbox',
					'sanitize'=>'sanitize_text_field',
					'value'=>array(wbc()->options->get_option('tiny_features','product_page_hide_second_variation_form')),
					'options'=>array('1'=>' '),
					'is_id_as_name'=>true,
					'class'=>array(),
					'visible_info'=>array( 'label'=>'If enabled the variation selection table for second category\'s products will be hidden if default variations are set',
						'type'=>'visible_info',
						'class'=>array('fluid', 'small'),
						'size_class'=>array('sixteen','wide'),
					),	
				), 
				'tiny_features_option_ui_toggle_text'=>array(
					'label'=>eowbc_lang('Toggle Buton Text'),
					'type'=>'text',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_text',__('CUSTOMIZE THIS PRODUCT')),
					'sanitize'=>'sanitize_text_field',
					'class'=>array('fluid'),						
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('Text to be shown on the toggle button.'),
						'type'=>'visible_info',
						'class'=>array('small','fluid'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_option_ui_option_dimention'=>array(
					'label'=>eowbc_lang('Swatches Box Dimention'),
					'type'=>'text',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_option_dimention','2em'),
					'sanitize'=>'sanitize_text_field',
					'class'=>array('fluid'),	
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('The height and width of the option\'s box.<strong>(prepend px,em,rem as measurement)</strong>'),
						'type'=>'visible_info',
						'class'=>array('small','fluid'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_option_ui_border_color'=>array(
					'label'=>eowbc_lang('Swatches Border Color'),
					'type'=>'color',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_color','#ECECEC'),
					'sanitize'=>'sanitize_hex_color',
					'class'=>array('fluid'),				
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the Swatches border'),
						'type'=>'visible_info',
						'class'=>array('small','fluid'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_option_ui_border_width'=>array(
					'label'=>eowbc_lang('Swatches Border width'),
					'type'=>'text',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_width','2px'),
					'sanitize'=>'sanitize_text_field',
					'class'=>array('fluid'),			
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('The border width of the Swatches border.<strong>(prepend px,em,rem as measurement)</strong>'),
						'type'=>'visible_info',
						'class'=>array('small','fluid'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_option_ui_border_color_hover'=>array(
					'label'=>eowbc_lang('Swatches Border Color on Hover'),
					'type'=>'color',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_color_hover','#3D3D3D'),
					'sanitize'=>'sanitize_hex_color',
					'class'=>array('fluid'),				
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the Swatches border on hover.'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_option_ui_border_width_hover'=>array(
					'label'=>eowbc_lang('Swatches Border width on Hover'),
					'type'=>'text',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_width_hover','2px'),
					'sanitize'=>'sanitize_text_field',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('The border width of the Swatches border on hover.<strong>(prepend px,em,rem as measurement)</strong>'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_option_ui_border_radius'=>array(
					'label'=>eowbc_lang('Swatches Border Radius'),
					'type'=>'text',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_radius','1px'),
					'sanitize'=>'sanitize_text_field',
					'class'=>array('fluid'),	
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('The border radius of the Swatches border.<strong>(prepend px,em,rem as measurement)</strong>'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),						
				'tiny_features_option_ui_font_color'=>array(
					'label'=>eowbc_lang('Swatches Font Color'),
					'type'=>'color',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_font_color','#DBDBDB'),
					'sanitize'=>'sanitize_hex_color',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the Swatches text.'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_option_ui_font_color_hover'=>array(
					'label'=>eowbc_lang('Swatches Font Color on Hover'),
					'type'=>'color',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_font_color_hover','#AA7D7D'),
					'sanitize'=>'sanitize_hex_color',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the Swatches text on hover.'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_option_ui_bg_color'=>array(
					'label'=>eowbc_lang('Swatches Background Color'),
					'type'=>'color',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_bg_color','#ffffff'),
					'sanitize'=>'sanitize_hex_color',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the Swatches background.'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_option_ui_bg_color_hover'=>array(
					'label'=>eowbc_lang('Swatches Background Color on Hover'),
					'type'=>'color',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_bg_color_hover','#DCC7C7'),
					'sanitize'=>'sanitize_hex_color',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the Swatches background on hover.'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_product_page_tab_end'=>array(
					'type'=>'accordian',
					'section_type'=>'end'
				),

				'tiny_features_shop_tab_start'=>array(
					'type'=>'accordian',
					'section_type'=>'start',
					'class'=>array('field', 'styled'),
					'label'=>'<span class="ui large text">Archive / Shop</span>',
				),
				// -- wbc()->options->get_option('tiny_features','tiny_features_unlock_swatches_switch') == 'tiny_features_unlock_swatches_switch' ? array('done'):array('not done') 
				'tiny_features_unlock_swatches_shop_page'=>array(
					/*'label'=>'Unlock swatches for the shop/category page',*/
					'type'=>'checkbox',
					'sanitize'=>'sanitize_text_field',
					'value'=>array(wbc()->options->get_option('tiny_features','tiny_features_unlock_swatches_shop_page')),
					'options'=>array('1'=>' '),
					'is_id_as_name'=>true,
					'class'=>array(''),
					'attr'=>array('style="display: none !important;"'),
					'visible_info'=>array( 'label'=>'Simply request to enable this feature with some CSS confirmation',
						'type'=>'visible_info',
						'class'=>array('fluid', 'small','hidden'),
						'size_class'=>array('sixteen','wide'),
					),	
				), 
				'tiny_features_unlock_swatches_link'=>array(
					'label'=>'Click here to Unlock Swatches For The Shop/Category Page',
					'type'=>'text',
					'class'=>array('secondary', 'hidden'),
					'attr'=>array('style="display: none !important;"'),					
					// 'visible_info'=>array( 'label'=>'Please visit at '.site_url(get_option('woocommerce_permalinks')['category_base'].'eo_diamond_shape_cat/'),
					// 	'type'=>'visible_info',
					// 	'class'=>array('fluid', 'small'),
					// 	'size_class'=>array('sixteen','wide'),
					// ),	
				),
				'tiny_features_unlock_swatches_whatsapp_link'=>array(
					'label'=>'Click here to Contact Through WhatsApp',
					'type'=>'link',
					'attr'=>array("href='https://api.whatsapp.com/send/?phone=918347408752&text=I%20want%20to%20unlock%20the%20variation%20swatches%20for%20the%20shop%2Fcategory%20%20page.%20The%20woo%20choice%20plugin%20is%20already%20installed%20on%20my%20WordPress%20admin%20panel%20and%20I%20am%20sending%20this%20msg%20to%20unlock%20this%20feature.&type=phone_number&app_absent=0'", "target='blank'"),
					'class'=>array('secondary'),
					// 'visible_info'=>array( 'label'=>'Please visit at '.site_url(get_option('woocommerce_permalinks')['category_base'].'eo_diamond_shape_cat/'),
					// 	'type'=>'visible_info',
					// 	'class'=>array('fluid', 'small'),
					// 	'size_class'=>array('sixteen','wide'),
					// ),	
				),
				'tiny_features_unlock_swatches_other_link'=>array(
					'label'=>'Click here to Contact Through Other option',
					'type'=>'link',
					'attr'=>array("href='https://sphereplugins.com/contact-us/'", "target='blank'"),
					'class'=>array('secondary'),
					// 'visible_info'=>array( 'label'=>'Please visit at '.site_url(get_option('woocommerce_permalinks')['category_base'].'eo_diamond_shape_cat/'),
					// 	'type'=>'visible_info',
					// 	'class'=>array('fluid', 'small'),
					// 	'size_class'=>array('sixteen','wide'),
					// ),	
				),
				'tiny_features_option_ui_loop_box_hover_media_index'=>array(
					'label'=>wbc()->config->product_variations_configs()['is_gallery_images_type_based_template'] == 1 ? eowbc_lang('Loop box media type to show on hover') : eowbc_lang('Loop box hover media index'),
					'label_class'=>array_merge( array(), $label_class),
					'type'=>wbc()->config->product_variations_configs()['is_gallery_images_type_based_template'] == 1 ? 'select' : 'number',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_loop_box_hover_media_index',wbc()->config->product_variations_configs()['is_gallery_images_type_based_template'] == 1 ? 'video' :  '2'),
					'options'=>wbc()->config->product_variations_configs()['is_gallery_images_type_based_template'] == 1 ? apply_filters('sp_variations_loop_box_hover_media_type',array('image'=>'Image','video'=>'Video')) : array(),
					'sanitize'=>'sanitize_text_field',
					'class'=>array_merge( array('fluid'), $disabled_class),
					'size_class'=>array('eight','wide'/*,'required'*/),
					'attr'=>array(),					
					'inline'=>false,

					'visible_info'=>array( 'label'=>wbc()->config->product_variations_configs()['is_gallery_images_type_based_template'] == 1 ? eowbc_lang('Set here the type of media to show on hover. For example you may like to show video or image on hover, leave it blank to disable the hover feature.') : eowbc_lang('Set here the index of thumb image or media to show on hover. For example you may like to show video on hover so set index as per your gallery images thumbnails display order.'),
						'type'=>'visible_info',
						'class'=>array('small','fluid'),
						// 'size_class'=>array('sixteen','wide'),
					),
					'attr'=>array("min='0',max='10'")					
				),						
				'shop_page_hide_first_variation_form'=>array(
					'label'=>'Hide first category\'s variation menu',
					'label_class'=>array_merge( array(), $label_class),
					'type'=>'checkbox',
					'sanitize'=>'sanitize_text_field',
					'value'=>array(wbc()->options->get_option('tiny_features','shop_page_hide_first_variation_form')),
					'options'=>array('1'=>' '),
					'is_id_as_name'=>true,
					'class'=>array(),
					'attr'=>array_merge( array(), $disabled_class),
					'visible_info'=>array( 'label'=>'If enabled the variation selection table for first category\'s products will be hidden if default variations are set',
						'type'=>'visible_info',
						'class'=>array('fluid', 'small'),
						'size_class'=>array('sixteen','wide'),
					),	
				), 
				'shop_page_hide_second_variation_form'=>array(
					'label'=>'Hide second category\'s variation menu',
					'label_class'=>array_merge( array(), $label_class),
					'type'=>'checkbox',
					'sanitize'=>'sanitize_text_field',
					'value'=>array(wbc()->options->get_option('tiny_features','shop_page_hide_second_variation_form')),
					'options'=>array('1'=>' '),
					'is_id_as_name'=>true,
					'class'=>array(),
					'attr'=>array_merge( array(), $disabled_class),
					'visible_info'=>array( 'label'=>'If enabled the variation selection table for second category\'s products will be hidden if default variations are set',
						'type'=>'visible_info',
						'class'=>array('fluid', 'small'),
						'size_class'=>array('sixteen','wide'),
					),	
				), 
				'tiny_features_shop_page_option_ui_option_dimention'=>array(
					'label'=>eowbc_lang('Swatches Box Dimention'),
					'label_class'=>array_merge( array(), $label_class),
					'type'=>'text',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_shop_page_option_ui_option_dimention','2em'),
					'sanitize'=>'sanitize_text_field',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,
					'attr'=>array_merge( array(), $disabled_class),
					'visible_info'=>array( 'label'=>eowbc_lang('The height and width of the Swatches box.<strong>(prepend px,em,rem as measurement)</strong>'),
						'type'=>'visible_info',
						'class'=>array('small','fluid'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),				
				'tiny_features_shop_page_option_ui_border_color'=>array(
					'label'=>eowbc_lang('Swatches Border Color'),
					'label_class'=>array_merge( array(), $label_class),
					'type'=>'color',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_shop_page_option_ui_border_color','#ECECEC'),
					'sanitize'=>'sanitize_hex_color',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,
					'attr'=>array_merge( array(), $disabled_class),
					'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the Swatches border'),
						'type'=>'visible_info',
						'class'=>array('small','fluid'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_shop_page_option_ui_border_width'=>array(
					'label'=>eowbc_lang('Swatches Border width'),
					'label_class'=>array_merge( array(), $label_class),
					'type'=>'text',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_shop_page_option_ui_border_width','2px'),
					'sanitize'=>'sanitize_text_field',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'attr'=>array_merge( array(), $disabled_class),					
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('The border width of the Swatches border.<strong>(prepend px,em,rem as measurement)</strong>'),
						'type'=>'visible_info',
						'class'=>array('small','fluid'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_shop_page_option_ui_border_color_hover'=>array(
					'label'=>eowbc_lang('Swatches Border Color on Hover -- Not work(selectore issue)'),
					'label_class'=>array_merge( array(), $label_class),
					'type'=>'color',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_shop_page_option_ui_border_color_hover','#3D3D3D'),
					'sanitize'=>'sanitize_hex_color',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'attr'=>array_merge( array(), $disabled_class),					
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the Swatches border on hover.'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_shop_page_option_ui_border_width_hover'=>array(
					'label'=>eowbc_lang('Swatches Border width on Hover'),
					'label_class'=>array_merge( array(), $label_class),
					'type'=>'text',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_shop_page_option_ui_border_width_hover','2px'),
					'sanitize'=>'sanitize_text_field',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'attr'=>array_merge( array(), $disabled_class),					
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('The border width of the Swatches border on hover.<strong>(prepend px,em,rem as measurement)</strong>'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_shop_page_option_ui_border_radius'=>array(
					'label'=>eowbc_lang('Swatches Border Radius'),
					'label_class'=>array_merge( array(), $label_class),
					'type'=>'text',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_shop_page_option_ui_border_radius','1px'),
					'sanitize'=>'sanitize_text_field',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'attr'=>array_merge( array(), $disabled_class),					
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('The border radius of the Swatches border.<strong>(prepend px,em,rem as measurement)</strong>'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),						
				'tiny_features_shop_page_option_ui_font_color'=>array(
					'label'=>eowbc_lang('Swatches Font Color -- Not work(variation file css override)'),
					'label_class'=>array_merge( array(), $label_class),
					'type'=>'color',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_shop_page_option_ui_font_color','#DBDBDB'),
					'sanitize'=>'sanitize_hex_color',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'attr'=>array_merge( array(), $disabled_class),					
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the Swatches text.'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_shop_page_option_ui_font_color_hover'=>array(
					'label'=>eowbc_lang('Swatches Font Color on Hover'),
					'label_class'=>array_merge( array(), $label_class),
					'type'=>'color',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_shop_page_option_ui_font_color_hover','#AA7D7D'),
					'sanitize'=>'sanitize_hex_color',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'attr'=>array_merge( array(), $disabled_class),					
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the Swatches text on hover.'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_shop_page_option_ui_bg_color'=>array(
					'label'=>eowbc_lang('Swatches Background Color -- Not work(variation file css override)'),
					'label_class'=>array_merge( array(), $label_class),
					'type'=>'color',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_shop_page_option_ui_bg_color','#ffffff'),
					'sanitize'=>'sanitize_hex_color',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'attr'=>array_merge( array(), $disabled_class),					
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the Swatches background.'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_shop_page_option_ui_bg_color_hover'=>array(
					'label'=>eowbc_lang('Swatches Background Color on Hover'),
					'label_class'=>array_merge( array(), $label_class),
					'type'=>'color',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_shop_page_option_ui_bg_color_hover','#DCC7C7'),
					'sanitize'=>'sanitize_hex_color',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'attr'=>array_merge(array(), $disabled_class),					
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the Swatches background on hover.'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_shop_tab_end'=>array(
					'type'=>'accordian',
					'section_type'=>'end'
				),

				'tiny_features_special_attributes_tab_start'=>array(
					'type'=>'accordian',
					'section_type'=>'start',
					'class'=>array('field', 'styled'),
					'label'=>'<span class="ui large text">Special Attributes</span>',
				),
				'tiny_features_special_attributes_tab_end'=>array(
					'type'=>'accordian',
					'section_type'=>'end'
				),

				'tiny_features_advanced_tab_start'=>array(
					'type'=>'accordian',
					'section_type'=>'start',
					'class'=>array('field', 'styled'),
					'label'=>'<span class="ui large text">Advanced</span>',
				),
				'tiny_features_enable_only_for_categories'=>array(
					'label'=>eowbc_lang('Enable Only For Categories(optional)'),
					'type'=>'select',
					'value'=> wbc()->options->get_option('tiny_features','tiny_features_enable_only_for_categories'/*,'#DCC7C7'*/),
					'sanitize'=>'sanitize_text_field',
					'options'=> \eo\wbc\model\Category_Attribute::instance()->get_category(),
					'class'=>array('fluid','additions','search','multiple','clearable'),
					'visible_info'=>array( 
						'label'=>eowbc_lang('Simply select the categories for which only you want to enable the variation swatches. Leave it blank if you want to keep it on for all categories, by default it is enabled for all categories.'),
						'type'=>'visible_info',
						'class'=>array('small'),
						'size_class'=>array('eight','wide'),
					),
					'size_class'=>array('three','wide'),
					'inline'=>false,	
				),
				'tiny_features_advanced_tab_end'=>array(
					'type'=>'accordian',
					'section_type'=>'end'
				),
				'tiny_features_gallery_options'=>array(
					'label'=>'Gallery Options',
					'type'=>'devider',
					// 'class'=>array('fluid'),
					// 'size_class'=>array('eight','wide')
				),
				'tiny_features_gallery_width'=>array(
					'label'=>eowbc_lang('Gallery Width'),
					'label_class'=>array_merge( array(), $label_class),
					'type'=>'text',
					'right_labeled'=>eowbc_lang('%'),
					'right_labeled_class'=>array(''),
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_gallery_width','58%'),
					'sanitize'=>'sanitize_text_field',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'attr'=>array_merge( array(), $disabled_class),					
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('Slider Gallery Width in %. Default value is: 50. Limit: 10-100.'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),					
				// //--- start @a ---
				// 'tiny_features_variation_swatches_admin_settings_and_configrations'=>array(
				// 				'label'=>eowbc_lang('Variation Swatches Admin Settings And Configrations'),
				// 				'type'=>'devider',
				// 				'class'=>array('dividing', 'ui', 'vertical', 'segment'),
				// ),

				// 'tiny_features_category_page'=>array(
				// 				'label'=>eowbc_lang('Category Page'),
				// 				'type'=>'devider',
				// 				'class'=>array('dividing', 'ui', 'vertical', 'segment'),
				// ),
				// 'tiny_features_category_general_settings'=>array(
				// 				'label'=>eowbc_lang('Category General Settings'),
				// 				'type'=>'devider',
				// 				'class'=>array('dividing', 'ui', 'vertical', 'segment'),								
				// ),
				// 'product_page_hide_second_variation_form_03'=>array(
				// 	'label'=>'Hide second category\'s variation menu',
				// 	'type'=>'checkbox',
				// 	'sanitize'=>'sanitize_text_field',
				// 	'value'=>array(wbc()->options->get_option('tiny_features','product_page_hide_second_variation_form')),
				// 	'options'=>array('1'=>' '),
				// 	'is_id_as_name'=>true,
				// 	'class'=>array(),	
				// 	'visible_info'=>array( 'label'=>'If enabled the variation selection table for second category\'s products will be hidden if default variations are set',
				// 		'type'=>'visible_info',
				// 		'class'=>array('fluid', 'small'),
				// 		'size_class'=>array('sixteen','wide'),
				// 	),	
				// ), 		
				// 'tiny_features_category_swatches_type_settings'=>array(
				// 				'label'=>eowbc_lang('Category Swatches Type Settings'),
				// 				'type'=>'devider',
				// 				'class'=>array('dividing', 'ui', 'vertical', 'segment'),
				// ),
				// 'product_page_hide_second_variation_form_02'=>array(
				// 	'label'=>'Hide second category\'s variation menu',
				// 	'type'=>'checkbox',
				// 	'sanitize'=>'sanitize_text_field',
				// 	'value'=>array(wbc()->options->get_option('tiny_features','product_page_hide_second_variation_form')),
				// 	'options'=>array('1'=>' '),
				// 	'is_id_as_name'=>true,
				// 	'class'=>array(),
				// 	'visible_info'=>array( 'label'=>'If enabled the variation selection table for second category\'s products will be hidden if default variations are set',
				// 		'type'=>'visible_info',
				// 		'class'=>array('fluid', 'small'),
				// 		'size_class'=>array('sixteen','wide'),
				// 	),	
				// ), 				
				// 'tiny_features_category_loop_box_hover_settings'=>array(
				// 				'label'=>eowbc_lang('Category Loop Box Hover Settings'),
				// 				'type'=>'devider',
				// 				'class'=>array('dividing', 'ui', 'vertical', 'segment'),
				// ),
				// 'product_page_hide_second_variation_form_03'=>array(
				// 	'label'=>'Hide second category\'s variation menu',
				// 	'type'=>'checkbox',
				// 	'sanitize'=>'sanitize_text_field',
				// 	'value'=>array(wbc()->options->get_option('tiny_features','product_page_hide_second_variation_form')),
				// 	'options'=>array('1'=>' '),
				// 	'is_id_as_name'=>true,
				// 	'class'=>array(),	
				// 	'visible_info'=>array( 'label'=>'If enabled the variation selection table for second category\'s products will be hidden if default variations are set',
				// 		'type'=>'visible_info',
				// 		'class'=>array('fluid', 'small'),
				// 		'size_class'=>array('sixteen','wide'),
				// 	),	
				// ), 

				// 'tiny_features_item_page'=>array(
				// 				'label'=>eowbc_lang('Item Page'),
				// 				'type'=>'devider',
				// 				'class'=>array('dividing', 'ui', 'vertical', 'segment'),
				// ),
				// 'product_page_hide_second_variation_form_04'=>array(
				// 	'label'=>'Hide second category\'s variation menu',
				// 	'type'=>'checkbox',
				// 	'sanitize'=>'sanitize_text_field',
				// 	'value'=>array(wbc()->options->get_option('tiny_features','product_page_hide_second_variation_form')),
				// 	'options'=>array('1'=>' '),
				// 	'is_id_as_name'=>true,
				// 	'class'=>array(),
				// 	'visible_info'=>array( 'label'=>'If enabled the variation selection table for second category\'s products will be hidden if default variations are set',
				// 		'type'=>'visible_info',
				// 		'class'=>array('fluid', 'small'),
				// 		'size_class'=>array('sixteen','wide'),
				// 	),	
				// ), 				
				// 'tiny_features_item_general_settings'=>array(
				// 				'label'=>eowbc_lang('Item General Settings'),
				// 				'type'=>'devider',
				// 				'class'=>array('dividing', 'ui', 'vertical', 'segment'),
				// ),
				// 'product_page_hide_second_variation_form_05'=>array(
				// 	'label'=>'Hide second category\'s variation menu',
				// 	'type'=>'checkbox',
				// 	'sanitize'=>'sanitize_text_field',
				// 	'value'=>array(wbc()->options->get_option('tiny_features','product_page_hide_second_variation_form')),
				// 	'options'=>array('1'=>' '),
				// 	'is_id_as_name'=>true,
				// 	'class'=>array(),
				// 	'visible_info'=>array( 'label'=>'If enabled the variation selection table for second category\'s products will be hidden if default variations are set',
				// 		'type'=>'visible_info',
				// 		'class'=>array('fluid', 'small'),
				// 		'size_class'=>array('sixteen','wide'),
				// 	),	
				// ), 				
				// 'tiny_features_item_slider_and_zoom_settings'=>array(
				// 				'label'=>eowbc_lang('Slider And Zoom Settings'),
				// 				'type'=>'devider',
				// 				'class'=>array('dividing', 'ui', 'vertical', 'segment'),
				// ),	
				// 'product_page_hide_second_variation_form_06'=>array(
				// 	'label'=>'Hide second category\'s variation menu',
				// 	'type'=>'checkbox',
				// 	'sanitize'=>'sanitize_text_field',
				// 	'value'=>array(wbc()->options->get_option('tiny_features','product_page_hide_second_variation_form')),
				// 	'options'=>array('1'=>' '),
				// 	'is_id_as_name'=>true,
				// 	'class'=>array(),
				// 	'visible_info'=>array( 'label'=>'If enabled the variation selection table for second category\'s products will be hidden if default variations are set',
				// 		'type'=>'visible_info',
				// 		'class'=>array('fluid', 'small'),
				// 		'size_class'=>array('sixteen','wide'),
				// 	),	
				// ), 	
				// //--- end ---
				'tiny_features_option_ui_save'=>array(
							'label'=>'Save',
							'type'=>'button',		
							'class'=>array('primary'),
							'attr'=>array("data-action='save'")				
				),
				
			)
		),
	'tiny_features_specification_view'=>array(
		'label'=>'Specifications View for Item Page',
		'form'=>array(
			'tiny_features_devider_specification_view'=>array(
					'label'=>'Specification View Configuration',
					'type'=>'devider',
				),
			/*'tiny_features_specification_view_status'=>array(
					'label'=>'Enable Specifications View?',
					'type'=>'checkbox',
					'value'=>array(wbc()->options->get_option('tiny_features','specification_view_status')),
					'sanitize'=>'sanitize_text_field',
					'options'=>array('specification_view_status'=>' Check here to enable specification view at product page.'),
					'class'=>array(),
					'size_class'=>array('eight','wide'),
					'inline'=>true,
				),*/
			
			'tiny_features_devider_specification_view_more_config'=>array(
					'label'=>'',
					'type'=>'devider',
				),
			'tiny_features_specification_view_shortcode_status'=>array(
					'label'=>'Shortcode Status',
					'type'=>'checkbox',
					'value'=>array(wbc()->options->get_option('tiny_features','specification_view_shortcode_status')),
					'sanitize'=>'sanitize_text_field',
					'options'=>array('specification_view_shortcode_status'=>' Check here to enable shortcode feature of specification view at product page (Use <strong>[woo-bundle-choice-specification-view] </strong> as Shortcode).'),
					'class'=>array(),
					'size_class'=>array('eight','wide'),
					'inline'=>true,
					'visible_info'=>array( 'label'=>eowbc_lang('(Please clean product description area on product page for better UI/UX.)'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					),											
				),
			'tiny_features_specification_view_default_status'=>array(
					'label'=>'At Default Position - Item/Product Page',
					'type'=>'checkbox',
					'value'=>array(wbc()->options->get_option('tiny_features','specification_view_default_status')),
					'sanitize'=>'sanitize_text_field',
					'options'=>array('specification_view_default_status'=>'Check here to enable shortcode feature of specification view at specification section on product page.'),
					'class'=>array(),
					'size_class'=>array('eight','wide'),
					'inline'=>true,
				),
			'tiny_features_specification_view_style'=>array(
					'label'=>'Alternate Widgets',
					'type'=>'radio',
					'value'=>wbc()->options->get_option('tiny_features','specification_view_style','default'),
					'sanitize'=>'sanitize_text_field',
					'options'=>array('default'=>'Default Style','template_1'=>'Template 1','template_2'=>'Template 2'),
					'class'=>array(),
					'size_class'=>array('eight','wide','required'),
					'inline'=>true,
				),
			'tiny_features_specification_meta_keys'=>array(
					'label'=>'Additional Meta',
					'type'=>'select',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_specification_meta_keys',''),
					'sanitize'=>'sanitize_text_field',		
					//'options'=>\eo\wbc\model\Category_Attribute::instance()->get_category(),			
					'class'=>array('fluid','multiple','allow_addition','search'),
					'field_attr'=>array('multiple=""'),
					'inline'=>false,					
					'size_class'=>array(),
					'visible_info'=>array( 'label'=>eowbc_lang('Add Keys of your Additional WooCommerce Product Meta here, if you want to display them with specification view. If the meta is not found for your specified key then it will be ignored.'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					),
					
				),
			'tiny_features_save_specification_view'=>array(
						'label'=>'Save',
						'type'=>'button',		
						'class'=>array('secondary'),
						'attr'=>array("data-action='save'")	
					)
			)									
		),
	// 	'tiny_features_home_filter'=>array(
		
	// 		'label'=>'Shortcode Filters for Home',
	// 		'form'=>array(
	// 			'shop_cat_shortcode_devider_add_filter_field'=>array(
	// 				'label'=>'Add Filter Field',
	// 				'type'=>'devider',
	// 			),
	// 			'shop_cat_shortcode_filter'=>array(
	// 				'label'=>eowbc_lang('Filter'),
	// 				'type'=>'select',
	// 				'value'=>'',
	// 				'sanitize'=>'sanitize_text_field',
	// 				'options'=>array_replace(eo\wbc\model\Category_Attribute::instance()->get_category(),eo\wbc\model\Category_Attribute::instance()->get_attributs()),
	// 				'class'=>array('fluid'),
	// 				'inline'=>false,
	// 				'visible_info'=>array( 'label'=>eowbc_lang('( Select category or attribute on which this filter field should do the searching. )'),
	// 					'type'=>'visible_info',
	// 					'class'=>array('small'),
	// 				),
	// 				'size_class'=>array('eight','wide','required'),
	// 				/*'size_class'=>array('transition','hidden')*/
	// 			),
	// 			'shop_cat_shortcode_label'=>array(
	// 				'label'=>eowbc_lang('Label'),
	// 				'type'=>'text',
	// 				'value'=>'',					
	// 				'sanitize'=>'sanitize_text_field',
	// 				'class'=>array('fluid'),
	// 				'inline'=>false,
	// 				'visible_info'=>array( 'label'=>eowbc_lang('( Label text to display on website for this filter field. )'),
	// 					'type'=>'visible_info',
	// 					'class'=>array('small'),
	// 				),
	// 				'size_class'=>array('required')
	// 			),
	// 			'shop_cat_shortcode_unique_id'=>array(
	// 				'label'=>eowbc_lang('Unique ID'),
	// 				'type'=>'text',
	// 				'value'=>'',					
	// 				'sanitize'=>'sanitize_text_field',
	// 				'class'=>array('fluid'),
	// 				'inline'=>false,
	// 				'visible_info'=>array( 'label'=>eowbc_lang('( Specify unique id, useful if you want to create dependant filters please visit doc for more details. )'),
	// 					'type'=>'visible_info',
	// 					'class'=>array('small'),
	// 				),
	// 				'size_class'=>array('required')
	// 			),
	// 			'shop_cat_shortcode_add'=>array(
	// 					'label'=>'Add Filter',
	// 					'type'=>'button',		
	// 					'class'=>array('primary'),
	// 					'attr'=>array("data-action='add-shortcode-filter'")				
	// 			),
	// 			'shop_cat_shortcode_devider_filter_fields'=>array(
	// 				'label'=>'Filter Fields',
	// 				'type'=>'devider',
	// 			),				
	// 			'shop_cat_shortcode_table'=>array_merge( $shortcode_table , array(
	// 				'type'=>'table' )
	// 			),
	// 			'shop_cat_shortcode_devider_generate_shortcode'=>array(
	// 				'label'=>'Generate Shortcode',
	// 				'type'=>'devider',
	// 			),
	// 			'shop_cat_shortcode_text'=>array(
	// 				'label'=>eowbc_lang('Shortcode'),
	// 				'type'=>'textarea',
	// 				'value'=>'',					
	// 				'sanitize'=>'sanitize_text_field',
	// 				'class'=>array('fluid'),
	// 				'inline'=>false,					
	// 				'size_class'=>array('transition','hidden','sixteen','wide')
	// 			),				
	// 			'shop_cat_shortcode_generate'=>array(
	// 					'label'=>'Generate Shortcode',
	// 					'type'=>'button',		
	// 					'class'=>array('primary','disabled'),
	// 					'attr'=>array("data-action='shortcode-generate'")				
	// 			),
	// 		)							
	// 	),
	// 'tiny_features_shop_cat_filter'=>array(
	// 		'label'=>'Filters for Shop/Category Page',
	// 		'form'=>array(	
	// 			'shop_cat_filter_location'=>array(
	// 				'label'=>eowbc_lang('Filter Location'),
	// 				'type'=>'checkbox',
	// 				'value'=>array(wbc()->options->get_option('tiny_features','shop_cat_filter_location_shop'),wbc()->options->get_option('tiny_features','shop_cat_filter_location_cat')),
	// 				'sanitize'=>'sanitize_text_field',
	// 				'options'=>array('shop_cat_filter_location_shop'=>'Shope Page','shop_cat_filter_location_cat'=>'Category Page'),
	// 				'class'=>array('fluid'),
	// 				'inline'=>false,
	// 				'visible_info'=>array( 'label'=>eowbc_lang('( Specify on which page you want to display filter, if you select category then you will be asked to select category on which you want to display the filter. )'),
	// 					'type'=>'visible_info',
	// 					'class'=>array('small'),
	// 				),
	// 			),
	// 			'shop_cat_filter_category'=>array(
	// 				'label'=>eowbc_lang('Category'),
	// 				'type'=>'select',
	// 				'value'=>wbc()->options->get_option('tiny_features','shop_cat_filter_category'),
	// 				'sanitize'=>'sanitize_text_field',
	// 				'options'=>eo\wbc\model\Category_Attribute::instance()->get_category(),
	// 				'class'=>array('fluid'),
	// 				'inline'=>false,
	// 				'visible_info'=>array( 'label'=>eowbc_lang('( Select category on which to show filter widget. )'),
	// 					'type'=>'visible_info',
	// 					'class'=>array('small'),
	// 				),
	// 				'size_class'=>array('transition','hidden','required')
	// 			),
	// 			'shop_cat_filter_two_filter'=>array(
	// 				'label'=>eowbc_lang('Two Filters?'),
	// 				'type'=>'checkbox',
	// 				'value'=>array(wbc()->options->get_option('tiny_features','shop_cat_filter_two_filter')),
	// 				'sanitize'=>'sanitize_text_field',
	// 				'options'=>array('shop_cat_filter_two_filter'=>' '),
	// 				'class'=>array('fluid'),
	// 				'inline'=>false,
	// 				'visible_info'=>array( 'label'=>eowbc_lang('( For some specific requirements you might want to display two filters on same page, the two filters function separately based on category, if you enable this option you will be asked to select dependent categories. )'),
	// 					'type'=>'visible_info',
	// 					'class'=>array('small'),
	// 				),
	// 			),
	// 			'shop_cat_filter_two_filter_first'=>array(
	// 				'label'=>eowbc_lang('First Category'),
	// 				'type'=>'select',
	// 				'value'=>wbc()->options->get_option('tiny_features','shop_cat_filter_two_filter_first'),
	// 				'sanitize'=>'sanitize_text_field',
	// 				'options'=>eo\wbc\model\Category_Attribute::instance()->get_category(),
	// 				'class'=>array('fluid'),
	// 				'inline'=>false,
	// 				'visible_info'=>array( 'label'=>eowbc_lang('( The first category of the two different filters, please select the main category of which all attribute options and products you want to include in this filter\'s layout and search results. )'),
	// 					'type'=>'visible_info',
	// 					'class'=>array('small'),
	// 				),
	// 				'size_class'=>array('transition','hidden','required')
	// 			),
	// 			'shop_cat_filter_two_filter_first_title'=>array(
	// 				'label'=>eowbc_lang('First Filter Title'),
	// 				'type'=>'text',
	// 				'value'=>wbc()->options->get_option('tiny_features','shop_cat_filter_two_filter_first_title'),		
	// 				'sanitize'=>'sanitize_text_field',
	// 				'class'=>array('fluid'),
	// 				'inline'=>false,
	// 				'visible_info'=>array( 'label'=>eowbc_lang('( The title text that is set to this filter\'s heading title. )'),
	// 					'type'=>'visible_info',
	// 					'class'=>array('small'),
	// 				),
	// 				'size_class'=>array('transition','hidden','required')
	// 			),
	// 			'shop_cat_filter_two_filter_second'=>array(
	// 				'label'=>eowbc_lang('Second Category'),
	// 				'type'=>'select',
	// 				'value'=>wbc()->options->get_option('tiny_features','shop_cat_filter_two_filter_second'),
	// 				'sanitize'=>'sanitize_text_field',
	// 				'options'=>eo\wbc\model\Category_Attribute::instance()->get_category(),
	// 				'class'=>array('fluid'),
	// 				'inline'=>false,
	// 				'visible_info'=>array( 'label'=>eowbc_lang('( The second category of the two different filters, please select the main category of which all attribute options and products you want to include in this filter\'s layout and search results.' ),
	// 					'type'=>'visible_info',
	// 					'class'=>array('small'),
	// 				),
	// 				'size_class'=>array('transition','hidden','required')
	// 			),
	// 			'shop_cat_filter_two_filter_second_title'=>array(
	// 				'label'=>eowbc_lang('Second Filter Title'),
	// 				'type'=>'text',
	// 				'value'=>wbc()->options->get_option('tiny_features','shop_cat_filter_two_filter_second_title'),		
	// 				'sanitize'=>'sanitize_text_field',
	// 				'class'=>array('fluid'),
	// 				'inline'=>false,
	// 				'visible_info'=>array( 'label'=>eowbc_lang('( The title text that is set to this filter\'s heading title. )'),
	// 					'type'=>'visible_info',
	// 					'class'=>array('small'),
	// 				),
	// 				'size_class'=>array('transition','hidden','required')
	// 			),
	// 			'shop_cat_filter_alternate_view'=>array(
	// 				'label'=>eowbc_lang('Alternate Mobile View Widget?'),
	// 				'type'=>'checkbox',
	// 				'value'=>array(wbc()->options->get_option('tiny_features','shop_cat_filter_alternate_view')),
	// 				'sanitize'=>'sanitize_text_field',
	// 				'options'=>array('shop_cat_filter_alternate_view'=>' '),
	// 				'class'=>array('fluid'),
	// 				'inline'=>false,
	// 				'visible_info'=>array( 'label'=>eowbc_lang('( Enable this option if you want to use alternate mobile UI which is quite suitable for mobile layout. )'),
	// 					'type'=>'visible_info',
	// 					'class'=>array('small'),
	// 				),
	// 			),
	// 			'shop_cat_filter_selected_filter'=>array(
	// 				'label'=>eowbc_lang('Selected Filters?'),
	// 				'type'=>'checkbox',
	// 				'value'=>array(wbc()->options->get_option('tiny_features','shop_cat_filter_selected_filter')),
	// 				'sanitize'=>'sanitize_text_field',
	// 				'options'=>array('shop_cat_filter_selected_filter'=>' '),
	// 				'class'=>array('fluid'),
	// 				'inline'=>false,
	// 				'visible_info'=>array( 'label'=>eowbc_lang('( Enable this option if you want to show in a line all selected filters with an option to remove them. )'),
	// 					'type'=>'visible_info',
	// 					'class'=>array('small'),
	// 				),
	// 			),
	// 			'shop_cat_filter_automation'=>array(
	// 				'label'=>'Want Sample Filters?',
	// 				'type'=>'link-widget',					
	// 				'options'=>array('Add sample Filter Data'=>admin_url('admin.php?page=eowbc&eo_wbc_view_auto_jewel=1&type=filters_automation'),'Remove sample data'=>admin_url('admin.php?page=eowbc&eo_wbc_view_auto_jewel=1&type=remove_filters_automation')),
	// 				'class'=>array('secondary'),
	// 				'visible_info'=>array( 'label'=>eowbc_lang('<br/>( If you want to see sample filters with sample data the please click add button above, you can select what sample data you want to add in the next step and later you can remove sample data by clicking "Remove sample data" button above. After adding sample data visit this sample page to see it in action! )'),
	// 					'type'=>'visible_info',
	// 					'class'=>array('small'),
	// 				),
	// 			),
	// 			'shop_cat_filter_css'=>array(
	// 				'label'=>'CSS for Custom Styling',
	// 				'type'=>'textarea',				
	// 				'value'=>wbc()->options->get_option('tiny_features','shop_cat_filter_css'),	
	// 				'sanitize'=>'sanitize_text_field',
	// 				'size_class'=>array('sixteen','wide'),
	// 				'class'=>array('secondary'),
	// 				'visible_info'=>array( 'label'=>eowbc_lang('( Specify your custom CSS for the custom styling, you can override any class of any element of the filter layout to achieve styling of your choice. )'),
	// 					'type'=>'visible_info',
	// 					'class'=>array('small'),
	// 				),
	// 			),
	// 			'shop_cat_filter_save'=>array(
	// 					'label'=>'Save',
	// 					'type'=>'button',		
	// 					'class'=>array('primary'),
	// 					'attr'=>array("data-action='save'")				
	// 			),
	// 			'shop_cat_filter_devider'=>array(
	// 				'label'=>'</h4></form><form class="ui form segment" id="eowbc_tiny_features_filter_add_form" name="eowbc_tiny_features_filter_add_form" method="POST"><input type="hidden" id="_wpnonce_filter_add" name="_wpnonce" value="'.wp_create_nonce('eowbc_tiny_features_filter_add').'"><input type="hidden" name="action" value="eowbc_ajax"><input type="hidden" name="resolver" value="eowbc_tiny_features_filter_add"><h4 class="ui dividing header">Filters',
	// 				'type'=>'devider',
	// 			),

	// 			$filter_table["id"].'_bulk'=>array(
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
	// 			'shop_cat_filter_table_btn_bulk'=>array(
	// 				'label'=>'Apply',
	// 				'type'=>'button',
	// 				'class'=>array('secondary'),
	// 				// 'size_class'=>array('eight','wide'),
	// 				'prev_inline'=>true,
	// 				'inline'=>true,
	// 				'attr'=>array('data-bulk_table_id="'.$filter_table["id"].'"', 'data-action="bulk"' )
	// 			),
	// 			'shop_cat_filter_table'=>array_merge( $filter_table , array(
	// 				'type'=>'table' )
	// 			), 
	// 			'shop_cat_filter_table_add_new'=>array(
	// 				'label'=>"Add filter",
	// 				'type'=>'label',
	// 				'size_class'=>array('eight','wide')
	// 			),				

	// 			'shop_cat_filter_add_category'=>array(
	// 				'label'=>'Filter',
	// 				'type'=>'select',
	// 				'value'=>'',
	// 				'sanitize'=>'sanitize_text_field',
	// 				'options'=>array_replace(eo\wbc\model\Category_Attribute::instance()->get_category(),eo\wbc\model\Category_Attribute::instance()->get_attributs()),
	// 				'class'=>array('fluid'),
	// 				'size_class'=>array('three','wide','required'),
	// 				'attr'=>array("onchange='document.getElementById(\"shop_cat_filter_add_type\").value=isNaN(document.getElementById(\"shop_cat_filter_add_category\").value)'")
	// 			),
	// 			'shop_cat_filter_add_type'=>array(
	// 				'type'=>'hidden',
	// 				'value'=>'',
	// 				'sanitize'=>'sanitize_text_field',
	// 			),
	// 			'shop_cat_filter_add_dependent'=>array(
	// 				'type'=>'hidden',
	// 				'value'=>'',
	// 				'sanitize'=>'sanitize_text_field',
	// 			),
	// 			'shop_cat_filter_add_label'=>array(
	// 				'label'=>eowbc_lang('Label'),
	// 				'type'=>'text',					
	// 				'size_class'=>array('three','wide'),					
	// 			),				
	// 			'shop_cat_filter_add_is_advanced'=>array(
	// 				'type'=>'checkbox',
	// 				'value'=>array(),
	// 				'sanitize'=>'sanitize_text_field',
	// 				'options'=>array('shop_cat_filter_add_is_advanced'=>'Is it advanced filter? (Optional)'),
	// 				'class'=>array('fluid'),
	// 				'style'=>'normal',
	// 			),
				
	// 			'shop_cat_filter_add_column_width'=>array(
	// 				'label' => 'Column Width',
	// 				'type'=>'text',
	// 				'value'=>'50',
	// 				'sanitize'=>'sanitize_text_field',
	// 				'size_class'=>array('three','wide','required'),					
	// 				'attr'=>array('type="number"','step="6.25"','min="6.25"','max="100"')
	// 			),
	// 			'shop_cat_filter_add_order'=>array(
	// 				'label'=>eowbc_lang('Ordering'),				
	// 				'type'=>'text',
	// 				'value'=>'0',
	// 				'sanitize'=>'sanitize_text_field',
	// 				'size_class'=>array('three','wide','required'),					
	// 			),
	// 			'shop_cat_filter_add_input_type'=>array(
	// 				'label'=>eowbc_lang('Input Type'),					
	// 				'type'=>'select',
	// 				'value'=>'',
	// 				'sanitize'=>'sanitize_text_field',
	// 				'options'=>array('icon'=>'Icon Only','icon_text'=>'Icon and Text','numeric_slider'=>'Numeric slider','text_slider'=>'Text slider','checkbox'=>'Checkbox'),
	// 				'class'=>array('fluid'),
	// 				'size_class'=>array('three','wide','required'),
	// 			),				
	// 			'shop_cat_filter_add_icon_size'=>array(
	// 				'label' => eowbc_lang('Icon Size'),
	// 				'type'=>'text',
	// 				'value'=>'45px',
	// 				'sanitize'=>'sanitize_text_field',
	// 				'size_class'=>array('three','wide'),					
	// 			),				
	// 			'shop_cat_filter_add_icon_label_size'=>array(
	// 				'label' => eowbc_lang('Icon Label Size'),
	// 				'type'=>'text',
	// 				'value'=>'0.78571429rem',
	// 				'sanitize'=>'sanitize_text_field',
	// 				'size_class'=>array('three','wide'),					
	// 			),
	// 			'shop_cat_filter_add_reset_link'=>array(
	// 				'type'=>'checkbox',
	// 				'value'=>array(),
	// 				'sanitize'=>'sanitize_text_field',
	// 				'options'=>array('shop_cat_filter_add_reset_link'=>'Add reset link? (Optional)'),
	// 				'class'=>array('fluid'),
	// 				'style'=>'normal',					
	// 			),
	// 			'shop_cat_filter_add_child_filter'=>array(
	// 				'type'=>'checkbox',
	// 				'value'=>array(),
	// 				'sanitize'=>'sanitize_text_field',
	// 				'options'=>array('shop_cat_filter_add_child_filter'=>'Child Filter? (Optional)'),
	// 				'class'=>array('fluid'),
	// 				'style'=>'normal',					
	// 			),
	// 			'shop_cat_filter_add_child_label'=>array(
	// 				'label'=>'Child Label',
	// 				'type'=>'text',
	// 				'value'=>'',					
	// 				'sanitize'=>'sanitize_text_field',
	// 				'class'=>array('fluid'),				
	// 				'size_class'=>array('transition','hidden')	
	// 			),
	// 			'shop_cat_filter_add_submit_btn'=>array(
	// 				'label'=>eowbc_lang('Save'),
	// 				'type'=>'button',
	// 				'class'=>array('secondary'),
	// 				//'size_class'=>array('eight','wide'),
	// 				'inline'=>false,
	// 				'attr'=>array('data-target="shop_cat_filter"', 'data-action="save"','data-callback="cleanup"'),
	// 			)	
	// 		),									
	// 	),
);
$bonus_features = unserialize(wbc()->options->get_option('setting_status_setting_status_setting','bonus_features',serialize(array())));			

if(empty($bonus_features['opts_uis_item_page'])) {
	unset($form['data']['tiny_features_item_page_option']);
}

if(empty($bonus_features['spec_view_item_page'])) {
	unset($form['data']['tiny_features_specification_view']);
}

wbc()->load->model('admin\form-builder');

eo\wbc\model\admin\Form_Builder::instance()->build($form);
wbc()->load->asset('js','admin/tiny-feature/shortcode-filter');
wbc()->load->asset('js','admin/tiny-feature/shop-cat');
wbc()->load->asset('js','admin/tiny-feature/specification');
?>

<script type="text/javascript">

jQuery(document).ready(function(){

	jQuery('[for="tiny_features_unlock_swatches_shop_page_1"]').css('display','none');

	var options_ui_video_section = '<style>'+
	'    .spui-admin-custum-container {'+
	'		float: left;'+
	'		width: 100%;'+
	'		display: -webkit-box;'+
	'		display: -ms-flexbox;'+
	'		display: flex;'+
	'		-webkit-box-orient: horizontal;'+
	'		-webkit-box-direction: normal;'+
	'		    -ms-flex-flow: row wrap;'+
	'		        flex-flow: row wrap;'+
	'	}'+
	''+
	''+
	''+
	'	.spui-admin-custum-container-left-section {'+
	'        -webkit-box-flex: 1;'+
	'            -ms-flex: 1 0 calc(100% - 296px);'+
	'                flex: 1 0 calc(100% - 296px);'+
	'        max-width: calc(100% - 296px);'+
	'        width: 100%;'+
	'        margin-right: 20px;'+
	'		padding: 20px 50px;'+
	'		background: #fff;'+
	'		border-radius: 10px;'+
	'		margin-top: 20px;'+
	'		-webkit-box-shadow: 0 4px 28px rgb(0 0 0 / 12%);'+
	'		        box-shadow: 0 4px 28px rgb(0 0 0 / 12%);'+
	'    }'+
	''+
	''+
	'    .spui-admin-custum-container-rigth-section {'+
	'        display: inline-block;'+
	'        -webkit-box-flex: 1;'+
	'            -ms-flex: 1 0 276px;'+
	'                flex: 1 0 276px;'+
	'        width: 30%;'+
	'        margin-top: 1rem;'+
	'        float: left;'+
	'    }'+
	'    [data-tab="tiny_features_item_page_option"]{'+
	'    	display: inline-block;'+
	'    	width: 60%;'+
	'    	float: left;'+
	'    }'+
	'	.spui-admin-swatch-var-widget-wrap {'+
	'		width: 100%;'+
	'		float: left;'+
	'	}'+
	''+
	''+
	'    .spui-admin-swatch-var-widget {'+
	'        padding: 10px;'+
	'        background: #5858581c;'+
	'        border-radius: 10px;'+
	'        -webkit-box-shadow: 0 4px 26px rgba(0, 0, 0, 0.08);'+
	'                box-shadow: 0 4px 26px rgba(0, 0, 0, 0.08);'+
	'        margin-bottom: 20px;'+
	'		width: 100%;'+
	'		float: left;'+
	'	}'+
	''+
	'	.spui-admin-swat-video-frame {'+
	'		width: 100%;'+
	'		float: left;'+
	'		padding: 14px 0;'+
	'	}'+
	'	.spui-admin-swat-video-frame iframe {'+
	'		width: 100%;'+
	'	}'+
	''+
	'	.spui-swatch-video-title{'+
	'		margin-bottom: 10px;'+
	'		font-size: 1.28571429rem;'+
	'		line-height: 1.28571429em;'+
	'		font-weight: 700;'+
	'    	padding: 0;'+
	'		display: block;'+
	'		width: 100%;'+
	'    	float: left;'+
	'	}'+
	''+
	'	.spui-admin-swatch-var-addon-wrap{'+
	'		float: left;'+
	'		width: 100%;'+
	'	}'+
	''+
	'	.spui-admin-swatch-var-addon{'+
	'		float: left;'+
	'		width: 100%;'+
	'		text-align: center;'+
	'		padding: 10px;'+
	'		border: 1px solid #EBECED;'+
	'		border-top: 0 none;'+
	'		margin-bottom: 15px;'+
	'	}'+
	''+
	'	.spui-admin-swatch-var-widget-title {'+
	'    	text-align: center;'+
	'	}'+
	''+
	'	a.spui-swatch-addon-link{'+
	'		color: #2271B1;'+
	'		display: block;'+
	'	}'+
	''+
	'	.spui-swatch-addon-link h2{'+
	'		font-size: 1.71428571rem;'+
	'		color: black;'+
	'    	line-height: 1.5;'+
	'		margin-bottom: 0;'+
	'		margin-top: 0;'+
	'		font-weight: 700;'+
	'    	padding: 0;'+
	'		display: block;'+
	'	}'+
	''+
	'	.spui-admin-swatch-var-addon p{'+
	'		font-size: 13px;'+
	'		margin: 0 0 1em;'+
	'    	line-height: 1.4285em;'+
	'		display: block;'+
	'		float: left;'+
	'		width: 100%;'+
	'		'+
	'	}'+
	''+
	'	.spui-admin-swatch-submit-link{'+
	'		display: block;'+
	'		padding: 15px 5px;'+
	'		background: #424242;'+
	'		color: #fff;'+
	'		text-decoration: none;'+
	'		margin-top: 25px;'+
	'		border-radius: 5px;'+
	'		width: 100%;'+
	'		float: left;'+
	'	}'+
	'	a.spui-admin-swatch-submit-link.spui-admin-update-clicks:hover {'+
	'	    color: black;'+
	'	    text-decoration: none;'+
	'	    background: transparent;'+
	'	    border: 1px solid;'+
	'	}'+
	''+
	'	p.spui-admin-swatch-var-description {'+
	'	    float: left;'+
	'	    padding-top: 15px;'+
	'	}'+
	''+
	'	@media(max-width:960px){'+
	'		body .spui-admin-custum-container-left-section{'+
	'			-webkit-box-flex: 1 !important;'+
	'			    -ms-flex: 1 1 100% !important;'+
	'			        flex: 1 1 100% !important;'+
	'			max-width: 100%  !important;'+
	'		}'+
	'		body .spui-admin-custum-container-rigth-section {'+
	'			-webkit-box-flex: 1 !important;'+
	'			    -ms-flex: 1 1 100% !important;'+
	'			        flex: 1 1 100% !important;'+
	'			max-width: 100%  !important;'+
	'		}'+
	'	}'+
	''+
	''+
	'    </style>'+
	''+
	'<div class="spui-admin-custum-container-rigth-section">'+
	'    <div class="spui-admin-swatch-var-widget-wrap">'+
	'<!--         <div class="spui-admin-swatch-var-widget">'+
	'            <h3 class="spui-swatch-video-title">Getting Started</h3>'+
	'            <div class="spui-admin-swat-video-frame">'+
	'                <iframe'+
	'                    src="https://www.youtube.com/embed/1qGusf9IfFY"'+
	'                    title="YouTube video player"'+
	'                    frameborder="0"'+
	'                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"'+
	'                    allowfullscreen=""'+
	'                ></iframe>'+
	'            </div>'+
	'            <p class="spui-admin-swatch-var-description">'+
	'                Whether that is on a user role basis, minimum order amount, per product category or even within a date range.'+
	'            </p>'+
	'        </div> -->'+
	'        <div class="spui-admin-swatch-var-widget">'+
	'            <h3 class="spui-swatch-video-title spui-admin-swatch-var-widget-title">Getting Started</h3>'+
	'            <!---BoxContent-->'+
	'            <div class="spui-admin-swatch-var-addon-wrap">'+
	'                <div class="spui-admin-swatch-var-addon">'+
	'                    <a href="#" class="spui-swatch-addon-link"> <h2>Documentation</h2> </a>'+
	'                    <div class="spui-admin-swat-video-frame">'+
	'                        <iframe'+
	'                            src="https://www.youtube.com/embed/1qGusf9IfFY"'+
	'                            title="YouTube video player"'+
	'                            frameborder="0"'+
	'                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"'+
	'                            allowfullscreen=""'+
	'                        ></iframe>'+
	'                    </div>'+
	'                    <p>Get started by spending some time with the '+
	'                    	<a target="_blank" href="https://sphereplugins.com/docs/woo-choice-plugin/getting-started/installation-and-setup-wizard/">documentation.</a>'+
	'                    </p>'+
	'                    <a href="#" class="spui-admin-swatch-submit-link spui-admin-update-clicks"> Get It now </a>'+
	'                </div>'+
	'                <!---Box_Two-->'+
	'                <div class="spui-admin-swatch-var-addon">'+
	'                    <a href="#" class="spui-swatch-addon-link"> <h2>Facing issue?</h2> </a>'+
	'                    <div class="spui-admin-swat-video-frame">'+
	'                        <iframe'+
	'                            src="https://www.youtube.com/embed/1qGusf9IfFY"'+
	'                            title="YouTube video player"'+
	'                            frameborder="0"'+
	'                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"'+
	'                            allowfullscreen=""'+
	'                        ></iframe>'+
	'                    </div>'+
	'                    <p>Stuck with something? <a target="_blank" href="https://sphereplugins.com/contact-us/">Please open a ticket.</a> For emergency case join our live chat.</p>'+
	'                    <a href="#" class="spui-admin-swatch-submit-link spui-admin-update-clicks"> Get It now </a>'+
	'                </div>'+
	'                <div class="spui-admin-swatch-var-addon">'+
	'                    <a href="#" class="spui-swatch-addon-link"> <h2>Love Our Plugin?</h2> </a>'+
	'                    <div class="spui-admin-swat-video-frame">'+
	'                        <iframe'+
	'                            src="https://www.youtube.com/embed/1qGusf9IfFY"'+
	'                            title="YouTube video player"'+
	'                            frameborder="0"'+
	'                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"'+
	'                            allowfullscreen=""'+
	'                        ></iframe>'+
	'                    </div>'+
	'                    <p>Thank you for choosing Variation Gallery for WooCommerce. If you have found our plugin useful and makes you smile, <a target="_blank" href="https://wordpress.org/support/plugin/woo-bundle-choice/reviews/?rate=5#new-post">please consider giving us a 5-star rating.</a> It will help us to grow.</p>'+
	'                    <a href="#" class="spui-admin-swatch-submit-link spui-admin-update-clicks"> Get It now </a>'+
	'                </div>'+
	'            </div>'+
	'	        <!-- <a target="_blank" href="#">Variation Swatches Documentation</a> -->'+
	'        </div>'+
	'    </div>'+
	'</div>'+
	''+
	''+
	'<div class="clear_both" style="clear: both;"></div>';
		

	jQuery('#eowbc_tiny_features').append(options_ui_video_section);
});

</script>	