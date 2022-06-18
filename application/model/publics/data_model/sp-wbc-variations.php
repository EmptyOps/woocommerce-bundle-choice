<?php
/**
 *	SP WBC Variations class 
 */

namespace eo\wbc\model\publics\data_model;

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

	public static function fetch_data($for_section, $product = null,  $args = null ) {

		$sp_variations_data = array();
			//	NOTE: this is default object format of $sp_variations_data and when there is no data available it will return empty array instead of the null or false etc. 

		also to implement the hook woocommerce_available_variation so this function will return only required data like js vars related or maybe not that one either because that can be set from the hook woocommerce_available_variation and since it is about loading the script of vars so maybe even this function will only do necessary things here like fetching and returning variations and the hook woocommerce_available_variation should be implemented in the ssm single product model that is just planned 
			--	ACTIVE_TODO also need to implement hook wc_ajax_get_default_gallery and also the hook wc_ajax_get_variation_gallery -- to h 
				--	ACTIVE_TODO first do research on this hooks like when they are called and in which versions they were provided by woo -- to d or -- to b 
					--	and maybe it is important to note that with these ajax hooks maybe woocommerce is handling all management including the changing of images in the dom, but that is not possible by woo since that do not have the bare tempalate of html or does it have? maybe it have, lets check their hooks 
						--	and so if that is possible then we do not need to manage that in our javascript layer -- ACTIVE_TODO and if that possible then we can even try sending variations images even when our slider/zoom is disabled in a hope that other slider zoom plugins read our images data and implement it(I think they will normally get the data since it is clear woo standard hooks, but now I doubt if all variations hooks are for supporting such functions because they by default are not providing the multiple variations option but maybe they are publishing hoooks for their extensions and so for others it also work?). if these hooks are for that function then it is highly likely that works -- ACTIVE_TODO and in that case we will just test the 5 sliders and 5 zoom plugin to confirm that they work well with our standard hooks implementation. 
							--	one thing that just came to the mind is that we may need to trigger the legacy variations change event when our sp_variations attribute widgets option elements like(icon panel, slider or dropdown etc. does change) 
								--	so far have not noticed that but m must have managed it somewhere because without that the prices would not be changing 



		if( $for_section == "gallery_images_init" ) {

			//	below hooked function will add our data layers of sp_variations gallery_images and maybe also others of the sp_variations to the woo data 					
			add_filter( 'woocommerce_available_variation', array( $this, 'get_available_variation' ), 90, 3);
			
		}elseif( $for_section == "swatches_init" ) {
			add_filter( 'woocommerce_ajax_variation_threshold',  function($int){

				// ACTIVE_TODO implement, check that other plugin we were exploring -- to d
				// ACTIVE_TODO	--	and implement if logically useful -- to d  

			}, 8, 2);
		}elseif( $for_section == "swatches" || $for_section == "gallery_images") {

			$sp_variations_data['attributes'] = $args['args'][ 'product' ]->get_variation_attributes();
			$sp_variations_data['variations'] = $args['args'][ 'product' ]->get_available_variations();

		}	

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




		apply filter hook here to let extensions filter over swatches data, but it may not be necessary if the core get_available_variation function do all the job 



		return $sp_variations_data;
	}
 
	//	not sure if hook core can callback it on its instance if it is a private function, so kept it public for now. 
	public function get_available_variation( $variation_get_max_purchase_quantity,  $instance,  $variation ) {

		first of all rename the vars inside this function as per the above args, look at the plugin we were exploring for clear understanding. we will be using the standard woo args name. -- to d or -- to b 

		below hooked function will add our data layers of sp_variations gallery_images and maybe also others of the sp_variations to the woo data. 
			read and set first the images from our post meta key -- to b or -- to d 

		$product_id         = absint( $variation->get_parent_id() );
		$variation_id       = absint( $variation->get_id() );
		$variation_image_id = absint( $variation->get_image_id() );

		$has_variation_gallery_images = (bool) get_post_meta( $variation_id, 'woo_variation_gallery_images', true );
		//  $product                      = wc_get_product( $product_id );

		if ( $has_variation_gallery_images ) {
			$gallery_images = (array) get_post_meta( $variation_id, 'woo_variation_gallery_images', true );
		} else {
			// $gallery_images = $product->get_gallery_image_ids();
			$gallery_images = $instance->get_gallery_image_ids();
		}


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

		$variation_get_max_purchase_quantity['variation_gallery_images'] = array();

		foreach ( $gallery_images as $i => $variation_gallery_image_id ) {
			$variation_get_max_purchase_quantity['variation_gallery_images'][ $i ] = $this->get_product_attachment_props( $variation_gallery_image_id );
		}

		// apply filter hook here to let extensions filter over swatches data, with key sp_variations_available_variation -- to d or -- to b done


		return apply_filters( 'sp_variations_available_variation', $variation_get_max_purchase_quantity, $variation, $product_id );
	}

	// for reference see wc_get_product_attachment_props function source code 
	public function get_product_attachment_props( $attachment_id, $product_id = false ) {

		// check hooks like woo_variation_gallery of and do the needful, we can drop those hooks if is not sound so necessary for now. and later as required we can add our overrides -- to b or -- to d done		

		$props      = array(
			'image_id'                => '',
			'title'                   => '',
			'caption'                 => '',
			'url'                     => '',
			'alt'                     => '',
			'full_src'                => '',
			'full_src_w'              => '',
			'full_src_h'              => '',
			'full_class'              => '',
			//'full_srcset'              => '',
			//'full_sizes'               => '',
			'gallery_thumbnail_src'   => '',
			'gallery_thumbnail_src_w' => '',
			'gallery_thumbnail_src_h' => '',
			'gallery_thumbnail_class' => '',
			//'gallery_thumbnail_srcset' => '',
			//'gallery_thumbnail_sizes'  => '',
			'archive_src'             => '',
			'archive_src_w'           => '',
			'archive_src_h'           => '',
			'archive_class'           => '',
			//'archive_srcset'           => '',
			//'archive_sizes'            => '',
			'src'                     => '',
			'class'                   => '',
			'src_w'                   => '',
			'src_h'                   => '',
			'srcset'                  => '',
			'sizes'                   => '',
		);
		$attachment = get_post( $attachment_id );

		if ( $attachment ) {

			$props['image_id'] = $attachment_id;
			$props['title']    = _wp_specialchars( get_post_field( 'post_title', $attachment_id ), ENT_QUOTES, 'UTF-8', true );
			$props['caption']  = _wp_specialchars( get_post_field( 'post_excerpt', $attachment_id ), ENT_QUOTES, 'UTF-8', true );
			$props['url']      = wp_get_attachment_url( $attachment_id );

			// Alt text.
			$alt_text = array(
				trim( wp_strip_all_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) ),
				$props['caption'],
				wp_strip_all_tags( $attachment->post_title )
			);

			if ( $product_id ) {
				$product    = wc_get_product( $product_id );
				$alt_text[] = wp_strip_all_tags( get_the_title( $product->get_id() ) );
			}

			$alt_text     = array_filter( $alt_text );
			$props['alt'] = isset( $alt_text[0] ) ? $alt_text[0] : '';

			// Large version.
			$full_size           = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
			$full_size_src       = wp_get_attachment_image_src( $attachment_id, $full_size );
			$props['full_src']   = esc_url( $full_size_src[0] );
			$props['full_src_w'] = esc_attr( $full_size_src[1] );
			$props['full_src_h'] = esc_attr( $full_size_src[2] );

			$full_size_class = $full_size;
			if ( is_array( $full_size_class ) ) {
				$full_size_class = implode( 'x', $full_size_class );
			}

			$props['full_class'] = "attachment-$full_size_class size-$full_size_class";
			//$props[ 'full_srcset' ] = wp_get_attachment_image_srcset( $attachment_id, $full_size );
			//$props[ 'full_sizes' ]  = wp_get_attachment_image_sizes( $attachment_id, $full_size );


			// Gallery thumbnail.
			$gallery_thumbnail                = wc_get_image_size( 'gallery_thumbnail' );
			$gallery_thumbnail_size           = apply_filters( 'woocommerce_gallery_thumbnail_size', array(
				$gallery_thumbnail['width'],
				$gallery_thumbnail['height']
			) );
			$gallery_thumbnail_src            = wp_get_attachment_image_src( $attachment_id, $gallery_thumbnail_size );
			$props['gallery_thumbnail_src']   = esc_url( $gallery_thumbnail_src[0] );
			$props['gallery_thumbnail_src_w'] = esc_attr( $gallery_thumbnail_src[1] );
			$props['gallery_thumbnail_src_h'] = esc_attr( $gallery_thumbnail_src[2] );

			$gallery_thumbnail_class = $gallery_thumbnail_size;
			if ( is_array( $gallery_thumbnail_class ) ) {
				$gallery_thumbnail_class = implode( 'x', $gallery_thumbnail_class );
			}

			$props['gallery_thumbnail_class'] = "attachment-$gallery_thumbnail_class size-$gallery_thumbnail_class";
			//$props[ 'gallery_thumbnail_srcset' ] = wp_get_attachment_image_srcset( $attachment_id, $gallery_thumbnail );
			//$props[ 'gallery_thumbnail_sizes' ]  = wp_get_attachment_image_sizes( $attachment_id, $gallery_thumbnail );


			// Archive/Shop Page version.
			$thumbnail_size         = apply_filters( 'woocommerce_thumbnail_size', 'woocommerce_thumbnail' );
			$thumbnail_size_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
			$props['archive_src']   = esc_url( $thumbnail_size_src[0] );
			$props['archive_src_w'] = esc_attr( $thumbnail_size_src[1] );
			$props['archive_src_h'] = esc_attr( $thumbnail_size_src[2] );

			$archive_thumbnail_class = $thumbnail_size;
			if ( is_array( $archive_thumbnail_class ) ) {
				$archive_thumbnail_class = implode( 'x', $archive_thumbnail_class );
			}

			$props['archive_class'] = "attachment-$archive_thumbnail_class size-$archive_thumbnail_class";
			//$props[ 'archive_srcset' ] = wp_get_attachment_image_srcset( $attachment_id, $thumbnail_size );
			//$props[ 'archive_sizes' ]  = wp_get_attachment_image_sizes( $attachment_id, $thumbnail_size );


			// Image source.
			$image_size     = apply_filters( 'woocommerce_gallery_image_size', 'woocommerce_single' );
			$src            = wp_get_attachment_image_src( $attachment_id, $image_size );
			$props['src']   = esc_url( $src[0] );
			$props['src_w'] = esc_attr( $src[1] );
			$props['src_h'] = esc_attr( $src[2] );

			$image_size_class = $image_size;
			if ( is_array( $image_size_class ) ) {
				$image_size_class = implode( 'x', $image_size_class );
			}
			$props['class']  = "wp-post-image wvg-post-image attachment-$image_size_class size-$image_size_class ";
			$props['srcset'] = wp_get_attachment_image_srcset( $attachment_id, $image_size );
			$props['sizes']  = wp_get_attachment_image_sizes( $attachment_id, $image_size );

			$props['extra_params'] = wc_implode_html_attributes( array() );

		}

		return $props;

	}

	public function sp_variations_swatches_supported_attribute_types(){

		$type = array();
		$type['button']='Button';
		$type['color']='Color';
		$type['image']='Icon';
		$type['image_text']='Icons with Text';
		$type['dropdown_image']='Dropdown with Icons';
		$type['dropdown_image_only']='Dropdown with Icons Only';
		$type['dropdown']='Dropdown';

		apply_filters('sp_variations_swatches_attribute_types', $type);	 

	}

	public static function get_default_attributes($product_id){

		$product = wc_get_product( $product_id );

		if ( ! $product->is_type( 'variable' ) ) {
			return array();
		}

		$variable_product = new WC_Product_Variable( absint( $product_id ) );

		// $selected = isset( $_REQUEST[ $selected_key ] ) ? wc_clean( wp_unslash( $_REQUEST[ $selected_key ] ) ) : $args['product']->get_variation_default_attribute( $args['attribute'] );

		$selected_attributes = array();
		$default_attributes  = $variable_product->get_default_attributes();
		$attributes          = $variable_product->get_attributes();
		foreach ( $attributes as $attribute_name => $attribute_data ) {
			$selected_key = wc_variation_attribute_name( $attribute_name );
			if ( isset( $_REQUEST[ $selected_key ] ) ) {
				$selected_attributes[ sanitize_title( $attribute_name ) ] = wc_clean( wp_unslash( $_REQUEST[ $selected_key ] ) );
			}
		}

		return empty( $selected_attributes ) ? $default_attributes : $selected_attributes;

	}

	public static function get_default_variation_id($product, $attributes){

		if ( is_numeric( $product ) ) {
			$product = wc_get_product( $product );
		}

		if ( ! $product->is_type( 'variable' ) ) {
			return 0;
		}

		$product_id = $product->get_id();

		foreach ( $attributes as $key => $value ) {
			if ( strpos( $key, 'attribute_' ) === 0 ) {
				continue;
			}

			unset( $attributes[ $key ] );
			$attributes[ sprintf( 'attribute_%s', $key ) ] = $value;
		}

		$data_store = WC_Data_Store::load( 'product' );

		return $data_store->find_matching_product_variation( $product, $attributes );
		
	}

	public static function get_available_variation($product_id, $variation_id){

		$variable_product = new WC_Product_Variable( $product_id );
		$variation        = $variable_product->get_available_variation( $variation_id );

		return $variation;

	}

}