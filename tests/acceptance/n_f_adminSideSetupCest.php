<?php 

class n_f_adminSideSetupCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }
    
    protected function setAlternateBreadcrumbWidget(AcceptanceTester $I, $widget_key)
    {
        // if( !$I->test_allowed_in_this_environment("n_") ) {
        //     return;
        // }

        // go to the page
        $I->amOnPage('/wp-admin/admin.php?page=eowbc-configuration');

        // go to the tab
        $I->click('Navigations Steps( Breadcrumb )');
        $I->see('First Category');

        // select template
        $I->executeJS("jQuery('#".$widget_key."').parent().checkbox('set checked', '".$widget_key."');");  

        // save 
        $I->scrollTo('//*[@id="config_navigation_conf_save_btn"]');
        $I->wait(3);
        $I->click('#config_navigation_conf_save_btn');  //('Save');     //it shouldn't be this way, but there seem some issue with selenium driver and thus when there is another Save button on the page even though on another page and is not visible but still selenium think it is visible and thus gives us error so need to use unique xPath like id etc. 

        // confirm if saved properly or not
        $I->reloadPage();   //reload page
        $I->click('Navigations Steps( Breadcrumb )');
        $I->seeInField('config_alternate_breadcrumb', $widget_key);
    }

    protected function setAlternateFilterWidget(AcceptanceTester $I, $widget_key, $cat)
    {
        // if( !$I->test_allowed_in_this_environment("n_") ) {
        //     return;
        // }

        // go to the page
        $I->amOnPage('/wp-admin/admin.php?page=eowbc-filters');

        // go to the tab
        $I->click('Alternate Filter Widgets');
        $I->see('First Category');

        // select template
        $I->executeJS("jQuery('#".$widget_key."').parent().checkbox('set checked', '".$widget_key."');");  

        // $I->scrollTo('//*[@id="submit_btn"]');
        // $I->wait(3);
        
        // save 
        $I->click('#submit_btn');  //('Save');     //it shouldn't be this way, but there seem some issue with selenium driver and thus when there is another Save button on the page even though on another page and is not visible but still selenium think it is visible and thus gives us error so need to use unique xPath like id etc. 

        // confirm if saved properly or not
        $I->reloadPage();   //reload page
        $I->click('Alternate Filter Widgets');
        $I->seeInField($cat == 0 ? 'first_category_altr_filt_widgts' : 'second_category_altr_filt_widgts', $widget_key);
    }

    protected function modifyAppearance($tab, $field_id, $field_type, $val)
    {
        // if( !$I->test_allowed_in_this_environment("n_") ) {
        //     return;
        // }

        // go to the page
        $I->amOnPage('/wp-admin/admin.php?page=eowbc-appearance');

        // go to the tab
        $I->click($tab);
        // $I->see('First Category');

        // set field
        $I->executeJS("jQuery('#".$widget_key."').parent().checkbox('set checked', '".$widget_key."');");  

        // $I->scrollTo('//*[@id="submit_btn"]');
        // $I->wait(3);
        
        // save 
        $I->click('#submit_btn');  //('Save');     //it shouldn't be this way, but there seem some issue with selenium driver and thus when there is another Save button on the page even though on another page and is not visible but still selenium think it is visible and thus gives us error so need to use unique xPath like id etc. 

        // confirm if saved properly or not
        $I->reloadPage();   //reload page
        $I->click('Alternate Filter Widgets');
        $I->seeInField($cat == 0 ? 'first_category_altr_filt_widgts' : 'second_category_altr_filt_widgts', $widget_key);
    }

}
