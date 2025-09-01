<?php
add_action( 'wp_enqueue_scripts' ,function(){

	// ACTIVE_TODO temp: wen we enabel back the mobile site at that time remove below false condition.
	if (false and wbc_is_mobile()) {
		$file_suffix = (WBC_SCRIPT_DEBUG) ? '' : '.min';
		wbc()->load->asset('css','variations/gallery_images/external-plugins/xzoom/xzoom'.$file_suffix,array(),"",false,true);
		$file_suffix = (WBC_SCRIPT_DEBUG) ? '' : '.min';
		wbc()->load->asset('js','variations/gallery_images/external-plugins/xzoom/xzoom'.$file_suffix,array(),"",true,true);
		?>
		<script type="text/javascript">
			(function ($) {
			    // jQuery(document).ready(function() {
			    document.addEventListener("DOMContentLoaded", function() {         
			        jQuery('.xzoom3, .xzoom-gallery3').xzoom({position: 'lens', lensShape: 'circle', sourceClass: 'xzoom-hidden'});
			        jQuery('.xzoom-gallery3').on('click mouseenter mousemove mouseleave',function(){

			            jQuery('.xzoom-gallery3.xactive').removeClass('xactive');
			            jQuery(this).addClass('xactive');
			        });

			    });
			})(jQuery);
		</script>
		<?php

	} else { 

		// ---- a code /themes/purple_theme/woocommerce/content-single-product.php no che 
		// -- zoom no

	?> 
		<script>
		 	// jQuery(document).ready(function(){
		 	document.addEventListener("DOMContentLoaded", function() { 
		 		// ACTIVE_TODO_OC_START
		 		// // ---- error event ma sem che
		 		// ACTIVE_TODO_OC_END
	            // ACTIVETODO enable below code if requared
		        // //jQuery(".small-img").hover(function(){
		        // jQuery(".small-img").click(function(){
		        //     jQuery(".big-img").attr('src',jQuery(this).attr('src'));
		        // });

		    	// ACTIVE_TODO temp. remove it when we need to enable zoom, added on 30-09-2023
		    	return false;
		    	
			    var zoom_init_function = function(){
			    	
			    	// ACTIVE_TODO temp. remove it when we need to enable zoom, added on 30-09-2023
			    	return false;

	            	console.log(" zoom asset init_function ");

	            	// -- aa backup commented rakhelu se @a 21-09-2023
			        // jQuery(".big-img").imagezoomsl({
			        //     /*zoomrange:[3,3],
			        //     disablewheel: true,
			        //     scrollspeedanimate: 10,
			        //     loopspeedanimate: 5,
			        //     cursorshadeborder: "1px solid black",
			        //     magnifiereffectanimate: "slideIn",
			        //     magnifiersize: [640, 480],*/
			        //     /*disablewheel: true,
				    //     zoomstart: 3,
				    //     zoomrange: [3,3],
				    //     magnifiersize: [502, 502],
				    //     cursorshadeborder: "1px solid black",*/
				    //     disablewheel: true,
				    //     zoomstart: 2,
				    //     zoomrange: [2,2],
				    //     innerzoom: true,
				    //     magnifierborder: "none",
   			        //     /*magnifiersize: [502, 502],
   			        //     cursorshadeborder: "1px solid black",*/
				    //     /*disablewheel: true,
		            //     zoomstart: 3,
		            //     zoomrange: [3,3],
		            //     magnifiersize: [502, 502],
		            //     cursorshadeborder: "1px solid black",*/
				    // });
					
					// -- aa setTimeout @a mukelo se 21-09-2023			        
	            	setTimeout(function (argument) {
	            		
				        jQuery(".big-img").imagezoomsl({
				            /*zoomrange:[3,3],
				            disablewheel: true,
				            scrollspeedanimate: 10,
				            loopspeedanimate: 5,
				            cursorshadeborder: "1px solid black",
				            magnifiereffectanimate: "slideIn",
				            magnifiersize: [640, 480],*/
				            disablewheel: true,
					        zoomstart: 3,
					        zoomrange: [3,3],
					        magnifiersize: [502, 502],
					        cursorshadeborder: "1px solid black",
					        /*disablewheel: true,
					        zoomstart: 2,
					        zoomrange: [2,2],
					        innerzoom: true,
					        magnifierborder: "none",*/
	   			            /*magnifiersize: [502, 502],
	   			            cursorshadeborder: "1px solid black",*/
					        /*disablewheel: true,
			                zoomstart: 3,
			                zoomrange: [3,3],
			                magnifiersize: [502, 502],
			                cursorshadeborder: "1px solid black",*/
					    });
	            	},1000);

			    };  

			    var bind_listeners = function(){

			    	console.log(" zoom asset bind_listeners ");

		            window.document.splugins.wbc.variations.gallery_images.sp_slzm.api.init_listener('imagezoomsl', function(event, stat_object, notification_response){

		            	console.log(" zoom asset init_listener ");
		                
		                zoom_init_function();

		            });
		            window.document.splugins.wbc.variations.gallery_images.sp_slzm.api.refresh_listener('imagezoomsl' ,function(event, stat_object, notification_response){

		            	console.log(" zoom asset refresh_listener ");

		                zoom_init_function();

		            });

			    };

		  //       if(typeof(jQuery.fn.imagezoomsl)!=='function'){
				// 	let script = document.createElement('script');
					// script.src = "<?php /*echo constant( strtoupper( 'EOWBC_ASSET_URL' ) ).'js/variations/gallery_images/external-plugins/zoomsl/zoomsl.min.js';*/ ?>";
				// 	document.head.append(script);

			 //        window.setTimeout(function(){

	   //     			    bind_listeners();

			 //        },2000);	

				// } else {

				//     bind_listeners();
				// }

				console.log(" gallery zoom asset DOMContentLoaded");

				// document.addEventListener("DOMContentLoaded", function() { 
				// jQuery( window ).on('load', function() {

					console.log(" zoom asset DOMContentLoaded");

					if(typeof(jQuery.fn.imagezoomsl)!=='function'){
						
						console.log(" zoom asset DOMContentLoaded");
						
						let script = document.createElement('script');
						script.src = "<?php echo constant( strtoupper( 'EOWBC_ASSET_URL' ) ).'js/variations/gallery_images/external-plugins/zoomsl/zoomsl.min.js'; ?>";
						document.head.append(script);

				        window.setTimeout(function(){

							console.log(" zoom asset DOMContentLoaded timeout if");

		       			    bind_listeners();

				        },1000);	

					} else {

					    window.setTimeout(function(){

							console.log(" zoom asset DOMContentLoaded timeout else");

		       			    bind_listeners();

				        },1000);	
					}
				// });

				// ACTIVE_TODO we can use error event only for page loading context but after that we need to cancle them othrewising thay keep firing on any errors. 
		        window.addEventListener('error', function(e){

	   	            // ACTIVETODO enable below code if requared
		        	// // jQuery(".small-img").hover(function(){
		        	// jQuery(".small-img").click(function(){
			        //     jQuery(".big-img").attr('src',jQuery(this).attr('src'));
			        // });

			        window.setTimeout(function(){

		            	console.log(" zoom asset addEventListener error ");

	       			    bind_listeners();

			        },1000);	
			     
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


			/*=======Zoom=====*/
			img.img-fluid.big-img {
			    width: 454px;
			    height: 454px;
			    -o-object-fit: contain;
			       object-fit: contain;
			    margin: auto;
			    display: block;
			    border-radius: 5px;
			}
			.Zoom_Rigt-sec {
			    width: calc(100% - 130px);
			    margin-left: 15px;
			    position: relative;
			    float: left;
			}

			.imagezoomsl_zoom_container {
			    width: calc(100% - 130px);
			    margin-left: 15px;
			    float: left;
			    clear: right;
			    position: relative;
			}
			.imagezoomsl_zoom_container .Zoom_Rigt-sec.img-wrapper {
			    width: 100% !important;
				margin-left: 0;
			}

			body .spui_video_container video {
			    max-width: 100%;
			    -o-object-fit: contain;
			       object-fit: contain;
			    display: block;
			    margin: auto;
			    min-height: 454px;
			    width: 454px;
			}
			/*.img-fluid.big-img {
			    display: none;
			}*/


			.Product_Left_Wrapper_Plugin_Images .imagezoomsl_zoom_container{
				min-height: 454px;
			}


			@media(max-width:767px){
				.Product_Left_Wrapper_Plugin_Images .imagezoomsl_zoom_container{
					min-height: auto;
				}
			}

			/*------Responsive------*/
			@media(max-width:480px){
				.Product_Left_Wrapper_Plugin_Images .imagezoomsl_zoom_container {
				    width: 100%;
				    float: none !important;
				    margin-left: 0;
				}
				body img.img-fluid.big-img{
					 width: 395px;
			    	height: 395px;
				}
				body .spui_video_container video{
					min-height: 395px;
    				width: 395px;
				}
				
			}
			



		</style>
		<script type="text/javascript">
			// ACTIVE_TODO zoom asset.php ma last ma ek script haji rai gai, te I thikn similar che but please confirm -- to a 
			// jQuery(document).ready(function(){
			document.addEventListener("DOMContentLoaded", function() { 
				//zoom
			    
			    // if(typeof(jQuery.fn.imagezoomsl)=='function'){
			    //     jQuery(".big-img").imagezoomsl({
			    //         disablewheel: true,
			    //         zoomstart: 3,
			    //         zoomrange: [3,3],
			    //         magnifiersize: [502, 502],
			    //         cursorshadeborder: "1px solid black",
			    //     });
			    // }

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

	<?php }
}, 1059);
?>