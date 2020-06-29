<?php 

class f_k_step2Cest
{
	public $price_of_product_step1 = null;

    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    function categoryPage(AcceptanceTester $I) {
		
		//set current url in the session so that this step can continue from there, the current url would be the one that is reached to in last test. 
		$wbc_main_process_test_curr_url = $I->get_session('wbc_main_process_test_curr_url');
		echo $I->getCurrentUrl();

    	// go to the category page of step 2
    	require_once dirname(__FILE__).'f_i_step1Cest.php';
    	$f_i_step1CestObj = new f_i_step1Cest();
    	$this->price_of_product_step1 = $f_i_step1CestObj->itemPage($I);

    	// verify 


		// - I choose filter options and then I check if x  products are found


		// - I click on product image of first product from the search results
		$price_of_product = "15.00";	//TODO make it dynamic 
		$I->click('//*[@id="main"]/ul/li/a/img');
		$I->waitForText('CONTINUE', 10);	

		return $price_of_product;
	}

	public function itemPage(AcceptanceTester $I) {
		
		// - I choose filter options and then I check if x  products are found
		// - I click on product image of first product from the search results
		$price_of_product = $this->categoryPage($I);

		// - I see continue button
		$I->see('CONTINUE');

		// with text x ???
		$I->see($price_of_product, 'span');

		// - I click on continue button
		$I->click('CONTINUE');

		// - I see in next page the text "${price of Step 1 item's price}"
		$I->waitForText($price_of_product, 10, 'span');
		$I->waitForText('VIEW', 10, 'a');
		$I->waitForText('REMOVE', 10, 'a');

		// check remove action 
		$this->checkViewActionStep1($I);

		// check remove action 
		$this->checkBackRemoveAction($I);

		return $price_of_product;
	}

	function checkViewActionStep1(AcceptanceTester $I) {
		
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

	function checkBackRemoveAction(AcceptanceTester $I) {
		
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
