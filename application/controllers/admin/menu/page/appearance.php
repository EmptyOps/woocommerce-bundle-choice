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
			
			wbc()->load->model('admin/form-builder');

			$form_definition = array(
				'wid_btns'=>array(
					
						'label'=>'Buttons Widget',
						'form'=> array_merge( \eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "tagline", "Tagline", $hide_defaults=array("backcolor","hovercolor","bordercolor","radius","font","textcolor"), $additional_fields=array(), $info_text_overrides=array("text"=>"Title line of the button widget section") ), 
								array(
									'def_button'=>array(
										'label'=>eowbc_lang('Default Button'),
										'type'=>'checkbox',
										'value'=>array('1'),
										'options'=>array('1'=>' '),
										'class'=>array('fluid'),						
										// 'size_class'=>array('eight','wide'),
										'inline'=>false,

										'visible_info'=>array( 'label'=>eowbc_lang('Use default button styling or custom styling'),
											'type'=>'visible_info',
											'class'=>array('small'),
											// 'size_class'=>array('sixteen','wide'),
										),
									),

								), \eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "button", "Button", $hide_defaults=array("font","bordercolor"), $additional_fields=array(), $info_text_overrides=array() )
							)							
				),
				'breadcrumb'=>array(
						'label'=>'Breadcrumb',
						'form'=>array_merge(\eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "breadcrumb", "Breadcrumb", $hide_defaults=array("hovercolor","bordercolor","text","font","textcolor"), $additional_fields=array( array("field_id"=>"breadcrumb_num_icon","field_label"=>"Breadcrumb Number Icon","type"=>"color"), array("field_id"=>"breadcrumb_title","field_label"=>"Breadcrumb Title","type"=>"color"), array("field_id"=>"breadcrumb_actions","field_label"=>"Breadcrumb Actions","type"=>"color"), array("field_id"=>"showhide_icons","field_label"=>"Breadcrumb Show/Hide Icons","type"=>"checkbox","options"=>array('1'=>' '),'attrs'=>array('is_id_as_name'=>true)) ), $info_text_overrides=array("breadcrumb_showhide_icons"=>'You can upload icon from configuration page, <a href="wp-admin/admin.php?page=eo-wbc-setting">click here</a> to go to configuration'), "active_inactive" ),
							array(
								
								'appearance_breadcrumb_hide_border'=>array(
									'label'=>'Hide border',
									'type'=>'checkbox',
									'value'=>array(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_hide_border')),
									'options'=>array('appearance_breadcrumb_hide_border'=>' '),
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
									'value'=>array(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_fixed_navigation')),
									'options'=>array('appearance_breadcrumb_fixed_navigation'=>' '),
									'class'=>array(),
									'visible_info'=>array( 'label'=>'( check here if you wish to show steps as fixed layout. Example: \'Diamond\' stoods always first before \'Setting\' no matter if user begin with \'Setting\'. This setting applies to Step navigation only. )',
										'type'=>'visible_info',
										'class'=>array('fluid', 'small'),
										'size_class'=>array('sixteen','wide'),
									),	
								),								 
							)
					)
				),
				'filters'=>array(
						'label'=>'Filters',
						'form'=>array_merge( \eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "header", "Header", $hide_defaults=array("text","backcolor","hovercolor","bordercolor","radius"), $additional_fields=array(), $info_text_overrides=array("font"=>"Font family to be used in filters", "textcolor"=>"Color for headers in filters widget") ), \eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "labels", "Labels", $hide_defaults=array("text","backcolor","hovercolor","bordercolor","radius","font"), $additional_fields=array(), $info_text_overrides=array("font"=>"Font family to be used in filters") ),  \eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "rest_filters", "rest_filters", $hide_defaults=array("text","textcolor","backcolor","hovercolor","bordercolor","radius","font"), $additional_fields=array( array("field_id"=>"slider_nodes","field_label"=>"Slider Nodes","type"=>"color"), array("field_id"=>"slider_track","field_label"=>"Slider Track","type"=>"color"), array("field_id"=>"icon_size","field_label"=>"Icon Size","type"=>"text"), array("field_id"=>"icon_label_size","field_label"=>"Icon Label Size","type"=>"text") ), $info_text_overrides=array("slider_track"=>"Sets the specified color to slider's tracks between nodes", "icon_size"=>"Define size of icon at filter in px", "icon_label_size"=>"Define size of icon label in rem"), $special_type=null, $default_values = array("icon_size"=>"50px", "icon_label_size"=>"0.78571429rem") ),
							array(
								'appearance_filters_alternate_price_filter_first'=>array(
									'label'=>'Alternate price slider(First Category)',
									'type'=>'checkbox',
									'value'=>array(wbc()->options->get_option('appearance_filters','appearance_filters_alternate_price_filter_first')),
									'options'=>array('appearance_filters_alternate_price_filter_first'=>' '),
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
									'value'=>array(wbc()->options->get_option('appearance_filters','appearance_filters_alternate_price_filter_second')),
									'options'=>array('appearance_filters_alternate_price_filter_second'=>' '),
									'class'=>array(),
									'visible_info'=>array( 'label'=>'( Alternate slider for price at second category. )',
										'type'=>'visible_info',
										'class'=>array('fluid', 'small'),
										'size_class'=>array('sixteen','wide'),
									),	
								), 
							)
						)
				),
				'product_page'=>array(
					'label'=>'Product Page',
					'form'=>array(
							'fc_atc_button_text'=>array(
								'label'=>eowbc_lang('First Category Add to Cart Button Text'),
								'type'=>'text',
								'value'=>'',
								'class'=>array('fluid'),						
								'size_class'=>array('eight','wide'),
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
								'value'=>'',
								'class'=>array('fluid'),						
								'size_class'=>array('eight','wide'),
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
							'value'=>wbc()->options->get_option('product_page','product_page_add_to_basket'),							
							'class'=>array(),
							'visible_info'=>array( 'label'=>'( Text to be shown as replacement to `Add to basket` text in dropdown button of add to bundle button. )',
								'type'=>'visible_info',
								'class'=>array('fluid', 'small'),
								'size_class'=>array('sixteen','wide'),
							),	
						),
						'product_page_hide_first_variation_form'=>array(
							'label'=>'Show/Hide first category\'s variation menu',
							'type'=>'checkbox',
							'value'=>array(wbc()->options->get_option('product_page','product_page_hide_first_variation_form')),
							'options'=>array('product_page_hide_first_variation_form'=>' '),
							'class'=>array(),
							'visible_info'=>array( 'label'=>'( Hide variation selection table for first category\'s product. )',
								'type'=>'visible_info',
								'class'=>array('fluid', 'small'),
								'size_class'=>array('sixteen','wide'),
							),	
						), 
						'product_page_hide_second_variation_form'=>array(
							'label'=>'Show/Hide second category\'s variation menu',
							'type'=>'checkbox',
							'value'=>array(wbc()->options->get_option('product_page','product_page_hide_second_variation_form')),
							'options'=>array('product_page_hide_second_variation_form'=>' '),
							'class'=>array(),
							'visible_info'=>array( 'label'=>'( Hide variation selection table for second category\'s product. )',
								'type'=>'visible_info',
								'class'=>array('fluid', 'small'),
								'size_class'=>array('sixteen','wide'),
							),	
						), 
						/*'appearence_product_page_devider_option_form'=>array(
										'label'=>'Option Form',
										'type'=>'devider',
									),*/

/*						'appearence_product_page_toggle_status'=>array(
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
