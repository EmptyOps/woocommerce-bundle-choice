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

	}

	public function categoryPage(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

        //First enable the filter for category page from admin panel

	}

}
