<?php
namespace eo\wbc\controllers\publics\pages;
defined( 'ABSPATH' ) || exit;

class Order_Received {

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

        // add_filter( 'woocommerce_order_get_items',function($items, $order, $types){
        //     global $wpdb;
        //     $order_id = $order->get_id();
        //     $query='select * from `'.$wpdb->prefix.'eo_wbc_order_maps` where order_id='.$order_id;

        //     $sets=$wpdb->get_row($query,'ARRAY_A');
            
        //     $sets=(json_decode($sets['order_map']));
            
        //     foreach ($items as $item_key => $item_value) {
        //         foreach ($sets as $set_key => $set_value) {
        //             //$set_value = (array) $set_value;
        //             $set_value[0] = (array)$set_value[0];
        //             if(!empty($set_value[1])){
        //                 $set_value[1] = (array)$set_value[1];
        //             }
        //             $item_value_data = $item_value->get_data();
        //             if(!empty($set_value[1]) and !empty($item_value_data['product_id'])){
                                             
        //                 if($set_value[1][0]==($item_value_data['product_id'])){
        //                     if(!empty($set_value[1][2]) and $set_value[1][2]!=$item_value->get_data()['variation_id']){
        //                         continue;
        //                     }
                            
        //                     $item_value->set_quantity($item_value->get_data()['quantity'] - $set_value[1][1] );

        //                     foreach ($items as $inner_item_key => $inner_item_value) {
        //                         if($set_value[0][0]==$item_value->get_data()['product_id']){
                                
        //                             if(!empty($set_value[0][2]) and $set_value[0][2]!=$item_value->get_data()['variation_id']){
        //                                 continue;
        //                             }
        //                             $items[$inner_item_key]->eowbc_second_item = $item_value;
        //                             $items[$inner_item_key]->eowbc_second_item->set_quantity($set_value[1][1]);
                                    
        //                         }
        //                     }

        //                     if($item_value->get_data()['quantity']<=0){
        //                         unset($items[$item_key]);
        //                     }
                        
        //                 }
        //             }
        //         }
                
        //     }
        //     wbc()->common->pr($items);
        //     return  array()/*$items*/;
        // },10,3);

        // add_action('woocommerce_order_details_before_order_table_items',function($order){
        //     $order = array();
        // });
        //$maps = wbc()->session->get('EO_WBC_MAPS_ORDER');
        
        
    }    

}