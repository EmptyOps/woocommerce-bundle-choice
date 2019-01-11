<?php   
class YC_Order_Recived{
    public function __construct()
    {
        add_action('woocommerce_thankyou',function($order_id){
            $sets=WC()->session->get('YC_MAPS');
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
                $wpdb->insert($wpdb->prefix.'yc_order_maps',array('order_id'=>$order_id,'order_map'=>json_encode($maps)),array("%d","%s"));
                
                //Clearing Plugin Session data                
                WC()->session->set('YC_SETS',NULL);
                WC()->session->set('YC_MAPS',NULL);
                WC()->cart->empty_cart();                 
            }
        });
    } 
}    
?>