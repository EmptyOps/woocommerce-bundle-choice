<?php 

class sunob_f_k_bonusFeaturesFiltersForShopCategoryPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function shopPage(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

        // go to the page
        $I->amOnPage('/shop/');
        
        // Note: here it is assumed that shortcode is added on /sample-page manually, so skipping that part here.

        // check if filter is visible 
        $I->see('OK', 'button');

        // TODO apply filters
        
        // TODO check if expected results shows up

	}

	public function categoryPage(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

        //First enable the filter for category page from admin panel

	}

}
