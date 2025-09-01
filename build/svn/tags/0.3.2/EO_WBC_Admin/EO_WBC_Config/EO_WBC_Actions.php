<?php
class EO_WBC_Actions
{
    public function __construct()
    {       
            //NOTE:
            //  1. no requests withour _wpnonce and eo_wbc_action are allowed here.        

            //Add Map Request
            if(    isset($_POST)
                && !empty($_POST['eo_wbc_first_category'])
                && !empty($_POST['eo_wbc_second_category'])
                && wp_verify_nonce($_POST['_wpnonce'],'eo_wbc_nonce_add_map')
                && $_POST['eo_wbc_action']==='eo_wbc_add_map'
            ){                
                $this->map_add();                
            }

            //Add filter request
            elseif( isset($_POST)
                    && isset($_POST['_wpnonce'])
                    &&    
                    (   wp_verify_nonce($_POST['_wpnonce'],'eo_add_filter_first')
                        OR 
                        wp_verify_nonce($_POST['_wpnonce'],'eo_add_filter_second')
                    )
                    && $_POST['eo_wbc_action']==='bulk-filter-add'              
                    && !empty($_POST['eo_filter_target'])
            ){
                $this->filter_add();
            }
            
            //Bulk edit,delete filter request
            elseif( isset($_POST)
                    && isset($_POST['_wpnonce'])
                    &&   
                    (
                        wp_verify_nonce($_POST['_wpnonce'],'bulk-first-filters')
                        OR
                        wp_verify_nonce($_POST['_wpnonce'],'bulk-second-filters')
                    )
                    && $_POST['eo_wbc_action']==='bulk-filter-action'              
                    && !empty($_POST['eo_filter_target'])
            ){
                if($_POST['action']=='edit' || $_POST['action2']=='edit'){
                    //edit save action here
                    //$this->filter_bulk_edit();
                }   
                elseif ($_POST['action']=='delete' || $_POST['action2']=='delete') {                    
                    //delete action here                    
                    $this->filter_bulk_delete();
                }
            }
            //single edit,delete filter request
            elseif(
                !empty($_GET) &&
                isset($_GET['page'])=='eo-wbc-filter' &&
                !empty($_GET['eo_wbc_action']) &&
                (
                    $_GET['eo_wbc_action']=='single_filter_edit'
                    OR
                    $_GET['eo_wbc_action']=='single_filter_delete'
                )
            ) {

                //Single edit and delete option...                
                if(!empty($_GET['action']) && $_GET['action']=='edit'){
                    //edit save action here
                    //$this->map_bulk_edit();
                }   
                elseif (
                    !empty($_GET['action']) 
                    && $_GET['action']=='delete' 
                    && isset($_GET['eo_wbc_action'])
                    && $_GET['eo_wbc_action']=='single_filter_delete'
                    && !empty($_GET['eo_filter_target'])
                    && (
                            $_GET['eo_filter_target']=='eo_wbc_add_filter_first' 
                                OR
                            $_GET['eo_filter_target']=='eo_wbc_add_filter_second' 
                        )
                    && !empty($_GET['name'])
                ) {                    
                    //delete action here                    
                    $this->filter_single_delete();
                }            
            }

            elseif(isset($_POST) && isset($_POST['action']) && wp_verify_nonce($_POST['_wpnonce'],'bulk-maps')) {
                //Bulk edit and delete option...                                
                if($_POST['action']=='edit' || $_POST['action2']=='edit' ){
                    //edit save action here
                    //$this->map_bulk_edit();
                }   
                elseif ($_POST['action']=='delete' || $_POST['action2']=='delete') {                    
                    //delete action here                    
                    $this->map_bulk_delete();
                }            
            }   

            elseif( isset($_GET) &&
                    !empty($_GET['page'])
                    && $_GET['page']=='eo-wbc-map'
                    && isset($_GET['eo_wbc_action'])
            ){                
                //Single edit and delete option...                
                if($_GET['action']=='edit'){
                    //edit save action here
                    //$this->map_bulk_edit();
                }   
                elseif ($_GET['action']=='delete' && $_GET['eo_wbc_action']=='single_map') {                    
                    //delete action here                    
                    $this->map_single_delete();
                }            
            }

            //Save Configurations
            elseif( !empty($_POST['_wpnonce'])                
                && wp_verify_nonce($_POST['_wpnonce'],'eo_wbc_nonce_config')                
                && $_POST['eo_wbc_action']==='eo_wbc_save_config'
                && $_POST['eo_wbc_first_name']
                && $_POST['eo_wbc_first_slug']
                && $_POST['eo_wbc_second_name']
                && $_POST['eo_wbc_second_slug']
                && $_POST['eo_wbc_collection_title']
                && strlen($_POST['eo_wbc_btn_setting'])                
                && !empty($_POST['eo_wbc_btn_position'])                                
            ){
                $this->config_save();
            }
    }

/////////////////////////////////////////////////
/////////////////////////////////////////////////
    private function filter_bulk_edit(){
        $_maps=$_POST['cb'];
        foreach ($_maps as $key => $value) {
            $_maps[$key]=explode('_',$value);
        }        
    }
/////////////////////////////////////////////////
/////////////////////////////////////////////////
    //Delete filters in bundle - { POST REQUEST }
    private function filter_bulk_delete(){
        if(count($_POST['cb'])){
            if(is_array($_POST['cb'])){
                foreach ($_POST['cb'] as $key => $name) {
                    $this->filter_delete($_POST['eo_filter_target'],$name);
                }
            }
            else
            {
                $this->filter_delete($_POST['eo_filter_target'],$_POST['cb']);
            }
            add_action( 'admin_notices',function (){
                echo "<div class='notice notice-success is-dismissible'><p>".__( '<strong>Filter(s) Deleted Successfully.</strong>', 'woocommerce' )."</p></div>";
            });
        }  
    }
    //Delete single map - { GET REQUEST }
    private function filter_single_delete(){
        
        $this->filter_delete($_GET['eo_filter_target'],$_GET['name']);
        add_action( 'admin_notices',function (){
            echo "<div class='notice notice-success is-dismissible'><p>".__( '<strong>Filter Deleted Successfully.</strong>', 'woocommerce' )."</p></div>";
        });
    }
    //Delete map function
    private function filter_delete($target,$filter){                       

        $filter_data=unserialize(get_option($target,"a:0:{}"));                
        foreach ($filter_data as $key=>$item) {
            
            if ($item['name']==$filter) {                 
                unset($filter_data[$key]);
            }
        }
        update_option($target,serialize($filter_data)); 
    }

/////////////////////////////////////////////////
/////////////////////////////////////////////////
    private function filter_add(){

        $filter_action=$_POST["eo_filter_target"];

        $filter_name=$_POST["filter_name"];
        $filter_type=$_POST["filter_type"];
        $filter_label=(!empty($_POST["filter_label"])?$_POST["filter_label"]:"");
        $filter_advanced=(!empty($_POST["filter_advanced"])?"1":"0");
        $filter_dependent=(!empty($_POST["filter_dependent"])?"1":"0");
        $filter_input=$_POST["filter_input"];
        
        $filter_data=unserialize(get_option($filter_action,"a:0:{}"));
        
        foreach ($filter_data as $key=>$item) {
            
            if ($item['name']==$filter_name) {                 
                add_action( 'admin_notices',function (){
                    echo "<div class='notice notice-warning is-dismissible'><p>".__( '<strong>Filter Already Exists.</strong>', 'woocommerce' )."</p></div>";
                });
                return;
            }
        }

        $filter_data[]=array(
                        'name'=>$filter_name,
                        'type'=>$filter_type,
                        'label'=>$filter_label,
                        'advance'=>$filter_advanced,
                        'dependent'=>$filter_dependent,
                        'input'=>$filter_input,
                    );    
        update_option($filter_action,serialize($filter_data)); 
        add_action( 'admin_notices',function (){
            echo "<div class='notice notice-success is-dismissible'><p>".__( '<strong>New Filter Added Successfully.</strong>', 'woocommerce' )."</p></div>";
        });               
    }

/////////////////////////////////////////////////
/////////////////////////////////////////////////
    private function map_bulk_edit(){
        
        $_maps=$_POST['cb'];
        foreach ($_maps as $key => $value) {
            $_maps[$key]=explode('_',$value);
        }        
    }
/////////////////////////////////////////////////
/////////////////////////////////////////////////
    //Delete maps in bundle - { POST REQUEST }
    private function map_bulk_delete(){
        if(count($_POST['cb'])){
            if(is_array($_POST['cb'])){
                foreach ($_POST['cb'] as $key => $map) {
                    $this->map_delete($map);
                }
            }
            else
            {
                $this->map_delete($_POST['cb']);
            }
            add_action( 'admin_notices',function (){
                echo "<div class='notice notice-success is-dismissible'><p>".__( '<strong>Map Removed Successfully.</strong>', 'woocommerce' )."</p></div>";
            });
        }
    }
    //Delete single map - { GET REQUEST }
    private function map_single_delete(){
        $this->map_delete($_GET['map']);
        add_action( 'admin_notices',function (){
            echo "<div class='notice notice-success is-dismissible'><p>".__( '<strong>Map Removed Successfully.</strong>', 'woocommerce' )."</p></div>";
        });
    }
    //Delete map function
    private function map_delete($map){        

        $set=explode('_', $map);        
        global $wpdb;
        $wpdb->delete($wpdb->prefix.'eo_wbc_cat_maps',array('first_cat_id'=>$set[0],'second_cat_id'=>$set[1]));
        $map_count = "select count(*) from ".$wpdb->prefix."eo_wbc_cat_maps";
        $map_count = $wpdb->get_var($map_count);
        if($map_count==0)
        {
            update_option('eo_wbc_config_map',"0");
        }        
    }
/////////////////////////////////////////////////
/////////////////////////////////////////////////

    private function config_save()
    {          
        //Button setting style,(Default/Shortcode)        
        update_option('eo_wbc_btn_setting',$_POST['eo_wbc_btn_setting']); 
        if ($_POST['eo_wbc_btn_setting']=="0") { //if default is choosen

            //position of button (Top/Bottom/Middle/Custom)
            update_option('eo_wbc_btn_position',$_POST['eo_wbc_btn_position']);           
        }        

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
          
        //update filter bar settings :)
        if(isset($_POST['eo_wbc_filter_enable'])) {

            update_option('eo_wbc_filter_enable','1');
        }
        else{

            update_option('eo_wbc_filter_enable','0');
        }

        if(!empty($_POST['eo_wbc_pair_status'])){
            update_option('eo_wbc_pair_status','1');
        } else {
            update_option('eo_wbc_pair_status','0');
        }

        if(!empty($_POST['eo_wbc_pair_text'])){
            update_option('eo_wbc_pair_text',$_POST['eo_wbc_pair_text']);
        } else {
            update_option('eo_wbc_pair_text','Make Pair');
        }
        
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
    
    private function map_add()
    {
        global $wpdb;
        
        $eo_wbc_first_category=$_POST['eo_wbc_first_category'];
        $eo_wbc_second_category=$_POST['eo_wbc_second_category'];
        $eo_wbc_add_discount=$_POST['eo_wbc_add_discount']?$_POST['eo_wbc_add_discount']:0;
        
        if($wpdb->get_var("select * from {$wpdb->prefix}eo_wbc_cat_maps where first_cat_id in ('{$eo_wbc_first_category}','{$eo_wbc_second_category}') and second_cat_id in ('{$eo_wbc_first_category}','{$eo_wbc_second_category}')"))
        {
            add_action( 'admin_notices',function (){
                echo "<div class='notice notice-warning is-dismissible'><p>".__( '<strong>Map Already Exists.</strong>', 'woocommerce' )."</p></div>";
            });
        }
        else
        {
            if($wpdb->insert($wpdb->prefix.'eo_wbc_cat_maps',array('first_cat_id'=>$eo_wbc_first_category,'second_cat_id'=>$eo_wbc_second_category,'discount'=>$eo_wbc_add_discount.'%'),array("%s","%s","%s")))
            {
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
            else{
                add_action( 'admin_notices',function (){
                    echo "<div class='notice notice-error is-dismissible'><p>".__( '<strong>Error! Failed to add new map. please contact our developers for help.</strong>', 'woocommerce' )."</p></div>";
                });        
            }
        }
    }

}
