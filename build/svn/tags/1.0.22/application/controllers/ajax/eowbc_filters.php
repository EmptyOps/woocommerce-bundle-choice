<?php
/**
*	Ajax handler to handle ajax save request for eowbc_filters form.	
*
*/

$res = array( "type"=>"success", "msg"=>"" );

if(wp_verify_nonce(wbc()->sanitize->post('_wpnonce'),'eowbc_filters')) {

	
	wbc()->load->model('admin/eowbc_filters');
	wbc()->load->model('admin\form-builder');
	    
	if( isset($_POST["sub_action"]) && wbc()->sanitize->post("sub_action") == "bulk_delete" ) {
		$res = eo\wbc\model\admin\Eowbc_Filters::instance()->delete( wbc()->sanitize->post_array("ids"), wbc()->sanitize->post("saved_tab_key")/*,1*/ );
	} elseif( isset($_POST["sub_action"]) && wbc()->sanitize->post("sub_action") == "bulk_activate" ) {
		$res = eo\wbc\model\admin\Eowbc_Filters::instance()->activate( wbc()->sanitize->post_array("ids"), wbc()->sanitize->post("saved_tab_key"),1 );
	} elseif( isset($_POST["sub_action"]) && wbc()->sanitize->post("sub_action") == "bulk_deactivate" ) {
		$res = eo\wbc\model\admin\Eowbc_Filters::instance()->deactivate( wbc()->sanitize->post_array("ids"), wbc()->sanitize->post("saved_tab_key"),1 );
	} elseif(isset($_POST['sub_action']) and wbc()->sanitize->post('sub_action') == 'fetch') {
		$res = eo\wbc\model\admin\Eowbc_Filters::instance()->fetch_filter($res);
	}
	else {
		if( strpos(wbc()->sanitize->post("saved_tab_key"), 'd_fconfig') !== FALSE || strpos(wbc()->sanitize->post("saved_tab_key"), 's_fconfig') !== FALSE ) {
			/*$_POST["first_category_altr_filt_widgts"] = 'user_manually_added';
            $_POST["second_category_altr_filt_widgts"] = 'user_manually_added';*/
		}
		$res = eo\wbc\model\admin\Eowbc_Filters::instance()->save( eo\wbc\controllers\admin\menu\page\Filters::get_form_definition() );
    }
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}

// json_encode($res);
wbc()->rest->response($res);