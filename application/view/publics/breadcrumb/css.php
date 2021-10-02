<?php		
	if(isset($_GET['EO_WBC_CODE']) && wbc()->sanitize->get('EO_WBC_CODE')) {                   
		$color=explode('/',base64_decode(wbc()->sanitize->get('EO_WBC_CODE')));

		if(strpos(str_replace(' ','',$color[0]),'rgb(0,0,0')===0)
		{	
			wbc()->session->set('EO_WBC_BG_COLOR','rgba(128,128,128,0.5)');	
			wbc()->session->set('EO_WBC_FG_COLOR','rgba(0,0,0,1.0)');
		}
		else
		{
			wbc()->session->set('EO_WBC_BG_COLOR',$color[0]);
			wbc()->session->set('EO_WBC_FG_COLOR',$color[1]);
		}   
    }   



	$fg_color=wbc()->options->get_option('appearance_breadcrumb','breadcrumb_backcolor_active',wbc()->session->get('EO_WBC_BG_COLOR','#dbdbdb
'));

/*breadcrumb_backcolor_inactive*/


	echo "<style>.eo-wbc-container.container{max-width:100% !important;min-width:100% !important; margin: auto !important;width:100% !important;} ".
	(
		wbc()->options->get_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff')
		?
		".eo-wbc-container>.ui.steps .step:not(.active),.eo-wbc-container>.ui.steps .step:not(.active):after{ background: "
			.wbc()->options->get_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff').
			" }":''
	)
	.(
	 	$fg_color
		? 
		".eo-wbc-container>.ui.steps .step.active,.eo-wbc-container>.ui.steps .step.active:after{ background: ".$fg_color." }":''
	)		
	.		
	(
		!empty(wbc()->session->get('EO_WBC_FG_COLOR'))
		?
		" .eo-wbc-container>.ui.steps .step.active .title, .eo-wbc-container>.ui.steps .step.active a{ color: ".wbc()->session->get('EO_WBC_FG_COLOR','#fff')." }":''
	)
	
	.
	(   #Breadcrumb icon section font color - non active
		!empty(wbc()->options->get_option('appearance_breadcrumb','breadcrumb_num_icon_backcolor_inactive','#ffffff'))
		?
		
		" .eo-wbc-container .step:not(.active) .column:first-of-type{ color: ".wbc()->options->get_option('appearance_breadcrumb','breadcrumb_num_icon_backcolor_inactive','#ffffff')."  !important; }":''
	)
	.
	(   #Breadcrumb icon section font color - active
		!empty(wbc()->options->get_option('appearance_breadcrumb','breadcrumb_num_icon_backcolor_active','#ffffff'))
		?
		
		" .eo-wbc-container .step.active .column:first-of-type{ color: ".wbc()->options->get_option('appearance_breadcrumb','breadcrumb_num_icon_backcolor_active','#ffffff')."  !important; }":''
	)
	
	.
	(   #Breadcrumb action section - non active
		!empty(wbc()->options->get_option('appearance_breadcrumb','breadcrumb_actions_backcolor_inactive','#ffffff'))
		?
		
		" .eo-wbc-container .step:not(.active) a{ color: ".wbc()->options->get_option('appearance_breadcrumb','breadcrumb_actions_backcolor_inactive','#ffffff')."  !important; }":''
	)
	.
	(   #Breadcrumb action section - active
		!empty(wbc()->options->get_option('appearance_breadcrumb','breadcrumb_actions_backcolor_active','#ffffff'))
		?
		
		" .eo-wbc-container .step.active a{ color: ".wbc()->options->get_option('appearance_breadcrumb','breadcrumb_actions_backcolor_active','#ffffff')."  !important; }":''
	)		
	
	.
	(    #Breadcrumb title section - non active
		!empty(wbc()->options->get_option('appearance_breadcrumb','breadcrumb_title_backcolor_inactive','#ffffff'))
		?
		
		" .eo-wbc-container .step:not(.active) .title{ color: ".wbc()->options->get_option('appearance_breadcrumb','breadcrumb_title_backcolor_inactive','#ffffff')."  !important; }":''
	)
	.
	(   #Breadcrumb title section - active
		!empty(wbc()->options->get_option('appearance_breadcrumb','breadcrumb_title_backcolor_active','#ffffff'))
		?
		
		" .eo-wbc-container .step.active .title{ color: ".wbc()->options->get_option('appearance_breadcrumb','breadcrumb_title_backcolor_active','#ffffff')."  !important; }":''
	)

	.				
	(
		!empty(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_step_size'))
		?
		" .eo-wbc-container.container:not(.filters) .ui.steps .step .column:first-of-type{ font-size:".wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_step_size')." !important; }":''
	).
	
	(
		!empty(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_header_size'))
		?
		" .eo-wbc-container.container:not(.filters) .ui.steps .step .column:nth-child(2){ font-size:".wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_header_size')." !important; }":''
	).
	(
		!empty(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_icon_size'))
		?
		" .eo-wbc-container.container:not(.filters) .ui.steps .step img{ width:".wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_icon_size')." !important; }":''
	).
	(
		!empty(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_wrap_mobile'))
		?
		" .ui.container.unstackable.steps .step{ max-width: 33.33%;margin: auto !important;margin:0px !important; }":''
	).

	(
		!empty(wbc()->options->get_option('appearance_breadcrumb','breadcrumb_radius','2'))
		?
		" .eo-wbc-container>.ui.steps{ border-radius: ".wbc()->options->get_option('appearance_breadcrumb','breadcrumb_radius','0px')."; overflow: hidden; }.eo-wbc-container>.ui.steps .step{border-radius:0px !important;}":''
	)
	.
	( !wp_is_mobile() ? ".eo-wbc-container>.ui.steps .step{margin-bottom:0px !important;} .eo-wbc-container>.ui.steps div{ cursor:pointer !important; } .ui.steps .step .column{ z-index:7;width: max-content !important; padding-left:0em !important;} .ui.steps .step .column:first-child{".(wbc()->options->get_option('configuration','config_alternate_breadcrumb','default')=='template_1'?"":"font-size:3.2em !important;")."line-height: 0.8em;text-align:right;padding-right: 0.125rem !important;} .ui.steps .step{ padding-right:0px !important;padding-left:3em !important; } 

		.eo-wbc-container>.ui.steps .step:first-child{ padding-left:1em !important; } 
		.eo-wbc-container>.eo-wbc-container>.ui.steps .step:last-child{ padding-right:0px !important; }
		.eo-wbc-container>.ui.steps .step .column:last-child{ padding-right:0px !important;text-align:center; }
		.eo-wbc-container>.ui.steps .step .column.product_image_section img{ height: 4.5em !important;width: auto !important;margin-left:45%;}.eo-wbc-container .ui.steps{ text-transform: uppercase; }.eo-wbc-container.container .ui.steps{ width:100%; } .eo-wbc-container.container .ui.steps .step{ padding-top:1rem !important; padding-bottom:2rem !important;".(empty(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_hide_border'))?'':'border:none !important;')." } .eo-wbc-container.container .ui.steps{".(empty(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_hide_border'))?'':'border:none !important;')."}

		".(wbc()->options->get_option('configuration','config_alternate_breadcrumb','default')=='template_1'?".eo-wbc-container>.ui.steps .step .column:first-child{ font-size:3.2em !important;text-align:center;line-height: 1.8rem;} 		
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
	).(wbc()->options->get_option('configuration','config_alternate_breadcrumb','default')=='template_1'?".eo-wbc-container.container .ui.steps .step{ padding-top:3rem !important;}.ui.steps .step:after {display: none !important;}":" .eo-wbc-container.container .ui.steps .step {    padding-top: 1em !important;
    padding-bottom: 0rem !important; }"
		
	).(wbc()->options->get_option('configuration','config_alternate_breadcrumb','default')=='template_2'?
		".eo-wbc-container>.ui.steps .step:not(:first-child):before{
			content: '';
			border-top: 3.6em solid transparent;		    
		    border-bottom: 3.6em solid transparent;
		    border-left: 1em solid white;
		    height: 0px;
		    width: 0px;
		    left:-1px;
		    top: -0.1em;
		    position: absolute;		    
		} .eo-wbc-container>.ui.steps .step .column.product_image_section img{ margin-left:0px; } .eo-wbc-container.container .ui.steps .step{ padding-top: 0em !important; }.eo-wbc-container.container .ui.steps .step { padding-top: 1em !important; padding-bottom: 1.5em !important; }
		.eo-wbc-container>.ui.steps .step::after {
		    border-top: 3.5em solid transparent;
		    border-bottom: 3.5em solid transparent;
		    border-left: 1em solid ".wbc()->options->get_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff').";		    
		    height: 0px;
		    width: 0px;
		    top: 0;
		    position: absolute;
		    right: -1em;
		    transition: none !important;
		    transform: none !important;
		    background-color:transparent !important;
		    border-right: 1px solid transparent;
		}
		.eo-wbc-container>.ui.steps .step.active::after {
			border-left: 1em solid ".$fg_color." !important;
		}
		.eo-wbc-container>.ui.steps{
			height:7em;			
		}
		":""
	).(
		array_intersect(array(wbc()->options->get_option('filters_altr_filt_widgts','second_category_altr_filt_widgts'),wbc()->options->get_option('filters_altr_filt_widgts','first_category_altr_filt_widgts')),array('fc4','sc4'))?".eo-wbc-container.filters.container.ui.form,.eo-wbc-container.filters.container.ui.form .ui.header,.eo-wbc-container.container:not(.filters),.ui.steps .step .title{font-family: ".wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_header_font_family','Avenir Next')." !important; }.eo-wbc-container.filters.container.ui.form .ui.header{font-size:1em;}.ui.labeled.ticked.range.slider .labels{height:0px; top:unset;bottom:-10%;font-size:12px}.ui.labeled.ticked.range.slider .labels .label::after{top:unset;bottom:100%;}.eo_wbc_filter_icon:hover:not(.none_editable){ border-bottom: 0px !important; } .eo-wbc-container.filters.container.ui.form .ui.segments{ border:none !important;}":""
		
	)." .eowbc_breadcrumb_font{ font-family:".(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_header_font_family','Avenir Next'))." !important }</style>";

?>

