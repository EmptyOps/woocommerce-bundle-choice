<?php
/**
 *	SP WBC Variations class 
 */

need to move this class to data_model package and also check other such variations classes also if they are in right package or not -- to d 
namespace eo\wbc\model\publics;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\data_model\SP_Variations;

class SP_WBC_Variations extends SP_Variations {

	private static $_instance = null;

	public static function instance() {

		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct() {

	}

	public static function fetch_data( $product, maybe no other arguments are necessary like variation_id since we are going to use on single product page and from there it should load the default variation or all the variations as applicable as per the legacy flows. can also check that other plugin to find out or confirm about legacy flow. and then return the data saved from our variations admin tab defined above of default variations or all variations as applicable as per the legacy standards. $extra_args=array() ) {

		$sp_variations_data = array();	//	NOTE: this is default object format of $sp_variations_data and when there is no data available it will return empty array instead of the null or false etc. 

		this function will return also the default(or say the data that are supported and provided by legacy api) data as applicable like below image or all other such applicable default data 
		if ( $variation_image_id ) {
			// Add Variation Default Image
			array_unshift( $gallery_images, $variation_image_id );
		} else {
			// Add Product Default Image

			/*if ( has_post_thumbnail( $product_id ) ) {
				array_unshift( $gallery_images, get_post_thumbnail_id( $product_id ) );
			}*/
			$parent_product          = wc_get_product( $product_id );
			$parent_product_image_id = $parent_product->get_image_id();
			$placeholder_image_id    = get_option( 'woocommerce_placeholder_image', 0 );

			if ( ! empty( $parent_product_image_id ) ) {
				array_unshift( $gallery_images, $parent_product_image_id );
			} else {
				array_unshift( $gallery_images, $placeholder_image_id );
			}
		}

		we need to atleast return the attachment properties like post title, and so on so that they can be used as the alt tag. and we should pass if there are any other properties that needs to be used now like that plugin had returned many properties 

		also to implement the hook woocommerce_available_variation so this function will return only required data like js vars related or maybe not that one either because that can be set from the hook woocommerce_available_variation and since it is about loading the script of vars so maybe even this function will only do necessary things here like fetching and returning variations and the hook woocommerce_available_variation should be implemented in the ssm single product model that is just planned 
			-- ACTIVE_TODO/TODO we may also like to implement our own filter to disable our variations slider/zoom or entire variations support on specific categories or product, but that we will do only when that is required by any user demand. 
			--	also need to implement hook wc_ajax_get_default_gallery and also the hook wc_ajax_get_variation_gallery and just like above this hooks will also be implemented in the single product model 
				--	and maybe it is important to note that with these ajax hooks maybe woocommerce is handling all management including the changing of images in the dom, but that is not possible by woo since that do not have the bare tempalate of html or does it have? maybe it have, lets check their hooks 
					--	and so if that is possible then we do not need to manage that in our javascript layer -- ACTIVE_TODO and if that possible then we can even try sending variations images even when our slider/zoom is disabled in a hope that other slider zoom plugins read our images data and implement it(I think they will normally get the data since it is clear woo standard hooks, but now I doubt if all variations hooks are for supporting such functions because they by default are not providing the multiple variations option but maybe they are publishing hoooks for their extensions and so for others it also work?). if these hooks are for that function then it is highly likely that works -- ACTIVE_TODO and in that case we will just test the 5 sliders and 5 zoom plugin to confirm that they work well with our standard hooks implementation. 
						--	one thing that just came to the mind is that we may need to trigger the legacy variations change event when our sp_variations attribute widgets option elements like(icon panel, slider or dropdown etc. does change) 
							--	so far have not noticed that but m must have managed it somewhere because without that the prices would not be changing 

		add_filter( 'woocommerce_available_variation',  function($variation_get_max_purchase_quantity){

		}, 99, 1);


		add_filter( 'woocommerce_ajax_variation_threshold',  function($int){

		}, 99, 1);






        $attributes = $args['args'][ 'product' ]->get_variation_attributes();
        $variations = $args[ 'product' ]->get_available_variations();


					if ( $default_image_type_attribute === '__max' ) {

						$attribute_counts = array();
						foreach ( $attributes as $attr_key => $attr_values ) {
							$attribute_counts[ $attr_key ] = count( $attr_values );
						}

						$max_attribute_count = max( $attribute_counts );
						$attribute_key       = array_search( $max_attribute_count, $attribute_counts );

					} elseif ( $default_image_type_attribute === '__min' ) {
						$attribute_counts = array();
						foreach ( $attributes as $attr_key => $attr_values ) {
							$attribute_counts[ $attr_key ] = count( $attr_values );
						}
						$min_attribute_count = min( $attribute_counts );
						$attribute_key       = array_search( $min_attribute_count, $attribute_counts );

					} elseif ( $default_image_type_attribute === '__first' ) {
						$attribute_keys = array_keys( $attributes );
						$attribute_key  = current( $attribute_keys );
					} else {
						$attribute_key = $default_image_type_attribute;
					}

					$selected_attribute_name = wc_variation_attribute_name( $attribute_key );


					$default_attribute_keys = array_keys( $attributes );
					$default_attribute_key  = current( $default_attribute_keys );
					$default_attribute_name = wc_variation_attribute_name( $default_attribute_key );

					$current_attribute      = $args['attribute'];
					$current_attribute_name = wc_variation_attribute_name( $current_attribute );


					if ( $is_default_to_image ) {

						$assigned = array();

						foreach ( $variations as $variation_key => $variation ) {

							$attribute_name = isset( $variation['attributes'][ $selected_attribute_name ] ) ? $selected_attribute_name : $default_attribute_name;

							$attribute_value = esc_html( $variation['attributes'][ $attribute_name ] );

							$assigned[ $attribute_name ][ $attribute_value ] = array(
								'image_id'     => $variation['image_id'],
								'variation_id' => $variation['variation_id'],
								'type'         => ( empty( $variation['image_id'] ) ? 'button' : 'image' ),
							);




		$terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) );




		from here to prepare attribute display name, unique name, shoow options none and other such matters, call the SP_Attribute class or object methods 




		apply filter hook here to let extensions filter over swatches data, 



		return $sp_variations_data;
	}
 


}