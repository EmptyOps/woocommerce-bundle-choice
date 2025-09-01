<?php

/*
*	Template to show breadcrumb first step for desktop
*/

?>


<div class="onclick_redirect step <?php echo ($step==$order)?'active ':' '; ?>" data-begin="<?php echo get_term_link(wbc()->wc->get_term_by('slug', $first_slug, 'product_cat')->term_id,'product_cat').'EO_WBC=1&BEGIN='.$first_slug.'&STEP=1'; ?>" <?php _e((!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb) and !empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first_url))?'data-clickable_breadcrumb="'.\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first_url.'"':''); ?>>            
    <div class="ui equal width grid" style="width: 100%;margin-top: -1em !important;" >

        <div class="column eowbc_breadcrumb_font"><?php _e($order,'woo-bundle-choice'); ?></div>
        <div class="column eowbc_breadcrumb_font" style="text-align: left;">                       
            <?php if(empty($first)):?>        
                <div class="description eowbc_breadcrumb_font"><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_choose_prefix_text',__('Choose a','woo-bundle-choice'),true,true)); ?></div>
                <div class="title eowbc_breadcrumb_font"><?php echo $first_name; ?></div>
                <div>&nbsp;</div>
            <?php else:?>
                <?php 
                    $view_url = !empty(wbc()->sanitize->get('FIRST')) ? eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('FIRST'),$order):'#';
                    $remove_url = !empty(wbc()->sanitize->get('FIRST'))?eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('FIRST')):'#';                            
                    if(empty($remove_url) or $remove_url=='#'){
                        $remove_url = !empty(wbc()->sanitize->get('FIRST'))?eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,sanitize_text_field($first)):'#';
                    }                            
                if(empty($view_url) or $view_url=='#'){
                    ?>
                        <div class="description eowbc_breadcrumb_font">Choose a</div>
                        <div class="title eowbc_breadcrumb_font"><?php echo $first_name; ?></div>
                        <div>&nbsp;</div>
                    <?php
                } else {
                    ?>
                <div class="description eowbc_breadcrumb_font"><?php _e($first_name); ?></div>
                <div><?php /*_e(get_woocommerce_currency().wc_price($first->get_price()));*/ ?><?php _e(wc_price(apply_filters('eowbc_breadcrumb_first_price',$first->get_price(),$first))); ?></div>
                
                <div><u><a href="<?php echo $view_url; ?>">View</a></u>&nbsp;|&nbsp;<u><a href="<?php echo $remove_url; ?>" data-remove-url="<?php echo $remove_url; ?>"><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_change_action_text','Change',true,true)); ?></a></u></div>
            <?php } endif; ?>                    
        </div>                
        <div class="column">
            <?php if(!empty($first_icon)): ?>
                <img src="<?php echo $first_icon; ?>" style="margin: auto;" class="ui mini image">
            <?php endif;?>
        </div>
    </div>            
</div>