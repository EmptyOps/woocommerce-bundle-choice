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

	public static function fetch_data($for_section, $product = null,  $args = array() ) {

		if( wbc()->sanitize->get('is_test') == 1 ) {

			wbc_pr("SP_WBC_Variations fetch_data");
		}

		$sp_variations_data = array();
			//	NOTE: this is default object format of $sp_variations_data and when there is no data available it will return empty array instead of the null or false etc. 

		// ACTIVE_TODO_OC_START
		// also to implement the hook woocommerce_available_variation so this function will return only required data like js vars related or maybe not that one either because that can be set from the hook woocommerce_available_variation and since it is about loading the script of vars so maybe even this function will only do necessary things here like fetching and returning variations and the hook woocommerce_available_variation should be implemented in the ssm single product model that is just planned 
		// 	--	ACTIVE_TODO also need to implement hook wc_ajax_get_default_gallery and also the hook wc_ajax_get_variation_gallery -- to h 
		// 		--	ACTIVE_TODO first do research on this hooks like when they are called and in which versions they were provided by woo -- to d or -- to b 
		// 			--	and maybe it is important to note that with these ajax hooks maybe woocommerce is handling all management including the changing of images in the dom, but that is not possible by woo since that do not have the bare tempalate of html or does it have? maybe it have, lets check their hooks 
		// 				--	and so if that is possible then we do not need to manage that in our javascript layer -- ACTIVE_TODO and if that possible then we can even try sending variations images even when our slider/zoom is disabled in a hope that other slider zoom plugins read our images data and implement it(I think they will normally get the data since it is clear woo standard hooks, but now I doubt if all variations hooks are for supporting such functions because they by default are not providing the multiple variations option but maybe they are publishing hoooks for their extensions and so for others it also work?). if these hooks are for that function then it is highly likely that works -- ACTIVE_TODO and in that case we will just test the 5 sliders and 5 zoom plugin to confirm that they work well with our standard hooks implementation. 
		// 					--	one thing that just came to the mind is that we may need to trigger the legacy variations change event when our sp_variations attribute widgets option elements like(icon panel, slider or dropdown etc. does change) 
		// 						--	so far have not noticed that but m must have managed it somewhere because without that the prices would not be changing 
		// ACTIVE_TODO_OC_END



		if( $for_section == "gallery_images_init" ) {

			//	below hooked function will add our data layers of sp_variations gallery_images and maybe also others of the sp_variations to the woo data 					
			add_filter('woocommerce_available_variation',function($variation_get_max_purchase_quantity,  $instance,  $variation) use($args){

				return apply_filters ( 'sp_wbc_woo_available_variation', $variation_get_max_purchase_quantity,  $instance,  $variation);

			}, 90, 3);
			
			if( wbc()->sanitize->get('is_test') == 1 ) {

				wbc_pr("SP_WBC_Variations fetch_data toDefinition above sp_wbc_woo_available_variation");
			}

			add_filter('sp_wbc_woo_available_variation',function($variation_get_max_purchase_quantity,  $instance,  $variation) use($args){

				if( wbc()->sanitize->get('is_test') == 1 ) {

					wbc_pr("SP_WBC_Variations fetch_data toDefinition sp_wbc_woo_available_variation");
				}

				return self::instance()->get_available_variation_hook_callback($variation_get_max_purchase_quantity,  $instance,  $variation, $args);
				
			}, 90, 3);
			
		}elseif( $for_section == "swatches_init"/* && $args['page'] != 'feed'*/ ) {

			self::swatches_hooks();

			add_filter( 'woocommerce_ajax_variation_threshold',  function($int){

				// ACTIVE_TODO_OC_START
				// first of all need to research about ajax variation settings, and everything about woocommerce ajax variations, so just need search all its settings -- to h and -- to d 
				// 	--	and then find appropriate settings value and set that hardcoded from here -- to d 
				// 		--	ACTIVE_TODO/TODO very soon we may like to provide the above setting on admin or something such -- to h and -- to s 
				// return absint( get_option( 'threshold' ) );\
				// ACTIVE_TODO_OC_END

				if( wbc()->sanitize->get('is_test') == 1 ) {

					wbc_pr("SP_WBC_Variations fetch_data toDefinition woocommerce_ajax_variation_threshold");
				}

				// ACTIVE_TODO_OC_START
				// ACTIVE_TODO temp. below value is temparary and may be we simply need to keep it to 30 which is less than default of woo which is 50. 
				// ACTIVE_TODO_OC_END
				// $int = 100;
				$int = 200;

				return $int;

			}, 8, 1/*2*/);

			add_filter('default_sp_variations_swatches_variation_attribute_options_html', function($status, $hook_args){

				//wbc_pr(self::sp_variations_swatches_supported_attribute_types()); die();
				if(!isset(self::sp_variations_swatches_supported_attribute_types()[$hook_args['type']])){
					return true;
				}

				return $status;	

			}, 10, 2);


		// comment by @s
		}elseif( ($for_section == "swatches" /*|| $for_section == "gallery_images"*/)/* && $args['page'] != 'feed'*/ ) {
 	
 			/*ACTIVE_TODO_OC_START
			ACTIVE_TODO it is noted that this call is redundantly called from the swatches data layers means it is called every time perticular attributes swatches rendered so if on a loop box or item page there are three swatches than called 3 time which is relly not requaird and it may have huge impact on the perfomance and aficeancy so we must skip that redundant call somehow. this is applicable to both below statments which preparing attributes and variations -- to h
				ACTIVE_TODO and there are statments like this "$attributes           = wc_get_attribute_taxonomies();" in function wc_product_has_attribute_type() in this class which is similar to below $product->get_variation_attributes(); funtion call. so this are also redundant calls and we must refeactor it for perfomace -- to h
			ACTIVE_TODO_OC_END*/
			// $sp_variations_data['attributes'] = $product->get_variation_attributes(); aa nu su karavanu
			$sp_variations_data['attributes'] = apply_filters('sp_wbc_get_variation_attrs',null,$product);
			// ACTIVE_TODO and eitherway we are supose to as per that perfomance optimasation notes or series that we had planed, we shoud avoid even this one single call after removeing redunduncy since it is most likely not ussed in that asset. -- to h 
			// 	 keeping above ACTIVE_TODO open for observation and during that optimasation notes or series planed we can drop even the single call from the below gallery images if. but at that time we may need to call it explicitly from custom layers 
			// 	NOTE: lets keep one time call since woo may not be calling it otherwise but we are moving it to gallery images if below it to avoid call for each swatch.
			// // $sp_variations_data['variations'] = $product->get_available_variations(); aa nu su karavanu
			// $sp_variations_data['variations'] = apply_filters('sp_wbc_get_variations',null,$product);

			

		}elseif($for_section == "gallery_images") {

			self::gallery_images_hooks();

			if(apply_filters('sp_wbc_product_get_type', null, $product) == 'variable') {

				$sp_variations_data['variations'] = apply_filters('sp_wbc_get_variations',null,$product,$args);
			}
		}	

					// ACTIVE_TODO_OC_START


					// if ( $default_image_type_attribute === '__max' ) {

					// 	$attribute_counts = array();
					// 	foreach ( $attributes as $attr_key => $attr_values ) {
					// 		$attribute_counts[ $attr_key ] = count( $attr_values );
					// 	}

					// 	$max_attribute_count = max( $attribute_counts );
					// 	$attribute_key       = array_search( $max_attribute_count, $attribute_counts );

					// } elseif ( $default_image_type_attribute === '__min' ) {
					// 	$attribute_counts = array();
					// 	foreach ( $attributes as $attr_key => $attr_values ) {
					// 		$attribute_counts[ $attr_key ] = count( $attr_values );
					// 	}
					// 	$min_attribute_count = min( $attribute_counts );
					// 	$attribute_key       = array_search( $min_attribute_count, $attribute_counts );

					// } elseif ( $default_image_type_attribute === '__first' ) {
					// 	$attribute_keys = array_keys( $attributes );
					// 	$attribute_key  = current( $attribute_keys );
					// } else {
					// 	$attribute_key = $default_image_type_attribute;
					// }

					// $selected_attribute_name = wc_variation_attribute_name( $attribute_key );


					// $default_attribute_keys = array_keys( $attributes );
					// $default_attribute_key  = current( $default_attribute_keys );
					// $default_attribute_name = wc_variation_attribute_name( $default_attribute_key );

					// $current_attribute      = $args['attribute'];
					// $current_attribute_name = wc_variation_attribute_name( $current_attribute );


					// if ( $is_default_to_image ) {

					// 	$assigned = array();

					// 	foreach ( $variations as $variation_key => $variation ) {

					// 		$attribute_name = isset( $variation['attributes'][ $selected_attribute_name ] ) ? $selected_attribute_name : $default_attribute_name;

					// 		$attribute_value = esc_html( $variation['attributes'][ $attribute_name ] );

					// 		$assigned[ $attribute_name ][ $attribute_value ] = array(
					// 			'image_id'     => $variation['image_id'],
					// 			'variation_id' => $variation['variation_id'],
					// 			'type'         => ( empty( $variation['image_id'] ) ? 'button' : 'image' ),
					// 		);

					// ACTIVE_TODO_OC_END

		return $sp_variations_data;
	}
 
	//	not sure if hook core can callback it on its instance if it is a private function, so kept it public for now. 
	public function get_available_variation_hook_callback( $variation_get_max_purchase_quantity,  $instance,  $variation ,$args = array()) {

		return $this->get_available_variation_core($variation_get_max_purchase_quantity, $instance, $variation, $args);
		
	}

	// for reference see wc_get_product_attachment_props function source code 
	public function get_product_attachment_props( $attachment_id, $product_id = false, $type = null, $strict = true ) {

		// wbc_pr( 'attachment_id >>>>>>>>>>>>> ' );
		// wbc_pr( $attachment_id );

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

		$props['extra_params_org'] = array('type' => $type);

		if($type == 'video' or $type == 'video_url') {

			// ACTIVE_TODO compatability research. it might be important. -- to h and -- to s or -- to a. the research we need to do is woo's support on video. as far as I can say it supports the video for main image but not sure if it supports the video for the main image of the variation also. and if it supports anything else regarding video. either way even if it do not support anything else our video implementation should strictly be following the video layers and standards of woo implementation regarding it. 
			// ACTIVE_TODO for now and very soon we need to give option on admin to control if video should be embeded in iframe or in standard video tag of the html. -- to s 
			// 	TODO and eventually we may also like to give option of specifying the embed type per variation or specific video level. or it can be a pro feature. 
			$props['extra_params_org']['embed_type']   = 'video';

		}

		if($type == 'video_url') {

			$tiny_features_product_page_video_icon = wbc()->options->get_option('tiny_features','tiny_features_product_page_video_icon');
			// NOTE: development adhuru chhe tethi remove karavanu aavshe.
			$tiny_features_product_page_video_icon_url = !empty($tiny_features_product_page_video_icon) ?  wp_get_attachment_url($tiny_features_product_page_video_icon) : esc_url( 'https://icons-for-free.com/download-icon-play+icon-1320167992475058341_64.ico' );
			// ACTIVE_TODO we need to provide default video play icon for slider thumb -- to s & -- to h
			// 	--  and then also provide option on admin to change this icon -- to s & -- to h
			// 		--  however this need to be done from those form images loop where root data is prepared. and also check if there related comments related to this task somewhere else -- to h 
			// ACTIVE_TODO temp.
			$props['src']   = $tiny_features_product_page_video_icon_url;
			$props['gallery_thumbnail_src']   = $tiny_features_product_page_video_icon_url;
			// $props['gallery_thumbnail_src_w']   = esc_attr( 100 );
			// $props['gallery_thumbnail_src_h']   = esc_attr( 100 );

			//NOTE: from here we are setting to video, so whatever data pre prepared for attachment should be set from here. and then it is planned that video url type would work as if it is video type, so all that is needed is setting data accurately from here.
			$props['extra_params_org']['type']   = 'video';

		}


		// classes
		$props['class']                         = 'img-item img-item-'.$props['extra_params_org']['type'].' img-item-'.$props['extra_params_org']['type'].'-'.wbc()->common->current_theme_key();

		$props['class_wrapper']                 = '';


		if($type == 'video_url') {

			$props['video_src']   = esc_url( $attachment_id );
			return $props;

		}


		$attachment = null;

		$attachment = get_post( $attachment_id );

		// if the direct url is passed 
		if( ( empty($attachment) || is_wp_error($attachment) ) && strpos($attachment_id, 'http') !== false ) {

			$attachment = true;

			$props['url']                         = $attachment_id/*wc_placeholder_img_src()*/;
			$props['full_src']                    = $props['url'];
			$props['src']                         = $props['url'];
			$props['gallery_thumbnail_src']       = $props['url'];
			$props['archive_src']                 = $props['url'];

			$attachment_id = 0;
		}

		if ($strict) {

			// $attachment = get_post( $attachment_id );

		} else {

			if (!$strict and empty($attachment)) {

				$props['url']                         = wc_placeholder_img_src();
				$props['full_src']                    = $props['url'];
				$props['src']                         = $props['url'];
			}

		}

		if ( $attachment ) {

			$alt_text = array();

			if(!empty($attachment_id)) {

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
			}

			if ( $product_id ) {
				$product    = wc_get_product( $product_id );
				$alt_text[] = wp_strip_all_tags( get_the_title( $product->get_id() ) );
			}

			$alt_text     = array_filter( $alt_text );
			$props['alt'] = isset( $alt_text[0] ) ? $alt_text[0] : '';

			if(empty($type) || $type == 'image') {				
			
				if(!empty($attachment_id)) {

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
				
				} else {

					$props['full_class'] = "attachment-full_size_class-unknown size-full_size_class-unknown";
					//$props[ 'full_srcset' ] = wp_get_attachment_image_srcset( $attachment_id, $full_size );
					//$props[ 'full_sizes' ]  = wp_get_attachment_image_sizes( $attachment_id, $full_size );
				}

			} else {

				$props['full_class'] = "attachment-video";
				//$props[ 'full_srcset' ] = wp_get_attachment_image_srcset( $attachment_id, $full_size );
				//$props[ 'full_sizes' ]  = wp_get_attachment_image_sizes( $attachment_id, $full_size );

			}
			
			

			if(empty($type) || $type == 'image') {

				if(!empty($attachment_id)) {

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
				
				} else {

					$props['gallery_thumbnail_class'] = "attachment-gallery_thumbnail_class-unknown size-gallery_thumbnail_class-unknown";
					//$props[ 'gallery_thumbnail_srcset' ] = wp_get_attachment_image_srcset( $attachment_id, $gallery_thumbnail );
					//$props[ 'gallery_thumbnail_sizes' ]  = wp_get_attachment_image_sizes( $attachment_id, $gallery_thumbnail );					
				}

			} else {
	
				$props['gallery_thumbnail_class'] = "attachment-thumbnail-video";
				//$props[ 'gallery_thumbnail_srcset' ] = wp_get_attachment_image_srcset( $attachment_id, $gallery_thumbnail );
				//$props[ 'gallery_thumbnail_sizes' ]  = wp_get_attachment_image_sizes( $attachment_id, $gallery_thumbnail );

			}

			if(empty($type) || $type == 'image') {

				if(!empty($attachment_id)) {

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
				} else {

					$props['archive_class'] = "attachment-archive_thumbnail_class-unknown size-archive_thumbnail_class-unknown";
					//$props[ 'archive_srcset' ] = wp_get_attachment_image_srcset( $attachment_id, $thumbnail_size );
					//$props[ 'archive_sizes' ]  = wp_get_attachment_image_sizes( $attachment_id, $thumbnail_size );

				}

			} else {

				$props['archive_class'] = "attachment-archive-video";
				//$props[ 'archive_srcset' ] = wp_get_attachment_image_srcset( $attachment_id, $thumbnail_size );
				//$props[ 'archive_sizes' ]  = wp_get_attachment_image_sizes( $attachment_id, $thumbnail_size );

			}

			if(empty($type) || $type == 'image') {

				if(!empty($attachment_id)) {

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
					$props['class']  = "wp-post-image spui-post-image attachment-$image_size_class size-$image_size_class ";
					$props['srcset'] = wp_get_attachment_image_srcset( $attachment_id, $image_size );
					$props['sizes']  = wp_get_attachment_image_sizes( $attachment_id, $image_size );
				}

				//ACTIVE_TODO/TODO we have fixed here a issue related to srcset. the issue was that srcset function was returning the false and it was creating issue on the browsers. but we have no idea why for some images it was returned false. now we had just fixed the browsr side issue by setting bool false to empty string or anything that is empty to empty string. so it solved the browser error but the data error is not solved and on different devices or for different image size requiremnets it maybe a big concern. so we may like to fix it asap. or if it is not an issue at all then just remove the ACTIVE_TODO and TODO. 
				if (empty($props['srcset'])) {
					
					$props['srcset'] = '';
				}

				// -- dump @a--
				// if( wbc()->sanitize->get('is_test') == 1 ) {
				// // 	wbc_pr('wp_get_attachment_url');
				// // 	wbc_pr(wp_get_attachment_url(13780)); 
				// 	wbc_pr('srcset dump');
				// 	wbc_pr(wp_get_attachment_image_srcset( $attachment_id,  array( 'i600', 'i1000', 'i1200' )  ));
				// 	wbc_pr($attachment_id);
				// 	wbc_pr($image_size);
				// }

			}else{

				$src            = wp_get_attachment_url( $attachment_id);
				$props['src']   = esc_url( $src );

			}

			$props['extra_params'] = wc_implode_html_attributes( $props['extra_params_org'] );

		}

		return $props;

	}

	public static function sp_variations_swatches_supported_attribute_types($configs = array()){

		$type = array();
		$type['button']='Button';
		$type['color']='Color';
		$type['image']='Icon';
		$type['image_text']='Icons with Text';
		$type['dropdown_image']='Dropdown with Icons';
		$type['dropdown_image_only']='Dropdown with Icons Only';
		$type['dropdown']='Dropdown';

		if(empty($type['is_base_type_only'])){

			return apply_filters('sp_variations_swatches_attribute_types', $type);	 
		
		} else {

			return $type;
		}

	}

	public static function sp_variations_gallery_images_supported_types($configs = array()){

		$type = array();
		$type['image']='Image';
		$type['video']='Video';
		$type['video_url'] = 'Video Url';

		if(empty($type['is_base_type_only'])){

			return apply_filters('sp_variations_gallery_images_types', $type);	 
		
		} else {

			return $type;
		}

	}

	public static function get_default_attributes($product_id){

		$product = wc_get_product( $product_id );

		if ( ! $product->is_type( 'variable' ) ) {
			return array();
		}

		$variable_product = new \WC_Product_Variable( absint( $product_id ) );

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

	public static function selected_variation_attributes($default_attributes) {

		/*ACTIVE_TODO_OC_START
		ACTIVE_TODO we must do it by second revision right now we are not supporting the variation id or query paramas of _attributs and checklist and so on to load selected variation based dom and its images. but we must do by second revision or before that as soon as the seo reports and so on requires that or something else requires it.
			NOTE: the variation_id support is now added in the get_default_variation_id function as that seem to be more suitabe layer for that. 
		ACTIVE_TODO_OC_END*/
		// $default_attributes = \eo\wbc\system\core\SP_Router::get_query_params_formated('attr', $input_method, 'key_value');

		// if(!empty($default_attributes)) {
			
		// }

		return $default_attributes;

	}

	public static function get_default_variation_id($product, $attributes){

		// NOTE: right now we have added the variation id support in url get perameter in below if condition but if we find better placeholder for this layer than we can move out of this function.
		$variation_id = wbc()->sanitize->get('variation_id');
		if(!empty($variation_id)) {

			return $variation_id;
		}

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

		$data_store = \WC_Data_Store::load( 'product' );

		return $data_store->find_matching_product_variation( $product, $attributes );
		
	}

	public static function get_available_variation($product_id, $variation_id){

		$variable_product = new \WC_Product_Variable( $product_id );
		$variation        = $variable_product->get_available_variation( $variation_id );

		return $variation;

	}


	public static function wc_product_has_attribute_type( $type, $attribute_name ) {

		$attributes           = wc_get_attribute_taxonomies();
		$attribute_name_clean = str_replace( 'pa_', '', wc_sanitize_taxonomy_name( $attribute_name ) );

		// Created Attribute
		if ( 'pa_' === substr( $attribute_name, 0, 3 ) ) {


			$attribute = array_values(
				array_filter(
					$attributes, function ( $attribute ) use ( $type, $attribute_name_clean ) {
					return $attribute_name_clean === $attribute->attribute_name;
				}
				)
			);

			if ( ! empty( $attribute ) ) {
				$attribute =  $attribute[0];
			} else {
				$attribute = \eo\wbc\system\core\data_model\SP_Attribute::get_wc_attribute_taxonomy( $attribute_name );
			}

			//ACTIVE_TODO not sure if this check is really necessary, and we may like to consider it for dropping if it is not necessary. but it might be since it seems community standard logic. 
			return isset( $attribute->attribute_type ) && ( $attribute->attribute_type == $type );
		} else {
			return false;
		}
	}
	
	public static function get_available_variations( $product ) {

		if ( is_numeric( $product ) ) {
			$product = wc_get_product( absint( $product ) );
		}

		return $product->get_available_variations();
	}

	private function get_available_variation_core( $variation_get_max_purchase_quantity,  $instance,  $variation, $args = array()){
		

		$product_id         = is_object($variation)? absint( $variation->get_parent_id() ) : null;
		$variation_id       = is_object($variation)? absint( $variation->get_id() ) : null;
		$variation_image_id = is_object($variation)? absint( $variation->get_image_id() ) : null;

		return $this->get_variations_and_simple_type_fields($variation_get_max_purchase_quantity,  $instance,  $variation,$product_id, $variation_id, $variation_image_id, $args);

	}
	
	public function get_variations_and_simple_type_fields( $variation_get_max_purchase_quantity,  $instance,  $variation,$product_id, $id, $variation_image_id, $args = array()){
		

		$gallery_images_types 					  = self::sp_variations_gallery_images_supported_types(array('is_base_type_only'=>true));	

		if(!isset($variation_get_max_purchase_quantity['form'])){

			$args['form_definition'] = \eo\wbc\controllers\admin\menu\page\Tiny_features::instance()->init(array('temporary_get_form_directly'=>true, 'is_legacy_admin'=>true, 'data'=>array('id'=>$id)));
			// ACTIVE_TODO there is big architectural error here but it as might be because of our incomplete implementation of data class(which would be commonly used by the admin and frontend modules) which planned in get data function of single product model -- the error here is it is directly calling the function of parent class instead of calling its own model of the tiny features. 
			$data 				= \eo\wbc\model\admin\Eowbc_Model::instance()->get($args['form_definition'],array('page_section'=>'sp_variations', 'is_convert_das_to_array'=>true, 'id'=>$id, 'is_legacy_admin'=>true ));
		}else{

			$data = $variation_get_max_purchase_quantity['form'];
		}

		//  $product                      = wc_get_product( $product_id );

		$gallery_images = array();	
		if ( !empty($data['sp_variations']["form"]) ) {
			// echo"12121212112";
			// wbc_pr($data['sp_variations']["form"]); 
			foreach($data['sp_variations']["form"] as $key=>$fv){

				if( !in_array($fv["type"], \eo\wbc\model\admin\Form_Builder::savable_types())) {

					// wbc_pr("continue type if");
					// wbc_pr(\eo\wbc\model\admin\Form_Builder::savable_types());
					// wbc_pr($fv['type']);
					
					continue;
				}

				$value = $fv['value'];
				
				// echo ">>>>>>>>>>> data fields";
				// wbc_pr($key);
				// wbc_pr($fv);

				if ( strpos( $key, 'sp_variations_gallery_images' ) !== false ) {

					if (!empty($value)) {
						array_push($gallery_images,array('type'=>'image','value'=>$value,'key'=>$key));
					}
					
				} elseif ( strpos( $key, 'sp_variations_video_url' ) !== false ) {

					if (!empty($value)) {
						
						array_push($gallery_images,array('type'=>'video_url','value'=>$value,'key'=>$key));
					}

				} elseif ( strpos( $key, 'sp_variations_video' ) !== false ) {

					if (!empty($value)) {
						array_push($gallery_images,array('type'=>'video','value'=>$value,'key'=>$key));
					}

				} else {

					$value_arr = apply_filters('sp_variations_available_variation_type', array('type'=>null,'value'=>$value,'key'=>$key), $key );
					// echo "2222222222";	
					// wbc_pr($value_arr);
					if( !empty($value_arr['type']) && !empty($gallery_images_types[$value_arr['type']]) ) {
						
						array_push($gallery_images, $value_arr);
					}
				}

			}
			//echo'ssssssssssssss';
			// wbc_pr($gallery_images);

		} /*else {
			wbc_pr($gallery_images);
			// $gallery_images = $product->get_gallery_image_ids();
			$gallery_images = $instance->get_gallery_image_ids();
		}*/

		$is_empty = true;
		foreach($gallery_images as $image){

			if (!empty($image['value'])) {
				
				$is_empty = false;

				break;
			}
		}

		if ($is_empty){

			// ACTIVE_TODO/TODO here if requaird than simply apply the is_class condition for wc_product class or even wc_variation class but nothing else. -- to h -- to a
				// ACTIVE_TODO and we should creat two common function for checking object for both above classes -- to h -- to a   
			if(is_object($instance)){

				// $gallery_images = $product->get_gallery_image_ids();
				$gallery_images = $instance->get_gallery_image_ids();
			}

		}

		if( wbc()->sanitize->get('is_test') == 1 ) {

			wbc_pr("fffffffffffffffffffffffff");
			wbc_pr($variation_image_id);
		}

		/*ACTIVE_TODO here we still needd one more hook to let any layers set their item at particular index -- to s
			--  apply filter from here
				--  add filter from ssm_shared class 
				--  and at there do swap logic*/

		// NOTE: this function will return also the default(or say the data that are supported and provided by legacy api) data as applicable like below image or all other such applicable default data 
		if ( $variation_image_id ) {

			// Add Variation Default Image
			array_unshift( $gallery_images, $variation_image_id );
		} else {
			// Add Product Default Image
			/*if ( has_post_thumbnail( $product_id ) ) {
				array_unshift( $gallery_images, get_post_thumbnail_id( $product_id ) );
			}*/
			$parent_product_image_id = null;

			if(!empty($product_id)){
	
				$parent_product          = wc_get_product( $product_id );
				$parent_product_image_id = $parent_product->get_image_id();
			}

			$placeholder_image_id    = get_option( 'woocommerce_placeholder_image', 0 );
			if ( ! empty( $parent_product_image_id ) ) {
				array_unshift( $gallery_images, $parent_product_image_id );
			} else {
				array_unshift( $gallery_images, $placeholder_image_id );
			}
		}

		$variation_get_max_purchase_quantity['variation_gallery_images'] = array();

		// echo ">>>>>>>>>>> gallery_images";
		// wbc_pr($gallery_images);

		// sort 
		$gallery_images_new = array();
		$gallery_images_sort_order = array();

		foreach($gallery_images as $value){

			if (isset($value['sort_order']) ) {

				array_push($gallery_images_sort_order, $value);

			} else {

				// NOTE: keep the default at top.
				array_push($gallery_images_new, $value);

			}

		}

		usort($gallery_images_sort_order,function($a,$b){
            // return $a[2]-$b[2];
            return ((int)$a['sort_order'])-((int)$b['sort_order']);
        });

        foreach($gallery_images_sort_order as $value){

			array_push($gallery_images_new, $value);

		}

		$gallery_images = $gallery_images_new;

		// echo ">>>>>>>>>>> gallery_images";
		// wbc_pr($gallery_images);
		
		if ( !empty($data['sp_variations']["form"]) ) {

			foreach ( $gallery_images as $i=>$value ) {
				// echo ">>>>>>>>>>> gallery_images (wbc-variations)";
				// wbc_pr($value['value']);
				// wbc_pr($value['type']);
		
				if ( is_array($value) ) {

					$image = $this->get_product_attachment_props( $value['value'],false,$value['type']);

					$variation_get_max_purchase_quantity['variation_gallery_images'][ $i ] = apply_filters('sp_variations_available_variation_image_attachment_props', $image, $value, $value['key'], $variation, $instance );
		// 			echo ">>>>>>>>>>> gallery_images_finel".$i;
		// wbc_pr($variation_get_max_purchase_quantity['variation_gallery_images'][ $i ]);

				} else {

					$variation_get_max_purchase_quantity['variation_gallery_images'][ $i ] = $this->get_product_attachment_props( $value);
				}
			}

		} else {

			foreach ( $gallery_images as $i => $variation_gallery_image_id ) {

				$variation_get_max_purchase_quantity['variation_gallery_images'][ $i ] = $this->get_product_attachment_props( $variation_gallery_image_id );
			}
		/*	wbc_pr($variation_get_max_purchase_quantity);
			die();*/
		}

		// echo ">>>>>>>>>>> gallery_images_finel";
		// wbc_pr($variation_get_max_purchase_quantity['variation_gallery_images']);

		// apply filter hook here to let extensions filter over swatches data, with key sp_variations_available_variation -- to d or -- to b done
		
		// return apply_filters( 'sp_variations_available_variation', $variation_get_max_purchase_quantity, $variation, $product_id );

		return $variation_get_max_purchase_quantity;

	}

	public function get_default_gallery_images( $product_id ) {

		$product              = wc_get_product( $product_id );
		$product_id           = $product->get_id();
		$attachment_ids       = $product->get_gallery_image_ids( 'edit' );
		$post_thumbnail_id    = $product->get_image_id( 'edit' );
		$has_post_thumbnail   = has_post_thumbnail();
		$images               = array();
		$placeholder_image_id = get_option( 'woocommerce_placeholder_image', 0 );


		/*if ( has_post_thumbnail( $product_id ) ) {
			array_unshift( $gallery_images, get_post_thumbnail_id( $product_id ) );
		}*/

		// ACTIVE_TODO implement remove featured images
		$remove_featured_image = false;


		// IF PLACEHOLDER IMAGE HAVE VIDEO IT MAY NOT LOAD.
		if ( ! empty( $post_thumbnail_id ) ) {
			array_unshift( $attachment_ids, $post_thumbnail_id );
		} else {
			array_unshift( $attachment_ids, $placeholder_image_id );
		}

		if ( is_array( $attachment_ids ) && ! empty( $attachment_ids ) ) {

			foreach ( $attachment_ids as $i => $image_id ) {

				if ( $remove_featured_image && absint( $post_thumbnail_id ) == absint( $image_id ) ) {
					continue;
				}

				$images[] = $this->get_product_attachment_props( $image_id, $product );
			}
		}

		return $images;
	}

	public static function prepare_swatches_data($args = array()){

		$data = array();
		/*$html = $args['hook_callback_args']['html'];
        $hook_args = $args['hook_callback_args']['hook_args'];*/

        //ACTIVE_TODO nid to manage default when we provide default setting on admin has planed.
		$args['hook_callback_args']['hook_args']['type']                  = isset($args['hook_callback_args']['hook_args']['type']) ? $args['hook_callback_args']['hook_args']['type'] : 'button';

       // first apply filter hook here with key default_sp_variations_swatches_variation_attribute_options_html -- to d or -- to b 
       // add filter to below hook simply from the swatches_init section of fetch_data functio n variations class -- to d done
        	//--	and then inside put an if condition that check the hook_args['type'](note the level of type param) against our sp_variations_swatches_supported_attribute_types function that is in the same class -- to d done
        	/*ACTIVE_TODO_OC_START
        		--	and if condition is true for new hook below, then simply return is two elements is_return_default_html and html -- to d 
        			--	and then on the selectorn hook render layers instead of calling the templating layers flows just return the html if above flag is detected -- to d 
        	ACTIVE_TODO_OC_END*/
		if (apply_filters( 'default_sp_variations_swatches_variation_attribute_options_html', false, $args['hook_callback_args']['hook_args'], $args['hook_callback_args']['html'] ))
		{
			$data = array();			
			$data['is_return_default_html'] = true;
			$data['html'] = $args['hook_callback_args']['html'];
			return $data;

		}

        // ACTIVE_TODO mark this as deprecated and we maybe like a mechanisam flow now in our releases change logs or somewhere else on wordpress.org page which list such things on appropriate corners/sections of technical details 	
		if ( apply_filters( 'default_wbc_variation_attribute_options_html', false, $args['hook_callback_args']['hook_args'], $args['hook_callback_args']['html'] ) ) {
            return $args['hook_callback_args']['html'];
        }

		
    	//move it to sp_wbc_compatability function woo_general_broad_matters_compatability -- to d done 
        // WooCommerce Product Bundle Fixing

        ///////////////// -- 16-06-2022 -- @drashti -- ///////////////

        // if ( isset( $_POST[ 'action' ] ) && wbc()->sanitize->post('action') === 'woocommerce_configure_bundle_order_item' ) {
        //     return $html;
        // }

        // \eo\wbc\model\SP_WBC_Compatibility::instance()->woo_general_broad_matters_compatability($section);

        // remove $html from below and just return true from there, that will do it -- to d or -- to b done
        if(\eo\wbc\model\SP_WBC_Compatibility::instance()->woo_general_broad_matters_compatability('woocommerce_configure_bundle')){
        	return $args['hook_callback_args']['html'];
        }
        /*ACTIVE_TODO_OC_START
        --	fix the below get text call -- to d 
        ACTIVE_TODO_OC_END*/
		// For bundle Product static item
		$args['hook_callback_args']['hook_args']['show_option_none'] = eowbc_lang_esc_html__( 'Choose an option', 'woo-variation-swatches' );

		/*ACTIVE_TODO_OC_START
		ACTIVE_TODO we also need to provide default setting and I think we can 
		simply give dropdown with three options like default to image, button or dropdown_image 
		ACTIVE_TODO_OC_END*/

		// $is_default_to_image          = apply_filters( 'wvs_is_default_to_image', ! ! ( woo_variation_swatches()->get_option( 'default_to_image' ) ), $args['hook_callback_args']['hook_args'] );
		// $is_default_to_button         = apply_filters( 'wvs_is_default_to_button', ! ! ( woo_variation_swatches()->get_option( 'default_to_button' ) ), $args['hook_callback_args']['hook_args'] );
		// $default_image_type_attribute = apply_filters( 'wvs_default_image_type_attribute', woo_variation_swatches()->get_option( 'default_image_type_attribute' ), $args['hook_callback_args']['hook_args'] );

		// $is_default_to_image_button = ( $is_default_to_image || $is_default_to_button );

		// ACTIVE_TODO maybe this currency var need to be removed, but confirm if used here or in the plugin we were exploring -- to d
		// ACTIVE_TODO it will be necessary when we do caching implementation 
		// $currency       = get_woocommerce_currency();

        // commented on 24-10-2022 becose was unussed
        // $attribute_id = wc_variation_attribute_name( $args['hook_callback_args']['hook_args'][ 'attribute' ] );
        
        // commented on 24-10-2022 becose was unussed
        // $attribute_name = sanitize_title( $args['hook_callback_args']['hook_args'][ 'attribute' ] );

        // wbc()->load->model('category-attribute');
        // $attribute = \eo\wbc\model\Category_Attribute::instance()->get_attribute(str_replace('pa_','',$args['hook_callback_args']['hook_args'][ 'attribute' ]));
        $attribute = apply_filters('sp_wbc_get_attribute', null, str_replace('pa_','',$args['hook_callback_args']['hook_args'][ 'attribute' ]) );

        // commented on 24-10-2022 becose was unussed
        // $product_id = $args['hook_callback_args']['hook_args'][ 'product' ]->get_id();


        /*ACTIVE_TODO_OC_START
		----------- most of is to be discared 
		ACTIVE_TODO_OC_END*/

		//-- also call get_data of model from above the selectron is called for swatches, call with first param as swatches_init -- to b done
			//--	and below call it with swatches only as first param -- to b done
				// --	done	and in fetch_data function in wbc variations set proper if conditions there -- to ddddd 

				/*ACTIVE_TODO_OC_START
				--	ACTIVE_TODO and if required then in fetch_data swatches_init also there will be a binding to hook available_variation just like there is going to be for gallery_images_init. this is only modular and efficient way so for both will be separate and still it can use same callback function with page_section means swatches_init etc. param passed there also -- to d 
				ACTIVE_TODO_OC_END*/

		// ob_start();

		if(empty($args['product'])) {

			global $product;
		} else {

			$product = $args['product'];
		}

		$data = self::fetch_data('swatches', $product, $args)/*get_data('swatches')*/; 
        // commented on 24-10-2022 becose was unussed
		// $attributes = $data['attributes']; /*$product->get_variation_attributes();*/
        // commented on 24-10-2022 becose was unussed
		// $variations = $data['variations']; /*$product->get_available_variations();*/


        $type = null;	// 'select';     
        if(!empty($attribute->attribute_type)){
        	$type = $attribute->attribute_type;

        	// ACTIVE_TODO we need to derive the type right from the woo layers, so need to ensure that we implement the flow like the plugin we were exploring is doing. it is critically important and should do asap. before beta version. -- to h and -- to s 
        	$args['hook_callback_args']['hook_args']['type'] = $type;	
        } else {
        	$type = 'select';
        }

        // added on 03-07-2023
        // NOTE: as we have thought of and very well planned to support the legacy types and on that regard all the legacy layers and functions and flows, so here now we have enabled the legecy type support.
        if(!in_array($type,self::sp_variations_swatches_supported_attribute_types())) {
			
			// if( wbc()->sanitize->get('is_test') == 2 ) {
			// 	wbc_pr('sp_variations_swatches_supported_attribute_types if');
			// 	wbc_pr($type);
			// }

			// ACTIVE_TODO so far we have tested and enabled only the select type of woocommerce. But as soon as we get chance lets enable the other legacy type that woocommerce supports.
			// 	NOTE: and for the notes the default imlimentation of the wbc sp_variations is seprate thing and is supposed to be implimented on the underneath to this layer in the else condition below, that is dedicated for the default layer of the wbc sp_variations type support. 
        	if( 'select' == $type ) {
	
				$data = array();			
				$data['is_return_default_html'] = true;
				$data['html'] = $args['hook_callback_args']['html'];
				return $data;
        	}
        }    

        // //add or condition here to apply_filter with key sp_variations_supporting_attribute_type with default to false and second arg will be type -- to b done
        // 	//--	and now need to add that hook to add type on woo attribute admin, see details in ssm variations class -- to d done
        // if(in_array($type,\eo\wbc\model\publics\SP_WBC_Variations::sp_variations_swatches_supported_attribute_types())) {
	
        // 	$args['hook_callback_args']['html'] = call_user_func_array(
        // 		array($this,'variation_options'),array(
        // 		array(
        //         	'options'    => $args['hook_callback_args']['hook_args'][ 'options' ],
        //         	'attribute'  => $args['hook_callback_args']['hook_args'][ 'attribute' ],
        //         	'product'    => $args['hook_callback_args']['hook_args'][ 'product' ],
        //             'selected'   => $args['hook_callback_args']['hook_args'][ 'selected' ],
        //             'type'       => $type,
        //             'is_archive' => ( isset( $args['hook_callback_args']['hook_args'][ 'is_archive' ] ) && $args['hook_callback_args']['hook_args'][ 'is_archive' ]),
        //             'attribute_object' => $attribute
        //         ))
        // 	);
        // }            
        $args['hook_callback_args']['hook_args']['attribute_object'] = $attribute;


        /*ACTIVE_TODO_OC_START
        //the rest of the broad flow would be like, the prepare_swatches_data will return back the prepared data to controller -- to b done
        	-- but for the below layers and above if is to be clearer yet -- to h 
        			//--	the flow will be like the prepare_swatches_data will prepare main and broad level data. get_data call is already done but follow points if ther are added any sub points below -- to b done
        				//--	atleast need to create one function sp_variations_swatches_supported_attribute_types, in wbc variations class -- to d  done
        					//--	and that will host all free types, so find that in those our woo related files -- to d done
        						//--	to find the root of type list check from where those chooser functions are referenced -- to d done
        					//--	and additionally it will apply that filter hook on above free type array -- to d done
        					//--	and then the free list on the woo should be populated from above sp_variations_swatches_supported_attribute_types function -- to d done
        					--	and on ssm variations clas s create overrided function sp_variations_swatches_supported_attribute_types and it will bind to above hooks and add additional type that extensions may have registered in thier config -- to d 
        						//--	so this function should be called always when extension loads since it is going to be depended on by both admin and frontend so can maybe call from http handler but since extensions so far do not have that so call from other applicable place with comment "ACTIVE_TODO when there is http handler class for extensions then move it there" -- to d done
        					//--	and above in_array condition should also call that function, so remove the hardcoded array from here -- to b done 
        						//--	also now remove that or condition hook that we added since that will be now from the base function -- to b done
        			--	and additionally this model will have prepare_variable_item_data and prepare_variable_item_wrapper_data function that will be called from the prepare_swatches_data function loop. so simply follow the code loop below and it will use the data from above get_data call and rest if added from below -- to b 
        					--	additionally there will be one more function prepare_swatches_data_by_attribute_type and that will be actually called from prepare_swatches_data and the two functions mentioned above (including on more mentioned below so total three) will be called from this function -- to b 
        				--	create below mentioned functions first and add call to them. -- to b 
	        				--	firstly the prepare_woo_dropdown_attribute_html_data function will be called, so create that function -- to b 
	        					-- then prepare_variable_item_data function will be called -- to b 
	        					--	then prepare_variable_item_wrapper_data function will be called -- to b 
	        			--	and then derive its code from the plugin we were exploring and put it there but additionally compare with our code of similar function layers and take our unique flows and put it there -- to b 
	        			// --	and then prepare data and in all three functions and put it in $data array and return back -- to b done
	        			// 	--	and in this process there will be one hook(mentioned below for specific min max and so on ops) with key sp_prepare_swatches_data_by_attribute_type that will be applied as filter hook on $data or $options var from the above  prepare_swatches_data_by_attribute_type function after it had aquire data response by calling all three functions above -- to b done
								--	bind to above hook from the respective models of each extensions from their function -- to d 
									--	so first create same heirarchy of functions in each extensions -- to d 
										--	b will assist with atleast first extension means with size extension -- to b and -- to d 
										--	then after the prepare_swatches_data_by_attribute_type function is created then from there bind to the hook sp_prepare_swatches_data_by_attribute_type -- to d 
        		--	and then the controller will call load_view function of the controller using the data recieved from the above prepare data set of functions, and template flows will handled from there as outlined in the below list of points -- to b 
        				--	there will be one wrapper function render_swatches_data_by_attribute_type, in the same options controller and will be called from the load_view function -- to b 
        						--	and from above function there will be three functions that will be called and that will also be in controller. they are render_woo_dropdown_attribute_html_data, render_variable_item_data, and render_variable_item_wrapper_data so create those functions and call to them -- to b 
        							--	and from above three fucntions the respective templates are loaded with particular data, so it will call the getUI function with specific params and data and that will load the ui templates using the get_ui_definition function -- to b 
        								--	and the woo dropdown attribute html will also be loaded from tempalte so create one template for that in the templates folder -- to b 
        									--	ACTIVE_TODO in future if required then we need to give control to extensions as well to load their specific template by overridding the filter hook that we can publish or we can give set of hooks that extensions can use to contol/override certain aspects of that template -- to h or -- to b 
        							//--	and after the call to render_woo_dropdown_attribute_html_data there will be one filter hook that will be applied which is sp_render_swatches_data_by_attribute_type with first param to be null and if that returned any html then the other two functions will not be called. so it will be if conditions with $hooked_html assignment. -- to b done
        								//--	bind to above hook from the respective models of each extensions from their function -- to d done
        									//--	so first create same heirarchy of functions in each extensions -- to d done
        										//--	b will assist with atleast first extension means with size extension -- to b and -- to d done 
        										//--	then after the render_swatches_data_by_attribute_type function is created then from there bind to the hook sp_render_swatches_data_by_attribute_type -- to d done
        				--	but before above hooks still there is one more hook that is of doing specific ops on the attribute options means args param below like that size extension have min max and so on logic and similarly if others have something else -- covered above already  
        					-- so all such logics of such extensions which are moved to render_ui will be implemented after they bind to above hook, so they will bind to above hook in ssm variations class or their own variations class -- to b 
        					--	however above html hook will be bound from the single product ssm model maybe or in their own model -- to b 
        		--	and apart from load view the controller layer can additionally create render fucntions like render_image_gallery_template and so on are in model, for example render_variations_swatches_attribute_types to implement some specific logic or conditions but yeah the get ui definition will striictly be managed from controller layers as per fundamental mvc architecture. -- to h or -- to b. ACTIVE_TODO 
        			--	NOTE: now while all hooks required by above extensions and extensions can do their job using those hooks then so not sure if render_variations_swatches_attribute_types function in the model is necessary or not. 

        	ACTIVE_TODO_OC_END*/
        	
			if ( \eo\wbc\model\publics\data_model\SP_WBC_Variations::wc_product_has_attribute_type( $type, $args['hook_callback_args']['hook_args']['attribute'] ) ) {

				$data = self::prepare_swatches_data_by_attribute_type($data,$args);

			} else{
				/*ACTIVE_TODO_OC_START
				ACTIVE_TODO need to implement the default implementation very soon. 



				ACTIVE_TODO we may very soon like to do the logic of using variation image as the option image and something such 
					--	and this point is related default settings planned above, means the default_image_type_attribute 
				ACTIVE_TODO_OC_END*/
				// if ( $default_image_type_attribute === '__max' ) {

				// 	$attribute_counts = array();
				// 	foreach ( $attributes as $attr_key => $attr_values ) {
				// 		$attribute_counts[ $attr_key ] = count( $attr_values );
				// 	}

				// 	$max_attribute_count = max( $attribute_counts );
				// 	$attribute_key       = array_search( $max_attribute_count, $attribute_counts );

				// } elseif ( $default_image_type_attribute === '__min' ) {
				// 	$attribute_counts = array();
				// 	foreach ( $attributes as $attr_key => $attr_values ) {
				// 		$attribute_counts[ $attr_key ] = count( $attr_values );
				// 	}
				// 	$min_attribute_count = min( $attribute_counts );
				// 	$attribute_key       = array_search( $min_attribute_count, $attribute_counts );

				// } elseif ( $default_image_type_attribute === '__first' ) {
				// 	$attribute_keys = array_keys( $attributes );
				// 	$attribute_key  = current( $attribute_keys );
				// } else {
				// 	$attribute_key = $default_image_type_attribute;
				// }

				// $selected_attribute_name = wc_variation_attribute_name( $attribute_key );


				// $default_attribute_keys = array_keys( $attributes );
				// $default_attribute_key  = current( $default_attribute_keys );
				// $default_attribute_name = wc_variation_attribute_name( $default_attribute_key );

				// $current_attribute      = $args['hook_callback_args']['hook_args']['attribute'];
				// $current_attribute_name = wc_variation_attribute_name( $current_attribute );


				// if ( $is_default_to_image ) {

				// 	$assigned = array();

				// 	foreach ( $variations as $variation_key => $variation ) {

				// 		$attribute_name = isset( $variation['attributes'][ $selected_attribute_name ] ) ? $selected_attribute_name : $default_attribute_name;

				// 		$attribute_value = esc_html( $variation['attributes'][ $attribute_name ] );

				// 		$assigned[ $attribute_name ][ $attribute_value ] = array(
				// 			'image_id'     => $variation['image_id'],
				// 			'variation_id' => $variation['variation_id'],
				// 			'type'         => ( empty( $variation['image_id'] ) ? 'button' : 'image' ),
				// 		);
				// 	}

				// 	$type     = ( empty( $assigned[ $current_attribute_name ] ) ? 'button' : 'image' );
				// 	$assigned = ( isset( $assigned[ $current_attribute_name ] ) ? $assigned[ $current_attribute_name ] : array() );

				// 	if ( $type === 'button' && ! $is_default_to_button ) {
				// 		$type = 'select';
				// 	}

				// 	wvs_default_image_variation_attribute_options(
				// 		apply_filters(
				// 			'wvs_variation_attribute_options_args', wp_parse_args(
				// 				$args['hook_callback_args']['hook_args'], array(
				// 					'options'    => $args['hook_callback_args']['hook_args']['options'],
				// 					'attribute'  => $args['hook_callback_args']['hook_args']['attribute'],
				// 					'product'    => $product,
				// 					'selected'   => $args['hook_callback_args']['hook_args']['selected'],
				// 					'assigned'   => $assigned,
				// 					'type'       => $type,
				// 					'is_archive' => ( isset( $args['hook_callback_args']['hook_args']['is_archive'] ) && $args['hook_callback_args']['hook_args']['is_archive'] )
				// 				)
				// 			)
				// 		)
				// 	);

				// }

			}

		// $data = ob_get_clean();

		return $data;

	}

	public static function prepare_swatches_data_by_attribute_type($data,$args = array()){

		//here recieve the $data param of the caller function -- to b  done

		$data = self::prepare_woo_dropdown_attribute_html_data($data,$args);

		/*ACTIVE_TODO_OC_START
		------------------a etlu wvs_default_button_variation_attribute_options alg che
			--	for this need to compare default and take unique too -- to b 
			$content = wvs_default_variable_item( $type, $options, $args );
		-------------
		----------a etlu wvs_default_image_variation_attribute_options alg che
			--	for this need to compare default and take unique too -- to b 
		if ( $type === 'select' ) {
			return '';
		}

		$content = wvs_default_variable_item( $type, $options, $args );
		-------
		ACTIVE_TODO_OC_END*/
		/*$content = wvs_variable_item( $type, $options, $args );*/

		$data = self::prepare_variable_item_data($data,$args);
		$data = self::prepare_variable_item_wrapper_data($data,$args);

		// TODO OPTIMIZATION in future if it seems worth it then we can prevent above layers from preparing unnecessary options and then we can simply skip array slice from below.
			// NOTE: above optimisation is no more possible since now we can not do array_slice since we need all swatches options on dom so that javascript layer can function and so now all the swatches option are rendered but the additional swatches option beyond limit are made hidden.
		$data['woo_dropdown_attribute_html_data']['args']['actual_total_options'] = null;
		
		global $woocommerce_loop;

		if ( $data['woo_dropdown_attribute_html_data']['args']['sp_variations_swatches_cat_display_limit'] > 0 && ( ! is_product() || $woocommerce_loop['name'] == 'related' ) ) {
			
			if ( $data['woo_dropdown_attribute_html_data']['product'] && taxonomy_exists( $data['variable_item_data']['attribute'] ) ) {

			  	$data['woo_dropdown_attribute_html_data']['args']['actual_total_options'] = count($data['variable_item_data']['terms']);  

			} else {

			  	$data['woo_dropdown_attribute_html_data']['args']['actual_total_options'] = count($data['woo_dropdown_attribute_html_data']['options']);  

			}

			if( $data['woo_dropdown_attribute_html_data']['args']['actual_total_options'] > $data['woo_dropdown_attribute_html_data']['args']['sp_variations_swatches_cat_display_limit'] ) {

				if(isset($data['woo_dropdown_attribute_html_data']['terms'])){

					// $data['woo_dropdown_attribute_html_data']['terms'] = array_slice( $data['woo_dropdown_attribute_html_data']['terms'], 0, $data['woo_dropdown_attribute_html_data']['args']['sp_variations_swatches_cat_display_limit'] );
					$counter = -1;
					foreach ( $data['woo_dropdown_attribute_html_data']['terms'] as $index => $term ) {
						if ( in_array( $term->slug, $data['woo_dropdown_attribute_html_data']['options'], true ) ) {
							$counter++;
							if($counter >= $data['woo_dropdown_attribute_html_data']['args']['sp_variations_swatches_cat_display_limit']){

									$data['woo_dropdown_attribute_html_data']['options_loop_class'][$term->slug] .= ' hide '; 
									// wbc_pr('woo_dropdown_attribute_html_data options_loop_class');
									// wbc_pr($data['woo_dropdown_attribute_html_data']['args']['sp_variations_swatches_cat_display_limit']);
							}
						}
					}
				}

				if(isset($data['woo_dropdown_attribute_html_data']['options'])){

					// $data['woo_dropdown_attribute_html_data']['options'] = array_slice( $data['woo_dropdown_attribute_html_data']['options'], 0, $data['woo_dropdown_attribute_html_data']['args']['sp_variations_swatches_cat_display_limit'] );
					$counter = -1;
					foreach ( $data['woo_dropdown_attribute_html_data']['options'] as $option ) {
						$counter++;
						if($counter >= $data['woo_dropdown_attribute_html_data']['args']['sp_variations_swatches_cat_display_limit']){

							$data['woo_dropdown_attribute_html_data']['options_loop_class'][$option] .= ' hide '; 
						}
					}
				}

				if(isset($data['variable_item_data']['terms'])){

					// $data['variable_item_data']['terms'] = array_slice( $data['variable_item_data']['terms'], 0, $data['woo_dropdown_attribute_html_data']['args']['sp_variations_swatches_cat_display_limit'] );
					// foreach ( $data['variable_item_data']['terms'] as $term ) {
						// $data['variable_item_data']['options_loop_class'][$term->slug] .= 'hide '; 
					// }
				}
			}
		}

		return apply_filters('sp_prepare_swatches_data_by_attribute_type',$data);
	}

	public static function prepare_woo_dropdown_attribute_html_data ($data,$args = array()){

		if( wbc()->sanitize->get('is_test') == 1 ) {
			wbc_pr('sp-wbc-variations [prepare_woo_dropdown_attribute_html_data]');
		}

		$data['woo_dropdown_attribute_html_data'] = array();
		$attributes = $data['attributes']; /*$product->get_variation_attributes();*/
        // commented on 24-10-2022 becose was unussed
		// $variations = $data['variations'];

		// create two static methods in the SP_Attribue clas s, namely variation_attribute_name and variation_option_name -- to d done
		// 	and the ove the respective logic from below to there -- to d done 
		// 		--	and then replace below statements with function calls to that class -- to d done
		// and create one more function get_product_terms, a public static function in the same class SP_Attribue -- to d done
		// 	and the ove the respective logic from below to there -- to d done
		// 		--	and then replace below statements with function calls to that class -- to d done

		$data['woo_dropdown_attribute_html_data']['args'] = wp_parse_args(
			$args['hook_callback_args']['hook_args'], array(
				'options'          => false,
				'attribute'        => false,
				'product'          => false,
				'selected'         => false,
				'name'             => '',
				'id'               => '',
				'class'            => '',
				'type'             => '',
				'assigned'         => '',
				/*ACTIVE_TODO_OC_START
				fix the below get text call -- to d 
				ACTIVE_TODO_OC_END*/
				'show_option_none' => esc_html__( 'Choose an option', 'woo-variation-swatches' )
			)
		);

		if( wbc()->sanitize->get('is_test') == 1 ){

			wbc_pr('sp-wbc-variations [prepare_woo_dropdown_attribute_html_data] attribute');
			wbc_pr($args['hook_callback_args']['hook_args']['attribute']);
		}
		// ACTIVE_TODO here we should be setting the values from the woo_dropdown data args and not from hook callback args, but still check the plugin we were exploring to see if there is any reason to do it other way around. -- to b 
		$data['woo_dropdown_attribute_html_data']['type']                  = $args['hook_callback_args']['hook_args'][ 'type' ];
		/*ACTIVE_TODO_OC_START
		--------------a etlu wvs_default_button_variation_attribute_options alg che
		ACTIVE_TODO_OC_END*/
		//ACTIVE_TODO nid to manage default when we provide default setting on admin has planed.
		$data['woo_dropdown_attribute_html_data']['type']                  = $args['hook_callback_args']['hook_args']['type'] ? $args['hook_callback_args']['hook_args']['type'] : 'button';
		/*ACTIVE_TODO_OC_START
		------------------
		ACTIVE_TODO_OC_END*/
		$data['woo_dropdown_attribute_html_data']['options']               = $args['hook_callback_args']['hook_args']['options'];
		$data['woo_dropdown_attribute_html_data']['product']               = $args['hook_callback_args']['hook_args']['product'];
		$data['woo_dropdown_attribute_html_data']['attribute']             = $args['hook_callback_args']['hook_args']['attribute'];
		$data['woo_dropdown_attribute_html_data']['name']                  = $args['hook_callback_args']['hook_args']['name'] ? $args['hook_callback_args']['hook_args']['name'] : apply_filters('sp_wbc_variation_attribute_name', null, $data['woo_dropdown_attribute_html_data']['attribute']);  /*\eo\wbc\system\core\data_model\SP_Attribute::variation_attribute_name($data['woo_dropdown_attribute_html_data']['attribute']);*/
		$data['woo_dropdown_attribute_html_data']['id']                    = $args['hook_callback_args']['hook_args']['id'] ? $args['hook_callback_args']['hook_args']['id'] : sanitize_title( $data['woo_dropdown_attribute_html_data']['attribute']);
		$data['woo_dropdown_attribute_html_data']['class']                 = $args['hook_callback_args']['hook_args']['class'];
		$data['woo_dropdown_attribute_html_data']['show_option_none']      = $args['hook_callback_args']['hook_args']['show_option_none'] ? true : false;
		$data['woo_dropdown_attribute_html_data']['show_option_none_text'] = $args['hook_callback_args']['hook_args']['show_option_none'] ? $args['hook_callback_args']['hook_args']['show_option_none'] : esc_html__( 'Choose an option', 'woocommerce' ); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.

		// classes
		$data['woo_dropdown_attribute_html_data']['class']                 = 'variable-item ' .esc_attr( $data['woo_dropdown_attribute_html_data']['type'] ).'-variable-item spui-wbc-swatches-variable-item spui-wbc-swatches-variable-item-'.$data['woo_dropdown_attribute_html_data']['type']. ' spui-wbc-swatches-variable-item-header spui-wbc-swatches-variable-item-'.$data['woo_dropdown_attribute_html_data']['type'].'-header variable-item-'.wbc()->common->current_theme_key(). ' variable-item-'.esc_attr( $data['woo_dropdown_attribute_html_data']['type'] ).'-'.wbc()->common->current_theme_key();

		// defined limit
			// NOTE: right now we are limiting swatches options right from the data layer here and maintaining actual_total_options var which can be used on template layers. but if in future woo hiden select dropdown or js layer require all options then we need to provide that in seprate variable. 
		$data['woo_dropdown_attribute_html_data']['args']['sp_variations_swatches_cat_display_limit'] = get_term_meta( $data['woo_dropdown_attribute_html_data']['args']['attribute_object']->attribute_id, 'sp_variations_swatches_cat_display_limit', true );
		
		if (empty($data['woo_dropdown_attribute_html_data']['args']['sp_variations_swatches_cat_display_limit'] )) {

			$data['woo_dropdown_attribute_html_data']['args']['sp_variations_swatches_cat_display_limit'] = wbc()->config->product_variations_configs()['sp_variations_swatches_cat_display_limit'];
		}


		// show_on_shop_page  
		$data['woo_dropdown_attribute_html_data']['args']['sp_variations_swatches_show_on_shop_page'] = get_term_meta( $data['woo_dropdown_attribute_html_data']['args']['attribute_object']->attribute_id, 'sp_variations_swatches_show_on_shop_page', true );

		//	set default 
		if (empty($data['woo_dropdown_attribute_html_data']['args']['sp_variations_swatches_show_on_shop_page'] )) {

			$data['woo_dropdown_attribute_html_data']['args']['sp_variations_swatches_show_on_shop_page'] = 1;
		}


		if ( empty( $data['woo_dropdown_attribute_html_data']['options'] ) && ! empty( $data['woo_dropdown_attribute_html_data']['product'] ) && ! empty( $data['woo_dropdown_attribute_html_data']['attribute'] ) ) {
			/*ACTIVE_TODO_OC_START
			-- recieve data in function params to till this function, since I think we have exact same data on above layers but still confirm -- to b 
				-- below we seem to have made be mistack by commenting the below line which was reading variation attributes using $product from function get_variation_attributes, because here the read of data must be product specific -- to h
			ACTIVE_TODO_OC_END*/
			//$data['woo_dropdown_attribute_html_data']['attributes'] = $product->get_variation_attributes();
			$data['woo_dropdown_attribute_html_data']['options']    = $attributes[ $data['woo_dropdown_attribute_html_data']['attribute']  ];
		}

		/*ACTIVE_TODO_OC_START
		---------- move to /var/www/html/wp/wp-content/plugins/woo-bundle-choice/templates/single-product/variations-swatches/woo_dropdown_attribute/woo_dropdown_attribute.php file ma

		--------------a etlu wvs_default_button_variation_attribute_options alg che
		ACTIVE_TODO_OC_END*/
		if ( $data['woo_dropdown_attribute_html_data']['product'] ) {
			$data['woo_dropdown_attribute_html_data']['attribute_name'] = apply_filters('sp_wbc_variation_attribute_name', null, $data['woo_dropdown_attribute_html_data']['attribute']);//\eo\wbc\system\core\data_model\SP_Attribute::variation_attribute_name($data['woo_dropdown_attribute_html_data']['attribute']);

			/*echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . $type . '" style="display:none" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';*/

		}
		/*ACTIVE_TODO_OC_START
		------------------
		

		-------------- a etlu wvs_default_image_variation_attribute_options alg che
		ACTIVE_TODO_OC_END*/
		if ( $data['woo_dropdown_attribute_html_data']['product'] ) {


			/*if ( $data['woo_dropdown_attribute_html_data']['type'] === 'select' ) {
				echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
			} else {
				echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . $type . '" style="display:none" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
			}*/
		}
		/*ACTIVE_TODO_OC_START
		------------------
		ACTIVE_TODO_OC_END*/
		/*if ( $data['woo_dropdown_attribute_html_data']['product'] && taxonomy_exists( $data['woo_dropdown_attribute_html_data']['attribute'] ) ) {
			echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . esc_attr( $type ) . '" style="display:none" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
		} else {
			echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
		}*/

		//----- move to /woo-bundle-choice/templates/single-product/variations-swatches/woo_dropdown_attribute/woo_dropdown_attribute-template_part.php file ma
		/*if ( $args['hook_callback_args']['hook_args']['show_option_none'] ) {
			echo '<option value="">' . esc_html( $show_option_none_text ) . '</option>';
		}*/

		if ( ! empty( $data['woo_dropdown_attribute_html_data']['options'] ) ) {

			global $woocommerce_loop;

			
			$query_params = \eo\wbc\model\SP_WBC_Router::instance()->get_query_params_formatted('url_and_filter_form', array('attr'), 'REQUEST', null);
			// wbc_pr('query_params');
			// wbc_pr($query_params);
			// wbc_pr($data['woo_dropdown_attribute_html_data']['attribute']);

			$data['woo_dropdown_attribute_html_data']['query_paramas_options'] = null;
			if(in_array($data['woo_dropdown_attribute_html_data']['attribute'] , $query_params)){

				// wbc_pr('in if');
				$data['woo_dropdown_attribute_html_data']['query_paramas_options'] = \eo\wbc\model\SP_WBC_Router::instance()->get_query_params_formatted('url_and_filter_form', array('attr_options', $data['woo_dropdown_attribute_html_data']['attribute']) , 'REQUEST', null);
				// wbc_pr("data['woo_dropdown_attribute_html_data']['query_paramas_options']");
				// wbc_pr($data['woo_dropdown_attribute_html_data']['query_paramas_options']);
			}

			if ( $data['woo_dropdown_attribute_html_data']['product'] && taxonomy_exists( $data['woo_dropdown_attribute_html_data']['attribute'] ) ) {

				if( wbc()->sanitize->get('is_test') == 1 ) {
					wbc_pr('sp-wbc-variations [prepare_woo_dropdown_attribute_html_data] if');
				}

				// Get terms if this is a taxonomy - ordered. We need the names too.
				$data['woo_dropdown_attribute_html_data']['terms'] = apply_filters('sp_wbc_get_product_terms', null, $data['woo_dropdown_attribute_html_data']['product'], $data['woo_dropdown_attribute_html_data']['attribute'], array( 'fields' => 'all' ), $data);// \eo\wbc\system\core\data_model\SP_Attribute::get_product_terms( $data['woo_dropdown_attribute_html_data']['product']->get_id(), $data['woo_dropdown_attribute_html_data']['attribute'], array( 'fields' => 'all' ) );

				$data['woo_dropdown_attribute_html_data']['options_loop_selected'] = array();
				$data['woo_dropdown_attribute_html_data']['options_loop_option_name'] = array();
				$data['woo_dropdown_attribute_html_data']['options_loop_class'] = array();
				$data['woo_dropdown_attribute_html_data']['options_loop_html_attr'] = array();
				foreach ( $data['woo_dropdown_attribute_html_data']['terms'] as $term ) {
					if ( in_array( $term->slug, $data['woo_dropdown_attribute_html_data']['options'], true ) ) {

						if(!empty($data['woo_dropdown_attribute_html_data']['query_paramas_options']) && in_array($term->slug, $data['woo_dropdown_attribute_html_data']['query_paramas_options'])) {

							$data['woo_dropdown_attribute_html_data']['args'][ 'selected' ] = $term->slug;
						}

						// wbc_pr("data['woo_dropdown_attribute_html_data']['args'][ 'selected' ]01");
						// wbc_pr($data['woo_dropdown_attribute_html_data']['args'][ 'selected' ]);
						// wbc_pr($data['woo_dropdown_attribute_html_data']['query_paramas_options']);

						$data['woo_dropdown_attribute_html_data']['options_loop_class'][$term->slug] = esc_attr( $data['woo_dropdown_attribute_html_data']['type'] ).'-variable-item-'.esc_attr( $term->slug );

						$data['woo_dropdown_attribute_html_data']['options_loop_selected'][$term->slug] = ( ( (sanitize_title( $args['hook_callback_args']['hook_args']['selected'] ) === $args['hook_callback_args']['hook_args']['selected']) /*|| (!empty($data['woo_dropdown_attribute_html_data']['query_paramas_options']) && in_array($term->slug, $data['woo_dropdown_attribute_html_data']['query_paramas_options']))*/ ) ? selected( $args['hook_callback_args']['hook_args']['selected'], sanitize_title( $term->slug ), false ) : selected( $args['hook_callback_args']['hook_args']['selected'], $term->slug, false ) );

						$data['woo_dropdown_attribute_html_data']['options_loop_option_name'][$term->slug] = apply_filters('sp_wbc_variation_option_name', null, $term->name , $term, $data['woo_dropdown_attribute_html_data']['attribute'], $data['woo_dropdown_attribute_html_data']['product']); //\eo\wbc\system\core\data_model\SP_Attribute::variation_option_name( $term->name, $term, $data['woo_dropdown_attribute_html_data']['attribute'], $data['woo_dropdown_attribute_html_data']['product']);

						// ACTIVE_TODO right now we are managing selected attribute from the common woo dropdown attribute template but in future we should managing from the data layer here.
						$data['woo_dropdown_attribute_html_data']['options_loop_html_attr'][$term->slug] = array('data-value'=>esc_attr( $term->slug ), 'data-title'=>$data['woo_dropdown_attribute_html_data']['options_loop_option_name'][$term->slug] );

						if( wbc()->sanitize->get('is_test') == 1 ) {
							wbc_pr('sp-wbc-variations [prepare_woo_dropdown_attribute_html_data] if data-value');
							wbc_pr($data['woo_dropdown_attribute_html_data']['options_loop_html_attr'][$term->slug]);
						}

						/*echo '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $args['selected'] ), $term->slug, false ) . '>' . esc_html( \eo\wbc\system\core\data_model\SP_Attribute()::instance()->variation_option_name( $term_name, $term, $attribute, $product) ) . '</option>';*/
					}
				}

			} else {

				if( wbc()->sanitize->get('is_test') == 1 ) {
					wbc_pr('sp-wbc-variations [prepare_woo_dropdown_attribute_html_data] else');
				}

				$data['woo_dropdown_attribute_html_data']['options_loop_selected'] = array();
				$data['woo_dropdown_attribute_html_data']['options_loop_option_name'] = array();
				$data['woo_dropdown_attribute_html_data']['options_loop_class'] = array();
				$data['woo_dropdown_attribute_html_data']['options_loop_html_attr'] = array();
				foreach ( $data['woo_dropdown_attribute_html_data']['options'] as $option ) {

					if( wbc()->sanitize->get('is_test') == 1 ) {
						wbc_pr('sp-wbc-variations [prepare_woo_dropdown_attribute_html_data] else loop');
					}

					if(!empty($data['woo_dropdown_attribute_html_data']['query_paramas_options']) && in_array($option, $data['woo_dropdown_attribute_html_data']['query_paramas_options'])) {

						$data['woo_dropdown_attribute_html_data']['args'][ 'selected' ] = $option;
					}
					// wbc_pr("data['woo_dropdown_attribute_html_data']['args'][ 'selected' ]02");
					// wbc_pr($data['woo_dropdown_attribute_html_data']['args'][ 'selected' ]);

					$data['woo_dropdown_attribute_html_data']['options_loop_class'][$option] = esc_attr( $data['woo_dropdown_attribute_html_data']['type'] ).'-variable-item-'.esc_attr( $option );

					// This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
					$data['woo_dropdown_attribute_html_data']['options_loop_selected'][$option] = ( ( ( sanitize_title( $args['hook_callback_args']['hook_args']['selected'] ) === $args['hook_callback_args']['hook_args']['selected']) /*|| (!empty($data['woo_dropdown_attribute_html_data']['query_paramas_options']) && in_array($option, $data['woo_dropdown_attribute_html_data']['query_paramas_options']))*/ ) ? selected( $args['hook_callback_args']['hook_args']['selected'], sanitize_title( $option ), false ) : selected( $args['hook_callback_args']['hook_args']['selected'], $option, false ) );

					$data['woo_dropdown_attribute_html_data']['options_loop_option_name'][$option] = apply_filters('sp_wbc_variation_option_name', null, $option , null, $data['woo_dropdown_attribute_html_data']['attribute'], $data['woo_dropdown_attribute_html_data']['product']); // \eo\wbc\system\core\data_model\SP_Attribute::variation_option_name( $option, null, $data['woo_dropdown_attribute_html_data']['attribute'], $data['woo_dropdown_attribute_html_data']['product']);

					if( wbc()->sanitize->get('is_test') == 1 ) {
						wbc_pr('sp-wbc-variations [prepare_woo_dropdown_attribute_html_data] else loop data-value');
						wbc_pr($data['woo_dropdown_attribute_html_data']['options_loop_html_attr']);
					}

					$data['woo_dropdown_attribute_html_data']['options_loop_html_attr'][$option] = array('data-value' => esc_attr( $option ), 'data-title' => esc_attr( $option ) );

					/*echo '<option value="' . esc_attr( $option ) . '" ' . $selected . '>' . esc_html( \eo\wbc\system\core\data_model\SP_Attribute()::instance()->variation_option_name( $term_name, $term, $attribute, $product) . '</option>';*/
				}
			}
		}

		/*echo '</select>';*/

		return $data;
	}

	public static function prepare_variable_item_data ($data,$args = array()){

		if( wbc()->sanitize->get('is_test') == 1 ) {
			wbc_pr('sp-wbc-variations [prepare_variable_item_data]');
		}

		$data['variable_item_data'] = array();

		$data['variable_item_data']['product']   = $data['woo_dropdown_attribute_html_data']['product'];
		$data['variable_item_data']['attribute'] = $data['woo_dropdown_attribute_html_data']['attribute'];
		$data['variable_item_data']['data']      = '';
		/*ACTIVE_TODO_OC_START
		--------- a etlu wvs_default_variable_item alg che
		ACTIVE_TODO_OC_END*/
			$data['variable_item_data']['assigned']  = $data['woo_dropdown_attribute_html_data']['args']['assigned'];

			$data['variable_item_data']['is_archive']           = ( isset( $data['woo_dropdown_attribute_html_data']['args']['is_archive'] ) && $data['woo_dropdown_attribute_html_data']['args']['is_archive'] );
			$data['variable_item_data']['show_archive_tooltip'] = false;	//	ACTIVE_TODO very soon we may like provide this setting on admin 

			$data['variable_item_data']['data'] = '';

			if ( isset( $data['woo_dropdown_attribute_html_data']['args']['fallback_type'] ) && $data['woo_dropdown_attribute_html_data']['args']['fallback_type'] === 'select' ) {
				//	return '';
			}
		/*ACTIVE_TODO_OC_START
		-----
		------- m have this additional
		ACTIVE_TODO_OC_END*/
			$data['variable_item_data']['id'] = $data['woo_dropdown_attribute_html_data']['args'][ 'id' ] ? $data['woo_dropdown_attribute_html_data']['args'][ 'id' ] : sanitize_title( $data['variable_item_data']['attribute'] );
		/*ACTIVE_TODO_OC_START
		-------
		ACTIVE_TODO_OC_END*/

		if ( ! empty( $data['woo_dropdown_attribute_html_data']['options'] ) ) {

			if ( $data['woo_dropdown_attribute_html_data']['product'] && taxonomy_exists( $data['variable_item_data']['attribute'] ) ) {

				if( wbc()->sanitize->get('is_test') == 1 ) {
					wbc_pr('sp-wbc-variations [prepare_variable_item_data] if');
				}

				$data['variable_item_data']['terms'] = apply_filters('sp_wbc_get_product_terms', null, $data['woo_dropdown_attribute_html_data']['product'], $data['variable_item_data']['attribute'], array( 'fields' => 'all' ), $data); //\eo\wbc\system\core\data_model\SP_Attribute::get_product_terms( $data['woo_dropdown_attribute_html_data']['product']->get_id(), $data['variable_item_data']['attribute'], array( 'fields' => 'all' ) );

				$data['variable_item_data']['name']  = uniqid(apply_filters('sp_wbc_variation_attribute_name', null, $data['variable_item_data']['attribute']) /*\eo\wbc\system\core\data_model\SP_Attribute::variation_attribute_name( $data['variable_item_data']['attribute'] )*/ );
				/*ACTIVE_TODO_OC_START
				keep it and use below data params to make our tempalte dynamic -- to b 	
				------- m have this additional
				ACTIVE_TODO_OC_END*/
				$data['variable_item_data']['selected_item'] = sanitize_title( $data['woo_dropdown_attribute_html_data']['args'][ 'selected' ] );
				if(in_array($data['woo_dropdown_attribute_html_data']['type'],array('dropdown_image','dropdown_image_only','dropdown'))) {

					//moved above if condition
					/*$data['variable_item_data']['selected_item'] = sanitize_title( $data['woo_dropdown_attribute_html_data']['args'][ 'selected' ] );*/
					
					if(!empty($data['variable_item_data']['selected_item'])){
						$data['variable_item_data']['selected_item'] = wbc()->wc->get_term_by( 'slug',$data['variable_item_data']['selected_item'],$data['variable_item_data']['attribute']);
						if(!is_wp_error($data['variable_item_data']['selected_item']) and !empty($data['variable_item_data']['selected_item']) ){
							$data['variable_item_data']['image_url'] = get_term_meta( $data['variable_item_data']['selected_item']->term_id, 'wbc_attachment', true );
							
							if($data['woo_dropdown_attribute_html_data']['type']=='dropdown_image' and !empty($data['variable_item_data']['image_url'])) {
								//--- move to woo-bundle-choice/templates/single-product/variations-swatches/dropdown_image/sp_variations_optionsUI-dropdown_image-option_template_part.php file
								/*$selected_item =  sprintf( '<img class="ui mini avatar image" src="%s">%s', esc_url( $image_url ),esc_attr( $selected_item->name ));*/
								
							} elseif ($data['woo_dropdown_attribute_html_data']['type']=='dropdown_image_only' and !empty($data['variable_item_data']['image_url'])) {
								//--- move to /woo-bundle-choice/templates/single-product/variations-swatches/dropdown_image_only/sp_variations_optionsUI-dropdown_image_only-option_template_part.php file 
								/*$selected_item =  sprintf( '<img class="ui mini avatar image" src="%s">', esc_url( $image_url ));*/
							} else {
								//move to /woo-bundle-choice/templates/single-product/variations-swatches/dropdown/sp_variations_optionsUI-dropdown-option_template_part.php file
								/*$selected_item =  sprintf( '%s',esc_attr( $selected_item->name ));*/
							}
						} else {
							$data['variable_item_data']['selected_item'] ='Choose an option';	
						}
					} else{
						$data['variable_item_data']['selected_item'] ='Choose an option';
					}
					//----- move to woo-bundle-choice/templates/single-product/variations-swatches/sp_variations_optionsUI-dropdown-image-image_only.php ma
					/*$data.=sprintf( '<div class="ui fluid selection dropdown" style="min-height: auto;">
							  <input type="hidden" name="attribute_%s" data-attribute_name="attribute_%s" data-id="%s">
							  <i class="dropdown icon"></i>
							  <div class="default text">%s</div>
							  <div class="menu">',esc_attr( $attribute ),esc_attr( $attribute ),esc_attr( $attribute ),$selected_item);*/
				}
				//-------------------
				
				//below moved section should be moved to template part, which would be common amongst non dropdown types. so need to move in a common template part file(and create one if not yet there), and from this file also load dropdown types, which are skipped here but we can manage in some if/else conddition below -- to b done
				//------- m have this additional
				//--- move to woo-bundle-choice/templates/single-product/variations-swatches/sp_variations_optionsUI-common-option_template_part.php ma
				/*foreach ( $terms as $term ) {
					if ( in_array( $term->slug, $options ) ) {
						$selected_class = ( sanitize_title( $args[ 'selected' ] ) == $term->slug ) ? 'selected' : '';
						if(!in_array($type,array('dropdown_image','dropdown_image_only','dropdown'))) {
							$data .= sprintf( '<li class="ui image middle aligned variable-item %1$s-variable-item %1$s-variable-item-%2$s %3$s" title="%4$s" data-value="%2$s" role="button" tabindex="0" data-id="%5$s">', esc_attr( $type ), esc_attr( $term->slug ), esc_attr( $selected_class ), esc_html( $term->name ),$id);
						}						
						ob_start();
						wbc()->load->template("publics/swatches/${type}", array('args'=>$args,'term'=>$term,'type'=>$type));
						$ui_data = ob_get_clean();
						if(empty($ui_data)){
							$data .= apply_filters( 'wvs_variable_default_item_content', '', $term, $args, $saved_attribute );
						} else {
							$data .= $ui_data;	
						}						
						$data .= '</li>';
					}
				}*/
					// ----------
				/*ACTIVE_TODO_OC_START
				and will us e below being prepared data for applying in above templates -- to b 
					--	and apply the optimum number of properties, html attr/class etc from below to above tempaltes. but yeah can skip the tooltip -- to b 
						--	and if there properties in below data which we should implement but if it is not feasible in 1st revision then mark as active to do -- to b 
				ACTIVE_TODO_OC_END*/

				$data['variable_item_data']['options_loop_option'] = array();
				$data['variable_item_data']['options_loop_is_selected'] = array();
				$data['variable_item_data']['options_loop_selected_class'] = array();
				$data['variable_item_data']['options_loop_tooltip'] = array();
				$data['variable_item_data']['options_loop_tooltip_html_attr'] = array();
				$data['variable_item_data']['options_loop_screen_reader_html_attr'] = array();
				$data['variable_item_data']['options_loop_type'] = array();
				$data['variable_item_data']['options_loop_color'] = array();
				$data['variable_item_data']['options_loop_attachment_id'] = array();
				$data['variable_item_data']['options_loop_image_size'] = array();
				$data['variable_item_data']['options_loop_image'] = array();
				$data['variable_item_data']['options_loop_id'] = array();
				$data['variable_item_data']['options_loop_html_attr'] = array();
				foreach ( $data['variable_item_data']['terms'] as $term ) {
					
					if( wbc()->sanitize->get('is_test') == 1 ) {
						wbc_pr('sp-wbc-variations [prepare_variable_item_data] if loop');
					}

					if ( in_array( $term->slug, $data['woo_dropdown_attribute_html_data']['options'], true ) ) {

						if(!empty($data['woo_dropdown_attribute_html_data']['query_paramas_options']) && in_array($term->slug, $data['woo_dropdown_attribute_html_data']['query_paramas_options']) ) {

							$data['woo_dropdown_attribute_html_data']['args'][ 'selected' ] = $term->slug;
						}

						// wbc_pr("data['woo_dropdown_attribute_html_data']['args'][ 'selected' ]03");
						// wbc_pr($data['woo_dropdown_attribute_html_data']['args'][ 'selected' ]);
						// wbc_pr($data['woo_dropdown_attribute_html_data']['query_paramas_options']);

						// aria-checked="false"
						// $data['variable_item_data'][$term->slug]['option'] = esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name, $term, $data['variable_item_data']['attribute'], $data['woo_dropdown_attribute_html_data']['product'] ) );
						$data['variable_item_data']['options_loop_option'][$term->slug] = esc_html(apply_filters('sp_wbc_variation_option_name', null, $term->name, $term, $data['variable_item_data']['attribute'], $data['woo_dropdown_attribute_html_data']['product']) /*\eo\wbc\system\core\data_model\SP_Attribute::variation_option_name($term->name, $term, $data['variable_item_data']['attribute'], $data['woo_dropdown_attribute_html_data']['product'] ) */);

						$data['variable_item_data']['options_loop_is_selected'][$term->slug]    = ( ( sanitize_title( $data['woo_dropdown_attribute_html_data']['args']['selected'] ) == $term->slug ) ) /*|| (!empty($data['woo_dropdown_attribute_html_data']['query_paramas_options']) && in_array($term->slug, $data['woo_dropdown_attribute_html_data']['query_paramas_options']) )*/ ? true : false;
						$data['variable_item_data']['options_loop_selected_class'][$term->slug] = $data['variable_item_data']['options_loop_is_selected'][$term->slug] ? 'selected' : '';

						$data['variable_item_data']['options_loop_tooltip'][$term->slug]        = '';


						$data['variable_item_data']['options_loop_selected_class'][$term->slug] = ( sanitize_title( $data['woo_dropdown_attribute_html_data']['args'][ 'selected' ] ) == $term->slug )  ? 'selected' : '';


						$data['woo_dropdown_attribute_html_data']['options_loop_class'][$term->slug] = esc_attr( $data['woo_dropdown_attribute_html_data']['type'] ).'-variable-item-'.esc_attr( $term->slug ).' '.esc_attr( $data['variable_item_data']['options_loop_selected_class'][$term->slug]);

						// ACTIVE_TODO right now we are managing selected attribute from the common woo dropdown attribute template but in future we should managing from the data layer here.
						$data['variable_item_data']['options_loop_html_attr'][$term->slug] = array( 'data-value' => esc_html( $term->slug ), 'data-title' => esc_html( $term->slug ) );

						if( wbc()->sanitize->get('is_test') == 1 ) {
							wbc_pr('sp-wbc-variations [prepare_variable_item_data] if data-value');
							wbc_pr($data['variable_item_data']['options_loop_html_attr'][$term->slug]);
						}

						/*ACTIVE_TODO_OC_START
						--------- a etlu wvs_default_variable_item alg che
						ACTIVE_TODO_OC_END*/
							if ( $data['variable_item_data']['is_archive'] && ! $data['variable_item_data']['show_archive_tooltip'] ) {
								$data['variable_item_data']['options_loop_tooltip'][$term->slug] = false;
							}
						//--------
						$data['variable_item_data']['options_loop_tooltip_html_attr'][$term->slug]       = ! empty( $data['variable_item_data']['options_loop_tooltip'][$term->slug] ) ? sprintf( ' data-wvstooltip="%s"', esc_attr( $data['variable_item_data']['options_loop_tooltip'][$term->slug] ) ) : '';
						$data['variable_item_data']['options_loop_screen_reader_html_attr'][$term->slug] = $data['variable_item_data']['options_loop_is_selected'][$term->slug] ? ' aria-checked="true"' : ' aria-checked="false"';

						if ( wp_is_mobile() ) {
							$data['variable_item_data']['options_loop_tooltip_html_attr'][$term->slug] .= ! empty( $data['variable_item_data']['options_loop_tooltip'][$term->slug] ) ? ' tabindex="2"' : '';
						}
						/*ACTIVE_TODO_OC_START
						--------- a etlu wvs_default_variable_item alg che
						ACTIVE_TODO_OC_END*/
							$data['variable_item_data']['options_loop_type'][$term->slug] = isset( $data['variable_item_data']['assigned'][ $term->slug ] ) ? $data['variable_item_data']['assigned'][ $term->slug ]['type'] : $data['woo_dropdown_attribute_html_data']['type'];

							if ( ! isset( $data['variable_item_data']['assigned'][ $term->slug ] ) || empty( $data['variable_item_data']['assigned'][ $term->slug ]['image_id'] ) ) {
								$data['variable_item_data']['options_loop_type'][$term->slug] = 'button';
							}
						/*ACTIVE_TODO_OC_START
						-------

						so instead of below templates our tempaltes will be above ones but take note of unique flow or data that we may like to apply -- to b 
						$data .= sprintf( '<li %1$s class="variable-item %2$s-variable-item %2$s-variable-item-%3$s %4$s" title="%5$s" data-title="%5$s" data-value="%3$s" role="radio" tabindex="0"><div class="variable-item-contents">', $data['variable_item_data']['options_loop_screen_reader_html_attr'][$term->slug] . $data['variable_item_data']['options_loop_tooltip_html_attr'][$term->slug], esc_attr( $data['variable_item_data']['options_loop_type'][$term->slug] ), esc_attr( $term->slug ), esc_attr( $data['variable_item_data']['options_loop_selected_class'][$term->slug] ), $data['variable_item_data']['options_loop_option'][$term->slug] );
						--	and same for the many commented templates in the switch case statement below -- to b 
						ACTIVE_TODO_OC_END*/

						switch ( $data['variable_item_data']['options_loop_type'][$term->slug] ):
							case 'color':

								$data['variable_item_data']['options_loop_color'][$term->slug]['color'] = sanitize_hex_color( wvs_get_product_attribute_color( $term ) );
								// $data  .= sprintf( '<span class="variable-item-span variable-item-span-%s" style="background-color:%s;"></span>', esc_attr( $data['variable_item_data']['options_loop_type'][$term->slug] ), esc_attr( $color ) );

								$data['variable_item_data']['options_loop_color'][$term->slug]['color'] = sanitize_hex_color( get_term_meta( $term->term_id, 'wbc_color', true ) );

								break;

							case 'image':
								/*ACTIVE_TODO_OC_START
								--------- a etlu wvs_default_variable_item alg che
								ACTIVE_TODO_OC_END*/
									$data['variable_item_data']['options_loop_attachment_id'][$term->slug] = $data['variable_item_data']['assigned'][ $term->slug ]['image_id'];
									$data['variable_item_data']['options_loop_image_size'][$term->slug]    = sanitize_text_field( woo_variation_swatches()->get_option( 'attribute_image_size' ) );
								//-------
								$data['variable_item_data']['options_loop_attachment_id'][$term->slug] = apply_filters( 'wvs_product_global_attribute_image_id', absint( wvs_get_product_attribute_image( $term ) ), $term, $data['woo_dropdown_attribute_html_data']['args'] );
								$data['variable_item_data']['options_loop_image_size'][$term->slug]    = woo_variation_swatches()->get_option( 'attribute_image_size' );
								/*ACTIVE_TODO_OC_START
								-- ACTIVE_TODO hier manage size width etc image properties
								ACTIVE_TODO_OC_END*/
								$data['variable_item_data']['options_loop_image'][$term->slug]         = get_term_meta( $term->term_id, 'wbc_attachment', true );/*wp_get_attachment_image_src( $data['variable_item_data']['options_loop_attachment_id'][$term->slug]['attachment_id'], apply_filters( 'wvs_product_attribute_image_size', $data['variable_item_data']['options_loop_image_size'][$term->slug]['image_size'], $data['variable_item_data']['attribute'], $data['woo_dropdown_attribute_html_data']['product'] ) );*/

								// $data .= sprintf( '<img class="variable-item-image" aria-hidden="true" alt="%s" src="%s" width="%d" height="%d" />', esc_attr( $data['variable_item_data']['options_loop_option'][$term->slug] ), esc_url( $image[0] ), esc_attr( $image[1] ), esc_attr( $image[2] ) );

								break;


							case 'button':
								// $data .= sprintf( '<span class="variable-item-span variable-item-span-%s">%s</span>', esc_attr( $data['variable_item_data']['options_loop_type'][$term->slug] ), $data['variable_item_data']['options_loop_option'][$term->slug] );
								break;

							case 'radio':
								$data['variable_item_data']['options_loop_id'][$term->slug]    = uniqid( $term->slug );
								// $data .= sprintf( '<input name="%1$s" id="%2$s" class="wvs-radio-variable-item" %3$s  type="radio" value="%4$s" data-title="%5$s" data-value="%4$s" /><label for="%2$s">%5$s</label>', $name, $id, checked( sanitize_title( $data['woo_dropdown_attribute_html_data']['args']['selected'] ), $term->slug, false ), esc_attr( $term->slug ), $data['variable_item_data']['options_loop_option'][$term->slug] );
								break;

							default:
								// $data .= apply_filters( 'wvs_variable_default_item_content', '', $term, $data['woo_dropdown_attribute_html_data']['args'], $saved_attribute );
								break;
						endswitch;
						// $data .= '</div></li>';
					}
				}
				/*ACTIVE_TODO_OC_START
				------- m have this additional
				----- move to woo-bundle-choice/templates/single-product/variations-swatches/sp_variations_optionsUI-dropdown-image-image_only-ribbon_wrapper.php ma
				ACTIVE_TODO_OC_END*/
				/*if(in_array($type,array('dropdown_image','dropdown_image_only','dropdown'))) {
					$data.=sprintf('</div></div>');
				}*/
				//------
			}
			/*ACTIVE_TODO_OC_START
			--------- a etlu wvs_default_variable_item alg che
			ACTIVE_TODO_OC_END*/
				else{

					if( wbc()->sanitize->get('is_test') == 1 ) {
						wbc_pr('sp-wbc-variations [prepare_variable_item_data] else');
					}

					$data['variable_item_data']['options_loop_option'] = array();
					$data['variable_item_data']['options_loop_is_selected'] = array();
					$data['variable_item_data']['options_loop_selected_class'] = array();
					$data['variable_item_data']['options_loop_tooltip'] = array();
					$data['variable_item_data']['options_loop_tooltip_html_attr'] = array();
					$data['variable_item_data']['options_loop_screen_reader_html_attr'] = array();
					$data['variable_item_data']['options_loop_type'] = array();
					$data['variable_item_data']['options_loop_attachment_id'] = array();
					$data['variable_item_data']['options_loop_image_size'] = array();
					$data['variable_item_data']['options_loop_image'] = array();
					$data['variable_item_data']['options_loop_id'] = array();
					$data['variable_item_data']['options_loop_html_attr'] = array();
					foreach ( $data['woo_dropdown_attribute_html_data']['options'] as $option ) {
						// This handles < 2.4.0 bw compatibility where text attributes were not sanitized.

						if(!empty($data['woo_dropdown_attribute_html_data']['query_paramas_options']) && in_array($option, $data['woo_dropdown_attribute_html_data']['query_paramas_options']) ) {

							$data['woo_dropdown_attribute_html_data']['args'][ 'selected' ] = $option;
						}
						// wbc_pr("data['woo_dropdown_attribute_html_data']['args'][ 'selected' ]04");
						// wbc_pr($data['woo_dropdown_attribute_html_data']['args'][ 'selected' ]);

						$data['variable_item_data']['options_loop_option'][$option] = esc_html(apply_filters('sp_wbc_variation_option_name', null, $option, null, $data['variable_item_data']['attribute'], $data['woo_dropdown_attribute_html_data']['product']) /*\eo\wbc\system\core\data_model\SP_Attribute()::instance()->variation_option_name( $option, null, $data['variable_item_data']['attribute'], $data['woo_dropdown_attribute_html_data']['product'] )*/ );

						$data['variable_item_data']['options_loop_is_selected'][$option] = ( ( sanitize_title( $data['variable_item_data']['options_loop_option'][$option] ) == sanitize_title( $data['woo_dropdown_attribute_html_data']['args']['selected'] ) ) /*|| (!empty($data['woo_dropdown_attribute_html_data']['query_paramas_options']) && in_array($option, $data['woo_dropdown_attribute_html_data']['query_paramas_options']) )*/ ) ? true : false;


						$data['variable_item_data']['options_loop_selected_class'][$option] = $data['variable_item_data']['options_loop_is_selected'][$option] ? 'selected' : '';
						$data['variable_item_data']['options_loop_tooltip'][$option]        = trim( apply_filters( 'wvs_variable_item_tooltip', $data['variable_item_data']['options_loop_option'][$option], $data['woo_dropdown_attribute_html_data']['options'], $data['woo_dropdown_attribute_html_data']['args'] ) );

						$data['variable_item_data']['options_loop_html_attr'][$option] = array('data-value' => esc_html( $option ), 'data-title' => esc_html( $option ));

						if ( $data['variable_item_data']['is_archive'] && ! $show_archive_tooltip ) {
							$data['variable_item_data']['options_loop_tooltip'][$option] = false;
						}

						$data['variable_item_data']['options_loop_tooltip_html_attr'][$option]       = ! empty( $data['variable_item_data']['options_loop_tooltip'][$option] ) ? sprintf( 'data-spuitooltip="%s"', esc_attr( $data['variable_item_data']['options_loop_tooltip'][$option] ) ) : '';
						$data['variable_item_data']['options_loop_screen_reader_html_attr'][$option] = $data['variable_item_data']['options_loop_is_selected'][$option] ? ' aria-checked="true"' : ' aria-checked="false"';

						if ( wp_is_mobile() ) {
							$data['variable_item_data']['options_loop_tooltip_html_attr'][$option] .= ! empty( $data['variable_item_data']['options_loop_tooltip'][$option] ) ? ' tabindex="2"' : '';
						}

						$data['variable_item_data']['options_loop_type'][$option] = isset( $data['variable_item_data']['assigned'][ $data['variable_item_data']['options_loop_option'][$option] ] ) ? $data['variable_item_data']['assigned'][ $data['variable_item_data']['options_loop_option'][$option] ]['type'] : $data['variable_item_data']['options_loop_type'][$option];

						if( wbc()->sanitize->get('is_test') == 1 ) {
							wbc_pr("SP_WBC_Variations 111");
							wbc_pr($data['variable_item_data']);
							// wbc_pr($data['variable_item_data']['options_loop_option'][$option]['option']);
						}

						if ( !is_array($data['variable_item_data']['assigned']) || ! isset( $data['variable_item_data']['assigned'][ $data['variable_item_data']['options_loop_option'][$option]['option'] ] ) || empty( $data['variable_item_data']['assigned'][ $data['variable_item_data']['options_loop_option'][$option] ]['image_id'] ) ) {
							$data['variable_item_data']['options_loop_type'][$option] = 'button';
						}

						/*ACTIVE_TODO_OC_START
						so instead of below templates our tempaltes will be above ones but take note of unique flow or data that we may like to apply -- to b 
						--	and same for the many commented templates in the switch case statement below -- to b 
						ACTIVE_TODO_OC_END*/

						switch ( $data['variable_item_data']['options_loop_type'][$option] ):

							case 'image':
								$data['variable_item_data']['options_loop_attachment_id'][$option] = $data['variable_item_data']['assigned'][ $data['variable_item_data']['options_loop_option'][$option] ]['image_id'];
								$data['variable_item_data']['options_loop_image_size'][$option]    = sanitize_text_field( woo_variation_swatches()->get_option( 'attribute_image_size' ) );
								$data['variable_item_data']['options_loop_image'][$option]         = wp_get_attachment_image_src( $data['variable_item_data']['options_loop_attachment_id'][$option], apply_filters( 'wvs_product_attribute_image_size', $data['variable_item_data']['options_loop_image_size'][$option], $data['variable_item_data']['attribute'], $data['woo_dropdown_attribute_html_data']['product'] ) );

								// $data .= sprintf( '<img class="variable-item-image" aria-hidden="true" alt="%s" src="%s" width="%d" height="%d" />', esc_attr( $option ), esc_url( $image[0] ), esc_attr( $image[1] ), esc_attr( $image[2] ) );
								// $data .= $image_html;
								break;


							case 'button':
								// $data .= sprintf( '<span class="variable-item-span variable-item-span-%s">%s</span>', esc_attr( $data['variable_item_data']['options_loop_type'][$option] ), esc_html( $option ) );
								break;

							default:
								// $data .= apply_filters( 'wvs_variable_default_item_content', '', $option, $data['woo_dropdown_attribute_html_data']['args'], array() );
								break;
						endswitch;
						// $data .= '</div></li>';
					}
				}
			//--------------
		}
		
		return $data;

	}

	public static function prepare_variable_item_wrapper_data ($data,$args = array()){

		//wbc_pr($data); die();
		$data['variable_item_wrapper_data'] = array();
		/*ACTIVE_TODO_OC_START
		keep and make use of below data and load below ribbon wrapper tempalte -- to b 
			--	on this note the actual ribbon wrapper tempalte is below one, so move it there -- to b 
		------- m have this additional
		ACTIVE_TODO_OC_END*/
			$data['variable_item_wrapper_data']['attribute_object'] = $data['woo_dropdown_attribute_html_data']['args']['attribute_object'];

			$data['variable_item_wrapper_data']['css_classes'] = array("{$data['woo_dropdown_attribute_html_data']['type']}-variable-wrapper");

			$data['variable_item_wrapper_data']['ribbon_color'] = get_term_meta( $data['variable_item_wrapper_data']['attribute_object']->attribute_id,'wbc_ribbon_color',true);


			// $data = sprintf( '<div class="ui segment">
	  // 		    <span class="ui ribbon label" style="background-color:%s;border-color:%s;color:white;">%s</span><span><ul class="ui mini images variable-items-wrapper %s" data-attribute_name="%s">%s</ul></span></div>',$ribbon_color,$ribbon_color,$attribute_object->attribute_label,trim( implode( ' ', array_unique( $css_classes ) ) ), esc_attr( \eo\wbc\system\core\data_model\SP_Attribute::instance()->variation_attribute_name($attribute) ), $contents );
		//-------------

		$data['variable_item_wrapper_data']['attribute'] = $data['woo_dropdown_attribute_html_data']['args']['attribute'];
		$data['variable_item_wrapper_data']['options']   = $data['woo_dropdown_attribute_html_data']['args']['options'];

		$data['variable_item_wrapper_data']['css_classes'] = array( "{$data['woo_dropdown_attribute_html_data']['type']}-variable-wrapper" );	/*ACTIVE_TODO nid to add hook if required.  apply_filters( 'wvs_variable_items_wrapper_class', array( "{$data['woo_dropdown_attribute_html_data']['type']}-variable-wrapper" ), $data['woo_dropdown_attribute_html_data']['type'], $data['woo_dropdown_attribute_html_data']['args'], $saved_attribute );*/
		/*ACTIVE_TODO_OC_START
		check about these clear_on_reselect flow, let us check if it is good to do -- to t 
			--	you can check those available demos -- to t 
		ACTIVE_TODO_OC_END*/
		$data['variable_item_wrapper_data']['clear_on_reselect'] = '';	//get_option( 'clear_on_reselect' ) ? 'reselect-clear' : '';

		array_push( $data['variable_item_wrapper_data']['css_classes'], $data['variable_item_wrapper_data']['clear_on_reselect'] );

		// <div aria-live="polite" aria-atomic="true" class="screen-reader-text">%1$s: <span data-default=""></span></div>
		// $data = sprintf( '<ul role="radiogroup" aria-label="%1$s"  class="variable-items-wrapper %2$s" data-attribute_name="%3$s" data-attribute_values="%4$s">%5$s</ul>', esc_attr( wc_attribute_label( $attribute ) ), trim( implode( ' ', array_unique( $css_classes ) ) ), esc_attr( \eo\wbc\system\core\data_model\SP_Attribute::instance()->variation_attribute_name($attribute) ), wc_esc_json( wp_json_encode( array_values( $options ) ) ), $contents );
		
		// classes
		$data['variable_item_wrapper_data']['class_wrapper']                 = 'variable-items-wrapper spui-wbc-swatches-variable-items-wrapper spui-wbc-swatches-variable-items-wrapper-'.$data['woo_dropdown_attribute_html_data']['type'].' '.$data['woo_dropdown_attribute_html_data']['type'].'-variable-wrapper';

		return $data;

	}

	public static function prepare_gallery_template_data($args = array()) {

		/*ACTIVE_TODO_OC_START
		----product no peramiter pass kervano baki che
		ACTIVE_TODO_OC_END*/
		if( wbc()->sanitize->get('is_test') == 1 ) {
	        wbc_pr('wbc-variations prepare_gallery_template_data args');
	    	wbc_pr($args);
	    }
		if(empty($args['product'])) {

			global $product;
		} else {

			$product = $args['product'];
		}

		$data = self::fetch_data( /*$for_section*/'gallery_images', $product, $args );

		$data['gallery_images_template_data'] = array();

		//here recieve the $data param of the caller function -- to b done

		/*ACTIVE_TODO_OC_START
			--	pass it in all three functions called below and prepare the daa in the heirachiical structure the way these loops and functions calls and data and template load sequence is -- to b 
		ACTIVE_TODO_OC_END*/

		// create two static methods in the wbc variations clas s, namely get_default_attributes and get_default_variation_id -- to d done
		// 	and the move the respective logic from below to there -- to d done
		// 		--	and then replace below statements with function calls to that class -- to d done
		// and create one more function get_available_variation, a public static function in the same class wbc variations -- to d done
		// 	and the ove the respective logic from below to there -- to d 
		// 		--	and then replace below statements with function calls to that class -- to d done

		// create two static methods in the SP_Product clas s, namely get_image_id and get_gallery_image_ids -- to d done 
		// 	and the move the respective logic from below to there -- to d done
		// 		--	and then replace below statements with function calls to that class -- to d done

		$data['gallery_images_template_data']['product_id'] = apply_filters('sp_wbc_product_get_id', null, $product); //$product->get_id();

		$data['gallery_images_template_data']['product_sku_experimental'] = apply_filters('sp_wbc_product_get_sku', null, $product);

		if( wbc()->sanitize->get('is_test') == 1 ) {
			wbc_pr('gallery_images_template_data_product_id');
			wbc_pr($data['gallery_images_template_data']['product_id']);
		}

		$data['gallery_images_template_data']['default_attributes'] =  null;
		if (!empty($data['gallery_images_template_data']['product_id'])) {
			
			$data['gallery_images_template_data']['default_attributes'] = \eo\wbc\model\publics\data_model\SP_WBC_Variations::instance()->get_default_attributes($data['gallery_images_template_data']['product_id']);
		}

		$data['gallery_images_template_data']['default_attributes'] = self::selected_variation_attributes($data['gallery_images_template_data']['default_attributes']);

		/*ACTIVE_TODO_OC_START
		ACTIVE_TODO we ma like to add apply_filters hook here like above hook sp_wbc_product_get_id if we have to support defolt varashon on page lode. an at that time ma need to creat apply_filters hook for above default attribute also. -- to h  
		ACTIVE_TODO_OC_END*/
		$data['gallery_images_template_data']['default_variation_id'] = null;
		if (!empty($data['gallery_images_template_data']['default_attributes'])) {
		
			$data['gallery_images_template_data']['default_variation_id'] = \eo\wbc\model\publics\data_model\SP_WBC_Variations::instance()->get_default_variation_id($product, $data['gallery_images_template_data']['default_attributes'] );
		}

		$data['gallery_images_template_data']['product_type'] = apply_filters('sp_wbc_product_get_type', null, $product); //$product->get_type();

		if( wbc()->sanitize->get('is_test') == 1 ) {
			wbc_pr('gallery_images_template_data_product_type');
			wbc_pr($data['gallery_images_template_data']['product_type']);
		}

		// ACTIVE_TODO we may like to use the columns var later to till gallery_images slider and zoom module layers including till applicable js layers -- to h or -- to d 
		$data['gallery_images_template_data']['columns'] = -1;	//	thumbnail columns 

		$data['gallery_images_template_data']['post_thumbnail_id'] =  apply_filters('sp_wbc_get_image_id', null, $product,null); // \eo\wbc\system\core\data_model\SP_Product::get_image_id($product);
	    
		$data['gallery_images_template_data']['attachment_ids'] = apply_filters('sp_wbc_get_gallery_image_ids', null, $product, $data['gallery_images_template_data']['product_id'], $data['gallery_images_template_data']['post_thumbnail_id'], $args); //\eo\wbc\system\core\data_model\SP_Product::get_gallery_image_ids($product);

		$data['gallery_images_template_data']['has_post_thumbnail'] = apply_filters('sp_wbc_has_post_thumbnail', null, $data['gallery_images_template_data']['post_thumbnail_id']); //has_post_thumbnail();

		// No main image but gallery
		if ( ! $data['gallery_images_template_data']['has_post_thumbnail'] && count( $data['gallery_images_template_data']['attachment_ids'] ) > 0 ) {
			$data['gallery_images_template_data']['post_thumbnail_id'] = $data['gallery_images_template_data']['attachment_ids'][0]['image_id'];
			array_shift( $data['gallery_images_template_data']['attachment_ids'] );
			$data['gallery_images_template_data']['has_post_thumbnail'] = true;
		}

		if ( 'variable' === $data['gallery_images_template_data']['product_type'] && $data['gallery_images_template_data']['default_variation_id'] > 0 ) {

			$data['gallery_images_template_data']['product_variation'] = \eo\wbc\model\publics\data_model\SP_WBC_Variations::instance()->get_available_variation($data['gallery_images_template_data']['product_id'], $data['gallery_images_template_data']['default_variation_id']);

			if( wbc()->sanitize->get('is_light_test') == 1 ) {

				wbc_pr("SP_WBC_Variations prepare_gallery_template_data");
				wbc_pr($data['gallery_images_template_data']['product_variation']);
			}

			if ( isset( $data['gallery_images_template_data']['product_variation']['image_id'] ) ) {
				$data['gallery_images_template_data']['post_thumbnail_id']  = $data['gallery_images_template_data']['product_variation']['image_id'];
				$data['gallery_images_template_data']['has_post_thumbnail'] = true;
			}

			if ( isset( $data['gallery_images_template_data']['product_variation']['variation_gallery_images'] ) ) {
				$data['gallery_images_template_data']['attachment_ids'] = wp_list_pluck( $data['gallery_images_template_data']['product_variation']['variation_gallery_images'], 'image_id' );
				array_shift( $data['gallery_images_template_data']['attachment_ids'] );
			}
		}

		$data['gallery_images_template_data']['has_gallery_thumbnail'] = ( $data['gallery_images_template_data']['has_post_thumbnail'] && ( count( $data['gallery_images_template_data']['attachment_ids'] ) > 0 ) );

		$data['gallery_images_template_data']['only_has_post_thumbnail'] = ( $data['gallery_images_template_data']['has_post_thumbnail'] && ( count( $data['gallery_images_template_data']['attachment_ids'] ) === 0 ) );

		// $wrapper                          = sanitize_text_field( get_option( 'woo_variation_gallery_and_variation_wrapper', apply_filters( 'woo_variation_gallery_and_variation_default_wrapper', '.product' ) ) )
		/*ACTIVE_TODO_OC_START
		$slider_js_options = array(
			'slidesToShow'   => 1,
			'slidesToScroll' => 1,
			'arrows'         => wc_string_to_bool( woo_variation_gallery()->get_option( 'slider_arrow', 'yes', 'woo_variation_gallery_slider_arrow' ) ),
			'adaptiveHeight' => true,
			// 'lazyLoad'       => 'progressive',
			'rtl'            => is_rtl(),
			'prevArrow'      => '<i class="wvg-slider-prev-arrow dashicons dashicons-arrow-left-alt2"></i>',
			'nextArrow'      => '<i class="wvg-slider-next-arrow dashicons dashicons-arrow-right-alt2"></i>',
			'speed'          => absint( woo_variation_gallery()->get_option( 'slide_speed', 300 ) )
		);

		if ( wc_string_to_bool( woo_variation_gallery()->get_option( 'thumbnail_slide', 'yes', 'woo_variation_gallery_thumbnail_slide' ) ) ) {
			$slider_js_options['asNavFor'] = '.woo-variation-gallery-thumbnail-slider';
		}

		if ( wc_string_to_bool( woo_variation_gallery()->get_option( 'slider_autoplay', 'no', 'woo_variation_gallery_slider_autoplay' ) ) ) {
			$slider_js_options['autoplay']      = true;
			$slider_js_options['autoplaySpeed'] = absint( woo_variation_gallery()->get_option( 'slider_autoplay_speed', 5000, 'woo_variation_gallery_slider_autoplay_speed' ) );
		}

		if ( wc_string_to_bool( woo_variation_gallery()->get_option( 'slider_fade', 'no', 'woo_variation_gallery_slider_fade' ) ) ) {
			$slider_js_options['fade'] = true;
		}

		$gallery_slider_js_options = apply_filters( 'woo_variation_gallery_slider_js_options', $slider_js_options );

		$gallery_thumbnail_position              = sanitize_textarea_field( woo_variation_gallery()->get_option( 'thumbnail_position', 'bottom', 'woo_variation_gallery_thumbnail_position' ) );
		$gallery_thumbnail_position_small_device = sanitize_textarea_field( woo_variation_gallery()->get_option( 'thumbnail_position_small_device', 'bottom' ) );


		//
		$thumbnail_js_options = array(
			'slidesToShow'   => $columns,
			'slidesToScroll' => $columns,
			'focusOnSelect'  => true,
			// 'dots'=>true,
			'arrows'         => wc_string_to_bool( woo_variation_gallery()->get_option( 'thumbnail_arrow', 'yes' ) ),
			'asNavFor'       => '.woo-variation-gallery-slider',
			'centerMode'     => true,
			'infinite'       => true,
			'centerPadding'  => '0px',
			'vertical'       => in_array( $gallery_thumbnail_position, array( 'left', 'right' ) ),
			'rtl'            => woo_variation_gallery()->set_rtl_by_position( $gallery_thumbnail_position ),
			'prevArrow'      => '<i class="wvg-thumbnail-prev-arrow dashicons dashicons-arrow-left-alt2"></i>',
			'nextArrow'      => '<i class="wvg-thumbnail-next-arrow dashicons dashicons-arrow-right-alt2"></i>',
			'responsive'     => array(
				array(
					'breakpoint' => 768,
					'settings'   => array(
						'vertical' => in_array( $gallery_thumbnail_position_small_device, array( 'left', 'right' ) ),
						'rtl'      => woo_variation_gallery()->set_rtl_by_position( $gallery_thumbnail_position_small_device )
					),
				),
			)
		);

		$thumbnail_slider_js_options = apply_filters( 'woo_variation_gallery_thumbnail_slider_js_options', $thumbnail_js_options );

		$gallery_width = absint( woo_variation_gallery()->get_option( 'width', apply_filters( 'woo_variation_gallery_default_width', 30 ), 'woo_variation_gallery_width' ) );

		$inline_style = apply_filters( 'woo_variation_product_gallery_inline_style', array() );

		$wrapper_classes = apply_filters( 'woo_variation_gallery_product_wrapper_classes', array(
			'woo-variation-product-gallery',
			'woo-variation-product-gallery-thumbnail-columns-' . absint( $columns ),
			$has_gallery_thumbnail ? 'woo-variation-gallery-has-product-thumbnail' : '',
			( 'yes' === woo_variation_gallery()->get_option( 'thumbnail_slide', 'yes', 'woo_variation_gallery_thumbnail_slide' ) ) ? 'woo-variation-gallery-enabled-thumbnail-slider' : ''
		) );

		$post_thumbnail_id = (int) apply_filters( 'woo_variation_gallery_post_thumbnail_id', $post_thumbnail_id, $attachment_ids, $product );
		$attachment_ids    = (array) apply_filters( 'woo_variation_gallery_attachment_ids', $attachment_ids, $post_thumbnail_id, $product );
		ACTIVE_TODO_OC_END*/

		$data['gallery_images_template_data']['attachment_ids_loop_image'] = array();
		$data['gallery_images_template_data']['attachment_ids_loop_post_thumbnail_id'] = array();
		$data['gallery_images_template_data']['attachment_ids_loop_remove_featured_image'] = array();
		$data['gallery_images_template_data']['attachment_ids_loop_classes'] = array();

		if('variable' === $data['gallery_images_template_data']['product_type']){

			if(!empty(isset( $data['gallery_images_template_data']['product_variation']['variation_gallery_images'] ))){
			   	
			    foreach ($data['gallery_images_template_data']['product_variation']['variation_gallery_images'] as $index=>$image) {

			       	

			        $data['gallery_images_template_data']['attachment_ids_loop_image'][$index] = $image;
			        $data['gallery_images_template_data']['attachment_ids_loop_post_thumbnail_id'][$index] = apply_filters('sp_wbc_get_image_id', null, $product, null); //$product->get_image_id();

			        $data['gallery_images_template_data']['attachment_ids_loop_remove_featured_image'][$index] = false;

			        if ( $data['gallery_images_template_data']['attachment_ids_loop_remove_featured_image'][$index] && absint( $id ) == absint( $data['gallery_images_template_data']['attachment_ids_loop_post_thumbnail_id'][$index] ) ) {
			            return '';
			        }

			        $data['gallery_images_template_data']['attachment_ids_loop_classes'][$index] = array( '' );

			        if ( isset( $data['gallery_images_template_data']['attachment_ids_loop_image'][$index]['video_link'] ) && ! empty( $data['gallery_images_template_data']['attachment_ids_loop_image'][$index]['video_link'] ) ) {
			            array_push( $data['gallery_images_template_data']['attachment_ids_loop_classes'][$index], '' );
			        }

			        //ACTIVE_TODO right now we are creating class wrapper per image but it should be only once for the entire gallery_images wrapper. so we need to remove that unnecessary data from $image and fix that as soon as we get chance. 
			        $data['gallery_images_template_data']['class_wrapper'] = $image['class_wrapper'];

			        //ACTIVE_TODO publish hook if required 
			        // $data['gallery_images_template_data']['attachment_ids_loop_classes'][$id] = apply_filters( '', $classes, $id, $image );
			        
			       //return '<div class="' . esc_attr( implode( ' ', array_map( 'sanitize_html_class', array_unique( $classes ) ) ) ) . '"><div>' . $inner_html . '</div></div>';
	     
			    }
			}

		}

		if('variable' !== $data['gallery_images_template_data']['product_type'] or !isset( $data['gallery_images_template_data']['product_variation']['variation_gallery_images'] )) {

			if('variable' === $data['gallery_images_template_data']['product_type'] and !isset( $data['gallery_images_template_data']['product_variation']['variation_gallery_images'] )) {

				// after now the get_variations_and_simple_type_fields are called from add filter hook, the below might be counter intuitive since the post_thumbnail_id might already been set only from the result of the get_variations_and_simple_type_fields fields. -- to h 
				// 	but may be it is not possible in case of the varible type -- to h 
				// 	but what about the simple type -- to h 
						/*ACTIVE_TODO_OC_START
						ACTIVE_TODO it is supposed to work for the varible type as well, and if required then necessary upgrade should be applied to post_thumbnail_id handling in the get_variations_and_simple_type_fields function so that post_thumbnail_id is added in final result of variation_gallery_images. and then the below section should be simply turned off by adding in false and mark this point as NOTE -- to h 
						--	either way now maybe need revisit this whole if and above if of varible type and revise and refactor as applicable to make it simple and mature architecture -- to h 

						ACTIVE_TODO_OC_END*/
				if (!empty($data['gallery_images_template_data']['post_thumbnail_id'])) {

					if (!is_array($data['gallery_images_template_data']['attachment_ids'])) {
						
						$data['gallery_images_template_data']['attachment_ids'] = array();
					}

					array_unshift( $data['gallery_images_template_data']['attachment_ids'], \eo\wbc\model\publics\data_model\SP_WBC_Variations::instance()->get_product_attachment_props( $data['gallery_images_template_data']['post_thumbnail_id'] ) );
				}
				
			}

			if(!empty($data['gallery_images_template_data']['attachment_ids'])){
			    
			    foreach ($data['gallery_images_template_data']['attachment_ids'] as $index=>$id) {

			    	$data['gallery_images_template_data']['attachment_ids_loop_image'][$index] = $id;

			    	$data = self::prepare_gallery_template_data_item($data, $index, $id, $product);
			    }
			}
		}

		
		if( wbc()->sanitize->get('is_test') == 1 ) {
			wbc_pr('gallery_images_template_data_all');
			wbc_pr($data);
		}

		return $data;

		// ACTIVE_TODO ultimately move all below core implementtaion in the new core class of gallery_images or maybe simply in the wbc variations class 
	}

	public static function prepare_gallery_template_data_item($data, $index, $image/*$id*/, $product, $args = array()) {

        $data['gallery_images_template_data']['attachment_ids_loop_post_thumbnail_id'][$index] = apply_filters('sp_wbc_get_image_id', null, $product, null); //$product->get_image_id();

        $data['gallery_images_template_data']['attachment_ids_loop_remove_featured_image'][$index] = false;

        if ( $data['gallery_images_template_data']['attachment_ids_loop_remove_featured_image'][$index] && absint( $image['image_id']/*$id*/ ) == absint( $data['gallery_images_template_data']['attachment_ids_loop_post_thumbnail_id'][$index] ) ) {
            return '';
        }

        $data['gallery_images_template_data']['attachment_ids_loop_classes'][$image['image_id']/*$id*/] = array( '' );

        if ( isset( $data['gallery_images_template_data']['attachment_ids_loop_image'][$image['image_id']/*$id*/]['video_link'] ) && ! empty( $data['gallery_images_template_data']['attachment_ids_loop_image'][$image['image_id']/*$id*/]['video_link'] ) ) {
            array_push( $data['gallery_images_template_data']['attachment_ids_loop_classes'][$image['image_id']/*$id*/], '' );
        }

        //ACTIVE_TODO right now we are creating class wrapper per image but it should be only once for the entire gallery_images wrapper. so we need to remove that unnecessary data from $image and fix that as soon as we get chance. 
        $data['gallery_images_template_data']['class_wrapper'] = $data['gallery_images_template_data']['attachment_ids_loop_image'][$index]['class_wrapper'];
        
        //ACTIVE_TODO publish hook if required 
        // $data['gallery_images_template_data']['attachment_ids_loop_classes'][$id] = apply_filters( '', $classes, $id, $image );
        
       //return '<div class="' . esc_attr( implode( ' ', array_map( 'sanitize_html_class', array_unique( $classes ) ) ) ) . '"><div>' . $inner_html . '</div></div>';

        return $data;
   	}

	private static function swatches_hooks(){
 
        add_filter( 'sp_wbc_get_attribute',  function($data,$attribute){

			if ($data !== null) {

				return $data;
			}

			wbc()->load->model('category-attribute');
        	return \eo\wbc\model\Category_Attribute::instance()->get_attribute($attribute/*str_replace('pa_','',$args['hook_callback_args']['hook_args'][ 'attribute' ])*/);
        	
		}, 10, 2);

        add_filter( 'sp_wbc_variation_attribute_name',  function($data,$attribute){

			if ($data !== null) {

				return $data;
			}

			return \eo\wbc\system\core\data_model\SP_Attribute::variation_attribute_name($attribute);
        	
		}, 10, 2);

        add_filter( 'sp_wbc_get_product_terms',  function($data, $product, $attribute, $function_calls_args, $caller_data){

			if ($data !== null) {

				return $data;
			}

			return \eo\wbc\system\core\data_model\SP_Attribute::get_product_terms($product->get_id(), $attribute, $function_calls_args);
        	
		}, 10, 5);

        add_filter( 'sp_wbc_variation_option_name',  function($data, $term_name , $term, $attribute, $product){

			if ($data !== null) {

				return $data;
			}

			return \eo\wbc\system\core\data_model\SP_Attribute::variation_option_name($term_name , $term, $attribute, $product);
        	
		}, 10, 5);
		
		add_filter('sp_wbc_get_variation_attrs',function($data, $product){

			if ($data !== null) {

				return $data;
			}
		
			return $product->get_variation_attributes(); 
		},10,2);
	}

	private static function gallery_images_hooks(){
        
        add_filter( 'sp_wbc_product_get_id',  function($data,$product){

			if ($data !== null) {

				return $data;
			}

        	return $product->get_id();
        	
		}, 10, 2);

		add_filter( 'sp_wbc_product_get_sku',  function($data,$product){

			if ($data !== null) {

				return $data;
			}

			// NOTE: below we are using id is sku but it is the intended and standard behavior as per the stucture planed.
        	return $product->get_id();
        	
		}, 10, 2);

		add_filter( 'sp_wbc_get_image_id',  function($data,$product){

			if ($data !== null) {

				return $data;
			}

        	return \eo\wbc\system\core\data_model\SP_Product::get_image_id($product);
		}, 10, 2);

		add_filter( 'sp_wbc_get_gallery_image_ids',  function($data,$product,$product_id,$post_thumbnail_id,$args){

			if ($data !== null) {

				return $data;
			}

        	// return \eo\wbc\system\core\data_model\SP_Product::get_gallery_image_ids($product);
			return self::instance()->get_variations_and_simple_type_fields(array(),  $product, $product, $product_id, $product_id, $post_thumbnail_id, $args)['variation_gallery_images'];

		}, 10, 5);
        
        add_filter( 'sp_wbc_has_post_thumbnail',  function($data, $post_thumbnail_id){

			if ($data !== null) {

				return $data;
			}

        	return has_post_thumbnail();
		}, 10, 2);

		add_filter('sp_wbc_get_variations',function($data, $product ,$args){

			if ($data !== null) {

				return $data;
			}
		
			return $product->get_available_variations(); 
		},10,3);

        add_filter( 'sp_wbc_product_get_type',  function($data,$product){

			if ($data !== null) {

				return $data;
			}


        	return $product->get_type();
        	
		}, 10, 2);

		add_filter( 'sp_wbc_simple_product_type_html_attributes',  function($data,$caller_data,$args){

			if ($data !== null) {

				return $data;
			}

			$simple_types_html_attributes = array();
			
			$simple_types_html_attributes[0] = array();
			
			$simple_types_html_attributes[0]['variation_gallery_images'] = $caller_data['gallery_images_template_data']['attachment_ids'];

        	return array( 'data-product_id' => $caller_data['gallery_images_template_data']['product_sku_experimental'], 'data-product_simple=\''.json_encode($simple_types_html_attributes).'\'' => null);
        	
		}, 10, 3);

	}
}