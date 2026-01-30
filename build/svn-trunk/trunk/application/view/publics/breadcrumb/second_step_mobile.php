<?php

/*
*	Template to show breadcrumb first step for mobile
*/

?>
<div class="step <?php echo esc_attr((($step==$order)?'active ':(($step>$order)?'completed ':(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb)?'':'disabled')))); ?> second_mobile" >
    <div class="content eowbc_breadcrumb_font" <?php _e((!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb) and !empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second_url))?'data-clickable_breadcrumb="'.esc_url(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second_url).'"':''); ?>><?php echo esc_html(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second_name); ?></div>
    <div class="ui flowing popup bottom right transition hidden second_mobile" style="width: 80%;">
        <div class="ui grid">
            <div class="six wide column eowbc_breadcrumb_font" style="width: 80px;height: auto;margin: auto;">
                <?php if(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second)) : ?>
                <?php echo esc_html(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second->get_image()); ?>
                <?php endif; ?>
            </div>
            <div class="ten wide column">
                <div class="ui header eowbc_breadcrumb_font">
                    <?php if(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second)) : ?>
                    
                    <?php esc_html_e(wc_price(apply_filters('eowbc_breadcrumb_second_price',\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second->get_price(),\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$second))); ?>
                    <?php endif; ?>
                </div>
                <br/> 
                <div class="ui equal width grid eowbc_breadcrumb_font">                            
                     <u><a href="<?php echo !empty(wbc()->sanitize->get('SECOND')) ? esc_url(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('SECOND'), $order)) : '#'; ?>">View</a></u>
                    <u><a href="<?php echo !empty(wbc()->sanitize->get('SECOND')) ? esc_url(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url($order, wbc()->sanitize->get('SECOND'))) : '#'; ?>"><?php esc_html_e(wbc()->options->get_option('appearance_breadcrumb', 'appearance_breadcrumb_change_action_text', 'Change', true, true)); ?></a></u>
                </div>  
            </div>                
        </div>
    </div>                          
</div>
<?php 
// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
$inline_script =
    "jQuery(document).ready(function(){\n" .
    "    if (typeof(jQuery.fn.popup)==='function') {\n" .
    "        jQuery('.step.completed.second_mobile').popup({\n" .
    "            popup : jQuery('.ui.popup.second_mobile'),\n" .
    "            on    : 'click',\n" .
    "            target   : jQuery('.step.completed.second_mobile').parent(),\n" .
    "            position : 'bottom left',\n" .
    "            inline: true\n" .
    "        });\n" .
    "    }\n" .
    "});\n";

wbc()->load->add_inline_script('', $inline_script, 'common');

