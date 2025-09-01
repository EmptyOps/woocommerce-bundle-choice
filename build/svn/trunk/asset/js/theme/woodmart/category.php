<?php add_action('wp_footer' ,function(){

$get_link = /*$_GET*/wbc()->sanitize->_read_global_sanitized('get');
unset($get_link['per_row']);
unset($get_link['shop_view']);
unset($get_link['per_page']);
$get_link = http_build_query($get_link);

$get_link = __($get_link);
// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code. 
$inline_script =
    "jQuery(document).ready(function(\$){\n" .
    "    jQuery('.per-page-variation, .products-view-grid_list .shop-view').off('click');\n" .
    "    jQuery('.per-page-variation, .products-view-grid_list .shop-view').each(function(){\n" .
    "        \$(this).attr('href',\$(this).attr('href')+'&" . $get_link . "');\n" .
    "    })\n" .
    "});";

wbc()->load->add_inline_script('', $inline_script, 'common');

	}); 
?>