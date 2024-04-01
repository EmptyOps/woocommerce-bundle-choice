<?php
/*
*	SP Model Gallery Zoom class 
*/

namespace eo\wbc\model\publics\variations;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\publics\Eowbc_Base_Model_Publics ;

class SP_Model_Loop_Gallery_Zoom extends Eowbc_Base_Model_Publics {

	private static $_instance = null;

	public static function instance() {

		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct() {

	}
	
	public function get_data($for_section="default", $args=null) {

	}

	public function render_ui(){
		
		add_filter('sp_slzm_loop_zoom_container', function($classes){
			// $classes[] = 'imagezoomsl_zoom_container';

			return $classes;
		});

		$hook_array = array('sp_slzm_loop_zoom_image_loop_js_tempalte', 'sp_slzm_loop_zoom_image_loop_js_tempalte_hover');	
		foreach($hook_array as $hook_key) {
			add_filter($hook_key /*'sp_slzm_zoom_image_loop_js_tempalte'*/,function($html, $index, $image) use($hook_key){

				// if(wbc()->sanitize->get('is_test') == 1 || wbc()->sanitize->get('is_test') == 9) {

				// 	wbc_pr( "SP_Model_Gallery_Zoom index ".$index );
				// 	wbc_pr('SP_Model_Gallery_Zoom index key_is = '.$hook_key.' index_is = ' . $index);
				// 	wbc_pr( $html );	
				// }
					
				
				// NOTE: this hook will intend to run at last by setting the priority to 100, so that if any other layer wants to provide the js tempates then they can and in that case this hook will just provided html. so it will apply html from here only if html is not applied by any other layers. 
				if( !empty($html) ) {
					
					// if(wbc()->sanitize->get('is_test') == 1 || wbc()->sanitize->get('is_test') == 9) {

					// 	wbc_pr( "!empty(html) if" );
					// 	wbc_pr( $html );	
					// }
					
					return $html;	
				}

				// NOTE: now to support hover templates for all types below if is commented on 09-12-2022.
				// 	ACTIVE_TODO most probebly there sould be no conflict due to this but if there are any conflict or issues due to incomplete development than we need to manage that and finish the rest of the development. Than remove this active todo by thierd revision. -- to a -- to b -- to h
				// if($hook_key == 'sp_slzm_loop_zoom_image_loop_js_tempalte_hover' && $image['extra_params_org']['type'] != 'video') {

				// 	if(wbc()->sanitize->get('is_test') == 1 || wbc()->sanitize->get('is_test') == 9) {
	
				// 		wbc_pr( "image['extra_params_org']['type'] if" );
				// 		wbc_pr( $html );	

				// 	}
	            // 	return $html;
	            // }

				$image['class'] = '{{data.class}}';
				$image['src'] = '{{data.src}}';
				$image['src_w'] = '{{data.src_w}}';
				$image['src_h'] = '{{data.src_h}}';
				$image['alt'] = '{{data.alt}}';
				$image['title'] = '{{data.title}}';
				$image['caption'] = '{{data.caption}}';
				$image['full_src'] = '{{data.full_src}}';
				$image['full_src_w'] = '{{data.full_src_w}}';
				$image['full_src_h'] = '{{data.full_src_h}}';
				$image['srcset'] = '{{data.srcset}}';
				$image['sizes'] = '{{data.sizes}}';
				$image['extra_params'] = '{{data.extra_params}}';
				$options['has_only_thumbnail'] = '{{data.has_only_thumbnail}}';
				$image['video_src'] = '{{data.video_src}}';

				// ACTIVE_TODO remove below 3 filds, since thay are not used. but confirn first
				$image['video_link'] = '{{data.video_link}}';
				$image['video_embed_type'] = '{{data.video_embed_type}}';
				$image['video_embed_url'] = '{{data.video_embed_url}}';

				$image['post_thumbnail_id'] = '{{data.post_thumbnail_id}}';
				$image['index'] = '{{data.index}}';

				$image['class_wrapper'] = '{{data.class_wrapper}}';
				//$image['extra_params_org']['type'] = '{{data.extra_params_org.type}}';
				//$image['extra_params_org']['embed_type'] = '{{data.extra_params_org.embed_type}}';
				$data = array();
				$data['image'] = $image;

				$template_data = array(); 
				
	            /*ACTIVE_TODO_OC_START
				ACTIVE_TODO as soon as required we need to enable the loops product id based support for the jas template ids. and on the common.js swatches and gallery images module also need to enable the same product id support in the child module also feed page and at their we can simply enable it based on getting the product id data from the base container and i think we are alredy getting their and saving under _this.
					ACTIVE_TODO need to do applicable things from the above for the hover templates as well. 
				ACTIVE_TODO_OC_END*/

	            if($hook_key == 'sp_slzm_loop_zoom_image_loop_js_tempalte') {
		            $template_data['template_key'] = 'gallery_zoom_{{template_key_device}}_image_loop_content';

		        } else {

		            $template_data['template_key'] = 'gallery_zoom_{{template_key_device}}_image_loop_content_hover';
	            }

	            $template_data['template_sub_dir'] = 'loop/gallery-zoom';
	            $template_data['data'] = $data;
	            $template_data['singleton_function'] = 'wbc';

	            //$template_data['data']['image'] = -1;
	        	// $template_data['data']['index'] = -1;

	        	$template_data['data']['gallery_images_template_data'] = array();
	        	$template_data['data']['gallery_images_template_data']['attachment_ids_loop_post_thumbnail_id'] = array();
	        	$template_data['data']['gallery_images_template_data']['attachment_ids_loop_post_thumbnail_id'][$template_data['data']['image']['index']] = -1;
	            $html =  wbc()->load->template($template_data['template_sub_dir'].'/'.$template_data['template_key'],(isset($template_data['data'])?$template_data['data']:array()),true,$template_data['singleton_function'],true,true);

	            // if(wbc()->sanitize->get('is_test') == 1 || wbc()->sanitize->get('is_test') == 9) {
 		        
 		        //     wbc_pr('End SP_Model_Gallery_Zoom index key_is = '.$hook_key.' index_is = ' . $index);
				// 	wbc_pr( $html );	            	

	            // }
	
				return $html;
			}, 100, 3);
		}

		$this->load_asset();

	}

	public function load_asset(){

		wbc()->load->asset( 'asset.php', constant( strtoupper( 'EOWBC_ASSET_DIR' ) ).'variations/loop-gallery-zoom.assets.php' );
	}

	public function init_core(){

	}
	
	public function render_core(){
		
		add_action('sp_variations_loop_gallery_images_core', function(){

			$images_data = array();
			$images_data = apply_filters('sp_slzm_loop_zoom_images',$images_data);

			add_filter('sp_variations_loop_gallery_images_zoom_ui', function($ui) use($images_data) {

				$gallery_images_configs = array();

				// ACTIVE_TODO we neet to manage the loding secuance here so that any zoom layers including external plugin implimentetion layers can add filter do it 
				$gallery_images_configs['all_in_dom'] = apply_filters('sp_slzm_loop_zoom_template_all_in_dom',0);

				// ACTIVE_TODO ultimately we need to provide this configs to js layer so it is better that configs loed from here to the js layer and js vars asset.php should tac from hier or ned to mange sum how.
				$images_data['gallery_images_configs'] = $gallery_images_configs;

				$classes = array('sp-variations-loop-gallery-images-zoom');
				$classes = apply_filters('sp_slzm_loop_zoom_container',$classes);

				$html = null;
				$html = apply_filters('sp_slzm_loop_zoom_images_html',$html,$images_data);
				$ui = array(
					'type'=>'div',
					'class'=>$classes,
					'child'=>$html,
					// 'id'=>'sp_variations_loop_gallery_images_zoom_'.$images_data['gallery_images_template_data']['product_id'],
					'id'=>'sp_variations_loop_gallery_images_zoom_'.$images_data['gallery_images_template_data']['product_sku_experimental'],
				); 
				//\sp\theme\view\ui\builder\Page_Builder::instance()->build_page_widgets($ui,'sp_variations_gallery_images_zoom_container');


				return $ui;
			}, 10);

			
			$hook_array = array('sp_slzm_loop_zoom_image_loop_js_tempalte', 'sp_slzm_loop_zoom_image_loop_js_tempalte_hover');	
			//js template
			foreach( $images_data['gallery_images_template_data']['attachment_ids_loop_image'] as $index => $image ) {

				foreach($hook_array as $hook_key) {
					
					$type_template = null;

					if(wbc()->config->product_variations_configs()['is_gallery_images_type_based_template'] == 1) {

						$type_template = $image['extra_params_org']['type'];

						$constant_key = 'sp_slzm_loop_zoom_image_loop_'.$type_template.($hook_key=='sp_slzm_loop_zoom_image_loop_js_tempalte_hover'?'_hover':'')."_created";

						if(defined($constant_key) ) {

							continue;
						}
						
						if( wbc()->sanitize->get('is_test') == 1 ) {

							wbc_pr("SP_Model_Gallery_Zoom wbc");
							wbc_pr($constant_key);
						}

						define($constant_key, true);
						
					} else {

						$type_template = $index;
					}


					$html = null;
					
					$html = apply_filters($hook_key, $html, $index, $image);

					// if(wbc()->sanitize->get('is_test') == 1 || wbc()->sanitize->get('is_test') == 9) {
					// 	wbc_pr('html = apply_filters(hook_key, html, index, image) key_is = '.$hook_key.' index_is = ' . $index);
					// 	wbc_pr($html);
					// }

					// ACTIVE_TOOD below calls to theme ui page builder class was upgraded to SP_WBC_Page_Builder class function calls so that we can remove the dependancy on the theme ui package. however there is one catch instead of calling the ui builder build function(like extensions are doing) we are calling the page builder class's build page widgets function so still need to upgrade that as requierd as well as if we face any issues related this upgrade then need to take care of it. as well as need to note carefully that the calls are upgraded but it is not yet supporting the appearance, configuration and data controls. for that the respective functions need to be created inside the respective model and then pass the ui_definition in below function call to enable support for that. so lets do it during the wbc upgrade or max by 1st or 2nd revision. -- to h 
					// $html = \sp\theme\view\ui\builder\Page_Builder::instance()->build_page_widgets($html,'sp_variations_gallery_images_zoom_container',array(),true);
			        $html = \eo\wbc\model\SP_WBC_Page_Builder::build_page_widgets($html,'sp_variations_gallery_images_zoom_container',array(),true);

					// if(wbc()->sanitize->get('is_test') == 1 || wbc()->sanitize->get('is_test') == 9) {
					// 	wbc_pr('after set html key_is = '.$hook_key.' index_is = ' . $index);
					// 	wbc_pr($html);
					// }

					echo \eo\wbc\model\UI_Builder::instance()->js_template_wrap('sp_slzm_loop_zoom_image_loop_'./*$index*/$type_template.($hook_key=='sp_slzm_loop_zoom_image_loop_js_tempalte_hover'?'_hover':''),$html,'wp');
				}
				
			}

		}, 10);	

	}
}