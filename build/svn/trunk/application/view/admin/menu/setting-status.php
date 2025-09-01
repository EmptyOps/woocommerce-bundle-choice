<?php
defined( 'ABSPATH' ) || exit;

//related to log module
if(isset($_GET) && isset($_GET['action']) && wbc()->sanitize->get('action')=='clear' && !empty(wbc()->sanitize->get('ref')) ) {
	\EOWBC_Error_Handler::clean_send();
	// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
	$ref_value = wbc()->sanitize->get('ref');

	$inline_script = 
		"window.location.href='".$ref_value."';";
	wbc()->load->add_inline_script('', $inline_script, 'common');
}

// if(isset($_GET) && isset($_GET['action']) && $_GET['action']=='report'){
// 	\EOWBC_Error_Handler::eo_wbc_send_error_report();		
// 	add_action('admin_notices',function (){
// 		/* translators: %1s: <strong> tag */
// 		/* translators: %2s: </strong> tag */                
//         echo "<div class='notice notice-success is-dismissible'><p>".sprintf(__( '%1$s BUNDLOICE (formerly Woo Choice Plugin) %2$s have successfully submited error report, Sphere Plugins team will soon get in touch with you.', "woo-bundle-choice" ),"<strong>","</strong>")."</p></div>";
//     },15);
// }


$form = array();

wbc()->load->model('admin/eowbc_setting_status');
wbc()->load->model('admin/form-builder');

$form['id']='eowbc_setting_staus';
$form['title']='Setting & Status';
$form['method']='POST';
$form['tabs'] = true;
$form['data'] = \eo\wbc\model\admin\Eowbc_Setting_Status::instance()->get( eo\wbc\controllers\admin\menu\page\Setting_Status::get_form_definition());
$form['attr']= array('data-is_per_tab_save="true"');
$form["active_tab_onload"] = !empty(wbc()->sanitize->get("atol")) ? wbc()->sanitize->get("atol") : "";

//for error log form which displays code etc. 
wp_enqueue_script('wp-theme-plugin-editor');
wp_enqueue_style('wp-codemirror');    

wbc()->load->model('admin\form-builder');
eo\wbc\model\admin\Form_Builder::instance()->build($form);
wbc()->load->asset('js','admin/setting_status');	

//for error log form which displays code etc. 
	//set false to not use it because textarea text are not visible until user do not click on it once however if it is inside the first loading tab it becomes visible but now its in secnd tab. enable it when there a fix available. 
if (false && function_exists('wp_enqueue_code_editor')): 
$wp_enqueue_code_editor_json_encode = json_encode(array('codeEditor' => wp_enqueue_code_editor(array('type' => 'text'))));

// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
$inline_script = 
    "jQuery(document).ready(function(\$) {     \n" .
    "    var errors=".$wp_enqueue_code_editor_json_encode.";\n" .
    "    wp.codeEditor.initialize(\$('#eo_wbc_view_error'), errors); \n" .
    "\n" .
    "    setTimeout(function() {\n" .
    "        \$('#eo_wbc_view_error').trigger('click');\n" .
    "    }, 3000);\n" .
    "});\n";
wbc()->load->add_inline_script('', $inline_script, 'common');
	
else: ?>
<?php 
	//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
	$custom_css = "
	    .eo_wbc_view_error {
	        width: 100%;
	        min-height: 60em;
	    }
	";
	wbc()->load->add_inline_style('', $custom_css,'common');
endif;
