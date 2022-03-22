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

}
