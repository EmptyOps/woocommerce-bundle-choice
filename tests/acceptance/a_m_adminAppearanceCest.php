<?php 

class a_m_adminAppearanceCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function sampleLandingPageStyling(AcceptanceTester $I) {
		//TODO write this test when the styling feature is implemented for sample landing page
	}

    public function buttonsWidgetStyling(AcceptanceTester $I) {

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-appearance');

		/* Map creation and modification tab */
		// go to the tab
		// $I->click('Map creation and modification');
		$I->see('Add New Maps');

		// set fields 
		$I->fillF('tagline_text', 'button tagline...');
		// $I->executeJS("jQuery('#eo_wbc_first_category_dropdown_div').dropdown('set selected', 17);");	//better than setting val directly is to select the nth element that has value val 	
		// $I->executeJS("jQuery('#eo_wbc_second_category_dropdown_div').dropdown('set selected', 18);");	//better than setting val directly is to select the nth element that has value val 	
		// save 
		$I->click('Save Appearance Settings'); 	

		// confirm if saved properly or not
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-appearance');	//reload page
		// $I->click('Map creation and modification');
		$I->see('button tagline...', 'input');	//I verify that I can see "button tagline..." inside input tag 
	}

}
