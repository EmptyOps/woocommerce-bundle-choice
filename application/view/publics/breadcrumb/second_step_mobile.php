<?php

/*
*	Template to show breadcrumb first step for mobile
*/

?>
<div class="step <?php echo (($step==$order)?'active ':(($step>$order)?'completed ':(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb)?'':'disabled'))); ?> second_mobile" <?php _e((!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb) and !empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second_url))?'data-clickable_breadcrumb="'.\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second_url.'"':''); ?>>
    <div class="content"><?php echo \eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second_name; ?></div>
    <div class="ui flowing popup bottom right transition hidden second_mobile" style="width: 80%;">
        <div class="ui grid">
            <div class="six wide column" style="width: 80px;height: auto;margin: auto;">
                <?php if(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second)) : ?>
                <?php echo \eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second->get_image(); ?>
                <?php endif; ?>
            </div>
            <div class="ten wide column">
                <div class="ui header">
                    <?php if(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second)) : ?>
                    <?php _e(wc_price(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second->get_price())); ?>
                    <?php endif; ?>
                </div>
                <br/>
                <div class="ui equal width grid">                            
                    <u><a href="<?php echo !empty(wbc()->sanitize->get('SECOND')) ? \eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('SECOND'),$order):'#'; ?>"><?php _e('View','woo-bundle-choice'); ?></a>
                    </u>
                    <u>
                        <a href="<?php echo !empty(wbc()->sanitize->get('SECOND'))?\eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('SECOND')):'#'; ?>"><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_change_action_text','Change',true,true)); ?></a>
                    </u>
                </div>  
            </div>                
        </div>
    </div>                          
</div>
<script>
    jQuery(document).ready(function(){
        jQuery('.step.completed.second_mobile').popup({
            popup : jQuery('.ui.popup.second_mobile'),
            on    : 'click',
            target   :jQuery('.step.completed.second_mobile').parent(),
            position : 'bottom left',
            inline: true
        });
    });
</script>