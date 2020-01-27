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
class FrontendCart extends WP_UnitTestCase {

    public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_cart_data(){

		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Frontend/EO_WBC_Cart.php');

		$LoadEO_WBC_Cart = new EO_WBC_Cart();

		$eo_wbc_add_css = $LoadEO_WBC_Cart->eo_wbc_add_css();
		$this->assertTrue( has_action('wp_enqueue_scripts','function()' ));

		$LoadEO_WBC_Cart->eo_wbc_render();
		$this->assertTrue( has_action('woocommerce_before_cart_contents', 'function ()' ));

		$eo_wbc_cart_service = $LoadEO_WBC_Cart->eo_wbc_cart_service();
		update_option('eo_wbc_cats',$eo_wbc_cart_service);
		$this->assertIsArray($eo_wbc_cart_service);
		$this->assertNotFalse($eo_wbc_cart_service);
		$this->assertEquals($eo_wbc_cart_service,unserialize(get_option('eo_wbc_cats')));

	}

}