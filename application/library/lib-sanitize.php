<?php

defined( 'ABSPATH' ) || exit;

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
				    		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- The input is sanitized using validation methods from via wbc()->wp. Only approved callbacks are allowed. Hence, input is properly sanitized before use.
				    		$_POST[$fk] = call_user_func_array(array(wbc()->wp,$fv['sanitize']),array($_POST[$fk]));
				    	} elseif(is_array($fv['sanitize'])) {
				    		foreach ($fv['sanitize'] as $sanitize_method) {
				    			if(in_array($sanitize_method,$this->methods)) {
				    				// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- The input is sanitized using validation methods from via wbc()->wp. Only approved callbacks are allowed. Hence, input is properly sanitized before use.
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
				// phpcs:ignore WordPress.Security.SuperGlobalInputModification -- Temporarily modifying superglobal as part of an interim solution. Will refactor later.
				// As discussed with the WordPress review team it is discouraged to modify superglobals($_GET, $_POST, and $_REQUEST) but currently, these superglobals are modified in a temporary manner as part of an interim solution.
				// We plan to refactor the entire flow in the future to ensure that our backend structure eliminates the need to directly modify or rely on superglobals.
				$_GET[$get_field] = sanitize_text_field($val);
			} elseif(is_array($val)) {
				// phpcs:ignore WordPress.Security.SuperGlobalInputModification -- Temporarily modifying superglobal as part of an interim solution. Will refactor later.
				// As discussed with the WordPress review team it is discouraged to modify superglobals($_GET, $_POST, and $_REQUEST) but currently, these superglobals are modified in a temporary manner as part of an interim solution.
				// We plan to refactor the entire flow in the future to ensure that our backend structure eliminates the need to directly modify or rely on superglobals.
				// ACTIVE_TODO use sanitize array function whichever is available in php or wp api
				$_GET[$get_field] = sanitize_text_field($val);
			} else {
				// TODO here we may need to support other type if required
				return false;
			}
		}

		// ACTIVE_TODO this should be deprecated soon, and if there is requirement of using the input without sanitize then check for the standard process there must be something in php or in wp api 
		public function _get(string $get_field){

			// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Intentionally accessing raw GET data as part of an interim utility function.
			/**
			 * As discussed, directly accessing $_GET without nonce verification or sanitization
			 * is discouraged in WordPress coding standards. However, this function was planned
			 * to retrieve GET parameters in raw form when needed.
			 * 
			 * Currently, this function is not in use anywhere in the plugin. 
			 * We plan to deprecate or refactor it in future to follow secure input handling practices.
			*/
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
				// phpcs:ignore WordPress.Security.SuperGlobalInputModification -- Temporarily modifying superglobal as part of an interim solution. Will refactor later.
				// As discussed with the WordPress review team it is discouraged to modify superglobals($_GET, $_POST, and $_REQUEST) but currently, these superglobals are modified in a temporary manner as part of an interim solution.
				// We plan to refactor the entire flow in the future to ensure that our backend structure eliminates the need to directly modify or rely on superglobals.
				$_POST[$post_field] = sanitize_text_field($val);
			} elseif(is_array($val)) {
				// phpcs:ignore WordPress.Security.SuperGlobalInputModification -- Temporarily modifying superglobal as part of an interim solution. Will refactor later.
				// As discussed with the WordPress review team it is discouraged to modify superglobals($_GET, $_POST, and $_REQUEST) but currently, these superglobals are modified in a temporary manner as part of an interim solution.
				// We plan to refactor the entire flow in the future to ensure that our backend structure eliminates the need to directly modify or rely on superglobals.
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

				// changed below code on 05-05-2025
				// return $_POST[$post_field];
				return wp_kses_post($_POST[$post_field]);
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
				// phpcs:ignore WordPress.Security.SuperGlobalInputModification -- Temporarily modifying superglobal as part of an interim solution. Will refactor later.
				// As discussed with the WordPress review team it is discouraged to modify superglobals($_GET, $_POST, and $_REQUEST) but currently, these superglobals are modified in a temporary manner as part of an interim solution.
				// We plan to refactor the entire flow in the future to ensure that our backend structure eliminates the need to directly modify or rely on superglobals.
				$_REQUEST[$request_field] = sanitize_text_field($val);
			} elseif(is_array($val)) {
				// ACTIVE_TODO use sanitize array function whichever is available in php or wp api
				// phpcs:ignore WordPress.Security.SuperGlobalInputModification -- Temporarily modifying superglobal as part of an interim solution. Will refactor later.
				// As discussed with the WordPress review team it is discouraged to modify superglobals($_GET, $_POST, and $_REQUEST) but currently, these superglobals are modified in a temporary manner as part of an interim solution.
				// We plan to refactor the entire flow in the future to ensure that our backend structure eliminates the need to directly modify or rely on superglobals.
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

		// ACTIVE_TODO in here we are duing sum validation call but we ned to make sure thay are moved to comman senitijer library and we du not use any dublicated code here. but mostprobly this code does not exist on the santize library on the comnen senitijer library of the wbc, in that case we sipmly extend the senitijer library. mins extend if this code need to sty only here they extend the class then call the senitijer class from here and move this all validation code from this class leyer to that extended senitijer class -- to h
		// 		--	code is already moved here in the santize library but need to do the other applicable things of above point : NOTE
		// ACTIVE_TODO this function moved out of comnen email hendler. it is not in comnen usse by any other layers accept the ajax email handler or ajax comnen handler layer so we jast need to refactr it to mac it useabel for comnen layer. other wish we can simply dapricat it in fusher verjan and lat all other layer incuding ajax email or ajax layer usse the other comnen function that we impliment. lets mark it as to do by 3rd revision if we plan to do it after the 3rd revision is finshed. -- to h   
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

	    // Public function to read and sanitize global input
	    public /*static */function _read_global_sanitized($source){

	        // Determine the source ($_GET, $_POST, $_REQUEST)
	        $global_input = array();
	        switch (strtolower($source)) {
	            case 'get':
	                $global_input = $_GET;
	                break;
	            case 'post':
	                $global_input = $_POST;
	                break;
	            case 'request':
	                $global_input = $_REQUEST;
	                break;
	            default:
	                return array(); // Return empty array for invalid source
        	}

	        // Get the predefined list of parameters
	        $parameters = $this->parameters_list();

	        // Process Static Parameters
	        foreach ($parameters['static'] as $param) {

	            if (isset($global_input[$param])) {

	                $global_input[$param] = sanitize_text_field($global_input[$param]);
	            }
	        }

	        // Loop through global inputs and sanitize
	        foreach ($parameters['dynamic'] as $param) {

               	foreach ($global_input as $key => $value) {

                   	// Check if parameter part exists inside the key
                   	if (strpos($key, $param) !== false) {
                   		
                       $global_input[$key] = sanitize_text_field($value);
                   	}
               	}	
            }

   			return $global_input;
    	}

	    // Private function to return predefined list of parameters
		private /*static */function parameters_list() {

		    return array(
		        'static' => array(
		            'EO_WBC',
		            'BEGIN',
		            'STEP',
		            'FIRST',
		            'SECOND',
		            '_category',
		            'eo_wbc_filter',
		            'CAT_LINK',
		            'cat_filter_cat_link',
		            '_current_category',
		            'eo_wbc_view_auto_jewel',
		            'EO_WBC_REMOVE',
		            'empty_cart',
		            'wbc_report',
		            'CART',
		            'step',
		            'action',
		            'EO_WBC_CODE',
		            'products_in',
		            'wbc_attachment',
		            'wbc_color',
		            'wbc_attachment_thumb',
		            '_attribute',
		            '_wpnonce',
		            'page',
		            'type',
		            'msg',
		            'sub_action',
		            'eo_wbc_jpc_form_data',
		            'shop_cat_filter_add_order',
		            'shop_cat_filter_add_reset_link',
		            'slug',
		            'cart',
		            'pair_maker',
		            'guidance_tool',
		            'ring_builder',
		            'rapnet_api', 
		            'glowstar_api', 
		            'jbdiamond_api', 
		            'srk_api', 
		            'saved_tab_key',
		            'filter_template', 
		            'first_category_altr_filt_widgts',
		            'second_category_altr_filt_widgts',
		            'filter_category',
		            'range_first',
		            'eo_wbc_first_category',
		            'eo_wbc_first_category_range',
		            'first_filter_query_type',
		            'range_second',
		            'eo_wbc_second_category',
		            'eo_wbc_second_category_range',
		            'second_filter_query_type',
		            'eo_wbc_add_discount',
		            'is_sent_from_front_end',
		            'plugin',
		            'cat_filter_cat_link',          
		            'min_price',
		            'max_price',
		        ),
		        'dynamic' => array(
		            /*$get_field.*/'',
		            /*$filter_sets_val[\'filter_set_two_tabs_first\'].*/'',
		            /*$tab_data["first_tab_id"].*/'',
		            /*$fk.*/'',
		            /*$post_field.*/'',
		            /*$key.*/'',
		            /*$icon_keys[$i].*/'',
		            /*$prefix.*/'_fconfig_filter',
		            /*$prefix.*/'_fconfig_type',
		            /*$prefix.*/'_fconfig_label',
		            /*$prefix.*/'_fconfig_is_advanced',
		            /*$prefix.*/'_fconfig_dependent',
		            /*$prefix.*/'_fconfig_input_type',
		            /*$prefix.*/'_fconfig_column_width',
		            /*$prefix.*/'_fconfig_ordering',
		            /*$prefix.*/'_fconfig_icon_size',
		            /*$prefix.*/'_fconfig_icon_label_size',
		            /*$prefix.*/'_fconfig_add_reset_link',
		            /*$prefix.*/'_fconfig_add_help',
		            /*$prefix.*/'_fconfig_add_help_text',
		            /*$prefix.*/'_fconfig_add_enabled',
		            /*$prefix.*/'_fconfig_set',
		            /*$prefix.*/'_fconfig_elements',
		            /*$_first_tab_key.*/'',
		            /*$request_field.*/'',
		            /*$selected_key.*/'',
		            /*$__filter[\'id\'].*/''
		        )
		    );
		}
	}
}
