<?php
defined( 'ABSPATH' ) || exit;

class WBC_Currency {
	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function to_price($amount, $rounding = array('decimals'=>2)){
		// return \wc_price($amount, $rounding['decimals' => 2]);
		return \wc_price($amount, $rounding);
	}

	public function formatted_price( $price, $rounding){
		return number_format( round( $price, 0 ) - 0.01, $rounding );	
	}
}

function wbc_to_price($amount, $rounding = array('decimals'=>2)){

	return wbc()->currency->to_price($amount, $rounding);

}

function wbc_formatted_price($price, $rounding){

	return wbc()->currency->formatted_price($price, $rounding);

}