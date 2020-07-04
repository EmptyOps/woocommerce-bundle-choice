<?php 

class sunob_a_s_bonusFeaturesOptionsUICest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

	public function configureOptionsUI(AcceptanceTester $I) {

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
		// $I->click('Breadcrumb');
		$I->see('Toggle Button Enabled?');

		// set fields 
		$I->executeJS("jQuery('#tiny_features_option_ui_toggle_status').checkbox('set checked');");
		$I->executeJS("jQuery('#tiny_features_option_ui_toggle_init_status').checkbox('set checked');");
		$I->fillField('tiny_features_option_ui_toggle_text', 'CUSTOMIZE AS PER YOUR WISH');
		$I->fillField('tiny_features_option_ui_option_dimention', '2em');

		$I->executeJS('jQuery("#tiny_features_option_ui_border_color").val("#ffffff");'); 
		$I->fillField('tiny_features_option_ui_border_width', '5px');
		$I->executeJS('jQuery("#tiny_features_option_ui_border_color_hover").val("#ffffff");'); 
		$I->fillField('tiny_features_option_ui_border_width_hover', '1px');
		$I->fillField('tiny_features_option_ui_border_radius', '3px');

		$I->executeJS('jQuery("#tiny_features_option_ui_font_color").val("#ffffff");'); 
		$I->executeJS('jQuery("#tiny_features_option_ui_font_color_hover").val("#ffffff");');
		$I->executeJS('jQuery("#tiny_features_option_ui_bg_color").val("#ffffff");'); 
		$I->executeJS('jQuery("#tiny_features_option_ui_bg_color_hover").val("#ffffff");');

		$I->executeJS('window.scrollTo( 0, 1000 );');		//$I->scrollTo('Save');	
		$I->wait(3);

		// save 
		$I->click('#tiny_features_option_ui_save'); 	//('Save'); 	

		// confirm if saved properly or not. TODO actually we should connfirm all values of the form if saved and repopulated properly in edit mode or saved list or not. 
		$I->reloadPage();	//reload page
		// $I->executeJS('window.scrollTo( 0, 10 );');
		// $I->wait(3);
		// $I->click('Breadcrumb');
		$I->seeInField('tiny_features_option_ui_toggle_text', 'CUSTOMIZE AS PER YOUR WISH');	//$I->see('4px', 'input');	//I verify that I can see "button tagline..." inside input tag 

	}

}
