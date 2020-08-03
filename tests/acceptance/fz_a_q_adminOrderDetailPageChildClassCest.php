<?php 

class fz_a_q_adminOrderDetailPageChildClassCest extends fz_a_o_adminOrderDetailPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

	public function gotoAdminOrderDetailPage(AcceptanceTester $I, $suite_name_prefix=false) {
		
		if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }

        parent::gotoAdminOrderDetailPage($I, "f_");
	}

	public function adminOrderDetailPage(AcceptanceTester $I, $suite_name_prefix=false) {
		
		if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }

        parent::adminOrderDetailPage($I, "f_");
	}
	    
}
