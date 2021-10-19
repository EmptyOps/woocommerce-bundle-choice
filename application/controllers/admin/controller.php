<?php

namespace eo\wbc\controllers\admin;

defined( 'ABSPATH' ) || exit;

class Controller extends \eo\wbc\controllers\Controller {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}
		return self::$_instance;
	}

	/*public function __construct() {
		
	}	*/

	protected function _get($name) {

	}

	protected function _set() {

	}

	protected function _call() {

	}

	public function get_form_defination($args = array()){
		// To do here.
	}

	/*public function get_admin_form($args = array()){
		$form_defination = $this->get_form_defination($args);
		if(!empty($form_defination['admin_form'])){
			return $form_defination['admin_form'];
		}
	}*/
	public function default_uis($type,$exceptance) {
		$defaults = array(
			'label'=>array('text','color','back_color','font_family','font_size'),
			'p'=>array('text','color','back_color','font_family','font_size'),
			'span'=>array('text','color','back_color','font_family','font_size'),
			'header'=>array('text','color','back_color','font_family','font_size'),
			'sub_header'=>array('text','color','back_color','font_family','font_size'),
			'checkbox'=>array('checkbox'),
			'image'=>array('height','width','image'),
			'img'=>array('height','width','image'),
			'button'=>array('text','color','back_color','font_family','font_size','radius'),
			'container'=>array('height','width','margin_left','margin_right'),
			'wc_attribute_field'=>array('attribute','checkbox','text'),
			'a'=>array('url','text')
		);

		$collection = array();

		if(!empty($defaults[$type])) {
			$collection = $defaults[$type];

			if(!empty($exceptance)) {
				foreach ($exceptance as $exc) {
					if( array_search($exc,$collection)!==false ) {
						unset($collection[array_search($exc,$collection)]);
					}
				}
			}			
		}
		return $collection;
	}

	public function generate_form($form,$key='appearence_controls') {
		if(empty($form) or !is_array($form)){
			return array();
		}
		
		wbc()->load->model('admin/form-elements');
		$controls = array();

		$admin_ui = \eo\wbc\model\admin\Form_Elements::instance();
		
		foreach ($form as $form_key => $form_value) {
			
			if(!empty($form_value[$key]) and ( empty($this->check_show_on_admin) xor (!empty($form_value[$key][2]) and !empty($form_value[$key][2]['show_on_admin']) ) ) ) {	

				$control_element = array();
				$excep_controls = array();
				

				if(!empty($form_value[$key][1]) and is_array($form_value[$key])) {
					$excep_controls = $form_value[$key][1];
				} elseif (!empty($form_value[$key][1])  and is_string($form_value[$key])) {
					$excep_controls = explode(',',$form_value[$key][1]);
				}

				/*echo "<pre>";
				print_r($form_value[$key][2]);
				echo "</pre>";
				die();*/

				if(!empty($form_value[$key][2]) and  !empty($form_value[$key][2]['type'])) {

					$control_element = $this->default_uis($form_value[$key][2]['type'],$excep_controls);
					if(empty($control_element)/* and $form_value['type'] === 'hidden'*/){

						$control_element = array($form_value[$key][2]['type']);
					}

				} elseif(!empty($form_value['type'])) {
					$control_element = $this->default_uis($form_value['type'],$excep_controls);
				} 

				if(!empty($control_element)){

					$controls[$form_key.'_form_segment'] = array(
						'label'=> $form_value[$key][0],
						'type'=>'devider',
					);

					foreach ($control_element as $control) {

						if(empty($form_value[$key][2])){
							$controls[$form_key.'_'.$control] = call_user_func_array(array($admin_ui,$control),array($form_key.'_'.$control,$form_value[$key][0]));
						} else {
							$control_key = $form_key.'_'.$control;
							if(!empty($form_value[$key][2]['id'])){
								$control_key = $form_value[$key][2]['id'].'_'.$control;
							}
							$controls[$control_key] = call_user_func_array(array($admin_ui,$control),array($control_key,$form_value[$key][0],$form_value[$key][2]));
							
						}
					}
				}
			}

			/*if(!empty($form_value['data_controls']) and !empty($form_value['data_controls']['type']) and $form_value['data_controls']['type'] === 'send_email_on_click'){
				
				$control_key = $form_key.'email_header_template_text';

				

				$controls['email_header_template_text'] = array(
					'label'=>'Email Header',
					'type'=>'text',
					'value'=>wbc()->options->get_option($form_value['data_controls']['tab_key'],'email_header_template_text'),
					'class'=>array('fluid','eight','wide',),						
					'sanitize'=>'sanitize_text_field',
					'id'=>'eorad_email_header',
					'tab_key'=>$form_value['data_controls']['tab_key']);

				$controls['email_body_template_textarea'] = array(
					'label'=>'Email Header',
					'type'=>'textarea',
					'value'=>wbc()->options->get_option($form_value['data_controls']['tab_key'],'email_body_template_textarea'),
					'class'=>array('fluid','eight','wide',),						
					'sanitize'=>'sanitize_text_field',
					'id'=>'eorad_email_header',
					'tab_key'=>$form_value['data_controls']['tab_key']);
			}*/

			if(!empty($form_value['child']) or (empty($form_value['type']) and !empty($form_value) and is_array($form_value)) ){

				$child_control = array();

				if(!empty($form_value['child'])) {
					if(empty($form_value['child']['type']) and count($form_value['child'])>1) {
						$child_control = $this->generate_form($form_value['child'],$key);
					} else{
						$child_control = $this->generate_form([$form_value['child']],$key);
					}
					
				} elseif(empty($form_value['type']) and !empty($form_value) and is_array($form_value)) {
					$child_control = $this->generate_form($form_value,$key);
				}

				if(!empty($child_control)){
					$controls = array_replace($controls,$child_control);
				}
			}
		}

		return $controls;
	}

		// return all appearance control data to be dumped in to json
	// format must include `form_control_key` as third array element and the id if necessary.
	
	public function generate_json_dump($form,$key='appearence_controls') {

		if(empty($form) or !is_array($form)){
			return array();
		}
		
		wbc()->load->model('admin/form-elements');
		$controls = array();

		$admin_ui = \eo\wbc\model\admin\Form_Elements::instance();
		
		foreach ($form as $form_key => $form_value) {

			if(!empty($form_value[$key]) and ( empty($this->check_show_on_admin) xor (!empty($form_value[$key][2]) and !empty($form_value[$key][2]['show_on_admin']) ) ) ) {	

				$control_element = array();
				$excep_controls = array();
				

				if(!empty($form_value[$key][1]) and is_array($form_value[$key])) {
					$excep_controls = $form_value[$key][1];
				} elseif (!empty($form_value[$key][1])  and is_string($form_value[$key])) {
					$excep_controls = explode(',',$form_value[$key][1]);
				}
			
				if(!empty($form_value[$key][2]) and  !empty($form_value[$key][2]['type'])) {

					$control_element = $this->default_uis($form_value[$key][2]['type'],$excep_controls);
					if(empty($control_element)/* and $form_value['type'] === 'hidden'*/){

						$control_element = array($form_value[$key][2]['type']);
					}

				} elseif(!empty($form_value['type'])) {
					$control_element = $this->default_uis($form_value['type'],$excep_controls);
				} 

				if(!empty($control_element)){

					/*$controls[$form_key.'_form_segment'] = array(
						'label'=> $form_value[$key][0],
						'type'=>'devider',
					);*/

					/*$form_control_key = '';
					if(!empty($form_value[$key][2]['form_control_key'])) {
						$form_control_key = $form_value[$key][2]['form_control_key'];
					}*/

					$form_control_key = '';
					if(!empty($form_value[$key][2]['control_key'])) {
						$form_control_key = $form_value[$key][2]['control_key'];
					}

					foreach ($control_element as $control) {

						if(empty($form_value[$key][2])){
							
							$controls[$form_key][$control] = wbc()->options->get_option($form_control_key,$form_key.'_'.$control);

							if($control==='image') {
								$controls[$form_key][$control] = wp_get_attachment_url( intval($controls[$form_key][$control]) );
							}
							
						} else {
							
							$control_key = $form_key.'_'.$control;
							if(!empty($form_value[$key][2]['id'])){
								$control_key = $form_value[$key][2]['id'].'_'.$control;
							}

							$controls[$form_key][$control] =  wbc()->options->get_option($form_control_key,$control_key);
							if($control==='image') {
								$controls[$form_key][$control] = wp_get_attachment_url( intval($controls[$form_key][$control]) );
							}
							
						}
					}
				}
			}

			if(!empty($form_value['child']) or (empty($form_value['type']) and !empty($form_value) and is_array($form_value)) ){

				$child_control = array();

				if(!empty($form_value['child'])) {
					if(empty($form_value['child']['type']) and count($form_value['child'])>1) {
						$child_control = $this->generate_form($form_value['child'],$key);
					} else{
						$child_control = $this->generate_form([$form_value['child']],$key);
					}
					
				} elseif(empty($form_value['type']) and !empty($form_value) and is_array($form_value)) {
					$child_control = $this->generate_form($form_value,$key);
				}

				if(!empty($child_control)){
					$controls = array_replace($controls,$child_control);
				}
			}
		}

		return $controls;
	}
	
	public function get_control_data($form,$key='') {
		if(empty($form) or !is_array($form) or empty($key)) {
			return array();
		}
		
		wbc()->load->model('admin/form-elements');
		$controls_data = array();

		$admin_ui = \eo\wbc\model\admin\Form_Elements::instance();
		
		foreach ($form as $form_key => $form_value) {
			
			if(!empty($form_value['data_controls']) and !empty($form_value['data_controls']['type'])) {	
				if( (is_string($form_value['data_controls']['type']) and $form_value['data_controls']['type']===$key) or (is_array($form_value['data_controls']['type']) and array_search($key,$form_value['data_controls']['type'])!==false) ) {

					$label = '';
					if(!empty($form_value['data_controls']['label'])){
						$label = $form_value['data_controls']['label'];
					} elseif(!empty($form_value['label'])){
						$label = $form_value['label'];
					}

					$control_id = $form_key;
					if(!empty($form_value['data_controls']['name'])) {
						$control_id = $form_value['data_controls']['name'];
					} elseif(!empty($form_value['data_controls']['id'])) {
						$control_id = $form_value['data_controls']['id'];
					} elseif(!empty($form_value['name'])){
						$control_id = $form_value['name'];
					} elseif(!empty($form_value['id'])){
						$control_id = $form_value['id'];
					}

					$controls_data[$control_id]=array('label'=>$label,'value'=>wbc()->sanitize->post($control_id));
				}
			}

			if(!empty($form_value['child']) or (empty($form_value['type']) and !empty($form_value) and is_array($form_value)) ){

				$child_controls_data = array();

				if(!empty($form_value['child'])) {
					if(empty($form_value['child']['type']) and count($form_value['child'])>1) {
						$child_controls_data = $this->get_control_data($form_value['child'],$key);
					} else{
						$child_controls_data = $this->get_control_data([$form_value['child']],$key);
					}
					
				} elseif(empty($form_value['type']) and !empty($form_value) and is_array($form_value)) {
					$child_controls_data = $this->get_control_data($form_value,$key);
				}

				if(!empty($child_controls_data)){
					$controls_data = array_replace($controls_data,$child_controls_data);
				}
			}
		}

		return $controls_data;
	}
}
