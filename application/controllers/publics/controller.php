<?php

namespace eo\wbc\controllers\publics;

defined( 'ABSPATH' ) || exit;
require_once constant('ABSPATH').'wp-content/plugins/woo-bundle-choice/application/controllers/controller.php';
class Controller extends \eo\wbc\controllers\Controller{

	/*protected function __construct() {
		
	}*/	

	protected function _get($name) {

	}

	protected function _set() {

	}

	protected function _call() {

	}	

    protected function get_ui_definition($args = array()){

       // ACTIVE_TODO move to asana
        /*function will accept the args param=null ... which will support the param like template_option_key, option_group_key 
            from that it will read template key  -- to b done
                and based on that it will load the files from the template folder which will be as per the wp template folder structure standards  -- to b done

                once look at one article that explains about template folder standards and no need to go in detail but implement all possible basics  done
                
                    the default template key must be default so that in template folder user can always find file named default.php  -- to b done
                        and now planned to have the folder for default as well for avoiding confusion and improving readability. and wbc swatches folder may have the default folder also and that will contain color(swatches) or button widget as default.

                        ACTIVE_TODO if the particular extension have more than one widget then the other widgets would in its specific folder like breadcrumb, filters etc. -- to b 

                            so the args param will support one more parameter like widget_key and if it is empty then the root folder of the template will be considered otherwise the specific inner folder -- to b done
                                widget_key flow is skipped and the implementation is erased

                                and each template file will have comment at top saying "in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html" -- to b

                                    -- ACTIVE_TODO and in future what we can support is if any .php template file is added on template folder then the additional radio option for that respective template does show up on admin and when user enable that template system would load that template so it become handy for users to add new templates without needing to modify existing templates so that they can recieve our udpates and still continue to use their custom templates */


        $template_path = wbc()->load->template_path($args); 

        if(!empty($template_path)) {
         
            return wbc()->load->template($template_path,(isset($args['data'])?$args['data']:array()),true,$args['singleton_function'],true,true);
        } else {
            return null;
        }
        
    }

    public static function should_init($args = array()){

        if($args['page'] = 'feed' && (is_product_category() || is_shop()) ){

            return true;
        
        } elseif( $args['page'] = 'single-product' && is_product()){

            return true;
        
        }
        
        return false;

    }

}
