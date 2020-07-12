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

        // change random appearance
        $this->modifyAppearance('Buttons Widget', array( 'tagline_text', 'button_text', 'button_backcolor_active' ), array( 'tagline_text', 'button_text', 'button_backcolor_active' ), array( 'text', 'text', 'color' ), array( 'My custom tagline', 'Continue With', '#000000' ), '//*[@id="wid_btns_submit_btn"]', array( '' ));

        // TODO still all the appearance are not tested 

        // go to target page
        $I->amOnPage('/design-your-own-ring/');

        // verify changed appearance
        $this->verifyAppearance( array( 'tagline_text', 'button_text', 'button_backcolor_active' ), array( 'tagline_text', 'button_text', 'button_backcolor_active' ), array( 'text', 'text', 'color' ), array( 'My custom tagline', 'Continue With', '#000000' ), array(), array('','','#wbc_ > div > div > button:nth-child(1)'), array('','','backgroundColor'));
    }

    // test if editing the appearance of breadcrumb works or not  
    public function modifyBreadcrumbAppearance(AcceptanceTester $I)
    {
        if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        // change random appearance
        $this->modifyAppearance('Breadcrumb', 
            array( 'breadcrumb_radius', 'breadcrumb_backcolor_active', 'breadcrumb_backcolor_inactive', 'breadcrumb_num_icon_backcolor_active', 'breadcrumb_title_backcolor_inactive', 'breadcrumb_actions_backcolor_inactive' ), 
            array( 'breadcrumb_radius', 'breadcrumb_backcolor_active', 'breadcrumb_backcolor_inactive', 'breadcrumb_num_icon_backcolor_active', 'breadcrumb_title_backcolor_inactive', 'breadcrumb_actions_backcolor_inactive' ), 
            array( 'text', 'color', 'color', 'color', 'color', 'color' ), 
            array( '5px', '#f1f1f1', '#ffffff', '#000000', '#00ff00', '#d100ff' ), '//*[@id="breadcrumb_submit_btn"]', array( '' ));

        // TODO still all the appearance are not tested like the last 3 switches are not modifies yet

        // go to target page
        $this->gotoStep($I, $cat); 

        // verify changed appearance
        $this->verifyAppearance( array( 'breadcrumb_radius', 'breadcrumb_backcolor_active', 'breadcrumb_backcolor_inactive', 'breadcrumb_num_icon_backcolor_active', 'breadcrumb_title_backcolor_inactive', 'breadcrumb_actions_backcolor_inactive' ), 
            array( 'breadcrumb_radius', 'breadcrumb_backcolor_active', 'breadcrumb_backcolor_inactive', 'breadcrumb_num_icon_backcolor_active', 'breadcrumb_title_backcolor_inactive', 'breadcrumb_actions_backcolor_inactive' ), 
            array( 'text', 'color', 'color', 'color', 'color', 'color' ), 
            array( '5px', '#f1f1f1', '#ffffff', '#000000', '#00ff00', '#d100ff' ), array(), 
            array('#main > header > div:nth-child(4) > div > div:nth-child(2)','#main > header > div:nth-child(4) > div > div.active.step','#main > header > div:nth-child(4) > div > div:nth-child(2)', '#main > header > div:nth-child(4) > div > div.active.step > div > div.ui.grid > div:nth-child(1)', '#main > header > div:nth-child(4) > div > div:nth-child(2) > div > div.ui.grid > div:nth-child(2) > div.title', '#main > header > div:nth-child(4) > div > div:nth-child(2) > div > div:nth-child(3) > u:nth-child(3) > a'), 
            array('border-radius','backgroundColor','backgroundColor', 'color','color','color'));
    }

    // test if editing the appearance of filters works or not  
    public function modifyFiltersAppearance(AcceptanceTester $I)
    {
        if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        // for first category and second category. loop.
        for($cat=0; $cat<2; $cat++) {

            $field_id = array( 'header_textcolor', 'labels_textcolor', 'slider_nodes_backcolor_active', 'slider_track_backcolor_active', 'icon_size' );
            $field_name = array( 'header_textcolor', 'labels_textcolor', 'slider_nodes_backcolor_active', 'slider_track_backcolor_active', 'icon_size' );
            $field_type = array( 'color', 'color', 'color', 'color', 'text' );
            $val = array( '#000000', '#00ff00', '#000000', '#00ff00', '64px' );

            if( $cat == 0 ) {
                $selector_of_targets = array('#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > p > spna', '#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > div > div:nth-child(1) > div:nth-child(2)', '#text_slider_pa_eo_carat_attr > div > div:nth-child(3)', '#text_slider_pa_eo_carat_attr > div', '#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > div > div:nth-child(1) > div:nth-child(1) > img');
                $css_property_of_targets = array('color','color','backgroundColor', 'backgroundColor','width');
            }
            else {
                // TODO set selectors and css property for second category
            } 

            // change random appearance
            $this->modifyAppearance('Filters', $field_id, $field_name, $field_type, $val, '//*[@id="filters_submit_btn"]', array( '' ));

            // TODO still all the appearance are not tested like the header text font, icon label size etc. 

            // go to target page
            $this->gotoStep($I, $cat); 

            // verify changed appearance
            $this->verifyAppearance( $field_id, $field_name, $field_type, $val, array(), $selector_of_targets, $css_property_of_targets );
        }

    }

    // test if editing the appearance of item page button works or not  
    public function modifyItemPageButtonAppearance(AcceptanceTester $I)
    {
        if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        $field_id = array( 'fc_atc_button_text', 'sc_atc_button_text', 'product_page_add_to_basket' );
        $field_name = array( 'fc_atc_button_text', 'sc_atc_button_text', 'product_page_add_to_basket' );
        $field_type = array( 'text', 'text', 'text' );
        $val = array( 'Next...', 'Next...', 'Add in cart...' );

        $selector_of_targets = array();
        $css_property_of_targets = array();

        // change random appearance
        $this->modifyAppearance('Product Page', $field_id, $field_name, $field_type, $val, '//*[@id="product_page_submit_btn"]', array( '' ));

        // TODO still all the appearance are not tested like sc_atc_button_text, product_page_add_to_basket etc. 

        // go to target page
        $this->gotoProductFromCategoryPage($I, 0); 

        unset($field_id[1]); unset($field_id[2]);
        unset($field_name[1]); unset($field_name[2]);
        unset($field_type[1]); unset($field_type[2]);
        unset($val[1]); unset($val[2]);

        // verify changed appearance
        $this->verifyAppearance( $field_id, $field_name, $field_type, $val, array(), $selector_of_targets, $css_property_of_targets );

    }
    
}
