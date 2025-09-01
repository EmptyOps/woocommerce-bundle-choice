
<?php 
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
		if(wp_mail('emptyopssphere@gmail.com,mahesh@emptyops.com','Error Log : '.home_url(),file_get_contents(EO_WBC_PLUGIN_DIR.'eo_debug.txt'))){
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

	add_filter( 'admin_footer_text',function($footer_text){
	    /* translators: %1s: <strong> tag */
	    /* translators: %2s: </strong> tag */
	    /* translators: %3s: rating link */
	    return "<p id='footer-left' class='alignleft'>".sprintf(__('If you like %1$s WooCommerce Bundle Choice %2$s please leave us a %3$s  rating. A huge thanks in advance!',"woo-bundle-choice"),"<strong>","</strong>","<a href='https://wordpress.org/support/plugin/woo-bundle-choice/reviews?rate=5#new-post' target='_blank' class='wc-rating-link' data-rated='Thanks :)'>★★★★★</a>")."</p>";
	});
    
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
		
	?>
	<h2><?php _e("Following error details will be sent to <strong>Woo Bundle Choice's</strong> support team.","woo-bundle-choice"); ?></h2>
	<textarea class="eo_wbc_view_error" id="eo_wbc_view_error" data-init="1" style="border: 1px solid #ddd;"><?php echo$errors; ?></textarea> 
	<br/>
	<div style="float: right;">
		<input type="submit" value="Cancel" class="submit button" name="clear" onclick="window.location.href=document.referrer">
		<input type="submit" value="Send error report" class="submit button-primary" name="report" onclick="window.location.href='<?php echo admin_url('admin.php?page=eo-wbc-home&eo_wbc_view_error=1&action=report'); ?>'">	
		<br/><br/>
		<a href="<?php echo admin_url('admin.php?page=eo-wbc-home&eo_wbc_view_error=1&action=clear&ref='.$_SERVER['HTTP_REFERER']); ?>"><?php _e("Clear log and retrun.","woo-bundle-choice"); ?></a>
	</div>
	
	<script>                                 
        jQuery(document).ready(function($) {     
            var errors=<?php echo json_encode(array('codeEditor' =>wp_enqueue_code_editor(array('type' => 'text')))); ?>                              
            wp.codeEditor.initialize($('#eo_wbc_view_error'), errors); 
        });
    </script>   
</div>
