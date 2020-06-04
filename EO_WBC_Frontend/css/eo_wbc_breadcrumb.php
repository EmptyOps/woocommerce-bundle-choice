<?php		
	if(isset($_GET['EO_WBC_CODE']) && $_GET['EO_WBC_CODE']){                   
		$color=explode('/',base64_decode(sanitize_text_field($_GET['EO_WBC_CODE'])));

		if(strpos(str_replace(' ','',$color[0]),'rgb(0,0,0')===0)
		{	
			wc()->session->set('EO_WBC_BG_COLOR','rgba(128,128,128,0.5)');	
			wc()->session->set('EO_WBC_FG_COLOR','rgba(0,0,0,1.0)');
		}
		else
		{
			wc()->session->set('EO_WBC_BG_COLOR',$color[0]);
			wc()->session->set('EO_WBC_FG_COLOR',$color[1]);
		}   
    }    
	add_action("wp_head",function(){			
		
		$fg_color=get_option('eo_wbc_active_breadcrumb_color',wc()->session->get('EO_WBC_BG_COLOR',FALSE));

		echo "<style>".
		(
			get_option('eo_wbc_non_active_breadcrumb_color')
			?
			".eo-wbc-container>.ui.steps .step:not(.active),.eo-wbc-container>.ui.steps .step:not(.active):after{ background: "
				.get_option('eo_wbc_non_active_breadcrumb_color').
				" }":''
		)
		.
		(
			$fg_color
			?
			" .eo-wbc-container>.ui.steps .step.active,.eo-wbc-container>.ui.steps .step.active:after{ background: ".$fg_color." }":''
		)
		.		
		(
			!empty(wc()->session->get('EO_WBC_FG_COLOR'))
			?
			" .eo-wbc-container>.ui.steps .step.active .title, .eo-wbc-container>.ui.steps .step.active a{ color: ".wc()->session->get('EO_WBC_FG_COLOR','#fff')." }":''
		)
		
		.
		(   #Breadcrumb icon section font color - non active
			!empty(get_option('eo_wbc_breadcrumb_icon_color_inactive','#ffffff'))
			?
			
			" .eo-wbc-container > .ui.ordered.steps .step::before, .eo-wbc-container > .ui.steps .step .icon{ color: ".get_option('eo_wbc_breadcrumb_icon_color_inactive','#ffffff')."  !important; }":''
		)
		.
		(   #Breadcrumb icon section font color - active
			!empty(get_option('eo_wbc_breadcrumb_icon_color_active','#ffffff'))
			?
			
			" .eo-wbc-container > .ui.ordered.steps .step.active::before, .eo-wbc-container > .ui.steps .active.step .icon{ color: ".get_option('eo_wbc_breadcrumb_icon_color_active','#ffffff')."  !important; }":''
		)
		
		.
		(   #Breadcrumb action section - non active
			!empty(get_option('eo_wbc_breadcrumb_action_color_inactive','#ffffff'))
			?
			
			" .eo-wbc-container > .ui.ordered.steps .step .description > a{ color: ".get_option('eo_wbc_breadcrumb_action_color_inactive','#ffffff')."  !important; }":''
		)
		.
		(   #Breadcrumb action section - active
			!empty(get_option('eo_wbc_breadcrumb_action_color_active','#ffffff'))
			?
			
			" .eo-wbc-container > .ui.ordered.steps .step.active .description > a{ color: ".get_option('eo_wbc_breadcrumb_action_color_active','#ffffff')."  !important; }":''
		)		
		
		.
		(    #Breadcrumb title section - non active
			!empty(get_option('eo_wbc_breadcrumb_title_color_inactive','#ffffff'))
			?
			
			" .eo-wbc-container > .ui.ordered.steps .step .title{ color: ".get_option('eo_wbc_breadcrumb_title_color_inactive','#ffffff')."  !important; }":''
		)
		.
		(   #Breadcrumb title section - active
			!empty(get_option('eo_wbc_breadcrumb_title_color_active','#ffffff'))
			?
			
			" .eo-wbc-container > .ui.ordered.steps .step.active .title{ color: ".get_option('eo_wbc_breadcrumb_title_color_active','#ffffff')."  !important; }":''
		)

		.				
		(
			!empty(get_option('eo_wbc_breadcrumb_radius'))
			?
			" .eo-wbc-container>.ui.steps{ border-radius: ".get_option('eo_wbc_breadcrumb_radius',5)."px; overflow: hidden; }":''
		)

		.
		( !wp_is_mobile() ? " .eo-wbc-container>.ui.steps div{ cursor:pointer !important; } .ui.steps .step .column{ z-index:7;width: max-content !important; padding-left:0em !important;} .ui.steps .step .column:first-child{font-size: 3.2em;line-height: 0.8em;text-align:right;padding-right: 0.125rem !important;} .ui.steps .step{ padding-right:0px !important;padding-left:3em !important; } 

			.eo-wbc-container>.ui.steps .step:first-child{ padding-left:1em !important; } 
			.eo-wbc-container>.eo-wbc-container>.ui.steps .step:last-child{ padding-right:0px !important; }
			.eo-wbc-container>.ui.steps .step .column:last-child{ padding-right:0px !important;text-align:center; }
			.eo-wbc-container>.ui.steps .step .column.product_image_section img{ height: 4.5em !important;width: auto !important;margin-left:45%;}		
			
			.eo-wbc-container>.ui.steps div{ ".(get_option('eo_wbc_breadcrumb_template',0)==2?"":"margin-top:0px !important;")." } 
			@media only screen and (max-width: 768px){ 
				.eo-wbc-container>.ui.steps .step{ padding-left:1rem !important;} 
				.eo-wbc-container>.ui.steps .step .column{padding-right:0em !important;text-align:right;}
				.eo-wbc-container>.ui.steps .step:last-child{ padding-right: 0.5em !important; 
				}
			}" 
			:
			" .ui.steps .step:after{width: 2.7rem !important;height: 2.7rem !important;} .ui.steps{overflow: hidden;} .ui.steps{ width:100% !important; } .second_mobile,.first_mobile{ margin:0px !important; } 
			.ui.bottom.left.popup.second_mobile:before,.ui.bottom.left.popup.first_mobile:before,.ui.bottom.center.second_mobile.popup:before,.ui.bottom.center.first_mobile.popup:before{
				display:none;
				height:0px !important;
				width:0px !important;
			}
			"
		) .
		(get_option('eo_wbc_breadcrumb_template',0)==1?"eo-wbc-container>.ui.steps{ 
				border: 2px solid lightgray !important; 
				box-shadow: 3px 3px 0 #efefef !important; 
				padding: 2px !important; 
			}			
			.eo-wbc-container>.ui.steps .step.active:after{
				border-radius: 5px !important;				
			}
			.eo-wbc-container>.ui.steps .step:after{				
				width: 3.9em !important;
				height: 3.9em !important;
			}
			":"")
		.(get_option('eo_wbc_breadcrumb_template',0)==2?".eo-wbc-container.container .ui.steps {
	            border: unset !important;
	            box-shadow: 3px 3px 0 #d6d6d6;
	            border: 1px solid rgba(34, 36, 38, 0.11);
		    }
		   .eo-wbc-container.container .ui.steps .step:after {
		    	background-color: #fff;
		    	background-image: url('".plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/asset/icons8-arrow-100.png')."') !important;
		    	background-position: -39px -30px !important;
		    	border: none !important;
		    	content: '';
		    	display: block !important;
		    	height: 51% !important;
		    	line-height: 0 !important;
		    	position: absolute !important;
		    	transform: translateY(-50%) translateX(50%) rotate(0deg) !important;
		    	width: 27px !important;
			}
			.eo-wbc-container .ui.steps .ui.equal.width.grid {	        
		        align-item: center !important;
		    }
		    ":""
		)."</style>";	    
	});		
