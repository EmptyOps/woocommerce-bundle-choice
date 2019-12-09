<?php
/**
 * Class SampleTest
 *
 * @package Woo_Bundle_Choice
 */

/**
 * Sample test case.
 */
$wp_tests_dir = '/home/travis/build/EmptyOps/wptest/tests/';

include ($wp_tests_dir.'phpunit/includes/abstract-testcase.php');
include ($wp_tests_dir.'phpunit/includes/testcase.php');	

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
