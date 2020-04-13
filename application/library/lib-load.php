<?php

if(!class_exists('WBC_Loader')) {

	class WBC_Loader {

		private static $_instance;

		public static function instance() {
			if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;
			}

			return self::$_instance;
		}

		private function __construct() { 

			//	no implemetations 
		}

		public function template( $template_path, $data=array() ) {
			//	load template file under /view directory
			if(defined('EOWBC_TEMPLATE_DIR')) {
				if(file_exists( constant('EOWBC_TEMPLATE_DIR').$template_path.".php" )) {
					
					if(!empty($data) and is_array($data)){
						extract($data);
					}

					require trailingslashit(constant('EOWBC_TEMPLATE_DIR')).$template_path.".php";
				}
			}			
		}

		public function library( $library_path ) {
			//	load library file under /library directory
		}

		public function helper( $helper_path ) {
			//	load helper file under /helper directory
		}

		public function model( $model_path ) {
			//	load model file under /model directory
			defined('EOWBC_MODEL_DIR') || define('EOWBC_MODEL_DIR', constant('EOWBC_DIRECTORY').'application/model/');
			if(file_exists(constant('EOWBC_MODEL_DIR').$model_path.".php")) {

				require_once trailingslashit(constant('EOWBC_MODEL_DIR')).$model_path.'.php';				
			}
		}
	}
}