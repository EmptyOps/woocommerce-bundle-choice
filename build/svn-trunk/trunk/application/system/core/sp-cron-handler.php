<?php
/*
*	SP Cron Handler class 
*/

namespace eo\wbc\system\core;

defined( 'ABSPATH' ) || exit;

class SP_Cron_Handler {

	private static $_instance = null;

	public static function instance() {

		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct( ) {

	}


	public static function should_init(){

		//do action if cron is detected
		if( ( !empty(wbc()->sanitize->get('sp_crjob')) or !empty(wbc()->sanitize->get('dapii_job')) ) and !empty(wbc()->sanitize->get('key'))){
			return true;
		}

		return false;
	}

	public function init(){

		if( wbc()->sanitize->get('is_test') == 1 ) {

			wbc_pr("SP_Cron_Handler init2");	 
		}

		$is_debug_cron = false;	//	TODO	make it dynamic from admin, however, showing this much complexity to our entire free plugin community is not a good idea so may be we should keep it on most advanced settings tab or that server based settings tab that we planned for the entire product line of free plugins and premium extensions 
		if( $is_debug_cron ){ \EOWBC_Error_Handler::log('Call recived: '.gmdate('H:i')); }

		if( $is_debug_cron ){ \EOWBC_Error_Handler::log('URL '.(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); }

		$secret_key = wbc()->sanitize->get('key');
		$expected_key = "";	//TODO make this commented statement dynamic when above is_debug_cron flag var is made dynamic 	//wbc()->options->get_option('','cron_key', wp_create_nonce(site_url()) );	
		if( empty($expected_key) ) {
			//	backward compatibility
			$expected_key = wbc()->options->get_option('dapii_cron_config','cron_key', wp_create_nonce(site_url()) );	
		}

		if($secret_key===$expected_key){
			if( $is_debug_cron ){ \EOWBC_Error_Handler::log('Cron secret matched'); }

			add_filter('sp_cron_handler__is_run_job', function() {

				return true;
			});

		}
		else {
			if( $is_debug_cron ){ \EOWBC_Error_Handler::log('Cron secret not matched, Got:'.$secret_key." | Expected:".$expected_key); }

		}

	}

}
