<?php 

//class intended to do a normal scenario test in a way in which normally users would try the plugin
class n_j_frontendChecksAndReviewCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

<<<<<<< HEAD
    function startWithHomePageButtons(AcceptanceTester $I) {
		
    	// use the existing cept classes for test 
    	require_once 'f_o_cartPageCest.php';
=======
    protected function startWithHomePageButtons(AcceptanceTester $I) {
		
    	// use the existing cept classes for test 
    	require_once dirname(__FILE__).'f_o_cartPageCest.php';
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
    	$f_o_cartPageCestObj = new f_o_cartPageCest();
    	$f_o_cartPageCestObj->continueToCheckout($I,true);

	}

<<<<<<< HEAD
	function testStep1(AcceptanceTester $I) {
=======
	protected function testStep1(AcceptanceTester $I) {
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
		
    	// use the existing cept classes for test 
    	require_once 'f_o_cartPageCest.php';
    	$f_o_cartPageCestObj = new f_o_cartPageCest();
    	$f_o_cartPageCestObj->continueToCheckout($I,true);

	}

	// test from entire process from starting with buttons to order details page on account panel and on admin panel 
    public function tryToTestChoiceMakerProcess(AcceptanceTester $I)
    {
<<<<<<< HEAD
=======
        if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
    	return;	//TODO run this test only if sample data env flag is set 

    	$this->startWithHomePageButtons($I);

    	$this->testStep1($I);

    }

}
