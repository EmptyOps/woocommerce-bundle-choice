<?php

namespace eo\wbc\controllers;

defined( 'ABSPATH' ) || exit;

class Controller {

	/*protected static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}
		return self::$_instance;
	}*/

	protected function __construct() {
		
	}	

	protected function _get($name) {

	}

	protected function _set() {

	}

	protected function _call() {

	}

	public function get_form_defination($args = array()){
		// To do here.
	}

	public function get_admin_form($args = array()){
		$form_defination = $this->get_form_defination($args);
		if(!empty($form_defination['admin_form'])){
			return $form_defination['admin_form'];
		}
	}

	public function generate_appearece($form){
		if(empty($form) or !is_array($form)){
			return array();
		}

		wbc()->load->model('admin/form-elements');
		$admin_controls = array();

		$admin_ui = \eo\wbc\model\admin\Form_Elements::instance();
		
		foreach ($form as $form_key => $form_value) {
			
			if(!empty($form_value['admin_controls'])) {
				$controls = array();
				
				if(!empty($form_value['admin_controls'][1]) and is_array($form_value['admin_controls'])) {
					$controls = $form_value['admin_controls'][1];
				} elseif (!empty($form_value['admin_controls'][1])  and is_string($form_value['admin_controls'])) {
					$controls = explode(',',$form_value['admin_controls'][1]);
				}

				if(!empty($controls)){
					foreach ($controls as $control) {

						$admin_controls[$form_key.'_'.$control] = 

						call_user_func_array(array($admin_ui,$control),array($form_key.'_'.$control,$form_value['admin_controls'][0]));
					}
				}
			}

			if(!empty($form_value['child']) or (empty($form_value['type']) and !empty($form_value) and is_array($form_value)) ){

				$child_control = array();

				if(!empty($form_value['child'])){

					$child_control = $this->generate_appearece($form_value['child']);
				} elseif(empty($form_value['type']) and !empty($form_value) and is_array($form_value)) {
					$child_control = $this->generate_appearece($form_value);
				}

				if(!empty($child_control)){
					$admin_controls = array_replace($admin_controls,$child_control);
				}
			}
		}

		return $admin_controls;
	}
}
