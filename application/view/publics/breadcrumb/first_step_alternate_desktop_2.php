<?php

/*
*	Template to show breadcrumb first step for desktop
*/

?>
<div class="step <?php echo (($step==$order)?'active ':(($step>$order)?'completed ':(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb)?'':'disabled'))); ?>" style="">            
    <div class="ui equal width middle aligned grid" style="width: 100%;padding-top: 0px;text-transform:none;font-family: 'ZapfHumanist601BT-Roman';">        

        <div class="ui column left aligned eowbc_breadcrumb_font"><?php echo $order; ?></div>
        <div class="ui column left aligned eowbc_breadcrumb_font">
            <?php if(empty($first)){ ?>
                <div class="title eowbc_breadcrumb_font" <?php _e((!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb) and !empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first_url))?'data-clickable_breadcrumb="'.\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first_url.'"':''); ?>><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_choose_prefix_text',__('Choose a','woo-bundle-choice'),true,true)); ?> <?php _e($first_name); ?></div>
            <?php } else { ?>
                <div class="title eowbc_breadcrumb_font"><?php _e($first_name); ?></div>
                <div class="description eowbc_breadcrumb_font"><?php _e(/*$first->get_name()*/$first->get_title()); ?> - <?php _e(wc_price(apply_filters('eowbc_breadcrumb_first_price',$first->get_price(),$first))); ?></div>
                <div class="ui small hover green text eowbc_breadcrumb_font">                
                    <u><a href="<?php echo !empty(wbc()->sanitize->get('FIRST')) ? eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('FIRST'),$order):'#'; ?>">View</a></u>&nbsp;|&nbsp;<u><a href="<?php echo !empty(wbc()->sanitize->get('FIRST'))?eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('FIRST')):'#'; ?>"><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_change_action_text','Change',true,true)); ?></a></u>
                </div>    
                
            <?php } ?>
        </div>
        <div class="ui column mini image left aligned" style="padding-top: 0px;padding-bottom: 0px;">
            <?php if(empty($first)){ ?>
                <img src = '<?php echo $first_icon; ?>' class='ui mini image'/>
            <?php } else { 
                    global $woocommerce;
                    $image = wp_get_attachment_url($first->get_image_id());
                    if (empty($image)) {
                        $image = $woocommerce->plugin_url() . '/assets/images/placeholder.png';
                    }

                ?>
                <img src = '<?php _e($image); ?>' class='ui mini image'/>
            <?php } ?>
        </div>
    </div>        
</div>