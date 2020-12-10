<?php


/*
*	Model to return the unit for the admin form ui.
*/

namespace eo\wbc\model\admin;

defined( 'ABSPATH' ) || exit;

class Form_Elements {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function color() {

	}	

	public function select() {

	}

	public function radius() {

	}

	public function text($key,$label,$args) {
		
		extract($args);
		if(empty($required)) {
			$required = false;
		}

		if(empty($default)) {
			$default = '';
		}

		if(empty($info)){
			$info = array( 'label'=>eowbc_lang("Sets specified text on ${label}"),
				'type'=>'visible_info',
				'class'=>array('small'),				
			);
		} else {
			$info = array( 'label'=>$info,
				'type'=>'visible_info',
				'class'=>array('small'),				
			);
		}

		if(empty($validate)){
			if($required){
				$validate = array('required'=>'');
			}
		} else {
			if($required and  array_key_exists('required',$validate)) {
				$validate['required'] = '';
			}
		}

		array(
			'label'=>"${label} Text",
			'type'=>'text',
			'sanitize'=>'sanitize_text_field',
			'validate'=>$validate,
			'size_class'=>array('eight','wide'),
			'inline'=>false,
			'value'=>$default,
			'visible_info'=>$info
		);
	}

	public function font_family($key) {		
		return $this->label($key);
	}

	public function font_size($key) {
		return $this->label($key);
	}
}
