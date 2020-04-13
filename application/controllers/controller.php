<?php

namespace eo\wbc\controllers;

defined( 'ABSPATH' ) || exit;

class Controller {

	protected static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	protected function __construct() {
		
	}	

	protected function _get($name) {

	}

	protected function _set() {

	}

	protected function _call() {

	}
}
