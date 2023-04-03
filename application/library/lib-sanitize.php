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

		// ACTIVE_TODO confirm that global sanitize is limited to admin model save function scope and then it is restored, if it not then is not it a very big mistake of changing stat of the global var which is being used by wp, woo, other plugins and what not. confirm if it is not decision for specific matter and if it is actually a mistake then just restore the stat from admin model save function that is from where it is called -- to h. -- to s. 
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

		public function store_get(string $get_field, $val){
			if(is_string($val)) {
				$_GET[$get_field] = sanitize_text_field($val);
			} elseif(is_array($val)) {
				// ACTIVE_TODO use sanitize array function whichever is available in php or wp api
				$_GET[$get_field] = sanitize_text_field($val);
			} else {
				// TODO here we may need to support other type if required
				return false;
			}
		}

		public function _get(string $get_field){
			// ACTIVE_TODO this should be deprecated soon, and if there is requirement of using the input without sanitize then check for the standard process there must be something in php or in wp api 
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

		public function store_post(string $post_field, $val){
			if(is_string($val)) {
				$_POST[$post_field] = sanitize_text_field($val);
			} elseif(is_array($val)) {
				// ACTIVE_TODO use sanitize array function whichever is available in php or wp api
				$_POST[$post_field] = sanitize_text_field($val);
			} else {
				// TODO here we may need to support other type if required
				return false;
			}
		}

		public function _post(string $post_field){
			// ACTIVE_TODO this should be deprecated soon, and if there is requirement of using the input without sanitize then check for the standard process there must be something in php or in wp api 
			if(isset($_POST[$post_field])) {
				return $_POST[$post_field];
			} else {
				return false;
			}
		}

		public function request(string $post_field){
			if(isset($_REQUEST[$post_field])) {
				return sanitize_text_field($_REQUEST[$post_field]);
			} else {
				return false;
			}
		}

		public function store_request(string $request_field, $val){
			if(is_string($val)) {
				$_REQUEST[$request_field] = sanitize_text_field($val);
			} elseif(is_array($val)) {
				// ACTIVE_TODO use sanitize array function whichever is available in php or wp api
				$_REQUEST[$request_field] = sanitize_text_field($val);
			} else {
				// TODO here we may need to support other type if required
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

		ACTIVE_TODO in here we are duing sum validation call but we ned to sud mack thay are moved to comman senitijer library we du not use any dublicated code here. but mostprobly this code dujent exit only sentij library on the comnen senitijer library wbc in that cas we simly extend the senitijer library. mins exted of this code relay need to sty only here they extend the class then call the senitijer class from here ned move this all validation code from this class leyer to that extemded senitijer class -- to h
		ACTIVE_TODO this function moved out of comnen email hendler. it is not us comnen by any other layers access the ajax email handler or ajax comnen handler layer so we jast need to refactrit for the mact it useabel for comnen layer. other wish we can simply dapricatit in fusher verjan and lat other layer incuding ajax email or ajax layer use the other comnen function for the empliment. alt markited to do by 3rd revision if plan to do it after the 3rd revision is finshed. -- to h   
		public function sp_validate_unique_email($fields,$key) {
			if(!empty($fields) and is_array($fields) and !empty($key)) {
				$email_value = wbc()->sanitize->post($key);
				foreach($fields as $field_key=>$field_value) {
					if($field_key !== $key) {
						$field_value = (array)$field_value;
						if(!empty($field_value['validate']) and is_array($field_value['validate']) and array_search('unique',$field_value['validate'])!==false and array_search('email',$field_value['validate'])!==false ) {

							if(wbc()->sanitize->post($field_key) === $email_value ) {
								return false;
							}

						}

					}
				}
			}
			return true;
		}
	}
}
