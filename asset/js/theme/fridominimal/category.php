<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(document).on('click','.product-block.has-gallery .woocommerce-loop-product__gallery .gallery_item ',function(){

		    let _this = jQuery(this);
		    let _root = jQuery(_this).closest('.product-block.has-gallery');
		    jQuery(_root).find('.gallery_item.active').removeClass('active');
		    jQuery(_this).addClass('active');
		    jQuery(_root).find('.product-image.no-gallery img').attr('srcset',jQuery(_this).find('img').attr('srcset'));
		});
	});
</script>