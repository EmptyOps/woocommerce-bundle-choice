<?php
/**
 *	Extensions deactivate class 
 *  This class handles and take care of common logic for extensions deactivate process 
 *  TODO publish actions in this class and process appliable logic from extension child class of this class, whenever necessary. 
 */

namespace eo\wbc\system\bootstrap;
use eo\wbc\system\bootstrap\Extensions_Setup_Wizard;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Extensions_Deactivate' ) ) {

	class Extensions_Deactivate extends Deactivate {

		private static $_instance = null;

		private $SP_Extension = null;

		public static function instance() {

			throw new Exception("Sorry, singleton instance method not supported for this class. Always use construct method to create object.", 1);
			
			if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;
			}

			return self::$_instance;
		}

		private function __construct() {			
			throw new Exception("Sorry, only construct method with SP_Extension class object are supported, so pass SP_Extension object as parameter to construct method. Default construct method is not supported.", 1);
		}

		private function __construct( SP_Extension $SP_Extension ) {			
			$this->SP_Extension = $SP_Extension;
		}

		public function run() {
			
		}
	}
	
}