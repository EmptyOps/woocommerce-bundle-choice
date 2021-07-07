<?php
/**
*	Ajax handler to handle ajax save request for eowbc_configuration form.	
*
*/


$res = array( "type"=>"success", "msg"=>"" );

if(wp_verify_nonce(wbc()->sanitize->post('_wpnonce'),'eowbc_configuration')) {                

	wbc()->load->model('admin/eowbc_configuration');
    wbc()->load->model('admin/form-builder');
    $res = eo\wbc\model\admin\Eowbc_Configuration::instance()->save( eo\wbc\controllers\admin\menu\page\Configuration::get_form_definition() );
    
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}

// echo json_encode($res);
wbc()->rest->response($res);
