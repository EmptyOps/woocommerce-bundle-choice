<?php 

class a_g_adminConfigurationCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function configureButtonPosition(AcceptanceTester $I) {

    	if( !$I->test_allowed_in_this_environment("a_") ) {
            return;
        }

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		/* buttons tab */
		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-configuration');
		// echo $I->grabPageSource();
		
		// go to the tab
		// $I->click('General');
		$I->click('Buttons');
		$I->see('Choose where you want to display');

		// select button position
		// // $I->selectOption('form select[name=config_buttons_page]', 'Premium');
		// // $I->fillField('config_buttons_page', '1');	
		// $I->click('#config_buttons_page_dropdown_div');
		// $I->click('Home page only');	//('#config_buttons_page_dropdown_div > div.menu.transition.visible > div:nth-child(2)');
		$I->executeJS("jQuery('#buttons_page_dropdown_div').dropdown('set selected', 0);");	//better than setting 1 directly is to select the nth element that has value 1 

		$I->fillField('label_make_pair', 'dummy_text');

		$I->executeJS('window.scrollTo( 0, 300 );');		//$I->scrollTo('Save');	
		$I->wait(3);

		// save 
		$I->click('Save');

		// confirm if saved properly or not
		$I->reloadPage();	//reload page
		$I->click('Buttons');
		$I->see('Custom landing page');	//that is the position option selected

	}

	public function configureBreadcrumbNavigationsSteps(AcceptanceTester $I) {

		if( !$I->test_allowed_in_this_environment("a_") ) {
            return;
        }

		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-configuration');

		/* Navigations Steps( Breadcrumb ) tab */
		// go to the tab
		// $I->click('General');
		$I->click('Navigations Steps( Breadcrumb )');
		$I->see('First Category');

		// select category
		$I->executeJS("jQuery('#first_name_dropdown_div').dropdown('set selected', 19);");	//better than setting val directly is to select the nth element that has value val 
		$I->executeJS("jQuery('#second_name_dropdown_div').dropdown('set selected', 20);");	//better than setting val directly is to select the nth element that has value val 

		// set preview text
		$I->fillField('preview_name', 'Preview');

		// save 
		$I->executeJS('window.scrollTo( 0, jQuery("#config_navigation_conf_save_btn").scrollTop() + 1000 );');		//$I->scrollTo('Save');	//$I->scrollTo('#config_navigation_conf_save_btn');
		$I->wait(3);
		$I->click('#config_navigation_conf_save_btn'); 	//('Save');		//it shouldn't be this way, but there seem some issue with selenium driver and thus when there is another Save button on the page even though on another page and is not visible but still selenium think it is visible and thus gives us error so need to use unique xPath like id etc. 

		// confirm if saved properly or not
		$I->reloadPage();	//reload page
		$I->click('Navigations Steps( Breadcrumb )');
		$I->see('Diamond');	//that is the position option selected

	}

	//HOLD FOR REMOVAL: but before removing below one first confirm that all the unit tests in the below function are covered in the new acceptance tests 
	// public function testSaveOptions(AcceptanceTester $I) {

	// 	//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
	// 	$I->loginAsAdmin();
	// 	$I->see( 'Dashboard' );

	// 	$I->amOnPage('/wp-admin/admin.php?page=eowbc');
	// 	// $I->fillField('username', 'davert');
	// 	// $I->fillField('password', 'qwerty');
	// 	echo $I->grabPageSource();
	// 	$I->click('General');
	// 	$I->click('Buttons');
	// 	$I->
	// 	return;
	// 	$I->see('Welcome, Davert!');

	// 	$_POST['_wpnonce'] = wp_create_nonce('eowbc_configuration');
	// 	$_POST['resolver'] = 'eowbc_configuration';
	// 	$_POST['config_business_type'] = 'jewelry';
	// 	$_POST['config_buttons_page'] = '1';
	// 	$_POST['config_enable_make_pair'] = 'enable_make_pair';
	// 	$_POST['config_label_make_pair'] = 'Make Pair';
	// 	$_POST['config_first_name'] = 'first_name';
	// 	$_POST['config_first_icon'] = 'first_icon';
	// 	$_POST['config_second_name'] = 'second_name';
	// 	$_POST['config_second_icon'] = 'second_icon';
	// 	$_POST['config_preview_name'] = 'preview_name';
	// 	$_POST['config_preview_icon'] = 'preview_icon';
	// 	$_POST['config_filter_status'] = 'filter_status';
	// 	$_POST['config_pair_maker_status'] = 'pair_maker_status';
	// 	$_POST['config_pair_maker_upper_card'] = 'pair_maker_upper_card';

	// 	$expected = serialize(array(
	// 		"business_type"=>"jewelry",
	// 		"buttons_page"=>"1",
	// 		"enable_make_pair"=>"enable_make_pair",
	// 		"label_make_pair"=>"Make Pair",
	// 		"first_name"=>"first_name",
	// 		"first_icon"=>"first_icon",
	// 		"second_name"=>"second_name",
	// 		"second_icon"=>"second_icon",
	// 		"preview_name"=>"preview_name",
	// 		"preview_icon"=>"preview_icon",
	// 		"filter_status"=>"filter_status",
	// 		"pair_maker_status"=>"pair_maker_status",
	// 		"pair_maker_upper_card"=>"pair_maker_upper_card"			
	// 	));

	// 	require_once constant('EOWBC_DIRECTORY').'application/controllers/ajax/'.sanitize_text_field($_POST['resolver']).'.php';
	// 	$result = get_option('eowbc_option_configuration',"a:0:{}");
	// 	$this->assertEquals($expected , $result);
	// }

}
