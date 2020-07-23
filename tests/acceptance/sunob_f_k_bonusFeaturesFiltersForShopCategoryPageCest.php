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
        // $I->amOnPage('/shop/');
        $I->amOnPage('/product-category/diamond/');
        
        // check if filter is visible 
        // $I->see('Diamond Filter');    //first filter tab
        // $I->see('Setting Filter');    //second filter tab
        $I->waitForText('Test d filter');    
        $I->see('Search', 'button');    


        // TODO apply filters basic check
        
        // TODO check if expected results shows up

	}

    public function leftBarFilterNotDisplayedOnShopPage(AcceptanceTester $I) {

        if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

    }

    public function allFilterFieldsAreDisplayedOnShopPage(AcceptanceTester $I) {

        if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

    }

    public function allFilterFieldsAreWorkingOnShopPage(AcceptanceTester $I) {

        if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

    }

	public function categoryPage(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

        //First enable the filter for category page from admin panel


        // go to the page
        $I->amOnPage('/selected-category-page/');
        
        // TODO check if filter is visible 

        // TODO apply filters basic check
        
        // TODO check if expected results shows up

	}

    public function leftBarFilterNotDisplayedOnCategoryPage(AcceptanceTester $I) {

        if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

    }

    public function allFilterFieldsAreDisplayedOnCategoryPage(AcceptanceTester $I) {

        if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

    }

    public function allFilterFieldsAreWorkingOnCategoryPage(AcceptanceTester $I) {

        if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

    }

}
