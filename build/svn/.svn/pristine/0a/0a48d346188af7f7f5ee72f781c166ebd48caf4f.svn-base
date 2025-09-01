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

	private function set_icons_for_breadcrumb_template($icon_paths) {

		$icon_keys = array('first_icon','second_icon','preview_icon');

		for ($i=0; $i < sizeof($icon_paths); $i++) { 

			$_img_url= constant('EOWBC_ASSET_URL').'icon/breadcrumb/'.$icon_paths[$i];    
			
			$thumb_id = wbc()->wp->add_image_gallary($_img_url);

	    	wbc()->options->update_option( 'configuration', $icon_keys[$i], absint( $thumb_id ) );
	    	
	    	//this is tricky, since the form is also updated on same save we need to override it's icon fields and set this thumb_ids
	    	$_POST[$icon_keys[$i]] = $thumb_id; 
		}

	}	

	public function save( $form_definition ) {
		$res = array( "type"=>"success", "msg"=>"Updated successfully!" );		
		
		wbc()->sanitize->clean($form_definition);	    
    	wbc()->validate->check($form_definition);
		/*wbc()->options->update_option('configuration','business_type',sanitize_text_field($_POST['config_business_type']));*/
		
		wbc()->load->model('category-attribute');
		wbc()->load->model('admin\form-builder');

		if(wbc()->options->get_option('configuration','config_alternate_breadcrumb') !== wbc()->sanitize->post('config_alternate_breadcrumb')) {
			
			if(wbc()->sanitize->post('config_alternate_breadcrumb') =='default') {
				wbc()->options->remove_option('appearance_filter','header_font');	

				wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_active','#dbdbdb');
				wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff');
				
				wbc()->options->update_option('appearance_breadcrumb','breadcrumb_title_backcolor_active','#000000');

				wbc()->options->update_option('appearance_breadcrumb','breadcrumb_num_icon_backcolor_active','#000000');

				wbc()->options->update_option('appearance_breadcrumb','breadcrumb_actions_backcolor_active','#000000');

				wbc()->options->update_option('appearance_breadcrumb','breadcrumb_num_icon_backcolor_inactive','#dbdbdb');
				wbc()->options->update_option('appearance_breadcrumb','breadcrumb_title_backcolor_inactive','#dbdbdb');
				wbc()->options->update_option('appearance_breadcrumb','breadcrumb_actions_backcolor_inactive','#dbdbdb');

				//delete and allow our default theme adaption setting to catch up
				//wbc()->options->remove_option('appearance_breadcrumb','breadcrumb_backcolor_active');	//delete and allow our default theme adaption setting to catch up	
				//wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff');			

				//set icon for this template 
				$this->set_icons_for_breadcrumb_template( array('default/wbc_breadcrumb_default_step_1.png','default/wbc_breadcrumb_default_step_2.png','default/wbc_breadcrumb_default_step_3.png') );

			} elseif(wbc()->sanitize->post('config_alternate_breadcrumb') =='template_1'){
				wbc()->options->update_option('appearance_filter','header_font','Avenir');
				wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_active','#dde5ed');
				wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff');			

				//set icon for this template 
				$this->set_icons_for_breadcrumb_template( array('template_1/wbc_breadcrumb_template_1_step_1.png','template_1/wbc_breadcrumb_template_1_step_2.png','template_1/wbc_breadcrumb_template_1_step_3.png') );

			} elseif (wbc()->sanitize->post('config_alternate_breadcrumb') =='template_2') {
				wbc()->options->update_option('appearance_filter','header_font','ZapfHumanist601BT-Roman');
				wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_active','#f7f7f7');	
				wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff');

				//set icon for this template 
				$this->set_icons_for_breadcrumb_template( array('template_2/wbc_breadcrumb_template_2_step_1.png','template_2/wbc_breadcrumb_template_2_step_2.png','template_2/wbc_breadcrumb_template_2_step_3.png') );

			} elseif (wbc()->sanitize->post('config_alternate_breadcrumb') =='template_3') {
				wbc()->options->remove_option('appearance_filter','header_font');	//delete and allow our default theme adaption setting to catch up
				wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_active','#9bb9f4');	
				wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff');			
			}
			
		}		

		if(!empty(wbc()->sanitize->post('first_name'))) {
			wbc()->options->update_option('configuration','first_slug',@\eo\wbc\model\Category_Attribute::instance()->get_single_category((int)wbc()->sanitize->post('first_name'))->slug );
		}

		if(!empty(wbc()->sanitize->post('second_name'))) {
			wbc()->options->update_option('configuration','second_slug',@\eo\wbc\model\Category_Attribute::instance()->get_single_category(wbc()->sanitize->post('second_name'))->slug);
		}

		do_action('eowbc_admin_form_configuration_save');

		//loop through form tabs and save
	    foreach ($form_definition as $key => $tab) {
	    	foreach ($tab["form"] as $fk => $fv) {				    
			    if( in_array($fv["type"], \eo\wbc\model\admin\Form_Builder::savable_types()) && (isset($_POST[$fk]) || $fv["type"]=='checkbox')) {
			    	wbc()->options->update_option('configuration',$fk,(isset($_POST[$fk])? wbc()->sanitize->post($fk):'' ));	
			    }
			}
	    }

		
		// TODO here it is better if we set it to 1 only if both category are set and otherwise set to 0 if user removes any categories 
		wbc()->options->update_option('configuration','config_category',1);
		
		return $res;
	}	
}
