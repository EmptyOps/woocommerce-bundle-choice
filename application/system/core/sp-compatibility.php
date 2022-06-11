<?php
/**
 *	SP Compatibility class 
 */

namespace eo\wbc\system\core;

defined( 'ABSPATH' ) || exit;

class SP_Compatibility {

	private static $_instance = null;

	public static function instance() {

		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct() {

	}

	public function single_product_gallery_compatability(){

 	}

 	public function single_Product_variations_form_compatability(){

 	}

 	public function feed_loopbox_variations_container_compatability(){

 	}

 	public function feed_quickview_container_compatability(){

 	}

 	public function dokan(){

 		 $($el).closest('.woocommerce_variation').addClass('variation-needs-update');
        $('button.cancel-variation-changes, button.save-variation-changes').removeAttr('disabled');
        $('#variable_product_options').trigger('woocommerce_variations_input_changed'); // Dokan Support

        $($el).closest('.dokan-product-variation-itmes').addClass('variation-needs-update');
        $('.dokan-product-variation-wrapper').trigger('dokan_variations_input_changed');
        $(document).trigger('woo_variation_gallery_admin_variation_changed', this);

        ///////////////////////////////////////////////

        // Dokan Support
			add_action( 'wp_enqueue_scripts', array( $this, 'dokan_enqueue_scripts' ) );

			add_action( 'wp_footer', array( $this, 'dokan_footer' ) );

			add_action( 'dokan_product_after_variable_attributes', array( $this, 'dokan_variable_attributes' ), 10, 3 );

		///////////////////////////////////////////////////

		public function dokan_variable_attributes( $loop, $variation_data, $variation ) {
			if ( class_exists( 'WeDevs_Dokan' ) && current_user_can( 'dokan_edit_product' ) ) {
				woo_variation_gallery()->get_backend()->gallery_admin_html( $loop, $variation_data, $variation );
			}
		}

		public function dokan_enqueue_scripts() {
			if ( class_exists( 'WeDevs_Dokan' ) && current_user_can( 'dokan_edit_product' ) ) {
				woo_variation_gallery()->get_backend()->admin_enqueue_scripts();
			}
		}

		public function dokan_footer() {
			if ( class_exists( 'WeDevs_Dokan' ) && current_user_can( 'dokan_edit_product' ) ) {
				woo_variation_gallery()->get_backend()->admin_template_js();
			}
		}
		
		////////////////////////////////////////////////

		// Dokan Pro Support from 3.2.0+
		add_action( 'dokan_product_after_variable_attributes', 'wvg_gallery_admin_html', 10, 3 );	
 		
 	}

 	public function IE11(){

 		//-------------------------------------------------------------------------------
		// Detecting IE 11 Browser
		//-------------------------------------------------------------------------------
		if ( ! function_exists( 'wvg_is_ie11' ) ):
			function wvg_is_ie11() {
				global $is_IE;
				$ua   = $_SERVER['HTTP_USER_AGENT'];
				$is11 = preg_match( "/Trident\/7.0;(.*)rv:11.0/", $ua, $match ) !== false;

				return $is_IE && $is11;
				//return TRUE;
			}
		endif;
 	}
}