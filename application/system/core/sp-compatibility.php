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

			jQuery(function ($) {
		Promise.resolve().then(function () {
		return _interopRequireWildcard(__webpack_require__("./src/js/WooVariationGallery.js"));
		}).then(function () {
		// For Single Product
		$('.woo-variation-gallery-wrapper:not(.wvg-loaded)').WooVariationGallery(); // Ajax and Variation Product
		$(document).on('wc_variation_form', '.variations_form', function () {
		  $('.woo-variation-gallery-wrapper:not(.wvg-loaded)').WooVariationGallery();
		}); // Support for Jetpack's Infinite Scroll,
		$(document.body).on('post-load', function () {
		  $('.woo-variation-gallery-wrapper:not(.woo-variation-gallery-product-type-variable):not(.wvg-loaded)').WooVariationGallery();
		}); // YITH Quickview
		$(document).on('qv_loader_stop', function () {
		  $('.woo-variation-gallery-wrapper:not(.woo-variation-gallery-product-type-variable):not(.wvg-loaded)').WooVariationGallery();
		}); // Elementor
		if (window.elementorFrontend && window.elementorFrontend.hooks) {
		  elementorFrontend.hooks.addAction('frontend/element_ready/woocommerce-product-images.default', function ($scope) {
		    $('.woo-variation-gallery-wrapper:not(.wvg-loaded)').WooVariationGallery();
		  });
		}
		});
		});


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


		/////////////////////////////woo-variation-swatches plugin
		////////////// hooks.php

				add_action( 'dokan_product_option_terms', 'dokan_support_wvs_product_option_terms', 20, 2 );


		if ( ! function_exists( 'dokan_support_wvs_product_option_terms' ) ) :
			function dokan_support_wvs_product_option_terms( $attribute_taxonomy, $i ) {
				// $attribute_taxonomy, $i
				// $tax, $i
				global $post, $thepostid, $product_object;
				if ( in_array( $attribute_taxonomy->attribute_type, array_keys( wvs_available_attributes_types() ) ) ) {

					$taxonomy = wc_attribute_taxonomy_name( $attribute_taxonomy->attribute_name );

					$product_id = $thepostid;

					if ( is_null( $thepostid ) && isset( $_POST['post_id'] ) ) {
						$product_id = absint( $_POST['post_id'] );
					}

					$args = array(
						'orderby'    => 'name',
						'hide_empty' => 0,
					);

					?>
					<select multiple="multiple" style="width:100%" data-placeholder="<?php esc_attr_e( 'Select terms', 'woo-variation-swatches' ); ?>" class="dokan_attribute_values dokan-select2" name="attribute_values[<?php echo esc_attr( $i ); ?>][]">
						<?php
						$all_terms = get_terms( $taxonomy, apply_filters( 'dokan_product_attribute_terms', $args ) );
						if ( $all_terms ) :
							foreach ( $all_terms as $term ) :
								echo '<option value="' . esc_attr( $term->slug ) . '" ' . selected( has_term( absint( $term->term_id ), $taxonomy, $product_id ), true, false ) . '>' . esc_attr( apply_filters( 'woocommerce_product_attribute_term_name', $term->name, $term ) ) . '</option>';
							endforeach;
						endif;
						?>
					</select>

					<div class="dokan-pre-defined-attribute-btn-group">
						<button class="dokan-btn dokan-btn-default plus dokan-select-all-attributes"><?php esc_html_e( 'Select all', 'woo-variation-swatches' ); ?></button>
						<button class="dokan-btn dokan-btn-default minus dokan-select-no-attributes"><?php esc_html_e( 'Select none', 'woo-variation-swatches' ); ?></button>
					</div>
					<?php
				}
			}
		endif;
 		
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

 	//////////////////////////////////////////////

		//  jQuery(function ($)
		//  {
		//   Promise.resolve().then(function () {
		//     return _interopRequireWildcard(__webpack_require__("./src/js/WooVariationGallery.js"));
		//   }).then(function () {
		//     // For Single Product
		//     $('.woo-variation-gallery-wrapper:not(.wvg-loaded)').WooVariationGallery(); // Ajax and Variation Product

		//     $(document).on('wc_variation_form', '.variations_form', function () {
		//       $('.woo-variation-gallery-wrapper:not(.wvg-loaded)').WooVariationGallery();
		//     }); // Support for Jetpack's Infinite Scroll,

		//     $(document.body).on('post-load', function () {
		//       $('.woo-variation-gallery-wrapper:not(.woo-variation-gallery-product-type-variable):not(.wvg-loaded)').WooVariationGallery();
		//     }); // YITH Quickview

		//     $(document).on('qv_loader_stop', function () {
		//       $('.woo-variation-gallery-wrapper:not(.woo-variation-gallery-product-type-variable):not(.wvg-loaded)').WooVariationGallery();
		//     }); // Elementor

		//     if (window.elementorFrontend && window.elementorFrontend.hooks) {
		//       elementorFrontend.hooks.addAction('frontend/element_ready/woocommerce-product-images.default', function ($scope) {
		//         $('.woo-variation-gallery-wrapper:not(.wvg-loaded)').WooVariationGallery();
		//       });
		//     }
		//   });
		// });


		add_action( 'wvs_global_attribute_column', function ( $column, $term_id, $taxonomy, $attribute, $fields, $available_types ) {
			if ( class_exists( 'SitePress' ) ) {

				global $sitepress;

				$keys = wp_list_pluck( $fields, 'id' );
				// $keys = array_column($fields, 'id');

				foreach ( $keys as $key ) {
					$value = sanitize_text_field( get_term_meta( $term_id, $key, true ) );
					// $original_element_id = $sitepress->get_original_element_id( $term_id, 'tax_' . $taxonomy );
					$trid         = $sitepress->get_element_trid( $term_id, 'tax_' . $taxonomy );
					$translations = $sitepress->get_element_translations( $trid, 'tax_' . $taxonomy );

					$current_lang = $sitepress->get_current_language();
					$default_lang = $sitepress->get_default_language();

					if ( $translations && empty( $value ) ) {
						// source_language_code
						$translation = array_values( array_filter( $translations, function ( $translation ) {
							return isset( $translation->original ) && ! empty( $translation->original );
						} ) );

						$translation = array_shift( $translation );

						if ( empty( $value ) && $translation ) {
							$original_term_id = $translation->term_id;
							$original_value   = sanitize_text_field( get_term_meta( $original_term_id, $key, true ) );
							// Copy term meta from original
							update_term_meta( $term_id, $key, $original_value );
						}
					}

				}
			}
		}, 10, 6 );


}