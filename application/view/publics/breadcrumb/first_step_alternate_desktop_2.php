<?php

/*
*	Template to show breadcrumb first step for desktop
*/

?>
<div class="step <?php echo (($step==$order)?'active ':(($step>$order)?'completed ':(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb)?'':''))); ?>" style="">            
    <div class="ui equal width middle aligned grid" style="width: 100%;padding-top: 0px;text-transform:none;font-family: '<?php echo wbc()->options->get_option('appearance_filters','header_font','Avenir'); ?>';">        

        <div class="ui column left aligned"><?php echo $order; ?></div>
        <div class="ui column left aligned">
            <?php if(empty($first)){ ?>
                <div class="title" <?php _e((!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb) and !empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first_url))?'data-clickable_breadcrumb="'.\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first_url.'"':''); ?>><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_choose_prefix_text',__('Choose a','woo-bundle-choice'),true,true)); ?> <?php _e($first_name); ?></div>
                <?php if($step!=$order and (!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb) and !empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first_url))): ?>
                    <div class="description">
                        <a style="text-decoration: underline;" href="<?php echo \eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first_url; ?>"><?php echo __('Browse','woo-bundle-choice').' '.__($first_name).'s'; ?></a>
                    </div>
                <?php endif; ?>
            <?php } else {


                $view_url = '';                
                if(!empty($first) and !is_wp_error($first)){
                    $view_url =  eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url($first->get_id(),$order);
                } else {
                    $view_url = eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('FIRST'),$order);
                }

                if(empty($view_url)){
                    $view_url = '#';
                }



                $change_url = '';
                if(!empty($first) and !is_wp_error($first)){

                    $change_url = \eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,$first->get_id());
                      
                } else {

                    $change_url = \eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('FIRST'));
                }

                if(empty($change_url)){
                    $change_url = '#';
                }

             ?>
                <div class="title"><?php _e($first_name); ?></div>
                <div class="description"><?php _e($first->get_title()); ?> - <?php _e(wc_price($first->get_price())); ?></div>
                <div class="ui small hover green text">                
                    <u><a href="<?php echo $view_url; ?>">View</a></u>&nbsp;|&nbsp;<u><a href="<?php echo $change_url; ?>"><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_change_action_text','Change',true,true)); ?></a></u>
                </div>    
                
            <?php } ?>
        </div>
        <div class="ui column mini image left aligned" style="padding-top: 0px;padding-bottom: 0px;">
            <?php if(empty($first)){ ?>
                <img src = '<?php echo $first_icon; ?>' class='ui mini image'/>
            <?php } elseif(!empty(wp_get_attachment_url($first->get_image_id()))) { ?>
                <img src = '<?php _e(wp_get_attachment_url($first->get_image_id())); ?>' class='ui mini image'/>
            <?php } ?>
        </div>
    </div>        
</div>