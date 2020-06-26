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

	}

	public function itemPage(AcceptanceTester $I) {
		
		// - I choose filter options and then I check if x  products are found
		// - I click on product image of first product from the search results
		$this->categoryPage($I);

		// - I see continue button
		echo $I->grabPageSource();
		$I->see('Continue');

		// with text x ???

		// - I click on continue button
		$I->click('Continue');

		// - I see in next page the text "${price of Step 1 item's price}"
		$I->waitForText('$???', 10);

	}

}
