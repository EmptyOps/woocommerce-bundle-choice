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

    public function myAccountPage(AcceptanceTester $I) {

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

	}

	public function verifyOrderDetails(AcceptanceTester $I, $is_inner_call=false) {

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

		//TODO check here if merged row appears properly or not 
		if( !$is_inner_call ) { 
			$this->confirmMergedRow($I);	
		}

	}

	protected function confirmMergedRow(AcceptanceTester $I) {
		
		// TODO implement complete check which ensures in single row UI widget the entire item pair is displayed and not in two 

		// at least price check is done but however even for this it needs to confirm that it is checking the row price and not of any subtotal or total. 
		$I->see($this->price_of_product_step1+$this->price_of_product_step2);

	}

}
