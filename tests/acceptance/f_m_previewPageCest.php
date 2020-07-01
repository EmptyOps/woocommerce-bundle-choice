<?php 

class f_m_previewPageCest
{
	public $price_of_product_step1 = null;
	public $price_of_product_step2 = null;

    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

<<<<<<< HEAD
    function previewPage(AcceptanceTester $I) {
		
    	// go to the preview page of step 3
    	require_once 'f_i_step2Cest.php';
    	$f_i_step2CestObj = new f_i_step2Cest();
    	$this->price_of_product_step2 = $f_i_step2CestObj->itemPage($I);
    	$this->price_of_product_step1 = $f_i_step2CestObj->price_of_product_step1;

    	// verify 
    	$I->see($this->price_of_product_step1+$this->price_of_product_step2, 'span');
    	$I->see('Add This To Cart');

	}

	public function addToCart(AcceptanceTester $I) {

		$this->previewPage($I);
=======
    public function previewPage(AcceptanceTester $I) {

    	if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }
		
    	//TODO make it dynamic by saving this in session in previous steps and then here get it from session 
    	$this->price_of_product_step1 = "12.00";
    	$this->price_of_product_step2 = "15.00";

    	// verify 
    	$I->see($this->price_of_product_step1+$this->price_of_product_step2);
    	$I->see('Add This To Cart');

>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3

		// check view action 
		$this->checkViewActionStep2($I);

		// check remove action 
		$this->checkBackRemoveAction($I);

		// check change(same as remove though but at different place) action 
		$this->checkChangeActionPreviewPage($I);

<<<<<<< HEAD
=======
	}

	public function addToCart(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("f_") ) {
            return;
        }

		// $this->previewPage($I);

>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
		// - I click on add this to cart button
		$I->click('Add This To Cart');

		// - I see in next page the text "CART", "Quantity", "Subtotal" etc.
<<<<<<< HEAD
		$I->waitForText('Cart', 10, 'h1');
		$I->waitForText('Quantity', 10, 'th');
		$I->waitForText('Subtotal', 10, 'th');
		$I->see($this->price_of_product_step1+$this->price_of_product_step2, 'span');	//TODO check here if merged row appears properly or not

	}

	function checkViewActionStep2(AcceptanceTester $I) {
=======
		$I->waitForText('Cart', 10);
		$I->see('Quantity');
		$I->see('Subtotal');
		$I->see($this->price_of_product_step1+$this->price_of_product_step2);	

		//TODO check here if merged row appears properly or not

	}

	protected function checkViewActionStep2(AcceptanceTester $I) {
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

<<<<<<< HEAD
	function checkChangeActionPreviewPage(AcceptanceTester $I) {
=======
	protected function checkChangeActionPreviewPage(AcceptanceTester $I) {
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
