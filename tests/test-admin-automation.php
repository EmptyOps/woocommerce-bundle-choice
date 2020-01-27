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
require_once('data/sample_data.php');

activate_plugin('woocommerce/woocommerce.php');
activate_plugin('woocommerce-bundle-choice/woo-bundle-choice.php');	

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////

/**
* Backend unit testing.
*/
class AdminAutomation extends WP_UnitTestCase {

	public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_automatic_install(){
		
		global $_category;
    	global $_atttriutes;
    	global $_maps;
    	global $_product;
    	global $_img_url;

		require_once(constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/library/EO_WBC_CatAt.php');
			    

		$catat=new EO_WBC_CatAt();		
		$category_result=$catat->create_category($_category);
		update_option('eo_wbc_cats',serialize($category_result));
		$this->assertNotFalse($category_result);
		$this->assertIsArray($category_result);
		$this->assertEquals($category_result,unserialize(get_option('eo_wbc_cats')));

		$attribute_result = $catat->create_attribute($_atttriutes);
		update_option('eo_wbc_cats',serialize($attribute_result));
		$this->assertNotFalse($attribute_result);
		$this->assertIsArray($attribute_result);
		$this->assertEquals($attribute_result,unserialize(get_option('eo_wbc_cats')));

		$catat->add_maps($_maps);		
		$this->assertNotFalse(get_option('eo_wbc_config_map',false));		

		$carat= new EO_WBC_CatAt();
		$carat->create_products($carat->product);

		if(!empty($carat->product)){

			$first_product_name = $carat->product[0]['title'];
			$last_product_name = $carat->product[count($carat->product)-1]['title'];

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
