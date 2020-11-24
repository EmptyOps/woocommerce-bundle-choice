<?php

/*
*	Template to show breadcrumb first step for mobile
*/

?>
<style type="text/css">
    <?php $fg_color=wbc()->options->get_option('appearance_breadcrumb','breadcrumb_backcolor_active',wbc()->session->get('EO_WBC_BG_COLOR','#dbdbdb')); ?> 
    .ui.steps .step .title{font-family: <?php _e(wbc()->options->get_option('appearance_filters','header_font','ZapfHumanist601BT-Roman')); ?> !important; 
    }
    .unstackable.ui.steps .step:not(:first-of-type):before{
            content: '';
            display: block;
            border-top: 3.6em solid transparent;            
            border-bottom: 3.6em solid transparent;
            border-left: 1em solid white;
            height: 0px;
            width: 0px;
            left:-1px;
            top: -0.1em;
            position: absolute;         
    } 
    .unstackable.ui.steps .step.active{
        border-left: 0px !important;
        border-right: 0px !important;
        background-color: <?php _e(wbc()->options->get_option('appearance_breadcrumb','breadcrumb_backcolor_active','#dbdbdb')); ?>;; 
    }
    .unstackable.ui.steps .step.active+.step:before{
        border-left-color: <?php _e(wbc()->options->get_option('appearance_breadcrumb','breadcrumb_backcolor_active','#dbdbdb')); ?>;;     
    }
    
    .unstackable.ui.steps .step:not(.active){
        background-color: <?php _e(wbc()->options->get_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff')); ?>;; 
    }

    .unstackable.ui.steps .step:not(.active)+.step:before{
        border-left-color: <?php _e(wbc()->options->get_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff')); ?>;;     
    }

    .unstackable.ui.steps .step .column:first-child{
        padding: 0.3em;
        max-width: 1em;
        font-size: xx-large;
    }
    .unstackable.ui.steps .step .column:not(:first-child){
        padding-left: 0em;
        padding-right: 0em;
    }
    .unstackable.ui.steps .step .title{
        font-weight: 100;
    }

    .unstackable.ui.steps .step .ui.small.text{
        font-size: x-small;
    }
    .unstackable.ui.steps .step:first-of-type{
        padding-left:0em;
    }
    .unstackable.ui.steps .step { padding-top: 1em !important; padding-bottom: 1em !important;padding-left: 1em; padding-right: 0; }
    .unstackable.ui.steps .step:after {
        content: '';
        display: block;
        border-top: 3.5em solid transparent;
        border-bottom: 3.5em solid transparent;
        border-left: 1em solid <?php _e(wbc()->options->get_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff')); ?>;           
        height: 0px;
        width: 0px;
        top: 0;
        position: absolute;
        right: -1em;
        transition: none !important;
        transform: none !important;
        background-color:transparent !important;
        border-right: 1px solid transparent;
    }
    .unstackable.ui.steps .step.active::after {
        border-left: 1em solid <?php _e($fg_color); ?> !important;
    }
    .unstackable.ui.steps{
        height:7em;         
    }

    .ui.steps .step .title{
        font-size: 1em !important;
    }

    @media screen and (max-width: 410px) {
        .unstackable.ui.steps .step.active::after{
            right: -2.6em !important;
        }
        .unstackable.ui.steps .step:after{
            right: -2.6em !important;   
        }
    }

</style>
 <div class="step <?php echo (($step==$order)?'active ':(($step>$order)?'completed ':(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb)?'':'disabled'))); ?>" style="">            
    <div class="ui equal width middle aligned grid" style="width: 100%;padding-top: 0px;text-transform:none;font-family: '<?php echo wbc()->options->get_option('appearance_filters','header_font','ZapfHumanist601BT-Roman'); ?>';">        

        <div class="ui column left aligned"><?php echo $order; ?></div>
        <div class="ui column left aligned">
            <?php if(empty($first_obj)){ ?>
                <div class="title" <?php _e((!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb) and !empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first_url))?'data-clickable_breadcrumb="'.\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first_url.'"':''); ?>><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_choose_prefix_text',__('Choose a','woo-bundle-choice'),true,true)); ?></div>
                <div><?php _e($first); ?></div>
            <?php } else { ?>
                <div class="title"><?php _e($first); ?></div>                
                <div class="ui small hover green text">                
                    <u><a href="<?php echo !empty(wbc()->sanitize->get('FIRST')) ? eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('FIRST'),$order):'#'; ?>">View</a></u>&nbsp;|&nbsp;<u><a href="<?php echo !empty(wbc()->sanitize->get('FIRST'))?eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('FIRST')):'#'; ?>"><?php _e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_change_action_text','Change',true,true)); ?></a></u>
                </div>    
                
            <?php } ?>
        </div>       
    </div>        
</div>