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
            if(!is_null($sets))
            {
                foreach ($sets as $set)
                {
                    $map=array();                    
                        $map[]=array($set["FIRST"][0],$set["FIRST"][1],$set["FIRST"][2]);
                        if($set["SECOND"])
                        {
                            $map[]=array($set["SECOND"][0],$set["SECOND"][1],$set["SECOND"][2]);
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
    }    

}