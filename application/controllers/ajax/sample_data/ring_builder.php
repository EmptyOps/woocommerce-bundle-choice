<?php
/**
*	Ajax handler to handle ajax save request for eowbc_mapping form.	
*
*/

$res = array( "type"=>"success", "msg"=>"" );

try {

	if(wp_verify_nonce(wbc()->sanitize->post('_wpnonce'),'sample_data_jewelry')){                
		wbc()->load->model('admin/sample_data/eowbc_ring_builder');
		wbc()->load->model('admin\form-builder');
		    
		// if( isset($_POST["sub_action"]) && $_POST["sub_action"] == "bulk_delete" ) {
		// 	$res = eo\wbc\model\admin\Eowbc_Mapping::instance()->delete( $_POST["ids"], $_POST["saved_tab_key"] );
		// }
		// else {
			//$res = eo\wbc\model\admin\Eowbc_Mapping::instance()->save( eo\wbc\controllers\admin\menu\page\Mapping::get_form_definition() );
			//\eo\wbc\model\admin\sample_data\Eowbc_Ring_Builder::instance()->CatAtData__construct();
			$res /*echo*/ = \eo\wbc\model\admin\sample_data\Eowbc_Ring_Builder::instance()->create_product(intval(wbc()->sanitize->post('product_index')));
			// wp_die();
	    // }
		
	}
	else {
		$res["type"] = "error";
		$res["msg"] = "Nonce validation failed";
	}

} catch (\Throwable $e) {

    // Check if the exception has a message method and get the message, otherwise create a generic error message
    if (method_exists($e, 'getMessage')) {
        $errorMessage = $e->getMessage();
    } else {
        $errorMessage = "An unknown error occurred.";
    }
    
    // Store the error details in the $res array
    $res = array(
        "type" => "error",
        "msg"  => !empty($errorMessage) ? $errorMessage : "There is some error in this sample data PHP process for the feature 'Ring Builder'."
    );

} catch (Exception $e) {

    // Generic Exception class, to catch any other PHP errors
    $res = array(
        "type" => "error",
        "msg"  => $e->getMessage() ?: "There is some error in this sample data PHP process for the feature 'Ring Builder'."
    );

}

echo json_encode($res);