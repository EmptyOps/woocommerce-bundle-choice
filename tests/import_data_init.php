<?php

require_once(constant('EO_WBC_PLUGIN_DIR').'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/library/EO_WBC_CatAt.php');
require_once('data/sample_data.php');

WC()->includes();
WC()->frontend_includes();
WC()->include_template_functions();	
WC()->init();
WC()->initialize_session();
WC()->initialize_cart();


include_once WC_ABSPATH . 'includes/class-wc-product-factory.php';		
WC()->product_factory = new WC_Product_Factory();

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
$factory_object->create_products($_product);

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
	
	$post = get_page_by_title('Setting #8800950587' , OBJECT, 'product' );        
$variable_product = new WC_Product_Variable($post->ID);        
$variation_id = $variable_product->get_available_variations()[0]['variation_id'];

	$sets['SECOND'] = array($post->ID,1,$variation_id);

	WC()->session->set('EO_WBC_SETS',$sets);
