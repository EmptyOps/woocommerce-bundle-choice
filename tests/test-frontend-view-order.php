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
class FrontendViewOrder extends WP_UnitTestCase {

    public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_view_order(){

		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Frontend/EO_WBC_View_Order.php');

		/*$LoadEO_WBC_View_Order = new EO_WBC_View_Order();

		$EO_WBC_View_Order = $LoadEO_WBC_View_Order->eo_wbc_render();*/
		

		$get_sets = $LoadEO_WBC_View_Order->get_sets($sets);
		$this->assertNotFalse($get_sets);
		$this->assertNotNull($get_sets);
		

		$get_set = $LoadEO_WBC_View_Order->get_set($set);
		$this->assertNotFalse($get_set);
		$this->assertNotNull($get_set);
		

	}

}