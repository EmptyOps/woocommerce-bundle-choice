<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossrigin="anonymous"></script> -->
<?php 
    // add_action('wp_enqueue_scripts', function(){
	// 	wp_enqueue_script( 'jquery' );
	// });
$inline_script = 
  "jQuery(document).ready(function($){\n" .
  "    let breadcrumb = $('div.eo-wbc-container.container').clone();\n" .
  "    $('div.eo-wbc-container.container').remove();\n" .
  "    $('.woo_c-product.single-product:first-of-type').prepend(breadcrumb);\n" .
  "    $('div.eo-wbc-container.container').css('display','block');\n" .
  "  });\n";

wbc()->load->add_inline_script( '', $inline_script, 'common' );

if (false) {
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
}