<?php
class YC_Review
{
    public function __construct()
    {        
        require_once 'YC_Support.php';
        //Set YC_SETS 's second selection item data
        if((strlen(trim($_GET['FIRST']))>0 && strlen(trim($_GET['SECOND']))>0) && isset($_GET['CART']))
        {
            $this->add_to_cart();
        }
        $this->add_css();    //images style
        $this->render();    //Page Review cart data
        
        if(isset($_POST['add_to_cart']) && $_POST['add_to_cart']==1)
        {
            $this->add_this_to_cart();
        }
    }
    
    private function add_css()
    {
        add_action( 'wp_head',function(){
            echo "<style>
                .yc-img-container {
                    position: relative;
                    text-align: center;
                    color: white;
                    max-width:150px;
                    align-self: center;
                    left: 50%;
                    vertical-align: middle;
                    transform: translate(-50%);
                }                
                .yc-img-top-left {
                    position: absolute;
                    top: 5px;
                    left: 5px;
                    width:50%;
                    height:50%;
                    transform: translate(-50%);
                }
                .product-detail{
                        width: max-content;
                }
            </style>";
        });            
    }
    
    private function add_this_to_cart()
    {
        $yc_sets=WC()->session->get('YC_SETS',NULL);        
        $yc_maps=WC()->session->get('YC_MAPS',array());
        
        if(!is_null($yc_sets)){
            
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
            
            //YC_MAPS add sets to yc_maps
            $yc_maps[]=WC()->session->get('YC_SETS');            
            WC()->session->set('YC_MAPS',$yc_maps);
                        
            foreach (WC()->session->get('YC_SETS') as $product_id=>$cart_details)
            {
                //ID | COUNT | VARIATION_ID
                wc()->cart->add_to_cart($cart_details[0],$cart_details[1],$cart_details[2],(function_exists(wc_get_product_variation_attributes)?wc_get_product_variation_attributes($cart_details[2]):YC_Support::wc_get_product_variation_attributes($cart_details[2])));
            }
        }
        else
        {
            wc_add_notice('Unexpected error has occured','error');
            wc_print_notices();
        }        
        //Redirect to cart page.       
        exit(wp_redirect(function_exists('wc_get_cart_url')?wc_get_cart_url():YC_Support::wc_get_cart_url()));
    }
    
    private function add_to_cart()
    {
        $cart=$_GET['CART'];
        $cart=str_replace("\\",'',$cart);
        $cart=json_decode($cart);
        
        $yc_sets=WC()->session->get('YC_SETS',array());        
        
        if($yc_sets['FIRST']==NULL)
        {
            $yc_sets['FIRST']=array($cart->product_id?$cart->product_id:$_GET['FIRST'],$cart->quantity,$cart->variation_id?$cart->variation_id:NULL);            
        }
        
        if ($yc_sets['SECOND']==NULL)
        {            
            $yc_sets['SECOND']=array($cart->product_id?$cart->product_id:$_GET['SECOND'],$cart->quantity,$cart->variation_id?$cart->variation_id:NULL);            
        }
        
        WC()->session->set('YC_SETS',$yc_sets);
    }
    
    private function render()
    {        
        add_action('the_content',function(){
                       
            echo YC_Breadcrumb::add_breadcrumb($_GET['STEP'],$_GET['BEGIN']).'<br/><br/>';
            
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
            $this->review_ui(WC()->session->get('YC_SETS'));
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
    
    private function review_ui($cart)
    {            
        $first=YC_Support::wc_get_product($cart['FIRST'][0]);
        $second=YC_Support::wc_get_product($cart['SECOND'][0]);
            ?>
                    
				<tr>
					<td>
						<div class="yc-img-container">
								<?php echo $first->get_image('thumbnail'); ?>
							<div class="yc-img-top-left ">
								<?php echo $second->get_image('thumbnail'); ?>
							</div>  										
						</div>						
					</td>
					<td>
						<div class="product-detail">
							<p><?php _e($first->get_title().($cart['FIRST'][2]?"<br/>&nbsp;-&nbsp;&nbsp;&nbsp;".implode(',',YC_Support::wc_get_product_variation_attributes($cart['FIRST'][2])):''));?></p>					
							
						</div>
						<div class="product-detail">
							<p><?php _e($second->get_title().($cart['SECOND'][2]?"<br/>&nbsp;-&nbsp;&nbsp;&nbsp;".implode(',',YC_Support::wc_get_product_variation_attributes($cart['SECOND'][2])):'')); ?></p>                               	
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