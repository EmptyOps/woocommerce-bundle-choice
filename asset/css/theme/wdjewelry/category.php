<style type="text/css">
	.products>li{
		visibility: visible !important;
	}
	@media (min-width: 768px){
		.col-sm-18 {
		    width: 100% !important;
		}
	}
	#reset_filter{
		left: 2em !important;
	}
	#apply_filter{
		right: 2em !important;
	}
	.products.grid>li{
		max-width:22% !important;
	}
</style>
<?php add_filter('eowbc_filter_sidebars_widgets','__return_false'); ?>