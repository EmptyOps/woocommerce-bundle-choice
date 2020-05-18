<?php

class  Admin_Appearance_Test extends WP_UnitTestCase {
	
	function test_save_options() {
		$_POST['_wpnonce'] = wp_create_nonce('eowbc_appearance');
		$_POST['resolver'] = 'eowbc_appearance';
		//$_POST['eo_wbc_action'] = 'save_jpc_data';

		//options 
		$expected = array(); //serialize( array( "example_rule"=>"example_value" ) );
		wbc()->load->model('admin\form-builder');
		require_once constant('EOWBC_DIRECTORY').'application/controllers/admin/menu/page/appearance.php';
		$form_definition = eo\wbc\controllers\admin\menu\page\Appearance::get_form_definition( true );
		//loop through form tabs and set random values from samples available for each fieled  
		foreach ($form_definition as $key => $tab) {
	    	foreach ($tab["form"] as $fk => $fv) {
	    		if( !in_array($fv["type"], eo\wbc\model\admin\Form_Builder::savable_types()) ) {
	    			continue;
	    		}

			    $random = "";

			    //here we can override any particular field which needs specific sample values 
			    if( $fv["type"] == "text" || $fv["type"] == "color" || $fv["type"] == "hidden" || $fv["type"] == "textarea" ) {	
			    	if( isset($fv["sample_values"]) && sizeof($fv["sample_values"]) > 0 ) {
			    		$random = $fv["sample_values"][array_rand($fv["sample_values"],1)[0]];
			    		echo $fk." ".$random." ".array_rand($fv["sample_values"],1)[0];
			    		wbc()->common->pr($fv["sample_values"]);
			    	}
			    } 
			    else if( $fv["type"] == "checkbox" || $fv["type"] == "radio" || $fv["type"] == "select" ) {	
					$random = array_rand($fv["options"],1)[0];
					echo $fk." ".$random." ".array_rand($fv["options"],1)[0];
			    	wbc()->common->pr($fv["options"]);
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

		require_once constant('EOWBC_DIRECTORY').'application/controllers/ajax/'.sanitize_text_field($_POST['resolver']).'.php';
		foreach ($expected as $key => $value) {
			$result = get_option('eowbc_option_appearance_'.$key, serialize( array() ) );
			//$this->assertEquals( serialize($value), $result );
			echo "array check";
			echo "<pre>"; print_r($value); echo "</pre>";
			echo "<pre>"; print_r( unserialize($result) ); echo "</pre>"; 
			$this->assertEquals( wbc()->common->consistsOfTheSameValues($value, unserialize($result)), true );
		}
	}	
}