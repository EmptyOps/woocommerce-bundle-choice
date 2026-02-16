<?php

$is_default_tab_active = true;
foreach ($filter_sets_data as $key => $tab_data ){
    
    if(isset($_GET[$tab_data["first_tab_id"]])){
        
      $is_default_tab_active = false;
      break;
    }

}

?>
<?php $category_array = array_column($filter_sets_data, 'first_tab_category'); ?>
<?php
    // wbc_pr($category_array);

    // wbc_pr(wbc()->common->get_category('category',null,array(wbc()->options->get_option('configuration','first_slug'),wbc()->options->get_option('configuration','second_slug'))));
    //die();
?>
<?php 

// NOTE: now since we are preparing data only on the data layer and from there only the required if condition is applied. so here never should be the requirement to add the if condition here. so added true or condition here. 
if( true or in_array( wbc()->common->get_category('category',null,array(wbc()->options->get_option('configuration','first_slug'),wbc()->options->get_option('configuration','second_slug')),true), /*array($first_tab_category,$second_tab_category)*/$category_array ) ){  ?>
    <div class="ui top attached tabular menu filter_setting_advance_two_tabs" style="margin-top: 3em;">
        <?php 
        $counter = -1;
        foreach ($filter_sets_data as $key => $tab_data ){  
            $counter++;
            $class = '';
            if(isset($_GET[$tab_data["first_tab_id"]]) || ($is_default_tab_active && $counter == 0)){

                $class = 'active';
            }
            ?>
            <!-- <a class="item center <?php /*echo isset($_GET[$tab_data["first_tab_id"]])?'active':''*/ ?>" data-category="<?php /*_e($tab_data["first_tab_category"]);*/ ?>" style="margin-right: 0px !important;" data-tab="filter_setting_advance_first_tabs" data-tab-name="<?php /*_e($tab_data["first_tab_id"]);*/ ?>" data-tab-altname=""<?php /*_e($second_tab_id);*/ ?>>
                // $prefix.'_fconfig_set' 
            <?php //_e($tab_data["first_tab_label"]); ?>
            </a>  --> 

            <a class="item center <?php echo esc_attr($class); ?>" data-category="<?php echo esc_attr($tab_data["first_tab_category"]); ?>" style="margin-right: 0px !important;" data-tab="filter_setting_advance_first_tabs_<?php echo esc_attr($tab_data["first_tab_id"]); ?>" data-tab-name="<?php esc_html_e($tab_data["first_tab_id"]); ?>" data-tab-altname=""> <?php esc_html_e($tab_data["first_tab_label"]); ?> </a>

        <?php } ?>  

      	<!-- <a class="center item <?php /*echo isset($_GET[$second_tab_id])?'active':'' */?>" data-category="<?php  /*_e($second_tab_category);*/  ?>" style="margin-left: 0px !important;" data-tab="filter_setting_advance_second_tabs" data-tab-name="<?php  /*_e($second_tab_id);*/  ?>" data-tab-altname="<?php  /*_e($first_tab_id);*/ ?>">
        <?php  /*_e($second_tab_label);*/ ?> 
      	</a>-->
        <?php
       // NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
        $inline_script = 
            "jQuery(document).ready(function(\$){\n" .
            "    window.document.splugins.events.api.subscribeObserver('filter_sets', 'wbc', 'filter_set_click_before_loop',function(event, stat_object, notification_response){\n\n" .
            "        console.log('filter_set_click_before_loop subscribeObserver default');\n\n" .
            "        notification_response(stat_object);\n\n" .
            "    });\n" .
            "    //jQuery('[data-tab=\"filter_setting_advance_first_tabs\"]').trigger('click');\n" .
            "    // jQuery('.filter_setting_advance_two_tabs .item.active').click();\n\n" .
            "});\n";

        wbc()->load->add_inline_script('', $inline_script, 'sp-wbc-common-footer');

        ?>
        <?php 
            //NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
            $custom_css = "
                .tax-product_cat .eo-wbc-container.filters .ui.menu {
                    -ms-flex-wrap: wrap;
                    flex-wrap: wrap;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    justify-content: center;
                }

                .tax-product_cat .eo-wbc-container.filters .ui.menu a.item.center {
                    margin-left: 0 !important;
                }
            ";
            wbc()->load->add_inline_style('', $custom_css,'common');    
        ?>
    </div>
<?php } ?>
