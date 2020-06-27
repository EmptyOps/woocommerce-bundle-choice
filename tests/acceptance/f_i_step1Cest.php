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

    function categoryPage(AcceptanceTester $I) {
		
    	// go to the category page page
		$I->amOnPage('/');	
		$I->click('Start with Diamond');

		// - I choose filter options and then I check if x  products are found


		// also do here the product not found test here and check if that Oooops error message and error reporting options shows or not


		// - I click on product image of first product from the search results
		$price_of_product = "12.00";	//TODO make it dynamic 
		$I->click('//*[@id="main"]/ul/li/a/img');
		$I->waitForText('Add to bag...', 10);	//Add to bag... is the text set on appearance module during admin test

		return $price_of_product;
	}

	public function itemPage(AcceptanceTester $I) {
		
		// - I choose filter options and then I check if x  products are found
		// - I click on product image of first product from the search results
		$price_of_product = $this->categoryPage($I);

		// - I see continue button
		$I->see('Add to bag...');

		// with text x ???
		$I->see($price_of_product, 'span');

		// - I click on continue button
		$I->click('Add to bag...');

		// - I see in next page the text "${price of Step 1 item's price}"
		$I->waitForText($price_of_product, 10, 'span');
		$I->waitForText('VIEW', 10, 'a');
		$I->waitForText('REMOVE', 10, 'a');

		// check remove action 
		$this->checkBackRemoveAction($I);

		return $price_of_product;
	}

	function checkBackRemoveAction(AcceptanceTester $I) {
		
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

}
