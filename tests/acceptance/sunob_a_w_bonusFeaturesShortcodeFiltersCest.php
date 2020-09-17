<?php 

class sunob_a_w_bonusFeaturesShortcodeFiltersCest extends n_f_adminSideSetupCest
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
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-shortcode-filters');    

		/* Map creation and modification tab */
		// go to the tab
		// $I->click('Shortcode Filters for Home');
		$I->see('Display Filters using Shortcode');

		// set fields 
		// TODO we can set here the custom redirect url and check if it works with the remaining tests that are dependent on this and where it is supposed to work  

        // TODO cover configuration fields that are supposed to be moved to this tab from older version

	}

    public function setAlternateFilterWidget(AcceptanceTester $I) {

        if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

        // TODO simply set a random alternate widget here and we shall assume that rest of the process on backend and fronend works as it is with the newly changed alternate widget  

        // TODO try additional css field as well but of course we will need an additional test on frontend to verify that

    }

    public function addEditFilters(AcceptanceTester $I, $is_edit_mode=false, $edit_fields=array(), $edit_action_xpath="") {

        if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

        // I assume that browser is already on the shortcode page due to previous test function in this class 

        // add filter 
        // TODO even though we are using a common method of setup class to add filter but we should try preparing add data in most effective to test every aspect, so prepare such data and extend parent method and pass data for detailed testing 
        parent::addEditFilters( $I, 'd', $is_edit_mode, '/wp-admin/admin.php?page=eowbc-shortcode-filters', /*'//*[@id="eowbc_shop_category_filter"]/div[1]/a[3]'*/ 'Filter Configuration', 'Bulk Actions', $edit_fields, $edit_action_xpath);

        // TODO are there any other things that are not covered in common add method of parent class that we should cover? We must think of anything that is missed especially when we are saving time of dev & maintainance by using common test method of parent class. 

            // when the child filter etc fields added from the old version than add them in common method and the related front end tests in this module's front end tests

    }

	public function manageShortcodeFiltersList(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

        // try to disable a filter 
        parent::bulkEnableDisableDelete( $I, '', 'deactivate', '//*[@id="d_fconfig_submit_btn_bulk"]' );

        // try to enable a filter 
        parent::bulkEnableDisableDelete( $I, '', 'activate', '//*[@id="d_fconfig_submit_btn_bulk"]' );

        // try to edit any one filter from here 
        // $I->click('Diamond');
        $this->addEditFilters( $I, true, array('label'=>'Shortcode filter'), 'Diamond');

        // TODO try to delete a filter 
        parent::bulkEnableDisableDelete( $I, '', 'delete', '//*[@id="d_fconfig_submit_btn_bulk"]' );

        //now since its deleted create again
        $this->addEditFilters( $I );

        // TODO are there any other things that are not covered in managing list especially since we used the common methods of parent class so are there any additional thing left that we should cover? We must think of anything that is missed especially when we are saving time of dev & maintainance by using common test method of parent class. 

            // when in future we add add actions like search, sort etc. for the list, we should cover them here

	}

}
