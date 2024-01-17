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
	if (false) {
	?>

		<script type="text/javascript">		

			var is_shortcode_filter = <?php echo ($is_shortcode_filter ? 'true' : 'false');?>;
			var shortflt_filter_setting__redirect_url = <?php echo "'".wbc()->options->get_option('shortflt_filter_setting','redirect_url',get_permalink( function_exists('wc_get_page_id') ? wc_get_page_id('shop') : woocommerce_get_page_id('shop') ) )."'";?>;

			function override_flt_change_function() {
				//////// 27-05-2022 - @drashti /////////
				// --add to be confirmed--
				// window.document.splugins.wbc.filters.core.eo_wbc_filter_change_wrapper();
				if(typeof(jQuery.fn.eo_wbc_filter_change)!="undefined" && jQuery.fn.eo_wbc_filter_change!=undefined){
					// ACTIVE_TODO we need to mange this when we upgarde shortcode filter for QCed version.
					jQuery.fn.eo_wbc_filter_change= function(init_call=false) {				
						//do nothing on change
						return;
					}	
				}	
				else {
					setTimeout(override_flt_change_function, 500);
				}
				////////////////////////////////////////
			}
			override_flt_change_function();
			
			function search_btn_click() {
				var form=jQuery("form#eo_wbc_filter");	
				
				window.location.href = shortflt_filter_setting__redirect_url + (shortflt_filter_setting__redirect_url.indexOf('?') == -1 ? '?' : '&') + form.serialize();
			}
		</script>
	<?php 
	}
	$is_shortcode_filter_boolean = ($is_shortcode_filter ? 'true' : 'false');
	$redirect_url = wbc()->options->get_option('shortflt_filter_setting', 'redirect_url', get_permalink(function_exists('wc_get_page_id') ? wc_get_page_id('shop') : woocommerce_get_page_id('shop')));

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
	
