<?php
/**
*	Ajax handler to sync the product to the lookup table
*/

$res = array( "type"=>"success", "msg"=>true );

if(wp_verify_nonce(wbc()->sanitize->post('_wpnonce'),'sync_filter_products')) {
	
	if(!empty($_POST['ids']) and is_array($_POST['ids'])) {

		wbc()->load->model('lookup-manager');
		$lookup_manager = \eo\wbc\model\admin\Lookup_Manager::instance();

		foreach ($_POST['ids'] as $pid) {
			$product = wbc()->wc->eo_wbc_get_product($pid);

			if(!empty($product) and !is_wp_error($product)) {

				$childs = $product->get_children();
				if(!empty($childs)){
					foreach ($childs as $child) {
						$child_product = wbc()->wc->eo_wbc_get_product($child);
						if(!empty($child_product) and !is_wp_error($child_product)){
							$lookup_manager->update_product_variation($child,$child_product);
						}
					}
				}
				$lookup_manager->update_product($pid,$product);
			}
		}		
	} else { 	
		$res["type"] = "error";
		$res["msg"] = "No ids recived.";
	}
}	
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}

 
// echo json_encode($res);
wbc()->rest->response($res);
