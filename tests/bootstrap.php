<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Woo_Bundle_Choice
 */
require_once(getenv( 'HOME' ) .'/.composer/vendor/autoload.php');

$_tests_dir = getenv( 'WP_TESTS_DIR' );

if ( ! $_tests_dir ) {
	$_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}

if ( ! file_exists( $_tests_dir . '/includes/functions.php' ) ) {
	echo "Could not find $_tests_dir/includes/functions.php, have you run bin/install-wp-tests.sh ?" . PHP_EOL; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	exit( 1 );
}

// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';
require_once $_tests_dir . '/includes/bootstrap.php';
require_once $_tests_dir . '/includes/listener-loader.php';
/**
 * Manually load the plugin being tested.
 */
function _manually_load_plugin() {

	//Include all files from WP tests library.
	//$include_path='/home/travis/build/EmptyOps/wptest/tests/phpunit/includes/';

	//activate_plugin('woocommerce/woocommerce.php');

	//require dirname( dirname( dirname( __FILE__ ) ) ). '/woocommerce/tests/bootstrap.php';
	require dirname( dirname( __FILE__ ) ) . '/woo-bundle-choice.php';	
}

tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );
