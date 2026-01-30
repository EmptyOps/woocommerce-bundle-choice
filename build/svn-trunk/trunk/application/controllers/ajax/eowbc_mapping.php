<?php
/**
*	Ajax handler to handle ajax save request for eowbc_mapping form.	
*
*/

$res = array( "type"=>"success", "msg"=>"" );

if(wp_verify_nonce(wbc()->sanitize->post('_wpnonce'),'eowbc_mapping')) {                

	wbc()->load->model('admin/eowbc_mapping');
	wbc()->load->model('admin\form-builder');
	    
	if( isset($_POST["sub_action"]) && wbc()->sanitize->post("sub_action") == "bulk_delete" ) {
		$res = eo\wbc\model\admin\Eowbc_Mapping::instance()->delete( wbc()->sanitize->post_array("ids"), wbc()->sanitize->post("saved_tab_key") );
	} elseif(isset($_POST['sub_action']) and wbc()->sanitize->post('sub_action') == 'fetch') {
		$res = eo\wbc\model\admin\Eowbc_Mapping::instance()->fetch_map($res);
	} elseif (isset($_POST['sub_action']) and wbc()->sanitize->post('sub_action') == 'fetch_product') {
		
		$res = \eo\wbc\model\Search_Product::instance()->get_ajax();

	} else {
		$res = eo\wbc\model\admin\Eowbc_Mapping::instance()->save( eo\wbc\controllers\admin\menu\page\Mapping::get_form_definition() );
    }
	
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}


// echo json_encode($res);
wbc()->rest->response($res);