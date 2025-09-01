<?php
namespace eo\wbc\controllers\admin\menu\page;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Appearance' ) ) {
	class Appearance {

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
			//wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_wrap_mobile');
			wbc()->load->model('admin/form-builder');

			$form_definition = array(
				'wid_btns'=>array(
					
						'label'=>'Buttons Widget',
						'form'=> array_merge(array('appearence_button_widget_section'=>array('label'=>'Appearence of Button Widget','type'=>'segment','desc'=>'Change the appearence of the Button Widget area.')), \eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "tagline", "Tagline", $hide_defaults=array("backcolor","hovercolor","bordercolor","radius","font","textcolor"), $additional_fields=array(), $info_text_overrides=array("text"=>"Title line of the button widget section") ), 
								array(
									'def_button'=>array(
										'label'=>eowbc_lang('Default Button'),
										'type'=>'checkbox',
										'value'=>array( ),
										'options'=>array('1'=>' '),
										'is_id_as_name'=>true,
										'class'=>array('fluid'),						
										// 'size_class'=>array('eight','wide'),
										'inline'=>false,

										'visible_info'=>array( 'label'=>eowbc_lang('Use default button styling or custom styling'),
											'type'=>'visible_info',
											'class'=>array('small'),
											// 'size_class'=>array('sixteen','wide'),
										),
									),

								), \eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "button", "Button", $hide_defaults=array("font","bordercolor"), $additional_fields=array(), $info_text_overrides=array(),"", $default_values=array("text"=>__("Start With",'woo-bundle-choice')) ), 
								array( 
									'wid_btns_submit_btn'=>array(
										'label'=>eowbc_lang('Save'),
										'type'=>'button',								
										'class'=>array('secondary'),
										//'size_class'=>array('eight','wide'),
										'inline'=>false,
										'attr'=>array('data-tab_key="wid_btns"', 'data-action="save"'),
									)	
								)
							)							
				),
				'breadcrumb'=>array(
						'label'=>'Breadcrumb',
						'form'=>array_merge(array('appearence_breadcrumb_section'=>array('label'=>'Appearence of Breadcrumb','type'=>'segment','desc'=>'Change the appearence of the Breadcrumb.')),\eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "breadcrumb", "Breadcrumb", $hide_defaults=array("hovercolor","bordercolor","text","font","textcolor"), $additional_fields=array( array("field_id"=>"breadcrumb_num_icon","field_label"=>"Breadcrumb Number Icon","type"=>"color"), array("field_id"=>"breadcrumb_title","field_label"=>"Breadcrumb Title","type"=>"color"), array("field_id"=>"breadcrumb_actions","field_label"=>"Breadcrumb Actions","type"=>"color"), array("field_id"=>"showhide_icons","field_label"=>"Breadcrumb Show/Hide Icons","type"=>"checkbox","options"=>array('1'=>' '),'attrs'=>array('is_id_as_name'=>true)) ), $info_text_overrides=array("showhide_icons"=>'You can upload icon from configuration page, <a href="wp-admin/admin.php?page=eo-wbc-setting">click here</a> to go to configuration'), "active_inactive" ),
							array(
								'saved_tab_key'=>array(
									'type'=>'hidden',
									'value'=>'',
								),
								'appearance_breadcrumb_hide_border'=>array(
									'label'=>'Hide border',
									'type'=>'checkbox',
									'sanitize'=>'sanitize_text_field',
									'value'=>'',	//hiren commented the population from database here since it is meant to specify default only here. array(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_hide_border')),
									'options'=>array('1'=>' '),
									'is_id_as_name'=>true,
									'class'=>array(),
									'visible_info'=>array( 'label'=>'( Show/Hide breadcrumb border. )',
										'type'=>'visible_info',
										'class'=>array('fluid', 'small'),
										'size_class'=>array('sixteen','wide'),
									),	
								),
								'appearance_breadcrumb_fixed_navigation'=>array(
									'label'=>'Fixed navigation step',
									'type'=>'checkbox',
									'sanitize'=>'sanitize_text_field',
									'value'=>'',	//hiren commented the population from database here since it is meant to specify default only here. array(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_fixed_navigation')),
									'options'=>array('1'=>' '),
									'is_id_as_name'=>true,
									'class'=>array(),
									'visible_info'=>array( 'label'=>'( check here if you wish to show steps as fixed layout. Example: \'Diamond\' stoods always first before \'Setting\' no matter if user begin with \'Setting\'. This setting applies to Step navigation only. )',
										'type'=>'visible_info',
										'class'=>array('fluid', 'small'),
										'size_class'=>array('sixteen','wide'),
									),	
								),	
								'appearance_breadcrumb_change_action_text'=>array(
									'label'=>'Text for Change Action',
									'type'=>'text',
									'sanitize'=>'sanitize_text_field',
									'value'=>'Change',
									'validate'=>array('required'=>''),
									'class'=>array(),
									'visible_info'=>array( 'label'=>'Specify the text that you want to show for change action of the breadcrumb step\'s item, default value is \'Change\'',
										'type'=>'visible_info',
										'class'=>array('fluid', 'small'),
										'size_class'=>array('sixteen','wide'),
									),	
								),
								'appearance_breadcrumb_choose_prefix_text'=>array(
									'label'=>'Breadcrumb prefix text',
									'type'=>'text',
									'sanitize'=>'sanitize_text_field',
									'value'=>'Choose a',
									'validate'=>array('required'=>''),
									'class'=>array(),
									'visible_info'=>array( 'label'=>'set prefix on the breadcrumb which is by defauld `Choose a`',
										'type'=>'visible_info',
										'class'=>array('fluid', 'small'),
										'size_class'=>array('sixteen','wide'),
									),	
								),
								'appearance_breadcrumb_wrap_mobile'=>array(
									'label'=>'Wrap title on mobile',
									'type'=>'checkbox',
									'sanitize'=>'sanitize_text_field',
									'value'=>'',	//hiren commented the population from database here since it is meant to specify default only here. array(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_hide_border')),
									'options'=>array('1'=>' '),
									'is_id_as_name'=>true,
									'class'=>array(),
									'visible_info'=>array( 'label'=>'( Wrap mobile breadcrumb title. )',
										'type'=>'visible_info',
										'class'=>array('fluid', 'small'),
										'size_class'=>array('sixteen','wide'),
									),	
								),
								'appearance_breadcrumb_header_font_family'=>array(
									'label'=>'Header font family',
									'type'=>'text',
									'sanitize'=>'sanitize_text_field',
									'value'=>'Avenir Next',						
									'class'=>array(),
								),
								'appearance_breadcrumb_step_size'=>array(
									'label'=>'Step number font size',
									'type'=>'text',
									'sanitize'=>'sanitize_text_field',
									'value'=>'',						
									'class'=>array(),
								),
								'appearance_breadcrumb_header_size'=>array(
									'label'=>'Header font size',
									'type'=>'text',
									'sanitize'=>'sanitize_text_field',
									'value'=>'',						
									'class'=>array(),
								),
								'appearance_breadcrumb_icon_size'=>array(
									'label'=>'Icon size',
									'type'=>'text',
									'sanitize'=>'sanitize_text_field',
									'value'=>'',						
									'class'=>array(),
								),								
							), 
							array( 
								'breadcrumb_submit_btn'=>array(
									'label'=>eowbc_lang('Save'),
									'type'=>'button',								
									'class'=>array('secondary'),
									//'size_class'=>array('eight','wide'),
									'inline'=>false,
									'attr'=>array('data-tab_key="breadcrumb"', 'data-action="save"'),
								)	
							)
					)
				),
				'filters'=>array(
						'label'=>'Filters',
						'form'=>array_merge(array('appearence_filters_section'=>array('label'=>'Appearence of Filters','type'=>'segment','desc'=>'Change the appearence of the Filters.')), \eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "header", "Header", $hide_defaults=array("text","backcolor","hovercolor","bordercolor","radius"), $additional_fields=array(), $info_text_overrides=array("font"=>"Font family to be used in filters", "textcolor"=>"Color for headers in filters widget") ), \eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "labels", "Labels", $hide_defaults=array("text","backcolor","hovercolor","bordercolor","radius","font"), $additional_fields=array(), $info_text_overrides=array("font"=>"Font family to be used in filters") ),  \eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "rest_filters", "rest_filters", $hide_defaults=array("text","textcolor","backcolor","hovercolor","bordercolor","radius","font"), $additional_fields=array( array("field_id"=>"slider_nodes","field_label"=>"Slider Nodes","type"=>"color"), array("field_id"=>"slider_track","field_label"=>"Slider Track","type"=>"color"), array("field_id"=>"icon_size","field_label"=>"Icon Size","type"=>"text"), array("field_id"=>"icon_label_size","field_label"=>"Icon Label Size","type"=>"text") ), $info_text_overrides=array("slider_track"=>"Sets the specified color to slider's tracks between nodes", "icon_size"=>"Define size of icon at filter in px", "icon_label_size"=>"Define size of icon label in rem"), $special_type=null, $default_values = array("icon_size"=>"50px", "icon_label_size"=>"0.78571429rem") ),
							array(
								'appearance_filters_slider_font_size'=>array(
									'label'=>'Slider font size',
									'type'=>'text',
									'sanitize'=>'sanitize_text_field',
									'value'=>wbc()->options->get_option('appearance_filters','appearance_filters_slider_font_size','0.75em',true,true),									
									'is_id_as_name'=>true,
									'class'=>array(),
								),
								'appearance_filters_bg_primary'=>array(
									'label'=>'Primary filter background color',
									'type'=>'color',
									'sanitize'=>'sanitize_hex_color',
									'value'=>wbc()->options->get_option('appearance_filters','appearance_filters_bg_primary','#ffffff',true,true),									
									'is_id_as_name'=>true,
									'class'=>array(),
								),
								'appearance_filters_bg_advance'=>array(
									'label'=>'Advance filter background color',
									'type'=>'color',
									'sanitize'=>'sanitize_hex_color',
									'value'=>wbc()->options->get_option('appearance_filters','appearance_filters_bg_advance','#f3f4f5',true,true),
									'is_id_as_name'=>true,
									'class'=>array(),
								),
								'appearance_filters_alternate_price_filter_first'=>array(
									'label'=>'Alternate price slider(First Category)',
									'type'=>'checkbox',
									'sanitize'=>'sanitize_text_field',
									'value'=>array(wbc()->options->get_option('appearance_filters','appearance_filters_alternate_price_filter_first')),
									'options'=>array('1'=>' '),
									'is_id_as_name'=>true,
									'class'=>array(),
									'visible_info'=>array( 'label'=>'( Alternate slider for price at first category. )',
										'type'=>'visible_info',
										'class'=>array('fluid', 'small'),
										'size_class'=>array('sixteen','wide'),
									),	
								),
								'appearance_filters_alternate_price_filter_second'=>array(
									'label'=>'Alternate price slider(Second Category)',
									'type'=>'checkbox',
									'sanitize'=>'sanitize_text_field',
									'value'=>array(wbc()->options->get_option('appearance_filters','appearance_filters_alternate_price_filter_second')),
									'options'=>array('1'=>' '),
									'is_id_as_name'=>true,
									'class'=>array(),
									'visible_info'=>array( 'label'=>'( Alternate slider for price at second category. )',
										'type'=>'visible_info',
										'class'=>array('fluid', 'small'),
										'size_class'=>array('sixteen','wide'),
									),	
								), 
								'appearance_filters_header_size'=>array(
									'label'=>'Filter title size',
									'type'=>'text',
									'sanitize'=>'sanitize_text_field',
									'value'=>'1em',						
									'class'=>array(),
								),
								'appearance_filters_table_head_border'=>array(
									'label'=>'Table head border',
									'type'=>'checkbox',
									'sanitize'=>'sanitize_text_field',
									'value'=>array(wbc()->options->get_option('appearance_filters','appearance_filters_table_head_border')),
									'options'=>array('1'=>' '),
									'is_id_as_name'=>true,
									'class'=>array(),
								),
								'appearance_filters_loader'=>array(
									'label'=>'Hide filter\'s loaded',
									'type'=>'checkbox',
									'sanitize'=>'sanitize_text_field',
									'value'=>array(wbc()->options->get_option('appearance_filters','appearance_filters_loader')),
									'options'=>array('1'=>' '),
									'is_id_as_name'=>true,
									'class'=>array(),
								), 
								'appearance_filters_non_block_loader'=>array(
									'label'=>'Non-bloacking Loader',
									'type'=>'checkbox',
									'sanitize'=>'sanitize_text_field',
									'value'=>array(wbc()->options->get_option('appearance_filters','appearance_filters_non_block_loader')),
									'options'=>array('1'=>' '),
									'is_id_as_name'=>true,
									'class'=>array(),
								), 
							),
							array( 
								'filters_submit_btn'=>array(
									'label'=>eowbc_lang('Save'),
									'type'=>'button',								
									'class'=>array('secondary'),
									//'size_class'=>array('eight','wide'),
									'inline'=>false,
									'attr'=>array('data-tab_key="filters"', 'data-action="save"'),
								)	
							)
						)
				),
				'product_page'=>array(
					'label'=>'Product Page',
					'form'=>array(
						'appearence_product_page_section'=>array('label'=>'Appearence of Product Page','type'=>'segment','desc'=>'Change the appearence of the Product Page.')
						,
						'fc_atc_button_text'=>array(
							'label'=>eowbc_lang('First Category Add to Cart Button Text'),
							'type'=>'text',
							'validate'=>array('required'=>''),
							'sanitize'=>'sanitize_text_field',
							'value'=>'Continue',
							'class'=>array('fluid'),						
							'size_class'=>array('eight','wide','required'),
							'inline'=>false,

							'visible_info'=>array( 'label'=>eowbc_lang('Text to be shown on add to cart button on product page for the first category'),
								'type'=>'visible_info',
								'class'=>array('small'),
								// 'size_class'=>array('sixteen','wide'),
							),
						),
						'sc_atc_button_text'=>array(
							'label'=>eowbc_lang('Second Category Add to Cart Button Text'),
							'type'=>'text',
							'validate'=>array('required'=>''),
							'sanitize'=>'sanitize_text_field',
							'value'=>'Continue',
							'class'=>array('fluid'),						
							'size_class'=>array('eight','wide','required'),
							'inline'=>false,

							'visible_info'=>array( 'label'=>eowbc_lang('Text to be shown on add to cart button on product page for the second category'),
								'type'=>'visible_info',
								'class'=>array('small'),
								// 'size_class'=>array('sixteen','wide'),
							),							
						),
						'product_page_add_to_basket'=>array(
							'label'=>'Add to Basket Text',
							'type'=>'text',
							/*'validate'=>array('required'=>''),*/
							'sanitize'=>'sanitize_text_field',
							'value'=>wbc()->options->get_option('product_page','product_page_add_to_basket'),							
							'class'=>array(),
							'size_class'=>array(),
							'visible_info'=>array( 'label'=>'( Text to be shown as replacement to `Add to basket` text in dropdown button of add to bundle button. )',
								'type'=>'visible_info',
								'class'=>array('fluid', 'small'),
								'size_class'=>array('sixteen','wide'),
							),	
						),
						'show_options_ui_in_pair_builder'=>array(
							'label'=>'Show Option UI(swatches)',
							'type'=>'checkbox',
							'sanitize'=>'sanitize_text_field',
							'value'=>array(),
							'options'=>array('1'=>' '),
							'is_id_as_name'=>true,
							'class'=>array(),
							'visible_info'=>array( 'label'=>'If enabled options ui(swatches) will be displayed on item pages during builder process',
								'type'=>'visible_info',
								'class'=>array('fluid', 'small'),
								'size_class'=>array('sixteen','wide'),
							),	
						), 						
						'show_spec_view_in_pair_builder'=>array(
							'label'=>'Show Specification View',
							'type'=>'checkbox',
							'sanitize'=>'sanitize_text_field',
							'value'=>array( ),
							'options'=>array('1'=>' '),
							'is_id_as_name'=>true,
							'class'=>array(),
							'visible_info'=>array( 'label'=>'If enabled specification view will be displayed on item pages during builder process',
								'type'=>'visible_info',
								'class'=>array('fluid', 'small'),
								'size_class'=>array('sixteen','wide'),
							),	
						), 
						'product_page_submit_btn'=>array(
							'label'=>eowbc_lang('Save'),
							'type'=>'button',								
							'class'=>array('secondary'),
							//'size_class'=>array('eight','wide'),
							'inline'=>false,
							'attr'=>array('data-tab_key="product_page"', 'data-action="save"'),
						)
						/*'appearence_product_page_devider_option_form'=>array(
										'label'=>'Option Form',
										'type'=>'devider',
									),*/

					/*'appearence_product_page_toggle_status'=>array(
							'label'=>eowbc_lang('Toggle Button Enabled?'),
							'type'=>'checkbox',
							'value'=>array(wbc()->options->get_option('appearance_product_page','appearence_product_page_toggle_status')),
							'options'=>array('appearence_product_page_toggle_status'=>'Toggle Button Status'),
							'class'=>array('fluid'),						
							// 'size_class'=>array('eight','wide'),
							'inline'=>false,

							'visible_info'=>array( 'label'=>eowbc_lang('Enables the toogle buton to toggle the variation form at product page.'),
								'type'=>'visible_info',
								'class'=>array('small'),
								// 'size_class'=>array('sixteen','wide'),
							),
						),	
						'appearence_product_page_toggle_init_status'=>array(
							'label'=>eowbc_lang('Show variation form at initial?'),
							'type'=>'checkbox',
							'value'=>array(wbc()->options->get_option('appearance_product_page','appearence_product_page_toggle_init_status')),
							'options'=>array('appearence_product_page_toggle_init_status'=>'Variation Form Visiblity'),
							'class'=>array('fluid'),						
							// 'size_class'=>array('eight','wide'),
							'inline'=>false,

							'visible_info'=>array( 'label'=>eowbc_lang('Enables to set the variation form open at initial.'),
								'type'=>'visible_info',
								'class'=>array('small'),
								// 'size_class'=>array('sixteen','wide'),
							),
						),					
						'appearence_product_page_toggle_text'=>array(
							'label'=>eowbc_lang('Toggle Buton Text'),
							'type'=>'text',
							'value'=>wbc()->options->get_option('appearance_product_page','appearence_product_page_toggle_text',__('CUSTOMIZE THIS PRODUCT')),
							'class'=>array('fluid'),						
							'size_class'=>array('eight','wide'),
							'inline'=>false,

							'visible_info'=>array( 'label'=>eowbc_lang('Text to be shown on the toggle button.'),
								'type'=>'visible_info',
								'class'=>array('small','fluid'),
								// 'size_class'=>array('sixteen','wide'),
							)
						),
						'appearence_product_page_option_dimention'=>array(
							'label'=>eowbc_lang('Options Box Dimention'),
							'type'=>'text',
							'value'=>wbc()->options->get_option('appearance_product_page','appearence_product_page_option_dimention','2em'),
							'class'=>array('fluid'),						
							'size_class'=>array('eight','wide'),
							'inline'=>false,

							'visible_info'=>array( 'label'=>eowbc_lang('The height and width of the option\'s box.<strong>(prepend px,em,rem as measurement)</strong>'),
								'type'=>'visible_info',
								'class'=>array('small','fluid'),
								// 'size_class'=>array('sixteen','wide'),
							)
						),
						'appearence_product_page_border_color'=>array(
							'label'=>eowbc_lang('Options Border Color'),
							'type'=>'color',
							'value'=>wbc()->options->get_option('appearance_product_page','appearence_product_page_border_color','#ffffff'),
							'class'=>array('fluid'),						
							'size_class'=>array('eight','wide'),
							'inline'=>false,

							'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the option\'s border'),
								'type'=>'visible_info',
								'class'=>array('small','fluid'),
								// 'size_class'=>array('sixteen','wide'),
							)
						),
						'appearence_product_page_border_width'=>array(
							'label'=>eowbc_lang('Options Border width'),
							'type'=>'text',
							'value'=>wbc()->options->get_option('appearance_product_page','appearence_product_page_border_width','1px'),
							'class'=>array('fluid'),						
							'size_class'=>array('eight','wide'),
							'inline'=>false,

							'visible_info'=>array( 'label'=>eowbc_lang('The border width of the option\'s border.<strong>(prepend px,em,rem as measurement)</strong>'),
								'type'=>'visible_info',
								'class'=>array('small','fluid'),
								// 'size_class'=>array('sixteen','wide'),
							)
						),
						'appearence_product_page_border_color_hover'=>array(
							'label'=>eowbc_lang('Options Border Color on Hover'),
							'type'=>'color',
							'value'=>wbc()->options->get_option('appearance_product_page','appearence_product_page_border_color_hover','#ffffff'),
							'class'=>array('fluid'),						
							'size_class'=>array('eight','wide'),
							'inline'=>false,

							'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the option\'s border on hover.'),
								'type'=>'visible_info',
								'class'=>array('small'),
								// 'size_class'=>array('sixteen','wide'),
							)
						),
						'appearence_product_page_border_width_hover'=>array(
							'label'=>eowbc_lang('Options Border width on Hover'),
							'type'=>'text',
							'value'=>wbc()->options->get_option('appearance_product_page','appearence_product_page_border_width_hover','1px'),
							'class'=>array('fluid'),						
							'size_class'=>array('eight','wide'),
							'inline'=>false,

							'visible_info'=>array( 'label'=>eowbc_lang('The border width of the option\'s border on hover.<strong>(prepend px,em,rem as measurement)</strong>'),
								'type'=>'visible_info',
								'class'=>array('small'),
								// 'size_class'=>array('sixteen','wide'),
							)
						),
						'appearence_product_page_border_radius'=>array(
							'label'=>eowbc_lang('Options Border Radius'),
							'type'=>'text',
							'value'=>wbc()->options->get_option('appearance_product_page','appearence_product_page_border_radius','1px'),
							'class'=>array('fluid'),						
							'size_class'=>array('eight','wide'),
							'inline'=>false,

							'visible_info'=>array( 'label'=>eowbc_lang('The border radius of the option\'s border.<strong>(prepend px,em,rem as measurement)</strong>'),
								'type'=>'visible_info',
								'class'=>array('small'),
								// 'size_class'=>array('sixteen','wide'),
							)
						),						
						'appearence_product_page_font_color'=>array(
							'label'=>eowbc_lang('Options Font Color'),
							'type'=>'color',
							'value'=>wbc()->options->get_option('appearance_product_page','appearence_product_page_font_color','#ffffff'),
							'class'=>array('fluid'),						
							'size_class'=>array('eight','wide'),
							'inline'=>false,

							'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the option\'s text.'),
								'type'=>'visible_info',
								'class'=>array('small'),
								// 'size_class'=>array('sixteen','wide'),
							)
						),
						'appearence_product_page_font_color_hover'=>array(
							'label'=>eowbc_lang('Options Font Color on Hover'),
							'type'=>'color',
							'value'=>wbc()->options->get_option('appearance_product_page','appearence_product_page_font_color_hover','#ffffff'),
							'class'=>array('fluid'),						
							'size_class'=>array('eight','wide'),
							'inline'=>false,

							'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the option\'s text on hover.'),
								'type'=>'visible_info',
								'class'=>array('small'),
								// 'size_class'=>array('sixteen','wide'),
							)
						),
						'appearence_product_page_bg_color'=>array(
							'label'=>eowbc_lang('Options Background Color'),
							'type'=>'color',
							'value'=>wbc()->options->get_option('appearance_product_page','appearence_product_page_bg_color','#ffffff'),
							'class'=>array('fluid'),						
							'size_class'=>array('eight','wide'),
							'inline'=>false,

							'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the option\'s background.'),
								'type'=>'visible_info',
								'class'=>array('small'),
								// 'size_class'=>array('sixteen','wide'),
							)
						),
						'appearence_product_page_bg_color_hover'=>array(
							'label'=>eowbc_lang('Options Background Color on Hover'),
							'type'=>'color',
							'value'=>wbc()->options->get_option('appearance_product_page','appearence_product_page_bg_color_hover','#ffffff'),
							'class'=>array('fluid'),						
							'size_class'=>array('eight','wide'),
							'inline'=>false,

							'visible_info'=>array( 'label'=>eowbc_lang('<br/>The color of the option\'s background on hover.'),
								'type'=>'visible_info',
								'class'=>array('small'),
								// 'size_class'=>array('sixteen','wide'),
							)
						),*/
					)
				),
				'preview_page'=>array(
					'label'=>'Preview Page',
					'form'=>array(
						'appearence_preview_page_section'=>array('label'=>'Appearence of Preview Page','type'=>'segment','desc'=>'Change the appearence of the Preview Page.')
						,
						'enable_enquiry'=>array(
							'label'=>'Allow Enquiry Plugins on Preview Page',
							'type'=>'checkbox',
							'sanitize'=>'sanitize_text_field',
							'value'=>array( ),
							'options'=>array('1'=>' '),
							'is_id_as_name'=>true,
							'class'=>array(),
							'visible_info'=>array( 'label'=>'If enabled the service by enquiry button will be set on the enquiry page only',
								'type'=>'visible_info',
								'class'=>array('fluid', 'small'),
								'size_class'=>array('sixteen','wide'),
							),	
						), 
						'preview_page_submit_btn'=>array(
							'label'=>eowbc_lang('Save'),
							'type'=>'button',								
							'class'=>array('secondary'),
							//'size_class'=>array('eight','wide'),
							'inline'=>false,
							'attr'=>array('data-tab_key="preview_page"', 'data-action="save"'),
						)
					)
				)
				
			);

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
