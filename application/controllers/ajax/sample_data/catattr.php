<?php
/**
*	Ajax handler to handle ajax save request for eowbc_mapping form.	
*
*/

$res = array( "type"=>"success", "msg"=>"" );

try {

	if(wp_verify_nonce(wbc()->sanitize->post('_wpnonce'),'sample_data_jewelry')){                
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
	
	$template = array();

		if(wbc()->sanitize->post('type')=='cat') {
			$template = $data_template_obj->get_categories();

			$post_index = wbc()->sanitize->post('index');
			$index = 0;
			foreach ($template as $catind => $cat) {
				
				if( $index == $post_index ) {
					$template = $template[$catind];

					if(isset($_POST['cat_value_'.$catind]) && !empty(wbc()->sanitize->post('cat_value_'.$catind))) {
						$template['name'] = wbc()->sanitize->post('cat_value_'.$catind);
					}
					break;
				}

				$index++;

				$is_break = false;
				if( isset($cat['child']) ) {
					foreach ($cat['child'] as $childcatind => $childcat) {

						if( $index == $post_index ) {
							$template = $childcat;
							$template['parent'] = wbc()->wc->get_term_by('slug',$cat['slug'] , 'product_cat')->term_id;
							$is_break = true;
							break;
						}

						$index++;
					}
				}

				if( $is_break ) {
					break;
				}
			}

			call_user_func(array($class_name,'instance'))->create_category(array($template));		

		} elseif(wbc()->sanitize->post('type')=='attr'){

			$feature_key = wbc()->sanitize->post('feature_key');

			$template = $data_template_obj->get_attributes();
			
			$catat_attribute = unserialize( wbc()->options->get( $feature_key.'_created_attribute', serialize($template) ) );

			$template = $template[wbc()->sanitize->post('index')];
			if(!empty(wbc()->sanitize->post('label'))) {
				$template['name'] = wbc()->sanitize->post('label');
			}

			$catat_attribute[wbc()->sanitize->post('index')] = call_user_func(array($class_name,'instance'))->create_attribute(array($template))[0];	

			wbc()->options->set($feature_key.'_created_attribute', serialize($catat_attribute));	
		} 
		elseif(wbc()->sanitize->post('type')=='after_cat_created') {
	        $res_temp = call_user_func(array($class_name,'instance'))->after_cat_created(wbc()->sanitize->post('feature_key'));

	        if(is_array($res_temp) && $res_temp) {

	        	$res = $res_temp;
	        }
		} 
		elseif(wbc()->sanitize->post('type')=='after_attr_created') {
			$res_temp = call_user_func(array($class_name,'instance'))->after_attr_created(wbc()->sanitize->post('feature_key'));

			if(is_array($res_temp) && $res_temp) {

	        	$res = $res_temp;
	        }
		} 	
	} else {
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
        "msg"  => !empty($errorMessage) ? $errorMessage : "There is some error in this sample data PHP process for the feature 'Category/attribute'."
    );

} catch (Exception $e) {
    // Generic Exception class, to catch any other PHP errors
    $res = array(
        "type" => "error",
        "msg"  => $e->getMessage() ?: "There is some error in this sample data PHP process for the feature 'Category/attribute'."
    );

}


//echo json_encode($res);
wbc()->rest->response($res);