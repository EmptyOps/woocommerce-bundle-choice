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
class AdminAppearance extends WP_UnitTestCase {

    public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_save_Appearancedata(){

		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_View_Head_Banner.php');
		require_once(constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_List_Table.php');
		require_once(constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Admin/EO_WBC_Config/EO_WBC_Actions.php');
		require_once(constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_View_Personalize.php');


		$Testdata1 = $_POST['eo_wbc_home_btn_tagline'] = 'Hello World';
		$Testdata2 = $_POST['eo_wbc_home_default_button'] = '1';
		$data2 = $_POST['eo_wbc_action'] = 'eo_wbc_personalize';
		$data3 = $_POST['_wpnonce'] = 'eo_wbc_personalize';
		$SaveForm = new EO_WBC_Actions();

		$this->assertEquals($Testdata1,get_option('eo_wbc_home_btn_tagline'));
		$this->assertEquals($Testdata2,get_option('eo_wbc_home_default_button'));
	}

}