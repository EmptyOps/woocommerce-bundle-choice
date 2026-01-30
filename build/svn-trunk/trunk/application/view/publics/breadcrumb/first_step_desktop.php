<?php

/*
*   Template to show breadcrumb first step for desktop
*/

$model_images = \eo\wbc\model\Images::instance();

?>
<?php

    //NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
    $custom_css = "
        .eo-wbc-container.container:not(.filters) .ui.grid:not(.eo_wbc_filter_icon)>* {
            padding-left: 5px;
            padding-right: 0px !important;
        }

        .eo-wbc-container>.ui.steps .step .column.product_image_section img {
            margin-left: 30% !important;
        }

        .eo-wbc-container>.ui.steps .step:after {
            border-radius: 0 0 5px 0;
        }

        .eo-wbc-container>.ui.steps {
            box-shadow: 2px 2px 0 #efefef !important;
        }

        .eo-wbc-container>.ui.steps * {
            margin: auto !important;
        }

        /*--------Breadcumb  @tejas 08-02-2023 responsive---------*/
        @media only screen and (max-width: 768px) {
            body .eo-wbc-container.spui-semantic-breadcrumb>.ui.steps .step {
                padding-left: 2em !important;
            }
            body .eo-wbc-container.spui-semantic-breadcrumb>.ui.steps .step .column.product_image_section img {
                margin-left: 0 !important;
            }
        }

        @media only screen and (max-width: 767px) {
            .ui.steps:not(.unstackable) .step:after {
                display: none!important;
            }
            body .eo-wbc-container.spui-semantic-breadcrumb>.ui.steps .step {
                padding-left: 1em !important;
            }
        }

        @media only screen and (max-width: 325px) {
            body .eo-wbc-container.spui-semantic-breadcrumb>.ui.steps .step:first-child {
                padding-left: 0em !important;
            }
            body .eo-wbc-container.spui-semantic-breadcrumb>.ui.steps .step {
                padding-left: 0em !important;
            }
            body .eo-wbc-container.spui-semantic-breadcrumb>.ui.steps .step .column.product_image_section img {
                margin-left: 0% !important;
            }
        }
    ";
    wbc()->load->add_inline_style('', $custom_css,'common');    
?>


<div class="step spui-semantic-step <?php echo esc_attr((($step==$order)?'active ':(($step>$order)?'completed ':(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb)?'':(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb)?'':'disabled'))))); ?>" style="" >            
    <div class="ui equal width grid" style="width: 100%;margin-top: -1em !important;">
        <div class="ui grid" style="width: fit-content !important;">
            <div class="column eowbc_breadcrumb_font"><?php echo esc_html($order); ?></div>
            <div class="column " style="text-align: left;">                        
                <div class="description eowbc_breadcrumb_font" <?php _e((!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb) and !empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first_url))?'data-clickable_breadcrumb="'.esc_url(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$first_url).'"':''); ?>><?php esc_html_e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_choose_prefix_text',__('Choose a','woo-bundle-choice'),true,true)); ?></div>
                <div class="title eowbc_breadcrumb_font"><?php esc_html_e($first_name); ?></div>
            </div>
        </div>
        <?php //echo"text??1"; echo \eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url($first->get_id(),$order,$first); die(); ?>
        <?php if(empty($first)):?>
        <div class="column ">&nbsp;</div>
        <div class="column" <?php echo empty($first_icon)?'style="visibility: hidden;"':""; ?>>
            <img src="<?php echo esc_url($first_icon); ?>" class="ui mini image">
        </div>
        <?php else: ?>
        <div class="column  product_image_section" style="padding-top: 0px;padding-bottom: 0px;">
            <img src="<?php echo esc_url($model_images->id2url($first->get_image_id())); ?>">
        </div>
        <div class="column eowbc_breadcrumb_font" style="font-size: x-small;">
            <?php /*esc_html*/_e(wc_price(apply_filters('eowbc_breadcrumb_first_price',$first->get_price(),$first))); ?>
            <br/>
            <!-- <u><a href="<?php //echo !empty(wbc()->sanitize->get('FIRST')) ? eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('FIRST'),$order):'#'; ?>">View</a></u>&nbsp;|&nbsp;<u><a href="<?php //echo !empty(wbc()->sanitize->get('FIRST'))?eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('FIRST')):'#'; ?>"><?php //_e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_change_action_text','Change',true,true)); ?></a></u> -->

            <u><a href="<?php $url = \eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url($first->get_id(),$order,$first); echo !empty($url) ? esc_url($url) : "#" ; //echo !empty(wbc()->sanitize->get('FIRST')) ? eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('FIRST'),$order):'#'; ?>">View</a></u>&nbsp;|&nbsp;<u><a href="<?php echo esc_url(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,$first->get_id())); //!empty(wbc()->sanitize->get('FIRST'))?eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('FIRST')):'#'; ?>"><?php esc_html_e(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_change_action_text','Change',true,true)); ?></a></u>

        </div>                        
           
    <?php endif; ?>
    </div>            
</div>
