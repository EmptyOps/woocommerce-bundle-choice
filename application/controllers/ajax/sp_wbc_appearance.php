<?php
/**
*	Ajax handler to handle ajax save request for sp_wbc_appearance form.	
*
*/
defined( 'ABSPATH' ) || exit;
$res = array( "type"=>"success", "msg"=>"" );

if(wp_verify_nonce(wbc()->sanitize->post('_wpnonce'),'sp_wbc_appearance')){                

	wbc()->load->model('admin/sp_wbc_appearance');
    wbc()->load->model('admin\form-builder');
    $res = eo\wbc\model\admin\SP_WBC_Appearance::instance()->save( eo\wbc\controllers\admin\menu\page\Appearance::get_form_definition() );
    
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}


// echo json_encode($res);
wbc()->rest->response($res);