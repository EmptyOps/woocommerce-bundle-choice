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
class FrontendBreadcrumb extends WP_UnitTestCase {

    public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function Breadcrumb(){

		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Admin/EO_WBC_Frontend/
			EO_WBC_Breadcrumb.php');

		$BreaadClass = new EO_WBC_Breadcrumb();

		$eo_wbc_add_breadcrumb = $BreaadClass->eo_wbc_add_breadcrumb($step=1,$begin);

		$this->assertNotFalse($eo_wbc_add_breadcrumb);
		$this->assertIsString($eo_wbc_add_breadcrumb);
		$this->assertNotNull($eo_wbc_add_breadcrumb);


		$eo_wbc_breadcumb_first_html = $BreaadClass->eo_wbc_breadcumb_first_html($step,$order);

		$this->assertNotFalse($eo_wbc_breadcumb_first_html);
		$this->assertIsString($eo_wbc_breadcumb_first_html);
		$this->assertNotNull($eo_wbc_breadcumb_first_html);

		$eo_wbc_breadcumb_second_html = $BreaadClass->eo_wbc_breadcumb_second_html($step,$order);

		$this->assertNotFalse($eo_wbc_breadcumb_second_html);
		$this->assertIsString($eo_wbc_breadcumb_second_html);
		$this->assertNotNull($eo_wbc_breadcumb_second_html);

		$eo_wbc_breadcrumb_view_url = $BreaadClass->eo_wbc_breadcrumb_view_url($product_id,$order);

		$this->assertNotFalse($eo_wbc_breadcrumb_view_url);
		$this->assertIsString($eo_wbc_breadcrumb_view_url);
		$this->assertNotNull($eo_wbc_breadcrumb_view_url);

		$eo_wbc_breadcrumb_get_category = $BreaadClass->eo_wbc_breadcrumb_get_category($product_id);

		$this->assertNotFalse($eo_wbc_breadcrumb_get_category);
		$this->assertIsString($eo_wbc_breadcrumb_get_category);
		$this->assertNotNull($eo_wbc_breadcrumb_get_category);
		
	}

}