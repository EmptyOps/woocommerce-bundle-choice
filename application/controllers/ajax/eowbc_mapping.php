<?php
/**
*	Ajax handler to handle ajax save request for eowbc_mapping form.	
*
*/

$res = array( "type"=>"success", "msg"=>"" );

if(wp_verify_nonce(sanitize_text_field($_POST['_wpnonce']),'eowbc_mapping')){                

	wbc()->load->model('admin/eowbc_mapping');
	wbc()->load->model('admin\form-builder');
	    
	if( isset($_POST["sub_action"]) && $_POST["sub_action"] == "bulk_delete" ) {
		$res = eo\wbc\model\admin\Eowbc_Mapping::instance()->delete( $_POST["ids"], $_POST["saved_tab_key"] );
	}
	else {
		$res = eo\wbc\model\admin\Eowbc_Mapping::instance()->save( eo\wbc\controllers\admin\menu\page\Mapping::get_form_definition() );
    }
	
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}


echo json_encode($res);