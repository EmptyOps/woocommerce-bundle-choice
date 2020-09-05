<?php 

class sunob_a_u_bonusFeaturesSpecificationsViewCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }


	public function configureSpecificationsView(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-tiny-features');

		/* Map creation and modification tab */
		// go to the tab
		$I->click('Specifications View for Item Page');
		$I->see('Specification View Configuration');

		// set fields 
		$I->executeJS("jQuery('#specification_view_status').parent().checkbox('set checked', 'specification_view_status');");
		$I->executeJS("jQuery('#specification_view_shortcode_status').parent().checkbox('set checked', 'specification_view_shortcode_status');");
		$I->executeJS("jQuery('#specification_view_default_status').parent().checkbox('set checked', 'specification_view_default_status');");

		// $I->executeJS("jQuery('[name=\"tiny_features_specification_view_style\"]').checkbox('set checked', 'template_1');");
		$I->executeJS("jQuery('[name=\"tiny_features_specification_view_style\"]').val('template_1');");	
		
		$I->executeJS('window.scrollTo( 0, 500 );');		//$I->scrollTo('Save');	
		$I->wait(3);
		
		// save 
		$I->click('#tiny_features_save_specification_view'); 	//('Save'); 	

		// confirm if saved properly or not. TODO actually we should connfirm all values of the form if saved and repopulated properly in edit mode or saved list or not. 
		$I->reloadPage();	//reload page
		// $I->executeJS('window.scrollTo( 0, 10 );');
		// $I->wait(3);
		$I->click('Specifications View for Item Page');
		$I->radioAssertion($I, 'template_1', "tiny_features_specification_view_style", 'template_1'); 	//$I->seeInField('tiny_features_specification_view_style', 'template_1');	

	}

}
