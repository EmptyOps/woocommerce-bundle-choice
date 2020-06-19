<?php 

defined( 'ABSPATH' ) || exit;

function eowbc_lang($string) {
	return __($string,'woocommerce-bundle-choice');
}
	
class WBC_language {
	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __($string) {
		return __($string,'woocommerce-bundle-choice');
	}
}
