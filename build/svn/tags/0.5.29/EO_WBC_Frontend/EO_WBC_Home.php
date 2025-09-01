<?php
class EO_WBC_Home
{
    public function __construct()
    {
        add_action( 'wp_enqueue_scripts',function(){                      
          wp_register_style('eo_wbc_eo_ui_modal_css',plugin_dir_url(EO_WBC_PLUGIN_FILE).'css/modal.min.css');
          wp_enqueue_style( 'eo_wbc_eo_ui_modal_css');
          
          wp_register_script('eo_wbc_eo_ui_modal_js',plugin_dir_url(EO_WBC_PLUGIN_FILE).'js/modal.min.js');
          wp_enqueue_script( 'eo_wbc_eo_ui_modal_js');

          wp_register_style('eo_wbc_eo_ui_transition_css',plugin_dir_url(EO_WBC_PLUGIN_FILE).'css/transition.min.css');
          wp_enqueue_style( 'eo_wbc_eo_ui_transition_css');
          
          wp_register_script('eo_wbc_eo_ui_transition_js',plugin_dir_url(EO_WBC_PLUGIN_FILE).'js/transition.min.js');
          wp_enqueue_script( 'eo_wbc_eo_ui_transition_js');
        },99);

        if(isset($_GET['report']) && !empty($_GET['report'])){
          if(isset($_SERVER['HTTP_REFERER'])){
            update_option('eo_wbc_mapping_error_report',$_SERVER['HTTP_REFERER']);
          }            
        }
    }

    public function show_buttons(){
            
      add_filter('the_content',function($content){
        // Add two buttons on designated section.
        return $content."<div class='eo_wbc_jQuery_container'>".$this->eo_wbc_the_content()."</div>";
      });

      add_action('wp_footer',function(){
        ?>
          <!-- Created with Wordpress plugin - WooCommerce Product bundle choice -->
          <div class="ui modal align center tiny centered">
            <div class="ui header">              
              <h4>Integration Failure!</h4>
            </div>
            <div class="content">
              <h5><strong>WooCommerce Product Bundle Choice</strong> failed to integrate with your current theme, you may send an error log or create a support ticket on the support forum.</h5>
            </div>
            <div class="actions">
              <div class="ui large red cancel button">                
                Close
              </div>
              <a class="ui large primary button" href="<?php echo admin_url('admin.php?page=eo-wbc-logs') ?>">                
                View and Send error report
              </a>
              <div class="ui large secondary approve ok button">                
                Send an error report now!
              </div>
            </div>
          </div>
          <style type="text/css">
            .ui.modal {
              z-index: 9999;
              left: 50%;
              top: 50%;
              transform: translate(-50%,-50%);
              height: fit-content;              
            }
          </style>
          <script>
            var eo_wbc_outer_container=undefined;
            jQuery.send_error=0;

            jQuery(document).ready(function($){

              $(".ui.modal").find(".cancel").on('click',function(){
                jQuery('.ui.modal').modal('hide');
              });

              $(".ui.modal").find(".approve").on('click',function(){
                if(!jQuery.send_error){
                  jQuery.send_error=1;
                  $(this).text("Sending error report...");
                  jQuery.post('<?php echo site_url('/wp-admin/admin-ajax.php');?>',{action:'eo_wbc_home_send_error_report'},function(data){                   
                    if(data){ 
                      jQuery(".ui.modal").find(".actions").html('<div class="ui large green inverted button error_sent">Ok</div>');                    
                      jQuery(".ui.modal .content").html("<h5>Thank you for sending error report, our support team will be in touch with you shortly.</h5>");
                      jQuery.send_error=0;
                    } else {
                      $(".ui.modal").find(".approve").text("Resend an error report now!")
                      jQuery.send_error=0;
                    } 
                  });                
                }
              });

              jQuery(".ui.modal").on("click",".error_sent",function(){
                jQuery('.ui.modal').modal('hide');
              })

              if($('.eo_wbc_jQuery_container').length<=1){
                
                if($('#container').length){
                  eo_wbc_outer_container=$('#container')[0];

                } else {
                  
                  if($('#primary').length){
                    eo_wbc_outer_container=$('#primary')[0];

                  } else {

                    if($('.entry-content').length){
                      eo_wbc_outer_container=$('.entry-content')[0];

                    }else {

                      if($('.main').length){
                        eo_wbc_outer_container=$('.main')[0];

                      } else {

                        if($('#main').length){

                          eo_wbc_outer_container=$('#main')[0];
                        } 
                        else{ 

                          if( $(".post-content").length ){
                            eo_wbc_outer_container=$('.post-content')[0];
                          }
                          else {
                            <?php 
                                
                              if(current_user_can('manage_options')):
                                ?>
                                jQuery.post('<?php echo site_url('/wp-admin/admin-ajax.php');?>',{action:'eo_wbc_home_error_report',page:document.location.href});

                                jQuery('.ui.modal').modal('show');
                                <?php      
                              endif;                      
                            ?>                  
                          } 
                        }
                      }   
                    }   
                  } 
              }
              }
            });
          </script>
          <!-- <div class="eo_wbc_jQuery_container_backup">
            <script>
              jQuery(document).ready(function($){
                
                console.log($('.eo_wbc_jQuery_container_backup').parent().prev());

              });
            </script>
          </div> -->
        <?php
        //echo "<div class='eo_wbc_jQuery_container'>".$this->eo_wbc_the_content()."</div>";
      },100);
      
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

            $script="<script>jQuery(document).ready(function(){  var eo_wbc_content= jQuery('.eo_wbc_jQuery_container').parent(); if(eo_wbc_outer_container){ eo_wbc_content=eo_wbc_outer_container; }";
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
        return '<!-- Created with Wordpress plugin - WooCommerce Product bundle choice --><script>'.
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

      $heading=get_option('eo_wbc_home_btn_tagline',__('Make your own pair from recommendation','woo-bundle-choice'));

      return '<!-- Created with Wordpress plugin - WooCommerce Product bundle choice --><div id="wbc_" class="woocommerce eo-wbc-container"><h2 class="ui center aligned header" style="text-align: center !important;">'.($heading?$heading:__('Make your own pair from recommendation','woo-bundle-choice')).'</h2><div class="ui grid center aligned container"><div class="ui buttons large row stackable"><a class="ui button primary column" href="'. get_bloginfo('url').get_option('eo_wbc_first_url').'?EO_WBC=1&BEGIN='.get_option('eo_wbc_first_slug').'&STEP=1" >'.(get_option('eo_wbc_home_btn_text',__('Start with','woo-bundle-choice'))).' '.get_option('eo_wbc_first_name','').'</a> <div class="or"></div><a class="ui button primary column" href="'.get_bloginfo('url').get_option('eo_wbc_second_url').'?EO_WBC=1&BEGIN='.get_option('eo_wbc_second_slug').'&STEP=1" >'. (get_option('eo_wbc_home_btn_text',__('Start with','woo-bundle-choice'))).' '.get_option('eo_wbc_second_name','').'</a></div></div><style>.ui.grid{margin-left: auto;margin-right: auto;}  '.$this->eo_wbc_buttons_css().' @media only screen and (min-width: 768px){ .eo-wbc-container .ui.buttons .button{ border-radius: 0 !important; } }</style><br/><br/><!-- Created with Wordpress plugin - WooCommerce Product bundle choice -->';
    }

    private function eo_wbc_clean() { //terminate session bundle set data as use is on home page and rejects all changes.       

      wc()->session->set('EO_WBC_SETS',NULL);             
    }
}