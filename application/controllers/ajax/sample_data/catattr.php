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
		$template = $template[sanitize_text_field($_POST['index'])];
				
		if(!empty(sanitize_text_field($_POST['label']))){
			$template['name'] = sanitize_text_field($_POST['label']);
		}
				
		\eo\wbc\model\admin\sample_data\Eowbc_Sample_Data::instance()->create_category(array($template));		

	} elseif(sanitize_text_field($_POST['type'])=='attr'){
		$template = $data_template_obj->get_attributes();
		$template = $template[sanitize_text_field($_POST['index'])];
		if(!empty(sanitize_text_field($_POST['label']))){
			$template['name'] = sanitize_text_field($_POST['label']);
		}

		\eo\wbc\model\admin\sample_data\Eowbc_Sample_Data::instance()->create_attribute(array($template));		
	} elseif(sanitize_text_field($_POST['type'])=='save_map'){
		$_maps = $data_template_obj->get_maps();
		if(!empty($_maps)){
        	\eo\wbc\model\admin\sample_data\Eowbc_Sample_Data::instance()->add_maps($_maps);
      	}
      	wbc()->options->set('eo_wbc_cats',serialize($data_template_obj->get_categories())); 
      	$data_template_obj->set_configs_after_categories($data_template_obj->get_categories());

	} elseif (sanitize_text_field($_POST['type'])=='save_filter') {
		/*$filters = $data_template_obj->get_filters($data_template_obj->get_categories(),$data_template_obj->get_attributes());
		if(!empty($filters)){
        	\eo\wbc\model\admin\sample_data\Eowbc_Sample_Data::instance()->add_filters($_maps);
      	}
      	wbc()->options->set('eo_wbc_cats',serialize($catat_category)); 
      	$this->data_template->set_configs_after_categories($catat_category);*/
	}

}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}
//echo json_encode($res);
wbc()->rest->response($res);