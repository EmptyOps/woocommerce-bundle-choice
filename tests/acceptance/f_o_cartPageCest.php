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

	protected function cartPage(AcceptanceTester $I, $suite_name_prefix=false) {
		
		// if( !$I->test_allowed_in_this_environment("f_") ) {
  //           return;
  //       }

    	//TODO make it dynamic by saving this in session in previous steps and then here get it from session 
    	$this->price_of_product_step1 = $suite_name_prefix == "n_" ? $I->get_configs('first_product_price',$suite_name_prefix) : "12.00";
    	$this->price_of_product_step2 = $suite_name_prefix == "n_" ? $I->get_configs('second_product_price',$suite_name_prefix) : "15.00";

		// test remove action 
		if( $suite_name_prefix == "f_" ) { 
			$this->removeItemPairFromCart($I);
		}

    	// verify 
    	$I->see('Cart', 'h1');
		$I->see('Quantity');
		$I->see('Subtotal');
		
		//TODO check here if merged row appears properly or not
		if( true || $suite_name_prefix == "f_" ) { 
			$I->see($this->price_of_product_step1+$this->price_of_product_step2);	
		}

	}

	protected function continueToCheckout(AcceptanceTester $I, $suite_name_prefix=false) {

		// if( !$I->test_allowed_in_this_environment("f_") ) {
  //           return;
  //       }
        
		// $this->cartPage($I);

        // $I->executeJS('window.scrollTo( 0, 300 );');        //$I->scrollTo('Save'); 
        // $I->wait(3);

		// - I click on Proceed to checkout button
        $I->scrollTo( $suite_name_prefix == "f_" ? '//*[@id="post-7"]/div[1]/div/div/div[2]/div/div/a' : '/html/body/main/article/div[1]/div/div/div[2]/div/div/a', 0, -100);
        $I->wait(3);
        for($i=1; $i<=10; $i++) {
            try { 
                $I->click('Proceed to checkout');
                break;
            }
            catch(Exception $e) {
                echo "caught at error '".$e->getMessage()."' at scrollToAndClick on attempt number ".$i.", trying again after the delay of 1 seconds";
                $I->wait(1);
            }
        }
		
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
