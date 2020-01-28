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
class FrontendCategory extends WP_UnitTestCase {

    public function test_woocommerce_exists(){		
		$this->assertTrue( class_exists('WooCommerce') );
	}

	public function test_category_data(){

		require_once 'import_data_init.php';
		
		global $post;
		global $wp_query;
		global $factory_object;

		$wp_query->queried_object = term_exists( 'eo_diamond_shape_cat' , 'product_cat' );
		if (empty($wp_query->queried_object) or is_wp_error($wp_query->queried_object)) {
						
			global $_category;
			global $_atttriutes;
			global $_maps;
			global $_product;
			global $_img_url;

			global $wp_query;
			global $post;

			$factory_object = new EO_WBC_CatAt();

			$factory_object->create_category($_category);
			$factory_object->create_attribute($_atttriutes);			
			$factory_object->add_maps($_maps);							
			$wp_query->queried_object = get_term_by( 'slug', 'eo_diamond_shape_cat' , 'product_cat');

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

			$wp_query->queried_object = get_term_by( 'slug', get_option('eo_wbc_first_slug'), 'product_cat');

			$post = get_page_by_title('Round Diamond #89302496' , OBJECT, 'product' );        
			$variable_product = new WC_Product_Variable($post->ID);        
			$variation_id = $variable_product->get_available_variations()[0]['variation_id'];

				$sets['FIRST'] = array($post->ID,1,$variation_id);
				
				$_GET['EO_WBC'] = 1;
				$_GET['BEGIN'] = get_option('eo_wbc_first_slug');
				$_GET['STEP'] = 1;
				

				$data = $_product[1]['variation'][0];
			    $data['eo_wbc_target'] = get_option('eo_wbc_first_slug');
			    $data['eo_wbc_product_id'] = $post->ID;
			    $data['quantity'] = 1;
			    $data['add-to-cart'] = $post->ID;
			    $data['product_id'] = $post->ID;
			    $data['variation_id'] = $variation_id;      	

				$cart = base64_encode(json_encode($data));

				$_GET['CART'] = $cart;

				$post = get_page_by_title('Setting #8800950587' , OBJECT, 'product' );        
			$variable_product = new WC_Product_Variable($post->ID);        
			$variation_id = $variable_product->get_available_variations()[0]['variation_id'];

				$sets['SECOND'] = array($post->ID,1,$variation_id);

				WC()->session->set('EO_WBC_SETS',$sets);
		}

		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Admin/EO_WBC_Support.php');
		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Frontend/EO_WBC_Breadcrumb.php');
		require_once(constant('EO_WBC_PLUGIN_DIR'). 'EO_WBC_Frontend/EO_WBC_Category.php');		

		$LoadEO_WBC_Category = new EO_WBC_Category();

		$eo_wbc_add_to_cart_link = $LoadEO_WBC_Category->eo_wbc_add_to_cart_link();
		$this->assertNotFalse($eo_wbc_add_to_cart_link);
		$this->assertNotNull($eo_wbc_add_to_cart_link);
				
		$eo_wbc_prev_url = $LoadEO_WBC_Category->eo_wbc_prev_url();
		$this->assertNotFalse($eo_wbc_prev_url);
		$this->assertNotNull($eo_wbc_prev_url);

		$eo_wbc_product_url = $LoadEO_WBC_Category->eo_wbc_product_url(get_permalink($post->ID));
		$this->assertNotFalse($eo_wbc_product_url);
		$this->assertNotNull($eo_wbc_product_url);		
		
		$eo_wbc_get_category = $LoadEO_WBC_Category->eo_wbc_get_category();
		$this->assertNotFalse($eo_wbc_get_category);
		$this->assertNotNull($eo_wbc_get_category);
	}

}