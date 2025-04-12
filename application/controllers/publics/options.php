<?php
namespace eo\wbc\controllers\publics;

defined( 'ABSPATH' ) || exit;

class Options extends \eo\wbc\controllers\publics\Controller {

    private static $_instance = null;

    public static function instance() {
        if ( ! isset( self::$_instance ) ) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    private function __construct() {
        
    }

    public static function should_init($args = array()){
    	return true;
    }
    public function init($args = array()){

       	// if( wbc()->sanitize->get('is_test') == 2 ) {wbc()->common->var_dump( "wbc options init");}

    	if(self::instance()->should_load_options_view()) {

            define('SP_VARIATIONS_LOADED', true);

           	// if( wbc()->sanitize->get('is_test') == 2 ) {wbc()->common->var_dump( "wbc options init if");}

	    	$args['data'] = \eo\wbc\model\publics\SP_Model_Single_Product::instance()->get_data('swatches_init');
	    	$args['page_section'] = 'swatches';
	        self::instance()->selectron($args['page_section'],$args);

	        $args['data'] = \eo\wbc\model\publics\SP_Model_Single_Product::instance()->get_data('gallery_images_init');
	        \eo\wbc\model\publics\SP_Model_Single_Product::instance()->render_gallery_images_template($args);

	    	//call the getUI from here once so that default render_ui is called once at last for handling general matters -- to b done
	    		//--	and for getUI set two args first is $page_section and second is $args -- to b done
	    			//-- empty page_section means call will go to default render_ui function -- to b done
	    				//--	and so page_section param will also be passed to get_ui_definition but there it will be passed through in args param -- to b done
	    	$this->getUI(null,$args);
    	}
    }

    public function should_load_options_view() {

        $tiny_features_enable_only_for_categories = wbc()->options->get_option('tiny_features','tiny_features_enable_only_for_categories');
        
        $show_on_categories = !empty($tiny_features_enable_only_for_categories) ? explode(',', $tiny_features_enable_only_for_categories) : array();

        // if( wbc()->sanitize->get('is_test') == 2 ) {wbc()->common->var_dump( "wbc options should_load_options_view"); wbc_pr($tiny_features_enable_only_for_categories);}

        if( !wbc_isEmptyArr($show_on_categories) ) { 

            // if( wbc()->sanitize->get('is_test') == 2 ) {wbc()->common->var_dump( "wbc options should_load_options_view if 1");}

			$ids = null;
            
            global $post;
	        $pid = $post->ID;

	        if(!empty($pid)) {
	            $product = wbc()->wc->eo_wbc_get_product($pid); 
	            
	            if(!empty($product) and !is_wp_error($product)){

	                $ids = $product->get_category_ids();
	            }
	        }

			$result=array_intersect($show_on_categories,$ids);

            if(!empty($result)) {

            	// if( wbc()->sanitize->get('is_test') == 2 ) {wbc()->common->var_dump( "wbc options should_load_options_view if 2");}

                return true;
            } else {

            	// if( wbc()->sanitize->get('is_test') == 2 ) {wbc()->common->var_dump( "wbc options should_load_options_view else 2");}

                return false;       
            }
        }

        return true;
    }

    public function selectron_hook_render($page_section,$container_class,$args = array()){
    	if ($page_section == 'swatches') {
    		if ($container_class == 'woo_variation_attr_html') {
    			$data = \eo\wbc\model\publics\SP_Model_Single_Product::instance()->prepare_swatches_data($args);
    			if (!empty($data['is_return_default_html'])) {
    				return $data['html'];
    			}
    			//wbc_pr($data); die();
    			return $this->load_view($data,$args);
    		}

    	} elseif ($page_section == 'get_default_gallery') {
    		
    		if ($container_class == 'get_default_gallery_ajax') {
    			$data = \eo\wbc\model\publics\SP_Model_Single_Product::instance()->prepare_default_gallery_data($args);
    			$this->ajax_response($data,$args);
    		}

    	} elseif ($page_section == 'get_variation_gallery') {
    		
    		if ($container_class == 'get_variation_gallery_ajax') {
    			// $data = \eo\wbc\model\publics\SP_Model_Single_Product::instance()->prepare_default_gallery_data($args);
    			// $this->ajax_response($data,$args);
    		}

    	} else{
    	    \eo\wbc\controller\publics\Options::instance()->getUI();
    	}
    }

    private function selectron($page_section,$args = array()){
    	//--	move below to options controller selectron function -- to b done
			//--	and from init function of the same controller call the selectron with page_section=swatches and args param that init may have or null -- to b  done
				//--	so selectron will also have two param like getUI of options controller -- to b done 
					//--	and from within callback function call the selectron hook render or something such function, with the hook args set in the args var and also the page_section param and also the container_class(for the particular hook) param -- to b done		
						//--	and then create function prepare_swatches_data in single-product model in wbc, and move all code inside below to that selectron hook render in its swatches section -- to b done
		if ($page_section == 'swatches') {
			add_filter( 'woocommerce_dropdown_variation_attribute_options_html',  function($html, $hook_args) use($page_section,$args){

		        $args['hook_callback_args'] = array();
            	$args['hook_callback_args']['html'] = $html;
            	$args['hook_callback_args']['hook_args'] = $hook_args;


				// ACTIVE_TODO we are supposed to below built html from here, so that woo filter get it back. it is critically important. -- to h and -- to s. so confirm all the way till here that all html is returned.  
	            return $this->selectron_hook_render($page_section,'woo_variation_attr_html',$args);

			}, 200, 2);
		} elseif ($page_section == 'get_default_gallery'){
			add_filter( 'wc_ajax_get_default_gallery',  function(){

	            return $this->selectron_hook_render($page_section,'get_default_gallery_ajax',$args);

			});

		} elseif ($page_section == 'get_variation_gallery'){
			add_filter( 'wc_ajax_get_variation_gallery',  function(){

	            return $this->selectron_hook_render($page_section,'get_variation_gallery_ajax',$args);

			});

		}
    }
    private function load_view($data,$args = array()){
    	// NOTE: since so far we do not needed to create the view class and the actual ui is also coming from the templates folder so, so far not creating the view class. and just implementing the required logic from here. but if it become necessary then in future create the view class. 

    	if ($args['page_section'] == 'swatches') {

	    	$this->render_swatches_data_by_attribute_type($data,$args);

    	} elseif ($args['page_section'] == 'get_default_gallery') {
    		
    		$this->getUI($args['page_section'],$args);

    	} elseif ($args['page_section'] == 'get_variation_gallery') {
    		
    		$this->getUI($args['page_section'],$args);
    	
    	}
    }
    private function getUI($page_section,$args = array()){
    	$args['page_section'] = $page_section;
    	
    	if ($page_section == 'woo_dropdown_attribute_html' or $page_section == 'variable_item' or $page_section == 'variable_item_wrapper') {
    		return $this->get_ui_definition($args);
    	

        }elseif($page_section == 'get_default_gallery') {
        
        	\eo\wbc\model\publics\SP_Model_Single_Product::instance()->render_ui( $this->get_ui_definition($args));

        }elseif($page_section == 'get_variation_gallery') {
        	
        	\eo\wbc\model\publics\SP_Model_Single_Product::instance()->render_ui( $this->get_ui_definition($args));
        
        }else{	

        	\eo\wbc\model\publics\SP_Model_Single_Product::instance()->render_ui( $this->get_ui_definition($args));
        }
    } 

    protected function get_ui_definition($args = array()){

    	if (!isset($args['data'])) {

			$args['data'] = array();

		}

		$args['singleton_function'] = 'wbc';

    	$type = isset($args['data']['woo_dropdown_attribute_html_data']['type']) ? $args['data']['woo_dropdown_attribute_html_data']['type'] : null;
    	
    	/*ACTIVE_TODO_OC_START
    	and make all four templates below dynamic, based on the points added on data layer and also there might be some on the template files -- to b 
    	ACTIVE_TODO_OC_END*/

    	if ($args['page_section'] == 'woo_dropdown_attribute_html') {

    		//drop type var from below and set name of the one only template, simply set it hardcoded -- to b done
    		$args['data']['template_data'] = array();
    		$args['data']['template_data']['template_key'] = 'woo_dropdown_attribute-template_part';
    		$args['data']['template_data']['template_sub_dir'] = 'single-product/variations-swatches/woo_dropdown_attribute';
    		$args['data']['template_data']['data'] = $args['data'];
    		$args['data']['template_data']['singleton_function'] = 'wbc';


    		$args['widget_key'] = '';
    		$args['template_sub_dir'] = 'single-product/variations-swatches/woo_dropdown_attribute';
    		$args['template_option_key'] = '';
	        $args['option_group_key'] = '';
	        $args['template_key'] = 'woo_dropdown_attribute';
	     	$args['singleton_function'] = 'wbc';


    	}else if ($args['page_section'] == 'variable_item') {
    		/*ACTIVE_TODO_OC_START
    		dropd template part from both actual key params below, it will be loaded from inside the below main template -- to b 
    			--	from inside the commong template below the particular template would be loaded -- to b 
    				--	and on this note for non dropdown types we can simply one file and load their specific option_template_part from there. but lets keep theme together only if they share common code -- to b 
    			--	and from that particular template the their option_template_part would be loaded 
    			--	so there would be some heirarchical if conditions that will be required, the conditions would be based on $type -- to b 
    			ACTIVE_TODO_OC_END*/
    		$args['data']['template_data'] = array();
    		$args['data']['template_data']['template_key'] = 'sp_variations_optionsUI-common-option_template_part';
    		$args['data']['template_data']['template_sub_dir'] = 'single-product/variations-swatches';
    		$args['data']['template_data']['data'] = $args['data'];
    		$args['data']['template_data']['singleton_function'] = 'wbc';

    		$args['widget_key'] = '';
    		$args['template_sub_dir'] = 'single-product/variations-swatches';
    		$args['template_option_key'] = '';
	        $args['option_group_key'] = '';
	        $args['template_key'] = 'sp_variations_optionsUI-common';
	     	$args['singleton_function'] = 'wbc';
	       

    	}else if ($args['page_section'] == 'variable_item_wrapper') {

    		// drop type var from below and set name of the one only template, simply set it hardcoded -- to b done

    		$args['widget_key'] = '';
    		$args['template_sub_dir'] = 'single-product/variations-swatches';
    		$args['template_option_key'] = '';
	        $args['option_group_key'] = '';
	        $args['template_key'] = 'sp_variations_optionsUI-common-ribbon_wrapper';
   	     	$args['singleton_function'] = 'wbc';

	        

    	}/*else {
    		$args['template_sub_dir'] = '';
    		$args['template_option_key'] = '';
	        $args['option_group_key'] = '';
	        $args['template_key'] = '';
	        $args['plugin_slug'] = '';
	    }*/
	    /*ACTIVE_TODO_OC_START
	    --	in parent class function add if condition, that if template_option_key and template_key both is empty then simply return $template -- to b 
	    	--	so at top define the null $template var -- to b 
	    ACTIVE_TODO_OC_END*/
        return parent::get_ui_definition($args);

       /* --- Publics.php no hook_render function no code che
        $react_templat = wbc()->options->get_option('diffrent_size_configure','templat_size');
        if ($react_templat == 'react_template') {
            
        }else{
        }*/
    }

	public function variable_items_wrapper( $contents, $type, $args, $saved_attribute = array()){

		// ---- move to /woo-bundle-choice/templates/single-product/variations-swatches/sp_variations_optionsUI-common-ribbon_wrapper.php file ma
		if (false) {
			$attribute = $args[ 'attribute' ];
			$attribute_object = $args['attribute_object'];
			
			$css_classes = array("{$type}-variable-wrapper");
			$ribbon_color = get_term_meta( $attribute_object->attribute_id,'wbc_ribbon_color',true);

			// $data = sprintf( '<div class="ui segment">
	  		//     <span class="ui ribbon label" style="background-color:%s;border-color:%s;color:white;">%s</span><span><ul class="ui mini images variable-items-wrapper %s" data-attribute_name="%s">%s</ul></span></div>',$ribbon_color,$ribbon_color,$attribute_object->attribute_label,trim( implode( ' ', array_unique( $css_classes ) ) ), esc_attr( wc_variation_attribute_name( $attribute ) ), $contents );
			$data = sprintf( '<div class="ui segment">
			   <span class="ui ribbon label" style="background-color:%s;border-color:%s;color:white;">%s</span><span><ul class="ui mini images variable-items-wrapper %s" data-attribute_name="%s">%s</ul></span></div>',
			   esc_attr($ribbon_color), esc_attr($ribbon_color), esc_html($attribute_object->attribute_label), esc_attr(trim(implode(' ', array_unique($css_classes)))), esc_attr(wc_variation_attribute_name($attribute)), esc_html($contents) );

		}
		return apply_filters( 'wvs_variable_items_wrapper', $data, $contents, $type, $args, $saved_attribute );
	}

	public function variable_item( $type, $options, $args, $saved_attribute = array() ) {
		if (false) {
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
									//--- move to woo-bundle-choice/templates/single-product/variations-swatches/dropdown_image/sp_variations_optionsUI-dropdown_image-option_template_part.php file
									/*$selected_item =  sprintf( '<img class="ui mini avatar image" src="%s">%s', esc_url( $image_url ),esc_attr( $selected_item->name ));*/
									
								} elseif ($type=='dropdown_image_only' and !empty($image_url)) {
									//--- move to /woo-bundle-choice/templates/single-product/variations-swatches/dropdown_image_only/sp_variations_optionsUI-dropdown_image_only-option_template_part.php file 
									/*$selected_item =  sprintf( '<img class="ui mini avatar image" src="%s">', esc_url( $image_url ));*/
								} else {
									//move to /woo-bundle-choice/templates/single-product/variations-swatches/dropdown/sp_variations_optionsUI-dropdown-option_template_part.php file
									/*$selected_item =  sprintf( '%s',esc_attr( $selected_item->name ));*/
								}
							} else {
								$selected_item ='Choose an option';	
							}
						} else{
							$selected_item ='Choose an option';
						}
						//----- move to /woo-bundle-choice/templates/single-product/variations-swatches/sp_variations_optionsUI-common-option_template_part.php ma
						/*$data.=sprintf( '<div class="ui fluid selection dropdown" style="min-height: auto;">
								  <input type="hidden" name="attribute_%s" data-attribute_name="attribute_%s" data-id="%s">
								  <i class="dropdown icon"></i>
								  <div class="default text">%s</div>
								  <div class="menu">',esc_attr( $attribute ),esc_attr( $attribute ),esc_attr( $attribute ),$selected_item);*/
					}


					
					foreach ( $terms as $term ) {
						if ( in_array( $term->slug, $options ) ) {
							$selected_class = ( sanitize_title( $args[ 'selected' ] ) == $term->slug ) ? 'selected' : '';
							
							//--- move to woo-bundle-choice/templates/single-product/variations-swatches/sp_variations_optionsUI-dropdown-image-image_only.php ma
							/*if(!in_array($type,array('dropdown_image','dropdown_image_only','dropdown'))) {
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
							$data .= '</li>';*/
						}
					}

					//----- move to /woo-bundle-choice/templates/single-product/variations-swatches/sp_variations_optionsUI-common-option_template_part.php ma
					/*if(in_array($type,array('dropdown_image','dropdown_image_only','dropdown'))) {
						$data.=sprintf('</div></div>');
					}*/
				}
			}

			return $data;
		}
	}

	public function variation_options($args = array()) {		
		if (false) {
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
							echo '<option value="' . esc_attr( $term->slug ) . '" ' . esc_attr(selected( sanitize_title( $args[ 'selected' ] ), $term->slug, false )) . '>' . esc_html(apply_filters( 'woocommerce_variation_option_name', $term->name )) . '</option>';
						}
					}
				} else {
					foreach ( $options as $option ) {
						// This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
						$selected = sanitize_title( $args[ 'selected' ] ) === $args[ 'selected' ] ? selected( $args[ 'selected' ], sanitize_title( $option ), false ) : selected( $args[ 'selected' ], $option, false );
						echo '<option value="' . esc_attr( $option ) . '" ' . esc_attr($selected) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>';
					}
				}
			}
				
			echo '</select>';

			$content = $this->variable_item( $type, $options, $args );
			
			echo $this->variable_items_wrapper( $content, $type, $args );
		}
	}

	public function run() {
		
		/*from public handler or http handler call the should_init and init function like we did on the size extension -- to b or -- to d  done 
			--	and inside should_init just return true if there is nothing else there -- to b or -- to d done  */

		//	everything from here is now moved and running from different layers of this controller and its model 
		//--	put if false, and like this also in above two functions -- to b or -- to d  done
			//--	and also on the variable_items_wrapper function at top but after confirming that function code is moved or covered -- to b or -- to d  done
		if (false) {
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
					//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
					$custom_css = "
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
					            transform:rotate(360deg); 
					        }
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
					";

					wbc()->load->add_inline_style('', $custom_css, 'common');
					// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
					$inline_script = 
						"jQuery(document).ready(function($){\n" .
						"    jQuery(\".dropdown\").dropdown().on('change',function(){\n" .
						"        var target_selector =  $('#'+$(this).find('input[type=\"hidden\"]').data('id'));\n" .
						"        target_selector.val($(this).find('input[type=\"hidden\"]').val());\n" .
						"        /*$(this).parent().find('.selected').removeClass('selected');\n" .
						"        $(this).addClass('selected');*/\n" .
						"        jQuery(\".variations_form\" ).trigger('check_variations');\n" .
						"        $(target_selector).trigger('change');\n" .
						"    });\n" .
						"    if($('table.variations tbody>tr').length>0){\n" .
						"        $('table.variations').addClass('ui raised segment');\n" .
						"    }\n" .
						"    $('#wbc_variation_toggle').on('click',function(){\n" .
						"        if($(this).find('.icon').hasClass('rotate-up')) {\n" .
						"            $(this).find('.icon').removeClass('rotate-up');\n" .
						"            $(this).find('.icon').addClass('rotate-down');\n" .
						"            $('table.variations').slideToggle(\"slow\");\n" .
						"        } else {\n" .
						"            $(this).find('.icon').removeClass('rotate-down');\n" .
						"            $(this).find('.icon').addClass('rotate-up');\n" .
						"            $('table.variations').slideToggle(\"slow\");\n" .
						"        }        \n" .
						"    });\n" .
						"    <?php if(empty(\$init_toggle)): ?>\n" .
						"        $('#wbc_variation_toggle').trigger('click');\n" .
						"    <?php endif; ?>\n" .
						"    --    below two click events would be implemented in the core variations js module, in that case it will be remove here \n" .
						"    $('.variable-item').on('click',function(){\n" .
						"        var target_selector = $('#'+$(this).data('id'));\n" .
						"        target_selector.val($(this).data('value'));\n" .
						"        $(this).parent().find('.selected').removeClass('selected');\n" .
						"        $(this).addClass('selected');\n" .
						"        jQuery(\".variations_form\" ).trigger('check_variations');\n" .
						"        $(target_selector).trigger('change');\n" .
						"    });\n" .
						"    jQuery(\".variations_form\").on('click', '.reset_variations'/*'woocommerce_variation_select_change'*//*'reset'*/,function(){\n" .
						"        jQuery('.variable-items-wrapper .selected').removeClass('selected');\n" .
						"        jQuery('.variable-items-wrapper .dropdown').dropdown('restore defaults');\n" .
						"    });\n" .
						"});\n";
					wbc()->load->add_inline_script( '', $inline_script, 'common' );				

				
				if(!empty($toggle_status)){	
					if(has_action('woocommerce_before_variations_form')){
						add_action( 'woocommerce_before_variations_form',function( ) use($toggle_text){
							// wbc()->load->asset('css','fomantic/semantic.min');
							// wbc()->load->asset('js','fomantic/semantic.min',array('jquery'));
							wbc()->load->built_in_asset('semantic');
							ob_start();
							?>
								<span id="wbc_variation_toggle" class="ui raised segment">
									<?php esc_html_e($toggle_text); ?><i class="caret up icon" style="text-align: center;line-height: 1em;"></i>						
								</span>
							<?php
							echo ob_get_clean();
						}, 10, 1 );	
					} else {
						// wbc()->load->asset('css','fomantic/semantic.min');
						// wbc()->load->asset('js','fomantic/semantic.min',array('jquery'));
						wbc()->load->built_in_asset('semantic');
						$toggle_text = esc_html_e($toggle_text);

						// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
						$inline_script = 
							"jQuery(\".variations_form\").before('<span id=\"wbc_variation_toggle\" class=\"ui raised segment\">".$toggle_text."<i class=\"caret up icon\" style=\"text-align: center;line-height: 1em;\"></i></span>');\n";
						wbc()->load->add_inline_script( '', $inline_script, 'common' );
					}				
				}
			});
		
		/*ACTIVE_TODO_OC_START
			--	and from where the below flow will be layered? I guess it would be somewhere from the optionsUI widget model that is planned -- check and confirm 
				--	either way make use of the below and/or the hook that other plugins we are exploring are if they are mature enough or mix of both 	
			ACTIVE_TODO_OC_END*/
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
	            /*ACTIVE_TODO_OC_START
	        	--	and we can make use of the below flow in our fetch data function layers planned 
	        		--	and keep in mind that we had to take care of two data layers(or response that we need to sent to two different place one is variations image gallery and the second is the variations form) one for variations image gallery and the second is for the variations form 
	        	ACTIVE_TODO_OC_END*/
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
		}
	}

	public function product_images_template_callback(){
		\eo\wbc\model\publics\SP_Model_Single_Product::instance()->render_gallery_images_template_callback();
	}

	public function render_swatches_data_by_attribute_type($data,$args = array()){

		// put ui-builder in autoloader function in config file and then remove load model ui builder statement from everywhere -- to b
		$ui = $this->render_woo_dropdown_attribute_html_data($data,$args);
		// echo ">!>!>!";
		// wbc_pr($ui); /*die();*/
		// ACTIVE_TOOD below calls to theme ui page builder class was upgraded to SP_WBC_Page_Builder class function calls so that we can remove the dependancy on the theme ui package. however there is one catch instead of calling the ui builder build function(like extensions are doing) we are calling the page builder class's build page widgets function so still need to upgrade that as requierd as well as if we face any issues related this upgrade then need to take care of it. as well as need to note carefully that the calls are upgraded but it is not yet supporting the appearance, configuration and data controls. for that the respective functions need to be created inside the respective model and then pass the ui_definition in below function call to enable support for that. so lets do it during the wbc upgrade or max by 1st or 2nd revision. -- to h 
        // \sp\theme\view\ui\builder\Page_Builder::instance()->build_page_widgets($ui,'woo_dropdown_attribute_html');
        \eo\wbc\model\SP_WBC_Page_Builder::build_page_widgets($ui,'woo_dropdown_attribute_html');        
        //echo "<<<<<>!>!>!";
		$html = apply_filters('sp_render_swatches_data_by_attribute_type',null,$data);

		if (!empty($html)) {
			$ui = $html;
		}else{

			$data['variable_item_ui'] = $this->render_variable_item_data($data,$args);

			$ui = $this->render_variable_item_wrapper_data($data,$args );        	
		}
		//wbc_pr($ui); die();

		// ACTIVE_TOOD below calls to theme ui page builder class was upgraded to SP_WBC_Page_Builder class function calls so that we can remove the dependancy on the theme ui package. however there is one catch instead of calling the ui builder build function(like extensions are doing) we are calling the page builder class's build page widgets function so still need to upgrade that as requierd as well as if we face any issues related this upgrade then need to take care of it. as well as need to note carefully that the calls are upgraded but it is not yet supporting the appearance, configuration and data controls. for that the respective functions need to be created inside the respective model and then pass the ui_definition in below function call to enable support for that. so lets do it during the wbc upgrade or max by 1st or 2nd revision. -- to h 
		// \sp\theme\view\ui\builder\Page_Builder::instance()->build_page_widgets($ui,'swatches');
		\eo\wbc\model\SP_WBC_Page_Builder::build_page_widgets($ui,'swatches');        
	}

	public function render_woo_dropdown_attribute_html_data($data,$args = array()){

		$args['data'] = $data;
		return $this->getUI('woo_dropdown_attribute_html',$args);

	}

	public function render_variable_item_data($data,$args = array()){

		$args['data'] = $data;
		return $this->getUI('variable_item',$args);

	}

	public function render_variable_item_wrapper_data($data,$args = array()){

		$args['data'] = $data;
		return $this->getUI('variable_item_wrapper',$args);

	}

	public function ajax($args = array()){

		// $args['page_section'] == 'get_default_gallery';

		// $args['data'] = \eo\wbc\model\publics\SP_Model_Single_Product()::instance()->get_data('get_default_gallery_init');

        // \eo\wbc\controller\publics\Options::instance()->selectron('get_default_gallery');

        // $args['page_section'] == 'get_variation_gallery';

        // $args['data'] = \eo\wbc\model\publics\SP_Model_Single_Product()::instance()->get_data('get_variation_gallery_init');

        // \eo\wbc\controller\publics\Options::instance()->selectron('get_variation_gallery');


		// ACTIVE_TODO_OC_START
		// -- for the notes that we may be need to do the similar wc_ajax hooks binding and ajax function calling of perticullar controller in extantion like we did here for all applicable extantions which supports gallery images types since with the standard loading call to the get data function of model for perticullar page section will not happen so we most likely need to do that. so lets confirm that and impliment if requird -- to h 
		// ACTIVE_TODO_OC_END
	    /*$args['data'] = */\eo\wbc\model\publics\SP_Model_Single_Product::instance()->get_data('swatches_init');
	    
	    /*$args['data'] = */\eo\wbc\model\publics\SP_Model_Single_Product::instance()->get_data('gallery_images_init');

	}

}