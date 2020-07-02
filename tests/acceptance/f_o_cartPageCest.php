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

	}

	public function continueToCheckout(AcceptanceTester $I, $is_inner_call=false) {

		if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }
        
		// $this->cartPage($I);

        // $I->executeJS('window.scrollTo( 0, 300 );');        //$I->scrollTo('Save'); 
        // $I->wait(3);

		// - I click on Proceed to checkout button
		$I->scrollToAndClick($I, 'Proceed to checkout', '//*[@id="post-7"]/div[1]/div/div/div[2]/div/div/a', $attempts=10, $delay=1); 
		// $text_or_xpath = 'Proceed to checkout';
		// $xpath_for_scroll = '//*[@id="post-7"]/div[1]/div/div/div[2]/div/div/a';
		
		// echo "called scrollToAndClick...";
  //       $I->scrollTo($xpath_for_scroll);
  //       $I->wait(3);
            
  //       for($i=1; $i<=10; $i++) {
  //           try { 
  //               $I->click($text_or_xpath);
  //               break;
  //           }
  //           catch(Exception $e) {
  //               echo "caught at error '".$e->getMessage()."' at scrollToAndClick on attempt number ".$i." after the delay of 1 seconds";
  //               $I->wait(1);
  //           }
  //       }
		
		// - I see in next page the text x etc.
		$I->waitForText('Billing details', 10);
		$I->see('Have a coupon?');
		$I->see('Place order');

	}

	protected function removeItemPairFromCart(AcceptanceTester $I) {
		
		//TODO when we implement this test after removing and verifying the empty cart we need to prepare the pair again by doing entire process again from home to till preview page.

		// // verify 
		// $I->waitForText('Cart is Empty', 10);

	}

}
