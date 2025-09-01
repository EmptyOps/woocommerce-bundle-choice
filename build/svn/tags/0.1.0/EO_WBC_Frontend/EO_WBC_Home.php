<?php
class EO_WBC_Home
{
    public function __construct()
    {
        $this->eo_wbc_add_css();
        $this->eo_wbc_the_content();
        $this->eo_wbc_clean();
    }
    private function eo_wbc_add_css()
    {
        /**
         * Add CSS file for button that will be shown on front page content.
         */
        add_action( 'wp_enqueue_scripts',function(){
            wp_register_style('eo-wbc-buttons',plugins_url('/css/eo_wbc_buttons.css',__FILE__));
            wp_enqueue_style('eo-wbc-buttons');
        });
    }
    private function eo_wbc_the_content()
    {
        /**
         * Adding Buttons to start with
         * 1. Start with First Product
         * 2. Start with Second Product         * 
         */  
        add_filter('the_content',function($content){
                ?>	<br/><div id="wbc_"><p style="font-size: 2em;">Make From Yor Own Choice</p></div>
         	<br/>
             <div class="justify-align start-button-container--15-aE">
                 <div style="vertical-align:middle;margin-bottom: 15px;" class="woocommerce">
                 	<a class="checkout-button button alt wc-forward" href="<?php echo get_bloginfo('url').get_option('eo_wbc_first_url')."?EO_WBC=1&BEGIN=".get_option('eo_wbc_first_slug')."&STEP=1";?>" style="padding:12px 27px;font-size: 15px;color: #232323;">
                 		start with <?php echo get_option('eo_wbc_first_name'); ?>
                 	</a>
                 </div>
                 <div style="vertical-align:middle;font-size: 15px;">or</div>
                 <div style="vertical-align:middle;margin-bottom: 15px;" class="woocommerce">
                     <a class="checkout-button button alt wc-forward" href="<?php echo get_bloginfo('url').get_option('eo_wbc_second_url')."?EO_WBC=1&BEGIN=".get_option('eo_wbc_second_slug')."&STEP=1";?>" style="padding:12px 21px;font-size: 15px;color: #232323;">
                     	start with <?php echo get_option('eo_wbc_second_name'); ?>
                     </a>
                 </div>
             </div>
             <div style="white-space:nowrap;font-size:16px;"></div>
         <?php
            echo $content;
        });
    }
    private function eo_wbc_clean()
    {        
        wc()->session->set('EO_WBC_SETS',NULL);        
    }
}