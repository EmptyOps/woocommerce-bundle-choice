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
		$I->executeJS("jQuery('#shop_cat_filter_location_shop').parent().checkbox('set checked', 'shop_cat_filter_location_shop');");	

		$I->executeJS("jQuery('#shop_cat_filter_two_filter').parent().checkbox('set checked', 'shop_cat_filter_two_filter');");		
		$I->executeJS("jQuery('#shop_cat_filter_two_filter').trigger('change');");	//we need to trigger change event because without that our own JS code is not recieving the change event
		$I->executeJS("jQuery('#shop_cat_filter_two_filter_first_dropdown_div').dropdown('set selected', 19);");	//better than setting 1 directly is to select the nth element that has value 1 

		$I->scrollTo('//*[@id="add-sample-filter-data"]', -300, -500);
		$I->wait(3);
		
		$I->fillField('shop_cat_filter_two_filter_first_title', 'Diamond Filter');
		$I->executeJS("jQuery('#shop_cat_filter_two_filter_first_dropdown_div').dropdown('set selected', 20);");	//better than setting 1 directly is to select the nth element that has value 1 
		$I->fillField('shop_cat_filter_two_filter_second_title', 'Setting Filter');
		
		$I->executeJS("jQuery('#shop_cat_filter_alternate_view').parent().checkbox('set checked', 'shop_cat_filter_alternate_view');");	//better than setting 1 directly is to select the nth element that has value 1 
		$I->executeJS("jQuery('#shop_cat_filter_selected_filter').parent().checkbox('set checked', 'shop_cat_filter_selected_filter');");	//better than setting 1 directly is to select the nth element that has value 1 

		$I->scrollTo('//*[@id="shop_cat_filter_save"]', -300, -100);
		$I->wait(3);
		
		// save 
		$I->click('//*[@id="shop_cat_filter_save"]'); 	

		$I->reloadPage();

		$I->seeInField('shop_cat_filter_two_filter_first_title', 'Diamond Filter');	//$I->see('4px', 'input');	//I verify that I can see "button tagline..." inside input tag 

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
		$I->click('Filters for Shop/Category Page');
		$I->see('Filter Location');

		$num_filters = 2;
		for($i=0; $i<= $num_filters; $i++) {

			$field_vals = array();
			if($i == 0) {
				$field_vals["shop_cat_filter_add_category_dropdown_div"] = "19";
				$field_vals["shop_cat_filter_add_label"] = "Diamond Filter";

				$field_vals["shop_cat_filter_add_column_width"] = "99";
				$field_vals["shop_cat_filter_add_order"] = "55";
				$field_vals["shop_cat_filter_add_input_type_dropdown_div"] = "checkbox";

				$field_vals["shop_cat_filter_add_child_label"] = "Child Filter";
			}
			else {
				$field_vals["shop_cat_filter_add_category_dropdown_div"] = "20";
				$field_vals["shop_cat_filter_add_label"] = "Setting Filter";

				$field_vals["shop_cat_filter_add_column_width"] = "88";
				$field_vals["shop_cat_filter_add_order"] = "44";
				$field_vals["shop_cat_filter_add_input_type_dropdown_div"] = "icon";

				$field_vals["shop_cat_filter_add_child_label"] = "Child Filter";
			}

			// set fields 
			$I->executeJS("jQuery('#shop_cat_filter_add_category_dropdown_div').dropdown('set selected', '".$field_vals["shop_cat_filter_add_category_dropdown_div"]."');");	//better than setting 1 directly is to select the nth element that has value 1 
			$I->fillField('shop_cat_filter_add_label', $field_vals["shop_cat_filter_add_label"]);
			
			$I->fillField('shop_cat_filter_add_column_width', $field_vals["shop_cat_filter_add_column_width"]);
			$I->fillField('shop_cat_filter_add_order', $field_vals["shop_cat_filter_add_order"]);
			$I->executeJS("jQuery('#shop_cat_filter_add_input_type_dropdown_div').dropdown('set selected', '".$field_vals["shop_cat_filter_add_input_type_dropdown_div"]."');");	//better than setting 1 directly is to select the nth element that has value 1 
			$I->executeJS("jQuery('#shop_cat_filter_add_reset_link').checkbox('set checked');");	//better than setting 1 directly is to select the nth element that has value 1 
			$I->executeJS("jQuery('#shop_cat_filter_add_child_filter').checkbox('set checked');");	//better than setting 1 directly is to select the nth element that has value 1 
			$I->fillField('shop_cat_filter_add_child_label', $field_vals["shop_cat_filter_add_child_label"]);
			
			$I->scrollTo('//*[@id="shop_cat_filter_save"]', -300, -100);
			$I->wait(3);
			
			// save 
			$I->click('//*[@id="shop_cat_filter_save"]'); 	

			$I->see($field_vals["shop_cat_filter_add_label"], 'td');	//$I->see('4px', 'input');	//I verify that I can see "button tagline..." inside input tag 

		}

	}

}
