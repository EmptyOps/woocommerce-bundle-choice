<?php

if(!class_exists('WBC_Sanitize')) {

	class WBC_Sanitize {

		private static $_instance = null;

		public static function instance() {
			if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;
				self::$_instance->methods = array(
												'sanitize_email',
												'sanitize_file_name',
												'sanitize_html_class',
												'sanitize_key',
												'sanitize_meta', 
												'sanitize_mime_type',
												'sanitize_option',
												'sanitize_sql_orderby',
												'sanitize_text_field',
												'sanitize_title',
												'sanitize_title_for_query',
												'sanitize_title_with_dashes',
												'sanitize_user',
												'esc_url_raw',
												'wp_filter_post_kses',
												'wp_filter_nohtml_kses',
												'sanitize_hex_color'
											);
			}

			return self::$_instance;
		}

		private function __construct() {
			
		}

		public function clean($form) {	

			foreach ($form as $key => $tab) {
		    	foreach ($tab["form"] as $fk => $fv) {
				    if(!empty($fv['sanitize']) and array_key_exists($fk,$_POST)) {
				    	if(is_string($fv['sanitize']) and in_array($fv['sanitize'],$this->methods)){
				    		$_POST[$fk] = call_user_func_array(array(wbc()->wp,$fv['sanitize']),array($_POST[$fk]));
				    	} elseif(is_array($fv['sanitize'])) {
				    		foreach ($fv['sanitize'] as $sanitize_method) {
				    			if(in_array($sanitize_method,$this->methods)) {
				    				$_POST[$fk] = call_user_func_array(array(wbc()->wp,$sanitize_method),array($_POST[$fk]));
				    			}				    			
				    		}
				    	}
				    }
				}
		    }			
		}

		public function get(string $get_field){
			if(isset($_GET[$get_field])) {
				return sanitize_text_field($_GET[$get_field]);
			} else {
				return false;
			}
		}

		public function _get(string $get_field){
			if(isset($_GET[$get_field])) {
				return ($_GET[$get_field]);
			} else {
				return false;
			}
		}

		public function post(string $post_field){
			if(isset($_POST[$post_field])) {
				return sanitize_text_field($_POST[$post_field]);
			} else {
				return false;
			}
		}

		public function _post(string $post_field){
			if(isset($_POST[$post_field])) {
				return $_POST[$post_field];
			} else {
				return false;
			}
		}

		public function post_array(string $post_field){
			if(isset( $_POST[$post_field] ) and is_array($_POST[$post_field]) and !empty($_POST[$post_field])){

				return array_map( 'sanitize_text_field', $_POST[$post_field] );	
			} else {
				return false;
			}
			
		}

	}
}
