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
		
		//TODO check here if merged row appears properly or not
		if( !$is_inner_call ) { 
			$this->confirmOrderSummary($I);	
		}

	}

	public function placeOrder(AcceptanceTester $I, $is_inner_call=false) {

		if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }
        
		// setup fields 
		$I->fillField("billing_first_name", 'hi000');
		$I->fillField("billing_last_name", 'last');
		$I->fillField("billing_company", 'Sphere Plugins');
		// $I->fillField("billing_country", 'IN');
		$I->fillField("billing_address_1", '410');
		$I->fillField("billing_address_2", 'Utran');
		$I->fillField("billing_city", 'Surat');
		// $I->fillField("billing_state", 'GJ');
		$I->fillField("billing_postcode", '394105');
		$I->fillField("billing_phone", '8347408752');
		$I->fillField("billing_email", 'sales@sphereplugins.com');


		$I->executeJS('window.scrollTo( 0, 600 );');		
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

	}

}
