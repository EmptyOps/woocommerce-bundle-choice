<?php 

class FirstCest
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
    	echo "Running the test...";
        $I->amOnPage('/');
        echo "Fetched the page...";
        echo $I->grabPageSource();
        $I->see('Just another WordPress site');
    }

    public function shopPageWorks(AcceptanceTester $I)
    {
        echo "Running the test...";
        $I->amOnPage('shop');
        echo "Fetched the page...";
        echo $I->grabPageSource();
        $I->see('Shop');
    }

}
