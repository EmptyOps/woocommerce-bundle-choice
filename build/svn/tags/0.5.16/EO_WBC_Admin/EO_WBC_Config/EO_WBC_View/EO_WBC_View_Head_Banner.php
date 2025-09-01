<?php 
class EO_WBC_Head_Banner{
    public static function get_head_banner()
    {
        ?>
       	<div>
        	<span style="display: inline-block;">
        		<img style="max-height: 100px;max-width:100px;position:relative;top:1em;" alt="Your Choice" src="<?php echo plugin_dir_url(dirname(__FILE__)).'EO_WBC_View/EO_WBC_Img/EO_WBC_Cart.png'; ?>">
        	</span>&nbsp;&nbsp;
        	<div style="display: inline-block;">
        		<h1><?php _e(constant('EO_WBC_PLUGIN_NAME')."&nbsp;&nbsp;&nbsp;".constant('EO_WBC_PLUGIN_VERSION')) ?></h1>
        		<p class="info"><?php _e("Thank you for installing Woocommerce Bundle Choice! Woocommerce Bundle Choice excites users to buy with joy.","woo-bundle-choice"); ?></p>
        	</div>	
        </div>
        <?php         
    }

    public static function get_footer_line(){
        
        add_filter( 'admin_footer_text',function($footer_text){
            /* translators: %1s: <strong> tag */
            /* translators: %2s: </strong> tag */
            /* translators: %3s: rating link */
            return "<p id='footer-left' class='alignleft'>".sprintf('If you like %1$s WooCommerce Bundle Choice %2$s please leave us a %3$s  rating. A huge thanks in advance!',"<strong>","</strong>","<a href='https://wordpress.org/support/plugin/woo-bundle-choice/reviews?rate=5#new-post' target='_blank' class='wc-rating-link' data-rated='Thanks :)'>★★★★★</a>")."</p>";
        });
    }
}

