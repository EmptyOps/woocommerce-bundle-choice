<?php 

class sunob_a_y_bonusFeaturesFiltersForShopCategoryPageCest extends n_f_adminSideSetupCest
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
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-shop-cat-filter');

		/* Map creation and modification tab */
		// go to the tab
		// $I->click('Filters for Shop/Category Page');
		$I->see('Filters for Shop/Category Page');

		// set fields 
		$I->executeJS("jQuery('#sc_shop_cat_filter_location_shop').parent().checkbox('set checked', 'sc_shop_cat_filter_location_shop');");	

		$I->executeJS("jQuery('#sc_shop_cat_filter_location_cat').parent().checkbox('set checked', 'sc_shop_cat_filter_location_cat');");		
		$I->executeJS("jQuery('#sc_shop_cat_filter_location_cat').trigger('change');");	//we need to trigger change event because without that our own JS code is not recieving the change event
		$I->executeJS("jQuery('#shop_cat_filter_two_filter_first_dropdown_div').dropdown('set selected', 19);");	//better than setting 1 directly is to select the nth element that has value 1 

		// $I->scrollTo('//*[@id="add-sample-filter-data"]', -300, -500);
		// $I->wait(3);
		
		// $I->fillField('shop_cat_filter_two_filter_first_title', 'Diamond Filter');
		// $I->executeJS("jQuery('#shop_cat_filter_two_filter_first_dropdown_div').dropdown('set selected', 20);");	//better than setting 1 directly is to select the nth element that has value 1 
		// $I->fillField('shop_cat_filter_two_filter_second_title', 'Setting Filter');
		
		// $I->executeJS("jQuery('#shop_cat_filter_alternate_view').parent().checkbox('set checked', 'shop_cat_filter_alternate_view');");	//better than setting 1 directly is to select the nth element that has value 1 
		// $I->executeJS("jQuery('#shop_cat_filter_selected_filter').parent().checkbox('set checked', 'shop_cat_filter_selected_filter');");	//better than setting 1 directly is to select the nth element that has value 1 

		// TODO we should test on shop page as well for that (maybe) need to write additional tests for front end

        // TODO cover configuration fields that are supposed to be moved to this tab from older version

        // TODO as well as cover configuration fields of the new fields that are being added from time to time 

		$I->scrollTo('//*[@id="filter_setting_submit_btn"]', -300, -300);
		$I->wait(3);
		
		// save 
		$I->click('//*[@id="filter_setting_submit_btn"]'); 		//click('Save'); 	

		$I->waitForText('Saved!');

		$I->reloadPage();

		// $I->seeInField('shop_cat_filter_two_filter_first_title', 'Diamond Filter');	//$I->see('4px', 'input');	//I verify that I can see "button tagline..." inside input tag 
		$I->see('Diamond');	//I verify that I can see "Diamond" category inside dropdown's div tag 

	}


    public function setAlternateFilterWidget(AcceptanceTester $I) {

        if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

        // TODO simply set a random alternate widget here and we shall assume that rest of the process on backend and fronend works as it is with the newly changed alternate widget  

        // TODO try additional css field as well but of course we will need an additional test on frontend to verify that

    }

    public function addEditFilters(AcceptanceTester $I, $is_edit_mode=false, $edit_fields=array()) {

        if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

        // I assume that browser is already on the shop/cat filter page due to previous test function in this class 

        // add filter 
        // TODO even though we are using a common method of setup class to add filter but we should try preparing add data in most effective to test every aspect, so prepare such data and extend parent method and pass data for detailed testing 
        parent::addEditFilters( $I, 'd', $is_edit_mode, '', 'Filter Configuration', 'Bulk Actions', $edit_fields);

        // TODO are there any other things that are not covered in common add method of parent class that we should cover? We must think of anything that is missed especially when we are saving time of dev & maintainance by using common test method of parent class. 

        	// when the child filter etc fields added from the old version than add them in common method and the related front end tests in this module's front end tests

    }

	public function manageShopCategoryFiltersList(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

        // try to disable a filter 
        parent::bulkEnableDisableDelete( $I, '', 'deactivate', '//*[@id="d_fconfig_submit_btn_bulk"]' );

        // try to enable a filter 
        parent::bulkEnableDisableDelete( $I, '', 'activate', '//*[@id="d_fconfig_submit_btn_bulk"]' );

        // try to edit any one filter from here 
        $I->click('//*[@id="eowbc_price_control_methods_list"]/tbody/tr/td[2]/a');
        $this->addEditFilters( $I, true, array('label'=>'Category page filter'));

        // TODO try to delete a filter 
        parent::bulkEnableDisableDelete( $I, '', 'delete', '//*[@id="d_fconfig_submit_btn_bulk"]' );

        //now since its deleted create again
        $this->addEditFilters( $I );

        // TODO are there any other things that are not covered in managing list especially since we used the common methods of parent class so are there any additional thing left that we should cover? We must think of anything that is missed especially when we are saving time of dev & maintainance by using common test method of parent class. 

        	// when in future we add add actions like search, sort etc. for the list, we should cover them here

	}

	protected function addFilters(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

        // TODO this function is supposed to be removed, but there are some useful things below like unique content for testing  different kind of filters and add child filter logic etc.

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
			$I->executeJS("jQuery('#shop_cat_filter_add_reset_link').parent().checkbox('set checked', 'shop_cat_filter_add_reset_link');");	//better than setting 1 directly is to select the nth element that has value 1 
			$I->executeJS("jQuery('#shop_cat_filter_add_child_filter').parent().checkbox('set checked', 'shop_cat_filter_add_child_filter');");	//better than setting 1 directly is to select the nth element that has value 1 
			$I->executeJS("jQuery('#shop_cat_filter_add_child_filter').trigger('change');");	//we need to trigger change event because without that our own JS code is not recieving the change event
			$I->fillField('shop_cat_filter_add_child_label', $field_vals["shop_cat_filter_add_child_label"]);
			
			$I->scrollTo('//*[@id="shop_cat_filter_add_submit_btn"]', -300, -100);
			$I->wait(3);
			
			// save 
			$I->click('//*[@id="shop_cat_filter_add_submit_btn"]'); 	

			// scroll back upper side to see saved filters list
			$I->scrollTo('//*[@id="shop_cat_filter_save"]', -300, -100);
			$I->wait(3);

			$I->see($field_vals["shop_cat_filter_add_label"], 'td');	//$I->see('4px', 'input');	//I verify that I can see "button tagline..." inside input tag 

		}

	}

}
