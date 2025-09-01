<?php
namespace eo\wbc\controllers\publics\pages;
defined( 'ABSPATH' ) || exit;

class Cart {

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
        if(isset($_GET['EO_WBC_REMOVE'])){
            $this->eo_wbc_remove();
        }     

        if(wbc()->session->get('EO_WBC_SETS'))//Destroy EO_WBC_SETS data if session is available
        {
            wbc()->session->set('EO_WBC_SETS',NULL);
        }

        if(isset($_GET['empty_cart']) && wbc()->sanitize->get('empty_cart')==1){
            $this->eo_wbc_empty_cart();
        }                               
        
        $this->eo_wbc_render();    
    }    
   
    public function eo_wbc_remove(){
    
        $eo_wbc_maps=wbc()->session->get('EO_WBC_MAPS',array());   
        if(isset($eo_wbc_maps[wbc()->sanitize->get('EO_WBC_REMOVE')])) {
            unset($eo_wbc_maps[wbc()->sanitize->get('EO_WBC_REMOVE')]);
            wbc()->session->set('EO_WBC_MAPS',$eo_wbc_maps);
                        
            //Reload cart data
            WC()->cart->empty_cart();           
            foreach ($eo_wbc_maps as $index=>$set)
            {   
                if(empty($set["FIRST"]['variation'])) {
                    $set["FIRST"]['variation'] = NULL;
                }            

                if($set["FIRST"]){          
                    wc()->cart->add_to_cart(
                        $set["FIRST"][0],
                        $set["FIRST"][1],
                        ($set["FIRST"][2]=='0'?NULL:$set["FIRST"][2]),
                        ($set["FIRST"][2]=='0'?NULL:$set["FIRST"]['variation'])
                      );
                }

                if(empty($set["SECOND"]['variation'])) {
                    $set["SECOND"]['variation'] = NULL;
                }            

                if($set["SECOND"] and isset($set["SECOND"][0]) and isset($set["SECOND"][1]) )  
                {
                    wc()->cart->add_to_cart(
                        $set["SECOND"][0],
                        $set["SECOND"][1],
                        ($set["SECOND"][2]=='0'?NULL:$set["SECOND"][2]),
                        ($set["SECOND"][2]=='0'?NULL:$set["SECOND"]['variation'])
                    );
                }
            }   
        }                
    } 
    
    public function eo_wbc_empty_cart(){
        //empty cart on user request
        wbc()->session->set('EO_WBC_SETS',NULL);
        wbc()->session->set('EO_WBC_MAPS',NULL);
        wbc()->session->set('EO_WBC_CART',NULL);
        WC()->cart->empty_cart();
        exit(wp_redirect(wbc()->wc->eo_wbc_get_cart_url()));
    }
    
    public function eo_wbc_add_css()
    {
        //Adding JQuery Library....
        add_action( 'wp_enqueue_scripts',function(){
            // wp_enqueue_script('JQuery');
            // wp_register_script('eo_wbc_cart_js',plugins_url('/js/eo_wbc_cart.js',__FILE__));
            // wp_enqueue_script('eo_wbc_cart_js');
            wbc()->load->asset('js','publics/eo_wbc_cart',array('jquery'));
        });
    }
    
    public function eo_wbc_cart_service()
    {       
        //wbc()->common->pr(wc()->cart->cart_contents);
        $eo_wbc_maps=wbc()->session->get('EO_WBC_MAPS',array());        
        foreach (wc()->cart->cart_contents as $cart_key=>$cart_item) {

            $product_count=0;
            $single_count=0;
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
            
            if ($product_count>0)
            {
                if ($product_count<$cart_item["quantity"])
                {
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
        wbc()->session->set('EO_WBC_MAPS',apply_filters('eowbc_cart_render_maps',$eo_wbc_maps));
    }

    public function process_cart($maps){
        if(empty($maps)) return array();
        foreach ($maps as $key => $map) {
                        
            $maps[$key]['data'] = wbc()->wc->eo_wbc_get_product((empty($map['FIRST'][2]))?$map['FIRST'][0]:$map['FIRST'][2]);
            if(empty($maps[$key]['data'])){
                unset($maps[$key]);
                continue;
            }
            
            $maps[$key]['quantity'] = $map['FIRST'][1];
            $maps[$key]['name'] = $maps[$key]['data']->get_name();

            $maps[$key]['product_id'] = ((empty($map['FIRST'][2]))?$map['FIRST'][0]:$map['FIRST'][2]);
            $maps[$key]['variation_id'] = $map['FIRST'][2];

            $maps[$key]['variation'] = empty($map['FIRST'][2])?array():wbc()->wc::eo_wbc_support_get_product_variation_attributes($map['FIRST'][2]);
            
            if(!empty($map['SECOND'])){
                $maps[$key]['quantities'] = array('FIRST'=>$map['FIRST'][1],'SECOND'=>$map['SECOND'][1]);
            }

            if(!empty($map['SECOND'])){
                $maps[$key]['datas'] = array(
                    'FIRST'=>wbc()->wc->eo_wbc_get_product((empty($map['FIRST'][2]))?$map['FIRST'][0]:$map['FIRST'][2]),
                    'SECOND'=>wbc()->wc->eo_wbc_get_product((empty($map['SECOND'][2]))?$map['SECOND'][0]:$map['SECOND'][2])
                );
            }


            if(!empty($map['SECOND'])){
                $maps[$key]['product_ids'] = array(
                    'FIRST'=>((empty($map['FIRST'][2]))?$map['FIRST'][0]:$map['FIRST'][2]),
                    'SECOND'=>((empty($map['SECOND'][2]))?$map['SECOND'][0]:$map['SECOND'][2])
                );
            }

            if(!empty($map['SECOND'])){
                $maps[$key]['variation_ids'] = array(
                    'FIRST'=>$map['FIRST'][2],
                    'SECOND'=>$map['SECOND'][2]
                );
            }

            if(!empty($map['SECOND'])){
                $maps[$key]['variations'] = array(
                    'FIRST'=>empty($map['FIRST'][2])?array():wbc()->wc::eo_wbc_support_get_product_variation_attributes($map['FIRST'][2]),
                    'SECOND'=>empty($map['SECOND'][2])?array():wbc()->wc::eo_wbc_support_get_product_variation_attributes($map['SECOND'][2])
                );
            }

        }
        return  apply_filters('sp_wbc_pre_cart_render_maps',$maps);
    }
    
    public function eo_wbc_render()
    {   
        wbc()->theme->load('css','cart');
        wbc()->theme->load('js','cart');
        if(apply_filters('eowbc_filter_sidebars_widgets',true)){
            add_filter( 'sidebars_widgets',function($sidebars_widgets ) {
                return array( false );
            });
        }


        
        // if our car is empty then return.
        $maps=wbc()->session->get('EO_WBC_MAPS');
        
        if(empty($maps)) return;        

        //run the cart service.
        $this->eo_wbc_cart_service();

        // if our is empty even after cart service return now.
        $maps=wbc()->session->get('EO_WBC_MAPS');        
        if(empty($maps)) return;

        $this->eo_wbc_add_css();

        $maps = $this->process_cart($maps);        
        
        $cart_actual_content = false;
        add_action('woocommerce_before_cart',function() use (&$cart_actual_content,&$maps){
            $cart_actual_content = WC()->cart->get_cart_contents();
            WC()->cart->set_cart_contents($maps);
        });
        
        add_filter( 'woocommerce_cart_item_permalink',function($link,$cart_item, $cart_item_key){
            return false;
        },10,3);     

        add_filter('woocommerce_cart_item_thumbnail',function( $image, $cart_item, $cart_item_key) {        
            
            if(!empty($cart_item['datas'])){
               return $cart_item['datas']['FIRST']->get_image().$cart_item['datas']['SECOND']->get_image();
            } else {
                return $image;
            }
            
        },99,3);

        add_filter('woocommerce_cart_item_name',function($name, $cart_item, $cart_item_key ){
            if(!empty($cart_item['datas'])){
               return $cart_item['datas']['FIRST']->get_name().'<br/>'.$cart_item['datas']['SECOND']->get_name();
            } else {
                return $name;
            }
        },10,3);

        add_filter( 'woocommerce_cart_item_price',function($price,$cart_item, $cart_item_key){
            if(!empty($cart_item['datas'])){                
                return WC()->cart->get_product_price( $cart_item['datas']['FIRST'] ).'<br/>'.WC()->cart->get_product_price( $cart_item['datas']['SECOND'] );
            } else {
                return $price;
            }
        },10,3);        

        add_filter( 'woocommerce_cart_item_quantity',function($product_quantity_first, $cart_item_key, $cart_item){

            if(!empty($cart_item['datas'])){

                return $cart_item['quantity'].'<br/>'.$cart_item['quantities']['SECOND'];
            } else {
                //return $cart_item['quantity'];
                return $product_quantity_first;
            }

        },10,3);

        add_filter( 'woocommerce_cart_item_subtotal',function($total, $cart_item, $cart_item_key){

            if(!empty($cart_item['datas'])){
                $price = $cart_item['datas']['FIRST']->get_price();
                $quantity = $cart_item['quantities']['FIRST'];
                if ( $cart_item['datas']['FIRST']->is_taxable() ) {

                    if ( WC()->cart->display_prices_including_tax() ) {
                        $row_price        = wc_get_price_including_tax( $cart_item['datas']['FIRST'], array( 'qty' => $cart_item['quantities']['FIRST'] ) );
                        $product_subtotal = $row_price;

                        if ( ! wc_prices_include_tax() && WC()->cart->get_subtotal_tax() > 0 ) {
                            $product_subtotal .= ' <small class="tax_label">' . WC()->countries->inc_tax_or_vat() . '</small>';
                        }
                    } else {
                        $row_price        = wc_get_price_excluding_tax($cart_item['datas']['FIRST'], array( 'qty' => $cart_item['quantities']['FIRST'] ) );
                        $product_subtotal = $row_price;

                        if ( wc_prices_include_tax() && WC()->cart->get_subtotal_tax() > 0 ) {
                            $product_subtotal .= ' <small class="tax_label">' . WC()->countries->ex_tax_or_vat() . '</small>';
                        }
                    }
                } else {
                    $row_price        = $price * $quantity;
                    $product_subtotal = $row_price;
                }

                $product_subtotal_first = $product_subtotal;

                $price = $cart_item['datas']['SECOND']->get_price();
                $quantity = $cart_item['quantities']['SECOND'];
                if ( $cart_item['datas']['SECOND']->is_taxable() ) {

                    if ( WC()->cart->display_prices_including_tax() ) {
                        $row_price        = wc_get_price_including_tax( $cart_item['datas']['SECOND'], array( 'qty' => $cart_item['quantities']['SECOND'] ) );
                        $product_subtotal = $row_price;

                        if ( ! wc_prices_include_tax() && WC()->cart->get_subtotal_tax() > 0 ) {
                            $product_subtotal .= ' <small class="tax_label">' . WC()->countries->inc_tax_or_vat() . '</small>';
                        }
                    } else {
                        $row_price        = wc_get_price_excluding_tax($cart_item['datas']['SECOND'], array( 'qty' => $cart_item['quantities']['SECOND'] ) );
                        $product_subtotal = $row_price;

                        if ( wc_prices_include_tax() && WC()->cart->get_subtotal_tax() > 0 ) {
                            $product_subtotal .= ' <small class="tax_label">' . WC()->countries->ex_tax_or_vat() . '</small>';
                        }
                    }
                } else {
                    $row_price        = $price * $quantity;
                    $product_subtotal = $row_price;
                }

                $product_subtotal_second = $product_subtotal;

                return wc_price($product_subtotal_first+$product_subtotal_second);
            } else {
                return $total;
            }

        },10,3); 


        add_filter( 'woocommerce_get_item_data',function($item_data, $cart_item ){
            return array();
        },10,2);

        add_filter('woocommerce_cart_item_remove_link',function($link,$cart_item_key
                                ){
            return sprintf(
                            '<a href="?EO_WBC=1&amp;EO_WBC_REMOVE=%s" class="remove" aria-label="%s">&times;</a>',$cart_item_key,
                            esc_html__( 'Remove this item', 'woocommerce' ));

        },10,2);


        add_action('woocommerce_before_cart_totals',function() use(&$cart_actual_content){
            WC()->cart->set_cart_contents($cart_actual_content);           
        });
        //WC()->cart->set_cart_contents($cart_actual_content);

        /*foreach ($maps as $index=>$map){
            
            $this->eo_wbc_cart_ui($index,$map);               
        }*/
        //Removing Cart Table data.....
        //Adding Custome Cart Table Data.......        
        /*add_action('woocommerce_before_cart_contents',function(){
            $this->eo_wbc_cart_service();
            ?>
                <!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) -->
                <style>
                    tr.cart_item
                    {
                        display: none;
                    }
                    
                    [name="update_cart"]
                    {
                        display: none !important;   
                    }

                    .shop_table td{
                        font-size: medium;                         
                        vertical-align: middle !important;
                    }



                    .woocommerce table.shop_table th
                    {                        
                        padding-right: 2em !important;                        
                    }
                    
                    #eo_wbc_extra_btn a{
                        margin-bottom: 2em;
                    }
                    #eo_wbc_extra_btn::after{
                        content: '\A';
                        white-space: pre;                         
                    }
                    [data-title="Price"],[data-title="Quantity"],[data-title="Cost"]{
                        text-align: right !important;
                    }
                    @media screen and (max-width: 720px) {
                        td[data-title="Thumbnail"] {
                            display: flex !important;
                        }
                        span.column::before{
                            content: '\A\A';
                            white-space: pre;
                        }
                        #eo_wbc_extra_btn{
                            display: grid;
                        }                                             
                    }                    
                </style>
            <?php 
            $maps=wbc()->session->get('EO_WBC_MAPS');
            foreach ($maps as $index=>$map){
                
                $this->eo_wbc_cart_ui($index,$map);               
            }
        });*/
            
            // Adding Buttons
            // 1 Continue Shopping
            // 2 Empty Cart
          /*  add_action('woocommerce_after_cart_table',function(){
                echo '<div style="float:right;" id="eo_wbc_extra_btn"><a href="'.get_bloginfo('url').'" class="checkout-button button alt wc-backword">Continue Shopping</a><br style="display:none;" />
              <a href="./?EO_WBC=1&empty_cart=1" class="checkout-button button alt wc-backword">Empty Cart</a></div><div style="clear:both;"></div>';
            });*/
    }

    public function eo_wbc_cart_ui($index,$cart)
    {  
        
        $first=wbc()->wc->eo_wbc_get_product($cart['FIRST'][0]);

        $second=$cart['SECOND']?wbc()->wc->eo_wbc_get_product($cart['SECOND'][0]):FALSE;

        if(empty($first) or (!empty($cart['SECOND']) and empty(wbc()->wc->eo_wbc_get_product($cart['SECOND'][0])))) return false;
        
        wbc()->load->template('publics/cart', array("cart"=>$cart,"first"=>$first,"second"=>$second,"index"=>$index)); 
    }    

}