<?php

namespace eo\wbc\view\admin\menu;

defined( 'ABSPATH' ) || exit;

wbc()->load->model('category-attribute');

ACTIVE_TODO/TEMP aa class temperory Bhavesh_2 branch na sampaldata update vakhate banavo che ane jyare tiny feature akhu module update thay tyare and tenu model, view and conttrolar propar bane tyare aa class ne remove kari devo and stander view file ma jevu arcituctur che tevu kari nakahavu.    --  to h
class Tiny_Features_View {

    ACTIVE_TODO/TEMP a koi stander get_form_definition nu function nathi means ama apada j get_form_definition function na stander che te moojab nathi mate jyare upgrade karia tyare simply amathi code ne refactor karavano avse.     -- to h.
	public static function get_form_definition() {

        $form_definition = array(
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
                    'tiny_features_general_tab_end'=>array(
                        'type'=>'accordian',
                        'section_type'=>'end'
                    ),
                    
                    'tiny_features_styling_tab_start'=>array(
                        'type'=>'accordian',
                        'section_type'=>'start',
                        'class'=>array('field', 'styled'),
                        'label'=>'<span class="ui large text">Styling</span>',
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
                    'tiny_features_product_page_video_icon'=>array(
                        'label'=>'Video icon for product page',
                        'type'=>'icon',
                        'value'=>wbc()->options->get_option('tiny_features','tiny_features_product_page_video_icon'),
                        /*'validate'=>array('required'=>''),*/
                        'sanitize'=>'sanitize_text_field',
                        'class'=>array(),
                        'size_class'=>array('eight','wide'),
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
                    'tiny_features_option_ui_loop_box_hover_media_index'=>array(
                        'label'=>wbc()->config->product_variations_configs()['is_gallery_images_type_based_template'] == 1 ? eowbc_lang('Loop box media type to show on hover') : eowbc_lang('Loop box hover media index'),
                        'type'=>wbc()->config->product_variations_configs()['is_gallery_images_type_based_template'] == 1 ? 'select' : 'number',
                        'value'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_loop_box_hover_media_index',wbc()->config->product_variations_configs()['is_gallery_images_type_based_template'] == 1 ? 'video' :  '2'),
                        'options'=>wbc()->config->product_variations_configs()['is_gallery_images_type_based_template'] == 1 ? apply_filters('sp_variations_loop_box_hover_media_type',array('image'=>'Image','video'=>'Video')) : array(),
                        'sanitize'=>'sanitize_text_field',
                        'class'=>array('fluid'),			
                        'size_class'=>array('eight','wide'/*,'required'*/),
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
                        'type'=>'checkbox',
                        'sanitize'=>'sanitize_text_field',
                        'value'=>array(wbc()->options->get_option('tiny_features','shop_page_hide_first_variation_form')),
                        'options'=>array('1'=>' '),
                        'is_id_as_name'=>true,
                        'class'=>array(),
                        'visible_info'=>array( 'label'=>'If enabled the variation selection table for first category\'s products will be hidden if default variations are set',
                            'type'=>'visible_info',
                            'class'=>array('fluid', 'small'),
                            'size_class'=>array('sixteen','wide'),
                        ),	
                    ), 
                    'shop_page_hide_second_variation_form'=>array(
                        'label'=>'Hide second category\'s variation menu',
                        'type'=>'checkbox',
                        'sanitize'=>'sanitize_text_field',
                        'value'=>array(wbc()->options->get_option('tiny_features','shop_page_hide_second_variation_form')),
                        'options'=>array('1'=>' '),
                        'is_id_as_name'=>true,
                        'class'=>array(),
                        'visible_info'=>array( 'label'=>'If enabled the variation selection table for second category\'s products will be hidden if default variations are set',
                            'type'=>'visible_info',
                            'class'=>array('fluid', 'small'),
                            'size_class'=>array('sixteen','wide'),
                        ),	
                    ), 
                    'tiny_features_shop_page_option_ui_option_dimention'=>array(
                        'label'=>eowbc_lang('Swatches Box Dimention'),
                        'type'=>'text',
                        'value'=>wbc()->options->get_option('tiny_features','tiny_features_shop_page_option_ui_option_dimention','2em'),
                        'sanitize'=>'sanitize_text_field',
                        'class'=>array('fluid'),	
                        'size_class'=>array('eight','wide','required'),
                        'inline'=>false,
    
                        'visible_info'=>array( 'label'=>eowbc_lang('The height and width of the Swatches box.<strong>(prepend px,em,rem as measurement)</strong>'),
                            'type'=>'visible_info',
                            'class'=>array('small','fluid'),
                            // 'size_class'=>array('sixteen','wide'),
                        )
                    ),				
                    'tiny_features_shop_page_option_ui_border_color'=>array(
                        'label'=>eowbc_lang('Swatches Border Color'),
                        'type'=>'color',
                        'value'=>wbc()->options->get_option('tiny_features','tiny_features_shop_page_option_ui_border_color','#ECECEC'),
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
                    'tiny_features_shop_page_option_ui_border_width'=>array(
                        'label'=>eowbc_lang('Swatches Border width'),
                        'type'=>'text',
                        'value'=>wbc()->options->get_option('tiny_features','tiny_features_shop_page_option_ui_border_width','2px'),
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
                    'tiny_features_shop_page_option_ui_border_color_hover'=>array(
                        'label'=>eowbc_lang('Swatches Border Color on Hover -- Not work(selectore issue)'),
                        'type'=>'color',
                        'value'=>wbc()->options->get_option('tiny_features','tiny_features_shop_page_option_ui_border_color_hover','#3D3D3D'),
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
                    'tiny_features_shop_page_option_ui_border_width_hover'=>array(
                        'label'=>eowbc_lang('Swatches Border width on Hover'),
                        'type'=>'text',
                        'value'=>wbc()->options->get_option('tiny_features','tiny_features_shop_page_option_ui_border_width_hover','2px'),
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
                    'tiny_features_shop_page_option_ui_border_radius'=>array(
                        'label'=>eowbc_lang('Swatches Border Radius'),
                        'type'=>'text',
                        'value'=>wbc()->options->get_option('tiny_features','tiny_features_shop_page_option_ui_border_radius','1px'),
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
                    'tiny_features_shop_page_option_ui_font_color'=>array(
                        'label'=>eowbc_lang('Swatches Font Color -- Not work(variation file css override)'),
                        'type'=>'color',
                        'value'=>wbc()->options->get_option('tiny_features','tiny_features_shop_page_option_ui_font_color','#DBDBDB'),
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
                    'tiny_features_shop_page_option_ui_font_color_hover'=>array(
                        'label'=>eowbc_lang('Swatches Font Color on Hover'),
                        'type'=>'color',
                        'value'=>wbc()->options->get_option('tiny_features','tiny_features_shop_page_option_ui_font_color_hover','#AA7D7D'),
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
                    'tiny_features_shop_page_option_ui_bg_color'=>array(
                        'label'=>eowbc_lang('Swatches Background Color -- Not work(variation file css override)'),
                        'type'=>'color',
                        'value'=>wbc()->options->get_option('tiny_features','tiny_features_shop_page_option_ui_bg_color','#ffffff'),
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
                    'tiny_features_shop_page_option_ui_bg_color_hover'=>array(
                        'label'=>eowbc_lang('Swatches Background Color on Hover'),
                        'type'=>'color',
                        'value'=>wbc()->options->get_option('tiny_features','tiny_features_shop_page_option_ui_bg_color_hover','#DCC7C7'),
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
        );
        
        $form_definition = apply_filters('eowbc_admin_form_tiny_features',$form_definition);

        return $form_definition;
    }

	public static function load_view() {

		ACTIVE TODO jyare ashish_1 ma merge thay tyare eni advanced tab ma mukvanu avshe ane chelle move kari didhu hase.
		ACTIVE TODO jyare ashish_1 ma merge thay tyare ahiyaa variable banavva ni jaroor nathi. already ahiyaa banela j hase to khaali if j ahiyaa avshe.

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
		$form['data'] = self::get_form_definition();
		$bonus_features = unserialize(wbc()->options->get_option('setting_status_setting_status_setting','bonus_features',serialize(array())));			

		if(empty($bonus_features['opts_uis_item_page'])) {
			unset($form['data']['tiny_features_item_page_option']);
		}

		if(empty($bonus_features['spec_view_item_page'])) {
			unset($form['data']['tiny_features_specification_view']);
		}

        $args = null;

        $form['data'] = \eo\wbc\model\admin\Eowbc_Model::instance()->get( $form['data'], $args );

		wbc()->load->model('admin\form-builder');
		eo\wbc\model\admin\Form_Builder::instance()->build($form);
		wbc()->load->asset('js','admin/tiny-feature/shortcode-filter');
		wbc()->load->asset('js','admin/tiny-feature/shop-cat');
		wbc()->load->asset('js','admin/tiny-feature/specification');

	}
}

if( empty($is_do_not_call_Tiny_Features_View_load_view) ) {
    
    Tiny_Features_View::load_view();
}
