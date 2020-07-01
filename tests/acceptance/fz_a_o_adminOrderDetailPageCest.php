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

<<<<<<< HEAD
	function gotoAdminOrderDetailPage(AcceptanceTester $I) {
		
		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to particular order detail page
		$I->amOnPage('/wp-admin/edit.php?post_type=shop_order');	
		$I->click('//*[@id="the-list"]/tr/td[1]');	
=======
	public function gotoAdminOrderDetailPage(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("a_") ) {
            return;
        }

    	//TODO make it dynamic by saving this in session in previous steps and then here get it from session 
    	$this->price_of_product_step1 = "12.00";
    	$this->price_of_product_step2 = "15.00";

		// go to particular order detail page
		$I->amOnPage('/wp-admin/edit.php?post_type=shop_order');	
		$I->click('//*[@id="the-list"]/tr[1]/td[1]');	

		// verify 
		$I->waitForText('Edit order', 10);
		$I->see($this->price_of_product_step1+$this->price_of_product_step2);
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3

	}

	public function adminOrderDetailPage(AcceptanceTester $I, $is_inner_call=false) {

<<<<<<< HEAD
		$this->gotoAdminOrderDetailPage($I);

		// verify order details 
		$I->waitForText('Edit order', 10, 'h1');
		$I->waitForText('hi000', 10, 'p');
		$I->waitForText('Payment via Direct bank transfer. Customer IP:', 10, 'p');
		$I->waitForText('08347408752', 10, 'a');
=======
		if( !$I->test_allowed_in_this_environment("a_") ) {
            return;
        }

		// verify order details 
		$I->see('Edit order', 'h1');
		$I->see('hi000');
		$I->see('Payment via Direct bank transfer. Customer IP:');

		$I->executeJS('window.scrollTo( 0, 300 );');		
		$I->wait(3);

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
