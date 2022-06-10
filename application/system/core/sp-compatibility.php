<?php
/**
 *	SP Compatibility class 
 */

namespace eo\wbc\system\core;

defined( 'ABSPATH' ) || exit;

class SP_Compatibility {

	private static $_instance = null;

	public static function instance() {

		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct() {

	}

	public function single_product_gallery_compatability(){

 	}

 	public function single_Product_variations_form_compatability(){

 	}

 	public function feed_loopbox_variations_container_compatability(){

 	}

 	public function feed_quickview_container_compatability(){

 	}

 	public function sp_variations(){
 		
 	}
}