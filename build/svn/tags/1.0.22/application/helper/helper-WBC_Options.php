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

	public function get_option_group(string $option,$default = false) {
		$options = get_option('eowbc_option_'.$option,"");
		if(!empty($options))  {		
			return $options;
		} else {
			return $default;
		}		
	}

	public function update_option_group(string $option,$value) {

		update_option( 'eowbc_option_'.$option, $value );
		return true;
	}

	public function get_option(string $option,$key,$default = false,$override=true,$not_empty = false) {

		$return = $default;

		if($override){
			$option = apply_filters('eowbc_helper_options_get_option_option',$option,$key,$default);
			$key = apply_filters('eowbc_helper_options_get_option_key',$key,$option,$default);
			$default = apply_filters('eowbc_helper_options_get_option_default',$default,$option,$key);
		}

		$options = unserialize(get_option('eowbc_option_'.$option,"a:0:{}"));
		if(!empty($options) and is_array($options) and isset($options[$key])/*!empty($options[$key])*/)  {		
			$return = $options[$key];

			if( $option === 'configuration' and in_array($key,array('first_slug','second_slug')) ){
				$return = wbc()->wc->slug2slug($return);
			}			

		} else {
			$return = $default;
		}		

		if($not_empty and empty($return)) {
			return $default;
		} else {
			return $return;
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

	//interacts with core wp api directly
	public function get(string $option,$default = false) {
		return get_option($option,$default);
	}

	//interacts with core wp api directly
	public function set(string $option,$value) {
		update_option( $option, $value );
		return true;
	}

	//interacts with core wp api directly
	public function delete(string $option) {
		return delete_option($option);
	}

}
