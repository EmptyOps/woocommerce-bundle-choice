<?php

namespace eo\wbc\model;

defined( 'ABSPATH' ) || exit;

class Search_Product {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function get_ajax() {
		$include_variations=false;
	    
	    
	    $term = (string) wc_clean( wp_unslash( wbc()->sanitize->post('term') ) );
	    

	    if ( empty( $term ) ) {
	        wp_die();
	    }

	    if ( ! empty( wbc()->sanitize->post('limit') ) ) {
	        $limit = absint( wbc()->sanitize->post('limit') );
	    } else {
	        $limit = absint( apply_filters( 'woocommerce_json_search_limit', 30 ) );
	    }

	    $include_ids = ! empty( wbc()->sanitize->post('include') ) ? array_map( 'absint', (array) wp_unslash( wbc()->sanitize->post('include') ) ) : array();

	    $exclude_ids = ! empty( wbc()->sanitize->post('exclude') ) ? array_map( 'absint', (array) wp_unslash( wbc()->sanitize->post('exclude') ) ) : array();

	    $data_store = \WC_Data_Store::load( 'product' );
	    $ids        = $data_store->search_products( $term, '', (bool) $include_variations, false, $limit, $include_ids, $exclude_ids );

	    $product_objects = array_filter( array_map( 'wc_get_product', $ids ), 'wc_products_array_filter_readable' );
	    $products        = array();

	    foreach ( $product_objects as $product_object ) {
	        $formatted_name = $product_object->get_formatted_name();
	        $managing_stock = $product_object->managing_stock();

	        if ( $managing_stock && ! empty( wbc()->sanitize->post('display_stock') ) ) {
	            $stock_amount    = $product_object->get_stock_quantity();
	            /* Translators: %d stock amount */
	            $formatted_name .= ' &ndash; ' . sprintf( __( 'Stock: %d', 'woocommerce' ), wc_format_stock_quantity_for_display( $stock_amount, $product_object ) );
	        }

	        $products[ $product_object->get_id() ] = rawurldecode( $formatted_name );
	    }    

	    array_walk($products,function($product,$id) use(&$products){             
	        $products[$id]=array($product,wp_get_attachment_image_src(get_post_thumbnail_id($id),array(64,64))[0]);
	    });            
	    
	    wp_send_json( apply_filters( 'woocommerce_json_search_found_products', $products ) );
	}
}