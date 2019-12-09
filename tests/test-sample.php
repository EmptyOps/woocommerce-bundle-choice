<?php
/**
 * Class SampleTest
 *
 * @package Woo_Bundle_Choice
 */

/**
 * Sample test case.
 */
if ( ! file_exists( $_tests_dir . '/includes/functions.php' ) ) {
	echo "Could not find $_tests_dir/includes/functions.php, have you run bin/install-wp-tests.sh ?" . PHP_EOL; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	exit( 1 );
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
