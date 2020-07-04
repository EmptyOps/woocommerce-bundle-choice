<?php 

class sunob_f_g_bonusFeaturesSpecificationsViewCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function atDefaultPosition(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

	}

	public function usingShortcode(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_f_") ) {
            return;
        }

        //First enable the switch for the shortcode from admin panel

        //Put shortcode somewhere. I think to test shortcode putting manually on some external page is fine, like in the sample page which is there and available default wp/woo. 

	}

}
