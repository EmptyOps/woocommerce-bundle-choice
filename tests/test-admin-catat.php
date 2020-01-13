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
class AdminCatAt extends WP_UnitTestCase {

    public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_catat(){

		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Admin/EO_WBC_Support.php');
		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/library/EO_WBC_CatAt.php');

		$LoadEO_WBC_CatAt = new EO_WBC_CatAt();

		$create_category = $LoadEO_WBC_CatAt->create_category($args);
		update_option('eo_wbc_cats',serialize($create_category)); 
		$this->assertIsArray($create_category);
		$this->assertNotFalse($create_category);
		$this->assertEquals($create_category,unserialize(get_option('eo_wbc_cats')));

		$create_product = $LoadEO_WBC_CatAt->create_products($LoadEO_WBC_CatAt->product);

		$create_attribute = $LoadEO_WBC_CatAt->create_attribute( $args );
		update_option('eo_wbc_cats',serialize($create_attribute));
		$this->assertIsArray($create_attribute);
		$this->assertNotFalse($create_attribute);
		$this->assertEquals($create_attribute,unserialize(get_option('eo_wbc_cats')));



	}

}