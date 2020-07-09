<?php

/*
*   Template to show breadcrumb first step for desktop
*/

?>
<style type="text/css">
    .ui.grid>* {
     padding-left: 5px; 
     padding-right: 0px !important;
}

.eo-wbc-container>.ui.steps .step .column.product_image_section img{
    margin-left: 30% !important;
}

.eo-wbc-container>.ui.steps .step.active:after {
    background: linear-gradient(to bottom left, rgb(255, 255, 255) 50%, rgba(247, 247, 247, 0.98) 50%);
}

.eo-wbc-container>.ui.steps .step:after {
    width: 3.2em;
    height: 3.2em;
    border-radius: 0 0 5px 0;
    box-shadow: 0 2px 0 #efefef;
}

.ui.steps {
    box-shadow: 2px 2px 0 #efefef !important; 
}
.eo-wbc-container>.ui.steps .step.active {
    background: linear-gradient(to bottom, rgb(255, 255, 255) 50%, rgba(247, 247, 247, 0.98) 50%);
}

</style>
<div class="step <?php echo (($step==$order)?'active ':(($step>$order)?'completed ':'disabled')); ?>" style="">            
    <div class="ui equal width grid" style="width: 100%;margin-top: -1em !important;">
        <div class="ui grid">
            <div class="column"><?php echo $order; ?></div>
            <div class="column" style="text-align: left;">                        
                <div class="description">Choose a</div>
                <div class="title"><?php _e($first_name); ?></div>
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
        <div class="column " style="font-size: x-small;">
            <?php _e(wc_price($first->get_price())); ?>
            <br/>
            <u><a href="<?php echo !empty(wbc()->sanitize->get('FIRST')) ? eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('FIRST'),$order):'#'; ?>">View</a></u>&nbsp;|&nbsp;<u><a href="<?php echo !empty(wbc()->sanitize->get('FIRST'))?eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('FIRST')):'#'; ?>">Remove</a></u>
        </div>                        
        
    <?php endif; ?>
    </div>            
</div>