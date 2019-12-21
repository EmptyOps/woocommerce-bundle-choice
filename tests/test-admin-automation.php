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
class AdminAutomation extends WP_UnitTestCase {

	public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_automatic_install(){
		
		require_once(constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/library/EO_WBC_CatAt.php');
		require_once('data/sample_data.php');	    

		$catat=new EO_WBC_CatAt();		
		$category_result=$catat->create_category($_category);
		update_option('eo_wbc_cats',serialize($category_result));
		$this->assertNotFalse($category_result);
		$this->assertIsArray($category_result);
		$this->assertEquals($category_result,unserialize(get_option('eo_wbc_cats')));
	}
}
