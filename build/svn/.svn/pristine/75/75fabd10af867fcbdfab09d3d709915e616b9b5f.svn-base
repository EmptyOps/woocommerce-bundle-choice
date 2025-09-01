<?php
class EO_WBC_Actions
{
    public function __construct()
    {       
            //NOTE:
            //  1. no requests without _wpnonce and eo_wbc_action are allowed here.                    
            //Add Map Request
            if(    isset($_POST)
                && !empty($_POST['eo_wbc_first_category'])
                && !empty($_POST['eo_wbc_second_category'])
                && wp_verify_nonce($_POST['_wpnonce'],'eo_wbc_nonce_add_map')
                && $_POST['eo_wbc_action']==='eo_wbc_add_map'
            ){                
                $this->map_add();                
            }

            elseif (isset($_POST)
                && isset($_POST['_wpnonce'])
                && wp_verify_nonce($_POST['_wpnonce'],'eo_wbc_jpc_save_data')
                && !empty($_POST['eo_wbc_action'])
                && $_POST['eo_wbc_action']==='save_jpc_data'
                && !empty($_POST['eo_wbc_jpc_form_data'])
            ) {                
                update_option('eo_wbc_jpc_data',serialize($_POST['eo_wbc_jpc_form_data']));
                
                global $wpdb;

                $q_gen="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE ({$wpdb->prefix}term_taxonomy.taxonomy='product_cat' ) OR ({$wpdb->prefix}term_taxonomy.taxonomy LIKE 'pa_%') )";

                $q_cat="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE {$wpdb->prefix}term_taxonomy.taxonomy='product_cat' )";
                
                $q_att="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE {$wpdb->prefix}term_taxonomy.taxonomy LIKE 'pa_%' )";                
                
                $jpc_data=json_decode( unserialize(get_option('eo_wbc_jpc_data',serialize(array()))) );
                if(is_array($jpc_data) OR is_object($jpc_data)){

                    foreach ($jpc_data as $q_data) {
                        
                        /*$_cats=array();
                        $_attr=array();*/
                        $query=$q_gen;

                        for($l=0;$l<count($q_data)-1;$l++){
                            $_field_data=$q_data[$l];               
                            if($_field_data->field_type==0){
                                //is category
                                $query=" ( SELECT * FROM {$q_cat} AS T1 WHERE slug = '".$_field_data->field_value."' AND object_id IN ( SELECT object_id FROM {$query} AS T2 ) )";
                            }else {
                                //is attribute                        
                                $query=" ( SELECT * FROM {$q_att} AS T1 WHERE taxonomy='pa_{$_field_data->field_value}' AND ".($_field_data->cmp_value=="between"?" name BETWEEN '".explode('-',$_field_data->value_name)[0]."' AND '".explode('-',$_field_data->value_name)[1]."' ":" slug IN ('".implode("','",explode(',',$_field_data->value_data[0]))."') ")." AND object_id IN ( SELECT object_id FROM {$query} AS T2 ) ) ";
                            }        
                        }
                        $_query = "SELECT object_id FROM {$query} AS T";                                   

                        $rs=$wpdb->get_results($_query);
                        //Only for simple products.
                        if(is_array($rs) || is_object($rs)){                        
                            
                            foreach ($rs as $post_id) {
                                
                                if(!empty($q_data[count($q_data)-1]->sales_price)){

                                    update_post_meta($post_id->object_id,'_price',$q_data[count($q_data)-1]->sales_price);
                                    update_post_meta($post_id->object_id,'_sale_price',$q_data[count($q_data)-1]->sales_price);

                                } else{
                                    delete_post_meta($post_id->object_id,'_sale_price');                    
                                    update_post_meta($post_id->object_id,'_price',$q_data[count($q_data)-1]->regular_price);
                                }            
                                update_post_meta($post_id->object_id,'_regular_price',$q_data[count($q_data)-1]->regular_price);   
                                wc_delete_product_transients( $post_id->object_id );
                            }
                        }
                        
                        $query=" ( SELECT ID FROM {$wpdb->prefix}posts WHERE post_parent IN ( {$_query} ) ) ";

                        for($l=0;$l<count($q_data)-1;$l++){
                            
                            $_field_data=$q_data[$l];               

                            if($_field_data->field_type==1){                                
                                //is attribute                        
                                $query=" ( SELECT post_id FROM {$wpdb->prefix}postmeta WHERE meta_key='attribute_pa_{$_field_data->field_value}' AND meta_value IN ( SELECT slug FROM {$q_att} AS T1 WHERE taxonomy='pa_{$_field_data->field_value}' AND ".($_field_data->cmp_value=="between"?" name BETWEEN '".explode('-',$_field_data->value_name)[0]."' AND '".explode('-',$_field_data->value_name)[1]."' ":" slug IN ('".implode("','",explode(',',$_field_data->value_data[0]))."') ")." )  AND post_id IN ( {$query} ) ) ";
                            }        
                        }

                        $rs=$wpdb->get_results($query);
                        //Only for simple products.
                        if(is_array($rs) || is_object($rs)){                        
                            
                            foreach ($rs as $post_id) {                                                               
                                if(!empty($q_data[count($q_data)-1]->sales_price)){

                                    update_post_meta($post_id->post_id,'_price',$q_data[count($q_data)-1]->sales_price);
                                    update_post_meta($post_id->post_id,'_sale_price',$q_data[count($q_data)-1]->sales_price);

                                } else{
                                    delete_post_meta($post_id->post_id,'_sale_price');                    
                                    update_post_meta($post_id->post_id,'_price',$q_data[count($q_data)-1]->regular_price);
                                }            
                                update_post_meta($post_id->post_id,'_regular_price',$q_data[count($q_data)-1]->regular_price); 
                                wc_delete_product_transients( $post_id->post_id );  
                            }
                        }
                    }
                }
            }

            //Save Personalization
            elseif(isset($_POST)
                && isset($_POST['_wpnonce'])
                && wp_verify_nonce($_POST['_wpnonce'],'eo_wbc_personalize')
                && isset($_POST['eo_wbc_action'])
                && $_POST['eo_wbc_action']=='eo_wbc_personalize'
            ){
                $this->save_personalize();
            }
            
            //Save mapping preference, eg: AND and OR operator for joining two or more mapping conditions
            elseif(isset($_POST)
                && isset($_POST['_wpnonce'])
                && wp_verify_nonce($_POST['_wpnonce'],'eo_wbc_nonce_map_pref')
                && !empty($_POST['cat_pref'])
                && !empty($_POST['attr_pref'])
            ){
                update_option('eo_wbc_map_cat_pref',$_POST['cat_pref']);
                update_option('eo_wbc_map_attr_pref',$_POST['attr_pref']);
                add_action( 'admin_notices',function (){
                echo "<div class='notice notice-success is-dismissible'><p><strong>".__( 'Product mapping preference saved successfully.', 'woo-bundle-choice' )."</strong></p></div>";
                });
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
                !empty($_GET['page']) &&
                $_GET['page']=='eo-wbc-filter' &&
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
                    && !empty($_GET['eo_wbc_action'])
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
                && !empty($_POST['eo_wbc_action'])
                && $_POST['eo_wbc_action']==='eo_wbc_save_config'
                && !empty($_POST['eo_wbc_first_name'])
                && !empty($_POST['eo_wbc_first_slug'])
                && !empty($_POST['eo_wbc_second_name'])
                && !empty($_POST['eo_wbc_second_slug'])
                && !empty($_POST['eo_wbc_collection_title'])
                && isset($_POST['eo_wbc_btn_setting'])                                
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
                echo "<div class='notice notice-success is-dismissible'><p><strong>".__( 'Filter(s) Deleted Successfully.', 'woo-bundle-choice' )."</strong></p></div>";
            });
        }  
    }
    //Delete single map - { GET REQUEST }
    private function filter_single_delete(){
        
        $this->filter_delete($_GET['eo_filter_target'],$_GET['name']);        
        add_action( 'admin_notices',function (){
            echo "<div class='notice notice-success is-dismissible'><p><strong>".__( 'Filter Deleted Successfully.', 'woo-bundle-choice' )."</strong></p></div>";
        });
        header('Location: '.admin_url('admin.php?page=eo-wbc-filter'));
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
        $filter_width=$_POST["filter_width"];
        $filter_input=$_POST["filter_input"];
        $filter_order=$_POST["filter_order"];

        $filter_icon_size = $_POST['filter_icon_size'];
        $filter_icon_font_size = $_POST['filter_icon_font_size'];
        
        $filter_data=unserialize(get_option($filter_action,"a:0:{}"));
        
        foreach ($filter_data as $key=>$item) {
            
            if ($item['name']==$filter_name) {                 
                add_action( 'admin_notices',function (){
                    echo "<div class='notice notice-warning is-dismissible'><p><strong>".__( 'Filter Already Exists.', 'woo-bundle-choice' )."</strong></p></div>";
                });
                return;
            }
        }
        $data=array(
                        'name'=>$filter_name,
                        'type'=>$filter_type,
                        'label'=>$filter_label,
                        'advance'=>$filter_advanced,
                        'dependent'=>$filter_dependent,
                        'column_width' => $filter_width,
                        'input'=>$filter_input,
                        'order'=>$filter_order,
                    );
        
        if($filter_input == 'icon' || $filter_input == 'icon_text'){
            $data['icon_size'] = $filter_icon_size;
            $data['font_size'] = $filter_icon_font_size;
        }       

        $filter_data[] = $data;

        update_option($filter_action,serialize($filter_data)); 
        add_action( 'admin_notices',function (){
            echo "<div class='notice notice-success is-dismissible'><p><strong>".__( 'New Filter Added Successfully.', 'woo-bundle-choice' )."</strong></p></div>";
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
                echo "<div class='notice notice-success is-dismissible'><p><strong>".__( 'Map Removed Successfully.', 'woo-bundle-choice' )."</strong></p></div>";
            });
        }
    }
    //Delete single map - { GET REQUEST }
    private function map_single_delete(){
        $this->map_delete($_GET['map']);
        add_action( 'admin_notices',function (){
            echo "<div class='notice notice-success is-dismissible'><p><strong>".__( 'Map Removed Successfully.', 'woo-bundle-choice' )."</strong></p></div>";
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
        if(!empty($_POST['eo_wbc_btn_setting'])) {
            update_option('eo_wbc_btn_setting',$_POST['eo_wbc_btn_setting']); 
            if ($_POST['eo_wbc_btn_setting']=="0" || $_POST['eo_wbc_btn_setting']=="2") { //if on home page.

                //position of button (Top/Bottom/Middle/Custom)
                update_option('eo_wbc_btn_position',$_POST['eo_wbc_btn_position']);           
            }            
        }        

        update_option('eo_wbc_first_name',$_POST['eo_wbc_first_name']);//FIRST : NAME
        update_option('eo_wbc_first_slug',$_POST['eo_wbc_first_slug']);//FIRST : SLUG
        
        update_option('eo_wbc_first_url',
            $_POST['eo_wbc_first_url']
                ?
            $_POST['eo_wbc_first_url']
                :
            ('/product-category/'.$_POST['eo_wbc_first_slug'].'/'));//FIRST : URL

        update_option('eo_wbc_first_icon',($_POST['eo_wbc_first_icon']?$_POST['eo_wbc_first_icon']:''));//FIRST : ICON        
        
        update_option('eo_wbc_second_name',$_POST['eo_wbc_second_name']);//SECOND : NAME
        update_option('eo_wbc_second_slug',$_POST['eo_wbc_second_slug']);//SECOND : SLUG
        
        update_option('eo_wbc_second_url',
            $_POST['eo_wbc_second_url']
                ?
            $_POST['eo_wbc_second_url']
                :
            ('/product-category/'.$_POST['eo_wbc_second_slug'].'/'));//SECOND : URL        

        update_option('eo_wbc_second_icon',($_POST['eo_wbc_second_icon']?$_POST['eo_wbc_second_icon']:''));//SECOND : ICON
        
        update_option('eo_wbc_collection_title',$_POST['eo_wbc_collection_title']);//FINAL : NAME
        update_option('eo_wbc_collection_icon',($_POST['eo_wbc_collection_icon']?$_POST['eo_wbc_collection_icon']:''));//COLLECTION : ICON
          
        //update filter bar settings :)
        if(isset($_POST['eo_wbc_filter_enable'])) {

            update_option('eo_wbc_filter_enable','1');
        }
        else{

            update_option('eo_wbc_filter_enable','0');
        }

        //update filter bar settings :)
        if(isset($_POST['eo_wbc_pair_maker_status'])) {

            update_option('eo_wbc_pair_maker_status','1');
        }
        else{

            update_option('eo_wbc_pair_maker_status','0');
        }

        if(!empty($_POST['eo_wbc_pair_status'])){
            update_option('eo_wbc_pair_status','1');
        } else {
            update_option('eo_wbc_pair_status','0');
        }

        if(!empty($_POST['eo_wbc_pair_upper_card'])){            
            update_option('eo_wbc_pair_upper_card',$_POST['eo_wbc_pair_upper_card']);
        }

        if(!empty($_POST['eo_wbc_pair_text'])){
            update_option('eo_wbc_pair_text',$_POST['eo_wbc_pair_text']);
        } else {
            update_option('eo_wbc_pair_text','Make Pair');
        }

        if(!empty($_POST['eo_wbc_inventory_type'])){
            update_option('eo_wbc_inventory_type',$_POST['eo_wbc_inventory_type']);
        }

        update_option('eo_wbc_config_category',"1");//SAVE CONFIGURATION        
        
        add_action( 'admin_notices',function (){
            ?><div class='notice notice-success is-dismissible'><p>
                <?php 
            /* translators: %1$s: <strong> tag */
            /* translators: %2$s: </strong> tag */
            printf( __('%1$s WooCommerce Bundle Choice %2$s Configured Successfully.','woo-bundle-choice'),'<strong>','</strong>'); 

                ?>                    
                </p></div> 
            <?php
        });
        
        if(isset($_GET['callback']) && $_GET['callback']==1)//RETURN TO HOME IF CAME THROUGH HOME
        {
            wp_redirect(admin_url('admin.php?page=eo-wbc-home'));
            exit;
        }                
    }
    
    private function map_add()
    {
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // return 0;
        
        global $wpdb;
        
        $eo_wbc_first_category=$_POST['eo_wbc_first_category'];
        $eo_wbc_second_category=$_POST['eo_wbc_second_category'];
        $eo_wbc_add_discount=$_POST['eo_wbc_add_discount']?$_POST['eo_wbc_add_discount']:0;
        
        if($wpdb->get_var("select * from {$wpdb->prefix}eo_wbc_cat_maps where first_cat_id in ('{$eo_wbc_first_category}','{$eo_wbc_second_category}') and second_cat_id in ('{$eo_wbc_first_category}','{$eo_wbc_second_category}')"))
        {
            add_action( 'admin_notices',function (){
                echo "<div class='notice notice-warning is-dismissible'><p><strong>".__( 'Map Already Exists.', 'woo-bundle-choice' )."</strong></p></div>";
            });
        }
        else
        {
            if($wpdb->insert($wpdb->prefix.'eo_wbc_cat_maps',array('first_cat_id'=>$eo_wbc_first_category,'second_cat_id'=>$eo_wbc_second_category,'discount'=>$eo_wbc_add_discount.'%'),array("%s","%s","%s")))
            {
                update_option('eo_wbc_config_map',"1");
                add_action( 'admin_notices',function (){
                    echo "<div class='notice notice-success is-dismissible'><p><strong>".__( 'New Map Added Successfully.', 'woo-bundle-choice' )."</strong></p></div>";
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
                    echo "<div class='notice notice-error is-dismissible'><p><strong>".__( 'Error! Failed to add new map. please contact our developers for help.', 'woo-bundle-choice' )."</strong></p></div>";
                });        
            }
        }
    }
    //Save Personalize
    private function save_personalize(){
        
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /**
         * Save Breadcrumb settings.
         */
        if(isset($_POST['eo_wbc_active_breadcrumb_color']))
        {            
            update_option('eo_wbc_active_breadcrumb_color',$_POST['eo_wbc_active_breadcrumb_color']);
        }
            
        if(isset($_POST['eo_wbc_non_active_breadcrumb_color']))
        {
            update_option('eo_wbc_non_active_breadcrumb_color',$_POST['eo_wbc_non_active_breadcrumb_color']);
        }
        
        if(isset($_POST['eo_wbc_breadcrumb_radius']))
        {
            update_option('eo_wbc_breadcrumb_radius',$_POST['eo_wbc_breadcrumb_radius']);
        }
        
        if(isset($_POST['eo_wbc_show_hide_breadcrumb_icon']))
        {
            update_option('eo_wbc_show_hide_breadcrumb_icon','1');            
        }
        else
        {
            update_option('eo_wbc_show_hide_breadcrumb_icon','0');
        }

        if(isset($_POST['eo_wbc_breadcrumb_icon_color_active']))
        {
            update_option('eo_wbc_breadcrumb_icon_color_active',$_POST['eo_wbc_breadcrumb_icon_color_active']);
        }
        if(isset($_POST['eo_wbc_breadcrumb_icon_color_inactive']))
        {
            update_option('eo_wbc_breadcrumb_icon_color_inactive',$_POST['eo_wbc_breadcrumb_icon_color_inactive']);
        }
        if(isset($_POST['eo_wbc_breadcrumb_action_color_inactive']))
        {
            update_option('eo_wbc_breadcrumb_action_color_inactive',$_POST['eo_wbc_breadcrumb_action_color_inactive']);
        }
        if(isset($_POST['eo_wbc_breadcrumb_action_color_active']))
        {
            update_option('eo_wbc_breadcrumb_action_color_active',$_POST['eo_wbc_breadcrumb_action_color_active']);
        }
        if(isset($_POST['eo_wbc_breadcrumb_title_color_inactive']))
        {
            update_option('eo_wbc_breadcrumb_title_color_inactive',$_POST['eo_wbc_breadcrumb_title_color_inactive']);
        }  
         if(isset($_POST['eo_wbc_breadcrumb_title_color_active']))
        {
            update_option('eo_wbc_breadcrumb_title_color_active',$_POST['eo_wbc_breadcrumb_title_color_active']);
        }        
       
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /**
        *  Save text for product add to cart button
        */
        if(isset($_POST['eo_wbc_add_to_cart_text']))
        {
            update_option('eo_wbc_add_to_cart_text',$_POST['eo_wbc_add_to_cart_text']);
        }
        /**
         * Save Homepage button setting.
         */
        //Homepage title.
        if(isset($_POST['eo_wbc_home_btn_tagline']))
        {
            update_option('eo_wbc_home_btn_tagline',$_POST['eo_wbc_home_btn_tagline']);
        }
        //Choice button text
        if(isset($_POST['eo_wbc_home_btn_text']))
        {
            update_option('eo_wbc_home_btn_text',$_POST['eo_wbc_home_btn_text']);
        }
        
        //If button is dropdown ???
        /*if(isset($_POST['yc-home-dropdown-button']) && $_POST['yc-home-dropdown-button']=='on')
        {
            update_option('yc_home_dropdown_button',TRUE);
        }
        else
        {
            update_option('yc_home_dropdown_button',FALSE);
        }*/
        
        //If apply default css style ???
        if(isset($_POST['eo_wbc_home_default_button']) && $_POST['eo_wbc_home_default_button']=='1')
        {
            update_option('eo_wbc_home_default_button','0');
        }
        else
        {
            update_option('eo_wbc_home_default_button','1');        
        }
        
        //Button background color if custome is opted
        if(isset($_POST['eo_wbc_home_btn_color']))
        {
            update_option('eo_wbc_home_btn_color',$_POST['eo_wbc_home_btn_color']);
        }
        
        if(isset($_POST['eo_wbc_home_btn_hover_color']))
        {
            update_option('eo_wbc_home_btn_hover_color',$_POST['eo_wbc_home_btn_hover_color']);
        }
        
        if(isset($_POST['eo_wbc_home_btn_border_color']))
        {
            update_option('eo_wbc_home_btn_border_color',$_POST['eo_wbc_home_btn_border_color']);
        }
        
        if(isset($_POST['eo_wbc_home_btn_text_color']))
        {
            update_option('eo_wbc_home_btn_text_color',$_POST['eo_wbc_home_btn_text_color']);
        }
        
        if(isset($_POST['eo_wbc_home_btn_radius']))
        {
            update_option('eo_wbc_home_btn_radius',$_POST['eo_wbc_home_btn_radius']);
        }       
        

        if(isset($_POST['eo_wbc_filter_config_font_family']))
        {
            update_option('eo_wbc_filter_config_font_family',$_POST['eo_wbc_filter_config_font_family']);
        }  
        if(isset($_POST['eo_wbc_filter_config_header_color']))
        {
            update_option('eo_wbc_filter_config_header_color',$_POST['eo_wbc_filter_config_header_color']);
        }  
        if(isset($_POST['eo_wbc_filter_config_label_color']))
        {
            update_option('eo_wbc_filter_config_label_color',$_POST['eo_wbc_filter_config_label_color']);
        }  
        if(isset($_POST['eo_wbc_filter_config_slidernode_color']))
        {
            update_option('eo_wbc_filter_config_slidernode_color',$_POST['eo_wbc_filter_config_slidernode_color']);
        }  
        
        if(isset($_POST['eo_wbc_filter_config_slidertrack_color']))
        {
            update_option('eo_wbc_filter_config_slidertrack_color',$_POST['eo_wbc_filter_config_slidertrack_color']);
        }  

        if(!empty($_POST['eo_wbc_filter_config_icon_size']))
        {
            update_option('eo_wbc_filter_config_icon_size',$_POST['eo_wbc_filter_config_icon_size']);
        }  
        if(!empty($_POST['eo_wbc_filter_config_icon_label_size']))
        {
            update_option('eo_wbc_filter_config_icon_label_size',$_POST['eo_wbc_filter_config_icon_label_size']);
        }  


        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        add_action( 'admin_notices',function (){
            echo "<div class='notice notice-success is-dismissible'><p>".sprintf(__( '%s Success ! %s Your settings have been saved successfully.'),"<strong>","</strong>")."</p></div>";
        });
    }

}
