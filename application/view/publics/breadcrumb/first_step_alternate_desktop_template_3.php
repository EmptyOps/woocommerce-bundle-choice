<?php

/*
*	Template to show breadcrumb first step for desktop
*/

?>
<style type="text/css">
    .eo-wbc-container.container .ui.grid>* {
         padding-left: 5px; 
         padding-right: 0px !important;
    }

    .eo-wbc-container>.ui.steps .step .column.product_image_section img{
        margin-left: 30% !important;
    }

    .eo-wbc-container>.ui.steps .step:after {
        height: 3.5em !important;
        width: 3.5em !important;
    }

    /*.eo-wbc-container.container .ui.steps {
        border: 1px solid lightgray;
        box-shadow: 2px 2px 0 #efefef;
        padding: 4px;
    }*/
</style>
<div class="step <?php echo (($step==$order)?'active ':(($step>$order)?'completed ':(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb)?'':'disabled'))); ?>" style="" >            
    <div class="ui equal width grid" style="width: 100%;margin-top: -1em !important;">
        <div class="ui grid">
            <div class="column eowbc_breadcrumb_font"><?php echo $order; ?></div>
            <div class="column" style="text-align: left;">                        
                <div class="description eowbc_breadcrumb_font" <?php _e((!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb) and !empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first_url))?'data-clickable_breadcrumb="'.\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first_url.'"':''); ?>><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_choose_prefix_text',__('Choose a','woo-bundle-choice'),true,true)); ?></div>
                <div class="title eowbc_breadcrumb_font"><?php _e($first_name); ?></div>
            </div>
        </div>
        <?php if(empty($first)):?>
        <div class="column ">&nbsp;</div>
        <div class="column" <?php echo empty($first_icon)?'style="visibility: hidden;"':""; ?>>
            <img src="<?php echo $first_icon; ?>" class="ui mini image">
        </div>
        <?php else: ?>
        <div class="column  product_image_section" style="padding-top: 0px;padding-bottom: 0px;">
            <?php echo $first->get_image(); ?>
        </div>
        <div class="column eowbc_breadcrumb_font" style="font-size: x-small;">
            <?php _e(wc_price(apply_filters('eowbc_breadcrumb_first_price',$first->get_price(),$first))); ?>
            <br/>
            <u><a href="<?php echo \eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url($first->get_id(),$order); //echo !empty(wbc()->sanitize->get('FIRST')) ? eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('FIRST'),$order):'#'; ?>">View</a></u>&nbsp;|&nbsp;<u><a href="<?php echo \eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,$first->get_id())//!empty(wbc()->sanitize->get('FIRST'))?eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('FIRST')):'#'; ?>"><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_change_action_text','Change',true,true)); ?></a></u>
        </div>                        
        
    <?php endif; ?>
    </div>            
</div>