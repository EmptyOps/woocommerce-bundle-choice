<?php

/*
*	Template to show category page
*/

?>  
<!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) -->
<style type="text/css">
    .cat_products{
        border:1.3px solid #80808059;
        border-radius: 1.5px;
        margin:auto !important;
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
    .ui.card>.image:not(.ui)>img, .ui.cards>.card>.image:not(.ui)>img{
        height: 250px !important;
    }
    .ui.dimmer .woocommerce-Price-amount.amount,.ui.dimmer  ins,.ui.dimmer  del{
        color: white !important;
        background-color: transparent !important;
    }
</style>                    
<div class="eo_wbc_hidden_data" style="display: none;">                                                
    <div class="ui grid stackable container padded">
    <?php
        global $wp_query;
        if( $wp_query->have_posts() ) {
            
            $_posts=$wp_query->posts;

            if( is_array($_posts) && !empty($_posts) ){
                
                if ( wc_get_loop_prop( 'is_paginated' ) ||  woocommerce_products_will_display() ) {
                    
                

                    $args = array(
                        'total'    => wc_get_loop_prop( 'total' ),
                        'per_page' => wc_get_loop_prop( 'per_page' ),
                        'current'  => wc_get_loop_prop( 'current_page' ),
                    );

                    $total_text = '';
                    // phpcs:disable WordPress.Security
                    if ( 1 === intval( $args['total'] ) ) {
                        _e( 'Showing the single result', 'woocommerce' );
                    } elseif ( $args['total'] <= $args['per_page'] || -1 === $args['per_page'] ) {
                        /* translators: %d: total results */
                        $total_text = sprintf( _n( 'Showing all %d result', 'Showing all %d results', $args['total'], 'woocommerce' ), $args['total'] );
                    } else {
                        $first = ( $args['per_page'] * $args['current'] ) - $args['per_page'] + 1;
                        $last  = min( $args['total'], $args['per_page'] * $args['current'] );
                        /* translators: 1: first result 2: last result 3: total results */
                        $total_text = sprintf( _nx( 'Showing %1$d&ndash;%2$d of %3$d result', 'Showing %1$d&ndash;%2$d of %3$d results', $args['total'], 'with first and last result', 'woocommerce' ), $first, $last, $args['total'] );
                    }
                    // phpcs:enable WordPress.Security
                    
                    ?>
                    <br/>
                    <div style="display:block;clear:both;width: 100% !important"></div>
                    <script type="text/javascript">                        
                        jQuery(document).ready(function($){
                            $('.woocommerce-result-count').html('<?php _e($total_text); ?>')
                        });
                    </script>
                    <?php
                }

                $prev_product_id = wbc()->sanitize->get('FIRST') | wbc()->sanitize->get('SECOND');
                $prev_product=wbc()->wc->eo_wbc_get_product($prev_product_id);
                
                foreach ($_posts as $_post) {                                        
                    $curr_product=wbc()->wc->eo_wbc_get_product($_post->ID);
                    

                    if(!empty($prev_product && $curr_product)) {
                        //create a card layout within containers
                        ?>         
                        <!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) -->                             
                        <div class="cat_products five wide column">
                            <?php if( (wbc()->options->get_option('configuration','pair_maker_upper_card',1)/*get_option('eo_wbc_pair_upper_card',1)*/==1 && $category_object->eo_wbc_get_category()==wbc()->options->get_option('configuration','first_slug')/*get_option('eo_wbc_first_slug')*/) OR (wbc()->options->get_option('configuration','pair_maker_upper_card',1)/*get_option('eo_wbc_pair_upper_card',1)*/==2 && $category_object->eo_wbc_get_category()==wbc()->options->get_option('configuration','second_slug')/*get_option('eo_wbc_second_slug')*/)): ?>  
                                <div class="ui special cards centered">
                                    <div class="card">
                                        <div class="blurring dimmable image">
                                          <div class="ui dimmer">
                                            <div class="content">
                                              <div class="bottom">
                                                <?php if($curr_product->is_in_stock()){ ?>

                                                <div data-link="<?php echo $category_object->eo_wbc_product_url(get_permalink($_post->ID)); ?>" class="ui inverted button"><?php echo  (empty(get_option('eo_wbc_add_to_cart_text'))?__('View and Continue','woo-bundle-choice'):get_option('eo_wbc_add_to_cart_text'));?></div>
                                                <?php } else { ?>
                                                    <div class="ui inverted button"><?php _e('Out of stock','woo-bundle-choice'); ?>
                                                    </div>
                                                <?php } ?>

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
                                              
                                              <div data-link="<?php echo $category_object->eo_wbc_prev_url(); ?>" class="ui inverted button">Change</div>

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
                                                
                                                <div data-link="<?php echo $category_object->eo_wbc_prev_url(); ?>" class="ui inverted button">Change</div>

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
                                                <?php if($curr_product->is_in_stock()){ ?>

                                                <div data-link="<?php echo $category_object->eo_wbc_product_url(get_permalink($_post->ID)); ?>" class="ui inverted button"><?php echo (empty(get_option('eo_wbc_add_to_cart_text'))?__('View and Continue','woo-bundle-choice'):get_option('eo_wbc_add_to_cart_text')) ;?></div>
                                                 <?php } else { ?>
                                                    <div class="ui inverted button"><?php _e('Out of stock','woo-bundle-choice'); ?>
                                                    </div>
                                                <?php } ?>
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
                        <!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) -->
                        <?php
                    }
                }
            }
        }
    ?>                              
    </div>
</div>
<!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) -->
<script>
    $ = jQuery;

    // supposed to be used inside wo_wbc_filter.js
    var is_card_view_rendered = true;

    /**
     * 
     */
    function wbc_attach_card_views() { 
        jQuery(".products,.product-listing,.row-inner>.col-lg-9:eq(0)").html(jQuery(".eo_wbc_hidden_data").html());
        jQuery('.special.cards .image').dimmer({on:'hover',duration:{ show : 0, hide : 0 }});
        jQuery('.button[data-link]').on('click',function(e){
            e.preventDefault();
            e.stopPropagation();
            window.location.href=$(this).attr('data-link');
        });
    }

    jQuery(document).ready(function($){
        //code moved to a function wbc_attach_card_views above so that it can be called after ajax search

        // 
        wbc_attach_card_views();
    });
</script>                    
<style type="text/css">
    .products{
        display: block !important;
    }

    .product-listing{
        display: block !important;
    }                                                
</style> 
<!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) -->        
