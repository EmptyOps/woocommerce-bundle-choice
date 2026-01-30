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
	public function get_data($for_section="default", $args=array()) {

		
		global $product;	

		// add that four conditions here in below if, simply as or conditions -- to d or -- to b done
		if( $for_section == "gallery_images_init" ||  $for_section == "swatches_init" || $for_section == "swatches" || $for_section == "gallery_images") {

			// --	ACTIVE_TODO we need to make the common data layer clas s definition and create its base class(or maybe the grand parent or so class of the model classes which eowbc_model maybe appropriate choise for considering as data layer class but that should be in data model package like we have some data layer class heirarchy but that is mostly focused on legacy while our these modules are not strictly legacy neither strictly independent so need to decide right class for serving as data class for a module) or say data clas s and it would be used by both admin and frontend layer -- to h 
			// --	ACTIVE_TODO	and based on the data definition the form definition will be created always if not the ui definition
			// 	--	ACTIVE_TODO	and the ui definition will also be created based on this but it will depend on possibility so where possible it will be created 
			// 		--	ACTIVE_TODO	and once above is implemented, then implement the calling stack precisely and on this regard the ui definition and form definition would be created from controller layers. -- and once it is neatly implemented then it will clear our 1-2 year old quest of creating a central layer for both admin and frontend and we started with assuming the ui_array(definition) as the base of all of it and center to everything but now (most likely) the data clas s would sit on top of ui_array(definition). but yeah ui_array will have its own independance to define ui but the data within the ui would be controlled by the data definition. 
			// temporary till above ACTIVE_TODO are implemented
			if($for_section == 'gallery_images_init') {
				$args['data_definition'] = null;
				$args['form_definition'] = null;	//	now the form definition is created on the hook layer because without the entity id it was not possible to prepare the form // \eo\wbc\controllers\admin\menu\page\Tiny_features::instance()->init(array('temporary_get_form_directly'=>true, 'is_legacy_admin'=>true));
				$args['ui_definition'] = null;
			}

			// once the data is ready the particular layer will do action hook like sp_variations_render_data and so below render_ui function will add action to that hook -- to h 
			// 		INVALID	
			// 	-- if there is any more neat or better flow then we should do that but I think maybe is seems optimum for now 
			// 		--	since swatches related woo hook is also providing or covering on most data so we may have limited needs for below fetch_data function to cover data requirements 
			// 			--	or instead the below fetch_data should simply be called from within the woo swatches related hooks so that there is no unnecessary hook that we need to add. yeah this is good idea. 
			// 				--	however even better is from inside that hook only get_data of this class will be called, so below call will remain here 
			return \eo\wbc\model\publics\data_model\SP_WBC_Variations::fetch_data($for_section, $product, $args );	
		}elseif( $for_section == "get_default_gallery") {

			return \eo\wbc\model\publics\data_model\SP_WBC_Variations::fetch_data($for_section, $product, $args );	

		}elseif( $for_section == "get_variation_gallery") {	

			return \eo\wbc\model\publics\data_model\SP_WBC_Variations::fetch_data($for_section, $product, $args );	

		}	
		
	}

	public function render_ui($page_section){

		$this->render_variations_ui();

		if($page_section == 'get_default_gallery') {

		} elseif($page_section == 'get_variation_gallery') {
		
		}
	}

	public function render_variations_ui() {


		///////////////////////////woocommerce-bundle-choice/application/controllers/publics/options.php
		////////////////////////function run()
		/*---- move to public function render_variations_swatches() ma*/
		if (false) {
			add_action('wp_footer',function(){
				/*ACTIVE_TODO_OC_START
				--	check below two files and check if there is any optionsUI related flow there -- to b 
				ACTIVE_TODO_OC_END*/
				wbc()->theme->load('css','product');
	        	wbc()->theme->load('js','product');
				// Toggle Button
				$toggle_status = true;
				//wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_status',true);

				/*ACTIVE_TODO_OC_START
				--	and by default the expand collapse should be disabled, and when that is disabled nothing related to that will be loaded on frontend -- to b. if required ask t to take care of html css js etc -- to t 
				ACTIVE_TODO_OC_END*/
				$init_toggle = wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_init_status');			
				
				$toggle_text = wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_text',__('CUSTOMIZE THIS PRODUCT'));
				/*ACTIVE_TODO_OC_START
				--	have t update defaults to a general kind of theme -- to t. current style is so catchy and dark and need to have grayish like general theme that works mostly if not updated. 
				ACTIVE_TODO_OC_END*/
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

						//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
			        	$custom_css = "
						    .ui.mini.images .variable-item.image {
						        width: auto;						
						    }					
						    .image-variable-item {
						        border: none !important;
						        border-bottom: 2px solid transparent !important;
						    }
						    body .image-variable-item.selected, .image-variable-item:hover {	        			
						        box-shadow: none !important;        			
						        border-bottom: 2px " . __($border_hover_color) . " solid !important;
						    }
						    .image_text-variable-item {
						        border: none !important;
						    }
						    .image_text-variable-item:not(.selected) div {
						        visibility: hidden;
						    }
						    .image_text-variable-item:hover div {
						        visibility: visible;
						    }
						    .image_text-variable-item.selected, .image_text-variable-item:hover {	        			
						        box-shadow: none !important;
						    }
						    .woocommerce .summary.entry-summary table.variations tr {
						        width: auto !important;
						    }
						    .rotate-up {
						        -webkit-animation: spin-up 0.3s linear ;
						        -moz-animation: spin-up 0.3s linear ;
						        animation: spin-up 0.3s linear ;
						        animation-fill-mode: forwards;
						    }
						    @-moz-keyframes spin-up { 100% { -moz-transform: rotate(-180deg); } }
						    @-webkit-keyframes spin-up { 100% { -webkit-transform: rotate(-180deg); } }
						    @keyframes spin-up { 100% { -webkit-transform: rotate(-180deg); transform: rotate(-180deg); } }
						    .rotate-down {
						        -webkit-animation: spin-down 0.3s linear;
						        -moz-animation: spin-down 0.3s linear;
						        animation: spin-down 0.3s linear;
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
						            transform: rotate(180deg); 
						        } 					
						        100% { 
						            -webkit-transform: rotate(360deg); 
						            transform: rotate(360deg); 
						        }
						    }
						    #wbc_variation_toggle {
						        padding: 0.7em;
						        margin-bottom: 0.7em;
						        border: 1px solid #5e5c5b;
						        display: inline-block;
						        color: #2d2d2d;
						        font-size: 1rem;
						        cursor: pointer;
						        border-radius: 1px !important;
						    } 
						    table.variations {
						        padding: 5px;
						        border: 1px solid #5e5c5b;
						    }
						    table.variations td {
						        //display: table-cell !important;
						        border: none !important;
						    }
						    table.variations td:first-child {
						        /*border-right: 1px solid #5e5c5b !important;*/
						        /*text-align: center;*/
						    }
						    .ui.images {
						        width: 100% !important;
						        margin: auto !important;
						        float: none !important;
						    }
						    table.variations {
						        table-layout: auto !important;
						        margin: inherit !important;
						    }
						    table.variations td.label {
						        display: none !important;
						    }
						    table.variations .value {
						        padding-left: 1rem !important;
						    }
						    .variable-items-wrapper {
						        list-style: none;
						        display: table-cell !important;	        			
						    }
						    .ui.red.ribbon.label {
						        margin-bottom: 5px !important;
						    }
						    .variable-items-wrapper .variable-item div {
						        margin: auto;
						        display: block;
						    }
						    body .variable-items-wrapper .variable-item {        			
						        /*display: inline-table;*/
						        height: " . __($dimention) . " !important;
						        width: " . __($dimention) . " !important;
						        min-width: 35px;						
						        text-align: center;						
						        line-height: " . __($dimention) . " !important;	        			
						        cursor: pointer;
						        margin: 0.25rem;
						        text-align: center;
						        border: " . __($border_width) . " solid " . __($border_color) . " !important;
						        border-radius: " . __($border_radius) . " !important;
						        overflow: hidden;
						    }	
						    body .variable-items-wrapper .variable-item:hover, .variable-items-wrapper .selected {
						        box-shadow: 0px 0px " . __($border_hover_width) . " " . __($border_hover_color) . " !important;        			
						        border: 1px " . __($border_hover_color) . " solid !important;
						    }
						    ul.variable-items-wrapper {
						        margin: 0px;
						    }
						    body .variable-item-color-fill, .variable-item-span {        			
						        height: " . __($dimention) . " !important;
						        width: 100%;
						        line-height: " . __($dimention) . " !important;
						    }
						    .select2, .select3-selection {
						        display: none !important;
						    }
						    body .button-variable-item {
						        background-color: " . __($bg_color) . " !important;
						        color: " . __($font_color) . " !important;
						    }
						    body .button-variable-item:hover {
						        background-color: " . __($bg_hover_color) . " !important;
						        color: " . __($font_hover_color) . " !important;	
						    }
						";

						wbc()->load->add_inline_style('', $custom_css, 'common');
					$wbc_variation_toggle_trigger_click = false;
					if(empty($init_toggle)){

						$wbc_variation_toggle_trigger_click = true;
					}

		        	// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
					$inline_script = 
					    "jQuery(document).ready(function(\$){\n" .
					    "    jQuery(\".dropdown\").dropdown().on('change',function(){\n" .
					    "        var target_selector =  \$('#'+\$(this).find('input[type=\"hidden\"]').data('id'));\n" .
					    "        target_selector.val(\$(this).find('input[type=\"hidden\"]').val());\n" .
					    "        /*\$(this).parent().find('.selected').removeClass('selected');\n" .
					    "        \$(this).addClass('selected');*/\n" .
					    "        jQuery(\".variations_form\" ).trigger('check_variations');\n" .
					    "        \$(target_selector).trigger('change');\n" .
					    "    });\n" .
					    "    if(\$('table.variations tbody>tr').length>0){\n" .
					    "        \$('table.variations').addClass('ui raised segment');\n" .
					    "    }\n" .
					    "\n" .
					    "    \$('#wbc_variation_toggle').on('click',function(){\n" .
					    "        if(\$(this).find('.icon').hasClass('rotate-up')) {\n" .
					    "            \$(this).find('.icon').removeClass('rotate-up');\n" .
					    "            \$(this).find('.icon').addClass('rotate-down');\n" .
					    "            \$('table.variations').slideToggle(\"slow\");\n" .
					    "        } else {\n" .
					    "            \$(this).find('.icon').removeClass('rotate-down');\n" .
					    "            \$(this).find('.icon').addClass('rotate-up');\n" .
					    "            \$('table.variations').slideToggle(\"slow\");\n" .
					    "        }\n" .
					    "    });\n" .
					    "\n" .
					    "\n" .

					    " ".
					    	(
					    		$wbc_variation_toggle_trigger_click == true
					    		?
					    			"    \$('#wbc_variation_toggle').trigger('click');\n" 
					    		:
					    		""
					    	).

					    "\n".
					    "    // ACTIVE_TODO_OC_START\n" .
					    "    // --    below two click events would be implemented in the core variations js module, in that case it will be remove here\n" .
					    "    // ACTIVE_TODO_OC_END\n" .
					    "    \$('.variable-item').on('click',function(){\n" .
					    "        var target_selector = \$('#'+\$(this).data('id'));\n" .
					    "        target_selector.val(\$(this).data('value'));\n" .
					    "        \$(this).parent().find('.selected').removeClass('selected');\n" .
					    "        \$(this).addClass('selected');\n" .
					    "        jQuery(\".variations_form\" ).trigger('check_variations');\n" .
					    "        \$(target_selector).trigger('change');\n" .
					    "    });\n" .
					    "\n" .
					    "    jQuery(\".variations_form\").on('click', '.reset_variations'/*'woocommerce_variation_select_change'*//*'reset'*/,function(){\n" .
					    "        jQuery('.variable-items-wrapper .selected').removeClass('selected');\n" .
					    "        jQuery('.variable-items-wrapper .dropdown').dropdown('restore defaults');\n" .
					    "    });\n" .
					    "\n" .
					    "});\n";

					wbc()->load->add_inline_script('', $inline_script, 'common');
				// echo ob_get_clean();

				if(!empty($toggle_status)){	
					if(has_action('woocommerce_before_variations_form')){
						add_action( 'woocommerce_before_variations_form',function( ) use($toggle_text){
							// wbc()->load->asset('css','fomantic/semantic.min');
							// wbc()->load->asset('js','fomantic/semantic.min',array('jquery'));
							wbc()->load->built_in_asset('semantic');
							ob_start();
							?>
								<span id="wbc_variation_toggle" class="ui raised segment">
									<?php echo esc_attr($toggle_text); ?><i class="caret up icon" style="text-align: center;line-height: 1em;"></i>						
								</span>
							<?php
							echo ob_get_clean();
						}, 10, 1 );	
					} else {

						// wbc()->load->asset('css','fomantic/semantic.min');
						// wbc()->load->asset('js','fomantic/semantic.min',array('jquery'));
						wbc()->load->built_in_asset('semantic');
						$toggle_text = __($toggle_text);

						// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
						$inline_script = 
							"jQuery(\".variations_form\").before('<span id=\"wbc_variation_toggle\" class=\"ui raised segment\">".($toggle_text)."<i class=\"caret up icon\" style=\"text-align: center;line-height: 1em;\"></i></span>');";
							
						wbc()->load->add_inline_script( '', $inline_script, 'common' );
					}				
				}
			});
		}
		
		// ACTIVE_TODO do the needful asap as per the demand -- to h and -- to d 
		// 	--	first check in the plugin we were exploring, if there is any implementation that is necessary -- to d 
		add_filter( 'script_loader_tag',  function($tag){
			
			// ACTIVE_TODO - we may like to implement defer loading logic.

			return $tag;	

		}, 10, 3);






		

		// apply_filters( 'post_class', string[] $classes, string[] $class, int $post_id );

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

		// implement the hook in inline callback function here -- to d done
			 
	

		// add_action( 'after_setup_theme', array( $this, 'enable_theme_support' ), 200 );
		add_action( 'after_setup_theme', function(){
			/*ACTIVE_TODO_OC_START
			ACTIVE_TODO we need to observer if it is actually required to enable it otherwise if it is creating any issue then we can simply disable
			ACTIVE_TODO_OC_END*/
			// WooCommerce.
			/*add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			$this->gallery_thumbnail_image_width();*/
		}, 200 );

		/*ACTIVE_TODO_OC_START
		we may not need to load any js from here, but still confirm and then comment -- to d
		
			// ACTIVE_TODO but yeah very soon for both gallery_images and swatches module we would like publich the init flags from here and if that is true then only init the respective modules on the js layer -- to d 
		add_action( 'wp_footer', array( $this, 'slider_template_js' ) );
		ACTIVE_TODO_OC_END*/

		//create product-images.php file like in the other plugin that we were exploring have -- to b done
			//--	and add below two hooks in this same render_image_gallery function -- to b done
				//--	and create function in model namely render_image_gallery_template and call it from controller right below the get_data call for gallery_images_init -- to b done
					//--	and inside the hooks set path of above created file -- to b done
						//--	and from inside the file call options controller function product_images_template_callback, so create that function -- to b done
							//--	and from that function call model function render_gallery_images_template_callback -- to b done
								//--	and on this note wherever there is function name have part image_gallery then rename it to gallery_images -- to b  done
									// --	from above function in model copy the code from the referenced template and the implementation will start from here. it will mostly have hook bindings that will provide the variations images and the rest of the template rendering and even js tempalte preparation will happen on slider and zoom module layers. 
										// --	and on this regard if nothing else then this function should at top init the slider and zoom module but maybe that should be at more appropriate higher layers of init etc. functions maybe
											//--	so add call from here at top in this function -- to b  done
		

		/*ACTIVE_TODO_OC_START
		public function gallery_thumbnail_image_width() {
			// Set from gallery settings
			$thumbnail_width = absint( woo_variation_gallery()->get_option( 'thumbnail_width', 100, 'woo_variation_gallery_thumbnail_width' ) );
			if ( $thumbnail_width > 0 ) {
				add_theme_support( 'woocommerce', array( 'gallery_thumbnail_image_width' => absint( $thumbnail_width ) ) );
			}
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
		ACTIVE_TODO_OC_END*/

		/*ACTIVE_TODO_OC_START
		ACTIVE_TODO we may like to provide remove_featured_image setting on our admin 
			--	t and a need make sure that this time you make the css structure precisely and maturely, like that is in sync with and based on the heirachiical classes structure we have planned -- to a and -- to t. it is a must. 
				--	there should be dedicated classes for things like wbc-sp-variations-slider-video-thumb wbc-sp-variations-zoom-video-container wbc-sp-variations-zoom-darklight-container and so on. -- to t and -- to a and -- to b 


		we need to create zoom loop custom html tempalte that supports the mp4 videos 
			--	what option do we have for the dom, I think its below two one is iframe and second is video tag, but not sure what are their pros and cons -- to t and -- to a 
				--	brief about the pros and cons of both options -- to t and -- to a 


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
		ACTIVE_TODO_OC_END*/

		/*ACTIVE_TODO_OC_START
		what difference does it make when edit is used in the below function call, need to do research -- to d ACTIVE_TODO
		ACTIVE_TODO_OC_END */

		/*ACTIVE_TODO_OC_START
		firstly we need to create a standard ajax function in options controller -- to d 
			then need to define some way in the bootstrap proces so that ajax function of this options controller gets callled on ajax -- to h. simply we can create a ajax function in the bootstrap process, or there is one already, and that function would call certain controllers ajax function when their applicable ajax action is detected? so maybe the ajax function will recieve the key of detected ajax action in its args param(so ajax function will have args param) 
				--	then it can call set of functions of controller and model like get_data, selectron, selectron hook render, load view, getUI, render ui and so on but yeah it can not call the should_init and init. -- to d 
					--	so just implement below four functions in the applicable function layers, with appropriate page_section key setting -- to d 
						--	one important thing is that we will the merge the implementation of our get_available_variation hook callback function implementation in wbc variations class with below two functions, below two functions will simply inject their unique flows with proper if conditions -- to d 
							--	however that need to be moved a common function with some name like get_available_variation_core and it will be private function in the same class with some more params with default values -- to d 
		ACTIVE_TODO_OC_END*/

		// move below hooks to the specific render_gallery_images and render_variations_swatches fucntions below. means both body_class and post_class hook, and also implement the woocommerce_post_class hook for both which is for now only for the gallery_images function only -- to b done 
			// --	and in each hook add classes in this format for example wbc-sp-variations-swatches and wbc-sp-variations-swatches-rtl and wbc-sp-variations-swatches-post and wbc-sp-variations-swatches-post-rtl and wbc-sp-variations-swatches-woopost and so on. for theme it would be wbc-sp-variations-swatches-theme. and same for the gallery_images function also, of course. -- to b done  
		/*ACTIVE_TODO_OC_START
			--	regarding css, t be noted that it should go in appropriate asset files only. will discuss about that -- to t. 
		ACTIVE_TODO_OC_END*/

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

		/////////////////////////////woocommerce-bundle-choice/application/controllers/publics/options.php
		//////function variation_options 
		//--- merged 

				/*function variable_item( $type, $options, $args, $saved_attribute = array() ) {*/
					//--- merged 
					/*ACTIVE_TODO_OC_START
					move to asana task like wbc templating. -- to d 
						-- here we see that the different swatches templates that are supported are scattered around, but now it should be in the new template folder planned as per the templating standard 
							--	there will be three template files that will be required for any widget that provides swatches UI 
									--	 and in the palce of the dropdown part in below filename the input type name would change to icon, icon_dropdown, slider and so on  
								--	sp_variations_optionsUI_dropdown_ribbon_wrapper.php 		
								--	sp_variations_optionsUI_dropdown.php 		
								--	sp_variations_optionsUI_dropdown_option_template_part.php 		
							--	I think the swatches means maybe the icon template will be default and rest will be in their own folder like dropdown, icon-dropdown and so on -- to b ACTIVE_TODO 
										--	there is a catch, dropdown, icon-dropdown and so on folders in the tempaltes folder does represent one entire widget and whatever inside there should be considered as the default template and if then any other folder appear inside above folders then that would be considered as the alternate widget folder - NOTE 
									--	when we implement the switches for the default swatches type at that time we should do it -- to h or -- to b or -- to d ACTIVE_TODO 
								--	and now the $args will support one more param like page_section which will work as dir so the folder structure would become single-product/variations-swatches/icon-dropdown/ -- to b 
									--	and for extensions like darker lighter or 360 or recently purchased or diamond meta have their tempalte for image gallary then the folder structure would become single-product/image-gallery/ * /	and it would be needed for both recently purchased and the diamond meta -- to b 
								--	and also accordingly you also need to precisely separate the below templates and put them in their owm dolers, as per above mentioned structure. do it accurately by following all the if and so on conditions below and in above function also -- to b 
									--	and most of logic in this class also sound like the rendering logic so need to keep track of that also -- to b 
					ACTIVE_TODO_OC_END*/
						 
					/*}*/

		add_action('wp_footer',function(){
			/*--	check below two files and check if there is any optionsUI related flow there -- to b done*/
				/*-- ACTIVE_TODO need to rethink theme adaption library flow, the patches inside the files are fine but all those patches are related to something else and none are related to optionsUI so we need a flow where particular layer load thier particular theme adaption part only. -- and on this regard one other thing that is needed that we noted for theme adaption is reusability and maintainability mostly.*/  

			wbc()->theme->load('css','product');
        	wbc()->theme->load('js','product');
			// Toggle Button

        	$asset_params = array();
        	
			$asset_params['toggle_status'] = true/*wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_status',true)*/;

			/*ACTIVE_TODO_OC_START
			--	and by default the expand collapse should be disabled, and when that is disabled nothing related to that will be loaded on frontend -- to b. if required ask t to take care of html css js etc -- to t 
			ACTIVE_TODO_OC_END*/
			$asset_params['init_toggle'] = wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_init_status');			
			
			$asset_params['toggle_text'] = wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_text',__('CUSTOMIZE THIS PRODUCT'));
			/*ACTIVE_TODO_OC_START
			--	have t update defaults to a general kind of theme -- to t. current style is so catchy and dark and need to have grayish like general theme that works mostly if not updated.
			ACTIVE_TODO_OC_END */
			// Variation item non-hovered
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
			/*ACTIVE_TODO_OC_START
			--	and load asset function of this model from here, with page_section param -- to b 
				--	and inside there put if condition for page_section and load asset from inside there like you did in some other model -- to b 
					--	then remove all below css and js from here -- to b 

			--	and do same all above for slider and zoom layers of their default implementation render layers also if not yet -- to b. note that it has nothing to do with their init_core and render_core fucntion.
			ACTIVE_TODO_OC_END*/ 
			ob_start();

				//--- move to /woo-bundle-choice/asset/variations.assets.php file ma
			?>

				<!-- <style type="text/css">
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
	        	</script> -->
			<?php
			echo ob_get_clean();

			if(!empty($toggle_status)){	
				if(has_action('woocommerce_before_variations_form')){
					add_action( 'woocommerce_before_variations_form',function( ) use($toggle_text){
						// wbc()->load->asset('css','fomantic/semantic.min');
						// wbc()->load->asset('js','fomantic/semantic.min',array('jquery'));
						ob_start();
						?>
							<span id="wbc_variation_toggle" class="ui raised segment">
								<?php echo esc_html($toggle_text); ?><i class="caret up icon" style="text-align: center;line-height: 1em;"></i>						
							</span>
						<?php
						echo ob_get_clean();
					}, 10, 1 );	
				} elseif(false) {
					// wbc()->load->asset('css','fomantic/semantic.min');
					// wbc()->load->asset('js','fomantic/semantic.min',array('jquery'));
					ob_start();
					?>	
						<script>
							jQuery(".variations_form").before('<span id="wbc_variation_toggle" class="ui raised segment"><?php _e($toggle_text); ?><i class="caret up icon" style="text-align: center;line-height: 1em;"></i></span>');	
						</script>
					<?php
					echo ob_get_clean();
				}				
			}

			$this->load_asset();

		});
	
		// move below hooks to the specific render_gallery_images and render_variations_swatches fucntions below. means both body_class and post_class hook, and also implement the woocommerce_post_class hook for both which is for now only for the gallery_images function only -- to b done 
			// --	and in each hook add classes in this format for example wbc-sp-variations-swatches and wbc-sp-variations-swatches-rtl and wbc-sp-variations-swatches-post and wbc-sp-variations-swatches-post-rtl and wbc-sp-variations-swatches-woopost and so on. for theme it would be wbc-sp-variations-swatches-theme. and same for the gallery_images function also, of course. -- to b done  
			/*ACTIVE_TODO_OC_START
			--	regarding css, t be noted that it should go in appropriate asset files only. will discuss about that -- to t. 
			ACTIVE_TODO_OC_END*/
					// --	move this point where below hooks are moved. -- to b done

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

		add_action( 'wp_footer' /*'wp_enqueue_scripts'*/ ,function(){
			
			// wbc()->load->asset('css','fomantic/semantic.min');
			// wbc()->load->asset('js','fomantic/semantic.min',array('jquery'));
			wbc()->load->built_in_asset('semantic');

			wbc()->load->asset( 'asset.php', constant( 'EOWBC_ASSET_DIR' ).'variations.assets.php');
		}, 1049);	

	}

	public function prepare_swatches_data($args = array()){

		return \eo\wbc\model\publics\data_model\SP_WBC_Variations::prepare_swatches_data($args);

	}

	public function get_ajax_gallery_data(){



	}

	public function render_gallery_images_template($args = array()){

		add_filter( 'wc_get_template', function($template, $template_name){
			
			$old_template = $template;

			// Disable gallery on specific product
			if ( apply_filters( 'disable_sp_variations_gallery_images', false ) ) {
				return $old_template;
			}

			if ( $template_name == \eo\wbc\model\SP_WBC_Compatibility::instance()->woo_product_images_template_compatability('product_image_get_template', array('default_val'=>'single-product/product-image.php'))/*'single-product/product-image.php'*/ ) {
				$template = constant('EOWBC_DIRECTORY').'templates/single-product/product-images.php';
			}

			if ( $template_name == \eo\wbc\model\SP_WBC_Compatibility::instance()->woo_product_images_template_compatability('product_thumbnails_get_template', array('default_val'=>'single-product/product-thumbnails.php'))/*'single-product/product-thumbnails.php'*/ ) {
				$template = constant('EOWBC_DIRECTORY').'templates/single-product/product-thumbnails.php';
			}

			return $template;
		}, 30, 2 );

		add_filter( 'wc_get_template_part', function($template, $slug){
			
			$old_template = $template;

			// Disable gallery on specific product
			if ( apply_filters( 'disable_sp_variations_gallery_images', false ) ) {
				return $old_template;
			}

			if ( $slug == \eo\wbc\model\SP_WBC_Compatibility::instance()->woo_product_images_template_compatability('product_image_get_template_part', array('default_val'=>'single-product/product-image'))/*'single-product/product-image'*/ ) {
				$template = constant('EOWBC_DIRECTORY').'templates/single-product/product-images.php';

			}

			if ( $slug == \eo\wbc\model\SP_WBC_Compatibility::instance()->woo_product_images_template_compatability('product_thumbnails_get_template_part', array('default_val'=>'single-product/product-thumbnails'))/*'single-product/product-thumbnails'*/ ) {
				$template = constant('EOWBC_DIRECTORY').'templates/single-product/product-thumbnails.php';

			}

			return $template;
		}, 30, 2 );

	}

	public function render_gallery_images_template_callback($args = array()){
		
		// global $product;

		// /*ACTIVE_TODO_OC_START
		// ----product no peramiter pass kervano baki che
		// ACTIVE_TODO_OC_END*/
		// $data = \eo\wbc\model\publics\SP_Model_Single_Product::instance()->get_data('gallery_images');

		// $data['gallery_images_template_data'] = array();

		// //here recieve the $data param of the caller function -- to b done

		// /*ACTIVE_TODO_OC_START
		// 	--	pass it in all three functions called below and prepare the daa in the heirachiical structure the way these loops and functions calls and data and template load sequence is -- to b 
		// ACTIVE_TODO_OC_END*/

		// // create two static methods in the wbc variations clas s, namely get_default_attributes and get_default_variation_id -- to d done
		// // 	and the move the respective logic from below to there -- to d done
		// // 		--	and then replace below statements with function calls to that class -- to d done
		// // and create one more function get_available_variation, a public static function in the same class wbc variations -- to d done
		// // 	and the ove the respective logic from below to there -- to d 
		// // 		--	and then replace below statements with function calls to that class -- to d done

		// // create two static methods in the SP_Product clas s, namely get_image_id and get_gallery_image_ids -- to d done 
		// // 	and the move the respective logic from below to there -- to d done
		// // 		--	and then replace below statements with function calls to that class -- to d done

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

		// // $wrapper                          = sanitize_text_field( get_option( 'woo_variation_gallery_and_variation_wrapper', apply_filters( 'woo_variation_gallery_and_variation_default_wrapper', '.product' ) ) )
		// ACTIVE_TODO_OC_START
		// $slider_js_options = array(
		// 	'slidesToShow'   => 1,
		// 	'slidesToScroll' => 1,
		// 	'arrows'         => wc_string_to_bool( woo_variation_gallery()->get_option( 'slider_arrow', 'yes', 'woo_variation_gallery_slider_arrow' ) ),
		// 	'adaptiveHeight' => true,
		// 	// 'lazyLoad'       => 'progressive',
		// 	'rtl'            => is_rtl(),
		// 	'prevArrow'      => '<i class="wvg-slider-prev-arrow dashicons dashicons-arrow-left-alt2"></i>',
		// 	'nextArrow'      => '<i class="wvg-slider-next-arrow dashicons dashicons-arrow-right-alt2"></i>',
		// 	'speed'          => absint( woo_variation_gallery()->get_option( 'slide_speed', 300 ) )
		// );

		// if ( wc_string_to_bool( woo_variation_gallery()->get_option( 'thumbnail_slide', 'yes', 'woo_variation_gallery_thumbnail_slide' ) ) ) {
		// 	$slider_js_options['asNavFor'] = '.woo-variation-gallery-thumbnail-slider';
		// }

		// if ( wc_string_to_bool( woo_variation_gallery()->get_option( 'slider_autoplay', 'no', 'woo_variation_gallery_slider_autoplay' ) ) ) {
		// 	$slider_js_options['autoplay']      = true;
		// 	$slider_js_options['autoplaySpeed'] = absint( woo_variation_gallery()->get_option( 'slider_autoplay_speed', 5000, 'woo_variation_gallery_slider_autoplay_speed' ) );
		// }

		// if ( wc_string_to_bool( woo_variation_gallery()->get_option( 'slider_fade', 'no', 'woo_variation_gallery_slider_fade' ) ) ) {
		// 	$slider_js_options['fade'] = true;
		// }

		// $gallery_slider_js_options = apply_filters( 'woo_variation_gallery_slider_js_options', $slider_js_options );

		// $gallery_thumbnail_position              = sanitize_textarea_field( woo_variation_gallery()->get_option( 'thumbnail_position', 'bottom', 'woo_variation_gallery_thumbnail_position' ) );
		// $gallery_thumbnail_position_small_device = sanitize_textarea_field( woo_variation_gallery()->get_option( 'thumbnail_position_small_device', 'bottom' ) );


		// //
		// $thumbnail_js_options = array(
		// 	'slidesToShow'   => $columns,
		// 	'slidesToScroll' => $columns,
		// 	'focusOnSelect'  => true,
		// 	// 'dots'=>true,
		// 	'arrows'         => wc_string_to_bool( woo_variation_gallery()->get_option( 'thumbnail_arrow', 'yes' ) ),
		// 	'asNavFor'       => '.woo-variation-gallery-slider',
		// 	'centerMode'     => true,
		// 	'infinite'       => true,
		// 	'centerPadding'  => '0px',
		// 	'vertical'       => in_array( $gallery_thumbnail_position, array( 'left', 'right' ) ),
		// 	'rtl'            => woo_variation_gallery()->set_rtl_by_position( $gallery_thumbnail_position ),
		// 	'prevArrow'      => '<i class="wvg-thumbnail-prev-arrow dashicons dashicons-arrow-left-alt2"></i>',
		// 	'nextArrow'      => '<i class="wvg-thumbnail-next-arrow dashicons dashicons-arrow-right-alt2"></i>',
		// 	'responsive'     => array(
		// 		array(
		// 			'breakpoint' => 768,
		// 			'settings'   => array(
		// 				'vertical' => in_array( $gallery_thumbnail_position_small_device, array( 'left', 'right' ) ),
		// 				'rtl'      => woo_variation_gallery()->set_rtl_by_position( $gallery_thumbnail_position_small_device )
		// 			),
		// 		),
		// 	)
		// );

		// $thumbnail_slider_js_options = apply_filters( 'woo_variation_gallery_thumbnail_slider_js_options', $thumbnail_js_options );

		// $gallery_width = absint( woo_variation_gallery()->get_option( 'width', apply_filters( 'woo_variation_gallery_default_width', 30 ), 'woo_variation_gallery_width' ) );

		// $inline_style = apply_filters( 'woo_variation_product_gallery_inline_style', array() );

		// $wrapper_classes = apply_filters( 'woo_variation_gallery_product_wrapper_classes', array(
		// 	'woo-variation-product-gallery',
		// 	'woo-variation-product-gallery-thumbnail-columns-' . absint( $columns ),
		// 	$has_gallery_thumbnail ? 'woo-variation-gallery-has-product-thumbnail' : '',
		// 	( 'yes' === woo_variation_gallery()->get_option( 'thumbnail_slide', 'yes', 'woo_variation_gallery_thumbnail_slide' ) ) ? 'woo-variation-gallery-enabled-thumbnail-slider' : ''
		// ) );

		// $post_thumbnail_id = (int) apply_filters( 'woo_variation_gallery_post_thumbnail_id', $post_thumbnail_id, $attachment_ids, $product );
		// $attachment_ids    = (array) apply_filters( 'woo_variation_gallery_attachment_ids', $attachment_ids, $post_thumbnail_id, $product );
		// ACTIVE_TODO_OC_END

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

		// 	        //ACTIVE_TODO publish hook if required 
		// 	        // $data['gallery_images_template_data']['attachment_ids_loop_classes'][$id] = apply_filters( '', $classes, $id, $image );
			        
		// 	       //return '<div class="' . esc_attr( implode( ' ', array_map( 'sanitize_html_class', array_unique( $classes ) ) ) ) . '"><div>' . $inner_html . '</div></div>';
	     
		// 	    }
		// 	}
		// }

		// // ACTIVE_TODO ultimately move all below core implementtaion in the new core class of gallery_images or maybe simply in the wbc variations class 

		$data = \eo\wbc\model\publics\data_model\SP_WBC_Variations::prepare_gallery_template_data(array('page'=>'single-product'));

		//////////////// start core

		//bind to hook from here for the hook that is applied from both slider and zoom module for the images. means add filter here, and provide back with gallery_images data. so simply entire data var will be added to filter var but yeah the variation_gallery_images, attachment_ids etc. would be key -- to b done
		add_filter('sp_slzm_slider_images',function($hook_data) use($data){

			return $data;

		});
		add_filter('sp_slzm_zoom_images',function($hook_data) use($data){

			return $data;

		});

		//and also do a action hook from here with key sp_variations_gallery_images_render -- to b done
			//-- and the init core or render core function, whichever is applicable, will add action to above hook -- b done
				//-- and so all three hooks of both slider and zoom module should be applied or bind to within this action hook -- to b done
		do_action( 'sp_variations_gallery_images_core' );

		$classes = array('spui-sp-variations-gallery-images', 'spui-sp-variations-gallery-images-'.$data['gallery_images_template_data']['product_type']);
		$classes = apply_filters('sp_variations_gallery_images_core_container_class',$classes);

		$simple_types_html_attributes = array();

		if($data['gallery_images_template_data']['product_type'] == 'simple') {
			
			$simple_types_html_attributes[0] = array();
			
			$simple_types_html_attributes[0]['variation_gallery_images'] = $data['gallery_images_template_data']['attachment_ids'];

			$simple_types_html_attributes = array( 'data-product_id' => esc_attr($data['gallery_images_template_data']['product_sku_experimental']), 'data-product_simple=\''.esc_attr(json_encode($simple_types_html_attributes)).'\''=>null);	
		}

		$ui = array(
			'type'=>'div',
			'class'=>$classes,
			'attr' => $simple_types_html_attributes,
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
        // ACTIVE_TOOD below calls to theme ui page builder class was upgraded to SP_WBC_Page_Builder class function calls so that we can remove the dependancy on the theme ui package. however there is one catch instead of calling the ui builder build function(like extensions are doing) we are calling the page builder class's build page widgets function so still need to upgrade that as requierd as well as if we face any issues related this upgrade then need to take care of it. as well as need to note carefully that the calls are upgraded but it is not yet supporting the appearance, configuration and data controls. for that the respective functions need to be created inside the respective model and then pass the ui_definition in below function call to enable support for that. so lets do it during the wbc upgrade or max by 1st or 2nd revision. -- to h 
		// \sp\theme\view\ui\builder\Page_Builder::instance()->build_page_widgets($ui,'sp_variations_gallery_images_container');
        \eo\wbc\model\SP_WBC_Page_Builder::build_page_widgets($ui,'sp_variations_gallery_images_container');
		//wbc_pr( $ui );	die();

		//////////////// end core


		//create list of woo hooks that are used below -- to d done

			/*ACTIVE_TODO_OC_START
			--wc_placeholder_img_src, gallery and slider templating layer ma implementation kervanu che -- to b
			--woocommerce_single_product_image_thumbnail_html, gallery and slider templating layer ma implementation kervanu che -- to b

			-- and then at least our default slider and zoom frontend that is provided should respect these hooks. soo apply these hooks there -- to d 
				--	also create list of other such matters that may have missed here -- to d 

			-- need to apply esc_attr, esc_html and trim on our template layers of slider and zoom. so apply as and where applicable -- to d 
			    -- and also need to do the same for the swatches template layers also -- to d 
			        -- and also do the same for respective template layers of applicable extensions for above two points -- to d 
			-- and check if there are other such functions we need to respect and if there are then cover all three points below for them -- to d 	
			ACTIVE_TODO_OC_END*/
			return;
		?>

		<?php do_action( 'woo_variation_product_gallery_start', $product ); ?>
			<div data-product_id="<?php echo esc_attr( $product_id ) ?>" data-variation_id="<?php echo esc_attr( $default_variation_id ) ?>" style="<?php echo esc_attr( woo_variation_gallery()->get_inline_style( $inline_style ) ) ?>" class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', array_unique( $wrapper_classes ) ) ) ); ?>">
				<div class="loading-gallery woo-variation-gallery-wrapper woo-variation-gallery-thumbnail-position-<?php echo esc_attr( $gallery_thumbnail_position ) ?>-<?php echo esc_attr( $gallery_thumbnail_position_small_device ) ?> woo-variation-gallery-product-type-<?php echo esc_attr( $product_type ) ?>">
					<div class="woo-variation-gallery-container preload-style-<?php echo esc_attr( trim( woo_variation_gallery()->get_option( 'preload_style', 'blur', 'woo_variation_gallery_preload_style' ) ) ); ?>">

						<div class="woo-variation-gallery-slider-wrapper">

							<?php if ( $has_post_thumbnail && ( 'yes' === woo_variation_gallery()->get_option( 'lightbox', 'yes', 'woo_variation_gallery_lightbox' ) ) ): ?>
								<a href="#" class="woo-variation-gallery-trigger woo-variation-gallery-trigger-position-<?php echo esc_attr( woo_variation_gallery()->get_option( 'zoom_position', 'top-right', 'woo_variation_gallery_zoom_position' ) ); ?>">
									<span class="dashicons dashicons-search"></span>
								</a>
							<?php endif; ?>
							<div class="woo-variation-gallery-slider" data-slick='<?php echo  wc_esc_json( wp_json_encode( $gallery_slider_js_options ) ); ?>'>
								<?php
								// Main Image
								if ( $has_post_thumbnail ) {
									echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', woo_variation_gallery()->get_frontend()->get_gallery_image_html( $product, $post_thumbnail_id, array(
										'is_main_thumbnail'  => true,
										'has_only_thumbnail' => $only_has_post_thumbnail
									) ), $post_thumbnail_id );
								} else {
									echo sprintf(
										'<div class="wvg-gallery-image wvg-gallery-image-placeholder"><div><div class="wvg-single-gallery-image-container"><img src="%s" alt="%s" class="wp-post-image" /></div></div></div>',
										esc_url( wc_placeholder_img_src() ),
										/*esc_html__*/esc_attr__( 'Awaiting product image', 'woocommerce' )
									);
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

	public function prepare_default_gallery_data($args = array()){

		$data = array();

		if ( empty( wbc()->sanitize->post() ) || empty( wbc()->sanitize->post('product_id') ) ) {
			wp_send_json( false );
		}

		$product_id = absint( wbc()->sanitize->post('product_id') );

		$data['images'] = eo\wbc\model\publics\data_model\SP_WBC_Variations::instance()->get_default_gallery_images( $product_id );

		return $data;

	}
}