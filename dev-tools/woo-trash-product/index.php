<?php
/**
 * Plugin Name: delete(trash) product emptyops
 * Description: delete(trash) product 
 * Plugin URI: https://sphereplugins.com/
 * Author: EmptyOps
 * Author URI: https://emptyops.com/
 * Version: 1.0
 * License: Propritory
 * Text Domain: delete(trash) product 
 * Domain Path: /languages
 */


function myPlugin( $post ) {
    echo "Whatever is here throws an unexpected output alert when the plugin isa activated";
}
register_activation_hook( __FILE__, 'myPlugin' );


add_action('wp_footer', function(){
  	
	$product_term_ids = array(639); // category id 

	$args = array(
	    'taxonomy' => 'product_cat',
	    'include' => $product_term_ids,
	    'orderby'  => 'include'
	);

	
	$product_categories = get_terms( 'product_cat', $args );

    foreach ( $product_categories as $product_category ) {
        $args = array(
            'posts_per_page' => -1,
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    // 'terms' => 'white-wines'
                    'terms' => $product_category->slug
                )
            ),
            'post_type' => 'product',
            'orderby' => 'title,'
        );



        $cnt = 0; 

        $products = new WP_Query( $args );

        while ( $products->have_posts() ) {
        
        	$cnt++;

        	if( $cnt > 10 ) {

        		echo 'refreshing in 10 seconds...';
        		echo '<script type="text/javascript">setTimeout(function() { location.reload(); }, 10000);</script>';
        		die();
        	}

            $products->the_post();
            global $post;
           	
           	// the_id();

			//$product_id = the_id();
	        // matching products are trashed
	        //if ( has_term( 'machine', 'product_cat', $product_id ) ) {
	            wp_trash_post($post->ID); // product trash kerva mate
	        //}

        }
    }
});

?>