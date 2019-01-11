<?php
class YC_Cart{
    public function __construct(){
        require_once 'YC_Support.php';
        if(WC()->session->get('YC_SETS'))//Destroy YC_SETS data if session is available
        {
            WC()->session->set('YC_SETS',NULL);
        }

        if(isset($_GET['REMOVE'])){
            $this->remove();
        }        
        if(isset($_GET['empty_cart']) && $_GET['empty_cart']==1){
            $this->empty_cart();
        }        
        $this->cart_service();
        $this->add_css();
        $this->render();
    }
   
    private function remove(){
        //YC_MAPS
        $yc_maps=WC()->session->get('YC_MAPS');   
        unset($yc_maps[$_GET['REMOVE']]);
        WC()->session->set('YC_MAPS',$yc_maps);
        
        //Reload cart data
        WC()->cart->empty_cart();
        foreach ($yc_maps as $set)
        {
                wc()->cart->add_to_cart($set["FIRST"][0],$set["FIRST"][1],$set["FIRST"][2],
                    function_exists('wc_get_product_variation_attributes')
                        ? 
                        wc_get_product_variation_attributes($set["FIRST"][2])
                        :
                        YC_Support::wc_get_product_variation_attributes($set["FIRST"][2])
                    );
                
            if($set["SECOND"])
            {
                wc()->cart->add_to_cart($set["SECOND"][0],$set["SECOND"][1],$set["SECOND"][2],
                    function_exists('wc_get_product_variation_attributes')
                    ?
                    wc_get_product_variation_attributes($set["SECOND"][2])
                    :
                    YC_Support::wc_get_product_variation_attributes($set["SECOND"][2])
                        
                  );
            }
        }
    }
    
    private function empty_cart(){
        //empty cart on user request
        WC()->session->set('YC_SETS',NULL);
        WC()->session->set('YC_MAPS',NULL);
        WC()->session->set('YC_CART',NULL);
        WC()->cart->empty_cart();
        exit(wp_redirect(function_exists('wp_get_cart_url')?wc_get_cart_url():YC_Support::wc_get_cart_url()));
    }
    
    private function add_css()
    {
        //Adding JQuery Library....
        add_action( 'wp_enqueue_scripts',function(){
            wp_enqueue_script('JQuery');
            wp_register_script('yc_cart_js',plugins_url('/js/yc_cart_js.js',__FILE__));
            wp_enqueue_script('yc_cart_js');
        });
    }
    
    private function cart_service()
    {
        $yc_maps=WC()->session->get('YC_MAPS',array());
        foreach (wc()->cart->cart_contents as $cart_key=>$cart_item)
        {
            $product_count=0;
            $single_count=0;
            foreach ($yc_maps as $map)
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
                        foreach ($yc_maps as $map_key=>$map)
                        {
                            if($map["FIRST"][0]==$cart_item["product_id"] && $map["FIRST"][2]==$cart_item["variation_id"])
                            {
                                unset($yc_maps[$map_key]);
                            }
                        }                       
                        $yc_maps[]=array(
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
                        $yc_maps[]=array(
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
                $yc_maps[]=array(
                    "FIRST"=>array(
                        (string)$cart_item["product_id"],
                        (string)$cart_item["quantity"],
                        (string)$cart_item["variation_id"]
                    ),
                    "SECOND"=>FALSE
                );
            }
        }
        WC()->session->set('YC_MAPS',$yc_maps);        
    }
    
    private function render()
    {
        //Removing Cart Table data.....
        //Adding Custome Cart Table Data.......        
        add_action('woocommerce_before_cart_contents',function(){
            ?>
            	<style>
                    table.cart img{
                        width: 150px !important;
                        height: auto !important;
                    }
                    .column {
                      float: left;
                      width: 40% !important;
                      padding: 5px;
                    }

                    .row::after {
                      content: "";
                      clear: both;
                      display: table;
                    }
                </style>
            <?php 
            $maps=(WC()->session->get('YC_MAPS'));            
            foreach ($maps as $index=>$map){
                $this->cart_ui($index,$map);
            }
        });
            
            // Adding Buttons
            // 1 Continue Shopping
            // 2 Empty Cart
            add_action('woocommerce_after_cart_table',function(){
                echo '<div style="float:right;"><a href="'.get_bloginfo('url').'" class="checkout-button button alt wc-backword">Continue Shopping</a>
              <a href="./?YC_APP=active&empty_cart=1" class="checkout-button button alt wc-backword">Empty Cart</a></div><div style="clear:both;"><br/><br/></div>';
            });
    }
    private function cart_ui($index,$cart)
    {  
        $first=YC_Support::wc_get_product($cart['FIRST'][0]);
        $second=YC_Support::wc_get_product($cart['SECOND'][0]);
        ?>
		<tr>
			<td>
				<a href="?YC_APP=active&REMOVE=<?php echo $index;?>" class="remove" aria-label="Remove this item" >&times;</a> 									
			</td>
			<td class="row">
				<span class="column"><?php echo $first->get_image('thumbnail'); ?></span>
				<?php if($cart['SECOND']):?>						
				<span class="column"><?php echo $second->get_image('thumbnail'); ?></span>
				<?php endif; ?>
			</td>
			<td>
				<div>
					<p><?php _e($first->get_title().
					    ($cart['FIRST'][2]  ? "<br/>&nbsp; - &nbsp;".implode(',',YC_Support::wc_get_product_variation_attributes($cart['FIRST'][2])) :'')); ?></p>			
				</div>
				<div>
					<?php if($cart['SECOND']):?>
					<p><?php _e($second->get_title().
					       ($cart['FIRST'][2] ? "<br/>&nbsp; - &nbsp;".implode(',',YC_Support::wc_get_product_variation_attributes($cart['SECOND'][2])):'')); ?></p>
					<?php endif; ?>                               	
				</div>									
			</td>
			<td>
				<div>
					<p><?php _e(get_woocommerce_currency_symbol(get_option('woocommerce_currency'))." ".get_post_meta($cart['FIRST'][2]?$cart['FIRST'][2]:$cart['FIRST'][0],'_price',TRUE));?></p>
					<?php $price=(get_post_meta($cart['FIRST'][2]?$cart['FIRST'][2]:$cart['FIRST'][0],'_price',TRUE)*$cart['FIRST'][1]); ?>
				 </div>
				 <div>   
				 	<?php if($cart['SECOND']):?>
					<p><?php _e(get_woocommerce_currency_symbol(get_option('woocommerce_currency'))." ".get_post_meta($cart['SECOND'][2]?$cart['SECOND'][2]:$cart['SECOND'][0],'_price',TRUE));?></p>
						<?php $price+=(get_post_meta($cart['SECOND'][2]?$cart['SECOND'][2]:$cart['SECOND'][0],'_price',TRUE)*$cart['SECOND'][1]); ?>
					<?php endif; ?>
				</div>
			</td>
			<td>
				<p><?php _e($cart['FIRST'][1]); ?></p>
				<?php if($cart['SECOND']):?>
				<p><?php _e($cart['SECOND'][1]); ?></p>
				<?php endif; ?>
			</td>
			<td>
				<p><?php _e(get_woocommerce_currency_symbol(get_option('woocommerce_currency'))." ".$price); ?></p>
			</td>								
		</tr>
		<?php               
    }
    
}
?>

  									
  									