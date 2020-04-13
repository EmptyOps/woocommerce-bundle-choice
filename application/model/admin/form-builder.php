<?php


/*
*	A form builder class to generate form based on the array of params recived.
*/

namespace eo\wbc\model\admin;
use eo\wbc\model\interfaces\Builder;

defined( 'ABSPATH' ) || exit;

class Form_Builder implements Builder {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function build(array $form){

		if(!empty($form) and is_array($form) and !empty($form['id']) and !empty($form['title'])){
			
			$form_html = '';

			if(!empty($form['data']) and is_array($form['data'])) {

				foreach ($form['data'] as $id => $form_element) {

					if(!empty($form_element['type'])) {

						if(isset($form_element['class'])){
							$form_element['class'] = $this->process_property($form_element['class']);
						} else {
							$form_element['class'] ='';
						}

						if(isset($form_element['attr'])){
							$form_element['attr'] = $this->process_property($form_element['attr']);
						} else {
							$form_element['attr'] ='';
						}

						if(isset($form_element['size_class'])){
							$form_element['size_class'] = $this->process_property($form_element['size_class']);
						} else {
							$form_element['size_class'] ='';
						}

						$form_element['id'] = str_replace(' ','_', $id);

						ob_start();
						?><div class="fields"><?php
						wbc()->load->template('component/form/input_'.$form_element['type'],$form_element);
						?></div><?php
						$form_html.=ob_get_clean();
					}
				}
			}

			wbc()->load->template('component/form/form',
				array(
					'form_html'=>$form_html,
					'id'=>str_replace(' ','_',$form['id']),
					'title'=>isset($form['title'])?$form['title']:'',
					'method'=>isset($form['method'])?$form['method']:'GET',
					'class'=>isset($form['class'])?$this->process_property($form['class']):'',
					'attr'=>isset($form['attr'])?$this->process_property($form['attr']):''
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
