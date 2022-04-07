<?php 

defined( 'ABSPATH' ) || exit;

function eowbc_lang($string) {
	return __($string,'woocommerce-bundle-choice');
}

//TODO when a dedicated language helper is created for extensions then move below function in that file 
function spext_lang($string, $extension_slug) {
	return __($string,$extension_slug);
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
