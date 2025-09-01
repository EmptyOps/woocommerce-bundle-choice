<?php
class EO_WBC_Config
{   
    public function __construct() {

        $this->menu();        
    }

    function menu() {

        /**
         * Adding menu to admin panel with name : 'Your Choice'
         * and includes three other sub menu
         * 1. Home page
         * 2. Config Page
         * 3. Mapping Page
         */
                
        //Main Menu and home page
        require_once 'EO_WBC_View/EO_WBC_View_Head_Banner.php';

        $this->menu_slugs=array();

        add_action('admin_menu',function(){

            add_menu_page('Woo Product Bundle Choice',__('Woo Product Bundle Choice','woo-bundle-choice'),'administrator','eo-wbc-home',array($this,'eo_wbc_home'),constant('EO_WBC_PLUGIN_ICO'));   
            $this->menu_slugs['Home']='eo-wbc-home';
            
            //Configuration Page
            add_submenu_page('eo-wbc-home', __('Configuration','woo-bundle-choice'), __('Configuration','woo-bundle-choice'), 'administrator', 'eo-wbc-setting',array($this,'eo_wbc_config'));                    
            $this->menu_slugs['Configuration']='eo-wbc-setting';

            //Mapping Page
            add_submenu_page('eo-wbc-home', __('Mapping','woo-bundle-choice'), __('Mapping','woo-bundle-choice'), 'administrator', 'eo-wbc-map',array($this,'eo_wbc_map'));
            $this->menu_slugs['Mapping']='eo-wbc-map';

            //Advance Filters
            add_submenu_page('eo-wbc-home', __('Filters','woo-bundle-choice'), __('Filters','woo-bundle-choice'), 'administrator', 'eo-wbc-filter',array($this,'eo_wbc_filter'));
            $this->menu_slugs['Filters']='eo-wbc-filter';

            //Appearance
            add_submenu_page('eo-wbc-home', __('Appearance','woo-bundle-choice'), __('Appearance','woo-bundle-choice'), 'administrator', 'eo-wbc-personalize',array($this,'eo_wbc_personalize'));           
            $this->menu_slugs['Appearance']='eo-wbc-personalize';

            //Personalize
            add_submenu_page('eo-wbc-home', __('Extensions','woo-bundle-choice'), __('Extensions','woo-bundle-choice'), 'administrator', 'eo-wbc-extensions',array($this,'eo_wbc_extensions'));           
            $this->menu_slugs['Extensions']='eo-wbc-extensions';

            add_submenu_page('eo-wbc-home', __('Logs','woo-bundle-choice'), __('Logs','woo-bundle-choice'), 'administrator', 'eo-wbc-logs',array($this,'eo_wbc_logs'));           
            $this->menu_slugs['Logs']='eo-wbc-logs';

        },11);

        add_action('eo_wbc_menu_tabs',function($menu_slug){            
            $menu_slug=(!empty($_GET['page']) && in_array($_GET['page'],array_values($this->menu_slugs)))?$_GET['page']:$menu_slug;
            ?>
                <nav class="nav-tab-wrapper woo-nav-tab-wrapper">
                    <?php
                        foreach ($this->menu_slugs as $label=>$slug) {
                            
                            $active= ($slug==$menu_slug)?'nav-tab-active':'';
                            $link=($slug==$menu_slug)?'#':admin_url("admin.php?page={$slug}");                             
                            echo "<a class='nav-tab {$active}' href='{$link}'>{$label}</a>";
                        }
                    ?>                    
                </nav>
            <?php
        });
    }    
    
    function eo_wbc_home() {           

        if(isset($_GET) && !empty($_GET['eo_wbc_view_auto_jewel'])) {

            require_once apply_filters('eo_wbc_admin_config_home_page','EO_WBC_View/EO_WBC_View_Auto_Jewel.php');
        }
        elseif(isset($_GET) && !empty($_GET['eo_wbc_view_auto_textile'])) {
            
            require_once apply_filters('eo_wbc_admin_config_home_page','EO_WBC_View/EO_WBC_View_Auto_Textile.php');
        }
        else{
            require_once apply_filters('eo_wbc_admin_config_home_page','EO_WBC_View/EO_WBC_View_Home.php');
        }
    }
    
    function eo_wbc_config()
    {   
        require_once apply_filters('eo_wbc_admin_config_config_page','EO_WBC_View/EO_WBC_View_Config.php');
    }
    
    function eo_wbc_map()
    {
        require_once apply_filters('eo_wbc_admin_config_map_table','EO_WBC_View/EO_WBC_List_Table.php');
        require_once apply_filters('eo_wbc_admin_config_map_page','EO_WBC_View/EO_WBC_View_Mapping.php');
    }   

    function eo_wbc_filter() {
        require_once apply_filters('eo_wbc_admin_config_filter_first_table','EO_WBC_View/EO_WBC_First_Filter_Table.php');
        require_once apply_filters('eo_wbc_admin_config_filter_first_table','EO_WBC_View/EO_WBC_Second_Filter_Table.php');
        require_once apply_filters('eo_wbc_admin_config_filter_page','EO_WBC_View/EO_WBC_View_Filter.php');
    }

    function eo_wbc_personalize() {        
        require_once apply_filters('eo_wbc_admin_config_filter_personalize','EO_WBC_View/EO_WBC_View_Personalize.php');
    }

    function eo_wbc_extensions() {        
        require_once apply_filters('eo_wbc_admin_config_filter_extensions','EO_WBC_View/EO_WBC_View_Extensions.php');
    }

    function eo_wbc_logs(){
        require_once apply_filters('eo_wbc_admin_config_filter_logs','EO_WBC_View/EO_WBC_View_Error.php');
    }
}