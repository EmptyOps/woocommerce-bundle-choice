<?php
/**
 * Class SampleTest
 *
 * @package Woo_Bundle_Choice
 */

/**
 * Sample test case.
 */
$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $_tests_dir ) {
	$_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}
// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';
require_once ($_tests_dir.'/includes/abstract-testcase.php');
require_once ($_tests_dir.'/includes/testcase.php');	

class SampleTest extends WP_UnitTestCase {

	/**
	 * A single example test.
	 */
	public function test_sample() {
		// Replace this with some actual testing code.
		$this->assertTrue( true );
	}
	public function test_another(){
		$this->assertTrue( class_exists('woocommerce') );
	}
}
