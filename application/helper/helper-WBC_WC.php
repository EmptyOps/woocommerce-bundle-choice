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
}
