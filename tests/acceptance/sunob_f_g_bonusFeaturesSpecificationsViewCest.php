<?php 

class sunob_f_g_bonusFeaturesSpecificationsViewCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function atDefaultPosition(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

        // go to the page
        $I->amOnPage('/product/test-diamond-1/');
        
        // check if main title is visible 
        $I->see('Specifications', 'td');

        // check if value(s) are visible 
        $I->see('Round', 'td');   

        // TODO check if values/column-cells have the desired colors and border radius etc. that are set in admin
        
	}

    public function allExpectedValuesAreDisplayed(AcceptanceTester $I) {

        if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

    }

    public function allAlternateWidgetsAreWorking(AcceptanceTester $I) {

        if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

    }

	public function usingShortcode(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

        //
        //  First enable the switch for the shortcode from admin panel
        //
        //login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
        $I->loginAsAdmin();
        $I->see( 'Dashboard' );

        // go to the page
        $I->amOnPage('/wp-admin/admin.php?page=eowbc-tiny-features');

        /* Map creation and modification tab */
        // go to the tab
        $I->click('Specifications View for Item Page');
        $I->see('Enable Specifications View?');

        // set fields 
        $I->executeJS("jQuery('#specification_view_status').checkbox('set checked');");
        $I->executeJS("jQuery('#specification_view_shortcode_status').checkbox('set checked');");
        $I->executeJS("jQuery('#specification_view_default_status').checkbox('set unchecked');");

        // $I->executeJS("jQuery('[name=\"tiny_features_specification_view_style\"]').checkbox('set checked', 'template_1');");
        $I->executeJS("jQuery('[name=\"tiny_features_specification_view_style\"]').val('template_3');");    
        
        $I->executeJS('window.scrollTo( 0, 500 );');        //$I->scrollTo('Save'); 
        $I->wait(3);
        
        // save 
        $I->click('#tiny_features_save_specification_view');    //('Save');     

        // confirm if saved properly or not. TODO actually we should connfirm all values of the form if saved and repopulated properly in edit mode or saved list or not. 
        $I->reloadPage();   //reload page
        $I->click('Specifications View for Item Page');
        $I->seeInField('tiny_features_specification_view_style', 'template_3'); //$I->see('4px', 'input');  //I verify that I can see "button tagline..." inside input tag 


        //
        //  Put shortcode somewhere. I think to test shortcode putting manually on some external page is fine, like in the sample page which is there and available default wp/woo. 
        //
            //but what is the pre-condition to use shortcode on a page, I think it should be item page. So we need to mention that on admin panel help text i.e for shortcode swtich.

	}

}
