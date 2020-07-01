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

    public function testChoiceButtonWidgetOnLandingPage(AcceptanceTester $I) {
        
<<<<<<< HEAD
=======
        if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }
        
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
        // go to the page
		$I->amOnPage('/design-your-own-ring');

		// Check if buttons with text x are visible 
<<<<<<< HEAD
		$I->wait(3);
		// echo $I->grabPageSource();
        $I->see('Start with Diamond');

		// I click on button one and I see in next page text like 1 {button text}
        $I->click('Start with Diamond');
        $I->waitForText('1', 10, 'div');
        $I->waitForText('CHOOSE A', 10, 'div');
        $I->waitForText('DIAMOND', 10, 'div');
        $I->waitForText('2', 10, 'div');
        $I->waitForText('PREVIEW', 10, 'div');
=======
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
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3

        //go back to the home page
        $I->moveBack();

		// I click on button two  and I see in next page text like 1 {button text} of second Button
        $I->click('Start with Setting');
<<<<<<< HEAD
        $I->waitForText('1', 10, 'div');
        $I->waitForText('CHOOSE A', 10, 'div');
        $I->waitForText('SETTING', 10, 'div');
        $I->waitForText('2', 10, 'div');
        $I->waitForText('PREVIEW', 10, 'div');
=======
        $I->waitForText('CHOOSE A', 10);    
        $I->see('1');
        $I->see('SETTING');
        $I->see('2');
        $I->see('PREVIEW');
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3

    }

}
