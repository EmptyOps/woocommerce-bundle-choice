
<?php if(wp_is_mobile()): ?>
<style type="text/css">
	@media only screen and (max-width: 375px) {
		#content{ 
		    min-width: 100% !important;
		    max-width: 100% !important;
		    margin-left: 0 !important;
    		margin-right: 0 !important;
		    padding-left: 0.5em !important;
		    padding-right: 0.5em !important;
		}
	}
</style>
<?php else: ?>
<style type="text/css">
	#content{ 
		max-width:93% !important; 
	}
	.unstackable.ui.steps .step:not(:first-of-type):before{
		left: -2px !important;
	}	
</style>
<?php endif; ?>
<style type="text/css">
	.eo_wbc_filter_icon_select div{
		overflow-wrap: normal !important;
	}
</style>

<?php
	add_filter('eowbc_filter_sidebars_widgets','__return_false');
?>