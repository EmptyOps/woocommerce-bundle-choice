<?php 

defined( 'ABSPATH' ) || exit;

function eowbc_lang($string, $plugin_slug = null) {
	// NOTE: plugin_slug parameter is for formatly of passing second parameter for po edit etc tool compeblity from where the get text call are nede.
	return __($string,'woo-bundle-choice');
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
