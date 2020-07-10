<?php 

class n_ga_preprareForFrontendTestsCest extends n_f_adminSideSetupCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function setSpecificTemplates(AcceptanceTester $I)
    {
    	if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        // set specific breadcrumb template if debuggin any issue
        $this->setAlternateBreadcrumbWidget($I, 'template_1');

        // set specific filter template if debuggin any issue
        $this->setAlternateFilterWidget($I, 'fc2', 0);	// first category
        $this->setAlternateFilterWidget($I, 'sc4', 1);	// second category
        
    }

}
