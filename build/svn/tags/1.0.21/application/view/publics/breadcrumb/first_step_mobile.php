<?php

/*
*	Template to show breadcrumb first step for mobile
*/

?>
 <style type="text/css">
     .ui.container.unstackable.steps .step:after{
        display: none !important;        
     }

    .ui.container.unstackable.steps .step{
        padding: 2vw;        
        text-align: center !important;
    }

 </style>
 <div class="step <?php echo (($step==$order)?'active ':(($step>$order)?'completed ':(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb)?'':'disabled') )); ?> first_mobile" >
    <div class="content eowbc_breadcrumb_font" <?php _e((!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb) and !empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first_url))?'data-clickable_breadcrumb="'.\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first_url.'"':''); ?>><?php echo \eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first_name; ?></div>                          
    <div class="ui flowing popup bottom right transition hidden first_mobile" style="width:80%;">
        <div class="ui grid">
            <div class="sixe wide column eowbc_breadcrumb_font" style="width: 80px;height: auto;margin: auto;">
                <?php if(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first)) : ?>
                <?php echo \eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first->get_image(); ?>
                <?php endif; ?>
            </div>
            <div class="ten wide column">
                <div class="ui header eowbc_breadcrumb_font">
                    <?php if(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first)) : ?>
                    <?php _e(wc_price( apply_filters('eowbc_breadcrumb_first_price',\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first->get_price(),\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first))); ?>
                    <?php endif; ?>
                </div>
                <br/>
                <div class="ui equal width grid eowbc_breadcrumb_font">                            
                    <u><a href="<?php echo !empty(wbc()->sanitize->get('FIRST')) ? \eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('FIRST'),$order):'#'; ?>">View</a>
                    </u>
                    <u>
                        <a href="<?php echo !empty(wbc()->sanitize->get('FIRST'))?\eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('FIRST')):'#'; ?>"><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_change_action_text','Change',true,true)); ?></a>
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