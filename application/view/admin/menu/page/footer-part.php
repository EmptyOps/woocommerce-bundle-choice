<?php
/*
*	Displays the footer part of admin's page.
*/

add_filter( 'admin_footer_text',function($footer_text){
    /* translators: %1s: <strong> tag */
    /* translators: %2s: </strong> tag */
    /* translators: %3s: rating link */
    return sprintf('If you like %1$s WooCommerce Bundle Choice %2$s please leave us a %3$s  rating. A huge thanks in advance!',"<strong>","</strong>","<a href='https://wordpress.org/support/plugin/woo-bundle-choice/reviews?rate=5#new-post' target='_blank' class='wc-rating-link' data-rated='Thanks :)'>★★★★★</a>");
});
