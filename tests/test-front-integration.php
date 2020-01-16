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

require_once(constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/library/EO_WBC_CatAt.php');
require_once('data/sample_data.php');	    

/**
* Backend unit testing.
*/
class AdminAppearance extends WP_UnitTestCase {
	function __construct(){
		$this->init();
	}

	function index(){
		$this->init();
	}

	function init(){
		global $_product;
		global $_maps;
		global $_atttriutes;
		global $_category;
    	global $_img_url;

    	$this->product = $_product;
    	$this->maps = $_maps;
    	$this->atttriutes = $_atttriutes;
    	$this->category = $_category;
    	$this->img_url = $_img_url;
    	
		/**
		 * create table to store orders in a SETS form that are recived from customers
		 */
		global $wpdb;
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
		}

		/**
		 * create table to store maps between product that is created by admin
		 */
		$eo_wbc_cat_map= $wpdb->prefix."eo_wbc_cat_maps";
		if($wpdb->get_var( "show tables like '$eo_wbc_cat_map'" ) != $eo_wbc_cat_map)
		{
		    $sql='';
		    $sql = "CREATE TABLE `$eo_wbc_cat_map` ( ";
		    $sql .= " `first_cat_id` VARCHAR(125) NOT NULL , `second_cat_id` VARCHAR(125) NOT NULL, `discount` VARCHAR(20) not null DEFAULT '0%', PRIMARY KEY (`first_cat_id`, `second_cat_id`)";
		    $sql .= ") ".$wpdb->get_charset_collate().";";                        
		    require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
		    dbDelta($sql);            
		}

		require_once(constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/library/EO_WBC_CatAt.php');

		$factory_object = new EO_WBC_CatAt();

		$this->category_status =  $factory_object->create_category($this->category);
		$this->attribute_status =  $factory_object->create_attribute($this->atttriutes);

		$this->map_status =  $factory_object->add_maps($this->maps);

		$this->product_status =  $factory_object->create_products($this->product);
	}

	public function test_automation_status(){
		//Check if automation was successfull;

		$this->assertNotFalse($this->category_status);
		$this->assertIsArray($this->category_status);

		$this->assertNotFalse($this->attribute_status);
		$this->assertIsArray($this->attribute_status);

		$this->assertTrue($this->map_status);
		
		$this->assertTrue($this->product_status);
	}

}