<?php
/**
 *	Ajax handler to handle ajax save request for eowbc_extras form.	
 *
 */

$res = array("type" => "success", "msg" => "");

if (wp_verify_nonce(wbc()->sanitize->post('_wpnonce'), 'eowbc_extras')) {

	wbc()->load->model('admin/eowbc_extras');
	wbc()->load->model('admin\form-builder');

	if (isset($_POST["sub_action"]) && wbc()->sanitize->post("sub_action") == "bulk_delete") {
		$res = eo\wbc\model\admin\Eowbc_Extras::instance()->delete(wbc()->sanitize->post_array("ids"), wbc()->sanitize->post("saved_tab_key"));
	} elseif (isset($_POST['sub_action']) and wbc()->sanitize->post('sub_action') == 'fetch') {
		$res = eo\wbc\model\admin\Eowbc_Extras::instance()->fetch_map($res);
	} else {
		$res = eo\wbc\model\admin\Eowbc_Extras::instance()->save(eo\wbc\controllers\admin\menu\page\Extras::get_form_definition());
	}

} else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}


// echo json_encode($res);
wbc()->rest->response($res);