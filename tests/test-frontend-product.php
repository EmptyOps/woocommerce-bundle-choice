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

require_once 'db-setup.php';



activate_plugin('woocommerce/woocommerce.php');
activate_plugin('woocommerce-bundle-choice/woo-bundle-choice.php');		
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
require_once 'data/sample_data.php';

/**
* Backend unit testing.
*/
class FrontendProduct extends WP_UnitTestCase {

    public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_product_data(){

		require_once 'import_data_init.php';
		global $post;
		global $_product;

		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/library/EO_WBC_CatAt.php');
		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Admin/EO_WBC_Support.php');
		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Frontend/EO_WBC_Product.php');


		include_once WC_ABSPATH . 'includes/class-wc-product-factory.php';		
		WC()->product_factory = new WC_Product_Factory();
		do_action('woocommerce_init');

		$EO_WBC_CatAt = new EO_WBC_CatAt();
		
		$create_products = $EO_WBC_CatAt->create_products($_product);

		$p = null;
		$old_product = get_page_by_title('Setting #8800950587', OBJECT, 'product' );
		if(!is_wp_error($old_product) and !empty($old_product))
		{
			if('publish' === get_post_status( $old_product->ID ))
			{
				$p = wc_get_product($old_product->ID);
			}
		}
		
		$post = $p;

		$_GET['STEP'] = 1;
		$_GET['FIRST'] = '';
		$_GET['SECOND'] = '';
		$_GET['BEGIN'] = get_option('eo_wbc_first_slug');
		
		global $wp_query;

		$wp_query->queried_object = get_term_by( 'slug', get_option('eo_wbc_first_slug'), 'product_cat');

		$LoadEO_WBC_Product = new EO_WBC_Product();

		$eo_wbc_category_link = $LoadEO_WBC_Product->eo_wbc_category_link($variable_status=FALSE);
		$this->assertNotFalse($eo_wbc_category_link);
		$this->assertNotNull($eo_wbc_category_link);
		


		$make_pair_route = $LoadEO_WBC_Product->eo_wbc_make_pair_route();
		$this->assertNotFalse($make_pair_route);
		$this->assertNotNull($make_pair_route);
		

		$make_pair = $LoadEO_WBC_Product->eo_wbc_make_pair();
		
		$wbc_config = $LoadEO_WBC_Product->eo_wbc_config();
		
		
		$add_breadcrumb = $LoadEO_WBC_Product->eo_wbc_add_breadcrumb();
		

		$eo_wbc_render = $LoadEO_WBC_Product->eo_wbc_render();
		
		$product_route = $LoadEO_WBC_Product->eo_wbc_product_route();
		$this->assertNotNull($product_route);
		$this->assertNotFalse($product_route);		

		$sub_categories =$LoadEO_WBC_Product->eo_wbc_sub_categories(get_option('eo_wbc_first_slug'));		
		$this->assertIsArray($sub_categories);
		$this->assertNotFalse($sub_categories);		

		$get_category = $LoadEO_WBC_Product->eo_wbc_get_category();
		$this->assertNotFalse($get_category);
		$this->assertNotNull($get_category);
		$this->assertIsString($get_category);
	}

}