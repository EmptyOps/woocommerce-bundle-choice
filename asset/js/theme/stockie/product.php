<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossrigin="anonymous"></script> -->
<?php 
    // add_action('wp_enqueue_scripts', function(){
	// 	wp_enqueue_script( 'jquery' );
	// });
?>
<?php
if(WBC_SCRIPT_DEBUG == true){
?>    
    <script>
        jQuery(document).ready(function($){
            let breadcrumb = $('div.eo-wbc-container.container').clone();
            $('div.eo-wbc-container.container').remove();
            $('.woo_c-product.single-product:first-of-type').prepend(breadcrumb);
            $('div.eo-wbc-container.container').css('display','block');
        });
    </script>

<?php
}else{
?>
    <script>
        jQuery(document).ready((function(e){let o=e("div.eo-wbc-container.container").clone();e("div.eo-wbc-container.container").remove(),e(".woo_c-product.single-product:first-of-type").prepend(o),e("div.eo-wbc-container.container").css("display","block")}));
    </script>
    
<?php
}
?>