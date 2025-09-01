<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	$tab = isset($_GET['tab'])? sanitize_text_field( $_GET['tab'] ) : 'general';	
	if( isset($_POST['color_swatches_setting_form_nonce_field']) )
	{
		
		if ( ! isset( $_POST['color_swatches_setting_form_nonce_field'] ) || ! wp_verify_nonce( $_POST['color_swatches_setting_form_nonce_field'], 'color_swatches_setting_form_action' ) ) 
		{

		   print 'Sorry, your nonce did not verify.';
		   
		   exit;

		} 
		else
		{
		
			if(isset($_POST["reset"]) && $_POST["reset"] == 'Reset')
			{
				
				$swatches_style_p	 = isset($_POST['swatches_style'])?sanitize_text_field($_POST['swatches_style']):"";
				
				$array 	= array();
					
				$array['swatches_style']  = $swatches_style_p;
				
				update_option('color_swatches_setting_values', $array);
				
				update_option('enable_plugin', 1);
				
			}else{
				
				
				$enable_plugin = isset($_POST['enable_plugin'])?sanitize_text_field($_POST['enable_plugin']):"";
			
				$swatches_style_p	 = isset($_POST['swatches_style'])?sanitize_text_field($_POST['swatches_style']):"";
				
				$array 	= array(
					"swatches_style"=>$swatches_style_p,
					
				);	
				
				update_option('color_swatches_setting_values', $array);
				
				update_option('enable_plugin', $enable_plugin);
				
			}
		}
		
	}

	$color_swatches_setting_values = get_option('color_swatches_setting_values');
	
	$enable_plugin = get_option('enable_plugin');

	$swatches_style = isset($color_swatches_setting_values['swatches_style'])?$color_swatches_setting_values['swatches_style']:'';
	
?>
	
	<h3><?php _e("Color Swatches Plugin Settings",'phoen-visual-attributes'); ?></h3>
	
	<h2 class="nav-tab-wrapper woo-nav-tab-wrapper">
	
		<a class="nav-tab <?php if($tab == 'general'){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=phoe_color_swatches_menu_pro&tab=general"><?php _e('General', 'phoen-visual-attributes'); ?></a>

		<a class="nav-tab <?php if($tab == 'premium'){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=phoe_color_swatches_menu_pro&tab=premium"><?php _e('Premium', 'phoen-visual-attributes'); ?></a>
		

		<a class="nav-tab <?php if($tab == 'support'){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=phoe_color_swatches_menu_pro&tab=support"><?php _e('Support', 'phoen-visual-attributes'); ?></a>


		<a class="nav-tab <?php if($tab == 'how-to-install'){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=phoe_color_swatches_menu_pro&tab=how-to-install"><?php _e('How to install', 'phoen-visual-attributes'); ?></a>
		

		<a class="nav-tab <?php if($tab == 'woocommece-app'){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=phoe_color_swatches_menu_pro&tab=woocommece-app"><?php _e('Woocommerce App', 'phoen-visual-attributes'); ?></a>
		
	</h2>
	<?php
		if($tab == 'general' || $tab == '')
		{
			include_once(plugin_dir_path( __FILE__ ).'../include/general-settings.php');
		}else if($tab == 'premium')
		{
			include_once(plugin_dir_path( __FILE__ ).'../include/premium-tab.php');
			
		}else if($tab == 'support')
		{
			include_once(plugin_dir_path( __FILE__ ).'../include/support.php');
		}else if($tab == 'how-to-install')
		{
			include_once(plugin_dir_path( __FILE__ ).'../include/how-to-install.php');
			
		}else if($tab == 'woocommece-app')
		{
			include_once(plugin_dir_path( __FILE__ ).'../include/woocommerce-app.php');
			
		} 
	?>