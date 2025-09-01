<?php
namespace eo\wbc\system\bootstrap;
use \eo\wbc\helper\EOWBC_Options; 

defined( 'ABSPATH' ) || exit;

class Deactivate {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}
		return self::$_instance;
	}

	private function __construct() {

	}	

	public function run() {
		
	}
}
