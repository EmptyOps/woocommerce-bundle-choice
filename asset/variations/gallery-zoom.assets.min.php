<?php
add_action( 'wp_enqueue_scripts' ,function(){

	if (false and wbc_is_mobile()) {

		wbc()->load->asset('css','variations/gallery_images/external-plugins/xzoom/xzoom',array(),"",false,true);

		wbc()->load->asset('js','variations/gallery_images/external-plugins/xzoom/xzoom',array(),"",true,true);
		?>
		<script type="text/javascript">
			jQuery,document.addEventListener("DOMContentLoaded",(function(){jQuery(".xzoom3, .xzoom-gallery3").xzoom({position:"lens",lensShape:"circle",sourceClass:"xzoom-hidden"}),jQuery(".xzoom-gallery3").on("click mouseenter mousemove mouseleave",(function(){jQuery(".xzoom-gallery3.xactive").removeClass("xactive"),jQuery(this).addClass("xactive")}))}));
		</script>
		<?php

	} else { 



	?> 
		<script>
		 	document.addEventListener("DOMContentLoaded", function() { 
		 	
		    	return false;
		    	
			    var zoom_init_function = function(){
			    	
			    	return false;

	            			        
	            	setTimeout(function (argument) {
	            		
				        jQuery(".big-img").imagezoomsl({
				            
				            disablewheel: true,
					        zoomstart: 3,
					        zoomrange: [3,3],
					        magnifiersize: [502, 502],
					        cursorshadeborder: "1px solid black",
					       
					    });
	            	},1000);

			    };  

			    var bind_listeners = function(){


		            window.document.splugins.wbc.variations.gallery_images.sp_slzm.api.init_listener('imagezoomsl', function(event, stat_object, notification_response){

		                
		                zoom_init_function();

		            });
		            window.document.splugins.wbc.variations.gallery_images.sp_slzm.api.refresh_listener('imagezoomsl' ,function(event, stat_object, notification_response){


		                zoom_init_function();

		            });

			    };

		

					if(typeof(jQuery.fn.imagezoomsl)!=='function'){
						
						
						let script = document.createElement('script');
						script.src = "<?php echo constant( strtoupper( 'EOWBC_ASSET_URL' ) ).'js/variations/gallery_images/external-plugins/zoomsl/zoomsl.min.js'; ?>";
						document.head.append(script);

				        window.setTimeout(function(){


		       			    bind_listeners();

				        },1000);	

					} else {

					    window.setTimeout(function(){


		       			    bind_listeners();

				        },1000);	
					}

		        window.addEventListener('error', function(e){


			        window.setTimeout(function(){


	       			    bind_listeners();

			        },1000);	
			     
			    });

		    });
		</script>


		<?php
		if(empty($url) && defined('PRODUCT_360_DIR')){ ?>
			<style type="text/css">
				.Zoom_Rigt-sec .big-img{width:454px;height:454px;object-fit:contain}.sp-purple-theme-product-dots .xzoom-container img,.Zoom_Rigt-sec .big-img{margin:auto;display:block!important}
			</style>
		<?php } else { ?>
			<style type="text/css">
				.Zoom_Rigt-sec .big-img{width:454px;height:454px;object-fit:contain}.sp-purple-theme-product-dots .xzoom-container img,.Zoom_Rigt-sec .big-img{margin:auto;display:block}
			</style>

		<?php } ?>



		<!-- ---- @tejas api che -->
		<style type="text/css">
			*{padding:0}*,ul{margin:0}ul{list-style-type:none}ul li{margin:0;padding:0}img.img-fluid.big-img{width:454px;height:454px;-o-object-fit:contain;object-fit:contain;margin:auto;display:block;border-radius:5px}.imagezoomsl_zoom_container,.Zoom_Rigt-sec{width:calc(100% - 130px);margin-left:15px;position:relative;float:left}.imagezoomsl_zoom_container{clear:right}.imagezoomsl_zoom_container .Zoom_Rigt-sec.img-wrapper{width:100%!important;margin-left:0}body .spui_video_container video{max-width:100%;-o-object-fit:contain;object-fit:contain;display:block;margin:auto;min-height:454px;width:454px}.Product_Left_Wrapper_Plugin_Images .imagezoomsl_zoom_container{min-height:454px}@media(max-width:767px){.Product_Left_Wrapper_Plugin_Images .imagezoomsl_zoom_container{min-height:auto}}@media(max-width:480px){.Product_Left_Wrapper_Plugin_Images .imagezoomsl_zoom_container{width:100%;float:none!important;margin-left:0}body img.img-fluid.big-img{width:395px;height:395px}body .spui_video_container video{min-height:395px;width:395px}}


		</style>
		<script type="text/javascript">
			document.addEventListener("DOMContentLoaded",(function(){}));
		</script>

	<?php }
}, 1059);
?>