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
class AdminConfiguration extends WP_UnitTestCase {

    public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_save_data(){

		require_once(constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_View_Config.php');

		$cats = eo_wbc_admin_config_category_options($slug='');

		update_option('eo_wbc_cats',serialize($cats)); 
		$this->assertIsArray($cats);
		$this->assertNotFalse($cats);
		$this->assertEquals($cats,unserialize(get_option('eo_wbc_cats')));

	}

	public function formData_save(){

		require_once(constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Admin/EO_WBC_Config/EO_WBC_Actions.php');

		$data = $_POST['eo_wbc_inventory_type'] = "jewelry";

		$saveForm = new EO_WBC_Actions();
		$saveForm->config_save();

		$this->assertEquals($data,get_option('eo_wbc_inventory_type'));
	}

}