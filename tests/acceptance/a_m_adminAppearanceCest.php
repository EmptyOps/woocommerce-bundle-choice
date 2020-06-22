<?php 

class a_m_adminAppearanceCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function sampleLandingPageStyling(AcceptanceTester $I) {
		//TODO write this test when the styling feature is implemented for sample landing page
	}

    public function buttonsWidgetStyling(AcceptanceTester $I) {

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-appearance');

		/* Map creation and modification tab */
		// go to the tab
		// $I->click('Map creation and modification');
		$I->see('Use default button styling or custom styling');

		// set fields 
		$I->fillField('tagline_text', 'button tagline...');
		$I->executeJS("jQuery('#config_filter_status').checkbox('set checked');");
		$I->fillField('button_text', 'button text...');
		$I->fillField('button_radius', '3px');
		$I->fillField('button_backcolor_active', 'red');
		$I->fillField('button_hovercolor', 'green');
		$I->fillField('button_textcolor', 'blue');

		// save 
		$I->click('Save Appearance Settings'); 	

		// confirm if saved properly or not. TODO actually we should connfirm all values of the form if saved and repopulated properly in edit mode or saved list or not. 
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-appearance');	//reload page
		// $I->click('Map creation and modification');
		$I->see('button tagline...', 'input');	//I verify that I can see "button tagline..." inside input tag 

	}

	public function breadcrumbWidgetStyling(AcceptanceTester $I) {

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-appearance');

		/* Map creation and modification tab */
		// go to the tab
		$I->click('Breadcrumb');
		$I->see('Breadcrumb Active Background Color');

		// set fields 
		$I->fillField('breadcrumb_radius', '4px');
		$I->fillField('breadcrumb_backcolor_active', 'red');
		$I->fillField('breadcrumb_backcolor_inactive', 'green');
		$I->fillField('breadcrumb_num_icon_backcolor_active', 'red');
		$I->fillField('breadcrumb_num_icon_backcolor_inactive', 'green');
		$I->fillField('breadcrumb_title_backcolor_active', 'red');
		$I->fillField('breadcrumb_title_backcolor_inactive', 'green');
		$I->executeJS("jQuery('#showhide_icons_1').checkbox('set unchecked');");
		$I->executeJS("jQuery('#appearance_breadcrumb_hide_border_1').checkbox('set checked');");	
		$I->executeJS("jQuery('#appearance_breadcrumb_fixed_navigation_1').checkbox('set checked');");	


		// save 
		$I->click('Save Appearance Settings'); 	

		// confirm if saved properly or not. TODO actually we should connfirm all values of the form if saved and repopulated properly in edit mode or saved list or not. 
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-appearance');	//reload page
		$I->click('Breadcrumb');
		$I->see('4px', 'input');	//I verify that I can see "button tagline..." inside input tag 

	}

	public function filterWidgetStyling(AcceptanceTester $I) {

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-appearance');

		/* Map creation and modification tab */
		// go to the tab
		$I->click('//*[@id="eowbc_appearance"]/div[1]/a[3]');		//simple text based click wouldn'e work due to two filter named tabs 
		$I->see('Header Text Font');

		// set fields 
		$I->fillField('header_font', 'Sans...');
		$I->fillField('header_textcolor', 'red');
		$I->fillField('labels_textcolor', 'green');
		$I->fillField('slider_nodes_backcolor_active', 'red');
		$I->fillField('slider_track_backcolor_active', 'green');
		$I->fillField('icon_size', '10');
		$I->fillField('icon_label_size', '15');


		// save 
		$I->click('Save Appearance Settings'); 	

		// confirm if saved properly or not. TODO actually we should connfirm all values of the form if saved and repopulated properly in edit mode or saved list or not. 
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-appearance');	//reload page
		$I->click('Filters');
		$I->see('Sans...', 'input');	//I verify that I can see "button tagline..." inside input tag 

	}

	public function productPageStyling(AcceptanceTester $I) {

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-appearance');

		/* Map creation and modification tab */
		// go to the tab
		$I->click('Product Page');
		$I->see('First Category Add to Cart Button Text');

		// set fields 
		$I->fillField('fc_atc_button_text', 'Add to bag...');
		$I->fillField('sc_atc_button_text', 'Add to bagsc...');
		$I->fillField('product_page_add_to_basket', 'Add to basket');
		$I->executeJS("jQuery('#product_page_hide_first_variation_form_1').checkbox('set checked');");	
		$I->executeJS("jQuery('#product_page_hide_second_variation_form_1').checkbox('set checked');");	

		// save 
		$I->click('Save Appearance Settings'); 	

		// confirm if saved properly or not. TODO actually we should connfirm all values of the form if saved and repopulated properly in edit mode or saved list or not. 
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-appearance');	//reload page
		$I->wait(3);
		$I->click('Product Page');
		echo $I->grabPageSource();
		$I->see('Add to bag...', 'input');	//I verify that I can see "button tagline..." inside input tag 

	}

}
