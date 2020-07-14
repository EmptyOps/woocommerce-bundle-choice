<?php 

class sunob_a_a_settingsAndStatusCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function enablingBonusFeaturePriceControl(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-setting-status');

		$I->see('Choose features');

		// 
		$I->executeJS("jQuery('#price_control').parent().checkbox('set checked', 'price_control');");	
		
		// save 
		$I->click('Save'); 	
		$I->wait(2);

		// verify
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-price-control');

		$I->see('Set pricing method to update price in bulk');

	}

	public function enablingBonusFeatureOptionsUI(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

	}

	public function enablingBonusFeatureSpecificationView(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

	}

	public function enablingBonusFeatureShortcodeFilters(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

	}

	public function enablingBonusFeatureShopCategoryPageFilters(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

	}	

}
