<?php
/**
*	Ajax handler to handle ajax save request for eowbc_configuration form.	
*
*/

$res = array( "type"=>"success", "msg"=>"Updated successfully!" );

if(wp_verify_nonce(sanitize_text_field($_POST['_wpnonce']),'eowbc_tiny_features')){
		
	wbc()->options->update_option('tiny_features','specification_view_status',(empty($_POST['specification_view_status'])?'':sanitize_text_field($_POST['specification_view_status'])));

	wbc()->options->update_option('tiny_features','specification_view_shortcode_status',(empty($_POST['specification_view_shortcode_status'])?'':sanitize_text_field($_POST['specification_view_shortcode_status'])));

	wbc()->options->update_option('tiny_features','specification_view_default_status',(empty($_POST['specification_view_default_status'])?'':sanitize_text_field($_POST['specification_view_default_status'])));
		
	//$res['msg'] = "Updated successfully!";
	//wbc()->options->update_option('configuration','config_category',1);
	//wbc()->options->update_option('configuration','config_map',1);
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}

 
echo json_encode($res);
