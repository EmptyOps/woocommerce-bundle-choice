<style type="text/css">
#header_main{height: fit-content;}
@media only screen and (max-width: 767px){
	.responsive #top #wrap_all .main_menu {
		top:2.5em !important;
	}
}
</style>

<?php
	add_filter('eowbc_filter_sidebars_widgets','__return_false');
	/*add_filter( 'sidebars_widgets',function($sidebars_widgets ) {
		//var_dump($sidebars_widgets);
        return $sidebars_widgets;
    },7);*/	
?>