<?php
/*
*	Displays the footer part of admin's page.
*/

if( empty($mode) || ( $mode != "setup_wizard" && $mode != "plain" ) ) {

	add_filter( 'admin_footer_text',function($footer_text){
	    /* translators: %1s: <strong> tag */
	    /* translators: %2s: </strong> tag */
	    /* translators: %3s: rating link */
	    return sprintf('If you like %1$s '.constant('EOWBC_NAME').' %2$s please leave us a %3$s  rating. A huge thanks in advance!',"<strong>","</strong>","<a href='https://wordpress.org/support/plugin/woo-bundle-choice/reviews?rate=5#new-post' target='_blank' class='wc-rating-link' data-rated='Thanks :)'>★★★★★</a>");
	});
	
}
else {
    if( $mode == "setup_wizard" ) { 

      	wbc()->load->asset('js','admin-js',array(),'',true);
    	?>

        <!-- footer - comment it if its not full screen mode and setup wizard is loaded within wp admin page -->
        	</body>
        </html>
        <!-- END footer -->

      <?php 
    }
}

