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

	function gotoAdminOrderDetailPage(AcceptanceTester $I) {
		
		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to particular order detail page
		$I->amOnPage('/wp-admin/edit.php?post_type=shop_order');	
		$I->click('//*[@id="the-list"]/tr/td[1]');	

	}

	public function adminOrderDetailPage(AcceptanceTester $I, $is_inner_call=false) {

		$this->gotoAdminOrderDetailPage($I);

		// verify order details 
		$I->waitForText('Edit order', 10, 'h1');
		$I->waitForText('hi000', 10, 'p');
		$I->waitForText('Payment via Direct bank transfer. Customer IP:', 10, 'p');
		$I->waitForText('08347408752', 10, 'a');

		//TODO check here if merged row appears properly or not 
		if( !$is_inner_call ) { 
			$this->confirmMergedRow($I);	
		}

	}

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

	}

}
