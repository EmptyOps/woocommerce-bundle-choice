<?php 
defined( 'ABSPATH' ) || exit;

class WBC_Options {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function get_option(string $option,$key,$default = false) {
		$options = unserialize(get_option('eowbc_option_'.$option,"a:0:{}"));
		if(!empty($options) and is_array($options) and !empty($options[$key]))  {		
			return $options[$key];
		} else {
			return $default;
		}		
	}

	public function set_option(string $option,$key,$value) {
		return $this->update_option($option,$key,$value);
	}

	public function update_option(string $option,$key,$value) {
		$options = unserialize(get_option('eowbc_option_'.$option,"a:0:{}"));
				
		if(!empty($options) and is_array($options)) {
						
			$options[$key] = $value;
			
		} else {
			$options = array($key=>$value);
		}

		update_option( 'eowbc_option_'.$option, serialize($options) );
		return true;
	}

	public function remove_option(string $option,$key) {
		$options = unserialize(get_option('eowbc_option_'.$option,"a:0:{}"));
		if(!empty($options) and is_array($options) and !empty($options[$key])) {			
			unset($options[$key]);
			update_option( 'eowbc_option_'.$option, serialize($options) );			
		} else {
			return false;
		}
	}
}
