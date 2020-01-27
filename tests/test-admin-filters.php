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
class AdminFilters extends WP_UnitTestCase {

    public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_filters(){

		$GLOBALS['hook_suffix'] = isset($GLOBALS['hook_suffix']) ? $GLOBALS['hook_suffix'] : "";
		
		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_View_Head_Banner.php');
		require_once(constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_First_Filter_Table.php');
		require_once(constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Second_Filter_Table.php');
		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_View_Filter.php');

		$FirstFilterTable = new EO_WBC_First_Filter_Table();
		$SecondFilterTable = new EO_WBC_Second_Filter_Table();

		$PrimeCat = eo_wbc_prime_category_($slug='',$prefix='');

		$this->assertNotFalse($PrimeCat);
		$this->assertNotNull($PrimeCat);
		$this->assertIsString($PrimeCat);

		$Attributes = eo_wbc_attributes_();

		$this->assertNotFalse($Attributes);
		$this->assertNotNull($Attributes);
		$this->assertIsString($Attributes);

	}
}