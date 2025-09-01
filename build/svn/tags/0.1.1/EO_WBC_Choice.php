<?php
class EO_WBC_Choice
{   
    public function __construct()
    {
        if (class_exists( 'WooCommerce' ))
        {
            if(is_admin()){	//if request from Admin

                $this->eo_wbc_admin();                 
            }
            else{				//if request from User

                $this->eo_wbc_frontend();
            }            
        }        
    }
    
    private function eo_wbc_sanitize(){
        //Sanitize _GET global variable
        foreach ($_GET as $key => $value) {
            $_GET[$key]=sanitize_text_field($value);
        }

        //Sanitize _GET global variable
        foreach ($_POST as $key => $value) {
            $_POST[$key]=sanitize_text_field($value);
        }

        //Sanitize _GET global variable
        foreach ($_REQUEST as $key => $value) {
            $_REQUEST[$key]=sanitize_text_field($value);
        }
    }

    public function eo_wbc_admin(){
        
        require_once 'EO_WBC_Admin/EO_WBC_Support.php';
        require_once 'EO_WBC_Admin/EO_WBC_Config/EO_WBC_Config.php';
        require_once apply_filters('eo_wbc_admin_order_view','EO_WBC_Admin/EO_WBC_Orders/EO_WBC_Orders.php');

        //perform action routines only if occured in our pages.
        if($_POST && isset($_POST['_wpnonce']) && isset($_POST['eo_wbc_action'])){
            //sanitize all user input before usage.
            $this->eo_wbc_sanitize();
            //Initiate Actions.
            require_once apply_filters('eo_wbc_admin_config_actions','EO_WBC_Admin/EO_WBC_Config/EO_WBC_Actions.php');
            new EO_WBC_Actions();
        }
        
        //Show error message if application is not configured.
        if(get_option('eo_wbc_config_category')=="0" OR get_option('eo_wbc_config_map')=="0"){
            
            add_action('admin_notices',function (){
                
                echo "<div class='notice notice-error'><p>".__( '<strong>WooCommerce Bundle Choice</strong> hasn`t configured or partially configured yet.', 'woocommerce' )."</p></div>";
            });
        }                     
        
        //Initiate Configuration Menu        
        new EO_WBC_Config();       
        
        //Initiate Orders Page
        new EO_WBC_Orders();        
    }
    
    public function eo_wbc_frontend()
    {          
        if(get_option('eo_wbc_config_category')=="1" && get_option('eo_wbc_config_map')=="1"){
            //Act on when whole page with template is loaded for effect.
            add_action('template_redirect',function(){

                //Front Page to provide LINK to Select BEGIN WITH PRODUCT
                if(is_front_page())                    
                {
                    require_once apply_filters('eo_wbc_front_home','EO_WBC_Frontend/EO_WBC_Home.php');                    
                    new EO_WBC_Home();
                }
                
                //Cart Page to enlist SETS added to the cart
                if(is_cart())
                {                
                    if(wc()->session->get("EO_WBC_MAPS",FALSE)){
                        
                        require_once apply_filters('eo_wbc_front_cart','EO_WBC_Frontend/EO_WBC_Cart.php');
                        ob_start();//Avoid sending header information
                        new EO_WBC_Cart();
                        ob_flush();//Flush and send header information
                    }                    
                }
                
                //Checkout page to make payment and confirm order
                if(is_checkout())
                {
                    require_once apply_filters('eo_wpc_front_checkout','EO_WBC_Frontend/EO_WBC_Checkout.php');
                    new EO_WBC_Checkout();
                }
                
                //Page shown after completion of checkout ie: formated bill & shipping detaiils
                if(is_order_received_page())
                {
                    require_once apply_filters('eo_wbc_front_order_recived','EO_WBC_Frontend/EO_WBC_Order_Recived.php');
                    new EO_WBC_Order_Recived();
                }
                
                //Customer on view-orders detail page....
                if(function_exists('is_wc_endpoint_url')){
                    if(is_wc_endpoint_url('view-order'))
                    {
                        require_once apply_filters('eo_wbc_front_view_order','EO_WBC_Frontend/EO_WBC_View_Order.php');
                        new EO_WBC_View_Order();
                    }
                }
                else
                {
                    if($this->eo_wbc_is_endpoint_url('view-order'))
                    {
                        require_once apply_filters('eo_wbc_front_view_order','EO_WBC_Frontend/EO_WBC_View_Order.php');
                        new EO_WBC_View_Order();
                    }
                }
                                
                //Condition check for alteration of flow if not a Home or Cart page.
                if(isset($_GET['EO_WBC']) && sanitize_text_field($_GET['EO_WBC'])==1){
                    
                    //Product Category Page ie: First / Second Product
                    if(is_product_category()){
                           
                            require_once apply_filters('eo_wbc_front_breadcrumb','EO_WBC_Frontend/EO_WBC_Breadcrumb.php');
                            EO_WBC_Breadcrumb::eo_wbc_add_css();
                            
                            require_once apply_filters('eo_wbc_front_category','EO_WBC_Frontend/EO_WBC_Category.php');
                            new EO_WBC_Category();
                    }
                    
                    //Single Product description page
                    if(is_product()){

                        require_once apply_filters('eo_wbc_front_breadcrumb','EO_WBC_Frontend/EO_WBC_Breadcrumb.php');
                        EO_WBC_Breadcrumb::eo_wbc_add_css();
                        
                        require_once apply_filters('eo_wbc_front_product','EO_WBC_Frontend/EO_WBC_Product.php');
                        new EO_WBC_Product();                    
                    }
                    
                    //Review page to confirm adding SET to cart
                    if(is_page('Product Review'))
                    {                                                 
                        require_once apply_filters('eo_wbc_front_breadcrumb','EO_WBC_Frontend/EO_WBC_Breadcrumb.php');                            
                        EO_WBC_Breadcrumb::eo_wbc_add_css();
                        
                        ob_start();//Avoid sending header information                            
                            require_once apply_filters('eo_wbc_front_review','EO_WBC_Frontend/EO_WBC_Review.php');                            
                            new EO_WBC_Review();                            
                        ob_flush();//Flush and send header information                     
                    }
                }
            });
        }
    }
    
    private function eo_wbc_is_endpoint_url( $endpoint = false ) {
        
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