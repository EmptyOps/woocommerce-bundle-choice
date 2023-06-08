<?php
/*
*	A UI builder class to generate UI based on the array of params received.
*/
namespace sp\wbc\system\core;
use eo\wbc\model\interfaces\Builder;
use eo\wbc\model\utilities\Eowbc_Theme_Adaption_Check;

defined( 'ABSPATH' ) || exit;

class SP_Ui_Builder implements Builder {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function build($ui,$option_key='',$process_form = true,$ui_generator = null, $ui_definition = null){
		
		// nothig to do here so far 
	}

	protected function process_build($ui_key,$ui_ele,$ui,$option_key='',$process_form = true,$ui_generator = null, $ui_element_definition = null,$ui_definition = null) {
		
		// nothig to do here so far 
	}

	public function build_and_return($ui,$option_key='',$process_form = true,$ui_generator = null, $ui_definition = null){
		
		// nothig to do here so far 
	}
}
