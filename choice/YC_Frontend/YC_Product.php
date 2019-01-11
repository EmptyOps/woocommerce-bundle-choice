<?php
class YC_Product
{
    public function __construct()
    {       
        $this->config();            //Disable 'Add to Cart Button' and Set 'Sold Individually'
        $this->add_breadcrumb();    //Add Breadcrumb        
        $this->render();            //Render View and Routings
    }
    
    private function add_breadcrumb()
    {
        //Adding Breadcrumb
        add_action( 'woocommerce_before_single_product',function(){            
            echo YC_Breadcrumb::add_breadcrumb($_GET['STEP'],$_GET['BEGIN']).'<br/><br/>';
        }, 15 );
    }
    
    private function config()
    {
        //Remove add multiple to cart
        //add_filter( 'woocommerce_is_sold_individually', function(){ return TRUE; }, 10, 2 );
        //Remove add to cart button
        remove_action( 'woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart');
    }
    
    private function render()
    {
        //Registering Scripts : JavaScript
        add_action( 'wp_enqueue_scripts',function(){
            global $post;
            wp_register_script('add_to_cart_js',plugins_url('js/yc_add_to_cart.js',__FILE__),array('jquery'));
            wp_localize_script('add_to_cart_js','yc',array('url'=>$this->product_route()));
            wp_enqueue_script('add_to_cart_js');
        });
            
        //Adding own ADD_TO_CART_BUTTON
        add_action('wp_footer',function(){
            if($this->get_category()==get_option('yc_first_slug')){
                $btn_text="Select This ".get_option('yc_first_name');
            }
            elseif($this->get_category()==get_option('yc_second_slug'))
            {
                $btn_text="Select This ".get_option('yc_second_name');
            }
            ?>
       	<script type="text/javascript">
    		jQuery(document).ready(function(){
    			jQuery(".single_add_to_cart_button.button.alt").replaceWith(
    			"<a href='#' id='yc_add_to_cart' class='single_add_to_cart_button button alt'><?php _e($btn_text);?></a>");
    			});
    	</script>
       <?php    
       });
    } 
    
    private function product_route(){
        global $post;
        $url=null;
        $category=$this->get_category();
        if($_GET['STEP']==1)
        {
            if($category==get_option('yc_first_slug')){
                $url=get_bloginfo('url').'/product-category/'.$this->category_link().'/?YC_APP=active&BEGIN='.$_GET['BEGIN'].'&STEP=2&FIRST='.$post->ID.'&SECOND='.$_GET['SECOND'];
            }
            elseif($category==get_option('yc_second_slug')){
                $url=get_bloginfo('url').'/product-category/'.$this->category_link().'/?YC_APP=active&BEGIN='.$_GET['BEGIN'].'&STEP=2&FIRST='.$_GET['FIRST'].'&SECOND='.$post->ID;
            }
        }
        
        if($_GET['STEP']==2)
        {
            if(($_GET['FIRST'])==='')
            {
                $url=get_bloginfo('url').'/yc-product-review/?YC_APP=active&BEGIN='.$_GET['BEGIN'].'&STEP=3&FIRST='.$post->ID.'&SECOND='.$_GET['SECOND'];
            }
            elseif (($_GET['SECOND'])==='')
            {
                $url=get_bloginfo('url').'/yc-product-review/?YC_APP=active&BEGIN='.$_GET['BEGIN'].'&STEP=3&FIRST='.$_GET['FIRST'].'&SECOND='.$post->ID;
            }
        }
        return $url;
    }
    
    /**
     * @return string
     *  string of mapped category to current category item
     */
    private function category_link()
    {
        global $post;
        $terms = get_the_terms( $post->ID, 'product_cat' );
        $category=array();
        foreach ($terms as $term)
        {
            global $wpdb;
            $query="select * from `{$wpdb->prefix}yc_cat_maps` where first_cat_id={$term->term_id} or second_cat_id={$term->term_id}";
            $maps=$wpdb->get_results($query,'ARRAY_N');
            
            foreach ($maps as $map)
            {
                if($map[0]==$term->term_id)
                    $category[]=$map[1];
                    else
                        $category[]=$map[0];
            }
        }
        //remove empty array space
        $category=array_filter($category);
        $link='';
        foreach ($category as $term)
        {
            $link.=get_term_by( 'id',$term,'product_cat')->slug.',';
        }
        $link=substr($link,0,-1);
        return $link;
    }
    
    /**
     * @method Returns Current-Product's top level catgory
     * @return string
     */
    private function get_category()
    {
        global $post;
        $terms = get_the_terms( $post->ID, 'product_cat' );
        $term_slug=[];
        foreach ($terms as $term) {
            $term_slug[]=$term->slug;
        }
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