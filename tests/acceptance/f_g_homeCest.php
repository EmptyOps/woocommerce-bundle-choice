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

    function configureButtonPositionForHome(AcceptanceTester $I) {

        // webdriver maintains previous login session, let's see
        // //login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
        // $I->loginAsAdmin();
        // $I->see( 'Dashboard' );

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
		
        $this->configureButtonPositionForHome($I);

    	// go to the home page
		$I->amOnPage('/');

		// Check if buttons with text x are visible 
        $I->see('Start with Diamond');

		// I click on button one and I see in next page text like 1 {button text}
        $I->click('Start with Diamond');
        $I->waitForText('1', 10, 'div');
        $I->waitForText('CHOOSE A', 10, 'div');
        $I->waitForText('DIAMOND', 10, 'div');
        $I->waitForText('2', 10, 'div');
        $I->waitForText('PREVIEW', 10, 'div');

        //go back to the home page
        $I->moveBack();

		// I click on button two  and I see in next page text like 1 {button text} of second Button
        $I->click('Start with Setting');
        $I->waitForText('1', 10, 'div');
        $I->waitForText('CHOOSE A', 10, 'div');
        $I->waitForText('SETTING', 10, 'div');
        $I->waitForText('2', 10, 'div');
        $I->waitForText('PREVIEW', 10, 'div');

	}

    public function testChoiceButtonWidgetBasedOnShortcode(AcceptanceTester $I) {
        
        // TODO

    }

}
