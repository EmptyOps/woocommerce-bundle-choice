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
class FrontendFilterWidget extends WP_UnitTestCase {

    public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_filter_widget(){

		global $wp_query;

		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Frontend/EO_WBC_Filter_Widget.php');

		$wp_query->queried_object = get_term_by( 'slug', get_option('eo_wbc_first_slug'), 'product_cat');

		$LoadEO_WBC_Filter_Widget = new EO_WBC_Filter_Widget();

		$isEmptyArr = $LoadEO_WBC_Filter_Widget->isEmptyArr( $arr );
		$this->assertIsBool($isEmptyArr);

		$product_url = $LoadEO_WBC_Filter_Widget->product_url();
		$this->assertNotFalse($product_url);
		$this->assertNotNull($product_url);
		$this->assertContainsOnly($product_url);

		$range_min_max = $LoadEO_WBC_Filter_Widget->range_min_max($id,$title='',$filter_type=0);
		update_option('eo_wbc_cats',serialize($range_min_max)); 
		$this->assertIsArray($range_min_max);
		$this->assertNotFalse($range_min_max);
		$this->assertEquals($range_min_max,unserialize(get_option('eo_wbc_cats')));

		$range_steps = $LoadEO_WBC_Filter_Widget->range_steps($id,$title='',$filter_type=0);
		update_option('eo_wbc_cats',serialize($range_steps)); 
		$this->assertIsArray($range_steps);
		$this->assertNotFalse($range_steps);
		$this->assertEquals($range_steps,unserialize(get_option('eo_wbc_cats')));

		$id ='34683';
		$eo_wbc_id_2_slug = $LoadEO_WBC_Filter_Widget->eo_wbc_id_2_slug($id);
		$this->assertIsBool($eo_wbc_id_2_slug);

		$eo_wbc_get_category = $LoadEO_WBC_Filter_Widget->eo_wbc_get_category();
		$this->assertNotFalse($eo_wbc_get_category);
		$this->assertNotNull($eo_wbc_get_category);
		$this->assertContainsOnly($eo_wbc_get_category);

		$get_filtered_price = $LoadEO_WBC_Filter_Widget->get_filtered_price();
		$this->assertNotFalse($get_filtered_price);
		$this->assertNotNull($get_filtered_price);
		$this->assertContainsOnly($get_filtered_price);

	}

}