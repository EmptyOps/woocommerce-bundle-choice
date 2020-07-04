<?php 

class sunob_f_i_bonusFeaturesShortcodeFiltersCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }


    public function atSamplePage(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

        // go to the page
        $I->amOnPage('/sample-page/');
        
        // Note: here it is assumed that shortcode is added on /sample-page manually, so skipping that part here.

        // check if filter is visible 
        $I->see('OK', 'button');

        // TODO apply filters
        
        // TODO check if expected results shows up
        
	}

}
