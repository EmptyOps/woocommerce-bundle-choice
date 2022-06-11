

---- a code /themes/purple_theme/woocommerce/content-single-product.php no che 
-- zoom no

<script>
 	jQuery(document).ready(function(){
 		---- error event ma sem che
        //jQuery(".small-img").hover(function(){
        jQuery(".small-img").click(function(){
            jQuery(".big-img").attr('src',jQuery(this).attr('src'));
        });
        
        if(typeof(jQuery.fn.imagezoomsl)=='function'){
        	jQuery(".big-img").imagezoomsl({
	           /* zoomrange:[3,3],
	            disablewheel: true,
	            scrollspeedanimate: 10,
	            loopspeedanimate: 5,
	            cursorshadeborder: "1px solid black",
	            magnifiereffectanimate: "slideIn",
	            magnifiersize: [640, 480],*/
	           /* disablewheel: true,
		        zoomstart: 3,
		        zoomrange: [3,3],
		        magnifiersize: [502, 502],
		        cursorshadeborder: "1px solid black",*/
		        disablewheel: true,
		        zoomstart: 2,
		        zoomrange: [2,2],
		        innerzoom: true,
		        magnifierborder: "none",
	        });
        }

        window.addEventListener('error', function(e){

        	// jQuery(".small-img").hover(function(){
        	jQuery(".small-img").click(function(){
	            jQuery(".big-img").attr('src',jQuery(this).attr('src'));
	        });

	      if(typeof(jQuery.fn.imagezoomsl)!=='function'){
	        let script = document.createElement('script');
	        script.src = "<?php echo constant('SP_THEME_PATH') . '/assets/js/N-product/zoomsl.min.js'; ?>";
	        document.head.append(script);

	        window.setTimeout(function(){
	          jQuery(".big-img").imagezoomsl({
		            /*zoomrange:[3,3],
		            disablewheel: true,
		            scrollspeedanimate: 10,
		            loopspeedanimate: 5,
		            cursorshadeborder: "1px solid black",
		            magnifiereffectanimate: "slideIn",
		            magnifiersize: [640, 480],*/
		            /*disablewheel: true,
			        zoomstart: 3,
			        zoomrange: [3,3],
			        magnifiersize: [502, 502],
			        cursorshadeborder: "1px solid black",*/
			        disablewheel: true,
			        zoomstart: 2,
			        zoomrange: [2,2],
			        innerzoom: true,
			        magnifierborder: "none",
		        });
	        },2000);
	      }
	    });

    });
</script>


---- a code /themes/purple_theme/woocommerce/content-single-product.php no che 
<?php
if(empty($url) && defined('PRODUCT_360_DIR')){ ?>
	<style type="text/css">
		/*===Desktop_img====*/
		.Zoom_Rigt-sec .big-img {
		    width: 454px;
		    height: 454px;
		    object-fit: contain;
		    margin: auto;
		    display: block !important;
		}
		.sp-purple-theme-product-dots .xzoom-container img{
		    display: block !important;
		    margin: auto;
		}
	</style>
<?php } else { ?>
	<style type="text/css">
		/*===Desktop_img====*/
		.Zoom_Rigt-sec .big-img {
		    width: 454px;
		    height: 454px;
		    object-fit: contain;
		    margin: auto;
		    display: block;
		}
		.sp-purple-theme-product-dots .xzoom-container img{
	    display: block;
	    margin: auto;
	}
	</style>

<?php } ?>