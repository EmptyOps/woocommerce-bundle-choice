<?php 

//class intended to do a normal scenario test in a way in which normally users would try the plugin
class n_e_installAndSetupAdminSideCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // install
    public function tryToTestInstall(AcceptanceTester $I)
    {
    	if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

    }

    protected function setupWizard(AcceptanceTester $I) {
        
        

    }

    // setup using setup wizard and sample data. 
    // TODO here important to note that to run test with sample data on fresh install this test either needs to be run first or coditionally in duplicate environment where the other tests which sets data manually are just skipped  
    public function tryToTestSetupUsingSampleData(AcceptanceTester $I)
    {
    	if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        // setup wizard process
        $this->setupWizard($I);

        // sample data
        $addSampleDataProcessCest = new 

		// step 1
        

		// step 2

		// step 3

    }

    // try alternate widgets 
    public function tryToTestAlternateBreadcrumbWidgets(AcceptanceTester $I, $is_inner_call=false)
    {
    	if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        // intended to call this function from front checks classes only
        if( !$is_inner_call ) {
        	return;
        }

    	return;	//TODO run this test only if sample data env flag is set 
    }

	// try alternate widgets 
    public function tryToTestAlternateFilterWidgets(AcceptanceTester $I, $is_inner_call=false)
    {
    	if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

		// intended to call this function from front checks classes only
        if( !$is_inner_call ) {
        	return;
        }

    	return;	//TODO run this test only if sample data env flag is set 
    }

}
