<?php
/**
 *	SP Model Single Product class 
 */

namespace eo\wbc\model\publics;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\publics\SP_Single_Product;

class SP_Model_Single_Product extends SP_Single_Product {

	private static $_instance = null;

	public static function instance() {

		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct() {

	}

	//	it will also accept a param like for_section with its default value to default, this param will be useful when any module have more than one section of data is applicable so that can be managed with if condition for them 
	public function get_data($for_section="default", $args=null) {

		if( $for_section == "sp_variations" ) {

			global $product;	

			// once the data is ready the particular layer will do action hook like sp_variations_render_data and so below render_ui function will add action to that hook -- to h 
			// 		INVALID	
			// 	-- if there is any more neat or better flow then we should do that but I think maybe is seems optimum for now 
			// 		--	since swatches related woo hook is also providing or covering on most data so we may have limited needs for below fetch_data function to cover data requirements 
			// 			--	or instead the below fetch_data should simply be called from within the woo swatches related hooks so that there is no unnecessary hook that we need to add. yeah this is good idea. 
			// 				--	however even better is from inside that hook only get_data of this class will be called, so below call will remain here 
			return \eo\wbc\model\publics\SP_WBC_Variations::fetch_data( $product, $args );	
		}	
		
	}

	public function render_ui(){

		$this->render_variations_ui();
	}

	public function render_variations_ui() {


		///////////////////////////woocommerce-bundle-choice/application/controllers/publics/options.php
		////////////////////////function run()
		--	as planned the flows and expecially the templating flows the below layers will be from their own templating layers 
			--	and it should be rendered from the model as per the whole rendering flow including the render_ui function -- to d 
				--	from the optionsUI widget model -- to d 
					--	so create the model class with similar flow how we have the filter widget model class, and in this case I think the core class is not necessary but will do in future if required. and the filter widget model either does not have the core class -- to d
						INVALID no more creating the optionsUI widget model class. so instead single product model class will be used. and on the category page flow the feed model class will be used.  
					--	however the single product controller(if wbc do not have it yet then create one) should call directly the single product model of wbc for flows which are not in particular related to optionsUI or firstly it is to be taken care of by the page layers and then from there it can call the optionsUI layers - NOTE
			--	and the CSS need to be managed in a way that even if multiple templates of this free semantic UI is used means for one than attributes this template is used which would be normal where the free ui is used, then in such cases somehow figure out that the CSS is only loaded once -- to d 
				--	if there are no other way then simply use constant, and it is important to do due to the SEO concerns -- to d 
		add_action('wp_footer',function(){
			wbc()->theme->load('css','product');
        	wbc()->theme->load('js','product');
			// Toggle Button
			$toggle_status = true/*wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_status',true)*/;


			$init_toggle = wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_init_status');			
			
			$toggle_text = wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_text',__('CUSTOMIZE THIS PRODUCT'));

			// Variation item non-hovered
			$dimention = wbc()->options->get_option('tiny_features','tiny_features_option_ui_option_dimention','2em');

			$border_color = wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_color','#ECECEC');

			$border_width = wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_width','2px');

			$border_radius = wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_radius','1px');

			// Variation item hovered
			$border_hover_color = wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_color_hover','#3D3D3D');

			$border_hover_width = wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_width_hover','2px');

			// button only
			$font_color = wbc()->options->get_option('tiny_features','tiny_features_option_ui_font_color','#DBDBDB');

			$font_hover_color = wbc()->options->get_option('tiny_features','tiny_features_option_ui_font_color_hover','#AA7D7D');

			$bg_color = wbc()->options->get_option('tiny_features','tiny_features_option_ui_bg_color','#ffffff');

			$bg_hover_color = wbc()->options->get_option('tiny_features','tiny_features_option_ui_bg_color_hover','#DCC7C7');

			ob_start();
			?>
				<style type="text/css">
					.ui.mini.images .variable-item.image{
						width: auto;						
					}					
					.image-variable-item{
						border: none !important;
						border-bottom: 2px solid transparent !important;
					}
					.image-variable-item.selected,.image-variable-item:hover{	        			
						box-shadow: none !important;        			
	        			border-bottom: 2px <?php _e($border_hover_color) ?> solid !important;
	        		}
					.image_text-variable-item{
						border: none !important;
					}
					.image_text-variable-item:not(.selected) div{
						visibility: hidden;
					}

					.image_text-variable-item:hover div{
						visibility: visible;
					}

					.image_text-variable-item.selected,.image_text-variable-item:hover{	        			
						box-shadow: none !important;
	        		}
					.woocommerce .summary.entry-summary table.variations tr{
						width: auto !important;
					}
					.rotate-up{
						-webkit-animation:spin-up 0.3s linear ;
					    -moz-animation:spin-up 0.3s linear ;
					    animation:spin-up 0.3s linear ;
					    animation-fill-mode: forwards;
					}
					@-moz-keyframes spin-up { 100% { -moz-transform: rotate(-180deg); } }
					@-webkit-keyframes spin-up { 100% { -webkit-transform: rotate(-180deg); } }
					@keyframes spin-up { 100% { -webkit-transform: rotate(-180deg); transform:rotate(-180deg); } }

					.rotate-down{
						-webkit-animation:spin-down 0.3s linear;
					    -moz-animation:spin-down 0.3s linear;
					    animation:spin-down 0.3s linear;
					    animation-fill-mode: forwards;
					}

					@-moz-keyframes spin-down { 
						0% { -moz-transform: rotate(180deg); } 
						100% { -moz-transform: rotate(360deg); } 
					}
					@-webkit-keyframes spin-down { 
						0% { -webkit-transform: rotate(180deg); } 
						100% { -webkit-transform: rotate(360deg); } 
					}
					@keyframes spin-down { 
						0% { 
							-webkit-transform: rotate(180deg); 
							transform:rotate(180deg); 
						} 					
						100% { 
							-webkit-transform: rotate(360deg); 
							transform:rotate(360deg); } 
						}

					#wbc_variation_toggle
					{
						padding: 0.7em;
						margin-bottom: 0.7em;
						border:1px solid #5e5c5b;
						display: inline-block;
						color: #2d2d2d;
						font-size:1rem;
						cursor: pointer;
						border-radius: 1px !important;
					} 
					table.variations{
						padding: 5px;
						border: 1px solid #5e5c5b;
					}
					table.variations td{
						/*display: table-cell !important;*/
						border: none !important;
					}
					table.variations td:first-child{
						/*border-right: 1px solid #5e5c5b !important;*/
						/*text-align: center;*/
					}
					
					.ui.images {
							width: 100% !important;
							margin: auto !important;
							float: none !important;
						}
					}
					table.variations {
					    table-layout: auto !important;
					    margin: inherit !important;
					}
					table.variations td.label{
						display: none !important;
					}
					table.variations .value{
						padding-left: 1rem !important;
					}
	        		.variable-items-wrapper{
	        			list-style: none;
	        			display: table-cell !important;	        			
	        		}
	        		.ui.red.ribbon.label{
	        			margin-bottom: 5px !important;
	        		}
	        		.variable-items-wrapper .variable-item div{
	        			margin: auto;
	        			display: block;
	        		}
	        		.variable-items-wrapper .variable-item{        			
	        			/*display: inline-table;*/
	        			height: <?php _e($dimention); ?>;
	        			width: <?php _e($dimention); ?>;
	        			min-width: 35px;						
						text-align: center;						
	        			line-height: <?php _e($dimention); ?>;	        			
	        			cursor: pointer;
	        			margin: 0.25rem;
	        			text-align: center;
	        			border: <?php _e($border_width) ?> solid <?php _e($border_color) ?>;
	        			border-radius: <?php _e($border_radius); ?>;
	        			overflow: hidden;
	        		}	
	        		.variable-items-wrapper .variable-item:hover,.variable-items-wrapper .selected{
	        			box-shadow:0px 0px <?php _e($border_hover_width) ?> <?php _e($border_hover_color) ?>;        			
	        			border: 1px <?php _e($border_hover_color) ?> solid;
	        		}
	        		ul.variable-items-wrapper{
	        			margin: 0px;
	        		}
	        		.variable-item-color-fill,.variable-item-span{        			
	        			height: <?php _e($dimention); ?>;
	        			width: 100%;
	        			line-height: <?php _e($dimention); ?>;
	        		}
	        		.select2,.select3-selection{
	        			display: none !important;
	        		}
	        		.button-variable-item{
	        			background-color: <?php _e($bg_color); ?>;
	        			color: <?php _e($font_color); ?>;
	        		}
	        		.button-variable-item:hover{
	        			background-color: <?php _e($bg_hover_color); ?>;
	        			color: <?php _e($font_hover_color); ?>;	
	        		}
	        	</style>
	        	<script>
	        		jQuery(document).ready(function($){
	        			jQuery(".dropdown").dropdown().on('change',function(){
	        				var target_selector =  $('#'+$(this).find('input[type="hidden"]').data('id'));
	        				target_selector.val($(this).find('input[type="hidden"]').val());
	        				/*$(this).parent().find('.selected').removeClass('selected');
	        				$(this).addClass('selected');*/
	        				jQuery(".variations_form" ).trigger('check_variations');
	        				$(target_selector).trigger('change');
	        			});
	        			if($('table.variations tbody>tr').length>0){
	        				$('table.variations').addClass('ui raised segment');	
	        			}
	        			
	        			$('#wbc_variation_toggle').on('click',function(){
	        				if($(this).find('.icon').hasClass('rotate-up')) {
	        					$(this).find('.icon').removeClass('rotate-up');
	        					$(this).find('.icon').addClass('rotate-down');
	        					$('table.variations').slideToggle("slow");
	        				} else {
	        					$(this).find('.icon').removeClass('rotate-down');
	        					$(this).find('.icon').addClass('rotate-up');
	        					$('table.variations').slideToggle("slow");
	        				}        				
	        			});

	        			<?php if(empty($init_toggle)): ?>
	        				$('#wbc_variation_toggle').trigger('click');
	        			<?php endif; ?>

	        			--	below two click events would be implemented in the core variations js module, in that case it will be remove here 
	        			$('.variable-item').on('click',function(){
	        				var target_selector = $('#'+$(this).data('id'));
	        				target_selector.val($(this).data('value'));
	        				$(this).parent().find('.selected').removeClass('selected');
	        				$(this).addClass('selected');
	        				jQuery(".variations_form" ).trigger('check_variations');
	        				$(target_selector).trigger('change');
	        			});

	        			jQuery(".variations_form").on('click', '.reset_variations'/*'woocommerce_variation_select_change'*//*'reset'*/,function(){
	        				jQuery('.variable-items-wrapper .selected').removeClass('selected');
	        				jQuery('.variable-items-wrapper .dropdown').dropdown('restore defaults');
	        			});
	        			
	        		});
	        	</script>
			<?php
			echo ob_get_clean();
			
			if(!empty($toggle_status)){	
				if(has_action('woocommerce_before_variations_form')){
					add_action( 'woocommerce_before_variations_form',function( ) use($toggle_text){
						wbc()->load->asset('css','fomantic/semantic.min');
						wbc()->load->asset('js','fomantic/semantic.min',array('jquery'));
						ob_start();
						?>
							<span id="wbc_variation_toggle" class="ui raised segment">
								<?php _e($toggle_text); ?><i class="caret up icon" style="text-align: center;line-height: 1em;"></i>						
							</span>
						<?php
						echo ob_get_clean();
					}, 10, 1 );	
				} else {
					wbc()->load->asset('css','fomantic/semantic.min');
					wbc()->load->asset('js','fomantic/semantic.min',array('jquery'));
					ob_start();
					?>	
						<script>
							jQuery(".variations_form").before('<span id="wbc_variation_toggle" class="ui raised segment"><?php _e($toggle_text); ?><i class="caret up icon" style="text-align: center;line-height: 1em;"></i></span>');	
						</script>
					<?php
					echo ob_get_clean();
				}				
			}
		});
		
		--	and from where the below flow will be layered? I guess it would be somewhere from the optionsUI widget model that is planned -- check and confirm 
			--	either way make use of the below and/or the hook that other plugins we are exploring are if they are mature enough or mix of both 	
		add_filter( 'woocommerce_dropdown_variation_attribute_options_html',function($html, $args){
                              
            if ( apply_filters( 'default_wbc_variation_attribute_options_html', false, $args, $html ) ) {
                return $html;
            }
            
            // WooCommerce Product Bundle Fixing
            if ( isset( $_POST[ 'action' ] ) && wbc()->sanitize->post('action') === 'woocommerce_configure_bundle_order_item' ) {
                return $html;
            }
            
            $attribute_id = wc_variation_attribute_name( $args[ 'attribute' ] );
            
            $attribute_name = sanitize_title( $args[ 'attribute' ] );

            wbc()->load->model('category-attribute');
            $attribute = \eo\wbc\model\Category_Attribute::instance()->get_attribute(str_replace('pa_','',$args[ 'attribute' ]));

            $product_id = $args[ 'product' ]->get_id();
            
        	--	and we can make use of the below flow in our fetch data function layers planned 
        		--	and keep in mind that we had to take care of two data layers(or response that we need to sent to two different place one is variations image gallery and the second is the variations form) one for variations image gallery and the second is for the variations form 
            $attributes = $args[ 'product' ]->get_variation_attributes();
            $variations = $args[ 'product' ]->get_available_variations();

            $type = 'select';     
            if(!empty($attribute->attribute_type)){
            	$type = $attribute->attribute_type;
            } else {
            	$type = 'select';
            }

            if(in_array($type,array('color','image','image_text','dropdown_image','dropdown_image_only','dropdown','button'))) {
            	$html = call_user_func_array(
            		array($this,'variation_options'),array(
            		array(
                    	'options'    => $args[ 'options' ],
                    	'attribute'  => $args[ 'attribute' ],
                    	'product'    => $args[ 'product' ],
                        'selected'   => $args[ 'selected' ],
                        'type'       => $type,
                        'is_archive' => ( isset( $args[ 'is_archive' ] ) && $args[ 'is_archive' ]),
                        'attribute_object' => $attribute
                    ))
            	);
            }            
            return $html;
        }, 200, 2 );
		///////////////////////////////



		///////////////////////////var/www/html/drashti_project/27-05-2022/woo-variation-gallery/includes/class-woo-variation-gallery-frontend.php


 		public function get_available_variations( $product ) {

			if ( is_numeric( $product ) ) {
				$product = wc_get_product( absint( $product ) );
			}

			return $product->get_available_variations();
		}

		////////////////////////////////


		/////////////////var/www/html/drashti_project/27-05-2022/woo-variation-gallery/includes/class-woo-variation-gallery-frontend.php
			$images               = array();
			$available_variations = $this->get_available_variations( $product_id );

			foreach ( $available_variations as $i => $variation ) {
				array_push( $variation['variation_gallery_images'], $variation['image'] );
			}

		/////////////////////////
		
		//////////////////	/var/www/html/drashti_project/27-05-2022/woo-variation-gallery/includes/functions.php
			// Get Variations info
			//-------------------------------------------------------------------------------
			if ( ! function_exists( 'wvg_get_product_variations' ) ):
				function wvg_get_product_variations( $product ) {

					if ( is_numeric( $product ) ) {
						$product = wc_get_product( absint( $product ) );
					}

					return $product->get_available_variations();
				}
			endif;

		//////////////////////////////
		
		//////////////////////////home/shraddha/Downloads/woo-variation-gallery/includes/class-woo-variation-gallery-frontend.php

		is_default_to_image, $is_default_to_button ) ) {

			$attributes = $product->get_variation_attributes();
			$variations = $product->get_available_variations();

			$available_type_keys = array_keys( wvs_available_attributes_types() );
			$available_types     = wvs_available_attributes_types();
			$default             = true;

		/////////////////////






		add_filter( 'body_class',  function($classes){

			$classes[] = 'sp-wbc-variations-gallery-swatches';
			$classes[] = sprintf( 'sp-wbc-variations-gallery-swatches-%s', call common theme key fucntion  );

			if ( is_rtl() ) {
				$classes[] = 'sp-wbc-variations-gallery-swatches-rtl';
			}

		}, 99, 1);

		note that there is one woocommerce_post_class hoos also there in the render_image_gallery function below 
		add_filter( 'post_class',  function($classes){

		}, 99, 1); 

		// apply_filters( 'post_class', string[] $classes, string[] $class, int $post_id );

		$this->render_image_gallery();
		$this->render_variations_swatches();
	}

	public function render_image_gallery() {

		add_filter( 'woocommerce_available_variation', array( $this, 'get_available_variation_gallery' ), 90, 3 );

		add_action( 'wc_ajax_get_default_gallery', array( $this, 'get_default_gallery' ) );
		add_action( 'wc_ajax_get_variation_gallery', array( $this, 'get_variation_gallery' ) );

		add_filter( 'disable_woo_variation_gallery', array( $this, 'disable_for_specific_product_type' ) );
		add_filter( 'woo_variation_product_gallery_inline_style', array( $this, 'gallery_inline_style' ) );

		add_action( 'after_setup_theme', array( $this, 'enable_theme_support' ), 200 );
		add_action( 'wp_footer', array( $this, 'slider_template_js' ) );

		add_filter( 'wc_get_template', array( $this, 'gallery_template' ), 30, 2 );
		add_filter( 'wc_get_template_part', array( $this, 'gallery_template_part' ), 30, 2 );

		public function enable_theme_support() {
			// WooCommerce.
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			$this->gallery_thumbnail_image_width();
		}

		public function gallery_thumbnail_image_width() {
			// Set from gallery settings
			$thumbnail_width = absint( woo_variation_gallery()->get_option( 'thumbnail_width', 100, 'woo_variation_gallery_thumbnail_width' ) );
			if ( $thumbnail_width > 0 ) {
				add_theme_support( 'woocommerce', array( 'gallery_thumbnail_image_width' => absint( $thumbnail_width ) ) );
			}
		}

		public function post_class( $classes, $product ) {

			$classes[] = 'woo-variation-gallery-product';

			return $classes;
		}

		public function body_class( $classes ) {

			$classes[] = 'woo-variation-gallery';
			$classes[] = sprintf( 'woo-variation-gallery-theme-%s', strtolower( basename( get_template_directory() ) ) );

			if ( is_rtl() ) {
				$classes[] = 'woo-variation-gallery-rtl';
			}

			if ( woo_variation_gallery()->is_pro() ) {
				$classes[] = 'woo-variation-gallery-pro';
			}

			return array_unique( array_values( $classes ) );
		}

		public function enqueue_scripts() {

			$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

			wp_enqueue_script( 'woo-variation-gallery-slider', esc_url( woo_variation_gallery()->assets_url( "/js/slick{$suffix}.js" ) ), array( 'jquery' ), '1.8.1', true );

			wp_enqueue_style( 'woo-variation-gallery-slider', esc_url( woo_variation_gallery()->assets_url( "/css/slick{$suffix}.css" ) ), array(), '1.8.1' );

			wp_enqueue_script( 'woo-variation-gallery', esc_url( woo_variation_gallery()->assets_url( "/js/frontend{$suffix}.js" ) ), array(
				'jquery',
				'wp-util',
				'woo-variation-gallery-slider',
				'imagesloaded',
				'wc-add-to-cart-variation'
			), woo_variation_gallery()->assets_version( "/js/frontend{$suffix}.js" ), true );

			wp_localize_script( 'woo-variation-gallery', 'woo_variation_gallery_options', apply_filters( 'woo_variation_gallery_js_options', array(
				'gallery_reset_on_variation_change' => wc_string_to_bool( woo_variation_gallery()->get_option( 'reset_on_variation_change', 'no', 'woo_variation_gallery_reset_on_variation_change' ) ),
				'enable_gallery_zoom'               => wc_string_to_bool( woo_variation_gallery()->get_option( 'zoom', 'yes', 'woo_variation_gallery_zoom' ) ),
				'enable_gallery_lightbox'           => wc_string_to_bool( woo_variation_gallery()->get_option( 'lightbox', 'yes', 'woo_variation_gallery_lightbox' ) ),
				'enable_gallery_preload'            => wc_string_to_bool( woo_variation_gallery()->get_option( 'image_preload', 'yes', 'woo_variation_gallery_image_preload' ) ),
				'preloader_disable'                 => wc_string_to_bool( woo_variation_gallery()->get_option( 'preloader_disable', 'no', 'woo_variation_gallery_preloader_disable' ) ),
				'enable_thumbnail_slide'            => wc_string_to_bool( woo_variation_gallery()->get_option( 'thumbnail_slide', 'yes', 'woo_variation_gallery_thumbnail_slide' ) ),
				'gallery_thumbnails_columns'        => absint( woo_variation_gallery()->get_option( 'thumbnails_columns', apply_filters( 'woo_variation_gallery_default_thumbnails_columns', 4 ), 'woo_variation_gallery_thumbnails_columns' ) ),
				'is_vertical'                       => in_array( $thumbnail_position, array( 'left', 'right' ) ),
				'thumbnail_position'                => trim( $thumbnail_position ),
				'thumbnail_position_class_prefix'   => 'woo-variation-gallery-thumbnail-position-',
				// 'wrapper'                           => sanitize_text_field( get_option( 'woo_variation_gallery_and_variation_wrapper', apply_filters( 'woo_variation_gallery_and_variation_default_wrapper', '.product' ) ) ),
				'is_mobile'                         => wp_is_mobile(),
				'gallery_default_device_width'      => $gallery_width,
				'gallery_medium_device_width'       => $gallery_medium_device_width,
				'gallery_small_device_width'        => $gallery_small_device_width,
				'gallery_extra_small_device_width'  => $gallery_extra_small_device_width,

			) ) );

			// Stylesheet
			wp_enqueue_style( 'woo-variation-gallery', esc_url( woo_variation_gallery()->assets_url( "/css/frontend{$suffix}.css" ) ), array( 'dashicons' ), woo_variation_gallery()->assets_version( "/css/frontend{$suffix}.css" ) );

			$this->add_inline_style();

			do_action( 'woo_variation_gallery_enqueue_scripts', $this );
		}

		public function get_available_variation_gallery( $available_variation, $variationProductObject, $variation ) {

			$product_id         = absint( $variation->get_parent_id() );
			$variation_id       = absint( $variation->get_id() );
			$variation_image_id = absint( $variation->get_image_id() );

			$has_variation_gallery_images = (bool) get_post_meta( $variation_id, 'woo_variation_gallery_images', true );
			//  $product                      = wc_get_product( $product_id );

			if ( $has_variation_gallery_images ) {
				$gallery_images = (array) get_post_meta( $variation_id, 'woo_variation_gallery_images', true );
			} else {
				// $gallery_images = $product->get_gallery_image_ids();
				$gallery_images = $variationProductObject->get_gallery_image_ids();
			}


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

			$available_variation['variation_gallery_images'] = array();

			foreach ( $gallery_images as $i => $variation_gallery_image_id ) {
				$available_variation['variation_gallery_images'][ $i ] = $this->get_product_attachment_props( $variation_gallery_image_id );
			}

			return apply_filters( 'woo_variation_gallery_available_variation_gallery', $available_variation, $variation, $product_id );
		}


		//-------------------------------------------------------------------------------
		// Gallery Template
		// Copy of: wc_get_product_attachment_props( $attachment_id = null, $product = false )
		//-------------------------------------------------------------------------------

		public function get_product_attachment_props( $attachment_id, $product_id = false ) {
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

				$props['extra_params'] = wc_implode_html_attributes( apply_filters( 'woo_variation_gallery_image_extra_params', array(), $props, $attachment_id, $product_id ) );

			}

			return apply_filters( 'woo_variation_gallery_get_image_props', $props, $attachment_id, $product_id );
		}


		public function get_gallery_image_html( $product, $attachment_id, $options = array() ) {

			$defaults = array( 'is_main_thumbnail' => false, 'has_only_thumbnail' => false );
			$options  = wp_parse_args( $options, $defaults );

			$image             = $this->get_product_attachment_props( $attachment_id );
			$post_thumbnail_id = $product->get_image_id();

			$remove_featured_image = wc_string_to_bool( woo_variation_gallery()->get_option( 'remove_featured_image', 'no', 'woo_variation_gallery_remove_featured_image' ) );

			if ( $remove_featured_image && absint( $attachment_id ) == absint( $post_thumbnail_id ) ) {
				return '';
			}

			$classes = array( 'wvg-gallery-image' );
			if ( isset( $image['video_link'] ) && ! empty( $image['video_link'] ) ) {
				array_push( $classes, 'wvg-gallery-video-slider' );
			}
			$classes = apply_filters( 'woo_variation_gallery_slider_image_html_class', $classes, $attachment_id, $image );


			$template = '<div class="wvg-single-gallery-image-container"><img loading="lazy" width="%d" height="%d" src="%s" class="%s" alt="%s" title="%s" data-caption="%s" data-src="%s" data-large_image="%s" data-large_image_width="%d" data-large_image_height="%d" srcset="%s" sizes="%s" %s /></div>';

			$inner_html = sprintf( $template, esc_attr( $image['src_w'] ), esc_attr( $image['src_h'] ), esc_url( $image['src'] ), esc_attr( $image['class'] ), esc_attr( $image['alt'] ), esc_attr( $image['title'] ), esc_attr( $image['caption'] ), esc_url( $image['full_src'] ), esc_url( $image['full_src'] ), esc_attr( $image['full_src_w'] ), esc_attr( $image['full_src_h'] ), esc_attr( $image['srcset'] ), esc_attr( $image['sizes'] ), $image['extra_params'] );

			if ( ! $options['has_only_thumbnail'] ) {
				if ( isset( $image['video_link'] ) && ! empty( $image['video_link'] ) && $image['video_embed_type'] === 'iframe' ) {
					$template   = '<div class="wvg-single-gallery-iframe-container" style="padding-bottom: %d%%"><iframe src="%s" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
					$inner_html = sprintf( $template, $image['video_ratio'], $image['video_embed_url'] );
				}

				if ( isset( $image['video_link'] ) && ! empty( $image['video_link'] ) && $image['video_embed_type'] === 'video' ) {
					$template   = '<div class="wvg-single-gallery-video-container" style="padding-bottom: %d%%"><video preload="auto" controls controlsList="nodownload" src="%s"></video></div>';
					$inner_html = sprintf( $template, $image['video_ratio'], $image['video_link'] );
				}
			}

			$inner_html = apply_filters( 'woo_variation_gallery_image_inner_html', $inner_html, $image, $template, $attachment_id, $options );

			// If require thumbnail
			if ( ! $options['is_main_thumbnail'] ) {

				$classes = array( 'wvg-gallery-thumbnail-image' );

				if ( isset( $image['video_link'] ) && ! empty( $image['video_link'] ) ) {
					array_push( $classes, 'wvg-gallery-video-thumbnail' );
				}

				$classes = apply_filters( 'woo_variation_gallery_thumbnail_image_html_class', $classes, $attachment_id, $image );

				$template   = '<img width="%d" height="%d" src="%s" class="%s" alt="%s" title="%s" />';
				$inner_html = sprintf( $template, esc_attr( $image['gallery_thumbnail_src_w'] ), esc_attr( $image['gallery_thumbnail_src_h'] ), esc_url( $image['gallery_thumbnail_src'] ), esc_attr( $image['gallery_thumbnail_class'] ), esc_attr( $image['alt'] ), esc_attr( $image['title'] ) );
				$inner_html = apply_filters( 'woo_variation_gallery_thumbnail_image_inner_html', $inner_html, $image, $template, $attachment_id, $options );
			}

			return '<div class="' . esc_attr( implode( ' ', array_unique( $classes ) ) ) . '"><div>' . $inner_html . '</div></div>';
		}

		public function get_available_variation( $product_id, $variation_id ) {
			$variable_product = new WC_Product_Variable( $product_id );
			$variation        = $variable_product->get_available_variation( $variation_id );

			return $variation;
		}

		public function get_available_variations( $product ) {

			if ( is_numeric( $product ) ) {
				$product = wc_get_product( absint( $product ) );
			}

			return $product->get_available_variations();
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

			$post_thumbnail_id = (int) apply_filters( 'woo_variation_gallery_post_thumbnail_id', $post_thumbnail_id, $attachment_ids, $product );
			$attachment_ids    = (array) apply_filters( 'woo_variation_gallery_attachment_ids', $attachment_ids, $post_thumbnail_id, $product );


			$remove_featured_image = wc_string_to_bool( woo_variation_gallery()->get_option( 'remove_featured_image', 'no', 'woo_variation_gallery_remove_featured_image' ) );


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

					$images[] = apply_filters( 'woo_variation_gallery_get_default_gallery_image', $this->get_product_attachment_props( $image_id, $product ), $product );
				}
			}

			return apply_filters( 'woo_variation_gallery_get_default_gallery_images', $images, $product );
		}

		public function get_variation_gallery_images( $product_id ) {

			$images               = array();
			$available_variations = $this->get_available_variations( $product_id );

			foreach ( $available_variations as $i => $variation ) {
				array_push( $variation['variation_gallery_images'], $variation['image'] );
			}

			foreach ( $available_variations as $i => $variation ) {
				foreach ( $variation['variation_gallery_images'] as $image ) {
					array_push( $images, $image );
				}
			}

			return apply_filters( 'woo_variation_gallery_get_variation_gallery_images', $images, $product_id );
		}

		public function get_default_gallery() {

			ob_start();

			if ( empty( $_POST ) || empty( $_POST['product_id'] ) ) {
				wp_send_json( false );
			}

			$product_id = absint( $_POST['product_id'] );

			$images = $this->get_default_gallery_images( $product_id );

			wp_send_json( apply_filters( 'woo_variation_gallery_get_default_gallery', $images, $product_id ) );
		}

		public function get_variation_gallery() {

			ob_start();

			if ( empty( $_POST ) || empty( $_POST['product_id'] ) ) {
				wp_send_json( false );
			}

			$product_id = absint( $_POST['product_id'] );

			$images = $this->get_variation_gallery_images( $product_id );

			wp_send_json( apply_filters( 'woo_variation_gallery_get_variation_gallery', $images, $product_id ) );
		}

		public function slider_template_js() {
			ob_start();
			require_once dirname( __FILE__ ) . '/slider-template-js.php';
			$data = ob_get_clean();
			echo apply_filters( 'woo_variation_gallery_slider_template_js', $data );
		}

		public function gallery_template( $template, $template_name ) {

			$old_template = $template;

			// Disable gallery on specific product

			if ( apply_filters( 'disable_woo_variation_gallery', false ) ) {
				return $old_template;
			}

			if ( $template_name == 'single-product/product-image.php' ) {
				$template = woo_variation_gallery()->template_path( '/product-images.php' );
			}

			if ( $template_name == 'single-product/product-thumbnails.php' ) {
				$template = woo_variation_gallery()->template_path( '/product-thumbnails.php' );
			}

			return apply_filters( 'woo_variation_gallery_gallery_template_override_location', $template, $template_name, $old_template );
		}

		public function gallery_template_part( $template, $slug ) {

			$old_template = $template;

			// Disable gallery on specific product

			if ( apply_filters( 'disable_woo_variation_gallery', false ) ) {
				return $old_template;
			}

			if ( $slug == 'single-product/product-image' ) {
				$template = woo_variation_gallery()->template_path( '/product-images.php' );
			}

			if ( $slug == 'single-product/product-thumbnails' ) {
				$template = woo_variation_gallery()->template_path( '/product-thumbnails.php' );
			}

			return apply_filters( 'woo_variation_gallery_gallery_template_part_override_location', $template, $slug, $old_template );
		}

		add_filter( 'woocommerce_post_class', function( $classes, $product ) {

			$classes[] = '';

			return $classes;
		}, 25, 2 );
	}

	public function render_variations_swatches() {

		/////////////////////////////woocommerce-bundle-choice/application/controllers/publics/options.php
		//////function variation_options 
		$args = wp_parse_args( $args, array(
			'options'          => false,
			'attribute'        => false,
			'product'          => false,
			'selected'         => false,
			'name'             => '',
			'id'               => '',
			'class'            => '',
			'type'             => '',
			'show_option_none' => esc_html__( 'Choose an option')
		) );
			
		$type                  = $args[ 'type' ];
		$options               = $args[ 'options' ];
		$product               = $args[ 'product' ];
		$attribute             = $args[ 'attribute' ];
		$name                  = $args[ 'name' ] ? $args[ 'name' ] : wc_variation_attribute_name( $attribute );
		$id                    = $args[ 'id' ] ? $args[ 'id' ] : sanitize_title( $attribute );
		$class                 = $args[ 'class' ];
		$show_option_none      = $args[ 'show_option_none' ] ? true : false;
		$show_option_none_text = $args[ 'show_option_none' ] ? $args[ 'show_option_none' ] : esc_html__('Choose an option'); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.
		
		if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
			$attributes = $product->get_variation_attributes();
			$options    = $attributes[ $attribute ];
		}
		
		if ( $product && taxonomy_exists( $attribute ) ) {

			echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . esc_attr( $type ) . '" style="display:none" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';			
		} else {
			echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
		}
		
		if ( $args[ 'show_option_none' ] ) {
			echo '<option value="">' . esc_html( $show_option_none_text ) . '</option>';
		}
	
		if ( ! empty( $options ) ) {
			if ( $product && taxonomy_exists( $attribute ) ) {
				// Get terms if this is a taxonomy - ordered. We need the names too.
				$terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) );
				
				foreach ( $terms as $term ) {
					if ( in_array( $term->slug, $options ) ) {
						echo '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $args[ 'selected' ] ), $term->slug, false ) . '>' . apply_filters( 'woocommerce_variation_option_name', $term->name ) . '</option>';
					}
				}
			} else {
				foreach ( $options as $option ) {
					// This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
					$selected = sanitize_title( $args[ 'selected' ] ) === $args[ 'selected' ] ? selected( $args[ 'selected' ], sanitize_title( $option ), false ) : selected( $args[ 'selected' ], $option, false );
					echo '<option value="' . esc_attr( $option ) . '" ' . $selected . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>';
				}
			}
		}
			
		echo '</select>';

		$content = $this->variable_item( $type, $options, $args );
				function variable_item( $type, $options, $args, $saved_attribute = array() ) {
					
						-- here we see that the different swatches templates that are supported are scattered around, but now it should be in the new template folder planned as per the templating standard 
							--	there will be three template files that will be required for any widget that provides swatches UI -- to b 
									--	 and in the palce of the dropdown part in below filename the input type name would change to icon, icon_dropdown, slider and so on -- to b 
								--	sp_variations_optionsUI_dropdown_ribbon_wrapper.php 		
								--	sp_variations_optionsUI_dropdown.php 		
								--	sp_variations_optionsUI_dropdown_option_template_part.php 		
							--	I think the swatches means maybe the icon template will be default and rest will be in their own folder like dropdown, icon-dropdown and so on -- to b ACTIVE_TODO
									--	when we implement the switches for the default swatches type at that time we should do it -- to h or -- to b or -- to d ACTIVE_TODO 
								--	and now the $args will support one more param like page_section which will work as dir so the folder structure would become single-product/variations-swatches/icon-dropdown/ -- to b 
									--	and for extensions like darker lighter or 360 or recently purchased or diamond meta have their tempalte for image gallary then the folder structure would become single-product/image-gallery/ * /	and it would be needed for both recently purchased and the diamond meta -- to b 
								--	and also accordingly you also need to precisely separate the below templates and put them in their owm dolers, as per above mentioned structure. do it accurately by following all the if and so on conditions below and in above function also -- to b 
									--	and most of logic in this class also sound like the rendering logic so need to keep track of that also -- to b 
						$product   = $args[ 'product' ];
						$attribute = $args[ 'attribute' ];
						$data      = '';
						$id                    = $args[ 'id' ] ? $args[ 'id' ] : sanitize_title( $attribute );

						if ( ! empty( $options ) ) {			
							if ( $product && taxonomy_exists( $attribute ) ) {
								$terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) );
								$name  = uniqid( wc_variation_attribute_name( $attribute ) );

								if(in_array($type,array('dropdown_image','dropdown_image_only','dropdown'))) {
									$selected_item = sanitize_title( $args[ 'selected' ] );
									if(!empty($selected_item)){
										$selected_item = wbc()->wc->get_term_by( 'slug',$selected_item,$attribute);
										if(!is_wp_error($selected_item) and !empty($selected_item) ){
											$image_url = get_term_meta( $selected_item->term_id, 'wbc_attachment', true );
											
											if($type=='dropdown_image' and !empty($image_url)) {
												--- move to woo-bundle-choice/templates/single-product/variations-swatches/dropdown_image/sp_variations_optionsUI-dropdown_image-option_template_part.php file
												/*$selected_item =  sprintf( '<img class="ui mini avatar image" src="%s">%s', esc_url( $image_url ),esc_attr( $selected_item->name ));*/
												
											} elseif ($type=='dropdown_image_only' and !empty($image_url)) {
												--- move to /woo-bundle-choice/templates/single-product/variations-swatches/dropdown_image_only/sp_variations_optionsUI-dropdown_image_only-option_template_part.php file 
												/*$selected_item =  sprintf( '<img class="ui mini avatar image" src="%s">', esc_url( $image_url ));*/
											} else {
												move to /woo-bundle-choice/templates/single-product/variations-swatches/dropdown/sp_variations_optionsUI-dropdown-option_template_part.php file
												/*$selected_item =  sprintf( '%s',esc_attr( $selected_item->name ));*/
											}
										} else {
											$selected_item ='Choose an option';	
										}
									} else{
										$selected_item ='Choose an option';
									}
									----- move to woo-bundle-choice/templates/single-product/variations-swatches/sp_variations_optionsUI-dropdown-image-image_only-ribbon_wrapper.php ma
									/*$data.=sprintf( '<div class="ui fluid selection dropdown" style="min-height: auto;">
											  <input type="hidden" name="attribute_%s" data-attribute_name="attribute_%s" data-id="%s">
											  <i class="dropdown icon"></i>
											  <div class="default text">%s</div>
											  <div class="menu">',esc_attr( $attribute ),esc_attr( $attribute ),esc_attr( $attribute ),$selected_item);*/
								}


								--- move to woo-bundle-choice/templates/single-product/variations-swatches/sp_variations_optionsUI-dropdown-image-image_only.php ma
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

								----- move to woo-bundle-choice/templates/single-product/variations-swatches/sp_variations_optionsUI-dropdown-image-image_only-ribbon_wrapper.php ma
								/*if(in_array($type,array('dropdown_image','dropdown_image_only','dropdown'))) {
									$data.=sprintf('</div></div>');
								}*/
							}
						}

						return $data;
					}
		
		echo $this->variable_items_wrapper( $content, $type, $args );
		///////////////////////////

		
		add_filter( 'woocommerce_dropdown_variation_attribute_options_html',  function($html, $args){
            
            if ( apply_filters( 'default_wbc_variation_attribute_options_html', false, $args, $html ) ) {
                return $html;
            }
			if ( apply_filters( 'default_wvs_variation_attribute_options_html', false, $args, $html ) if the args['type'] is not supported by our free plugin or premium template then simply return the html. so we maybe need that flow here which checks for premium template is not set or even not available in free plugin. we maybe planned hook for this already or atleast the hook is suggested for this. there is that older hook also but we simply need to create new one and use that only to ensure neat and clean implementation as well as it will help avoid confusion that is likely. mark older as deprecated. ) {
				return $html;
			}

			ACTIVE_TODO move it to sp_wbc_compatability function woo_general_broad_matters_compatability -- to d 
            // WooCommerce Product Bundle Fixing
            if ( isset( $_POST[ 'action' ] ) && wbc()->sanitize->post('action') === 'woocommerce_configure_bundle_order_item' ) {
                return $html;
            }
            

			// For bundle Product static item
			$args['show_option_none'] = esc_html__( 'Choose an option', 'woo-variation-swatches' );

			ACTIVE_TODO we also need to provide default setting and I think we can simply give dropdown with three options like default to image, button or dropdown_image 
			// $is_default_to_image          = apply_filters( 'wvs_is_default_to_image', ! ! ( woo_variation_swatches()->get_option( 'default_to_image' ) ), $args );
			// $is_default_to_button         = apply_filters( 'wvs_is_default_to_button', ! ! ( woo_variation_swatches()->get_option( 'default_to_button' ) ), $args );
			// $default_image_type_attribute = apply_filters( 'wvs_default_image_type_attribute', woo_variation_swatches()->get_option( 'default_image_type_attribute' ), $args );

			// $is_default_to_image_button = ( $is_default_to_image || $is_default_to_button );

			$currency       = get_woocommerce_currency();




            $attribute_id = wc_variation_attribute_name( $args[ 'attribute' ] );
            
            $attribute_name = sanitize_title( $args[ 'attribute' ] );

            wbc()->load->model('category-attribute');
            $attribute = \eo\wbc\model\Category_Attribute::instance()->get_attribute(str_replace('pa_','',$args[ 'attribute' ]));

            $product_id = $args[ 'product' ]->get_id();
            
        	--	and we can make use of the below flow in our fetch data function layers planned 
        		--	and keep in mind that we had to take care of two data layers(or response that we need to sent to two different place one is variations image gallery and the second is the variations form) one for variations image gallery and the second is for the variations form 
        		--	move all the applicable data layers from below and also from gallery_images layer to the below called get_data -> fetch_data function -- to b 
        			--	and then have only get_data call with sp_variations argument from the main render_variations_ui and pass the result data to gallery_images and render_variations_swatches function being called -- to b 
        				--	and then get_data should also host means fetch_data should also the layer with gallery_images and swatches as the argument, so that their specific data can be loaded from there only -- to b 
            $attributes = $args[ 'product' ]->get_variation_attributes();
            $variations = $args[ 'product' ]->get_available_variations();
			$this->get_data( "sp_variations" );	

            $type = 'select';     
            if(!empty($attribute->attribute_type)){
            	$type = $attribute->attribute_type;
            } else {
            	$type = 'select';
            }

            if(in_array($type,array('color','image','image_text','dropdown_image','dropdown_image_only','dropdown','button'))) {
            	$html = call_user_func_array(
            		array($this,'variation_options'),array(
            		array(
                    	'options'    => $args[ 'options' ],
                    	'attribute'  => $args[ 'attribute' ],
                    	'product'    => $args[ 'product' ],
                        'selected'   => $args[ 'selected' ],
                        'type'       => $type,
                        'is_archive' => ( isset( $args[ 'is_archive' ] ) && $args[ 'is_archive' ]),
                        'attribute_object' => $attribute
                    ))
            	);
            }            




			ob_start();

			if ( apply_filters( 'wvs_no_individual_settings', true, $args, $is_default_to_image, $is_default_to_button ) ) {

				$attributes = $product->get_variation_attributes();
				$variations = $product->get_available_variations();

				$available_type_keys = array_keys( wvs_available_attributes_types() );
				$available_types     = wvs_available_attributes_types();
				$default             = true;

				foreach ( $available_type_keys as $type ) {
					if ( wvs_wc_product_has_attribute_type( $type, $args['attribute'] ) ) {

						$output_callback = apply_filters( 'wvs_variation_attribute_options_callback', $available_types[ $type ]['output'], $available_types, $type, $args, $html );
						$output_callback(
							apply_filters(
								'wvs_variation_attribute_options_args', wp_parse_args(
									$args, array(
										'options'    => $args['options'],
										'attribute'  => $args['attribute'],
										'product'    => $product,
										'selected'   => $args['selected'],
										'type'       => $type,
										'is_archive' => ( isset( $args['is_archive'] ) && $args['is_archive'] )
									)
								)
							)
						);
						$default = false;
					}
				}

				if ( $default && $is_default_to_image_button ) {

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
						}

						$type     = ( empty( $assigned[ $current_attribute_name ] ) ? 'button' : 'image' );
						$assigned = ( isset( $assigned[ $current_attribute_name ] ) ? $assigned[ $current_attribute_name ] : array() );

						if ( $type === 'button' && ! $is_default_to_button ) {
							$type = 'select';
						}

						wvs_default_image_variation_attribute_options(
							apply_filters(
								'wvs_variation_attribute_options_args', wp_parse_args(
									$args, array(
										'options'    => $args['options'],
										'attribute'  => $args['attribute'],
										'product'    => $product,
										'selected'   => $args['selected'],
										'assigned'   => $assigned,
										'type'       => $type,
										'is_archive' => ( isset( $args['is_archive'] ) && $args['is_archive'] )
									)
								)
							)
						);

					} elseif ( $is_default_to_button ) {

						wvs_default_button_variation_attribute_options(
							apply_filters(
								'wvs_variation_attribute_options_args', wp_parse_args(
									$args, array(
										'options'    => $args['options'],
										'attribute'  => $args['attribute'],
										'product'    => $product,
										'selected'   => $args['selected'],
										'is_archive' => ( isset( $args['is_archive'] ) && $args['is_archive'] )
									)
								)
							)
						);
					} else {
						echo $html;
					}
				} elseif ( $default && ! $is_default_to_image_button ) {
					echo $html;
				}

			}

			$data = ob_get_clean();

			$html = apply_filters( 'wvs_variation_attribute_options_html', $data, $args, $is_default_to_image, $is_default_to_button );

			return $html;
		}, 200, 2);	

		
		add_filter( 'script_loader_tag',  function($tag){

		}, 99, 1)
	}

	public function load_asset(){

	}

}