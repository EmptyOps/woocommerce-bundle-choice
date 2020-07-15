<?php 
defined( 'ABSPATH' ) || exit;

class WBC_Session {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() { 
		//	No implementation.
	}

	public function get(string $key,$default = false) {
		$key = apply_filters('eowbc_session_get_key', $key );
		if(function_exists('wc') and !empty(wc()->session) and !empty($key)) {
	        $session_data = wc()->session->get('EO_WBC',array());
	        if(!empty($session_data[$key])){
	        	return $session_data[$key];
	        }
	    }
	    return $default;	    
	}

	public function set(string $key,$value) {		
		$key = apply_filters('eowbc_session_set_key', $key );
		$value = apply_filters('eowbc_session_set_value', $value );
		if(function_exists('wc') and !empty(wc()->session) and !empty($key)) {
	        $session_data = wc()->session->get('EO_WBC',array());
	        $session_data[$key] = $value;
	        wc()->session->set('EO_WBC',$session_data);
	        return $session_data;
	    }
	    return false;
	}

	public function remove(string $key) {
		$key = apply_filters('eowbc_session_remove_key', $key );
		if(function_exists('wc') and !empty(wc()->session) and !empty($key)) {
	        $session_data = wc()->session->get('EO_WBC',array());
	        if(!empty($session_data[$key])){
	        	$value = $session_data[$key];
	        	unset($session_data[$key]);
	        	return $value;
	        }
	    }
	    return false;
	}
}
