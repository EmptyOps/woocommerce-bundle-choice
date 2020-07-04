<?php


/*
*	Woocommerc Category and Attribute Model.
*/

namespace eo\wbc\model\admin;

defined( 'ABSPATH' ) || exit;

class Eowbc_Configuration {

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
				$form_definition[$key]["form"][$fk]["value"] = wbc()->options->get_option('configuration',$fk, isset($form_definition[$key]["form"][$fk]["value"]) ? $form_definition[$key]["form"][$fk]["value"] : '');
			}
	    }

	    return $form_definition;
	}


	public function save( $form_definition ) {
		$res = array( "type"=>"success", "msg"=>"Updated successfully!" );		
		
		wbc()->sanitize->clean($form_definition);	    
    	wbc()->validate->check($form_definition);
		/*wbc()->options->update_option('configuration','business_type',sanitize_text_field($_POST['config_business_type']));*/
		
		wbc()->load->model('category-attribute');
		wbc()->load->model('admin\form-builder');

		if(wbc()->options->get_option('configuration','config_alternate_breadcrumb') !== $_POST['config_alternate_breadcrumb']) {
			
			if($_POST['config_alternate_breadcrumb'] =='template_1'){
				wbc()->options->update_option('appearance_filter','header_font','Avenir');
				wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_active','#dde5ed');
				wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff');			

			} elseif ($_POST['config_alternate_breadcrumb'] =='template_2') {
				wbc()->options->update_option('appearance_filter','header_font','ZapfHumanist601BT-Roman');
				wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_active','#f7f7f7');	
				wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff');			
			}
			
		}

		if(!empty($_POST['first_name'])){
			wbc()->options->update_option('configuration','first_slug',@\eo\wbc\model\Category_Attribute::instance()->get_single_category((int)sanitize_text_field($_POST['first_name']))->slug );
		}

		if(!empty($_POST['second_name'])){
			wbc()->options->update_option('configuration','second_slug',@\eo\wbc\model\Category_Attribute::instance()->get_single_category(sanitize_text_field($_POST['second_name']))->slug);
		}

		//loop through form tabs and save
	    foreach ($form_definition as $key => $tab) {
	    	foreach ($tab["form"] as $fk => $fv) {				    
			    if( in_array($fv["type"], \eo\wbc\model\admin\Form_Builder::savable_types()) && (isset($_POST[$fk]) || $fv["type"]=='checkbox')) {
			    	wbc()->options->update_option('configuration',$fk,(isset($_POST[$fk])? sanitize_text_field( $_POST[$fk] ):'' ));	
			    }
			}
	    }

		
		// TODO here it is better if we set it to 1 only if both category are set and otherwise set to 0 if user removes any categories 
		wbc()->options->update_option('configuration','config_category',1);
		
		return $res;
	}	
}
