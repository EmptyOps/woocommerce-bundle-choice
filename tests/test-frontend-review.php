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
class FrontendReview extends WP_UnitTestCase {

    public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_review(){

		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Frontend/EO_WBC_Review.php');

		$LoadEO_WBC_Review = new EO_WBC_Review();

		$FIRST = get_page_by_title('Setting #8800950587', OBJECT, 'product' );
		$SECOND = get_page_by_title('Round Diamond #89302496', OBJECT, 'product' );

		if(!is_wp_error($FIRST) and !empty($FIRST))
		{
			if('publish' === get_post_status( $FIRST->ID ))
			{
				$_GET['FIRST'] = $FIRST->ID
			}
		}

		if(!is_wp_error($SECOND) and !empty($SECOND))
		{
			if('publish' === get_post_status( $SECOND->ID ))
			{
				$_GET['SECOND'] = $SECOND->ID
			}
		}		

		$eo_wbc_buttons_css = $LoadEO_WBC_Review->eo_wbc_buttons_css();		
		$this->assertNotEmpty($eo_wbc_buttons_css);
		$this->assertIsString($eo_wbc_buttons_css);


		ob_end_clean();
		ob_start();
		$eo_wbc_render = $LoadEO_WBC_Review->eo_wbc_render();
		$render_string = ob_get_clean();
		$this->assertNotEmpty($render_string);
		$this->assertIsString($render_string);
		
	}

}