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

	public function back_color($key,$label,$args=array()) {
		extract($args);

		if(empty($info)){
			$info = array( 'label'=>eowbc_lang("Sets Backgroound Color on ${label}"),
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
		$args['label'] = "${label} Backgroound Color";

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

	public function select($key,$label,$args=array()) {
		extract($args);
		if(empty($required)) {
			$required = false;
		}

		if(empty($info)){
			$info = array( 'label'=>eowbc_lang("Sets specified item for ${label}"),
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
			$label = "Choose ${label}";
		}

		if(empty($options)){
			$options = array();
		}

		if(empty($id)){
			$id = $key;
		}

		return array(
			'id' => $id,
			'label'=>$label,
			'type'=>'select',
			'sanitize'=>'sanitize_text_field',
			'validate'=>$validate,
			'size_class'=>array('eight','wide'),
			'options'=>$options,
			'inline'=>false,			
			'visible_info'=>$info
		);
	}

	public function attribute($key,$label,$args=array()) {
		
		extract($args);
		if(empty($required)) {
			$required = false;
		}

		if(empty($info)){
			$info = array( 'label'=>eowbc_lang("Sets specified attribute for ${label}"),
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
			$label = "Choose ${label} Attribute";
		}

		if(empty($options)){
			$options = \eo\wbc\model\Category_Attribute::instance()->get_attributs();
		}

		if(empty($id)){
			$id = $key;
		}

		if(!empty($multiple)){
			if(!empty($class)){
				if(is_array($class)){
					$class[] = 'multiple';
				} else {
					$class.= ' multiple ';
				}
			} else {
				$class = array('multiple');
			}
		}

		if(empty($class)){
			$class = array();
		}

		return array(
			'id' => $id,
			'class'=>$class,
			'label'=>$label,
			'type'=>'select',
			'sanitize'=>'sanitize_text_field',
			'validate'=>$validate,
			'size_class'=>array('eight','wide'),
			'options'=>$options,
			'inline'=>false,			
			'visible_info'=>$info
		);

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

	public function url($key,$label,$args=array()) {
		
		extract($args);
		if(empty($required)) {
			$required = false;
		}

		if(empty($default)) {
			$default = '';
		}

		if(empty($info)){
			$info = array( 'label'=>eowbc_lang("Sets URL on ${label}"),
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
			$label = "${label} URL";
		}

		return array(
			'label'=>$label,
			'type'=>'link',
			'sanitize'=>'sanitize_text_field',
			'validate'=>$validate,
			'size_class'=>array('eight','wide'),
			'inline'=>false,
			'value'=>$default,
			'visible_info'=>$info
		);
	}

	public function number($key,$label,$args=array()) {
		
		extract($args);
		if(empty($required)) {
			$required = false;
		}

		if(empty($default)) {
			$default = '';
		}

		if(empty($info)){
			$info = array( 'label'=>eowbc_lang("Sets specified value on ${label}"),
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
			$label = "${label} Value";
		}

		return array(
			'label'=>$label,
			'type'=>'number',
			'sanitize'=>'sanitize_text_field',
			'validate'=>$validate,
			'size_class'=>array('eight','wide'),
			'inline'=>false,
			'value'=>$default,
			'visible_info'=>$info
		);
	}

	public function textarea($key,$label,$args=array()) {
		
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
			'type'=>'textarea',
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

	public function height($key,$label,$args=array()) {
		extract($args);

		if(empty($info)){
			$info = array( 'label'=>eowbc_lang("Sets specified height on ${label}"),
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
		$args['label'] = "${label} Height";

		return $this->text($key,$label,$args);
	}

	public function width($key,$label,$args=array()) {
		extract($args);

		if(empty($info)){
			$info = array( 'label'=>eowbc_lang("Sets specified width on ${label}"),
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
		$args['label'] = "${label} Width";

		return $this->text($key,$label,$args);
	}

	public function margin_left($key,$label,$args=array()) {
		extract($args);

		if(empty($info)){
			$info = array( 'label'=>eowbc_lang("Sets specified left margin on ${label}"),
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
		$args['label'] = "${label} Left Margin";

		return $this->text($key,$label,$args);
	}

	public function margin_right($key,$label,$args=array()) {
		extract($args);

		if(empty($info)){
			$info = array( 'label'=>eowbc_lang("Sets specified right margin on ${label}"),
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
		$args['label'] = "${label} Right Margin";

		return $this->text($key,$label,$args);
	}

	public function checkbox($key,$label,$args=array()){
		extract($args);

		if(empty($info)){
			$info = array( 'label'=>eowbc_lang("Toggle status of {$label}"),
				'type'=>'visible_info',
				'class'=>array('small'),				
			);
		} else {
			$info = array( 'label'=>$info,
				'type'=>'visible_info',
				'class'=>array('small'),				
			);
		}

		if(!empty($args['label'])){
			$label = $args['label'];
		} else {
			$label = "${label}";
		}

		if(empty($options)){
			$options = array();
		}

		if(empty($inline)){
			$inline = false;
		}

		if(empty($grouped)){
			$grouped = false;
		}

		if(empty($value)) {
			$value = array();
		}

		return array(
			'label'=>$label,
			'type'=>'checkbox',
			'sanitize'=>'sanitize_text_field',
			'size_class'=>array('eight','wide'),
			'value'=>$value,
			'options'=>$options,
			'inline'=>$inline,
			'grouped'=>$grouped,
			'visible_info'=>$info
		);
	}

	public function image($key,$label,$args=array()) {

		extract($args);
		
		if(!empty($args['label'])){
			$label = $args['label'];
		} else {
			$label = "${label} Image";
		}

		return array(
			'label'=>$label,
			'type'=>'icon',
			'value'=>'',			
			'sanitize'=>'sanitize_text_field',
			'class'=>array(),
			'size_class'=>array('eight','wide'),
			'inline'=>false,
		);
	}
}
