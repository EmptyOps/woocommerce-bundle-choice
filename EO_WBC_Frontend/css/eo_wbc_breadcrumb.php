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
		)." .eo-wbc-container>.ui.steps div{ cursor:pointer !important; } </style>";
	});		
?>
