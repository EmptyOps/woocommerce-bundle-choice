<?php
class EO_WBC_Config
{   
    public function __construct()
    {
        $this->menu();        
    }
    public function menu()
    {
        /**
         * Adding menu to admin panel with name : 'Your Choice'
         * and includes three other sub menu
         * 1. Home page
         * 2. Config Page
         * 3. Mapping Page
         */
        
        //Main Menu and home page
        require_once 'EO_WBC_View/EO_WBC_View_Head_Banner.php';
        add_action('admin_menu',function(){

            add_menu_page('Configuration',__('Woo Bundle Choice','woo-bundle-choice'),'administrator','eo-wbc-home',function(){                
                $this->eo_wbc_home();
            },constant('EO_WBC_PLUGIN_ICO'));                
            //Configuration Page
            add_submenu_page('eo-wbc-home', __('Configuration','woo-bundle-choice'), __('Configuration','woo-bundle-choice'), 'administrator', 'eo-wbc-setting',function(){
                $this->eo_wbc_config();                
            });                    
            //Mapping Page
            add_submenu_page('eo-wbc-home', __('Mapping','woo-bundle-choice'), __('Mapping','woo-bundle-choice'), 'administrator', 'eo-wbc-map',function(){                
                $this->eo_wbc_map();
            });
            //Advance Filters
            add_submenu_page('eo-wbc-home', __('Filters','woo-bundle-choice'), __('Filters','woo-bundle-choice'), 'administrator', 'eo-wbc-filter',function(){                
                $this->eo_wbc_filter();
            });
            //Personalize
            add_submenu_page('eo-wbc-home', __('Personalize','woo-bundle-choice'), __('Personalize','woo-bundle-choice'), 'administrator', 'eo-wbc-personalize',function(){                
                $this->eo_wbc_personalize();
            });

        },11);        
    }    
    
    private function eo_wbc_home()
    {           
        if(isset($_GET) && !empty($_GET['eo_wbc_view_error'])){
            require_once apply_filters('eo_wbc_admin_config_home_page','EO_WBC_View/EO_WBC_View_Error.php');
        }
        else{
            require_once apply_filters('eo_wbc_admin_config_home_page','EO_WBC_View/EO_WBC_View_Home.php');
        }
    }
    
    private function eo_wbc_config()
    {   
        require_once apply_filters('eo_wbc_admin_config_config_page','EO_WBC_View/EO_WBC_View_Config.php');
    }
    
    private function eo_wbc_map()
    {
        require_once apply_filters('eo_wbc_admin_config_map_table','EO_WBC_View/EO_WBC_List_Table.php');
        require_once apply_filters('eo_wbc_admin_config_map_page','EO_WBC_View/EO_WBC_View_Mapping.php');
    }   

    private function eo_wbc_filter() {
        require_once apply_filters('eo_wbc_admin_config_filter_first_table','EO_WBC_View/EO_WBC_First_Filter_Table.php');
        require_once apply_filters('eo_wbc_admin_config_filter_first_table','EO_WBC_View/EO_WBC_Second_Filter_Table.php');
        require_once apply_filters('eo_wbc_admin_config_filter_page','EO_WBC_View/EO_WBC_View_Filter.php');
    }

    private function eo_wbc_personalize() {        
        require_once apply_filters('eo_wbc_admin_config_filter_personalize','EO_WBC_View/EO_WBC_View_Personalize.php');
    }
}