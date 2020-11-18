
<?php if(wp_is_mobile()): ?>
<style type="text/css">

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
</style>
<?php endif; ?>