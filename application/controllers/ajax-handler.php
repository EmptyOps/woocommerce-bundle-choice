<?php 

namespace eo\wbc\controllers;

defined( 'ABSPATH' ) || exit;

class Ajax_Handler {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		// no implementation
	}

	public static function process(){

		do_action( 'before_process_ajax_request', array($this,'preprocess_request') );

		if(is_admin()){

			do_action( 'before_process_admin_ajax_request', array($this,'preprocess_admin_request') );			
			// Process as admin request.
			// call up request method here.
			do_action( 'after_process_admin_ajax_request', array($this,'postprocess_admin_request') );
		} else {
			do_action( 'before_process_public_ajax_request', array($this,'preprocess_public_request') );			
			// Process as public request.
			// call up request method here
			do_action( 'after_process_public_ajax_request', array($this,'postprocess_public_request') );			
		}

		do_action( 'after_process_ajax_request', array($this,'postprocess_request') );
	}

	public function preprocess_request(){
		//	implementations
	}

	public function postprocess_request(){
		//	implementations
	}

	public function preprocess_admin_request(){
		//	implementations
	}

	public function postprocess_admin_request(){
		//	implementations
	}

	public function preprocess_public_request(){
		//	implementations
	}

	public function postprocess_public_request(){
		//	implementations
	}
}
