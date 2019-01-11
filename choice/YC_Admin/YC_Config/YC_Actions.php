<?php
class YC_Actions
{
    public function __construct()
    {
        //Add Map Request 
        if((isset($_POST['yc_first_category']) && isset($_POST['yc_second_category']))
            && (strlen($_POST['yc_first_category'])>0 && strlen($_POST['yc_second_category'])>0))    
        {
            $this->map_add();            
        }
        //REmove Map Request
        elseif(isset($_POST['action']) && $_POST['action']=='remove')
        {
            $this->map_remove();
        }
        //Save Configurations
        elseif(isset($_POST['action']) 
            && $_POST['action']=='config-save' 
            && trim($_POST['yc_first_name'])
            && trim($_POST['yc_first_slug'])
            && trim($_POST['yc_second_name'])
            && trim($_POST['yc_second_slug'])
            && trim($_POST['title_step_three'])
        ){
                $this->config_save();
        }        
    }
    
    public function config_save()
    {  
        update_option('yc_first_name',$_POST['yc_first_name']);//FIRST : NAME
        update_option('yc_first_slug',$_POST['yc_first_slug']);//FIRST : SLUG
        if(trim($_POST['yc_first_url'])){
            update_option('yc_first_url',$_POST['yc_first_url']);//FIRST : URL
        }
        else {
            update_option('yc_first_url','/product-category/'.$_POST['yc_first_slug'].'/');//FIRST : URL
        }
        
        update_option('yc_second_name',$_POST['yc_second_name']);//SECOND : NAME
        update_option('yc_second_slug',$_POST['yc_second_slug']);//SECOND : SLUG
        if(trim($_POST['yc_second_url'])){
            update_option('yc_second_url',$_POST['yc_second_url']);//SECOND : URL
        }
        else {
            update_option('yc_second_url','/product-category/'.$_POST['yc_second_slug'].'/');
        }
        
        update_option('yc_collaction_title',$_POST['title_step_three']);//FINAL : NAME
                
        update_option('yc_config_category',"1");//SAVE CONFIGURATION        
        
        add_action( 'admin_notices',function (){
            echo "<div class='notice notice-success is-dismissible'><p>".__( '<strong>Your Choice Extension</strong> Configured Successfully.', 'my_plugin_textdomain' )."</p></div>";
        });
        
        if(isset($_GET['callback']) && $_GET['callback']==1)//RETURN TO HOME IF CAME THROUGH HOME
        {
            wp_redirect(admin_url('admin.php?page=yc-home'));
            exit;
        }                
    }
    public function map_add()
    {
        global $wpdb;
        if($wpdb->get_var("select * from {$wpdb->prefix}yc_cat_maps where first_cat_id='{$_POST['yc_first_category']}' and second_cat_id='{$_POST['yc_second_category']}'"))
        {
            add_action( 'admin_notices',function (){
                echo "<div class='notice notice-warning is-dismissible'><p>".__( '<strong>Map Already Exists.</strong>', 'my_plugin_textdomain' )."</p></div>";
            });
        }
        else
        {
            $wpdb->insert($wpdb->prefix.'yc_cat_maps',array('first_cat_id'=>$_POST['yc_first_category'],'second_cat_id'=>$_POST['yc_second_category']),array("%s","%s"));
            update_option('yc_config_map',"1");
            add_action( 'admin_notices',function (){
                echo "<div class='notice notice-success is-dismissible'><p>".__( '<strong>New Map Added Successfully.</strong>', 'my_plugin_textdomain' )."</p></div>";
            });
            if(isset($_GET['callback']) && $_GET['callback']==1)
            {
                //return back to admin home if we have arrived from there.
                echo "<script>window.location.href = '".admin_url('admin.php?page=yc-home')."';</script>";
                exit();
            }            
        }
    }
    public function map_remove()
    {       
        global $wpdb;
        $wpdb->delete($wpdb->prefix.'yc_cat_maps',array('first_cat_id'=>$_POST['first'],'second_cat_id'=>$_POST['second']),array('%s','%s'));
        //if it was last then make status yc_app not fully configured
        $map_count = "select count(*) from ".$wpdb->prefix."yc_cat_maps";
        $map_count = $wpdb->get_var($map_count);
        if($map_count==0)
        {
            update_option('yc_config_map',"0");
        }        
        add_action( 'admin_notices',function (){
            echo "<div class='notice notice-success is-dismissible'><p>".__( '<strong>Map Removed Successfully.</strong>', 'my_plugin_textdomain' )."</p></div>";
        });
    }    
}