<?php 
defined( 'ABSPATH' ) || exit;

class WBC_Common {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function pr(array $ar,$force_debug = false,$die = false) {
		//TODO yet to implement optional arg force_debug

		echo "<pre>"; print_r($ar); echo "</pre>";

		if( $die )
		{
			wp_die( 'die from the common helper pr function' );
		}

	}

	public function var_dump(array $ar,$force_debug = false,$die = false) {
		//TODO yet to implement optional arg force_debug

		var_dump($ar); 

		if( $die )
		{
			wp_die( 'die from the common helper var_dump function' );
		}

	}

}
