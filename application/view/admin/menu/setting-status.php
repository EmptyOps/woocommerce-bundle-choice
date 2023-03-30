<?php
defined( 'ABSPATH' ) || exit;

//related to log module
if(isset($_GET) && isset($_GET['action']) && wbc()->sanitize->get('action')=='clear' && !empty(wbc()->sanitize->get('ref')) ) {
	\EOWBC_Error_Handler::clean_send();
	?>
		<script>
			window.location.href='<?php echo wbc()->sanitize->get('ref'); ?>';
		</script>
	<?php
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
if (false && function_exists('wp_enqueue_code_editor')): ?>
	<script>                                 
        jQuery(document).ready(function($) {     
            var errors=<?php echo json_encode(array('codeEditor' =>wp_enqueue_code_editor(array('type' => 'text')))); ?>                              
            wp.codeEditor.initialize($('#eo_wbc_view_error'), errors); 

            setTimeout(function() {
            	$('#eo_wbc_view_error').trigger('click');
            }, 3000);
        });
    </script>   
<?php else: ?>
	<style type="text/css">
		.eo_wbc_view_error{
			width: 100%;
			min-height: 60em;
		}
	</style>
<?php endif;
