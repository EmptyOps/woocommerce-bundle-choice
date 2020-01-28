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
		WC()->includes();
		WC()->frontend_includes();
		WC()->include_template_functions();	
		WC()->init();
		WC()->initialize_session();
		WC()->initialize_cart();
		

		/*$this->countries = new WC_Countries();*/
		/*include_once WC_ABSPATH . 'includes/class-wc-session-handler.php';
		WC()->session = new WC_Session_Handler();

		include_once WC_ABSPATH . 'includes/class-wc-cart.php';
		WC()->cart = new WC_Cart();*/
		//Home page
		global $wp_query;
		require_once EO_WBC_PLUGIN_DIR.'/EO_WBC_Frontend/EO_WBC_Home.php';
		$home  = new EO_WBC_Home();
		ob_start();
		$home->show_buttons();
		$home_screen = ob_get_flush();

		$this->assertIsString($home_screen);


		//Category Page
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
		$this->assertEquals(get_option('eo_wbc_first_slug'), $category->eo_wbc_get_category());

		//Product Page

		global $post;
		$post = get_page_by_title('Round Diamond #89302496' , OBJECT, 'product' );

		$_GET['FIRST'] = '';
		$_GET['SECOND'] = '';

		require_once EO_WBC_PLUGIN_DIR.'/EO_WBC_Frontend/EO_WBC_Product.php';		
		$product = new EO_WBC_Product();

		global $_product;
		$set = array();
		include_once WC_ABSPATH . 'includes/wc-template-functions.php';		

		$product_url = $product->eo_wbc_product_route();

		$post = get_page_by_title('Round Diamond #89302496' , OBJECT, 'product' );        
        $variable_product = new WC_Product_Variable($post->ID);        
        $variation_id = $variable_product->get_available_variations()[0]['variation_id'];

        $this->assertEquals( get_permalink($post->ID)
                        .'?EO_WBC=1&BEGIN='.sanitize_text_field($_GET['BEGIN'])
                        .'&STEP=1&FIRST='.$post->ID.'&SECOND='.sanitize_text_field($_GET['SECOND'])."&REDIRECT=1" , $product->eo_wbc_product_route());

        $data = $_product[1]['variation'][0];
        $data['eo_wbc_target'] = get_option('eo_wbc_first_slug');
        $data['eo_wbc_product_id'] = $post->ID;
        $data['quantity'] = 1;
        $data['add-to-cart'] = $post->ID;
        $data['product_id'] = $post->ID;
        $data['variation_id'] = $variation_id;      	

		$cart = base64_encode(json_encode($data));

       	$_GET['FIRST'] = $post->ID;
       	$_GET['STEP'] = 2;
       	$_GET['CART'] = $cart;

       	$sets['FIRST'] = array($post->ID,1,$variation_id);
       	
       	$this->assertNotEmpty( $product->eo_wbc_category_link() );


       	//Second Product load...

       	$post = get_page_by_title('Setting #8800950587' , OBJECT, 'product' );        
        $variable_product = new WC_Product_Variable($post->ID);        
        $variation_id = $variable_product->get_available_variations()[0]['variation_id'];

        $this->assertEquals( get_bloginfo('url').get_option('eo_wbc_review_page')
                    .'?EO_WBC=1&BEGIN='.sanitize_text_field($_GET['BEGIN'])
                    .'&STEP=3&FIRST='.sanitize_text_field($_GET['FIRST']).'&SECOND='.$post->ID , $product->eo_wbc_product_route());

        $data = $_product[0]['variation'][0];
        $data['eo_wbc_target'] = get_option('eo_wbc_second_slug');
        $data['eo_wbc_product_id'] = $post->ID;
        $data['quantity'] = 1;
        $data['add-to-cart'] = $post->ID;
        $data['product_id'] = $post->ID;
        $data['variation_id'] = $variation_id;      	

        $cart = base64_encode(json_encode($data));

       	$_GET['SECOND'] = $post->ID;
       	$_GET['STEP'] = 3;
       	$_GET['CART'] = $cart;

       	$sets['SECOND'] = array($post->ID,1,$variation_id);

       	$this->assertNotEmpty( $product->eo_wbc_category_link() );

       	WC()->session->set('EO_WBC_SETS',$sets);

       	// Load preview page.
       	require_once EO_WBC_PLUGIN_DIR.'/EO_WBC_Frontend/EO_WBC_Review.php';		
		$review = new EO_WBC_Review();

		$_POST['add_to_cart'] = 1;		
		$review->eo_wbc_add_this_to_cart();

		

		$this->assertNotFalse(WC()->session->get('EO_WBC_SETS',false));
		$this->assertNotFalse(WC()->session->get('EO_WBC_MAPS',false));
        
	}

}