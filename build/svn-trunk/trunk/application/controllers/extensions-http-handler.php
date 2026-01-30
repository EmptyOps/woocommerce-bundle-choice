<?php 
/**
 *	Extensions http-handler class 
 *  This class handles and take care of common logic for extensions http-handler process 
 *  TODO publish actions in this class and process appliable logic from extension child class of this class, whenever necessary. 
 */

namespace eo\wbc\controllers;

use eo\wbc\model\SP_Extension;

use eo\wbc\controllers\admin\menu\Admin_Menu_Factory;
use eo\wbc\controllers\admin\Extensions_Admin;
use eo\wbc\controllers\Public_Handler;

defined( 'ABSPATH' ) || exit;

class Extensions_Http_Handler {

	private static $_instance = null;

	private $SP_Extension = null;

	public static function instance() {

		throw new Exception("Sorry, singleton instance method not supported for this class. Always use construct method to create object.", 1);
		
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct( SP_Extension $SP_Extension ) {

		if( empty($SP_Extension) ) {
			throw new Exception("Sorry, only construct method with SP_Extension class object are supported, so pass SP_Extension object as parameter to construct method. Default construct method is not supported.", 1);
		}

		$this->SP_Extension = $SP_Extension;
	}

	public static function process__( Extensions_Http_Handler $Extensions_Http_Handler){

		do_action( 'spext_before_process_request', array($Extensions_Http_Handler,'preprocess_request') );		
		
		if(is_admin()){

			do_action( 'spext_before_process_admin_request', $Extensions_Http_Handler->SP_Extension->extension_slug() );	
			// Process as admin request.								
			$Extensions_Admin = new Extensions_Admin( $Extensions_Http_Handler->SP_Extension );
			Extensions_Admin::process__($Extensions_Admin);
			// call up request method here.
			do_action( 'spext_after_process_admin_request', $Extensions_Http_Handler->SP_Extension->extension_slug() );
		} else {
			do_action( 'spext_before_process_public_request', $Extensions_Http_Handler->SP_Extension->extension_slug() );			

			// TODO implement public handler for extensions 
			// // Process as public request.			
			// Public_Handler::process();

			// call up request method here
			do_action( 'spext_after_process_public_request', $Extensions_Http_Handler->SP_Extension->extension_slug() );			
		}

		do_action( 'spext_after_process_request', array($Extensions_Http_Handler,'postprocess_request') );
	}

}
