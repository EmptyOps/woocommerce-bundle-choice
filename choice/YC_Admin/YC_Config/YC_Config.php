<?php
class YC_Config
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
        require_once 'YC_View/Head_Banner.php';
        add_action('admin_menu',function(){
            add_menu_page('Configuration','Bundle Choice','administrator','yc-home',function(){                
                $this->yc_home();
            });                
            //Configuration Page
            add_submenu_page('yc-home', 'Configuration', 'Configuration', 'administrator', 'yc-setting',function(){
                $this->yc_config();                
            });                    
            //Mapping Page
            add_submenu_page('yc-home', 'Mapping', 'Mapping', 'administrator', 'yc-map',function(){                
                $this->yc_map();
            });
        },11);        
    }    
    
    public function yc_home()
    {           
        require_once apply_filters('yc_admin_config_home_page','YC_View/Home.php');
    }
    
    public function yc_config()
    {   
        require_once apply_filters('yc_admin_config_config_page','YC_View/Config.php');
    }
    
    public function yc_map()
    {
        require_once apply_filters('yc_admin_config_map_page','YC_View/Mapping.php');
    }   
}