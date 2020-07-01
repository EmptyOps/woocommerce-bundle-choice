<?php 

class a_c_wordpressWooCommerceCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    
	public function homePageWorks(AcceptanceTester $I)
    {
<<<<<<< HEAD
=======
        if( !$I->test_allowed_in_this_environment("a_") && !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
    	$I->amOnPage('/');
        // echo $I->grabPageSource();
        $I->see('Just another WordPress site');
    }

    public function wpAdminLoginWorks(AcceptanceTester $I)
    {
<<<<<<< HEAD
=======
        if( !$I->test_allowed_in_this_environment("a_") && !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
        // $I = new AcceptanceTester( $scenario );
        $I->wantTo( 'Check WordPress Admin Login' );

        //important: loginAsAdmin function will require wp-browser module enabled in codeception yml settings
        $I->loginAsAdmin();

        $I->see( 'Dashboard' );
        // echo $I->grabPageSource();
    }

    public function shopPageWorks(AcceptanceTester $I)
    {
<<<<<<< HEAD
=======
        if( !$I->test_allowed_in_this_environment("a_") && !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }
        
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
        $I->amOnPage('index.php/shop');
        // echo $I->grabPageSource();
        $I->see('Shop');
    }

}
