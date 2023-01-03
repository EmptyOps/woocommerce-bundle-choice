<?php
/*
*	SP Router class 
*/

namespace eo\wbc\system\core;

defined( 'ABSPATH' ) || exit;

class SP_Router {

	private static $_instance = null;

	public static function instance() {

		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct( ) {

	}

    public function is_applicable_route( $args = null ){

    	//	maybe this should_init kind of level function should define whether the plugin should continue its operation, so it is basically about plugin level to decide whether that particular plugin should do its operation based on the given page url and/or their input data from GET/POST/REQUEST
    		//	ACTIVE_TODO so other functions in this class should be defined in the modular way as required, for example if this is at plugin level then other should be at page/category/feature level

        return true; 
    }
}
