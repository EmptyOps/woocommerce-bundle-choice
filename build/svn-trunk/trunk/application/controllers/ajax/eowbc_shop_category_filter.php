<?php
/**
*	Ajax handler to handle ajax save request for eowbc_mapping form.	
*
*/

$res = array( "type"=>"success", "msg"=>"" );
if(wp_verify_nonce(wbc()->sanitize->post('_wpnonce'),'eowbc_shop_category_filter')) {                
	
	wbc()->load->model('admin/eowbc_shop_category_filter');
	wbc()->load->model('admin\form-builder');
	    
	if( isset($_POST["sub_action"]) && wbc()->sanitize->post("sub_action") == "bulk_delete" ) {
		$res = eo\wbc\model\admin\Eowbc_Shop_Category_Filter::instance()->delete( wbc()->sanitize->post_array("ids"), wbc()->sanitize->post("saved_tab_key"),0 );
	} elseif( isset($_POST["sub_action"]) && wbc()->sanitize->post("sub_action") == "bulk_activate" ) {
		$res = eo\wbc\model\admin\Eowbc_Shop_Category_Filter::instance()->activate( wbc()->sanitize->post_array("ids"), wbc()->sanitize->post("saved_tab_key"),1 );
	} elseif( isset($_POST["sub_action"]) && wbc()->sanitize->post("sub_action") == "bulk_deactivate" ) {
		$res = eo\wbc\model\admin\Eowbc_Shop_Category_Filter::instance()->deactivate( wbc()->sanitize->post_array("ids"), wbc()->sanitize->post("saved_tab_key"),1 );
	} elseif(isset($_POST['sub_action']) and wbc()->sanitize->post('sub_action') == 'fetch') {
		$res = eo\wbc\model\admin\Eowbc_Shop_Category_Filter::instance()->fetch_filter($res);
	}
	else {
		$res = eo\wbc\model\admin\Eowbc_Shop_Category_Filter::instance()->save( eo\wbc\controllers\admin\menu\page\Shop_Category_Filter::get_form_definition() );
    }

    //just for fix -- to be removed later 
    if(!empty(wbc()->sanitize->post('sc_shop_cat_filter_location_shop'))) {
    	wbc()->options->update_option('filters_sc_filter_setting','sc_shop_cat_filter_location_shop',wbc()->sanitize->post('sc_shop_cat_filter_location_shop'));
    } else {
    	wbc()->options->update_option('filters_sc_filter_setting','sc_shop_cat_filter_location_shop','');
    }

    if(!empty(wbc()->sanitize->post('sc_shop_cat_filter_location_cat'))) {
    	wbc()->options->update_option('filters_sc_filter_setting','sc_shop_cat_filter_location_cat',wbc()->sanitize->post('sc_shop_cat_filter_location_cat'));
    } else {
    	wbc()->options->update_option('filters_sc_filter_setting','sc_shop_cat_filter_location_cat','');
    }
	
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}


// echo json_encode($res);
wbc()->rest->response($res);