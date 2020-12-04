<?php

/*
*	Template to show breadcrumb first step for desktop
*/

?>


<div class="onclick_redirect step <?php echo ($step==$order)?'active ':' '; ?>" data-begin="<?php echo get_term_link(get_term_by('slug', $first_slug, 'product_cat')->term_id,'product_cat').'EO_WBC=1&BEGIN='.$first_slug.'&STEP=1'; ?>" <?php _e((!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb) and !empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first_url))?'data-clickable_breadcrumb="'.\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first_url.'"':''); ?>>            
    <div class="ui equal width grid" style="width: 100%;margin-top: -1em !important;" >

        <div class="column">1</div>
        <div class="column" style="text-align: left;">                       
            <?php if(empty($first)):?>        
                <div class="description"><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_choose_prefix_text',__('Choose a','woo-bundle-choice'),true,true)); ?></div>
                <div class="title"><?php echo $first_name; ?></div>
                <div>&nbsp;</div>
            <?php else:?>
                <?php 
                    $view_url = '';                
                    if(!empty($first) and !is_wp_error($first)){
                        $view_url =  eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url($first->get_id(),$order);
                    } else {
                        $view_url = eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('FIRST'),$order);
                    }

                    if(empty($view_url)){
                        $view_url = '#';
                    }



                    $change_url = '';
                    if(!empty($first) and !is_wp_error($first)){

                        $change_url = \eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,$first->get_id());
                          
                    } else {

                        $change_url = \eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('FIRST'));
                    }

                    if(empty($change_url)){
                        $change_url = '#';
                    }                           
                if(empty($view_url) or $view_url=='#'){
                    ?>
                        <div class="description">Choose a</div>
                        <div class="title"><?php echo $first_name; ?></div>
                        <div>&nbsp;</div>
                    <?php
                } else {
                    ?>
                <div class="description"><?php _e($first_name); ?></div>
                <div><?php _e(get_woocommerce_currency().wc_price($first->get_price())); ?></div>
                
                <div><u><a href="<?php echo $view_url; ?>">View</a></u>&nbsp;|&nbsp;<u><a href="<?php echo $change_url; ?>" data-remove-url="<?php echo $change_url; ?>"><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_change_action_text','Change',true,true)); ?></a></u></div>
            <?php } endif; ?>                    
        </div>                
        <div class="column">
            <?php if(!empty($first_icon)): ?>
                <img src="<?php echo $first_icon; ?>" style="margin: auto;" class="ui mini image">
            <?php endif;?>
        </div>
    </div>            
</div>