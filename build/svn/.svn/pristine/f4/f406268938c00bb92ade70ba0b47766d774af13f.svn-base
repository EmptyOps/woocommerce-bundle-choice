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
                    <style type="text/css">
                        .cat_products{
                            border:1.3px solid #80808059;
                            border-radius: 1.5px;
                            margin:3.125% !important;
                            margin-bottom: 2em !important;                            
                        }
                        @media only screen and (max-width: 768px) {
                          .ui.stackable.grid>.wide.column{  
                            margin-bottom: 2em !important;
                          }
                        }
                        .ui.cards>.card {
                            width: 100%;
                        }
                        .ui.cards>.card>.image>img {
                            /*width: 100%;*/
                            width: auto;
                            margin: auto; 
                        }
                        .ui.cards>.card h5{
                            color: white !important;
                        }

                        .ui.special.cards .card:first-child{
                            margin-bottom: 0.75px;
                        }
                        .ui.special.cards .card:first-child,.ui.special.cards .card:first-child *:not(.button){
                            border-bottom-right-radius: 0px !important;
                            border-bottom-left-radius: 0px !important;
                        }
                        .ui.special.cards .card:last-child{
                            margin-top: 0.75px;
                        }
                        .ui.special.cards .card:last-child,.ui.special.cards .card:last-child *:not(.button){
                            border-top-left-radius: 0px !important;
                            border-top-right-radius: 0px !important;
                        }
                        .cat_products.seven.wide.column{
                            height: max-content;
                        }
                    </style>                    
                    <div class="eo_wbc_hidden_data" style="display: none;">                                                
                        <div class="ui grid stackable container padded">
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
                                            //create a card layout within containers
                                            ?>                                      
                                            <div class="cat_products seven wide column">
                                                <?php if( (get_option('eo_wbc_pair_upper_card',1)==1 && $this->eo_wbc_get_category()==get_option('eo_wbc_first_slug')) OR get_option('eo_wbc_pair_upper_card',1)==2 && $this->eo_wbc_get_category()==get_option('eo_wbc_second_slug')  ): ?>  
                                                    <div class="ui special cards">
                                                        <div class="card">
                                                            <div class="blurring dimmable image">
                                                              <div class="ui dimmer">
                                                                <div class="content">
                                                                  <div class="bottom">

                                                                    <div data-link="<?php echo $this->eo_wbc_product_url(get_permalink($_post->ID)); ?>" class="ui inverted button"><?php echo  get_option('eo_wbc_add_to_cart_text',__('View and Continue','woo-bundle-choice')) ;?></div>

                                                                    <h5><?php echo $curr_product->get_title(); ?></h5><br/>
                                                                    <div style="text-align: center !important;">&nbsp;<?php echo $curr_product->get_price_html(); ?></div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($_post->ID),'large')[0]; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="blurring dimmable image">
                                                              <div class="ui dimmer">
                                                                <div class="content">
                                                                  <div class="bottom">
                                                                  
                                                                  <div data-link="<?php echo $this->eo_wbc_prev_url(); ?>" class="ui inverted button">Change</div>

                                                                    <h5><?php echo $prev_product->get_title();?></h5><br/>
                                                                    <div style="text-align: center !important;">&nbsp;<?php echo $prev_product->get_price_html(); ?></div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($prev_product_id),'large')[0]; ?>">
                                                            </div>
                                                        </div>
                                                    </div>                                                  
                                                 
                                                <?php else: ?>

                                                    <div class="ui special cards">
                                                        <div class="card">
                                                            <div class="blurring dimmable image">
                                                              <div class="ui dimmer">
                                                                <div class="content">
                                                                  <div class="aligned align bottom">
                                                                    
                                                                    <div data-link="<?php echo $this->eo_wbc_prev_url(); ?>" class="ui inverted button">Change</div>

                                                                    <h5><?php echo $prev_product->get_title(); ?></h5><br/>
                                                                    <div style="text-align: center !important;">&nbsp;<?php echo $prev_product->get_price_html(); ?></div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($prev_product_id),'large')[0]; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="blurring dimmable image">
                                                              <div class="ui dimmer">
                                                                <div class="content">
                                                                  <div class="aligned align bottom">
                                                                    
                                                                    <div data-link="<?php echo $this->eo_wbc_product_url(get_permalink($_post->ID)); ?>" class="ui inverted button"><?php echo  get_option('eo_wbc_add_to_cart_text',__('View and Continue','woo-bundle-choice')) ;?></div>

                                                                    <h5><?php echo $curr_product->get_title();?></h5><br/>
                                                                    <div style="text-align: center !important;">&nbsp;<?php echo $curr_product->get_price_html(); ?></div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($_post->ID),'large')[0]; ?>">
                                                            </div>
                                                        </div>
                                                    </div>                                                   
                                                <?php endif;?>
                                            </div>

                                            <?php
                                        }
                                    }
                                }
                            }
                        ?>                              
                        </div>
                    </div>
                    <script>
                        jQuery(document).ready(function($){                            
                            jQuery(".products").html(jQuery(".eo_wbc_hidden_data").html());
                            jQuery('.special.cards .image').dimmer({on:'hover'});
                            jQuery('.button[data-link]').on('click',function(e){
                                e.preventDefault();
                                e.stopPropagation();
                                window.location.href=$(this).attr('data-link');
                            });
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
        
    function eo_wbc_prev_url(){
        $site_ = site_url();
        if($this->eo_wbc_get_category()==get_option('eo_wbc_first_slug')){
            $_cat=get_option('eo_wbc_second_slug');
        } elseif ($this->eo_wbc_get_category()==get_option('eo_wbc_second_slug')) {
            $_cat=get_option('eo_wbc_first_slug');
        }
        return $site_."/product-category/{$_cat}/?EO_WBC=1&BEGIN={$_cat}&STEP=1&FIRST=&SECOND=";
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