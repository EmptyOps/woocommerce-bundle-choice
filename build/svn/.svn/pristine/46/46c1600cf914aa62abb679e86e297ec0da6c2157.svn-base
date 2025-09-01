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

        $this->page_category = $this->eo_wbc_get_category();

        ////////////
        //// Add to cart if its preview page from the second step
        if( !empty(wbc()->sanitize->get('FIRST')) and !empty(wbc()->sanitize->get('SECOND')) and !empty(wbc()->sanitize->get('EO_WBC')) and !empty(wbc()->sanitize->get('WBC_PREVIEW')) ) { 

            add_filter( 'woocommerce_is_sold_individually','__return_true', 10, 2 );


            add_action('woocommerce_before_add_to_cart_form',function(){
                
            }, 10, 1 );



            //if data available at _GET then add to out custom cart
            if(!empty(wbc()->sanitize->get('eo_wbc_add_to_cart_preview'))) {                
                $this->add2cart();
                $cart_url = wbc()->wc->eo_wbc_get_cart_url();
                
                do_action('sp_wbc_after_add2cart_redirect');
                if(strpos($cart_url,'?')!==false){
                    $cart_url_parts = explode('?', $cart_url);
                    $cart_url = explode('?', $cart_url)[0];
                    
                    if (!empty($cart_url_parts[1])) {
                        $url_params = false;
                        parse_str( $cart_url_parts[1],$url_params );
                        
                        if(!empty($url_params['lang'])) {
                            $cart_url.='?lang='.$url_params['lang'];
                        }
                    }
                }
                
                exit(wp_redirect($cart_url));
            }

            if(!empty(wbc()->sanitize->get('CART'))) {
                $this->add2session_cart();
            }

            //Add session set data to temporary iff the set data is not empty.
            if(wbc()->session->get('EO_WBC_SETS',FALSE)) {
                
                $_session_set=wbc()->session->get('EO_WBC_SETS',FALSE);
                if(!empty($_session_set['FIRST']) && !empty($_session_set['SECOND']) ){
                    wbc()->session->set('TMP_EO_WBC_SETS',wbc()->session->get('EO_WBC_SETS'));
                }
            }

            $this->init_safe_click();

            $this->render_preview();
        } else {

            //die();
            $this->att_link =array();

            if (isset($_GET['EO_WBC'])) {
                
                $this->init_safe_click();

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
    }

    public function init_safe_click() {
        add_action('woocommerce_after_add_to_cart_button',function(){
            ob_start();
            ?>
            <script type="text/javascript">

                document.querySelector('.single_add_to_cart_button:not(#eo_wbc_add_to_cart)').addEventListener("click",function(event) {                         
                         event.preventDefault();
                },false);

                let sp_add_to_cart_dots = 1
                let sp_add_to_cart_dots_interval = window.setInterval(function(){
                    
                    if(jQuery('#eo_wbc_add_to_cart,#eo_wbc_add_to_cart_preview').length>0) {                        
                        window.clearInterval(sp_add_to_cart_dots_interval);
                    } else {
                        if(sp_add_to_cart_dots>3) {
                            sp_add_to_cart_dots = 1;
                        } else {
                            sp_add_to_cart_dots = sp_add_to_cart_dots+1;
                        }
                        jQuery('.single_add_to_cart_button:not(#eo_wbc_add_to_cart,#eo_wbc_add_to_cart_preview)').text('.'.repeat(sp_add_to_cart_dots));
                    }
                },500);

                jQuery(".single_add_to_cart_button:not(#eo_wbc_add_to_cart)").off('click');
                jQuery(".single_add_to_cart_button:not(#eo_wbc_add_to_cart)").css('cursor','not-allowed !important');
                
                jQuery(".single_add_to_cart_button:not(#eo_wbc_add_to_cart)").on('click',function(e){
                    e.preventDefault();
                    e.stopPropagation();
                });
            </script> 
            <?php
            echo(ob_get_clean());
        });
    }

    public function render_preview() {

        // modification hooks to the product page ..
        $set=wbc()->session->get('TMP_EO_WBC_SETS',FALSE);            

        $first = false;
        $second = false;
        $first_parent = false;
        $second_parent = false;

        if(!empty($set)) {
            $first=wbc()->wc->eo_wbc_get_product((int)($set['FIRST'][2]?$set['FIRST'][2]:$set['FIRST'][0]));
            $first_parent=wbc()->wc->eo_wbc_get_product((int)($set['FIRST'][0]));

            $second=wbc()->wc->eo_wbc_get_product((int)($set['SECOND'][2]?$set['SECOND'][2]:$set['SECOND'][0]));
            $second_parent=wbc()->wc->eo_wbc_get_product((int)($set['SECOND'][0]));
        }

        //price
        
        add_filter( 'the_title',function($title, $id) use($first,$second,$first_parent,$second_parent){                        

            if(!empty($second) and !empty($first) and ($id === $second_parent->get_id()) ) {                
                //return $first->get_title()." <br/> ".$second->get_title();
                return "<span class='wcp_preview_first_product_title'>".$first->get_title()." - ".wc_price($first->get_price())."</span><br/><span class='wcp_preview_second_product_title'>".$second->get_title()." - ". wc_price($second->get_price()).'</span>';
            } else {
                return $title;
            }
        },20,2);

        add_filter('woocommerce_get_price_html',function($price,$product) use($first,$second,$first_parent,$second_parent){
            
            //var_dump($product->get_id(), $second->get_id(),$first->get_id());

            if(!empty($second) and !empty($first) and ($product->get_id() === $second_parent->get_id()) ) {
                return wc_price( $first->get_price() + $second->get_price() );
            } 
            return $price;
        },10,2);
        //remove options
        add_filter('woocommerce_product_single_add_to_cart_text', function() {
            return '...';
            //return __('Add This To Cart','woo-bundle-choice');
        });

        add_filter('woocommerce_get_script_data',function($data,$handle){
            if($handle == 'wc-add-to-cart-variation'){
                return false;
            }
            return $data;
        },10,2);
        
        add_action('wp_head',function(){
            wp_dequeue_script('wc-add-to-cart-variation');
            ?>
            <style> body .wcp_preview_first_product_title, body .wcp_preview_second_product_title{font-size: 1.6rem;line-height: 2.4rem;white-space: nowrap;width: 24rem;overflow: hidden;text-overflow: ellipsis;float: left;} @media only screen and (max-width: 480px) { body .wcp_preview_first_product_title, body .wcp_preview_second_product_title { font-size: 1rem !important; line-height: 2rem !important; width: inherit !important; word-break: break-word; max-width: 20rem; } } @media only screen and (max-width: 320px) { body .wcp_preview_first_product_title, body .wcp_preview_second_product_title { font-size: 1rem !important; line-height: 2rem !important; width: inherit !important; word-break: break-word; max-width: 17rem; } }</style>
            <style type="text/css">table.variations{display: none;}</style>
            <script type="text/javascript">
                jQuery(".single_add_to_cart_button.button.alt").ready(function(){

                    jQuery('form.cart').prepend("<input type='hidden' name='eo_wbc_add_to_cart_preview' value='1'/>");
                    
                    jQuery(".single_add_to_cart_button.button.alt:not(.disabled):eq(0)").replaceWith(
                         "<button href='#' id='eo_wbc_add_to_cart_preview' class='single_add_to_cart_button button alt'><?php _e('Add This To Cart','woo-bundle-choice') ?></button>"
                    );

                    jQuery(document).on('click','#eo_wbc_add_to_cart_preview',function() {
                        <?php
                            global $post;
                            $url = get_permalink($post->ID);    

                            $get_link = wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>3,'FIRST'=>wbc()->sanitize->get('FIRST'),'SECOND'=>wbc()->sanitize->get('SECOND'),'eo_wbc_add_to_cart_preview'=>'1','WBC_PREVIEW'=>'1'));

                            if(strpos($url,'?') ===false ) {
                                $url = $url."?".$get_link;
                            } else {
                                $url = $url."&".$get_link;
                            }
                        ?>
                        window.location.href = '<?php echo $url; ?>';
                        return false;
                    });

                    jQuery("table.variations").remove();
                });
            </script>
            <?php
        });

        
        $this->eo_wbc_add_breadcrumb();
    }

    public function add2cart() {

        // Final add to cart call.

        $eo_wbc_sets=wbc()->session->get('EO_WBC_SETS',NULL);
        $eo_wbc_maps=wbc()->session->get('EO_WBC_MAPS',array());
                
        if(!is_null($eo_wbc_sets)){
            
            foreach (wc()->cart->cart_contents as $cart_key=>$cart_item)
            {
                $product_count=0;
                $single_count=0;
                //loop through each of maps and count total product and single product count.
                foreach ($eo_wbc_maps as $map)
                {
                    if($map["FIRST"][0]==$cart_item["product_id"] && $map["FIRST"][2]==$cart_item["variation_id"]){
                        $product_count+=$map["FIRST"][1];
                        if (!$map["SECOND"]){
                            $single_count+=$map["FIRST"][1];
                        }
                    }
                    if ($map["SECOND"] && $map["SECOND"][0]==$cart_item["product_id"] && $map["SECOND"][2]==$cart_item["variation_id"])
                    {
                        $product_count+=$map["SECOND"][1];
                    }
                }
                //if no such product available in maps then just add as single to the list.
                if ($product_count>0)
                {
                    //if total product count is lesser then cart's total amount.
                    if ($product_count<$cart_item["quantity"])
                    {
                        //if the item is single only.
                        if($single_count>0)
                        {
                            foreach ($eo_wbc_maps as $map_key=>$map)
                            {
                                if($map["FIRST"][0]==$cart_item["product_id"] && $map["FIRST"][2]==$cart_item["variation_id"])
                                {
                                    unset($eo_wbc_maps[$map_key]);
                                }                                
                            }
                            $eo_wbc_maps[]=array(
                                    "FIRST"=>array(
                                        (string)$cart_item["product_id"],
                                        (string)($cart_item["quantity"]-$product_count)+$single_count,
                                        (string)$cart_item["variation_id"]                                        
                                        ),
                                    "SECOND"=>FALSE
                                );
                        }
                        else
                        {
                            $eo_wbc_maps[]=array(
                                "FIRST"=>array(
                                    (string)$cart_item["product_id"],
                                    (string)($cart_item["quantity"]-$product_count),
                                    (string)$cart_item["variation_id"]                                    
                                ),
                                "SECOND"=>FALSE
                            );
                        }
                    }
                }
                else
                {
                    //No product available in maps so add as single to list.
                    $eo_wbc_maps[]=array(
                        "FIRST"=>array(
                            (string)$cart_item["product_id"],
                            (string)$cart_item["quantity"],
                            (string)$cart_item["variation_id"]                            
                        ),
                        "SECOND"=>FALSE
                    );
                }
            } 
            //adding set to the woocommerce cart
            $cart_details=wbc()->session->get('EO_WBC_SETS');
           
           
            if(!empty($cart_details['FIRST']) && !empty($cart_details['SECOND'])){
                $FIRT_CART_ID=wc()->cart->add_to_cart(
                                $cart_details['FIRST'][0],
                                $cart_details['FIRST'][1],
                                $cart_details['FIRST'][2],(
                                is_null($cart_details['FIRST'][2])?null:$cart_details['FIRST']['variation'])
                            );                  
                
                if($FIRT_CART_ID)
                {
                    $SECOND_CART_ID=wc()->cart->add_to_cart(
                                $cart_details['SECOND'][0],
                                $cart_details['SECOND'][1],
                                $cart_details['SECOND'][2],(
                                is_null($cart_details['SECOND'][2])?null:$cart_details['SECOND']['variation'])
                            );
                    
                    if($SECOND_CART_ID)
                    {
                        //All is good so we saved mapps to session.
                        $eo_wbc_maps[]=wbc()->session->get('EO_WBC_SETS');                            
                        wbc()->session->set('EO_WBC_MAPS',$eo_wbc_maps);
                    }
                    else
                    {
                        $FIRST_OB=(array)wc()->cart->get_cart_item($FIRT_CART_ID);
                        if($FIRST_OB['quantity']==$cart_details['FIRST'][1])
                        {
                            wc()->cart->remove_cart_item($FIRT_CART_ID);
                        }
                        elseif($FIRST_OB['quantity']>$cart_details['FIRST'][1])
                        {
                            wc()->cart->set_quantity($FIRT_CART_ID,($FIRST_OB['quantity']-$cart_details['FIRST'][1]));
                        }                   
                    }
                }            
            }
        }
        else
        {
            wc_add_notice(__('Unexpected error has occured','woo-bundle-choice'),'error');
            wc_print_notices();
        } 
    }

    public function add2session_cart() {
        $cart=base64_decode(wbc()->sanitize->get('CART'),TRUE);        
        if (!empty($cart)){
            
            $cart=str_replace("\\",'',$cart);
            $cart=(array)json_decode($cart);
            //wbc()->common->pr($cart);
            if(is_array($cart) OR is_object($cart)){

                if(empty($cart['quantity'])){
                    $cart['quantity'] = 1;
                }

                //if product belongs to first target;
                $eo_wbc_sets=wbc()->session->get('EO_WBC_SETS',array());
                $variation_data = array();
                foreach($cart as $cart_key=>$cart_value){
                    if(substr($cart_key, 0, strlen('attribute_')) === 'attribute_'){
                        $variation_data[$cart_key]=$cart_value;
                    }
                }                
                // if (get_option('eo_wbc_first_slug')==$cart['eo_wbc_target']) {

                
                if( !empty($cart['eo_wbc_target']) ) {
                    $eo_wbc_target = get_term_by('slug',$cart['eo_wbc_target'],'product_cat');
                    if(!empty($eo_wbc_target) and !is_wp_error($eo_wbc_target)) {
                        $cart['eo_wbc_target'] = $eo_wbc_target->slug;
                    }
                }
                

                if ($this->first_category_slug==$cart['eo_wbc_target']) {

                    $eo_wbc_sets['FIRST']=array(
                                        $cart['eo_wbc_product_id'],
                                        $cart['quantity'],
                                        (isset($cart['variation_id'])?$cart['variation_id']:NULL),
                                        'variation'=>$variation_data,
                                    );
                }
                //if product belongs to second target;
                // elseif (get_option('eo_wbc_second_slug')==$cart['eo_wbc_target']) {
                elseif ($this->second_category_slug==$cart['eo_wbc_target']) {

                     $eo_wbc_sets['SECOND']=array(
                                        $cart['eo_wbc_product_id'],
                                        $cart['quantity'],
                                        (isset($cart['variation_id'])?$cart['variation_id']:NULL),
                                        'variation'=>$variation_data,                          
                                    );
                }
                wbc()->session->set('EO_WBC_SETS', apply_filters('sp_wbc_add2session_cart_sets',$eo_wbc_sets,$cart));
            }
        }
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
        if ($category==$this->first_category_slug) {
                            
            $get_link = wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>sanitize_text_field($category),'STEP'=>1,'FIRST'=>$post->ID,'SECOND'=>'','REDIRECT'=>1));
        // } elseif ($category==get_option('eo_wbc_second_slug')) {
        } elseif ($category==$this->second_category_slug) {
            
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
                   $this->first_category_slug==$category 
                // || get_option('eo_wbc_second_slug')==$category
                || $this->second_category_slug==$category
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
                        jQuery('form.cart').prepend("<input type='hidden' name='eo_wbc_target' value='<?php echo $this->page_category; ?>'/><input type='hidden' name='eo_wbc_product_id' value='<?php global $post; echo $post->ID; ?>'/>");
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
            if($category == $this->first_category_slug){
                // return get_option('eo_wbc_add_to_cart_text_first', __('Continue', 'woo-bundle-choice'));
                /* removed on 21-07-2021 by mahesh@emptyops.com -- to replace with `...` loader */
                /*return wbc()->options->get_option('appearance_product_page','fc_atc_button_text',__('Continue', 'woo-bundle-choice'));*/
            // } elseif( $category == get_option('eo_wbc_second_slug') ) {
            } elseif( $category == $this->second_category_slug) {
                // return get_option('eo_wbc_add_to_cart_text_second', __('Continue', 'woo-bundle-choice'));
                /* removed on 21-07-2021 by mahesh@emptyops.com -- to replace with `...` loader */
                //return wbc()->options->get_option('appearance_product_page','sc_atc_button_text',__('Continue', 'woo-bundle-choice'));
            }     
            return '...';       
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
            /*add_filter( 'sidebars_widgets',function($sidebars_widgets ) {
                return array( false );
            });    */
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
            if($category == $this->first_category_slug){
                // $btn_text = get_option('eo_wbc_add_to_cart_text_first', __('Continue', 'woo-bundle-choice'));
                $btn_text = wbc()->options->get_option('appearance_product_page','fc_atc_button_text',__('Continue', 'woo-bundle-choice'));
            // } elseif( $category == get_option('eo_wbc_second_slug') ) {
            } elseif( $category == $this->second_category_slug ) {
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
                    jQuery('form.cart').prepend("<input type='hidden' name='eo_wbc_target' value='<?php echo $this->page_category; ?>'/><input type='hidden' name='eo_wbc_product_id' value='<?php global $post; echo $post->ID; ?>'/>");
                    
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
                    (wbc()->options->get_option('tiny_features','product_page_hide_first_variation_form',false) and $category == $this->first_category_slug) or wbc()->options->get_option('tiny_features','product_page_hide_second_variation_form',false) and $category == $this->second_category_slug
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

                if($category==$this->first_category_slug) {

                    $category_link=$this->eo_wbc_category_link();

                    $url=$site_url.($remove_index?'':'/index.php')."/{$category_base}/".$category_link.
                    wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>2,'FIRST'=>$post->ID,'SECOND'=>wbc()->sanitize->get('SECOND'),'CART'=>wbc()->sanitize->get('CART'),'ATT_LINK'=>implode(' ',$this->att_link),'CAT_LINK'=>substr($category_link,0,strpos($category_link,'/')))).$site_url_get;

                // } elseif($category==get_option('eo_wbc_second_slug')) {
                } elseif($category==$this->second_category_slug) {

                    $category_link=$this->eo_wbc_category_link();
                    $url=$site_url.($remove_index?'':'/index.php')."/{$category_base}/".$category_link
                    .wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>2,'FIRST'=>wbc()->sanitize->get('FIRST'),'SECOND'=>$post->ID,'CART'=>wbc()->sanitize->get('CART'),'ATT_LINK'=>implode(' ',$this->att_link),'CAT_LINK'=>substr($category_link,0,strpos($category_link,'/')))).$site_url_get;
                }

                /*echo $url;
                die();*/

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
                if($category==$this->first_category_slug) {

                    $get_link=wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>1,'FIRST'=>$post->ID,'SECOND'=>(empty(wbc()->sanitize->get('SECOND'))?'':wbc()->sanitize->get('SECOND')),'REDIRECT'=>1));

                // } elseif($category==get_option('eo_wbc_second_slug')) {
                } elseif($category==$this->second_category_slug) {

                    $get_link=wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>1,'FIRST'=>(empty(wbc()->sanitize->get('FIRST'))?'':wbc()->sanitize->get('FIRST')),'SECOND'=>$post->ID,'REDIRECT'=>1));
                } else {
                    // well due to some reason could not determine category properly so working based on begin offset recived via _GET.
                    $begin = wbc()->sanitize->get('BEGIN');                    
                    // if($begin==get_option('eo_wbc_first_slug')){
                    if($begin==$this->first_category_slug){

                        $get_link=wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>1,'FIRST'=>$post->ID,'SECOND'=>(empty(wbc()->sanitize->get('SECOND'))?'':wbc()->sanitize->get('SECOND')),'REDIRECT'=>1));

                    // } elseif($begin==get_option('eo_wbc_second_slug')) {
                    } elseif($begin==$this->second_category_slug) {

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
            
            /*$review_page_url = '';

            $review_page = get_page_by_path('eo-wbc-product-review');
            
            if(empty($review_page) or is_wp_error($review_page)){
                $review_page_url = home_url('/eo-wbc-product-review/');
            } else {
                $review_page_url = get_permalink($review_page);
            }           
        
            if(wbc()->sanitize->get('FIRST')==='' OR $category==$this->first_category_slug)
            {
                $url=wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>3,'FIRST'=>$post->ID,'SECOND'=>wbc()->sanitize->get('SECOND')));
            }
            elseif (wbc()->sanitize->get('SECOND')==='' OR $category==$this->second_category_slug)
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
            }*/
            /*$setting_page_url  = */
                        
            $preview_product_id = (empty($_GET['SECOND'])?$post->ID:$_GET['SECOND']);            
            $setting_page_url = get_permalink($preview_product_id);

            if(wbc()->sanitize->get('FIRST')==='' OR $category==$this->first_category_slug) {

                $url=wbc()->common->http_query(array('EO_WBC'=>1,'WBC_PREVIEW'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>3,'FIRST'=>$post->ID,'SECOND'=>wbc()->sanitize->get('SECOND')));

            } elseif (wbc()->sanitize->get('SECOND')==='' OR $category==$this->second_category_slug) {

                $url=wbc()->common->http_query(array('EO_WBC'=>1,'WBC_PREVIEW'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>3,'FIRST'=>wbc()->sanitize->get('FIRST'),'SECOND'=>$post->ID));

            } else {

                $url='';
            }

            if(!empty($url) and !empty($setting_page_url)) {
                if(strpos($setting_page_url,'?')===false){
                    $url = $setting_page_url.'?'.$url;
                } else {
                    $url = $setting_page_url.'&'.$url;
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
            if($this->eo_wbc_get_category()==$this->first_category_slug) { $map_column = 0; }
            // elseif($this->eo_wbc_get_category()==get_option('eo_wbc_second_slug')) { $map_column = 1; }            
            elseif($this->eo_wbc_get_category()==$this->second_category_slug) { $map_column = 1; }            
            
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
            $first_parent_object = get_term_by('slug',$this->first_category_slug,'product_cat');
            $first_parent_slug = $this->first_category_slug;

            if(!empty($first_parent_object) and !is_wp_error($first_parent_object)) {
                $first_parent_slug = $first_parent_object->slug;
            }

            $second_parent_object = get_term_by('slug',$this->second_category_slug,'product_cat');
            $second_parent_slug = $this->second_category_slug;

            if(!empty($second_parent_object) and !is_wp_error($second_parent_object)) {
                $second_parent_slug = $second_parent_object->slug;
            }


            // $link.=($this->eo_wbc_get_category()==get_option('eo_wbc_first_slug'))
            $link.=($this->eo_wbc_get_category()==$this->first_category_slug)
                        ?
                    // get_option('eo_wbc_second_slug')
                        $second_parent_slug
                    /*$this->second_category_slug*/
                        :
                    // get_option('eo_wbc_first_slug');                    
                        $first_parent_slug
                    /*$this->first_category_slug*/;                    
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
        return wbc()->common->get_category('product',$post->ID,array($this->first_category_slug,$this->second_category_slug,wbc()->options->get_option('configuration','first_slug'),wbc()->options->get_option('configuration','second_slug')));
    }
}
