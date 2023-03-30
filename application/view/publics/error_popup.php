<?php
/**
 *	Template to show error popup when anything fails to render or something of that sort 
 */

// Load assets first to avoid zaping effect. 
// TODO here should not load instantly and follow the wp standard by using hook as well as setting last param to false to our load asset function. 
// add_action( 'wp_enqueue_scripts',function(){ 

?>
<script type="text/javascript">
  if( typeof(jQuery.fn.accordion) === 'function' ) {
    jQuery.fn.ui_accordion = jQuery.fn.accordion;
    jQuery.fn.ui_modal = jQuery.fn.modal;
    jQuery.fn.ui_slider = jQuery.fn.slider;
  }
</script>
<?php

  global $wp_customize;
  if(empty($wp_customize)){
    //wbc()->load->asset('css','fomantic/semantic.min', array(), "", true);
  }
  wbc()->load->asset('css','publics/buttons', array(), "", true);
  wbc()->load->asset('js','fomantic/semantic.min', array(), "", true);
  wbc()->load->asset('js','publics/buttons', array(), "", true);
  wp_enqueue_script('jquery-ui-core');
// },50);
?>
<script type="text/javascript">
  if( typeof(jQuery.fn.ui_accordion) === 'function' ) {
    jQuery.fn.accordion = jQuery.fn.ui_accordion;
    jQuery.fn.modal = jQuery.fn.ui_modal;
    jQuery.fn.slider = jQuery.fn.ui_slider;
  }
</script>
<!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) -->
<div class="ui modal align center tiny centered">
<div class="ui header">              
  <h4>There is an error on <strong><?php echo constant('EOWBC_NAME'); ?></strong></h4>
</div>
<div class="content">
  <h5 id="error_popup_title"></h5>
  <?php wp_nonce_field('eowbc_send_error_report', 'eowbc_send_error_report_wpnonce'); ?>
  <?php wp_nonce_field('eo_wbc_throw_error', 'eo_wbc_throw_error_wpnonce'); ?>
  <br>
  <h5>When you send error report, you agree to SpherePlugins' <a href="https://sphereplugins.com/terms-conditions/" target="_blank">Terms</a> & <a href="https://sphereplugins.com/privacy-policy/" target="_blank">Privacy Policy</a></h5>
</div>
<div class="actions">
  	<div class="ui large red cancel button">Close</div>
  	<div class="ui large primary view_log button" href="<?php echo admin_url('admin.php?page=eowbc-setting-status&atol=setting_status_log') ?>">View and Send error report</div>              
  	<div class="ui large secondary approve ok button" style="margin-top: 1em !important;">Send an error report now!</div>
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
      
      jQuery.post('<?php echo site_url('/wp-admin/admin-ajax.php');?>',{resolver:'eowbc_send_error_report', _wpnonce:jQuery( jQuery('input[name="eowbc_send_error_report_wpnonce"]')[0] ).val(), action: 'eowbc_ajax', saved_tab_key: 'setting_status_log',is_sent_from_front_end: 1},function(data){                   
        if(data){ 
          jQuery(".ui.modal").find(".actions").html('<div class="ui large green inverted button error_sent">Ok</div>');                    
          jQuery(".ui.modal .content").html("<h5>Thank you for sending error report, Sphere Plugins Support Team will soon get in touch with you. It generally takes 12 hours.</h5>");
          jQuery.send_error=0;
        } else {
          $(".ui.modal").find(".approve").text("Resend an error report now!");
          jQuery.send_error=0;
        } 
      });                
    }
  });

  jQuery(".ui.modal").on("click",".error_sent",function(){
    jQuery('.ui.modal').modal('hide');
  });

  jQuery(".ui.modal").on("click",".view_log",function(){
    document.location.href=jQuery(this).attr('href');
    jQuery('.ui.modal').modal('hide');
    return false;
  });
  
});

function eo_wbc_error_popup(type,msg) {
  console.log("eo_wbc_error_popup called...");

	eo_wbc_outer_containers=undefined;

	//here we shall show some kind of popup for non-admin users as well, since some users might be testing frontend on diff browser or in incognito etc.
	<?php if(current_user_can('manage_options') && empty(wbc()->sanitize->get('eo_wbc_button_testing'))): ?>
	  //set the title/message in error popup
	  jQuery('#error_popup_title').html(msg);

	  //log the error in background
	  jQuery.post('<?php echo site_url('/wp-admin/admin-ajax.php');?>',{resolver:'eo_wbc_throw_error', _wpnonce:jQuery( jQuery('input[name="eo_wbc_throw_error_wpnonce"]')[0] ).val(), action: 'eowbc_ajax',page:document.location.href,type:type,msg:msg});

	  //show user popup with options to send error report or cancel 
	  // jQuery('.ui.modal').modal('show');
    jQuery('.ui.modal').modal({
      onApprove : function() {
        // ... //Validate here, or pass validation to somewhere else
        return false; //Return false as to not close modal dialog on approve click when we have to show something else after that.
      }
    }).modal('show');
	<?php endif; ?>                  


	//below testing service is not implemented yet for buttons and not implemented in general as well  
  	if(<?php echo empty(wbc()->sanitize->get('eo_wbc_button_testing'))?0:1 ?> && <?php echo current_user_can('manage_options')?1:0 ?>){

      var btn_test_service_status=0;

      if(eo_wbc_outer_container!=undefined && eo_wbc_outer_containers!=undefined && eo_wbc_outer_containers.length>0){
        
        if (eo_wbc_outer_containers.length==1) {
          btn_test_service_status=1;
        } else {
          btn_test_service_status=2;
        }
      } 

      jQuery.post('<?php echo site_url('/wp-admin/admin-ajax.php');?>',{action:'set_btn_test_service_status',btn_status:btn_test_service_status,security:'<?php echo wp_create_nonce('eowbc_set_btn_status'); ?>'},function(data){ if(Number(data)==1){  window.close(this); } });
  	}
}
</script>
