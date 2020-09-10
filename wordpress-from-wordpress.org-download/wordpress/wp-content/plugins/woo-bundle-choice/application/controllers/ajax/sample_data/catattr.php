<?php
/**
*	Ajax handler to handle ajax save request for eowbc_mapping form.	
*
*/

$res = array( "type"=>"success", "msg"=>"" );

if(wp_verify_nonce(sanitize_text_field($_POST['_wpnonce']),'sample_data_jewelry')){                
	wbc()->load->model('admin/sample_data/eowbc_'.sanitize_text_field($_POST['feature_key']));
	$class_name = '\eo\wbc\model\admin\sample_data\Eowbc_'.
		str_replace(' ','_',ucwords(
			implode(' ',
				explode('_',
					sanitize_text_field($_POST['feature_key'])
				)
			)
		)
	);

	$data_template_obj = call_user_func(array($class_name,'instance'))->get_data_template();




	$template = array();
	if(sanitize_text_field($_POST['type'])=='cat'){
		$template = $data_template_obj->get_categories();

		$post_index = wbc()->sanitize->post('index');
		$index = 0;
		foreach ($template as $catind => $cat) {
			
			if( $index == $post_index ) {
				$template = $template[$catind];

				if(isset($_POST['cat_value_'.$catind]) && !empty(sanitize_text_field($_POST['cat_value_'.$catind]))){
					$template['name'] = sanitize_text_field($_POST['cat_value_'.$catind]);
				}
				break;
			}

			$index++;

			if( isset($cat['child']) ) {
				foreach ($cat['child'] as $childcatind => $childcat) {

					if( $index == $post_index ) {
						$template = $childcat;
						$template['parent'] = get_term_by('slug',$cat['slug'] , 'product_cat')->term_id;
						break;
					}

					$index++;
				}
			}
		}
				
		call_user_func(array($class_name,'instance'))->create_category(array($template));		

	} elseif(sanitize_text_field($_POST['type'])=='attr'){
		$template = $data_template_obj->get_attributes();
		
		$catat_attribute = unserialize( wbc()->options->get($feature_key.'_created_attribute'), serialize($template) );

		$template = $template[sanitize_text_field($_POST['index'])];
		if(!empty(sanitize_text_field($_POST['label']))){
			$template['name'] = sanitize_text_field($_POST['label']);
		}

		$catat_attribute[sanitize_text_field($_POST['index'])] = call_user_func(array($class_name,'instance'))->create_attribute(array($template))[0];	

		wbc()->options->set($feature_key.'_created_attribute', serialize($catat_attribute));	
	} 
	elseif(sanitize_text_field($_POST['type'])=='after_cat_created'){
        call_user_func(array($class_name,'instance'))->after_cat_created($_POST['feature_key']);
	} 
	elseif(sanitize_text_field($_POST['type'])=='after_attr_created'){
		call_user_func(array($class_name,'instance'))->after_attr_created($_POST['feature_key']);
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