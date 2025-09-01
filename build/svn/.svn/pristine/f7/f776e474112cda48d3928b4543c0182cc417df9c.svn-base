<?php 
class EO_WBC_Menu
{	
	function __construct($menu) {

		if(is_array($menu) && !empty($menu['menu_page'])) {
			/**
			* data is availabel, so now generating menu.
			*/
			$this->menu_data=$menu;
			$this->generate();

		} else {
			/**
			* no data found so terminate here.
			*/
			$this->menu_data=FALSE;
		}		
	}

	public function generate() {

        add_action('admin_menu',function(){
            $menu=$this->menu_data;

            if(!empty($menu['menu_page'])){

                $menu_page=$menu['menu_page'];
                add_menu_page($menu_page['page_title'],
                            $menu_page['menu_title'],
                            $menu_page['capablity'],
                            $menu_page['menu_slug'],
                            function(){ 

                    if(isset($_GET) && !empty($_GET['eo_wbc_view_error'])){
                        require_once apply_filters('eo_wbc_admin_config_home_page','EO_WBC_View/EO_WBC_View_Error.php');
                    }
                    elseif(isset($_GET) && !empty($_GET['eo_wbc_view_auto_jewel'])) {

                        require_once apply_filters('eo_wbc_admin_config_home_page','EO_WBC_View/EO_WBC_View_Auto_Jewel.php');
                    }
                    elseif(isset($_GET) && !empty($_GET['eo_wbc_view_auto_textile'])) {
                        
                        require_once apply_filters('eo_wbc_admin_config_home_page','EO_WBC_View/EO_WBC_View_Auto_Textile.php');
                    }
                    else{
                        require_once apply_filters('eo_wbc_admin_config_home_page','EO_WBC_View/EO_WBC_View_Home.php');
                    }
                },constant('EO_WBC_PLUGIN_ICO'));                

                if(!empty($menu['submenu_page'])){

                }
            }
        });

		/*require_once 'EO_WBC_View/EO_WBC_View_Head_Banner.php';
        add_action('admin_menu',function(){

            add_menu_page('Configuration',__('WooCommerce Bundle Choice','woo-bundle-choice'),'administrator','eo-wbc-home',function(){                
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

        },11);*/
	}
}