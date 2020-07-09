<?php 

class n_g_addSampleDataProcessCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function step1(AcceptanceTester $I, $is_inner_call=false)
    {
    	if( 
    			!$is_inner_call	//so far these tests are called internally only from the class installAndSetupAdmin
    			||
    			!$I->test_allowed_in_this_environment("n_") 
    		) {
            return;
        }

        //
        // Go to step1   
        //
        $I->amOnPage('/wp-admin/admin.php?page=eowbc-configuration');
		
		// verify the tab
		$I->see('This section will help you add sample data and configurations');

		// start sample data insert process  
		$I->click('Click here for automated configuration and setup');

		//
        // check/uncheck checkboxes of category 
		//
		

        // click continue


        // HOLD FOR REMOVAL
		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-configuration');
		
		// verify the tab
		$I->see('This section will help you add sample data and configurations');

		// start sample data insert process  
		$I->click('Click here for automated configuration and setup');

		// step 1
		$I->reloadPage();	//reload page
		$I->click('Buttons');
		$I->see('Custom landing page');	//that is the position option selected

		// step 2

		// step 3

		// END HOLD FOR REMOVAL

    }
}
