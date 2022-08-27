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

    public static function set_query_params($type, $key_vals, $input_method = 'GET') {

    }

    public static function get_query_params($type, $input_method = 'GET') {
    	ACTIVE_TODO now the way we can do is firstly support the standard woocommerce filter attributes -- to h & -- to t & -- to s
			ACTIVE_TODO sooner or later we should do the woocommerce filters standard based implementation and upgrade or revise and upgrade our filter layers to make sure that simply work based on the woocommerce standard filters backend and so on and so we do that above point will all naturaly be covered.
			--	and then we should use that links on new layers while as backward compatability can support our older structure of CAT_LINK and ATT_LINK -- to h & -- to s 
    }

    public static function get_query_params_formated($type, $input_method = 'GET', $format = null) {

    	if($format == 'key_value') {

    	} else {

    		support default format -- to s
    	}
    }
}
