<?php


/*
*	A table builder class to generate table based on the array of params recived.
*/

namespace eo\wbc\model\admin;
use eo\wbc\model\interfaces\Builder;

defined( 'ABSPATH' ) || exit;

class Table_Builder implements Builder {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function build(array $table){

		if(!empty($table) and is_array($table)){

			wbc()->load->template('component/table/table',
				array(
					'id'=>$table['id'],
					'head'=>$table['head'],
					'body'=>$table['body'],
					'class'=>isset($table['class'])?$this->process_property($table['class']):'',
					'attr'=>isset($table['attr'])?$this->process_property($table['attr']):''
				)
			);
		}
	}

	public function process_property(array $property) {
		
		if(!empty($property) and is_array($property)) {
			
			return sanitize_text_field(implode(' ', $property));

		} else {

			return '';
		}
	}
}
