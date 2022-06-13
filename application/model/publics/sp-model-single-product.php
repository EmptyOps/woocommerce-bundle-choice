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

		}, 99, 1);
	
		apply_filters( 'body_class', string[] $classes, string[] $class );

		add_filter( 'post_class',  function($classes){

		}, 99, 1); 

		// apply_filters( 'post_class', string[] $classes, string[] $class, int $post_id );

		$this->render_image_gallery();
		$this->render_variations_swatches();
	}

	public function render_image_gallery() {

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
							--	I think the swatches means maybe the icon template will be default and rest will be in their own folder like dropdown, icon-dropdown and so on -- to b 
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