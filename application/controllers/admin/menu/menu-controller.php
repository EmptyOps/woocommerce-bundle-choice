<?php

namespace eo\wbc\controllers\admin\menu;

defined( 'ABSPATH' ) || exit;

class Menu_Controller extends eo\wbc\controllers\Controller {

	protected static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	protected function __construct() {
		
	}	

	public function get_form_defination($args = array()){
		// To do here.
	}
}
