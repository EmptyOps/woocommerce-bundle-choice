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
class AdminFirstFilterTable extends WP_UnitTestCase {

    public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_first_filter_table(){

		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_First_Filter_Table.php');

		$LoadEO_WBC_First_Filter_Table = new EO_WBC_First_Filter_Table();

		$get_filters = $LoadEO_WBC_First_Filter_Table->get_filters();		
		$this->assertIsArray($get_filters);
		$this->assertNotFalse($get_filters);		

		$column_cb = $LoadEO_WBC_First_Filter_Table->column_cb($item);
		$this->assertNotFalse($column_cb);
		$this->assertNotNull($column_cb);
		$this->assertIsString($column_cb);

		$get_columns = $LoadEO_WBC_First_Filter_Table->get_columns();
		
		$this->assertIsArray($get_columns);
		$this->assertNotFalse($get_columns);
		
		$get_bulk_actions = $LoadEO_WBC_First_Filter_Table->get_bulk_actions();
		
		$this->assertIsArray($get_bulk_actions);
		$this->assertNotFalse($get_bulk_actions);
		

	}

}