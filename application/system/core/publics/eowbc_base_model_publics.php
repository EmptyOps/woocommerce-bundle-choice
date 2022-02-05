<?php


/*
*	WBC base Publics Model.
*/

namespace eo\wbc\system\core\publics;

defined( 'ABSPATH' ) || exit;

class Eowbc_Base_Model_Publics {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}
		return self::$_instance;
	}

	private function __construct() {		
	}

}
