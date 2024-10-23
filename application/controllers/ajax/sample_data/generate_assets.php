<?php
/**
*	Ajax handler to handle ajax save request for eowbc_mapping form.	
*
*/

$res = array( "type"=>"success", "msg"=>"" );

try {

	if(wp_verify_nonce(wbc()->sanitize->post('_wpnonce'),'sample_data_jewelry')) { 

		wbc()->load->model('admin/sample_data/eowbc_'.wbc()->sanitize->post('feature_key'));
		$class_name = '\eo\wbc\model\admin\sample_data\Eowbc_'.
			str_replace(' ','_',ucwords(
				implode(' ',
					explode('_',wbc()->sanitize->post('feature_key')
					)
				)
			)
		);

		$class_name = apply_filters('wbc_auto_sample_class_ajax', $class_name );

		$data_template_obj = call_user_func(array($class_name,'instance'))->get_data_template();
		
		$data_template_obj->generate_assets(wbc()->sanitize->post('feature_key'));
		
	} else {

		$res["type"] = "error";
		$res["msg"] = "Nonce validation failed";
	}
} catch (\Throwable $e) {

    // Check if the exception has a message method and get the message, otherwise create a generic error message
    if (method_exists($e, 'getMessage')) {
        $errorMessage = $e->getMessage();
    } else {
        $errorMessage = "There is some error in this sample data PHP process for the feature 'Generate Assets'.";
    }
    
    // Store the error details in the $res array
    $res = array(
        "type" => "error",
        "msg"  => $errorMessage
    );

} catch (Exception $e) {

    // Generic Exception class, to catch any other PHP errors
    $res = array(
        "type" => "error",
        "msg"  => $e->getMessage() ?: "There is some error in this sample data PHP process for the feature 'Generate Assets'."
    );

}

//echo json_encode($res);
wbc()->rest->response($res);