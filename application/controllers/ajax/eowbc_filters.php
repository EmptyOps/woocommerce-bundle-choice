<?php
/**
*	Ajax handler to handle ajax save request for eowbc_filters form.	
*
*/

$res = array( "type"=>"success", "msg"=>"" );

if(wp_verify_nonce(sanitize_text_field($_POST['_wpnonce']),'eowbc_filters')){                

	wbc()->load->model('admin/eowbc_filters');
    wbc()->load->model('admin\form-builder');
    $res = eo\wbc\model\admin\Eowbc_Filters::instance()->save( eo\wbc\controllers\admin\menu\page\Filters::get_form_definition() );
    
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}


echo json_encode($res);