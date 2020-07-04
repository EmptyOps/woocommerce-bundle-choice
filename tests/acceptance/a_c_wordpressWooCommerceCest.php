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
        if( !$I->test_allowed_in_this_environment("a_") && !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        //reset session only from the first test so that all tests are ran on fresh empty session.
        $I->resetSession();

    	$I->amOnPage('/');
        // echo $I->grabPageSource();
        $I->see('Just another WordPress site');
    }

    public function wpAdminLoginWorks(AcceptanceTester $I)
    {
        if( !$I->test_allowed_in_this_environment("a_") && !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        // $I = new AcceptanceTester( $scenario );
        $I->wantTo( 'Check WordPress Admin Login' );

        //important: loginAsAdmin function will require wp-browser module enabled in codeception yml settings
        $I->loginAsAdmin();

        $I->see( 'Dashboard' );
        // echo $I->grabPageSource();
    }

    public function shopPageWorks(AcceptanceTester $I)
    {
        if( !$I->test_allowed_in_this_environment("a_") && !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }
        
        $I->amOnPage('index.php/shop');
        // echo $I->grabPageSource();
        $I->see('Shop');
    }

}
