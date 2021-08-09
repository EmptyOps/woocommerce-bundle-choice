<?php
/**
*	Ajax handler to handle ajax save request for eowbc_price_control_save_update_prices form.	
*
*/

$res = array( "type"=>"success", "msg"=>"" );

// if (isset($_POST)
//     && isset($_POST['_wpnonce'])
//     && wp_verify_nonce($_POST['_wpnonce'],'eo_wbc_jpc_save_data')
//     && !empty($_POST['eo_wbc_action'])
//     && $_POST['eo_wbc_action']==='save_jpc_data'
//     && !empty($_POST['eo_wbc_jpc_form_data'])
// ) 
if(wp_verify_nonce(wbc()->sanitize->post('_wpnonce'),'eowbc_price_control_save_update_prices')) {                

	//hiren 09-05-2020: added json_decode to adapt with previous javascript version
    wbc()->load->model('admin/eowbc_price_control_save_update_prices');
    $res = eo\wbc\model\admin\Eowbc_Price_Control_Save_Update_Prices::instance()->save( ( $_POST['eo_wbc_jpc_form_data'] ) );

    if( $res["type"] == "success" ) {
        $res = eo\wbc\model\admin\Eowbc_Price_Control_Save_Update_Prices::instance()->update_prices();    
    }
}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}


// echo json_encode($res);
wbc()->rest->response($res);