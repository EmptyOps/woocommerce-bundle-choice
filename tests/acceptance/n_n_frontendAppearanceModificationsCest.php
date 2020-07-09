<?php 

class n_n_frontendAppearanceModificationsCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

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
    
}
