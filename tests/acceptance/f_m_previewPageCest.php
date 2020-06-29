<?php 

class f_m_previewPageCest
{
	public $price_of_product_step1 = null;
	public $price_of_product_step2 = null;

    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function previewPage(AcceptanceTester $I) {

    	if( !$I->test_allowed_in_this_environment("a_") ) {
            return;
        }
		
    	//TODO make it dynamic by saving this in session in previous steps and then here get it from session 
    	$this->price_of_product_step1 = "12.00";
    	$this->price_of_product_step2 = "15.00";

    	// verify 
    	$I->see($this->price_of_product_step1+$this->price_of_product_step2);
    	$I->see('Add This To Cart');


		// check view action 
		$this->checkViewActionStep2($I);

		// check remove action 
		$this->checkBackRemoveAction($I);

		// check change(same as remove though but at different place) action 
		$this->checkChangeActionPreviewPage($I);

	}

	public function addToCart(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("a_") ) {
            return;
        }

		// $this->previewPage($I);

		// - I click on add this to cart button
		$I->click('Add This To Cart');

		// - I see in next page the text "CART", "Quantity", "Subtotal" etc.
		$I->waitForText('Cart', 10);
		$I->see('Quantity');
		$I->see('Subtotal');
		$I->see($this->price_of_product_step1+$this->price_of_product_step2);	

		//TODO check here if merged row appears properly or not

	}

	protected function checkViewActionStep2(AcceptanceTester $I) {
		
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

	protected function checkChangeActionPreviewPage(AcceptanceTester $I) {
		
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
