<?php 

class f_j_step1CestChildClassCest extends f_i_step1Cest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

	public function itemPage(AcceptanceTester $I, $suite_name_prefix=false) {
		
		if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }

        parent::itemPage($I, "f_");
	}

	public function checkProductNotFoundDueToMissingMapping(AcceptanceTester $I, $suite_name_prefix=false) {
		
		if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }

        parent::checkProductNotFoundDueToMissingMapping($I, "f_");
	}

}
