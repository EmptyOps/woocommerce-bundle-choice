<?php

defined( 'ABSPATH' ) || exit;

wbc()->load->model('category-attribute');

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


$form['id']='eowbc_tiny_features';
$form['title']='Tiny Features';
$form['method']='POST';
$form['tabs'] = true;
$form['data'] = array(
	
	'tiny_features_item_page_option'=>array(
			'label'=>'Options UI for Item Page',
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
					'label'=>eowbc_lang('Options Box Dimention'),
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
					'label'=>eowbc_lang('Options Border Color'),
					'type'=>'color',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_color','#ECECEC'),
					'sanitize'=>'sanitize_hex_color',
					'class'=>array('fluid'),				
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the option\'s border'),
						'type'=>'visible_info',
						'class'=>array('small','fluid'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_option_ui_border_width'=>array(
					'label'=>eowbc_lang('Options Border width'),
					'type'=>'text',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_width','2px'),
					'sanitize'=>'sanitize_text_field',
					'class'=>array('fluid'),			
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('The border width of the option\'s border.<strong>(prepend px,em,rem as measurement)</strong>'),
						'type'=>'visible_info',
						'class'=>array('small','fluid'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_option_ui_border_color_hover'=>array(
					'label'=>eowbc_lang('Options Border Color on Hover'),
					'type'=>'color',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_color_hover','#3D3D3D'),
					'sanitize'=>'sanitize_hex_color',
					'class'=>array('fluid'),				
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the option\'s border on hover.'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_option_ui_border_width_hover'=>array(
					'label'=>eowbc_lang('Options Border width on Hover'),
					'type'=>'text',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_width_hover','2px'),
					'sanitize'=>'sanitize_text_field',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('The border width of the option\'s border on hover.<strong>(prepend px,em,rem as measurement)</strong>'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_option_ui_border_radius'=>array(
					'label'=>eowbc_lang('Options Border Radius'),
					'type'=>'text',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_radius','1px'),
					'sanitize'=>'sanitize_text_field',
					'class'=>array('fluid'),	
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('The border radius of the option\'s border.<strong>(prepend px,em,rem as measurement)</strong>'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),						
				'tiny_features_option_ui_font_color'=>array(
					'label'=>eowbc_lang('Options Font Color'),
					'type'=>'color',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_font_color','#DBDBDB'),
					'sanitize'=>'sanitize_hex_color',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the option\'s text.'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_option_ui_font_color_hover'=>array(
					'label'=>eowbc_lang('Options Font Color on Hover'),
					'type'=>'color',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_font_color_hover','#AA7D7D'),
					'sanitize'=>'sanitize_hex_color',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the option\'s text on hover.'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_option_ui_bg_color'=>array(
					'label'=>eowbc_lang('Options Background Color'),
					'type'=>'color',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_bg_color','#ffffff'),
					'sanitize'=>'sanitize_hex_color',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the option\'s background.'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
				),
				'tiny_features_option_ui_bg_color_hover'=>array(
					'label'=>eowbc_lang('Options Background Color on Hover'),
					'type'=>'color',
					'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_bg_color_hover','#DCC7C7'),
					'sanitize'=>'sanitize_hex_color',
					'class'=>array('fluid'),
					'size_class'=>array('eight','wide','required'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the option\'s background on hover.'),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					)
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
				'tiny_features_option_ui_save'=>array(
							'label'=>'Save',
							'type'=>'button',		
							'class'=>array('primary'),
							'attr'=>array("data-action='save'")				
				)
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