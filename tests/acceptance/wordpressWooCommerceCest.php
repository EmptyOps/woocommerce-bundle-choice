<?php 

class wordpressWooCommerceCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }

    
	public function homePageWorks(AcceptanceTester $I)
    {
    	$I->amOnPage('/');
        // echo $I->grabPageSource();
        $I->see('Just another WordPress site');
    }

    public function wpAdminLoginWorks(AcceptanceTester $I)
    {
        // $I = new AcceptanceTester( $scenario );
        $I->wantTo( 'Check WordPress Admin Login' );

        //important: loginAsAdmin function will require wp-browser module enabled in codeception yml settings
        $I->loginAsAdmin();

        $I->see( 'Dashboard' );
        // echo $I->grabPageSource();
    }

    public function shopPageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('index.php/shop');
        // echo $I->grabPageSource();
        $I->see('Shop');
    }

}
