<?php

/*
*	Template to show breadcrumb second step for desktop
*/

?>
<!-- <div class="<?php //echo (($step==$order)?'active ':(($step>$order)?'completed ':'disabled')); ?> step">
    <div class="ui equal width grid" style="width: 100%;margin-top: -1em !important;">
        <div class="ui grid">
            <div class="column"><?php //echo $order; ?></div>
            <div class="column" style="text-align: left;">
                <div class="description">Choose a</div>
                <div class="title"><?php //echo wbc()->options->get_option('configuration','second_name','')/*get_option('eo_wbc_second_name','')*/; ?></div>
            </div>
        </div>
        <?php //if(empty($second)):?>
        <div class="column ">&nbsp;</div>
        <div class="column" <?php //echo empty(wp_get_attachment_url(wbc()->options->get_option('configuration','second_icon')/*get_option('eo_wbc_second_icon')*/))?'style="visibility: hidden;"':""; ?>>
            <img src="<?php //echo wp_get_attachment_url(wbc()->options->get_option('configuration','second_icon')/*get_option('eo_wbc_second_icon')*/); ?>">
        </div>
        <?php //else: ?>                
            <div class="column  product_image_section" style="padding-top: 0px;padding-bottom: 0px;">
                <?php //echo $second->get_image(); ?>
            </div>
            <div class="column " style="font-size: x-small;">
                <?php //_e(wc_price($second->get_price())); ?>
                <br/>
                <u><a href="<?php //echo $view_url; ?>">View</a></u>&nbsp;|&nbsp;<u><a href="<?php //echo $change_url; ?>">Remove</a></u>
            </div>                
    <?php //endif; ?>            
    </div>
</div> -->
<div class="<?php echo (($step==$order)?'active ':(($step>$order)?'completed ':'disabled')); ?> step">
    <div class="ui equal width grid" style="width: 100%;margin-top: -1em !important;">
        <div class="ui grid">
            <div class="column"><?php echo $order; ?></div>
            <div class="column" style="text-align: left;">
                <div class="description">Choose a</div>
                <div class="title"><?php echo get_option('eo_wbc_second_name',''); ?></div>
            </div>
        </div>
        <?php if(empty(self::$second)):?>
        <div class="column ">&nbsp;</div>
        <div class="column" <?php echo empty(wp_get_attachment_url(get_option('eo_wbc_second_icon')))?'style="visibility: hidden;"':""; ?>>
            <img src="<?php echo wp_get_attachment_url(get_option('eo_wbc_second_icon')); ?>">
        </div>
        <?php else: ?>                
            <div class="column  product_image_section" style="padding-top: 0px;padding-bottom: 0px;">
                <?php echo self::$second->get_image(); ?>
            </div>
            <div class="column " style="font-size: x-small;">
                <?php _e(wc_price(self::$second->get_price())); ?>
                <br/>
                <u><a href="<?php echo (!empty($_GET['SECOND'])?self::eo_wbc_breadcrumb_view_url(sanitize_text_field($_GET['SECOND']),$order):'#'); ?>">View</a></u>&nbsp;|&nbsp;<u><a href="<?php echo (!empty($_GET['SECOND'])?self::eo_wbc_breadcrumb_change_url($order,sanitize_text_field($_GET['SECOND'])):'#'); ?>">Remove</a></u>
            </div>                
    <?php endif; ?>            
    </div>
</div>