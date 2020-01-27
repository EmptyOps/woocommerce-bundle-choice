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
    
WC()->includes();
WC()->frontend_includes();
WC()->include_template_functions();	
WC()->init();
WC()->initialize_session();
WC()->initialize_cart();

$wp_query->queried_object = get_term_by( 'slug', get_option('eo_wbc_first_slug'), 'product_cat');

$post = get_page_by_title('Round Diamond #89302496' , OBJECT, 'product' );        
$variable_product = new WC_Product_Variable($post->ID);        
$variation_id = $variable_product->get_available_variations()[0]['variation_id'];

	$sets['FIRST'] = array($post->ID,1,$variation_id);
	
	$post = get_page_by_title('Setting #8800950587' , OBJECT, 'product' );        
$variable_product = new WC_Product_Variable($post->ID);        
$variation_id = $variable_product->get_available_variations()[0]['variation_id'];

	$sets['SECOND'] = array($post->ID,1,$variation_id);

	WC()->session->set('EO_WBC_SETS',$sets);

$this->assertNotFalse(WC()->session->get('EO_WBC_SETS',false));
$this->assertNotFalse(WC()->session->get('EO_WBC_MAPS',false));
