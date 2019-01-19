<?php
class EO_WBC_Actions
{
    public function __construct()
    {      
        
            //Add Map Request
            if(    (isset($_POST['eo_wbc_first_category']) && isset($_POST['eo_wbc_second_category']) )
                && $_POST['eo_wbc_first_category']
                && $_POST['eo_wbc_second_category']
                && wp_verify_nonce($_POST['_wpnonce'],'eo_wbc_nonce_add_map')
                && $_POST['eo_wbc_action']==='eo_wbc_add_map'
            ){                
                $this->map_add();                
            }
            
            //Remove Map Request
            elseif(
                $_POST['eo_wbc_action']==='eo_wbc_remove_map' 
                    &&
                wp_verify_nonce($_POST['_wpnonce'],'eo_wbc_nonce_remove_map')
             )
            {
                $this->map_remove();
            }
            
            //Save Configurations
            elseif(
                wp_verify_nonce($_POST['_wpnonce'],'eo_wbc_nonce_config')                
                && $_POST['eo_wbc_action']==='eo_wbc_save_config'
                && $_POST['eo_wbc_first_name']
                && $_POST['eo_wbc_first_slug']
                && $_POST['eo_wbc_second_name']
                && $_POST['eo_wbc_second_slug']
                && $_POST['eo_wbc_collection_title']
                ){
                    $this->config_save();
            }            
    }
    
    public function config_save()
    {  
        update_option('eo_wbc_first_name',$_POST['eo_wbc_first_name']);//FIRST : NAME
        update_option('eo_wbc_first_slug',$_POST['eo_wbc_first_slug']);//FIRST : SLUG
        
        update_option('eo_wbc_first_url',
            $_POST['eo_wbc_first_url']
                ?
            $_POST['eo_wbc_first_url']
                :
            ('/product-category/'.$_POST['eo_wbc_first_slug'].'/'));//FIRST : URL
        
        update_option('eo_wbc_second_name',$_POST['eo_wbc_second_name']);//SECOND : NAME
        update_option('eo_wbc_second_slug',$_POST['eo_wbc_second_slug']);//SECOND : SLUG
        
        update_option('eo_wbc_second_url',
            $_POST['eo_wbc_second_url']
                ?
            $_POST['eo_wbc_second_url']
                :
            ('/product-category/'.$_POST['eo_wbc_second_slug'].'/'));//SECOND : URL        
        
        update_option('eo_wbc_collection_title',$_POST['eo_wbc_collection_title']);//FINAL : NAME
                
        update_option('eo_wbc_config_category',"1");//SAVE CONFIGURATION        
        
        add_action( 'admin_notices',function (){
            echo "<div class='notice notice-success is-dismissible'><p>".__( '<strong>WooCommerce Bundle Choice</strong> Configured Successfully.', 'woocommerce' )."</p></div>";
        });
        
        if(isset($_GET['callback']) && $_GET['callback']==1)//RETURN TO HOME IF CAME THROUGH HOME
        {
            wp_redirect(admin_url('admin.php?page=eo-wbc-home'));
            exit;
        }                
    }
    
    public function map_add()
    {
        global $wpdb;
        
        $eo_wbc_first_category=$_POST['eo_wbc_first_category'];
        $eo_wbc_second_category=$_POST['eo_wbc_second_category'];
        
        if($wpdb->get_var("select * from {$wpdb->prefix}eo_wbc_cat_maps where first_cat_id='{$eo_wbc_first_category}' and second_cat_id='{$eo_wbc_second_category}'"))
        {
            add_action( 'admin_notices',function (){
                echo "<div class='notice notice-warning is-dismissible'><p>".__( '<strong>Map Already Exists.</strong>', 'woocommerce' )."</p></div>";
            });
        }
        else
        {
            $wpdb->insert($wpdb->prefix.'eo_wbc_cat_maps',array('first_cat_id'=>$eo_wbc_first_category,'second_cat_id'=>$eo_wbc_second_category),array("%s","%s"));
            update_option('eo_wbc_config_map',"1");
            add_action( 'admin_notices',function (){
                echo "<div class='notice notice-success is-dismissible'><p>".__( '<strong>New Map Added Successfully.</strong>', 'woocommerce' )."</p></div>";
            });
            if(isset($_GET['callback']) && $_GET['callback']==1)
            {
                //return back to admin home if we have arrived from there.
                echo "<script>window.location.href = '".admin_url('admin.php?page=eo-wbc-home')."';</script>";
                exit();
            }            
        }
    }
    public function map_remove()
    {       
        global $wpdb;
        $wpdb->delete($wpdb->prefix.'eo_wbc_cat_maps',array('first_cat_id'=>$_POST['eo_wbc_source'],'second_cat_id'=>$_POST['eo_wbc_target']),array('%s','%s'));

        $map_count = "select count(*) from ".$wpdb->prefix."eo_wbc_cat_maps";
        $map_count = $wpdb->get_var($map_count);
        if($map_count==0)
        {
            update_option('eo_wbc_config_map',"0");
        }        
        add_action( 'admin_notices',function (){
            echo "<div class='notice notice-success is-dismissible'><p>".__( '<strong>Map Removed Successfully.</strong>', 'woocommerce' )."</p></div>";
        });
    }    
}