<?php 

class f_i_step1Cest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    protected function categoryPage(AcceptanceTester $I) {
		
		if( !$I->test_allowed_in_this_environment("a_") ) {
            return;
        }

    	// go to the category page page
		$I->amOnPage('/');	
		$I->click('Start with Diamond');
		$I->waitForText('CHOOSE A', 10);    

		// - I choose filter options and then I check if x  products are found 
		$I->executeJS("jQuery('#text_slider_price').slider('set rangeValue', 14, 15);");	
		$I->waitForText('No products were found', 10);

		$I->executeJS("jQuery('#text_slider_price').slider('set rangeValue', 12, 15);");
		$I->waitForText('Test diamond 1', 10);  	
		
		// - I click on product image of first product from the search results
		$price_of_product = "12.00";	//TODO make it dynamic 
		$I->click('//*[@id="main"]/ul/li/a/img');
		$I->see('Add to bag...');	//Add to bag... is the text set on appearance module during admin test
		
		return $price_of_product;
	}

	public function itemPage(AcceptanceTester $I) {
		
		if( !$I->test_allowed_in_this_environment("a_") ) {
            return;
        }

		// - I choose filter options and then I check if x  products are found
		// - I click on product image of first product from the search results
		$price_of_product = $this->categoryPage($I);

		// - I see continue button
		$I->see('Add to bag...');

		// with text x 
		$I->see('150.00');	//market price
		$I->see($price_of_product);
		$I->see('Additional information');

		// - I click on continue button
		$I->click('Add to bag...');

		// - I see in next page the text "${price of Step 1 item's price}"
		$I->waitForText($price_of_product, 10);
		$I->see('VIEW');
		$I->see('REMOVE');

		// check remove action 
		$this->checkBackRemoveAction($I);

		//set current url in the session so that next step can continue from there. 
			//TODO note that we need to clean session from the very first test. 
		$I->set_session('wbc_main_process_test_curr_url', $I->getCurrentUrl());

		return $price_of_product;
	}

	protected function checkBackRemoveAction(AcceptanceTester $I) {
		
		// // - I choose filter options and then I check if x  products are found
		// // - I click on product image of first product from the search results
		// $price_of_product = $this->categoryPage($I);

		// // - I see continue button
		// $I->see('Add to bag...');

		// // with text x ???
		// $I->see($price_of_product, 'span');

		// // - I click on continue button
		// $I->click('Add to bag...');

		// // - I see in next page the text "${price of Step 1 item's price}"
		// $I->waitForText($price_of_product, 10, 'span');
		// $I->waitForText('VIEW', 10, 'a');
		// $I->waitForText('REMOVE', 10, 'a');

	}

	// also do here the product not found test here and check if that Oooops error message and error reporting options shows or not
	function checkProductNotFoundDueToMissingMapping(AcceptanceTester $I) {
		
		if( !$I->test_allowed_in_this_environment("a_") ) {
            return;
        }
        
		return;	//TODO implement it later. for now the manual testing is done and given priority to other test automations so do this later as soon as we get the chance. 

	}

}
