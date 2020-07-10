<?php 

//class intended to do a normal scenario test in a way in which normally users would try the plugin
class n_g_installAndSetupAdminSideCest extends n_f_adminSideSetupCest
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

        // setup wizard process
            // now setup wizard process is called from its own class designed for "n_" suite of methods  

        // sample data process 
            // now sample data process is called from its own class designed for "n_" suite of methods 

		// TODO anything else that can go here?
            // admin side checks? No... since the user would simply want to check the front end. 

            // should test the link to sample page that should be available on admin General -> Sample Data tab  
            $I->see('Setup Done');

            $I->click('Check it out!');

            $I->waitForText($I->get_configs('first_button_text', 'n_'),10);
            $I->see($I->get_configs('second_button_text', 'n_'));

            // are there any other checks ??? think of what user would be thinking after adding the sample data. 
    }

    // try alternate widgets 
    public function tryToTestAlternateBreadcrumbWidgets(AcceptanceTester $I)
    {
    	if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        $templates = array();
        // check default template
        $templates[] = 'default';

        // check two random template from 3 alternate templates available 
        $attempts = 0;
        while($attempts <= 100 /*keep a check, while loops can be horrible :-( */) {
            $attempts++;

            $rnd = rand(1, 3);
            if( !in_array('template_'.$rnd, $templates) ) {
                $templates[] = 'template_'.$rnd;

                if( sizeof($templates) >= 3) { // break when two random are selected
                    break;
                } 
            }
        }

        if( sizeof($templates) > 3) { // break when two random are selected
            throw new Exception("More than two random templates are selected", 1);
        }

        $current_uri = "";
        for($i=0; $i<sizeof($templates); $i++) {
            if( $i > 0 ) {
                // change the template 
                $this->setAlternateBreadcrumbWidget($I, $templates[$i]);
            }
        
            if( $current_uri == "" ) {

                // go to the page
                $I->amOnPage('/design-your-own-ring/');

                $I->see($I->get_configs('first_button_text', 'n_'));
                $I->see($I->get_configs('second_button_text', 'n_'));

                $I->click($I->get_configs('first_button_text', 'n_'));

                // keep current uri so that we can go there directly next time
                $current_uri = $I->getCurrentUri();
            }
            else {
                $I->amOnPage($current_uri);
            }
            
            //verify breadcrumb by its html source
            $I->seeInSource('look for some unique source code of '.$templates[$i].' template');   // we need some unique way to indentify that the right template is loaded, if we ask dev team to add some unique id it etc. for mere identification than that is not quite effect for testing the development
        }

        // set back to default or let the random being tested
        if( rand(1, 100) > 50 ) {
            $this->setAlternateBreadcrumbWidget($I, $templates[0]);
        }

    }

	// try alternate widgets 
    public function tryToTestAlternateFilterWidgets(AcceptanceTester $I)
    {
    	if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        // for first category and second category. loop.
        for($cat=0; $cat<2; $cat++) {

            $templates = array();
            // check default template
            $templates[] = $cat == 0 ? 'fc1' : 'sc1';

            // check two random template from 3 alternate templates available 
            $attempts = 0;
            while($attempts <= 100 /*keep a check, while loops can be horrible :-( */) {
                $attempts++;

                $rnd = rand(2, 4);
                if( !in_array( ($cat == 0 ? 'fc'.$rnd : 'sc'.$rnd), $templates ) ) {
                    $templates[] = $cat == 0 ? 'fc'.$rnd : 'sc'.$rnd;

                    if( sizeof($templates) >= 3 ) { // break when two random are selected
                        break;
                    } 
                }
            }

            if( sizeof($templates) > 3) { // break when two random are selected
                throw new Exception("More than two random templates are selected", 1);
            }

            $current_uri = "";
            for($i=0; $i<sizeof($templates); $i++) {
                if( $i > 0 ) {
                    // change the template 
                    $this->setAlternateFilterWidget($I, $templates[$i], $cat);
                }
            
                if( $current_uri == "" ) {

                    // go to the page
                    $I->amOnPage('/design-your-own-ring/');

                    $I->see($I->get_configs('first_button_text', 'n_'));
                    $I->see($I->get_configs('second_button_text', 'n_'));

                    $I->click($I->get_configs('first_button_text', 'n_'));

                    if( $cat > 0 ) {
                        // go to second category filter
                        $I->scrollTo('//*[@id="main"]/ul/li/a/img');
                        $I->wait(3);

                        $I->click('//*[@id="main"]/ul/li/a/img');
                        $I->see('Continue');

                        //first select required options for variable product, otherwise it won't let us add into cart. 
                        $I->click('//*[@id="product-13"]/div[2]/form/table/tbody/tr/td[2]/div/span[2]/ul/li[1]/div');

                        // click on continue button
                        $I->click('Continue');

                        // verify 
                        $price_of_product = "12.00";    //TODO make it dynamic if its random in sample data or simply set it in config if the price is static in sample data. 
                        $I->waitForText($price_of_product, 10);
                    }

                    // keep current uri so that we can go there directly next time
                    $current_uri = $I->getCurrentUri();
                }
                else {
                    $I->amOnPage($current_uri);
                }
                
                //verify breadcrumb by its html source
                $I->seeInSource('look for some unique source code of '.$templates[$i].' template');   // we need some unique way to indentify that the right template is loaded, if we ask dev team to add some unique id etc. for mere identification than that is not quite effect for testing the development
            }
        }

        // set back to default or let the random being tested
        for($cat=0; $cat<2; $cat++) {
            if( rand(1, 100) > 50 ) {
                $this->setAlternateFilterWidget($I, $templates[0], $cat);
            }
        }

    }

}
