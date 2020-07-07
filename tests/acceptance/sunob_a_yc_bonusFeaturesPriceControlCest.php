<?php 

class sunob_a_yc_bonusFeaturesPriceControlCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function addPricingMethod(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-price-control');

		$I->see('Set pricing method to update price in bulk');

		// 
		$I->executeJS("jQuery('#jpc_field_dropdown_div').dropdown('set selected', 'metal-color');");	//better than setting 1 directly is to select the nth element that has value 1 
		$I->executeJS("jQuery('#jpc_compare_dropdown_div').dropdown('set selected', 'in');");	//better than setting 1 directly is to select the nth element that has value 1 
		$I->executeJS("jQuery('#jpc_values_drop_1__dropdown_div').dropdown('set selected', 'yellow');");	//better than setting 1 directly is to select the nth element that has value 1 
		
		// save 
		$I->click('Add Pricing Method'); 	

		// verify
		$I->see('Attribute', 'td');	//$I->see('4px', 'input');	//I verify that I can see "button tagline..." inside input tag 
		$I->see('In', 'td');	//$I->see('4px', 'input');	//I verify that I can see "button tagline..." inside input tag 
		$I->see('Yellow', 'td');	//$I->see('4px', 'input');	//I verify that I can see "button tagline..." inside input tag 

	}

	public function savePricingMethod(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

		// TODO here first need to ensure that % works and its related help text or the label text is visible for required user experience. 
		$I->fillField('regular_price', '');		//TODO here when its blank it fires required error, but let's see we may need it to work with none specified for regular price. However, one thing noted that 0 works in regular price field. 
		$I->fillField('sales_price', '-1');		//value is in percent
		
		$I->scrollTo('//*[@id="jpc_add_price_ctl"]', -300, -100);
		$I->wait(3);

		// save 
		$I->click('Save Pricing Method'); 
		$I->wait(1);	

		// verify save
		$I->see('Metal Color: Yellow', 'td');	//$I->see('4px', 'input');	//I verify that I can see "button tagline..." inside input tag 

	}

	public function saveAndUpdatePrices(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }
		
		// save and update prices 
		$I->click('Save and Update Prices'); 	

		// verify save
		$I->waitForText('product(s) prices updated', 10);	//$I->see('4px', 'input');	//I verify that I can see "button tagline..." inside input tag 

	}

	public function editExistingAndUpdate(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-price-control');

		$I->see('Set pricing method to update price in bulk');

		// TODO we need to give edit exiting rules option so that user can actually reuse the rule

		// save and update prices 
		$I->click('Save and Update Prices'); 	

		// verify save
		$I->waitForText('product(s) prices updated', 10);	//$I->see('4px', 'input');	//I verify that I can see "button tagline..." inside input tag 

	}

}
