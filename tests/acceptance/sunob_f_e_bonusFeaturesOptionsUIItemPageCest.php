<?php 

class sunob_f_e_bonusFeaturesOptionsUIItemPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function checkIfVisible(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

        // go to the page
        $I->amOnPage('/product/test-diamond-1/');

        // check if options are visible and they 
        $I->see('Diamond Shape', 'span');   //attribute title
        $I->see('Emerald', 'div');   
        $I->see('Round', 'div');   

        // TODO check if options have the desired colors and border radius etc. that are set in admin
        
        // check if main customize title is visible 
        $I->see('CUSTOMIZE AS PER YOUR WISH');
        
	}

    public function checkExpandCollapse(AcceptanceTester $I) {

        if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

    }

    public function interactAndObserve(AcceptanceTester $I) {

        if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

        // // go to the page
        // $I->amOnPage('/product/test-diamond-1/');
        
        // // check if main customize title is visible 
        // $I->see('CUSTOMIZE AS PER YOUR WISH');
        
        // TODO check if options are interactable

        // TODO check if option changes are reflected where it should be e.g. if its reflecting the change on price or additional info tab or at other place where it should be.

            // check price 

            // check additional info. I think its not changed by WooCommerce or is it?

            // any other things that reflects anything ???
        
    }

}
