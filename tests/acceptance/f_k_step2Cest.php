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

<<<<<<< HEAD
    function categoryPage(AcceptanceTester $I) {
		
    	// go to the category page of step 2
    	require_once 'f_i_step1Cest.php';
    	$f_i_step1CestObj = new f_i_step1Cest();
    	$this->price_of_product_step1 = $f_i_step1CestObj->itemPage($I);

    	// verify 


		// - I choose filter options and then I check if x  products are found


		// - I click on product image of first product from the search results
		$price_of_product = "15.00";	//TODO make it dynamic 
		$I->click('//*[@id="main"]/ul/li/a/img');
		$I->waitForText('CONTINUE', 10);	
=======
    protected function categoryPage(AcceptanceTester $I) {
		
		//no need to do anything of below as webdriver is properly maintaing session and remaing at same page on the subsequent test
		// //set current url in the session so that this step can continue from there, the current url would be the one that is reached to in last test. 
		// $wbc_main_process_test_curr_url = $I->get_session('wbc_main_process_test_curr_url');
		// echo $I->getCurrentUrl();

  //   	// go to the category page of step 2
  //   	require_once dirname(__FILE__).'f_i_step1Cest.php';
  //   	$f_i_step1CestObj = new f_i_step1Cest();
  //   	$this->price_of_product_step1 = $f_i_step1CestObj->itemPage($I);
    	$this->price_of_product_step1 = "12.00";

    	// - I choose filter options and then I check if x  products are found 
		$I->executeJS("jQuery('#text_slider_price').slider('set rangeValue', 12, 14);");	
		$I->waitForText('No products were found', 10);

		$I->executeJS("jQuery('#text_slider_price').slider('set rangeValue', 12, 15);");
		$I->waitForText('Test ring 1', 10);  	
		
		// - I click on product image of first product from the search results
		$price_of_product = "15.00";	//TODO make it dynamic 
		$I->click('Test ring 1');	// ('//*[@id="main"]/ul/li/a/img');
		$I->see('Add to bagsc...');	//Add to bagsc... is the text set on appearance module during admin test
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3

		return $price_of_product;
	}

	public function itemPage(AcceptanceTester $I) {
		
<<<<<<< HEAD
=======
		if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }
        
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
		// - I choose filter options and then I check if x  products are found
		// - I click on product image of first product from the search results
		$price_of_product = $this->categoryPage($I);

		// - I see continue button
<<<<<<< HEAD
		$I->see('CONTINUE');

		// with text x ???
		$I->see($price_of_product, 'span');

		// - I click on continue button
		$I->click('CONTINUE');

		// - I see in next page the text "${price of Step 1 item's price}"
		$I->waitForText($price_of_product, 10, 'span');
		$I->waitForText('VIEW', 10, 'a');
		$I->waitForText('REMOVE', 10, 'a');
=======
		$I->see('Add to bagsc...');

		// with text x 
		$I->see('150.00');	//market price
		$I->see($price_of_product);
		$I->see('Additional information');

		// - I click on continue button
		$I->click('Add to bagsc...');

		// - I see in next page the text "${price of Step 2 item's price}"
		$I->waitForText($price_of_product, 10);
		$I->see('VIEW');
		$I->see('REMOVE');
		$I->see('Add This To Cart');
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3

		// check remove action 
		$this->checkViewActionStep1($I);

		// check remove action 
		$this->checkBackRemoveAction($I);

		return $price_of_product;
	}

<<<<<<< HEAD
	function checkViewActionStep1(AcceptanceTester $I) {
=======
	protected function checkViewActionStep1(AcceptanceTester $I) {
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
		
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

<<<<<<< HEAD
	function checkBackRemoveAction(AcceptanceTester $I) {
=======
	protected function checkBackRemoveAction(AcceptanceTester $I) {
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
		
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
