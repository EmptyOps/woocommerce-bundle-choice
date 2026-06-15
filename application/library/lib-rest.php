<?php

defined( 'ABSPATH' ) || exit;

if(!class_exists('SP_WBC_REST')) {

	class SP_WBC_REST {

		private static $_instance = null;

		public static function instance() {
			if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;				
				
			}
			return self::$_instance;
		}

		private function __construct() {
			
		}

		public function response($res, $response_http_code=200){
			echo wp_json_encode($res);
		}

	}

}
