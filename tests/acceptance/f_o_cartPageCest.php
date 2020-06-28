<?php 

class f_o_cartPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

	function cartPage(AcceptanceTester $I) {
		
    	// go to the preview page of step 3
    	require_once dirname(__FILE__).'f_m_previewPageCest.php';
    	$f_m_previewPageCestObj = new f_m_previewPageCest();
    	$f_m_previewPageCestObj->addToCart($I);

    	// verify 
    	$I->waitForText('Cart', 10, 'h1');
		$I->waitForText('Quantity', 10, 'th');
		$I->waitForText('Subtotal', 10, 'th');

	}

	public function continueToCheckout(AcceptanceTester $I, $is_inner_call=false) {

		$this->cartPage($I);

		//TODO check here if merged row appears properly or not
		if( !$is_inner_call ) { 
			$I->see($this->price_of_product_step1+$this->price_of_product_step2, 'span');	
		}

		// - I click on Proceed to checkout button
		$I->click('Proceed to checkout');

		// - I see in next page the text x etc.
		$I->waitForText('Billing details', 10, 'h3');
		$I->waitForText('Have a coupon?', 10, 'div');
		$I->waitForText('Place order', 10, 'button');

		if( !$is_inner_call ) { 
			// test remove 
			$this->removeItemPairFromCart($I);

			// verify 
			$I->waitForText('Cart is Empty', 10);
		}

	}

	function removeItemPairFromCart(AcceptanceTester $I) {
		
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
