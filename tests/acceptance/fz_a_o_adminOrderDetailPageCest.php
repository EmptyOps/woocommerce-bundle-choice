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

	protected function gotoAdminOrderDetailPage(AcceptanceTester $I, $suite_name_prefix=false) {

		// if( !$I->test_allowed_in_this_environment("a_") ) {
  //           return;
  //       }

    	//TODO make it dynamic by saving this in session in previous steps and then here get it from session 
    	$this->price_of_product_step1 = $suite_name_prefix == "n_" ? $I->get_configs('first_product_price',$suite_name_prefix) : "12.00";
    	$this->price_of_product_step2 = $suite_name_prefix == "n_" ? $I->get_configs('second_product_price',$suite_name_prefix) : "15.00";
    	$this->price_of_product_step1_without_comma = str_replace(",", "", $this->price_of_product_step1);
    	$this->price_of_product_step2_without_comma = str_replace(",", "", $this->price_of_product_step2);

		// go to particular order detail page
		$I->amOnPage( ( $suite_name_prefix == "n_" ? '/index.php' : '' ) . '/wp-admin/edit.php?post_type=shop_order' );	
		$I->click('//*[@id="the-list"]/tr[1]/td[1]');	

		// verify 
		$I->waitForText('Edit order', 10);
		$I->see( $I->price_format($this->price_of_product_step1_without_comma+$this->price_of_product_step2_without_comma) );

	}

	protected function adminOrderDetailPage(AcceptanceTester $I, $suite_name_prefix=false) {

		// if( !$I->test_allowed_in_this_environment("a_") ) {
  //           return;
  //       }

		// verify order details 
		$I->see('Edit order', 'h1');
		$I->see('hi000');
		$I->see('Payment via Direct bank transfer. Customer IP:');

		$I->scrollTo('//*[@id="order_data"]/div[1]/div[2]/div[1]/p[3]/a', 0, -100); 		
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
		$I->see( $I->price_format($this->price_of_product_step1_without_comma+$this->price_of_product_step2_without_comma) );

	}

}
