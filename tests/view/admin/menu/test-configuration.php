<?php

class  Admin_Configuration_Test extends WP_UnitTestCase {
	
	function test_save_options() {
		$_POST['_wpnonce'] = wp_create_nonce('eowbc_configuration');
		$_POST['resolver'] = 'eowbc_configuration';
		$_POST['config_business_type'] = 'jewelry';
		$_POST['config_buttons_page'] = '1';
		$_POST['config_enable_make_pair'] = 'enable_make_pair';
		$_POST['config_label_make_pair'] = 'Make Pair';
		$_POST['config_first_name'] = 'first_name';
		$_POST['config_first_icon'] = 'first_icon';
		$_POST['config_second_name'] = 'second_name';
		$_POST['config_second_icon'] = 'second_icon';
		$_POST['config_preview_name'] = 'preview_name';
		$_POST['config_preview_icon'] = 'preview_icon';
		$_POST['config_filter_status'] = 'filter_status';
		$_POST['config_pair_maker_status'] = 'pair_maker_status';
		$_POST['config_pair_maker_upper_card'] = 'pair_maker_upper_card';

		$expected = serialize(array(
			"business_type"=>"jewelry",
			"buttons_page"=>"1",
			"enable_make_pair"=>"enable_make_pair",
			"label_make_pair"=>"Make Pair",
			"first_name"=>"first_name",
			"first_icon"=>"first_icon",
			"second_name"=>"second_name",
			"second_icon"=>"second_icon",
			"preview_name"=>"preview_name",
			"preview_icon"=>"preview_icon",
			"filter_status"=>"filter_status",
			"pair_maker_status"=>"pair_maker_status",
			"pair_maker_upper_card"=>"pair_maker_upper_card"			
		));

		require_once constant('EOWBC_DIRECTORY').'application/controllers/ajax/'.sanitize_text_field($_POST['resolver']).'.php';
		$result = get_option('eowbc_option_configuration',"a:0:{}");
		$this->assertEquals($expected , $result);
	}	
}