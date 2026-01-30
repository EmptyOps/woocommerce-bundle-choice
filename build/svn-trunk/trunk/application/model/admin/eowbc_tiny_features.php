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

		if (!empty($args['page_section'])) {
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
		} else{

			parent::load_asset($args);	
		}
	}

	public function render_ui_sub_process($form, $args = null) {

		parent::render_ui_sub_process($form, $args);
		
		//	if there is any module specific js or css then it should be loaded view file or asset.php file -- both have their pros and cons. but I think asset.php is for flows var a asset file was necessary and where view is available we can simply put such js/css stuff there but in case of the admin also now we are moving the render related logic model and so maybe there will be little things in the view file 
		// ACTIVE_TODO temp. added on 24-Dec-2022. move it to right place and remove from here.

		
		//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
		$custom_css = "
		    /*Enter Your Custom Admin CSS Here*/
		    .ui.pointing.secondary.menu {
		        padding: 10px 20px 10px 16px!important;
		        margin: 9px 0;
		        border-bottom: 1px solid #eee;
		    }

		    .ui.pointing.secondary.menu a.item {
		        color: #5b5b5b;
		    }

		    h4.ui.dividing.header {
		        color: #333;
		        font-weight: bold;
		        padding: 10px 20px 10px 13px!important;
		        margin: 9px 0;
		        border-bottom: 1px solid #eee;
		        float: left;
		        width: 100%;
		    }

		    .eight.wide.field.upload_image .ui.button.inverted.primary {
		        margin-left: 1rem;
		        display: flex!important;
		    }

		    .ui.tiny.image {
		        float: left;
		        padding-right: 10px;
		    }

		    .eight.wide.field.upload_image {
		        display: inline-block;
		        padding: 10px 20px 10px 13px!important;
		    }

		    .eight.wide.field.upload_image .ui.tiny.image img {
		        display: block;
		        max-width: 100%;
		        max-height: 100px;
		        object-fit: contain;
		    }

		    .eight.wide.field.upload_image .ui.button.inverted.primary {
		        margin-left: 1rem;
		    }

		    .inline.fields ~ .fields {
		        padding: 10px 20px 10px 13px!important;
		        border-bottom: 1px solid #eee;
		        margin: 9px 0;
		        width: 100%;
		        float: left;
		    }

		    .ui.tiny.image ~ .ui.button.inverted.primary {
		        margin-top: 2rem;
		    }

		    p.form-field._eowbc_certificate_url_field label[for=\"_eowbc_certificate_url\"] {
		        display: none;
		    }
		";

		wbc()->load->add_inline_style('', $custom_css, 'common');
	}

	public function get( $form_definition, $args = null ) {
		
		if( !empty($args['is_legacy_admin']) ) {
			
			$args['id'] = $args['data']['id'];
			$form_definition = parent::get( $form_definition, $args );	
		} else {

		}

	    return $form_definition;
	}

	public function save( $form_definition, $is_auto_insert_for_template=false, $args = null ) {
		
		$res = null;			
		
		if( !empty($args['is_legacy_admin']) ) {

			//	in case of legacy admin bind to hooks if applicable otherwise can simply call render ui sub process function 
			if( $args['page_section'] == 'sp_variations' ) {

				$args['id'] = $args['data']['id'];
				$res = parent::save( $form_definition, $is_auto_insert_for_template, $args );
			}

		} else {


		}

        return $res;
	}

}
