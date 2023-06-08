<?php
/*
*	SP Cart class 
*/

namespace eo\wbc\system\core\publics;

defined( 'ABSPATH' ) || exit;

class SP_Cart extends Eowbc_Base_Model_Publics {

	private static $_instance = null;

	public static function instance() {
		
		throw new Exception("Sorry, singleton instance method not supported for this class. Always use construct method to create object.", 1);

		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct() {

	}
}
