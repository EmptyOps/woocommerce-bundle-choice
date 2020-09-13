<?php 

class n_ka_cartPageCest extends f_o_cartPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

	public function cartPage(AcceptanceTester $I, $suite_name_prefix=false) {
		
		if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        parent::cartPage($I, "n_");
	}

	public function continueToCheckout(AcceptanceTester $I, $suite_name_prefix=false) {
		
		if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        parent::continueToCheckout($I, "n_");
	}
	    
}
