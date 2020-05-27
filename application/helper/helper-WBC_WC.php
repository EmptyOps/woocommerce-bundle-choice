<?php

/*
*	woocommerce helper class
*/
defined( 'ABSPATH' ) || exit;

class WBC_WC {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function wc_placeholder_img_src() {
		return wc_placeholder_img_src();
	}

	public function is_wc_endpoint_url( $endpoint = false ) {
        
        if(function_exists('is_wc_endpoint_url')) {        	
        	return is_wc_endpoint_url($endpoint);
        } else {

	        global $wp;
	        $wc_endpoints = WC()->query->query_vars;
	        
	        if ( false !== $endpoint ) {
	            if ( ! isset( $wc_endpoints[ $endpoint ] ) ) {
	                return false;
	            } else {
	                $endpoint_var = $wc_endpoints[ $endpoint ];
	            }            
	            return isset( $wp->query_vars[ $endpoint_var ] );
	        } else {
	            foreach ( $wc_endpoints as $key => $value ) {
	                if ( isset( $wp->query_vars[ $key ] ) ) {
	                    return true;
	                }
	            }            
	            return false;
	        }
	    }
    }

    public static function eo_wbc_get_cart_url() {        
        return function_exists('wc_get_cart_url')?wc_get_cart_url():apply_filters( 'woocommerce_get_cart_url', self::eo_wbc_support_get_page_permalink( 'cart' ));
    }

    public static function eo_wbc_get_product($product_id){
        return function_exists('wc_get_product')?wc_get_product($product_id):WC()->product_factory->get_product($product_id,array());
    }
}
