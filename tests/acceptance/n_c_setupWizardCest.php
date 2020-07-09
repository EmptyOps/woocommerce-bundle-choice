<?php 

class n_c_setupWizardCest extends a_e_setupWizardCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    	$this->step1($I);
    }
}
