
<?php if(wp_is_mobile()): ?>
<style type="text/css">

</style>
<?php else: ?>
<style type="text/css">
	#content{ 
		max-width:93% !important; 
	}
	.unstackable.ui.steps .step:not(:first-of-type):before{
		left: -1px !important;
	}
</style>
<?php endif; ?>