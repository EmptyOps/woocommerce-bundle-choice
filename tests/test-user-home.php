<?php
/*
* Boilerplate - DO NOT TOUCH ANY LINES HERE.
* FUTURE : TO BE MOVED TO COMMON FILE.
*/
$wp_tests_dir = getenv( 'WP_TESTS_DIR' ) ? getenv( 'WP_TESTS_DIR' ) : '/tmp/wordpress-tests-lib';
require_once $wp_tests_dir . '/includes/functions.php';
require_once $wp_tests_dir . '/includes/bootstrap.php';
require_once $wp_tests_dir . '/includes/listener-loader.php';

$plugin_dir = dirname( dirname( __FILE__ ) );

require_once $plugin_dir . '/woo-bundle-choice.php';		

activate_plugin('woocommerce/woocommerce.php');
activate_plugin('woocommerce-bundle-choice/woo-bundle-choice.php');		
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////

/**
* Backend unit testing.
*/
class UserHome extends WP_UnitTestCase {

	public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_button_css(){
		require_once constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Frontend/EO_WBC_Home.php';
		$this->assertTrue(class_exists('EO_WBC_Home'));		

		$home = new EO_WBC_Home();
		$this->assertIsString($home->show_buttons());
		$this->assertNotEmpty($home->show_buttons());
	}
}
