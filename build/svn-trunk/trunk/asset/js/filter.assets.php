<?php
ob_start();
?>
	<style type="text/css">
		<?php echo wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_additional_css',''); ?>
		.hide{
			display: none !important;
		}
	</style>
<?php
echo ob_get_clean();