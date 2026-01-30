<?php
/**
*	Ajax handler to handle ajax save request for eowbc_theme_adaption form.	
*
*/

$res = array( "type"=>"success", "msg"=>"" );

if(wp_verify_nonce(wbc()->sanitize->post('_wpnonce'),'eowbc_theme_adaption')) {                

	wbc()->load->model('admin/eowbc_theme_adaption');
	wbc()->load->model('admin\form-builder');
	    
	if( isset($_POST["sub_action"]) && wbc()->sanitize->post("sub_action") == "bulk_delete" ) {
		$res = eo\wbc\model\admin\Eowbc_Theme_Adaption::instance()->delete( wbc()->sanitize->post_array("ids"), wbc()->sanitize->post("saved_tab_key") );
	} elseif(isset($_POST['sub_action']) and wbc()->sanitize->post('sub_action') == 'fetch') {
		$res = eo\wbc\model\admin\Eowbc_Theme_Adaption::instance()->fetch_map($res);
	} else {
		$res = eo\wbc\model\admin\Eowbc_Theme_Adaption::instance()->save( eo\wbc\controllers\admin\menu\page\Theme_Adaption::get_form_definition() );
    }
	
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}


// echo json_encode($res);
wbc()->rest->response($res);