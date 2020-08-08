<?php 

class f_l_step2CestChildClassCest extends f_k_step2Cest
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

}
