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
						/* Language function - comment */ 
						'label'=>__('Buttons Widget','woo-bundle-choice'),
						'form'=> array_merge( \eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "tagline", "Tagline", $hide_defaults=array("backcolor","hovercolor","bordercolor","radius","font","textcolor"), $additional_fields=array(), $info_text_overrides=array("text"=>__('Title line of the button widget section','woo-bundle-choice')) ), 
								array(
									'def_button'=>array(
										/* Language function - comment */ 
										'label'=>__('Default Button','woo-bundle-choice'),
										'type'=>'checkbox',
										'value'=>array('1'),
										'options'=>array('1'=>' '),
										'is_id_as_name'=>true,
										'class'=>array('fluid'),						
										// 'size_class'=>array('eight','wide'),
										'inline'=>false,
										/* Language function - comment */ 
										'visible_info'=>array( 'label'=>__('Use default button styling or custom styling','woo-bundle-choice'),
											'type'=>'visible_info',
											'class'=>array('small'),
											// 'size_class'=>array('sixteen','wide'),
										),
									),

								), \eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "button", "Button", $hide_defaults=array("font","bordercolor"), $additional_fields=array(), $info_text_overrides=array() ), 
								array( 
									'wid_btns_submit_btn'=>array(
										'label'=>__('Save','woo-bundle-choice'),
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
                        /* Language function - comment */
						'label'=>__('Breadcrumb','woo-bundle-choice'),
						'form'=>array_merge(\eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "breadcrumb", "Breadcrumb", $hide_defaults=array("hovercolor","bordercolor","text","font","textcolor"), $additional_fields=array( array("field_id"=>"breadcrumb_num_icon","field_label"=>__('Breadcrumb Number Icon','woo-bundle-choice'),"type"=>"color"), array("field_id"=>"breadcrumb_title","field_label"=>__('Breadcrumb Title','woo-bundle-choice'),"type"=>"color"), array("field_id"=>"breadcrumb_actions","field_label"=>__('Breadcrumb Actions','woo-bundle-choice'),"type"=>"color"), array("field_id"=>"showhide_icons","field_label"=>__('Breadcrumb Show/Hide Icons','woo-bundle-choice'),"type"=>"checkbox","options"=>array('1'=>' '),'attrs'=>array('is_id_as_name'=>true)) ), $info_text_overrides=array("showhide_icons"=>__('You can upload icon from configuration page, <a href="wp-admin/admin.php?page=eo-wbc-setting">click here</a> to go to configuration','woo-bundle-choice')), "active_inactive" ),
							array(
								'saved_tab_key'=>array(
									'type'=>'hidden',
									'value'=>'',
								),
								'appearance_breadcrumb_hide_border'=>array(
									/* Language function - comment */
									'label'=>__('Hide border','woo-bundle-choice'),
									'type'=>'checkbox',
									'sanitize'=>'sanitize_text_field',
									'value'=>'',	//hiren commented the population from database here since it is meant to specify default only here. array(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_hide_border')),
									'options'=>array('1'=>' '),
									'is_id_as_name'=>true,
									'class'=>array(),
									/* Language function - comment */
									'visible_info'=>array( 'label'=>__('( Show/Hide breadcrumb border. )','woo-bundle-choice'),
										'type'=>'visible_info',
										'class'=>array('fluid', 'small'),
										'size_class'=>array('sixteen','wide'),
									),	
								),
								'appearance_breadcrumb_fixed_navigation'=>array(
									/* Language function - comment */
									'label'=>__('Fixed navigation step','woo-bundle-choice'),
									'type'=>'checkbox',
									'sanitize'=>'sanitize_text_field',
									'value'=>'',	//hiren commented the population from database here since it is meant to specify default only here. array(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_fixed_navigation')),
									'options'=>array('1'=>' '),
									'is_id_as_name'=>true,
									'class'=>array(),
									/* Language function - comment */
									'visible_info'=>array( 'label'=>__('( check here if you wish to show steps as fixed layout. Example: \'Diamond\' stoods always first before \'Setting\' no matter if user begin with \'Setting\'. This setting applies to Step navigation only. )','woo-bundle-choice'),
										'type'=>'visible_info',
										'class'=>array('fluid', 'small'),
										'size_class'=>array('sixteen','wide'),
									),	
								),	
								'appearance_breadcrumb_change_action_text'=>array(
									/* Language function - comment */
									'label'=>__('Text for Change Action','woo-bundle-choice'),
									'type'=>'text',
									'sanitize'=>'sanitize_text_field',
									'value'=>'Change',
									'validate'=>array('required'=>''),
									'class'=>array(),
									/* Language function - comment */
									'visible_info'=>array( 'label'=>__('Specify the text that you want to show for change action of the breadcrumb step\'s item, default value is \'Change\'','woo-bundle-choice'),
										'type'=>'visible_info',
										'class'=>array('fluid', 'small'),
										'size_class'=>array('sixteen','wide'),
									),	
								),
								'appearance_breadcrumb_wrap_mobile'=>array(
									/* Language function - comment */
									'label'=> __('Wrap title on mobile','woo-bundle-choice'),
									'type'=>'checkbox',
									'sanitize'=>'sanitize_text_field',
									'value'=>'',	//hiren commented the population from database here since it is meant to specify default only here. array(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_hide_border')),
									'options'=>array('1'=>' '),
									'is_id_as_name'=>true,
									'class'=>array(),
									/* Language function - comment */
									'visible_info'=>array( 'label'=> __('( Wrap mobile breadcrumb title. )','woo-bundle-choice'),
										'type'=>'visible_info',
										'class'=>array('fluid', 'small'),
										'size_class'=>array('sixteen','wide'),
									),	
								),
							), 
							array( 
								'breadcrumb_submit_btn'=>array(
									/* Language function - comment */
									'label'=> __('Save','woo-bundle-choice'),
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
						/* Language function - comment */
						'form'=>array_merge( \eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "header", "Header", $hide_defaults=array("text","backcolor","hovercolor","bordercolor","radius"), $additional_fields=array(), $info_text_overrides=array("font"=> __('Font family to be used in filters','woo-bundle-choice'), "textcolor"=> __('Color for headers in filters widget','woo-bundle-choice') )), \eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "labels",  __('Labels','woo-bundle-choice'), $hide_defaults=array("text","backcolor","hovercolor","bordercolor","radius","font"), $additional_fields=array(), $info_text_overrides=array("font"=> __('Font family to be used in filters','woo-bundle-choice') )),  \eo\wbc\model\admin\Form_Builder::instance()->ui_controls_collection( "rest_filters", "rest_filters", $hide_defaults=array("text","textcolor","backcolor","hovercolor","bordercolor","radius","font"), $additional_fields=array( array("field_id"=>"slider_nodes","field_label"=> __('Slider Nodes','woo-bundle-choice'),"type"=>"color"), array("field_id"=>"slider_track","field_label"=> __('Slider Track','woo-bundle-choice'),"type"=>"color"), array("field_id"=>"icon_size","field_label"=>"Icon Size","type"=>"text"), array("field_id"=>"icon_label_size","field_label"=> __('Icon Label Size','woo-bundle-choice'),"type"=>"text") ), $info_text_overrides=array("slider_track"=> __('Sets the specified color to slider\'s tracks between nodes','woo-bundle-choice'), "icon_size"=> __('Define size of icon at filter in px','woo-bundle-choice'), "icon_label_size"=> __('Define size of icon label in rem','woo-bundle-choice')), $special_type=null, $default_values = array("icon_size"=>"50px", "icon_label_size"=>"0.78571429rem") ),
							array(
								'appearance_filters_alternate_price_filter_first'=>array(
									/* Language function - comment */
									'label'=> __('Alternate price slider(First Category)','woo-bundle-choice'),
									'type'=>'checkbox',
									'sanitize'=>'sanitize_text_field',
									'value'=>array(wbc()->options->get_option('appearance_filters','appearance_filters_alternate_price_filter_first')),
									'options'=>array('1'=>' '),
									'is_id_as_name'=>true,
									'class'=>array(),
									/* Language function - comment */
									'visible_info'=>array( 'label'=> __('( Alternate slider for price at first category. )','woo-bundle-choice'),
										'type'=>'visible_info',
										'class'=>array('fluid', 'small'),
										'size_class'=>array('sixteen','wide'),
									),	
								),
								'appearance_filters_alternate_price_filter_second'=>array(
									/* Language function - comment */
									'label'=> __('Alternate price slider(Second Category)','woo-bundle-choice'),
									'type'=>'checkbox',
									'sanitize'=>'sanitize_text_field',
									'value'=>array(wbc()->options->get_option('appearance_filters','appearance_filters_alternate_price_filter_second')),
									'options'=>array('1'=>' '),
									'is_id_as_name'=>true,
									'class'=>array(),
									/* Language function - comment */
									'visible_info'=>array( 'label'=> __('( Alternate slider for price at second category. )','woo-bundle-choice'),
										'type'=>'visible_info',
										'class'=>array('fluid', 'small'),
										'size_class'=>array('sixteen','wide'),
									),	
								), 
								'appearance_filters_header_size'=>array(
									/* Language function - comment */
									'label'=> __('Filter title size','woo-bundle-choice'),
									'type'=>'text',
									'sanitize'=>'sanitize_text_field',
									'value'=>'1em',						
									'class'=>array(),
								),
								'appearance_filters_table_head_border'=>array(
									/* Language function - comment */
									'label'=> __('Table head border','woo-bundle-choice'),
									'type'=>'checkbox',
									'sanitize'=>'sanitize_text_field',
									'value'=>array(wbc()->options->get_option('appearance_filters','appearance_filters_table_head_border')),
									'options'=>array('1'=>' '),
									'is_id_as_name'=>true,
									'class'=>array(),
								),
								'appearance_filters_loader'=>array(
									/* Language function - comment */
									'label'=> __('Hide filter\'s loaded','woo-bundle-choice'),
									'type'=>'checkbox',
									'sanitize'=>'sanitize_text_field',
									'value'=>array(wbc()->options->get_option('appearance_filters','appearance_filters_loader')),
									'options'=>array('1'=>' '),
									'is_id_as_name'=>true,
									'class'=>array(),
								), 
							),
							array( 
								'filters_submit_btn'=>array(
									/* Language function - comment */
									'label'=> __('Save','woo-bundle-choice'),
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
					/* Language function - comment */
					'label'=> __('Product Page','woo-bundle-choice'),
					'form'=>array(
						'fc_atc_button_text'=>array(
							/* Language function - comment */
							'label'=> __('First Category Add to Cart Button Text','woo-bundle-choice'),
							'type'=>'text',
							'validate'=>array('required'=>''),
							'sanitize'=>'sanitize_text_field',
							'value'=>'Continue',
							'class'=>array('fluid'),						
							'size_class'=>array('eight','wide','required'),
							'inline'=>false,
							/* Language function - comment */
							'visible_info'=>array( 'label'=> __('Text to be shown on add to cart button on product page for the first category','woo-bundle-choice'),
								'type'=>'visible_info',
								'class'=>array('small'),
								// 'size_class'=>array('sixteen','wide'),
							),
						),
						'sc_atc_button_text'=>array(
							/* Language function - comment */
							'label'=> __('Second Category Add to Cart Button Text','woo-bundle-choice'),
							'type'=>'text',
							'validate'=>array('required'=>''),
							'sanitize'=>'sanitize_text_field',
							'value'=>'Continue',
							'class'=>array('fluid'),						
							'size_class'=>array('eight','wide','required'),
							'inline'=>false,
							/* Language function - comment */
							'visible_info'=>array( 'label'=> __('Text to be shown on add to cart button on product page for the second category','woo-bundle-choice'),
								'type'=>'visible_info',
								'class'=>array('small'),
								// 'size_class'=>array('sixteen','wide'),
							),							
						),
						'product_page_add_to_basket'=>array(
							/* Language function - comment */
							'label'=> __('','woo-bundle-choice')eowbc_lang('Add to Basket Text'),
							'type'=>'text',
							/*'validate'=>array('required'=>''),*/
							'sanitize'=>'sanitize_text_field',
							'value'=>wbc()->options->get_option('product_page','product_page_add_to_basket'),							
							'class'=>array(),
							'size_class'=>array(),
							/* Language function - comment */
							'visible_info'=>array( 'label'=> __('( Text to be shown as replacement to `Add to basket` text in dropdown button of add to bundle button. )','woo-bundle-choice'),
								'type'=>'visible_info',
								'class'=>array('fluid', 'small'),
								'size_class'=>array('sixteen','wide'),
							),	
						),
						'show_options_ui_in_pair_builder'=>array(
							/* Language function - comment */
							'label'=> __('Show Option UI(swatches)','woo-bundle-choice'),
							'type'=>'checkbox',
							'sanitize'=>'sanitize_text_field',
							'value'=>array('1'),
							'options'=>array('1'=>' '),
							'is_id_as_name'=>true,
							'class'=>array(),
							/* Language function - comment */
							'visible_info'=>array( 'label'=> __('If enabled options ui(swatches) will be displayed on item pages during builder process','woo-bundle-choice'),
								'type'=>'visible_info',
								'class'=>array('fluid', 'small'),
								'size_class'=>array('sixteen','wide'),
							),	
						), 						
						'show_spec_view_in_pair_builder'=>array(
							/* Language function - comment */
							'label'=> __('Show Specification View','woo-bundle-choice'),
							'type'=>'checkbox',
							'sanitize'=>'sanitize_text_field',
							'value'=>array('1'),
							'options'=>array('1'=>' '),
							'is_id_as_name'=>true,
							'class'=>array(),
							/* Language function - comment */
							'visible_info'=>array( 'label'=> __('If enabled specification view will be displayed on item pages during builder process','woo-bundle-choice'),
								'type'=>'visible_info',
								'class'=>array('fluid', 'small'),
								'size_class'=>array('sixteen','wide'),
							),	
						), 
						'product_page_submit_btn'=>array(
							/* Language function - comment */
							'label'=> __('Save','woo-bundle-choice'),
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
