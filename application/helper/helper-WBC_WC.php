<?php

/*
*	woocommerce helper class
*/
defined( 'ABSPATH' ) || exit;

class WBC_WC {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function wc_placeholder_img_src() {
		return wc_placeholder_img_src();
	}
}
