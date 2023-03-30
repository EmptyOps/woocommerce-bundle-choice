<?php
namespace eo\wbc\controllers\publics\pages;
defined( 'ABSPATH' ) || exit;

class Home {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {		
		
	}

	public function init() {
    return true;

		if(isset($_GET['wbc_report']) && !empty(wbc()->sanitize->get('wbc_report'))) {
        	if(isset($_SERVER['HTTP_REFERER'])){
        		wbc()->options->set('eo_wbc_mapping_error_report',$_SERVER['HTTP_REFERER']);
        		\EOWBC_Error_Handler::log('One user has reported mapping issue at this <a href="'.$_SERVER['HTTP_REFERER'].'" target="_blank">link</a>, please ensure you have added mapping to connect products from first to second step.',2);	
        	}
      	} 

      	$this->show_buttons();		
	}

    public function show_buttons(){

    	//commented since no more seems necessary. remove it if its no more require at all.
      	// add_filter('the_content',function($content){
       //  	// Add two buttons on designated section.
       //  	return $content."<div class='eo_wbc_jQuery_container'></div>";
      	// });

		add_action('wp_footer',function() {
			ob_start();
			wbc()->load->template('publics/error_popup');
			echo ob_get_clean();
      	},99);
      
      	$this->eo_wbc_the_content();
      	// $this->eo_wbc_clean();   // Cleanup session data
    }
  
  	//important logic moved to buttons template and buttons template loaded from service shortcode function directly 
    // public static function eo_wbc_do_shortcode()
    // {
    //   $self=new self; //initalize self instence.
    //   $self->eo_wbc_clean(); //cleanup session data
    //   return $self->eo_wbc_buttons().$self->eo_wbc_code(); //return two buttons to shortcode.
    // }

    public function eo_wbc_the_content()
    {
        /**
         * Adding Buttons to start with
         * 1. Start with First Product
         * 2. Start with Second Product       
         */ 
        add_action('wp_footer',function(){  //setup button position in specific position of page.          

          // if( (get_option('eo_wbc_btn_setting')==='1' || get_option('eo_wbc_btn_setting')==='3') && !(get_option('eo_wbc_btn_position')=='hide')) {

          //   $script="<script>jQuery(document).ready(function(){  var eo_wbc_content= jQuery('.eo_wbc_jQuery_container').parent(); if(eo_wbc_outer_container != undefined){ eo_wbc_content=eo_wbc_outer_container; }";
            
          //   if(get_option('btn_position_setting_text',false)){
          //     $script.=" if( jQuery('".get_option('btn_position_setting_text')."').length >= 1 ){  eo_wbc_content = jQuery('".get_option('btn_position_setting_text')."')[0]; }";
          //   }
            
          //   if(get_option('eo_wbc_btn_position','begining')=='begining'){              
          //     $script.="jQuery(eo_wbc_content).prepend('".$this->eo_wbc_buttons()."');";
          //   }
          //   elseif(get_option('eo_wbc_btn_position','begining')=='end') {
          //     $script.="jQuery(eo_wbc_content).append('".$this->eo_wbc_buttons()."');";
          //   }
          //   elseif(get_option('eo_wbc_btn_position','begining')=='middle') {
          //     $script.="var eo_wbc_mid=(jQuery(eo_wbc_content).children().length/2);".
          //           "jQuery(eo_wbc_content).children(':eq('+Math.floor(eo_wbc_mid)+')').before('".$this->eo_wbc_buttons()."');";
          //   }
          //   else {
          //     $script.="jQuery(eo_wbc_content).append('".$this->eo_wbc_buttons()."');";
          //   }
          //   /*else{
          //     $script.="var eo_wbc_count=jQuery(eo_wbc_content).children().length;".
          //           "if(eo_wbc_count<=Number('".(get_option('eo_wbc_btn_position',1)-1)."')){".
          //           " jQuery(eo_wbc_content).append('".$this->eo_wbc_buttons()."');".
          //           "}else{".
          //           " jQuery(eo_wbc_content).children(':eq('+Number('".(get_option('eo_wbc_btn_position',1)-1)."')+')')".
          //           ".before('".$this->eo_wbc_buttons().
          //           "'); }";
          //   }            */
          //   $script.="});</script>";            
          //   echo $script.$this->eo_wbc_code();    

          // }

          echo $this->eo_wbc_buttons()/*.$this->eo_wbc_buttons_css().$this->eo_wbc_code()*/;           

        },100);
    }

    //moved inside buttons template
    // public function eo_wbc_code() //script to get color code from buttons
    // {
    //     return '<!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) --><script>'.
    //             'jQuery(document).ready(function($){'.
    //               '$(".eo_button_container .button").each(function(i,e){'.
    //                 '$(e).attr("href",$(e).attr("href")+"&EO_WBC_CODE="+window.btoa($(".woocommerce a.button").css("background-color")+"/"+$(".woocommerce a.button").css("color")));'.
    //               '});'.
    //               '$("#wbc_").find("button").on("click",function(){ document.location.href=$(this).attr("href"); })'.
    //             '});'.
    //            '</script>';
    // }

    //moved inside buttons template 
    // public function eo_wbc_buttons_css(){
    //   return '<style>.eo-wbc-container .ui.buttons .button{'.
    //       (get_option('eo_wbc_home_btn_color')?'background-color:'.get_option('eo_wbc_home_btn_color').' !important;':'').
    //       (get_option('eo_wbc_home_btn_text_color')?'color:'.get_option('eo_wbc_home_btn_text_color','#ffffff').' !important;':'').
    //       (get_option('eo_wbc_home_btn_border_color')?'border-color:'.get_option('eo_wbc_home_btn_border_color').' !important;':'').
    //       (get_option('eo_wbc_home_btn_radius')?'border-radius:'.get_option('eo_wbc_home_btn_radius').'px !important;':'').'}'.
    //       (get_option('eo_wbc_home_btn_hover_color')?'.eo-wbc-container .ui.buttons .button:hover{ background-color:'.get_option('eo_wbc_home_btn_hover_color').' !important; }</style>':'');
            
    // }

    public function eo_wbc_buttons(){ //the two buttons UI

      /*
      $heading=get_option('eo_wbc_home_btn_tagline',__('Make your own pair from recommendation','woo-bundle-choice'));

      $first_url = get_term_link( get_option('eo_wbc_first_slug'),'product_cat');
      if(empty($first_url) or is_wp_error($first_url)){
        $first_url = get_bloginfo('url').'index.php/'.get_option('eo_wbc_first_slug');
      } else {
        $first_url = esc_url($first_url);  
      }
      
      if(strpos($first_url, '?')!==false){
          $first_url.='&';
      } else {
          $first_url.='?';
      }
      
      $second_url = get_term_link( get_option('eo_wbc_second_slug'),'product_cat');
      if(empty($second_url) or is_wp_error($second_url)){
        $second_url = get_bloginfo('url').'index.php/'.get_option('eo_wbc_second_slug');
      } else {
        $second_url = esc_url($second_url);  
      }
      
      if(strpos($second_url, '?')!==false){
          $second_url.='&';
      } else {
          $second_url.='?';
      }      

      return '<!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) --><div id="wbc_" class="eo-wbc-container"><h2 class="ui center aligned header" style="text-align: center !important;">'.($heading?$heading:__('Make your own pair from recommendation','woo-bundle-choice')).'</h2><div class="ui grid center aligned container"><div class="ui buttons large row stackable"><button class="ui button primary column" href="'. $first_url .'EO_WBC=1&BEGIN='.get_option('eo_wbc_first_slug').'&STEP=1" >'.(get_option('eo_wbc_home_btn_text',__('Start with ','woo-bundle-choice'))).' '.get_option('eo_wbc_first_name','FIRST').'</button> <div class="or"></div><button class="ui button primary column" href="'. $second_url .'EO_WBC=1&BEGIN='.get_option('eo_wbc_second_slug').'&STEP=1" >'. (get_option('eo_wbc_home_btn_text',__('Start with','woo-bundle-choice'))).' '.get_option('eo_wbc_second_name','SECOND').'</button></div></div><style>.ui.grid{margin-left: auto;margin-right: auto;}  '.$this->eo_wbc_buttons_css().' @media only screen and (max-width: 768px){ .eo-wbc-container .ui.buttons .button{ border-radius: 0 !important; } }</style><br/><br/></div><!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) -->';
      */

      	if(wbc()->options->get_option('configuration','buttons_page')==3 or wbc()->options->get_option('configuration','buttons_page')==1) {

      		$button_render_error_msg = constant('EOWBC_NAME')." failed to display buttons on your current theme, you may send an error log or create a support ticket on the support forum.";

			ob_start();
			wbc()->load->template('publics/buttons', array('is_embed_using_js'=>true));
			$buttons = ob_get_clean(); 
			$script = $buttons."<script>jQuery(document).ready(function($){";

			$btn_position_setting_text = wbc()->options->get('btn_position_setting_text','');
			if(!empty($btn_position_setting_text)) {
				$script.='if(jQuery("'.$btn_position_setting_text.'").length!=0){'.
              				'jQuery("'.$btn_position_setting_text.'").append( cut_and_move_div() ); eo_wbc_buttons_bind_events();'.
              				'} else if(jQuery("#container,#primary,.entry-content,.main,#main,.post-content,#content,.content,.container").length!=0){'.
              					'jQuery(jQuery("#container,#primary,.entry-content,.main,#main,.post-content,#content,.content,.container")[0]).append( cut_and_move_div() ); eo_wbc_buttons_bind_events();'.
              				'} else {'
              					.'eo_wbc_error_popup("fatal_error","'.$button_render_error_msg.'");'/*'jQuery("body").append("'.$buttons.'");'*/.
              				'}';
              			
            } else {
            	$script.='if( jQuery("#container,#primary,.entry-content,.main,#main,.post-content,#content,.content,.container").length!=0){'.
      					'jQuery(jQuery("#container,#primary,.entry-content,.main,#main,.post-content,#content,.content,.container")[0]).append( cut_and_move_div() ); eo_wbc_buttons_bind_events();'.
      				'} else {'
      					.'eo_wbc_error_popup("fatal_error","'.$button_render_error_msg.'");'/*'jQuery("body").append("'.$buttons.'");'*/.
      				'}';
            }

            $script.='function cut_and_move_div() {
            	var buttons_div = $("#wbc_").clone(); 
            	buttons_div.show();
            	$("#wbc_").remove();
            	return buttons_div;
            }';

            $script.='});</script>';
			// echo $script;
			return $script;
		}
    }

    //moved inside buttons template 
    // public function eo_wbc_clean() { //terminate session bundle set data as use is on home page and rejects all changes.       
    //   if(function_exists('wc') && !empty(wc()->session)){
    //     wbc()->session->set('EO_WBC_SETS',NULL);               
    //   }
    // }

}
