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

		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_View_Head_Banner.php');
		require_once(constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_List_Table.php');
		require_once(constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_View_Config.php');

		$cats = eo_wbc_admin_config_category_options($slug='');

		update_option('eo_wbc_cats',serialize($cats)); 
		$this->assertIsArray($cats);
		$this->assertNotFalse($cats);
		$this->assertEquals($cats,unserialize(get_option('eo_wbc_cats')));

	}

	public function formData_save(){

		require_once(constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Admin/EO_WBC_Config/EO_WBC_Actions.php');

		$inventory_type  = $_POST['eo_wbc_inventory_type'] = 'jewelry';
		$first_name = $_POST['eo_wbc_first_name'] = 'Diamond';
		$first_slug = $_POST['eo_wbc_first_slug'] = 'eo_diamond_sahpe_cat';
		$second_name = $_POST['eo_wbc_second_name'] = 'Setting';
		$second_slug = $_POST['eo_wbc_second_slug'] = 'eo_setting_shape_cat';
		$collection_title = $_POST['eo_wbc_collection_title'] = 'Ring';
		$btn_setting = $_POST['eo_wbc_btn_setting'] = '1';
		$btn_position = $_POST['eo_wbc_btn_position' = 'begining';
		$filter_enable = $_POST['eo_wbc_filter_enable'] = '1';
		$first_url = $_POST['eo_wbc_first_url'] = '/product-category/eo_diamond_shape_cat/';
		$second_url = $_POST['eo_wbc_second_url'] = '/product-category/eo_setting_shape_cat/';
		$_POST['_wpnonce'] = wp_create_nonce('eo_wbc_nonce_config');
		$_POST['eo_wbc_action'] ='eo_wbc_save_config';


		$saveForm = new EO_WBC_Actions();

		$this->assertEquals($inventory_type, get_option('eo_wbc_inventory_type'));
		$this->assertEquals($first_name,get_option('eo_wbc_first_name'));
		$this->assertEquals($first_slug,get_option('eo_wbc_first_slug'));
		$this->assertEquals($second_name,get_option('eo_wbc_second_name'));
		$this->assertEquals($second_slug,get_option('eo_wbc_second_slug'));
		$this->assertEquals($collection_title,get_option('eo_wbc_collection_title'));
		$this->assertEquals($btn_setting,get_option('eo_wbc_btn_setting'));
		$this->assertEquals($btn_position,get_option('eo_wbc_btn_position'));
		$this->assertEquals($first_url,get_option('eo_wbc_first_url'));
		$this->assertEquals($second_url,get_option('eo_wbc_second_url'));
		$this->assertEquals($filter_enable,get_option('eo_wbc_filter_enable'));

	}

}