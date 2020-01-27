<?php
/*
* Boilerplate - DO NOT TOUCH ANY LINES HERE.
* FUTURE : TO BE MOVED TO COMMON FILE.
*/
$wp_tests_dir = getenv( 'WP_TESTS_DIR' ) ? getenv( 'WP_TESTS_DIR' ) : '/tmp/wordpress-tests-lib';
require_once $wp_tests_dir . '/includes/functions.php';
require_once $wp_tests_dir . '/includes/bootstrap.php';
require_once $wp_tests_dir . '/includes/listener-loader.php';

require_once dirname( dirname( __FILE__ ) ) . '/woo-bundle-choice.php';		

activate_plugin('woocommerce/woocommerce.php');
activate_plugin('woocommerce-bundle-choice/woo-bundle-choice.php');		
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////

/**
* Backend unit testing.
*/
class FrontendCheckout extends WP_UnitTestCase {

    public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_checkout(){

		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Frontend/EO_WBC_Checkout.php');
		
		$LoadEO_WBC_Checkout  = new EO_WBC_Checkout();

		/*$eo_wps_add_js = $LoadEO_WBC_Checkout->eo_wps_add_js();
		$this->assertTrue( has_action( 'wp_enqueue_scripts', 'function()' ) );
		$this->assertTrue( has_action( 'wp_footer', 'function()' ) );
*/
		$eo_wbc_render = $LoadEO_WBC_Checkout->eo_wbc_render();
		$this->assertNotFalse($eo_wbc_render);
		$this->assertNotNull($eo_wbc_render);
		/*$this->assertContainsOnly($eo_wbc_render);*/

		$checkout_rows = $LoadEO_WBC_Checkout->checkout_rows($map);
		$this->assertNotFalse($checkout_rows);
		$this->assertNotNull($checkout_rows);
		/*$this->assertContainsOnly($checkout_rows);*/
	}

}