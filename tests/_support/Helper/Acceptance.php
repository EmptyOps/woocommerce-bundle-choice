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
            return "current_url = ".$this->getModule('WPWebDriver')->_getUrl().$this->getModule('WPWebDriver')->_getCurrentUri();
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
        }
    }
	
}
