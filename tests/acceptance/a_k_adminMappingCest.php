<?php 

class a_k_adminMappingCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    public function mapCreation(AcceptanceTester $I) {

<<<<<<< HEAD
=======
    	if( !$I->test_allowed_in_this_environment("a_") ) {
            return;
        }

>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
		//login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
		$I->loginAsAdmin();
		$I->see( 'Dashboard' );

		// go to the page
		$I->amOnPage('/wp-admin/admin.php?page=eowbc-mapping');

		/* Map creation and modification tab */
		// go to the tab
		$I->click('Map creation and modification');
		$I->see('Add New Maps');

		// set fields 
		$I->executeJS("jQuery('#eo_wbc_first_category_dropdown_div').dropdown('set selected', 17);");	//better than setting val directly is to select the nth element that has value val 	
		$I->executeJS("jQuery('#eo_wbc_second_category_dropdown_div').dropdown('set selected', 18);");	//better than setting val directly is to select the nth element that has value val 	


		// save 
		$I->click('#map_creation_modification_save_btn'); 	//used id since button label is supposed be changed

		// confirm if saved properly or not
		$I->reloadPage();	//reload page
		$I->click('Map creation and modification');
		$I->see('Round', 'td');
	}

	public function mapModification(AcceptanceTester $I) {
<<<<<<< HEAD
=======

		if( !$I->test_allowed_in_this_environment("a_") ) {
            return;
        }
        
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
		//TODO write this test when the modification feature is implemented
	}
}
