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

	public function consistsOfTheSameValues(array $a, array $b) {
	    // check size of both arrays
	    if (count($a) !== count($b)) {
	        return false;
	    }

	    foreach ($b as $key => $bValue) {

	        // check that expected value exists in the array
	        if (!in_array($bValue, $a, true)) {
	            return false;
	        }

	        // check that expected value occurs the same amount of times in both arrays
	        if (count(array_keys($a, $bValue, true)) !== count(array_keys($b, $bValue, true))) {
	            return false;
	        }

	    }

	    return true;
	}

}
