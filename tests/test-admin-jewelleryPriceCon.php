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
class AdminJewelryPriceControl extends WP_UnitTestCase {

    public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_Error(){

		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_View_Head_Banner.php');
		require_once(constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_View_Jewellery_Price_Control.php');

		$testFunc1 =  eo_wbc_jpc_list_categories($slug='',$prefix='');

		$this->assertNotNull($testFunc1);
		$this->assertStringNotContainsString($testFunc1);
		$this->assertNotFalse($testFunc1);

		$testFunc2 = eo_wbc_jpc_list_attributes();

		$this->assertNotNull($testFunc2);
		$this->assertStringNotContainsString($testFunc2);
		$this->assertNotFalse($testFunc2);

		$testFunc3 = eo_wbc_jpc_attributes_values();

		update_option('eo_wbc_cats',serialize($testFunc3)); 
		$this->assertIsArray($testFunc3);
		$this->assertNotFalse($testFunc3);
		$this->assertEquals($testFunc3,unserialize(get_option('eo_wbc_cats')));


	}

}

?>