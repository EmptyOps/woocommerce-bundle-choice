<?php

/*
*	Template to show form for filters 
*/

?>	
		
	<!-- Created with Wordpress plugin - WooCommerce Product bundle choice -->
	<!--WooCommerce Product Bundle Choice filter form-->
	<form method="GET" name="eo_wbc_filter" id="eo_wbc_filter" style="clear: both;">

		<input type="hidden" name="eo_wbc_filter" value="1" />	
		<input type="hidden" name="paged" value="1" />	
		<input type="hidden" name="last_paged" value="1" />
		<input type="hidden" name="action" value="eo_wbc_filter"/>
		
		<input type="hidden" name="_current_category" value="<?php echo (!empty(wbc()->sanitize->get('CAT_LINK'))?','.wbc()->sanitize->get('CAT_LINK'):$current_category); ?>" />

		<input type="hidden" name="_category_query" id="eo_wbc_cat_query" 
			value="<?php echo (!empty(wbc()->sanitize->get('CAT_LINK'))?','.wbc()->sanitize->get('CAT_LINK'):'')?>" />

		<input type="hidden" name="_category" value="<?php echo implode(',',$thisObj->___category) ?>"/>
		<input type="hidden" name="_attribute" id="eo_wbc_attr_query" value="" />			
		<?php if(isset($_GET['products_in']) AND !empty(wbc()->sanitize->get('products_in')) ): ?>
			<input type="hidden" name="products_in" value="<?php echo wbc()->sanitize->get('products_in') ?>" />			
		<?php endif; ?>

		<?php		
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

				foreach ($thisObj->__filters as $__filter) {						
					?>
						<input type="<?php echo $__filter['type'] ?>" name="<?php echo $__filter['name'] ?>" id="<?php echo $__filter['id'] ?>" class="<?php echo $__filter['class'] ?>" value="<?php echo $__filter['value'] ?>" <?php echo (isset($__filter['data-edit'])?'data-edit="'.$__filter['data-edit'].'"':'') ?>/>
					<?php
				}
			}
		?>
	</form>
	<br/><br/>
	<script type="text/javascript">		

		jQuery(document).ready(function($){			

			window.eo=new Object();
			
			//Slider creation function
			window.eo.slider=function(selector){

				$(selector).each(function(i,e){

					_min = Number($(e).attr('data-min'));						
					_max = Number($(e).attr('data-max'));												
					_labels = $(e).attr('data-labels');						

					_params=new Object();												
											
					if(_labels != undefined && _labels != false){

						_labels=_labels.split(',');
						_params.interpretLabel=function(value){ 							
							if(_labels!=undefined){
								return _labels[value];
							} else {
								return value;
							}
							
						}			
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

						__slugs = $(e).attr('data-slugs');
						
						if(typeof __slugs != typeof undefined && __slugs != false){
							//PASS
						} else {
							_sep = $(e).attr('data-sep');
				        	$("input[name='text_min_"+$(e).attr('data-slug')+"']").val(_sep=='.'?Number(min).toFixed(2):(Number(min).toFixed(2)).toString().replace('.',','));
				        	$("input[name='text_max_"+$(e).attr('data-slug')+"']").val(_sep=='.'?Number(max).toFixed(2):(Number(max).toFixed(2)).toString().replace('.',','));
				        }					      	
					}

					_params.onChange=function(value, min, max) {	

						_labels = $(e).attr('data-labels');
						_min = Number ($(e).attr('data-min'));						
						_max = Number($(e).attr('data-max'));
						_sep = $(e).attr('data-sep');

						if(typeof _labels != typeof undefined && _labels != false){
							_labels=_labels.split(',');
							_min=0;
							_max=_labels.length-1;
						}

						if(
							(
								($(this).data('prev_val_min')!=min && $(this).data('prev_val_min')!=undefined)
								|| 
								($(this).data('prev_val_max')!=max && $(this).data('prev_val_max')!=undefined)
							)
							||
							( min!=_min || max!=_max )
						){

							if(typeof __slugs != typeof undefined && __slugs != false){
									
								$("input[name='min_"+$(e).attr('data-slug')+"']").val(__slugs.split(',')[min]);
					        	$("input[name='max_"+$(e).attr('data-slug')+"']").val(__slugs.split(',')[max]);

							} else {

					        	$("input[name='min_"+$(e).attr('data-slug')+"']").val(Number(min).toFixed(2));
					        	$("input[name='max_"+$(e).attr('data-slug')+"']").val(Number(max).toFixed(2));
					        }

					        if($(this).attr('data-slug')!='price'){
						    	//Action of notifying filter change when changes are done.
						    	if($(this).attr('data-min')==min && $(this).attr('data-max')==max) {

						    		if($("[name='_attribute']").val().includes($(this).attr('data-slug'))) {
						    			
						    			_values=$("[name='_attribute']").val().split(',')
						    			_index=_values.indexOf($(this).attr('data-slug'))
						    			_values.splice(_index,1)
						    			$("[name='_attribute']").val(_values.join());
						    		}
						    	}
						    	else {
						    		if(! $("[name='_attribute']").val().includes($(this).attr('data-slug'))) {
						    			_values=$("[name='_attribute']").val().split(',')
						    			_values.push($(this).attr('data-slug'))
						    			$("[name='_attribute']").val(_values.join())
						    		}
						    	}
					    	}
					    	$('[name="paged"]').val('1');
					    	jQuery.fn.eo_wbc_filter_change();
					    }
					    
					    $(this).data('prev_val_min',min);						    
					    $(this).data('prev_val_max',max);
					}

					$("input.text_slider_"+$(e).attr('data-slug')).change(function() {				    

						$("#text_slider_"+$(e).attr('data-slug')).slider("set rangeValue",$("[name=min_"+$(e).attr('data-slug')+"]").val(),$("[name=max_"+$(e).attr('data-slug')+"]").val());
					});							
					$(e).slider(_params);
				});
			}

			var primary_filter=$(".eo-wbc-container.filters .ui.segment:not(.secondary)");
			var primary_computer_only=$(primary_filter).find(".computer.tablet.only");
			var primary_mobile_only=$(primary_filter).find(".mobile.only");

			var secondary_filter=$(".eo-wbc-container.filters .ui.segment.secondary");
			var secondary_computer_only=$(secondary_filter).find(".computer.tablet.only");
			var secondary_mobile_only=$(secondary_filter).find(".mobile.only");

			
			$('.ui.accordion').accordion();
			window.eo.slider($('.eo-wbc-container.filters').find('.ui.slider'));				
		
			/* Activate initiation of sliders at secondary segments. */
			if($(secondary_computer_only).css('display')!='none'){				

				$("#advance_filter").on('click',function(){
					$("#advance_filter").find('.ui.icon').toggleClass('up down');
					$(secondary_filter).transition('slide down');
				}).trigger('click');				

			} else if($(secondary_mobile_only).css('display')!='none') {					
				
				$("#advance_filter").on('click',function(){
					$("#advance_filter").find('.ui.icon').toggleClass('up down');
					$(secondary_filter).transition('fly right');				
				}).trigger('click');
			}

			/*$(secondary_filter).transition('fade');*/

			if($("#primary_filter").parent().parent().css('display')!='none'){
				
				$("#primary_filter").click(function(e){
					e.preventDefault();
					e.stopPropagation();
					$("#primary_filter").find('.ui.icon').toggleClass("down up");
					$('.eo-wbc-container.filters,#advance_filter').transition('fade');
				}).trigger('click');
			}
			
			/*----------------------------------------------------*/
			/*----------------------------------------------------*/
			$('.checkbox').checkbox({onChange:function(){

				__slug=$(this).attr('data-filter-slug');					

				_values=jQuery('[name="checklist_'+__slug+'"]').val().split(',');

				if(_values.indexOf($(this).attr('data-slug'))!=-1){

					_values=jQuery('[name="checklist_'+__slug+'"]').val().split(',');
					_index=_values.indexOf($(this).attr('data-slug'));						
					_values.splice(_index,1);						
					jQuery('[name="checklist_'+__slug+'"]').val(_values.join());

				} else {

					_values=jQuery('[name="checklist_'+__slug+'"]').val().split(',');
	    			_values.push($(this).attr('data-slug'));
	    			jQuery('[name="checklist_'+__slug+'"]').val(_values.join());
				}
				
				if( ( jQuery('.checklist_'+__slug+':checkbox').length==jQuery('.checklist_'+__slug+':checkbox:checked').length)  || (jQuery('.checklist_'+__slug+':checkbox:checked').length==0) ) {

		    		if($("[name='_attribute']").val().includes(__slug)) {
		    			
		    			_values=$("[name='_attribute']").val().split(',')
		    			_index=_values.indexOf(__slug)			    			
		    			_values.splice(_index,1)				    			
		    			$("[name='_attribute']").val(_values.join());
		    		}
		    	}
		    	else {
		    		if(! $("[name='_attribute']").val().includes(__slug)) {
		    			_values=$("[name='_attribute']").val().split(',')
		    			_values.push(__slug)
		    			$("[name='_attribute']").val(_values.join())
		    		}
		    	}
		    	$('[name="paged"]').val('1');
		    	jQuery.fn.eo_wbc_filter_change();
			}});				
			/*----------------------------------------------------*/
			/*----------------------------------------------------*/

		});			
	</script> 
	