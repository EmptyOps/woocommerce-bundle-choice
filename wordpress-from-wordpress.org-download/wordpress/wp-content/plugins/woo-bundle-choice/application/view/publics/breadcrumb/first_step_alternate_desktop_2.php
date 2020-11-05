<?php

/*
*	Template to show breadcrumb first step for desktop
*/

?>
<div class="step <?php echo (($step==$order)?'active ':(($step>$order)?'completed ':'disabled')); ?>" style="">            
    <div class="ui equal width middle aligned grid" style="width: 100%;padding-top: 0px;text-transform:none;font-family: 'ZapfHumanist601BT-Roman';">        

        <div class="ui column left aligned"><?php echo $order; ?></div>
        <div class="ui column left aligned">
            <?php if(empty($first)){ ?>
                <div class="title">Choose a <?php _e($first_name); ?></div>
            <?php } else { ?>
                <div class="title"><?php _e($first_name); ?></div>
                <div class="description"><?php _e($first->get_name()); ?> - <?php _e(wc_price($first->get_price())); ?></div>
                <div class="ui small hover green text">                
                    <u><a href="<?php echo !empty(wbc()->sanitize->get('FIRST')) ? eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('FIRST'),$order):'#'; ?>">View</a></u>&nbsp;|&nbsp;<u><a href="<?php echo !empty(wbc()->sanitize->get('FIRST'))?eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('FIRST')):'#'; ?>"><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_change_action_text','Change',true,true)); ?></a></u>
                </div>    
                
            <?php } ?>
        </div>
        <div class="ui column mini image left aligned" style="padding-top: 0px;padding-bottom: 0px;">
            <?php if(empty($first)){ ?>
                <img src = '<?php echo $first_icon; ?>' class='ui mini image'/>
            <?php } else { ?>
                <img src = '<?php _e(wp_get_attachment_url($first->get_image_id())); ?>' class='ui mini image'/>
            <?php } ?>
        </div>
    </div>        
</div>