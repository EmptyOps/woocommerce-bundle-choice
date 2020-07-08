<?php

/*
*	Template to show category page
*/

?>  
<!-- Created with Wordpress plugin - WooCommerce Product bundle choice -->
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

                $prev_product_id = wbc()->sanitize->get('FIRST') | wbc()->sanitize->get('SECOND');
                $prev_product=wbc()->wc->eo_wbc_get_product($prev_product_id);

                foreach ($_posts as $_post) {                                        
                    $curr_product=wbc()->wc->eo_wbc_get_product($_post->ID);
                    

                    if(!empty($prev_product && $curr_product)) {
                        //create a card layout within containers
                        ?>         
                        <!-- Created with Wordpress plugin - WooCommerce Product bundle choice -->                             
                        <div class="cat_products seven wide column">
                            <?php if( (wbc()->options->get_option('configuration','pair_maker_upper_card',1)/*get_option('eo_wbc_pair_upper_card',1)*/==1 && $this->eo_wbc_get_category()==wbc()->options->get_option('configuration','first_slug')/*get_option('eo_wbc_first_slug')*/) OR wbc()->options->get_option('configuration','pair_maker_upper_card',1)/*get_option('eo_wbc_pair_upper_card',1)*/==2 && $this->eo_wbc_get_category()==wbc()->options->get_option('configuration','second_slug')/*get_option('eo_wbc_second_slug')*/): ?>  
                                <div class="ui special cards centered">
                                    <div class="card">
                                        <div class="blurring dimmable image">
                                          <div class="ui dimmer">
                                            <div class="content">
                                              <div class="bottom">

                                                <div data-link="<?php echo $this->eo_wbc_product_url(get_permalink($_post->ID)); ?>" class="ui inverted button"><?php echo  (empty(get_option('eo_wbc_add_to_cart_text'))?__('View and Continue','woo-bundle-choice'):get_option('eo_wbc_add_to_cart_text'));?></div>

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

                                <div class="ui special cards centered">
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
                                                
                                                <div data-link="<?php echo $this->eo_wbc_product_url(get_permalink($_post->ID)); ?>" class="ui inverted button"><?php echo (empty(get_option('eo_wbc_add_to_cart_text'))?__('View and Continue','woo-bundle-choice'):get_option('eo_wbc_add_to_cart_text')) ;?></div>

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
                        <!-- Created with Wordpress plugin - WooCommerce Product bundle choice -->
                        <?php
                    }
                }
            }
        }
    ?>                              
    </div>
</div>
<!-- Created with Wordpress plugin - WooCommerce Product bundle choice -->
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
<!-- Created with Wordpress plugin - WooCommerce Product bundle choice -->        
