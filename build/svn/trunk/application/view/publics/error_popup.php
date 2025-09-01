<?php
/**
 *	Template to show error popup when anything fails to render or something of that sort 
 */

// Load assets first to avoid zaping effect. 
// TODO here should not load instantly and follow the wp standard by using hook as well as setting last param to false to our load asset function. 
// add_action( 'wp_enqueue_scripts',function(){ 

if (false) {
?>
    <script type="text/javascript">
      if( typeof(jQuery.fn.accordion) === 'function' ) {
        jQuery.fn.ui_accordion = jQuery.fn.accordion;
        jQuery.fn.ui_modal = jQuery.fn.modal;
        jQuery.fn.ui_slider = jQuery.fn.slider;
      }
    </script>
<?php 
}
$inline_script =
  "if (typeof(jQuery.fn.accordion) === 'function') {\n" .
  "    jQuery.fn.ui_accordion = jQuery.fn.accordion;\n" .
  "    jQuery.fn.ui_modal = jQuery.fn.modal;\n" .
  "    jQuery.fn.ui_slider = jQuery.fn.slider;\n" .
  "}\n";

wbc()->load->add_inline_script('', $inline_script, 'common');

  global $wp_customize;
  if(empty($wp_customize)){
    //wbc()->load->asset('css','fomantic/semantic.min', array(), "", true);
  }
  wbc()->load->asset('css','publics/buttons', array(), "", true);
  wbc()->load->asset('js','fomantic/semantic.min', array(), "", true);
  wbc()->load->asset('js','publics/buttons', array(), "", true);
  wp_enqueue_script('jquery-ui-core');
// },50);

// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code
$inline_script =
    "if (typeof(jQuery.fn.ui_accordion) === 'function') {\n" .
    "    jQuery.fn.accordion = jQuery.fn.ui_accordion;\n" .
    "    jQuery.fn.modal = jQuery.fn.ui_modal;\n" .
    "    jQuery.fn.slider = jQuery.fn.ui_slider;\n" .
    "}\n";

wbc()->load->add_inline_script('', $inline_script, 'common');
?>
<!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) -->
<div class="ui modal align center tiny centered">
<div class="ui header">              
  <h4>There is an error on <strong><?php echo esc_html(constant('EOWBC_NAME')); ?></strong></h4>
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
  	<div class="ui large primary view_log button" href="<?php echo esc_url(admin_url('admin.php?page=eowbc-setting-status&atol=setting_status_log')) ?>">View and Send error report</div>              
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
<?php
$site_url_admin_ajax = site_url('/wp-admin/admin-ajax.php');
$empty_eo_wbc_button_testing = empty(wbc()->sanitize->get('eo_wbc_button_testing'))?0:1;
$current_user_can_manage_options = current_user_can('manage_options')?1:0;
$wp_create_nonce_eowbc_set_btn_status = wp_create_nonce('eowbc_set_btn_status');

$is_current_user_can_manage_options = false;
if(current_user_can('manage_options') && empty(wbc()->sanitize->get('eo_wbc_button_testing'))) {

  $is_current_user_can_manage_options = true;

}

// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
$inline_script = 
    "var eo_wbc_outer_container=undefined;\n" .
    "jQuery.send_error=0;\n" .
    "\n" .
    "jQuery(document).ready(function(\$){\n" .
    "\n" .
    "  \$(\".ui.modal\").find(\".cancel\").on('click',function(){\n" .
    "    jQuery('.ui.modal').modal('hide');\n" .
    "  });\n" .
    "\n" .
    "  \$(\".ui.modal\").find(\".approve\").on('click',function(){\n" .
    "    if(!jQuery.send_error){\n" .
    "      jQuery.send_error=1;\n" .
    "      \$(this).text(\"Sending error report...\");\n" .
    "      \n" .
    "      jQuery.post('".$site_url_admin_ajax."',{resolver:'eowbc_send_error_report', _wpnonce:jQuery( jQuery('input[name=\"eowbc_send_error_report_wpnonce\"]')[0] ).val(), action: 'eowbc_ajax', saved_tab_key: 'setting_status_log',is_sent_from_front_end: 1},function(data){                   \n" .
    "        if(data){ \n" .
    "          jQuery(\".ui.modal\").find(\".actions\").html('<div class=\"ui large green inverted button error_sent\">Ok</div>');                    \n" .
    "          jQuery(\".ui.modal .content\").html(\"<h5>Thank you for sending error report, Sphere Plugins Support Team will soon get in touch with you. It generally takes 12 hours.</h5>\");\n" .
    "          jQuery.send_error=0;\n" .
    "        } else {\n" .
    "          \$(\".ui.modal\").find(\".approve\").text(\"Resend an error report now!\");\n" .
    "          jQuery.send_error=0;\n" .
    "        } \n" .
    "      });                \n" .
    "    }\n" .
    "  });\n" .
    "\n" .
    "  jQuery(\".ui.modal\").on(\"click\",\".error_sent\",function(){\n" .
    "    jQuery('.ui.modal').modal('hide');\n" .
    "  });\n" .
    "\n" .
    "  jQuery(\".ui.modal\").on(\"click\",\".view_log\",function(){\n" .
    "    document.location.href=jQuery(this).attr('href');\n" .
    "    jQuery('.ui.modal').modal('hide');\n" .
    "    return false;\n" .
    "  });\n" .
    "  \n" .
    "});\n" .
    "\n" .
    "function eo_wbc_error_popup(type,msg) {\n" .
    "  console.log(\"eo_wbc_error_popup called...\");\n" .
    "\n" .
    "\teo_wbc_outer_containers=undefined;\n" .
    "\n" .
    "\t//here we shall show some kind of popup for non-admin users as well, since some users might be testing frontend on diff browser or in incognito etc.\n" .
    
    "  " .
        (
          $is_current_user_can_manage_options == true 
          ? 
            "    //set the title/message in error popup\n" .
            "    jQuery('#error_popup_title').html(msg);\n" .
            "\n" .
            "    //log the error in background\n" .
            "    jQuery.post('".$site_url_admin_ajax."',{resolver:'eo_wbc_throw_error', _wpnonce:jQuery( jQuery('input[name=\"eo_wbc_throw_error_wpnonce\"]')[0] ).val(), action: 'eowbc_ajax',page:document.location.href,type:type,msg:msg});\n" .
            "\n" .
            "    //show user popup with options to send error report or cancel \n" .
            "    // jQuery('.ui.modal').modal('show');\n" .
            "    jQuery('.ui.modal').modal({\n" .
            "      onApprove : function() {\n" .
            "        // ... //Validate here, or pass validation to somewhere else\n" .
            "        return false; //Return false as to not close modal dialog on approve click when we have to show something else after that.\n" .
            "      }\n" .
            "    }).modal('show');\n" 
          :
            ""
        ) . 

    "\n" .
    "\t//below testing service is not implemented yet for buttons and not implemented in general as well  \n" .
    "  \tif(".$empty_eo_wbc_button_testing." && ".$current_user_can_manage_options."){\n" .
    "\n" .
    "    var btn_test_service_status=0;\n" .
    "\n" .
    "    if(eo_wbc_outer_container!=undefined && eo_wbc_outer_containers!=undefined && eo_wbc_outer_containers.length>0){\n" .
    "      \n" .
    "      if (eo_wbc_outer_containers.length==1) {\n" .
    "        btn_test_service_status=1;\n" .
    "      } else {\n" .
    "        btn_test_service_status=2;\n" .
    "      }\n" .
    "    } \n" .
    "\n" .
    "    jQuery.post('".$site_url_admin_ajax."',{action:'set_btn_test_service_status',btn_status:btn_test_service_status,security:'".$wp_create_nonce_eowbc_set_btn_status."'},function(data){ if(Number(data)==1){  window.close(this); } });\n" .
    "  }\n" .
    "}\n";
wbc()->load->add_inline_script( '', $inline_script, 'common' );
?>
