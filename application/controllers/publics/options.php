<?php
namespace eo\wbc\controllers\publics;

defined( 'ABSPATH' ) || exit;

class Options {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function variable_items_wrapper( $contents, $type, $args, $saved_attribute = array()){

		$attribute = $args[ 'attribute' ];
		$attribute_object = $args['attribute_object'];
		
		$css_classes = array("{$type}-variable-wrapper");
		$ribbon_color = get_term_meta( $attribute_object->attribute_id,'wbc_ribbon_color',true);

		$data = sprintf( '<div class="ui segment">
      <span class="ui ribbon label" style="background-color:%s;border-color:%s;color:white;">%s</span><span><ul class="ui mini images variable-items-wrapper %s" data-attribute_name="%s">%s</ul></span></div>',$ribbon_color,$ribbon_color,$attribute_object->attribute_label,trim( implode( ' ', array_unique( $css_classes ) ) ), esc_attr( wc_variation_attribute_name( $attribute ) ), $contents );
		
		return apply_filters( 'wvs_variable_items_wrapper', $data, $contents, $type, $args, $saved_attribute );
	}

	public function variable_item( $type, $options, $args, $saved_attribute = array() ) {
			
		$product   = $args[ 'product' ];
		$attribute = $args[ 'attribute' ];
		$data      = '';
		$id                    = $args[ 'id' ] ? $args[ 'id' ] : sanitize_title( $attribute );

		if ( ! empty( $options ) ) {			
			if ( $product && taxonomy_exists( $attribute ) ) {
				$terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) );
				$name  = uniqid( wc_variation_attribute_name( $attribute ) );
				foreach ( $terms as $term ) {
					if ( in_array( $term->slug, $options ) ) {
						$selected_class = ( sanitize_title( $args[ 'selected' ] ) == $term->slug ) ? 'selected' : '';
						
						$data .= sprintf( '<li class="ui image variable-item %1$s-variable-item %1$s-variable-item-%2$s %3$s" title="%4$s" data-value="%2$s" role="button" tabindex="0" data-id="%5$s">', esc_attr( $type ), esc_attr( $term->slug ), esc_attr( $selected_class ), esc_html( $term->name ),$id);
						
						switch ( $type ):
							case 'color':
								$color = sanitize_hex_color( get_term_meta( $term->term_id, 'wbc_color', true ) );
								$data  .= sprintf( '<div class="variable-item-color-fill variable-item-span-%s" style="background-color:%s;"></div>', esc_attr( $type ), esc_attr( $color ));
								break;
							
							case 'image':
								$image_url = get_term_meta( $term->term_id, 'wbc_attachment', true );								
								$data .= sprintf( '<img alt="%s" src="%s" width="%d" height="%d" />', esc_attr( $term->name ), esc_url( $image_url ), 40, 40);
								
								break;
							
							
							case 'button':
								$data .= sprintf( '<div class="variable-item-span variable-item-span-%s">%s</div>', esc_attr( $type ), esc_html( $term->name ) );
								break;
							
							case 'radio':
								$id   = uniqid( $term->slug );
								$data .= sprintf( '<input name="%1$s" id="%2$s" class="wvs-radio-variable-item" %3$s  type="radio" value="%4$s" data-value="%4$s" /><label for="%2$s">%5$s</label>', $name, $id, checked( sanitize_title( $args[ 'selected' ] ), $term->slug, false ), esc_attr( $term->slug ), esc_html( $term->name ) );
								break;
							
							default:
								$data .= apply_filters( 'wvs_variable_default_item_content', '', $term, $args, $saved_attribute );
								break;
						endswitch;
						$data .= '</li>';
					}
				}
			}
		}

		return $data;
	}

	public function variation_options($args = array()) {		
		
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
		
		echo $this->variable_items_wrapper( $content, $type, $args );
	}

	public function run() {
		
		// Toggle Button
		$toggle_status = wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_status',false);
		
		$init_toggle = wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_init_status');
		
		$toggle_text = wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_text',__('CUSTOMIZE THIS PRODUCT'));

		// Variation item non-hovered
		$dimention = wbc()->options->get_option('tiny_features','tiny_features_option_ui_option_dimention','2em');

		$border_color = wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_color','#ffffff');

		$border_width = wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_width','1px');

		$border_radius = wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_radius','1px');

		// Variation item hovered
		$border_hover_color = wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_color_hover','#ffffff');

		$border_hover_width = wbc()->options->get_option('tiny_features','tiny_features_option_ui_border_width_hover','1px');

		// button only
		$font_color = wbc()->options->get_option('tiny_features','tiny_features_option_ui_font_color','#ffffff');

		$font_hover_color = wbc()->options->get_option('tiny_features','tiny_features_option_ui_font_color_hover','#ffffff');

		$bg_color = wbc()->options->get_option('tiny_features','tiny_features_option_ui_bg_color','#ffffff');

		$bg_hover_color = wbc()->options->get_option('tiny_features','tiny_features_option_ui_bg_color_hover','#ffffff');

		ob_start();
		?>
			<style type="text/css">
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
        		.variable-items-wrapper .variable-item{        			
        			/*display: inline-table;*/
        			height: <?php _e($dimention); ?>;
        			width: <?php _e($dimention); ?>;
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
        			border: <?php _e($border_hover_color) ?> solid transparent;
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
        			$('table.variations').addClass('ui raised segment');
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

        			$('.variable-item').on('click',function(){
        				var target_selector = $('#'+$(this).data('id'));
        				target_selector.val($(this).data('value'));
        				$(this).parent().find('.selected').removeClass('selected');
        				$(this).addClass('selected');
        				jQuery(".variations_form" ).trigger('check_variations');
        				$(target_selector).trigger('change');
        			});

        			jQuery(".variations_form").on('woocommerce_variation_select_change',function(){
        				jQuery('.variable-items-wrapper .selected').removeClass('selected');
        			});
        			
        		});
        	</script>
		<?php
		echo ob_get_clean();
		
		if(!empty($toggle_status)){
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
		}

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
            
            $attributes = $args[ 'product' ]->get_variation_attributes();
            $variations = $args[ 'product' ]->get_available_variations();

            $type = 'select';     
            if(!empty($attribute->attribute_type)){
            	$type = $attribute->attribute_type;
            } else {
            	$type = 'select';
            }

            if(in_array($type,array('color','image','button'))) {
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
	}
}
