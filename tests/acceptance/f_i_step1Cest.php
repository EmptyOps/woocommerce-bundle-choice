<?php 

class f_i_step1Cest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    protected function categoryPage(AcceptanceTester $I, $suite_name_prefix=false) {
		
		// if( !$I->test_allowed_in_this_environment("f_") ) {
  //           return;
  //       }

    	// go to the category page page
		$I->amOnPage( ( $suite_name_prefix == "n_" ? '/index.php/design-your-own-ring' : '/' ) );	

		$I->executeJS('window.scrollTo( 0, 300 );');        //$I->scrollTo('Save'); 
        $I->wait(3);
        
		$I->click( $suite_name_prefix == "n_" ? $I->get_configs('first_button_text',$suite_name_prefix) : 'Start with Diamond' );
		$I->waitForText( $I->get_configs('cat_name_0', $suite_name_prefix), 10);
		$I->see('CHOOSE A');    

		$I->executeJS('window.scrollTo( 0, 300 );');        //$I->scrollTo('Save'); 
        $I->wait(3);

		// - I choose filter options and then I check if x  products are found 
		$I->executeJS("jQuery('#text_slider_price').slider('set rangeValue', 14, 15);");	
		$I->waitForText('No products were found', 10);

		$price_of_product = $suite_name_prefix == "n_" ? $I->get_configs('first_product_price',$suite_name_prefix) : "12.00";	//TODO make it dynamic 
		$range_min = "12";
		$range_max = "15";
		if( $suite_name_prefix == "n_" ) {
			$range_min = ( ( str_replace(",", "", $price_of_product) ) - 10 );
			$range_max = ( ( str_replace(",", "", $price_of_product) ) + 100 );
		}
		
		$I->executeJS("jQuery('#text_slider_price').slider('set rangeValue', ".$range_min.", ".$range_max.");");
		$I->waitForText( $suite_name_prefix == "n_" ? $I->get_configs('first_product_name',$suite_name_prefix) : 'Test diamond 1', 10);  	
		
		// - I click on product image of first product from the search results
		$I->click('//*[@id="main"]/ul/li/a/img');
		$I->see( $suite_name_prefix == "n_" ? $I->get_configs('first_product_page_button_text',$suite_name_prefix) : 'Add to bag...' );	//Add to bag... is the text set on appearance module during admin test
		
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
		$I->see( $suite_name_prefix == "n_" ? $I->get_configs('first_product_page_button_text',$suite_name_prefix) : 'Add to bag...' );

		// with text x 
		$I->see( $suite_name_prefix == "n_" ? $I->get_configs('first_product_market_price',$suite_name_prefix) : '150.00' );	//market price
		$I->see($price_of_product);
		$I->see( $suite_name_prefix == "n_" ? 'Specifications' : 'Additional information' );

		//first select required options for variable product, otherwise it won't let us add into cart. 
		if( $suite_name_prefix != "n_" ) {
			$I->click('//*[@id="product-13"]/div[2]/form/table/tbody/tr/td[2]/div/span[2]/ul/li[1]/div');
		}

		$I->scrollTo('//*[@id="eo_wbc_add_to_cart"]', -632, -100);
		$I->wait(3);

		// - I click on continue button
		$I->click( $suite_name_prefix == "n_" ? $I->get_configs('first_product_page_button_text',$suite_name_prefix) : 'Add to bag...' );

		// - I see in next page the text "${price of Step 1 item's price}"
		$I->waitForText($price_of_product, 10);
		$I->see('VIEW');
		$I->see('REMOVE');

		// check remove action 
		$this->checkBackRemoveAction($I);

		//set current url in the session so that next step can continue from there. 
			//TODO note that we need to clean session from the very first test. 
		$I->set_session('wbc_main_process_test_curr_url', $I->getCurrentUrl());

		return $price_of_product;
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
		// $I->waitForText('REMOVE', 10, 'a');

	}

	// also do here the product not found test here and check if that Oooops error message and error reporting options shows or not
	protected function checkProductNotFoundDueToMissingMapping(AcceptanceTester $I, $suite_name_prefix=false) {
		
		// if( !$I->test_allowed_in_this_environment("f_") ) {
  //           return;
  //       }
        
		return;	//TODO implement it later. for now the manual testing is done and given priority to other test automations so do this later as soon as we get the chance. 

	}

}
