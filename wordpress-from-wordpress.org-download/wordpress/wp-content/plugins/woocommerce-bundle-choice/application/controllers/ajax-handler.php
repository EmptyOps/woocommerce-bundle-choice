<?php 
defined( 'ABSPATH' ) || exit;

class Ajax_Handler {

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
		echo 1;
		
	}
}
