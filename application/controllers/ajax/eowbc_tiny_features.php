<?php
/**
*	Ajax handler to handle ajax save request for eowbc_configuration form.	
*
*/

$res = array( "type"=>"success", "msg"=>"Updated successfully!" );

$is_do_not_call_Tiny_Features_View_lode_view = true;
$is_auto_insert_for_template = null;
$args = null;
ACTIVE_TODO/TEMP aa view lode karavo che te temperory Bhavesh_2 branch na sampaldata update vakhate banavo che ane jyare tiny feature akhu module update thay tyare and tenu model, view and conttrolar propar bane tyare aa view lode karavu che te remove kari devo and stander view file ma jevu arcituctur che tevu kari nakahavu.    --  to h
require_once constant('EOWBC_TEMPLATE_DIR').'admin/menu/tiny_features.php';

$temp_res = \eo\wbc\model\admin\Eowbc_Model::instance()->save(self::get_form_definition(), $is_auto_insert_for_template, $args);
if(empty($temp_res['type']) || $temp_res['type'] != "success"){

	return $temp_res;
}

if(wp_verify_nonce(wbc()->sanitize->post('_wpnonce'),'eowbc_tiny_features')){

	wbc()->options->update_option('tiny_features','shop_cat_filter_location_shop',(empty(wbc()->sanitize->post('shop_cat_filter_location_shop'))?'':wbc()->sanitize->post('shop_cat_filter_location_shop')));
	
	wbc()->options->update_option('tiny_features','tiny_features_dropdown_icon_only',(empty(wbc()->sanitize->post('tiny_features_dropdown_icon_only'))?'':wbc()->sanitize->post('tiny_features_dropdown_icon_only')));

	wbc()->options->update_option('tiny_features','tiny_features_hide_sku_category_product_page',(empty(wbc()->sanitize->post('tiny_features_hide_sku_category_product_page'))?'':wbc()->sanitize->post('tiny_features_hide_sku_category_product_page')));

	wbc()->options->update_option('tiny_features','shop_cat_filter_location_cat',(empty(wbc()->sanitize->post('shop_cat_filter_location_cat'))?'':wbc()->sanitize->post('shop_cat_filter_location_cat')));

	wbc()->options->update_option('tiny_features','shop_cat_filter_category',(empty(wbc()->sanitize->post('shop_cat_filter_category'))?'':wbc()->sanitize->post('shop_cat_filter_category')));

	wbc()->options->update_option('tiny_features','shop_cat_filter_two_filter',(empty(wbc()->sanitize->post('shop_cat_filter_two_filter'))?'':wbc()->sanitize->post('shop_cat_filter_two_filter')));

	wbc()->options->update_option('tiny_features','shop_cat_filter_two_filter_first',(empty(wbc()->sanitize->post('shop_cat_filter_two_filter_first'))?'':wbc()->sanitize->post('shop_cat_filter_two_filter_first')));

	wbc()->options->update_option('tiny_features','shop_cat_filter_two_filter_first_title',(empty(wbc()->sanitize->post('shop_cat_filter_two_filter_first_title'))?'':wbc()->sanitize->post('shop_cat_filter_two_filter_first_title')));

	wbc()->options->update_option('tiny_features','shop_cat_filter_two_filter_second',(empty(wbc()->sanitize->post('shop_cat_filter_two_filter_second'))?'':wbc()->sanitize->post('shop_cat_filter_two_filter_second')));

	wbc()->options->update_option('tiny_features','shop_cat_filter_two_filter_second_title',(empty(wbc()->sanitize->post('shop_cat_filter_two_filter_second_title'))?'':wbc()->sanitize->post('shop_cat_filter_two_filter_second_title')));

	wbc()->options->update_option('tiny_features','shop_cat_filter_alternate_view',(empty(wbc()->sanitize->post('shop_cat_filter_alternate_view'))?'':wbc()->sanitize->post('shop_cat_filter_alternate_view')));

	wbc()->options->update_option('tiny_features','shop_cat_filter_selected_filter',(empty(wbc()->sanitize->post('shop_cat_filter_selected_filter'))?'':wbc()->sanitize->post('shop_cat_filter_selected_filter')));

	wbc()->options->update_option('tiny_features','shop_cat_filter_css',(empty(wbc()->sanitize->post('shop_cat_filter_css'))?'':wbc()->sanitize->post('shop_cat_filter_css')));

	wbc()->options->update_option('tiny_features','specification_view_status',(empty(wbc()->sanitize->post('specification_view_status'))?'':wbc()->sanitize->post('specification_view_status')));

	wbc()->options->update_option('tiny_features','specification_view_shortcode_status',(empty(wbc()->sanitize->post('specification_view_shortcode_status'))?'':wbc()->sanitize->post('specification_view_shortcode_status')));

	wbc()->options->update_option('tiny_features','specification_view_default_status',(empty(wbc()->sanitize->post('specification_view_default_status'))?'':wbc()->sanitize->post('specification_view_default_status')));

	wbc()->options->update_option('tiny_features','specification_view_style',(empty(wbc()->sanitize->post('tiny_features_specification_view_style'))?'default':wbc()->sanitize->post('tiny_features_specification_view_style')));

	wbc()->options->update_option('tiny_features','tiny_features_option_ui_toggle_status',(empty(wbc()->sanitize->post('tiny_features_option_ui_toggle_status'))?'':wbc()->sanitize->post('tiny_features_option_ui_toggle_status')));

	wbc()->options->update_option('tiny_features','tiny_features_option_ui_toggle_init_status',(empty(wbc()->sanitize->post('tiny_features_option_ui_toggle_init_status'))?'':wbc()->sanitize->post('tiny_features_option_ui_toggle_init_status')));

	wbc()->options->update_option('tiny_features','tiny_features_option_ui_toggle_text',(empty(wbc()->sanitize->post('tiny_features_option_ui_toggle_text'))?__('CUSTOMIZE THIS PRODUCT'):wbc()->sanitize->post('tiny_features_option_ui_toggle_text')));

	wbc()->options->update_option('tiny_features','tiny_features_option_ui_option_dimention',(empty(wbc()->sanitize->post('tiny_features_option_ui_option_dimention'))?'2em':wbc()->sanitize->post('tiny_features_option_ui_option_dimention')));
	
	wbc()->options->update_option('tiny_features','tiny_features_option_ui_border_color',(empty(wbc()->sanitize->post('tiny_features_option_ui_border_color'))?'#ffffff':wbc()->sanitize->post('tiny_features_option_ui_border_color')));	

	wbc()->options->update_option('tiny_features','tiny_features_option_ui_border_width',(empty(wbc()->sanitize->post('tiny_features_option_ui_border_width'))?'1px':wbc()->sanitize->post('tiny_features_option_ui_border_width')));

	wbc()->options->update_option('tiny_features','tiny_features_option_ui_border_color_hover',(empty(wbc()->sanitize->post('tiny_features_option_ui_border_color_hover'))?'#ffffff':wbc()->sanitize->post('tiny_features_option_ui_border_color_hover')));

	wbc()->options->update_option('tiny_features','tiny_features_option_ui_border_width_hover',(empty(wbc()->sanitize->post('tiny_features_option_ui_border_width_hover'))?'1px':wbc()->sanitize->post('tiny_features_option_ui_border_width_hover')));

	wbc()->options->update_option('tiny_features','tiny_features_option_ui_border_radius',(empty(wbc()->sanitize->post('tiny_features_option_ui_border_radius'))?'1px':wbc()->sanitize->post('tiny_features_option_ui_border_radius')));

	wbc()->options->update_option('tiny_features','tiny_features_option_ui_font_color',(empty(wbc()->sanitize->post('tiny_features_option_ui_font_color'))?'#ffffff':wbc()->sanitize->post('tiny_features_option_ui_font_color')));

	wbc()->options->update_option('tiny_features','tiny_features_option_ui_font_color_hover',(empty(wbc()->sanitize->post('tiny_features_option_ui_font_color_hover'))?'#ffffff':wbc()->sanitize->post('tiny_features_option_ui_font_color_hover')));

	wbc()->options->update_option('tiny_features','tiny_features_option_ui_bg_color',(empty(wbc()->sanitize->post('tiny_features_option_ui_bg_color'))?'#ffffff':wbc()->sanitize->post('tiny_features_option_ui_bg_color')));

	wbc()->options->update_option('tiny_features','tiny_features_option_ui_bg_color_hover',(empty(wbc()->sanitize->post('tiny_features_option_ui_bg_color_hover'))?'#ffffff':wbc()->sanitize->post('tiny_features_option_ui_bg_color_hover')));

	wbc()->options->update_option('tiny_features','product_page_hide_first_variation_form',(empty(wbc()->sanitize->post('product_page_hide_first_variation_form'))?'':1));

	wbc()->options->update_option('tiny_features','product_page_hide_second_variation_form',(empty(wbc()->sanitize->post('product_page_hide_second_variation_form'))?'':1));
	
	wbc()->options->update_option('tiny_features','tiny_features_option_ui_loop_box_hover_media_index',(empty(wbc()->sanitize->post('tiny_features_option_ui_loop_box_hover_media_index'))?'2':wbc()->sanitize->post('tiny_features_option_ui_loop_box_hover_media_index')));

	wbc()->options->update_option('tiny_features','tiny_features_specification_meta_keys',(empty(wbc()->sanitize->post('tiny_features_specification_meta_keys'))?'':wbc()->sanitize->post('tiny_features_specification_meta_keys')));
	
	wbc()->options->update_option('tiny_features','tiny_features_product_page_video_icon',(empty(wbc()->sanitize->post('tiny_features_product_page_video_icon'))?'':wbc()->sanitize->post('tiny_features_product_page_video_icon')));

	
	
	wbc()->options->update_option('tiny_features','shop_page_hide_first_variation_form',(empty(wbc()->sanitize->post('shop_page_hide_first_variation_form'))?'':1));

	wbc()->options->update_option('tiny_features','shop_page_hide_second_variation_form',(empty(wbc()->sanitize->post('shop_page_hide_second_variation_form'))?'':1));

	wbc()->options->update_option('tiny_features','tiny_features_shop_page_option_ui_option_dimention',(empty(wbc()->sanitize->post('tiny_features_shop_page_option_ui_option_dimention'))?'2em':wbc()->sanitize->post('tiny_features_shop_page_option_ui_option_dimention')));

	wbc()->options->update_option('tiny_features','tiny_features_shop_page_option_ui_border_color',(empty(wbc()->sanitize->post('tiny_features_shop_page_option_ui_border_color'))?'#ffffff':wbc()->sanitize->post('tiny_features_shop_page_option_ui_border_color')));	

	wbc()->options->update_option('tiny_features','tiny_features_shop_page_option_ui_border_width',(empty(wbc()->sanitize->post('tiny_features_shop_page_option_ui_border_width'))?'1px':wbc()->sanitize->post('tiny_features_shop_page_option_ui_border_width')));

	wbc()->options->update_option('tiny_features','tiny_features_shop_page_option_ui_border_color_hover',(empty(wbc()->sanitize->post('tiny_features_shop_page_option_ui_border_color_hover'))?'#ffffff':wbc()->sanitize->post('tiny_features_shop_page_option_ui_border_color_hover')));

	wbc()->options->update_option('tiny_features','tiny_features_shop_page_option_ui_border_width_hover',(empty(wbc()->sanitize->post('tiny_features_shop_page_option_ui_border_width_hover'))?'1px':wbc()->sanitize->post('tiny_features_shop_page_option_ui_border_width_hover')));

	wbc()->options->update_option('tiny_features','tiny_features_shop_page_option_ui_border_radius',(empty(wbc()->sanitize->post('tiny_features_shop_page_option_ui_border_radius'))?'1px':wbc()->sanitize->post('tiny_features_shop_page_option_ui_border_radius')));

	wbc()->options->update_option('tiny_features','tiny_features_shop_page_option_ui_font_color',(empty(wbc()->sanitize->post('tiny_features_shop_page_option_ui_font_color'))?'#ffffff':wbc()->sanitize->post('tiny_features_shop_page_option_ui_font_color')));

	wbc()->options->update_option('tiny_features','tiny_features_shop_page_option_ui_font_color_hover',(empty(wbc()->sanitize->post('tiny_features_shop_page_option_ui_font_color_hover'))?'#ffffff':wbc()->sanitize->post('tiny_features_shop_page_option_ui_font_color_hover')));

	wbc()->options->update_option('tiny_features','tiny_features_shop_page_option_ui_bg_color',(empty(wbc()->sanitize->post('tiny_features_shop_page_option_ui_bg_color'))?'#ffffff':wbc()->sanitize->post('tiny_features_shop_page_option_ui_bg_color')));

	wbc()->options->update_option('tiny_features','tiny_features_shop_page_option_ui_bg_color_hover',(empty(wbc()->sanitize->post('tiny_features_shop_page_option_ui_bg_color_hover'))?'#ffffff':wbc()->sanitize->post('tiny_features_shop_page_option_ui_bg_color_hover')));


	wbc()->options->update_option('tiny_features','tiny_features_enable_only_for_categories', (empty(wbc()->sanitize->post('tiny_features_enable_only_for_categories'))?'':wbc()->sanitize->post('tiny_features_enable_only_for_categories')));

	$skip_fileds = array();

	foreach ($form_definition as $key => $tab) {

		if( $key != $saved_tab_key ) {
			continue;
		}

		foreach ($tab["form"] as $fk => $fv) {

			if( in_array($fv["type"], \eo\wbc\model\admin\Form_Builder::savable_types()) ) {

				//skip fields where applicable
				if( in_array($fk, $skip_fileds) ) {
					continue;
				}

				ACTIVE_TODO temp. nicheni if che te jya sudhi tiny_features nu mvc architecture sarkha standard paramane fari upgrade na thay tya sudhi temperory rakhavanu che.	-- to h & -- to pi.
				if( isset($fv["is_upgrade_version_field_save_till_standard_upgrade"]) ) {

					--	ama post matho most probably value read karavanu avse.
						267.79.3 done karavanu kevanu che aa point pate pachi.
					wbc()->options->update_option($key, $fk, /* $fv['value'] */ wbc()->sanitize->post($fk));
				}
			}
		}
	}

	//$res['msg'] = "Updated successfully!";
	//wbc()->options->update_option('configuration','config_category',1);
	//wbc()->options->update_option('configuration','config_map',1);
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}

 
// echo json_encode($res);
wbc()->rest->response($res);
