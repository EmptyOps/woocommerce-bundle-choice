<?php
class YC_Category
{
    public function __construct()
    {
        //Set YC_SETS 's first selection item data
        if((strlen(trim($_GET['FIRST']))>0 XOR strlen(trim($_GET['SECOND']))>0) && isset($_GET['CART'])){
            $this->add_to_cart();
        }
        
        //if Current-Category is either belongs to FIRST OR SECOND Category        
        if($this->get_category()==get_option('yc_first_slug') || $this->get_category()==get_option('yc_second_slug')){            
            $this->render();
        }       
    }
    private function add_to_cart()
    {
        $cart=$_GET['CART'];
        $cart=str_replace("\\",'',$cart);
        $cart=json_decode($cart);
        
        if(strlen(trim($_GET['FIRST']))>0)
        {
            WC()->session->set('YC_SETS',array(
                                                'FIRST'=>array
                                                            (
                                                                $cart->product_id?$cart->product_id:$_GET['FIRST'],
                                                                $cart->quantity,
                                                                $cart->variation_id?$cart->variation_id:NULL
                                                                
                                                            ),
                                                 'SECOND'=>NULL
                                               )
                               );
        }
        elseif (strlen(trim($_GET['SECOND']))>0)
        {
            WC()->session->set('YC_SETS',array(
                                                'FIRST'=>NULL,
                                                'SECOND'=>array(
                                                                $cart->product_id?$cart->product_id:$_GET['SECOND'],
                                                                $cart->quantity,
                                                                $cart->variation_id?$cart->variation_id:NULL
                                                                )
                                            )
                                );
        }
    }
    private function render()
    {        
        //Add Breadcumb at top....
        add_action( 'woocommerce_before_shop_loop',function(){            
            echo YC_Breadcrumb::add_breadcrumb($_GET['STEP'],$_GET['BEGIN']).'<br/><br/>';
        }, 15 );
        
        //Hide Add to cart in Shop and product_category page
        remove_action( 'woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart');
        
        //Add information to end of pemalink of product
        add_filter( 'post_type_link',function($url){
            return $url.'?YC_APP=active&BEGIN='.$_GET['BEGIN'].'&STEP='.$_GET['STEP'].'&FIRST='.$_GET['FIRST'].'&SECOND='.$_GET['SECOND'];
        });
    }
    
    private function id_2_slug($id)
    {
        return get_term_by('id',$id,'product_cat')->slug;
    }
    
    /**
     * Function to find current page's product super category
     * @method get_category()
     * @param null
     * @return string
     */
    public function get_category()
    {
        global $wp_query;        
        //get list of slug which are ancestors of current page item's category
        $term_slug=array_map(array(self,"id_2_slug"),get_ancestors($wp_query->get_queried_object()->term_id, 'product_cat'));        
        //append current page's slug so that create complete list of terms including current term even if it is parent.
        $term_slug[]=$wp_query->get_queried_object()->slug;                 
        if(in_array(get_option('yc_first_slug'),$term_slug))
        {
            return get_option('yc_first_slug');
        }
        elseif(in_array(get_option('yc_second_slug'),$term_slug))
        {
            return get_option('yc_second_slug');
        }
    }
}
?>