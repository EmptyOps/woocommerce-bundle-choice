<?php

/*
*   Template to show breadcrumb second step for desktop
*/

 $view_url = '';                
if(!empty($second_obj) and !is_wp_error($second_obj)){
    $view_url =  eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url($second_obj->get_id(),$order);
} else {
    $view_url = eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('SECOND'),$order);
}

if(empty($view_url)){
    $view_url = '#';
}



$change_url = '';
if(!empty($second_obj) and !is_wp_error($second_obj)){

    $change_url = \eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,$second_obj->get_id());
      
} else {

    $change_url = \eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('SECOND'));
}

if(empty($change_url)){
    $change_url = '#';
}

?>
<div class="step <?php echo (($step==$order)?'active ':(($step>$order)?'completed ':(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb)?'':' '))); ?>" style="" >            
    <div class="ui equal width middle aligned grid" style="width: 100%;padding-top: 0px;text-transform:none;font-family: '<?php echo wbc()->options->get_option('appearance_filters','header_font','ZapfHumanist601BT-Roman'); ?>';">        

        <div class="ui column left aligned"><?php echo $order; ?></div>
        <div class="ui column left aligned">
            <?php if(empty($second_obj)){ ?>
                <div class="title" <?php _e((!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb) and !empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second_url))?'data-clickable_breadcrumb="'.\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second_url.'"':''); ?>><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_choose_prefix_text',__('Choose a','woo-bundle-choice'),true,true)); ?></div>
                <div><?php echo \eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second_name; ?></div>
            <?php } else { ?>
                <div class="title"><?php echo \eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second_name; ?></div>                
                <div class="ui small blue text">                
                    <u><a href="<?php echo $view_url; ?>">View</a></u>&nbsp;|&nbsp;<u><a href="<?php echo $change_url; ?>"><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_change_action_text','Change',true,true)); ?></a></u>
                </div>    
                
            <?php } ?>
        </div>
    </div>        
</div>
