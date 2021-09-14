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
<<<<<<< HEAD
            {   
                if(empty($set["FIRST"]['variation'])) {
                    $set["FIRST"]['variation'] = NULL;
                }            
=======
            {               

                if(empty($set["FIRST"]['variation'])){
                    $set["FIRST"]['variation'] = NULL;
                }

                if(empty($set["SECOND"]['variation'])){
                    $set["SECOND"]['variation'] = NULL;
                }
>>>>>>> c3dc42e4fb97d6ae1ea0920712ac0ec198116dc4

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
<<<<<<< HEAD
        foreach (wc()->cart->cart_contents as $cart_key=>$cart_item) {

=======

        /*echo "<pre>";
        print_r(wc()->cart->cart_contents);
        print_r(wc()->cart);
        echo "</pre>";
        die();*/

        foreach (wc()->cart->cart_contents as $cart_key=>$cart_item)
        {
>>>>>>> c3dc42e4fb97d6ae1ea0920712ac0ec198116dc4
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
                /*echo "<pre>";
                print_r($cart_item);
                echo "</pre>";
                die();*/

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

       /* if(isset($_GET['test'])){

            echo "<pre>";


            //print_r(wc()->cart);
            print_r(WC()->cart->get_cart_contents());

            print_r($eo_wbc_maps);
            die();
        }*/
        wbc()->session->set('EO_WBC_MAPS',apply_filters('eowbc_cart_render_maps',$eo_wbc_maps));
    }

    public function process_cart($maps){

        if(empty($maps)) return array();

        $retain_scond_items = array();

        foreach ($maps as $key => $map) {
<<<<<<< HEAD
                        
=======
            
            /*$key = uniqid();*/
            
>>>>>>> c3dc42e4fb97d6ae1ea0920712ac0ec198116dc4
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

            /*if(!empty($map['SECOND'])){

                
                if( empty( $retain_scond_items['retain_'.(empty($map['SECOND'][2])?$map['SECOND'][0]:$map['SECOND'][2])] ) ) {
                    // skip processing cart row
                    $retain_scond_items['retain_'.(empty($map['SECOND'][2])?$map['SECOND'][0]:$map['SECOND'][2])]['skip_cart_row'] = true;
                    // Quantity
                    $retain_scond_items['retain_'.(empty($map['SECOND'][2])?$map['SECOND'][0]:$map['SECOND'][2])]['quantity']=$map['SECOND'][1];
                    // Data
                    $retain_scond_items['retain_'.(empty($map['SECOND'][2])?$map['SECOND'][0]:$map['SECOND'][2])]['data'] = wbc()->wc->eo_wbc_get_product((empty($map['SECOND'][2]))?$map['SECOND'][0]:$map['SECOND'][2]);
                    // Product_id
                    $retain_scond_items['retain_'.(empty($map['SECOND'][2])?$map['SECOND'][0]:$map['SECOND'][2])]['product_id'] = ((empty($map['SECOND'][2]))?$map['SECOND'][0]:$map['SECOND'][2]);
                    // variation_id
                    $retain_scond_items['retain_'.(empty($map['SECOND'][2])?$map['SECOND'][0]:$map['SECOND'][2])]['variation_id'] = $map['SECOND'][2];
                    // variation
                    $retain_scond_items['retain_'.(empty($map['SECOND'][2])?$map['SECOND'][0]:$map['SECOND'][2])]['variation'] = empty($map['SECOND'][2])?array():wbc()->wc::eo_wbc_support_get_product_variation_attributes($map['SECOND'][2]);
                        
                } else {
                    // Quantity
                    $retain_scond_items['retain_'.(empty($map['SECOND'][2])?$map['SECOND'][0]:$map['SECOND'][2])]['quantity']+=$map['SECOND'][1];
                }
            }*/
        }
<<<<<<< HEAD
        return  apply_filters('sp_wbc_pre_cart_render_maps',$maps);
=======

        $maps = array_replace($maps,$retain_scond_items);
        
        /*echo "<pre>";
        print_r($maps);
        die();*/

        return $maps;
>>>>>>> c3dc42e4fb97d6ae1ea0920712ac0ec198116dc4
    }
    
    public function eo_wbc_render()
    {   


        if(is_cart()){
            wbc()->theme->load('css','cart');
            wbc()->theme->load('js','cart');
        }

        /*if(apply_filters('eowbc_filter_sidebars_widgets',true)){
            add_filter( 'sidebars_widgets',function($sidebars_widgets ) {
                return array( false );
            });
        }*/


        
        // if our car is empty then return.
        $maps=wbc()->session->get('EO_WBC_MAPS');
<<<<<<< HEAD
        
        if(empty($maps)) return;        
=======
        if(empty($maps)) return;
>>>>>>> c3dc42e4fb97d6ae1ea0920712ac0ec198116dc4

        //run the cart service.        
        $this->eo_wbc_cart_service();
        //return true;

        // if our is empty even after cart service return now.
        $maps=wbc()->session->get('EO_WBC_MAPS');        
        if(empty($maps)) return true;

        $this->eo_wbc_add_css();
        
        $maps = $this->process_cart($maps);        

        $cart_actual_content = false;

        
         if(is_cart()){
            add_action('woocommerce_before_cart',function() use (&$cart_actual_content,&$maps){
                //var_dump("expression 1");
                $cart_actual_content = WC()->cart->get_cart_contents();
                WC()->cart->set_cart_contents($maps);
            });
        } else {
            add_action( 'woocommerce_before_mini_cart',function() use (&$cart_actual_content,&$maps){                
                //var_dump("expression 2");
                $cart_actual_content = WC()->cart->get_cart_contents();
                WC()->cart->set_cart_contents($maps);
            },100);
        }
        
        add_filter( 'woocommerce_cart_item_permalink',function($link,$cart_item, $cart_item_key){
            return false;
        },10,3);     

        add_filter('woocommerce_cart_item_thumbnail',function( $image, $cart_item, $cart_item_key) {

            if(!empty($cart_item['skip_cart_row'])){
                return '';
            }
            
            if(!empty($cart_item['datas']) and !empty($cart_item['datas']['SECOND'])) {
               return $cart_item['datas']['FIRST']->get_image().$cart_item['datas']['SECOND']->get_image();
            } else {
                return $image;
            }
            
        },99,3);

        add_filter('woocommerce_cart_item_name',function($name, $cart_item, $cart_item_key ){

            if(!empty($cart_item['skip_cart_row'])){
                return '';
            }

            if(!empty($cart_item['datas']) and !empty($cart_item['datas']['SECOND'])) {
               return $cart_item['datas']['FIRST']->get_name().'<br/>'.$cart_item['datas']['SECOND']->get_name();
            } else {
                return $name;
            }
        },10,3);

        add_filter( 'woocommerce_cart_item_price',function($price,$cart_item, $cart_item_key){

            if(!empty($cart_item['skip_cart_row'])){
                return '';
            }

            if(!empty($cart_item['datas']) and !empty($cart_item['datas']['SECOND'])) {                
                return WC()->cart->get_product_price( $cart_item['datas']['FIRST'] ).'<br/>'.WC()->cart->get_product_price( $cart_item['datas']['SECOND'] );
            } else {
                return $price;
            }
        },10,3);        

        add_filter( 'woocommerce_cart_item_quantity',function($product_quantity_first, $cart_item_key, $cart_item){

            if(!empty($cart_item['skip_cart_row'])){
                return '';
            }

            if(!empty($cart_item['datas']) and !empty($cart_item['datas']['SECOND'])) {

                return $cart_item['quantity'].'<br/>'.$cart_item['quantities']['SECOND'];
            } else {
                //return $cart_item['quantity'];
                return $product_quantity_first;
            }

        },10,3);

        add_filter( 'woocommerce_widget_cart_item_quantity',function($product_quantity_first, $cart_item, $cart_item_key ){

            if(!empty($cart_item['skip_cart_row'])){
                return '';
            }

            if(!empty($cart_item['datas']) and !empty($cart_item['datas']['SECOND'])) {

                return $cart_item['quantity'].'<br/>'.$cart_item['quantities']['SECOND'];
            } else {
                //return $cart_item['quantity'];
                return $product_quantity_first;
            }

        },10,3);

        add_filter( 'woocommerce_cart_item_subtotal',function($total, $cart_item, $cart_item_key){

            if(!empty($cart_item['skip_cart_row'])){
                return '';
            }

            if(!empty($cart_item['datas']) and !empty($cart_item['datas']['SECOND'])){
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

        add_filter('woocommerce_cart_item_remove_link',function($link,$cart_item_key) { 

            if(!empty($cart_item['skip_cart_row'])) {
                return '';
            }
                               
            return sprintf(
                            '<a href="?EO_WBC=1&amp;EO_WBC_REMOVE=%s" class="remove" aria-label="%s">&times;</a>',$cart_item_key,
                            esc_html__( 'Remove this item', 'woocommerce' ));

        },10,2);

        add_filter('woocommerce_cart_item_product',function($product, $cart_item, $cart_item_key){
            if(!empty($cart_item['skip_cart_row'])) {
                return false;
            } 
            return $product;
        },10,3);


         if(is_cart()){
            add_action(/*'woocommerce_cart_contents'*/'woocommerce_before_cart_totals',function() use(&$cart_actual_content){
                //var_dump("expression 3");
                WC()->cart->set_cart_contents($cart_actual_content);           
            });
        } else {

            add_action('woocommerce_after_mini_cart',function() use(&$cart_actual_content){
                //var_dump("expression 4");
                /*echo "<pre>";
                print_r($cart_actual_content);
                print_r($maps);
                
                die();*/

                WC()->cart->set_cart_contents($cart_actual_content);           
            });
        }
    }

    public function eo_wbc_cart_ui($index,$cart)
    {  
        
        $first=wbc()->wc->eo_wbc_get_product($cart['FIRST'][0]);

        $second=$cart['SECOND']?wbc()->wc->eo_wbc_get_product($cart['SECOND'][0]):FALSE;

        if(empty($first) or (!empty($cart['SECOND']) and empty(wbc()->wc->eo_wbc_get_product($cart['SECOND'][0])))) return false;
        
        wbc()->load->template('publics/cart', array("cart"=>$cart,"first"=>$first,"second"=>$second,"index"=>$index)); 
    }    

}