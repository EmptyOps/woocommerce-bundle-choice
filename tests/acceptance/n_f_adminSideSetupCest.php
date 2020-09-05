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
    
    protected function setAlternateBreadcrumbWidget(AcceptanceTester $I, $widget_key, $widget_option)
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
        // $I->executeJS("jQuery('#".$widget_key."').prop('checked',true);"); 
        $I->selectOption('form input[name=config_alternate_breadcrumb]', $widget_option);
        // $I->executeJS("jQuery('#".$widget_key."').parent().checkbox('set checked', '".$widget_key."');");  

        // save 
        $I->scrollTo('//*[@id="config_navigation_conf_save_btn"]', -300, -100);
        $I->wait(3);
        $I->click('#config_navigation_conf_save_btn');  //('Save');     //it shouldn't be this way, but there seem some issue with selenium driver and thus when there is another Save button on the page even though on another page and is not visible but still selenium think it is visible and thus gives us error so need to use unique xPath like id etc. 

        $I->wbc_debug_log($I, '#config_navigation_conf_save_btn');

        // since due to sample data is there it may take time to install alternate widget's sample data 
        $I->waitForText('Updated successfully', 10);

        // confirm if saved properly or not
        $I->reloadPage();   //reload page
        $I->click('Navigations Steps( Breadcrumb )');
        $I->radioAssertion($I, $widget_key, "config_alternate_breadcrumb", $widget_key); 
    }

    protected function getCurrentBreadcrumbWidget(AcceptanceTester $I)
    {
        // if( !$I->test_allowed_in_this_environment("n_") ) {
        //     return;
        // }

        // go to the page
        $I->amOnPage('/wp-admin/admin.php?page=eowbc-configuration');

        // go to the tab
        $I->click('Navigations Steps( Breadcrumb )');
        $I->see('First Category');

        $I->getRadioValue($I, "config_alternate_breadcrumb"); 
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
        $I->executeJS("jQuery('#".$widget_key."').prop('checked',true);"); 
        // $I->executeJS("jQuery('#".$widget_key."').parent().checkbox('set checked', '".$widget_key."');");  

        // $I->scrollTo('//*[@id="submit_btn"]');
        // $I->wait(3);
        
        // save 
        $I->click('#submit_btn');  //('Save');     //it shouldn't be this way, but there seem some issue with selenium driver and thus when there is another Save button on the page even though on another page and is not visible but still selenium think it is visible and thus gives us error so need to use unique xPath like id etc. 

        // since due to sample data is there it may take time to install alternate widget's sample data 
        $I->waitForText('Saved!', 10);

        // confirm if saved properly or not
        $I->reloadPage();   //reload page
        $I->click('Alternate Filter Widgets');
        // $I->seeInField($cat == 0 ? 'first_category_altr_filt_widgts' : 'second_category_altr_filt_widgts', $widget_key);
        $I->radioAssertion($I, $widget_key, $cat == 0 ? 'first_category_altr_filt_widgts' : 'second_category_altr_filt_widgts', $widget_key); 
    }

    protected function gotoStep(AcceptanceTester $I, $cat=0, $go_directly=false, $suite_name_prefix = "n_")
    {
        $I->amOnPage('/index.php/design-your-own-ring/');

        $I->see($I->get_configs('first_button_text', 'n_'));
        $I->see($I->get_configs('second_button_text', 'n_'));

        $I->click($I->get_configs( (!$go_directly || $cat == 0) ? 'first_button_text' : 'second_button_text', 'n_'));

        $I->waitForText( $I->get_configs('cat_name_'.( !$go_directly ? '0' : $cat ), 'n_'), 10);  
        $I->see('CHOOSE A');  
        
        if(!$go_directly && $cat > 0) {
            // go to second category filter
            $I->scrollTo('//*[@id="main"]/ul/li/a/img');
            $I->wait(3);

            $I->click('//*[@id="main"]/ul/li/a/img');

            // $I->waitForText('Continue');

            $I->executeJS("window.scrollTo( 0, 300 );");
            $I->wait(3);

            //first select required options for variable product, otherwise it won't let us add into cart. 
            if( $suite_name_prefix != "n_" ) { 
                $I->click('//*[@id="product-13"]/div[2]/form/table/tbody/tr/td[2]/div/span[2]/ul/li[1]/div');
            }

            // click on continue button
            $I->click( '//*[@id="eo_wbc_add_to_cart"]' );

            // verify 
            $price_of_product = $I->get_configs('first_product_price', 'n_');    //TODO make it dynamic if its random in sample data
            $I->waitForText($price_of_product, 10);
        }
    }

    protected function gotoProductFromCategoryPage(AcceptanceTester $I, $cat=0, $button_title="Continue")
    {
        $this->gotoStep( $I, $cat );

        $I->scrollTo('//*[@id="main"]/ul/li/a/img');
        $I->wait(3);

        $I->click('//*[@id="main"]/ul/li/a/img');
        $I->waitForText('Specifications', 10);    //remember that waitForText is case sensitive.
        $I->see($button_title);    
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


            // if( $field_type[$i] == "text" ) {
            //     $I->fillField($field_name[$i], $val[$i]);
            // }
            // elseif( $field_type[$i] == "checkbox" || $field_type[$i] == "radio" ) {
            //     $I->executeJS("jQuery('#".$field_id[$i]."').parent().checkbox('set checked', '".$val[$i]."');");  
            // }
            // elseif( $field_type[$i] == "color" ) {
            //     $I->executeJS('jQuery("#'.$field_id[$i].'").val("'.$val[$i].'");');  
            // }
            // elseif( $field_type[$i] == "select" ) {
            //     $I->executeJS("jQuery('#".$field_dropdown_div_id[$i]."').dropdown('set selected', '".$val[$i]."');");
            // }

            $I->wbc_fillField($I,$field_id[$i],$field_type[$i],$field_name[$i],$val[$i], isset($field_dropdown_div_id[$i]) ? $field_dropdown_div_id[$i] : "" ); 
        }
        
        $I->scrollTo($save_button_xpath, -300, -100);
        $I->wait(3);

        // save 
        $I->click($save_button_xpath);  

        // in case server is hanged and it takes time!
        $I->waitForText('Saved!', 10);

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

        // load common js, needed for the color code retrieval 
        $I->loadCommonJs($I);

        // verify
        for($i=0; $i<sizeof($field_id); $i++) {
            if( $field_type[$i] == "text" ) {
                $I->see($val[$i]);
            }
            elseif( $field_type[$i] == "checkbox" || $field_type[$i] == "radio" ) {
                $I->see($should_see_text[$i]);
            }
            elseif( $field_type[$i] == "color" ) {
                $colorcode = $I->getElementColorHexCode($I, $selector_of_targets[$i], $css_property_of_targets[$i] );  
                echo "colorcode found... ".$colorcode;
                if( $colorcode == $val[$i] ) {
                    $I->dontSee('sd8324hs65gkjv73h');   // assume passed with dummy assert
                }
                else {
                    $I->see('sd8324hs65gkjv73h');   // assume failed with dummy assert
                }
            }
            elseif( $field_type[$i] == "css" ) {
                $cssval = $I->getElementCss($I, $selector_of_targets[$i], $css_property_of_targets[$i] );  
                echo "cssval found... ".$cssval;
                if( $cssval == $val[$i] ) {
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

    protected function modifyFilters(AcceptanceTester $I, $tab, $filter, $filter_id, $field_id, $field_name, $field_type, $val, $save_button_xpath, $field_dropdown_div_id=array())
    {
        // if( !$I->test_allowed_in_this_environment("n_") ) {
        //     return;
        // }

        // go to the page
        $I->amOnPage('/wp-admin/admin.php?page=eowbc-filters');

        // go to the tab
        $I->click($tab);
        // $I->see('First Category');

        // set field
        for($i=0; $i<sizeof($field_id); $i++) {

            // simulate edit click is yet to be done 
                // find target row based on filter_id 
                // find and click edit action within the row
                $I->editActionClick( $I, $filter[$i] ); 
        
            $I->wbc_fillField($I,$field_id[$i],$field_type[$i],$field_name[$i],$val[$i], isset($field_dropdown_div_id[$i]) ? $field_dropdown_div_id[$i] : ""); 
        }
        
        $I->scrollTo($save_button_xpath);
        $I->wait(3);
        
        // save 
        $I->click($save_button_xpath);  

        $I->wbc_debug_log($I, '#d_fconfig_submit_btn');

        // in case server is hanged and it takes time!
        $I->waitForText('Filter updated successfuly', 10);

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

    protected function modifyMappings(AcceptanceTester $I, $tab, $operation, $mapping, $field_id, $field_name, $field_type, $val, $save_button_xpath, $field_dropdown_div_id=array())
    {
        // if( !$I->test_allowed_in_this_environment("n_") ) {
        //     return;
        // }

        for($i=0; $i<sizeof($operation); $i++) {
            // go to the page
            $I->amOnPage('/wp-admin/admin.php?page=eowbc-mapping');

            // go to the tab
            $I->click($tab);
            // $I->see('First Category');


            // here check operation type first and than do add or edit
            if( $operation[$i] == "edit" ) {
                // find target row based on mapping, find and click edit action within the row 
                $I->editActionClick( $I, $mapping[$i] ); 
            }

            // set field
            for ($j=0; $j < sizeof($field_id[$i]); $j++) { 
                $I->wbc_fillField($I,$field_id[$i][$j],$field_type[$i][$j],$field_name[$i][$j],$val[$i][$j], isset($field_dropdown_div_id[$i][$j]) ? $field_dropdown_div_id[$i][$j] : "" ); 
            }

            $I->scrollTo($save_button_xpath);
            $I->wait(3);
            
            // save 
            $I->click($save_button_xpath);  

            // confirm if saved properly or not
            $I->reloadPage();   //reload page
            $I->click($tab);
            for($j=0; $j < sizeof($field_id[$i]); $j++) {
                // TODO find target row based on filter_id and than look/see into that
            }
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

    protected function enablingBonusFeature(AcceptanceTester $I, $feature_id, $target_page, $text_verification, $target_tab='') {

        if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

        if( empty($feature_id) ) return;

        //login to admin panel, should save and maintain cookies so that do not need to login on all admin test. but yeah however during the front end test should flush the admin cookie first.  
        $I->loginAsAdmin();
        $I->see( 'Dashboard' );

        // go to the page
        $I->amOnPage('/wp-admin/admin.php?page=eowbc-setting-status');

        $I->see('Choose features');

        // 
        $I->executeJS("jQuery('#".$feature_id."').parent().checkbox('set checked', '".$feature_id."');");   
        
        $I->scrollTo('//*[@id="save"]', -300, -300);
        $I->wait(3);

        // save 
        $I->click('Save');  
        $I->wait(2);

        // verify
        $I->amOnPage('/wp-admin/admin.php?page='.$target_page);

        if( !empty($target_tab) ) {
            $I->click($target_tab);
        }

        $I->see($text_verification);

    }

    protected function addEditFilters(AcceptanceTester $I, $prefix, $is_edit_mode, $goto_page='', $goto_tab='', $tab_verification_text='', $edit_fields=array()) {

        if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

        // go to page
        if( !empty($goto_page) ) {

        }
        else {
            $I->executeJS('window.scrollTo( 0, 0 );');       //$I->scrollTo('Save'); 
            $I->wait(3);
        }

        // go to the tab
        $I->click($goto_tab);
        $I->see($tab_verification_text);

        // field values 
        $label = !$is_edit_mode || !isset($edit_fields['label']) ? 'Test '.$prefix.' filter' : $edit_fields['label'];

        // set fields 
        $I->executeJS("jQuery('#".$prefix."_fconfig_filter_dropdown_div').dropdown('set selected', 15);");  //better than setting val directly is to select the nth element that has value val 
        $I->fillField("".$prefix."_fconfig_label", $label);
        $I->executeJS("jQuery('#".$prefix."_fconfig_is_advanced_1').checkbox('set unchecked');");   
        $I->fillField("".$prefix."_fconfig_column_width", '50');
        $I->fillField("".$prefix."_fconfig_ordering", '5');
        $I->executeJS("jQuery('#".$prefix."_fconfig_input_type').dropdown('set selected', 'text_slider');");    //better than setting val directly is to select the nth element that has value val 

        if( false ) {   // icon fields are applicable only when the filters with input type with icon is set, so set to false for now
            $I->fillField("".$prefix."_fconfig_icon_size", '0');
            $I->fillField("".$prefix."_fconfig_icon_label_size", '0');
        }
        
        $I->executeJS("jQuery('#".$prefix."_fconfig_add_reset_link_1').checkbox('set unchecked');");    

        $I->executeJS('window.scrollTo( 0, 1500 );');       //$I->scrollTo('Save'); 
        $I->wait(3);

        // save 
        $I->click("#".$prefix."_fconfig_submit_btn");   //('Save');     //it shouldn't be this way, but there seem some issue with selenium driver and thus when there is another Save button on the page even though on another page and is not visible but still selenium think it is visible and thus gives us error so need to use unique xPath like id etc. 

        // confirm if saved properly or not
        $I->reloadPage();   //reload page
        $I->click($goto_tab);
        $I->see($label); // see in table list row's td

    }


    protected function bulkEnableDisableDelete(AcceptanceTester $I, $entity_id, $bulk_action, $apply_button_selector ) {

        if( !$I->test_allowed_in_this_environment("sunob_a_") ) {
            return;
        }

        // select specified checkbox 
        $I->executeJS('jQuery = $;');   //since wasn't defined on some pages
        $I->executeJS("jQuery( jQuery('#eowbc_price_control_methods_list > tbody > tr > td:nth-child(1) > div > input[type=checkbox]')[0] ).prop('checked', true);");      //here should use entity_id to check the checkbox 

        // select specfied bulk action 
        $I->executeJS("jQuery('#eowbc_price_control_methods_list_bulk_dropdown_div').dropdown('set selected', '".$bulk_action."');");  //better than setting val directly is to select the nth element that has value val

        $I->scrollTo($apply_button_selector, -300, -300);
        $I->wait(3);

        // click action button 
        $I->click('Apply');

        if( $bulk_action == 'delete' ) {
            // TODO need to click here on javascript confirmation alert
        }

        // verify 
        if( $bulk_action == 'deactivate' ) {
            $I->waitForText('1 record(s) deactivated', 10);
        }
        elseif( $bulk_action == 'activate' ) {
            $I->waitForText('1 record(s) activated', 10);
        }
        elseif( $bulk_action == 'delete' ) {
            $I->waitForText('1 record(s) deleted', 10);
        }

    }

}
