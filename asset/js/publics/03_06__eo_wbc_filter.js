

window.document.splugins = window.document.splugins || {};

window.document.splugins.wbc = window.document.splugins.wbc || {};

// the filters js module
window.document.splugins.wbc.filters = window.document.splugins.wbc.filters || {};
	maybe observer pattern with filters as subject, filter types like ring builder filters, shop/cat filters, shortcode filters and diamond quiz etc filters as observer(subscriber) but also the filter fields also as observer(subscriber)(as per standard it should be only filter types not fields but we can implement by adding subtype field in the definition arcitecture and still it is not pure standard but would work), and also the filter or any of its layers like network(ajax) or render(html render) as the singleton factory design pattern 
		moved to asana 

window.document.splugins.wbc.filters.core = function( configs ) {

    var _this = this; 

	_this.configs = jQuery.extend({}, {}/*default configs*/, configs);	

    // this.subjects = [];


    //	private functions 
    var init_private = function() {

		ACTIVE_TODO_OC_START
			    	do general development like published init tobe defined below will call this private init function -- to d 


			    	we like to move the events namespace under splugins instead of under the Feed, but the problem is that the events are initially planned for the Feed page however the events API is supposed to be used for any layers of any page and so on. 
			    		// --	so what maybe we could do is move the events api functions under the splugins namespace -- to d done 
			    		// --	and we need something that says the event is for Feed page or item page or all pages. by default it need to define at least one page maybe
			    		// 	--	it is clear that events are for the browser context so whatever js is loaded on the current page or say context is what the event subjects are for. 
			    				--	so maybe simply let events work on their own and for the modules like variations where maybe the same events can be reused on category page which was defined for the item page flows then that is fine and we are happy with reusability, but not sure if it can create disasters or mess in the flow. and this maybe a big question 

		need to define below notifications -- to s 
				--	the notifications for the filters module will be in detail since it will be almost central to everythings of the category page and many moduels that would come on different kind of category pages : NOTE 
					--	NOTE: and maybe in future for some modules of item page also like, vertical pair builder. 
			--	init search form 
			--	before search -- already set but need to update 
			--	show loader -- it might be used by some js layers of alternate templates or so if they want to alter/control ui. but that will not be its fundamental use case the fundamental might be some functions that some js layers would need to do around show loader and hide loader etc. events, like if they want to manage some ui/ux aspects which would be affected by these show hide_loader events 
			--	prepare_query_data -- maybe many js layers including the extensions layers would be interested in this notification, and using the callback they may want to pass their modification/overrides. -- but is this correct data flow, and is this something that we envisioned and anticipated on filters js module. 
			--	list all other here like before_send(so before search and before_send will be different and I think there was that flag checking logic in before_search or even before that), success, complete, error and so on. so this list will include even the smaller layers and so a detailed event flow will be here, and it may help pagination and tableview which are already seeing different issues. 
						--	it is should_search where we have all that flags logic, and since we have should_search now so maybe we need to drop the before_search but keep the before_send of course. and maybe dropping the before_search is what we planned but check in related points listed in this module and confirm. 
				--	and yeah it will also include like render_html, no_products_found, no_products_found render and so on 
					--	so can we use the events above to pass data objct to other layers like tableview and so on. I think we had this task on queue already on backend layers. so we may like to do the needful at right time so that we do not need to worry about two different layers and something such. 
						--	however above is only for data passing but apart from that I think we already had in place by m or had planned to use only one data response for any kind of result feeds like traditional gallery view, tableview and so on. 
						--	and on this regard now we would like to finalize the flow of filter sets and the tabs that it creates on frontend so that becomes clear. 
							--	and so also need to finalize on some advanced variation api feed layers of backend and frontend so that if there are concerns regarding flow then that become clear now 
						--	and regarding above events maybe prepare_query_data or result/render level events might be of interest to loop box as well to control which variation image to show and so on. 
							--	but I think that will be fully managed by the variations swatches layers of swatches module, out of the box , with their implementation of category page related functions or conditions that would going to come. -- so need to finalize the research and flow regarding the variations swatches on category page. 
								--	gallery_images module will not even init on category page. 
								--	and I think for swatches module if the independent structure seems helpful, neat and efficient than reusing the same item page module and if the reusability benefits are not making big difference than we can simply create the child module under swatches like category_page. and still in this case we can reuse code where possible of the parent module of swatches. 

			NOTE: 
				1 	the callback implementation on each above notification will be fundamental, so that other layers can do their stuff, override certain things and so on. 
				2 	what we have rigth now is action filter kind of logic with observer pattern notifications -- to h . for the notes 
					--  what we need for many flow here is filter hook kind of logic which returns data stat on notification/events.
						--  we can achive it if child modules provide callbacks during main calls, it will be neat but require mantaining parameter passing and so on. so need to tweak observer pattern notifications to provide this kind of flow. still confirm once before implementing -- to s & -- to h
						NOTE: wp maybe alredy provideing filter hook api but we can simply implement it in our observer pattern by adding some additional parameter and mainataining filter var stat. 
							// --	simply create the function subscribe_observer_filter or simply we can name it subscribe_filter or simply lets do add_filter -- to s done
								// --	and regarding the implementation let hope that wp.hooks is available in console, we may need to add some dependancy. 
								// 	--	if that is not available then we need to implement our own implementation 
								// --	and now the main events core module will contain one private var under _this.configs.events_backend, and if we are use to wp.hooks then set that to wp hardcoded. 
								// 	--	and use that in if conditon and do implement wp.hooks based filters inside those conditional blocks and the other implementation can be provided conditionally 
								// --	maybe we can compare te existing subscribeObserver notification as the action in the analogy, but anyway we can turn to action hooks also but only if required and at some right time
								// --	instead of mainataining our own events backend, lets mark that as default -- to s. done
									// --	so if conditon of _o function and that events_backend property == 'jquery' then simply implement jquery backend connection. -- to s done
									// --	and else conditon at last will always host our default backend implementation layers. we are not going to implement our own backend since that is like reinventing the wheel but yeah our events module and their now defined functions will remain at core and central to everythings -- to s done
										--	ACTIVE_TODO but yeah we may like define the function names to make it lighter, shorter and more closer to analogy of jQuery events. -- to s 
										NOTE: 

											1 	and yeah we are not doing wp.hooks and only the jquery events is because they are much more popular and have vast community and support. and we will continue to use it if nothing else comes in the place. but yeah still there is something like our architecture of the events core and the standards we defined on one level callbacks only, the way subscribe params and response params are supposed to be will all remain in place. to ensure clean data and stat management and to keep the things simple. 
											// 2 	and the subject key means feature key will be used for definining events key in format like splugins.events.feature_unique_key.notification_key -- to s done
											// 3 	and we can consider the freature key as selector for events host for example document in case of example jQUery(document).on and can consider subscriber_key as listener selector. but that will lead to additional complexity of always defining feature_unique_key and subscriber key based on the actual dom selectors. 
												// --	our objective of implementing central layer which can take some control or at least have everything under it so that is covered. 
													// --	since recommends to avoid excessive use of document or document.body as events host selector so lets just use any lighter id based node that can always be present or we can simply create one simple hidden div in body, with id like splugins_events_host_node and just keep using that. -- to s done
											4 	in case of jQuery events_backend the subject and observer will be self serving means there will be no need to create their object but jquery will simply keep events binding of subject under document.body while observer callbacks will also be maintained by it. 
												// 4.1 	so simply route the createSubject call to nothing for now and we can keep the notifications stat to only accept supported notifications but we can do that later as required and necessary. so empty if condition block -- to s. done
												// 4.2 	subscribeObserver will call .on method -- to s done
												// 4.3 	notifyAllObservers will call trigger method -- to s done
												// 4.4 	for data filter events we will use subscribe_observer_filter function against for add_filter -- to s done
												// 4.5 	and for apply filters we will use apply_all_observer_filters, and it will use triggerHandler so call that. -- to s done
														--	and all the subscriber callback functions must return the .data(event.data.event_key) and whoever interested in changing(filtering) data would change data using .data method. -- to s 
															--	however we are interested more in ensuring that all callback functions are executed before the anything happens after apply_all_observer_filters call. and with mere trigger we can not surely say that but with triggerHandler we can surely confirm that. : NOTE 


		--	loading sequence 
			--	all in all, we want to do simple and self serving events, events binding and loading sequence architecture. so that we never need to maintain that with so unreliable setTimeout and setInterval and so on, actual more than unreliable they are burden to maintain always and if not cancelled/stopped properly then they would always weaken the seo reports. 
			--	as per this link https://stackoverflow.com/questions/8996852/load-and-execute-order-of-scripts, we can simply load scripts in the priority we want to execute, all inline script in the footer, and they are also in the priority we want to execute using priority of the wp_footer hook. 
				--	so for example all extensions variations assets inline script first, then anything that requires in between and at last the slider and zoom assets. 
				--	however still what we need to manage in case of our sp_variations module is 
					--	extensions should bind to the events 
					--	then the sp_slzm module init for activating its listeners(here we are doing extra layer of providing listeners so that we can provide simple and synchronus experience that avoids complexity where possible) 
						--	then the slider and zoom asset will call above listener 
					--	then the sp_variations modules should init 
					--	and then most challanging of all is external event dependancy, for example wc_variations_form. I think we can simply restructure our loading sequence a little bit as required but the external events should be take care of always witout failling. so we should simply give that ultimate priority and bind that always on time, whenever they want us to bind to them. and then structure rest of the loading sequence accordingly. 

		 
		ACTIVE_TODO_OC_END

		//	the filter events 
		window.document.splugins.events.api.createSubject( 'filters', ['before_search', 'no_products_found'] );

		bind_reset_click();

		bind_click();
		
		advance_filter_accordian();


		// ACTIVE_TODO need to confirm -- shraddha
		init_search();

    };

	// --	and there will be one more function like should_search, which will also be private. and that will handle onle the logic of checking flags and so on like the enable_filter_table flag above 
    var should_search = function() {

    	// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
		// --add to be confirmed 2601 TO 2705--		

		if(init_call/* || typeof(window.eo_wbc_filter_change_table_view_service)===typeof(undefined)*/) {
			/*window.eo_wbc_filter_change_table_view_service = true*/
			return false;
		}
		console.log(init_call,window.eo_wbc_filter_change_table_view_service);

		if(window.eo_wbc_object.enable_filter===false){
			return false;
		}

		//////////////////////

		// if(!init_call){
		// 	jQuery(".reset_all_filters.mobile_2").removeClass('mobile_2_hidden');
		// }	



		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/template1.js
		// --add to be confirmed 630 TO 734--

		if(init_call/* || typeof(window.eo_wbc_filter_change_table_view_service)===typeof(undefined)*/) {
			/*window.eo_wbc_filter_change_table_view_service = true*/
			return false;
		}
		console.log(init_call,window.eo_wbc_filter_change_table_view_service);

		if(window.eo_wbc_object.enable_filter===false){
			return false;
		}	

		///////////

		// if(!init_call){
		// 	jQuery(".reset_all_filters.mobile_2").removeClass('mobile_2_hidden');
		// }	

		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
		// --add to be confirmed & 2187 TO 2324--

		// if(!init_call){
		// 	jQuery(".reset_all_filters.mobile_2").removeClass('mobile_2_hidden');
		// }	


		//////////////////////
		// /var/www/html/drashti_project/27-05-2022/woocommerce-bundle-choice/asset/js/publics/eo_wbc_filter.js

		if(window.eo_wbc_object.enable_filter===false){
			return false;
		}					

    };	 

    var before_search = function() {

		// below before_search function need to make private 
		// 	--	however it will continue to broadcast before search notification, and whoever interested in the before_search event should bind to that event notification 


		// window.document.splugins.Feed.events.core.notifyAllObservers( 'filters', 'before_search' ); 

		var before_search_callback = null ;
        window.document.splugins.events.api.notifyAllObservers( 'filters', 'before_search', {}, before_search_callback );

    };	 

    // ACTIVE_TODO_OC_START
    // from tv js layer -- currently from sp_tv_template js layer 
    // ACTIVE_TODO_OC_END
 
	var eo_wbc_filter_change_wrapper_private = function() {

		sould_search();

		before_search();

		prepare_query_data();

		sp_filter_request variable tv_template.js ma move karavano, if required -- to h & -- to s
		jQuery.fn.sp_filter_request = jQuery.ajax(
		{
			url: eo_wbc_object.eo_admin_ajax_url,//form.attr('action'),
			data:form_data, // form data
			type:'POST', // POST

			beforeSend:before_Send(xhr),

			complete:complete(),

			success:success(data),
			// {

			// 	//console.log(data);
			// 	//document.write(data);
			// 	//jQuery("#loading").removeClass('loading');
			// 	// --	and this is called for the slick_table if block so is not the type should be slick_table here? discuss with shraddha -- to d 
			// 	// 	-- rectify if there are any such similar issue

			// 	//////// 02-04-2022 @shraddha /////// 
			// 	eo_wbc_e_render_table(type,data);	
			// 	window.eo_wbc_object.enable_filter_table = true;
			// 	// jQuery(".ui.sticky").sticky('refresh');
			// },
			error:error(data)
			// {
			// 	jQuery("#loading").removeClass('loading');
			// 	console.log('error');
			// 	console.log(data);
			// 	window.eo_wbc_object.enable_filter_table = true;
			// },
		} );		

		compatability(section, object, expected_result);

	};

	var prepare_query_data = function() {

		// ACTIVE_TODO_OC_START
		// from 0= this file function 
		// bring here the code from there -- to d 
		// ACTIVE_TODO_OC_END

		// from 1 	

		var form=jQuery(form_selector);
		if(form.find('[name="html_destination"]').length>0) {

			render_container = form.find('[name="html_destination"]').val();
		}


		if(form.find('[name="filter_native"]').length>0) {
			// jQuery.fn.eo_wbc_filter_change_native(init_call,form_selector,render_container);
			window.document.splugins.filters.api.eo_wbc_filter_change_wrapper(init_call, form_selector,render_container);
			return true;
		}					

		// ACTIVE_TODO_OC_START
		// from 1 after eo_wbc_filter_change_native call 
		// ACTIVE_TODO_OC_END

		jQuery(form).attr('method','POST');	
		jQuery("[name*='action']").val("eo_wbc_e_tabview");	

		//

		form_data=undefined;
		if(init_call)
		{
			if( jQuery("[name='_category_query']").val() !== undefined && jQuery("[name='_category_query']").val().trim()=='' ) {
				_products_in = jQuery("[name='products_in']").val()
				if(_products_in == undefined){
					_products_in = '';
				} else {
					_products_in = _products_in.trim();
				}
				form_data={_current_category:jQuery("[name='_current_category']").val().trim(),action:'eo_wbc_e_tabview',products_in:_products_in};
				if(eo_wbc_e_tabview.eo_table_view_per_page){
					form_data.eo_wbc_page = jQuery('[name="eo_wbc_page"]').val();
				}
			}
			else
			{
				//form_data={_category:jQuery("[name='_category']").val().trim(),action:'eo_wbc_filter'};	
				ACTIVE_TODO from tableview -- shraddha
				form_data=jQuery("#tableview_order,#tableview_order_direction,[name='_current_category'],[name='_category'],[name^='cat_filter_'],[name='action'],[name='products_in']").serialize();

				ACTIVE_TODO from -- shraddha
				form_data=jQuery("[name='_current_category'],[name='_category'],[name^='cat_filter_'],[name='action'],[name='products_in']").serialize();

				if(eo_wbc_e_tabview.eo_table_view_per_page){
					form_data.eo_wbc_page = jQuery('[name="eo_wbc_page"]').val();
				}
			}

			ACTIVE_TODO from pagination -- shraddha
			if(jQuery("select[name='orderby']").length>0){
				form_data.orderby=jQuery("select[name='orderby']:eq(0)").val();
			}

			ACTIVE_TODO from pagination -- shraddha
			if(jQuery("select[name='orderby']").length>0){
				form_data.orderby=jQuery("select[name='orderby']:eq(0)").val();
			}
			
			ACTIVE_TODO from tableview -- shraddha
			form_data.action='eo_wbc_e_tabview';

		}
		else{
			ACTIVE_TODO from tableview -- shraddha
			form_data=form.serialize();
			if(eo_wbc_e_tabview.eo_table_view_per_page){
				form_data+='&eo_wbc_page='+jQuery('[name="eo_wbc_page"]').val();
			}

			ACTIVE_TODO from pagination -- shraddha
			if(jQuery("select[name='orderby']").length>0){
				form_data+='&orderby='+jQuery("select[name='orderby']:eq(0)").val();
			}

			ACTIVE_TODO from tableview pagination -- shraddha
			if(jQuery("#tableview_order").val()!=='' && jQuery("#tableview_order_direction").val()!==''){
				form_data+='&tableview_order='+jQuery("#tableview_order").val();
				form_data+='&tableview_order_direction='+jQuery("#tableview_order_direction").val();
			}

			ACTIVE_TODO from tableview -- shraddha
			form_data+='&action=eo_wbc_e_tabview';
		}

		////////////////////////////////

		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
		// --add to be confirmed 2601 TO 2705--

		if(init_call) {
			jQuery("form#eo_wbc_filter [name='paged']").val('1');
			jQuery("form#eo_wbc_filter [name='last_paged']").val('1');

			jQuery("form#eo_wbc_filter [name='_category']").val(jQuery("form#eo_wbc_filter [name='_current_category']"));
			jQuery("form#eo_wbc_filter [name='_attribute']").val("");
		}

		var form=jQuery("form#eo_wbc_filter");	

		// jQuery(form).attr('method','POST');	
		// jQuery("[name*='action']").val("eo_wbc_e_tabview");	

		// form_data=undefined;
		// if(init_call){
		// 	if( jQuery("[name='_category_query']").val() !== undefined && jQuery("[name='_category_query']").val().trim()=='' ) {
		// 		_products_in = jQuery("[name='products_in']").val()
		// 		if(_products_in == undefined){
		// 			_products_in = '';
		// 		} else {
		// 			_products_in = _products_in.trim();
		// 		}
		// 		form_data={_current_category:jQuery("[name='_current_category']").val().trim(),action:'eo_wbc_e_tabview',products_in:_products_in};
		// 		if(eo_wbc_e_tabview.eo_table_view_per_page){
		// 			form_data.eo_wbc_page = jQuery('[name="eo_wbc_page"]').val();
		// 		}
		// 	}
		// 	else
		// 	{
		// 		//form_data={_category:jQuery("[name='_category']").val().trim(),action:'eo_wbc_filter'};	
		// 		form_data=jQuery("#tableview_order,#tableview_order_direction,[name='_current_category'],[name='_category'],[name^='cat_filter_'],[name='action'],[name='products_in']").serialize();
		// 		if(eo_wbc_e_tabview.eo_table_view_per_page){
		// 			form_data.eo_wbc_page = jQuery('[name="eo_wbc_page"]').val();
		// 		}
		// 	}

		// 	if(jQuery("select[name='orderby']").length>0){
		// 		form_data.orderby=jQuery("select[name='orderby']:eq(0)").val();
		// 	}

		// 	if(jQuery("select[name='orderby']").length>0){
		// 		form_data.orderby=jQuery("select[name='orderby']:eq(0)").val();
		// 	}
		// }
		// else{
		// 	form_data=form.serialize();
		// 	if(eo_wbc_e_tabview.eo_table_view_per_page){
		// 		form_data+='&eo_wbc_page='+jQuery('[name="eo_wbc_page"]').val();
		// 	}

		// 	if(jQuery("select[name='orderby']").length>0){
		// 		form_data+='&orderby='+jQuery("select[name='orderby']:eq(0)").val();
		// 	}

		// 	if(jQuery("#tableview_order").val()!=='' && jQuery("#tableview_order_direction").val()!==''){
		// 		form_data+='&tableview_order='+jQuery("#tableview_order").val();
		// 		form_data+='&tableview_order_direction='+jQuery("#tableview_order_direction").val();
		// 	}
		// }

		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
		// --add to be confirmed 3159 TO 3232--

		// var form=jQuery("form#eo_wbc_filter");	
										
		// jQuery(form).attr('method','POST');	
		// jQuery("[name*='action']").val("eo_wbc_e_tabview");	

		// form_data=undefined;
		// if(init_call){
		// 	if( jQuery("[name='_category_query']").val() !== undefined && jQuery("[name='_category_query']").val().trim()=='' ) {
		// 		_products_in = jQuery("[name='products_in']").val()
		// 		if(_products_in == undefined){
		// 			_products_in = '';
		// 		} else {
		// 			_products_in = _products_in.trim();
		// 		}
		// 		form_data={_current_category:jQuery("[name='_current_category']").val().trim(),action:'eo_wbc_e_tabview',products_in:_products_in};
		// 		if(eo_wbc_e_tabview.eo_table_view_per_page){
		// 			form_data.eo_wbc_page = jQuery('[name="eo_wbc_page"]').val();
		// 		}
		// 	}
		// 	else
		// 	{
		// 		//form_data={_category:jQuery("[name='_category']").val().trim(),action:'eo_wbc_filter'};	
		// 		form_data=jQuery("[name='_current_category'],[name='_category'],[name^='cat_filter_'],[name='action'],[name='products_in']").serialize();
		// 		if(eo_wbc_e_tabview.eo_table_view_per_page){
		// 			form_data.eo_wbc_page = jQuery('[name="eo_wbc_page"]').val();
		// 		}
		// 	}

		// 	if(jQuery("select[name='orderby']").length>0){
		// 		form_data.orderby=jQuery("select[name='orderby']:eq(0)").val();
		// 	}
		// }
		// else{
		// 	form_data=form.serialize();
		// 	if(eo_wbc_e_tabview.eo_table_view_per_page){
		// 		form_data+='&eo_wbc_page='+jQuery('[name="eo_wbc_page"]').val();
		// 	}

		// 	if(jQuery("select[name='orderby']").length>0){
		// 		form_data+='&orderby='+jQuery("select[name='orderby']:eq(0)").val();
		// 	}
		// }

		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/template1.js
		// --add to be confirmed 630 TO 734--

		// if(init_call) {
		// 	jQuery("form#eo_wbc_filter [name='paged']").val('1');
		// 	jQuery("form#eo_wbc_filter [name='last_paged']").val('1');

		// 	jQuery("form#eo_wbc_filter [name='_category']").val(jQuery("form#eo_wbc_filter [name='_current_category']"));
		// 	jQuery("form#eo_wbc_filter [name='_attribute']").val("");
		// }

		// var form=jQuery("form#eo_wbc_filter");	

		// jQuery(form).attr('method','POST');	
		// jQuery("[name*='action']").val(eo_wbc_e_tabview.eo_ajax_func);	

		// form_data=undefined;
		// if(init_call){
		// 	if( jQuery("[name='_category_query']").val() !== undefined && jQuery("[name='_category_query']").val().trim()=='' ) {
		// 		_products_in = jQuery("[name='products_in']").val()
		// 		if(_products_in == undefined){
		// 			_products_in = '';
		// 		} else {
		// 			_products_in = _products_in.trim();
		// 		}
		// 		form_data={_current_category:jQuery("[name='_current_category']").val().trim(),action:eo_wbc_e_tabview.eo_ajax_func,products_in:_products_in};
		// 		if(eo_wbc_e_tabview.eo_table_view_per_page){
		// 			form_data.eo_wbc_page = jQuery('[name="eo_wbc_page"]').val();
		// 		}
		// 	}
		// 	else
		// 	{
		// 		//form_data={_category:jQuery("[name='_category']").val().trim(),action:'eo_wbc_filter'};	
		// 		form_data=jQuery("#tableview_order,#tableview_order_direction,[name='_current_category'],[name='_category'],[name^='cat_filter_'],[name='action'],[name='products_in']").serialize();
		// 		if(eo_wbc_e_tabview.eo_table_view_per_page){
		// 			form_data.eo_wbc_page = jQuery('[name="eo_wbc_page"]').val();
		// 		}
		// 	}

		// 	if(jQuery("select[name='orderby']").length>0){
		// 		form_data.orderby=jQuery("select[name='orderby']:eq(0)").val();
		// 	}

		// 	if(jQuery("select[name='orderby']").length>0){
		// 		form_data.orderby=jQuery("select[name='orderby']:eq(0)").val();
		// 	}
		// }
		// else{
		// 	form_data=form.serialize();
		// 	if(eo_wbc_e_tabview.eo_table_view_per_page){
		// 		form_data+='&eo_wbc_page='+jQuery('[name="eo_wbc_page"]').val();
		// 	}

		// 	if(jQuery("select[name='orderby']").length>0){
		// 		form_data+='&orderby='+jQuery("select[name='orderby']:eq(0)").val();
		// 	}

		// 	if(jQuery("#tableview_order").val()!=='' && jQuery("#tableview_order_direction").val()!==''){
		// 		form_data+='&tableview_order='+jQuery("#tableview_order").val();
		// 		form_data+='&tableview_order_direction='+jQuery("#tableview_order_direction").val();
		// 	}
		// }


		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/template2.js
		// --add to be confirmed 302 TO 375--

					// var form=jQuery("form#eo_wbc_filter");	
										
					// jQuery(form).attr('method','POST');	
					// jQuery("[name*='action']").val("eo_wbc_e_tabview")

					// form_data=undefined;
					// if(init_call){
					// 	if( jQuery("[name='_category_query']").val() !== undefined && jQuery("[name='_category_query']").val().trim()=='' ) {
					// 		_products_in = jQuery("[name='products_in']").val()
					// 		if(_products_in == undefined){
					// 			_products_in = '';
					// 		} else {
					// 			_products_in = _products_in.trim();
					// 		}
					// 		form_data={_current_category:jQuery("[name='_current_category']").val().trim(),action:'eo_wbc_e_tabview',products_in:_products_in};
					// 		if(eo_wbc_e_tabview.eo_table_view_per_page){
					// 			form_data.eo_wbc_page = jQuery('[name="eo_wbc_page"]').val();
					// 		}
					// 	}
					// 	else
					// 	{
					// 		//form_data={_category:jQuery("[name='_category']").val().trim(),action:'eo_wbc_filter'};	
					// 		form_data=jQuery("[name='_current_category'],[name='_category'],[name^='cat_filter_'],[name='action'],[name='products_in']").serialize();
					// 		if(eo_wbc_e_tabview.eo_table_view_per_page){
					// 			form_data.eo_wbc_page = jQuery('[name="eo_wbc_page"]').val();
					// 		}
					// 	}

					// 	if(jQuery("select[name='orderby']").length>0){
					// 		form_data.orderby=jQuery("select[name='orderby']:eq(0)").val();
					// 	}
					// }
					// else{
					// 	form_data=form.serialize();
					// 	if(eo_wbc_e_tabview.eo_table_view_per_page){
					// 		form_data+='&eo_wbc_page='+jQuery('[name="eo_wbc_page"]').val();
					// 	}

					// 	if(jQuery("select[name='orderby']").length>0){
					// 		form_data+='&orderby='+jQuery("select[name='orderby']:eq(0)").val();
					// 	}
					// }

		/////////////////////////////////////////////////
		// /var/www/html/drashti_project/27-05-2022/woocommerce-bundle-choice/asset/js/publics/eo_wbc_filter.js

		////////////////////shraddha/////////////////////////
		// var form=jQuery(form_selector/*"form#eo_wbc_filter"*/);	
		// if(form.find('[name="html_destination"]').length>0){
		// 	render_container = form.find('[name="html_destination"]').val();
		// }
		/////////////////////////////////////////////////////
		var site_url=eo_wbc_object.eo_cat_site_url;
		var ajax_url = '';

		if(site_url.includes('?')) {
			ajax_url = site_url+eo_wbc_object.eo_cat_query;
		} else {
			ajax_url = site_url+'/?'+eo_wbc_object.eo_cat_query;
		}

		console.log(eo_wbc_object);	

		success(data);	

		var prepare_query_data_callback = null ;
        window.document.splugins.events.api.notifyAllObservers( 'filters', 'prepare_query_data', {}, prepare_query_data_callback );
	

	};	

	// so here there will be those ajax callback functions like beforeSend, complete, success, error and so on? mostly yes so that we can call it from wrapper and especially put all the refactored code from different instances of ht eo_wbc_filter_change functions in here 
		--	so let just do it -- to d. done. had already did it for two functions below 
		ACTIVE_TODO_OC_START
		--	for all four functions below bring the code from all applicable functions -- to d 
			--	and compare and put common only once and for identical means different put separetely and comment for both -- to d. ask b for how to do this process precisely, and do it precisely no more in rubbish way. 
			--	and note one thing clearly that identical table code that is identified here need to be moved in their own calling layers to this function, so there will be some call back or so that need to be defined that can cover it. or we can simply use what is available by way of observer pattern and their notification callback that is planned that maybe of help if finalized -- to d 
		ACTIVE_TODO_OC_END	
	var before_Send = function(xhr) {

		window.eo_wbc_object.enable_filter_table = false;
		if(eo_wbc_object.hasOwnProperty('xhr')){
			eo_wbc_object.xhr.abort();
		}
		eo_wbc_object.xhr = xhr;


		///////////////////////////
		// /var/www/html/drashti_project/27-05-2022/woocommerce-bundle-choice/asset/js/publics/eo_wbc_filter.js

		window.eo_wbc_object.enable_filter = false;
		console.log(this.url);

		///////////////////////////

		show_loader();

	};

	var complete = function(){
		// console.log(this.url);
	}; 

	var success = function(data)
	{


		//console.log(data);
		//document.write(data);
		//jQuery("#loading").removeClass('loading');
		// --	and this is called for the slick_table if block so is not the type should be slick_table here? discuss with shraddha -- to d 
		// 	-- rectify if there are any such similar issue

		//////// 02-04-2022 @shraddha /////// 
		// eo_wbc_e_render_table(type,data);	
		// window.eo_wbc_object.enable_filter_table = true;
		// jQuery(".ui.sticky").sticky('refresh');

		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
		// --add to be confirmed & 2187 TO 2324--

		// eo_wbc_e_render_table(type,data);	
		// window.eo_wbc_object.enable_filter_table = true; 


		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
		// --add to be confirmed 2601 TO 2705--

		// eo_wbc_e_render_table(data);


		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
		// --add to be confirmed 3159 TO 3232--

		// eo_wbc_e_render_table(data);


		/*// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/template1.js
		// --add to be confirmed 630 TO 734--

		eo_wbc_e_render_table(data);

		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/template2.js
		// --add to be confirmed 302 TO 375--

		eo_wbc_e_render_table(data);*/


		////////////////////////////
		// /var/www/html/drashti_project/27-05-2022/woocommerce-bundle-choice/asset/js/publics/eo_wbc_filter.js

		eo_wbc_filter_render_html(data,render_container);
		window.eo_wbc_object.enable_filter = true;

		/////////////////////////////

	}; 

	var error = function(data){
		
		console.log('error');
		console.log(data);
		window.eo_wbc_object.enable_filter_table = true;

		////////////////////////////
		// /var/www/html/drashti_project/27-05-2022/woocommerce-bundle-choice/asset/js/publics/eo_wbc_filter.js

		window.eo_wbc_object.enable_filter = true;

		///////////////////////////////

		hide_loader();
	};

    ///////////// -- 15-06-2022 -- @drashti -- ///////////////////////////////
    var compatability = function(section, object, expected_result) {

    	// ACTIVE_TODO_OC_START
    	// do the call from where the below section is moved here, and if you already did the call then show and confirm with me -- to d 
    	// ACTIVE_TODO_OC_END

        if(section == 'product-listing'){
            jQuery('.products:eq(0),.product-listing:eq(0),.row-inner>.col-lg-9:eq(0)').addClass('product_grid_view');
            //jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.woocommerce-pagination,.pagination').css('visibility','visible');
            if(jQuery(".row-inner>.col-lg-9").length>0){
                jQuery(".row-inner>.col-lg-9 *").each(function(i,e) {       
                    if(jQuery(e).css('opacity') == '0'){
                        jQuery(e).css('opacity','1');        
                    }
                });
                jQuery(".t-entry-visual-overlay").removeClass('t-entry-visual-overlay');
                jQuery(".double-gutter .tmb").css('width','50%');
                jQuery(".double-gutter .tmb").css('display','inline-flex');
            }
            
            jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.woocommerce-pagination,.pagination,jet-filters-pagination').css('visibility','visible');

            // Fix for the yith wishlist.
            if(typeof(yith_wcwl_l10n)=='object'){
                eowbc_yith_wishlist_fix();
            }
            // lazyload
            if(typeof(LazyLoad)=='function'){
                eowbc_lazyload();
            } 
        }
        
        // ACTIVE_TODO_OC_START
        // -- check and let me know the below statement should not be here so give me instructions related to that which was given to you -- to d 
        // ACTIVE_TODO_OC_END

        eo_wbc_filter_render_html();     

    };

    var eo_wbc_filter_render_html = function(data,render_container){


		/*jQuery("#loading").removeClass('loading');
		return true;*/

		render_data = data;
		_render_container = render_container;
		// ACTIVE_TODO_OC_START
		// create two function show_loader and hide_loader in filters core js module -- to d 
		// 	--	and then move the below code in the hide_loader -- to d 
		// 	--	and check all the change function implementation and move show related code in the show_loader function and hide related code in the hide_loader function -- to d
		// 	--	needless to say but still note that the loader hide show event should be carefully caled from each related search events like search, complete, error and maybe also some other which handle some particular scenarios. -- to d 
		// 		--	so that what happen is that in future if the events namespace is firing the search or any related events around and if by any change any event that the filters module recieve is related to the show hide loader flow then that is taken care of implicitly.  
		// jQuery("#loading").removeClass('loading');

		// create one function update_result_count in filters core js module -- to d 
		// --	and then move the below code in that -- to d 
		// --	and check all the change function implementation and move show related code in that function -- to d 
		// --	I have some doubt the below condition's logic it is setting to empty when there is not result count container is returned. but I guess that is exceptional scenario which would never be happening but if it happens then we need to handle that exceptional scenario, so for now keeping it open and if no such thing show up after 1st or 2nd revision then remove this task ACTIVE_TODO -- to b 
		// 	--	move above task comment also with the code -- to d 
		// ACTIVE_TODO_OC_END	
		//Replace Result Count Status...
		if(jQuery('.woocommerce-result-count',jQuery(data)).html()!==undefined){
			if(jQuery(".woocommerce-result-count").length>0){
				jQuery(".woocommerce-result-count").html(jQuery('.woocommerce-result-count',jQuery(data)).html());
			} else {
				jQuery(jQuery('.woocommerce-result-count',jQuery(render_data)).get(0).outerHTML).insertBefore('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products');
			}
		}
		else {
			jQuery(".woocommerce-result-count").html('');	
		}

		//Replacing Product listings....
		like vars under window object are moved filter core js module, similarly move below var also to filters js module and underneath below statement set it in the filters js module -- to d 
		document.wbc_data = data;
		
		/*console.log(data);*/
		// ACTIVE_TODO_OC_START
		// we can define a compatibility check flow, where the compatibility function will be available in each js module -- to d 
		// 	-- that will recieve a object and second argument will be the excpected result. -- to d 
		// 	-- if that is not matched then the compatibility function will apply its all available compatibility scenarios -- to d. like the below elementor-products-grid class statement would then go inside compatibility if. and .jet-woo-products also belong there, but let it be there and same for any js module layers where we have compatibility patch is mixed with basic/standard implementation statement to avoid the errors while separating them. 
		// ACTIVE_TODO_OC_END
		let container_html = jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products',jQuery(data)).html();	
		
		/*if(container_html===undefined || container_html==='') {
			container_html = jQuery(jQuery(data),'.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products').html();
		}*/

		if(container_html===undefined || container_html==='') {
			container_html = jQuery(".elementor-products-grid",jQuery(data)).html();
		}

		if(container_html!==undefined && container_html!=='') {	
			if( typeof(is_card_view_rendered) == undefined || typeof(is_card_view_rendered) == 'undefined' || is_card_view_rendered == false ) {
				if(jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products').length<=0) {
					jQuery(render_container).html(container_html);
				} else {
					jQuery(render_container).html(container_html);
				}			
			}						
			else {
				we need to track execution of this function so search in all 5 repos and confirm where this function is defined -- to d 
					--	and if that is found then only track above where is_card_view_rendered to see from which different locations it is defined and/or coming -- to d 
				wbc_attach_card_views();
			}

			var links=jQuery(".products a,.product-listing a");
			jQuery.each(links,function(index,element) {

				var href=jQuery(element).attr('href');
				if(typeof(href)!==typeof(undefined) && href.hasOwnProperty('indexOf')){
					if(href.indexOf('?')==-1) {
						jQuery(element).attr('href',jQuery(element).attr('href')+eo_wbc_object.eo_product_url);
					} else {
						jQuery(element).attr('href',href.substring(0,href.indexOf('?'))+eo_wbc_object.eo_product_url);
					}
				}
				
			});
		}
		else {
			// ACTIVE_TODO_OC_START
			// ACTIVE_TODO instead of determining if products are found or not on the js layer, it is really if we send a flag var from the php layer. so do it. in the dapii feed layers it is already like that but ensure that in wbc and tableview(in tableview also it is at least almost planned and roughly implemented) -- to h or -- to d 
			// // 	ACTIVE_TODO commented below events subject creation, during testing only. so temporary only.
			// ACTIVE_TODO_OC_END
			window.document.splugins.wbc.filters.core.no_products_found();

			// ACTIVE_TODO_OC_START
			// just move below line in the no_products_found function of the filters js module -- to d 
			// 	--	and so now the render_container will recieve one parameter that is render_container, it will defaults to null so from where it is applicable it is passed otherwise it will be left blank -- to d 
			// ACTIVE_TODO_OC_END
			jQuery(render_container/*".products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products"*/).html('<p class="woocommerce-info" style="width: 100%;">No products were found matching your selection.</p>');	
		}	

		ACTIVE_TODO_OC_START
		/*if(render_container===".products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products"){*/
			//Replacing Pagination details.....		
			//console.log(jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination',jQuery(data)).html());

			//done move below logic to the pagination js module -- to d. including the compatibility conditions are there in the if else block, like planned above to keep the compatibility patches as it is if they are already implemented otherwise we will put them in the dedicated compatibility function. 
				-- //done create below functions in that module 
					-- //done 	bind_click -- to d. put comment inside function "it will bind to all kind of such on_click events of pagination, it will be private but it may broadcast notification with a callback which js layers of like tableview and so on can call when they recieve their own click event or they can simply call below on_click function". so it is private function. 
						-- //done 	and from this function call the private click function -- to d 
					-- //done 	on_click -- to d. put comment inside function "listen to all on_click events". so it is public function. 
					-- //done 	click -- to d. put comment inside function "it will internally implement all flows related to pagination link click event". so it is private function. 
						-- //done 	call this function from above on_click -- to d 	
						-- raise on_click notification using notifyAllObservers -- to d 
						-- in init_private function first create the subject for observer pattern also -- to d 
						-- //done  so also create init_private and init(public) function -- to d 
					-- //done 	compatibility -- to d. it is private function. 
					-- //done 	get_page_number -- to d. it is public function. 
					-- //done 	set_page_number -- to d. it is public function. 
						-- raise page_number_udpated notification using notifyAllObservers -- to d 
					-- //done 	on_reset -- to d. it is public function. 
						--	external layers would simply call this function, since observer pattern is not seem necessary here -- to d 
						-- //done 	and from this function call the private reset function -- to d 
					-- //done 	reset -- to d. it is private function. 
						-- raise on_reset notification using notifyAllObservers -- to d 
					tableview and so on would depend on that extended flow of observer pattern where notification will provide a callback, this flow is to be confirmed so either it or something else that is confirmed there on common js variations notes will be used. 
						-- tableview will use it for its flows like binding click event, which is ideal use case of the observer pattern -- to d 
						-- and it will also use it for triggerring the click event, means of its own pagination links dom -- to d 
							-- ACTIVE_TODO but very soon maybe the tableview may not have its own pagination links dom if that is not necessary for it -- to h and -- to d 
						-- and for setting and getting current page_number 
							--	for it may simply need to use the pagination modules published api interface -- to d 
		ACTIVE_TODO_OC_END					
			if(jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination',jQuery(data)).html()!==undefined) {
				if(jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination').length>0){
					jQuery(".woocommerce-pagination,.pagination,jet-filters-pagination").html(jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination',jQuery(data)).html());
				} else {

					@d once all the pagination related layers brought to this function, we need to check if the below incomplete implementation is completely implemented anywhere in our repo -- to d 
						--	if not then test with the elementor created category feed page and also with elementor hello themes custom loop to check if it works. if not then must uncomment the last uncommented line and finish the implementation -- to d or -- to b 
					let product_container = jQuery(".products:eq(0),.product-listing:eq(0),.row-inner>.col-lg-9:eq(0)");
					if(product_container.length<=0) {
						product_container = jQuery(".elementor-products-grid");
						if(product_container.length<=0) {
							product_container = jQuery(".elementor-widget-container").has('[data-elementor-type="loop"]');
							if(product_container.length<=0) {
								product_container = jQuery("[data-widget_type='archive-posts.archive_custom']");						
							}
						}
					}
					//jQuery(product_container).append('<nav class="woocommerce-pagination">'+jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination',jQuery(data)).html()+'</nav>');
				}
			}
			else {
				jQuery(".woocommerce-pagination,.pagination,jet-filters-pagination").html('');	
			}
		/*}*/


		and below one to the hide_loader function -- to d 
		//jQuery("body").fadeTo('fast','1')									
		jQuery("#loading").removeClass('loading');


		ACTIVE_TODO_OC_START
		almost all of the below seems compatibility related to so move that to compatibility function, and at there we need to have section conditon like this would be broadly as product-listing -- to d 
			--	you already moved below code, which I saw, but there is not comment below that it is moved so please let me know what is going on -- to d 
		ACTIVE_TODO_OC_END
		// jQuery('.products:eq(0),.product-listing:eq(0),.row-inner>.col-lg-9:eq(0)').addClass('product_grid_view');
		// //jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.woocommerce-pagination,.pagination').css('visibility','visible');
		// if(jQuery(".row-inner>.col-lg-9").length>0){
		// 	jQuery(".row-inner>.col-lg-9 *").each(function(i,e) {		
		// 	    if(jQuery(e).css('opacity') == '0'){
		// 			jQuery(e).css('opacity','1');        
		// 	    }
		// 	});
		// 	jQuery(".t-entry-visual-overlay").removeClass('t-entry-visual-overlay');
		// 	jQuery(".double-gutter .tmb").css('width','50%');
		// 	jQuery(".double-gutter .tmb").css('display','inline-flex');
		// }
		
		// jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.woocommerce-pagination,.pagination,jet-filters-pagination').css('visibility','visible');

		// // Fix for the yith wishlist.
		// if(typeof(yith_wcwl_l10n)=='object'){
		// 	eowbc_yith_wishlist_fix();
		// }
		// // lazyload
		// if(typeof(LazyLoad)=='function'){
		// 	eowbc_lazyload();
		// }
		compatability('product-listing');

    };

    var show_loader = function(){

    	jQuery("#loading").addClass('loading');	

    	// jQuery("#loading").addClass('loading');					
		//console.log(JSON.stringify(form_data).replace("\\",''));

		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
		// --add to be confirmed & 2187 TO 2324-- 

		// window.eo_wbc_object.enable_filter_table = false;
		// jQuery("#loading").addClass('loading');

		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
		// --add to be confirmed 2601 TO 2705--	

		//////////////////////

		// jQuery("#loading").addClass('loading');	

		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
		// --add to be confirmed 3159 TO 3232--

		// if(eo_wbc_object.hasOwnProperty('xhr')){
		// 	eo_wbc_object.xhr.abort();
		// }
		// eo_wbc_object.xhr = xhr;
		// jQuery("#loading").addClass('loading');	   

		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/template1.js
		// --add to be confirmed 630 TO 734--	

		// if(eo_wbc_object.hasOwnProperty('xhr')){
		// 	eo_wbc_object.xhr.abort();
		// }
		// eo_wbc_object.xhr = xhr;
		// jQuery("#loading").addClass('loading');	

		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/template2.js
		// --add to be confirmed 302 TO 375--	

		// if(eo_wbc_object.hasOwnProperty('xhr')){
		// 	eo_wbc_object.xhr.abort();
		// }
		// eo_wbc_object.xhr = xhr;
		// jQuery("#loading").addClass('loading');

		var show_loader_callback = null ;
        window.document.splugins.events.api.notifyAllObservers( 'filters', 'show_loader', {}, show_loader_callback );

    };

    var hide_loader = function(){

    	jQuery("#loading").removeClass('loading');

    	// jQuery("#loading").removeClass('loading');

    	////////////////////////

    	// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
		// --add to be confirmed & 2187 TO 2324-- 

		// jQuery("#loading").removeClass('loading');
		// console.log('error');
		// console.log(data);
		// window.eo_wbc_object.enable_filter_table = true;

		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
		// --add to be confirmed 2601 TO 2705--	
			    			
		// jQuery("#loading").removeClass('loading');	

		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
		// --add to be confirmed 3159 TO 3232--	

		// jQuery("#loading").removeClass('loading');		

		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/template1.js
		// --add to be confirmed 630 TO 734--    

		// jQuery("#loading").removeClass('loading');	

		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/template2.js
		// --add to be confirmed 302 TO 375--	

		// jQuery("#loading").removeClass('loading');

    }

    var bind_reset_click = function(){

    	jQuery(document).on('click',".reset_all_filters",function(){
        jQuery("[data-reset]").each(function(e){
            eval(jQuery(this).data('reset'));
        })
        // jQuery.fn.eo_wbc_filter_change();
        window.document.splugins.filters.api.eo_wbc_filter_change_wrapper();
        	return false;
		})

		////////////////////////

		jQuery(".eo_wbc_srch_btn:eq(2)").click(function(){					
			///////////////////////////////////////////
			document.forms.eo_wbc_filter.reset();
			jQuery(".eo_wbc_srch_btn:eq(2)").trigger('reset');
			jQuery("#eo_wbc_attr_query").val("");
			jQuery('[name="paged"]').val('1');
			// jQuery.fn.eo_wbc_filter_change(true);
			window.document.splugins.filters.api.eo_wbc_filter_change_wrapper(true);

		});	

    }

    var bind_click = function(){

    	if(!eo_wbc_object.btnfilter_now){			
			jQuery("#eo_wbc_filter").on('change',"input:not(:checkbox)",function(){
				jQuery('[name="paged"]').val('1');
				// jQuery.fn.eo_wbc_filter_change();
				window.document.splugins.filters.api.eo_wbc_filter_change_wrapper();										
			});
		}

    }

    var advance_filter_accordian = function(){

		if(jQuery.fn.hasOwnProperty('accordion') && typeof(jQuery.fn.accordion)==='function'){
			jQuery( ".eo_wbc_advance_filter" ).accordion({
			  collapsible: true,
			  active:false
			});
		}

    } 

    var init_search = function(){

    	// /var/www/html/drashti_project/27-05-2022/woocommerce-bundle-choice/asset/js/publics/eo_wbc_filter.js

    	if(render_container==='') {
			render_container = jQuery(".products:eq(0),.product-listing:eq(0),.row-inner>.col-lg-9:eq(0)");
			if(render_container.length<=0) {
				render_container = jQuery(".elementor-products-grid");
			}
		}

		var init_search_callback = null ;
        window.document.splugins.events.api.notifyAllObservers( 'filters', 'init_search', {}, init_search_callback );

    }
    ///////////////////////////////////////////////////////

 	// ACTIVE_TODO_OC_START
			// what other functions we would like to be here? maybe the functions like before_search, no_products_found, preprocess_data(it may contain some of those render_html layer logic like they are in this file or in that sp_tv_template file), find_container/locate_container/determine_target_container, reset_all_filters(should even create rest_filter and then send to that specific functions like reset_icon, reset_slider and so on? maybe yes), apply_filters and so on
	// ACTIVE_TODO_OC_END 

    //	published public functions 
    return {
		  //   	ACTIVE_TODO_OC_START
		  //   	// below before_search function need to make private done
		  //   		--	however it will continue to broadcast before search notification, and whoever interested in the before_search event should bind to that event notification -- to h and -- to d 
		  //   		--	and there will be one more function like should_search, which will also be private. and that will handle onle the logic of checking flags and so on like the enable_filter_table flag above 
		  //   			-- however above enable_filter_table flag need to be handled through some callback mechanisal as planned and stated above also since it is tableview flow, so it will be from tableview layers only -- to d 
		  //   				--	and for tableview in the first place, if above flag sounds unnecessary and our refactored implementation can do without that then just comment that -- to d 
		  //   			--	and if there are any such other flags that come around then just implement it from above said should_search function -- to d 


		  //   		--	and the whole ajax request layer will be handled by the private instance of the eo_wbc_filter_change_wrapper function -- to h and -- to d 
		  //   			--	and wherever there are layer specific logic like if tableview, diamond quiz and so on have they own additional or identical logic on their layers then cover it through ovserver pattern callback, and maybe for this we can use simple callback but that would make the process lengthy in terms of the additional code that required. but the observer pattern is not seem ideal in terms of the execution sequence that would become complex so simply have the caller pass the applicable callback in the last parameters arg in the below eo_wbc_filter_change_wrapper -- to d 
		  //   				--	and pass that to till all applicable functions and layers in this module, and if that become overwhelming process then can matainn the last parameters var in the this object stat but that would be not so standard flow in terms of the stat management especially while this wrapper function is supposed to one way function that can be called any number of times by any layers. so simply need to pass the parameters var everywhere in all function and layers that are called within the module. -- to d 
		  //   				--	so now the above tableview flag namely the enable_filter_table will also be handled by such callbacks provided from their calling layer, so now handle that accordingly -- to d 

		  //   		--	and below public wrapper function namely eo_wbc_filter_change_wrapper will call functios like should_search, before_search and then at delegate the rest to eo_wbc_filter_change_wrapper_private function -- to d 
		  //   			--	and so should_search function call will be inside if condition and would cancel the entire function call if that returned false -- to d 
		  //   				--	and that function would in its implementation would be calling the callbacks using if condition like above and return false if the should_search callback provided by tableview returns false -- to d 

		  //   		--	and the before_search will set flags like enable_filter_table(now the name should be changed, but to maintain trace to older var names need to keep the old flga names commented right above it) and it should not be by the should_search function 
		  //   			--	find all traces of enable_filter_table flag and show it to me, and now as planned it will be handled only on the tableview layers and will not be set in before_search like said above so need to confirm all its traces -- to d 

		  //   		--	and then refactor and implement the eo_wbc_filter_change function instance of this file itself at bottom 
		  //   				--	just move all the different sections to their applicable functions, like you did moved all instances of the function eo_wbc_filter_change below and then moved their sections to their applicable functions above -- to d. do it like we did atleast some moving for the prepare_query_data function, so  first cover the one point below related to prepare_query_data,.  
		  //   				--	and same for all the other instances that you already moved below, so from there move it to their respective functions, like we did above -- to d 
		  //   			-- and then need to focus on loading stack that starts maybe from the load or ready event at the bottom of this file 

		  //   	regarding events 
		  //   		--	the variations module would like bind to the render event of the filtrs, which would be broadcasted from the render_html function 
		  //   			--	so that on each render event, variations module could take care the ops related to variations swatches and gallery changes/modification that is required on each render event -- means simply the loopbox refresh will be required 
			// ACTIVE_TODO_OC_END 	

    	init: function() {

			//	NOTE: this function is supposed to be called by parent init layers or simply the init layers of the system so that if there are any filters js module init related ops then they are covered. and it is not related the filter_change(means search event) event but it is about initializing search filter module related ops. so yeah maybe any required core binding, event binding and so on can be invoked from this function. 


    		init_private();	
    	}, 		
		eo_wbc_filter_change_wrapper: function(init_call=false,form_selector="form#eo_wbc_filter,form[id*='eo_wbc_filter']",render_container='.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products',parameters={}) {
			// //	this eo_wbc_filter.js 
			// jQuery.fn.eo_wbc_filter_change_native= function(init_call=false,form_selector="form#eo_wbc_filter",render_container='',parameters={}) {

			// // /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
			// jQuery.fn.eo_wbc_filter_change=function(init_call=false,form_selector="form[id*='eo_wbc_filter']",render_container='.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products') 

			// // /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
			// 					jQuery.fn.eo_wbc_filter_change=function(init_call=false) 

			// // /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
			// 				jQuery.fn.eo_wbc_filter_change=function(init_call=false) 

			// // /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/template1.js
			// 		jQuery.fn.eo_wbc_filter_change=function(init_call=false) 

			// // /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/template2.js
			// 	jQuery.fn.eo_wbc_filter_change=function(init_call=false)

			// make sure that any js layers of wbc or any extensions which is calling the eo_wbc_filter_change function should call this function of this filters module -- to d done

			ACTIVE_TODO_OC_START
				--	above is done basically but yet to confirm the basic syntax there -- to h and -- to d.
					--	first confirm with me calls from wbc and tableview -- to d 
					--	and then at you your own self be sure to do confirm with me for the rest of the extensions -- to d 

			and this function will simply call the private wrapper function eo_wbc_filter_change_wrapper_private -- to d 
			ACTIVE_TODO_OC_END

			eo_wbc_filter_change_wrapper_private();

			// prepare_query_data 	
				// var form=jQuery(form_selector);

				// if(form.find('[name="html_destination"]').length>0) {

				// 	render_container = form.find('[name="html_destination"]').val();
				// }


				// if(form.find('[name="filter_native"]').length>0) {
				// 	jQuery.fn.eo_wbc_filter_change_native(init_call,form_selector,render_container);
				// 	return true;
				// }

			// prepare_query_data();

			ACTIVE_TODO_OC_START							
			--	above call is okay but move it to private wrapper above and also the if statement above it but make that commented -- to d 
			ACTIVE_TODO_OC_END
			

			// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/template1.js
			//////// 27-05-2022 - @drashti /////////
			// --add to be confirmed 630 TO 734--

			// if(!init_call){
			// 	jQuery(".reset_all_filters.mobile_2").removeClass('mobile_2_hidden');
			// }	

			// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
			//////// 27-05-2022 - @drashti /////////
			// --add to be confirmed 2601 TO 2705--

			if(!init_call){
				jQuery(".reset_all_filters.mobile_2").removeClass('mobile_2_hidden');
			}


			// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js

			//////// 27-05-2022 - @drashti /////////
			// --add to be confirmed & 2187 TO 2324--


			// if(!init_call){
			// 	jQuery(".reset_all_filters.mobile_2").removeClass('mobile_2_hidden');
			// }



		}, 
	        // createSubject: function( feature_unique_key, notifications ) {
	        //     // console.log("Observer " + index + " is notified!");

	        //     // TODO check if subject already created and exist then throw error
	        //     // var index = this.observers.indexOf(observer);
	        //     // if(index > -1) {
	        //     // this.observers.splice(index, 1);
	        //     // }

	        //     this.subjects.push( window.document.splugins.Feed.events.subject( feature_unique_key, notifications ) );
	        // }, 
	        // subscribeObserver: function(feature_unique_key, callbacks) {
	        //     // console.log("Observer " + index + " is notified!");

	        //     // before subscribing the ovserver check if the feature_unique_key subject is created in the first place, if not then throw error 
	        //     var found_index = null;
	        //     for(var i = 0; i < this.subjects.length; i++){
	        //         if( this.subjects[i].feature_unique_key() == feature_unique_key ) {

	        //             found_index = i;
	        //             break;
	        //         }
	        //     }

	        //     if( found_index == -1 ) {

	        //         throw "There is no subject exist for specified feature_unique_key "+feature_unique_key;
	        //     } else {

	        //         this.subjects[found_index].subscribeObserver( window.document.splugins.Feed.events.observer( callbacks ) );
	        //     }
	        // },
        no_products_found: function() {

        	// ACTIVE_TODO_OC_START
        	// create private counter part of the no_products_found function with name no_products_found_private, so that the inner private layers can call that internally -- to d 
        	// 	--	and move below code there and from here just call that private fucntion -- to d 
        	// ACTIVE_TODO_OC_END	

			// window.document.splugins.Feed.events.core.notifyAllObservers( 'filters', 'no_products_found' );
			window.document.splugins.events.api.notifyAllObservers( 'filters', 'no_products_found' );

        }, 

    } 
}

//  publish it 
window.document.splugins.wbc.filters.api = window.document.splugins.wbc.filters.core( {} );

// the pagination js module
window.document.splugins.wbc.pagination = window.document.splugins.wbc.pagination || {};

window.document.splugins.wbc.pagination.core = function( configs ) {

    var _this = this; 

	_this.configs = jQuery.extend({}, {}/*default configs*/, configs);	

	var init_private = function() {

		/////////////////shraddha///////////////
		bind_click();
		/////////////////////////////////////////
	};

	var bind_click = function(){

		ACTIVE_TODO_OC_START
		NOTE : it will bind to all kind of such on_click events of pagination, it will be private but it may broadcast notification with a callback which js layers of like tableview and so on can call when they recieve their own click event or they can simply call below on_click function". so it is private function.
		ACTIVE_TODO_OC_END
    	
		jQuery('body').on('click','.navigation .page-numbers,.woocommerce-pagination a.page-numbers',function(e){
			e.preventDefault();
			e.stopPropagation();
			
			jQuery('[name="paged"]').val(parseInt(jQuery(this).text().replace(',','')));		
			// jQuery.fn.eo_wbc_filter_change(false,'form#'+jQuery(this).parents().has('[id$="eo_wbc_filter"]').find('[id$="eo_wbc_filter"]').attr('id'));
			window.document.splugins.filters.api.eo_wbc_filter_change_wrapper(false,'form#'+jQuery(this).parents().has('[id$="eo_wbc_filter"]').find('[id$="eo_wbc_filter"]').attr('id'));
		});

		jQuery("body").on('click','.woocommerce-pagination a,.pagination a,.jet-filters-pagination a,.woocommerce-pagination .jet-filters-pagination__link,.pagination .jet-filters-pagination__link,.jet-filters-pagination .jet-filters-pagination__link',function(event){
			
			event.preventDefault();
			event.stopPropagation();								
			
			// ACTIVE_TODO page nnumber text would break below with multilanguage so instead use the data attribute to store and read the page number -- to a and/or -- to h
			if(jQuery(this).hasClass("next") || jQuery(this).hasClass("prev")){
			
				if(jQuery(this).hasClass("next")){
					jQuery("[name='paged']").val(parseInt(jQuery(".page-numbers.current").text())+1);
				}
				if(jQuery(this).hasClass("prev")){
					jQuery("[name='paged']").val(parseInt(jQuery(".page-numbers.current").text())-1);
				}	
			}		
			else {
				jQuery("[name='paged']").val(jQuery(this).text());
			}		

			// jQuery.fn.eo_wbc_filter_change(false,'form#'+jQuery(this).parents().has('[id$="eo_wbc_filter"]').find('[id$="eo_wbc_filter"]').attr('id'));
			window.document.splugins.filters.api.eo_wbc_filter_change_wrapper(false,'form#'+jQuery(this).parents().has('[id$="eo_wbc_filter"]').find('[id$="eo_wbc_filter"]').attr('id'));
		});

		click();

	};

    var click = function(){

  		//ACTIVE_TODO_OC_START
		// NOTE : it will internally implement all flows related to pagination link click event
		// ACTIVE_TODO_OC_END

    };

    var compatability = function(section, object, expected_result){
        
    };

    var reset = function(){

    };
	
	return {
		
		init: function() {

			init_private();	
		},

		on_click: function() {

			// ACTIVE_TODO_OC_START
			// NOTE : listen to all on_click events
			// ACTIVE_TODO_OC_END

			click();

		},

		get_page_number: function() {

		},

		set_page_number: function() {

		},

		on_reset: function() {

			reset();

		}

	};

};

//  publish it 
window.document.splugins.pagination.api = window.document.splugins.pagination.core( {}/*if required then the php layer configs can be set here by using the js vars defined from the php layer*/ );

ACTIVE_TODO_OC_START
now this state mantaining flow should be inside its own module so inside the filters module above, but does it mean that we will stop keeping it direcly under the window object or we will keep it but start using the filters module stat everywhere and once everything sound stable then comment out below? 
	--	maybe later is the right idea but the point is that if at some places the calls are still going to below stat vars instead of the modules stat then js layer may not show sign but if comment it now then it will crash and that is enough for us to know. but yeah the fact is also that for sometime some js layers are going to be used un-refactored they will depending on below stat vars so we need keep it as per the former option. 
	--	anyway create the stat vars inside the filters module and set it there also from underneath below statements -- to d 
ACTIVE_TODO_OC_END

/*<<<<<<< HEAD*/
/*window.eo_wbc_object = window.eo_wbc_object || {};
window.eo_wbc_object.enable_filter = window.eo_wbc_object.enable_filter || false;*/
/*=======*/
window.eo_wbc_object = window.eo_wbc_object || {};
window.eo_wbc_object.enable_filter = window.eo_wbc_object.enable_filter || false;
/*>>>>>>> dad35916d59c134734156ded85678133f6c607a0*/

// mostly we are not going to do with below fix function flows and how we manage it. but should we need to do anything with it as of now?  
// 	--	NO. but yeah better if we move it inside the compatibility private function or in compatibility layer within the filters core js module. and also check if we can put a single line or few line fix instead of putting the long script like below that would be possible by reusing their script and API instead of adding entire script like below. ACTIVE_TODO 
// YITH wishlist fix
function eowbc_yith_wishlist_fix(){
	jQuery(document).ready((function(t){function i(){void 0!==t.fn.selectBox&&t("select.selectBox").filter(":visible").not(".enhanced").selectBox().addClass("enhanced")}function e(){if(void 0!==t.prettyPhoto){var e={hook:"data-rel",social_tools:!1,theme:"pp_woocommerce",horizontal_padding:20,opacity:.8,deeplinking:!1,overlay_gallery:!1,default_width:500,changepicturecallback:function(){i(),t(".wishlist-select").filter(":visible").change(),t(document).trigger("yith_wcwl_popup_opened",[this])},markup:'<div class="pp_pic_holder"><div class="ppt">&nbsp;</div><div class="pp_top"><div class="pp_left"></div><div class="pp_middle"></div><div class="pp_right"></div></div><div class="pp_content_container"><div class="pp_left"><div class="pp_right"><div class="pp_content"><div class="pp_loaderIcon"></div><div class="pp_fade"><a href="#" class="pp_expand" title="Expand the image">Expand</a><div class="pp_hoverContainer"><a class="pp_next" href="#">next</a><a class="pp_previous" href="#">previous</a></div><div id="pp_full_res"></div><div class="pp_details"><a class="pp_close" href="#">Close</a></div></div></div></div></div></div><div class="pp_bottom"><div class="pp_left"></div><div class="pp_middle"></div><div class="pp_right"></div></div></div><div class="pp_overlay yith-wcwl-overlay"></div>'};t('a[data-rel^="prettyPhoto[add_to_wishlist_"]').add('a[data-rel="prettyPhoto[ask_an_estimate]"]').add('a[data-rel="prettyPhoto[create_wishlist]"]').unbind("click").prettyPhoto(e),t('a[data-rel="prettyPhoto[move_to_another_wishlist]"]').on("click",(function(){var i=t(this),e=t("#move_to_another_wishlist").find("form"),a=e.find(".row-id"),o=i.closest("[data-row-id]").data("row-id");a.length&&a.remove(),e.append('<input type="hidden" name="row_id" class="row-id" value="'+o+'"/>')})).prettyPhoto(e);var a=function(i,e){if(void 0!==i.classList&&i.classList.contains("yith-wcwl-overlay")){var a="remove"===e?"removeClass":"addClass";t("body")[a]("yith-wcwl-with-pretty-photo")}},o=function(t){a(t,"add")},n=function(t){a(t,"remove")};new MutationObserver((function(t){for(var i in t){var e=t[i];"childList"===e.type&&(void 0!==e.addedNodes&&e.addedNodes.forEach(o),void 0!==e.removedNodes&&e.removedNodes.forEach(n))}})).observe(document.body,{childList:!0})}}function a(){t(".wishlist_table").find('.product-checkbox input[type="checkbox"]').off("change").on("change",(function(){var i=t(this);i.parent().removeClass("checked").removeClass("unchecked").addClass(i.is(":checked")?"checked":"unchecked")})).trigger("change")}function o(){t(".add_to_cart").filter("[data-icon]").not(".icon-added").each((function(){var i,e=t(this),a=e.data("icon");i=a.match(/[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi)?t("<img/>",{src:a}):t("<i/>",{class:"fa "+a}),e.prepend(i).addClass("icon-added")}))}function n(){i(),e(),a(),o(),l(),s(),_(),d(),c(),r(),t(document).trigger("yith_wcwl_init_after_ajax")}function s(){yith_wcwl_l10n.enable_tooltip&&t(".yith-wcwl-add-to-wishlist").find("[data-title]").each((function(){var i=t(this);i.hasClass("tooltip-added")||(i.on("mouseenter",(function(){var i,e=t(this),a=null,o=e.outerWidth(),n=0;a=t("<span>",{class:"yith-wcwl-tooltip",text:e.data("title")}),e.append(a),i=a.outerWidth()+6,a.outerWidth(i),n=(o-i)/2,a.css({left:n.toFixed(0)+"px"}).fadeIn(200),e.addClass("with-tooltip")})).on("mouseleave",(function(){var i=t(this);i.find(".yith-wcwl-tooltip").fadeOut(200,(function(){i.removeClass("with-tooltip").find(".yith-wcwl-tooltip").remove()}))})),i.addClass("tooltip-added"))}))}function l(){t(".yith-wcwl-add-button").filter(".with-dropdown").on("mouseleave",(function(){var i=t(this).find(".yith-wcwl-dropdown");i.length&&i.fadeOut(200)})).children("a").on("mouseenter",(function(){var i=t(this).closest(".with-dropdown"),e=i.find(".yith-wcwl-dropdown");e.length&&e.children().length&&i.find(".yith-wcwl-dropdown").fadeIn(200)}))}function d(){void 0!==yith_wcwl_l10n.enable_drag_n_drop&&yith_wcwl_l10n.enable_drag_n_drop&&t(".wishlist_table").filter(".sortable").not(".no-interactions").each((function(){var i=t(this),e=!1;i.sortable({items:"[data-row-id]",scroll:!0,helper:function(i,e){return e.children().each((function(){t(this).width(t(this).width())})),e},update:function(){var a=i.find("[data-row-id]"),o=[],n=0;a.length&&(e&&e.abort(),a.each((function(){var i=t(this);i.find('input[name*="[position]"]').val(n++),o.push(i.data("row-id"))})),e=t.ajax({data:{action:yith_wcwl_l10n.actions.sort_wishlist_items,positions:o,wishlist_token:i.data("token"),page:i.data("page"),per_page:i.data("per-page")},method:"POST",url:yith_wcwl_l10n.ajax_url}))}})}))}function c(){var i,e;t(".wishlist_table").on("change",".product-quantity input",(function(){var a=t(this),o=a.closest("[data-row-id]"),n=o.data("row-id"),s=a.closest(".wishlist_table"),l=s.data("token");clearTimeout(e),o.find(".add_to_cart").attr("data-quantity",a.val()),e=setTimeout((function(){i&&i.abort(),i=t.ajax({beforeSend:function(){b(s)},complete:function(){k(s)},data:{product_id:n,wishlist_token:l,quantity:a.val(),action:yith_wcwl_l10n.actions.update_item_quantity},method:"POST",url:yith_wcwl_l10n.ajax_url})}),1e3)}))}function r(){t(".copy-trigger").on("click",(function(){var i=t(".copy-target");if(i.length>0)if(i.is("input"))S()?i[0].setSelectionRange(0,9999):i.select(),document.execCommand("copy");else{var e=t("<input/>",{val:i.text(),type:"text"});t("body").append(e),S()?e[0].setSelectionRange(0,9999):e.select(),document.execCommand("copy"),e.remove()}}))}function _(){t(".wishlist_table").filter(".images_grid").not(".enhanced").on("click","[data-row-id] .product-thumbnail a",(function(i){var e=t(this).closest("[data-row-id]"),a=e.siblings("[data-row-id]"),o=e.find(".item-details");i.preventDefault(),o.length&&(a.removeClass("show"),e.toggleClass("show"))})).on("click","[data-row-id] a.close",(function(i){var e=t(this).closest("[data-row-id]"),a=e.find(".item-details");i.preventDefault(),a.length&&e.removeClass("show")})).on("click","[data-row-id] a.remove_from_wishlist",(function(i){var e=t(this);return i.stopPropagation(),w(e),!1})).addClass("enhanced"),t(document).on("click",(function(i){t(i.target).closest("[data-row-id]").length||t(".wishlist_table").filter(".images_grid").find(".show").removeClass("show")})).on("added_to_cart",(function(){t(".wishlist_table").filter(".images_grid").find(".show").removeClass("show")}))}function h(i,e,a){i.action=yith_wcwl_l10n.actions.move_to_another_wishlist_action,""!==i.wishlist_token&&""!==i.destination_wishlist_token&&""!==i.item_id&&t.ajax({beforeSend:e,url:yith_wcwl_l10n.ajax_url,data:i,dataType:"json",method:"post",success:function(e){a(e),n(),t("body").trigger("moved_to_another_wishlist",[t(this),i.item_id])}})}function w(i){var e=i.parents(".cart.wishlist_table"),a=i.parents("[data-row-id]"),o=a.data("row-id"),s=e.data("id"),l=e.data("token"),d={action:yith_wcwl_l10n.actions.remove_from_wishlist_action,remove_from_wishlist:o,wishlist_id:s,wishlist_token:l,fragments:j(o)};t.ajax({beforeSend:function(){b(e)},complete:function(){k(e)},data:d,method:"post",success:function(e){void 0!==e.fragments&&T(e.fragments),n(),t("body").trigger("removed_from_wishlist",[i,a])},url:yith_wcwl_l10n.ajax_url})}function f(i){var e=t(this),a=e.closest(".wishlist_table"),o=null;i.preventDefault(),(o=a.length?e.closest("[data-wishlist-id]").find(".wishlist-title"):e.parents(".wishlist-title")).next().show().find('input[type="text"]').focus(),o.hide()}function p(i){var e=t(this);i.preventDefault(),e.parents(".hidden-title-form").hide(),e.parents(".hidden-title-form").prev().show()}function u(i){var e,a=t(this),o=a.closest(".hidden-title-form"),n=a.closest("[data-wishlist-id]").data("wishlist-id"),s=o.find('input[type="text"]'),l=s.val();if(i.preventDefault(),!l)return o.addClass("woocommerce-invalid"),void s.focus();e={action:yith_wcwl_l10n.actions.save_title_action,wishlist_id:n,title:l,fragments:j()},t.ajax({type:"POST",url:yith_wcwl_l10n.ajax_url,data:e,dataType:"json",beforeSend:function(){b(o)},complete:function(){k(o)},success:function(t){var i=t.fragments;t.result?(o.hide(),o.prev().find(".wishlist-anchor").text(l).end().show()):(o.addClass("woocommerce-invalid"),s.focus()),void 0!==i&&T(i)}})}function m(){var i=t(this),e=i.val(),a=i.closest("[data-wishlist-id]").data("wishlist-id"),o={action:yith_wcwl_l10n.actions.save_privacy_action,wishlist_id:a,privacy:e,fragments:j()};t.ajax({type:"POST",url:yith_wcwl_l10n.ajax_url,data:o,dataType:"json",success:function(t){var i=t.fragments;void 0!==i&&T(i)}})}function v(i){if(void 0!==t.prettyPhoto&&void 0!==t.prettyPhoto.close)if(void 0!==i){var e=t(".pp_content_container"),a=e.find(".pp_content"),o=e.find(".yith-wcwl-popup-form"),n=o.closest(".pp_pic_holder");if(o.length){var s=t("<div/>",{class:"yith-wcwl-popup-feedback"});s.append(t("<i/>",{class:"fa fa-check heading-icon"})),s.append(t("<p/>",{class:"feedback",html:i})),s.css("display","none"),a.css("height","auto"),o.after(s),o.fadeOut(200,(function(){s.fadeIn()})),n.addClass("feedback"),n.css("left",t(window).innerWidth()/2-n.outerWidth()/2+"px"),(void 0===yith_wcwl_l10n.auto_close_popup||yith_wcwl_l10n.auto_close_popup)&&setTimeout(v,yith_wcwl_l10n.popup_timeout)}}else try{t.prettyPhoto.close()}catch(t){}}function g(i){var e=t("#yith-wcwl-popup-message"),a=t("#yith-wcwl-message"),o=void 0!==yith_wcwl_l10n.popup_timeout?yith_wcwl_l10n.popup_timeout:3e3;(void 0===yith_wcwl_l10n.enable_notices||yith_wcwl_l10n.enable_notices)&&(a.html(i),e.css("margin-left","-"+t(e).width()+"px").fadeIn(),window.setTimeout((function(){e.fadeOut()}),o))}function y(i){var e=t("select.wishlist-select"),a=t("ul.yith-wcwl-dropdown");e.each((function(){var e=t(this),a=e.find("option"),o=a.filter('[value="new"]');a.not(o).remove(),t.each(i,(function(i,a){t("<option>",{value:a.id,html:a.wishlist_name}).appendTo(e)})),e.append(o)})),a.each((function(){var e=t(this),a=e.find("li"),o=e.closest(".yith-wcwl-add-button").children("a.add_to_wishlist"),n=o.attr("data-product-id"),s=o.attr("data-product-type");a.remove(),t.each(i,(function(i,a){a.default||t("<li>").append(t("<a>",{rel:"nofollow",html:a.wishlist_name,class:"add_to_wishlist",href:a.add_to_this_wishlist_url,"data-product-id":n,"data-product-type":s,"data-wishlist-id":a.id})).appendTo(e)}))}))}function b(i){void 0!==t.fn.block&&i.fadeTo("400","0.6").block({message:null,overlayCSS:{background:"transparent url("+yith_wcwl_l10n.ajax_loader_url+") no-repeat center",backgroundSize:"40px 40px",opacity:1}})}function k(i){void 0!==t.fn.unblock&&i.stop(!0).css("opacity","1").unblock()}function x(){if(navigator.cookieEnabled)return!0;document.cookie="cookietest=1";var t=-1!==document.cookie.indexOf("cookietest=");return document.cookie="cookietest=1; expires=Thu, 01-Jan-1970 00:00:01 GMT",t}function j(i){var e={},a=null;return i?"object"==typeof i?(a=(i=t.extend({fragments:null,s:"",container:t(document),firstLoad:!1},i)).fragments?i.fragments:i.container.find(".wishlist-fragment"),i.s&&(a=a.not("[data-fragment-ref]").add(a.filter('[data-fragment-ref="'+i.s+'"]'))),i.firstLoad&&(a=a.filter(".on-first-load"))):(a=t(".wishlist-fragment"),"string"!=typeof i&&"number"!=typeof i||(a=a.not("[data-fragment-ref]").add(a.filter('[data-fragment-ref="'+i+'"]')))):a=t(".wishlist-fragment"),a.each((function(){var i=t(this),a=i.attr("class").split(" ").filter(t=>t.length&&"exists"!==t).join(yith_wcwl_l10n.fragments_index_glue);e[a]=i.data("fragment-options")})),e}function C(i){if(yith_wcwl_l10n.enable_ajax_loading){var e=j(i=t.extend({firstLoad:!0},i));e&&t.ajax({data:{action:yith_wcwl_l10n.actions.load_fragments,fragments:e},method:"post",success:function(a){void 0!==a.fragments&&(T(a.fragments),n(),t(document).trigger("yith_wcwl_fragments_loaded",[e,a.fragments,i.firstLoad]))},url:yith_wcwl_l10n.ajax_url})}}function T(i){t.each(i,(function(i,e){var a="."+i.split(yith_wcwl_l10n.fragments_index_glue).filter(t=>t.length&&"exists"!==t).join("."),o=t(a),n=t(e).filter(a);n.length||(n=t(e).find(a)),o.length&&n.length&&o.replaceWith(n)}))}function S(){return navigator.userAgent.match(/ipad|iphone/i)}t(document).on("yith_wcwl_init",(function(){var S=t(this),P="undefined"!=typeof wc_add_to_cart_params&&null!==wc_add_to_cart_params?wc_add_to_cart_params.cart_redirect_after_add:"";S.on("click",".add_to_wishlist",(function(i){var e,a=t(this),o=a.attr("data-product-id"),s=t(".add-to-wishlist-"+o),l={add_to_wishlist:o,product_type:a.data("product-type"),wishlist_id:a.data("wishlist-id"),action:yith_wcwl_l10n.actions.add_to_wishlist_action,fragments:j(o)};if((e=t(document).triggerHandler("yith_wcwl_add_to_wishlist_data",[a,l]))&&(l=e),i.preventDefault(),jQuery(document.body).trigger("adding_to_wishlist"),yith_wcwl_l10n.multi_wishlist&&yith_wcwl_l10n.modal_enable){var d=a.parents(".yith-wcwl-popup-footer").prev(".yith-wcwl-popup-content"),c=d.find(".wishlist-select"),r=d.find(".wishlist-name"),_=d.find(".wishlist-visibility").filter(":checked");if(l.wishlist_id=c.is(":visible")?c.val():"new",l.wishlist_name=r.val(),l.wishlist_visibility=_.val(),"new"===l.wishlist_id&&!l.wishlist_name)return r.closest("p").addClass("woocommerce-invalid"),!1;r.closest("p").removeClass("woocommerce-invalid")}if(x())return t.ajax({type:"POST",url:yith_wcwl_l10n.ajax_url,data:l,dataType:"json",beforeSend:function(){b(a)},complete:function(){k(a)},success:function(i){var e=i.result,o=i.message;yith_wcwl_l10n.multi_wishlist?(v(o),void 0!==i.user_wishlists&&y(i.user_wishlists)):g(o),"true"!==e&&"exists"!==e||(void 0!==i.fragments&&T(i.fragments),yith_wcwl_l10n.multi_wishlist&&!yith_wcwl_l10n.hide_add_button||s.find(".yith-wcwl-add-button").remove(),s.addClass("exists")),n(),t("body").trigger("added_to_wishlist",[a,s])}}),!1;window.alert(yith_wcwl_l10n.labels.cookie_disabled)})),S.on("click",".wishlist_table .remove_from_wishlist",(function(i){var e=t(this);return i.preventDefault(),w(e),!1})),S.on("adding_to_cart","body",(function(t,i,e){void 0!==i&&void 0!==e&&i.closest(".wishlist_table").length&&(e.remove_from_wishlist_after_add_to_cart=i.closest("[data-row-id]").data("row-id"),e.wishlist_id=i.closest(".wishlist_table").data("id"),"undefined"!=typeof wc_add_to_cart_params&&(wc_add_to_cart_params.cart_redirect_after_add=yith_wcwl_l10n.redirect_to_cart),"undefined"!=typeof yith_wccl_general&&(yith_wccl_general.cart_redirect=yith_wcwl_l10n.redirect_to_cart))})),S.on("added_to_cart","body",(function(t,i,e,a){if(void 0!==a&&a.closest(".wishlist_table").length){"undefined"!=typeof wc_add_to_cart_params&&(wc_add_to_cart_params.cart_redirect_after_add=P),"undefined"!=typeof yith_wccl_general&&(yith_wccl_general.cart_redirect=P);var o=a.closest("[data-row-id]"),n=o.closest(".wishlist-fragment").data("fragment-options");a.removeClass("added"),o.find(".added_to_cart").remove(),yith_wcwl_l10n.remove_from_wishlist_after_add_to_cart&&n.is_user_owner&&o.remove()}})),S.on("added_to_cart","body",(function(){var i=t(".woocommerce-message");0===i.length?t("#yith-wcwl-form").prepend(yith_wcwl_l10n.labels.added_to_cart_message):i.fadeOut(300,(function(){t(this).replaceWith(yith_wcwl_l10n.labels.added_to_cart_message).fadeIn()}))})),S.on("cart_page_refreshed","body",n),S.on("click",".show-title-form",f),S.on("click",".wishlist-title-with-form h2",f),S.on("click",".remove_from_all_wishlists",(function(i){var e=t(this),a=e.attr("data-product-id"),o=e.data("wishlist-id"),s=e.closest(".content"),l={action:yith_wcwl_l10n.actions.remove_from_all_wishlists,prod_id:a,wishlist_id:o,fragments:j(a)};i.preventDefault(),t.ajax({beforeSend:function(){b(s)},complete:function(){k(s)},data:l,dataType:"json",method:"post",success:function(t){void 0!==t.fragments&&T(t.fragments),n()},url:yith_wcwl_l10n.ajax_url})})),S.on("click",".hide-title-form",p),S.on("click",".save-title-form",u),S.on("change",".wishlist_manage_table .wishlist-visibility",m),S.on("change",".change-wishlist",(function(){var i=t(this),e=i.parents(".cart.wishlist_table"),a=e.data("token"),o=i.parents("[data-row-id]").data("row-id");h({wishlist_token:a,destination_wishlist_token:i.val(),item_id:o,fragments:j()},(function(){b(e)}),(function(t){void 0!==t.fragments&&T(t.fragments),k(e)}))})),S.on("click",".yith-wcwl-popup-footer .move_to_wishlist",(function(){var i=t(this),e=i.attr("data-product-id"),a=i.data("origin-wishlist-id"),o=i.closest("form"),s=o.find(".wishlist-select").val(),l=o.find(".wishlist-name"),d=l.val(),c=o.find(".wishlist-visibility").filter(":checked").val();if("new"===s&&!d)return l.closest("p").addClass("woocommerce-invalid"),!1;l.closest("p").removeClass("woocommerce-invalid"),h({wishlist_token:a,destination_wishlist_token:s,item_id:e,wishlist_name:d,wishlist_visibility:c,fragments:j(e)},(function(){b(i)}),(function(t){var e=t.message;yith_wcwl_l10n.multi_wishlist?(v(e),void 0!==t.user_wishlists&&y(t.user_wishlists)):g(e),void 0!==t.fragments&&T(t.fragments),n(),k(i)}))})),S.on("click",".delete_item",(function(){var i=t(this),e=i.attr("data-product-id"),a=i.data("item-id"),o=t(".add-to-wishlist-"+e);return t.ajax({url:yith_wcwl_l10n.ajax_url,data:{action:yith_wcwl_l10n.actions.delete_item_action,item_id:a,fragments:j(e)},dataType:"json",beforeSend:function(){b(i)},complete:function(){k(i)},method:"post",success:function(e){var a=e.fragments,s=e.message;yith_wcwl_l10n.multi_wishlist&&v(s),i.closest(".yith-wcwl-remove-button").length||g(s),void 0!==a&&T(a),n(),t("body").trigger("removed_from_wishlist",[i,o])}}),!1})),S.on("change",".yith-wcwl-popup-content .wishlist-select",(function(){var i=t(this);"new"===i.val()?i.parents(".yith-wcwl-first-row").next(".yith-wcwl-second-row").show():i.parents(".yith-wcwl-first-row").next(".yith-wcwl-second-row").hide()})),S.on("change","#bulk_add_to_cart",(function(){var i=t(this),e=i.closest(".wishlist_table").find("[data-row-id]").find('input[type="checkbox"]:not(:disabled)');i.is(":checked")?e.attr("checked","checked").change():e.removeAttr("checked").change()})),S.on("submit",".wishlist-ask-an-estimate-popup",(function(){var i=t(this),e=i.closest("form"),a=i.closest(".pp_content"),o=e.serialize();return t.ajax({beforeSend:function(){b(e)},complete:function(){k(e)},data:o+"&action="+yith_wcwl_l10n.actions.ask_an_estimate,dataType:"json",method:"post",success:function(i){if(void 0!==i.result&&i.result){var o=i.template;void 0!==o&&(e.replaceWith(o),a.css("height","auto"),setTimeout(v,yith_wcwl_l10n.time_to_close_prettyphoto))}else void 0!==i.message&&(e.find(".woocommerce-error").remove(),e.find(".popup-description").after(t("<div>",{text:i.message,class:"woocommerce-error"})))},url:yith_wcwl_l10n.ajax_url}),!1})),S.on("click",".yith-wfbt-add-wishlist",(function(i){i.preventDefault();var e=t(this),a=t("#yith-wcwl-form");t("html, body").animate({scrollTop:a.offset().top},500),function(i,e){var a=i.attr("data-product-id"),o=t(document).find(".cart.wishlist_table"),s=o.data("pagination"),l=o.data("per-page"),d=o.data("id"),c=o.data("token"),r={action:yith_wcwl_l10n.actions.reload_wishlist_and_adding_elem_action,pagination:s,per_page:l,wishlist_id:d,wishlist_token:c,add_to_wishlist:a,context:"frontend",product_type:i.data("product-type")};if(!x())return void window.alert(yith_wcwl_l10n.labels.cookie_disabled);t.ajax({type:"POST",url:yith_wcwl_l10n.ajax_url,data:r,dataType:"html",beforeSend:function(){b(o)},complete:function(){k(o)},success:function(i){var a=t(i),o=a.find("#yith-wcwl-form"),s=a.find(".yith-wfbt-slider-wrapper");e.replaceWith(o),t(".yith-wfbt-slider-wrapper").replaceWith(s),n(),t(document).trigger("yith_wcwl_reload_wishlist_from_frequently")}})}(e,a)})),S.on("submit",".yith-wcwl-popup-form",(function(){return!1})),S.on("yith_infs_added_elem",(function(){e()})),S.on("found_variation",(function(i,e){var a=t(i.target).data("product_id"),o=e.variation_id,n=t('[data-product-id="'+a+'"]').add('[data-original-product-id="'+a+'"]'),s=n.closest(".wishlist-fragment");a&&o&&n.length&&(n.each((function(){var i,e=t(this),n=e.closest(".yith-wcwl-add-to-wishlist");e.attr("data-original-product-id",a),e.attr("data-product-id",o),n.length&&(void 0!==(i=n.data("fragment-options"))&&(i.product_id=o,n.data("fragment-options",i)),n.removeClass((function(t,i){return i.match(/add-to-wishlist-\S+/g).join(" ")})).addClass("add-to-wishlist-"+o).attr("data-fragment-ref",o))})),b(s),C({fragments:s,firstLoad:!1}))})),S.on("reset_data",(function(i){var e=t(i.target).data("product_id"),a=t('[data-original-product-id="'+e+'"]'),o=a.closest(".wishlist-fragment");e&&a.length&&(a.each((function(){var i,a=t(this),o=a.closest(".yith-wcwl-add-to-wishlist"),n=a.attr("data-product-id");a.attr("data-product-id",e),a.attr("data-original-product-id",""),o.length&&(void 0!==(i=o.data("fragment-options"))&&(i.product_id=e,o.data("fragment-options",i)),o.removeClass("add-to-wishlist-"+n).addClass("add-to-wishlist-"+e).attr("data-fragment-ref",e))})),b(o),C({fragments:o,firstLoad:!1}))})),S.on("yith_wcwl_reload_fragments",C),S.on("yith_infs_added_elem",(function(t,i){C({container:i,firstLoad:!1})})),S.on("yith_wcwl_fragments_loaded",(function(i,e,a,o){o&&t(".variations_form").find(".variations select").last().change()})),S.on("click",".yith-wcwl-popup-feedback .close-popup",(function(t){t.preventDefault(),v()})),function(){if(void 0!==yith_wcwl_l10n.enable_notices&&!yith_wcwl_l10n.enable_notices)return;if(t(".yith-wcwl-add-to-wishlist").length&&!t("#yith-wcwl-popup-message").length){var i=t("<div>").attr("id","yith-wcwl-message"),e=t("<div>").attr("id","yith-wcwl-popup-message").html(i).hide();t("body").prepend(e)}}(),s(),l(),d(),c(),_(),t(document).on("click",".show-tab",(function(i){var e=t(this),a=e.closest(".yith-wcwl-popup-content"),o=e.data("tab"),n=a.find(".tab").filter("."+o);if(i.preventDefault(),!n.length)return!1;e.addClass("active").siblings(".show-tab").removeClass("active"),n.show().siblings(".tab").hide(),"create"===o?a.prepend('<input type="hidden" id="new_wishlist_selector" class="wishlist-select" value="new">'):a.find("#new_wishlist_selector").remove()})),t(document).on("change",".wishlist-select",(function(){var i=t(this),e=i.closest(".yith-wcwl-popup-content"),a=i.closest(".tab"),o=e.find(".tab.create"),n=e.find(".show-tab"),s=n.filter('[data-tab="create"]');"new"===i.val()&&o.length&&(a.hide(),o.show(),n.removeClass("active"),s.addClass("active"),i.find("option").removeProp("selected"),i.change())})),i(),a(),e(),o(),function(){var i=!1;if(!yith_wcwl_l10n.is_wishlist_responsive)return;t(window).on("resize",(function(){var e=t(".wishlist_table.responsive"),a=e.is(".mobile"),o=window.matchMedia("(max-width: 768px)"),s=e.closest("form"),l=s.attr("class"),d=s.data("fragment-options"),c={},r=!1;e.length&&(o.matches&&e&&!a?(d.is_mobile="yes",r=!0):!o.matches&&e&&a&&(d.is_mobile="no",r=!0),r&&(i&&i.abort(),c[l.split(" ").join(yith_wcwl_l10n.fragments_index_glue)]=d,i=t.ajax({beforeSend:function(){b(e)},complete:function(){k(e)},data:{action:yith_wcwl_l10n.actions.load_mobile_action,fragments:c},method:"post",success:function(i){void 0!==i.fragments&&(T(i.fragments),n(),t(document).trigger("yith_wcwl_responsive_template",[a,i.fragments]))},url:yith_wcwl_l10n.ajax_url})))}))}(),r(),C()})).trigger("yith_wcwl_init")}));
}

//lazyload
function eowbc_lazyload(){
	!function(t,n){"object"==typeof exports&&"undefined"!=typeof module?module.exports=n():"function"==typeof define&&define.amd?define(n):(t=t||self).LazyLoad=n()}(this,(function(){"use strict";function t(){return(t=Object.assign||function(t){for(var n=1;n<arguments.length;n++){var e=arguments[n];for(var i in e)Object.prototype.hasOwnProperty.call(e,i)&&(t[i]=e[i])}return t}).apply(this,arguments)}var n="undefined"!=typeof window,e=n&&!("onscroll"in window)||"undefined"!=typeof navigator&&/(gle|ing|ro)bot|crawl|spider/i.test(navigator.userAgent),i=n&&"IntersectionObserver"in window,a=n&&"classList"in document.createElement("p"),o=n&&window.devicePixelRatio>1,r={elements_selector:"IMG",container:e||n?document:null,threshold:300,thresholds:null,data_src:"src",data_srcset:"srcset",data_sizes:"sizes",data_bg:"bg",data_bg_hidpi:"bg-hidpi",data_bg_multi:"bg-multi",data_bg_multi_hidpi:"bg-multi-hidpi",data_poster:"poster",class_applied:"applied",class_loading:"loading",class_loaded:"loaded",class_error:"error",unobserve_completed:!0,unobserve_entered:!1,cancel_on_exit:!1,callback_enter:null,callback_exit:null,callback_applied:null,callback_loading:null,callback_loaded:null,callback_error:null,callback_finish:null,callback_cancel:null,use_native:!1},c=function(n){return t({},r,n)},l=function(t,n){var e,i=new t(n);try{e=new CustomEvent("LazyLoad::Initialized",{detail:{instance:i}})}catch(t){(e=document.createEvent("CustomEvent")).initCustomEvent("LazyLoad::Initialized",!1,!1,{instance:i})}window.dispatchEvent(e)},s=function(t,n){return t.getAttribute("data-"+n)},u=function(t,n,e){var i="data-"+n;null!==e?t.setAttribute(i,e):t.removeAttribute(i)},d=function(t){return s(t,"ll-status")},f=function(t,n){return u(t,"ll-status",n)},_=function(t){return f(t,null)},g=function(t){return null===d(t)},v=function(t){return"native"===d(t)},b=function(t,n,e,i){t&&(void 0===i?void 0===e?t(n):t(n,e):t(n,e,i))},p=function(t,n){a?t.classList.add(n):t.className+=(t.className?" ":"")+n},h=function(t,n){a?t.classList.remove(n):t.className=t.className.replace(new RegExp("(^|\\s+)"+n+"(\\s+|$)")," ").replace(/^\s+/,"").replace(/\s+$/,"")},m=function(t){return t.llTempImage},E=function(t,n){if(n){var e=n._observer;e&&e.unobserve(t)}},I=function(t,n){t&&(t.loadingCount+=n)},A=function(t,n){t&&(t.toLoadCount=n)},L=function(t){for(var n,e=[],i=0;n=t.children[i];i+=1)"SOURCE"===n.tagName&&e.push(n);return e},y=function(t,n,e){e&&t.setAttribute(n,e)},w=function(t,n){t.removeAttribute(n)},k=function(t){return!!t.llOriginalAttrs},z=function(t){if(!k(t)){var n={};n.src=t.getAttribute("src"),n.srcset=t.getAttribute("srcset"),n.sizes=t.getAttribute("sizes"),t.llOriginalAttrs=n}},O=function(t){if(k(t)){var n=t.llOriginalAttrs;y(t,"src",n.src),y(t,"srcset",n.srcset),y(t,"sizes",n.sizes)}},C=function(t,n){y(t,"sizes",s(t,n.data_sizes)),y(t,"srcset",s(t,n.data_srcset)),y(t,"src",s(t,n.data_src))},M=function(t){w(t,"src"),w(t,"srcset"),w(t,"sizes")},N=function(t,n){var e=t.parentNode;e&&"PICTURE"===e.tagName&&L(e).forEach(n)},x=function(t,n){L(t).forEach(n)},R={IMG:function(t,n){N(t,(function(t){z(t),C(t,n)})),z(t),C(t,n)},IFRAME:function(t,n){y(t,"src",s(t,n.data_src))},VIDEO:function(t,n){x(t,(function(t){y(t,"src",s(t,n.data_src))})),y(t,"poster",s(t,n.data_poster)),y(t,"src",s(t,n.data_src)),t.load()}},G=function(t,n){var e=R[t.tagName];e&&e(t,n)},T=function(t,n,e){I(e,1),p(t,n.class_loading),f(t,"loading"),b(n.callback_loading,t,e)},D={IMG:function(t,n){u(t,n.data_src,null),u(t,n.data_srcset,null),u(t,n.data_sizes,null),N(t,(function(t){u(t,n.data_srcset,null),u(t,n.data_sizes,null)}))},IFRAME:function(t,n){u(t,n.data_src,null)},VIDEO:function(t,n){u(t,n.data_src,null),u(t,n.data_poster,null),x(t,(function(t){u(t,n.data_src,null)}))}},F=function(t,n){u(t,n.data_bg_multi,null),u(t,n.data_bg_multi_hidpi,null)},V=function(t,n){var e=D[t.tagName];e?e(t,n):function(t,n){u(t,n.data_bg,null),u(t,n.data_bg_hidpi,null)}(t,n)},j=["IMG","IFRAME","VIDEO"],P=function(t,n){!n||function(t){return t.loadingCount>0}(n)||function(t){return t.toLoadCount>0}(n)||b(t.callback_finish,n)},S=function(t,n,e){t.addEventListener(n,e),t.llEvLisnrs[n]=e},U=function(t,n,e){t.removeEventListener(n,e)},$=function(t){return!!t.llEvLisnrs},q=function(t){if($(t)){var n=t.llEvLisnrs;for(var e in n){var i=n[e];U(t,e,i)}delete t.llEvLisnrs}},H=function(t,n,e){!function(t){delete t.llTempImage}(t),I(e,-1),function(t){t&&(t.toLoadCount-=1)}(e),h(t,n.class_loading),n.unobserve_completed&&E(t,e)},B=function(t,n,e){var i=m(t)||t;$(i)||function(t,n,e){$(t)||(t.llEvLisnrs={});var i="VIDEO"===t.tagName?"loadeddata":"load";S(t,i,n),S(t,"error",e)}(i,(function(a){!function(t,n,e,i){var a=v(n);H(n,e,i),p(n,e.class_loaded),f(n,"loaded"),V(n,e),b(e.callback_loaded,n,i),a||P(e,i)}(0,t,n,e),q(i)}),(function(a){!function(t,n,e,i){var a=v(n);H(n,e,i),p(n,e.class_error),f(n,"error"),b(e.callback_error,n,i),a||P(e,i)}(0,t,n,e),q(i)}))},J=function(t,n,e){!function(t){t.llTempImage=document.createElement("IMG")}(t),B(t,n,e),function(t,n,e){var i=s(t,n.data_bg),a=s(t,n.data_bg_hidpi),r=o&&a?a:i;r&&(t.style.backgroundImage='url("'.concat(r,'")'),m(t).setAttribute("src",r),T(t,n,e))}(t,n,e),function(t,n,e){var i=s(t,n.data_bg_multi),a=s(t,n.data_bg_multi_hidpi),r=o&&a?a:i;r&&(t.style.backgroundImage=r,function(t,n,e){p(t,n.class_applied),f(t,"applied"),F(t,n),n.unobserve_completed&&E(t,n),b(n.callback_applied,t,e)}(t,n,e))}(t,n,e)},K=function(t,n,e){!function(t){return j.indexOf(t.tagName)>-1}(t)?J(t,n,e):function(t,n,e){B(t,n,e),G(t,n),T(t,n,e)}(t,n,e)},Q=["IMG","IFRAME"],W=function(t){return t.use_native&&"loading"in HTMLImageElement.prototype},X=function(t,n,e){t.forEach((function(t){return function(t){return t.isIntersecting||t.intersectionRatio>0}(t)?function(t,n,e,i){b(e.callback_enter,t,n,i),function(t,n,e){n.unobserve_entered&&E(t,e)}(t,e,i),function(t){return!g(t)}(t)||K(t,e,i)}(t.target,t,n,e):function(t,n,e,i){g(t)||(function(t,n,e,i){e.cancel_on_exit&&function(t){return"loading"===d(t)}(t)&&"IMG"===t.tagName&&(q(t),function(t){N(t,(function(t){M(t)})),M(t)}(t),function(t){N(t,(function(t){O(t)})),O(t)}(t),h(t,e.class_loading),I(i,-1),_(t),b(e.callback_cancel,t,n,i))}(t,n,e,i),b(e.callback_exit,t,n,i))}(t.target,t,n,e)}))},Y=function(t){return Array.prototype.slice.call(t)},Z=function(t){return t.container.querySelectorAll(t.elements_selector)},tt=function(t){return function(t){return"error"===d(t)}(t)},nt=function(t,n){return function(t){return Y(t).filter(g)}(t||Z(n))},et=function(t,e){var a=c(t);this._settings=a,this.loadingCount=0,function(t,n){i&&!W(t)&&(n._observer=new IntersectionObserver((function(e){X(e,t,n)}),function(t){return{root:t.container===document?null:t.container,rootMargin:t.thresholds||t.threshold+"px"}}(t)))}(a,this),function(t,e){n&&window.addEventListener("online",(function(){!function(t,n){var e;(e=Z(t),Y(e).filter(tt)).forEach((function(n){h(n,t.class_error),_(n)})),n.update()}(t,e)}))}(a,this),this.update(e)};return et.prototype={update:function(t){var n,a,o=this._settings,r=nt(t,o);A(this,r.length),!e&&i?W(o)?function(t,n,e){t.forEach((function(t){-1!==Q.indexOf(t.tagName)&&(t.setAttribute("loading","lazy"),function(t,n,e){B(t,n,e),G(t,n),V(t,n),f(t,"native")}(t,n,e))})),A(e,0)}(r,o,this):(a=r,function(t){t.disconnect()}(n=this._observer),function(t,n){n.forEach((function(n){t.observe(n)}))}(n,a)):this.loadAll(r)},destroy:function(){this._observer&&this._observer.disconnect(),Z(this._settings).forEach((function(t){delete t.llOriginalAttrs})),delete this._observer,delete this._settings,delete this.loadingCount,delete this.toLoadCount},loadAll:function(t){var n=this,e=this._settings;nt(t,e).forEach((function(t){K(t,e,n)}))}},et.load=function(t,n){var e=c(n);K(t,e)},et.resetStatus=function(t){_(t)},n&&function(t,n){if(n)if(n.length)for(var e,i=0;e=n[i];i+=1)l(t,e);else l(t,n)}(et,window.lazyLoadOptions),et}));
	 window.addEventListener('LazyLoad::Initialized', function (e) {
        var lazyLoadInstance = e.detail.instance;

        if (window.MutationObserver) {
            var observer = new MutationObserver(function(mutations) {
                var image_count = 0;
                var iframe_count = 0;
                var rocketlazy_count = 0;

                mutations.forEach(function(mutation) {
                    for (i = 0; i < mutation.addedNodes.length; i++) {
                        if (typeof mutation.addedNodes[i].getElementsByTagName !== 'function') {
                            return;
                        }

                       if (typeof mutation.addedNodes[i].getElementsByClassName !== 'function') {
                            return;
                        }

                        images = mutation.addedNodes[i].getElementsByTagName('img');
                        is_image = mutation.addedNodes[i].tagName == "IMG";
                        iframes = mutation.addedNodes[i].getElementsByTagName('iframe');
                        is_iframe = mutation.addedNodes[i].tagName == "IFRAME";
                        rocket_lazy = mutation.addedNodes[i].getElementsByClassName('rocket-lazyload');

                        image_count += images.length;
		                iframe_count += iframes.length;
		                rocketlazy_count += rocket_lazy.length;

                        if(is_image){
                            image_count += 1;
                        }

                        if(is_iframe){
                            iframe_count += 1;
                        }
                    }
                } );

                if(image_count > 0 || iframe_count > 0 || rocketlazy_count > 0){
                    lazyLoadInstance.update();
                }
            } );

            var b      = document.getElementsByTagName("body")[0];
            var config = { childList: true, subtree: true };

            observer.observe(b, config);
        }
    }, false);
}

var render_data = '';
var _render_container = '';

ACTIVE_TODO_OC_START
move all fundamental functions like below inside the filters core js module -- to d. it will be as private functions mostly 
	-- also wherever you have found the change function instance in any repo then there check for the eo_wbc_filter_render_html function like below and copy their code over to the filters js module where below code is moved, but yeah where you copy above it put a comment stating from which repo and which file line it is moved -- to d 
ACTIVE_TODO_OC_END	
//render products DOM to view
function eo_wbc_filter_render_html(data,render_container) {


	/*jQuery("#loading").removeClass('loading');
	return true;*/

	render_data = data;
	_render_container = render_container;

	ACTIVE_TODO_OC_START
	create two function show_loader and hide_loader in filters core js module -- to d 
		--	and then move the below code in the hide_loader -- to d 
		--	and check all the change function implementation and move show related code in the show_loader function and hide related code in the hide_loader function -- to d
		--	needless to say but still note that the loader hide show event should be carefully called from each related search events like search, complete, error and maybe also some other which handle some particular scenarios. -- to d 
			--	so that what happen is that in future if the events namespace is firing the search or any related events around and if by any change any event that the filters module recieve is related to the show hide loader flow then that is taken care of implicitly.  
	ACTIVE_TODO_OC_END
			
	///////////////// shraddha //////////////////////		
	// jQuery("#loading").removeClass('loading');
	/////////////////////////////////////////////////

	// ACTIVE_TODO_OC_START
	// create one function update_result_count in filters core js module -- to d 
	// --	and then move the below code in that -- to d 
	// --	and check all the change function implementation and move show related code in that function -- to d 
	// --	I have some doubt the below condition's logic it is setting to empty when there is not result count container is returned. but I guess that is exceptional scenario which would never be happening but if it happens then we need to handle that exceptional scenario, so for now keeping it open and if no such thing show up after 1st or 2nd revision then remove this task ACTIVE_TODO -- to b 
	// 	--	move above task comment also with the code -- to d 
	// ACTIVE_TODO_OC_END
		
	//Replace Result Count Status...
	if(jQuery('.woocommerce-result-count',jQuery(data)).html()!==undefined){
		if(jQuery(".woocommerce-result-count").length>0){
			jQuery(".woocommerce-result-count").html(jQuery('.woocommerce-result-count',jQuery(data)).html());
		} else {
			jQuery(jQuery('.woocommerce-result-count',jQuery(render_data)).get(0).outerHTML).insertBefore('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products');
		}
	}
	else {
		jQuery(".woocommerce-result-count").html('');	
	}

	//Replacing Product listings....
	// ACTIVE_TODO_OC_START
	// like vars under window object are moved filter core js module, similarly move below var also to filters js module and underneath below statement set it in the filters js module -- to d 
	// ACTIVE_TODO_OC_END

	document.wbc_data = data;
	
	/*console.log(data);*/

	// ACTIVE_TODO_OC_START
	// we can define a compatibility check flow, where the compatibility function will be available in each js module -- to d 
	// 	-- that will recieve a object and second argument will be the excpected result. -- to d 
	// 	-- if that is not matched then the compatibility function will apply its all available compatibility scenarios -- to d. like the below elementor-products-grid class statement would then go inside compatibility if. and .jet-woo-products also belong there, but let it be there and same for any js module layers where we have compatibility patch is mixed with basic/standard implementation statement to avoid the errors while separating them. 
	// ACTIVE_TODO_OC_END
		
	let container_html = jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products',jQuery(data)).html();	
	
	/*if(container_html===undefined || container_html==='') {
		container_html = jQuery(jQuery(data),'.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products').html();
	}*/

	if(container_html===undefined || container_html==='') {
		container_html = jQuery(".elementor-products-grid",jQuery(data)).html();
	}

	if(container_html!==undefined && container_html!=='') {	
		if( typeof(is_card_view_rendered) == undefined || typeof(is_card_view_rendered) == 'undefined' || is_card_view_rendered == false ) {
			if(jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products').length<=0) {
				jQuery(render_container).html(container_html);
			} else {
				jQuery(render_container).html(container_html);
			}			
		}						
		else {

			// ACTIVE_TODO_OC_START
			// we need to track execution of this function so search in all 5 repos and confirm where this function is defined -- to d 
			// 	--	and if that is found then only track above where is_card_view_rendered to see from which different locations it is defined and/or coming -- to d 
			// ACTIVE_TODO_OC_END
				
			wbc_attach_card_views();
		}

		var links=jQuery(".products a,.product-listing a");
		jQuery.each(links,function(index,element) {

			var href=jQuery(element).attr('href');
			if(typeof(href)!==typeof(undefined) && href.hasOwnProperty('indexOf')){
				if(href.indexOf('?')==-1) {
					jQuery(element).attr('href',jQuery(element).attr('href')+eo_wbc_object.eo_product_url);
				} else {
					jQuery(element).attr('href',href.substring(0,href.indexOf('?'))+eo_wbc_object.eo_product_url);
				}
			}
			
		});
	}
	else {

		// ACTIVE_TODO_OC_START
		// ACTIVE_TODO instead of determining if products are found or not on the js layer, it is really if we send a flag var from the php layer. so do it. in the dapii feed layers it is already like that but ensure that in wbc and tableview(in tableview also it is at least almost planned and roughly implemented) -- to h or -- to d 
		// ACTIVE_TODO_OC_END

		// 	ACTIVE_TODO commented below events subject creation, during testing only. so temporary only.
		window.document.splugins.wbc.filters.core.no_products_found();

		// ACTIVE_TODO_OC_START
		// just move below line in the no_products_found function of the filters js module -- to d 
		// 	--	and so now the render_container will recieve one parameter that is render_container, it will defaults to null so from where it is applicable it is passed otherwise it will be left blank -- to d 
		// ACTIVE_TODO_OC_END
			
		jQuery(render_container/*".products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products"*/).html('<p class="woocommerce-info" style="width: 100%;">No products were found matching your selection.</p>');	
	}	

	/*if(render_container===".products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products"){*/
		//Replacing Pagination details.....		
		//console.log(jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination',jQuery(data)).html());

		// ACTIVE_TODO_OC_START
		// //done move below logic to the pagination js module -- to d. including the compatibility conditions are there in the if else block, like planned above to keep the compatibility patches as it is if they are already implemented otherwise we will put them in the dedicated compatibility function. 
		// 	-- //done create below functions in that module 
		// 		-- //done 	bind_click -- to d. put comment inside function "it will bind to all kind of such on_click events of pagination, it will be private but it may broadcast notification with a callback which js layers of like tableview and so on can call when they recieve their own click event or they can simply call below on_click function". so it is private function. 
		// 			-- //done 	and from this function call the private click function -- to d 
		// 		-- //done 	on_click -- to d. put comment inside function "listen to all on_click events". so it is public function. 
		// 		-- //done 	click -- to d. put comment inside function "it will internally implement all flows related to pagination link click event". so it is private function. 
		// 			-- //done 	call this function from above on_click -- to d 	
		// 			-- raise on_click notification using notifyAllObservers -- to d 
		// 			-- in init_private function first create the subject for observer pattern also -- to d 
		// 			-- //done  so also create init_private and init(public) function -- to d 
		// 		-- //done 	compatibility -- to d. it is private function. 
		// 		-- //done 	get_page_number -- to d. it is public function. 
		// 		-- //done 	set_page_number -- to d. it is public function. 
		// 			-- raise page_number_udpated notification using notifyAllObservers -- to d 
		// 		-- //done 	on_reset -- to d. it is public function. 
		// 			--	external layers would simply call this function, since observer pattern is not seem necessary here -- to d 
		// 			-- //done 	and from this function call the private reset function -- to d 
		// 		-- //done 	reset -- to d. it is private function. 
		// 			-- raise on_reset notification using notifyAllObservers -- to d 
		// 		tableview and so on would depend on that extended flow of observer pattern where notification will provide a callback, this flow is to be confirmed so either it or something else that is confirmed there on common js variations notes will be used. 
		// 			-- tableview will use it for its flows like binding click event, which is ideal use case of the observer pattern -- to d 
		// 			-- and it will also use it for triggerring the click event, means of its own pagination links dom -- to d 
		// 				-- ACTIVE_TODO but very soon maybe the tableview may not have its own pagination links dom if that is not necessary for it -- to h and -- to d 
		// 			-- and for setting and getting current page_number 
		// 				--	for it may simply need to use the pagination modules published api interface -- to d 
		// ACTIVE_TODO_OC_START

		if(jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination',jQuery(data)).html()!==undefined) {
			if(jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination').length>0){
				jQuery(".woocommerce-pagination,.pagination,jet-filters-pagination").html(jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination',jQuery(data)).html());
			} else {

				// ACTIVE_TODO_OC_START
				// @d once all the pagination related layers brought to this function, we need to check if the below incomplete implementation is completely implemented anywhere in our repo -- to d 
				// 	--	if not then test with the elementor created category feed page and also with elementor hello themes custom loop to check if it works. if not then must uncomment the last uncommented line and finish the implementation -- to d or -- to b 
				// ACTIVE_TODO_OC_END
					
				let product_container = jQuery(".products:eq(0),.product-listing:eq(0),.row-inner>.col-lg-9:eq(0)");
				if(product_container.length<=0) {
					product_container = jQuery(".elementor-products-grid");
					if(product_container.length<=0) {
						product_container = jQuery(".elementor-widget-container").has('[data-elementor-type="loop"]');
						if(product_container.length<=0) {
							product_container = jQuery("[data-widget_type='archive-posts.archive_custom']");						
						}
					}
				}
				//jQuery(product_container).append('<nav class="woocommerce-pagination">'+jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination',jQuery(data)).html()+'</nav>');
			}
		}
		else {
			jQuery(".woocommerce-pagination,.pagination,jet-filters-pagination").html('');	
		}
	/*}*/

	// ACTIVE_TODO_OC_START
	// and below one to the hide_loader function -- to d 
	// ACTIVE_TODO_OC_END

	//jQuery("body").fadeTo('fast','1')	

	/////////////// shraddha //////////////////								
	// jQuery("#loading").removeClass('loading');
	///////////////////////////////////////////
	
	ACTIVE_TODO_OC_START
	almost all of the below seems compatibility related to so move that to compatibility function, and at there we need to have section conditon like this would be broadly as product-listing -- to d 
		--	you already moved below code, which I saw, but there is not comment below that it is moved so please let me know what is going on -- to d 
	ACTIVE_TODO_OC_END
	
	
	jQuery('.products:eq(0),.product-listing:eq(0),.row-inner>.col-lg-9:eq(0)').addClass('product_grid_view');
	//jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.woocommerce-pagination,.pagination').css('visibility','visible');
	if(jQuery(".row-inner>.col-lg-9").length>0){
		jQuery(".row-inner>.col-lg-9 *").each(function(i,e) {		
		    if(jQuery(e).css('opacity') == '0'){
				jQuery(e).css('opacity','1');        
		    }
		});
		
		jQuery(".t-entry-visual-overlay").removeClass('t-entry-visual-overlay');
		jQuery(".double-gutter .tmb").css('width','50%');
		jQuery(".double-gutter .tmb").css('display','inline-flex');
		
	}
	
	jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.woocommerce-pagination,.pagination,jet-filters-pagination').css('visibility','visible');

	// Fix for the yith wishlist.
	if(typeof(yith_wcwl_l10n)=='object'){
		eowbc_yith_wishlist_fix();
	}
	// lazyload
	if(typeof(LazyLoad)=='function'){
		eowbc_lazyload();
	}
}

/*if(eo_wbc_object.disp_regular=='1'){
	*/
	window.eo_wbc_object.enable_filter = true;
	jQuery.fn.eo_wbc_filter_change_native= function(init_call=false,form_selector="form#eo_wbc_filter",render_container='',parameters={}) {

		// ACTIVE_TODO_OC_START
		// on an important note there should a function parameter in this main function of the filters module, which specify the filter event is for what. it can be the form_selector but things can get complicated so better to have dedicated parameter so lets just support the dedicated parameter under the parameters object that it recieve, so it will be with the key caller_module -- to d. this will be necessary to manage logic or conditions based on the caller_module condition. 
		// 	but is it enough? 
		// 		--	with only the caller_module condition and the filters js module? 
		// 			--	maybe we need more stat holders, like on dapii we had the dedicated class to encapsulate and maintain the stat of each API and what not 
		// 				--	and maybe the custom attribute filters, diamond quiz and custom numeric filters will need more to maintain their stat and logic since we can not put all of their logic here with mere conditions and also the benefits reusability can be better achieved and maintained with the modularity instead of long if else flows 
		// 		--	and will it be good enough with the js modules and the events stack? 
		// 			--	maybe we will good with dedicated js modules for diamond quiz, custom attribute filters and so on but that will not be reusable and maintaining will be burden so we simply a mature inherited modules flow where this filters module being the based like dapii lib class and the other js module will be extending it but this time not like diamond api but it will be these js modules own unique flow maybe like sp_api and ftp/csv-excel extending it 
		// ACTIVE_TODO_OC_END
					
		console.log(form_selector);
	//flag indicates if to show products in tabular view or woocommerce's default style.		

		// ACTIVE_TODO_OC_START
		// below logic should be in the init_search function so there will be a init_search function that we need to create -- to d 
		// 	--	actually not in init_search but do it in the should_search function -- to d 
		// ACTIVE_TODO_OC_END	

		// if(window.eo_wbc_object.enable_filter===false){
		// 	return false;
		// }

		//	NOTE: if there are any return false etc statement occur below this statement then this core function call should be moved underneath the return statement because this core functions is supposed to be called only if search actually happens but yeah at earliest possible also so that there are any dependent flow below or elsewhere then they are taken care of properly 
		window.document.splugins.wbc.filters.core.before_search();

		and below will be inside the init_search also -- to d
		// if(render_container==='') {
		// 	render_container = jQuery(".products:eq(0),.product-listing:eq(0),.row-inner>.col-lg-9:eq(0)");
		// 	if(render_container.length<=0) {
		// 		render_container = jQuery(".elementor-products-grid");
		// 	}
		// }

		// var form=jQuery(form_selector/*"form#eo_wbc_filter"*/);	
		// if(form.find('[name="html_destination"]').length>0){
		// 	render_container = form.find('[name="html_destination"]').val();
		// }
		// var site_url=eo_wbc_object.eo_cat_site_url;
		// var ajax_url = '';

		// if(site_url.includes('?')) {
		// 	ajax_url = site_url+eo_wbc_object.eo_cat_query;
		// } else {
		// 	ajax_url = site_url+'/?'+eo_wbc_object.eo_cat_query;
		// }

		// console.log(eo_wbc_object);

		// jQuery.ajax({
		// 	url: ajax_url,//form.attr('action'),
		// 	data:form.serialize(), // form data
		// 	type:'GET'/*form.attr('method')*/, // POST
		// 	beforeSend:function(xhr){
		// 		//jQuery("body").fadeTo('slow','0.3')
		// 		window.eo_wbc_object.enable_filter = false;	
		// 		jQuery("#loading").addClass('loading');							
		// 		console.log(this.url);					
		// 	},
		// 	complete : function(){
		// 		//console.log(this.url);
		// 	},
		// 	success:function(data){		
		// 		//console.log(JSON.stringify(data));
		// 		eo_wbc_filter_render_html(data,render_container);
		// 		window.eo_wbc_object.enable_filter = true;
		// 	},
		// 	error:function(data){
		// 		jQuery("#loading").removeClass('loading');
		// 		window.eo_wbc_object.enable_filter = true;
		// 	}
		// });

		return false;
	}	
	
	if(typeof(window.eo_wbc_filter_change) === 'undefined') {
		window.eo_wbc_filter_change = jQuery.fn.eo_wbc_filter_change_native;
	}

	if( (typeof(jQuery.fn.eo_wbc_filter_change)=="undefined" || jQuery.fn.eo_wbc_filter_change==undefined) && typeof(window.eo_wbc_e_tabview) !== 'object' ){		
		jQuery.fn.eo_wbc_filter_change = jQuery.fn.eo_wbc_filter_change_native;
	}
/*}*/

jQuery(document).ready(function($){

	ACTIVE_TODO_OC_START
	if any of the below vars are related to the stat and so on vars that we planned to rename or move then should be covered here also, otherwise at runtime it will break and would not run and crash -- to d 
	ACTIVE_TODO_OC_END
		
	window.eo_wbc_object = window.eo_wbc_object || {};
	window.eo_wbc_object.enable_filter = window.eo_wbc_object.enable_filter || false;

	ACTIVE_TODO_OC_START
	//done move to pagination js modules bind_click function -- to d 
		
		--	and also be sure to the filter_change function call. and why that is so far not changed? -- to d 
		--//done  and comment code below but the pagination modules init function need to be called from here -- to d 
			--//done	so first export and publish that module under ...api -- to d 
	ACTIVE_TODO_OC_END		

	// jQuery('body').on('click','.navigation .page-numbers,.woocommerce-pagination a.page-numbers',function(e){
	//     e.preventDefault();
	//     e.stopPropagation();
	    
	// 	jQuery('[name="paged"]').val(parseInt(jQuery(this).text().replace(',','')));		
	// 	jQuery.fn.eo_wbc_filter_change(false,'form#'+jQuery(this).parents().has('[id$="eo_wbc_filter"]').find('[id$="eo_wbc_filter"]').attr('id'));
	// });
	window.document.splugins.pagination.api.init();

	ACTIVE_TODO_OC_START
	ask t for what it is -- to d 
		-- then need to create if applicable then applicable function in applicable js module and mode code there -- to d 
	ACTIVE_TODO_OC_END
		
	jQuery("[data-toggle_column]").click(function(){
		if(jQuery(this).hasClass('active')){		
			jQuery("[data-toggle_slug='"+jQuery(this).data('toggle_column')+"']").css('display','none');
			jQuery(this).removeClass('active');

		} else {
			jQuery("[data-toggle_slug='"+jQuery(this).data('toggle_column')+"']").css('display','table-cell');
			jQuery(this).addClass('active');
			
		}
	});

	// create function bind_reset_click in filters js module and move below code there -- to d done
		// --	and then from just make call to that private function from the init_private of the same module -- to d done
		// --  and comment code below but the filters modules init function need to be called from here -- to d 
		// 	--	so first export and publish that module under ...api -- to d done

	jQuery(document).on('click',".reset_all_filters",function(){
        jQuery("[data-reset]").each(function(e){
            eval(jQuery(this).data('reset'));
        })
        jQuery.fn.eo_wbc_filter_change();
        return false;
    });  

 	window.document.splugins.filters.api.init();

	if(eo_wbc_object.disp_regular){
	
		// create function bind_click in filters js module and move below code there -- to d done
		// 	--	and then from just make call to that private function from the init_private of the same module -- to d done
		//jQuery(".woocommerce-pagination,.pagination,jet-filters-pagination").html('');	

		if(!eo_wbc_object.btnfilter_now){			
			jQuery("#eo_wbc_filter").on('change',"input:not(:checkbox)",function(){
				jQuery('[name="paged"]').val('1');
				// jQuery.fn.eo_wbc_filter_change();	
				window.document.splugins.filters.api.eo_wbc_filter_change_wrapper();									
			});
		}

		if(typeof(jQuery.fn.eo_wbc_filter_change) === typeof(undefined) &&  typeof(window.eo_wbc_filter_change) === 'function') {
			jQuery.fn.eo_wbc_filter_change = window.eo_wbc_filter_change;				
		}
		

		//changes: mahesh@emptyops.com
		// To prevent initial call for the ajax -- speed optimization -- stop ajax at init load;
		if(typeof(eo_wbc_e_tabview)===typeof(undefined) || typeof(eo_wbc_e_tabview.init_data)===typeof(undefined) || typeof(eo_wbc_object)==typeof(eo_wbc_object) ){
			// jQuery.fn.eo_wbc_filter_change(true);
			window.document.splugins.filters.api.eo_wbc_filter_change_wrapper(true);
		}

		//pagination for non-table based view

		//done move to pagination js modules bind_click function -- to d 
			--	and also be sure to the filter_change function call. and why that is so far not changed? -- to d 
		jQuery("body").on('click','.woocommerce-pagination a,.pagination a,.jet-filters-pagination a,.woocommerce-pagination .jet-filters-pagination__link,.pagination .jet-filters-pagination__link,.jet-filters-pagination .jet-filters-pagination__link',function(event){
			
			event.preventDefault();
			event.stopPropagation();								
			
			// ACTIVE_TODO page nnumber text would break below with multilanguage so instead use the data attribute to store and read the page number -- to a and/or -- to h
			if(jQuery(this).hasClass("next") || jQuery(this).hasClass("prev")){
			
				if(jQuery(this).hasClass("next")){
					jQuery("[name='paged']").val(parseInt(jQuery(".page-numbers.current").text())+1);
				}
				if(jQuery(this).hasClass("prev")){
					jQuery("[name='paged']").val(parseInt(jQuery(".page-numbers.current").text())-1);
				}	
			}		
			else {
				jQuery("[name='paged']").val(jQuery(this).text());
			}		

			// jQuery.fn.eo_wbc_filter_change(false,'form#'+jQuery(this).parents().has('[id$="eo_wbc_filter"]').find('[id$="eo_wbc_filter"]').attr('id'));
			window.document.splugins.filters.api.eo_wbc_filter_change_wrapper(false,'form#'+jQuery(this).parents().has('[id$="eo_wbc_filter"]').find('[id$="eo_wbc_filter"]').attr('id'));
		});
	}
	/////////////////////////
	////////////////////////
	// create function advance_filter_accordian in filters js module and move below code there -- to d done 
	// 	--	and then from just make call to that private function from the init_private of the same module -- to d done

	if(jQuery.fn.hasOwnProperty('accordion') && typeof(jQuery.fn.accordion)==='function'){
		jQuery( ".eo_wbc_advance_filter" ).accordion({
		  collapsible: true,
		  active:false
		});
	}

	// in function bind_reset_click in filters js module and move below code there -- to d done
	//Reset form and display
	jQuery(".eo_wbc_srch_btn:eq(2)").click(function(){					
		///////////////////////////////////////////
		document.forms.eo_wbc_filter.reset();
		jQuery(".eo_wbc_srch_btn:eq(2)").trigger('reset');
		jQuery("#eo_wbc_attr_query").val("");
		jQuery('[name="paged"]').val('1');
		// jQuery.fn.eo_wbc_filter_change(true);
		window.document.splugins.filters.api.eo_wbc_filter_change_wrapper(true);

	});	
});

// ACTIVE_TODO here if reset even is encapsulated within particule filter fields object then that field can have more control on its state changes -- to a and/or -- to h 
function reset_icon(e,selector){
	e.preventDefault();
	e.stopPropagation()
	jQuery('.eo_wbc_filter_icon_select[data-filter="'+selector+'"]').trigger('click');
	return false;
}

function reset_slider(e,selector,first,second){	
	e.preventDefault();
	e.stopPropagation()

	window.document.splugins = window.document.splugins || {};
	window.document.splugins.ui = window.document.splugins.ui || {};
	window.document.splugins.ui.slider = window.document.splugins.ui.slider || jQuery.fn.slider;

	let ui_slider = jQuery.fn.slider;		
	jQuery.fn.slider = window.document.splugins.ui.slider;	

	jQuery(".ui.slider[data-slug='"+selector+"']").slider('set rangeValue',first,second);
	if(jQuery("[name='_attribute']").val().includes(selector)) {					    			
		_values=jQuery("[name='_attribute']").val().split(',')
		_index=_values.indexOf(selector)
		_values.splice(_index,1)
		jQuery("[name='_attribute']").val(_values.join());
	}

	jQuery.fn.slider = ui_slider;
	return false;
}

function reset_price(e,min,max) {
	e.preventDefault();
	e.stopPropagation()
	jQuery(".ui.slider[data-slug='price']").slider('set rangeValue',min,max);
	return false;	
}

function reset_checkbox(e,selector){
	e.preventDefault();
	e.stopPropagation()
	jQuery(selector).filter(":not(:checked)").trigger('click');
	return false;
}

function reset_button(e,selector){
	e.preventDefault();
	e.stopPropagation()
	jQuery(selector).filter(".eo_wbc_button_selected").trigger('click');
	return false;
}
	