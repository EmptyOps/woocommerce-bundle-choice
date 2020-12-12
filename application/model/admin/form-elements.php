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

	
	public function border_color($key,$label,$args=array()) {
		extract($args);

		if(empty($info)){
			$info = array( 'label'=>eowbc_lang("Sets specified Border Color on ${label}"),
				'type'=>'visible_info',
				'class'=>array('small'),				
			);
		} else {
			$info = array( 'label'=>$info,
				'type'=>'visible_info',
				'class'=>array('small'),				
			);
		}

		$args['info'] = $info;
		$args['label'] = "${label} Border Color";

		return $this->color($key,$label,$args);
	}

	public function hover_color($key,$label,$args=array()) {
		extract($args);

		if(empty($info)){
			$info = array( 'label'=>eowbc_lang("Sets specified On Hover Color on ${label}"),
				'type'=>'visible_info',
				'class'=>array('small'),				
			);
		} else {
			$info = array( 'label'=>$info,
				'type'=>'visible_info',
				'class'=>array('small'),				
			);
		}

		$args['info'] = $info;
		$args['label'] = "${label} On Hover Color";

		return $this->color($key,$label,$args);
	}

	public function color($key,$label,$args=array()) {
		extract($args);
		if(empty($required)) {
			$required = false;
		}

		if(empty($default)) {
			$default = '';
		}

		if(empty($info)){
			$info = array( 'label'=>eowbc_lang("Sets specified Color on ${label}"),
				'type'=>'visible_info',
				'class'=>array('small'),				
			);
		}

		if(empty($validate)){
			if($required){
				$validate = array('required'=>'');
			} else {
				$validate = array();
			}
		} else {
			if($required and  array_key_exists('required',$validate)) {
				$validate['required'] = '';
			} else {
				$validate = array();
			}
		}

		if(!empty($args['label'])){
			$label = $args['label'];
		} else {
			$label = "${label} Color";
		}

		return array(
			'label'=>$label,
			'type'=>'color',
			'sanitize'=>'sanitize_hex_color',
			'validate'=>$validate,
			'size_class'=>array('eight','wide'),
			'inline'=>false,
			'value'=>$default,
			'visible_info'=>$info
		);
	}	

	public function select() {

	}

	

	public function text($key,$label,$args=array()) {
		
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
		}

		if(empty($validate)){
			if($required){
				$validate = array('required'=>'');
			} else {
				$validate = array();
			}
		} else {
			if($required and  array_key_exists('required',$validate)) {
				$validate['required'] = '';
			} else {
				$validate = array();
			}
		}

		if(!empty($args['label'])){
			$label = $args['label'];
		} else {
			$label = "${label} Text";
		}

		return array(
			'label'=>$label,
			'type'=>'text',
			'sanitize'=>'sanitize_text_field',
			'validate'=>$validate,
			'size_class'=>array('eight','wide'),
			'inline'=>false,
			'value'=>$default,
			'visible_info'=>$info
		);
	}

	public function font($key,$label,$args=array()){
		return $this->font_family($key,$label,$args);
	}
	public function font_family($key,$label,$args=array()) {

		extract($args);

		if(empty($info)){
			$info = array( 'label'=>eowbc_lang("Sets specified font-family on ${label}"),
				'type'=>'visible_info',
				'class'=>array('small'),				
			);
		} else {
			$info = array( 'label'=>$info,
				'type'=>'visible_info',
				'class'=>array('small'),				
			);
		}

		$args['info'] = $info;
		$args['label'] = "${label} Font Family";

		return $this->text($key,$label,$args);
	}

	public function font_size($key,$label,$args=array()) {

		extract($args);

		if(empty($info)){
			$info = array( 'label'=>eowbc_lang("Sets specified font-size on ${label}"),
				'type'=>'visible_info',
				'class'=>array('small'),				
			);
		} else {
			$info = array( 'label'=>$info,
				'type'=>'visible_info',
				'class'=>array('small'),				
			);
		}

		$args['info'] = $info;
		$args['label'] = "${label} Font Size";
		return $this->text($key,$label,$args);
	}

	public function radius($key,$label,$args=array()) {
		extract($args);

		if(empty($info)){
			$info = array( 'label'=>eowbc_lang("Sets specified border radius on ${label}"),
				'type'=>'visible_info',
				'class'=>array('small'),				
			);
		} else {
			$info = array( 'label'=>$info,
				'type'=>'visible_info',
				'class'=>array('small'),				
			);
		}

		$args['info'] = $info;
		$args['label'] = "${label} Border Radius";

		return $this->text($key,$label,$args);
	}
}
