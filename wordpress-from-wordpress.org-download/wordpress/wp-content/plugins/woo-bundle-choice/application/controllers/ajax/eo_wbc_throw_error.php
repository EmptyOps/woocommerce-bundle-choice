<?php
/**
*	Ajax handler to handle ajax request for sending error report 
*/

$res = array( "type"=>"success", "msg"=>"" );

if(wp_verify_nonce(sanitize_text_field($_POST['_wpnonce']),'eo_wbc_throw_error')){                

	throw new Exception("There is an error at page ".sanitize_text_field($_POST['page']).". Type: ".sanitize_text_field($_POST['type'])." Message: ".sanitize_text_field($_POST['msg']),1);
    
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}


// echo json_encode($res);
wbc()->rest->response($res);