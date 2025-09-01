<?php
/**
*	Ajax handler to handle ajax save request for eowbc_appearance form.	
*
*/

$res = array( "type"=>"success", "msg"=>"" );

if(wp_verify_nonce(wbc()->sanitize->post('_wpnonce'),'eowbc_setting_staus')) {                

	wbc()->load->model('admin/eowbc_setting_status');
    wbc()->load->model('admin/form-builder');
    $res = eo\wbc\model\admin\Eowbc_Setting_Status::instance()->save( eo\wbc\controllers\admin\menu\page\Setting_Status::get_form_definition() );
    
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}


// echo json_encode($res);
wbc()->rest->response($res);