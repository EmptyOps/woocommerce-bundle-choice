<?php
/*
*	SP Model Gallery Zoom class 
*/

namespace eo\wbc\model\publics\variations;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\publics\Eowbc_Base_Model_Publics ;

class SP_Model_Gallery_Zoom extends Eowbc_Base_Model_Publics {

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
		
		add_filter('sp_variations_gallery_images_render', function($classes){
			$classes[] = 'big-img';
		});

	}

	public function load_asset(){

	}

	public function init_core(){

	}
	
	public function render_core(){

		add_action('sp_variations_gallery_images_render', function(){

			$classes = array('sp-variations-gallery-images-zoom');
			$classes = apply_filters('sp_slzm_zoom_container',$classes);

			$images_data = array();
			$images_data = apply_filters('sp_slzm_zoom_images',$images_data);

			$html = null;
			$html = apply_filters('sp_slzm_zoom_images_html',$html,$images_data);

			wbc()->load->model('ui-builder');
			$ui = array(
				'type'=>'div',
				'class'=>$classes,
				'preHTML'=>$html
			);
			\eo\wbc\model\UI_Builder::instance()->build($ui,'sp_variations_gallery_images_zoom_container');

			$html = null;
			$html = apply_filters('sp_slzm_zoom_image_loop_js_tempalte',$html);
			echo \eo\wbc\model\UI_Builder::instance()->js_template_wrap('sp_slzm_zoom_image_loop',$html,'wp');

		}, 10);
		
	}
}