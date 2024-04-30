<?php
/**
*	Ajax handler to handle ajax save request for eowbc_mapping form.	
*
*/

$res = array( "type"=>"success", "msg"=>"" );

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
//echo json_encode($res);
wbc()->rest->response($res);