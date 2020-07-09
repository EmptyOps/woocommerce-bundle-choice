<?php 

class n_c_setupWizardCest extends a_e_setupWizardCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // 	$this->step1($I);
    // }

    public function step1(AcceptanceTester $I)
    {
    	if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

    	parent::step1($I,true);
    }

}
