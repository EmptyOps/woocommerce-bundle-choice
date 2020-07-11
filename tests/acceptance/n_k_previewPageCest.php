<?php 

class n_k_previewPageCest extends f_m_previewPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

	public function previewPage(AcceptanceTester $I, $suite_name_prefix=false) {
		
		if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        parent::previewPage($I, $suite_name_prefix);
	}

	public function addToCart(AcceptanceTester $I, $suite_name_prefix=false) {
		
		if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        parent::addToCart($I, $suite_name_prefix);
	}
    
}
