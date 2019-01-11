<?php
class YC_Core{
    public $plugin_file;
    public function __construct($file)
    {
        $this->plugin_file=$file;
        register_activation_hook($this->plugin_file,array(__CLASS__,'activate'));
        register_deactivation_hook($this->plugin_file,array(__CLASS__,'deactivate'));
        register_uninstall_hook($this->plugin_file,array(__CLASS__,'uninstall'));        
    }
    public function activate(){
        #Plugin Activation Code
        
        //add category count to hopp on.
        if(!get_option('yc_category_count')){
            add_option('yc_category_count',"2");
        }
        
        //Name of first product
        if(!get_option('yc_first_name')){
            add_option('yc_first_name',"");
        }
        //Slug of first product
        if(!get_option('yc_first_slug')){
            add_option('yc_first_slug',"");
        }
        //URL of first product
        if(!get_option('yc_first_url')){
            add_option('yc_first_url',"");
        }
        
        //Name of second product
        if(!get_option('yc_second_name')){
            add_option('yc_second_name',"");
        }
        //Slug of second product
        if(!get_option('yc_second_slug')){
            add_option('yc_second_slug',"");
        }
        //URL of second product
        if(!get_option('yc_second_url')){
            add_option('yc_second_url',"");
        }
        
        //Name to final collaction
        if(!get_option('yc_collaction_name')){
            add_option('yc_collaction_name',"");
        }
        
        //URL to product review page
        if(!get_option('yc_review_page')){
            add_option('yc_review_page',"/yc-product-review/");
        }
        
        //Configuration status -- if categories are selected 
        if(!get_option('yc_config_category')){
            add_option('yc_config_category',"0");
        }
        //Configuration status -- if maps are created
        if(!get_option('yc_config_map')){
            add_option('yc_config_map',"0");
        }
                
        $page_check = get_page_by_title('Product Review');
        $new_page_template='';
        $new_page = array(
            'post_type' => 'page',
            'post_title' => 'Product Review',
            'post_name'=>'yc-product-review',
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 1,
        );
        if(!isset($page_check->ID)){
            $new_page_id = wp_insert_post($new_page);
            if(!empty($new_page_template)){
                update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
            }
        }
        
        /**
         * create table to store orders in a SETS form that are recived from customers
         */
        global $wpdb;
        $yc_order_map= $wpdb->prefix."yc_order_maps";
        if($wpdb->get_var( "show tables like '$yc_order_map'" ) != $yc_order_map)
        {
            $sql = "CREATE TABLE `$yc_order_map` ( ";
            $sql .= "  `order_id`  int(11) NOT NULL, ";
            $sql .= "  `order_map`  varchar(128) NOT NULL, ";
            $sql .= "  PRIMARY KEY(`order_id`)";
            $sql .= ") ".$wpdb->get_charset_collate().";";
            require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
            dbDelta($sql);
        }
        
        /**
         * create table to store maps between product that is created by admin
         */
        $yc_cat_map= $wpdb->prefix."yc_cat_maps";
        if($wpdb->get_var( "show tables like '$yc_cat_map'" ) != $yc_cat_map)
        {
            $sql='';
            $sql = "CREATE TABLE `$yc_cat_map` ( ";
            $sql .= " `first_cat_id` VARCHAR(125) NOT NULL , `second_cat_id` VARCHAR(125) NOT NULL , PRIMARY KEY (`first_cat_id`, `second_cat_id`)";
            $sql .= ") ".$wpdb->get_charset_collate().";";
            
            require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
            dbDelta($sql);
        }
        update_option('yc_active',"1");
        add_action( 'activated_plugin',function(){
            if(!
                (  (get_option('yc_first_name')    &&
                    get_option('yc_first_slug')    &&
                    get_option('yc_first_url')     &&
                    get_option('yc_second_name')   &&
                    get_option('yc_second_slug')   &&
                    get_option('yc_second_url'))
                    )){
                        //Plugin Activated                        
                        exit( wp_redirect( admin_url( 'admin.php?page=yc-home')));
            }
        });
            
    }
    public function deactivate(){
        #Plugin Deactivation Code
        //Plugin Activated
        update_option('yc_active',"0");
    }
    public function uninstall(){
        #Plugin Uninstall
        
        //Name of first product
        if(!get_option('yc_first_name')){
            delete_option('yc_first_name');
        }
        //Slug of first product
        if(!get_option('yc_first_slug')){
            add_option('yc_first_slug');
        }
        //URL of first product
        if(!get_option('yc_first_url')){
            delete_option('yc_first_url');
        }
        
        //Name of second product
        if(!get_option('yc_second_name')){
            delete_option('yc_second_name');
        }
        //Slug of second product
        if(!get_option('yc_second_slug')){
            delete_option('yc_second_slug');
        }
        //URL of second product
        if(!get_option('yc_second_url')){
            delete_option('yc_second_url');
        }
        
        //URL to product review page
        if(!get_option('yc_review_page')){
            delete_option('yc_review_page');
        }
    }
}
?>