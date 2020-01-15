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

		$eo_wbc_jpc_list_categories =  eo_wbc_jpc_list_categories($slug='',$prefix='');

		$this->assertNotNull($eo_wbc_jpc_list_categories);
		$this->assertNotFalse($eo_wbc_jpc_list_categories);

		$eo_wbc_jpc_list_attributes = eo_wbc_jpc_list_attributes();

		$this->assertNotNull($eo_wbc_jpc_list_attributes);
		$this->assertNotFalse($eo_wbc_jpc_list_attributes);

		$eo_wbc_jpc_attributes_values = eo_wbc_jpc_attributes_values();

		update_option('eo_wbc_cats',serialize($eo_wbc_jpc_attributes_values)); 
		$this->assertIsArray($eo_wbc_jpc_attributes_values);
		$this->assertNotFalse($eo_wbc_jpc_attributes_values);
		$this->assertEquals($eo_wbc_jpc_attributes_values,unserialize(get_option('eo_wbc_cats')));


	}

}

?>