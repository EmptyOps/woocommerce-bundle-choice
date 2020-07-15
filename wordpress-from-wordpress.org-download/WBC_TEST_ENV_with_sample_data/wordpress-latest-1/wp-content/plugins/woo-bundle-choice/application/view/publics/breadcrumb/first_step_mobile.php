<?php

/*
*	Template to show breadcrumb first step for mobile
*/

?>
 <div class="step <?php echo (($step==$order)?'active ':(($step>$order)?'completed ':'disabled')); ?> first_mobile">
    <div class="content"><?php echo get_option('eo_wbc_first_name',''); ?></div>                          
    <div class="ui flowing popup bottom right transition hidden first_mobile" style="width:80%;">
        <div class="ui grid">
            <div class="sixe wide column" style="width: 80px;height: auto;margin: auto;">
                <?php if(!empty(self::$first)) : ?>
                <?php echo self::$first->get_image(); ?>
                <?php endif; ?>
            </div>
            <div class="ten wide column">
                <div class="ui header">
                    <?php if(!empty(self::$first)) : ?>
                    <?php _e(wc_price(self::$first->get_price())); ?>
                    <?php endif; ?>
                </div>
                <br/>
                <div class="ui equal width grid">                            
                    <u><a href="<?php echo !empty(wbc()->sanitize->get('FIRST')) ? self::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('FIRST'),$order):'#'; ?>">View</a>
                    </u>
                    <u>
                        <a href="<?php echo !empty(wbc()->sanitize->get('FIRST'))?self::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('FIRST')):'#'; ?>">Remove</a>
                    </u>
                </div>  
            </div>                
        </div>
    </div> 
</div>
<script>
    jQuery(document).ready(function(){
        jQuery('.step.completed.first_mobile').popup({
            popup : jQuery('.ui.popup.first_mobile'),
            on    : 'click',
            target   :jQuery('.step.completed.first_mobile').parent(),
            position : 'bottom left',
            inline: true
        });
    });
</script>