<?php

/*
*   Template to show breadcrumb second step for desktop
*/

?>
<div class="<?php echo (($step==$order)?'active ':(($step>$order)?'completed ':'disabled')); ?> step">
    <div class="ui equal width grid" style="width: 100%;margin-top: -1em !important;">
        <div class="ui grid">
            <div class="column"><?php echo $order; ?></div>
            <div class="column" style="text-align: left;">
                <div class="description">Choose a</div>
                <div class="title"><?php _e($second_name) ?></div>
            </div>
        </div>
        <?php if(empty($second)):?>
        <div class="column ">&nbsp;</div>
        <div class="column" <?php echo empty($second_icon)?'style="visibility: hidden;"':""; ?>>
            <img src="<?php echo $second_icon; ?>" class="ui mini image">
        </div>
        <?php else: ?>                
            <div class="column  product_image_section" style="padding-top: 0px;padding-bottom: 0px;">
                <?php echo $second->get_image(); ?>
            </div>
            <div class="column " style="font-size: x-small;">
                <?php _e(wc_price($second->get_price())); ?>
                <br/>
                <u><a href="<?php echo (!empty(wbc()->sanitize->get('SECOND'))?eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('SECOND'),$order):'#'); ?>">View</a></u>&nbsp;|&nbsp;<u><a href="<?php echo (!empty(wbc()->sanitize->get('SECOND'))?eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('SECOND')):'#'); ?>"><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_change_action_text','Change',true,true)); ?></a></u>
            </div>                
    <?php endif; ?>            
    </div>
</div>