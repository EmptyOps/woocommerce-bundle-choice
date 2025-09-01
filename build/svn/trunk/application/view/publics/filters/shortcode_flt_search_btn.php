<?php

/*
*	Template to show search button for shortcode filters
*/

?>
	<div class="ui grid centered">
		<div class="">
			<button id="shortcode_flt_search_btn" name="shortcode_flt_search_btn" class="ui button" onclick="search_btn_click();"><?php esc_html(spext_lang("Search", 'woo-bundle-choice')); ?></button>
		</div>
	</div>
	<?php
	$is_shortcode_filter_boolean = ($is_shortcode_filter ? 'true' : 'false');
	$redirect_url = wbc()->options->get_option('shortflt_filter_setting', 'redirect_url', get_permalink(function_exists('wc_get_page_id') ? wc_get_page_id('shop') : woocommerce_get_page_id('shop')));
	
	// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
	$inline_script =
	    "var is_shortcode_filter = " . $is_shortcode_filter_boolean . ";\n" .
	    "var shortflt_filter_setting__redirect_url = '" . $redirect_url . "';\n" .
	    "\n" .
	    "function override_flt_change_function() {\n" .
	    "    // 27-05-2022 - @drashti\n" .
	    "    // Add to be confirmed\n" .
	    "    // window.document.splugins.wbc.filters.core.eo_wbc_filter_change_wrapper();\n" .
	    "    if (typeof(jQuery.fn.eo_wbc_filter_change) != 'undefined' && jQuery.fn.eo_wbc_filter_change != undefined) {\n" .
	    "        // ACTIVE_TODO we need to manage this when we upgrade shortcode filter for QCed version.\n" .
	    "        jQuery.fn.eo_wbc_filter_change = function(init_call = false) {\n" .
	    "            // do nothing on change\n" .
	    "            return;\n" .
	    "        }\n" .
	    "    }\n" .
	    "    else {\n" .
	    "        setTimeout(override_flt_change_function, 500);\n" .
	    "    }\n" .
	    "	//////////////////////////////////////// \n".
	    "}\n" .
	    "override_flt_change_function();\n" .
	    "\n" .
	    "function search_btn_click() {\n" .
	    "    var form = jQuery('form#eo_wbc_filter');\n\n" .
	    "    window.location.href = shortflt_filter_setting__redirect_url + (shortflt_filter_setting__redirect_url.indexOf('?') == -1 ? '?' : '&') + form.serialize();\n" .
	    "}\n";

	wbc()->load->add_inline_script('', $inline_script, 'common');
	
