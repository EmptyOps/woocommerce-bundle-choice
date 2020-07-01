<?php 

class f_g_homeCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

<<<<<<< HEAD
    function configureButtonPositionForHome(AcceptanceTester $I) {

        //login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
        $I->loginAsAdmin();
        $I->see( 'Dashboard' );
=======
    protected function configureButtonPositionForHome(AcceptanceTester $I) {

        if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }

        //login to admin panel, assumed from the last tests since the webdriver maintains previous session. 
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3

        /* buttons tab */
        // go to the page
        $I->amOnPage('/wp-admin/admin.php?page=eowbc-configuration');
        // echo $I->grabPageSource();
        
        // go to the tab
        // $I->click('General');
        $I->click('Buttons');
        $I->see('Choose where you want to display');

        // select button position
        // // $I->selectOption('form select[name=config_buttons_page]', 'Premium');
        // // $I->fillField('config_buttons_page', '1');    
        // $I->click('#config_buttons_page_dropdown_div');
        // $I->click('Home page only'); //('#config_buttons_page_dropdown_div > div.menu.transition.visible > div:nth-child(2)');
        $I->executeJS("jQuery('#config_buttons_page_dropdown_div').dropdown('set selected', 1);");  //better than setting 1 directly is to select the nth element that has value 1 

        // save 
        $I->click('Save');

        // confirm if saved properly or not
        $I->reloadPage();   //reload page
        $I->click('Buttons');
        $I->see('Home page only'); //that is the position option selected
    }

    public function testChoiceButtonWidgetOnHome(AcceptanceTester $I) {
		
<<<<<<< HEAD
=======
        if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }

>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
        $this->configureButtonPositionForHome($I);

    	// go to the home page
		$I->amOnPage('/');

<<<<<<< HEAD
=======
        // $I->executeJS('window.scrollTo( 0, 300 );');      
        // $I->wait(3);

>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
		// Check if buttons with text x are visible 
        $I->see('Start with Diamond');

		// I click on button one and I see in next page text like 1 {button text}
        $I->click('Start with Diamond');
<<<<<<< HEAD
        $I->waitForText('1', 10, 'div');
        $I->waitForText('CHOOSE A', 10, 'div');
        $I->waitForText('DIAMOND', 10, 'div');
        $I->waitForText('2', 10, 'div');
        $I->waitForText('PREVIEW', 10, 'div');
=======
        $I->waitForText('CHOOSE A', 10);    
        $I->see('1');
        $I->see('DIAMOND');
        $I->see('2');
        $I->see('PREVIEW');
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3

        //go back to the home page
        $I->moveBack();

		// I click on button two  and I see in next page text like 1 {button text} of second Button
        $I->click('Start with Setting');
<<<<<<< HEAD
        $I->waitForText('1', 10, 'div');
        $I->waitForText('CHOOSE A', 10, 'div');
        $I->waitForText('SETTING', 10, 'div');
        $I->waitForText('2', 10, 'div');
        $I->waitForText('PREVIEW', 10, 'div');
=======
        $I->waitForText('CHOOSE A', 10);    
        $I->see('1');
        $I->see('SETTING');
        $I->see('2');
        $I->see('PREVIEW');
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3

	}

    public function testChoiceButtonWidgetBasedOnShortcode(AcceptanceTester $I) {
        
<<<<<<< HEAD
=======
        if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }
        
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
        // TODO

    }

}
