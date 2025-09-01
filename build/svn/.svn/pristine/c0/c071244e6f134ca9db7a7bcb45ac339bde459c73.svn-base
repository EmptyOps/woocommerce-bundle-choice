<?php
class EO_WBC_Home
{
    public function __construct()
    {
        $this->eo_wbc_the_content();        
        $this->eo_wbc_clean();                
    }

    public static function eo_wbc_do_shortcode()
    {
        self::eo_wbc_clean();
        return self::eo_wbc_buttons();
    }

    private function eo_wbc_the_content()
    {
        /**
         * Adding Buttons to start with
         * 1. Start with First Product
         * 2. Start with Second Product       
         */ 
        add_action('wp_footer',function(){
          if(!get_option('eo_wbc_btn_setting'))
         {
            $script="<script>jQuery(document).ready(function(){ ";
            if(get_option('eo_wbc_btn_position')=='begining'){
              $script.="jQuery('.entry-content').prepend('".$this->eo_wbc_buttons()."');";
            }
            elseif(get_option('eo_wbc_btn_position')=='end') {
              $script.="jQuery('.entry-content').append('".$this->eo_wbc_buttons()."');";
            }
            elseif(get_option('eo_wbc_btn_position')=='middle') {
              $script.="var eo_wbc_mid=(jQuery('.entry-content').children().length/2);".
                    "jQuery('.entry-content').children(':eq('+Math.floor(eo_wbc_mid)+')').before('".$this->eo_wbc_buttons()."');";
            }
            elseif(get_option('eo_wbc_btn_position')=='custome') {
              $script.="var eo_wbc_count=jQuery('.entry-content').children().length;".
                    "if(eo_wbc_count<=Number('".(get_option('eo_wbc_btn_custome_after')-1)."')){".
                    " jQuery('.entry-content').append('".$this->eo_wbc_buttons()."');".
                    "}else{".
                    " jQuery('.entry-content').children(':eq('+Number('".(get_option('eo_wbc_btn_custome_after')-1)."')+')')".
                    ".before('".$this->eo_wbc_buttons().
                    "'); }";

            }            
            $script.="});</script>";
            echo $script;
          }  
        });         
    }

    private function eo_wbc_buttons(){

        return '<div id="wbc_"><p style="font-size: 1.6em;">Buy in pair from recommendations</p></div>'.
        '<style>'.
            '.eo_button_container{'.
                'text-align: justify;'.
                'text-transform: uppercase;'.
                'margin-bottom: 40px;'.
                'display: block;'.
                'text-align: center;'.
            '}'.
            '.eo_button_container::after{'.
                'content: "";'.
                'display: inline-block;'.
                'float: none!important;'.
            '}'.
            '@media (min-width: 481px) and (max-width: 767px) {'.
              '.eo_button_container{'.
                'display: inline-grid;'.
              '}'.
            '}'.
            '@media (min-width: 320px) and (max-width: 480px) {'.
             '.eo_button_container{'.
                'display: inline-grid;'.
              '}'.
            '}'.
        '</style>'.
        '<div class="eo_button_container" style="">'.
             '<span class="woocommerce">'.
                '<a class="checkout-button button alt wc-forward" href="'.
                get_bloginfo('url').
                get_option('eo_wbc_first_url').
                '?EO_WBC=1&BEGIN='.
                get_option('eo_wbc_first_slug').
                '&STEP=1" style="padding:12px 27px;font-size: 15px;color: #232323;">'.
                    'start with '.get_option('eo_wbc_first_name').
                '</a>'.
             '</span>'.
             '<span style="font-size: 15px;padding-left:10%;padding-right:10%;">OR</span>'.
             '<span class="woocommerce">'.
                 '<a class="checkout-button button alt wc-forward" href="'.
                 get_bloginfo('url').
                 get_option('eo_wbc_second_url').
                 '?EO_WBC=1&BEGIN='.
                 get_option('eo_wbc_second_slug').
                 '&STEP=1" style="padding:12px 21px;font-size: 15px;color: #232323;">'.
                    'start with '.get_option('eo_wbc_second_name').
                '</a>'.
             '</span>'.
        '</div>'.
        '<div style="white-space:nowrap;font-size:16px;"></div>';        
    }

    private function eo_wbc_clean()
    {        
        wc()->session->set('EO_WBC_SETS',NULL);            
    }
}