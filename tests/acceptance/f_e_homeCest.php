<?php 

class f_e_homeCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function testChoiceButtonWidgetOnHome(AcceptanceTester $I) {
		
    	// go to the home page
		$I->amOnPage('/');

		// Check if buttons with text x are visible 
        $I->see('Start with Diamond');

		// I click on button one and I see in next page text like 1 {button text}
        $I->click('Start with Diamond');
        $I->waitForText('1 Choose Diamond', 10);

        //go back to the home page
        $I->moveBack();

		// I click on button two  and I see in next page text like 1 {button text} of second Button
        $I->click('Start with Setting');
        $I->waitForText('1 Choose Setting', 10);

	}

    public function testChoiceButtonWidgetOnLandingPage(AcceptanceTester $I) {
        
        // TODO

    }

    public function testChoiceButtonWidgetBasedOnShortcode(AcceptanceTester $I) {
        
        // TODO

    }

}
