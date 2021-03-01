<?php

/*
*	Template to show search button for shortcode filters
*/

?>
	<div class="ui grid centered">
		<div class="">
			<button id="shortcode_flt_search_btn" name="shortcode_flt_search_btn" class="ui button" onclick="search_btn_click();">Search</button>	
		</div>
	</div>

	<script type="text/javascript">		

		var is_shortcode_filter = <?php echo $is_shortcode_filter ? 'true' : 'false';?>;
		var shortflt_filter_setting__redirect_url = <?php echo "'".wbc()->options->get_option('shortflt_filter_setting','redirect_url',get_permalink( function_exists('wc_get_page_id') ? wc_get_page_id('shop') : woocommerce_get_page_id('shop') ) )."'";?>;

		function override_flt_change_function() {
			if(typeof(jQuery.fn.eo_wbc_filter_change)!="undefined" && jQuery.fn.eo_wbc_filter_change!=undefined){
				jQuery.fn.eo_wbc_filter_change= function(init_call=false) {				
					//do nothing on change
					return;
				}	
			}	
			else {
				setTimeout(override_flt_change_function, 500);
			}
		}
		override_flt_change_function();
		
		function search_btn_click() {
			var form=jQuery("form#eo_wbc_filter");	
			
			window.location.href = shortflt_filter_setting__redirect_url + (shortflt_filter_setting__redirect_url.indexOf('?') == -1 ? '?' : '&') + form.serialize();
		}
	</script>
	<?php
	