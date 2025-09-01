<?php
add_action( 'wp_enqueue_scripts' ,function(){

	// ACTIVE_TODO temp: wen we enabel back the mobile site at that time remove below false condition.
	if (false and wbc_is_mobile()) {

		wbc()->load->asset('css','variations/gallery_images/external-plugins/xzoom/xzoom',array(),"",false,true);

		wbc()->load->asset('js','variations/gallery_images/external-plugins/xzoom/xzoom',array(),"",true,true);

		// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
		$inline_script =
		    "(function (\$) {\n" .
		    "    // jQuery(document).ready(function() {\n" .
		    "    document.addEventListener(\"DOMContentLoaded\", function() {         \n" .
		    "        jQuery('.xzoom3, .xzoom-gallery3').xzoom({position: 'lens', lensShape: 'circle', sourceClass: 'xzoom-hidden'});\n" .
		    "        jQuery('.xzoom-gallery3').on('click mouseenter mousemove mouseleave',function(){\n" .
		    "            \n" .
		    "            jQuery('.xzoom-gallery3.xactive').removeClass('xactive');\n" .
		    "            jQuery(this).addClass('xactive');\n" .
		    "        });\n" .
		    "\n" .
		    "    });\n" .
		    "})(jQuery);";
		wbc()->load->add_inline_script('', $inline_script, 'common');
	} else { 

		// ---- a code /themes/purple_theme/woocommerce/content-single-product.php no che 
		// -- zoom no

			$EOWBC_ASSET_URL_EOWBC_ASSET_URL = constant( strtoupper( 'EOWBC_ASSET_URL' ) ).'js/variations/gallery_images/external-plugins/zoomsl/zoomsl.min.js';

			// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
			$inline_script = 
				"// jQuery(document).ready(function(){\n" .
				"document.addEventListener(\"DOMContentLoaded\", function() { \n" .
				"// ACTIVE_TODO_OC_START\n" .
				"// // ---- error event ma sem che\n" .
				"// ACTIVE_TODO_OC_END\n" .
				"// ACTIVETODO enable below code if requared\n" .
				"// //jQuery(\".small-img\").hover(function(){\n" .
				"// jQuery(\".small-img\").click(function(){\n" .
				"//     jQuery(\".big-img\").attr('src',jQuery(this).attr('src'));\n" .
				"// });\n" .
				"\n" .
				"var zoom_init_function = function(){\n" .
				"console.log(\" zoom asset init_function \");\n" .
				"jQuery(\".big-img\").imagezoomsl({\n" .
				"/*zoomrange:[3,3],\n" .
				"disablewheel: true,\n" .
				"scrollspeedanimate: 10,\n" .
				"loopspeedanimate: 5,\n" .
				"cursorshadeborder: \"1px solid black\",\n" .
				"magnifiereffectanimate: \"slideIn\",\n" .
				"magnifiersize: [640, 480],*/\n" .
				"/*disablewheel: true,\n" .
				"zoomstart: 3,\n" .
				"zoomrange: [3,3],\n" .
				"magnifiersize: [502, 502],\n" .
				"cursorshadeborder: \"1px solid black\",*/\n" .
				"disablewheel: true,\n" .
				"zoomstart: 2,\n" .
				"zoomrange: [2,2],\n" .
				"innerzoom: true,\n" .
				"magnifierborder: \"none\",\n" .
				"/*magnifiersize: [502, 502],\n" .
				"cursorshadeborder: \"1px solid black\",*/\n" .
				"/*disablewheel: true,\n" .
				"zoomstart: 3,\n" .
				"zoomrange: [3,3],\n" .
				"magnifiersize: [502, 502],\n" .
				"cursorshadeborder: \"1px solid black\",*/\n" .
				"});\n" .
				"};\n" .
				"\n" .
				"var bind_listeners = function(){\n" .
				"console.log(\" zoom asset bind_listeners \");\n" .
				"window.document.splugins.wbc.variations.gallery_images.sp_slzm.api.init_listener('imagezoomsl', function(event, stat_object, notification_response){\n" .
				"console.log(\" zoom asset init_listener \");\n" .
				"zoom_init_function();\n" .
				"});\n" .
				"window.document.splugins.wbc.variations.gallery_images.sp_slzm.api.refresh_listener('imagezoomsl' ,function(event, stat_object, notification_response){\n" .
				"console.log(\" zoom asset refresh_listener \");\n" .
				"zoom_init_function();\n" .
				"});\n" .
				"};\n" .
				"\n" .
				"// if(typeof(jQuery.fn.imagezoomsl)!=='function'){\n" .
				"// let script = document.createElement('script');\n" .
				"// script.src = \".$EOWBC_ASSET_URL_EOWBC_ASSET_URL.\";\n" .
				"// document.head.append(script);\n" .
				"// window.setTimeout(function(){\n" .
				"// bind_listeners();\n" .
				"// },2000);	\n" .
				"// } else {\n" .
				"// bind_listeners();\n" .
				"// }\n" .
				"\n" .
				"console.log(\" gallery zoom asset DOMContentLoaded\");\n" .
				"\n" .
				"// document.addEventListener(\"DOMContentLoaded\", function() { \n" .
				"// jQuery( window ).on('load', function() {\n" .
				"\n" .
				"console.log(\" zoom asset DOMContentLoaded\");\n" .
				"\n" .
				"if(typeof(jQuery.fn.imagezoomsl)!=='function'){\n" .
				"\n" .
				"console.log(\" zoom asset DOMContentLoaded\");\n" .
				"\n" .
				"let script = document.createElement('script');\n" .
				"script.src = '".constant( strtoupper( 'EOWBC_ASSET_URL' ) )."js/variations/gallery_images/external-plugins/zoomsl/zoomsl.min.js';\n" .
				"document.head.append(script);\n" .
				"\n" .
				"window.setTimeout(function(){\n" .
				"\n" .
				"console.log(\" zoom asset DOMContentLoaded timeout if\");\n" .
				"\n" .
				"bind_listeners();\n" .
				"\n" .
				"},1000);	\n" .
				"\n" .
				"} else {\n" .
				"\n" .
				"window.setTimeout(function(){\n" .
				"\n" .
				"console.log(\" zoom asset DOMContentLoaded timeout else\");\n" .
				"\n" .
				"bind_listeners();\n" .
				"\n" .
				"},1000);	\n" .
				"}\n" .
				"// });\n" .
				"\n" .
				"// ACTIVE_TODO we can use error event only for page loading context but after that we need to cancle them othrewising thay keep firing on any errors. \n" .
				"window.addEventListener('error', function(e){\n" .
				"\n" .
				"// ACTIVETODO enable below code if requared\n" .
				"// // jQuery(\".small-img\").hover(function(){\n" .
				"// jQuery(\".small-img\").click(function(){\n" .
				"// jQuery(\".big-img\").attr('src',jQuery(this).attr('src'));\n" .
				"// });\n" .
				"\n" .
				"window.setTimeout(function(){\n" .
				"\n" .
				"console.log(\" zoom asset addEventListener error \");\n" .
				"\n" .
				"bind_listeners();\n" .
				"\n" .
				"},1000);	\n" .
				"\n" .
				"});\n" .
				"\n" .
				"});\n";
			wbc()->load->add_inline_script( '', $inline_script, 'common' );

		if(empty($url) && defined('PRODUCT_360_DIR')){ 

		//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
		$custom_css = "
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

		";
		wbc()->load->add_inline_style('', $custom_css, 'common');
		} else { 

		//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
		$custom_css = "
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
		";
		wbc()->load->add_inline_style('', $custom_css, 'common');
		 } 
		 
		 //NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
		$custom_css = "
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
		";
		wbc()->load->add_inline_style('', $custom_css, 'common');
		
	// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
	$inline_script = 
		"// ACTIVE_TODO zoom asset.php ma last ma ek script haji rai gai, te I thikn similar che but please confirm -- to a \n" .
		"// jQuery(document).ready(function(){\n" .
		"document.addEventListener(\"DOMContentLoaded\", function() { \n" .
		"//zoom\n" .
		"\n" .
		"// if(typeof(jQuery.fn.imagezoomsl)=='function'){\n" .
		"//     jQuery(\".big-img\").imagezoomsl({\n" .
		"//         disablewheel: true,\n" .
		"//         zoomstart: 3,\n" .
		"//         zoomrange: [3,3],\n" .
		"//         magnifiersize: [502, 502],\n" .
		"//         cursorshadeborder: \"1px solid black\",\n" .
		"//     });\n" .
		"// }\n" .
		"\n" .
		"/* -- a seme che uper lode kerli che\n" .
		"if(typeof(jQuery.fn.imagezoomsl)!=='function'){\n" .
		"    let script = document.createElement('script');\n" .
		"    script.src = \"https://demo.woochoiceplugin.com/jewelry-demo-1/wp-content/themes/purple_theme/assets/js/N-product/zoomsl.min.js\";\n" .
		"    document.head.append(script);\n" .
		"    window.setTimeout(function(){\n" .
		"      jQuery(\".big-img\").imagezoomsl({\n" .
		"            // zoomrange:[3,3],\n" .
		"            // disablewheel: true,\n" .
		"            // scrollspeedanimate: 10,\n" .
		"            // loopspeedanimate: 5,\n" .
		"            // cursorshadeborder: \"1px solid black\",\n" .
		"            // magnifiereffectanimate: \"slideIn\",\n" .
		"            // magnifiersize: [640, 480],\n" .
		"            disablewheel: true,\n" .
		"            zoomstart: 3,\n" .
		"            zoomrange: [3,3],\n" .
		"            magnifiersize: [502, 502],\n" .
		"            cursorshadeborder: \"1px solid black\",\n" .
		"        });\n" .
		"    },2000);\n" .
		"}*/\n" .
		"});\n";
	wbc()->load->add_inline_script( '', $inline_script, 'common' );



	 }
}, 1059);
?>