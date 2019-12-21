<?php
$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $_tests_dir ) {
	$_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}
require_once $_tests_dir . '/includes/functions.php';
activate_plugin('woocommerce/woocommerce.php');
error_log(get_option('site_url').PHP_EOL);

class InitTest extends WP_UnitTestCase {

	public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_automatic_install(){
		
		require_once(EO_WBC_PLUGIN_DIR.'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/library/EO_WBC_CatAt.php');
		require_once('data/sample_data.php');

		$index=0;
		$category=array();
	    while(!empty($_POST['cat_value_'.$index])){
	      	if(!empty($_POST['cat_'.$index])){
	        	$_category[$index]['name']=$_POST['cat_value_'.$index];
	          	$category[]=$_category[$index];
	        }
	        $index++;
	    }      

	    $index=0;
	    $attributes=array();
	    while(!empty($_POST['attr_value_'.$index])){
	        if(!empty($_POST['attr_'.$index])){
	          	$_atttriutes[$index]['name']=$_POST['attr_value_'.$index];
	          	$attributes[]=$_atttriutes[$index]; 
	        }
	        $index++;
	    }

		$catat=new EO_WBC_CatAt();		
		update_option('eo_wbc_cats',serialize($catat->create_category($category)));
		$this->assertNotEmpty(get_option('eo_wbc_cats'));
		$this->assertIsArray(unserialize(get_option('eo_wbc_cats')));

		
	}
}
