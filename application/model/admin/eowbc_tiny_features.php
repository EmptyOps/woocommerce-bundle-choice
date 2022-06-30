<?php

/*
*	Woocommerc Category and Attribute Model.
*/

namespace eo\wbc\model\admin;

defined( 'ABSPATH' ) || exit;

wbc()->load->model('admin/eowbc_model');

class Tiny_Features extends Eowbc_Model {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function render_ui($form_definition, $args = null) {

		$form = array();

		$form['id']='dapii_apis';
		$form['title']='<h2>APIs & Configuration</h2>';
		$form['method']='POST';
		$form['tabs'] = true;
		$form['is_legacy_admin'] = isset($args['is_legacy_admin']) ? $args['is_legacy_admin'] : false;
		$form['no_form_tag'] = !empty($args['is_legacy_admin']) ? true : false;
		$form['attr']= array('data-is_per_tab_save="true"');


		if( !empty($args['is_legacy_admin']) ) {

			//	in case of legacy admin bind to hooks if applicable otherwise can simply call render ui sub process function 
			if( $args['page_section'] == 'sp_variations' ) {
				
				$form['data'] = self::instance()->get( $form_definition, $args );

				$this->render_ui_sub_process($form, $args);

			}

		} else {

			$form['data'] = self::instance()->get( $form_definition, $args );

			$this->render_ui_sub_process($form, $args);
		}		

		parent::load_asset($args);	
	}

	public function render_ui_sub_process($form, $args = null) {

		parent::render_ui_sub_process($form, $args);
		
		//	if there is any module specific js or css then it should be loaded view file or asset.php file -- both have their pros and cons. but I think asset.php is for flows var a asset file was necessary and where view is available we can simply put such js/css stuff there but in case of the admin also now we are moving the render related logic model and so maybe there will be little things in the view file 
		
	}

	public function get( $form_definition, $args = null ) {
		
		if( !empty($args['is_legacy_admin']) ) {

			$form_definition = parent::get( $form_definition, $args );	
		} else {

		}

	    return $form_definition;
	}

	public function save( $form_definition, $is_auto_insert_for_template=false, $args = null ) {

		$res = null;			
		
		if( !empty($args['is_legacy_admin']) ) {

			//	in case of legacy admin bind to hooks if applicable otherwise can simply call render ui sub process function 
			if( $args['page_section'] == 'sp_variations_save' ) {

				$res = parent::save( $form_definition, $is_auto_insert_for_template, $args );
			}

		} else {


		}

        return $res;
	}

}
