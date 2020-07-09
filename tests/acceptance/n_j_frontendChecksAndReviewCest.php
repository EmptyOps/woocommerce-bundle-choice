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

    protected function startWithHomePageButtons(AcceptanceTester $I) {
		
    	// use the existing cept classes for test 
    	require_once dirname(__FILE__).'f_o_cartPageCest.php';
    	$f_o_cartPageCestObj = new f_o_cartPageCest();
    	$f_o_cartPageCestObj->continueToCheckout($I,true);

	}

	protected function testStep1(AcceptanceTester $I) {
		
    	// use the existing cept classes for test 
    	require_once 'f_o_cartPageCest.php';
    	$f_o_cartPageCestObj = new f_o_cartPageCest();
    	$f_o_cartPageCestObj->continueToCheckout($I,true);

	}

	// test from entire process from starting with buttons to order details page on account panel and on admin panel 
    public function tryToTestChoiceMakerProcess(AcceptanceTester $I)
    {
        if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

    	return;	//TODO run this test only if sample data env flag is set 

    	$this->startWithHomePageButtons($I);

    	$this->testStep1($I);

    }

    // test if editing the appearance of buttons works or not  
    public function modifyButtonAppearance(AcceptanceTester $I)
    {
        if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        return; //TODO run this test only if sample data env flag is set 

        $this->startWithHomePageButtons($I);

        $this->testStep1($I);

    }

    // test if editing the appearance of breadcrumb works or not  
    public function modifyBreadcrumbAppearance(AcceptanceTester $I)
    {
        if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        return; //TODO run this test only if sample data env flag is set 

        $this->startWithHomePageButtons($I);

        $this->testStep1($I);

    }

    // test if editing the appearance of filters works or not  
    public function modifyFiltersAppearance(AcceptanceTester $I)
    {
        if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        return; //TODO run this test only if sample data env flag is set 

        $this->startWithHomePageButtons($I);

        $this->testStep1($I);

    }

    // test if editing the appearance of item page button works or not  
    public function modifyItemPageButtonAppearance(AcceptanceTester $I)
    {
        if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        return; //TODO run this test only if sample data env flag is set 

        $this->startWithHomePageButtons($I);

        $this->testStep1($I);

    }

    // test if editing the functionality of filters works or not  
    public function modifyFilterFunctionality(AcceptanceTester $I)
    {
        if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        return; //TODO run this test only if sample data env flag is set 

        $this->startWithHomePageButtons($I);

        $this->testStep1($I);

    }

    // test if editing the functionality of mapping works or not  
    public function modifyMappingFunctionality(AcceptanceTester $I)
    {
        if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        return; //TODO run this test only if sample data env flag is set 

        $this->startWithHomePageButtons($I);

        $this->testStep1($I);

    }

}
