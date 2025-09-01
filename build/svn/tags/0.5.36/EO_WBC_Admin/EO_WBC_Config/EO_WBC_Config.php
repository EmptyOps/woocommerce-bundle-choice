<?php
class EO_WBC_Config
{   
    public function __construct() {

        $this->menu();   
        $this->admin_actions();     
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

            $this->inventory_based_menu();

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

    function eo_wbc_jewellery_price_control(){
        require_once apply_filters('eo_wbc_admin_config_filter_jewellery_price_control','EO_WBC_View/EO_WBC_View_Jewellery_Price_Control.php');
    }

    function inventory_based_menu(){

        //Menu based on inventory
        switch(get_option('eo_wbc_inventory_type')){
            case 'jewelry':
                add_submenu_page('eo-wbc-home', __('Jewellery Control(Beta)','woo-bundle-choice'), __('Jewellery Control(Beta)','woo-bundle-choice'), 'administrator', 'eo-wbc-jewellery-price-control',array($this,'eo_wbc_jewellery_price_control'));           
                $this->menu_slugs['Jewellery Control(Beta)']='eo-wbc-jewellery-price-control';
                break;
        }
    } 

    function admin_actions(){

        add_action( 'save_post',array($this,'jpc_update'),10,3); 
    } 

    #Jewellary Price Update
    function jpc_update( $post_ID, $post, $update){                           

        if ( $post->post_type != 'product') return;

        global $wpdb;

        $q_gen="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE ({$wpdb->prefix}term_taxonomy.taxonomy='product_cat' ) OR ({$wpdb->prefix}term_taxonomy.taxonomy LIKE 'pa_%') )";

        $q_cat="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE {$wpdb->prefix}term_taxonomy.taxonomy='product_cat' )";
        
        $q_att="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE {$wpdb->prefix}term_taxonomy.taxonomy LIKE 'pa_%' )";                
        
        $jpc_data=unserialize(get_option('eo_wbc_jpc_data',serialize(array())) );
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

    function jpc_update_meta( $meta_id, $post_ID, $meta_key, $meta_value ){                           

        global $wpdb;

        $q_gen="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE ({$wpdb->prefix}term_taxonomy.taxonomy='product_cat' ) OR ({$wpdb->prefix}term_taxonomy.taxonomy LIKE 'pa_%') )";

        $q_cat="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE {$wpdb->prefix}term_taxonomy.taxonomy='product_cat' )";
        
        $q_att="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE {$wpdb->prefix}term_taxonomy.taxonomy LIKE 'pa_%' )";                
        
        $jpc_data=unserialize(get_option('eo_wbc_jpc_data',serialize(array())));
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
}