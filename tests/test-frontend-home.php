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
class FrontendHome extends WP_UnitTestCase {

    public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_home(){

		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Frontend/EO_WBC_Home.php');

		$LoadEO_WBC_Home = new EO_WBC_Home();

		// $this->seePageIs('/product-category/eo_diamond_shape_cat/?EO_WBC=1&BEGIN=eo_diamond_shape_cat&STEP=1');

		//$this->assertRedirect('/product-category/eo_diamond_shape_cat/?EO_WBC=1&BEGIN=eo_diamond_shape_cat&STEP=1');

		ob_end_flush();
		ob_start();
		$eo_wbc_do_shortcode = $LoadEO_WBC_Home->eo_wbc_do_shortcode();
		$res = ob_get_flush();
		$this->assertNotFalse($res);
		$this->assertNotNull($res);

		ob_start();
		$LoadEO_WBC_Home->show_buttons();
		$res = ob_get_flush();
		$this->assertNotFalse($res);
		$this->assertNotNull($res);
		
		
		/*ob_start();
		$LoadEO_WBC_Home->eo_wbc_the_content();
		$res = ob_get_flush();
		$this->assertNotFalse($res);
		$this->assertNotNull($res);*/
		
		$wbc_code = $LoadEO_WBC_Home->eo_wbc_code();
		$this->assertNotFalse($wbc_code);
		$this->assertNotNull($wbc_code);
		
		$buttons_css = $LoadEO_WBC_Home->eo_wbc_buttons_css();
		$this->assertNotFalse($buttons_css);
		$this->assertNotNull($buttons_css);		

		$wbc_buttons = $LoadEO_WBC_Home->eo_wbc_buttons();
		$this->assertNotFalse($wbc_buttons);
		$this->assertNotNull($wbc_buttons);
		
	}

}
