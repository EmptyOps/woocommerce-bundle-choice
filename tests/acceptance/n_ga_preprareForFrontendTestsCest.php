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

        // TODO right after the related modifications tests are stable with default widgets, comment below widgets that are statically set to default

        //
        // set specific breadcrumb template if debuggin any issue
        //
        if( true ) {
            $I->set_session('wbc_suite_n__process_current_breadcrumb_template', 'default');
            $this->setAlternateBreadcrumbWidget($I, 'default');
        }
        
        //
        // set specific filter template if debuggin any issue
        //
        if( true ) {
            $I->set_session('wbc_suite_n__process_current_filter_template_0', 'fc1');
            $I->get_session('wbc_suite_n__process_current_filter_template_1', 'sc1');
            $this->setAlternateFilterWidget($I, 'fc1', 0);  // first category
            $this->setAlternateFilterWidget($I, 'sc1', 1);  // second category
        }
        
    }

}
