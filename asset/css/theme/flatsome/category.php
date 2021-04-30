
<?php 
	add_filter('eowbc_filter_sidebars_widgets',function(){
		return false;
	});
?>
<style type="text/css">
.row.category-page-row>.col.large-3{
	display: none !important;
}
.row.category-page-row>.col.large-9{
	max-width:100% !important;
	min-width:100% !important;

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
    
</style>