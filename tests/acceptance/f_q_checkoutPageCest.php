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

	protected function checkoutPage(AcceptanceTester $I, $suite_name_prefix=false) {
		
		// if( !$I->test_allowed_in_this_environment("f_") ) {
  //           return;
  //       }

		//TODO make it dynamic by saving this in session in previous steps and then here get it from session 
    	$this->price_of_product_step1 = $suite_name_prefix == "n_" ? $I->get_configs('first_product_price',$suite_name_prefix) : "12.00";
    	$this->price_of_product_step2 = $suite_name_prefix == "n_" ? $I->get_configs('second_product_price',$suite_name_prefix) : "15.00";
    	$this->price_of_product_step1_without_comma = str_replace(",", "", $this->price_of_product_step1);
    	$this->price_of_product_step2_without_comma = str_replace(",", "", $this->price_of_product_step2);

    	// verify 
    	$I->see('Billing details');
		$I->see('Have a coupon?');
		$I->see('Place order');
		
		//TODO check here if merged row appears properly or not
		if( $suite_name_prefix == "f_" ) { 
			$this->confirmOrderSummary($I);	
		}

	}

	protected function placeOrder(AcceptanceTester $I, $suite_name_prefix=false) {

		// if( !$I->test_allowed_in_this_environment("f_") ) {
  //           return;
  //       }
        
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
		$I->scrollTo('//*[@id="place_order"]', 0, -100);
        $I->wait(3);
        for($i=1; $i<=10; $i++) {
            try { 
                $I->click('//*[@id="place_order"]');
                break;
            }
            catch(Exception $e) {
                echo "caught at error '".$e->getMessage()."' at scrollToAndClick on attempt number ".$i.", trying again after the delay of 1 seconds";
                $I->wait(1);
            }
        }

        $I->wait(10);
        echo $I->grabPageSource();

		// verify if order placed properly on the thank you page
		$I->waitForText('Order received', 10, 'h1');
		$I->see('sales@sphereplugins.com');
		$I->see('Direct bank transfer', 'strong');
		$I->see('8347408752');

	}

	protected function confirmOrderSummary(AcceptanceTester $I) {
		
		// TODO implement complete check which ensures in single row UI widget the entire item pair is displayed and not in two 

		// at least price check is done but however even for this it needs to confirm that it check the order summary row price and not of any subtotal or total. 
		$I->see( $I->price_format($this->price_of_product_step1_without_comma+$this->price_of_product_step2_without_comma) );	

	}

}
