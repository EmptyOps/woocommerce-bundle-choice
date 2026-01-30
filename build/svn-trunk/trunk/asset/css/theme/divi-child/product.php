
<?php

add_filter('eowbc_filter_sidebars_widgets',function(){
	return false;
});

add_filter('eowbc_filter_sidebars_widgets','__return_false');

?>
<style type="text/css">
	.container{
		width: 100% !important;
	}

	#main-content .container{
		padding-top: 1em !important;
	}
</style>