<?php

if(!class_exists('WBC_Validate')) {

	class WBC_Validate {

		private static $_instance = null;

		public static function instance() {
			if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;				
				self::$_instance->methods = array(
					'required',
					'postfix',
					'validate_if',
					'url'									
				);
			}
			return self::$_instance;
		}

		private function __construct() {
			
		}

		public function check($form, $tab_specific_skip_fileds=array()){
			$res["type"] = "error";
		    $res["msg"] = "";

		    $saved_tab_key = !empty(wbc()->sanitize->post("saved_tab_key")) ? wbc()->sanitize->post("saved_tab_key") : ""; 
			$skip_fileds = array('saved_tab_key');

			foreach ($form as $key => $tab) {
				if( !empty($saved_tab_key) && $key != $saved_tab_key ) {
		    		continue;
		    	}

		    	foreach ($tab["form"] as $fk => $fv) {		    
				    
		    		if( !empty($fv['validate']) and ( isset($_POST[$fk]) || $fv["type"]=='checkbox'  ) ) {

				    	//skip fields where applicable
						if( in_array($fk, $skip_fileds) ) {
			    			continue;
			    		}

			    		if( in_array($fk, $tab_specific_skip_fileds) ) {
			    			continue;
			    		}

				    	if(is_string($fv['validate']) and in_array($fv['validate'],$this->methods)) {

				    		$validation_state = call_user_func_array( array( $this,$fv['validate']),array($fv['label'], isset($_POST[$fk]) ? wbc()->sanitize->post($fk) : '' ) );
				    		if($validation_state!==true) {
				    			$res["msg"] = $validation_state;
				    			echo json_encode($res);
				    			die();
				    		}
				    	} elseif(is_array($fv['validate'])) {
				    		foreach ($fv['validate'] as $sanitize_method=>$sanitize_params) {
				    			if(in_array($sanitize_method,$this->methods)) {
				    				$validation_state = call_user_func_array( array( $this,$sanitize_method),array($fv['label'], isset($_POST[$fk]) ? wbc()->sanitize->post($fk) : '',$sanitize_params));
				    				if($validation_state!==true) {
						    			$res["msg"] = $validation_state;
						    			echo json_encode($res);
						    			die();
						    		}
				    			}				    			
				    		}
				    	}
				    }
				}
		    }
		}

		public function required($label,$value,$param){
			// return (!empty($value)?true:"`${label}` field is required!");
			return (!( $value!==0 && $value!=="0" && empty($value) )?true:"`${label}` field is required!");
		}

		public function validate_if($label,$value,$param){						
			foreach ($param as $key => $validations) {				
				if (isset($_POST[$key]) and is_array($validations)) {
					foreach ($validations as $sanitize_method=>$sanitize_params) 
					{
		    			if(in_array($sanitize_method,$this->methods)) {
		    				$validation_state = call_user_func_array( array( $this,$sanitize_method),array($label,$value,$sanitize_params));
		    				var_dump($value);
		    				if($validation_state!==true) {
				    			$res["msg"] = $validation_state;
				    			echo json_encode($res);
				    			die();
				    		}
		    			}				    			
		    		}
		    		return true;
				} else {
					return true;
				}
			}			
		}

		public function postfix($label,$value,$param){
			if(!empty($param)){

				foreach ($param as $post_fix) {
					if((substr($value,-(strlen($post_fix)))==$post_fix) and strlen($post_fix)<strlen($value)){
						return true;
					}
				}
				return "`${label}` has invalid formate!";
			}
			return true;
		}

		public function url($label, $value, $param) {
			return (empty($value) xor filter_var($value, FILTER_VALIDATE_URL)) ? true : "`${label} field does not have valid URL.`";
		}
	}
}
