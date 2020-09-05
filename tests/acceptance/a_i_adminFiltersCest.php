<?php 

class a_i_adminFiltersCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

	public function filterGeneralConfigurations(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("a_") ) {
            return;
        }

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-filters');

		// go to the tab
		// $I->click('Filters');
		// $I->click('Configuration');
		$I->see('Filter Configuration');

		// select category
		$I->executeJS("jQuery('#config_filter_status').checkbox('set checked');");	

		$I->scrollTo('#filter_setting_submit_btn', -300, -300);
		$I->wait(3);

		// save 
		$I->click('#filter_setting_submit_btn'); 	//('Save');		//it shouldn't be this way, but there seem some issue with selenium driver and thus when there is another Save button on the page even though on another page and is not visible but still selenium think it is visible and thus gives us error so need to use unique xPath like id etc. 

		// confirm if saved properly or not
		$I->reloadPage();	//reload page
		// $I->click('Navigations Steps( Breadcrumb )');
		$I->see('Filter Configuration');	//TODO here should actually confirm is the switch is on, do it by fetching javascript value and comparing it but it will required javascript See etc function. 
	}

	public function alternateFilterWidgets(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("a_") ) {
            return;
        }

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-filters');

		// go to the tab
		$I->click('Alternate Filter Widgets');
		$I->see('Default(Grid View)');

		// select category
		$I->executeJS("jQuery('[name=\"second_category_altr_filt_widgts\"]').val('sc3');");	
		// $I->executeJS("jQuery('[name=\"second_category_altr_filt_widgts\"]').checkbox('set checked', 'sc3');");	

		$I->executeJS('window.scrollTo( 0, 1000 );');		//$I->scrollTo('Save');	
		$I->wait(3);

		// echo "the valie of second_category_altr_filt_widgts ".$I->executeJS("return jQuery('[name=\"second_category_altr_filt_widgts\"]').val();");

		// save 
		$I->click('#submit_btn'); 	//('Save');		//it shouldn't be this way, but there seem some issue with selenium driver and thus when there is another Save button on the page even though on another page and is not visible but still selenium think it is visible and thus gives us error so need to use unique xPath like id etc. 

		// confirm if saved properly or not
		$I->reloadPage();	//reload page
		
		$I->executeJS('window.scrollTo( 0, 0 );');		
		$I->wait(3);

		$I->click('Alternate Filter Widgets');
		// $I->seeInField('second_category_altr_filt_widgts', 'sc3');
		$I->radioAssertion($I, 'sc3', "second_category_altr_filt_widgts", 'sc3'); 

		// roll back to default
		// in this default like manual test like suite, we should always test the default widgets since others are being tested randomly by other suits but default must be tested here 
		$I->executeJS("jQuery('[name=\"second_category_altr_filt_widgts\"]').val('sc1');");	
		
		$I->executeJS('window.scrollTo( 0, 1000 );');		//$I->scrollTo('Save');	
		$I->wait(3);

		// save 
		$I->click('#submit_btn'); 	//('Save');		//it shouldn't be this way, but there seem some issue with selenium driver and thus when there is another Save button on the page even though on another page and is not visible but still selenium think it is visible and thus gives us error so need to use unique xPath like id etc. 

		// confirm if saved properly or not
		$I->reloadPage();	//reload page

		$I->executeJS('window.scrollTo( 0, 0 );');		
		$I->wait(3);

		$I->click('Alternate Filter Widgets');
		$I->radioAssertion($I, 'sc1', "second_category_altr_filt_widgts", 'sc1'); 

	}

	public function firstAndSecondCategoryFilterConfigurations(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("a_") ) {
            return;
        }

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-filters');
		echo $I->grabPageSource();

		for($cat_index=0; $cat_index<=1; $cat_index++) {

			$name = "";
			$cat_name = "";
			$prefix = "";
			if( $cat_index == 0 ) {
				$name = "Diamond";
				$cat_name = "Diamond";
				$prefix = "d";
			}
			else {
				$name = "Settings";
				$cat_name = "Setting";
				$prefix = "s";
			}

			/* Navigations Steps( Breadcrumb ) tab */
			// go to the tab
			// $I->click('Filters');
			$I->click( $name.' Page Filter Configuration');
			// $I->see("Add ".$cat_name." Shape's filter");	//use this test and comment below one once we have the label/titles fixed on this page 
			$I->see('Is it advanced filter?');	

			// set fields 
			$I->executeJS("jQuery('#".$prefix."_fconfig_filter_dropdown_div').dropdown('set selected', 15);");	//better than setting val directly is to select the nth element that has value val 
			$I->fillField("".$prefix."_fconfig_label", 'Test '.$prefix.' filter');
			$I->executeJS("jQuery('#".$prefix."_fconfig_is_advanced_1').checkbox('set unchecked');");	
			$I->fillField("".$prefix."_fconfig_column_width", '50');
			$I->fillField("".$prefix."_fconfig_ordering", '5');
			$I->executeJS("jQuery('#".$prefix."_fconfig_input_type').dropdown('set selected', 'text_slider');");	//better than setting val directly is to select the nth element that has value val 

			if( false ) {	// icon fields are applicable only when the filters with input type with icon is set, so set to false for now
				$I->fillField("".$prefix."_fconfig_icon_size", '0');
				$I->fillField("".$prefix."_fconfig_icon_label_size", '0');
			}
			
			$I->executeJS("jQuery('#".$prefix."_fconfig_add_reset_link_1').checkbox('set unchecked');");	

			$I->executeJS('window.scrollTo( 0, 1500 );');		//$I->scrollTo('Save');	
			$I->wait(3);

			// save 
			$I->click("#".$prefix."_fconfig_submit_btn"); 	//('Save');		//it shouldn't be this way, but there seem some issue with selenium driver and thus when there is another Save button on the page even though on another page and is not visible but still selenium think it is visible and thus gives us error so need to use unique xPath like id etc. 

			$I->waitForText("New Filter Added Successfully");

			// confirm if saved properly or not
			$I->reloadPage();	//reload page

			$I->executeJS('window.scrollTo( 0, 0 );');		
			$I->wait(3);

			$I->click( $name.' Page Filter Configuration');
			$I->see('Test '.$prefix.' filter');	

		}

	}

	public function deleteFirstAndSecondCategoryFilterConfigurations(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("a_") ) {
            return;
        }
        
		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// // go to the page
		// $I->amOnPage('/wp-admin/admin.php?page=eowbc-filters');

		// for($cat_index=0; $cat_index<=1; $cat_index++) {

		// 	$name = "";
		// 	$cat_name = "";
		// 	$prefix = "";
		// 	if( $cat_index == 0 ) {
		// 		$name = "Diamond";
		// 		$cat_name = "Diamond";
		// 		$prefix = "d";
		// 	}
		// 	else {
		// 		$name = "Settings";
		// 		$cat_name = "Setting";
		// 		$prefix = "s";
		// 	}

		// 	/* Navigations Steps( Breadcrumb ) tab */
		// 	// go to the tab
		// 	// $I->click('Filters');
		// 	$I->click( $name.' Page Filter Configuration');
		// 	// $I->see("Add ".$cat_name." Shape's filter");	//use this test and comment below one once we have the label/titles fixed on this page 
		// 	$I->see('Is it advanced filter?');	

		// 	// set fields 
		// 	$I->executeJS("jQuery('#".$prefix."_fconfig_filter_dropdown_div').dropdown('set selected', 15);");	//better than setting val directly is to select the nth element that has value val 
		// 	$I->fillField("".$prefix."_fconfig_label", 'Test '.$prefix.' filter');
		// 	$I->executeJS("jQuery('#".$prefix."_fconfig_is_advanced_1').checkbox('set unchecked');");	
		// 	$I->fillField("".$prefix."_fconfig_column_width", '50');
		// 	$I->fillField("".$prefix."_fconfig_ordering", '5');
		// 	$I->executeJS("jQuery('#".$prefix."_fconfig_input_type').dropdown('set selected', 'text_slider');");	//better than setting val directly is to select the nth element that has value val 
		// 	$I->fillField("".$prefix."_fconfig_icon_size", '0');
		// 	$I->fillField("".$prefix."_fconfig_icon_label_size", '0');
		// 	$I->executeJS("jQuery('#".$prefix."_fconfig_add_reset_link_1').checkbox('set unchecked');");	

		// 	// $I->wait(3);
		// 	// echo $I->grabPageSource();

		// 	// save 
		// 	$I->click("#".$prefix."_fconfig_submit_btn"); 	//('Save');		//it shouldn't be this way, but there seem some issue with selenium driver and thus when there is another Save button on the page even though on another page and is not visible but still selenium think it is visible and thus gives us error so need to use unique xPath like id etc. 

		// 	// confirm if saved properly or not
		// 	$I->reloadPage();	//reload page
		// 	$I->click( $name.' Page Filter Configuration');
		// 	$I->see('Test '.$prefix.' filter');	

		// }

	}

}
