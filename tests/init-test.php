<?php

class InitTest extends WP_UnitTestCase {
	public __construct(){
		$_tests_dir = getenv( 'WP_TESTS_DIR' );
		if ( ! $_tests_dir ) {
			$_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
		}
		require_once $_tests_dir . '/includes/functions.php';
		activate_plugin('woocommerce/woocommerce.php');
	}
	public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}
}
