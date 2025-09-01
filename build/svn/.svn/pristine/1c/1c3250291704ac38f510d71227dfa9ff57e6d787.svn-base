<?php
namespace eo\wbc\controllers\publics\pages;
defined( 'ABSPATH' ) || exit;

class Product {

    private static $_instance = null;

    public static function instance() {
        if ( ! isset( self::$_instance ) ) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    private function __construct() {        
    }

    public function init() {
        //die();
        $this->att_link =array();

        if (isset($_GET['EO_WBC'])) {
            $this->eo_wbc_render(); //Render View and Routings
            $this->eo_wbc_config();            //Disable 'Add to Cart Button' and Set 'Sold Individually'
            $this->eo_wbc_add_breadcrumb();    //Add Breadcrumb
                        
        // } elseif (get_option('eo_wbc_pair_status',false)=='1') {
        } elseif (wbc()->options->get_option('configuration','enable_make_pair',false)=='1') {
            $this->eo_wbc_make_pair();
        }  
        do_action('wbc_pre_product_page');        
        $this->specification_view();
        $this->product_options_view();        
        do_action('wbc_post_product_page');         
    }    

    public function specification_view() {
        $bonus_features = array_filter(unserialize(wbc()->options->get_option('setting_status_setting_status_setting','bonus_features',serialize(array()))));

        if( ( !isset($_GET['EO_WBC']) and !empty($bonus_features['spec_view_item_page']) ) /*(!isset($_GET['EO_WBC']) and wbc()->options->get_option('tiny_features','specification_view_status',false) and wbc()->options->get_option('tiny_features','specification_view_default_status',false))*/ or ( isset($_GET['EO_WBC']) and wbc()->options->get_option('appearance_product_page','show_spec_view_in_pair_builder','1') ) ){

            add_action('woocommerce_after_single_product_summary',function(){
                wbc()->load->template('publics/features/specification_view');            
            });
            remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
        }
    }

    public function product_options_view() {

        $bonus_features = array_filter(unserialize(wbc()->options->get_option('setting_status_setting_status_setting','bonus_features',serialize(array()))));

        if( ( !isset($_GET['EO_WBC']) and !empty($bonus_features['opts_uis_item_page']) )/*(!isset($_GET['EO_WBC']) and wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_status',false))*/ or ( isset($_GET['EO_WBC']) and wbc()->options->get_option('appearance_product_page','show_options_ui_in_pair_builder',false) ) ){

            \eo\wbc\controllers\publics\Options::instance()->run();        
        }
    }
    
    //It's just temporary fix so we need strong model to handle this changes.
    public function eo_wbc_make_pair_route()
    {

        global $post;
        $url='';

        $category=$this->eo_wbc_get_category();
        $url=get_permalink($post->ID);

        $get_link = '';
        // if ($category==get_option('eo_wbc_first_slug')) {
        if ($category==wbc()->options->get_option('configuration','first_slug')) {
                            
            $get_link = wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>sanitize_text_field($category),'STEP'=>1,'FIRST'=>$post->ID,'SECOND'=>'','REDIRECT'=>1));
        // } elseif ($category==get_option('eo_wbc_second_slug')) {
        } elseif ($category==wbc()->options->get_option('configuration','second_slug')) {
            
            $get_link = wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>sanitize_text_field($category),'STEP'=>1,'FIRST'=>'','SECOND'=>$post->ID,'REDIRECT'=>1));
        } 

        if(strpos($url,'?') ===false ) {
            $url = $url."?".$get_link;
        } else {
            $url = $url."&".$get_link;
        }
        
        return $url;
    }
    //Show make pair button to only those are available for pairing as per mapping.
    public function eo_wbc_make_pair()
    {        
        $url=$this->eo_wbc_category_link();
        $category=$this->eo_wbc_get_category();

        if(
            !empty($url) 
            && !empty($category) 
            && (
                   // get_option('eo_wbc_first_slug')==$category 
                   wbc()->options->get_option('configuration','first_slug')==$category 
                // || get_option('eo_wbc_second_slug')==$category
                || wbc()->options->get_option('configuration','second_slug')==$category
            )
        ){
            //Registering Scripts : JavaScript
            add_action( 'wp_enqueue_scripts',function(){

                global $post;
                // wp_register_script(
                //     'eo_wbc_add_to_cart_js',
                //     plugins_url(
                //         'asset/js/publics/eo_wbc_single_add_to_cart.js'
                //         // ,
                //         // __FILE__
                //     ),
                //     array('jquery')
                // );
                wbc()->load->asset('js','publics/eo_wbc_single_add_to_cart',array('jquery'));
                
                // wp_localize_script(
                //     'eo_wbc_add_to_cart_js',
                //     'eo_wbc_object',
                //     array('url'=>$this->eo_wbc_make_pair_route())
                // );            
                wbc()->load->asset('localize','publics/eo_wbc_single_add_to_cart',array( 'eo_wbc_object' => array('url'=>$this->eo_wbc_make_pair_route())));

                // wp_enqueue_script('eo_wbc_add_to_cart_js');
            });

            global $post;            
            $product = wbc()->wc->eo_wbc_get_product($post->ID);
               
            if($product->is_in_stock()){

                add_action('woocommerce_after_add_to_cart_button',function(){                
                    // echo "<button href='#' id='eo_wbc_add_to_cart' class='single_add_to_cart_button button alt make_pair btn btn-default'>".get_option('eo_wbc_pair_text',__('Add to pair','woo-bundle-choice'))."</button>";
                    echo "<button href='#' id='eo_wbc_add_to_cart' class='single_add_to_cart_button button alt make_pair btn btn-default'>".wbc()->options->get_option('configuration','label_make_pair',__('Add to pair','woo-bundle-choice'))."</button>";
                });
            }
            //Add css to the head
            add_Action('wp_head',function(){
                ?>
                    <style>
                        
                        @media only screen and (max-width: 678px){
                            .make_pair{
                                margin: auto !important;
                            }
                        }

                        .make_pair{
                            margin-left: 5px !important;
                        }
                    </style>
                <?php
            });
            //Add Js to the footer.
            add_action('wp_footer',function(){
                ?>
                <!-- WBC{ BUNDLOICE (formerly Woo Choice Plugin) wiget STARTS. } -->
                <script>
                    jQuery(document).ready(function(){
                        jQuery('form.cart').prepend("<input type='hidden' name='eo_wbc_target' value='<?php echo $this->eo_wbc_get_category(); ?>'/><input type='hidden' name='eo_wbc_product_id' value='<?php global $post; echo $post->ID; ?>'/>");
                    });
                </script>
                <!-- WBC{ BUNDLOICE (formerly Woo Choice Plugin) wiget ENDS. } -->
                <?php
            });
        }       
    }

    public function eo_wbc_config()
    {

        //Remove add to cart button
        remove_action( 
            'woocommerce_after_shop_loop_item',
            'woocommerce_template_loop_add_to_cart'
        );
        add_filter('woocommerce_product_single_add_to_cart_text', function() {
            $category = $this->eo_wbc_get_category();
            // if($category == get_option('eo_wbc_first_slug')){
            if($category == wbc()->options->get_option('configuration','first_slug')){
                // return get_option('eo_wbc_add_to_cart_text_first', __('Continue', 'woo-bundle-choice'));
                return wbc()->options->get_option('appearance_product_page','fc_atc_button_text',__('Continue', 'woo-bundle-choice'));
            // } elseif( $category == get_option('eo_wbc_second_slug') ) {
            } elseif( $category == wbc()->options->get_option('configuration','second_slug')) {
                // return get_option('eo_wbc_add_to_cart_text_second', __('Continue', 'woo-bundle-choice'));
                return wbc()->options->get_option('appearance_product_page','sc_atc_button_text',__('Continue', 'woo-bundle-choice'));
            }            
        });
    }

    public function eo_wbc_add_breadcrumb()
    {   
        //Adding Breadcrumb
        add_action( 'woocommerce_before_single_product',function(){
            if(!empty($_GET) && !empty(wbc()->sanitize->get('STEP')) && !empty(wbc()->sanitize->get('BEGIN'))) {
                wbc()->load->model('publics/component/eowbc_breadcrumb'); 
                echo \eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_add_breadcrumb(
                                                wbc()->sanitize->get('STEP'),
                                                wbc()->sanitize->get('BEGIN')
                                            ).'<br/><br/>';
            }
        }, 15 );
    }
    
    public function eo_wbc_render()
    {   
        $redirect_url = $this->eo_wbc_product_route();
        wbc()->theme->load('css','product');
        wbc()->theme->load('js','product');
        /*Hide sidebar and make content area full width.*/
        if(apply_filters('eowbc_filter_sidebars_widgets',true)){
            add_filter( 'sidebars_widgets',function($sidebars_widgets ) {
                return array( false );
            });    
        }
        
        ob_start();        
        ?>
        <style type="text/css">
            .woocommerce .content-area ,#content,#primary,#main,.content,.primary,.main{
                  width: 100% !important;
             }
             .woocommerce .widget-area {
                  display: none !important;
             }
        </style>
        <?php
        echo ob_get_clean();
        
        //Registering Scripts : JavaScript
        add_action( 'wp_enqueue_scripts',function() use(&$redirect_url){

            global $post;
            // wp_register_script(
            //     'eo_wbc_add_to_cart_js',
            //     plugins_url(
            //         'asset/js/publics/eo_wbc_single_add_to_cart.js'
            //         // ,
            //         // __FILE__
            //     ),
            //     array('jquery')
            // );
            wbc()->load->asset('js','publics/eo_wbc_single_add_to_cart',array('jquery'));
            
            // wp_localize_script(
            //     'eo_wbc_add_to_cart_js',
            //     'eo_wbc_object',
            //     array('url'=>$redirect_url)
            // );            
            wbc()->load->asset('localize','publics/eo_wbc_single_add_to_cart',array( 'eo_wbc_object' => array('url'=>$redirect_url)));

            // wp_enqueue_script('eo_wbc_add_to_cart_js');
        });
          
        //Adding own ADD_TO_CART_BUTTON
        add_action('wp_footer',function(){               
            echo "<style>.double-gutter .tmb{ width: 50%;display: inline-flex; }</style>";         
            $category = $this->eo_wbc_get_category();
            $btn_text = '';
            // if($category == get_option('eo_wbc_first_slug')){
            if($category == wbc()->options->get_option('configuration','first_slug')){
                // $btn_text = get_option('eo_wbc_add_to_cart_text_first', __('Continue', 'woo-bundle-choice'));
                $btn_text = wbc()->options->get_option('appearance_product_page','fc_atc_button_text',__('Continue', 'woo-bundle-choice'));
            // } elseif( $category == get_option('eo_wbc_second_slug') ) {
            } elseif( $category == wbc()->options->get_option('configuration','second_slug') ) {
                // $btn_text = get_option('eo_wbc_add_to_cart_text_second', __('Continue', 'woo-bundle-choice'));
                $btn_text = wbc()->options->get_option('appearance_product_page','sc_atc_button_text',__('Continue', 'woo-bundle-choice'));
            }

            if(empty($btn_text)){
                $btn_text = 'Continue';
            }
            
            global $post;            
            $product = wbc()->wc->eo_wbc_get_product($post->ID);
            if(!empty($product) and !is_wp_error($product) and  $product->is_in_stock()) {

            ?>
            <!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) -->
            <script type="text/javascript">
                jQuery(".single_add_to_cart_button.button.alt").ready(function(){
                    jQuery('form.cart').prepend("<input type='hidden' name='eo_wbc_target' value='<?php echo $this->eo_wbc_get_category(); ?>'/><input type='hidden' name='eo_wbc_product_id' value='<?php global $post; echo $post->ID; ?>'/>");
                    
                    <?php if(!empty(wbc()->options->get_option('appearance_product_page','product_page_add_to_basket',''))) :?>
                        
                        window.wbc_atb_submin_form = function(){
                            jQuery('form.cart').attr('action',document.location.href);
                            jQuery('form.cart').submit();
                        }

                        jQuery(".single_add_to_cart_button.alt:not(.disabled):eq(0)").replaceWith('<div class=\"ui buttons\">'+
                                '<div class=\"ui button\" href=\"#\" id=\"eo_wbc_add_to_cart\"><?php echo $btn_text; ?></div>'+
                                    '<div class=\"ui floating dropdown icon button\" style=\"width: fit-content;min-width: unset; max-width: unset;\">'+
                                        '<i class=\"dropdown icon\"></i>'+
                                        '<div class=\"menu\">'+
                                            '<div class=\"item\" onClick=\"window.wbc_atb_submin_form();\"><?php echo wbc()->options->get_option('appearance_product_page','product_page_add_to_basket','');?></div>'+                                    
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>');
                        jQuery(".dropdown").dropdown();

                    <?php else: ?>

                        jQuery(".single_add_to_cart_button.button.alt:not(.disabled):eq(0)").replaceWith(
                         "<button href='#' id='eo_wbc_add_to_cart' class='single_add_to_cart_button button alt'>"
                         +"<?php echo $btn_text; ?>"
                         +"</button>"
                        );
                    <?php endif; ?>
                    });
            </script>
            
            <?php 
            }
            
            global $post;            
            $product = wbc()->wc->eo_wbc_get_product($post->ID);
            if( $product->is_type('variable') and !empty($product->get_default_attributes())) {
                    
                if(
                    (wbc()->options->get_option('tiny_features','product_page_hide_first_variation_form',false) and $category == wbc()->options->get_option('configuration','first_slug')) or wbc()->options->get_option('tiny_features','product_page_hide_second_variation_form',false) and $category == wbc()->options->get_option('configuration','second_slug')
                ): ?>
                <style>
                    .variations_form table.variations{
                        display:none !important;
                    }
                </style>
                <?php endif ?>
               <?php    
            }
            
       });
    }
    
    public function eo_wbc_product_route($return_link = false){

        global $post;
        $url=null;        
        $category=$this->eo_wbc_get_category();    
        $remove_index = wbc()->options->get_option('setting_status_advanced_config','remove_index_php');
        if(!empty($remove_index)){
            $remove_index = unserialize($remove_index);
            if(!empty($remove_index['remove_index_php'])){
                $remove_index = true;
            } else {
                $remove_index = false;
            }
        } else {
            $remove_index = false;
        }

        if(wbc()->sanitize->get('STEP')==1) {   

            if(!empty(wbc()->sanitize->get('CART')) && !empty(wbc()->sanitize->get('REDIRECT')) && wbc()->sanitize->get('REDIRECT')==1) {
                //if redirec signal is set and cart data are ready then
                //relocate user to target path.                
                $category_base = wbc()->wc->wc_permalink('category_base');
                // if($category==get_option('eo_wbc_first_slug')) {

                $site_url = get_bloginfo('url');
                $site_url_get = '';
                if(strpos($site_url,'?')!==false) {
                    $_site_url_ = explode("?",$site_url);
                    if(!empty($_site_url_) and is_array($_site_url_)) {
                        if(!empty($_site_url_[0])) {
                            $site_url = $_site_url_[0];
                        }

                        if(!empty($_site_url_[1])) {
                            $site_url_get = '&'.$_site_url_[1];
                        }
                    }
                }

                if($category==wbc()->options->get_option('configuration','first_slug')) {

                    $category_link=$this->eo_wbc_category_link();

                    $url=$site_url.($remove_index?'':'/index.php')."/{$category_base}/".$category_link.
                    wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>2,'FIRST'=>$post->ID,'SECOND'=>wbc()->sanitize->get('SECOND'),'CART'=>wbc()->sanitize->get('CART'),'ATT_LINK'=>implode(' ',$this->att_link),'CAT_LINK'=>substr($category_link,0,strpos($category_link,'/')))).$site_url_get;

                // } elseif($category==get_option('eo_wbc_second_slug')) {
                } elseif($category==wbc()->options->get_option('configuration','second_slug')) {

                    $category_link=$this->eo_wbc_category_link();
                    $url=$site_url.($remove_index?'':'/index.php')."/{$category_base}/".$category_link
                    .wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>2,'FIRST'=>wbc()->sanitize->get('FIRST'),'SECOND'=>$post->ID,'CART'=>wbc()->sanitize->get('CART'),'ATT_LINK'=>implode(' ',$this->att_link),'CAT_LINK'=>substr($category_link,0,strpos($category_link,'/')))).$site_url_get;
                } 
                if($return_link) {
                    return $url;
                }
                
                return header("Location: {$url}");
                wp_die();
                //wp_safe_redirect($url ,301 );               
            } else {
                
                $url=get_permalink($post->ID);
                $get_link = '';
                // if($category==get_option('eo_wbc_first_slug')) {
                if($category==wbc()->options->get_option('configuration','first_slug')) {

                    $get_link=wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>1,'FIRST'=>$post->ID,'SECOND'=>(empty(wbc()->sanitize->get('SECOND'))?'':wbc()->sanitize->get('SECOND')),'REDIRECT'=>1));

                // } elseif($category==get_option('eo_wbc_second_slug')) {
                } elseif($category==wbc()->options->get_option('configuration','second_slug')) {

                    $get_link=wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>1,'FIRST'=>(empty(wbc()->sanitize->get('FIRST'))?'':wbc()->sanitize->get('FIRST')),'SECOND'=>$post->ID,'REDIRECT'=>1));
                } else {
                    // well due to some reason could not determine category properly so working based on begin offset recived via _GET.
                    $begin = wbc()->sanitize->get('BEGIN');                    
                    // if($begin==get_option('eo_wbc_first_slug')){
                    if($begin==wbc()->options->get_option('configuration','first_slug')){

                        $get_link=wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>1,'FIRST'=>$post->ID,'SECOND'=>(empty(wbc()->sanitize->get('SECOND'))?'':wbc()->sanitize->get('SECOND')),'REDIRECT'=>1));

                    // } elseif($begin==get_option('eo_wbc_second_slug')) {
                    } elseif($begin==wbc()->options->get_option('configuration','second_slug')) {

                        $get_link=wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>1,'FIRST'=>(empty(wbc()->sanitize->get('FIRST'))?'':wbc()->sanitize->get('FIRST')),'SECOND'=>$post->ID,'REDIRECT'=>1));
                    }                    
                }

                if(strpos($url,'?')===false){
                    $url = $url.'?'.$get_link;
                } else {
                    $url = $url.'&'.$get_link;
                }                
            }            
        }
        
        elseif(wbc()->sanitize->get('STEP')==2) {   
            
            $review_page_url = '';

            $review_page = get_page_by_path('eo-wbc-product-review');
            
            if(empty($review_page) or is_wp_error($review_page)){
                $review_page_url = home_url('/eo-wbc-product-review/');
            } else {
                $review_page_url = get_permalink($review_page);
            }           
        
            if(wbc()->sanitize->get('FIRST')==='' OR $category==wbc()->options->get_option('configuration','first_slug'))
            {
                $url=wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>3,'FIRST'=>$post->ID,'SECOND'=>wbc()->sanitize->get('SECOND')));
            }
            elseif (wbc()->sanitize->get('SECOND')==='' OR $category==wbc()->options->get_option('configuration','second_slug'))
            {
                $url=wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>3,'FIRST'=>wbc()->sanitize->get('FIRST'),'SECOND'=>$post->ID));
            }
            else
            {
                $url='';
            }

            if(!empty($url) and !empty($review_page_url)) {
                if(strpos($review_page_url,'?')===false){
                    $url = $review_page_url.'?'.$url;
                } else {
                    $url = $review_page_url.'&'.$url;
                }                
            }

        }  
        
        return $url;
    }
    
    /**
     * @return string
     *  string of mapped category to current category item
     */
    public function eo_wbc_category_link($variable_status=FALSE){        
        global $post;

        $variation=FALSE;//status if product is varaible in nature.
        $cart=NULL;//storage variable for cart data if redirected from 'Add to cart' action.
        if(isset($_GET['CART']))
        {
            $cart=str_replace("\\",'',base64_decode(wbc()->sanitize->get('CART'),TRUE));
            $cart=(array)json_decode($cart);
                        
            if(!empty($cart['variation_id']))
            {
                $variation=$cart['variation_id'];
            }    
        }                

        // Get all category and attributes.        
        $non_var_terms = array();
        $product_terms = wc_get_product($post->ID)->get_attributes();

        if(!is_wp_error( $product_terms )  and !empty($product_terms)) {
            foreach ($product_terms as $product_taxonomy => $product_term) {
                if($product_term['variation']===false and !empty($product_term['options']) and is_array($product_term['options'])) {

                    $non_var_terms = array_merge($non_var_terms,$product_term['options']);    
                }
            }
        }
                
        $terms=wp_get_post_terms($post->ID,get_taxonomies());        
        $maps = apply_filters('eowbc_product_maps',wp_cache_get( 'cache_maps', 'eo_wbc'));

        $is_cleanup = apply_filters( 'eowbc_product_maps_is_reset_cleanup',1);    

        if($is_cleanup and !empty($maps) and is_array($maps)) {
            
            $new_maps = array();            
            foreach ($maps as $key => $map) {
                if(empty($map['save_builder'])){
                    $new_maps[$key] = $map;
                }                
            }            
            $maps = $new_maps;
        }

        $product_in = array();        
        // Gathering all terms for the product that is added to the cart.
        if(!is_wp_error($terms) and !empty($terms) and is_array($terms) and is_array($maps) ){
            if($variation){
                
                $variation_attributes = wc_get_product($variation)->get_attributes();                
                $variation_terms = array();                
                array_walk($terms,function($term,$index) use(&$variation_attributes,&$variation_terms){
                    if( $term->taxonomy=='product_cat' or (array_key_exists($term->taxonomy, $variation_attributes) and $variation_attributes[$term->taxonomy] == $term->slug) ) {
                        array_push($variation_terms,$term->term_taxonomy_id);
                    }
                });    
                $terms = $variation_terms;
                if (!empty($non_var_terms) and !is_wp_error($non_var_terms)) {
                    $terms = array_merge($terms,$non_var_terms);
                }                                
            } else {
                array_walk($terms,function($term,$index) use(&$terms){
                    $terms[$index] = $term->term_taxonomy_id;                    
                });   
            } 

            // Gather all target of the maps           
            $map_column = 0;
            // if($this->eo_wbc_get_category()==get_option('eo_wbc_first_slug')) { $map_column = 0; }
            if($this->eo_wbc_get_category()==wbc()->options->get_option('configuration','first_slug')) { $map_column = 0; }
            // elseif($this->eo_wbc_get_category()==get_option('eo_wbc_second_slug')) { $map_column = 1; }            
            elseif($this->eo_wbc_get_category()==wbc()->options->get_option('configuration','second_slug')) { $map_column = 1; }            
            
            $product_code = "pid_{$post->ID}";
                        
            if(!empty($terms) and is_array($terms)){
                $terms =array_filter(array_map(function($map) use(&$terms,&$map_column,&$product_code,&$product_in){
                    
                    if(array_intersect($terms,$map[$map_column])){
                        if($map_column == 0) return $map[1];
                        else return $map[0];
                    } elseif(in_array( $product_code, $map[$map_column] )) {                    
                        if($map_column == 0){
                            $product_in = array_merge( $product_in, $map[1] );
                        } else {
                            $product_in = array_merge( $product_in, $map[0] );
                        }
                        return false;
                    } else {
                        return false;
                    }                
                },$maps));

            }
        }         

        $category=array();//array to hold category slugs
        $taxonomy=array();//array to hold taxonomy slugs
        if(!is_wp_error($terms) and !empty($terms) and is_array($terms)) {
            array_walk($terms,function($term) use(&$category,&$taxonomy){
                $_term_ = null;
                if(is_array($term)) {
                    foreach ($term as $_term_) {
                        $_term_ = wbc()->wc->get_term_by('term_taxonomy_id', $_term_);
                        if(!is_wp_error($_term_) and !empty($_term_)) {
                            $_taxonomy_ = $_term_->taxonomy;                            
                            if($_taxonomy_==='product_cat') {

                                $category[]= $_term_->slug;

                            } elseif( substr($_taxonomy_,0,3) =='pa_' ) {

                                $taxonomy[substr($_term_->taxonomy,3)][] = $_term_->slug;
                            }
                        }
                    }
                } else {
                    $_term_ = wbc()->wc->get_term_by('term_taxonomy_id', $_term_);

                    if(!is_wp_error($_term_) and !empty($_term_)) {
                        $_taxonomy_ = $_term_->taxonomy;                        
                        if($_taxonomy_==='product_cat') {

                            $category[]= $_term_->slug;

                        } elseif( substr($_taxonomy_,0,3) =='pa_' ) {
                            
                            $taxonomy[substr($_term_->taxonomy,3)][] = $_term_->slug;
                        }
                    }
                }
            });
        }
        
        $link='';        
        //if category maping is available then make url filter to category
        //else add default category to the link.
        if(is_array($category) && !empty($category)) {
            // $link=implode( (get_option('eo_wbc_map_cat_pref','and')==='and'?'+':',') , $category );                  
            $link=implode( (wbc()->options->get_option('mapping_prod_mapping_pref','prod_mapping_pref_category','and')==='and'?'+':',') , $category );                  
        }
        else
        {
            // $link.=($this->eo_wbc_get_category()==get_option('eo_wbc_first_slug'))
            $link.=($this->eo_wbc_get_category()==wbc()->options->get_option('configuration','first_slug'))
                        ?
                    // get_option('eo_wbc_second_slug')
                    wbc()->options->get_option('configuration','second_slug')
                        :
                    // get_option('eo_wbc_first_slug');                    
                    wbc()->options->get_option('configuration','first_slug');                    
        }

        $link.="/?";           
        if(is_array($taxonomy) && !empty($taxonomy)){            
            
            $filter_query=array();
            // $attr_pref=get_option('eo_wbc_map_attr_pref','or');
            $attr_pref=wbc()->options->get_option('mapping_prod_mapping_pref','prod_mapping_pref_attribute','or');
            $glue=($attr_pref === 'or' ? ',' : '+' );           

            foreach ($taxonomy as  $_tax => $_tems) {
                $filter_query["query_type_{$_tax}"] = $attr_pref;
                $filter_query["filter_{$_tax}"] = implode($glue,array_unique(array_filter($_tems)));
            }
            $link.=http_build_query($filter_query).'&';            
        }    

        if(!empty($product_in) && is_array($product_in)) {
            $product_in = array_filter($product_in);
            $product_in = array_map(function($product_in){ return substr($product_in,4); },$product_in);

            $link.='products_in='.implode(',',$product_in).'&';
        }             
        return $link;
    }

    /**
    *
    */
    public function eo_wbc_sub_categories($slug) {        
        
        $map_base = get_categories(array(
            'hierarchical' => 1,
            'show_option_none' => '',
            'hide_empty' => 0,
            'parent' => !empty(wbc()->wc->get_term_by('slug',$slug,'product_cat')) ?wbc()->wc->get_term_by('slug',$slug,'product_cat')->term_id : '',
            'taxonomy' => 'product_cat'
        ));
        
        $category=array();
        if(!empty($map_base)){
            foreach ($map_base as $base) {            
                $category=array_merge(array($base->slug),$this->eo_wbc_sub_categories($base->slug));            
            }    
        }        
        return $category;
    } 

    /**
     * @method Returns Current-Product's top level catgory
     * @return string
     */    
    public function eo_wbc_get_category() {

        global $post;
        return wbc()->common->get_category('product',$post->ID,array(wbc()->options->get_option('configuration','first_slug'),wbc()->options->get_option('configuration','second_slug')));

        global $post;
        $__category = false;

        $terms=wc_get_product_terms( $post->ID, 'product_cat', array( 'fields' => 'slugs' ));
        $first_cat= wbc()->options->get_option('configuration','first_slug')/*get_option('eo_wbc_first_slug')*/;
        $second_cat= wbc()->options->get_option('configuration','second_slug')/*get_option('eo_wbc_second_slug')*/;

        $first_cat_list=array();
        $second_cat_list=array();
        
        $first_cat_list=array_merge(array($first_cat),$this->eo_wbc_sub_categories($first_cat));
        
        $second_cat_list=array_merge(array($second_cat),$this->eo_wbc_sub_categories($second_cat));        

        
        if(@count(array_intersect($terms,$first_cat_list))>0)
        {      
            if(!empty(wbc()->sanitize->get('BEGIN')) && wbc()->sanitize->get('BEGIN')==$first_cat){

                if(!empty(wbc()->sanitize->get('STEP')) && wbc()->sanitize->get('STEP')==1){

                    $__category = $first_cat;

                } elseif(!empty(wbc()->sanitize->get('STEP')) && wbc()->sanitize->get('STEP')==2){

                    $__category = $second_cat;

                } else{

                    $__category = FALSE;
                }

            } elseif(!empty(wbc()->sanitize->get('BEGIN')) && wbc()->sanitize->get('BEGIN')==$second_cat) {

                if(!empty(wbc()->sanitize->get('STEP')) && wbc()->sanitize->get('STEP')==1){

                    $__category = $second_cat;

                } elseif(!empty(wbc()->sanitize->get('STEP')) && wbc()->sanitize->get('STEP')==2){

                    $__category = $first_cat;
                } else{

                    $__category = FALSE;
                }               
            }     

        } elseif(count(array_intersect($terms,$second_cat_list))>0) {

            if(!empty(wbc()->sanitize->get('BEGIN')) && wbc()->sanitize->get('BEGIN')==$first_cat){

                if(!empty(wbc()->sanitize->get('STEP')) && wbc()->sanitize->get('STEP')==1){

                    $__category = $first_cat;

                } elseif(!empty(wbc()->sanitize->get('STEP')) && wbc()->sanitize->get('STEP')==2){

                    $__category = $second_cat;

                } else{

                    $__category = FALSE;
                }

            } elseif(!empty(wbc()->sanitize->get('BEGIN')) && wbc()->sanitize->get('BEGIN')==$second_cat) {

                if(!empty(wbc()->sanitize->get('STEP')) && wbc()->sanitize->get('STEP')==1){

                    $__category = $second_cat;

                } elseif(!empty(wbc()->sanitize->get('STEP')) && wbc()->sanitize->get('STEP')==2){

                    $__category = $first_cat;
                } else{

                    $__category = FALSE;
                }               
            }
        }

        //if(empty($__category) or ($__categozzry!=get_option('eo_wbc_first_slug') and $__category!=get_option('eo_wbc_second_slug'))) {
        if(empty($__category) or ($__category!=wbc()->options->get_option('configuration','first_slug') and $__category!=wbc()->options->get_option('configuration','second_slug'))) {
            if(!empty(wbc()->sanitize->get('BEGIN')) and !empty(wbc()->sanitize->get('STEP'))) {
                
                $__begin = wbc()->sanitize->get('BEGIN');
                $__step = wbc()->sanitize->get('STEP');

                //if($__begin == get_option('eo_wbc_first_slug')) {
                if($__begin == wbc()->options->get_option('configuration','first_slug')) {
                    
                    if ($__step == 1) {
                        // $__category = get_option('eo_wbc_first_slug');
                        $__category = wbc()->options->get_option('configuration','first_slug');
                    } elseif($__step == 2) {
                        // $__category = get_option('eo_wbc_second_slug');
                        $__category = wbc()->options->get_option('configuration','second_slug');
                    }

                // } elseif( $__begin == get_option('eo_wbc_second_slug')) {
                } elseif( $__begin == wbc()->options->get_option('configuration','second_slug')) {
                    
                    if ($__step == 1) {
                        // $__category = get_option('eo_wbc_second_slug');
                        $__category = wbc()->options->get_option('configuration','second_slug');
                    } elseif($__step == 2) {
                        // $__category = get_option('eo_wbc_first_slug');
                        $__category = wbc()->options->get_option('configuration','first_slug');
                    }
                }
            }
        }

        return $__category;
    }
}
