<?php

$res = array( "type"=>"success", "msg"=>"Success" );

if(wp_verify_nonce(wbc()->sanitize->post('_wpnonce'),'eowbc_askq')){                
	if( !empty(wbc()->sanitize->post('eowbc_askq_fname')) and 
		!empty(wbc()->sanitize->post('eowbc_askq_lname')) and
		!empty(wbc()->sanitize->post('eowbc_askq_email')) and 
		!empty(wbc()->sanitize->post('eowbc_askq_phone')) and
		!empty(wbc()->sanitize->post('eowbc_askq_message')) and
		!empty(wbc()->sanitize->post('product_id'))
	) {
		
		$email=wbc()->options->get('admin_email');
		$nl='
';
		$email_body = '';
		$email_body.=$nl.'-------------------------------------------------------'.$nl;
		$email_body.='Name: '.(wbc()->sanitize->post('eowbc_askq_fname').wbc()->sanitize->post('eowbc_askq_lname')).$nl;
		$email_body.='Email: '.wbc()->sanitize->post('eowbc_askq_email').$nl;
		$email_body.='Phone: '.wbc()->sanitize->post('eowbc_askq_phone').$nl;
		$email_body.='Product_ID: '.wbc()->sanitize->post('product_id').$nl;		
		$email_body.='Message: '.$nl.wbc()->sanitize->post('eowbc_askq_message').$nl;		

		if(!empty(sanitize_email($email))){
			wp_mail($email,'There is an inquiry for your diamond.', $email_body);
		}
	}
	echo true;
	die();
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}


// echo json_encode($res);
wbc()->rest->response($res);
