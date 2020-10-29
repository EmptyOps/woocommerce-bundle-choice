<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
	jQuery(document).ready(function($){
		let breadcrumb = $('div.eo-wbc-container.container').clone();
		$('div.eo-wbc-container.container').remove();
		$('.woo_c-product.single-product:first-of-type').prepend(breadcrumb);
		$('div.eo-wbc-container.container').css('display','block');
	});
</script>