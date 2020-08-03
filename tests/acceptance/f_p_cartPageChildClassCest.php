<?php 

class f_p_cartPageChildClassCest extends f_o_cartPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

	public function cartPage(AcceptanceTester $I, $suite_name_prefix=false) {
		
		if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }

        parent::cartPage($I, "f_");
	}

	public function continueToCheckout(AcceptanceTester $I, $suite_name_prefix=false) {
		
		if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }

        parent::continueToCheckout($I, "f_");
	}
	    
}
