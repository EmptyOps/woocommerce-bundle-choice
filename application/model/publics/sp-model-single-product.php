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

	public function render_ui(){

		$this->render_variations_ui();

		add_filter( 'body_class',  function($classes){

		}, 99, 1);
	
		apply_filters( 'body_class', string[] $classes, string[] $class );

		add_filter( 'post_class',  function($classes){

		}, 99, 1); 

		// apply_filters( 'post_class', string[] $classes, string[] $class, int $post_id );

	}

	public function render_variations_ui() {

		$this->render_image_gallery();
		$this->render_variations_swatches();

	}

	public function render_image_gallery() {

	}

	public function render_variations_swatches() {

	}
	public function load_asset(){

	}

}