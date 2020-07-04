<?php 

class sunob_a_y_bonusFeaturesFiltersForShopCategoryPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function configuration(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-tiny-features');

		/* Map creation and modification tab */
		// go to the tab
		$I->click('Filters for Shop/Category Page');
		$I->see('Filter Location');

		// set fields 
		$I->executeJS("jQuery('#shop_cat_filter_location_shop').checkbox('set checked');");	//better than setting 1 directly is to select the nth element that has value 1 

		$I->fillField('shop_cat_shortcode_label', 'test label');
		$I->fillField('shop_cat_shortcode_unique_id', 'testuniqueid');

		$I->scrollTo('//*[@id="shop_cat_shortcode_add"]', 0, -100);
		$I->wait(3);
		
		// save 
		$I->click('Add Filter'); 	

		$I->wait(3);

		$I->see('testuniqueid', 'td');	//$I->see('4px', 'input');	//I verify that I can see "button tagline..." inside input tag 

	}

	public function addFilters(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-tiny-features');

		/* Map creation and modification tab */
		// go to the tab
		$I->click('Shortcode Filters for Home');
		$I->see('Enable Specifications View?');

		// set fields 
		$I->executeJS("jQuery('#shop_cat_shortcode_filter_dropdown_div').dropdown('set selected', 15);");	//better than setting 1 directly is to select the nth element that has value 1 

		$I->fillField('shop_cat_shortcode_label', 'test label');
		$I->fillField('shop_cat_shortcode_unique_id', 'testuniqueid');

		$I->scrollTo('//*[@id="shop_cat_shortcode_add"]', 0, -100);
		$I->wait(3);
		
		// save 
		$I->click('Add Filter'); 	

		$I->wait(3);

		$I->see('testuniqueid', 'td');	//$I->see('4px', 'input');	//I verify that I can see "button tagline..." inside input tag 

	}

}
