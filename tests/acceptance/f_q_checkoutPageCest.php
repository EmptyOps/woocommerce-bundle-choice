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

<<<<<<< HEAD
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

=======
	public function checkoutPage(AcceptanceTester $I, $is_inner_call=false) {
		
		if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }

		//TODO make it dynamic by saving this in session in previous steps and then here get it from session 
    	$this->price_of_product_step1 = "12.00";
    	$this->price_of_product_step2 = "15.00";

    	// verify 
    	$I->see('Billing details');
		$I->see('Have a coupon?');
		$I->see('Place order');
		
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
		//TODO check here if merged row appears properly or not
		if( !$is_inner_call ) { 
			$this->confirmOrderSummary($I);	
		}

<<<<<<< HEAD
=======
	}

	public function placeOrder(AcceptanceTester $I, $is_inner_call=false) {

		if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }
        
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
		// setup fields 
		$I->fillField("billing_first_name", 'hi000');
		$I->fillField("billing_last_name", 'last');
		$I->fillField("billing_company", 'Sphere Plugins');
<<<<<<< HEAD
		$I->fillField("billing_country", 'IN');
		$I->fillField("billing_address_1", '410');
		$I->fillField("billing_address_2", 'Utran');
		$I->fillField("billing_city", 'Surat');
		$I->fillField("billing_state", 'GJ');
=======
		// $I->fillField("billing_country", 'IN');
		$I->fillField("billing_address_1", '410');
		$I->fillField("billing_address_2", 'Utran');
		$I->fillField("billing_city", 'Surat');
		// $I->fillField("billing_state", 'GJ');
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
		$I->fillField("billing_postcode", '394105');
		$I->fillField("billing_phone", '8347408752');
		$I->fillField("billing_email", 'sales@sphereplugins.com');

<<<<<<< HEAD
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
=======
		$I->executeJS('window.scrollTo( 0, 300 );');		
		$I->wait(3);

		// place order
		$I->click('//*[@id="place_order"]');	//('PLACE ORDER');

		// verify if order placed properly on the thank you page
		$I->waitForText('Order received', 10, 'h1');
		$I->see('sales@sphereplugins.com');
		$I->see('Direct bank transfer', 'strong');
		$I->see('8347408752');

	}

	protected function confirmOrderSummary(AcceptanceTester $I) {
		
		// TODO implement complete check which ensures in single row UI widget the entire item pair is displayed and not in two 

		// at least price check is done but however even for this it needs to confirm that it check the order summary row price and not of any subtotal or total. 
		$I->see($this->price_of_product_step1+$this->price_of_product_step2);	
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3

	}

}
