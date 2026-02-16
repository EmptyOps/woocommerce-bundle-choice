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

	public function render_ui($ui) {

		$this->render_variations_ui();
	}

	public function get_data($for_section="default", $args=array()) {

		
		global $product;	

		/*ACTIVE_TODO_OC_START
		ACTIVE_TODO here it seems that we had made an error during feed model implementation that the swatces init if is missing here. which seems to be fundamnetal and is already there on the item page. so we must fix this as soon as we get chance after the stuller run. -- to h 
			now added the swatches_init key in below if on 05-12-2022
		ACTIVE_TODO_OC_END*/
		// add that four conditions here in below if, simply as or conditions -- to d or -- to b done
		if( $for_section == "gallery_images_init" || $for_section == "gallery_images" || $for_section == 'swatches_init') {

			if( wbc()->sanitize->get('is_test') == 1 ) {
				
                wbc()->common->var_dump( "wbc model feed get_data ".$for_section);
            }

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

		/*if( \eo\wbc\controllers\publics\variations\SP_Gallery_Slider::instance()->should_init() ) {
			\eo\wbc\controllers\publics\variations\SP_Gallery_Slider::instance()->init();
		}*/

		if( \eo\wbc\controllers\publics\variations\SP_Loop_Gallery_Zoom::instance()->should_init() ) {
			\eo\wbc\controllers\publics\variations\SP_Loop_Gallery_Zoom::instance()->init();
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
								<?php echo esc_html($toggle_text); ?><i class="caret up icon" style="text-align: center;line-height: 1em;"></i>						
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

			// wbc_pr("SP_Model_Feed load_asset");

		add_action( 'wp_footer'/*'wp_enqueue_scripts'*/ ,function(){
			// wbc_pr("SP_Model_Feed load_asset wp_footer");

			wbc()->load->asset('css','fomantic/semantic.min');
			wbc()->load->asset('js','fomantic/semantic.min',array('jquery'));

			wbc()->load->asset( 'asset.php', constant( 'EOWBC_ASSET_DIR' ).'variations.assets.php');
		}, 1049);	

	}

	public function render_gallery_images_template_callback($args = array()){
		
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

		$args['page'] = 'feed';
        $data = \eo\wbc\model\publics\data_model\SP_WBC_Variations::prepare_gallery_template_data($args);
        
        // if( wbc()->sanitize->get('is_test') == 1 ) {

		// 	wbc_pr("wbc SP_Model_Feed render_gallery_images_template_callback");
		// 	wbc_pr($data);
		// }

		//////////////// start core

		//bind to hook from here for the hook that is applied from both slider and zoom module for the images. means add filter here, and provide back with gallery_images data. so simply entire data var will be added to filter var but yeah the variation_gallery_images, attachment_ids etc. would be key -- to b done
		
		// ACTIVE_TODO we need to enable slider leyer for purple theme, and we sud do mast by 2nd rievisen. 
		/*add_filter('sp_slzm_loop_slider_images',function($hook_data) use($data){

			return $data;

		});*/

		add_filter('sp_slzm_loop_zoom_images',function($hook_data) use($data){

			return $data;

		});

		do_action( 'sp_variations_loop_gallery_images_core' );

		$classes = array('spui-sp-variations-loop-gallery-images','spui-sp-variations-loop-gallery-images-'.$data['gallery_images_template_data']['product_type']);
		$classes = apply_filters('sp_variations_loop_gallery_images_core_container_class',$classes);	

		$ui = array(
			'type'=>'div',
			'class'=>$classes,
			'attr' => ($data['gallery_images_template_data']['product_type'] == 'simple') ? apply_filters('sp_wbc_simple_product_type_html_attributes', null, $data, $args) : array(),
			'child'=>array(
				/*array(
					'type'=>'html',
					'child'=>apply_filters('sp_variations_loop_gallery_images_slider_ui',null),
				),*/
				array(
					'type'=>'html',
					'child'=>apply_filters('sp_variations_loop_gallery_images_zoom_ui',null),
				),
			),
		);
        // ACTIVE_TOOD below calls to theme ui page builder class was upgraded to SP_WBC_Page_Builder class function calls so that we can remove the dependancy on the theme ui package. however there is one catch instead of calling the ui builder build function(like extensions are doing) we are calling the page builder class's build page widgets function so still need to upgrade that as requierd as well as if we face any issues related this upgrade then need to take care of it. as well as need to note carefully that the calls are upgraded but it is not yet supporting the appearance, configuration and data controls. for that the respective functions need to be created inside the respective model and then pass the ui_definition in below function call to enable support for that. so lets do it during the wbc upgrade or max by 1st or 2nd revision. -- to h 
        // \sp\theme\view\ui\builder\Page_Builder::instance()->build_page_widgets($ui,'sp_variations_loop_gallery_images_container');
        \eo\wbc\model\SP_WBC_Page_Builder::build_page_widgets($ui,'sp_variations_loop_gallery_images_container');
		//wbc_pr( $ui );	die();

		//////////////// end core
			return;

	}

	public function prepare_swatches_data($args = array()){

		$args['page'] = 'feed';
		
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

	public function ui_appearence_controls_definition($ui_definition, $page_section, $args = array()){

        if ($ui_definition === null) {
          
            $ui_definition = array();

            $ui_definition['controls'] = array();

        }

        $ids = null;
        if ('oops_section' === $page_section) {
            
            $ids = array('wbc_fp_oops_appointment_optitle','wbc_fp_oops_appointment_no_products','wbc_fp_oops_appointment_go_back','wbc_fp_oops_appointment_continue_single','wbc_fp_oops_appointment_mapping_text','wbc_fp_oops_appointment_mapping_adequate_text','wbc_fp_oops_appointment_report_admin');
        }

        if (empty($ids)) {
            
            return $ui_definition;
        }

        foreach($ids as $id_key){

            if ('wbc_fp_oops_appointment_optitle' === $id_key) {

                if (!isset($ui_definition['controls'][$id_key])) {
                   
                   $ui_definition['controls'][$id_key] = array();

                }

                $ui_definition['controls'][$id_key]['appearence_controls'] = array('Ooops Title',array(),array('type'=>'text','control_key'=>'appearance_wbc_fp_appearence_controls','id_key'=>'wbc_fp_oops_appointment_optitle'));
            
            } else if ('wbc_fp_oops_appointment_no_products' === $id_key) {

                if (!isset($ui_definition['controls'][$id_key])) {
                   
                   $ui_definition['controls'][$id_key] = array();

                }

                $ui_definition['controls'][$id_key]['appearence_controls'] = array('No products were found matching your selection',array(),array('type'=>'text','control_key'=>'appearance_wbc_fp_appearence_controls','id_key'=>'wbc_fp_oops_appointment_no_products'));
            
            } else if ('wbc_fp_oops_appointment_go_back' === $id_key) {

                if (!isset($ui_definition['controls'][$id_key])) {
                   
                   $ui_definition['controls'][$id_key] = array();

                }

                $ui_definition['controls'][$id_key]['appearence_controls'] = array('Go Back Title & link',array(),array('type'=>'a','control_key'=>'appearance_wbc_fp_appearence_controls','id_key'=>'wbc_fp_oops_appointment_go_back'));
            
            } else if ('wbc_fp_oops_appointment_continue_single' === $id_key) {

                if (!isset($ui_definition['controls'][$id_key])) {
                   
                   $ui_definition['controls'][$id_key] = array();

                }

                $ui_definition['controls'][$id_key]['appearence_controls'] = array('Continue buying single item Title & link',array(),array('type'=>'a','control_key'=>'appearance_wbc_fp_appearence_controls','id_key'=>'wbc_fp_oops_appointment_continue_single'));
            
            } else if ('wbc_fp_oops_appointment_mapping_text' === $id_key) {

                if (!isset($ui_definition['controls'][$id_key])) {
                   
                   $ui_definition['controls'][$id_key] = array();

                }

                $ui_definition['controls'][$id_key]['appearence_controls'] = array('As admin of this site please create a product mapping to fix this problem text',array(),array('type'=>'text','control_key'=>'appearance_wbc_fp_appearence_controls','id_key'=>'wbc_fp_oops_appointment_mapping_text'));
            
            } else if ('wbc_fp_oops_appointment_mapping_adequate_text' === $id_key) {

                if (!isset($ui_definition['controls'][$id_key])) {
                   
                   $ui_definition['controls'][$id_key] = array();

                }

                $ui_definition['controls'][$id_key]['appearence_controls'] = array('Adequate mapping(s) needs to be added in... text',array(),array('type'=>'text','control_key'=>'appearance_wbc_fp_appearence_controls','id_key'=>'wbc_fp_oops_appointment_mapping_adequate_text'));
            
            } else if ('wbc_fp_oops_appointment_report_admin' === $id_key) {

                if (!isset($ui_definition['controls'][$id_key])) {
                   
                   $ui_definition['controls'][$id_key] = array();

                }

                $ui_definition['controls'][$id_key]['appearence_controls'] = array('Report to admin to help them fix this problem title & text',array(),array('type'=>'a','control_key'=>'appearance_wbc_fp_appearence_controls','id_key'=>'wbc_fp_oops_appointment_report_admin'));
            
            }
        }
      
        return $ui_definition;

    }

    public function ui_configuration_controls_definition($ui_definition, $page_section, $args = array()){

        if ($ui_definition === null) {
          
            $ui_definition = array();

            $ui_definition['controls'] = array();

        }

        $ids = null;
        if ('example_page_section' === $page_section) {
            
            $ids = array(''/*'example_id'*/);

        }

        if (empty($ids)) {
            
            return $ui_definition;
        }
        
        foreach($ids as $id_key){

            if ('example_id' === $id_key) {

                if (!isset($ui_definition['controls'][$id_key])) {
                   
                   $ui_definition['controls'][$id_key] = array();

                }
                
                $ui_definition['controls'][$id_key]['configuration_controls'] = array();
            
            }


        }

        return $ui_definition;

    }

    public function ui_data_controls_definition($ui_definition, /*$ui*/$page_section, $args = array()){

        if ($ui_definition === null) {
          
            $ui_definition = array();

            $ui_definition['controls'] = array();

        }

        $ids = null;
        if ('example_page_section' === $page_section) {
            
            $ids = array(''/*'example_id'*/);

        }

        if (empty($ids)) {
            
            return $ui_definition;
        }

        foreach($ids as $id_key){

            if ('example_id' === $id_key) {

                if (!isset($ui_definition['controls'][$id_key])) {
                   
                   $ui_definition['controls'][$id_key] = array();

                }
                
                $ui_definition['controls'][$id_key]['data_controls'] = array();
                
            }
        }

        return $ui_definition;

    }

}