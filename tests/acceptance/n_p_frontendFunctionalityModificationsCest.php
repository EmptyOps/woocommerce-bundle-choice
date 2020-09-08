<?php 

class n_p_frontendFunctionalityModificationsCest extends n_f_adminSideSetupCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }
    
    // test if editing the functionality of filters works or not  
    public function modifyFilterFunctionality(AcceptanceTester $I)
    {
        if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        // for first category and second category. loop.
        for($cat=0; $cat<2; $cat++) {

            echo "modifyFilterFunctionality of category ".$cat;

            $prefix = "";
            if( $cat == 0 ) {
                $prefix = "d";

                $filter = array('Clarity', 'text_slider_pa_eo_colour_attr', 'text_slider_pa_eo_carat_attr','text_slider_pa_eo_clarity_attr', 'text_slider_pa_eo_colour_attr');
                $filter_id = array('text_slider_pa_eo_clarity_attr', 'text_slider_pa_eo_colour_attr', 'text_slider_pa_eo_carat_attr','text_slider_pa_eo_clarity_attr', 'text_slider_pa_eo_colour_attr');
                $field_id = array( '', 'd_fconfig_ordering', 'd_fconfig_is_advanced_1', 'd_fconfig_add_reset_link_1', 'd_fconfig_add_help_1' );
                $field_name = array( '', 'd_fconfig_ordering', '', '', '' );
                $field_type = array( 'select', 'text', 'checkbox', 'checkbox', 'checkbox' );
                $val = array( 'checkbox', '1', '1', '1', '1' );
                $field_dropdown_div_id=array('d_fconfig_input_type_dropdown_div');

                //TODO
                $selector_of_targets = array('#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > p > span', '#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > div > div:nth-child(1) > div:nth-child(2)', '#text_slider_pa_eo_carat_attr > div > div:nth-child(3)', '#text_slider_pa_eo_carat_attr > div', '#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > div > div:nth-child(1) > div:nth-child(1) > img');
                $css_property_of_targets = array('color','color','backgroundColor', 'backgroundColor','width');
            }
            else {
                $prefix = "s";

                $filter_id = array('eo_ring_style_cat', 'eo_ring_style_cat', 'eo_metal_cat','eo_setting_shape_cat', 'eo_ring_style_cat');
                $field_id = array( '', 's_fconfig_ordering', 's_fconfig_is_advanced_1', 's_fconfig_add_reset_link_1', 's_fconfig_add_help_1' );
                $field_name = array( '', 's_fconfig_ordering', '', '', '' );
                $field_type = array( 'select', 'text', 'checkbox', 'checkbox', 'checkbox' );
                $val = array( 'icon', '0', '1', '1', '1' );
                $field_dropdown_div_id=array('s_fconfig_input_type_dropdown_div');

                //TODO
                $selector_of_targets = array('#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > p > span', '#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > div > div:nth-child(1) > div:nth-child(2)', '#text_slider_pa_eo_carat_attr > div > div:nth-child(3)', '#text_slider_pa_eo_carat_attr > div', '#main > header > div.eo-wbc-container.filters.container.ui.form > div > div:nth-child(1) > div > div:nth-child(1) > div > div:nth-child(1) > div:nth-child(1) > img');
                $css_property_of_targets = array('color','color','backgroundColor', 'backgroundColor','width');
            } 

            // change random functionalities
                // modify things like filter input type, ordering, move to advanced/non-advanced, reset link, help text etc.
            $this->modifyFilters($I, $cat == 0 ? 'Diamond Page Filter Configuration' : 'Settings Page Filter Configuration', $filter, $filter_id, $field_id, $field_name, $field_type, $val, '//*[@id="'.$prefix.'_fconfig_submit_btn"]', $field_dropdown_div_id, '#'.$prefix.'_fconfig_submit_btn');

            // TODO still all the functionality modification are not tested like all input types are not tested, order/reset-link/help-text not tested in advanced section, width functionality not tested etc. 

            // go to target page
            $this->gotoStep($I, $cat, true, "n_"); 

            // verify functionality modifications
            $this->verifyFilters($I, $filter_id, $field_id, $field_name, $field_type, $val, array(), $selector_of_targets, $css_property_of_targets );
        }

    }

    // test if editing the functionality of mapping works or not  
    public function modifyMappingFunctionality(AcceptanceTester $I)
    {
        if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        // TODO wait for the edit featur

        $operation = array('add_new', 'edit', 'add_new');
        $mapping = array( 
                            '', 
                            '5f061d4fa67cf', 
                            '', );
        $field_id = array( 
                            array('range_first_1','','',''), 
                            array( 'eo_wbc_add_discount' ), 
                            array('','') /*here try to add a custom mapping which covers some unique real life scenario like previous item identified by attibute option to be mapped to only precious category of items*/ 
                        );
        $field_name = array( 
                            array('', '', '', ''), 
                            array( 'eo_wbc_add_discount' ), 
                            array('', ''), );
        $field_type = array( 
                            array('checkbox', 'select', 'select', 'select'), 
                            array( 'text' ), 
                            array('select', 'select'), );
        $val = array( 
                            array('1','51','69','34'/*here we set the radiant setting but in reality there should be category of ring that belongs to diamond in carat range for example from 0.75 to 1.25 carat */), 
                            array( '15' ), 
                            array('96','36') );
        $field_dropdown_div_id=array( 
                                        array('','eo_wbc_first_category_dropdown_div','eo_wbc_first_category_range_dropdown_div','eo_wbc_second_category_dropdown_div'), 
                                        array( '' ), 
                                        array('eo_wbc_first_category_dropdown_div','eo_wbc_second_category_dropdown_div') );

        //TODO set xpath and other params for verification
            // verify new carat based mapping works or not by filtering based on carat on first step and than verifying matching results on second step
            // verify discount works or not by filtering based on discounted mapping on first step and than verifying matching results on second step
                // ask mahesh if discount feature is implemented yet or not, I think its not. 
            // verify any specific custom mapping works or not by filtering based on custom mapping on first step and than verifying matching results on second step
        $filter_before_verification = array( 
                                            array( array('type'=>'click--', 'xpath_or_text_or_css'=>''), array('type'=>'executeJS', 'js'=>"jQuery('#text_slider_pa_eo_carat_attr').slider('set rangeValue', 0.2, 2);") ) 
                                        );
        $verifications = array( 
                                array( array('type'=>'see', 'text'=>'Setting #0412854474'), array('type'=>'see_in_js--', 'text'=>'') ) 
                            );


        // change random functionalities
            // try things like carat based mapping range, discounts on certain mapping, any custom mapping etc.
        $this->modifyMappings($I, 'Map creation and modification', $operation, $mapping, $field_id, $field_name, $field_type, $val, '//*[@id="map_creation_modification_save_btn"]', $field_dropdown_div_id);

        // TODO still all the functionality modification are not tested like more real life examples, real life discount requirements, etc. 

        // go to target page
        $this->gotoStep($I, 0, false, "n_"); 

        // verify functionality modifications
        $this->verifyMappings($I, $filter_before_verification, $verifications );

    }

}
