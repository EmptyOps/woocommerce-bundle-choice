<?php
/**
*	Ajax handler to handle ajax save request for eowbc_configuration form.	
*
*/

$res = array( "type"=>"success", "msg"=>"Updated successfully!" );

if(wp_verify_nonce(sanitize_text_field($_POST['_wpnonce']),'eowbc_configuration')){
	
	/*wbc()->options->update_option('configuration','business_type',sanitize_text_field($_POST['config_business_type']));*/
	
	wbc()->options->update_option('configuration','buttons_page',sanitize_text_field($_POST['config_buttons_page']));
	
	wbc()->options->update_option('configuration','enable_make_pair',(empty($_POST['config_enable_make_pair'])?'':sanitize_text_field($_POST['config_enable_make_pair'])));	
	
	wbc()->options->update_option('configuration','label_make_pair',sanitize_text_field($_POST['config_label_make_pair']));
	
	wbc()->options->update_option('configuration','first_name',sanitize_text_field($_POST['config_first_name']));
	
	wbc()->options->update_option('configuration','first_icon',sanitize_text_field($_POST['config_first_icon']));
	
	wbc()->options->update_option('configuration','second_name',sanitize_text_field($_POST['config_second_name']));
	
	wbc()->options->update_option('configuration','second_icon',sanitize_text_field($_POST['config_second_icon']));
	
	wbc()->options->update_option('configuration','preview_name',sanitize_text_field($_POST['config_preview_name']));
	
	wbc()->options->update_option('configuration','preview_icon',sanitize_text_field($_POST['config_preview_icon']));
	
	/*wbc()->options->update_option('configuration','filter_status',(empty($_POST['config_filter_status'])?'':sanitize_text_field($_POST['config_filter_status'])));*/

	wbc()->options->update_option('configuration','pair_maker_status',(empty($_POST['config_pair_maker_status'])?'':sanitize_text_field($_POST['config_pair_maker_status'])));

	wbc()->options->update_option('configuration','pair_maker_upper_card',(empty($_POST['config_pair_maker_upper_card'])?'':sanitize_text_field($_POST['config_pair_maker_upper_card'])));
		
	//$res['msg'] = "Updated successfully!";
	//wbc()->options->update_option('configuration','config_category',1);
	//wbc()->options->update_option('configuration','config_map',1);
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}

 
echo json_encode($res);
