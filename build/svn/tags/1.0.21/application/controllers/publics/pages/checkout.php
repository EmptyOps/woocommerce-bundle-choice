<?php
namespace eo\wbc\controllers\publics\pages;
defined( 'ABSPATH' ) || exit;

class Checkout {

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
        add_action('woocommerce_checkout_update_order_review',array($this,'update_order_review'));

        $this->update_order_review();
        //$this->eo_wps_add_js();//Load Jquery and product info contents...     
    }    

    public function eo_wps_add_js()
    {  

    }

    public function update_order_review()
    {   
        // if our car is empty then return.
        $maps=wbc()->session->get('EO_WBC_MAPS');
        if(empty($maps)) return;

        $wbc_cart = \eo\wbc\controllers\publics\pages\Cart::instance();

        $wbc_cart->eo_wbc_cart_service();

        // if our is empty even after cart service return now.
        $maps=wbc()->session->get('EO_WBC_MAPS');        
        if(empty($maps)) return;

        $maps = $wbc_cart->process_cart($maps);

        wbc()->session->set('EO_WBC_MAPS_ORDER',$maps);

        $cart_actual_content = false;

        add_action('woocommerce_review_order_before_cart_contents',function() use (&$cart_actual_content,&$maps){
            $cart_actual_content = WC()->cart->get_cart_contents();
            WC()->cart->set_cart_contents($maps);
        });

        add_filter('woocommerce_cart_item_name',function($name, $cart_item, $cart_item_key ){            

            if(!empty($cart_item['datas'])){
               return $cart_item['datas']['FIRST']->get_name().'<strong class="product-quantity">'.sprintf( '&nbsp;&times;&nbsp;%s', $cart_item['quantity'] ).'</strong><br/><span style="color:red;">+</span><br/>'.$cart_item['datas']['SECOND']->get_name().'<strong class="product-quantity">'.sprintf( '&nbsp;&times;&nbsp;%s', $cart_item['quantities']['SECOND']).'</strong>';
            } else {
                return $name;
            }
        },10,3);

        add_filter( 'woocommerce_checkout_cart_item_quantity',function($product_quantity_first, $cart_item, $cart_item_key){

            if(!empty($cart_item['datas'])){
                return '';
            } else {
                //return $cart_item['quantity'];
                return $product_quantity_first;
            }

        },10,3);
        
        add_filter( 'woocommerce_get_item_data',function($item_data, $cart_item ){
            return array();
        },99,2);

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

        add_action('woocommerce_review_order_after_cart_contents',function() use(&$cart_actual_content){
            WC()->cart->set_cart_contents($cart_actual_content);           
        });

        //Adding JQuery Library....
        add_action( 'wp_enqueue_scripts',function(){
            wp_enqueue_script('JQuery');
        });
            
        //Add cutomization on load....
       /* add_action('wp_footer',function(){
            echo "<!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) --><script>
                jQuery(document).ready(function(){
                    jQuery('.cart_item').remove();
                    jQuery('table.shop_table>tbody').append('".$this->eo_wbc_render()."');
                        
                    jQuery(document).on('updated_checkout',function(){
                        jQuery('.cart_item').remove();
                        jQuery('table.shop_table>tbody').append('".$this->eo_wbc_render()."');
                    });
                });
            </script>";
        });*/                
    }
        
    public function eo_wbc_render()
    {        
        $res="";
        if(wbc()->session->get('EO_WBC_MAPS')){
            
            foreach (wbc()->session->get('EO_WBC_MAPS') as $map){
                
                $res.=$this->checkout_rows($map);
            }
            return $res;
        }
        else{
            
            return NULL;
        }
    }
    
    public function checkout_rows($map)
    {

            if(empty($map)) return false;
            
            if(empty(wbc()->wc->eo_wbc_get_product($map['FIRST'][0]))){
                return '';
            }

            $price=0;            
            $html="<!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) --><tr><td><div><strong>".
                __(wbc()->wc->eo_wbc_get_product($map['FIRST'][0])->get_title().($map['FIRST'][2]  ? "&nbsp; -&nbsp;".implode(',',wbc()->wc->eo_wbc_get_product_variation_attributes($map['FIRST'][2],$map['FIRST']['variation'])):''))."</strong>&nbsp;X&nbsp;{$map["FIRST"][1]}</div>";

                $product=wbc()->wc->eo_wbc_get_product($map['FIRST'][2]?$map['FIRST'][2]:$map['FIRST'][0]);
                $price+=$product->get_price()*$map["FIRST"][1];
            if($map["SECOND"])
            {
                $html.="<strong style=\'color: red;\'>+</strong><div><strong>".
                    __(wbc()->wc->eo_wbc_get_product($map['SECOND'][0])->get_title().($map['SECOND'][2]  ? "&nbsp; -&nbsp;".implode(',',wbc()->wc->eo_wbc_get_product_variation_attributes($map['SECOND'][2],$map['SECOND']['variation'])):''))."</strong>&nbsp;X&nbsp;{$map["SECOND"][1]}</div></td>";
                    $product=wbc()->wc->eo_wbc_get_product($map['SECOND'][2]?$map['SECOND'][2]:$map['SECOND'][0]);
                    $price+=$product->get_price()*$map["SECOND"][1];
            }
            $html.="<td><h6>".wc_price($price)."</h6></td></tr>";
            return $html;
    }

}