<?php

if(!class_exists('WBC_REST')) {

	class WBC_REST {

		private static $_instance = null;

		public static function instance() {
			if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;				
				
			}
			return self::$_instance;
		}

		private function __construct() {
			
		}

		public function response($res, $response_http_code=200, $is_exit = false){

			echo json_encode($res);
			
			if ($is_exit) {

				exit();
			} 
		}

	}

}
