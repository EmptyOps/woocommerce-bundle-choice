<?php

class  Admin_Filters_Test extends WP_UnitTestCase {
	
	function test_save_options() {
		$_POST['_wpnonce'] = wp_create_nonce('eowbc_filters');
		$_POST['resolver'] = 'eowbc_filters';
		//$_POST['eo_wbc_action'] = 'save_jpc_data';

		$tab_specific_skip_fileds = array('saved_tab_key','eowbc_price_control_methods_list_bulk','eowbc_price_control_sett_methods_list_bulk');


		//options 
		$expected = array(); //serialize( array( "example_rule"=>"example_value" ) );
		wbc()->load->model('admin\form-builder');
		require_once constant('EOWBC_DIRECTORY').'application/controllers/admin/menu/page/filters.php';
		$form_definition = eo\wbc\controllers\admin\menu\page\Filters::get_form_definition( true );
		//loop through form tabs and set random values from samples available for each fieled  
		foreach ($form_definition as $key => $tab) {
	    	foreach ($tab["form"] as $fk => $fv) {
	    		if( !in_array($fv["type"], eo\wbc\model\admin\Form_Builder::savable_types()) || in_array($fk, $tab_specific_skip_fileds) ) {
	    			continue;
	    		}

			    $random = "";

			    //here we can override any particular field which needs specific sample values 
			    if( $fv["type"] == "text" || $fv["type"] == "color" || $fv["type"] == "hidden" || $fv["type"] == "textarea" ) {	
			    	if( isset($fv["sample_values"]) && sizeof($fv["sample_values"]) > 0 ) {
			    		$random = $fv["sample_values"][array_rand($fv["sample_values"],1)];
			    	}
			    } 
			    else if( $fv["type"] == "checkbox" || $fv["type"] == "radio" || $fv["type"] == "select" ) {	
					$random = array_rand($fv["options"],1);
			    } 

			    //post
				$_POST[$fk] = $random;

				//expected
				if( !isset($expected[$key]) ) {
					$expected[$key] = array();
				}
				$expected[$key][$fk] = $random;
			}
	    }

	    //save all three tabs
	    $_POST["saved_tab_key"] = "altr_filt_widgts";
	    include constant('EOWBC_DIRECTORY').'application/controllers/ajax/'.sanitize_text_field($_POST['resolver']).'.php';

	    $_POST["saved_tab_key"] = "d_fconfig";
	    include constant('EOWBC_DIRECTORY').'application/controllers/ajax/'.sanitize_text_field($_POST['resolver']).'.php';

	    $_POST["saved_tab_key"] = "s_fconfig";
	    include constant('EOWBC_DIRECTORY').'application/controllers/ajax/'.sanitize_text_field($_POST['resolver']).'.php';

		foreach ($expected as $key => $value) {
			$is_table_save = $key != "altr_filt_widgts" ? true : false;
			$result = get_option('eowbc_option_filters_'.$key, serialize( array() ) ); 

			wbc()->common->pr($is_table_save ? array( $value ) : $value);
			wbc()->common->pr(unserialize($result));

			$this->assertEquals( wbc()->common->consistsOfTheSameValues( $is_table_save ? array( $value ) : $value, unserialize($result)), true );
		}

		//here test delete action as well, for the last two tabs

	}	
}