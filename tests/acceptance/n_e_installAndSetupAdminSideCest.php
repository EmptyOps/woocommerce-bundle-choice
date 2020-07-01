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
<<<<<<< HEAD
=======
    	if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
    }

    // setup using setup wizard and sample data. 
    // TODO here important to note that to run test with sample data on fresh install this test either needs to be run first or coditionally in duplicate environment where the other tests which sets data manually are just skipped  
    public function tryToTestSetupUsingSampleData(AcceptanceTester $I)
    {
<<<<<<< HEAD
    	return;	//TODO run this test only if sample data env flag is set 

    	//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

=======
    	if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        // TODO instead here add/prepare the sample data cest class and call that from here  

        // HOLD FOR REMOVAL
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-configuration');
		
		// verify the tab
		$I->see('This section will help you add sample data and configurations');

		// start sample data insert process  
		$I->click('Click here for automated configuration and setup');

<<<<<<< HEAD
		// confirm if saved properly or not
		$I->reloadPage();	//reload page
		$I->click('Buttons');
		$I->see('Custom landing page');	//that is the position option selected
    }

    // try alternate widgets 
    public function tryToTestAlternateBreadcrumbWidgets(AcceptanceTester $I)
    {
=======
		// step 1
		$I->reloadPage();	//reload page
		$I->click('Buttons');
		$I->see('Custom landing page');	//that is the position option selected

		// step 2

		// step 3

		// END HOLD FOR REMOVAL

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

>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
    	return;	//TODO run this test only if sample data env flag is set 
    }

	// try alternate widgets 
<<<<<<< HEAD
    public function tryToTestAlternateFilterWidgets(AcceptanceTester $I)
    {
=======
    public function tryToTestAlternateFilterWidgets(AcceptanceTester $I, $is_inner_call=false)
    {
    	if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

		// intended to call this function from front checks classes only
        if( !$is_inner_call ) {
        	return;
        }

>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
    	return;	//TODO run this test only if sample data env flag is set 
    }

}
