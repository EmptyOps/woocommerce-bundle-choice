<?php
class YC_Choice
{   
    public function __construct()
    {
        if (class_exists( 'WooCommerce' ))
        {
            /**
             * if request is from admin
             *      then load admin module
             * else
             *      load frontend module
             */
             if(is_admin()){
                 $this->admin();                 
             }
             else{
                 $this->frontend();
             }            
        }        
    }
    
    public function admin(){
        require_once 'YC_Admin/YC_Support.php';
        require_once 'YC_Admin/YC_Config/YC_Config.php';
        require_once apply_filters('yc_admin_order_view','YC_Admin/YC_Orders/YC_Orders.php');
        
        if($_POST)
        {
            //Initiate Actions.
            require_once apply_filters('yc_admin_config_actions','YC_Admin/YC_Config/YC_Actions.php');
            new YC_Actions();
        }
        
        //Show error message if application is not configured.
        if(get_option('yc_config_category')=="0" OR get_option('yc_config_map')=="0"){
            
            add_action( 'admin_notices',function (){
                echo "<div class='notice notice-error'><p>".__( '<strong>WooCommerce YC Extension</strong> hasn`t configured or partially configured yet.', 'my_plugin_textdomain' )."</p></div>";
            });
        }                     
        //Initiate Configuration Menu        
        new YC_Config();       
        //Initiate Orders Page
        new YC_Orders();        
    }
    
    public function frontend()
    {        
        if(get_option('yc_config_category')=="1" && get_option('yc_config_map')=="1"){
            //Act on when whole page with template is loaded for effect.
            add_action('template_redirect',function(){

                //Front Page to provide LINK to Select BEGIN WITH PRODUCT
                if(is_front_page())
                {
                    require_once apply_filters('yc_front_home','YC_Frontend/YC_Home.php');                    
                    new YC_Home();
                }
                
                //Product Category Page ie: First / Second Product
                if(is_product_category()) {
                    //If YC_APP is active
                    if(isset($_GET['YC_APP']) && $_GET['YC_APP']=='active'){
                         
                        require_once apply_filters('yc_front_breadcrumb','YC_Frontend/YC_Breadcrumb.php');                        
                        YC_Breadcrumb::add_css();
                        
                        require_once apply_filters('yc_front_category','YC_Frontend/YC_Category.php');                        
                        new YC_Category();
                    }                    
                }
                
                //Single Product description page
                if(is_product())
                {
                    if(isset($_GET['YC_APP']) && $_GET['YC_APP']=='active'){
                        
                        require_once apply_filters('yc_front_breadcrumb','YC_Frontend/YC_Breadcrumb.php');
                        YC_Breadcrumb::add_css();
                        
                        require_once apply_filters('yc_front_product','YC_Frontend/YC_Product.php');                        
                        new YC_Product();
                    }                    
                }
                
                //Review page to confirm adding SET to cart
                if(is_page('Product Review'))
                {
                    if(isset($_GET['YC_APP']) && $_GET['YC_APP']=='active'){
                        
                        require_once apply_filters('yc_front_breadcrumb','YC_Frontend/YC_Breadcrumb.php');
                        YC_Breadcrumb::add_css();
                        
                        ob_start();//Avoid sending header information
                        
                        require_once apply_filters('yc_front_review','YC_Frontend/YC_Review.php');                        
                        new YC_Review();
                        
                        ob_flush();//Flush and send header information
                    }
                }
                
                //Cart Page to enlist SETS added to the cart
                if(is_cart())
                {                    
                    //if(isset($_GET['YC_APP']) && $_GET['YC_APP']=='active'){
                    if(wc()->session->get("YC_MAPS",FALSE)){
                        require_once apply_filters('yc_front_cart','YC_Frontend/YC_Cart.php');                        
                        ob_start();//Avoid sending header information            
                            new YC_Cart();                            
                        ob_flush();//Flush and send header information
                    }
                    
                }
                
                //Checkout page to make payment and confirm order
                if(is_checkout())
                {
                    require_once apply_filters('yc_front_checkout','YC_Frontend/YC_Checkout.php');                    
                    new YC_Checkout();
                }
                
                //Page shown after completion of checkout ie: formated bill & shipping detaiils
                if(is_order_received_page())
                {
                    require_once apply_filters('yc_front_order_recived','YC_Frontend/YC_Order_Recived.php');                    
                    new YC_Order_Recived();
                }
                
                //Customer on view-orders detail page....
                if(function_exists('is_wc_endpoint_url')){
                    if(is_wc_endpoint_url('view-order'))
                    {
                        require_once apply_filters('yc_front_view_order','YC_Frontend/YC_View_Order.php');
                        new YC_View_Order();
                    }
                }
                else 
                {
                    if($this->is_wc_endpoint_url('view-order'))
                    {
                        require_once apply_filters('yc_front_view_order','YC_Frontend/YC_View_Order.php');
                        new YC_View_Order();
                    }
                }
            });
        }
    }
    
    private function is_wc_endpoint_url( $endpoint = false ) {
        
        global $wp;
        $wc_endpoints = WC()->query->query_vars;
        
        if ( false !== $endpoint ) {
            if ( ! isset( $wc_endpoints[ $endpoint ] ) ) {
                return false;
            } else {
                $endpoint_var = $wc_endpoints[ $endpoint ];
            }
            
            return isset( $wp->query_vars[ $endpoint_var ] );
        } else {
            foreach ( $wc_endpoints as $key => $value ) {
                if ( isset( $wp->query_vars[ $key ] ) ) {
                    return true;
                }
            }
            
            return false;
        }
    }
}
?>