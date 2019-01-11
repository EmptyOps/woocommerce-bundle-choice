<?php
class YC_Home
{
    public function __construct()
    {
        $this->add_css();
        $this->the_content();
        $this->clean();
    }
    public function add_css()
    {
        /**
         * Add CSS file for button that will be shown on front page content.
         */
        add_action( 'wp_enqueue_scripts',function(){
            wp_register_style('yc-style',plugins_url('/css/yc-style.css',__FILE__));
            wp_enqueue_style('yc-style');
        });
    }
    public function the_content()
    {
        /**
         * Adding Buttons to start with
         * 1. Start with First Product
         * 2. Start with Second Product
         * ..... 
         */  
        add_filter('the_content',function($content){
                ?>	<br/><div id="wbc_"><p style="font-size: 2em;">Make From Yor Own Choice</p></div>
         	<br/>
             <div class="justify-align start-button-container--15-aE">
                 <div style="vertical-align:middle;margin-bottom: 15px;" class="woocommerce">
                 	<a class="checkout-button button alt wc-forward" href="<?php echo get_bloginfo('url').get_option('yc_first_url')."?YC_APP=active&BEGIN=".get_option('yc_first_slug')."&STEP=1";?>" style="padding:12px 27px;font-size: 15px;color: #232323;">
                 		start with a <?php echo get_option('yc_first_name'); ?>
                 	</a>
                 </div>
                 <div style="vertical-align:middle;font-size: 15px;">or</div>
                 <div style="vertical-align:middle;margin-bottom: 15px;" class="woocommerce">
                     <a class="checkout-button button alt wc-forward" href="<?php echo get_bloginfo('url').get_option('yc_second_url')."?YC_APP=active&BEGIN=".get_option('yc_second_slug')."&STEP=1";?>" style="padding:12px 21px;font-size: 15px;color: #232323;">
                     	start with a <?php echo get_option('yc_second_name') ?>
                     </a>
                 </div>
             </div>
             <div style="white-space:nowrap;font-size:16px;"></div>
         <?php
            echo $content;
        });
    }
    public function clean()
    {
        //Clearing Plugin Session data
        wc()->session->set('YC_SETS',NULL);
        //WC()->session->set('YC_MAPS',NULL);
        //WC()->session->set('YC_CART',NULL);
        //WC()->cart->empty_cart();
    }
}