<?php
/**
*	Ajax handler to handle ajax request for sending error report 
*/

$res = array( "type"=>"success", "msg"=>"" );

if(wp_verify_nonce(sanitize_text_field($_POST['_wpnonce']),'eowbc_send_error_report')){                

	wbc()->load->model('admin/eowbc_setting_status');
    wbc()->load->model('admin/form-builder');
    $res = eo\wbc\model\admin\Eowbc_Setting_Status::instance()->save( eo\wbc\controllers\admin\menu\page\Setting_Status::get_form_definition() );
    
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}


echo json_encode($res);