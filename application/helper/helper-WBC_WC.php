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

    public static function eo_wbc_create_attribute($args){

        if(function_exists('wc_create_attribute')) {

            return wc_create_attribute($args);

        } else{

             global $wpdb;

            $slug = $args['slug'];

            if ( strlen( $slug ) >= 28 ) {
                return new WP_Error( 'invalid_product_attribute_slug_too_long', sprintf( __( 'Name "%s" is too long (28 characters max). Shorten it, please.', 'woocommerce' ), $slug ), array( 'status' => 400 ) );
            } elseif ( wc_check_if_attribute_name_is_reserved( $slug ) ) {
                return new WP_Error( 'invalid_product_attribute_slug_reserved_name', sprintf( __( 'Name "%s" is not allowed because it is a reserved term. Change it, please.', 'woocommerce' ), $slug ), array( 'status' => 400 ) );
            } elseif ( taxonomy_exists( wc_attribute_taxonomy_name( $args['name'] ) ) ) {
                return new WP_Error( 'invalid_product_attribute_slug_already_exists', sprintf( __( 'Name "%s" is already in use. Change it, please.', 'woocommerce' ), $args['name'] ), array( 'status' => 400 ) );
            }

            $data = array(
                'attribute_label'   => $args['name'],
                'attribute_name'    => $args['slug'],
                'attribute_type'    => 'select',
                'attribute_orderby' => 'menu_order',
                'attribute_public'  => 1, // Enable archives ==> true (or 1)
            );

            $results = $wpdb->insert( "{$wpdb->prefix}woocommerce_attribute_taxonomies", $data );

            if ( is_wp_error( $results ) ) {
                return new WP_Error( 'cannot_create_attribute', $results->get_error_message(), array( 'status' => 400 ) );
            }

            $id = $wpdb->insert_id;

            do_action('woocommerce_attribute_added', $id, $data);

            wp_schedule_single_event( time(), 'woocommerce_flush_rewrite_rules' );

            delete_transient('wc_attribute_taxonomies');
            return $id;
        }
    }
    
}
