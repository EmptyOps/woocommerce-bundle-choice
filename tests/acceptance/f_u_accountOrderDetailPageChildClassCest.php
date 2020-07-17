<?php 

class f_u_accountOrderDetailPageChildClassCest extends f_s_accountOrderDetailPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

	public function myAccountPage(AcceptanceTester $I, $suite_name_prefix=false) {
		
		if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }

        parent::myAccountPage($I, $suite_name_prefix);
	}

	public function verifyOrderDetails(AcceptanceTester $I, $suite_name_prefix=false) {
		
		if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }

        parent::verifyOrderDetails($I, $suite_name_prefix);
	}
    
}
