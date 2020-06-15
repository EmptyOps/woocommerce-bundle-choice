<?php 

class adminFiltersCest
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
		$I->amOnPage('/wp-admin/admin.php?page=eowbc');

		/* Navigations Steps( Breadcrumb ) tab */
		// go to the tab
		$I->click('Filters');
		// $I->click('Configuration');
		$I->see('Filter Configuration');

		// select category
		$I->executeJS("jQuery('#config_first_name_dropdown_div').dropdown('set selected', 15);");	//better than setting val directly is to select the nth element that has value val 
		$I->executeJS("jQuery('#config_second_name_dropdown_div').dropdown('set selected', 15);");	//better than setting val directly is to select the nth element that has value val 

		// set preview text
		$I->fillField('config_preview_name', 'Preview');

		// save 
		$I->click('Save');

	}

	public function firstCategoryFilterConfigurations(AcceptanceTester $I) {

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc');

		/* Navigations Steps( Breadcrumb ) tab */
		// go to the tab
		$I->click('Filters');
		// $I->click('Configuration');
		$I->see('Filter Configuration');

		// select category
		$I->executeJS("jQuery('#config_first_name_dropdown_div').dropdown('set selected', 15);");	//better than setting val directly is to select the nth element that has value val 
		$I->executeJS("jQuery('#config_second_name_dropdown_div').dropdown('set selected', 15);");	//better than setting val directly is to select the nth element that has value val 

		// set preview text
		$I->fillField('config_preview_name', 'Preview');

		// save 
		$I->click('Save');

	}

	public function secondCategoryFilterConfigurations(AcceptanceTester $I) {

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc');

		/* Navigations Steps( Breadcrumb ) tab */
		// go to the tab
		$I->click('Filters');
		// $I->click('Configuration');
		$I->see('Filter Configuration');

		// select category
		$I->executeJS("jQuery('#config_first_name_dropdown_div').dropdown('set selected', 15);");	//better than setting val directly is to select the nth element that has value val 
		$I->executeJS("jQuery('#config_second_name_dropdown_div').dropdown('set selected', 15);");	//better than setting val directly is to select the nth element that has value val 

		// set preview text
		$I->fillField('config_preview_name', 'Preview');

		// save 
		$I->click('Save');

	}

}
