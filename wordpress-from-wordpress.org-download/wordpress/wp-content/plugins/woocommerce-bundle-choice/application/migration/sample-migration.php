<?php

defined( 'ABSPATH' ) || exit;

class Sample_Migration {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}
	
	public static function run() {
		error_log('migration Run ......');
	}
}