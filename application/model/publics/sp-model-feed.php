<?php
/*
*	SP Model Feed class 
*/

namespace eo\wbc\model\publics;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\publics\SP_Feed;

class SP_Model_Feed extends SP_Feed {

	private static $_instance = null;

	public static function instance() {

		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct() {

	}

	public function init(){

        $this->page_title();

        $this->sidebars_widgets();
	}

	public function add_to_cart_text(){
        
        parent::add_to_cart_text();
	}

	public function filter_container_location_action( $is_shop_cat_filter, $is_shortcode_filter ){

		return parent::filter_container_location_action( $is_shop_cat_filter, $is_shortcode_filter );
	}

	public function render_ui() {

		$this->render_variations_ui();
	}

	public function get_data($for_section="default", $args=array()) {

		
		global $product;	

		// add that four conditions here in below if, simply as or conditions -- to d or -- to b done
		if( $for_section == "gallery_images_init" || $for_section == "gallery_images") {

			if($for_section == 'gallery_images_init') {
				$args['data_definition'] = null;
				$args['form_definition'] = null;	
				$args['ui_definition'] = null;
			}

			return \eo\wbc\model\publics\data_model\SP_WBC_Variations::fetch_data($for_section, $product, $args );	
		}
		
	}

	public function render_variations_ui() {

		add_filter( 'script_loader_tag',  function($tag){
			
			return $tag;	

		}, 10, 3);

		$this->render_gallery_images();
		$this->render_variations_swatches();
	}

	public function render_gallery_images() {

		if( \eo\wbc\controllers\publics\variations\SP_Gallery_Slider::instance()->should_init() ) {
			\eo\wbc\controllers\publics\variations\SP_Gallery_Slider::instance()->init();
		}

		if( \eo\wbc\controllers\publics\variations\SP_Gallery_Zoom::instance()->should_init() ) {
			\eo\wbc\controllers\publics\variations\SP_Gallery_Zoom::instance()->init();
		}

		add_action( 'after_setup_theme', function(){

		}, 200 );

		add_filter( 'woocommerce_post_class', function( $classes, $product ) {

			$classes[] = 'wbc-sp-variations-gallery_images-woopost';
			$classes[] = sprintf( 'wbc-sp-variations-gallery_images-woopost-theme-%s', wbc()->common->current_theme_key() );

			if ( is_rtl() ) {
				$classes[] = 'wbc-sp-variations-gallery_images-woopost-rtl';
			}

			return $classes;
		}, 25, 2 );

		add_filter( 'body_class',  function($classes){

			$classes[] = 'wbc-sp-variations-gallery_images';
			$classes[] = sprintf( 'wbc-sp-variations-gallery_images-theme-%s', wbc()->common->current_theme_key() );

			if ( is_rtl() ) {
				$classes[] = 'wbc-sp-variations-gallery_images-rtl';
			}

			return $classes;

		});

		add_filter( 'post_class',  function($classes){

			$classes[] = 'wbc-sp-variations-gallery_images-post';
			$classes[] = sprintf( 'wbc-sp-variations-gallery_images-post-theme-%s', wbc()->common->current_theme_key() );

			if ( is_rtl() ) {
				$classes[] = 'wbc-sp-variations-gallery_images-post-rtl';
			}

			return $classes;

		}, 25, 2); 

	}

	public function render_variations_swatches() {

		add_action('wp_footer',function(){
			
			wbc()->theme->load('css','product');
        	wbc()->theme->load('js','product');
			// Toggle Button

        	$asset_params = array();
        	
			$asset_params['toggle_status'] = true/*wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_status',true)*/;

			$asset_params['init_toggle'] = wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_init_status');			
			
			$asset_params['toggle_text'] = wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_text',__('CUSTOMIZE THIS PRODUCT'));

			$asset_params['dimention'] = wbc()->options->get_option('tiny_features','tiny_features_option_ui_option_dimention','2em');

			$asset_params['border_color'] = wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_color','#ECECEC');

			$asset_params['border_width'] = wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_width','2px');

			$asset_params['border_radius'] = wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_radius','1px');

			// Variation item hovered
			$asset_params['border_hover_color'] = wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_color_hover','#3D3D3D');

			$asset_params['border_hover_width'] = wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_width_hover','2px');

			// button only
			$asset_params['font_color'] = wbc()->options->get_option('tiny_features','tiny_features_option_ui_font_color','#DBDBDB');

			$asset_params['font_hover_color'] = wbc()->options->get_option('tiny_features','tiny_features_option_ui_font_color_hover','#AA7D7D');

			$asset_params['bg_color'] = wbc()->options->get_option('tiny_features','tiny_features_option_ui_bg_color','#ffffff');

			$asset_params['bg_hover_color'] = wbc()->options->get_option('tiny_features','tiny_features_option_ui_bg_color_hover','#DCC7C7');

			ob_start();

			echo ob_get_clean();
			
			if(!empty($toggle_status)){	
				if(has_action('woocommerce_before_variations_form')){
					add_action( 'woocommerce_before_variations_form',function( ) use($toggle_text){
						// wbc()->load->asset('css','fomantic/semantic.min');
						// wbc()->load->asset('js','fomantic/semantic.min',array('jquery'));
						ob_start();
						?>
							<span id="wbc_variation_toggle" class="ui raised segment">
								<?php _e($toggle_text); ?><i class="caret up icon" style="text-align: center;line-height: 1em;"></i>						
							</span>
						<?php
						echo ob_get_clean();
					}, 10, 1 );	
				}				
			}

			$this->load_asset();

		});

		add_filter( 'woocommerce_post_class', function( $classes, $product ) {

			$classes[] = 'wbc-sp-variations-swatches-woopost';
			$classes[] = sprintf( 'wbc-sp-variations-swatches-woopost-theme-%s', wbc()->common->current_theme_key() );

			if ( is_rtl() ) {
				$classes[] = 'wbc-sp-variations-swatches-woopost-rtl';
			}

			return $classes;

		}, 25, 2 );

		add_filter( 'body_class',  function($classes){

			$classes[] = 'wbc-sp-variations-swatches';
			$classes[] = sprintf( 'wbc-sp-variations-swatches-theme-%s', wbc()->common->current_theme_key() );

			if ( is_rtl() ) {
				$classes[] = 'wbc-sp-variations-swatches-rtl';
			}

			return $classes;

		});

		add_filter( 'post_class',  function($classes){
			
			$classes[] = 'wbc-sp-variations-swatches-post';
			$classes[] = sprintf( 'wbc-sp-variations-swatches-post-theme-%s', wbc()->common->current_theme_key() );

			if ( is_rtl() ) {
				$classes[] = 'wbc-sp-variations-swatches-post-rtl';
			}

			return $classes;

		}, 25, 2); 

	}

	public function load_asset(){

		add_action( 'wp_enqueue_scripts' ,function(){
			
			wbc()->load->asset('css','fomantic/semantic.min');
			wbc()->load->asset('js','fomantic/semantic.min',array('jquery'));

			wbc()->load->asset( 'asset.php', constant( 'EOWBC_ASSET_DIR' ).'variations.assets.php');
		}, 1049);	

	}

	public function render_gallery_images_template_callback($args = array()){
		

		
		need to consider any applicable things or flow from below code block of one of the plugin we are exploring -- to h

		add_action('woocommerce_init', array($this, 'replacing_template_loop_product_thumbnail'));


        public function wc_template_loop_product_replaced_thumb() {
            global $product;
            $needed = array();
            if (isset($this->settings['show_images_by_attr'])) {
                $needed = $this->settings['show_images_by_attr'];
            }
            if (is_array($needed) AND count($needed)) {
                if ($this->is_isset_in_request_data($this->get_swoof_search_slug()) AND $product->is_type("variable")) {
                    $need_array = array();
                    $request = $this->get_request_data();
                    $need_array = array_intersect_key($request, array_flip($needed));
                    $rate = array();
                    if (count($need_array)) {
                        $variations = $product->get_available_variations();
                        foreach ($variations as $key => $variant) {
                            if (isset($variant['attributes'])) {
                                $rate[$key] = 0;
                                foreach ($need_array as $attr_name => $values) {
                                    if (isset($variant['attributes']["attribute_" . $attr_name]) AND in_array($variant['attributes']["attribute_" . $attr_name], explode(",", $values))) {
                                        $rate[$key]++;
                                    }
                                }
                            }
                        }
                        arsort($rate);
                        $attr_key = array_key_first($rate);
                        if (array_shift($rate)) {
                            if (isset($variations[$attr_key]["image_id"]) AND $variations[$attr_key]["image_id"]) {
                                $image_size = apply_filters('single_product_archive_thumbnail_size', 'woocommerce_thumbnail');
                                $image = wp_get_attachment_image($variations[$attr_key]["image_id"], $image_size, false, array());
                                if ($image) {
                                    echo $image;
                                    return;
                                }
                            }
                        }
                    }
                }
            }
            echo woocommerce_get_product_thumbnail();
        }



		// global $product;

		// $data = \eo\wbc\model\publics\SP_Model_Feed::instance()->get_data('gallery_images');

		// $data['gallery_images_template_data'] = array();


		// $data['gallery_images_template_data']['product_id'] = $product->get_id();

		// $data['gallery_images_template_data']['default_attributes'] = \eo\wbc\model\publics\data_model\SP_WBC_Variations::instance()->get_default_attributes($data['gallery_images_template_data']['product_id']);

		// $data['gallery_images_template_data']['default_variation_id'] = \eo\wbc\model\publics\data_model\SP_WBC_Variations::instance()->get_default_variation_id($product, $data['gallery_images_template_data']['default_attributes'] );

		// $data['gallery_images_template_data']['product_type'] = $product->get_type();

		// // ACTIVE_TODO we may like to use the columns var later to till gallery_images slider and zoom module layers including till applicable js layers -- to h or -- to d 
		// $data['gallery_images_template_data']['columns'] = -1;	//	thumbnail columns 

		// $data['gallery_images_template_data']['post_thumbnail_id'] = \eo\wbc\system\core\data_model\SP_Product::get_image_id($product);

		// $data['gallery_images_template_data']['attachment_ids'] = \eo\wbc\system\core\data_model\SP_Product::get_gallery_image_ids($product);

		// $data['gallery_images_template_data']['has_post_thumbnail'] = has_post_thumbnail();

		// // No main image but gallery
		// if ( ! $data['gallery_images_template_data']['has_post_thumbnail'] && count( $data['gallery_images_template_data']['attachment_ids'] ) > 0 ) {
		// 	$data['gallery_images_template_data']['post_thumbnail_id'] = $data['gallery_images_template_data']['attachment_ids'][0];
		// 	array_shift( $data['gallery_images_template_data']['attachment_ids'] );
		// 	$data['gallery_images_template_data']['has_post_thumbnail'] = true;
		// }

		// if ( 'variable' === $data['gallery_images_template_data']['product_type'] && $data['gallery_images_template_data']['default_variation_id'] > 0 ) {

		// 	$data['gallery_images_template_data']['product_variation'] = \eo\wbc\model\publics\data_model\SP_WBC_Variations::instance()->get_available_variation($data['gallery_images_template_data']['product_id'], $data['gallery_images_template_data']['default_variation_id']);

		// 	if ( isset( $data['gallery_images_template_data']['product_variation']['image_id'] ) ) {
		// 		$data['gallery_images_template_data']['post_thumbnail_id']  = $data['gallery_images_template_data']['product_variation']['image_id'];
		// 		$data['gallery_images_template_data']['has_post_thumbnail'] = true;
		// 	}

		// 	if ( isset( $data['gallery_images_template_data']['product_variation']['variation_gallery_images'] ) ) {
		// 		$data['gallery_images_template_data']['attachment_ids'] = wp_list_pluck( $data['gallery_images_template_data']['product_variation']['variation_gallery_images'], 'image_id' );
		// 		array_shift( $data['gallery_images_template_data']['attachment_ids'] );
		// 	}
		// }

		// $data['gallery_images_template_data']['has_gallery_thumbnail'] = ( $data['gallery_images_template_data']['has_post_thumbnail'] && ( count( $data['gallery_images_template_data']['attachment_ids'] ) > 0 ) );

		// $data['gallery_images_template_data']['only_has_post_thumbnail'] = ( $data['gallery_images_template_data']['has_post_thumbnail'] && ( count( $data['gallery_images_template_data']['attachment_ids'] ) === 0 ) );


		// $data['gallery_images_template_data']['attachment_ids_loop_image'] = array();
		// $data['gallery_images_template_data']['attachment_ids_loop_post_thumbnail_id'] = array();
		// $data['gallery_images_template_data']['attachment_ids_loop_remove_featured_image'] = array();
		// $data['gallery_images_template_data']['attachment_ids_loop_classes'] = array();

		// if('variable' === $data['gallery_images_template_data']['product_type']){

		// 	if(!empty(isset( $data['gallery_images_template_data']['product_variation']['variation_gallery_images'] ))){
			    
		// 	    foreach ($data['gallery_images_template_data']['product_variation']['variation_gallery_images'] as $index=>$image) {

			       	

		// 	        $data['gallery_images_template_data']['attachment_ids_loop_image'][$index] = $image;
		// 	        $data['gallery_images_template_data']['attachment_ids_loop_post_thumbnail_id'][$index] = $product->get_image_id();

		// 	        $data['gallery_images_template_data']['attachment_ids_loop_remove_featured_image'][$index] = false;

		// 	        if ( $data['gallery_images_template_data']['attachment_ids_loop_remove_featured_image'][$index] && absint( $id ) == absint( $data['gallery_images_template_data']['attachment_ids_loop_post_thumbnail_id'][$index] ) ) {
		// 	            return '';
		// 	        }

		// 	        $data['gallery_images_template_data']['attachment_ids_loop_classes'][$index] = array( '' );

		// 	        if ( isset( $data['gallery_images_template_data']['attachment_ids_loop_image'][$index]['video_link'] ) && ! empty( $data['gallery_images_template_data']['attachment_ids_loop_image'][$index]['video_link'] ) ) {
		// 	            array_push( $data['gallery_images_template_data']['attachment_ids_loop_classes'][$index], '' );
		// 	        }

		// 	        //ACTIVE_TODO publish hook if required 
		// 	        // $data['gallery_images_template_data']['attachment_ids_loop_classes'][$id] = apply_filters( '', $classes, $id, $image );
			        
		// 	       //return '<div class="' . esc_attr( implode( ' ', array_map( 'sanitize_html_class', array_unique( $classes ) ) ) ) . '"><div>' . $inner_html . '</div></div>';
	     
		// 	    }
		// 	}

		// }

		// else {
		// 	if(!empty($data['gallery_images_template_data']['attachment_ids'])){
			    
		// 	    foreach ($data['gallery_images_template_data']['attachment_ids'] as $index=>$id) {

			       	

		// 	        $data['gallery_images_template_data']['attachment_ids_loop_image'][$index] = \eo\wbc\model\publics\data_model\SP_WBC_Variations::instance()->get_product_attachment_props( $id );
		// 	        $data['gallery_images_template_data']['attachment_ids_loop_post_thumbnail_id'][$index] = $product->get_image_id();

		// 	        $data['gallery_images_template_data']['attachment_ids_loop_remove_featured_image'][$index] = false;

		// 	        if ( $data['gallery_images_template_data']['attachment_ids_loop_remove_featured_image'][$index] && absint( $id ) == absint( $data['gallery_images_template_data']['attachment_ids_loop_post_thumbnail_id'][$index] ) ) {
		// 	            return '';
		// 	        }

		// 	        $data['gallery_images_template_data']['attachment_ids_loop_classes'][$id] = array( '' );

		// 	        if ( isset( $data['gallery_images_template_data']['attachment_ids_loop_image'][$id]['video_link'] ) && ! empty( $data['gallery_images_template_data']['attachment_ids_loop_image'][$id]['video_link'] ) ) {
		// 	            array_push( $data['gallery_images_template_data']['attachment_ids_loop_classes'][$id], '' );
		// 	        }

			       
		// 	    }
		// 	}
		// }

        $data = \eo\wbc\model\publics\data_model\SP_WBC_Variations::prepare_gallery_template_data(array('page'=>'feed'));
        
		//////////////// start core

		//bind to hook from here for the hook that is applied from both slider and zoom module for the images. means add filter here, and provide back with gallery_images data. so simply entire data var will be added to filter var but yeah the variation_gallery_images, attachment_ids etc. would be key -- to b done
		
		add_filter('sp_slzm_slider_images',function($hook_data) use($data){

			return $data;

		});

		add_filter('sp_slzm_zoom_images',function($hook_data) use($data){

			return $data;

		});

		do_action( 'sp_variations_gallery_images_core' );

		$classes = array('spui-sp-variations-gallery-images');
		$classes = apply_filters('sp_variations_gallery_images_core_container_class',$classes);
	
		$ui = array(
			'type'=>'div',
			'class'=>$classes,
			'child'=>array(
				array(
					'type'=>'html',
					'child'=>apply_filters('sp_variations_gallery_images_slider_ui',null),
				),
				array(
					'type'=>'html',
					'child'=>apply_filters('sp_variations_gallery_images_zoom_ui',null),
				),
			)
		);
		\sp\theme\view\ui\builder\Page_Builder::instance()->build_page_widgets($ui,'sp_variations_gallery_images_container');
		//wbc_pr( $ui );	die();

		//////////////// end core
			return;
		?>

		<?php do_action( 'woo_variation_product_gallery_start', $product ); ?>
			<div data-product_id="<?php echo esc_attr( $product_id ) ?>" data-variation_id="<?php echo esc_attr( $default_variation_id ) ?>" style="<?php echo esc_attr( woo_variation_gallery()->get_inline_style( $inline_style ) ) ?>" class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', array_unique( $wrapper_classes ) ) ) ); ?>">
				<div class="loading-gallery woo-variation-gallery-wrapper woo-variation-gallery-thumbnail-position-<?php echo esc_attr( $gallery_thumbnail_position ) ?>-<?php echo esc_attr( $gallery_thumbnail_position_small_device ) ?> woo-variation-gallery-product-type-<?php echo esc_attr( $product_type ) ?>">

					<div class="woo-variation-gallery-container preload-style-<?php echo trim( woo_variation_gallery()->get_option( 'preload_style', 'blur', 'woo_variation_gallery_preload_style' ) ) ?>">

						<div class="woo-variation-gallery-slider-wrapper">

							<?php if ( $has_post_thumbnail && ( 'yes' === woo_variation_gallery()->get_option( 'lightbox', 'yes', 'woo_variation_gallery_lightbox' ) ) ): ?>
								<a href="#" class="woo-variation-gallery-trigger woo-variation-gallery-trigger-position-<?php echo woo_variation_gallery()->get_option( 'zoom_position', 'top-right', 'woo_variation_gallery_zoom_position' ) ?>">
									<span class="dashicons dashicons-search"></span>
								</a>
							<?php endif; ?>

							<div class="woo-variation-gallery-slider" data-slick='<?php echo wc_esc_json( wp_json_encode( $gallery_slider_js_options ) ); // WPCS: XSS ok. ?>'>
								<?php
								// Main  Image
								if ( $has_post_thumbnail ) {
									echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', woo_variation_gallery()->get_frontend()->get_gallery_image_html( $product, $post_thumbnail_id, array(
										'is_main_thumbnail'  => true,
										'has_only_thumbnail' => $only_has_post_thumbnail
									) ), $post_thumbnail_id );
								} else {
									echo sprintf( '<div class="wvg-gallery-image wvg-gallery-image-placeholder"><div><div class="wvg-single-gallery-image-container"><img src="%s" alt="%s" class="wp-post-image" /></div></div></div>', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
								}


								// Gallery Image
								if ( $has_gallery_thumbnail ) {
									foreach ( $attachment_ids as $attachment_id ) :
										echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', woo_variation_gallery()->get_frontend()->get_gallery_image_html( $product, $attachment_id, array(
											'is_main_thumbnail'  => true,
											'has_only_thumbnail' => $only_has_post_thumbnail
										) ), $attachment_id );
									endforeach;
								}
								?>
							</div>
						</div> <!-- .woo-variation-gallery-slider-wrapper -->

						<div class="woo-variation-gallery-thumbnail-wrapper">
							<div class="woo-variation-gallery-thumbnail-slider woo-variation-gallery-thumbnail-columns-<?php echo esc_attr( $columns ) ?>" data-slick='<?php echo wc_esc_json( wp_json_encode( $thumbnail_slider_js_options ) ); // WPCS: XSS ok. ?>'>
								<?php
								if ( $has_gallery_thumbnail ) {
									// Main Image

									echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', woo_variation_gallery()->get_frontend()->get_gallery_image_html( $product, $post_thumbnail_id, array( 'is_main_thumbnail' => false ) ), $post_thumbnail_id );

									// Gallery Image
									foreach ( $attachment_ids as $key => $attachment_id ) :
										echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', woo_variation_gallery()->get_frontend()->get_gallery_image_html( $product, $attachment_id, array( 'is_main_thumbnail' => false ) ), $attachment_id );
									endforeach;
								}
								?>
							</div>
						</div> <!-- .woo-variation-gallery-thumbnail-wrapper -->
					</div> <!-- .woo-variation-gallery-container -->
				</div> <!-- .woo-variation-gallery-wrapper -->
			</div> <!-- .woo-variation-product-gallery -->
		<?php do_action( 'woo_variation_product_gallery_end', $product ); ?> 
		<?php


	}

	public function prepare_swatches_data($args = array()){

		return \eo\wbc\model\publics\data_model\SP_WBC_Variations::prepare_swatches_data($args);

	}

	public function prepare_swatches_reset_link_data($args = array()) {

		$data = array();

		$data['content'] = $args['hook_callback_args']['content'];

		if ( ! is_product() ) {
			$data['content'] = '';
		}

		return $data;
	}

}
