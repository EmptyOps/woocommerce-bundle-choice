<?php
/*
*	Displays the setup wizard content
*/
?>
<div class="ui segment container" style="height: 100%;margin-bottom: 0px; border: none !important;
box-shadow: none;">
 	<div class="ui icon header" style="width: 100%;">
	    <img src="<?php echo esc_url(constant('EOWBC_ICON_SVG')); ?>" style="max-width: 100%; max-height: auto;" />
	    <br/>
	    <p><?php echo esc_html(constant('EOWBC_NAME')); ?></p>
	    <hr />
	</div>

	<div class="ui ordered fluid steps">
      	<div class="<?php echo esc_attr($step == 1 ? 'active' : ($step > 1 ? 'completed' : '')); ?> step">
		    <div class="content">
		        <div class="title">Inventory</div>
		        <div class="description">Choose inventory</div>
		    </div>
		</div>
		<div class="<?php echo esc_attr($step == 2 ? 'active' : ($step > 2 ? 'completed' : '')); ?> step">
		    <div class="content">
		        <div class="title">Features</div>
		        <div class="description">Choose Features to be enabled</div>
		    </div>
		</div>
		<div class="<?php echo esc_attr($step == 3 ? 'active' : ($step > 3 ? 'completed' : '')); ?> step">
		    <div class="content">
		        <div class="title">Sample Data</div>
		        <div class="description">Add sample products and Complete</div>
		    </div>
		</div>
    </div>

	<form method="GET">
		<?php wp_nonce_field('eo_wbc_setup'); ?>
			<input type="hidden" name="page" value="<?php echo 'eowbc'/*'eo-wbc-init'*/; ?>"/>
		<input type="hidden" name="wbc_setup" value="<?php echo '1'; ?>"/>
			<input type="hidden" name="step" value="<?php echo esc_attr($step + 1); ?>">

<?php 
	if( !empty($template) ){
		$vars = array();
		if(isset($feature_option)) {
			$vars["feature_option"] = $feature_option;
			$vars["bonus_features"] = $bonus_features;
			$vars["available_sample"] = $available_sample;
			$vars["available_feature"] = $available_feature;
		}

		wbc()->load->template('admin/setup-wizard/'.$template, $vars );	
	}
?>

  	</form>
</div>
<?php 
	if (false) {
 ?>
<script>
	jQuery(document).ready(function(){
		jQuery('.ui.dropdown').dropdown();

		jQuery('[name="eo_wbc_inventory_type"]').parent().dropdown('set selected','<?php echo wbc()->options->get_option('setting_status_setting_status_setting','inventory_type', ''); ?>');    

		jQuery('.ui.checkbox').checkbox();

		jQuery("#create_product").on('click',function(e){
			console.log('preventDefault');
			e.preventDefault();
			e.stopPropagation();
			window.location.href = jQuery(this).data('link');/*"<?php //echo admin_url("admin.php?page=eowbc&eo_wbc_view_auto_jewel=1&f="); ?>"*/;
		});
	});
</script>

<?php }
		$inline_script =
		    "jQuery(document).ready(function(){\n" .
		    "    jQuery('.ui.dropdown').dropdown();\n" .
		    "\n" .
		    "    jQuery('[name=\"eo_wbc_inventory_type\"]').parent().dropdown('set selected','" . wbc()->options->get_option('setting_status_setting_status_setting', 'inventory_type', '') . "');    \n" .
		    "\n" .
		    "    jQuery('.ui.checkbox').checkbox();\n" .
		    "\n" .
		    "    jQuery(\"#create_product\").on('click',function(e){\n" .
		    "        console.log('preventDefault');\n" .
		    "        e.preventDefault();\n" .
		    "        e.stopPropagation();\n" .
		    "        window.location.href = jQuery(this).data('link');/*\"" . admin_url("admin.php?page=eowbc&eo_wbc_view_auto_jewel=1&f=") . "\"*/;\n" .
		    "    });\n" .
		    "});\n";
		wbc()->load->add_inline_script('', $inline_script, 'common');
