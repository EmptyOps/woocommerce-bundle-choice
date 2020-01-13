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
class FrontendProduct extends WP_UnitTestCase {

    public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_product_data(){

		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Admin/Eo_WBC_Config/EO_WBC_View/library/EO_WBC_CatAt.php');
		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Admin/EO_WBC_Support.php');
		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Frontend/EO_WBC_Product.php');


		$LoadEO_WBC_Product = new EO_WBC_Product();

		$EO_WBC_CatAt = new EO_WBC_CatAt();
		$create_products = $EO_WBC_CatAt->create_products($args);

		$p = null;
		if(!empty())
		{
			$old_product = get_page_by_title('Setting #8800950587', OBJECT, 'product' );
			if(!is_wp_error($old_product) and !empty($old_product))
			{
				if('publish' === get_post_status( $old_product->ID ))
				{
					$p = wc_get_product($old_product->ID);
				}
			}
		}

		global $post = $p;

		$eo_wbc_category_link = $LoadEO_WBC_Product->eo_wbc_category_link($variable_status=FALSE);
		$this->assertNotFalse($eo_wbc_category_link);
		$this->assertNotNull($eo_wbc_category_link);
		$this->assertContainsOnly($eo_wbc_category_link);


		$make_pair_route = $LoadEO_WBC_Product->eo_wbc_make_pair_route();
		$this->assertNotFalse($make_pair_route);
		$this->assertNotNull($make_pair_route);
		$this->assertContainsOnly($make_pair_route);

		$make_pair = $LoadEO_WBC_Product->eo_wbc_make_pair();
		$this->assertTrue( has_action( 'wp_enqueue_scripts', 'function()' ) );
		$this->assertTrue( has_action( 'woocommerce_after_add_to_cart_button','function()' ) );
		$this->assertTrue( has_action( 'wp_head','function()' ) );
		$this->assertTrue( has_action( 'wp_footer','function()' ) );

		$wbc_config = $LoadEO_WBC_Product->eo_wbc_config();
		$this->assertTrue( has_filter( 'woocommerce_product_single_add_to_cart_text','function()' ) );
		
		$add_breadcrumb = $LoadEO_WBC_Product->eo_wbc_add_breadcrumb();
		$this->assertTrue( has_action( 'woocommerce_before_single_product','function()' ) );

		$eo_wbc_render = $LoadEO_WBC_Product->eo_wbc_render();
		$this->assertTrue( has_action( 'wp_enqueue_scripts','function()' ) );
		$this->assertTrue( has_action( 'wp_footer','function()' ) );

		$product_route = $LoadEO_WBC_Product->eo_wbc_product_route();
		$this->assertNotNull($product_route);
		$this->assertNotFalse($product_route);
		$this->assertContainsOnly($product_route);

		$sub_categories =$LoadEO_WBC_Product->eo_wbc_sub_categories($slug);
		update_option('eo_wbc_cats',serialize($sub_categories)); 
		$this->assertIsArray($sub_categories);
		$this->assertNotFalse($sub_categories);
		$this->assertEquals($sub_categories,unserialize(get_option('eo_wbc_cats')));

		$get_category = $LoadEO_WBC_Product->eo_wbc_get_category();
		$this->assertNotFalse($get_category);
		$this->assertNotNull($get_category);
		$this->assertContainsOnly($get_category);


	}

}