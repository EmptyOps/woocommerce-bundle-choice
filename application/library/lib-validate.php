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
				);
			}
			return self::$_instance;
		}

		private function __construct() {
			
		}

		public function check($form){
			$res["type"] = "error";
		    $res["msg"] = "";

			foreach ($form as $key => $tab) {
		    	foreach ($tab["form"] as $fk => $fv) {		    
				    if(!empty($fv['validate']) and array_key_exists($fk,$_POST)) {
				    	if(is_string($fv['validate']) and in_array($fv['validate'],$this->methods)) {

				    		$validation_state=call_user_func_array(array($this,$fv['validate']),array($fv['label'],$_POST[$fk]));
				    		if($validation_state!==true) {
				    			$res["msg"] = $validation_state;
				    			echo json_encode($res);
				    			die();
				    		}
				    	} elseif(is_array($fv['validate'])) {
				    		foreach ($fv['validate'] as $sanitize_method=>$sanitize_params) {
				    			if(in_array($sanitize_method,$this->methods)) {
				    				$validation_state = call_user_func_array(array($this,$sanitize_method),array($fv['label'],$_POST[$fk],$sanitize_params));
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
			return (!empty($value)?true:"`${label}` field is required!");
		}

		public function postfix($label,$value,$param){
			if(!empty($param)){

				foreach ($param as $post_fix) {
					if((substr($value,-(strlen($post_fix)))==$post_fix)){
						return true;
					}
				}
				return "`${label}` has invalid formate!";
			}
			return true;
		}
	}
}
