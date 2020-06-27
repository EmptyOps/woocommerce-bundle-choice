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

		// save 
		$I->click('#filter_setting_submit_btn'); 	//('Save');		//it shouldn't be this way, but there seem some issue with selenium driver and thus when there is another Save button on the page even though on another page and is not visible but still selenium think it is visible and thus gives us error so need to use unique xPath like id etc. 

		// confirm if saved properly or not
		$I->reloadPage();	//reload page
		// $I->click('Navigations Steps( Breadcrumb )');
		$I->see('Filter Configuration');	//TODO here should actually confirm is the switch is on, do it by fetching javascript value and comparing it but it will required javascript See etc function. 
	}

	public function alternateFilterWidgets(AcceptanceTester $I) {

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-filters');

		// go to the tab
		$I->click('Alternate Filter Widgets');
		$I->see('Default(Grid View)');

		// select category
		$I->executeJS("jQuery('#sc3').checkbox('set checked');");	

		// save 
		$I->('Save');		//click('#filter_setting_submit_btn'); 	//('Save');		//it shouldn't be this way, but there seem some issue with selenium driver and thus when there is another Save button on the page even though on another page and is not visible but still selenium think it is visible and thus gives us error so need to use unique xPath like id etc. 

		// confirm if saved properly or not
		$I->reloadPage();	//reload page
		$I->click('Alternate Filter Widgets');
		$I->seeInField('second_category_altr_filt_widgts', 'sc3');
	}

	public function firstAndSecondCategoryFilterConfigurations(AcceptanceTester $I) {

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-filters');

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
			$I->fillField("".$prefix."_fconfig_icon_size", '0');
			$I->fillField("".$prefix."_fconfig_icon_label_size", '0');
			$I->executeJS("jQuery('#".$prefix."_fconfig_add_reset_link_1').checkbox('set unchecked');");	

			// $I->wait(3);
			// echo $I->grabPageSource();

			// save 
			$I->click("#".$prefix."_fconfig_submit_btn"); 	//('Save');		//it shouldn't be this way, but there seem some issue with selenium driver and thus when there is another Save button on the page even though on another page and is not visible but still selenium think it is visible and thus gives us error so need to use unique xPath like id etc. 

			// confirm if saved properly or not
			$I->reloadPage();	//reload page
			$I->click( $name.' Page Filter Configuration');
			$I->see('Test '.$prefix.' filter');	

		}

	}

	public function deleteFirstAndSecondCategoryFilterConfigurations(AcceptanceTester $I) {

		// //login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		// $I->loginAsAdmin();
		// $I->see( 'Dashboard' );

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
