<?php
class EO_WBC_Category
{
    public function __construct()
    {          
        //If add to cart triggred
        // Detection : only one category item get length > 0 
        //   i.e. using XOR check if only one of two have been set.
        if( !empty($_GET['CART']) && empty($_GET['EO_CHANGE']) && ( empty($_GET['FIRST']) XOR empty($_GET['SECOND']) ) ) {
            //Iff condition is mutual exclusive, store it to  the session.
            $this->eo_wbc_add_to_cart();            
        } 

        //if Current-Category is either belongs to FIRST OR SECOND Category then initiate application        
        if(
    		$this->eo_wbc_get_category()==get_option('eo_wbc_first_slug') 
    		  OR
    		$this->eo_wbc_get_category()==get_option('eo_wbc_second_slug')
        ){
            if( get_option('eo_wbc_filter_enable')=='1' ){
                if(
                     ($this->eo_wbc_get_category()==get_option('eo_wbc_first_slug') && get_option('eo_wbc_add_filter_first',FALSE) )
                     OR 
                     ($this->eo_wbc_get_category()==get_option('eo_wbc_second_slug') && get_option('eo_wbc_add_filter_second',FALSE) )
                ){
                    $this->eo_wbc_add_filters();          
                }
            }            
            $this->eo_wbc_add_breadcrumb();                  	
            $this->eo_wbc_render(); 
        }
    }

    private function eo_wbc_add_to_cart() {
        
        $cart=base64_decode(sanitize_text_field($_GET['CART']),TRUE);        
        if(!empty($cart)){

            $cart=str_replace("\\",'',$cart);
            $cart=(array)json_decode($cart);
            
            if(is_array($cart) OR is_object($cart)) {
                   
                //if product belongs to first target;
                if (get_option('eo_wbc_first_slug')==$cart['eo_wbc_target']) {

                    WC()->session->set('EO_WBC_SETS',
                        array(
                            'FIRST'=>array(
                                            $cart['eo_wbc_product_id'],
                                            $cart['quantity'],
                                            (isset($cart['variation_id'])?$cart['variation_id']:NULL)
                                        ),
                            'SECOND'=>NULL
                                                
                    ));
                }
                //if product belongs to second target;
                elseif (get_option('eo_wbc_second_slug')==$cart['eo_wbc_target']) {

                    WC()->session->set('EO_WBC_SETS',
                        array(
                            'FIRST'=>NULL,
                            'SECOND'=>array(
                                            $cart['eo_wbc_product_id'],
                                            $cart['quantity'],
                                            (isset($cart['variation_id'])?$cart['variation_id']:NULL)
                                        )
                    ));
                }                                              
            }                        
        }
    }

    private function eo_wbc_add_filters() {
        //Add product filter widget...
        
        add_action( 'woocommerce_before_shop_loop',function(){            
            if (class_exists('EO_WBC_Filter_Widget')) {
                new EO_WBC_Filter_Widget();                                
            }
        },130);         
        
    }

    private function eo_wbc_add_breadcrumb()
    {	        
    	//Add Breadcumb at top....		
        add_action( 'woocommerce_before_shop_loop',function(){            
            echo EO_WBC_Breadcrumb::eo_wbc_add_breadcrumb(sanitize_text_field($_GET['STEP']),sanitize_text_field($_GET['BEGIN'])).'<br/><br/>';
        }, 120);
    }

    private function eo_wbc_render()
    {   
        if(get_option('eo_wbc_pair_maker_status',FALSE) && isset($_GET) && !empty($_GET['STEP']) && $_GET['STEP']==2 && (empty($_GET['FIRST']) XOR empty($_GET['SECOND']))){

            add_action( 'wp_enqueue_scripts',function(){ 
                wp_register_style('eo_wbc_product_card_css',plugin_dir_url(EO_WBC_PLUGIN_FILE).'css/product_cards.css');
                wp_enqueue_style( 'eo_wbc_product_card_css');

                wp_register_style('eo_wbc_ui_css',plugin_dir_url(EO_WBC_PLUGIN_FILE).'css/ui/semantic.min.css');
                wp_enqueue_style( 'eo_wbc_ui_css');

                wp_register_script('eo_wbc_ui_js',plugin_dir_url(EO_WBC_PLUGIN_FILE).'js/ui/semantic.min.js');
                wp_enqueue_script( 'eo_wbc_ui_js');
            },100);

            add_action('wp_head',function(){
                ?>
                    <style type="text/css">
                        .products{
                            display: none !important;
                        }                        
                        .ui.card>.image>img, .ui.cards>.card>.image>img{
                            width: 50%;
                        }
                    </style>                    
                <?php
            });

            add_action('wp_footer',function(){
                ?>  
                    <div class="eo_wbc_hidden_data" style="display: none;">                        
                        <div class="ui grid stackable">       
                            <div class="row">
                        <?php
                            global $wp_query;
                            if( $wp_query->have_posts() ) {
                                
                                $_posts=$wp_query->posts;

                                if( is_array($_posts) && !empty($_posts) ){

                                    $prev_product_id=$_GET['FIRST'] | $_GET['SECOND'];
                                    $prev_product=EO_WBC_Support::eo_wbc_get_product($prev_product_id);

                                    foreach ($_posts as $_post) {                                        
                                        $curr_product=EO_WBC_Support::eo_wbc_get_product($_post->ID);                                        
                                        if(!empty($prev_product && $curr_product)) {

                                            //create a card layout within containers.
                                            ?>                                                      
                                            <a href="<?php echo $this->eo_wbc_product_url(get_permalink($_post->ID)); ?>" class="product_cards six wide column aligned left">
                                                <?php if(get_option('eo_wbc_pair_upper_card',1)==2 && empty($_GET['SECOND'])): ?>                                                
                                                    <div class="economy">
                                                      <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($_post->ID))[0]; ?>" height="74">
                                                      <h3><?php echo $curr_product->get_title()?></h3>
                                                      <div style="text-align: center !important;">&nbsp;<?php echo $curr_product->get_price_html(); ?></div>
                                                    </div>  
                                                    <div class="premiumeconomy">
                                                      <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($prev_product_id))[0]; ?>" height="74">
                                                      <h3><?php echo $prev_product->get_title();?></h3>
                                                      <div style="text-align: center !important;">&nbsp;<?php echo $prev_product->get_price_html(); ?></div>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="economy">
                                                      <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($prev_product_id))[0]; ?>" height="74">
                                                      <h3><?php echo $prev_product->get_title();?></h3>
                                                      <div style="text-align: center !important;">&nbsp;<?php echo $prev_product->get_price_html(); ?></div>
                                                    </div>
                                                    <div class="premiumeconomy">
                                                      <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($_post->ID))[0]; ?>" height="74">
                                                      <h3><?php echo $curr_product->get_title()?></h3>
                                                      <div style="text-align: center !important;">&nbsp;<?php echo $curr_product->get_price_html(); ?></div>
                                                    </div>                                                       
                                                <?php endif;?>
                                            </a>
                                            
                                                <!--<div class="ui special cards">
                                                    <div class="card">
                                                        <a class="image" href="<?php echo $this->eo_wbc_product_url(get_permalink($_post->ID)); ?>">
                                                            <img class="left floated" src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($prev_product_id))[0]; ?>">                              
                                                            <img class="left floated" src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($_post->ID))[0]; ?>">
                                                        </a>
                                                        <div class="content">
                                                            <a class="meta description aligned center" href=""><?php echo $prev_product->get_title();?><br/><i class="icon plus"></i><br/><?php echo $curr_product->get_title()?></a>                
                                                        </div>
                                                        <div class="extra content">
                                                            <div class="header description">
                                                              <?php echo $curr_product->get_price_html(); ?>
                                                            </div>
                                                        </div>                                                            
                                                    </div>                                                        
                                                </div>-->
                                            <?php
                                        }
                                    }
                                }
                            }
                        ?></div>
                        </div>

                    </div>
                    <script>
                        jQuery(document).ready(function($){
                            $(".products").empty().html($(".eo_wbc_hidden_data").html());                            
                        });
                    </script>
                    <style type="text/css">
                        .products{
                            display: block !important;
                        }                                                
                    </style>                    
                <?php
            });

        } else {
            //Hide Add to cart in Shop and product_category page
            remove_action( 'woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart');
                    
            remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );    

            //Add information to end of pemalink of product
            add_filter( 'post_type_link',array($this,'eo_wbc_product_url'));   
        }     
    }
        
    function eo_wbc_product_url($url){
        return  $url.'?EO_WBC=1'.
                        '&BEGIN='.sanitize_text_field($_GET['BEGIN']).
                        '&STEP='.sanitize_text_field($_GET['STEP']).                            
                        '&FIRST='.
                        (
                            $this->eo_wbc_get_category()==get_option('eo_wbc_first_slug') 
                                ?
                            ''
                                :
                            (
                                !empty($_GET['FIRST'])
                                    ? 
                                sanitize_text_field( $_GET['FIRST'])
                                    :
                                ''
                            )
                        ).
                        '&SECOND='.
                        (
                            $this->eo_wbc_get_category()==get_option('eo_wbc_second_slug')
                                ?
                            ''
                                :
                            (
                                !empty($_GET['SECOND'])
                                    ?
                                sanitize_text_field($_GET['SECOND'])
                                    :
                                ''
                            )
                        );
    }

    private function eo_wbc_id_2_slug($id)
    {
        return get_term_by('id',$id,'product_cat')->slug;
    }
    
    /**
     * Function to find current page's product super category
     * @param null
     * @return string
     */
    public function eo_wbc_get_category()
    {        
        global $wp_query;        
        
        //get list of slug which are ancestors of current page item's category
        $term_slug=array_map(array('self',"eo_wbc_id_2_slug"),get_ancestors($wp_query->get_queried_object()->term_id, 'product_cat'));


        //append current page's slug so that create complete list of terms including current term even if it is parent.
        $term_slug[]=$wp_query->get_queried_object()->slug;                 

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
?>