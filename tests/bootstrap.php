<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Woo_Bundle_Choice
 */

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

/**
 * Manually load the plugin being tested.
 */
function _manually_load_plugin() {
		
	include($_tests_dir.'/factory/class-wp-unittest-factory-for-thing.php');

	include ($_tests_dir.'/factory/class-wp-unittest-factory-for-user.php');
	include($_tests_dir.'/factory/class-wp-unittest-factory-for-post.php');
	include($_tests_dir.'/factory/class-wp-unittest-factory-for-term.php');

	include($_tests_dir.'/factory/class-wp-unittest-factory-for-blog.php');

	include($_tests_dir.'/factory/class-wp-unittest-factory-for-attachment.php');
	include($_tests_dir.'/factory/class-wp-unittest-factory-callback-after-create.php');
	
	include($_tests_dir.'/factory/class-wp-unittest-factory-for-bookmark.php');
	include($_tests_dir.'/factory/class-wp-unittest-factory-for-comment.php');
	include($_tests_dir.'/factory/class-wp-unittest-factory-for-network.php');	
			
	
	include ($_tests_dir.'/factory/class-wp-unittest-generator-sequence.php');
	include ($_tests_dir.'/factory/class-wp-unittest-factory.php');

	activate_plugin('woocommerce/woocommerce.php');


	require dirname( dirname( dirname( __FILE__ ) ) ). '/woocommerce/tests/bootstrap.php';
	require dirname( dirname( __FILE__ ) ) . '/woo-bundle-choice.php';	
}

tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );
