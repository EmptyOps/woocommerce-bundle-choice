<?php
/*
* Boilerplate - DO NOT TOUCH ANY LINES HERE.
* FUTURE : TO BE MOVED TO COMMON FILE.
*/
$wp_tests_dir = getenv( 'WP_TESTS_DIR' ) ? getenv( 'WP_TESTS_DIR' ) : '/tmp/wordpress-tests-lib';
require_once $wp_tests_dir . '/includes/functions.php';
require_once $wp_tests_dir . '/includes/bootstrap.php';
require_once $wp_tests_dir . '/includes/listener-loader.php';

require_once ABSPATH . '/wp-content/plugins/woocommerce/woocommerce.php';
require_once dirname( dirname( __FILE__ ) ) . '/woo-bundle-choice.php';		

activate_plugin('woocommerce/woocommerce.php');
activate_plugin('woocommerce-bundle-choice/woo-bundle-choice.php');		
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////

require_once(constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/library/EO_WBC_CatAt.php');
/*require_once('data/sample_data.php');*/	    

/*$category_status = false;
$attribute_status = false;
$map_status = false;
$product_status = false;*/

/*if ( !function_exists( 'wc_check_if_attribute_name_is_reserved' ) ) { 
    require_once '/includes/wc-attribute-functions.php'; 
} */

/*do_action('plugins_loaded');
do_action('woocommerce_init');*/



/*add_action('plugins_loaded',function() use(&$_product,&$_maps,&$_atttriutes,&$_category,&$_img_url,&$category_status,&$attribute_status,&$map_status,&$product_status){*/

	/**
	 * create table to store orders in a SETS form that are recived from customers
	 */
/*	global $wpdb;
	$eo_wbc_order_map= $wpdb->prefix."eo_wbc_order_maps";
	if($wpdb->get_var( "SHOW TABLES LIKE '$eo_wbc_order_map'" ) != $eo_wbc_order_map)
	{
	    $sql = "CREATE TABLE `$eo_wbc_order_map`( ";
	    $sql .= "  `order_id`  int(11) NOT NULL, ";
	    $sql .= "  `order_map` text NOT NULL, ";
	    $sql .= "  PRIMARY KEY(`order_id`)";
	    $sql .= ") ".$wpdb->get_charset_collate().";";
	    require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
	    dbDelta($sql);
	}*/


/*},0);*/

/*
* Backend unit testing.
*/
class TestFronIntegration extends WP_UnitTestCase {

	public function setUp() {
        /*add_action('plugins_loaded',function(){*/

        	require_once('data/sample_data.php');
        	require_once(constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/library/EO_WBC_CatAt.php');

			$factory_object = new EO_WBC_CatAt();

			$this->category_status =  $factory_object->create_category($_category);
			$this->attribute_status =  $factory_object->create_attribute($_atttriutes);			
			$this->map_status =  $factory_object->add_maps($_maps);				
			$this->product_status =  $factory_object->create_products($_product);
        /*});*/
    }
	
	public function test_automation_status(){
		
		$this->setUp();

		$this->assertTrue($this->category_status);		

		$this->assertTrue($this->attribute_status);	
		
		$this->assertTrue($this->map_status);
		
		$this->assertTrue($this->product_status);
	}

}