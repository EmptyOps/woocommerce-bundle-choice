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
class FrontendCategory extends WP_UnitTestCase {

    public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_category_data(){

		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Admin/EO_WBC_Support.php');
		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Frontend/EO_WBC_Breadcrumb.php');
		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Frontend/EO_WBC_Category.php');

		global $wp_query;
		
		$wp_query->queried_object = get_term_by( 'slug', get_option('eo_wbc_first_slug'), 'product_cat');

		$LoadEO_WBC_Category = new EO_WBC_Category();

		$eo_wbc_add_to_cart_link = $LoadEO_WBC_Category->eo_wbc_add_to_cart_link();
		$this->assertNotFalse($eo_wbc_add_to_cart_link);
		$this->assertNotNull($eo_wbc_add_to_cart_link);
		$this->assertContainsOnly($eo_wbc_add_to_cart_link);

		$LoadEO_WBC_Category->eo_wbc_add_filters();
		$this->assertTrue( hsa_action('woocommerce_before_shop_loop','function()'));

		$LoadEO_WBC_Breadcrumb = new EO_WBC_Breadcrumb();
		$LoadEO_WBC_Category->eo_wbc_add_breadcrumb();
		$this->assertTrue( hsa_action('woocommerce_before_shop_loop','function()'));

		$eo_wbc_render = $LoadEO_WBC_Category->eo_wbc_render();
		$this->assertTrue( has_action( 'wp_enqueue_scripts', 'function()') );
		$this->assertTrue( has_action( 'wp_head', 'fucntion()') );
		$this->assertTrue( has_action( 'wp_footer', 'fucntion()') );
		$this->assertTrue( has_action( 'woocommerce_no_products_found', 'fucntion()') );

		$eo_wbc_prev_url = $LoadEO_WBC_Category->eo_wbc_prev_url();
		$this->assertNotFalse($eo_wbc_prev_url);
		$this->assertNotNull($eo_wbc_prev_url);
		$this->assertContainsOnly($eo_wbc_prev_url);

		$eo_wbc_product_url = $LoadEO_WBC_Category->eo_wbc_product_url($url);
		$this->assertNotFalse($eo_wbc_product_url);
		$this->assertNotNull($eo_wbc_product_url);
		$this->assertContainsOnly($eo_wbc_product_url);

		$id = '20999';

		$eo_wbc_id_2_slug = $LoadEO_WBC_Category->eo_wbc_id_2_slug($id);
		$this->assertIsBool($eo_wbc_id_2_slug);

		$eo_wbc_get_category = $LoadEO_WBC_Category->eo_wbc_get_category();
		$this->assertNotFalse($eo_wbc_get_category);
		$this->assertNotNull($eo_wbc_get_category);
		$this->assertContainsOnly($eo_wbc_get_category);

	}

}