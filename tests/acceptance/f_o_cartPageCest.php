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

<<<<<<< HEAD
	function cartPage(AcceptanceTester $I) {
		
    	// go to the preview page of step 3
    	require_once 'f_m_previewPageCest.php';
    	$f_m_previewPageCestObj = new f_m_previewPageCest();
    	$f_m_previewPageCestObj->addToCart($I);

    	// verify 
    	$I->waitForText('Cart', 10, 'h1');
		$I->waitForText('Quantity', 10, 'th');
		$I->waitForText('Subtotal', 10, 'th');
=======
	public function cartPage(AcceptanceTester $I, $is_inner_call=false) {
		
		if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }

    	//TODO make it dynamic by saving this in session in previous steps and then here get it from session 
    	$this->price_of_product_step1 = "12.00";
    	$this->price_of_product_step2 = "15.00";

		// test remove action 
		if( !$is_inner_call ) { 
			$this->removeItemPairFromCart($I);
		}

    	// verify 
    	$I->see('Cart', 'h1');
		$I->see('Quantity');
		$I->see('Subtotal');
		
		//TODO check here if merged row appears properly or not
		if( true || !$is_inner_call ) { 
			$I->see($this->price_of_product_step1+$this->price_of_product_step2);	
		}
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3

	}

	public function continueToCheckout(AcceptanceTester $I, $is_inner_call=false) {

<<<<<<< HEAD
		$this->cartPage($I);

		//TODO check here if merged row appears properly or not
		if( !$is_inner_call ) { 
			$I->see($this->price_of_product_step1+$this->price_of_product_step2, 'span');	
		}
=======
		if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }
        
		// $this->cartPage($I);
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3

		// - I click on Proceed to checkout button
		$I->click('Proceed to checkout');

		// - I see in next page the text x etc.
<<<<<<< HEAD
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
=======
		$I->waitForText('Billing details', 10);
		$I->see('Have a coupon?');
		$I->see('Place order');

	}

	protected function removeItemPairFromCart(AcceptanceTester $I) {
		
		//TODO when we implement this test after removing and verifying the empty cart we need to prepare the pair again by doing entire process again from home to till preview page.

		// // verify 
		// $I->waitForText('Cart is Empty', 10);
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3

	}

}
