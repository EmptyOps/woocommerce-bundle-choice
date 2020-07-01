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

<<<<<<< HEAD
    function myAccountPage(AcceptanceTester $I) {
		
		//here it is better if we can simply go to my account page via login or even better if WebDriver can keep the previous session alive 
		if( false ) {
	    	// go to the preview page of step 3
	    	require_once 'f_q_checkoutPageCest.php';
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
=======
    public function myAccountPage(AcceptanceTester $I) {

    	if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }

    	//TODO make it dynamic by saving this in session in previous steps and then here get it from session 
    	$this->price_of_product_step1 = "12.00";
    	$this->price_of_product_step2 = "15.00";
		
		//here if session is not detected than try to keep the previous session alive and it must be possible in WebDriver 
		$I->amOnPage('/my-account/orders/');	
		
		// verify 
    	$I->see('Orders','h1');
		$I->see('Status');
		$I->see('Total');
		$I->see($this->price_of_product_step1+$this->price_of_product_step2);
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3

	}

	public function verifyOrderDetails(AcceptanceTester $I, $is_inner_call=false) {

<<<<<<< HEAD
		$this->myAccountPage($I);

		// verify order details 
		$I->waitForText('Order details', 10, 'h2');
		$I->waitForText('hi000', 10, 'address');
		$I->waitForText('Direct bank transfer', 10, 'td');
		$I->waitForText('08347408752', 10, 'p');
=======
		if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }
        
		// go to detail page 
		$I->click('//*[@id="post-9"]/div[1]/div/div/div/table/tbody/tr[1]/td[5]/a');	//click on latest order link using xPath

		// verify order details 
		$I->waitForText('Order details', 10, 'h2');

		$I->executeJS('window.scrollTo( 0, 300 );');		
		$I->wait(3);

		$I->see($this->price_of_product_step1+$this->price_of_product_step2);
		$I->see('hi000');
		$I->see('Direct bank transfer');
		$I->see('8347408752');
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3

		//TODO check here if merged row appears properly or not 
		if( !$is_inner_call ) { 
			$this->confirmMergedRow($I);	
		}

	}

<<<<<<< HEAD
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
=======
	protected function confirmMergedRow(AcceptanceTester $I) {
		
		// TODO implement complete check which ensures in single row UI widget the entire item pair is displayed and not in two 

		// at least price check is done but however even for this it needs to confirm that it is checking the row price and not of any subtotal or total. 
		$I->see($this->price_of_product_step1+$this->price_of_product_step2);
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3

	}

}
