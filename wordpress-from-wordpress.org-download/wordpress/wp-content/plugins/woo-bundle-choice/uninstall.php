<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 */
 
// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

function uninstall_woocommerce_bundle_choice_plugin() {
	require_once ( plugin_dir_path( __FILE__ ) . 'application/woocommerce-bundle-choice-bootstrap.php' );
	WooCommerce_Bundle_Choice_Bootstrap::uninstall_plugin();
}

uninstall_woocommerce_bundle_choice_plugin();