<?php 

class sunob_f_m_bonusFeaturesPriceControlCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function updatedPricesDisplayed(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

        // go to the page
        $I->amOnPage('/product/test-ring-1/');
        
		//TODO temp till merge with master
        return;

        // check if main title is visible 
        $I->see('14.85');	//the ring price was 15.00 and after applying the -1 %  rule it should 14.85
        
	}

}
