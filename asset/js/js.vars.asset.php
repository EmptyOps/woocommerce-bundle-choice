<?php 

//	the common global vars -- these common global vars will load before any js layer or even inline javascript of the wbc, extensions and themes 

//	enqueue common assets 
add_action( ( !is_admin() ? 'wp_enqueue_scripts' : 'admin_enqueue_scripts'),function(){

	wbc()->load->asset('js','common',array(),"0.1.3",false,true);
}, 99);

?>
<script type="text/javascript">

	if('is_category_page' == true){ 

		window.document.splugins.common.is_category_page = window.document.splugins.common.is_category_page || {};

	}else if('is_category_page' == true){

		window.document.splugins.common.is_item_page = window.document.splugins.common.is_item_page || {};
	
	}else if('is_mobile' == true){

		window.document.splugins.common.is_mobile = window.document.splugins.common.is_mobile || {};
	
	}else if('is_tablet' == true){

		window.document.splugins.common.is_tablet = window.document.splugins.common.is_tablet || {};
	}

</script>