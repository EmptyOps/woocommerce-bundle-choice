<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Acceptance extends \Codeception\Module
{

	/**
     * 
     */
    public function get_test_environment()
    {
        // echo "called get_test_environment... ";
        try {
            $version_nums = explode(".", PHP_VERSION);

            if( !isset($version_nums[0]) || $version_nums[0] >= 6 ) {
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
     * 
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
            $myfile = fopen($key.".txt", "r") or die("Unable to open file!");
            $val = fread($myfile,filesize($key.".txt"));
            fclose($myfile);

            echo " ".$val;
            return $val;
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

}
