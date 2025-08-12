<?php

/*
*	Template to show search button for shortcode filters
*/

?>
	<div class="ui grid centered">
		<div class="">
			<button id="shortcode_flt_search_btn" name="shortcode_flt_search_btn" class="ui button" onclick="search_btn_click();"> <?php spext_lang("Search", 'woo-bundle-choice') ?></button>	
		</div>
	</div>

	<?php
	if(WBC_SCRIPT_DEBUG == false){
	?>    
	    <script type="text/javascript">     

	        var is_shortcode_filter = <?php echo $is_shortcode_filter ? 'true' : 'false';?>;
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
	}else{
	?>
	    <script type="text/javascript">     

	        var is_shortcode_filter = <?php echo $is_shortcode_filter ? 'true' : 'false';?>;
	        var shortflt_filter_setting__redirect_url = <?php echo "'".wbc()->options->get_option('shortflt_filter_setting','redirect_url',get_permalink( function_exists('wc_get_page_id') ? wc_get_page_id('shop') : woocommerce_get_page_id('shop') ) )."'";?>;

	        function override_flt_change_function(){void 0!==jQuery.fn.eo_wbc_filter_change&&null!=jQuery.fn.eo_wbc_filter_change?jQuery.fn.eo_wbc_filter_change=function(e=!1){}:setTimeout(override_flt_change_function,500)}function search_btn_click(){var e=jQuery("form#eo_wbc_filter");window.location.href=shortflt_filter_setting__redirect_url+(-1==shortflt_filter_setting__redirect_url.indexOf("?")?"?":"&")+e.serialize()}override_flt_change_function();
	    </script>
	    
	<?php
	}
	?>
	<?php
	