<style type="text/css">
.ui.grid>.column:not(.row), .ui.grid>.row>.column{
	width: 6.25% !important;
}
.social-icons i[class^="icon-"]{
	line-height:2 !important;
}

.social-icons .primary{
	width: auto !important;
}
.mfp-container:before {
    content: '';    
    height: max-content !important;
}

@media only screen and (max-width:768px ){
	.header-full-width .container{
		max-height: 2rem !important;
	}
}
.cart #eo_wbc_add_to_cart {
	margin-bottom: 0rem;
}
.image-tools.bottom.left .zoom-button {
	display: flex;
	justify-content: center;
	align-items: center;
}
.image-tools.bottom.left a i {
    top: 0.5px !important;
}
</style>

<?php 
	add_filter('eowbc_filter_sidebars_widgets',function(){
		return false;
	});
?>