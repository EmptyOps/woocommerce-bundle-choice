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
		$I->see('Choose where you want to display buttons on home page');

		// select button position
		// // $I->selectOption('form select[name=config_buttons_page]', 'Premium');
		// // $I->fillField('config_buttons_page', '1');	
		// $I->click('#config_buttons_page_dropdown_div');
		// $I->click('Home page only');	//('#config_buttons_page_dropdown_div > div.menu.transition.visible > div:nth-child(2)');
		$I->executeJS("jQuery('#config_buttons_page_dropdown_div').dropdown('set selected', 1);");	//better than setting 1 directly is to select the nth element that has value 1 

		// save 
		$I->click('Save');

		// confirm if saved properly or not
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-configuration');	//reload page
		$I->click('Buttons');
		$I->see('Home page only');	//that is the position option selected

	}

	public function configureBreadcrumbNavigationsSteps(AcceptanceTester $I) {

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
		$I->executeJS("jQuery('#config_first_name_dropdown_div').dropdown('set selected', 15);");	//better than setting val directly is to select the nth element that has value val 
		$I->executeJS("jQuery('#config_second_name_dropdown_div').dropdown('set selected', 15);");	//better than setting val directly is to select the nth element that has value val 

		// set preview text
		$I->fillField('config_preview_name', 'Preview');

		// save 
		$I->scrollTo('Save');	//$I->scrollTo('#config_save_buttons_conf');
		$I->click('Save');

		// confirm if saved properly or not
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-configuration');	//reload page
		$I->click('Navigations Steps( Breadcrumb )');
		$I->see('Home page only ???');	//that is the position option selected

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
	// 	$_POST['config_business_type'] = 'jewelery';
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
	// 		"business_type"=>"jewelery",
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
