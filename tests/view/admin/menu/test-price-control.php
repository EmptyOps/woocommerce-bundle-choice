<?php

class  Admin_Price_Control_Test extends WP_UnitTestCase {
	
	function test_save_options() {
		$_POST['_wpnonce'] = wp_create_nonce('eowbc_price_control_save_update_prices');
		$_POST['resolver'] = 'eowbc_price_control_save_update_prices';
		$_POST['eo_wbc_action'] = 'save_jpc_data';
		$_POST['eo_wbc_jpc_form_data'] = '';

		$expected = serialize(array(
			"eo_wbc_jpc_form_data"=>""
		));

		require_once constant('EOWBC_DIRECTORY').'application/controllers/ajax/'.sanitize_text_field($_POST['resolver']).'.php';
		$result = get_option('eowbc_option_price_control',"a:0:{}");
		$this->assertEquals($expected , $result);
	}	
}