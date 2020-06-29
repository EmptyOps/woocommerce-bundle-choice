<?php 

class fz_a_o_adminOrderDetailPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

	public function gotoAdminOrderDetailPage(AcceptanceTester $I) {

    	//TODO make it dynamic by saving this in session in previous steps and then here get it from session 
    	$this->price_of_product_step1 = "12.00";
    	$this->price_of_product_step2 = "15.00";

		// go to particular order detail page
		$I->amOnPage('/wp-admin/edit.php?post_type=shop_order');	
		$I->click('//*[@id="the-list"]/tr[1]/td[1]');	

		// verify 
		$I->waitForText('Edit order', 10);
		$I->see($this->price_of_product_step1+$this->price_of_product_step2);

	}

	public function adminOrderDetailPage(AcceptanceTester $I, $is_inner_call=false) {

		// verify order details 
		$I->see('Edit order', 'h1');
		$I->see('hi000');
		$I->see('Payment via Direct bank transfer. Customer IP:');
		$I->see('08347408752');

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
