<?php 

//class intended to do a normal scenario test in a way in which normally users would try the plugin
class n_l_frontendChecksAndReviewCest 
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function checkAndReview(AcceptanceTester $I)
    {
        if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        // TODO apart from the normal process what else should be checked? 
    }

}
