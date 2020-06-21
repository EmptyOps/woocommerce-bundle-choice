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
	( !wp_is_mobile() ? " .eo-wbc-container>.ui.steps div{ cursor:pointer !important; } .ui.steps .step .column{ z-index:7;width: max-content !important; padding-left:0em !important;} .ui.steps .step .column:first-child{".(get_option('eo_wbc_alternate_breadcrumb',false)?"":"font-size:3.2em;")."line-height: 0.8em;text-align:right;padding-right: 0.125rem !important;} .ui.steps .step{ padding-right:0px !important;padding-left:3em !important; } 

		.eo-wbc-container>.ui.steps .step:first-child{ padding-left:1em !important; } 
		.eo-wbc-container>.eo-wbc-container>.ui.steps .step:last-child{ padding-right:0px !important; }
		.eo-wbc-container>.ui.steps .step .column:last-child{ padding-right:0px !important;text-align:center; }
		.eo-wbc-container>.ui.steps .step .column.product_image_section img{ height: 4.5em !important;width: auto !important;margin-left:45%;}.eo-wbc-container .ui.steps{ text-transform: uppercase; }.eo-wbc-container.container .ui.steps{ width:100%; } .eo-wbc-container.container .ui.steps .step{ padding-top:1rem !important; padding-bottom:2rem !important;".(empty(get_option('eo_wbc_hide_breadcrumb_border',0))?'':'border:none !important;')." } .eo-wbc-container.container .ui.steps{".(empty(get_option('eo_wbc_hide_breadcrumb_border',0))?'':'border:none !important;')."}

		".(get_option('eo_wbc_alternate_breadcrumb',false)?".eo-wbc-container>.ui.steps .step .column:first-child{ font-size:3.2em;text-align:center;line-height: 1.8rem;} 		
		.eo-wbc-container>.ui.steps .step .column{ padding:0.5rem }":".eo-wbc-container>.ui.steps .step:after{width:3.3em;height:3.3em;}")."
		
		.eo-wbc-container>.ui.steps div{ margin-top:0px !important; } 
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
	).( !empty(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_alternate_breadcrumb'))?".eo-wbc-container.container .ui.steps .step{ padding-top:2rem !important;}.ui.steps .step:after {display: none !important;}":""
		
	)."</style>";

?>


