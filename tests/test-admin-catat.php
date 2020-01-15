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

		require_once(constant('EO_WBC_PLUGIN_DIR').'tests/data/sample_data.php');

		$LoadEO_WBC_CatAt = new EO_WBC_CatAt();

		$create_category = $LoadEO_WBC_CatAt->create_category($_category);		
		$this->assertIsArray($create_category);
		$this->assertNotFalse($create_category);				

		$create_attribute = $LoadEO_WBC_CatAt->create_attribute($_atttriutes);		
		$this->assertIsArray($create_attribute);
		$this->assertNotFalse($create_attribute);		

		$create_product = $LoadEO_WBC_CatAt->create_products($LoadEO_WBC_CatAt->product);

		if(!empty($LoadEO_WBC_CatAt->product)){

			$first_product_name = $LoadEO_WBC_CatAt->product[0]['title'];
			$last_product_name = $LoadEO_WBC_CatAt->product[count($LoadEO_WBC_CatAt->product)-1]['title'];

			$this->assertTrue($this->product_exists($first_product_name));
			$this->assertTrue($this->product_exists($last_product_name));
		}
	}

	public function product_exists($name=''){
		if(!empty($name)){
			$product = get_page_by_title( $name, OBJECT, 'product' );

			if(!is_wp_error($product) and !empty($product)){
				if('publish' === get_post_status( $product->ID )){
					return true;
				}					
			}
		}
	}

}