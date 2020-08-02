<?php 

class n_h_sampleLandingPageCest extends f_e_sampleLandingPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function testChoiceButtonWidgetOnLandingPage(AcceptanceTester $I, $suite_name_prefix=false) {
        
        if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        parent::testChoiceButtonWidgetOnLandingPage($I, "n_");
    }

}
