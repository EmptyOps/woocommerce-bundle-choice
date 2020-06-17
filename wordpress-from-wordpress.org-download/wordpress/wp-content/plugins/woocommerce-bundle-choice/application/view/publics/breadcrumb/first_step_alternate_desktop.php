<?php

/*
*	Template to show breadcrumb first step for desktop
*/

?>
<div class="onclick_redirect step <?php echo ($step==$order)?'active ':' '; ?>" data-begin="<?php echo get_option('eo_wbc_first_url').'EO_WBC=1&BEGIN='.get_option('eo_wbc_first_slug').'&STEP=1'; ?>">            
    <div class="ui equal width grid" style="width: 100%;margin-top: -1em !important;">
        <div class="column">1</div>
        <div class="column" style="text-align: left;">                       
            <?php if(empty(self::$first)):?>        
                <div class="description">Choose a</div>
                <div class="title"><?php echo get_option('eo_wbc_first_name',''); ?></div>
                <div>&nbsp;</div>
            <?php else:?>
                <?php 
                    $view_url = !empty($_GET['FIRST']) ? self::eo_wbc_breadcrumb_view_url(sanitize_text_field($_GET['FIRST']),$order):'#';
                    $remove_url = !empty($_GET['FIRST'])?self::eo_wbc_breadcrumb_change_url($order,sanitize_text_field($_GET['FIRST'])):'#';                            
                    if(empty($remove_url) or $remove_url=='#'){
                        $remove_url = !empty($_GET['FIRST'])?self::eo_wbc_breadcrumb_change_url($order,sanitize_text_field(self::$first)):'#';
                    }                            
                if(empty($view_url) or $view_url=='#'){
                    ?>
                        <div class="description">Choose a</div>
                        <div class="title"><?php echo get_option('eo_wbc_first_name',''); ?></div>
                        <div>&nbsp;</div>
                    <?php
                } else {
                    ?>
                <div class="description"><?php echo get_option('eo_wbc_first_name',''); ?></div>
                <div><?php _e(get_woocommerce_currency().wc_price(self::$first->get_price())); ?></div>
                
                <div><u><a href="<?php echo $view_url; ?>">View</a></u>&nbsp;|&nbsp;<u><a href="<?php echo $remove_url; ?>" data-remove-url="<?php echo $remove_url; ?>">Remove</a></u></div>
            <?php } endif; ?>                    
        </div>                
        <div class="column">
            <img src="<?php echo wp_get_attachment_url(get_option('eo_wbc_first_icon')); ?>" style="margin: auto;">
        </div>
    </div>            
</div>