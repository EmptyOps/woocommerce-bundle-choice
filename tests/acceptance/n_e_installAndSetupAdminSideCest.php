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

    // setup using setup wizard and sample data. 
    // TODO here important to note that to run test with sample data on fresh install this test either needs to be run first or coditionally in duplicate environment where the other tests which sets data manually are just skipped  
    public function tryToTestSetupUsingSampleData(AcceptanceTester $I)
    {
    	if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

    	return;	//TODO run this test only if sample data env flag is set 

    	//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-configuration');
		
		// verify the tab
		$I->see('This section will help you add sample data and configurations');

		// start sample data insert process  
		$I->click('Click here for automated configuration and setup');

		// confirm if saved properly or not
		$I->reloadPage();	//reload page
		$I->click('Buttons');
		$I->see('Custom landing page');	//that is the position option selected
    }

    // try alternate widgets 
    public function tryToTestAlternateBreadcrumbWidgets(AcceptanceTester $I)
    {
    	if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

    	return;	//TODO run this test only if sample data env flag is set 
    }

	// try alternate widgets 
    public function tryToTestAlternateFilterWidgets(AcceptanceTester $I)
    {
    	if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

    	return;	//TODO run this test only if sample data env flag is set 
    }

}
