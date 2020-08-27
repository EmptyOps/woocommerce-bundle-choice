<?php
/**
*	Ajax handler to handle ajax save request for eowbc_configuration form.	
*
*/

$res = array( "type"=>"success", "msg"=>"Updated successfully!" );

if(wp_verify_nonce(sanitize_text_field($_POST['_wpnonce']),'eowbc_tiny_features')){

	wbc()->options->update_option('tiny_features','shop_cat_filter_location_shop',(empty($_POST['shop_cat_filter_location_shop'])?'':sanitize_text_field($_POST['shop_cat_filter_location_shop'])));
	
	wbc()->options->update_option('tiny_features','tiny_features_dropdown_icon_only',(empty($_POST['tiny_features_dropdown_icon_only'])?'':sanitize_text_field($_POST['tiny_features_dropdown_icon_only'])));

	wbc()->options->update_option('tiny_features','tiny_features_hide_sku_category_product_page',(empty($_POST['tiny_features_hide_sku_category_product_page'])?'':sanitize_text_field($_POST['tiny_features_hide_sku_category_product_page'])));

	wbc()->options->update_option('tiny_features','shop_cat_filter_location_cat',(empty($_POST['shop_cat_filter_location_cat'])?'':sanitize_text_field($_POST['shop_cat_filter_location_cat'])));

	wbc()->options->update_option('tiny_features','shop_cat_filter_category',(empty($_POST['shop_cat_filter_category'])?'':sanitize_text_field($_POST['shop_cat_filter_category'])));

	wbc()->options->update_option('tiny_features','shop_cat_filter_two_filter',(empty($_POST['shop_cat_filter_two_filter'])?'':sanitize_text_field($_POST['shop_cat_filter_two_filter'])));

	wbc()->options->update_option('tiny_features','shop_cat_filter_two_filter_first',(empty($_POST['shop_cat_filter_two_filter_first'])?'':sanitize_text_field($_POST['shop_cat_filter_two_filter_first'])));

	wbc()->options->update_option('tiny_features','shop_cat_filter_two_filter_first_title',(empty($_POST['shop_cat_filter_two_filter_first_title'])?'':sanitize_text_field($_POST['shop_cat_filter_two_filter_first_title'])));

	wbc()->options->update_option('tiny_features','shop_cat_filter_two_filter_second',(empty($_POST['shop_cat_filter_two_filter_second'])?'':sanitize_text_field($_POST['shop_cat_filter_two_filter_second'])));

	wbc()->options->update_option('tiny_features','shop_cat_filter_two_filter_second_title',(empty($_POST['shop_cat_filter_two_filter_second_title'])?'':sanitize_text_field($_POST['shop_cat_filter_two_filter_second_title'])));

	wbc()->options->update_option('tiny_features','shop_cat_filter_alternate_view',(empty($_POST['shop_cat_filter_alternate_view'])?'':sanitize_text_field($_POST['shop_cat_filter_alternate_view'])));

	wbc()->options->update_option('tiny_features','shop_cat_filter_selected_filter',(empty($_POST['shop_cat_filter_selected_filter'])?'':sanitize_text_field($_POST['shop_cat_filter_selected_filter'])));

	wbc()->options->update_option('tiny_features','shop_cat_filter_css',(empty($_POST['shop_cat_filter_css'])?'':sanitize_text_field($_POST['shop_cat_filter_css'])));

	wbc()->options->update_option('tiny_features','specification_view_status',(empty($_POST['specification_view_status'])?'':sanitize_text_field($_POST['specification_view_status'])));

	wbc()->options->update_option('tiny_features','specification_view_shortcode_status',(empty($_POST['specification_view_shortcode_status'])?'':sanitize_text_field($_POST['specification_view_shortcode_status'])));

	wbc()->options->update_option('tiny_features','specification_view_default_status',(empty($_POST['specification_view_default_status'])?'':sanitize_text_field($_POST['specification_view_default_status'])));

	wbc()->options->update_option('tiny_features','specification_view_style',(empty($_POST['tiny_features_specification_view_style'])?'default':sanitize_text_field($_POST['tiny_features_specification_view_style'])));

	wbc()->options->update_option('tiny_features','tiny_features_option_ui_toggle_status',(empty($_POST['tiny_features_option_ui_toggle_status'])?'':sanitize_text_field($_POST['tiny_features_option_ui_toggle_status'])));
	wbc()->options->update_option('tiny_features','tiny_features_option_ui_toggle_init_status',(empty($_POST['tiny_features_option_ui_toggle_init_status'])?'':sanitize_text_field($_POST['tiny_features_option_ui_toggle_init_status'])));
	wbc()->options->update_option('tiny_features','tiny_features_option_ui_toggle_text',(empty($_POST['tiny_features_option_ui_toggle_text'])?__('CUSTOMIZE THIS PRODUCT'):sanitize_text_field($_POST['tiny_features_option_ui_toggle_text'])));
	wbc()->options->update_option('tiny_features','tiny_features_option_ui_option_dimention',(empty($_POST['tiny_features_option_ui_option_dimention'])?'2em':sanitize_text_field($_POST['tiny_features_option_ui_option_dimention'])));
	
	wbc()->options->update_option('tiny_features','tiny_features_option_ui_border_color',(empty($_POST['tiny_features_option_ui_border_color'])?'#ffffff':sanitize_text_field($_POST['tiny_features_option_ui_border_color'])));	
	wbc()->options->update_option('tiny_features','tiny_features_option_ui_border_width',(empty($_POST['tiny_features_option_ui_border_width'])?'1px':sanitize_text_field($_POST['tiny_features_option_ui_border_width'])));	
	wbc()->options->update_option('tiny_features','tiny_features_option_ui_border_color_hover',(empty($_POST['tiny_features_option_ui_border_color_hover'])?'#ffffff':sanitize_text_field($_POST['tiny_features_option_ui_border_color_hover'])));	
	wbc()->options->update_option('tiny_features','tiny_features_option_ui_border_width_hover',(empty($_POST['tiny_features_option_ui_border_width_hover'])?'1px':sanitize_text_field($_POST['tiny_features_option_ui_border_width_hover'])));
	wbc()->options->update_option('tiny_features','tiny_features_option_ui_border_radius',(empty($_POST['tiny_features_option_ui_border_radius'])?'1px':sanitize_text_field($_POST['tiny_features_option_ui_border_radius'])));
	wbc()->options->update_option('tiny_features','tiny_features_option_ui_font_color',(empty($_POST['tiny_features_option_ui_font_color'])?'#ffffff':sanitize_text_field($_POST['tiny_features_option_ui_font_color'])));
	wbc()->options->update_option('tiny_features','tiny_features_option_ui_font_color_hover',(empty($_POST['tiny_features_option_ui_font_color_hover'])?'#ffffff':sanitize_text_field($_POST['tiny_features_option_ui_font_color_hover'])));
	wbc()->options->update_option('tiny_features','tiny_features_option_ui_bg_color',(empty($_POST['tiny_features_option_ui_bg_color'])?'#ffffff':sanitize_text_field($_POST['tiny_features_option_ui_bg_color'])));
	wbc()->options->update_option('tiny_features','tiny_features_option_ui_bg_color_hover',(empty($_POST['tiny_features_option_ui_bg_color_hover'])?'#ffffff':sanitize_text_field($_POST['tiny_features_option_ui_bg_color_hover'])));

	wbc()->options->update_option('tiny_features','product_page_hide_first_variation_form',(empty($_POST['product_page_hide_first_variation_form'])?'':1));

	wbc()->options->update_option('tiny_features','product_page_hide_second_variation_form',(empty($_POST['product_page_hide_second_variation_form'])?'':1));

	//$res['msg'] = "Updated successfully!";
	//wbc()->options->update_option('configuration','config_category',1);
	//wbc()->options->update_option('configuration','config_map',1);
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}

 
echo json_encode($res);
