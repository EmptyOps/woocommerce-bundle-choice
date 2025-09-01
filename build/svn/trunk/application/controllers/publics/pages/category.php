<?php
namespace eo\wbc\controllers\publics\pages;
defined( 'ABSPATH' ) || exit;

use eo\wbc\model\publics\SP_Model_Feed;

class Category {

    private static $_instance = null;
    protected $is_shop_cat_filter = false;
    protected $is_shortcode_filter = false;
    protected $filter_prefix = '';
    public static function instance() {
        if ( ! isset( self::$_instance ) ) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    private function __construct() {        
    }

    public function init($category = '') {

        $this->first_category_slug = wbc()->options->get_option('configuration','first_slug');
        $first_category_object = get_term_by('slug',$this->first_category_slug,'product_cat');
        if(!empty($first_category_object) and !is_wp_error($first_category_object)) {
            $this->first_category_slug = $first_category_object->slug;
        }

        $this->second_category_slug = wbc()->options->get_option('configuration','second_slug');
        $second_category_object = get_term_by('slug',$this->second_category_slug,'product_cat');
        if(!empty($second_category_object) and !is_wp_error($second_category_object)) {
            $this->second_category_slug = $second_category_object->slug;
        }

        //If add to cart triggred
        // Detection : only one category item get length > 0 
        //   i.e. using XOR check if only one of two have been set.
        if( !empty(wbc()->sanitize->get('CART')) && empty(wbc()->sanitize->get('EO_CHANGE')) && ( empty(wbc()->sanitize->get('FIRST')) XOR empty(wbc()->sanitize->get('SECOND')) ) and !empty(wbc()->sanitize->get('EO_WBC')) ) {
            //Iff condition is mutual exclusive, store it to  the session.
            $this->add2cart();            
        }

        //if Current-Category is either belongs to FIRST OR SECOND Category then initiate application                
        if(
            ((($this->eo_wbc_get_category()== $this->first_category_slug //get_option('eo_wbc_first_slug') 
              OR
            $this->eo_wbc_get_category()== $this->second_category_slug)) and !empty(wbc()->sanitize->get('EO_WBC')) ) or $this->is_shop_cat_filter===true or $this->is_shortcode_filter //get_option('eo_wbc_second_slug')
        ){



            //if( get_option('eo_wbc_filter_enable')=='1' ){
            /*wbc()->options->update_option('filters_filter_setting','config_filter_status','config_filter_status');*/

            /*wbc()->options->update_option('filters_filter_setting','filter_setting_alternate_mobile','filter_setting_alternate_mobile');*/

            if(wbc()->options->get_option('filters_filter_setting','filter_setting_status','filter_setting_status') or $this->is_shop_cat_filter===true or $this->is_shortcode_filter) {

                wbc()->theme->load('css','category');
                wbc()->theme->load('js','category');
                
                SP_Model_Feed::instance()->init();

                if(
                     // ($this->eo_wbc_get_category()==get_option('eo_wbc_first_slug') && get_option('eo_wbc_add_filter_first',FALSE) )
                     // OR 
                     // ($this->eo_wbc_get_category()==get_option('eo_wbc_second_slug') && get_option('eo_wbc_add_filter_second',FALSE) )
                     (($this->eo_wbc_get_category()==$this->first_category_slug && wbc()->options->get_option_group('filters_d_fconfig',FALSE) )
                     OR 
                     ($this->eo_wbc_get_category()==$this->second_category_slug && wbc()->options->get_option_group('filters_s_fconfig',FALSE) ))
                     or $this->is_shop_cat_filter===true or $this->is_shortcode_filter
                ){

                    if($this->eo_wbc_get_category()==$this->first_category_slug && wbc()->options->get_option_group('filters_d_fconfig',FALSE)) {
                        SP_Model_Feed::instance()->add_to_cart_text();
                    }
                    if( wbc()->sanitize->get('is_test') == 1 ){
        
                        wbc_pr("Category init_f_eo_wbc_object");
                    }
                    $this->eo_wbc_add_filters();          
                }
            }        
            if($this->is_shop_cat_filter!==true && !$this->is_shortcode_filter){
                $this->eo_wbc_add_breadcrumb();                         
            }
            $this->eo_wbc_render(); 
        }    
    }

    public function add2cart() {
        $cart=base64_decode(wbc()->sanitize->get('CART'),TRUE);
        if(!empty($cart)){

            $cart=str_replace("\\",'',$cart);
            $cart=(array)json_decode($cart);
            
            if(is_array($cart) OR is_object($cart)) {
                if(empty($cart['quantity'])){
                    $cart['quantity'] = 1;
                }
                
                $variation_data = array();
                foreach($cart as $cart_key=>$cart_value){
                    if(substr($cart_key, 0, strlen('attribute_')) === 'attribute_'){
                        $variation_data[$cart_key]=$cart_value;
                    }
                }   

                $eo_wbc_sets = array();
                //if product belongs to first target;
                if( !empty($cart['eo_wbc_target']) ) {
                    $eo_wbc_target = get_term_by('slug',$cart['eo_wbc_target'],'product_cat');
                    if(!empty($eo_wbc_target) and !is_wp_error($eo_wbc_target)) {
                        $cart['eo_wbc_target'] = $eo_wbc_target->slug;
                    }
                }


                if (!empty($cart['eo_wbc_target']) and $this->first_category_slug==$cart['eo_wbc_target']) {

                    $eo_wbc_sets =
                        array(
                            'FIRST'=>array(
                                            $cart['eo_wbc_product_id'],
                                            $cart['quantity'],
                                            (isset($cart['variation_id'])?$cart['variation_id']:NULL),
                                            'variation'=>$variation_data,
                                        ),
                            'SECOND'=>NULL
                                                
                        );
                }
                //if product belongs to second target;
                elseif (!empty($cart['eo_wbc_target']) and $this->second_category_slug==$cart['eo_wbc_target']) {

                    $eo_wbc_sets =
                        array(
                            'FIRST'=>NULL,
                            'SECOND'=>array(
                                            $cart['eo_wbc_product_id'],
                                            $cart['quantity'],
                                            (isset($cart['variation_id'])?$cart['variation_id']:NULL),
                                            'variation'=>$variation_data,
                                        )
                    );
                }

                wbc()->session->set('EO_WBC_SETS', apply_filters('sp_wbc_add2session_cart_sets',$eo_wbc_sets,$cart));
            }                        
        }
    }

    public function eo_wbc_add_to_cart_link() {
        
        $cart=base64_decode(wbc()->sanitize->get('CART'),TRUE);
        
        if(!empty($cart)){

            $cart=str_replace("\\",'',$cart);
            $cart=(array)json_decode($cart);
            
            if(is_array($cart) OR is_object($cart)) {
                   
                return wbc()->wc->eo_wbc_get_cart_url()."?add-to-cart=".(isset($cart['variation_id'])?$cart['variation_id']:$cart['eo_wbc_product_id'])."&quantity=".$cart['quantity'];                
            } else {
                return wbc()->wc->eo_wbc_get_cart_url();
            }
        }
    }

    public function add_filter_widget(){
        if( wbc()->sanitize->get('is_test') == 1 ){
        
            wbc_pr("add_filter_widget_f_eo_wbc_object");
        }
        if(empty($this->filter_showing_status)) {
            wbc()->load->model('publics/component/eowbc_filter_widget');          
            // if (class_exists('EO_WBC_Filter_Widget')) {
                \eo\wbc\model\publics\component\EOWBC_Filter_Widget::instance()->init($this->is_shop_cat_filter,$this->filter_prefix,false);                               
            // }
            $this->filter_showing_status = true;
            do_action('eowbc_category_after_filter_rendered');
        }
    }

    public function eo_wbc_add_filters() {
        $this->filter_showing_status = false;
        //Add product filter widget...
        /*$this->filter_showing_status = false;
        if(has_action('woocommerce_archive_description', false )){
            add_action('woocommerce_archive_description',array($this,'add_filter_widget'),130);
        } else {

        */          
        


       
            /*add_filter('archive_template',function($path){
                var_dump($path);
            });*/

            $filter_container_location_action = SP_Model_Feed::instance()->filter_container_location_action( $this->is_shop_cat_filter, $this->is_shortcode_filter );
            if( wbc()->sanitize->get('is_test') == 1 ){

                wbc_pr("Category eo_wbc_add_filters_f_eo_wbc_object");
                wbc_pr($filter_container_location_action);
            }
            add_action($filter_container_location_action /*'woocommerce_before_shop_loop'*/ /*'woocommerce_archive_description'*/,array($this,'add_filter_widget'),1);

        /*}
            */
        if( $this->is_shortcode_filter ) {
            $add_category = \eo\wbc\model\publics\component\EOWBC_Filter_Widget::instance();
            $add_category->_category = $this->_category;
            $add_category->init(false,$this->filter_prefix,$this->is_shortcode_filter);
        }

    }

    public function eo_wbc_add_breadcrumb()
    {   

        

        //Add Breadcumb at top....      
       /* add_action( 'woocommerce_archive_description',function(){     
            wbc()->load->model('publics/component/eowbc_breadcrumb');       
            echo \eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_add_breadcrumb(wbc()->sanitize->get('STEP'),wbc()->sanitize->get('BEGIN')).'<br/><br/>';
        }, 120);*/

        add_action( 'woocommerce_before_shop_loop' /*'woocommerce_archive_description'*/ ,function(){     
            
            do_action('wbc_before_breadcrumb_widget_core');

            wbc()->load->model('publics/component/eowbc_breadcrumb');       
            echo \eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_add_breadcrumb(wbc()->sanitize->get('STEP'),wbc()->sanitize->get('BEGIN')).'<br/><br/>';
    
            do_action('wbc_after_breadcrumb_widget_core');

        }, 0);
    }

    public function eo_wbc_render()
    {   
        
        $features = unserialize(wbc()->options->get_option('setting_status_setting_status_setting','features',serialize(array())));
        
        if( !empty($features['pair_maker'])/*get_option('eo_wbc_pair_maker_status',FALSE)*/ && isset($_GET) && !empty(wbc()->sanitize->get('STEP')) && wbc()->sanitize->get('STEP')==2 && (empty(wbc()->sanitize->get('FIRST')) XOR empty(wbc()->sanitize->get('SECOND'))) ) {
                        

            add_action( 'wp_enqueue_scripts',function(){ 
                // wp_register_style('eo_wbc_ui_css',plugin_dir_url(EO_WBC_PLUGIN_FILE).'asset/css/fomantic/semantic.min.css');
                // wp_enqueue_style( 'eo_wbc_ui_css');
                // wp_register_script('eo_wbc_ui_js',plugin_dir_url(EO_WBC_PLUGIN_FILE).'asset/js/fomantic/semantic.min.js');
                // wp_enqueue_script( 'eo_wbc_ui_js');
                
                // wbc()->load->asset('css','fomantic/semantic.min');
                // wbc()->load->asset('js','fomantic/semantic.min');
                wbc()->load->built_in_asset('semantic');
            },100);

            add_action('wp_head',function(){
                //NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
                $custom_css = "
                    .woocommerce-products-header__title page-title{
                        display: none;
                    }
                    .woocommerce .content-area ,#content,#primary,#main,.content,.primary,.main{
                        width: 100% !important;
                    }
                    .woocommerce .widget-area {
                        display: none !important;
                    }
                    .tax-product_cat .thb-shop-title {
                        display: none;
                    }
                    .products{
                        display: none !important;
                    }                        
                    .ui.card>.image>img, .ui.cards>.card>.image>img{
                        width: 50%;
                    }
                    .products .ui.grid>[class*=\"five wide\"].column{
                        margin-left: 0 !important;
                    }
                ";

                wbc()->load->add_inline_style('', $custom_css, 'common');

            });

            add_action('wp_footer',function(){
                wbc()->load->template('publics/category', array('category_object'=>$this)); 
            });

        } else {
            //Hide Add to cart in Shop and product_category page
            remove_action( 'woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart');

            //remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );    

            //Add information to end of pemalink of product
            add_filter( 'post_type_link',array($this,'eo_wbc_product_url'));   
        } 

        if($this->is_shop_cat_filter!==true && !$this->is_shortcode_filter){
            add_action( 'woocommerce_no_products_found', function(){

                remove_action( 'woocommerce_no_products_found', 'wc_no_products_found', 10 );
                //$html='<!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) --><br/><br/>';
                // $html.='<div class="woocommerce ui grid centered">';
                //     $html.='<div class="ui row" style="height:max-content;">';                    
                //         $html.="<div class='ui grid centered'>";
                //             $html.="<div class='ui row' style='padding-bottom:3rem !important'>";
                //                 $html.="<h1 style='font-size:10vw;color:#767676;'>"./*echo*/ __('Ooops!', 'woo-bundle-choice')."</h1>";
                //             $html.="</div>";
                //             $html.="<div class='ui row' style='padding-bottom:0px'>";
                //                 $html.='<span class="ui inverted text">' . __( 'No products were found matching your selection.', 'woocommerce' ) .'<span>';
                //             $html.="</div>";    
                //             $html.="<div class='ui row'  style='padding-bottom:3rem !important'>";   
                //                 // TODO here isn't it better if i's simple javascript back in history - hiren                         
                //                 $html.='<button href="'.$this->eo_wbc_prev_url().'" class="ui inverted secondary single_add_to_cart_button button alt">'./*echo*/ __('Go back', 'woo-bundle-choice').'</button>&nbsp;&nbsp;';
                //                 $html.='<button href="'.((empty(wbc()->sanitize->get('FIRST')) XOR empty(wbc()->sanitize->get('SECOND')))?strtok(get_permalink((empty(wbc()->sanitize->get('FIRST'))?wbc()->sanitize->get('SECOND'):wbc()->sanitize->get('FIRST'))),'?'):'').'" class="ui grey button single_add_to_cart_button alt">'. /*echo*/ __('Continue buying single item', 'woo-bundle-choice').'</button>&nbsp;&nbsp;';
                //             $html.="</div>";                                                            
                //             if(current_user_can('manage_options')){
                //                 //Manage the mapping section
                //                 $html.="<div class='ui row' style='padding-bottom:0rem !important'>";
                //                     $html.='<a href="'.admin_url('admin.php?page=eowbc-mapping').'"><span class="ui text primary">'. /*echo*/ __('As admin of this site please create a product mapping to fix this problem.', 'woo-bundle-choice').'</span></a>';
                //                 $html.="</div>";    

                //                 /*ACTIVE_TODO_OC_START
                //                 here need to define how to manage %s and so on markers for the dynamic vars, like the dynamic var in below label -- to h & -- to s
                //                 ACTIVE_TODO_OC_END*/
                //                 $html.="<div class='ui row' style='padding-bottom:0rem !important'>";
                //                     $html.='Adequate mapping(s) needs to be added in the '.constant('EOWBC_NAME').' for Pair Builder to work properly.';
                //                 $html.="</div>";                                                    
                //             } else {                            
                //                 $html.="<div class='ui row' style='padding-bottom:0rem !important'>";
                //                     $html.='<a href="'.site_url('/?wbc_report=1').'">Report to admin to help them fix this problem.</a>&nbsp;&nbsp;';
                //                 $html.="</div>";                                                    
                //             }
                            
                //             $html.="<div class='ui row' style='padding-bottom:5rem !important'>";    
                //                 $html.="<span class='ui header'></span>";                        
                //             $html.="</div>";    
                //         $html.="</div>";                
                //     $html.='</div>';                                    
                // $html.='</div><script> jQuery(document).ready(function($){ $(".ui.button").on("click",function(){ window.location.href=$(this).attr("href"); }); }); </script>';
                // echo($html);

                // ACTIVE_TODO temp. below implementation need to be moved to its standard place in the particular controller when we upgrade th wbc. 
                
                $Ooops = /*echo*/ __('Ooops!', 'woo-bundle-choice');
                $no_products = __( 'No products were found matching your selection.', 'woocommerce' );
                $go_back = $this->eo_wbc_prev_url();
                $go_back_text = /*echo*/ __('Go back', 'woo-bundle-choice');
                $continue_buying = ((empty(wbc()->sanitize->get('FIRST')) XOR empty(wbc()->sanitize->get('SECOND')))?strtok(get_permalink((empty(wbc()->sanitize->get('FIRST'))?wbc()->sanitize->get('SECOND'):wbc()->sanitize->get('FIRST'))),'?'):'');
                $continue_buying_text = /*echo*/ __('Continue buying single item', 'woo-bundle-choice');
                $mapping_text = /*echo*/ __('As admin of this site please create a product mapping to fix this problem.', 'woo-bundle-choice');

                $html='<!-- Created with Wordpress plugin - WooCommerce Product bundle choice --><br/><br/>';
                echo($html);
                $ui = array(
                    array(
                        'type' => 'div',
                        'class' => 'woocommerce ui grid centered',
                        'child' => array(
                            array(
                                'type' => 'div',
                                'class' => 'ui row',
                                'attr' => array( 'style' => 'height:max-content;' ),
                                'child' => array(
                                    array(
                                        'type' => 'div',
                                        'class' => 'ui grid centered',
                                        'child' => array(
                                            array(
                                                'type' => 'div',
                                                'class' => 'ui row',
                                                'attr' => array( 'style' => 'padding-bottom:3rem !important' ),
                                                'child' => array(
                                                    array(
                                                        'type' => 'header',
                                                        'tag' => 'h1',
                                                        'attr' => array( 'style' => 'font-size:10vw;color:#767676;' ),
                                                        'preHTML' => $Ooops,
                                                        'id_key'=>'wbc_fp_oops_appointment_optitle',
                                                    ),
                                                ),
                                            ),
                                            array(
                                                'type' => 'div',
                                                'class' => 'ui row',
                                                'attr' => array( 'style' => 'padding-bottom:0px' ),
                                                'child' => array(
                                                    array(
                                                        'type' => 'span',
                                                        'class' => 'ui inverted text',
                                                        'preHTML' => $no_products,
                                                        'id_key'=>'wbc_fp_oops_appointment_no_products',
                                                    ),
                                                ),
                                            ),
                                            array(
                                                'type' => 'div',
                                                'class' => 'ui row',
                                                'attr' => array( 'style' => 'padding-bottom:3rem !important' ),
                                                'child' => array(
                                                    // TODO here isn't it better if i's simple javascript back in history - hiren 
                                                    array(
                                                        'type'=>'a',
                                                        'href'=>$go_back,
                                                        'attr'=>array('type'=>'button'),
                                                        'class'=>'ui inverted secondary single_add_to_cart_button button alt',
                                                        'preHTML'=>$go_back_text,
                                                        'id_key'=>'wbc_fp_oops_appointment_go_back',
                                                    ),
                                                    array(
                                                        'type'=>'a',
                                                        'href'=>$continue_buying,
                                                        'attr'=>array('type'=>'button'),
                                                        'class'=>'ui grey button single_add_to_cart_button alt',
                                                        'preHTML'=>$continue_buying_text,
                                                        'id_key'=>'wbc_fp_oops_appointment_continue_single',
                                                        
                                                    ),
                                                ),
                                            ),
                                            ((current_user_can('manage_options'))
                                                ?
                                                array(
                                                    //Manage the mapping section
                                                    array(
                                                        'type' => 'div',
                                                        'class' => 'ui row',
                                                        'attr' => array( 'style' => 'padding-bottom:0rem !important' ),
                                                        'child' => array(
                                                            array(
                                                                'type' => 'a',
                                                                'href' => admin_url('admin.php?page=eowbc-mapping'),
                                                                'child' => array(
                                                                    array(
                                                                        'type' => 'span',
                                                                        'class' => 'ui text primary',
                                                                        'preHTML' => $mapping_text,
                                                                        'id_key'=>'wbc_fp_oops_appointment_mapping_text',
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                    /*ACTIVE_TODO_OC_START
                                                    here need to define how to manage %s and so on markers for the dynamic vars, like the dynamic var in below label -- to h & -- to s
                                                    ACTIVE_TODO_OC_END*/
                                                    array(
                                                        'type' => 'div',
                                                        'class' => 'ui row',
                                                        'preHTML' => 'Adequate mapping(s) needs to be added in the '.constant('EOWBC_NAME').' for Pair Builder to work properly.',
                                                        'attr' => array( 'style' => 'padding-bottom:0rem !important' ),
                                                        'id_key'=>'wbc_fp_oops_appointment_mapping_adequate_text',

                                                    ),
                                                )
                                                :
                                                array(
                                                    'type' => 'div',
                                                    'class' => 'ui row',
                                                    'attr' => array( 'style' => 'padding-bottom:0rem !important' ),
                                                    'child' => array(
                                                        array(
                                                            'type' => 'a',
                                                            'preHTML' => 'Report to admin to help them fix this problem.',
                                                            'href' => site_url('/?wbc_report=1'),
                                                            'id_key'=>'wbc_fp_oops_appointment_report_admin',

                                                        ),
                                                    ),
                                                )
                                            ),
                                            array(
                                                'type' => 'div',
                                                'class' => 'ui row',
                                                'attr' => array( 'style' => 'padding-bottom:5rem !important' ),
                                                'child' => array(
                                                    array(
                                                        'type' => 'span',
                                                        'class' => 'ui header',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    )
                );

                // ACTIVE_TODO temp. below implementation need to be moved to its standard place in the particular controller when we upgrade th wbc.                 
                $ui_definition = \eo\wbc\model\publics\SP_Model_Feed::instance()->ui_appearence_controls_definition(null,'oops_section',array());
                $ui_definition = \eo\wbc\model\publics\SP_Model_Feed::instance()->ui_configuration_controls_definition($ui_definition,'oops_section',array());
                $ui_definition = \eo\wbc\model\publics\SP_Model_Feed::instance()->ui_data_controls_definition($ui_definition, 'oops_section',array());

                \eo\wbc\model\SP_WBC_Ui_Builder::instance()->build($ui,'',true,null, $ui_definition);

                // NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
                $inline_script ="jQuery(document).ready(function($){ $(\".ui.button\").on(\"click\",function(){ window.location.href=$(this).attr(\"href\"); }); });";
                wbc()->load->add_inline_script('', $inline_script, 'common');

            }, 9 );
        }
    }
        
    public function eo_wbc_prev_url(){
        $site_ = site_url();
        if($this->eo_wbc_get_category()==$this->first_category_slug/*get_option('eo_wbc_first_slug')*/){
            $prev_cat=$this->second_category_slug/*get_option('eo_wbc_second_slug')*/;
        } elseif ($this->eo_wbc_get_category()==$this->second_category_slug/*get_option('eo_wbc_second_slug')*/) {
            $prev_cat=$this->first_category_slug/*get_option('eo_wbc_first_slug')*/;
        } else {
            return $site_;
        }
        $category_base = wbc()->wc->wc_permalink('category_base');
        return $site_."/{$category_base}/{$prev_cat}/?EO_WBC=1&BEGIN={$prev_cat}&STEP=1&FIRST=&SECOND=";
    }
    public function eo_wbc_product_url($url){
        if(empty(wbc()->sanitize->get('EO_WBC'))){
            return $url;
        }

        $external_url = /*$url.'?'.*/wbc()->common->http_query(
            array(
                'EO_WBC'=>1,
                'BEGIN'=>wbc()->sanitize->get('BEGIN'),
                'STEP'=>wbc()->sanitize->get('STEP'),
                'FIRST'=>(
                    $this->eo_wbc_get_category()==$this->first_category_slug/*get_option('eo_wbc_first_slug')*/ 
                            ?
                        ''
                            :
                        (
                            !empty(wbc()->sanitize->get('FIRST'))
                                ? 
                            wbc()->sanitize->get('FIRST')
                                :
                            ''
                        )
                    ),
                'SECOND'=>(
                    $this->eo_wbc_get_category()==$this->second_category_slug/*get_option('eo_wbc_second_slug')*/
                            ?
                        ''
                            :
                        (
                            !empty(wbc()->sanitize->get('SECOND'))
                                ?
                            wbc()->sanitize->get('SECOND')
                                :
                            ''
                        )
                    )
            )
        );

        if(!empty(wbc()->sanitize->get('__mapped_attribute'))) {
            
            $external_url = $external_url."&__mapped_attribute=".wbc()->sanitize->get('__mapped_attribute');            
        }
        
        if(strpos($url,'?')!==false) {
            return $url."&".$external_url;
        } else {
            return $url.'?'.$external_url;
        }
    }

    public function eo_wbc_id_2_slug($id){
        return wbc()->wc->get_term_by('id',$id,'product_cat')->slug;
    }
    
    /**
     * Function to find current page's product super category
     * @param null
     * @return string
     */
    public function eo_wbc_get_category()
    {   
        
        if(empty($this->first_category_slug)) {
            $this->first_category_slug = wbc()->options->get_option('configuration','first_slug');
            $first_category_object = get_term_by('slug',$this->first_category_slug,'product_cat');
            if(!empty($first_category_object) and !is_wp_error($first_category_object)) {
                $this->first_category_slug = $first_category_object->slug;
            }
        }


        if(empty($this->second_category_slug)) {
            $this->second_category_slug = wbc()->options->get_option('configuration','second_slug');
            $second_category_object = get_term_by('slug',$this->second_category_slug,'product_cat');
            if(!empty($second_category_object) and !is_wp_error($second_category_object)) {
                $this->second_category_slug = $second_category_object->slug;
            }
        }

        if( !($this->is_shop_cat_filter && is_shop())/*when the is_shop_cat_filter flag is on and it is shop page then it generates warnings on below statement so excluded that as category is unnecessary by any means in that case.*/ ) {
            return wbc()->common->get_category('category',null,array($this->first_category_slug,$this->second_category_slug));
        }
        else {
            return null;
        }
        global $wp_query;        
        
        //get list of slug which are ancestors of current page item's category
        $term_slug=array_map(array('self',"eo_wbc_id_2_slug"),get_ancestors($wp_query->get_queried_object()->term_id, 'product_cat'));


        //append current page's slug so that create complete list of terms including current term even if it is parent.
        $term_slug[]=$wp_query->get_queried_object()->slug;

        if(in_array($this->first_category_slug/*get_option('eo_wbc_first_slug')*/,$term_slug))
        {
            return $this->first_category_slug/*get_option('eo_wbc_first_slug')*/;
        }
        elseif(in_array($this->second_category_slug/*get_option('eo_wbc_second_slug')*/,$term_slug))
        {
            return $this->second_category_slug/*get_option('eo_wbc_second_slug')*/;
        } else{
            return $wp_query->get_queried_object()->slug;            
        }
    }
}