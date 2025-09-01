<?php
class EO_WBC_Review
{
    public function __construct()
    {        
        require_once 'EO_WBC_Support.php';
        //Set EO_WBC_SETS 's second selection item data
        if((strlen(sanitize_text_field($_GET['FIRST']))>0 && strlen(sanitize_text_field($_GET['SECOND']))>0) && isset($_GET['CART']))
        {
        	//if data available at _GET then add to out custom cart
            $this->eo_wbc_add_to_cart();
        }

        $this->eo_wbc_add_css();    //images style
        $this->eo_wbc_render();    //Page Review cart data
        
        if(isset($_POST['add_to_cart']) && sanitize_text_field($_POST['add_to_cart'])==1)
        {
            $this->eo_wbc_add_this_to_cart();
        }
    }
    
    private function eo_wbc_add_css()
    {
        add_action( 'wp_head',function(){
            ?>
            <style>
                .eo_wbc_img_ontainer {
                    position: relative;
                    text-align: center;
                    color: white;
                    max-width:150px;
                    align-self: center;
                    left: 50%;
                    vertical-align: middle;
                    transform: translate(-50%);
                }                
                .eo_wbc_img_top_left {
                    position: relative;
                    top: -150px;
                    width: 75px;
                    height: 75px;
                    transform: translate(-50%);
                }
                @media (min-width: 320px) and (max-width: 767px) {
                     .eo_wbc_img_top_left {
                        position: relative;
                        top: 5px;      
                        transform: translate(0%);                                          
                    }
                }

                .eo_wbc_product_detail{
                        width: max-content;
                }
            </style>
            <?php
        });            
    }
    
    private function eo_wbc_add_this_to_cart()
    {
        $eo_wbc_sets=WC()->session->get('EO_WBC_SETS',NULL);
        $eo_wbc_maps=WC()->session->get('EO_WBC_MAPS',array());
        
        if(!is_null($eo_wbc_sets)){
            
            foreach (wc()->cart->cart_contents as $cart_key=>$cart_item)
            {
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
            
            //EO_WBC_MAPS add sets to eo_wbc_maps
            $eo_wbc_maps[]=WC()->session->get('EO_WBC_SETS');            
            WC()->session->set('EO_WBC_MAPS',$eo_wbc_maps);
                        
            foreach (WC()->session->get('EO_WBC_SETS') as $product_id=>$cart_details)
            {
                //ID | COUNT | VARIATION_ID
                wc()->cart->add_to_cart(
                	$cart_details[0],
                	$cart_details[1],
                	$cart_details[2],
                	is_null($cart_details[2])?null:EO_WBC_Support::eo_wbc_get_product_variation_attributes($cart_details[2])
                );
            }
        }
        else
        {
            wc_add_notice('Unexpected error has occured','error');
            wc_print_notices();
        }        
        //Redirect to cart page.       
        exit(wp_redirect(EO_WBC_Support::eo_wbc_get_cart_url()));
    }
    
    private function eo_wbc_add_to_cart()
    {
        $cart=base64_decode(sanitize_text_field($_GET['CART']),TRUE);
        if ($cart){
            
            $cart=str_replace("\\",'',$cart);
            $cart=json_decode($cart);
            if(is_array($cart) OR is_object($cart)){
                $eo_wbc_sets=WC()->session->get('EO_WBC_SETS',array());        
                
                if($eo_wbc_sets['FIRST']==NULL && filter_var(sanitize_text_field($_GET['SECOND']),FILTER_VALIDATE_INT))
                {
                    $eo_wbc_sets['FIRST']=
                    		array(
                    			isset($cart->product_id)?$cart->product_id:sanitize_text_field($_GET['FIRST']),
                    			$cart->quantity,
                    			isset($cart->variation_id)?$cart->variation_id:NULL
                    		);            
                }
                
                if ($eo_wbc_sets['SECOND']==NULL && filter_var(sanitize_text_field($_GET['FIRST']),FILTER_VALIDATE_INT))
                {            
                    $eo_wbc_sets['SECOND']=
                    		array(
                    			isset($cart->product_id)?$cart->product_id:sanitize_text_field($_GET['SECOND']),
                    			$cart->quantity,
                    			isset($cart->variation_id)?$cart->variation_id:NULL
                    		);            
                }
                
                WC()->session->set('EO_WBC_SETS',$eo_wbc_sets);
            }
        }
    }
    
    private function eo_wbc_render()
    {        
        add_action('the_content',function(){
                       
            echo EO_WBC_Breadcrumb::eo_wbc_add_breadcrumb(sanitize_text_field($_GET['STEP']),sanitize_text_field($_GET['BEGIN'])).'<br/><br/>';
            
            //Showing Whatever in the cart
            echo "<div class='woocomerce'>                
                <table cellpadding='1' cellspacing='1'>
                    <thead>
                        <tr>
                            <th style='width:325px;'>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                        </tr>
                    </thead><tbody>";
            $this->eo_wbc_review_ui(WC()->session->get('EO_WBC_SETS'));
            echo '
            </tbody>            
        </table>
            <form action="" method="post" class="woocommerce" style="float:right;">
                        <input type="hidden" name="add_to_cart" value=1>
                        <button class="button">Add This To Cart</button>
            </form>
        </div>';
        });
    }
    
    private function eo_wbc_review_ui($cart)
    {            
        $first=EO_WBC_Support::eo_wbc_get_product($cart['FIRST'][0]);
        $second=EO_WBC_Support::eo_wbc_get_product($cart['SECOND'][0]);
            ?>
                    
				<tr>
					<td>
						<div class="eo_wbc_img_container" style="position:relative;left: 50px;">
								<?php echo $first->get_image('thumbnail'); ?>
							<div class="eo_wbc_img_top_left">
								<?php echo $second->get_image('thumbnail'); ?>
							</div>  										
						</div>						
					</td>
					<td>
						<div class="eo_wbc_product_detail">
							<p><?php _e($first->get_title().($cart['FIRST'][2]?"<br/>&nbsp;-&nbsp;&nbsp;&nbsp;".implode(',',EO_WBC_Support::eo_wbc_get_product_variation_attributes($cart['FIRST'][2])):''));?></p>					
							
						</div>
						<div class="eo_wbc_product_detail">
							<p><?php _e($second->get_title().($cart['SECOND'][2]?"<br/>&nbsp;-&nbsp;&nbsp;&nbsp;".implode(',',EO_WBC_Support::eo_wbc_get_product_variation_attributes($cart['SECOND'][2])):'')); ?></p>                               	
						</div>									
					</td>
					<td>
						<div>
							<p><?php _e(get_woocommerce_currency_symbol(get_option('woocommerce_currency'))." ".
							    get_post_meta($cart['FIRST'][2]?$cart['FIRST'][2]:$cart['FIRST'][0],'_price',TRUE).
							    "&nbsp;X&nbsp;".$cart['FIRST'][1]);?></p>
						 </div><br/>
						 <div>   
							<p><?php _e(get_woocommerce_currency_symbol(get_option('woocommerce_currency'))." ".
							    get_post_meta($cart['SECOND'][2]?$cart['SECOND'][2]:$cart['SECOND'][0],'_price',TRUE).
							    "&nbsp;X&nbsp;".$cart['SECOND'][1]);?></p>
    	                 </div><br/>
    	                <br/>
    	                
						<h4><strong>Total : <?php _e(get_woocommerce_currency_symbol(get_option('woocommerce_currency'))." ".
						    ((get_post_meta($cart['FIRST'][2]?$cart['FIRST'][2]:$cart['FIRST'][0],'_price',TRUE)*$cart['FIRST'][1])
						    +
						    (get_post_meta($cart['SECOND'][2]?$cart['SECOND'][2]:$cart['SECOND'][0],'_price',TRUE)*$cart['SECOND'][1]))); ?></strong></h4>
					</td>								
				</tr>
            <?php        
    }
}