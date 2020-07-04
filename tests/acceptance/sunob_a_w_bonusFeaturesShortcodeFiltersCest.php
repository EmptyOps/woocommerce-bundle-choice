<?php 

class sunob_a_w_bonusFeaturesShortcodeFiltersCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function addShortcodeFilters(AcceptanceTester $I) {

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
		$I->click('Shortcode Filters for Home');
		$I->see('Add Filter Field');

		// set fields 
		$I->executeJS("jQuery('#shop_cat_shortcode_filter_dropdown_div').dropdown('set selected', 15);");	//better than setting 1 directly is to select the nth element that has value 1 

		$I->fillField('shop_cat_shortcode_label', 'test label');
		$I->fillField('shop_cat_shortcode_unique_id', 'testuniqueid');

		$I->scrollTo('//*[@id="shop_cat_shortcode_add"]', -300, -100);
		$I->wait(3);
		
		// save 
		$I->click('Add Filter'); 	

		$I->wait(3);

		$I->see('testuniqueid', 'td');	//$I->see('4px', 'input');	//I verify that I can see "button tagline..." inside input tag 

	}

	public function manageShortcodeFiltersList(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

        //verify that filter exists
        $I->dontSee('No filter(s) exists');

        //delete the filter 
        $I->click('//*[@id="eowbc_shortcode_table"]/tbody/tr/td[5]/span');

        //verify if deleted
        $I->waitForText('No filter(s) exists', 10);

        //now since its deleted create again
        $this->addShortcodeFilters($I);

        //verify that filter created
        $I->dontSee('No filter(s) exists');

	}

	public function generateShortcode(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

        //before we create the shortcode verify that filter exists 
        $I->dontSee('No filter(s) exists');

        //generate 
        $I->click('Generate Shortcode');

        //verify if created
        $I->waitForText('[woo_custome_filter_begin][', 10);
        $I->see('][woo_custome_filter_end');

	}

}
