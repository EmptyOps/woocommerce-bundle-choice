<?php
add_action( 'wp_enqueue_scripts' ,function(){
?>
	<!-- ---- a code /themes/purple_theme/woocommerce/content-single-product.php no che 
	-- zoom no
	 -->
	<script>
	 	jQuery(document).ready(function(){
	 		// ACTIVE_TODO_OC_START
	 		// // ---- error event ma sem che
	 		// ACTIVE_TODO_OC_END
            // ACTIVETODO enable below code if requared
	        // //jQuery(".small-img").hover(function(){
	        // jQuery(".small-img").click(function(){
	        //     jQuery(".big-img").attr('src',jQuery(this).attr('src'));
	        // });

	        if(typeof(jQuery.fn.imagezoomsl)!=='function'){
		        let script = document.createElement('script');
		        script.src = "<?php echo constant( strtoupper( 'EOWBC_ASSET_URL' ) ).'js/variations/gallery_images/external-plugins/zoomsl/zoomsl.min.js'; ?>";
		        document.head.append(script);

		       
		     }

		    var init_function = function(){
		    	
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
			        /*disablewheel: true,
	                zoomstart: 3,
	                zoomrange: [3,3],
	                magnifiersize: [502, 502],
	                cursorshadeborder: "1px solid black",*/
			    });
		        
		    };  

		    var bind_listeners = function(){

	            window.document.splugins.wbc.variations.gallery_images.sp_slzm.api.init_listener(function(){

	                init_function();
	            });
	            window.document.splugins.wbc.variations.gallery_images.sp_slzm.api.refresh_listener(function(){
	            	
	                init_function();
	            });

		    };

		    bind_listeners();

	        window.addEventListener('error', function(e){

   	            // ACTIVETODO enable below code if requared
	        	// // jQuery(".small-img").hover(function(){
	        	// jQuery(".small-img").click(function(){
		        //     jQuery(".big-img").attr('src',jQuery(this).attr('src'));
		        // });

		        window.setTimeout(function(){

       			    bind_listeners();

		        },2000);	
		     
		    });

	    });
	</script>


	<!-- ---- a code /themes/purple_theme/woocommerce/content-single-product.php no che  -->
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



	<!-- ---- @tejas api che -->
	<style type="text/css">
		*{
		    margin: 0px;
		    padding: 0px;
		}


		ul{
		    list-style-type: none;
		    margin: 0px;
		}

		ul li{
		    margin: 0px;
		    padding: 0px;
		}


		/*====Slider=====*/


		div#slider1 {
		    float: left;
		    width: 80px;
		    position: relative;
		}

		.splide__list{
		    height: auto;
		}



		body div#slider1 .splide__list li {
		    border-radius: 5px;
		    cursor: pointer;
		    padding: 1px;
		    margin-bottom: 10px;
		}


		div#slider1 .splide__list li img{
		    width: 100%;
		    height: 100%;
		    object-fit: contain !important;
		}



		div#slider1 .splide__arrows .splide__arrow.splide__arrow--prev {
		    top: -1.5rem;
		    left: 50%;
		    transform: translate(-50%);
		    background: transparent;
		    border: 0;
		    cursor: pointer;
		    position: absolute;
		}


		div#slider1 .splide__arrows .splide__arrow.splide__arrow--next {
		    bottom: -0.8rem;
		    top: auto;
		    left: 50%;
		    transform: translate(-50%);
		    right: -2.5rem;
		    background: transparent;
		    border: 0;
		    cursor: pointer;
		    position: absolute;
		}


		div#slider1 .splide__arrows .splide__arrow.splide__arrow--prev svg {
		    transform: rotate(-90deg);
		    fill: #333;
		    stroke: currentColor;
		    stroke-linecap: square;
		    stroke-width: 0px;
		    height: 1.2rem;
		    vertical-align: middle;
		    width: 1.2rem;
		}



		 .splide__arrows .splide__arrow.splide__arrow--next svg {
		    transform: rotate(90deg);
		    fill: #333;
		    stroke: currentColor;
		    stroke-linecap: square;
		    stroke-width: 0px;
		    height: 1.2rem;
		    vertical-align: middle;
		    width: 1.2rem;
		}



		/*=======Zoom=====*/
		img.img-fluid.big-img {
		    width: 454px;
		    height: 454px;
		    object-fit: contain;
		    margin: auto;
		    border-radius: 5px;
		}
		.Zoom_Rigt-sec {
		    width: calc(100% - 130px);
		    margin-left: 15px;
		    position: relative;
		    float: left;
		}
		.img-fluid.big-img {
		    display: none;
		}
	</style>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			//zoom
		    
		    if(typeof(jQuery.fn.imagezoomsl)=='function'){
		        jQuery(".big-img").imagezoomsl({
		            disablewheel: true,
		            zoomstart: 3,
		            zoomrange: [3,3],
		            magnifiersize: [502, 502],
		            cursorshadeborder: "1px solid black",
		        });
		    }

		    /* -- a seme che uper lode kerli che
		    if(typeof(jQuery.fn.imagezoomsl)!=='function'){
		        let script = document.createElement('script');
		        script.src = "https://demo.woochoiceplugin.com/jewelry-demo-1/wp-content/themes/purple_theme/assets/js/N-product/zoomsl.min.js";
		        document.head.append(script);

		        window.setTimeout(function(){
		          jQuery(".big-img").imagezoomsl({
		                // zoomrange:[3,3],
		                // disablewheel: true,
		                // scrollspeedanimate: 10,
		                // loopspeedanimate: 5,
		                // cursorshadeborder: "1px solid black",
		                // magnifiereffectanimate: "slideIn",
		                // magnifiersize: [640, 480],
		                disablewheel: true,
		                zoomstart: 3,
		                zoomrange: [3,3],
		                magnifiersize: [502, 502],
		                cursorshadeborder: "1px solid black",
		            });
		        },2000);
		    }*/
		});
	</script>
<?php
}, 10000);
?>