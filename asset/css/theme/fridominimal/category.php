
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
	
	.site-footer>.wrap>.container{
		width: 100% !important;
	    max-width: 100% !important;
	    padding: 0 !important;
	}

	.eo_wbc_filter_icon_select div{
		overflow-wrap: normal !important;
	}
	.top-bar .close {
		top: 10px !important;
	}
	#opal-canvas-filter{
		display: none !important;
	}
	.ui.labeled.ticked.range.slider .labels .label::after{
		top: -1em !important;
	}


	.osf-sorting{ display:none; } .eo_wbc_filter_icon.column.ui.image div { margin:auto !important; } .elementor-11 .elementor-element.elementor-element-97f5e0c .elementor-icon-list-icon i{ line-height: 1.2em; } .top-bar .close{ top: 0.9em !important; }

	@media only screen and (min-width: 756px){
	.text_slider_price.aligned.left,.text_slider_price.aligned.right {
	min-width:10.5em !important;
	}}

	@media only screen and (max-width:755px){
	.text_slider_price.aligned.right{
	min-width:10.5em !important;
	}
	}
	.eo_wbc_filter_icon.column.ui.image{
	overflow-wrap: normal !important;
	}
	.eo-wbc-container>.ui.steps>div>div {
	    
	    display: grid !important;
	    grid-template-columns: auto auto auto !important;
	}

	.eo-wbc-container.container:not(.filters) .ui.steps .step .column:first-child {    
	    margin-right: 5px !important;
	}

	.ui.steps .step .description {
		font-weight: 400 !important;
    	font-size: .82857143em !important;
	}
</style>

<?php
	add_filter('eowbc_filter_sidebars_widgets','__return_false');
?>
