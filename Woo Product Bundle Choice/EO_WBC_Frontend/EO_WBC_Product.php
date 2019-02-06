<?php
class EO_WBC_Product
{
    public function __construct()
    {       
        $this->eo_wbc_config();            //Disable 'Add to Cart Button' and Set 'Sold Individually'
        $this->eo_wbc_add_breadcrumb();    //Add Breadcrumb        
        $this->eo_wbc_render();            //Render View and Routings                                
    }
    
    private function eo_wbc_config()
    {        
        //Remove add to cart button
        remove_action( 
            'woocommerce_after_shop_loop_item',
            'woocommerce_template_loop_add_to_cart'
        );
    }

    private function eo_wbc_add_breadcrumb()
    {   
        //Adding Breadcrumb
        add_action( 'woocommerce_before_single_product',function(){

            echo EO_WBC_Breadcrumb::eo_wbc_add_breadcrumb(
                                            sanitize_text_field($_GET['STEP']),
                                            sanitize_text_field($_GET['BEGIN'])
                                        ).'<br/><br/>';
        }, 15 );
    }
    
    private function eo_wbc_render()
    {
        //Registering Scripts : JavaScript
        add_action( 'wp_enqueue_scripts',function(){

            global $post;
            wp_register_script(
                'eo_wbc_add_to_cart_js',
                plugins_url(
                    'js/eo_wbc_single_add_to_cart.js',
                    __FILE__
                ),
                array('jquery')
            );
            
            wp_localize_script(
                'eo_wbc_add_to_cart_js',
                'eo_wbc_object',
                array('url'=>$this->eo_wbc_product_route())
            );
            
            wp_enqueue_script('eo_wbc_add_to_cart_js');
        });
          
        //Adding own ADD_TO_CART_BUTTON
        add_action('wp_footer',function(){            
        ?>
       	<script type="text/javascript">
    		jQuery(".single_add_to_cart_button.button.alt").ready(function(){
                jQuery('form.cart').prepend("<input type='hidden' name='eo_wbc_target' value='<?php echo $this->eo_wbc_get_category(); ?>'/><input type='hidden' name='eo_wbc_product_id' value='<?php global $post; echo $post->ID; ?>'/>")
    			jQuery(".single_add_to_cart_button.button.alt:not(.disabled)").replaceWith(
    			     "<a href='#' id='eo_wbc_add_to_cart' class='single_add_to_cart_button button alt'>"
                     +"<?php _e('Add to cart'); ?>"
                     +"</a>"
                    );
    			});
    	</script>
       <?php    
       });
    }
    
    private function eo_wbc_product_route(){
        global $post;
        $url=null;
        $category=$this->eo_wbc_get_category();
        if(sanitize_text_field($_GET['STEP'])==1)
        {
            if($category==get_option('eo_wbc_first_slug')){
                $url=get_bloginfo('url').'/product-category/'.$this->eo_wbc_category_link()
                    .'/?EO_WBC=1&BEGIN='.sanitize_text_field($_GET['BEGIN'])
                    .'&STEP=2&FIRST='.$post->ID.'&SECOND='.sanitize_text_field($_GET['SECOND']).'&EO_WBC_CODE='.sanitize_text_field($_GET['EO_WBC_CODE']);
            }
            elseif($category==get_option('eo_wbc_second_slug')){
                $url=get_bloginfo('url').'/product-category/'.$this->eo_wbc_category_link()
                    .'/?EO_WBC=1&BEGIN='.sanitize_text_field($_GET['BEGIN'])
                    .'&STEP=2&FIRST='.sanitize_text_field($_GET['FIRST']).'&SECOND='.$post->ID.'&EO_WBC_CODE='.sanitize_text_field($_GET['EO_WBC_CODE']);
            }
        }
        
        if(sanitize_text_field($_GET['STEP'])==2)
        {
            if(sanitize_text_field($_GET['FIRST'])==='')
            {
                $url=get_bloginfo('url').get_option('eo_wbc_review_page')
                    .'?EO_WBC=1&BEGIN='.sanitize_text_field($_GET['BEGIN'])
                    .'&STEP=3&FIRST='.$post->ID.'&SECOND='.sanitize_text_field($_GET['SECOND']).'&EO_WBC_CODE='.sanitize_text_field($_GET['EO_WBC_CODE']);
            }
            elseif (sanitize_text_field($_GET['SECOND'])==='')
            {
                $url=get_bloginfo('url').get_option('eo_wbc_review_page')
                    .'?EO_WBC=1&BEGIN='.sanitize_text_field($_GET['BEGIN'])
                    .'&STEP=3&FIRST='.sanitize_text_field($_GET['FIRST']).'&SECOND='.$post->ID.'&EO_WBC_CODE='.sanitize_text_field($_GET['EO_WBC_CODE']);
            }
        }
        return $url;
    }
    
    /**
     * @return string
     *  string of mapped category to current category item
     */
    private function eo_wbc_category_link(){

        global $post;
        $terms = get_the_terms( $post->ID, 'product_cat' );
        $category=array();
        foreach ($terms as $term)
        {
            global $wpdb;
            $query="select * from `{$wpdb->prefix}eo_wbc_cat_maps` "."where first_cat_id={$term->term_id} or second_cat_id={$term->term_id}";
            
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
    private function eo_wbc_get_category()
    {
        global $post;
        $terms = get_the_terms( $post->ID, 'product_cat' );
        $term_slug=[];
        foreach ($terms as $term) {
            $term_slug[]=$term->slug;
        }
        if(in_array(get_option('eo_wbc_first_slug'),$term_slug))
        {
            return get_option('eo_wbc_first_slug');
        }
        elseif(in_array(get_option('eo_wbc_second_slug'),$term_slug))
        {
            return get_option('eo_wbc_second_slug');
        }
    }    
}