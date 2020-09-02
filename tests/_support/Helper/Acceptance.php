<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Acceptance extends \Codeception\Module
{

    /**
     * test suites 
     * prefix a_-f_ => test suite 1 for manual test of pair builder process, sunob_ => test suite 2 for manual test of bonus/tiny features, n_ => test suite 3 for tests using sample data
     */

    /**
     * prefix: test suites(see above), '' => empty prefix means use specified key without prefix check 
     */
    public function get_configs($key, $prefix="")
    {
        $first_cat_name_for_suite_x = "";
        $second_cat_name_for_suite_x = "";
        if( $prefix == "a_-f_" || $prefix == "f_" ) {
            $first_cat_name_for_suite_x = "Diamond";
            $second_cat_name_for_suite_x = "Setting";
        }
        elseif( $prefix == "n_" ) {
            $first_cat_name_for_suite_x = "Diamond Shape";
            $second_cat_name_for_suite_x = "Setting Shape";
        }

        if( $key == "first_button_text" && ($prefix=="n_" || empty($prefix)) ) {
            return "Start with Diamond Shape";
        }
        else if( $key == "second_button_text" && ($prefix=="n_" || empty($prefix)) ) {
            return "Start with Setting Shape";
        }
        else if( $key == "cat_name_0" ) {
            return $first_cat_name_for_suite_x;
        }
        else if( $key == "cat_name_1" ) {
            return $second_cat_name_for_suite_x;
        }
        else if( $key == "first_product_name" && ($prefix=="n_" || empty($prefix)) ) {
            return "Asscher Diamond #10000052";
        }
        else if( $key == "first_product_market_price" && ($prefix=="n_" || empty($prefix)) ) {
            return "12,500.00";
        }
        else if( $key == "first_product_price" && ($prefix=="n_" || empty($prefix)) ) {
            return "11,390.00";
        }
        else if( $key == "second_product_name" && ($prefix=="n_" || empty($prefix)) ) {
            return "Setting #10000004";
        }
        else if( $key == "second_product_market_price" && ($prefix=="n_" || empty($prefix)) ) {
            return "450.00";
        }
        else if( $key == "second_product_price" && ($prefix=="n_" || empty($prefix)) ) {
            return "445.00";
        }
        else if( $key == "first_product_page_button_text" && ($prefix=="n_" || empty($prefix)) ) {
            return "CONTINUE";
        }
        else if( $key == "second_product_page_button_text" && ($prefix=="n_" || empty($prefix)) ) {
            return "CONTINUE";
        }

        return null;
    }

    /**
     * 
     */
    public function site_path_by_test_suit($suite_name)
    {
        if( $suite_name == "a_-f_" ) {
            return "/wordpress/src";
        }
        elseif( $suite_name == "n_" ) {
            return "/WBC_TEST_ENV_with_sample_data/wordpress-latest-1/";
        } 

        return null;
    }

	/**
     * we assume different test environment based on php and other applicable versions
     */
    public function get_test_environment()
    {
        // echo "called get_test_environment... ";
        try {
            $version_nums = explode(".", PHP_VERSION);

            // if( !isset($version_nums[0]) || /*$version_nums[0] >= 6*/($version_nums[0] == 7 && $version_nums[1] == 2 && $version_nums[2] == 32) ) {
            if( !isset($version_nums[0]) || /*$version_nums[0] >= 6*/($version_nums[0] == 7 && $version_nums[1] == 3) ) {
                return "WBC_TEST_ENV_default";
            } 
            else {
                return "WBC_TEST_ENV_with_sample_data";
            }
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
            return null;
        }

        return null;
    }

    /**
     * @param $test_name_perfix consider it as test suite, however it is not following the complete definition of suite flow available in codeception but just an internal way to handle different test categories as suites using name prefix. 
     */
    public function test_allowed_in_this_environment( $test_name_perfix )
    {
        // echo "called test_allowed_in_this_environment... ";
        try {
            $test_environment = $this->get_test_environment();

            if( $test_environment == "WBC_TEST_ENV_default" ) {
                if( $test_name_perfix != "n_" ) {
                    return true;
                }
            } 
            else if( $test_environment == "WBC_TEST_ENV_with_sample_data" ) {
                if( $test_name_perfix == "n_" ) {
                    return true;
                }
            } 
            else {
                return false;
            }
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
            return false;
        }

        return false;
    }

    /**
     * Get dir path of site starting from document root only so not full absolute path
     * @return mixed
     * @throws \Codeception\Exception\ModuleException
     */
    public function getDirPath()
    {
        echo "called getDirPath...";
        try {
            $version_nums = explode(".", PHP_VERSION);
            if( $this->get_test_environment() == "WBC_TEST_ENV_default" ) {
                echo 'getDirPath for default environment';
                return 'tmp/wordpress/src';
            } 
            else {
                echo 'getDirPath for other environment';
                return 'tmp/WBC_TEST_ENV_with_sample_data/wordpress-latest-1';
            }
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
        }
    }

    /**
     * Get current url from WebDriver
     * @return mixed
     * @throws \Codeception\Exception\ModuleException
     */
    public function setUrl()
    {
        echo "called setUrl...";
        try {
            $version_nums = explode(".", PHP_VERSION);
            if( $this->get_test_environment() == "WBC_TEST_ENV_default" ) {
                echo 'setting url for default environment';
                $this->getModule('WPWebDriver')->config['url'] = 'http://127.0.0.1:8888/tmp/wordpress/src';
            } 
            else {
                echo 'setting url for other environment';
                $this->getModule('WPWebDriver')->config['url'] = 'http://127.0.0.1:8888/tmp/WBC_TEST_ENV_with_sample_data/wordpress-latest-1';
            }
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
        }
    }

    /**
     * Get current uri from WebDriver
     * @return mixed
     * @throws \Codeception\Exception\ModuleException
     */
    public function getCurrentUri($remove_site_dir_path=false)
    {
        echo "called getCurrentUri...";
        try {
            if( $remove_site_dir_path )
                return str_replace($this->getDirPath(), "", $this->getModule('WPWebDriver')->_getCurrentUri());
            else 
                return $this->getModule('WPWebDriver')->_getCurrentUri();
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
        }
    }

    /**
     * Get current url from WebDriver
     * @return mixed
     * @throws \Codeception\Exception\ModuleException
     */
    public function getCurrentUrl()
    {
        echo "called getCurrentUrl...";
        try {
            return $this->getModule('WPWebDriver')->_getUrl().$this->getModule('WPWebDriver')->_getCurrentUri();
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
        }
    }

    /**
     * 
     */
    public function findElementsUsingXPath($xpath)
    {
        echo "called findElementsUsingXPath...";
        try {
            $module = $this->getModule('WPWebDriver');
            $page = $module->webDriver;

            // // search a link or button on a page
            // $el = $module->_findClickable($page, 'Click Me');

            // search a link or button within an element
            // $topBar = $module->_findElements('.top-bar')[0];
            $elements = $module->_findElements($xpath);
            // $el = $module->_findClickable($elements, 'Click Me');

            return $elements;
        }
        catch(Exception $e) {
            echo "caught error at findElementsUsingXPath, message...";
            echo $e->getMessage()."";
        }
    }

    /**
     * 
     */
    public function findClickableElements($text_or_xpath)
    {
        echo "called findClickableElementsUsingXPath...";
        try {
            $module = $this->getModule('WPWebDriver');
            $page = $module->webDriver;

            // search a link or button on a page
            return $module->_findClickable($page, $text_or_xpath);
        }
        catch(Exception $e) {
            echo "caught error at findClickableElementsUsingXPath, message...";
            echo $e->getMessage()."";
        }
    }

    /**
     * 
     */
    public function set_session($key,$val)
    {
        echo "called set_session... ".$key." ".$val;
        try {
            //we should use standard practice like php session that comes with phpbrowser or something of that sort. but now as a quick resort we are saving it just in the txt file. 
            $myfile = fopen($key.".txt", "w") or die("Unable to open file!");
            fwrite($myfile, $val);
            fclose($myfile);
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
            return false;
        }

        return true;
    }

    /**
     * 
     */
    public function get_session($key)
    {
        echo "called get_session... ".$key;
        try {
            //we should use standard practice like php session that comes with phpbrowser or something of that sort. but now as a quick resort we are saving it just in the txt file. 
            if( file_exists($key.".txt") ) {
                $myfile = fopen($key.".txt", "r") or die("Unable to open file!");
                $val = fread($myfile,filesize($key.".txt"));
                fclose($myfile);

                echo " ".$val;
                return $val;
            }
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
            return null;
        }

        return null;
    }
	
    /**
     * 
     */
    public function scrollToAndClick($I,$text_or_xpath, $xpath_for_scroll, $attempts=10, $delay=1) 
    {
        echo "called scrollToAndClick...";
        $this->scrollTo($xpath_for_scroll);
        $this->wait(3);
            
        for($i=1; $i<=$attempts; $i++) {
            try { 
                $this->click($text_or_xpath);
                break;
            }
            catch(Exception $e) {
                echo "caught at error '".$e->getMessage()."' at scrollToAndClick on attempt number ".$i." after the delay of ".$delay." seconds";
                $this->wait($delay);
            }
        }
    }

    /**
     * since we don't know any method yet that for radio assrtion from webdriver, seeInField is not reliable 
     * @param $dummy text to run a dummy positive/negative assertion so that in test report user can see that one of the test is actually failed
     */
    public function radioAssertion($I, $field_id, $field_name, $expected_value, $dummy='dummy text to do positve or negative assertion') {
        echo "called radioAssertion...";
        
        try { 
            $val = $I->executeJS("if(jQuery('#".$field_id."').is(':checked')) { return 1; } else { return 0; }"); //$I->grabValueFrom('input[name='.$field_name.']');
            // echo "grabValueFrom value is=".$val."=expected=".$expected_value; 
            // if( $val == $expected_value ) {
            if( $val == 1 ) {
                $I->dontSee($dummy);
            }
            else {
                $I->see($dummy);
            }
        }
        catch(Exception $e) {
            echo "caught error...";
            echo $e->getMessage();
        }
    }

    /**
     * 
     */
    public function resetSession() 
    {
        // echo "called resetSession...";
            
        try { 
            $this->getModule('WPWebDriver')->_closeSession();
            
            $this->getModule('WPWebDriver')->_initializeSession();

            return true;
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
        }

        return false;
    }

    /**
     * 
     */
    public function price_format($price) 
    {
        // echo "called resetSession...";
            
        try { 
            return number_format($price);
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
        }

        return $price;
    }

    /**
     * @param $page if passed only that page's js will be loaded 
     */
    public function loadCommonJs($I,$page='') 
    {
        // echo "called resetSession...";
            
        try { 
            // $I->executeJS('
                

            //     ');
            return true;
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
        }

        return false;
    }

    /**
     * 
     */
    public function getElementColorHexCode($I,$selector_of_targets, $css_property_of_targets) 
    {
        // echo "called resetSession...";
            
        try { 
            return $I->executeJS('
                                var hexDigits = new Array
                                        ("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"); 

                                //Function to convert rgb color to hex format
                                function rgb2hex(rgb) {
                                 rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
                                 return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
                                }

                                function hex(x) {
                                  return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
                                 }

                                return rgb2hex( jQuery("'.$selector_of_targets.'").css("'.$css_property_of_targets.'") );
                                ');  
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
        }

        return false;
    }

    /**
     * 
     */
    public function getElementCss($I,$selector_of_targets, $css_property_of_targets) 
    {
        // echo "called resetSession...";
            
        try { 
            return $I->executeJS('
                                return jQuery("'.$selector_of_targets.'").css("'.$css_property_of_targets.'");
                                ');  
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
        }

        return false;
    }

    /**
     * 
     */
    public function editActionClick($I,$entity_title) 
    {
        // echo "called resetSession...";
            
        try { 
            $I->executeJS('jQuery(jQuery("td:contains('.$entity_title.'):not(.disabled) > a")[0]).trigger("click");');  
            return true;
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
        }

        return false;
    }

    /**
     * 
     */
    public function wbc_fillField($I,$field_id,$field_type,$field_name,$val,$field_dropdown_div_id) 
    {
        // echo "called resetSession...";
            
        try { 
            if( $field_type == "text" ) {
                $I->fillField($field_name, $val);
            }
            elseif( $field_type == "checkbox" || $field_type == "radio" ) {
                $I->executeJS("jQuery('#".$field_id."').parent().checkbox('set checked', '".$val."');");  
            }
            elseif( $field_type == "color" ) {
                $I->executeJS('jQuery("#'.$field_id.'").val("'.$val.'");');  
            }
            elseif( $field_type == "select" ) {
                $I->executeJS("jQuery('#".$field_dropdown_div_id."').dropdown('set selected', '".$val."');");
            }
            return true;
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
        }

        return false;
    }

}
