<?php 

class f_f_sampleLandingPageChildClassCest extends f_e_sampleLandingPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function testChoiceButtonWidgetOnLandingPage(AcceptanceTester $I, $suite_name_prefix=false) {
        
        if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }

        parent::testChoiceButtonWidgetOnLandingPage($I, "f_");
    }
}
