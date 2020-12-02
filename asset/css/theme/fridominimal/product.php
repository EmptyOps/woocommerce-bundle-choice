
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
	/*#content{ 
		max-width:98% !important; 
	}*/
	
	body {	    
	    font-family: "Avenir Next", Sans-serif !important;
	    line-height: 1.86 !important;
	}

	h1, h2, h3, h4, h5 {
	    font-family: 'Avenir Next' !important;
	    line-height: 1.4em !important;    
	    font-weight: 400 !important;
	    padding: 0 !important;
	}

	#content a{
		color:black !important
	}
	.eo-wbc-container.container .ui.steps .step{
		padding-left: 2.5em !important;
		padding-bottom: 2.5em !important;
	}
	.top-bar .close {
		top: 10px !important;
	}
</style>
<?php endif; ?>

<?php 
add_action('wp_footer',function(){
	?>
		<style type="text/css">
			.eo-wbc-container.container .ui.steps .step{
				padding-left: 2.5em !important;
				padding-bottom: 2.5em !important;
			}	
		</style>
	<?php
},999); ?>

<?php
	add_filter('eowbc_filter_sidebars_widgets','__return_false');
?>