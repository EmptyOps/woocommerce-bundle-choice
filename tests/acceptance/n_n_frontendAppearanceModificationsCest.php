<?php 

class n_n_frontendAppearanceModificationsCest extends n_f_adminSideSetupCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

    // test if editing the appearance of buttons works or not  
    public function modifyButtonAppearance(AcceptanceTester $I)
    {
        if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        // TODO At least in one environment, in future we should test all(including default) alternate button widgets by simply looping here 

        // change random appearance
        $this->modifyAppearance($I, 'Buttons Widget', array( 'tagline_text', 'button_text', 'button_backcolor_active', 'button_radius' ), array( 'tagline_text', 'button_text', 'button_backcolor_active', 'button_radius' ), array( 'text', 'text', 'color', 'text' ), array( 'My custom tagline', 'Continue With', '#000000', '1px' ), '//*[@id="wid_btns_submit_btn"]', array( '' ));

        // TODO still all the appearance are not tested 

        // go to target page
        $I->amOnPage('/index.php/design-your-own-ring/');

        // verify changed appearance
        $this->verifyAppearance($I, array( 'tagline_text', 'button_text', 'button_backcolor_active' ), array( 'tagline_text', 'button_text', 'button_backcolor_active' ), array( 'text', 'text', 'color' ), array( 'My custom tagline', 'Continue With', '#000000' ), array(), array('','','#wbc_ > div > div > button:nth-child(1)'), array('','','backgroundColor'));

        // change button texts back so that tests to follow are not affected
        $this->modifyAppearance($I, 'Buttons Widget', array( 'button_text' ), array( 'button_text' ), array( 'text' ), array( 'Start with' ), '//*[@id="wid_btns_submit_btn"]', array( '' ));
    }

    // test if editing the appearance of breadcrumb works or not  
    public function modifyBreadcrumbAppearance(AcceptanceTester $I)
    {
        if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        // TODO At least in one environment, in future we should test all(including default) alternate breadcrumb widgets by simply looping here 

        // change random appearance
        $this->modifyAppearance($I,'Breadcrumb', 
            array( 'breadcrumb_radius', 'breadcrumb_backcolor_active', 'breadcrumb_backcolor_inactive', 'breadcrumb_num_icon_backcolor_active', 'breadcrumb_title_backcolor_inactive', 'breadcrumb_actions_backcolor_inactive' ), 
            array( 'breadcrumb_radius', 'breadcrumb_backcolor_active', 'breadcrumb_backcolor_inactive', 'breadcrumb_num_icon_backcolor_active', 'breadcrumb_title_backcolor_inactive', 'breadcrumb_actions_backcolor_inactive' ), 
            array( 'text', 'color', 'color', 'color', 'color', 'color' ), 
            array( '5px', '#f1f1f1', '#ffffff', '#000000', '#00ff00', '#49bf50' ), '//*[@id="breadcrumb_submit_btn"]', array( '' ));

        // TODO still all the appearance are not tested like the last 3 switches are not modified yet

        // go to target page
        $this->gotoStep($I, 1, false, "n_" ); 

        // verify changed appearance
        $this->verifyAppearance($I, array( 'breadcrumb_radius', 'breadcrumb_backcolor_active', 'breadcrumb_backcolor_inactive', 'breadcrumb_num_icon_backcolor_active', 'breadcrumb_title_backcolor_inactive', 'breadcrumb_actions_backcolor_inactive' ), 
            array( 'breadcrumb_radius', 'breadcrumb_backcolor_active', 'breadcrumb_backcolor_inactive', 'breadcrumb_num_icon_backcolor_active', 'breadcrumb_title_backcolor_inactive', 'breadcrumb_actions_backcolor_inactive' ), 
            array( 'css', 'color', 'color', 'color', 'color', 'color' ), 
            array( '5px', '#f1f1f1', '#ffffff', '#000000', '#00ff00', '#49bf50' ), array(), 
            array('#main > header > div:nth-child(4) > div > div:nth-child(2)','#main > header > div:nth-child(4) > div > div.active.step','#main > header > div:nth-child(4) > div > div:nth-child(2)', '#main > header > div:nth-child(4) > div > div.active.step > div > div.ui.grid > div:nth-child(1)', '#main > header > div:nth-child(4) > div > div:nth-child(2) > div > div.ui.grid > div:nth-child(2) > div.title', '#main > header > div:nth-child(4) > div > div:nth-child(2) > div > div:nth-child(3) > u:nth-child(3) > a'), 
            array('border-radius','backgroundColor','backgroundColor', 'color','color','color'));
    }

    // test if editing the appearance of filters works or not  
    public function modifyFiltersAppearance(AcceptanceTester $I)
    {
        if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        // TODO At least in one environment, in future, we should test all(including default) alternate filter widgets by simply looping here

        // for first category and second category. loop.
        for($cat=0; $cat<2; $cat++) {

            $field_id = array( 'header_textcolor', 'labels_textcolor', 'slider_nodes_backcolor_active', 'slider_track_backcolor_active', 'icon_size' );
            $field_name = array( 'header_textcolor', 'labels_textcolor', 'slider_nodes_backcolor_active', 'slider_track_backcolor_active', 'icon_size' );
            $field_type = array( 'color', 'color', 'color', 'color', 'text' );
            $val = array( '#000000', '#00ff00', '#000000', '#00ff00', '64px' );

            if( $cat == 0 ) {

                //need to set selector according to template 
                if( $I->get_session('wbc_suite_n__process_current_filter_template') == "fc1" ) {
                    $selector_of_targets = array('#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > p > spna', '#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > div > div:nth-child(1) > div:nth-child(2)', '#text_slider_pa_eo_carat_attr > div > div:nth-child(3)', '/html/body/section/main/header/div[5]/div/div[1]/div/div[2]/div[2]/div/div[1]', '#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > div > div:nth-child(1) > div:nth-child(1) > img');
                }
                elseif( $I->get_session('wbc_suite_n__process_current_filter_template') == "fc2" ) {
                    $selector_of_targets = array('/html/body/section/main/header/div[5]/div/div[1]/div/div[1]/p/spna', '#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > div > div:nth-child(1) > div:nth-child(2)', '#text_slider_pa_eo_carat_attr > div > div:nth-child(3)', '/html/body/section/main/header/div[5]/div/div[1]/div/div[2]/div[2]/div/div[1]', '#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > div > div:nth-child(1) > div:nth-child(1) > img');
                }
                elseif( $I->get_session('wbc_suite_n__process_current_filter_template') == "fc3" ) {
                    $selector_of_targets = array('/html/body/section/main/header/div[5]/div/div[1]/div/div[1]/p/spna', '#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > div > div:nth-child(1) > div:nth-child(2)', '#text_slider_pa_eo_carat_attr > div > div:nth-child(3)', '/html/body/section/main/header/div[5]/div/div[1]/div/div[2]/div[2]/div/div[1]', '#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > div > div:nth-child(1) > div:nth-child(1) > img');
                }
                elseif( $I->get_session('wbc_suite_n__process_current_filter_template') == "fc4" ) {
                    $selector_of_targets = array('/html/body/section/main/header/div[5]/div/div[1]/div/div[1]/p/spna', '#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > div > div:nth-child(1) > div:nth-child(2)', '#text_slider_pa_eo_carat_attr > div > div:nth-child(3)', '/html/body/section/main/header/div[5]/div/div[1]/div/div[2]/div[2]/div/div[1]', '#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > div > div:nth-child(1) > div:nth-child(1) > img');
                }
                
                $css_property_of_targets = array('color','color','backgroundColor', 'backgroundColor','width');
            }
            else {
                $selector_of_targets = array('#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > p > spna', '#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > div > div:nth-child(1) > div:nth-child(2)', '#text_slider_pa_eo_carat_attr > div > div:nth-child(3)', '/html/body/section/main/header/div[5]/div/div[1]/div/div[2]/div[2]/div/div[1]', '#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > div > div:nth-child(1) > div:nth-child(1) > img');
                $css_property_of_targets = array('color','color','backgroundColor', 'backgroundColor','width');
            } 

            // change random appearance
            $this->modifyAppearance($I, '/html/body/div[1]/div[2]/div[2]/div[1]/div[4]/div[2]/div/form/div[1]/a[3]', $field_id, $field_name, $field_type, $val, '//*[@id="filters_submit_btn"]', array( '' ));

            // TODO still all the appearance are not tested like the header text font, icon label size etc. 

            // go to target page
            $this->gotoStep($I, $cat, false, "n_"); 

            // since icon size will require checking css property
            $field_type[4] = "css";

            // verify changed appearance
            $this->verifyAppearance($I, $field_id, $field_name, $field_type, $val, array(), $selector_of_targets, $css_property_of_targets );
        }

    }

    // test if editing the appearance of item page button works or not  
    public function modifyItemPageButtonAppearance(AcceptanceTester $I)
    {
        if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        // TODO At least in one environment, in future, we should test all(including default) alternate item page button widgets by simply looping here

        $field_id = array( 'fc_atc_button_text', 'sc_atc_button_text', 'product_page_add_to_basket' );
        $field_name = array( 'fc_atc_button_text', 'sc_atc_button_text', 'product_page_add_to_basket' );
        $field_type = array( 'text', 'text', 'text' );
        $val = array( 'Next...', 'Next...', 'Add in cart...' );

        $selector_of_targets = array();
        $css_property_of_targets = array();

        // change random appearance
        $this->modifyAppearance($I, 'Product Page', $field_id, $field_name, $field_type, $val, '//*[@id="product_page_submit_btn"]', array( '' ));

        // TODO still all the appearance are not tested like sc_atc_button_text, product_page_add_to_basket etc. 

        // go to target page
        $this->gotoProductFromCategoryPage($I, 0); 

        unset($field_id[1]); unset($field_id[2]);
        unset($field_name[1]); unset($field_name[2]);
        unset($field_type[1]); unset($field_type[2]);
        unset($val[1]); unset($val[2]);

        // verify changed appearance
        $this->verifyAppearance($I, $field_id, $field_name, $field_type, $val, array(), $selector_of_targets, $css_property_of_targets );

    }
    
}
