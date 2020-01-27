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
		
			include_once WC_ABSPATH . 'includes/class-wc-product-factory.php';		
			WC()->product_factory = new WC_Product_Factory();

        	global $_category;
        	global $_atttriutes;
        	global $_maps;
        	global $_product;
        	global $_img_url;

        	do_action('woocommerce_init');   	
        	
        	require_once(constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/library/EO_WBC_CatAt.php');

			$factory_object = new EO_WBC_CatAt();

			$this->category_status =  !empty($factory_object->create_category($_category));
			$this->attribute_status =  !empty($factory_object->create_attribute($_atttriutes));			
			$this->map_status =  !empty($factory_object->add_maps($_maps));				
			$this->product_status =  !empty($factory_object->create_products($_product));

			update_option('eo_wbc_first_name','Diamond Shape');//FIRST : NAME
            update_option('eo_wbc_first_slug','eo_diamond_shape_cat');//FIRST : SLUG
            update_option('eo_wbc_first_url','/product-category/eo_diamond_shape_cat/');//FIRST : NAME
            
            update_option('eo_wbc_second_name','Setting Shape');//SECOND : NAME
            update_option('eo_wbc_second_slug','eo_setting_shape_cat');//SECOND : SLUG
            update_option('eo_wbc_second_url','/product-category/eo_setting_shape_cat/');//SECOND : URL   

            update_option('eo_wbc_config_category',1);
            update_option('eo_wbc_config_map',1);    
            update_option('eo_wbc_btn_setting','0');
            update_option('eo_wbc_btn_position','begining');

            $this->assertTrue(class_exists( 'WooCommerce', false ));
			$this->assertFalse(empty(WC()->product_factory));

			//$this->setUp();

			$this->assertTrue($this->category_status);		
			$this->assertTrue($this->attribute_status);	
			
			$this->assertTrue($this->map_status);
			
			$this->assertTrue($this->product_status);
	}
	
}
