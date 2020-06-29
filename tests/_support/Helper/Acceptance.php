<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Acceptance extends \Codeception\Module
{

	
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
	
}
