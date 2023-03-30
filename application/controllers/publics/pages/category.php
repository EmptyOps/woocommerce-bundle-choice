<?php
namespace eo\wbc\controllers\publics\pages;
defined( 'ABSPATH' ) || exit;

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

    public function init() {

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
            
                /*Hide the category Title*/
                add_filter( 'woocommerce_page_title','__return_false');

                /*Hide sidebar and make content area full width.*/
                if(apply_filters('eowbc_filter_sidebars_widgets',true)){
                    add_filter( 'sidebars_widgets',function($sidebars_widgets ) {
                        return array( false );
                    });
                }                
                /*End --Hide sidebar and make content area full width.*/

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
                        add_filter('woocommerce_product_add_to_cart_text',function($add_to_cart_text,$product){
                            return __('View','WooCommerce');
                        },10,2);
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

            add_action('woocommerce_before_shop_loop' /*'woocommerce_archive_description'*/,array($this,'add_filter_widget'),1);

        /*}
            */
        if( $this->is_shortcode_filter ) {
            \eo\wbc\model\publics\component\EOWBC_Filter_Widget::instance()->init(false,$this->filter_prefix,$this->is_shortcode_filter);
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
            
            wbc()->load->model('publics/component/eowbc_breadcrumb');       
            echo \eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_add_breadcrumb(wbc()->sanitize->get('STEP'),wbc()->sanitize->get('BEGIN')).'<br/><br/>';
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
                wbc()->load->asset('css','fomantic/semantic.min');
                wbc()->load->asset('js','fomantic/semantic.min');
            },100);

            add_action('wp_head',function(){
                ?>                
                    <style type="text/css">
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
                        .products .ui.grid>[class*="five wide"].column{
                            margin-left: 0 !important;
                        }
                    </style>                    
                <?php
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
                $html='<!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) --><br/><br/>';
                $html.='<div class="woocommerce ui grid centered">';
                    $html.='<div class="ui row" style="height:max-content;">';                    
                        $html.="<div class='ui grid centered'>";
                            $html.="<div class='ui row' style='padding-bottom:3rem !important'>";
                                $html.="<h1 style='font-size:10vw;color:#767676;'>Ooops!</h1>";
                            $html.="</div>";
                            $html.="<div class='ui row' style='padding-bottom:0px'>";
                                $html.='<span class="ui inverted text">' . __( 'No products were found matching your selection.', 'woocommerce' ) .'<span>';
                            $html.="</div>";    
                            $html.="<div class='ui row'  style='padding-bottom:3rem !important'>";   
                                // TODO here isn't it better if i's simple javascript back in history - hiren                         
                                $html.='<button href="'.$this->eo_wbc_prev_url().'" class="ui inverted secondary single_add_to_cart_button button alt">Go back</button>&nbsp;&nbsp;';
                                $html.='<button href="'.((empty(wbc()->sanitize->get('FIRST')) XOR empty(wbc()->sanitize->get('SECOND')))?strtok(get_permalink((empty(wbc()->sanitize->get('FIRST'))?wbc()->sanitize->get('SECOND'):wbc()->sanitize->get('FIRST'))),'?'):'').'" class="ui grey button single_add_to_cart_button alt">Continue buying single item</button>&nbsp;&nbsp;';
                            $html.="</div>";    
                                                        
                            if(current_user_can('manage_options')){
                                //Manage the mapping section
                                $html.="<div class='ui row' style='padding-bottom:0rem !important'>";
                                    $html.='<a href="'.admin_url('admin.php?page=eowbc-mapping').'"><span class="ui text primary">As admin of this site please create a product mapping to fix this problem.</span></a>';
                                $html.="</div>";    

                                $html.="<div class='ui row' style='padding-bottom:0rem !important'>";
                                    $html.='Adequate mapping(s) needs to be added in the '.constant('EOWBC_NAME').' for Pair Builder to work properly.';
                                $html.="</div>";                                                    
                            } else {                            
                                $html.="<div class='ui row' style='padding-bottom:0rem !important'>";
                                    $html.='<a href="'.site_url('/?wbc_report=1').'">Report to admin to help them fix this problem.</a>&nbsp;&nbsp;';
                                $html.="</div>";                                                    
                            }
                            
                            $html.="<div class='ui row' style='padding-bottom:5rem !important'>";    
                                $html.="<span class='ui header'></span>";                        
                            $html.="</div>";    
                        $html.="</div>";                
                    $html.='</div>';                                    
                $html.='</div><script> jQuery(document).ready(function($){ $(".ui.button").on("click",function(){ window.location.href=$(this).attr("href"); }); }); </script>';
                echo($html);            
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