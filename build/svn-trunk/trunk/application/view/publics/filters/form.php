<?php

/*
*	Template to show form for filters 
*/

/*jQuery.fn.eo_wbc_filter_change(false,'#sc_eo_wbc_filter');*/

$current_category = implode(',',$thisObj->___category);

$is_first_root_category = true;
// $filter_sets = unserialize(wbc()->options->get_option_group('filters_filter_set',"a:0:{}"));
$filter_sets = \eo\wbc\model\publics\component\EOWBC_Filter_Widget::instance()->get_filter_sets($thisObj->filter_prefix);
//wbc()->common->pr($filter_sets);
if(!empty($filter_sets) and is_array($filter_sets)){
	foreach ($filter_sets as $filter_sets_key => $filter_sets_val) {
		//$filter_sets[$filter_sets_key] = $filter_sets_val['filter_set_name'];
		//if(wbc()->options->get_option('filters_filter_setting','filter_setting_advance_two_tabs')) {

        //}

        //if(wbc()->options->get_option('filters_'.$thisObj->filter_prefix.'filter_setting','filter_setting_advance_two_tabs',false)) {

        if ( ( $is_first_root_category and !empty($filter_sets_val['filter_set_two_tabs_first']) ) or
        	(!$is_first_root_category and !empty($filter_sets_val['filter_set_two_tabs_second']))
    		) {

			$first_tab_term = $filter_sets_val['filter_set_category'];
			if(!empty($first_tab_term)) {
				$first_tab_term = wbc()->wc->get_term_by('id',$first_tab_term, 'product_cat');
				if(!empty($first_tab_term) and !is_wp_error($first_tab_term)) {
					$first_tab_term = $first_tab_term->slug;

					if(!empty($_GET[$filter_sets_val['filter_set_two_tabs_first']])) {

						$current_category = $first_tab_term;
					}
				} else {
					$first_tab_term = false;
				}
			} else {
				$first_tab_term = false;
			}

			// $second_tab_term = wbc()->options->get_option('filters_'.$thisObj->filter_prefix.'filter_setting','filter_setting_advance_second_category',false);
			// if(!empty($second_tab_term)) {
			// 	$second_tab_term = wbc()->wc->get_term_by('id',$second_tab_term, 'product_cat');
			// 	if(!empty($second_tab_term) and !is_wp_error($second_tab_term)) {
			// 		$second_tab_term = $second_tab_term->slug;
					
			// 		if( !empty($_GET[wbc()->options->get_option('filters_'.$thisObj->filter_prefix.'filter_setting','filter_setting_advance_second_tabs',false)]) ) {
			// 			$current_category = $second_tab_term;
			// 		}
			// 	} else {
			// 		$second_tab_term = false;
			// 	}
			// } else {
			// 	$second_tab_term = false;
			// }


			if(!isset($_GET[$filter_sets_val['filter_set_two_tabs_first']])) {
				if(array_search($first_tab_term,$thisObj->___category) !==false ) {			
					unset($thisObj->___category[array_search($first_tab_term,$thisObj->___category)]);
				}

			} else {

				// if(array_search($second_tab_term,$thisObj->___category) !==false ) {

				// 	unset($thisObj->___category[array_search($second_tab_term,$thisObj->___category)]);
				// }		
			}
			break;
		}

	}
}	




if(empty($current_category) and empty($_GET['EO_WBC'])) {
	$current_category = wbc()->common->get_category('category',null, explode(',', wbc()->options->get_option('sc_filter_setting','shop_cat_filter_category') ) );
}

if(!empty($current_category)) {

	/*if(isset($_GET['test'])){*/
		global $sitepress;
		if(!empty($sitepress)) {
			$current_language = constant('ICL_LANGUAGE_CODE');
			$sitepress->switch_lang('en');
		}

		$current_category_term = wbc()->wc->get_term_by('slug',$current_category,'product_cat');
		if(!empty($current_category_term) and !is_wp_error($current_category_term)) {
			$current_category = $current_category_term->slug;
		}


		if(!empty($thisObj->___category) and is_array($thisObj->___category)) {

			$this_category = array();
			foreach($thisObj->___category as $this_category_key => $this_category_value) {

				$this_category_term = wbc()->wc->get_term_by('slug',$this_category_value,'product_cat');
				if(!empty($this_category_term) and !is_wp_error($this_category_term)) {
					$this_category[] = $this_category_term->slug;
				}
			}

			$thisObj->___category = $this_category;
		}



		if(!empty($sitepress)) {
			$sitepress->switch_lang($current_language);
			remove_filter('get_term', array($sitepress,'get_term_adjust_id'), 1, 1);
		}
		
	/*}*/
}


$_per_page = wc_get_loop_prop('per_page');
    
if(empty($_per_page)){
    $_per_page = apply_filters('loop_shop_per_page',wc_get_default_products_per_row() * wc_get_default_product_rows_per_page());
}

?>	
		
	<!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) -->
	<!--BUNDLOICE (formerly Woo Choice Plugin) filter form-->

	<form method="GET" name="<?php echo esc_attr($filter_ui->filter_prefix); ?>eo_wbc_filter" id="<?php echo esc_attr($filter_ui->filter_prefix); ?>eo_wbc_filter" style="clear: both;">
	    <?php do_action('eowbc_pre_filter_form'); ?>
	    <input type="hidden" name="eo_wbc_filter" value="1" />
	    <input type="hidden" name="paged" value="1" />
	    <input type="hidden" name="eo_wbc_page" size="<?php echo esc_attr($_per_page); ?>" />
	    <input type="hidden" name="last_paged" value="1" />
	    <?php if (apply_filters('eowbc_show_filter_actions_field', true)) : ?>
	        <input type="hidden" name="action" value="eo_wbc_filter" />
	    <?php endif; ?>

	    <input type="hidden" name="_current_category" value="<?php echo !empty(wbc()->sanitize->get('CAT_LINK')) ? esc_attr(\eo\wbc\model\SP_WBC_Router::instance()->set_query_params_formatted('to_form_field', array('prod_cat'), \eo\wbc\model\SP_WBC_Router::instance()->get_query_params_formatted('url_and_form_field_raw', array('prod_cat'), 'REQUEST', null)))/*wbc()->sanitize->get('CAT_LINK')*/ : esc_attr($current_category); ?>" />

	    <input type="hidden" name="_category_query" id="eo_wbc_cat_query" value="<?php echo !empty(wbc()->sanitize->get('CAT_LINK')) ? esc_attr(\eo\wbc\model\SP_WBC_Router::instance()->set_query_params_formatted('to_form_field', array('prod_cat'), \eo\wbc\model\SP_WBC_Router::instance()->get_query_params_formatted('url_and_form_field_raw', array('prod_cat'), 'REQUEST', null)))/*wbc()->sanitize->get('CAT_LINK')*/ : ''; /*$current_category*/ ?>" />

	    <input type="hidden" name="_category" value="<?php echo esc_attr(implode(',', $thisObj->___category)); ?>" />

	    <input type="hidden" name="cat_filter__two_tabs" value="" />
	    <?php do_action('eo_wbc_additional_form_field', $filter_ui); ?>

	    <?php if (isset($_GET['products_in']) && !empty(wbc()->sanitize->get('products_in'))) : ?>
	        <input type="hidden" name="products_in" value="<?php echo esc_attr(wbc()->sanitize->get('products_in')); ?>" />
	    <?php endif; ?>

	    <?php
	    $queried_attributes = array();
	    if (!empty($thisObj->__filters)) {

	        /* This block shall be removed as its purpose is to remove duplicates as we do not know the cause of multiple instances. */
	        $serialized_filter = array_map(function ($e) {
	            return serialize($e);
	        }, $thisObj->__filters);

	        $serialized_filter = array_unique($serialized_filter);

	        $thisObj->__filters = array_map(function ($e) {
	            return unserialize($e);
	        }, $serialized_filter);
	        /* To be removed block ends. */

	        $thisObj->__filters = apply_filters('sp_wbc_pre_filter_form_attribute', $thisObj->__filters);

	        foreach ($thisObj->__filters as $__filter) {

	            if (!empty($_REQUEST[$__filter['id']])) {

	                $queried_attributes[str_replace(['min_', 'max_'], '', $__filter['id'])] = str_replace(['min_', 'max_'], '', $__filter['id']);

	                $__filter['value'] = sanitize_text_field($_REQUEST[$__filter['id']]);
	            }

	            ?>
	            <input type="<?php echo esc_attr($__filter['type']); ?>" name="<?php echo esc_attr($__filter['name']); ?>" id="<?php echo esc_attr($__filter['id']); ?>" class="<?php echo esc_attr($__filter['class']); ?>" value="<?php echo esc_attr($__filter['value']); ?>" <?php echo (isset($__filter['data-edit']) ? 'data-edit="' . esc_attr($__filter['data-edit']) . '"' : ''); ?>/>
	        <?php
	    }
	}
	?>

	<input type="hidden" name="_attribute" id="eo_wbc_attr_query" value="<?php echo esc_attr(implode(',', $queried_attributes)); ?>" />
	</form>

	<br/><br/>
	<?php 
	if(apply_filters('eowbc_enque_filter_js',call_user_func('__return_true'))):
		// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
		$inline_script =
		    "jQuery(document).ready(function(\$){\n" .
		    "\n" .
		    "    window.document.splugins = window.document.splugins || {};\n" .
		    "    window.document.splugins.ui = window.document.splugins.ui || {};\n" .
		    "    window.document.splugins.ui.slider = window.document.splugins.ui.slider || jQuery.fn.slider;\n" .
		    "\n" .
		    "    // --- move this code in woo-bundle-choice/asset/js/publics/eo_wbc_filter.js window.document.splugins.wbc.filters.api.slider_change_event_listener(); ---\n" .
		    "    // --- start ---\n" .
		    "    // window.eo=new Object();\n\n" .
		    "    // //Slider creation function\n" .
		    "    // window.eo.slider=function(selector){\n" .
		    "    //     jQuery(selector).each(function(i,e){\n" .
		    "    //         // Remaining JavaScript code for slider creation...\n" .
		    "    //     });\n" .
		    "    // };\n" .
		    "    // --- end ---\n" .
		    "\n" .
		    "    // window.document.splugins.wbc.filters.api.slider_change_event(selector);\n" .
		    "\n" .
		    "    var primary_filter=jQuery(\".eo-wbc-container.filters .ui.segment:not(.secondary)\");\n\n" .
		    "    var primary_computer_only=jQuery(primary_filter).find(\".computer.tablet.only\");\n\n" .
		    "    var primary_mobile_only=jQuery(primary_filter).find(\".mobile.only\");\n" .
		    "\n" .
		    "    // var secondary_filter=jQuery(\".eo-wbc-container.filters .ui.segment.secondary\");\n" .
		    "    var secondary_filter=\".eo-wbc-container.filters .ui.segment.secondary\";\n\n" .
		    "    var secondary_computer_only=jQuery(secondary_filter).find(\".computer.tablet.only\");\n\n" .
		    "    var secondary_mobile_only=jQuery(secondary_filter).find(\".mobile.only\");\n" .
		    "\n" .
		    "    if( typeof(jQuery.fn.accordion) ==='function' ){\n" .
		    "        jQuery('.ui.accordion').accordion();\n" .
		    "    }\n" .
		    "\n" .
		    "    // window.eo.slider(jQuery('.eo-wbc-container.filters').find('.ui.slider'));\n" .
		    "\n" .
		    "    /* Activate initiation of sliders at secondary segments. */\n" .
		    "    if(jQuery(secondary_computer_only).css('display')!='none'){\n\n" .
		    "        jQuery(\"#advance_filter\").on('click',function(){\n" .
		    "            jQuery(\"#advance_filter\").find('.ui.icon').toggleClass('up down');\n" .
		    "            jQuery(secondary_filter+\":eq(0)\").transition('slide down');\n" .
		    "        }).trigger('click');\n\n" .
		    "    } else if(jQuery(secondary_mobile_only).css('display')!='none') {\n\n" .
		    "        jQuery(\"#advance_filter\").on('click',function(){\n" .
		    "            jQuery(this).find('.ui.icon').toggleClass('up down');\n" .
		    "            jQuery(secondary_filter).transition('fly right');\n" .
		    "        }).trigger('click');\n" .
		    "    }\n" .
		    "\n" .
		    "	/*jQuery(secondary_filter).transition('fade');*/\n\n" .
		    "    if(jQuery(\"#primary_filter\").parent().parent().css('display')!='none'){\n\n" .
		    "        jQuery(\"#primary_filter\").click(function(e){\n" .
		    "            e.preventDefault();\n" .
		    "            e.stopPropagation();\n" .
		    "            jQuery(\"#primary_filter\").find('.ui.icon').toggleClass(\"down up\");\n" .
		    "            jQuery('.eo-wbc-container.filters,#advance_filter').transition('fade');\n" .
		    "        }).trigger('click');\n" .
		    "    }\n" .
		    "\n" .
		    "    /*----------------------------------------------------*/\n" .
		    "    /*----------------------------------------------------*/\n" .
		    "\n" .
		    "    // --- move this code in woo-bundle-choice/asset/js/publics/eo_wbc_filter.js window.document.splugins.wbc.filters.api.slider_change_event_listener(); ---\n" .
		    "    // --- start ---\n" .
		    "    // if( typeof(jQuery.fn.checkbox) ==='function' ) {\n" .
		    "    //     jQuery('.checkbox').checkbox({onChange:function(event){\n" .
		    "    //         // Remaining JavaScript code for checkbox change event...\n" .
		    "    //     }});\n" .
		    "    // }\n" .
		    "    // --- end ---\n" .
		    "\n" .
		    "    // window.document.splugins.wbc.filters.api.checkbox_change_event(event);\n" .
		    "\n" .
		    "    /*----------------------------------------------------*/\n" .
		    "    /*----------------------------------------------------*/\n" .
		    "\n" .
		    "});\n";

		wbc()->load->add_inline_script('', $inline_script, 'sp-wbc-common-footer');

	endif; ?>

	<?php do_action('eowbc_post_filter_javascript',$filter_ui); ?>
