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

    protected function categoryPage(AcceptanceTester $I, $suite_name_prefix=false) {
		
		//no need to do anything of below as webdriver is properly maintaing session and remaing at same page on the subsequent test
		// //set current url in the session so that this step can continue from there, the current url would be the one that is reached to in last test. 
		// $wbc_main_process_test_curr_url = $I->get_session('wbc_main_process_test_curr_url');
		// echo $I->getCurrentUrl();

  //   	// go to the category page of step 2
  //   	require_once dirname(__FILE__).'f_i_step1Cest.php';
  //   	$f_i_step1CestObj = new f_i_step1Cest();
  //   	$this->price_of_product_step1 = $f_i_step1CestObj->itemPage($I);
    	$this->price_of_product_step1 = $suite_name_prefix == "n_" ? $I->get_configs('first_product_price',$suite_name_prefix) : "12.00";

    	$I->executeJS('window.scrollTo( 0, 300 );');        //$I->scrollTo('Save'); 
        $I->wait(3);

        echo $I->grabPageSource();

    	// - I choose filter options and then I check if x  products are found 
		$I->executeJS("jQuery('#text_slider_price').slider('set rangeValue', 12, 14);");	
		$I->waitForText('No products were found', 10);

		$price_of_product = $suite_name_prefix == "n_" ? $I->get_configs('second_product_price',$suite_name_prefix) : "15.00";	//TODO make it dynamic 
		$range_min = "12";
		$range_max = "15";
		if( $suite_name_prefix == "n_" ) {
			$range_min = ( ( str_replace(",", "", $price_of_product) ) - 100 );
			$range_max = ( ( str_replace(",", "", $price_of_product) ) + 100 );
		}

		$I->executeJS("jQuery('#text_slider_price').slider('set rangeValue', ".$range_min.", ".$range_max.");");
		$I->waitForText( $suite_name_prefix == "n_" ? $I->get_configs('second_product_name',$suite_name_prefix) : 'Test ring 1', 10);  	

		$I->scrollTo('//*[@id="main"]/ul/li/a/img', -300, -100);
		$I->wait(3);

		// - I click on product image of first product from the search results
		$I->click( $suite_name_prefix == "n_" ? $I->get_configs('second_product_name',$suite_name_prefix) : 'Test ring 1' );	// ('//*[@id="main"]/ul/li/a/img');
		$I->see( $suite_name_prefix == "n_" ? $I->get_configs('second_product_page_button_text',$suite_name_prefix) : 'Add to bagsc...' );	//Add to bagsc... is the text set on appearance module during admin test

		return $price_of_product;
	}

	protected function itemPage(AcceptanceTester $I, $suite_name_prefix=false) {
		
		// if( !$I->test_allowed_in_this_environment("f_") ) {
  //           return;
  //       }
        
		// - I choose filter options and then I check if x  products are found
		// - I click on product image of first product from the search results
		$price_of_product = $this->categoryPage($I, $suite_name_prefix);

		$I->executeJS('window.scrollTo( 0, 300 );');        //$I->scrollTo('Save'); 
        $I->wait(3);
        
		// - I see continue button
		$I->see( $suite_name_prefix == "n_" ? $I->get_configs('second_product_page_button_text',$suite_name_prefix) : 'Add to bagsc...');

		// with text x 
		$I->see( $suite_name_prefix == "n_" ? $I->get_configs('second_product_market_price',$suite_name_prefix) : '150.00' );	//market price
		$I->see($price_of_product);
		$I->see( $suite_name_prefix == "n_" ? 'Specifications' : 'Specifications'/*'Additional information'*/ );

		if( $suite_name_prefix == "n_" ) {
			$I->executeJS('window.scrollTo( 0, 1100 );');
			// $I->scrollTo('//*[@id="eo_wbc_add_to_cart"]', -632, -100);
			$I->wait(10);
		}

		// - I click on continue button
		$I->click( $suite_name_prefix == "n_" ? '//*[@id="eo_wbc_add_to_cart"]' : 'Add to bagsc...' );	// click( $suite_name_prefix == "n_" ? $I->get_configs('second_product_page_button_text',$suite_name_prefix) : 'Add to bagsc...');

		// - I see in next page the text "${price of Step 2 item's price}"
		$I->waitForText($price_of_product, 10);
		$I->see('VIEW');
		$I->see('CHANGE');
		$I->see('Add This To Cart');

		// check remove action 
		$this->checkViewActionStep1($I);

		// check remove action 
		$this->checkBackRemoveAction($I);

		return $price_of_product;
	}

	protected function checkViewActionStep1(AcceptanceTester $I) {
		
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
		// $I->waitForText('CHANGE', 10, 'a');

	}

	protected function checkBackRemoveAction(AcceptanceTester $I) {
		
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
		// $I->waitForText('CHANGE', 10, 'a');

	}

}
