<?php if(isset($_GET['FIRST']) and isset($_GET['SECOND'])) { ?>

<!-- Widget start Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) -->
<div class="ui container unstackable steps" style="direction: ltr;width: 100% !important; min-width: unset; max-width: unset; margin: auto; margin-bottom: 1em;">
    <?php 
    if(!empty(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_fixed_navigation'))) {
         if(!empty(wbc()->sanitize->get('BEGIN')) and wbc()->sanitize->get('BEGIN')==$breadcrumb_ui::$first_slug){                    
            $breadcrumb_ui::eo_wbc_breadcumb_first_html_mobile($step,1).$breadcrumb_ui::eo_wbc_breadcumb_second_html_mobile($step,2);
        } elseif(!empty(wbc()->sanitize->get('BEGIN')) and wbc()->sanitize->get('BEGIN')==$breadcrumb_ui::$second_slug) {
            $breadcrumb_ui::eo_wbc_breadcumb_first_html_mobile($step,2).$breadcrumb_ui::eo_wbc_breadcumb_second_html_mobile($step,1);
        }

    }  else {
        if($begin==$breadcrumb_ui::$first_slug/*get_option('eo_wbc_first_slug')*/) {

            $breadcrumb_ui::eo_wbc_breadcumb_first_html_mobile($step,1).$breadcrumb_ui::eo_wbc_breadcumb_second_html_mobile($step,2);

        } elseif ($begin==$breadcrumb_ui::$second_slug/*get_option('eo_wbc_second_slug')*/)  {

            $breadcrumb_ui::eo_wbc_breadcumb_second_html_mobile($step,1).$breadcrumb_ui::eo_wbc_breadcumb_first_html_mobile($step,2);
        }
    }
    ?>          
    <div 
        data-href="<?php echo esc_url((empty(wbc()->sanitize->get('EO_CHANGE')) XOR empty(wbc()->sanitize->get('EO_VIEW'))) && !empty(wbc()->sanitize->get('FIRST')) && !empty(wbc()->sanitize->get('SECOND')) 
            ? 
            get_bloginfo('url').'/index.php'.wbc()->options->get_option('configuration','review_page')
            .'?'.wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>3,'FIRST'=>wbc()->sanitize->get('FIRST'),'SECOND'=>wbc()->sanitize->get('SECOND')))
            :
            '#' 
        ); ?>" 
        class="<?php echo esc_attr((($step==3)?'active ':(($step>3)?'completed ':(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb)?'':'disabled')))); ?> step">
        <div class="content"><?php echo esc_html($breadcrumb_ui::$preview_name/*get_option('eo_wbc_collection_title','Preview')*/); ?></div>
    </div>
</div>
<?php 
// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
$inline_script = 
"jQuery(document).ready(function(){\n" .
"    /*jQuery('.onclick_redirect').on('click',function(){\n" .
"        var _step = jQuery(this);\n" .
"        var _rem_url = jQuery(_step).find('[data-remove-url]');\n" .
"        if(_rem_url.length>0) {\n" .
"            window.location.href=jQuery(_rem_url[0]).data('remove-url');\n" .
"        } else {\n" .
"            window.location.href = jQuery(_step).data('begin');\n" .
"        }\n" .
"    });*/\n" .
"    jQuery('[data-clickable_breadcrumb]').on('click',function(){\n" .
"        window.location.href = jQuery(this).data('clickable_breadcrumb');\n" .
"    });\n" .
"});";
wbc()->load->add_inline_script('', $inline_script, 'common');
        }
?>

