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

	ACTIVE_TODO eventualy we nshould move it to the common parent class of this base model publics as well as base model used on admin side -- to h
		-- so most probebly we must have planned for a common parent class and if not then we may need to think about it -- to h 
	public static function split_sp_eid($sp_eid) {

		$separator = wbc()->config->separator();

		return explode($separator,$sp_eid);

	}

	ACTIVE_TODO eventualy we should move it to the common parent class of this base model publics as well as base model used on admin side -- to h
		-- so most probebly we must have planned for a common parent class and if not then we may need to think about it -- to h 
	public static function concate_sp_eid_values($values) {

		$separator = wbc()->config->separator();

		return $separator.$values['type'].$separator.$values['val'].$separator;
	}
}
