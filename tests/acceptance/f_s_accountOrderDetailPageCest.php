<?php 

class f_s_accountOrderDetailPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    function myAccountPage(AcceptanceTester $I) {
		
		//here it is better if we can simply go to my account page via login or even better if WebDriver can keep the previous session alive 
		if( false ) {
	    	// go to the preview page of step 3
	    	require_once dirname(__FILE__).'f_q_checkoutPageCest.php';
	    	$f_q_checkoutPageCestObj = new f_q_checkoutPageCest();
	    	$f_q_checkoutPageCestObj->continueToCheckout($I,true);

	    	// verify 
	    	$I->waitForText('Billing details', 10, 'h3');
			$I->waitForText('Have a coupon?', 10, 'div');
			$I->waitForText('Place order', 10, 'button');
		}
		else {

			//here if session is not detected than try to keep the previous session alive and it must be possible in WebDriver 
			$I->amOnPage('/my-account/orders/');	
			$I->click('VIEW', 'a');	

		}

	}

	public function verifyOrderDetails(AcceptanceTester $I, $is_inner_call=false) {

		$this->myAccountPage($I);

		// verify order details 
		$I->waitForText('Order details', 10, 'h2');
		$I->waitForText('hi000', 10, 'address');
		$I->waitForText('Direct bank transfer', 10, 'td');
		$I->waitForText('08347408752', 10, 'p');

		//TODO check here if merged row appears properly or not 
		if( !$is_inner_call ) { 
			$this->confirmMergedRow($I);	
		}

	}

	function confirmMergedRow(AcceptanceTester $I) {
		
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
