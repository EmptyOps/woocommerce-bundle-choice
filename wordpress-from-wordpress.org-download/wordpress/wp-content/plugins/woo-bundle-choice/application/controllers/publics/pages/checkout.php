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
        $this->eo_wps_add_js();//Load Jquery and product info contents...     
    }    

    public function eo_wps_add_js()
    {
        //Adding JQuery Library....
        add_action( 'wp_enqueue_scripts',function(){
            wp_enqueue_script('JQuery');
        });
            
        //Add cutomization on load....
        add_action('wp_footer',function(){
            echo "<!-- Created with Wordpress plugin - WooCommerce Product bundle choice --><script>
                jQuery(document).ready(function(){
                    jQuery('.cart_item').remove();
                    jQuery('table.shop_table>tbody').append('".$this->eo_wbc_render()."');
                        
                    jQuery(document).on('updated_checkout',function(){
                        jQuery('.cart_item').remove();
                        jQuery('table.shop_table>tbody').append('".$this->eo_wbc_render()."');
                    });
                });
            </script>";
        });                
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
            $html="<!-- Created with Wordpress plugin - WooCommerce Product bundle choice --><tr><td><div><strong>".
                __(wbc()->wc->eo_wbc_get_product($map['FIRST'][0])->get_title().($map['FIRST'][2]  ? "&nbsp; -&nbsp;".implode(',',wbc()->wc->eo_wbc_get_product_variation_attributes($map['FIRST'][2])):''))."</strong>&nbsp;X&nbsp;{$map["FIRST"][1]}</div>";

                $product=wbc()->wc->eo_wbc_get_product($map['FIRST'][2]?$map['FIRST'][2]:$map['FIRST'][0]);
                $price+=$product->get_price()*$map["FIRST"][1];
            if($map["SECOND"])
            {
                $html.="<strong style=\'color: red;\'>+</strong><div><strong>".
                    __(wbc()->wc->eo_wbc_get_product($map['SECOND'][0])->get_title().($map['SECOND'][2]  ? "&nbsp; -&nbsp;".implode(',',wbc()->wc->eo_wbc_get_product_variation_attributes($map['SECOND'][2])):''))."</strong>&nbsp;X&nbsp;{$map["SECOND"][1]}</div></td>";
                    $product=wbc()->wc->eo_wbc_get_product($map['SECOND'][2]?$map['SECOND'][2]:$map['SECOND'][0]);
                    $price+=$product->get_price()*$map["SECOND"][1];
            }
            $html.="<td><h6>".wc_price($price)."</h6></td></tr>";
            return $html;
    }

}