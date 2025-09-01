<?php
class EO_WBC_Core{
    public $_eo_wbc_;
    public function __construct($file)
    {
        $this->_eo_wbc_=$file;
        register_activation_hook($this->_eo_wbc_,array(__CLASS__,'eo_wbc_activate'));
        register_deactivation_hook($this->_eo_wbc_,array(__CLASS__,'eo_wbc_deactivate'));
        register_uninstall_hook($this->_eo_wbc_,array(__CLASS__,'eo_wbc_uninstall'));      
        $this->update_manager();  
    }
    public static function eo_wbc_activate(){
        #Plugin Activation Code
        
        //add category count to hopp on.
        if(!get_option('eo_wbc_category_count')){
            add_option('eo_wbc_category_count',"2");
        }
        
        //Name of first product
        if(!get_option('eo_wbc_first_name')){
            add_option('eo_wbc_first_name',"");
        }
        //Slug of first product
        if(!get_option('eo_wbc_first_slug')){
            add_option('eo_wbc_first_slug',"");
        }
        //URL of first product
        if(!get_option('eo_wbc_first_url')){
            add_option('eo_wbc_first_url',"");
        }
        
        //Name of second product
        if(!get_option('eo_wbc_second_name')){
            add_option('eo_wbc_second_name',"");
        }
        //Slug of second product
        if(!get_option('eo_wbc_second_slug')){
            add_option('eo_wbc_second_slug',"");
        }
        //URL of second product
        if(!get_option('eo_wbc_second_url')){
            add_option('eo_wbc_second_url',"");
        }
        
        //Name to final collaction
        if(!get_option('eo_wbc_collection_name')){
            add_option('eo_wbc_collection_name',"Preview");
        }
        
        //URL to product review page
        if(!get_option('eo_wbc_review_page')){
            add_option('eo_wbc_review_page',"/eo-wbc-product-review/");
        }
        
        //Configuration status -- if categories are selected 
        if(!get_option('eo_wbc_config_category')){
            add_option('eo_wbc_config_category',"0");
        }
        //Configuration status -- if maps are created
        if(!get_option('eo_wbc_config_map')){
            add_option('eo_wbc_config_map',"0");
        }
                
        
        
        if( function_exists('get_page_by_path') && !isset(get_page_by_path('eo-wbc-product-review')->ID)){
            
            $product_review_page_id = wp_insert_post(array(
                'post_type' => 'page',
                'post_title' => 'Product Review',
                'post_name'=>'eo-wbc-product-review',
                'post_content' => '',
                'post_status' => 'publish',
                'post_author' => 1,
            ));

            if(!empty($product_review_page_id)){
                update_post_meta($product_review_page_id, '_wp_page_template','');
            }
        }
        
        /**
         * create table to store orders in a SETS form that are recived from customers
         */
        global $wpdb;
        $eo_wbc_order_map= $wpdb->prefix."eo_wbc_order_maps";
        if($wpdb->get_var( "SHOW TABLES LIKE '$eo_wbc_order_map'" ) != $eo_wbc_order_map)
        {
            $sql = "CREATE TABLE `$eo_wbc_order_map`( ";
            $sql .= "  `order_id`  int(11) NOT NULL, ";
            $sql .= "  `order_map` text NOT NULL, ";
            $sql .= "  PRIMARY KEY(`order_id`)";
            $sql .= ") ".$wpdb->get_charset_collate().";";
            require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
            dbDelta($sql);
        }
        
        /**
         * create table to store maps between product that is created by admin
         */
        $eo_wbc_cat_map= $wpdb->prefix."eo_wbc_cat_maps";
        require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
        
        if($wpdb->get_var( "show tables like '$eo_wbc_cat_map'" ) != $eo_wbc_cat_map)
        {
            $sql='';
            $sql = "CREATE TABLE `$eo_wbc_cat_map` ( ";
            $sql .= " `first_cat_id` VARCHAR(125) NOT NULL , `second_cat_id` VARCHAR(125) NOT NULL, `discount` VARCHAR(20) not null DEFAULT '0%', PRIMARY KEY (`first_cat_id`, `second_cat_id`)";
            $sql .= ") ".$wpdb->get_charset_collate().";";                        
            dbDelta($sql);            
        }
        
        update_option('eo_wbc_active',"1");
        add_action( 'activated_plugin',function(){
            if(!
                (  (get_option('eo_wbc_first_name')    &&
                    get_option('eo_wbc_first_slug')    &&
                    get_option('eo_wbc_first_url')     &&
                    get_option('eo_wbc_second_name')   &&
                    get_option('eo_wbc_second_slug')   &&
                    get_option('eo_wbc_second_url'))
                    )){
                        //Plugin Activated                        
                        exit( wp_redirect( admin_url( 'admin.php?page=eo-wbc-home')));
            }
        });
            
    }

    public static function eo_wbc_deactivate(){

        #Plugin Deactivation Code        
        update_option('eo_wbc_active',"0");
    }

    public static function eo_wbc_uninstall(){

        #Plugin Uninstall

        //Remove table... order_maps
        global $wpdb;
        $eo_wbc_order_map= $wpdb->prefix."eo_wbc_order_maps";

        if($wpdb->get_var( "SHOW TABLES LIKE '$eo_wbc_order_map'" ) == $eo_wbc_order_map)
        {
            $sql='';
            $sql = "DROP TABLE `".$eo_wbc_order_map."`;";
            require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
            dbDelta($sql);
        }
        
        //Remove table... cat_maps
        $eo_wbc_cat_map= $wpdb->prefix."eo_wbc_cat_maps";

        if($wpdb->get_var( "SHOW TABLES LIKE '$eo_wbc_cat_map'" ) == $eo_wbc_cat_map) {

            $sql='';
            $sql = "DROP TABLE `".$eo_wbc_cat_map."`;";
            require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
            dbDelta($sql);
        }        
    }

    private function update_manager() {
        
        /**
        * This section of code is intended to update necessary elements of plugin
        * such as database
        * @param none
        * @desc method of updating databases.
        **/
        global $wpdb;
        $eo_wbc_cat_map= $wpdb->prefix."eo_wbc_cat_maps";
        require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

        if(version_compare(EO_WBC_PLUGIN_VERSION,get_option('eo_wbc_version'),'>') )
        {
            if($wpdb->get_var("SHOW COLUMNS FROM `".$eo_wbc_cat_map."` LIKE 'discount'" ) != 'discount')
            {
                $sql="alter TABLE `".$eo_wbc_cat_map."` ADD `discount` VARCHAR(20) not null DEFAULT '0%' AFTER `second_cat_id` ";   
                $wpdb->query($sql);
            }            

            //surpress mapping system for update error...
            if(version_compare('0.5.0',get_option('eo_wbc_version'),'>') ){

                global $wpdb;
                $query='select * from `'.$wpdb->prefix.'eo_wbc_cat_maps`';
                $maps=$wpdb->get_results($query,'ARRAY_A');
                if(!empty($maps)){                

                    for ($i=0; $i < count($maps) ; $i++) { 

                        $first_term_taxonomy_id=$wpdb->get_var("SELECT term_taxonomy_id FROM `{$wpdb->prefix}term_taxonomy` INNER JOIN `{$wpdb->prefix}terms` ON wbc_terms.term_id=wbc_term_taxonomy.term_id AND wbc_term_taxonomy.taxonomy='product_cat' AND wbc_terms.term_id={$maps[$i]['first_cat_id']}");

                        $second_term_taxonomy_id=$wpdb->get_var("SELECT term_taxonomy_id FROM `{$wpdb->prefix}term_taxonomy` INNER JOIN `{$wpdb->prefix}terms` ON wbc_terms.term_id=wbc_term_taxonomy.term_id AND wbc_term_taxonomy.taxonomy='product_cat' AND wbc_terms.term_id={$maps[$i]['second_cat_id']}");

                        if(!$first_term_taxonomy_id){
                            $first_term_taxonomy_id=$wpdb->get_var("SELECT term_taxonomy_id FROM `wbc_term_taxonomy` where taxonomy LIKE 'pa_%' and term_id={$maps[$i]['first_cat_id']}");
                        }
                        if(!$second_term_taxonomy_id){
                            $second_term_taxonomy_id=$wpdb->get_var("SELECT term_taxonomy_id FROM `wbc_term_taxonomy` where taxonomy LIKE 'pa_%' and term_id={$maps[$i]['second_cat_id']}");
                        }   

                        if($first_term_taxonomy_id && $second_term_taxonomy_id){
                            $wpdb->query("UPDATE `wbc_eo_wbc_cat_maps` SET `first_cat_id`={$first_term_taxonomy_id},`second_cat_id`={$second_term_taxonomy_id} WHERE first_cat_id={$maps[$i]['first_cat_id']} AND second_cat_id={$maps[$i]['second_cat_id']}");
                        }
                    }                
                }
            }            

            update_option('eo_wbc_version',EO_WBC_PLUGIN_VERSION);
        }
    }
}
?>