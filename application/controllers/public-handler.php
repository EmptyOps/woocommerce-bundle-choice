<?php 

namespace eo\wbc\controllers;

defined( 'ABSPATH' ) || exit;

class Public_Handler {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		// no implementation
	}

	public static function process(){
		//	Handle frontend process.
	}
}
