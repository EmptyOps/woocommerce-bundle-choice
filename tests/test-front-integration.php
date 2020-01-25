<?php
/*
* Boilerplate - DO NOT TOUCH ANY LINES HERE.
* FUTURE : TO BE MOVED TO COMMON FILE.
*/
$wp_tests_dir = getenv( 'WP_TESTS_DIR' ) ? getenv( 'WP_TESTS_DIR' ) : '/tmp/wordpress-tests-lib';
require_once $wp_tests_dir . '/includes/functions.php';
require_once $wp_tests_dir . '/includes/bootstrap.php';
require_once $wp_tests_dir . '/includes/listener-loader.php';

require_once ABSPATH . 'wp-content/plugins/woocommerce/woocommerce.php';
require_once dirname( dirname( __FILE__ ) ) . '/woo-bundle-choice.php';		

activate_plugin('woocommerce/woocommerce.php');
activate_plugin('woocommerce-bundle-choice/woo-bundle-choice.php');		
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////

require_once(constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/library/EO_WBC_CatAt.php');
require_once('data/sample_data.php');

/*
* Backend unit testing.
*/
class TestFronIntegration extends WP_UnitTestCase {

	public function setUp() {
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
        
    }
	
	public function test_automation_status(){
		
		$this->assertTrue(class_exists( 'WooCommerce', false ));
		$this->assertFalse(empty(WC()->product_factory));

		//$this->setUp();

		$this->assertTrue($this->category_status);		
		$this->assertTrue($this->attribute_status);	
		
		$this->assertTrue($this->map_status);
		
		$this->assertTrue($this->product_status);
	}

	public function test_intigration(){

		/*
		*	1.	Begin with button and select diamond
		*	2.	Select A Product
		*	3.	Redirect to Product Page
		*	4.	Add to cart action
		*	5.	Select another product
		*	6.	Preview Page
		*	7.	Check cart
		*/
		global $wp_query;
		require_once EO_WBC_PLUGIN_DIR.'/EO_WBC_Frontend/EO_WBC_Home.php';
		$home  = new EO_WBC_Home();
		ob_start();
		$home->show_buttons();
		$home_screen = ob_get_flush();

		$this->assertIsString($home_screen);


		$wp_query = new WP_Query(array(			
		    'post_type' => 'product',
		    'tax_query' => array(
		        'relation' => 'OR',
		        array(
		            'taxonomy' => 'product_cat',
		            'field'    => 'slug',
		            'terms'    => array( get_option('eo_wbc_first_slug') ),
		        )
		    )
		));

		$wp_query->queried_object = get_term_by( 'slug', get_option('eo_wbc_first_slug'), 'product_cat');
		
		$_GET['EO_WBC'] = 1;
		$_GET['BEGIN'] = get_option('eo_wbc_first_slug');
		$_GET['STEP'] = 1;
		
		require_once EO_WBC_PLUGIN_DIR.'/EO_WBC_Frontend/EO_WBC_Category.php';


		ob_start();
		$category = new EO_WBC_Category();
		$category_screen = ob_get_flush();
		$this->assertIsString($category_screen);

	}

}