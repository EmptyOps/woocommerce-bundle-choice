<?php
class WooCommerce_Test extends WP_UnitTestCase {
	function test_wc_exits() {
		$this->assertTrue(function_exists('wc'));
	}	

	function test_wc_get_product_exists() {
		$this->assertTrue(function_exists('wc_get_product'));
	}
}