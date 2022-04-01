<?php
/*
*	SP Data Layer class 
*/

namespace eo\wbc\system\core\data_model;

defined( 'ABSPATH' ) || exit;

class SP_Data_Layer {

	private static $_instance = null;

	public const COL_NAME_SEP = "__";

	public static function instance() {

		throw new Exception("Sorry, singleton instance method not supported for this class. Always use construct method to create object.", 1);
	}

	public function __construct() {
		//"Sorry, only construct method with platform_key etc parameters is supported, so pass platform_key etc parameters as parameters to construct method. Default construct method is not supported."
		throw new Exception("This is particularly a definition class, so creating instance would never be necessary but if it ever becomes necessary then construct will be supported to create object.", 1);
	}

	/**
	 *	Category structure definition
	 */
	public static function cat_structure_def(){
		return array(
			'mandatory'=> array(

			), 
			'optional'=> array(

			)
		);
	}

	/**
	 *	Product structure definition
	 */
	public static function prod_structure_def(){
		return array(
			'mandatory'=> array(

			), 
			'optional'=> array(

			)
		);
	}

	/**
	 *	Attribute structure definition
	 */
	public static function attr_structure_def(){
		return array(
			'mandatory'=> array(

			), 
			'optional'=> array(

			)
		);
	}

}
