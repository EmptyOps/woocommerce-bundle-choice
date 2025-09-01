<?php

/*
*	Template to show breadcrumb second step for desktop
*/

?>
<div class="step <?php echo (($step==$order)?'active ':(($step>$order)?'completed ':(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb)?'':'disabled'))); ?>" style="" >            
    <div class="ui equal width middle aligned grid" style="width: 100%;padding-top: 0px;text-transform:none;font-family: 'ZapfHumanist601BT-Roman';">        

        <div class="ui column left aligned eowbc_breadcrumb_font"><?php echo $order; ?></div>
        <div class="ui column left aligned">
            <?php if(empty($second)){ ?>
                <div class="title eowbc_breadcrumb_font" <?php _e((!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb) and !empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second_url))?'data-clickable_breadcrumb="'.\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second_url.'"':''); ?>><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_choose_prefix_text',__('Choose a','woo-bundle-choice'),true,true)); ?> <?php _e($second_name); ?></div>
            <?php } else { ?>
                <div class="title eowbc_breadcrumb_font"><?php _e($second_name); ?></div>
                <div class="description eowbc_breadcrumb_font"><?php _e(/*$second->get_name()*/$second->get_title()); ?> - <?php _e(wc_price(apply_filters('eowbc_breadcrumb_second_price',$second->get_price(),$second))); ?></div>
                <div class="ui small blue text eowbc_breadcrumb_font">                
                    <u><a href="<?php echo !empty(wbc()->sanitize->get('SECOND')) ? eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('SECOND'),$order):'#'; ?>">View</a></u>&nbsp;|&nbsp;<u><a href="<?php echo !empty(wbc()->sanitize->get('SECOND'))?eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('SECOND')):'#'; ?>"><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_change_action_text','Change',true,true)); ?></a></u>
                </div>    
                
            <?php } ?>
        </div>        
        <div class="ui column mini image left aligned" style="padding-top: 0px;padding-bottom: 0px;">
            <?php if(empty($second)){ ?>
                <img src = '<?php echo $second_icon; ?>' class='ui mini image'/>
            <?php } else { 
                    global $woocommerce;
                    $image = wp_get_attachment_url($second->get_image_id());
                    if (empty($image)) {
                        $image = $woocommerce->plugin_url() . '/assets/images/placeholder.png';
                    }
                ?>

                <img src = '<?php _e($image); ?>' class='ui mini image'/>
            <?php } ?>
        </div>
    </div>        
</div>
