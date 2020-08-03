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

    protected function myAccountPage(AcceptanceTester $I, $suite_name_prefix=false) {

    	// if( !$I->test_allowed_in_this_environment("f_") ) {
     //        return;
     //    }

    	//TODO make it dynamic by saving this in session in previous steps and then here get it from session 
    	$this->price_of_product_step1 = $suite_name_prefix == "n_" ? $I->get_configs('first_product_price',$suite_name_prefix) : "12.00";
    	$this->price_of_product_step2 = $suite_name_prefix == "n_" ? $I->get_configs('second_product_price',$suite_name_prefix) : "15.00";
    	$this->price_of_product_step1_without_comma = str_replace(",", "", $this->price_of_product_step1);
    	$this->price_of_product_step2_without_comma = str_replace(",", "", $this->price_of_product_step2);
		
		//here if session is not detected than try to keep the previous session alive and it must be possible in WebDriver 
		$I->amOnPage( ( $suite_name_prefix == "n_" ? '/index.php' : '' ) . '/my-account/orders/' );	
		
		// verify 
    	$I->see('Orders','h1');
		$I->see('Status');
		$I->see('Total');
		$I->see($this->price_of_product_step1_without_comma+$this->price_of_product_step2_without_comma);

	}

	protected function verifyOrderDetails(AcceptanceTester $I, $suite_name_prefix=false) {

		// if( !$I->test_allowed_in_this_environment("f_") ) {
  //           return;
  //       }
        
		// go to detail page 
		$I->click( $suite_name_prefix == "f_" ? '//*[@id="post-9"]/div[1]/div/div/div/table/tbody/tr[1]/td[5]/a' : '/html/body/main/article/div[1]/div/div/div/table/tbody/tr/td[5]/a' );	//click on latest order link using xPath

		// verify order details 
		$I->waitForText('Order details', 10, 'h2');

		$I->executeJS('window.scrollTo( 0, 300 );');		
		$I->wait(3);

		$I->see($this->price_of_product_step1_without_comma+$this->price_of_product_step2_without_comma);
		$I->see('hi000');
		$I->see('Direct bank transfer');

		$I->scrollTo( $suite_name_prefix == "f_" ? '//*[@id="post-9"]/div[1]/div/div/div/section[2]/address/p[1]' : '/html/body/main/article/div[1]/div/div/div/section[2]/h2', 0, -100 ); 
        $I->wait(3);

		$I->see('8347408752');

		//TODO check here if merged row appears properly or not 
		if( true || !$suite_name_prefix ) { 
			$this->confirmMergedRow($I);	
		}

	}

	protected function confirmMergedRow(AcceptanceTester $I) {
		
		// TODO implement complete check which ensures in single row UI widget the entire item pair is displayed and not in two 

		// at least price check is done but however even for this it needs to confirm that it is checking the row price and not of any subtotal or total. 
		$I->see($this->price_of_product_step1_without_comma+$this->price_of_product_step2_without_comma);

	}

}
