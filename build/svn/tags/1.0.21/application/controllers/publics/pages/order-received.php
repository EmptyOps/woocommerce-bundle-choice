<?php
namespace eo\wbc\controllers\publics\pages;
defined( 'ABSPATH' ) || exit;

class Order_Received extends \WC_Order_Item_Product {

    private static $_instance = null;

    public static function instance() {
        if ( ! isset( self::$_instance ) ) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    public function init() {
        
        add_action('woocommerce_thankyou',function($order_id){
            $sets=wbc()->session->get('EO_WBC_MAPS');            
            $maps=array();
            if(!empty($sets) and (is_array($sets) or is_object($sets)) )
            {
                foreach ($sets as $set)
                {
                    $map=array();                    
                        $map[]=array($set["FIRST"][0],$set["FIRST"][1],$set["FIRST"][2],'variation'=>$set["FIRST"]['variation']);
                        if($set["SECOND"])
                        {
                            $map[]=array($set["SECOND"][0],$set["SECOND"][1],$set["SECOND"][2],'variation'=>$set["SECOND"]['variation']);
                        }
                        else 
                        {
                            $map[]=NULL;
                        }
                    $maps[]=$map;
                }
                
                global $wpdb;                
                $wpdb->insert($wpdb->prefix.'eo_wbc_order_maps',array('order_id'=>$order_id,'order_map'=>json_encode($maps)),array("%s","%s"));                
                
                //Clearing Plugin Session data                
                wbc()->session->set('EO_WBC_SETS',NULL);
                wbc()->session->set('EO_WBC_MAPS',NULL);
                WC()->cart->empty_cart();                 
            }
        });

        $woocommerce_order_get_items_proccesed = false;

        add_filter( 'woocommerce_order_get_items',function($items, $order, $types) use(&$woocommerce_order_get_items_proccesed){

            if($woocommerce_order_get_items_proccesed){
                return $items;
            }
            
            global $wpdb;
            $order_id = $order->get_id();
            $query='select * from `'.$wpdb->prefix.'eo_wbc_order_maps` where order_id='.$order_id;

            $sets=$wpdb->get_row($query,'ARRAY_A');
            
            if(empty($sets['order_map'])){
                $sets['order_map'] = json_encode(array());
            }

            $sets=(json_decode($sets['order_map']));
            
            foreach ($items as $item_key => $item_value) {
                if(!empty($sets) and is_array($sets) or is_object($sets)){
                    foreach ($sets as $set_key => $set_value) {
                    
                    //$set_value = (array) $set_value;
                    $set_value[0] = (array)$set_value[0];
                    if(!empty($set_value[1])){
                        $set_value[1] = (array)$set_value[1];
                    }

                    $item_value_data = $item_value->get_data();


                    if( !empty($set_value[0]) and !empty($item_value_data['product_id']) and $set_value[0][0]==($item_value_data['product_id']) and !empty($set_value[1]) ) {
                        
                        if(!empty($set_value[0][2]) and $set_value[0][2]!=$item_value->get_data()['variation_id']){
                            continue;
                        }
                            
                        /*$item_value->set_quantity($item_value->get_data()['quantity'] - $set_value[1][1] );*/

                        foreach ($items as $inner_item_key => $inner_item_value) {
                            
                            if($set_value[1][0]==$inner_item_value->get_data()['product_id']){

                                
                                if(!empty($set_value[1][2]) and $set_value[1][2]!=$inner_item_value->get_data()['variation_id']){
                                    continue;
                                }

                                $items[$item_key]->eowbc_second_item = clone($inner_item_value);
                                $items[$item_key]->eowbc_second_item->data['quantity'] = $set_value[1][1];
                                
                                //var_dump($items[$inner_item_key]);
                                //var_dump($set_value[1][1]." ".$items[$inner_item_key]->data['quantity']);
                                $items[$inner_item_key]->data['quantity']=($items[$inner_item_key]->data['quantity'] - $set_value[1][1]);

                            }
                            
                            if($items[$inner_item_key]->data['quantity']<=0){
                                unset($items[$inner_item_key]);
                            }
                        
                        }
                    }
                    }
                }
            }  
            $woocommerce_order_get_items_proccesed = true;
            return  $items;
        },10,3);
        $eowbc_order = false;
        add_action('woocommerce_order_details_before_order_table_items',function($order) use(&$eowbc_order){
            $eowbc_order = $order;
            //$order = array();
        });

        add_filter('woocommerce_order_item_name',function($name,$item,$is_visible) use (&$eowbc_order){

            $order = $eowbc_order;

            $qty          = $item->get_quantity();
            $refunded_qty = $order->get_qty_refunded_for_item( $item->get_id());

            if ( $refunded_qty ) {
                $qty_display = '<del>' . esc_html( $qty ) . '</del> <ins>' . esc_html( $qty - ( $refunded_qty * -1 ) ) . '</ins>';
            } else {
                $qty_display = esc_html( $qty );
            }

                        
            if(property_exists($item,'eowbc_second_item')){

                $SECOND_ITEM = $item->eowbc_second_item;
                $SECOND = $item->eowbc_second_item->get_product();

                $second_qty          = $SECOND_ITEM->get_quantity();
                $second_refunded_qty = $order->get_qty_refunded_for_item( $SECOND->get_id());
                $second_qty_display = '';

                if ( $second_refunded_qty ) {
                    $second_qty_display = '<del>' . esc_html( $second_qty ) . '</del> <ins>' . esc_html( $second_qty - ( $second_refunded_qty * -1 ) ) . '</ins>';
                } else {
                    $second_qty_display = esc_html( $second_qty );
                }
                
                $product_permalink = ( $is_visible ? $SECOND->get_permalink( $item ) : '' );

                 return $name .' <strong class="product-quantity">' . sprintf( '&times;&nbsp;%s', $qty_display ) . '</strong>'

                 ."<div style='color:red;font-weight: bolder;' class='eowbc add_product plus'>+</div>".( $product_permalink ? sprintf( '<a href="%s">%s</a>', $product_permalink, $SECOND->get_name() ) : $SECOND->get_name() ).
                 ' <strong class="product-quantity">' . sprintf( '&times;&nbsp;%s', $second_qty_display ) . '</strong>';

            } else {
                return $name;
            }           
        },10,3);
        
        add_filter('woocommerce_order_item_quantity_html',function($qty,$item){
            //return $qty;
            if(property_exists($item,'eowbc_second_item')){
                return '';
            } else {
                return $qty;
            }
        },10,2);
        
        add_filter('woocommerce_order_formatted_line_subtotal',function($subtotal, $item, $order){
            if(property_exists($item,'eowbc_second_item')){

                $tax_display = get_option( 'woocommerce_tax_display_cart' );

                if ( 'excl' === $tax_display ) {
                    $ex_tax_label = $order->get_prices_include_tax() ? 1 : 0;

                    $subtotal = wc_price(
                        $order->get_line_subtotal( $item )+$order->get_line_subtotal( $item->eowbc_second_item),
                        array(
                            'ex_tax_label' => $ex_tax_label,
                            'currency'     => $order->get_currency(),
                        )
                    );
                } else {
                    $subtotal = wc_price( $order->get_line_subtotal( $item, true )+$order->get_line_subtotal( $item->eowbc_second_item, true), array( 'currency' => $order->get_currency() ) );
                }

                return $subtotal;
            } else {
                return $subtotal;
            }
        },10,3);

        add_filter( 'woocommerce_display_item_meta',function($html, $item, $args){
            if(property_exists($item,'eowbc_second_item')){
                return '';
            } else {
                return $html;
            }
        },10,3);
        
        
    }    

}