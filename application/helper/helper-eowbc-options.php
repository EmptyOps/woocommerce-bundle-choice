<?php 

namespace eo\wbc\helper;

defined( 'ABSPATH' ) || exit;

class EOWBC_Options {

	public static function get_option(string $option,$default = false) {
		$options = get_option('eowbc_options',false);
		if(!empty($options)) {
			$options = unserialize($options);
			if(!empty($options) and is_array($options) and !empty($options[$option])){
				return $options[$option];
			} else {
				return $default;
			}
		}
	}

	public static function set_option(string $option,$value) {
		self::update_option($option,$value);
	}

	public static function update_option(string $option,$value) {
		$options = get_option('eowbc_options',false);
		if(!empty($options)) {
			$options = unserialize($options);
			if(!empty($options) and is_array($options)) {
				$options[$option] = $value;
			} else {
				$options = array($option=>$value);	
			}
		} else {
			$options = array($option=>$value);
		}
		update_option( 'eowbc_options', serialize($options) );
		return true;
	}

	public static function remove_option(string $option) {
		$options = get_option('eowbc_options',false);
		if(!empty($options)) {
			$options = unserialize($options);
			if(!empty($options) and is_array($options) and !empty($options[$option])) {
				unset($options[$option]);
				update_option( 'eowbc_options', serialize($options) );
				return true;			
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}
