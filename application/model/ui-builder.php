<?php
namespace eo\wbc\model;
/*
*	A UI builder class to generate UI based on the array of params recived.
*/
use eo\wbc\model\interfaces\Builder;

defined( 'ABSPATH' ) || exit;

class UI_Builder implements Builder {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function build(array $ui){

		if(!empty($ui) and is_array($ui)){

			foreach ($ui as $ui_key => $ui_ele) {
				if(!empty($ui_ele['type'])) {

					if(empty($ui_ele['id']) and is_string($ui_key)) {
						$ui_ele['id'] = $ui_key;
					}

					if(empty($ui_ele['name']) and is_string($ui_key)) {
						$ui_ele['name'] = $ui_key;
					}
					// passing self contained object so the template can use the child parameter in the $ui_ele to created a nested complax UI.
					$ui_ele['builder'] = $this;					
					wbc()->load->template('core/ui/components/'.$ui_ele['type'],$ui_ele);
				}
			}

		}
	}
}
