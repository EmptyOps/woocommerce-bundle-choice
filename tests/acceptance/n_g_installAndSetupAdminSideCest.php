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

            // TODO are there any other checks ??? think of what user would be thinking regarding admin side after adding the sample data. 

                // what are all the admin side functionality are for? 
                    // to answer this kind of question links to doc, help icon based popu, walk though guides etc. can help. Should start with links to doc or help icon

                // what the x module do?     
                    // to answer this kind of question links to doc, help icon based popu, walk though guides etc. can help. Should start with links to doc or help icon

                // how to control/manage/operate the plugin? how to actually configure the plugin for their own use? how to customize it if required? 

                // how to customize styling as per their need? 

                // will this plugin work with some other xyz plugins and in abc scenarios/environments like multisite, mutlivendor, multi language, multi currency etc. 

                // any other ?

    }

    // try alternate widgets 
    public function tryToTestAlternateBreadcrumbWidgets(AcceptanceTester $I)
    {
    	if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        $templates = array();
        $templates_name = array();
        // check default template
        $templates[] = 'default';
        $templates_name[] = 'Default';
        $selected_templts = array(0);

        $templates_verification_content = array();
        $templates_verification_content[0]['html_source'] = '<div class="column">1</div>';
        $templates_verification_content[1]['html_source'] = '<div class="column">1</div>';  // TODO need to find something unique here since default template also has similar source, we can always place ids in container and use to confirm the test but anything that is loaded outside of the widget template is not valid for tests.  
        $templates_verification_content[2]['html_source'] = '<div class="ui column left aligned">1</div>';

        // check one random template from 2 alternate templates available 
        $attempts = 0;
        while($attempts <= 100 /*keep a check, while loops can be horrible :-( */) {
            $attempts++;

            $rnd = rand(1, 2);
            if( !in_array('template_'.$rnd, $templates) ) {
                $templates[] = 'template_'.$rnd;
                $templates_name[] = 'Template '.$rnd;
                $selected_templts[] = $rnd;

                if( sizeof($templates) >= 2) { // break when one random are selected
                    break;
                } 
            }
        }

        if( sizeof($templates) > 2) { // break when one random are selected
            throw new Exception("More than one random templates are selected", 1);
        }

        $current_uri = "";
        for($i=0; $i<sizeof($templates); $i++) {
            if( $i > 0 ) {
                // change the template 
                $this->setAlternateBreadcrumbWidget($I, $templates[$i], $templates_name[$i]);
            }
        
            if( $current_uri == "" ) {

                // go to the page
                $this->gotoStep($I);

                // keep current uri so that we can go there directly next time
                $current_uri = $I->getCurrentUri(true);
            }
            else {
                $I->amOnPage($current_uri);
            }
            
            //verify breadcrumb by its html source
            $I->seeInSource($templates_verification_content[$selected_templts[$i]]['html_source']);   // we need some unique way to indentify that the right template is loaded, if we ask dev team to add some unique id it etc. for mere identification than that is not quite effect for testing the development
        }

        // set back to default or let the random being tested
        if( rand(1, 100) > 50 ) {
            $this->setAlternateBreadcrumbWidget($I, $templates[0], $templates_name[$i]);
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

            $selected_templts = array(1);

            $templates_verification_content = array();
            $templates_verification_content[1] = array( 'html_source' => '<div class="sixteen wide column">', 'not_html_source' => '<i class="question circle outline icon" data-help="' /*since template 2 also has above trait we need to negate*/ );
            $templates_verification_content[2] = array( 'html_source' => '<div class="ui text menu">' );  
            $templates_verification_content[3] = array( 'html_source' => '<div class="sixteen wide column">', 'html_source_1' => '<i class="question circle outline icon" data-help="' );
            $templates_verification_content[4] = array( 'html_source' => '<div style="visibility: hidden;">Asscher</div>' );


            // check two random template from 3 alternate templates available 
            $attempts = 0;
            while($attempts <= 100 /*keep a check, while loops can be horrible :-( */) {
                $attempts++;

                $rnd = rand(2, 4);
                if( !in_array( ($cat == 0 ? 'fc'.$rnd : 'sc'.$rnd), $templates ) ) {
                    $templates[] = $cat == 0 ? 'fc'.$rnd : 'sc'.$rnd;
                    $selected_templts[] = $rnd;

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
                    $this->gotoStep($I, $cat);  

                    // keep current uri so that we can go there directly next time
                    $current_uri = $I->getCurrentUri(true);
                }
                else {
                    $I->amOnPage($current_uri);
                }
                
                //verify breadcrumb by its html source
                foreach ($templates_verification_content[$selected_templts[$i]] as $vk => $vv) {
                    if( strpos($vk, "html_source") !== false ) {
                        $I->seeInSource($vv);   // we need some unique way to indentify that the right template is loaded, if we ask dev team to add some unique id etc. for mere identification than that is not quite effective for testing the development
                    }
                    elseif( strpos($vk, "not_html_source") !== false ) {
                        $I->dontSeeInSource($vv);   
                    }
                }
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
