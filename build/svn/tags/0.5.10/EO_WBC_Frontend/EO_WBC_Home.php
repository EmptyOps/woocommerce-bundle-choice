<?php
class EO_WBC_Home
{
    public function __construct()
    {
      
    }

    public function show_buttons(){
            
      add_filter('the_content',function($content){
        // Add two buttons on designated section.
        return $content."<div class='eo_wbc_jQuery_container'>".$this->eo_wbc_the_content()."</div>";
      });
      $this->eo_wbc_clean();   // Cleanup session data
    }
	
    public static function eo_wbc_do_shortcode()
    {
      $self=new self; //initalize self instence.
      $self->eo_wbc_clean(); //cleanup session data
      return $self->eo_wbc_buttons().$self->eo_wbc_code(); //return two buttons to shortcode.
    }

    private function eo_wbc_the_content()
    {
        /**
         * Adding Buttons to start with
         * 1. Start with First Product
         * 2. Start with Second Product       
         */ 
        /*add_action('wp_footer',function(){*/  //setup button position in specific position of page.          

          if( (get_option('eo_wbc_btn_setting')==='0' || get_option('eo_wbc_btn_setting')==='2') && !(get_option('eo_wbc_btn_position')=='hide')) {

            $script="<script>jQuery(document).ready(function(){  var eo_wbc_content= jQuery('.eo_wbc_jQuery_container').parent(); ";
            if(get_option('eo_wbc_btn_position')=='begining'){              
              $script.="jQuery(eo_wbc_content).prepend('".$this->eo_wbc_buttons()."');";
            }
            elseif(get_option('eo_wbc_btn_position')=='end') {
              $script.="jQuery(eo_wbc_content).append('".$this->eo_wbc_buttons()."');";
            }
            elseif(get_option('eo_wbc_btn_position')=='middle') {
              $script.="var eo_wbc_mid=(jQuery(eo_wbc_content).children().length/2);".
                    "jQuery(eo_wbc_content).children(':eq('+Math.floor(eo_wbc_mid)+')').before('".$this->eo_wbc_buttons()."');";
            }
            else{
              $script.="var eo_wbc_count=jQuery(eo_wbc_content).children().length;".
                    "if(eo_wbc_count<=Number('".(get_option('eo_wbc_btn_position')-1)."')){".
                    " jQuery(eo_wbc_content).append('".$this->eo_wbc_buttons()."');".
                    "}else{".
                    " jQuery(eo_wbc_content).children(':eq('+Number('".(get_option('eo_wbc_btn_position')-1)."')+')')".
                    ".before('".$this->eo_wbc_buttons().
                    "'); }";
            }            
            $script.="});</script>";            
            return $script.$this->eo_wbc_code();            
          }  
        /*});*/
    }

    private function eo_wbc_code() //script to get color code from buttons
    {
        return '<script>'.
                'jQuery(document).ready(function($){'.
                  '$(".eo_button_container .button").each(function(i,e){'.
                    '$(e).attr("href",$(e).attr("href")+"&EO_WBC_CODE="+window.btoa($(".woocommerce a.button").css("background-color")+"/"+$(".woocommerce a.button").css("color")));'.
                  '});'.
                '});'.
               '</script>';
    }

    private function eo_wbc_buttons_css(){
      return '.eo-wbc-container .ui.buttons .button{'.
          (get_option('eo_wbc_home_btn_color')?'background-color:'.get_option('eo_wbc_home_btn_color').' !important;':'').
          (get_option('eo_wbc_home_btn_text_color')?'color:'.get_option('eo_wbc_home_btn_text_color').' !important;':'').
          (get_option('eo_wbc_home_btn_border_color')?'border-color:'.get_option('eo_wbc_home_btn_border_color').' !important;':'').
          (get_option('eo_wbc_home_btn_radius')?'border-radius:'.get_option('eo_wbc_home_btn_radius').'px !important;':'').'}'.
          (get_option('eo_wbc_home_btn_hover_color')?'.eo-wbc-container .ui.buttons .button:hover{ background-color:'.get_option('eo_wbc_home_btn_hover_color').' !important; }':'');
            
    }

    private function eo_wbc_buttons(){ //the two buttons UI
          
      return '<div id="wbc_" class="woocommerce eo-wbc-container"><h2 class="ui center aligned header">'.get_option('eo_wbc_home_btn_tagline',__('Make your own pair from recommendation','woo-bundle-choice')).'</h2><div class="ui grid divided vertically stackable centered"><div class="row ui buttons"><a class="ui button primary column" href="'. get_bloginfo('url').get_option('eo_wbc_first_url').'?EO_WBC=1&BEGIN='.get_option('eo_wbc_first_slug').'&STEP=1" >'.(get_option('eo_wbc_home_btn_text',__('Start with','woo-bundle-choice'))).' '.get_option('eo_wbc_first_name','').'</a> <div class="or"></div><a class="ui button primary column" href="'.get_bloginfo('url').get_option('eo_wbc_second_url').'?EO_WBC=1&BEGIN='.get_option('eo_wbc_second_slug').'&STEP=1" >'. (get_option('eo_wbc_home_btn_text',__('Start with','woo-bundle-choice'))).' '.get_option('eo_wbc_second_name','').'</a></div></div><style>.eo-wbc-container .ui.buttons .button{ text-align: center !important; border-radius: 0 !important; padding: 0.5em  !important;} '.$this->eo_wbc_buttons_css().'</style><br/>';
    }

    private function eo_wbc_clean() { //terminate session bundle set data as use is on home page and rejects all changes.       

      wc()->session->set('EO_WBC_SETS',NULL);             
    }
}