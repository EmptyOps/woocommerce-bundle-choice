<?php


/*
*	Woocommerc Category and Attribute Model.
*/

namespace eo\wbc\model\admin;

defined( 'ABSPATH' ) || exit;

class Eowbc_Appearance {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}


	public function get( $form_definition ) {
		
		//loop through form tabs and save 
	    foreach ($form_definition as $key => $tab) {
	    	foreach ($tab["form"] as $fk => $fv) {
			    //loop through form fields and read values from options and store in the form_definition 
				$form_definition[$key]["form"][$fk]["value"] = wbc()->options->get_option('appearance_'.$key,$fk, isset($form_definition[$key]["form"][$fk]["value"]) ? $form_definition[$key]["form"][$fk]["value"] : '');
			}
	    }

	    return $form_definition;
	}


	public function save( $form_definition ) {
		
		$res = array();
		$res["type"] = "success";

	    $res["msg"] = "";
		wbc()->load->model('admin\form-builder');

	    //loop through form tabs and save 

	    foreach ($form_definition as $key => $tab) {
	    	foreach ($tab["form"] as $fk => $fv) {
			    //loop through form fields, read from POST/GET and save
			    //may need to check field type here and read accordingly only
			    //only for those for which POST is set
			    if( in_array($fv["type"], \eo\wbc\model\admin\Form_Builder::savable_types()) && isset($_POST[$fk]) ) {
			    	error_log('appearance_'.$key);
			    	error_log($fk);
			    	wbc()->options->update_option('appearance_'.$key,$fk,(empty($_POST[$fk])? '': sanitize_text_field( $_POST[$fk] ) ) );	
			    }
			}
	    }

        return $res;
	}	
}
