
<?php 

	function eo_wbc_get_system_details(){

		$user_data=wp_get_current_user();

		$wp_version=get_bloginfo('version');	
		$name=$user_data->data->display_name;
		$email=$user_data->data->user_email;

		include_once( ABSPATH.'wp-admin/includes/plugin.php' );

		$plugins='';
		$available_plugins='';
		if(function_exists('get_plugins')){		

			$plugins=get_plugins();		
			$available_plugins=json_encode(
									array_combine(
										array_column($plugins,'Name'),
										array_column($plugins,'Version')
									)
								);
		}
		$active_plugins=get_option('active_plugins');
		
		if(!empty($plugins)){
			array_walk($active_plugins,function(&$val,$index,$plugins){
				$val=$plugins[$val]['Name'];
			},$plugins);
		}	

		$active_plugins=implode(', ', $active_plugins);

		$details='-------------------------------------------------------';

		$nl='
';
		$details.=$nl.'-------------------------------------------------------'.$nl;
		$details.='Name: '.$name.$nl;
		$details.='Email: '.$email.$nl;
		$details.='WP version: '.$wp_version.$nl;
		$details.='Plugins: '.$available_plugins.$nl;
		$details.='Active Plugins: '.$active_plugins.$nl;

		return $details;
	}
	
	function clean_send(){
		file_put_contents(EO_WBC_PLUGIN_DIR.'eo_debug.txt', '');
		update_option('eo_wbc_error_report',0);
	}
	
	if(isset($_GET) && isset($_GET['action']) && $_GET['action']=='clear' && !empty($_GET['ref']) ){
		clean_send();
		?>
			<script>
				window.location.href='<?php echo $_GET['ref']; ?>';
			</script>
		<?php
	}

	if(isset($_GET) && isset($_GET['action']) && $_GET['action']=='report'){
		if(wp_mail('emptyopssphere@gmail.com,mahesh@emptyops.com','Error Log : '.home_url(),file_get_contents(EO_WBC_PLUGIN_DIR.'eo_debug.txt').eo_wbc_get_system_details())){
			clean_send();
			
			add_action('admin_notices',function (){
				/* translators: %1s: <strong> tag */
	    		/* translators: %2s: </strong> tag */                
                echo "<div class='notice notice-success is-dismissible'><p>".sprintf(__( '%1$s Woo Bundle Choice %2$s have successfully submited error report, expect fixup within 2-3 working days.', "woo-bundle-choice" ),"<strong>","</strong>")."</p></div>";
            },15);
		}		
	}
  
	wp_enqueue_script('wp-theme-plugin-editor');
	wp_enqueue_style('wp-codemirror');    
?>
<div class="wrap woocommerce">
<h1></h1>
	<?php EO_WBC_Head_Banner::get_head_banner(); ?> 
  <br/>
        <p><a href="https://wordpress.org/support/plugin/woo-bundle-choice" target="_blank"><?php _e("If you are facing any issue, please write to us immediately.","woo-bundle-choice") ?></a></p>
	<br/>
	<hr/>
	<div style="clear:both;"></div>
	<?php
		
		$errors=file_get_contents(EO_WBC_PLUGIN_DIR.'eo_debug.txt');

		if(!empty($errors)){
			$errors=$errors.eo_wbc_get_system_details();
		}
	?>
	<h2><?php _e("Following error details will be sent to <strong>Woo Bundle Choice's</strong> support team.","woo-bundle-choice"); ?></h2>
	<textarea class="eo_wbc_view_error" id="eo_wbc_view_error" data-init="1" style="border: 1px solid #ddd;"><?php echo$errors; ?></textarea> 
	<br/>
	<div style="float: right;">
		<input type="submit" value="Cancel" class="submit button" name="clear" onclick="window.location.href=document.referrer">
		<input type="submit" value="Send error report" class="submit button-primary" name="report" onclick="window.location.href='<?php echo admin_url('admin.php?page=eo-wbc-home&eo_wbc_view_error=1&action=report'); ?>'">	
		<br/><br/>
		<a href="<?php echo admin_url('admin.php?page=eo-wbc-home&eo_wbc_view_error=1&action=clear&ref='.
		(empty($_SERVER['HTTP_REFERER'])? admin_url('admin.php?page=eo-wbc-home'):$_SERVER['HTTP_REFERER'])); ?>"><?php _e("Clear log and retrun.","woo-bundle-choice"); ?></a>
	</div>
	<?php if (function_exists('wp_enqueue_code_editor')): ?>
		<script>                                 
	        jQuery(document).ready(function($) {     
	            var errors=<?php echo json_encode(array('codeEditor' =>wp_enqueue_code_editor(array('type' => 'text')))); ?>                              
	            wp.codeEditor.initialize($('#eo_wbc_view_error'), errors); 
	        });
	    </script>   
	<?php else: ?>
		<style type="text/css">
			.eo_wbc_view_error{
				width: 100%;
				min-height: 30em;
			}
		</style>
	<?php endif; ?>
</div>

<?php EO_WBC_Head_Banner::get_footer_line(); ?>