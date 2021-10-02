<?php
/**
*	Ajax handler to handle ajax save request for eowbc_mapping form.	
*
*/

$res = array( "type"=>"success", "msg"=>"" );
if(wp_verify_nonce(wbc()->sanitize->post('_wpnonce'),'eowbc_shortcode_filters')) {                
	
	wbc()->load->model('admin/eowbc_shortcode_filters');
	wbc()->load->model('admin\form-builder');
	    
	if( isset($_POST["sub_action"]) && wbc()->sanitize->post("sub_action") == "bulk_delete" ) {
		$res = eo\wbc\model\admin\Eowbc_Shortcode_Filters::instance()->delete( wbc()->sanitize->post_array("ids"), wbc()->sanitize->post("saved_tab_key"),0 );
	} elseif( isset($_POST["sub_action"]) && wbc()->sanitize->post("sub_action") == "bulk_activate" ) {
		$res = eo\wbc\model\admin\Eowbc_Shortcode_Filters::instance()->activate( wbc()->sanitize->post_array("ids"), wbc()->sanitize->post("saved_tab_key"),1 );
	} elseif( isset($_POST["sub_action"]) && wbc()->sanitize->post("sub_action") == "bulk_deactivate" ) {
		$res = eo\wbc\model\admin\Eowbc_Shortcode_Filters::instance()->deactivate( wbc()->sanitize->post_array("ids"), wbc()->sanitize->post("saved_tab_key"),1 );
	} elseif(isset($_POST['sub_action']) and wbc()->sanitize->post('sub_action') == 'fetch') {
		$res = eo\wbc\model\admin\Eowbc_Shortcode_Filters::instance()->fetch_filter($res);
	}
	else {
		$res = eo\wbc\model\admin\Eowbc_Shortcode_Filters::instance()->save( eo\wbc\controllers\admin\menu\page\Shortcode_Filters::get_form_definition() );
    }
	
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}


// echo json_encode($res);
wbc()->rest->response($res);