<?php
/**
*	Ajax handler to handle ajax save request for eowbc_configuration form.	
*
*/

$res = array( "type"=>"success", "msg"=>"Added successfully!" );

if(wp_verify_nonce(sanitize_text_field($_POST['_wpnonce']),'eowbc_tiny_features_filter_add')) {
	if(
		!empty($_POST["shop_cat_filter_add_category"]) and
		!empty($_POST["shop_cat_filter_add_type"]) and
		!empty($_POST["shop_cat_filter_add_input_type"]) and
		!empty($_POST["shop_cat_filter_add_column_width"]) and
		isset($_POST["shop_cat_filter_add_order"]) 
	){
		$filter_name = $_POST["shop_cat_filter_add_category"];		
        $filter_type = $_POST["shop_cat_filter_add_type"];
        $filter_label = (!empty($_POST["shop_cat_filter_add_label"])?$_POST["shop_cat_filter_add_label"]:"");
        $filter_advanced = (!empty($_POST["shop_cat_filter_add_is_advanced"])?"1":"0");
        $filter_input = $_POST["shop_cat_filter_add_input_type"];
        $filter_dependent = (!empty($_POST["shop_cat_filter_add_dependent"])?"1":"0");
        $filter_width = $_POST["shop_cat_filter_add_column_width"];        
        $filter_order = $_POST["shop_cat_filter_add_order"];
        $filter_reset = (isset($_POST['shop_cat_filter_add_reset_link'])?"1":"0");

        $filter_icon_size = $_POST['shop_cat_filter_add_icon_size'];
        $filter_icon_font_size = $_POST['shop_cat_filter_add_icon_label_size'];

        $filter_child_filter = empty($_POST['shop_cat_filter_add_child_filter'])?'0':'1';
        $filter_child_label = $_POST['shop_cat_filter_add_child_label'];
        
        $filter_data = unserialize(wbc()->options->get_option('tiny_feature','filter_widget',"a:0:{}"));
        if(!empty($filter_data)){
            foreach ($filter_data as $key=>$item) {
                if ($item['name']==$filter_name) {
                    $res = array( "type"=>"warning", "msg"=>"Filter Already Exists." );                    
                    echo json_encode($res);
                    wp_die();
                }
            }
        }

        $data=array(
            'name'=>$filter_name,
            'type'=>$filter_type,
            'label'=>$filter_label,
            'advance'=>$filter_advanced,
            'input'=>$filter_input,
            'dependent'=>$filter_dependent,
            'column_width' => $filter_width,                        
            'order'=>$filter_order,
            'reset'=>$filter_reset,
        );
        
        if($filter_input == 'icon' || $filter_input == 'icon_text'){
            $data['icon_size'] = $filter_icon_size;
            $data['font_size'] = $filter_icon_font_size;
        }       

        if ($filter_child_filter == '1') {
            $data['child_label'] =$filter_child_label;
        }
        $filter_data[$filter_name] = $data;
        
        wbc()->options->update_option('tiny_feature','filter_widget',serialize($filter_data));

        $res = array( "type"=>"success", "msg"=>"Added successfully!");

	} elseif(!empty($_POST['sub_action']) and !empty($_POST['ids'])) {
		$ids = $_POST['ids'];
		$filter_data = unserialize(wbc()->options->get_option('tiny_feature','filter_widget',"a:0:{}"));
		foreach ($ids as $id) {
			if(array_key_exists($id,$filter_data)){
				unset($filter_data[$id]);
			}
		}
		wbc()->options->update_option('tiny_feature','filter_widget',serialize($filter_data));
		$res = array( "type"=>"success", "msg"=>"Filters Removed.");
	} else {
		$res = array( "type"=>"warning", "msg"=>"All required fields are must.",);
	}
	
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}

 
echo json_encode($res);
