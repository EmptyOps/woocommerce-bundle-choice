<?php
/*
*	SP Model Gallery Slider class 
*/

namespace eo\wbc\model\publics\variations;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\publics\Eowbc_Base_Model_Publics ;

class SP_Model_Gallery_Slider extends Eowbc_Base_Model_Publics {

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
		
		add_filter('sp_variations_gallery_images_core_container_class', function($classes){
			if (wbc_is_mobile()) {
				$classes[] = 'Product_MObail_View_Images';
				$classes[] = 'sp-purple-theme-product-dots';
			} else {
				$classes[] = 'Product_Left_Wrapper_Plugin_Images';
			}
			return $classes;
		});
		
		add_filter('sp_slzm_slider_container', function($classes){
			$classes[] = 'splide_slider_container';

			return $classes;
		});

		add_filter('sp_slzm_slider_image_loop_js_template',function($html){

			$image['gallery_thumbnail_src'] = '{{data.gallery_thumbnail_src}}';
			$image['gallery_thumbnail_class'] = '{{data.gallery_thumbnail_class}}';
			$image['gallery_thumbnail_src_w'] = '{{data.gallery_thumbnail_src_w}}';
			$image['gallery_thumbnail_src_h'] = '{{data.gallery_thumbnail_src_h}}';
			$image['alt'] = '{{data.alt}}';
			$image['title'] = '{{data.title}}';
			$image['post_thumbnail_id'] = '{{data.post_thumbnail_id}}';
			$image['index'] = '{{data.index}}';

			$data = array();
			$data['image'] = $image;

			$template_data = array(); 
            $template_data['template_key'] = 'gallery_slider_{{template_key_device}}_image_loop_content';
            $template_data['template_sub_dir'] = 'single-product/gallery-slider';
            $template_data['data'] = $data;
            $template_data['singleton_function'] = 'wbc';

            //$template_data['data']['image'] = -1;
        	// $template_data['data']['index'] = -1;

        	$template_data['data']['gallery_images_template_data'] = array();
        	$template_data['data']['gallery_images_template_data']['attachment_ids_loop_post_thumbnail_id'] = array();
        	$template_data['data']['gallery_images_template_data']['attachment_ids_loop_post_thumbnail_id'][$template_data['data']['index']] = -1;
            $html =  wbc()->load->template($template_data['template_sub_dir'].'/'.$template_data['template_key'],(isset($template_data['data'])?$template_data['data']:array()),true,$template_data['singleton_function'],true,true);

			return $html;

		});

		$this->load_asset();

	}

	public function load_asset(){

		wbc()->load->asset( 'asset.php', constant( strtoupper( 'EOWBC_ASSET_DIR' ) ).'variations/gallery-slider.assets.php' );
	}

	public function init_core(){

	}
	
	public function render_core(){

		add_action('sp_variations_gallery_images_core', function(){

			$images_data = array();
			$images_data = apply_filters('sp_slzm_slider_images',$images_data);

			add_filter('sp_variations_gallery_images_slider_ui', function($ui) use($images_data) {

				$classes = array('sp-variations-gallery-images-slider');
				$classes = apply_filters('sp_slzm_slider_container',$classes);

				$html = null;
				$html = apply_filters('sp_slzm_slider_images_html',$html,$images_data);

				$ui = array(
					'type'=>'div',
					'class'=>$classes,
					'child'=>$html
				);
				//\sp\theme\view\ui\builder\Page_Builder::instance()->build_page_widgets($ui,'sp_variations_gallery_images_slider_container');

				return $ui;
			}, 10);	

			//js template
			$html = null;
			$html = apply_filters('sp_slzm_slider_image_loop_js_template',$html);
			$html = \sp\theme\view\ui\builder\Page_Builder::instance()->build_page_widgets($html,'sp_variations_gallery_images_slider_container',array(),true);
			echo \eo\wbc\model\UI_Builder::instance()->js_template_wrap('sp_slzm_slider_image_loop',$html,'wp');

		}, 10);	

	}
}	