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

    protected function gotoStep(AcceptanceTester $I, $cat=0)
    {
        $I->amOnPage('/design-your-own-ring/');

        $I->see($I->get_configs('first_button_text', 'n_'));
        $I->see($I->get_configs('second_button_text', 'n_'));

        $I->click($I->get_configs('first_button_text', 'n_'));

        $I->waitForText('CHOOSE A', 10);  
        
        if($cat > 0) {
            // go to second category filter
            $I->scrollTo('//*[@id="main"]/ul/li/a/img');
            $I->wait(3);

            $I->click('//*[@id="main"]/ul/li/a/img');
            $I->see('Continue');

            //first select required options for variable product, otherwise it won't let us add into cart. 
            $I->click('//*[@id="product-13"]/div[2]/form/table/tbody/tr/td[2]/div/span[2]/ul/li[1]/div');

            // click on continue button
            $I->click('Continue');

            // verify 
            $price_of_product = $I->get_configs('first_product_price', 'n_');    //TODO make it dynamic if its random in sample data
            $I->waitForText($price_of_product, 10);
        }
    }

    protected function gotoProductFromCategoryPage(AcceptanceTester $I, $cat=0)
    {
        $this->gotoStep( $I, $cat );

        $I->scrollTo('//*[@id="main"]/ul/li/a/img');
        $I->wait(3);

        $I->click('//*[@id="main"]/ul/li/a/img');
        $I->waitForText('Continue', 10);
    }

    protected function modifyAppearance(AcceptanceTester $I, $tab, $field_id, $field_name, $field_type, $val, $save_button_xpath, $field_dropdown_div_id=array())
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
        for($i=0; $i<sizeof($field_id); $i++) {

            if( $field_type[$i] == "text" ) {
                $I->fillField($field_name[$i], $val[$i]);
            }
            elseif( $field_type[$i] == "checkbox" || $field_type[$i] == "radio" ) {
                $I->executeJS("jQuery('#".$field_id[$i]."').parent().checkbox('set checked', '".$val[$i]."');");  
            }
            elseif( $field_type[$i] == "color" ) {
                $I->executeJS('jQuery("#'.$field_id[$i].'").val("'.$val[$i].'");');  
            }
            elseif( $field_type[$i] == "select" ) {
                $I->executeJS("jQuery('#".$field_dropdown_div_id[$i]."').dropdown('set selected', '".$val[$i]."');");
            }
        }
        
        $I->scrollTo($save_button_xpath);
        $I->wait(3);
        
        // save 
        $I->click($save_button_xpath);  

        // confirm if saved properly or not
        $I->reloadPage();   //reload page
        $I->click($tab);
        for($i=0; $i<sizeof($field_id); $i++) {
            $I->seeInField($field_name[$i], $val[$i]);
        }
    }

    protected function verifyAppearance(AcceptanceTester $I, $field_id, $field_name, $field_type, $val, $should_see_text=array(), $selector_of_targets=array(), $css_property_of_targets=array())
    {
        // if( !$I->test_allowed_in_this_environment("n_") ) {
        //     return;
        // }

        // this function assumes that browser session is currently at desired page where the appearance needs to be tested

        // verify
        for($i=0; $i<sizeof($field_id); $i++) {
            if( $field_type[$i] == "text" ) {
                $I->see($val[$i]);
            }
            elseif( $field_type[$i] == "checkbox" || $field_type[$i] == "radio" ) {
                $I->see($should_see_text[$i]);
            }
            elseif( $field_type[$i] == "color" ) {
                $colorcode = $I->executeJS('return jQuery("'.$selector_of_targets[$i].'").css("'.$css_property_of_targets[$i].'");');  
                echo "colorcode found... ".$colorcode;
                if( $colorcode == $val[$i] ) {
                    $I->dontSee('sd8324hs65gkjv73h');   // assume passed with dummy assert
                }
                else {
                    $I->see('sd8324hs65gkjv73h');   // assume failed with dummy assert
                }
            }
            elseif( $field_type[$i] == "select" ) {
                $I->see($should_see_text[$i]);
            }
        }
    }

    protected function modifyFilters(AcceptanceTester $I, $tab, $filter_id, $field_id, $field_name, $field_type, $val, $save_button_xpath, $field_dropdown_div_id=array())
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
        for($i=0; $i<sizeof($field_id); $i++) {

            // simulate edit click is yet to be done 
                // find target row based on filter_id 

                // find and click edit action within the row 
        
            if( $field_type[$i] == "text" ) {
                $I->fillField($field_name[$i], $val[$i]);
            }
            elseif( $field_type[$i] == "checkbox" || $field_type[$i] == "radio" ) {
                $I->executeJS("jQuery('#".$field_id[$i]."').parent().checkbox('set checked', '".$val[$i]."');");  
            }
            elseif( $field_type[$i] == "color" ) {
                $I->executeJS('jQuery("#'.$field_id[$i].'").val("'.$val[$i].'");');  
            }
            elseif( $field_type[$i] == "select" ) {
                $I->executeJS("jQuery('#".$field_dropdown_div_id[$i]."').dropdown('set selected', '".$val[$i]."');");
            }
        }
        
        $I->scrollTo($save_button_xpath);
        $I->wait(3);
        
        // save 
        $I->click($save_button_xpath);  

        // confirm if saved properly or not
        $I->reloadPage();   //reload page
        $I->click($tab);
        for($i=0; $i<sizeof($field_id); $i++) {
            // TODO find target row based on filter_id and than look/see into that
        }
    }

    protected function verifyFilters(AcceptanceTester $I,  $filter_id, $field_id, $field_name, $field_type, $val, $should_see_text=array(), $selector_of_targets=array(), $css_property_of_targets=array())
    {
        // if( !$I->test_allowed_in_this_environment("n_") ) {
        //     return;
        // }

        // this function assumes that browser session is currently at desired page where the appearance needs to be tested

        // verify
        for($i=0; $i<sizeof($field_id); $i++) {
            if( $field_type[$i] == "text" ) {
                $I->see($val[$i]);
            }
            elseif( $field_type[$i] == "checkbox" || $field_type[$i] == "radio" ) {
                $I->see($should_see_text[$i]);
            }
            elseif( $field_type[$i] == "color" ) {
                $colorcode = $I->executeJS('return jQuery("'.$selector_of_targets[$i].'").css("'.$css_property_of_targets[$i].'");');  
                echo "colorcode found... ".$colorcode;
                if( $colorcode == $val[$i] ) {
                    $I->dontSee('sd8324hs65gkjv73h');   // assume passed with dummy assert
                }
                else {
                    $I->see('sd8324hs65gkjv73h');   // assume failed with dummy assert
                }
            }
            elseif( $field_type[$i] == "select" ) {
                $I->see($should_see_text[$i]);
            }
        }
    }

    protected function modifyMappings(AcceptanceTester $I, $tab, $operation, $filter_id, $field_id, $field_name, $field_type, $val, $save_button_xpath, $field_dropdown_div_id=array())
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
        for($i=0; $i<sizeof($field_id); $i++) {

            // here check operation type first and than do add or edit

            // simulate edit click is yet to be done 
                // find target row based on filter_id 

                // find and click edit action within the row 
        
            if( $field_type[$i] == "text" ) {
                $I->fillField($field_name[$i], $val[$i]);
            }
            elseif( $field_type[$i] == "checkbox" || $field_type[$i] == "radio" ) {
                $I->executeJS("jQuery('#".$field_id[$i]."').parent().checkbox('set checked', '".$val[$i]."');");  
            }
            elseif( $field_type[$i] == "color" ) {
                $I->executeJS('jQuery("#'.$field_id[$i].'").val("'.$val[$i].'");');  
            }
            elseif( $field_type[$i] == "select" ) {
                $I->executeJS("jQuery('#".$field_dropdown_div_id[$i]."').dropdown('set selected', '".$val[$i]."');");
            }
        }
        
        $I->scrollTo($save_button_xpath);
        $I->wait(3);
        
        // save 
        $I->click($save_button_xpath);  

        // confirm if saved properly or not
        $I->reloadPage();   //reload page
        $I->click($tab);
        for($i=0; $i<sizeof($field_id); $i++) {
            // TODO find target row based on filter_id and than look/see into that
        }
    }

    protected function verifyMappings(AcceptanceTester $I, $filter_before_verification, $verifications )
    {
        // if( !$I->test_allowed_in_this_environment("n_") ) {
        //     return;
        // }

        // filter before going to next step 
        for($i=0; $i<sizeof($filter_before_verification); $i++) {
            for($j=0; $j<sizeof($filter_before_verification[$i]); $j++) {
                if( $filter_before_verification[$i][$j]["type"] == "click" ) {
                    $I->click($filter_before_verification[$i][$j]["xpath_or_text_or_css"]);
                }
                elseif( $filter_before_verification[$i][$j]["type"] == "executeJS" ) {
                    $I->executeJS($filter_before_verification[$i][$j]["js"]);
                }
            }
            
        }

        // go to next step 
        $I->scrollTo('//*[@id="main"]/ul/li/a/img');
        $I->wait(3);

        $I->click('//*[@id="main"]/ul/li/a/img');
        $I->waitForText('Continue', 10);

        // verify 
        for($i=0; $i<sizeof($verifications); $i++) {
            for($j=0; $j<sizeof($verifications[$i]); $j++) {
                if( $verifications[$i][$j]["type"] == "see" ) {
                    $I->see($verifications[$i][$j]["text"]);
                }
                elseif( $verifications[$i][$j]["type"] == "see_in_js" ) {
                    $colorcode = $I->executeJS('return jQuery("'.$selector_of_targets[$i].'").css("'.$css_property_of_targets[$i].'");');  
                    echo "colorcode found... ".$colorcode;
                    if( $colorcode == $val[$i] ) {
                        $I->dontSee('sd8324hs65gkjv73h');   // assume passed with dummy assert
                    }
                    else {
                        $I->see('sd8324hs65gkjv73h');   // assume failed with dummy assert
                    }
                }
            }
            
        }
        
    }

}
