<?php

/*
*	Template to show form for filters 
*/

/*jQuery.fn.eo_wbc_filter_change(false,'#sc_eo_wbc_filter');*/

$current_category = implode(',',$thisObj->___category);

if(wbc()->options->get_option('filters_'.$thisObj->filter_prefix.'filter_setting','filter_setting_advance_two_tabs',false)) {

	$first_tab_term = wbc()->options->get_option('filters_'.$thisObj->filter_prefix.'filter_setting','filter_setting_advance_first_category',false);
	if(!empty($first_tab_term)) {
		$first_tab_term = wbc()->wc->get_term_by('id',$first_tab_term, 'product_cat');
		if(!empty($first_tab_term) and !is_wp_error($first_tab_term)) {
			$first_tab_term = $first_tab_term->slug;

			if(!empty($_GET[wbc()->options->get_option('filters_'.$thisObj->filter_prefix.'filter_setting','filter_setting_advance_first_tabs',false)])) {

				$current_category = $first_tab_term;
			}
		} else {
			$first_tab_term = false;
		}
	} else {
		$first_tab_term = false;
	}

	$second_tab_term = wbc()->options->get_option('filters_'.$thisObj->filter_prefix.'filter_setting','filter_setting_advance_second_category',false);
	if(!empty($second_tab_term)) {
		$second_tab_term = wbc()->wc->get_term_by('id',$second_tab_term, 'product_cat');
		if(!empty($second_tab_term) and !is_wp_error($second_tab_term)) {
			$second_tab_term = $second_tab_term->slug;
			
			if( !empty($_GET[wbc()->options->get_option('filters_'.$thisObj->filter_prefix.'filter_setting','filter_setting_advance_second_tabs',false)]) ) {
				$current_category = $second_tab_term;
			}
		} else {
			$second_tab_term = false;
		}
	} else {
		$second_tab_term = false;
	}


	if(isset($_GET[wbc()->options->get_option('filters_'.$thisObj->filter_prefix.'filter_setting','filter_setting_advance_second_tabs',false)])) {
		if(array_search($first_tab_term,$thisObj->___category) !==false ) {			
			unset($thisObj->___category[array_search($first_tab_term,$thisObj->___category)]);
		}

	} else {

		if(array_search($second_tab_term,$thisObj->___category) !==false ) {

			unset($thisObj->___category[array_search($second_tab_term,$thisObj->___category)]);
		}		
	}

	/*// 13-12-2021 -- changes by mahesh@emptyops.com for the removal of the second tab as they are not required for initial filter params
	if(!empty($current_category)) {	
		$current_category = explode(',',$current_category);
		unset($current_category[array_search($second_tab_term,$current_category)]);
		$current_category = implode(',',$current_category);
	}*/
}

if(empty($current_category) and empty($_GET['EO_WBC'])) {
	$current_category = wbc()->common->get_category('category',null, explode(',', wbc()->options->get_option('sc_filter_setting','shop_cat_filter_category') ) );
}

if(!empty($current_category)) {

	/*if(isset($_GET['test'])){*/
		global $sitepress;
		if(!empty($sitepress)) {
			$current_language = constant('ICL_LANGUAGE_CODE');
			$sitepress->switch_lang('en');
		}

		$current_category_term = wbc()->wc->get_term_by('slug',$current_category,'product_cat');
		if(!empty($current_category_term) and !is_wp_error($current_category_term)) {
			$current_category = $current_category_term->slug;
		}


		if(!empty($thisObj->___category) and is_array($thisObj->___category)) {

			$this_category = array();
			foreach($thisObj->___category as $this_category_key => $this_category_value) {

				$this_category_term = wbc()->wc->get_term_by('slug',$this_category_value,'product_cat');
				if(!empty($this_category_term) and !is_wp_error($this_category_term)) {
					$this_category[] = $this_category_term->slug;
				}
			}

			$thisObj->___category = $this_category;
		}



		if(!empty($sitepress)) {
			$sitepress->switch_lang($current_language);
			remove_filter('get_term', array($sitepress,'get_term_adjust_id'), 1, 1);
		}
		
	/*}*/
}


$_per_page = wc_get_loop_prop('per_page');
    
if(empty($_per_page)){
    $_per_page = apply_filters('loop_shop_per_page',wc_get_default_products_per_row() * wc_get_default_product_rows_per_page());
}

?>	
		
<!-- Created with Wordpress plugin - WooCommerce Product bundle choice -->
<!--WooCommerce Product Bundle Choice filter form-->

<!-- <form method="GET" name="eo_wbc_filter" id="eo_wbc_filter" style="clear: both;"> -->
<form method="GET" name="<?php echo $filter_ui->filter_prefix; ?>eo_wbc_filter" id="<?php echo $filter_ui->filter_prefix; ?>eo_wbc_filter" style="clear: both;">
	<?php do_action('eowbc_pre_filter_form'); ?>
	<input type="hidden" name="eo_wbc_filter" value="1" />	
	<input type="hidden" name="paged" value="1" />
	<input type="hidden" name="eo_wbc_page" size="<?php echo $_per_page; ?>" />	
	<input type="hidden" name="last_paged" value="1" />


	<?php if(apply_filters('eowbc_show_filter_actions_field',true)): ?>
	<input type="hidden" name="action" value="eo_wbc_filter"/>
	<?php endif; ?>

	<input type="hidden" name="_current_category" value="<?php echo (!empty(wbc()->sanitize->get('CAT_LINK'))?wbc()->sanitize->get('CAT_LINK'):$current_category); ?>" />

	<input type="hidden" name="_category_query" id="eo_wbc_cat_query" 
		value="<?php echo (!empty(wbc()->sanitize->get('CAT_LINK'))?wbc()->sanitize->get('CAT_LINK'):''/*$current_category*/); ?>" />
		
	<input type="hidden" name="_category" value="<?php echo implode(',',$thisObj->___category) ?>"/>
	

	<!-- <input type="hidden" name="_current_category" value="<?php //echo /*$thisObj->_category*/(!empty(wbc()->sanitize->_get('CAT_LINK'))?','.wbc()->sanitize->_get('CAT_LINK'):$current_category); ?>" />

	<input type="hidden" name="_category_query" id="eo_wbc_cat_query" 
		value="<?php //echo (!empty(wbc()->sanitize->_get('CAT_LINK'))?','.wbc()->sanitize->_get('CAT_LINK'):'')?>" /> -->

	<input type="hidden" name="cat_filter__two_tabs" value=""/>
	<?php do_action('eo_wbc_additional_form_field',$filter_ui); ?>
				
	<?php if(isset($_GET['products_in']) AND !empty(wbc()->sanitize->get('products_in')) ): ?>
		<input type="hidden" name="products_in" value="<?php echo wbc()->sanitize->get('products_in') ?>" />			
	<?php endif; ?>

	<?php
		$queried_attributes = array();		
		if(!empty($thisObj->__filters)){	

			/* This block shall be removed as its purpose is to remove duplicates as we do not know the cause of multiple instence. */
			$serialized_filter = array_map(function($e){
				return serialize($e);
			},$thisObj->__filters);

			$serialized_filter = array_unique($serialized_filter);

			$thisObj->__filters = array_map(function($e){
				return unserialize($e);
			},$serialized_filter);				
			/* To be removed block ends. */

			$thisObj->__filters = apply_filters('sp_wbc_pre_filter_form_attribute',$thisObj->__filters);

			foreach ($thisObj->__filters as $__filter) {						
				
				if(!empty($_REQUEST[ $__filter['id'] ])) {
					
					$queried_attributes[str_replace(['min_','max_'],'',$__filter['id'])] = str_replace(['min_','max_'],'',$__filter['id']);

					$__filter['value'] = sanitize_text_field($_REQUEST[ $__filter['id'] ]);
				}

				if(!empty($_REQUEST['query_type_'.str_replace(['min_','max_','checklist_'],'',$__filter['id']) ]) and !empty($_REQUEST['filter_'.str_replace(['min_','max_','checklist_'],'',$__filter['id']) ])) {

					$queried_attributes[str_replace(['min_','max_','checklist_'],'',$__filter['id'])] = str_replace(['min_','max_','checklist_'],'',$__filter['id']);
				}

				?>
					<input type="<?php echo $__filter['type'] ?>" name="<?php echo $__filter['name'] ?>" id="<?php echo $__filter['id'] ?>" class="<?php echo $__filter['class'] ?>" value="<?php echo $__filter['value'] ?>" <?php echo (isset($__filter['data-edit'])?'data-edit="'.$__filter['data-edit'].'"':'') ?>/>
				<?php
			}
		}
	?>

	<input type="hidden" name="_attribute" id="eo_wbc_attr_query" value="<?php echo implode(',',$queried_attributes); ?>" />
</form>



<?php if(apply_filters('eowbc_enque_filter_js',call_user_func('__return_true'))): ?>
<br/>

	<?php do_action('eowbc_post_filter_form'); ?>
	<?php add_action('wp_footer',function() use($thisObj){ ?>
			
		<?php do_action('eowbc_post_filter_javascript',$thisObj); ?>

		<script type="text/javascript">		

			jQuery(document).ready(function($){
				
				jQuery.fn.jui_accordion = jQuery.fn.accordion;
				jQuery.fn.jui_slider = jQuery.fn.slider;
				jQuery.fn.jui_checkbox = jQuery.fn.checkbox;

				jQuery.fn.accordion = jQuery.fn.ui_accordion;
				jQuery.fn.slider = jQuery.fn.ui_slider;
				jQuery.fn.checkbox = jQuery.fn.ui_checkbox;

				window.document.splugins = window.document.splugins || {};
				window.document.splugins.ui = window.document.splugins.ui || {};
				window.document.splugins.ui.slider = window.document.splugins.ui.slider || jQuery.fn.slider;

				window.eo=new Object();
				
				//Slider creation function
				window.eo.slider=function(selector){

					jQuery(selector).each(function(i,e){

						let _min = Number(jQuery(e).attr('data-min'));						
						let _max = Number(jQuery(e).attr('data-max'));												
						let _labels = jQuery(e).attr('data-labels');						

						let _params=new Object();												
												
						if(_labels != undefined && _labels != false){

							_labels=_labels.split(',');
							_params.interpretLabel=function(value){ 						
								_labels = jQuery(e).attr('data-labels');
								_labels=_labels.split(',');
								/*console.log(value);
								console.log(_labels);*/
								if(_labels!=undefined){
									let _label_value = _labels[value];

									let _label_max_length = parseInt(jQuery(e).data('label_max_size'));

									if((typeof(_label_max_length)==typeof(undefined)) || _label_max_length==""){
										_label_max_length = <?php _e((int)wbc()->options->get_option('filters_'.$thisObj->__prefix.'filter_setting','filter_setting_slider_max_lblsize',6)) ?>;
									}								

									if(_label_value.length>_label_max_length){

										/*if(_label_value.length><?php //_e((int)wbc()->options->get_option('filters_'.(empty($filter_prefix)?'':$filter_prefix).'filter_setting','filter_setting_slider_max_lblsize',6)) ?>){*/

										_label_value = _label_value.split(' ');
										_label_value = _label_value.map(function(_label_value_ele){
											return _label_value_ele[0];
										});
										_label_value = _label_value.join('');
									}
									return '<span title="'+_labels[value]+'" alt="'+_labels[value]+'">'+_label_value+'</span>';								
								} else {
									return value;
								}
								
							};

							_params.step=1;

							_params.min=0;
							_params.max=_labels.length-1;
							_params.start=0;
							_params.end=_labels.length-1;

						} else {

							_params.min=_min;
							_params.max=_max;
							_params.start=_min;
							_params.end=_max;

							_params.smooth=true;
							_params.step=(_max-_min)/100;	
						}
						_params.smooth=true;
						_params.autoAdjustLabels=true;
						_params.decimalPlaces=4;
						
						_params.onMove=function(value, min, max) {


							/*__slugs = jQuery(e).attr('data-slugs');*/

							let __slugs = jQuery(e).attr('data-slugs');
							
							if(typeof __slugs != typeof undefined && __slugs != false){
								//PASS
							} else {

								/*_sep = jQuery(e).attr('data-sep');
								_prefix = jQuery(this).data('prefix');*/

								let _sep = jQuery(e).attr('data-sep');
								let _prefix = jQuery(this).data('prefix');

								if(typeof(_prefix) == typeof(undefined) || _prefix=='undefined'){
									_prefix = '';
								}


								let _postfix = jQuery(this).data('postfix');

								if(typeof(_postfix) == typeof(undefined) || _postfix=='undefined'){
									_postfix = '';
								}
								
								
								if(jQuery(this).attr('data-slug')==='price'){
									/*jQuery("input[name='text_min_"+jQuery(e).attr('data-slug')+"']").val( _prefix+' '+(_sep=='.'?Number(min).toFixed(2):(Number(min).toFixed(2)).toString().replace('.',',')).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")+' '+_postfix );
					        		jQuery("input[name='text_max_"+jQuery(e).attr('data-slug')+"']").val( _prefix+' '+(_sep=='.'?Number(max).toFixed(2):(Number(max).toFixed(2)).toString().replace('.',',')).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")+' '+_postfix);*/

					        		jQuery("input[name='text_min_"+jQuery(e).attr('data-slug')+"']").val( _prefix+' '+(_sep=='.'?Number(min).toFixed(0):(Number(min).toFixed(0)).toString().replace('.',',')).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")+'.00 '+_postfix );
					        		jQuery("input[name='text_max_"+jQuery(e).attr('data-slug')+"']").val( _prefix+' '+(_sep=='.'?Number(max).toFixed(0):(Number(max).toFixed(0)).toString().replace('.',',')).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")+'.00 '+_postfix);
								} else {

									console.log("input[name='text_min_"+jQuery(e).attr('data-slug')+"'] || input[name='text_max_"+jQuery(e).attr('data-slug')+"']");

					        		jQuery("input[name='text_min_"+jQuery(e).attr('data-slug')+"']").val( _prefix+(_sep=='.'?Number(min).toFixed(2):(Number(min).toFixed(2)).toString().replace('.',','))+_postfix );
					        		jQuery("input[name='text_max_"+jQuery(e).attr('data-slug')+"']").val( _prefix+(_sep=='.'?Number(max).toFixed(2):(Number(max).toFixed(2)).toString().replace('.',','))+_postfix);

					        	}
					        }					      	
						};

						_params.onChange=function(value, min, max) {	

							let _labels = jQuery(e).attr('data-labels');
							let __slugs = jQuery(e).attr('data-slugs');
							
							let _min = Number (jQuery(e).attr('data-min'));						
							let _max = Number(jQuery(e).attr('data-max'));
							let _sep = jQuery(e).attr('data-sep');

							console.log(min,_min,max,_max);

							if(typeof _labels != typeof undefined && _labels != false){
								_labels=_labels.split(',');
								_min=0;
								_max=_labels.length-1;
							}

							if(
								(
									(jQuery(this).data('prev_val_min')!=min && jQuery(this).data('prev_val_min')!=undefined)
									|| 
									(jQuery(this).data('prev_val_max')!=max && jQuery(this).data('prev_val_max')!=undefined)
								)
								||
								( min!=_min || max!=_max )
							){

								if(typeof __slugs != typeof undefined && __slugs != false){
										
									jQuery("input[name='min_"+jQuery(e).attr('data-slug')+"']").val(__slugs.split(',')[min]);
						        	jQuery("input[name='max_"+jQuery(e).attr('data-slug')+"']").val(__slugs.split(',')[max]);

								} else {
									
									console.log("input[name='min_"+jQuery(e).attr('data-slug')+"'] || input[name='max_"+jQuery(e).attr('data-slug')+"']",Number(min).toFixed(2),Number(max).toFixed(2),min,max,__slugs);

						        	jQuery("input[name='min_"+jQuery(e).attr('data-slug')+"']").val(Number(min).toFixed(2));
						        	jQuery("input[name='max_"+jQuery(e).attr('data-slug')+"']").val(Number(max).toFixed(2));
						        }

						        if(jQuery(this).attr('data-slug')!='price'){
							    	//Action of notifying filter change when changes are done.
							    	if(jQuery(this).attr('data-min')==min && jQuery(this).attr('data-max')==max) {

							    		if(jQuery("[name='_attribute']").val().includes(jQuery(this).attr('data-slug'))) {
							    			
							    			let _values=jQuery("[name='_attribute']").val().split(',');
							    			let _index=_values.indexOf(jQuery(this).attr('data-slug'));

							    			_values.splice(_index,1);
							    			jQuery("[name='_attribute']").val(_values.join());
							    		}
							    	}
							    	else {

							    		if(! jQuery("[name='_attribute']").val().includes(jQuery(this).attr('data-slug'))) {
							    			let _values=jQuery("[name='_attribute']").val().split(',');
							    			_values.push(jQuery(this).attr('data-slug'));
							    			jQuery("[name='_attribute']").val(_values.join());
							    		}
							    	}
						    	}
						    	jQuery('[name="paged"]').val('1');
						    	<?php if(empty(wbc()->options->get_option('filters_'.(empty($filter_prefix)?'':$filter_prefix).'filter_setting','filter_setting_btnfilter_now'))): ?>
						    	jQuery.fn.eo_wbc_filter_change(false,'form#<?php echo $thisObj->filter_prefix; ?>eo_wbc_filter','',{'this':this,'event':new Event('change',this)});

						    	<?php endif; ?>
						    } else if( min==_min && max==_max ){
						    	if(jQuery(this).attr('data-slug')!='price'){
							    	//Action of notifying filter change when changes are done.						    	
						    		if(jQuery("[name='_attribute']").val().includes(jQuery(this).attr('data-slug'))) {
						    			
						    			_values=jQuery("[name='_attribute']").val().split(',');
						    			_index=_values.indexOf(jQuery(this).attr('data-slug'));
						    			_values.splice(_index,1);
						    			jQuery("[name='_attribute']").val(_values.join());
						    		}
						    	}
						    }
						    
						    jQuery(this).data('prev_val_min',min);						    
						    jQuery(this).data('prev_val_max',max);
						};
						
						let _adjust_label = jQuery(this).data('label_adjust');
						
						if(_adjust_label!=1 && jQuery(this).hasClass('labeled')){
							
							_params.autoAdjustLabels=false;	
						}					
						

						jQuery("input.text_slider_"+jQuery(e).attr('data-slug')).change(function() {
							
							//jQuery("#text_slider_"+jQuery(e).attr('data-slug')).slider("set rangeValue",jQuery("[name=min_"+jQuery(e).attr('data-slug')+"]").val(),jQuery("[name=max_"+jQuery(e).attr('data-slug')+"]").val());
												
							let _sep = jQuery(e).attr('data-sep');

							let prefix = jQuery(e).attr('data-prefix');
							let postfix = jQuery(e).attr('data-postfix');
							
							let min_value = jQuery("[name='text_min_"+jQuery(e).attr('data-slug')+"']").val();
							
							let max_value = jQuery("[name='text_max_"+jQuery(e).attr('data-slug')+"']").val();
							
							if(_sep == '.' || typeof(_sep)===typeof(undefined)) {
								min_value = min_value.replace(/,/g, '');
								max_value = max_value.replace(/,/g, '');
							} else {
								min_value = min_value.replace(/\,(?=.*\,)/g, '');
								max_value = max_value.replace(/\,(?=.*\,)/g, '');
							}

							if(prefix!=='' && typeof(prefix)!==typeof(undefined) && prefix.hasOwnProperty('length')){
								if(min_value.includes(prefix)){
									min_value = min_value.slice(prefix.length);	
								}							

								if(max_value.includes(prefix)){
									max_value = max_value.slice(prefix.length);
								}
							}

							if(postfix!=='' && typeof(postfix)!==typeof(undefined) && postfix.hasOwnProperty('length')){
								if(min_value.includes(postfix)){
									min_value = min_value.slice(0,-1*postfix.length);
								}

								if(max_value.includes(postfix)){
									max_value = max_value.slice(0,-1*postfix.length);
								}
							}						

							jQuery("#text_slider_"+jQuery(e).attr('data-slug')).slider("set rangeValue",min_value,max_value);
						});

						let ui_slider = jQuery.fn.slider;

						jQuery.fn.slider = window.document.splugins.ui.slider;
						jQuery(e).slider(_params);
						jQuery.fn.slider = ui_slider;

							/*jQuery.fn.slider = jQuery.fn.ui_slider;
							jQuery("#text_slider_"+jQuery(e).attr('data-slug')).slider("set rangeValue",min_value,max_value);
							jQuery.fn.slider = jQuery.fn.jui_slider;
						});							
						jQuery(e).slider(_params);*/

					});
				};

				var primary_filter=jQuery(".eo-wbc-container.filters .ui.segment:not(.secondary)");

				var primary_computer_only=jQuery(primary_filter).find(".computer.tablet.only");

				var primary_mobile_only=jQuery(primary_filter).find(".mobile.only");

				var secondary_filter=jQuery(".eo-wbc-container.filters .ui.segment.secondary");

				var secondary_computer_only=jQuery(secondary_filter).find(".computer.tablet.only");

				var secondary_mobile_only=jQuery(secondary_filter).find(".mobile.only");
				

				if( typeof(jQuery.fn.accordion) ==='function' ){
					jQuery('.ui.accordion').accordion();
				}

				window.eo.slider(jQuery('.eo-wbc-container.filters').find('.ui.slider'));				
			
				/* Activate initiation of sliders at secondary segments. */
				if(<?php echo wp_is_mobile()?0:true; ?>/*jQuery(secondary_computer_only).css('display')!='none'*/){			


					jQuery("#advance_filter").on('click',function(){
						jQuery("#advance_filter").find('.ui.icon').toggleClass('up down');
						jQuery(secondary_filter).transition('slide down');
					}).trigger('click');			

				} else/* if(jQuery(secondary_mobile_only).css('display')!='none')*/ {
					<?php if(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_2'): ?>
					jQuery(secondary_filter).css('display','none');
					jQuery("#advance_filter").on('click',function(){					
						jQuery(this).find('.ui.icon').toggleClass('up down');
						if(jQuery(primary_filter).css('display')!=='none'){
							//switch to advance filter.
							jQuery(primary_filter).transition('fly right',{duration:0});	
							jQuery(secondary_filter).transition('fly left',{duration:700});
							jQuery(this).html('<i class="ui icon chevron left" style="position: absolute;left: 1em;"></i><?php _e('Standard Filters','woo-bundle-choice'); ?>');
							jQuery(this).css('text-align','right');
						} else{
							//switch to basic filter.
							jQuery(primary_filter).transition('fly right',{duration:700});			
							jQuery(secondary_filter).transition('fly left',{duration:0});	
							jQuery(this).html('<?php _e('Advanced Filters','woo-bundle-choice'); ?><i class="ui icon chevron right" style="position: absolute;right: 1em;"></i>');
							jQuery(this).css('text-align','left');
						}
						//jQuery(this).find('.ui.icon').toggleClass('right left');
										
					})/*.trigger('click')*/;
					<?php else: ?>
					jQuery("#advance_filter").on('click',function(){
						jQuery(this).find('.ui.icon').toggleClass('up down');
						jQuery(secondary_filter).transition('fly right');
					}).trigger('click');
					<?php endif; ?>
				}

				/*jQuery(secondary_filter).transition('fade');*/

				if(jQuery("#primary_filter").parent().parent().css('display')!='none'){
					
					jQuery("#primary_filter").click(function(e){
						e.preventDefault();
						e.stopPropagation();

						/*jQuery("#primary_filter").find('.ui.icon').toggleClass("down up");
						jQuery('.eo-wbc-container.filters,#advance_filter').transition('fade');*/

						jQuery("#primary_filter").find('.ui.icon').toggleClass("down up");
						<?php if(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_2'): ?>
							jQuery('.eo-wbc-container.filters>.segments,#advance_filter').transition('fade');
						<?php else: ?>
						jQuery('.eo-wbc-container.filters,#advance_filter').transition('fade');
						<?php endif; ?>

					}).trigger('click');
				}
				
				/*----------------------------------------------------*/
				/*----------------------------------------------------*/

				if( typeof(jQuery.fn.checkbox) ==='function' ) {


					jQuery('.checkbox').checkbox({onChange:function(event){

						/*_values = jQuery('[name="checklist_'+__slug+'"]').val();

						<<<<<<< HEAD
							if (_values=='' || typeof(_values)==typeof(undefined)) {
								return true;
							}
						=======
						_values= Array();
						if(jQuery('[name="checklist_'+__slug+'"]').length>0 && typeof(jQuery('[name="checklist_'+__slug+'"]').val()) !== typeof(undefined)){
							_values = jQuery('[name="checklist_'+__slug+'"]').val().split(',');	
						}				
						>>>>>>> 8ba310c0b06977ee8828392032acc1d9a04c96ca

						_values = _values.split(',');*/


						_values=jQuery('[name="checklist_'+__slug+'"]').val().split(',');
						_index=_values.indexOf(jQuery(this).attr('data-slug'));
						_values.splice(_index,1);						
						jQuery('[name="checklist_'+__slug+'"]').val(_values.join());

						__slug=jQuery(this).attr('data-filter-slug');

						if(__slug=='' || typeof(__slug)===typeof(undefined)){
							return true;
						}					

						_values= Array();
						if(jQuery('[name="checklist_'+__slug+'"]').length>0 && typeof(jQuery('[name="checklist_'+__slug+'"]').val()) !== typeof(undefined)){
							_values = jQuery('[name="checklist_'+__slug+'"]').val().split(',');	
						}				


						if(_values.indexOf(jQuery(this).attr('data-slug'))!=-1){

							_values=jQuery('[name="checklist_'+__slug+'"]').val().split(',');
							_index=_values.indexOf(jQuery(this).attr('data-slug'));						
							_values.splice(_index,1);						
							jQuery('[name="checklist_'+__slug+'"]').val(_values.join());

						} else {

							_values=jQuery('[name="checklist_'+__slug+'"]').val().split(',');
			    			_values.push(jQuery(this).attr('data-slug'));
			    			jQuery('[name="checklist_'+__slug+'"]').val(_values.join());
						}
						
						if( ( jQuery('.checklist_'+__slug+':checkbox').length==jQuery('.checklist_'+__slug+':checkbox:checked').length)  || (jQuery('.checklist_'+__slug+':checkbox:checked').length==0) ) {

				    		if(jQuery("[name='_attribute']").val().includes(__slug)) {
				    			
				    			_values=jQuery("[name='_attribute']").val().split(',');
				    			_index=_values.indexOf(__slug);			    			
				    			_values.splice(_index,1);			    			
				    			jQuery("[name='_attribute']").val(_values.join());
				    		}
				    	}
				    	else {
				    		if(! jQuery("[name='_attribute']").val().includes(__slug)) {
				    			_values=jQuery("[name='_attribute']").val().split(',')
				    			_values.push(__slug)
				    			jQuery("[name='_attribute']").val(_values.join())
				    		}
				    	}
				    	jQuery('[name="paged"]').val('1');
				    	<?php if(empty(wbc()->options->get_option('filters_'.$thisObj->filter_prefix.'filter_setting','filter_setting_btnfilter_now'))): ?>
				    	jQuery.fn.eo_wbc_filter_change(false,'form#<?php echo $thisObj->filter_prefix; ?>eo_wbc_filter','',{'this':this,'event':event});
				    	<?php endif; ?>
					}});				
				}
					
				/*----------------------------------------------------*/
				/*----------------------------------------------------*/				
				

				jQuery.fn.ui_accordion = jQuery.fn.accordion;
				jQuery.fn.ui_slider = jQuery.fn.slider;
				jQuery.fn.ui_checkbox = jQuery.fn.checkbox;
				jQuery.fn.accordion = jQuery.fn.jui_accordion;
				jQuery.fn.slider = jQuery.fn.jui_slider;
				jQuery.fn.checkbox = jQuery.fn.jui_checkbox;

			});
		</script> 

	<?php
	});
endif;
