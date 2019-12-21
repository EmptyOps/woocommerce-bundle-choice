<?php
$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $_tests_dir ) {
	$_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}
require_once $_tests_dir . '/includes/functions.php';
activate_plugin('woocommerce/woocommerce.php');
error_log(get_option('site_url').PHP_EOL);

class InitTest extends WP_UnitTestCase {

	public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_home_links(){
		echo get_option('site_url').PHP_EOL;
		$this->assertEquals( 'http://example.org/', get_option('site_url') );
	}
}
