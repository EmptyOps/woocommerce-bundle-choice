<?php 

class a_e_setupWizardCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    protected function step1(AcceptanceTester $I, $suite_name_prefix=false) {

    	if( !$I->test_allowed_in_this_environment("a_") && !$suite_name_prefix ) {
            return;
        }

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		$I->amOnPage('/wp-admin/admin.php?page=eowbc-configuration');
		$I->click('Buttons');
		$I->see('Choose where you want to display');
		$I->see('lkjsdkfghkdjsfhgksjdfbvmxn');


		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc&wbc_setup=1');
		$I->see('Choose inventory');

		// select inventory
		$I->executeJS("jQuery('[name=\"eo_wbc_inventory_type\"]').parent().dropdown('set selected','jewelry');");	//better than setting val directly is to select the nth element that has value val 
		
		// save 
		$I->click('Next');
		// echo $I->grabPageSource();
		// $I->wait(5);
		// echo $I->getCurrentUrl();

		// confirm if saved properly or not
		$I->waitForText('Ring Builder', 10); // secs	//if we see Ring Builder on next step than it's properly saved
	}

	protected function step2(AcceptanceTester $I, $suite_name_prefix=false) {

		if( !$I->test_allowed_in_this_environment("a_") && !$suite_name_prefix ) {
            return;
        }

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc&wbc_setup=1');
		$I->see('Choose inventory');

		// select inventory. TODO here there is a bug if inventory is saved than it should repopulate here, so remove this step once the bug is fixed
		$I->executeJS("jQuery('[name=\"eo_wbc_inventory_type\"]').parent().dropdown('set selected','jewelry');");	//better than setting val directly is to select the nth element that has value val 

		// continue to next step  
		$I->click('Next');
		$I->waitForText('Back', 10);	

		// select features
		$I->executeJS("jQuery('#ring_builder').parent().checkbox('set checked', 1);");	

		// save 
		$I->click('Next');
		$I->waitForText('Skip and finish', 10);	

		// confirm if saved properly or not
		$I->click('Back');
		$I->waitForText('Ring Builder', 10);	//TODO here should actually confirm if the switch is on, do it by fetching javascript value and comparing it but it will required javascript See etc function. And return statement from javascript actually returns result to php as per webdriver doc
	}

	protected function step3(AcceptanceTester $I, $suite_name_prefix=false) {

		if( !$I->test_allowed_in_this_environment("a_") && !$suite_name_prefix ) {
            return;
        }
        
		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc&wbc_setup=1');
		$I->see('Choose inventory');

		// select inventory. TODO here there is a bug if inventory is saved than it should repopulate here, so remove this step once the bug is fixed
		$I->executeJS("jQuery('[name=\"eo_wbc_inventory_type\"]').parent().dropdown('set selected','jewelry');");	//better than setting val directly is to select the nth element that has value val 

		// continue to next step  
		$I->click('Next');
		$I->waitForText('Back', 10);	

		// select features. TODO here there is a bug if feature is saved than it should repopulate here, so remove this step once the bug is fixed
		$I->executeJS("jQuery('#ring_builder').checkbox('set checked');");	

		// continue to next step 
		$I->click('Next');
		$I->waitForText('Skip and finish', 10);	

		// click sample data action. however, the sample data option should be used and tested from sample data's own test class here we just go to sample data page and see if its loaded or not
		// $I->click(['xpath' => '//span[@class="tab tab-selected tab-marked" and text()="Add sample and Finish"]']);	
		$I->click('#create_product');
		$I->waitForText('You are at step 1 of 3 steps.', 10);

		//go back to the page
		$I->moveBack();

		// now skip sample data and finish.
		$I->click('Skip and finish');

		// confirm if saved properly or not
		$I->waitForText("Product bundling based on user's choice.", 10);	
	}

}
