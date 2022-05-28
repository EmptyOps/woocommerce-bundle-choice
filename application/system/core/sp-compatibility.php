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


}