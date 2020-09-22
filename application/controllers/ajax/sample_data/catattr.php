<?php
/**
*	Ajax handler to handle ajax save request for eowbc_mapping form.	
*
*/

$res = array( "type"=>"success", "msg"=>"" );

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
						$template['parent'] = get_term_by('slug',$cat['slug'] , 'product_cat')->term_id;
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
        call_user_func(array($class_name,'instance'))->after_cat_created(wbc()->sanitize->post('feature_key'));
	} 
	elseif(wbc()->sanitize->post('type')=='after_attr_created') {
		call_user_func(array($class_name,'instance'))->after_attr_created(wbc()->sanitize->post('feature_key'));
	} 
	// elseif(sanitize_text_field($_POST['type'])=='save_map'){
	// 	$_maps = $data_template_obj->get_maps();
	// 	if(!empty($_maps)){
 //        	\eo\wbc\model\admin\sample_data\Eowbc_Sample_Data::instance()->add_maps($_maps);
 //      	}
 //      	wbc()->options->set('eo_wbc_cats',serialize($data_template_obj->get_categories())); 
 //      	$data_template_obj->set_configs_after_categories($data_template_obj->get_categories());

	// } 
	// elseif (sanitize_text_field($_POST['type'])=='save_filter') {
	// 	/*$filters = $data_template_obj->get_filters($data_template_obj->get_categories(),$data_template_obj->get_attributes());
	// 	if(!empty($filters)){
 //        	\eo\wbc\model\admin\sample_data\Eowbc_Sample_Data::instance()->add_filters($_maps);
 //      	}
 //      	wbc()->options->set('eo_wbc_cats',serialize($catat_category)); 
 //      	$this->data_template->set_configs_after_categories($catat_category);*/
	// }

}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}
//echo json_encode($res);
wbc()->rest->response($res);