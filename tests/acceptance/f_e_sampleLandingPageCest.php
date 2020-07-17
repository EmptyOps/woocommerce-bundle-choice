<?php 

class f_e_sampleLandingPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    protected function testChoiceButtonWidgetOnLandingPage(AcceptanceTester $I, $suite_name_prefix=false) {
        
        // if( !$I->test_allowed_in_this_environment("f_") ) {
        //     return;
        // }
        
        // go to the page
		$I->amOnPage('/design-your-own-ring');

		// Check if buttons with text x are visible 
		$I->see('Start with Diamond');

		// I click on button one and I see in next page text like 1 {button text}
        $I->click('Start with Diamond');
            // $I->wait(5);
            // echo $I->grabPageSource();
        $I->waitForText('CHOOSE A', 10);    
        $I->see('1');
        $I->see('DIAMOND');
        $I->see('2');
        $I->see('PREVIEW');

        //go back to the home page
        $I->moveBack();

		// I click on button two  and I see in next page text like 1 {button text} of second Button
        $I->click('Start with Setting');
        $I->waitForText('CHOOSE A', 10);    
        $I->see('1');
        $I->see('SETTING');
        $I->see('2');
        $I->see('PREVIEW');

    }

}
