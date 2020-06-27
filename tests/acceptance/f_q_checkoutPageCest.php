<?php 

class f_q_checkoutPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

	function checkoutPage(AcceptanceTester $I) {
		
    	// go to the preview page of step 3
    	require_once 'f_o_cartPageCest.php';
    	$f_o_cartPageCestObj = new f_o_cartPageCest();
    	$f_o_cartPageCestObj->continueToCheckout($I,true);

    	// verify 
    	$I->waitForText('Billing details', 10, 'h3');
		$I->waitForText('Have a coupon?', 10, 'div');
		$I->waitForText('Place order', 10, 'button');

	}

	public function placeOrder(AcceptanceTester $I, $is_inner_call=false) {

		$this->checkoutPage($I);

		//TODO check here if merged row appears properly or not
		if( !$is_inner_call ) { 
			$this->confirmOrderSummary($I);	
		}

		// setup fields 
		$I->fillField("billing_first_name", 'hi000');
		$I->fillField("billing_last_name", 'last');
		$I->fillField("billing_company", 'Sphere Plugins');
		$I->fillField("billing_country", 'IN');
		$I->fillField("billing_address_1", '410');
		$I->fillField("billing_address_2", 'Utran');
		$I->fillField("billing_city", 'Surat');
		$I->fillField("billing_state", 'GJ');
		$I->fillField("billing_postcode", '394105');
		$I->fillField("billing_phone", '8347408752');
		$I->fillField("billing_email", 'sales@sphereplugins.com');

		// place order
		$I->click('PLACE ORDER');

		// verify if order placed properly on the thank you page
		$I->waitForText('Order received', 10, 'h1');
		$I->waitForText('sales@sphereplugins.com', 10, 'strong');
		$I->waitForText('Direct bank transfer', 10, 'strong');
		$I->waitForText('8347408752', 10, 'p');

	}

	function confirmOrderSummary(AcceptanceTester $I) {
		
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
