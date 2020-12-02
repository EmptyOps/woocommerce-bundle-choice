<style type="text/css">
	#content{ 
		max-width:93% !important; 
		font-family: Avenir !important;
	}
	.eo-wbc-container.container .ui.steps .step{
		padding-bottom:2.5em !important;
	}
	.ui.button,.ui.cards>.card>.content>.header{
		font-family: Avenir !important;
	}
	.ui.button{
		color: white !important;
	}

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
	.unstackable.ui.steps .step:not(:first-of-type):before{
		left: -1px !important;
	}
	button.ui.button.right.floated.aligned{
		color: white !important;
	}
	.eowbc_product_multiplier{
		display: none !important;
	}
	.top-bar .close {
		top: 10px !important;
	}
</style>

<?php
	add_filter('eowbc_filter_sidebars_widgets','__return_false');
?>