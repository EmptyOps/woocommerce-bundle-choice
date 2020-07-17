<?php 

class n_i_step1Cest extends f_i_step1Cest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

	public function itemPage(AcceptanceTester $I, $suite_name_prefix=false) {
		
		if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        parent::itemPage($I, $suite_name_prefix);
	}

	public function checkProductNotFoundDueToMissingMapping(AcceptanceTester $I, $suite_name_prefix=false) {
		
		if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        parent::checkProductNotFoundDueToMissingMapping($I, $suite_name_prefix);
	}
	
}
