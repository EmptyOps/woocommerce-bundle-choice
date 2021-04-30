<?php
/**
*	Ajax handler to handle ajax request for sending error report 
*/

$res = array( "type"=>"success", "msg"=>"" );

if(wp_verify_nonce(wbc()->sanitize->post('_wpnonce'),'eowbc_send_error_report')) {                

	wbc()->load->model('admin/eowbc_setting_status');
    wbc()->load->model('admin/form-builder');

    //error report send action is same as the one used in backend except that there is a frontend condition parameter involved. 
    $res = eo\wbc\model\admin\Eowbc_Setting_Status::instance()->save( eo\wbc\controllers\admin\menu\page\Setting_Status::get_form_definition() );
    
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}


// echo json_encode($res);
wbc()->rest->response($res);