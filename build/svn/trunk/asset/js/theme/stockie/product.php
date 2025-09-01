<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossrigin="anonymous"></script> -->
<?php 
    // add_action('wp_enqueue_scripts', function(){
	// 	wp_enqueue_script( 'jquery' );
	// });

// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
$inline_script =
    "jQuery(document).ready(function(\$){\n" .
    "    let breadcrumb = \$('div.eo-wbc-container.container').clone();\n" .
    "   \$('div.eo-wbc-container.container').remove();\n" .
    "   \$('.woo_c-product.single-product:first-of-type').prepend(breadcrumb);\n" .
    "   \$('div.eo-wbc-container.container').css('display','block');\n" .
    "});";

wbc()->load->add_inline_script('', $inline_script, 'common');
?>