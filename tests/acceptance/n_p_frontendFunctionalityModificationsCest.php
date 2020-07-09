<?php 

class n_p_frontendFunctionalityModificationsCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }
    
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
