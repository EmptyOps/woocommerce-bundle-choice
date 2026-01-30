<?php

/*
*	Template to show breadcrumb second step for desktop
*/

?>

<div class="onclick_redirect step <?php echo esc_attr(($step == $order) ? 'active ' : ' '); ?>" data-begin="<?php echo esc_url(get_term_link(wbc()->wc->get_term_by('slug', $second_slug, 'product_cat')->term_id, 'product_cat') . 'EO_WBC=1&BEGIN=' . $second_slug . '&STEP=1'); ?>" <?php _e((!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb) && !empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second_url)) ? 'data-clickable_breadcrumb="' . esc_url(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second_url) . '"' : ''); ?>>            

    <div class="ui equal width grid" style="width: 100%;margin-top: -1em !important;">
        <div class="column eowbc_breadcrumb_font"><?php esc_html_e($order,'woo-bundle-choice'); ?></div>
        <div class="column eowbc_breadcrumb_font" style="text-align: left;">

            <?php if(empty($second)):?>        
                <div class="description eowbc_breadcrumb_font"><?php esc_html_e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_choose_prefix_text',__('Choose a','woo-bundle-choice'),true,true)); ?></div>
                <div class="title eowbc_breadcrumb_font"><?php esc_html_e($second_name); ?></div>
                <div>&nbsp;</div>
            <?php else:?>
                <?php 
                    $view_url = !empty(wbc()->sanitize->get('SECOND')) ? eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('SECOND'),$order):'#';
                    $remove_url = !empty(wbc()->sanitize->get('SECOND'))?eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('SECOND')):'#';

                    if(empty($remove_url) or $remove_url=='#'){
                        $remove_url = !empty(wbc()->sanitize->get('SECOND'))?eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,sanitize_text_field($second)):'#';
                    }                                            
                if(empty($view_url) or $view_url=='#'){
                    ?>
                        <div class="description eowbc_breadcrumb_font">Choose a</div>
                        <div class="title eowbc_breadcrumb_font"><?php esc_html_e($second_name) ?></div>
                        <div>&nbsp;</div>
                    <?php
                } else {
                ?>
                <div class="description eowbc_breadcrumb_font"><?php esc_html_e($second_name); ?></div>
                <div><?php /*_e(get_woocommerce_currency().wc_price($second->get_price()));*/ ?><?php esc_html_e(wc_price(apply_filters('eowbc_breadcrumb_second_price',$second->get_price(),$second))); ?></div>
                
                <div>
                    <u><a href="<?php echo esc_url($view_url); ?>"><?php esc_html(spext_lang("View", 'woo-bundle-choice')); ?></a></u>&nbsp;|&nbsp;<u><a href="<?php echo esc_url($remove_url); ?>" data-remove-url="<?php echo esc_url($remove_url); ?>"><?php esc_html_e(wbc()->options->get_option('appearance_breadcrumb', 'appearance_breadcrumb_change_action_text', 'Change', true, true)); ?></a></u></div>
            <?php } endif; ?>                    
        </div>                
        <div class="column">
            <?php if(!empty($second_icon)): ?>
                <img src="<?php echo esc_url($second_icon);?>" style="margin: auto;" class="ui mini image">
            <?php endif;?>
        </div>
    </div>            
</div>
