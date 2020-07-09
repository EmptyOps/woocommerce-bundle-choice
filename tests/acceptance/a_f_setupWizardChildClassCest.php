<?php 

class a_f_setupWizardChildClassCest extends a_e_setupWizardCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function step1(AcceptanceTester $I) {

    	if( !$I->test_allowed_in_this_environment("a_") ) {
            return;
        }

        parent::step1($I);

	}

	public function step2(AcceptanceTester $I) {

    	if( !$I->test_allowed_in_this_environment("a_") ) {
            return;
        }

        parent::step2($I);

	}

	public function step3(AcceptanceTester $I) {

    	if( !$I->test_allowed_in_this_environment("a_") ) {
            return;
        }

        parent::step3($I);

	}

}
