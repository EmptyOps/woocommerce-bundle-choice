<?php

namespace eo\wbc\controllers;

defined( 'ABSPATH' ) || exit;

class Controller {

	private static $_instance = null;

<<<<<<< HEAD
	/*protected function __construct() {
		
	}	*/
=======
	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}
>>>>>>> c3dc42e4fb97d6ae1ea0920712ac0ec198116dc4

	protected function _get($name) {

	}

	protected function _set() {

	}

	protected function _call() {

	}
}
