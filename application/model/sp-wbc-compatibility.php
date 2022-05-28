<?php
/**
 *	SP WBC Compatibility class 
 */

namespace eo\wbc\model;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\SP_Compatibility;

class SP_WBC_Compatibility extends SP_Compatibility {

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