window.document.splugins = window.document.splugins || {};

window.document.splugins.wbc = window.document.splugins.wbc || {};

// the filters js module
window.document.splugins.wbc.filters = window.document.splugins.wbc.filters || {};

window.document.splugins.wbc.filters.filter_field = window.document.splugins.wbc.filters.filter_field || {};

window.document.splugins.wbc.filters.filter_field.slider = window.document.splugins.wbc.filters.filter_field.slider || {};
	// maybe observer pattern with filters as subject, filter types like ring builder filters, shop/cat filters, shortcode filters and diamond quiz etc filters as observer(subscriber) but also the filter fields also as observer(subscriber)(as per standard it should be only filter types not fields but we can implement by adding subtype field in the definition arcitecture and still it is not pure standard but would work), and also the filter or any of its layers like network(ajax) or render(html render) as the singleton factory design pattern 
		// moved to asana 


		// ACTIVE_TODO/TODO now we are doing in adiition to above patterns the jQuery interface style plugin pattern which is a obvious base standard and maybe it was natural root direction for us that we now routed or something such but either way while we are in mix of this lets also try to implement above like observer patterns with jQuery interface style and something such that is inherantly popular in the entire community of javascript jQuery whenever we require something such or feel need of it.

window.document.splugins.wbc.filters.core = function( configs ) {

    var _this = this; 

	_this.configs = jQuery.extend({}, {}/*default configs*/, configs);	
	_this.sub_configs = filters_sub_confings;

    // _this.$base_container =  null  /*jQuery( ( window.document.splugins.common._o( _this.configs, 'base_container_selector') ? _this.configs.base_container_selector : '' ) )*/;  // ACTIVE_TODO/TODO whenever it become necessary to use base_container for events or so then at that time need to init base_container using our standard filters section conatainer selector.
    // NOTE: the serch form selector is the base_container of this filter module.
	    // ACTIVE_TODO/TODO but however if required in future then we can define an additional $base_container_search_widget or something like that for the search widget container to encapsulate this entire search widget area but only if that is necessary.
	    	// NOTE: ultimately we should create common parent class & module for filters while the diamond quiz, shortcode filters and so on will have their own child modules just like the swatches and gallery images module. of course then it will be only jQuery interface style and there will be no form_selector param supported for the eo_wbc_filter_change_wrapper function. so diamond quiz, shortcode filters and so on would just init using their own selector like as if jQuery interface style plugin. 
	    		// ACTIVE_TODO and we may like to do it by 3rd revision or so. 
    _this.$base_container = jQuery( ( window.document.splugins.common._o( _this.configs, 'base_container_selector') ? _this.configs.base_container_selector : "form#eo_wbc_filter,form[id*='eo_wbc_filter']" ) );

    //	private functions 
    var init_private = function() {

    	console.log('filters [init_private]');

		/*ACTIVE_TODO_OC_START
			    	// do general development like published init tobe defined below will call this private init function -- to d done


			    	// we like to move the events namespace under splugins instead of under the Feed, but the problem is that the events are initially planned for the Feed page however the events API is supposed to be used for any layers of any page and so on. 
			    		// --	so what maybe we could do is move the events api functions under the splugins namespace -- to d done 
			    		// --	and we need something that says the event is for Feed page or item page or all pages. by default it need to define at least one page maybe
			    		// 	--	it is clear that events are for the browser context so whatever js is loaded on the current page or say context is what the event subjects are for. 
			    				--	so maybe simply let events work on their own and for the modules like variations where maybe the same events can be reused on category page which was defined for the item page flows then that is fine and we are happy with reusability, but not sure if it can create disasters or mess in the flow. and this maybe a big question 

		need to define below notifications -- to s 
				--	the notifications for the filters module will be in detail since it will be almost central to everythings of the category page and many moduels that would come on different kind of category pages : NOTE 
					--	NOTE: and maybe in future for some modules of item page also like, vertical pair builder. 
			// --	init search form done
			// --	before search -- already set but need to update done
			// --	show loader -- it might be used by some js layers of alternate templates or so if they want to alter/control ui. but that will not be its fundamental use case the fundamental might be some functions that some js layers would need to do around show loader and hide loader etc. events, like if they want to manage some ui/ux aspects which would be affected by these show hide_loader events done
			// --	prepare_query_data -- maybe many js layers including the extensions layers would be interested in this notification, and using the callback they may want to pass their modification/overrides. -- but is this correct data flow, and is this something that we envisioned and anticipated on filters js module. done
			// --	list all other here like before_send(so before search and before_send will be different and I think there was that flag checking logic in before_search or even before that), success, complete, error and so on. so this list will include even the smaller layers and so a detailed event flow will be here, and it may help pagination and tableview which are already seeing different issues. done
						// --	it is should_search where we have all that flags logic, and since we have should_search now so maybe we need to drop the before_search but keep the before_send of course. and maybe dropping the before_search is what we planned but check in related points listed in this module and confirm. done
				--	and yeah it will also include like render_html, no_products_found, no_products_found render and so on 
					--	so can we use the events above to pass data object to other layers like tableview and so on. I think we had this task on queue already on backend layers. so we may like to do the needful at right time so that we do not need to worry about two different layers and something such. 
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
						// --	so simply add the wp_footer hook in all applicable extensions which has the variations.asset.php file loaded from model load_asset, so the hook just need to be changed there. -- to s done
						// 	--	and keep the older hook commented there -- to s done
						// --	and if there is anything specific dependent on the common js modules of swatches and gallery_images, inside the wbc variations.asset.php file then that should be moved to below ultimate footer script hooki -- to s done
						// --	add the wp_footer hook at last in the js.vars.asset file, with priority php int max constant -- to s done
						--	should we enque the filters js and tableview js after the common js? maybe simply yes 
							--	I think it is fine for tableview js that we modify its loading sequence but for filters jus we might need to once take a look at the overall js loading stack of the wbc 
								--	for tableview lets do. but first just put the hook there over the sp model feed with the use statement as well. -- to s 
								--	while for the wbc just show me its loading stack, means the filters js and if anything else that you find -- to t 
									--	then once confirmed that there can be no issue then lets just enque in the natural order of wbc assets and then extensions. so first apply the applicable priority to the wbc and then the for the tableview. -- to s 
						--	what about the document ready event binding? -- to h 
							--	lets simply keep using what we are using but if there is any external events dependancy to take care of then at all the places we just need to change from document ready something else ACTIVE_TODO/TODO 
								--	so on all the common js modules, I think it is there but if it is not at any place then let me know -- to s 
								--	and for all extensions I think it is missing so simply put it. -- to s 
								--	and what to do for the slider and zoom asset which are using the onload event I think -- to h 
						--	at all places comment timeout and so on statementsk, but do not delete them -- to s  
					--	what if above statement do not work? -- to h 
						--	then we can simply think of moving the events module out of common js and load that from wp head hook that is already there in the js.vars.asset file for loading those js flags. but we need to confirm once if that is required to do. or we can simply ACTIVE_TODO of confirming and or upgrading the flow to the applicable appropriate standard structure, and then just do move events module out for now. -- to h & -- to s 
				--	so for example all extensions variations assets inline script first, then anything that requires in between and at last the slider and zoom assets. -- to h  
				
				--	however still what we need to manage in case of our sp_variations module is 
					--	extensions should bind to the events 
					--	then the sp_slzm module init for activating its listeners(here we are doing extra layer of providing listeners so that we can provide simple and synchronus experience that avoids complexity where possible) 
						// --	so move it inside the above ultimate footer script hook that is mentioned, simply move in the order they are mentioned here -- to s done						
						--	then the slider and zoom asset will call above listener 
					--	then the sp_variations modules should init 
						// --	so move it inside the above ultimate footer script hook that is mentioned, simply move in the order they are mentioned here -- to s done
						--	lets simply bring it under the document ready but need to confirm once with the t -- to t 
					--	and then most challanging of all is external event dependancy, for example wc_variations_form. I think we can simply restructure our loading sequence a little bit as required but the external events should be take care of always witout failling. so we should simply give that ultimate priority and bind that always on time, whenever they want us to bind to them. and then structure rest of the loading sequence accordingly. 
						--	to take care of this we can 
							--	if external event dependancy has certain loading sequence requirements then 
								--	then we need to tweak how we use or not use document ready and so on load time events -- to h  
							--	and if they have no such dependancy then 
								--	then the external events binding which we have inside our js modules especially inside some core modules inside common js would simply work naturally 

			--	for the category page also we will need to follow same flow like above and the woocommerce and other legacy events need to be considered as central to entire loading sequance like we thought of for above item page loading sequence flow.
			--	so do we need to rely on export import statement for adding class as dependancy on those asset.php inline javascript. that may work but that might be heavy and unnecessarily complex maybe. 

		 
		ACTIVE_TODO_OC_END*/

		//	the filter events 
		window.document.splugins.events.api.createSubject( 'filters', ['before_send', 'prepare_query_data', 'show_loader', 'init_search', 'no_products_found', 'should_search', 'complete', 'success', 'error', 'compatability', 'eo_wbc_filter_render_html', 'hide_loader', 'on_reset_click_listener', 'on_change_listener'] );

		init_search();

		process_events();

		init_advance_filter_accordian();

		// allow the filter search event after all init level logic is executed
		// NOTE: now almost all other page load level flag set logic is disabled and initialy the flag is set at page load time only from here. 
		set_enable_filter_private(true);	

		slider_init();

    };

    var process_events = function(){

    	console.log('filters [process_events]');
		
		on_reset_click_listener();

		on_change_listener();

		slider_change_event_listener();
		
		checkbox_change_event_listener();

		input_type_icon_click_listener();

		input_type_button_click_listener();

		// ACTIVE_TODO temp. remove this code when we clear 34.13
		var process_events_callback = null ;
        window.document.splugins.events.api.notifyAllObservers( 'filters', 'process_events', {}, process_events_callback, null/*form_selector==null ? _this.$base_container : form_selector*/ );

    };

    var init_search = function(form_selector){

    	// /var/www/html/drashti_project/27-05-2022/woocommerce-bundle-choice/asset/js/publics/eo_wbc_filter.js

    	// render_container ne _this ni under ma levanu -- to s
    		// --  and aa module ma jya b use thay tya _this ni under ma use karavanu -- to s
    			// and bija koi b aava var hoy te confirm karavana -- to s

    	/* below code block move in result_container()
    	if(_this.render_container==='') {
			_this.render_container = jQuery(".products:eq(0),.product-listing:eq(0),.row-inner>.col-lg-9:eq(0)");
			if(_this.render_container.length<=0) {
				_this.render_container = jQuery(".elementor-products-grid");
			}
		}*/

	    // ACTIVE_TODO/TODO if ever required to manage or control any logic here in this function or in before send and so on function then we have planned and though out the flow of using even the flag classes like add class for any flag and then on the filter js means the base module the parent module in filter js the filter module in perticuler function for example should search and before send it should just check the hasclass condition with some generic class name. we have to confirm this flow once but this sounds like the idea. otherwise the other option is apply filter notification but we want to but we should simply avoid it if possible.
		// var init_search_callback = null ;
        // window.document.splugins.events.api.notifyAllObservers( 'filters', 'init_search', {}, init_search_callback, form_selector==null ? _this.$base_container : form_selector );

    };

	// --	and there will be one more function like should_search, which will also be private. and that will handle only the logic of checking flags and so on like the enable_filter_table flag above 
    var should_search = function(init_call) {

    	console.log('filters [should_search]');

    	// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
		// --add to be confirmed 2601 TO 2705--		

		// if(init_call/* || typeof(window.eo_wbc_filter_change_table_view_service)===typeof(undefined)*/) {
		// 	/*window.eo_wbc_filter_change_table_view_service = true*/
		// 	return false;
		// }
		// console.log(init_call,window.eo_wbc_filter_change_table_view_service);

		// // if(window.document.splugins.eo_wbc_object.enable_filter===false){
		// if(window.eo_wbc_object.enable_filter===false){
		// 	return false;
		// }

		//////////////////////

		// if(!init_call){
		// 	jQuery(".reset_all_filters.mobile_2").removeClass('mobile_2_hidden');
		// }

		// if(window.eo_wbc_object.enable_filter_table===false){
		// 	return false;
		// }

		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/template1.js
		// --add to be confirmed 630 TO 734--

		// NOTE: below logic was for tv template 1 only and that might be for preventing ajax search call during page load. but now we are controlling such flows of page load calls from other layers which is obvious and right architecture so their is no need to control it from here. and if we need any such control then below enable_filter flag based condition is providing such mechanism.
		if(init_call/* || typeof(window.eo_wbc_filter_change_table_view_service)===typeof(undefined)*/) {
		
			/*window.eo_wbc_filter_change_table_view_service = true*/
			return false;
		}
		console.log(init_call,window.eo_wbc_filter_change_table_view_service);
	
		if(/*window.eo_wbc_object.enable_filter*/get_enable_filter()===false){
		
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

		// if(window.eo_wbc_object.enable_filter===false){
		// 	return false;
		// }

		// apply filter notification no more supported
		// var should_search_callback = null ;
        // window.document.splugins.events.api.apply_all_observer_filters( 'filters', 'should_search', {}, should_search_callback, form_selector==null ? _this.$base_container : form_selector );

        return true;				

    };	 	 

	var prepare_query_data = function(init_call, form_selector) {

    	console.log('filters [prepare_query_data]');
		
		// from 0= this file function 

		// from 1 	

		// from slick and filter
		// if(type == 'slick_table' || type == 'filter') {
		
			// made global 
			var form=jQuery(form_selector);
		// }

		var form_data = null;
		var ajax_url = '';
		
		// if(type == 'template1') {

			// from template1 only 
				// not in filter
			if(init_call) {
				
				/*ACTIVE_TODO_QC_START
				--	the default if ever we need to set default 1 1 that should be on our base filter form which is on wbc filter templates layer.
					--	a part from that we most likely an must need to implement support for pagination which is like if paginated url is directly entered on the browser then at that time we need to detect the page number and set that on that filter form on the wbc filter templates layer from were the form is gnerated. so that we need to do but apart from that here isn't seem to be necessary so we should keep it comment even when we finalize template1 -- to h
				jQuery("form#eo_wbc_filter [name='paged']").val('1');
				jQuery("form#eo_wbc_filter [name='last_paged']").val('1');
				ACTIVE_TODO_QC_END*/

				/*ACTIVE_TODO_QC_START
				--	on tableview php layer also there was one statement maybe in filter widget class init function which was setting _current_category to _category but that was merged and commented due to merge with query layer pf wbc and so on. so we may like to keep that in mind before droping below statment support otherwise it is just for the notes when we enable template1 -- to h
				jQuery("form#eo_wbc_filter [name='_category']").val(jQuery("form#eo_wbc_filter [name='_current_category']"));
				ACTIVE_TODO_QC_END*/

				/*ACTIVE_TODO_QC_START 
				s: question aa flag bandh karavno evu recording ma kidhu chhe. and _attribute 25.35.3 approx recording confirm karavanu
				jQuery("form#eo_wbc_filter [name='_attribute']").val("");
				ACTIVE_TODO_QC_END*/

			}

		// }

		// if(type == 'template1' || type == 'template2') {

		// 	new code
		// 	from template1 template2
		// 	not in filter
		// 		commented permenetly 
		// 	var form=jQuery("form#eo_wbc_filter");
		// 	s: question from template1 template2 aa var niche chhe but sequence ma ahiya chhe
		// }
		
		// below code moved to eo_wbc_filter_render_html
		/*if(type == 'slick_table' || type == 'filter') {
		
			from slick_table filter
				to be made global 
			if(form.find('[name="html_destination"]').length>0) {

				render_container = form.find('[name="html_destination"]').val();
			}
		}*/

		// if(type == 'slick_table') {
		
		// 	from slick table 
		// 	not in filter
		// 		// NOTE: since now the filter_change is only one global function so no need to manage below logic. as long as above html destination is managed even the diamond quize will work just fine so commented.
		// 	if(form.find('[name="filter_native"]').length>0) {
		
		// 		// jQuery.fn.eo_wbc_filter_change_native(init_call,form_selector,render_container);
		// 		ACTIVE_TODO now we need to restructure this, need to find out why mahesh had to maintain native and so on separetely? is it stemming due to the diamond quiz flow? -- to h and -- to s 
		// 		window.document.splugins.filters.api.eo_wbc_filter_change_wrapper( init_call, form_selector );
		// 		return true;
		// 	}					

		// 	// NOTE: since now the tv data layer id disabled so now only one global ajax search call so below is commented
		// 	// jQuery.fn.eo_wbc_filter_change_native(init_call,form_selector,render_container);
		// }

		// from 1 after eo_wbc_filter_change_native call 
		
		// if(type == 'slick_table' ||  type == 'template1' || type == 'template2') {
			
		// 	from slick template1 template2
		// 	not in filter
			/*ACTIVE_TODO_QC_START
			--	below statment is commented because of the disabled data layer of tableview but if by any chance it create any issue then we may need to upgrad any applicable flow if required otherwise lets just delete it after 2nd revision
				--	we may face issue in dapii - for the notes
			ACTIVE_TODO_QC_END*/
			// jQuery(form).attr('method','POST');	
			/*ACTIVE_TODO_QC_START
			--	below disabled action is commented because of the disabled data layer of tableview but if by any chance it create any issue then we may need to upgrad any applicable flow if required otherwise lets just delete it after 2nd revision
			ACTIVE_TODO_QC_END*/
			// jQuery("[name*='action']").val("eo_wbc_e_tabview");

			//
			// from slick template1 template2
			// 	made global
			form_data=undefined;
		// }

		// --	we most likely need to serialize form in init call case also means when init call is true. -- to h & -- to s INVALID
			// --	but maybe instead of serializing entire form in init call which is against the old flow so instead of right now changing all the changing major flow we can simply consider passing the additional fields that we need to pass like those attribute related fields and category related is i think already covered so i think we can do that. -- to h & -- to s done
				// --	still maybe it is not either that much of concern if we serialize entire from because maybe things should just work still it is better idea that we go with the above option instead of this one. done
		// if(type == 'slick_table' || type == 'template1' || type == 'template2') {
			
			// from slick template1 template2
			// not in filter
			if(init_call)
			{
			
				/*ACTIVE_TODO_QC_START
				--	after the very 1st run we need to apply the necessary upgrads listed below
					--	which is appling the necessary settings of series 13, -- to s
						--	which are disabling override of _attribute and oter such attribute fields
						--	and same for all _category, current_category and so on fields
							--	which are a especially for the init_call flag 
							--	an addition to disabling to override we laso nees to pass the fields which are missing here from the serise 13 supported or required fields.
					--	and maybe after second revision we may like to pass entire form during page load init_call also --  to h 
				ACTIVE_TODO_QC_END*/
				// from slick template1 template2
				if( jQuery("[name='_category_query']").val() !== undefined && jQuery("[name='_category_query']").val().trim()=='' ) {
			
					_products_in = jQuery("[name='products_in']").val()
					
					// from slick template1 template2
					if(_products_in == undefined){
			
						_products_in = '';
					} else {
			
						_products_in = _products_in.trim();
					}

					// move to tableview -- to s
					// from slick template1 template2
					form_data={_current_category:jQuery("[name='_current_category']").val().trim(),action:jQuery("[name='action']").val().trim()/*'eo_wbc_e_tabview'*/,products_in:_products_in};

						// --	it seems that per page if in tableview prepare_query_data need to manage a little done 
						// --	and all the code should be moved to filter js? it seems so anyway done
					// NOTE: since we are not using apply filter notification so we are supposed to use here the hasClass condition but since below eo_wbc_page dropdown tag is already available so we had put condition based on that 
					if(/*eo_wbc_e_tabview.eo_table_view_per_page*/jQuery('[name="eo_wbc_page"]').length > 0){
			
						form_data.eo_wbc_page = jQuery('[name="eo_wbc_page"]').val();
					}
				}
				else
				{
					//form_data={_category:jQuery("[name='_category']").val().trim(),action:'eo_wbc_filter'};	


					// from slick and template1 and template2
					// move to tableview done -- to s
					form_data=jQuery("[name='_current_category'],[name='_category'],[name^='cat_filter_'],[name='action'],[name='products_in']").serialize();
					
					// from slick and template1 and template2
					// move to tableview done -- to s
					if(/*eo_wbc_e_tabview.eo_table_view_per_page*/jQuery('[name="eo_wbc_page"]').length > 0){

						form_data.eo_wbc_page = jQuery('[name="eo_wbc_page"]').val();
					}

				}
				
				if(jQuery("select[name='orderby']").length>0){
				
					// form_data.orderby=jQuery("select[name='orderby']:eq(0)").val();
					form_data.orderby = window.document.splugins.wbc.pagination.api.get_sort_dropdown_container().val();
				}

				// if(type == slick_table) {
					
					// --	below statment is commented because that is already covered in above if else.
					// from slick_table
					// form_data.action=jQuery("[name='action']").val().trim()/*'eo_wbc_e_tabview'*/;
				// }
			
			} else {	/*not in filter*/

				// from slick_table template1 template2 filter 
				form_data=form.serialize();

				if(/*eo_wbc_e_tabview.eo_table_view_per_page*/jQuery('[name="eo_wbc_page"]').length > 0){
				
					form_data+='&eo_wbc_page='+jQuery('[name="eo_wbc_page"]').val();
				}
				
				if(jQuery("select[name='orderby']").length>0){
				
					// form_data+='&orderby='+jQuery("select[name='orderby']:eq(0)").val();
					form_data+='&orderby='+window.document.splugins.wbc.pagination.api.get_sort_dropdown_container().val();
				}

				// if(type == 'template1' || type == 'template2') {
				
					// from template1 and template2
					/*move to tableview done -- to s
					if(jQuery("#tableview_order").val()!=='' && jQuery("#tableview_order_direction").val()!==''){
						form_data+='&tableview_order='+jQuery("#tableview_order").val();
						form_data+='&tableview_order_direction='+jQuery("#tableview_order_direction").val();
					}*/
				// } elseif(type == 'slick_table') {

					// move to tableview -- to s
					// from slick_table
					// form_data+='&action=eo_wbc_e_tabview';

					// --	below statment is commented because that is already covered in above serialize.
					// form_data+='&action='+jQuery("[name='action']").val().trim();
				// }

				// from filter
				// aa logic filter js ma ajax pachhi chhe so sequance maintain karavani reshe -- to s
				var site_url=eo_wbc_object.eo_cat_site_url;
				// var ajax_url = '';

				console.log("filter prepare_query_data site_url");
				console.log(site_url);


				if(jQuery('.filter_setting_advance_two_tabs .active').length > 0) {

					var url_split = site_url.split("?");

					var url_split_final = url_split[0].split("/");

					var url_segment_minus = 1;
					
					if( window.document.splugins.common.is_empty(url_split_final[url_split_final.length-1]) ) {

						url_segment_minus = 2;
					}

					if(window.document.splugins.common.current_theme_key == 'themes___purple_theme') {
						
						url_split_final[url_split_final.length-url_segment_minus] = jQuery('.filter_setting_advance_two_tabs li.active').data('category').trim(); 
					} else {

						url_split_final[url_split_final.length-url_segment_minus] = jQuery('.filter_setting_advance_two_tabs .active').data('category').trim(); 
					}


					if( site_url.indexOf("?") > -1 ){

						site_url = url_split_final.join("/")+"?"+url_split[1];
					} else {

						site_url = url_split_final.join("/");
					}

				}
				
				console.log(site_url);

				if(site_url.includes('?')) {
					
					console.log("filter prepare_query_data site_url if");
					ajax_url = site_url+eo_wbc_object.eo_cat_query;
				} else {

					console.log("filter prepare_query_data site_url else");
					ajax_url = site_url+'/?'+eo_wbc_object.eo_cat_query;
				}

				console.log(eo_wbc_object);	
			}

		// } else { this else is merged with above else

		// 	form_data = form.serialize();

		// 	from filter
		// 	aa logic filter js ma ajax pachhi chhe so sequance maintain karavani reshe -- to s
		// 	var site_url=eo_wbc_object.eo_cat_site_url;
		// 	var ajax_url = '';

		// 	if(site_url.includes('?')) {
				
		// 		ajax_url = site_url+eo_wbc_object.eo_cat_query;
		// 	} else {
				
		// 		ajax_url = site_url+'/?'+eo_wbc_object.eo_cat_query;
		// 	}

		// 	console.log(eo_wbc_object);	

		// }

		////////////////////////////////
		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
		// --add to be confirmed 2601 TO 2705--

		// if(init_call) {
		// 	ACTIVE_TODO this should be moved in pagination as soon as possible, next by 2nd revision -- to h & -- to a
		// 	jQuery("form#eo_wbc_filter [name='paged']").val('1');
		// 	jQuery("form#eo_wbc_filter [name='last_paged']").val('1');
		// 	jQuery("form#eo_wbc_filter [name='_category']").val(jQuery("form#eo_wbc_filter [name='_current_category']"));
		// 	s: question aa flag bandh karavno evu recording ma kidhu chhe. and _attribute 25.35 approx recording confirm karavanu
		// 	jQuery("form#eo_wbc_filter [name='_attribute']").val("");
		// }
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

		// success(data);

		// apply filter notification no more supported
		// var prepare_query_data_callback = null ;
        // window.document.splugins.events.api.apply_all_observer_filters( 'filters', 'prepare_query_data', {form_data:form_data, init_call:init_call }, prepare_query_data_callback );
		
		console.log("filter prepare_query_data return statment");
		console.log(ajax_url);

        return { form_data:form_data, ajax_url:ajax_url };

	};	
	
	// so here there will be those ajax callback functions like beforeSend, complete, success, error and so on? mostly yes so that we can call it from wrapper and especially put all the refactored code from different instances of ht eo_wbc_filter_change functions in here 
	var before_send = function(xhr, form_selector) {

    	console.log('filters [before_send]');

		// window.eo_wbc_object.enable_filter_table = false;
		// window.document.splugins.eo_wbc_object.enable_filter_table = false;
		
		// to avoide duplicate real time calls
		if(window.eo_wbc_object.hasOwnProperty('xhr')){
			window.eo_wbc_object.xhr.abort();
		}
		window.eo_wbc_object.xhr = xhr;
		window.document.splugins.eo_wbc_object.xhr = xhr;


		///////////////////////////
		// /var/www/html/drashti_project/27-05-2022/woocommerce-bundle-choice/asset/js/publics/eo_wbc_filter.js

		// window.eo_wbc_object.enable_filter = false;
		// window.document.splugins.eo_wbc_object.enable_filter = false;
		set_enable_filter_private(false);
		// console.log(this.url);

		// ACTIVE_TODO/TODO if ever required to manage or control any logic here in this function or in before send and so on function then we have planned and though out the flow of using even the flag classes like add class for any flag and then on the filter js means the base module the parent module in filter js the filter module in perticuler function for example should search and before send it should just check the hasclass condition with some generic class name. we have to confirm this flow once but this sounds like the idea. otherwise the other option is apply filter notification but we want to but we should simply avoid it if possible.
		// var before_send_callback = null ;
        // window.document.splugins.events.api.notifyAllObservers( 'filters', 'before_send', {}, before_send_callback, form_selector==null ? _this.$base_container : form_selector );

		///////////////////////////

		show_loader(form_selector);

	};

	// if apply_all_observer_filters notification has any issues for tableview callback requirements then callbacks passed in below parameters var can also work. -- to h
		// INVALID 
		// NOTE: callback is not sufficent for the fundamental flow here which requires independent event or notification like bindings where child extensions like tableview and so on do not need to remember once the bind the events remember anything else 

		// --  but still first check points and notes above related to callbacks flow that we planed -- to h done
	var eo_wbc_filter_change_wrapper_private = function(init_call, form_selector, render_container, parameters) {

    	console.log('filters [eo_wbc_filter_change_wrapper_private]');

		if( !should_search(init_call) ){

			return false;	
		
		}

		// sould_search();

		var pq_data = prepare_query_data(init_call, form_selector);

		console.log('filters eo_wbc_filter_change_wrapper_private pq_data');
		console.log(pq_data.ajax_url);
		console.log(pq_data.form_data);

		// sp_filter_request variable tv_template.js ma move karavano, if required -- to h & -- to s
		// 	INVALID
			// --	sp_filter_request aa flag slick ma flase set thay chhe biji koi js ma find nathi thato. [eo_wbc_e_tabview.eo_view_tabular && typeof(jQuery.fn.eo_wbc_filter_change_alt)===typeof(undefined)] aa if table_view_service() ma and tyathi flase set thay chhe.
			// 		NOTE: this var is not used anywhere but set only 2 times so this var is turned off completely.
		/*jQuery.fn.sp_filter_request = */jQuery.ajax(
		{	
			// --	below 2 params namely url and data will set from the object return from the prepare_query_data function above -- to h & -- to s done
				/*ACTIVE_TODO_QC_START
				--	now the below 2 parameters are updated, but the url below is now used of the wbc layer only and the tableview url logic is disabled like data layer is disabled so if we face any issue then should take note of this. otherwise remove ACTIVE_TODO by 3rd revision.
				ACTIVE_TODO_QC_END*/
			url: pq_data.ajax_url, //eo_wbc_object.eo_admin_ajax_url,//form.attr('action'),
			data: pq_data.form_data,//form_data, // form data
			type: 'GET', //'POST', // POST

			beforeSend:function(xhr) {

				console.log('filters [eo_wbc_filter_change_wrapper_private] beforeSend');
				console.log(this.url);
				before_send(xhr, form_selector);

			},

			success:function(data) {
				console.log('filters [eo_wbc_filter_change_wrapper_private] success');
				console.log(data);

				success(data, render_container, form_selector);	
			},
			// {

			// 	//console.log(data);
			// 	//document.write(data);
			// 	//jQuery("#loading").removeClass('loading');

			// 	//////// 02-04-2022 @shraddha /////// 
			// 	eo_wbc_e_render_table(type,data);	
			// 	window.eo_wbc_object.enable_filter_table = true;
			// 	// jQuery(".ui.sticky").sticky('refresh');
			// },
			error:function(data) {
			
				error(data, form_selector);
			},
			// {
			// 	jQuery("#loading").removeClass('loading');
			// 	console.log('error');
			// 	console.log(data);
			// 	window.eo_wbc_object.enable_filter_table = true;
			// },

			complete:function() {

				complete(form_selector);
			}

		} );	

		/*ACTIVE_TODO_OC_START
		double confirm that compatibility matters are well implemented so that their patches are actually applied and used when become necessary -- to s 
			--	and in that regard when compatibility patches are used then the normal default layer logic should be skipped or I think they are applied first and then compatibility so no need of skipping. but yeah still lets confirm all patches and their execution sequence. -- to s 
				--	and on this regard need to have proper conditions to run the patches only when necessary. but I think we can simply run patche all the time. this seems normal but lets atleast confirm all the patches to confirm that they are not causing any harm to our normal code execution. -- to s 
		ACTIVE_TODO_OC_END*/

				// --	before working on any of the below point, first comment entire eo_wbc_filter_render_html function which is now moved inside filters module. so just confirm everything from the outer function and then comment that -- to s (outside of filter module) done
						// --	then confirm that compatibility function call below and the compatibility which is also called from inside the eo_wbc_filter_render_html has any issue. -- to s done
				// --	and we of course can not call compatibility simply from here. so lets simply call from different places with right section key. like we have did in those two modules and for example the compatibility most likely need to be called before eo_wbc_filter_render_html call since inside compatibility eo_wbc_filter_render_html is called. -- to h and -- to s done
					// --	and remove the eo_wbc_filter_render_html call from inside the compatibility function. -- to s done
		// @s
		// compatability(section, object, expected_result);

		var eo_wbc_filter_change_wrapper_callback = null ;
        window.document.splugins.events.api.notifyAllObservers( 'filters', 'eo_wbc_filter_change_wrapper', {init_call:init_call}, eo_wbc_filter_change_wrapper_callback, form_selector==null ? _this.$base_container : form_selector );

		return true;

	};

	var complete = function(form_selector){
		
    	console.log('filters [complete]');
		
		// console.log(this.url);

		// NOTE: hide_loader is called from success and error also but in future we most likely will remove call from success and error function.
		hide_loader(form_selector);

		// added new on 26-09-2022
		set_enable_filter_private(true);

		var complete_callback = null ;
        window.document.splugins.events.api.notifyAllObservers( 'filters', 'complete', {}, complete_callback, form_selector==null ? _this.$base_container : form_selector );
	}; 

	var success = function(data, render_container, form_selector) {

    	console.log('filters [success]');
		console.log(render_container);

		//console.log(data);
		//document.write(data);
		//jQuery("#loading").removeClass('loading');
		// --	and this is called for the slick_table if block so is not the type should be slick_table here? discuss with shraddha -- to d 
		// 	-- rectify if there are any such similar issue

		//////// 02-04-2022 @shraddha /////// 
		// eo_wbc_e_render_table(data, type);	
		// window.eo_wbc_object.enable_filter_table = true;
		// jQuery(".ui.sticky").sticky('refresh');

		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
		// --add to be confirmed & 2187 TO 2324--

		// eo_wbc_e_render_table(data, type);	
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

		eo_wbc_filter_render_html(data, render_container, form_selector);

		// window.eo_wbc_object.enable_filter = true;
		// window.document.splugins.eo_wbc_object.enable_filter = true;
		set_enable_filter_private(true);

		/////////////////////////////
		var success_callback = null ;
        window.document.splugins.events.api.notifyAllObservers( 'filters', 'success', {data:data}, success_callback, form_selector==null ? _this.$base_container : form_selector );

	}; 

	var error = function(data, form_selector){

		// ACTIVE_TODO from tableview /// shraddha
		// window.eo_wbc_object.enable_filter_table = true;
		// window.document.splugins.eo_wbc_object.enable_filter_table = true;

		////////////////////////////
		// /var/www/html/drashti_project/27-05-2022/woocommerce-bundle-choice/asset/js/publics/eo_wbc_filter.js

		// window.eo_wbc_object.enable_filter = true;
		// window.document.splugins.eo_wbc_object.enable_filter = true;
		set_enable_filter_private(true);

		///////////////////////////////

		hide_loader(form_selector);

		var error_callback = null ;
        window.document.splugins.events.api.notifyAllObservers( 'filters', 'error', {}, error_callback, form_selector==null ? _this.$base_container : form_selector );
	};

	var update_result_count = function(render_container, data){

    	console.log('filters [update_result_count]');
		
		// create one function update_result_count in filters core js module -- to d done
		// --	and then move the below code in that -- to d done
		/*ACTIVE_TODO_OC_START
		--	and check all the change function implementation and move show related code in that function -- to d 
		--	I have some doubt the below condition's logic it is setting to empty when there is not result count container is returned. but I guess that is exceptional scenario which would never be happening but if it happens then we need to handle that exceptional scenario, so for now keeping it open and if no such thing show up after 1st or 2nd revision then remove this task ACTIVE_TODO -- to b 
		ACTIVE_TODO_OC_END*/
			// --	move above task comment also with the code -- to d done
					
		//Replace Result Count Status...
		if(jQuery('.woocommerce-result-count',jQuery(data)).html()!==undefined){
		
			if(jQuery(".woocommerce-result-count").length>0){
		
				jQuery(".woocommerce-result-count").html(jQuery('.woocommerce-result-count',jQuery(data)).html());
			} else {
		
				// jQuery(jQuery('.woocommerce-result-count',jQuery(render_data)).get(0).outerHTML).insertBefore('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products');
				jQuery(jQuery('.woocommerce-result-count',jQuery(data)).get(0).outerHTML).insertBefore(render_container);
			}
		}
		else {
		
			jQuery(".woocommerce-result-count").html('');	
		}
	};

    ///////////// -- 15-06-2022 -- @drashti -- ///////////////////////////////
    var compatability = function(section, object, expected_result, form_selector) {
    	
    	console.log('filters [compatability]');

    	// ACTIVE_TODO_OC_START
    	// do the call from where the below section is moved here, and if you already did the call then show and confirm with me -- to d 
    	// ACTIVE_TODO_OC_END
        if(section == 'product-listing'){

        	/*ACTIVE_TODO_OC_START
        	-- in final revision most probebly we need to comment below statment -- to h & to a
        	ACTIVE_TODO_OC_END*/

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

            /*ACTIVE_TODO_OC_START
            -- amathi code seprate thay ne pagination no je se te pagination na compatibility function ma jase -- to h & to a
            	-- but before that lets finish all that php side rendering and also toggleview click event implementation and than we can deside wich of below code need to be active since below code is for visibility hide show logic -- to h
            		-- and if we have to use below code and seprate beetwin this module and pagination module compatibility function than need to think about notification layer -- to h 
            // --- pagination module move this code ---
            // jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.woocommerce-pagination,.pagination,jet-filters-pagination').css('visibility','visible');
            // --- end ---
	            -- in final revision most probebly we need to comment below statment -- to h & to a
	        ACTIVE_TODO_OC_END*/
            window.document.splugins.wbc.pagination.api.init();

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
        // -- below else if copy moved to pagination module and most probebly it is added here by mistack so need to remove it during telly -- to a && -- to h
        // ACTIVE_TODO_OC_END
/*        else if(section == 'pagination_link_selector'){
	
	        console.log('jet-filters-pagination');

        	object = ',jet-filters-pagination';

        }*/else if(section == 'products-grid'){

        }else if(section == 'render_container'){

        	console.log("compatability inner else if");

			/*ACTIVE_TODO_OC_START
			-- aa if conditions tableview na badha selectore and calling sysuance joy ne confirm karvani se -- to a
			ACTIVE_TODO_OC_END*/

        	console.log(object.render_container);
        	console.log(object.render_container.length);
			if(object.render_container.length<=0) {
		
	        	console.log("compatability inner else if inner if");
				
				if(object.is_return_string_selector) {

					object.render_container_selector = ".elementor-products-grid";
					object.render_container = jQuery(".elementor-products-grid");
				} else {
					
					object.render_container = jQuery(".elementor-products-grid");
				}

				if(object.render_container.length<=0) {

		        	console.log("compatability inner else if inner if inner if");
					
					if(object.is_return_string_selector) {

						object.render_container_selector = ".jet-woo-products";
						object.render_container = jQuery(".jet-woo-products");
					} else {
						
						object.render_container = jQuery(".jet-woo-products");
					}


					// NOTE: theme specific patches any other generic patches should go above this if section 
					if(object.render_container.length<=0) {

			        	console.log("compatability inner else if inner if inner if themes patch");
						
						var selector_string_local = null; 

						if(window.document.splugins.common.current_theme_key == 'themes___dello-child') {

				        	console.log("compatability inner else if inner if inner if themes patch dello");

							selector_string_local = '.radiantthemes-shop';
						}else if(window.document.splugins.common.current_theme_key == 'themes___goldish-child') {

				        	console.log("compatability inner else if inner if inner if themes patch dello");

							selector_string_local = '.products,.c-product-grid__wrap';
						}

						if(object.is_return_string_selector) {

							object.render_container_selector = selector_string_local;
							object.render_container = jQuery(selector_string_local);
						} else {
							
							object.render_container = jQuery(selector_string_local);
						}

					}

				}

			}
        }

        console.log('jet-filters-pagination 1');
        console.log(section);
        console.log(object);

        var compatability_callback = null ;
        window.document.splugins.events.api.notifyAllObservers( 'filters', 'compatability', {}, compatability_callback, ( object!=null && window.document.splugins.common._o( _this.configs, 'form_selector' ) ) ? _this.$base_container : form_selector );
        
        console.log('jet-filters-pagination 2');
        console.log(object);

        return object;
    };

    var eo_wbc_filter_render_html = function(data, render_container, form_selector){

    	console.log('filters [eo_wbc_filter_render_html]');
		console.log(render_container);
		/*jQuery("#loading").removeClass('loading');
		return true;*/

		// if(type == 'slick_table' || type == 'filter') {
		
		// 	from slick_table filter
		// 		made global 
			/*ACTIVE_TODO_OC_START	
			related to serise 3
			ACTIVE_TODO_OC_END*/
			// NOTE: usualy below logic should be in result_container but since result_container is providing diffrent dynamics and implementing compatability patches so this logic should be better on normel layer like this where initial render_container is defined
			if(jQuery(form_selector).find('[name="html_destination"]').length>0) {

				render_container = jQuery(form_selector).find('[name="html_destination"]').val();
			}
		// }

		// render_data = data;
		_render_container = render_container;

		console.log("filter render_container_selector");
		console.log(_render_container);
		render_container_selector = result_container(_render_container, true);

		console.log("render_container_selector");
		console.log(render_container_selector);

		render_container = result_container(render_container);

		console.log("render_container after result_container log");
		console.log(render_container);


		/*ACTIVE_TODO_OC_START
		// create two function show_loader and hide_loader in filters core js module -- to d done
			// --	and then move the below code in the hide_loader -- to d done
			// --	and check all the change function implementation and move show related code in the show_loader function and hide related code in the hide_loader function -- to d done
			// --	needless to say but still note that the loader hide show event should be carefully called from each related search events like search, complete, error and maybe also some other which handle some particular scenarios. -- to d done
				--	so that what happen is that in future if the events namespace is firing the search or any related events around and if by any change any event that the filters module recieve is related to the show hide loader flow then that is taken care of implicitly.  
		// jQuery("#loading").removeClass('loading');

		ACTIVE_TODO_OC_END	*/
		// below code move in update_result_count function 
		/*//Replace Result Count Status...
		if(jQuery('.woocommerce-result-count',jQuery(data)).html()!==undefined){
			if(jQuery(".woocommerce-result-count").length>0){
				jQuery(".woocommerce-result-count").html(jQuery('.woocommerce-result-count',jQuery(data)).html());
			} else {
				jQuery(jQuery('.woocommerce-result-count',jQuery(render_data)).get(0).outerHTML).insertBefore('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products');
			}
		}
		else {
			jQuery(".woocommerce-result-count").html('');	
		}*/
		update_result_count(render_container, data);

		//Replacing Product listings....
		/*ACTIVE_TODO_OC_START
		like vars under window object are moved filter core js module, similarly move below var also to filters js module and underneath below statement set it in the filters js module -- to d 
		ACTIVE_TODO_OC_END*/
		document.wbc_data = data;
		window.document.splugins.wbc_data = data;
		
		/*console.log(data);*/
		/*ACTIVE_TODO_OC_START
		we can define a compatibility check flow, where the compatibility function will be available in each js module -- to d 
			-- that will recieve a object and second argument will be the excpected result. -- to d 
			-- if that is not matched then the compatibility function will apply its all available compatibility scenarios -- to d. like the below elementor-products-grid class statement would then go inside compatibility if. and .jet-woo-products also belong there, but let it be there and same for any js module layers where we have compatibility patch is mixed with basic/standard implementation statement to avoid the errors while separating them. 
		ACTIVE_TODO_OC_END*/

		// let container_html = jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products',jQuery(data)).html();	
		console.log("filter eo_wbc_filter_render_html container_html");
		console.log(render_container_selector);
		console.log(jQuery(data));
		let container_html = jQuery(render_container_selector/*render_container*/, jQuery(data)).html();	
		console.log("eo_wbc_filter_render_html container_html");
		console.log(container_html);

		/*if(container_html===undefined || container_html==='') {
			container_html = jQuery(jQuery(data),'.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products').html();
		}*/

		/*if(container_html===undefined || container_html==='') {
			// container_html = jQuery(".elementor-products-grid",jQuery(data)).html();
		}*/

		if(container_html!==undefined && container_html!=='') {	
			
			console.log("filter eo_wbc_filter_render_html container_html inner if");

			if( typeof(is_card_view_rendered) == undefined || typeof(is_card_view_rendered) == 'undefined' || is_card_view_rendered == false ) {
				
				console.log("filter eo_wbc_filter_render_html container_html inner if inner if");

				// if(jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products').length<=0) {
					// jQuery(render_container).html(container_html);
				// } else {
					// jQuery(render_container).html(container_html);
					set_archive_html(container_html, render_container);
				// }			
			}						
			else {
				/*ACTIVE_TODO_QC_START
				we need to track execution of this function so search in all 5 repos and confirm where this function is defined -- to d /woo-bundle-choice/application/view/publics/category.php
					--	and if that is found then only track above where is_card_view_rendered to see from which different locations it is defined and/or coming -- to d 
				// NOTE: It is not defined in eo_wbc_filter.js atleast, it is atleast created in /woo-bundle-choice/application/view/publics/category.php		
				ACTIVE_TODO_QC_END*/
						
				wbc_attach_card_views();
				
			}

			// ACTIVE_TODO as soon as we find the gallery_view_container or lopp box <a> container compatibility patche flow reliable and hop fully by secound revision. Than at that time let just apply on of that compatibility patch flow for this <a> links layer below -- to h & -- to a  
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
			/*ACTIVE_TODO_OC_START
			ACTIVE_TODO instead of determining if products are found or not on the js layer, it is really if we send a flag var from the php layer. so do it. in the dapii feed layers it is already like that but ensure that in wbc and tableview(in tableview also it is at least almost planned and roughly implemented) -- to h or -- to d 
			// 	ACTIVE_TODO commented below events subject creation, during testing only. so temporary only.
			ACTIVE_TODO_OC_END*/
			// window.document.splugins.wbc.filters.core.no_products_found();

			/*ACTIVE_TODO_OC_START
			// just move below line in the no_products_found function of the filters js module -- to d done
				--	and so now the render_container will recieve one parameter that is render_container, it will defaults to null so from where it is applicable it is passed otherwise it will be left blank -- to d 
			ACTIVE_TODO_OC_END*/
			// jQuery(render_container/*".products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products"*/).html('<p class="woocommerce-info" style="width: 100%;">No products were found matching your selection.</p>');	
			no_products_found_private(form_selector,render_container);
		}	

		/*ACTIVE_TODO_OC_START
		// if(render_container===".products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products"){
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
						// -- in init_private function first create the subject for observer pattern also -- to d done
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
							// --  but very soon maybe the tableview may not have its own pagination links dom if that is not necessary for it -- to h and -- to d done
						-- and for setting and getting current page_number 
							--	for it may simply need to use the pagination modules published api interface -- to d 
		ACTIVE_TODO_OC_END*/			
			// --- pagination module move this code ---
			// if(jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination',jQuery(data)).html()!==undefined) {
			// 	if(jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination').length>0){
			// 		jQuery(".woocommerce-pagination,.pagination,jet-filters-pagination").html(jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination',jQuery(data)).html());
			// 	} else {

			// 		@d once all the pagination related layers brought to this function, we need to check if the below incomplete implementation is completely implemented anywhere in our repo -- to d 
			// 			--	if not then test with the elementor created category feed page and also with elementor hello themes custom loop to check if it works. if not then must uncomment the last uncommented line and finish the implementation -- to d or -- to b 
			// 		let product_container = jQuery(".products:eq(0),.product-listing:eq(0),.row-inner>.col-lg-9:eq(0)");
			// 		if(product_container.length<=0) {
			// 			product_container = jQuery(".elementor-products-grid");
			// 			if(product_container.length<=0) {
			// 				product_container = jQuery(".elementor-widget-container").has('[data-elementor-type="loop"]');
			// 				if(product_container.length<=0) {
			// 					product_container = jQuery("[data-widget_type='archive-posts.archive_custom']");						
			// 				}
			// 			}
			// 		}
			// 		//jQuery(product_container).append('<nav class="woocommerce-pagination">'+jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination',jQuery(data)).html()+'</nav>');
			// 	}
			// }
			// else {
			// 	jQuery(".woocommerce-pagination,.pagination,jet-filters-pagination").html('');	
			// }
			// --- end ---				
		console.log('render_html set_pagination_html()');	
		window.document.splugins.wbc.pagination.api.set_pagination_html(data);

		/*}*/


		//jQuery("body").fadeTo('fast','1')									
		// jQuery("#loading").removeClass('loading');
		hide_loader(form_selector);


		// almost all of the below seems compatibility related to so move that to compatibility function, and at there we need to have section conditon like this would be broadly as product-listing -- to d done
			// --	you already moved below code, which I saw, but there is not comment below that it is moved so please let me know what is going on -- to d done 
		// below code block are moved in compatibility function
		// jQuery('.products:eq(0),.product-listing:eq(0),.row-inner>.col-lg-9:eq(0)').addClass('product_grid_view');
		// //jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.woocommerce-pagination,.pagination').css('visibility','visible');
		// if(jQuery(".row-inner>.col-lg-9").length>0){
		// 	jQuery(".row-inner>.col-lg-9 *").each(function(i,e) {		
		// 	    if(jQuery(e).css('opacity') == '0'){
		// 			jQuery(e).css('opacity','1');        
		// 	    }
		// 	});
		// 	jQuery(".t-entry-visual-overlay").removeClass('t-entry-visual-overlay');
		// 	jQuery(".do1uble-gutter .tmb").css('width','50%');
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

		var eo_wbc_filter_render_html_callback = null ;
        window.document.splugins.events.api.notifyAllObservers( 'filters', 'eo_wbc_filter_render_html', {}, eo_wbc_filter_render_html_callback, form_selector==null ? _this.$base_container : form_selector );

    };

    var show_loader = function(form_selector){

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

		// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/0..js
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
        // window.document.splugins.events.api.notifyAllObservers( 'filters', 'show_loader', {}, show_loader_callback );
        window.document.splugins.events.api.notifyAllObservers( 'filters', 'show_loader', {}, show_loader_callback, form_selector==null ? _this.$base_container : form_selector );

    };

    var hide_loader = function(form_selector){

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

		var hide_loader_callback = null ;
        window.document.splugins.events.api.notifyAllObservers( 'filters', 'hide_loader', {}, hide_loader_callback, form_selector==null ? _this.$base_container : form_selector );

    };

    var slider_init = function(){

    	$slider_element = jQuery('.ui.range.slider');
    
		for (var i = $slider_element.length - 1; i >= 0; i--) {
	    	
	    	min = jQuery($slider_element[i]).data('range-start');
	    	max = jQuery($slider_element[i]).data('range-end');    			

    		if(!window.document.splugins.common.is_empty(min) && !window.document.splugins.common.is_empty(max)){

	    		element = $slider_element[i];

				_p_sep = jQuery(element).attr('data-sep');
				_p_prefix = jQuery(element).data('prefix');
				if(typeof(_p_prefix) == typeof(undefined) || _p_prefix=='undefined'){
					_p_prefix = '';
				}

				_p_postfix = jQuery(element).data('postfix');
				if(typeof(_p_postfix) == typeof(undefined) || _p_postfix=='undefined'){
					_p_postfix = '';
				}

		    	jQuery("input[name='text_min_"+jQuery(element).attr('data-slug')+"']").val( _p_prefix+(_p_sep=='.'?Number(min).toFixed(2):(Number(min).toFixed(2)).toString().replace('.',','))+_p_postfix );
		    	jQuery("input[name='text_max_"+jQuery(element).attr('data-slug')+"']").val( _p_prefix+(_p_sep=='.'?Number(max).toFixed(2):(Number(max).toFixed(2)).toString().replace('.',','))+_p_postfix);

		    	jQuery(element).semanticSlider("set rangeValue",min,max);    			
    		}
		}

    };

    var on_reset_click_listener = function(form_selector){

	    /*ACTIVE_TODO_OC_START
	    -- all 7 demo(wp page) ma kya nathi -- to a	
    	-- jewellery demo ma Show Reset Filters Button ni switch enable kari pasi aa selectore male se and work kare se -- to a
    	ACTIVE_TODO_OC_END*/

    	jQuery(document).on('click',".reset_all_filters",function(){
	        
	        jQuery("[data-reset]").each(function(e){
	            
	            eval(jQuery(this).data('reset'));
	        });
	        
	        // jQuery.fn.eo_wbc_filter_change();
	        window.document.splugins.filters.api.eo_wbc_filter_change_wrapper();

        	return false;
		});

		////////////////////////

		// reset click event 
		/*ACTIVE_TODO_QC_START	
		there is critical flag handling in template1.js at line no:768 which is needed to be applied here as soon as possible -- to h & -- to s	
		ACTIVE_TODO_QC_END*/
		/*ACTIVE_TODO_OC_START
    	-- all 7 demo(wp page) ma kya nathi -- to a	
    	-- jewellery demo ma alternate filter widget change karya pasi pan aa selectore nathi malto -- to a
    	ACTIVE_TODO_OC_END*/

		jQuery(".eo_wbc_srch_btn:eq(2)").click(function(){					
			///////////////////////////////////////////
			document.forms.eo_wbc_filter.reset();
			jQuery(".eo_wbc_srch_btn:eq(2)").trigger('reset');
			jQuery("#eo_wbc_attr_query").val("");

			// jQuery('[name="paged"]').val('1');
			window.document.splugins.wbc.pagination.api.reset();

				/*ACTIVE_TODO_OC_START
				this logic is from template1 reset event but we may like to consider it for the router query layer support -- to h
				ACTIVE_TODO_OC_END*/
				jQuery("form#eo_wbc_filter [name='_category']").val(jQuery("form#eo_wbc_filter [name='_current_category']"));
			    jQuery("form#eo_wbc_filter [name='_attribute']").val("");



			// jQuery.fn.eo_wbc_filter_change(true);
			window.document.splugins.filters.api.eo_wbc_filter_change_wrapper(true, form_selector);
			// eo_wbc_filter_change_wrapper( true, form_selector );

		});	

		on_reset_click(form_selector);

		var on_reset_click_listener_callback = null ;
        window.document.splugins.events.api.notifyAllObservers( 'filters', 'on_reset_click_listener', {}, on_reset_click_listener_callback, form_selector==null ? _this.$base_container : form_selector );

    };

    var slider_change_event_listener = function(selector){

    	console.log('filters [slider_change_event_listener]');
		// --- move this code from woo-bundle-choice/application/view/publics/filters/form.php ---
		// --- start ---

		window.document.splugins = window.document.splugins || {};
		window.document.splugins.ui = window.document.splugins.ui || {};
		window.document.splugins.ui.slider = window.document.splugins.ui.slider || jQuery.fn.slider;
		
		// window.eo=new Object();

		//Slider creation function
		// window.eo.slider=function(selector){
		window.document.splugins.wbc.filters.filter_field.slider = function(selector){
 
			on_slider_change_event(selector, this);
		};
		// --- end ---

		if (window.document.splugins.common.current_theme_key != 'themes___purple_theme') {
		    window.document.splugins.wbc.filters.filter_field.slider(
		        jQuery('.eo-wbc-container.filters').find('.ui.slider')
		    );
		} else {
		    // added on 18-09-2023
		    setTimeout(function () {
		        console.log('filters [slider_change_event_listener] 1');
		        console.log(jQuery('.Top_Daimond_Btn_Content').find('.irs-hidden-input'));

		        window.document.splugins.wbc.filters.filter_field.slider(
		            jQuery('.Top_Daimond_Btn_Content').find('.irs-hidden-input')
		        );
		    }, 2000);
		}

    };

    var checkbox_change_event_listener = function(){

    	console.log('filters [checkbox_change_event_listener]');
		// --- move this code from woo-bundle-choice/application/view/publics/filters/form.php ---
		// --- start ---			
		if( typeof(jQuery.fn.checkbox) ==='function' ) {

			// --- compare_start (1) woo-bundle-choice/application/view/publics/filters/form.php ---
			jQuery('.checkbox').checkbox({onChange:function(event){			

				console.log('other theme checkbox_change_event_listener');
				on_checkbox_change_event(event, this);
			}});  				
            // --- compare_end ---			

		}
		// -- (2) sp-purple-woo-bundle-choice/application/view/publics/filters/load_desktop.php
		jQuery('.filter_checkbox').on('change',function(event){
		
			console.log('purple theme checkbox_change_event_listener');
			on_checkbox_change_event(event, this);
    	});   
		// --- end ---
    
    };

    var input_type_icon_click_listener = function() {

    	console.log('filters [input_type_icon_click_listener]');
    	// console.log(EO_WBC_FILTER_UI_ICON_TERM_SLUG);

    	if(typeof(EO_WBC_FILTER_UI_ICON_TERM_SLUG) != typeof(undefined) && !window.document.splugins.common.is_empty(EO_WBC_FILTER_UI_ICON_TERM_SLUG)) {
    		
    		console.log('input_type_icon_click_listener() 01');
	
	        jQuery( EO_WBC_FILTER_UI_ICON_TERM_SLUG ).each(function (i, term_slug) {

		    	// --- aa code woo-bundle-choice/application/model/publics/component/eowbc_filter_widget.php eo_wbc_filter_ui_icon() mathi move karyo se @a ---
		    	// --- start ---
		    	console.log(term_slug);
		    	if(term_slug){

					//TO BE FIXED LATER.
					/*jQuery('[data-filter="'+__data_filter_slug+'"]:not(.none_editable)').off();
					jQuery('[data-filter="'+__data_filter_slug+'"]:not(.none_editable)').on('click',function(e){*/
					// let filter_container = jQuery('form#<?php echo $this->filter_prefix; ?>eo_wbc_filter').parents().has('[data-filter="<?php echo $term->slug; ?>"]').get(0);
					let filter_container = jQuery('form#'+ _this.sub_configs.filter_prefix +'eo_wbc_filter').parents().has('[data-filter="'+ term_slug +'"]').get(0);

					jQuery(filter_container).find('[data-filter="'+"<?php echo $term->slug; ?>"+'"]:not(.none_editable)').off();
					// jQuery(filter_container).find('[data-filter="'+"<?php echo $term->slug; ?>"+'"]:not(.none_editable)').on('click',function(e){
					console.log('input_type_icon_click_listener() 011');
					console.log(filter_container);
					console.log('[data-filter="'+ term_slug +'"]');
					jQuery(filter_container).find('[data-filter="'+ term_slug +'"]:not(.none_editable)').on('click',function(e){
						
						console.log('input_type_icon_click_listener() 02');
						on_input_type_icon_click(e, this, term_slug);
						
					});
		    	}

				// --- end ---          
	        });   
    
    	} 	

    };

    var input_type_button_click_listener = function() {

   		console.log('input_type_button_click_listener()');

    	if(typeof(EO_WBC_FILTER_INPUT_BUTTON_FILTER_SLUG) != typeof(undefined) && !window.document.splugins.common.is_empty(EO_WBC_FILTER_INPUT_BUTTON_FILTER_SLUG)) {
    		
   			console.log('input_type_button_click_listener() 01');
	
	        jQuery( EO_WBC_FILTER_INPUT_BUTTON_FILTER_SLUG ).each(function (i, term_slug) {

		    	console.log(term_slug);
		    	if(term_slug){

			    	// --- aa code woo-bundle-choice/application/model/publics/component/eowbc_filter_widget.php input_button(); mathi move karyo se @a ---
			    	// --- start ---
					// $('[data-filter-slug="<?php echo $filter['slug']; ?>"]').on('click',function(event){
					jQuery('[data-filter-slug="'+ term_slug +'"]').on('click',function(event){
			    		
			    		on_input_type_button_click(event, this, term_slug);

					});
					// --- end ---					
		    	}

				// --- end ---          
	        });   
    
    	} 	

    };

    // --- move to filter_set module @a ---
  //   var on_filter_set_click_listener = function(){

  //   	on_filter_set_click();

		// var on_filter_set_click_listener_callback = null ;
  //       window.document.splugins.events.api.notifyAllObservers( 'filters', 'on_filter_set_click_listener', {}, on_filter_set_click_listener_callback );

  //   };

    var on_change_listener = function(form_selector){

    	if(!eo_wbc_object.btnfilter_now){			
			
			jQuery("#eo_wbc_filter").on('change',"input:not(:checkbox)",function(){
				
				on_change(form_selector);

			});
		}

		var on_change_listener_callback = null ;
        window.document.splugins.events.api.notifyAllObservers( 'filters', 'on_change_listener', {}, on_change_listener_callback, form_selector==null ? _this.$base_container : form_selector );

    };
 
    var on_reset_click = function(form_selector) {

    	reset_click(form_selector);

    };

    // --- move to filter_set module @a ---
    // var on_filter_set_click = function() {

    // 	filter_set_click();

    // };

    var on_change = function(form_selector) {

   		change(form_selector);

    };

    var on_slider_change_event = function(selector, element){
    	
    	console.log('filters [on_slider_change_event]');

    	slider_change_event(selector, element);
    };

    var on_checkbox_change_event = function(event, element){

    	checkbox_change_event(event, element);
    };

    var on_input_type_icon_click = function(e, element, term_slug) {

    	console.log('filters [on_input_type_icon_click]');

    	input_type_icon_click(e, element, term_slug);
    };

    var on_input_type_button_click = function(event, element, term_slug) {

    	input_type_button_click(event, element, term_slug);
    };
	    
    var reset_click = function(form_selector) {

    };

    // --- move to filter_set module @a ---
   //  var filter_set_click = function() {

   //     	window.document.splugins.events.api.subscribe_observer_filter('filters', 'wbc', 'filter_set_click');

   //  	--- aa code woo-bundle-choice/application/view/publics/filters/two_tabs.php mathi move karyo se @a ---
 		// --- start ---
 		
 		// let group_id_alt = $(this).data('tab-altname');
   //      $('[data-tab-group="'+group_id_alt+'"]').css('display','none');

   //      $('[data-tab-group="'+group_id_alt+'"]').each(function(){
   //        let reset_script = $(this).find('[data-reset]').data('reset');
   //        if(typeof(reset_script)!==typeof(undefined) && reset_script!=''){
   //          eval(reset_script);
   //        }        

   //        <?php if(wp_is_mobile() and !wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile')): ?>
   //          if($(this).hasClass('active')){
   //            $(this).trigger('click');
   //          }
   //          reset_script = $(this).next().find('[data-reset]').data('reset');
   //          if(typeof(reset_script)!==typeof(undefined) && reset_script!=''){
   //            eval(reset_script);
   //          }        
   //        <?php endif; ?>

   //        <?php if(wp_is_mobile() and wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile')): ?>
   //          if($(this).hasClass('active')){
   //            $(this).trigger('click');
   //          }          
            
   //          reset_script = $(this).next().find('[data-reset]').data('reset');
   //          if(typeof(reset_script)!==typeof(undefined) && reset_script!=''){
   //            eval(reset_script);
   //          }  

   //          jQuery(".close_sticky_mob_filter").trigger('click');

   //        <?php endif; ?>

          
   //      });

   //      <?php if(wp_is_mobile() and wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile')): ?>
   //        $('#advance_filter_mob_alternate').removeClass('status_hidden');
   //        $(".toggle_sticky_mob_filter.advance_filter_mob[data-tab-group='"+$(this).data('tab-altname')+"'],.toggle_sticky_mob_filter.advance_filter_mob[data-tab-group='']").hide();
   //      <?php endif; ?>    

   //      jQuery.fn.eo_wbc_filter_change(false,'form#<?php echo $filter_ui->filter_prefix; ?>eo_wbc_filter','',{'this':this,'event':event});
   //      --- end ---	

   //  };

    var change = function(form_selector) {

    	// jQuery('[name="paged"]').val('1');
		window.document.splugins.wbc.pagination.api.reset();

		// jQuery.fn.eo_wbc_filter_change();
		window.document.splugins.filters.api.eo_wbc_filter_change_wrapper();
		// eo_wbc_filter_change_wrapper();
    };

    var init_advance_filter_accordian = function(){

		if(jQuery.fn.hasOwnProperty('accordion') && typeof(jQuery.fn.accordion)==='function'){
			jQuery( ".eo_wbc_advance_filter" ).accordion({
			  collapsible: true,
			  active:false
			});
		}

    };

    var result_container = function(render_container, is_return_string_selector = false) {

    	console.log('filters [result_container]');
		console.log(render_container);

		var render_container_selector = render_container;

		// TODO maybe we simply need to drop the first empty string condition below and only keep the is empty condition. not sure why m add earlier used === for empty string check.
    	if( render_container==='' || window.document.splugins.common.is_empty(render_container) ) {

			console.log("filter result_container inner if");
			render_container = ".products:eq(0),.product-listing:eq(0),.row-inner>.col-lg-9:eq(0)";
			// -- move to compatability() @a --
			// if(render_container.length<=0) {
			// 	render_container = jQuery(".elementor-products-grid");
			// }
		}

		if(is_return_string_selector) {

			render_container_selector = render_container;
		}

		render_container = jQuery(render_container);

		var result_obj = compatability('render_container', {render_container:render_container, render_container_selector:render_container_selector, is_return_string_selector:is_return_string_selector}, 1);

		console.log("result_obj.render_container_selector");
		console.log(result_obj);

		if(is_return_string_selector) {
		
			return result_obj.render_container_selector;
		} else {

			return result_obj.render_container;
		}

    }; 

    var no_products_found_private = function(form_selector,render_container) {

    	// ACTIVE_TODO_OC_START
    	// create private counter part of the no_products_found function with name no_products_found_private, so that the inner private layers can call that internally -- to d 
    	// 	--	and move below code there and from here just call that private fucntion -- to d 
    	// ACTIVE_TODO_OC_END	

		// window.document.splugins.Feed.events.core.notifyAllObservers( 'filters', 'no_products_found' );

		jQuery(render_container/*".products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products"*/).html('<p class="woocommerce-info" style="width: 100%;">No products were found matching your selection.</p>');	

		var no_products_found_callback = null;
		window.document.splugins.events.api.notifyAllObservers( 'filters', 'no_products_found', {}, no_products_found_callback, form_selector==null ? _this.$base_container : form_selector );

		/*ACTIVE_TODO_OC_START
		-- aa je code move karyo se te upper code se tena jovo j se @a--
			// --- aa code sp_tableview/asset/js/publics/sp_tableview.js ma window.document.splugins.sp_tv.template.render_private() mathi move karyo se ---
			// --- start ---
			--	execute filters task -- to a 
				--	it will mostly involve making sure that if there are any selectors or compatibility matters that wbc filter js module does not have then that is moved there if that is grid view or legacy standard flows specific -- to a 
		ACTIVE_TODO_OC_END*/
			jQuery(".products:eq(0),.product-listing:eq(0),.row-inner>.col-lg-9:eq(0)").html('<p class="woocommerce-info" style="width: 100%;display:table;">No products were found matching your selection.</p>');		
			// --- end ---

			// --- aa code sp_tableview/asset/js/publics/sp_tableview.js ma window.document.splugins.sp_tv.template.render_private() mathi move karyo se ---
			// --- start ---
			jQuery(".products:eq(0),.product-listing:eq(0),.row-inner>.col-lg-9:eq(0)").html('<p class="woocommerce-info" style="width: 100%;display:table;">No products were found matching your selection.</p>');
			// --- end ---

    };

    var get_enable_filter = function() {

    	return window.document.splugins.eo_wbc_object.enable_filter/*window.eo_wbc_object.enable_filter*/;
    };

    var set_enable_filter_private = function(value) {

    	console.log('filters [set_enable_filter_private]');

		console.log("filter module set_enable_filter_private before_ "+get_enable_filter()); 	

    	window.eo_wbc_object.enable_filter = window.eo_wbc_object.enable_filter || value;
    	window.document.splugins.eo_wbc_object.enable_filter = window.document.splugins.eo_wbc_object.enable_filter || value;
    	
    	window.eo_wbc_object.enable_filter = value;
    	window.document.splugins.eo_wbc_object.enable_filter = value;

		console.log("filter module set_enable_filter_private after "+get_enable_filter()); 	
    };

    var temp_result_clone_div = function() {

        _this.$temp_result_clone_div = jQuery('<div />').appendTo('body');
        // _this.$temp_result_clone_div.attr('id', 'splugins_temp_result_clone_div');  
        _this.$temp_result_clone_div.hide();  

    };

    var get_archive_html = function() {
    	// TODO implement when required
    };

    var set_archive_html = function(html, render_container=null) {

    	console.log('filters [set_archive_html]');
    
    	if(render_container == null) {

			console.log("set_archive_html 1");
    		render_container = result_container();
    	}

    	// ACTIVE_TODO temp. below logic is temp. remove it as soon as we make sure that sp_tv js templates are rendered outside archive container. -- to h & -- to s
    	if( window.document.splugins.common.is_empty(_this.$temp_result_clone_div) ) {

    		temp_result_clone_div();

    		_this.$temp_result_clone_div.html(jQuery(render_container).html());
    	}

		console.log("set_archive_html");
		console.log(render_container);
		console.log(html);
    	jQuery(render_container).html(html);
    	
    };
    
    var slider_change_event = function(selector, element){

    	console.log('filters [slider_change_event]');
    	console.log(selector);
    	
    	let slider = {};
		slider.params = [];
		slider.element = [];
		
		jQuery(selector).each(function(i,e){

	    	console.log('slider_change_event loop');

			_min = Number(jQuery(e).attr('data-min'));						
			_max = Number(jQuery(e).attr('data-max'));												
			_labels = jQuery(e).attr('data-labels');						

			_params=new Object();												
									
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
							// _label_max_length = <?php _e((int)wbc()->options->get_option('filters_'.$filter_prefix.'filter_setting','filter_setting_slider_max_lblsize',6)) ?>;
							_label_max_length = _this.sub_configs.filter_setting_slider_max_lblsize;
						}								

						if(_label_value.length>_label_max_length){
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

				__slugs = jQuery(e).attr('data-slugs');
				
				if(typeof __slugs != typeof undefined && __slugs != false){
					//PASS
				} else {
					_sep = jQuery(e).attr('data-sep');
					_prefix = jQuery(this/*element*/).data('prefix');
					if(typeof(_prefix) == typeof(undefined) || _prefix=='undefined'){
						_prefix = '';
					}

					_postfix = jQuery(this/*element*/).data('postfix');
					if(typeof(_postfix) == typeof(undefined) || _postfix=='undefined'){
						_postfix = '';
					}

		        	jQuery("input[name='text_min_"+jQuery(e).attr('data-slug')+"']").val( _prefix+(_sep=='.'?Number(min).toFixed(2):(Number(min).toFixed(2)).toString().replace('.',','))+_postfix );
		        	jQuery("input[name='text_max_"+jQuery(e).attr('data-slug')+"']").val( _prefix+(_sep=='.'?Number(max).toFixed(2):(Number(max).toFixed(2)).toString().replace('.',','))+_postfix);
		        }					      	
			};

			_params.onChange=function(value, min, max) {	
				console.log('_params.onChange');
				_labels = jQuery(e).attr('data-labels');
				__slugs = jQuery(e).attr('data-slugs');
				
				_min = Number (jQuery(e).attr('data-min'));						
				_max = Number(jQuery(e).attr('data-max'));
				_sep = jQuery(e).attr('data-sep');

				console.log(min,_min,max,_max);

				if(typeof _labels != typeof undefined && _labels != false){
					_labels=_labels.split(',');
					_min=0;
					_max=_labels.length-1;
				}
				console.log('slider_change_event loop onChange');
				console.log(jQuery(this/*element*/));
				console.log(value);
				if(
					(
						(jQuery(this/*element*/).data('prev_val_min')!=min && jQuery(this/*element*/).data('prev_val_min')!=undefined)
						|| 
						(jQuery(this/*element*/).data('prev_val_max')!=max && jQuery(this/*element*/).data('prev_val_max')!=undefined)
					)
					||
					( min!=_min || max!=_max )
				){

					if(typeof __slugs != typeof undefined && __slugs != false){
							
						jQuery("input[name='min_"+jQuery(e).attr('data-slug')+"']").val(__slugs.split(',')[min]);
			        	jQuery("input[name='max_"+jQuery(e).attr('data-slug')+"']").val(__slugs.split(',')[max]);

					} else {

			        	jQuery("input[name='min_"+jQuery(e).attr('data-slug')+"']").val(Number(min).toFixed(2));
			        	jQuery("input[name='max_"+jQuery(e).attr('data-slug')+"']").val(Number(max).toFixed(2));
			        }

			        console.log("slider_change_event above price");

			        if(jQuery(this/*element*/).attr('data-slug')!='price'){
				    	//Action of notifying filter change when changes are done.
			        	
			        	console.log("slider_change_event inner price");
				    	console.log(jQuery(this/*element*/).attr('data-min'));

				    	if(jQuery(this/*element*/).attr('data-min')==min && jQuery(this/*element*/).attr('data-max')==max) {

					        console.log("slider_change_event above name = _attribute");

				    		if(jQuery("[name='_attribute']").val().includes(jQuery(this/*element*/).attr('data-slug'))) {
				    			
				    			_values=jQuery("[name='_attribute']").val().split(',')
				    			_index=_values.indexOf(jQuery(this/*element*/).attr('data-slug'))
				    			_values.splice(_index,1)
				    			jQuery("[name='_attribute']").val(_values.join());
				    		}
				    	}
				    	else {
				    		if(! jQuery("[name='_attribute']").val().includes(jQuery(this/*element*/).attr('data-slug'))) {
				    			_values=jQuery("[name='_attribute']").val().split(',')
				    			_values.push(jQuery(this/*element*/).attr('data-slug'))
				    			jQuery("[name='_attribute']").val(_values.join())
				    		}
				    	}
			    	}
			    	// jQuery('[name="paged"]').val('1');
			    	window.document.splugins.wbc.pagination.api.reset();


			    	// <?php if(empty(wbc()->options->get_option('filters_'.$filter_prefix.'filter_setting','filter_setting_btnfilter_now'))): ?>
			    	if(_this.sub_configs.filter_setting_btnfilter_now != 'filter_setting_btnfilter_now'){

				    	//////// 27-05-2022 - @drashti /////////
						// --add to be confirmed--

						// window.document.splugins.wbc.filters.api.eo_wbc_filter_change_wrapper(false,'form#<?php echo $filter_ui->filter_prefix; ?>eo_wbc_filter','',{'this':this,'event':new Event('change',this)});
						window.document.splugins.wbc.filters.api.eo_wbc_filter_change_wrapper(false,'form#'+ _this.sub_configs.filter_prefix +'eo_wbc_filter','',{'this':this/*element*/,'event':new Event('change',this/*element*/)});
				    	// jQuery.fn.eo_wbc_filter_change(false,'form#<?php /*echo $filter_ui->filter_prefix;*/ ?>eo_wbc_filter','',{'this':this,'event':new Event('change',this)});
						////////////////////////////////////////

			    	// <?php endif; ?>
			    	}
			    } else if( min==_min && max==_max ){
			    	if(jQuery(this/*element*/).attr('data-slug')!='price'){
				    	//Action of notifying filter change when changes are done.						    	
			    		if(jQuery("[name='_attribute']").val().includes(jQuery(this/*element*/).attr('data-slug'))) {
			    			
			    			_values=jQuery("[name='_attribute']").val().split(',')
			    			_index=_values.indexOf(jQuery(this/*element*/).attr('data-slug'))
			    			_values.splice(_index,1)
			    			jQuery("[name='_attribute']").val(_values.join());
			    		}
			    	}
			    }
			    
			    jQuery(this/*element*/).data('prev_val_min',min);						    
			    jQuery(this/*element*/).data('prev_val_max',max);
			};
			
			let _adjust_label = jQuery(this/*element*/).data('label_adjust');
			
			if(_adjust_label!=1 && jQuery(this/*element*/).hasClass('labeled')){
				
				_params.autoAdjustLabels=false;	
			}					
			
			jQuery(jQuery(e).attr('data-bind-min')).change(function() {				    

				common_slider_change_event(e);
			});

			jQuery(jQuery(e).attr('data-bind-max')).change(function() {				    

				common_slider_change_event(e);
			});

			jQuery("input.text_slider_"+jQuery(e).attr('data-slug')).change(function() {				    

				// -- move to common_slider_change_event()
				// //jQuery("#text_slider_"+jQuery(e).attr('data-slug')).slider("set rangeValue",jQuery("[name=min_"+jQuery(e).attr('data-slug')+"]").val(),jQuery("[name=max_"+jQuery(e).attr('data-slug')+"]").val());

				// let prefix = jQuery(e).attr('data-prefix');
				// let postfix = jQuery(e).attr('data-postfix');
				
				// let min_value = jQuery("[name='text_min_"+jQuery(e).attr('data-slug')+"']").val();
				
				// let max_value = jQuery("[name='text_max_"+jQuery(e).attr('data-slug')+"']").val();
				
				// if(prefix!=='' && typeof(prefix)!==typeof(undefined) && prefix.hasOwnProperty('length')){
				// 	if(min_value.includes(prefix)){
				// 		min_value = min_value.slice(prefix.length);	
				// 	}							
				// 	if(max_value.includes(prefix)){
				// 		max_value = max_value.slice(prefix.length);
				// 	}
				// }

				// if(postfix!=='' && typeof(postfix)!==typeof(undefined) && postfix.hasOwnProperty('length')){
				// 	if(min_value.includes(postfix)){
				// 		min_value = min_value.slice(0,-1*postfix.length);
				// 	}
				// 	if(min_value.includes(postfix)){
				// 		max_value = max_value.slice(0,-1*postfix.length);
				// 	}
				// }

				// jQuery("#text_slider_"+jQuery(e).attr('data-slug')).slider("set rangeValue",min_value,max_value);

				common_slider_change_event(e);
			});

			let ui_slider = jQuery.fn.slider;

			jQuery.fn.slider = window.document.splugins.ui.slider;
			
	    	console.log('slider_change_event loop 01');
			console.log(e);
			console.log(_params);
			
			// ACTIVE_TODO temp. added on 30-11-2022. remove as soon as the standerd fix is ready. 
			if(window.document.splugins.common.current_theme_key != 'themes___alpha-store-pro-child' && window.document.splugins.common.current_theme_key != 'themes___maia-child' && window.document.splugins.common.current_theme_key != 'themes___moonte-child' && window.document.splugins.common.current_theme_key != 'themes___frank-jewelry-store' && window.document.splugins.common.current_theme_key != 'themes___merchandiser-child'){		
				
				console.log('if jQuery(e).slider(_params) call');

				// purple theme mate aa permenent alag if se tenu slider alag ave se atle. So aa permanant if condition se and koi temp. temparary if nathi.
				if(window.document.splugins.common.current_theme_key != 'themes___purple_theme') {
					// jQuery(e).slider(_params);
					jQuery(e).semanticSlider(_params);
				}
			}else{
				
				console.log('else temp_patch_slider_change_event_child call');
				
				slider.params.push(_params);
				slider.element.push(e);
			}
			
			
			jQuery.fn.slider = ui_slider;

		});
	
		// ACTIVE_TODO temp. added on 30-11-2022. remove as soon as the standerd fix is ready. 
		if(window.document.splugins.common.current_theme_key == 'themes___alpha-store-pro-child' || window.document.splugins.common.current_theme_key == 'themes___maia-child' || window.document.splugins.common.current_theme_key == 'themes___moonte-child' || window.document.splugins.common.current_theme_key == 'themes___frank-jewelry-store' || window.document.splugins.common.current_theme_key == 'themes___merchandiser-child') {
			
			console.log('if temp_patch_slider_change_event_child call');

			temp_patch_slider_change_event_child(slider);
		}

    };

    var common_slider_change_event = function(e) {

		console.log('slider_change_event loop 1 change');
		console.log("input.text_slider_"+jQuery(e).attr('data-slug'));
		//jQuery("#text_slider_"+jQuery(e).attr('data-slug')).slider("set rangeValue",jQuery("[name=min_"+jQuery(e).attr('data-slug')+"]").val(),jQuery("[name=max_"+jQuery(e).attr('data-slug')+"]").val());

		let prefix = jQuery(e).attr('data-prefix');
		let postfix = jQuery(e).attr('data-postfix');
		
		let min_value = jQuery("[name='text_min_"+jQuery(e).attr('data-slug')+"']").val();
		
		let max_value = jQuery("[name='text_max_"+jQuery(e).attr('data-slug')+"']").val();
		
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

				// console.log('filters [common_slider_change_event] if 2 if 2');
				
				max_value = max_value.slice(0,-1*postfix.length);
			}
		}

		if(window.document.splugins.common.current_theme_key != 'themes___purple_theme') {

			jQuery("#text_slider_"+jQuery(e).attr('data-slug')).semanticSlider("set rangeValue",min_value,max_value);
		}else{
			
			var sliderData = jQuery(e).data("ionRangeSlider").result;
			
			jQuery(e).data("ionRangeSlider").options.onFinish(sliderData);

		}

    }

	// ACTIVE_TODO temp. added on 30-11-2022. remove as soon as the standerd fix is ready. 
    var temp_patch_slider_change_event_child = function(slider) {
		
    	console.log('filters [temp_patch_slider_change_event_child]');

		jQuery.getScript(window.document.splugins.common.site_url+'/wp-content/plugins/woo-bundle-choice/asset/js/fomantic/semantic.min.js?ver=5.0.10', function(data, status, jqxhr) {
	
	    	for (let i = 0; i < slider.element.length; i++) {

				console.log(slider.params[i]);	
				jQuery(slider.element[i]).semanticSlider(slider.params[i]);
			}	

		});

    };

    var checkbox_change_event = function(event, element){

		/*__slug=jQuery(this).attr('data-filter-slug');

		if(__slug=='' || typeof(__slug)===typeof(undefined)){
			return true;
		}					

		_values= Array();
		jQuery('[data-filter-slug="'+__slug+'"]:checked').each(function(index,item){ 
			_values.push(jQuery(item).attr('data-slug'));
		});

		jQuery('#checklist_'+__slug).val(_values.join());

		if( ( jQuery('.checklist_'+__slug+':checkbox').length==jQuery('.checklist_'+__slug+':checkbox:checked').length)  || (jQuery('.checklist_'+__slug+':checkbox:checked').length==0) ) {

    		if(jQuery("[name='_attribute']").val().includes(__slug)) {
    			
    			_values=jQuery("[name='_attribute']").val().split(',')
    			_index=_values.indexOf(__slug)			    			
    			_values.splice(_index,1)				    			
    			jQuery("[name='_attribute']").val(_values.join());
    		}
    	}
    	else {
    		if(! jQuery("[name='_attribute']").val().includes(__slug)) {
    			_values=jQuery("[name='_attribute']").val().split(',')
    			_values.push(__slug)
    			jQuery("[name='_attribute']").val(_values.join())
    		}
    	}*/

		__slug=jQuery(element).attr('data-filter-slug');

		if(__slug=='' || typeof(__slug)===typeof(undefined)){
			return true;
		}					

		_values= Array();
		if(jQuery('[name="checklist_'+__slug+'"]').length>0 && typeof(jQuery('[name="checklist_'+__slug+'"]').val()) !== typeof(undefined)){
			_values = jQuery('[name="checklist_'+__slug+'"]').val().split(',');	
		}				

		if(_values.indexOf(jQuery(element).attr('data-slug'))!=-1){

			_values=jQuery('[name="checklist_'+__slug+'"]').val().split(',');
			_index=_values.indexOf(jQuery(element).attr('data-slug'));
			_values.splice(_index,1);						
			jQuery('[name="checklist_'+__slug+'"]').val(_values.join());

		} else {

			_values=jQuery('[name="checklist_'+__slug+'"]').val().split(',');
			_values.push(jQuery(element).attr('data-slug'));
			jQuery('[name="checklist_'+__slug+'"]').val(_values.join());
		}
		
		if( ( jQuery('.checklist_'+__slug+':checkbox').length==jQuery('.checklist_'+__slug+':checkbox:checked').length)  || (jQuery('.checklist_'+__slug+':checkbox:checked').length==0) ) {

    		if(jQuery("[name='_attribute']").val().includes(__slug)) {
    			
    			_values=jQuery("[name='_attribute']").val().split(',')
    			_index=_values.indexOf(__slug)			    			
    			_values.splice(_index,1)				    			
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
    	// jQuery('[name="paged"]').val('1');
    	window.document.splugins.wbc.pagination.api.reset();
    	
    	// <?php if(empty(wbc()->options->get_option('filters_'.$filter_prefix.'filter_setting','filter_setting_btnfilter_now'))): ?>
    	if(_this.sub_configs.filter_setting_btnfilter_now != 'filter_setting_btnfilter_now'){

	    	//////// 27-05-2022 - @drashti /////////
			// --add to be confirmed--

			// --- compare_start (1) woo-bundle-choice/application/view/publics/filters/form.php ---
			// window.document.splugins.wbc.filters.api.eo_wbc_filter_change_wrapper(false,'form#<?php echo $filter_ui->filter_prefix; ?>eo_wbc_filter','',{'this':this,'event':event});
			window.document.splugins.wbc.filters.api.eo_wbc_filter_change_wrapper(false,'form#'+ _this.sub_configs.filter_prefix +'eo_wbc_filter','',{'this':element,'event':event});
	    	// jQuery.fn.eo_wbc_filter_change(false,'form#<?php/* echo $filter_ui->filter_prefix;*/ ?>eo_wbc_filter','',{'this':this,'event':event});
			////////////////////////////////////////

			// -- (2) sp-purple-woo-bundle-choice/application/view/publics/filters/load_desktop.php
            // jQuery.fn.eo_wbc_filter_change(false,'form#<?php echo $filter_ui->filter_prefix; ?>eo_wbc_filter','',{'this':this,'event':event});
            // -- temp comment ---
            // jQuery.fn.eo_wbc_filter_change(false,'form#'+ _this.sub_configs.filter_prefix +'eo_wbc_filter','',{'this':this,'event':event});
            // -- temp comment end---
            // --- compare_end ---
    	// <?php endif; ?>
    	}			

    };

    var input_type_icon_click = function(e, element, term_slug) {

    	console.log('filters [input_type_icon_click]');
		event = e;
		
		e.stopPropagation();
		e.preventDefault();

		var icon_filter_type = jQuery(/*this*/element).attr('data-type');
		var filter_name = jQuery(/*this*/element).attr('data-filter');

		var filter_list= undefined;
		var filter_target = undefined;
		
		console.log(icon_filter_type);
		if(icon_filter_type == 1) {
			/*filter_list = jQuery('[name="checklist_'+__data_filter_slug+'"]');*/
			// filter_list = jQuery('form#<?php echo $this->filter_prefix; ?>eo_wbc_filter [name="checklist_'+"<?php echo $term->slug; ?>"+'"]');
			filter_list = jQuery('form#'+ _this.sub_configs.filter_prefix +'eo_wbc_filter [name="checklist_'+ term_slug +'"]');

			// filter_target = jQuery('form#<?php echo $this->filter_prefix; ?>eo_wbc_filter [name="_attribute"]');
			filter_target = jQuery('form#'+ _this.sub_configs.filter_prefix +'eo_wbc_filter [name="_attribute"]');

			/*console.log(jQuery('[name="checklist_'+__data_filter_slug+'"]'));*/
			console.log(jQuery('form#'+ _this.sub_configs.filter_prefix +'eo_wbc_filter [name="checklist_'+ term_slug +'"]'));

			console.log(jQuery('form#'+ _this.sub_configs.filter_prefix +'eo_wbc_filter [name="_attribute"]'));
		} else {
			/*filter_list = jQuery('[name="cat_filter_'+__data_filter_slug+'"]');*/
			// filter_list = jQuery('form#<?php echo $this->filter_prefix; ?>eo_wbc_filter [name="cat_filter_'+"<?php echo $term->slug; ?>"+'"]');
			filter_list = jQuery('form#'+ _this.sub_configs.filter_prefix +'eo_wbc_filter [name="cat_filter_'+ term_slug +'"]');

			// filter_target = jQuery('form#<?php echo $this->filter_prefix; ?>eo_wbc_filter [name="_category"]');
			filter_target = jQuery('form#'+ _this.sub_configs.filter_prefix +'eo_wbc_filter [name="_category"]');
		}

		let is_single_select = jQuery(/*this*/element).data('single_select');
		if(typeof(is_single_select) !== typeof(undefined) && is_single_select==1){
			// jQuery('form#<?php echo $this->filter_prefix; ?>eo_wbc_filter [data-filter="'+"<?php echo $term->slug; ?>"+'"]:not(.none_editable)').removeClass('eo_wbc_filter_icon_select');
			jQuery('form#'+ _this.sub_configs.filter_prefix +'eo_wbc_filter [data-filter="'+ term_slug +'"]:not(.none_editable)').removeClass('eo_wbc_filter_icon_select');

			// let toggleable_selections = jQuery('form#<?php echo $this->filter_prefix; ?>eo_wbc_filter .toggled_image[data-filter="'+"<?php echo $term->slug; ?>"+'"]:not(.none_editable)');
			let toggleable_selections = jQuery('form#'+ _this.sub_configs.filter_prefix +'eo_wbc_filter .toggled_image[data-filter="'+ term_slug +'"]:not(.none_editable)');

			console.log(toggleable_selections);
			if(typeof(toggleable_selections)!==typeof(undefined) && toggleable_selections.length>0){
				
				jQuery.fn.wbc_flip_toggle_image(toggleable_selections[0]);
			}							
			filter_list.val(jQuery(/*this*/element).attr("data-slug"));
		} else {							

			if(filter_list.val().includes(jQuery(/*this*/element).attr('data-slug'))){

				let filter_list_items = filter_list.val().split(',');
				let this_slug = jQuery(/*this*/element).attr('data-slug').trim();

				if(filter_list_items.includes(this_slug)) {
					filter_list_items.splice(filter_list_items.indexOf(this_slug),1);
				}

				filter_list.val( filter_list_items.join(',') /*filter_list.val().replace(','+jQuery(this).attr('data-slug'),'')*/);
			}
			else {
				filter_list.val(filter_list.val()+','+jQuery(/*this*/element).attr("data-slug"));
			}	
		}						

		if(filter_target.val().includes(filter_name) && filter_list.val().length==0) {
			filter_target.val(filter_target.val().replace(','+filter_name,''));
		} else { if((!filter_target.val().includes(filter_name)) && filter_list.val().length) {
			filter_target.val(filter_target.val()+','+filter_name);	
		} }					

		var icon_val=jQuery(filter_list).val();	
		jQuery(filter_list).val(icon_val.substr(0,icon_val.length));
		
		jQuery(/*this*/element).toggleClass('eo_wbc_filter_icon_select');
		// jQuery('.eo_wbc_filter_icon').click(function(){					
			// ACTIVE_TODO/NOTE below function of toggle image function is moved from the layers of wbc filter widget class to fix the issue that it was not working from there since the selected class was not added when it is called from there. so during the upgrade take note of this refactoring. -- to a && -- to h
			if (typeof jQuery.fn.wbc_flip_toggle_image === 'function') {
				jQuery.fn.wbc_flip_toggle_image(this);
			}
		// });		
			
		jQuery('[name="paged"]').val('1');
		// <?php if(empty(wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_btnfilter_now'))): ?>
		if(_this.sub_configs.filter_setting_btnfilter_now != 'filter_setting_btnfilter_now'){

		console.log("filter input_type_icon_click eo_wbc_filter_change_wrapper call");
		//////// 27-05-2022 - @drashti /////////
		// --add to be confirmed--
		// window.document.splugins.wbc.filters.api.eo_wbc_filter_change_wrapper(false,'form#<?php echo $this->filter_prefix; ?>eo_wbc_filter','',{'this':this,'event':event});
		window.document.splugins.wbc.filters.api.eo_wbc_filter_change_wrapper(false,'form#'+ _this.sub_configs.filter_prefix +'eo_wbc_filter','',{'this':/*this*/element,'event':event});

		// jQuery.fn.eo_wbc_filter_change(false,'form#<?php /*echo $this->filter_prefix;*/ ?>eo_wbc_filter','',{'this':this,'event':event});
		////////////////////////////////////////

		// <?php endif; ?>
		}

    };

    var input_type_button_click = function(event, element, term_slug) {

		var button_filter_type = jQuery(/*this*/element).attr('data-type');
		let filter_target;
		// <?php if($filter_type==1): ?>
		if(/*_this.sub_configs.filter_type*/button_filter_type==1) {
			
			// let filter_target = jQuery('form#<?php echo $this->filter_prefix; ?>eo_wbc_filter [name="_attribute"]');
			filter_target = jQuery('form#'+ _this.sub_configs.filter_prefix +'eo_wbc_filter [name="_attribute"]');
		}
		// <?php else: ?>
		else {

			// let filter_target = jQuery('form#<?php echo $this->filter_prefix; ?>eo_wbc_filter [name="_category"]');
			filter_target = jQuery('form#'+ _this.sub_configs.filter_prefix +'eo_wbc_filter [name="_category"]');
		}
		// <?php endif;?>
		
		let filter_name = jQuery(/*this*/element).attr('data-filter-slug');

		if(jQuery(/*this*/element).hasClass('eo_wbc_button_selected')){
			jQuery(/*this*/element).removeClass('eo_wbc_button_selected');
			// let old_val = $("form#<?php echo $this->filter_prefix; ?>eo_wbc_filter  #checklist_<?php echo $filter['slug']; ?>").val();
			let old_val = jQuery("form#"+ _this.sub_configs.filter_prefix +"eo_wbc_filter  #checklist_" + /*_this.sub_configs.filter_slug*/term_slug).val();
			old_val = old_val.split(',');
			if(old_val.indexOf(jQuery(/*this*/element).data('slug'))!=-1){
				let _slug = jQuery(/*this*/element).data('slug');
				old_val = old_val.filter(function(item){
					return item==_slug?false:true;
				});
				new_val = old_val.join();
				// $("form#<?php echo $this->filter_prefix; ?>eo_wbc_filter  #checklist_<?php echo $filter['slug']; ?>").val(new_val);
				jQuery("form#"+ _this.sub_configs.filter_prefix +"eo_wbc_filter  #checklist_" + /*_this.sub_configs.filter_slug*/term_slug).val(new_val);
			}

		} else {
			jQuery(/*this*/element).addClass('eo_wbc_button_selected');
			// let old_val = $("form#<?php echo $this->filter_prefix; ?>eo_wbc_filter  #checklist_<?php echo $filter['slug']; ?>").val();
			let old_val = jQuery("form#"+ _this.sub_configs.filter_prefix +"eo_wbc_filter  #checklist_" + /*_this.sub_configs.filter_slug*/term_slug).val();
			old_val = old_val.split(',');
			if(old_val.indexOf(jQuery(/*this*/element).data('slug'))==-1){
				let _slug = jQuery(/*this*/element).data('slug');
				old_val.push(_slug);
				new_val = old_val.join();
				// $("form#<?php echo $this->filter_prefix; ?>eo_wbc_filter  #checklist_<?php echo $filter['slug']; ?>").val(new_val);
				jQuery("form#"+ _this.sub_configs.filter_prefix +"eo_wbc_filter  #checklist_" + /*_this.sub_configs.filter_slug*/term_slug).val(new_val);
			}
		}

		// if(filter_target.val().includes(filter_name) && $("form#<?php echo $this->filter_prefix; ?>eo_wbc_filter  #checklist_<?php echo $filter['slug']; ?>").val().length==0) {
		if(filter_target.val().includes(filter_name) && jQuery("form#"+ _this.sub_configs.filter_prefix +"eo_wbc_filter  #checklist_" + /*_this.sub_configs.filter_slug*/term_slug).val().length==0) {
			filter_target.val(filter_target.val().replace(','+filter_name,''));

		// } else { if((!filter_target.val().includes(filter_name)) && $("form#<?php echo $this->filter_prefix; ?>eo_wbc_filter #checklist_<?php echo $filter['slug']; ?>").val().length) {
		} else { if((!filter_target.val().includes(filter_name)) && jQuery("form#"+ _this.sub_configs.filter_prefix +"eo_wbc_filter #checklist_" + /*_this.sub_configs.filter_slug*/term_slug).val().length) {

			filter_target.val(filter_target.val()+','+filter_name);	
		} }	

		// <?php if(empty(wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_btnfilter_now'))): ?>
		if(_this.sub_configs.filter_setting_btnfilter_now != 'filter_setting_btnfilter_now'){

			//////// 27-05-2022 - @drashti /////////
			// --add to be confirmed--
			// window.document.splugins.wbc.filters.api.eo_wbc_filter_change_wrapper(false,'form#<?php echo $this->filter_prefix; ?>eo_wbc_filter','',{'this':this,'event':event});
			window.document.splugins.wbc.filters.api.eo_wbc_filter_change_wrapper(false,'form#'+ _this.sub_configs.filter_prefix +'eo_wbc_filter','',{'this':/*this*/element,'event':event});

			// jQuery.fn.eo_wbc_filter_change(false,'form#<?php /*echo $this->filter_prefix;*/ ?>eo_wbc_filter','',{'this':this,'event':event});
			////////////////////////////////////////
		// <?php endif; ?>
		}

    };

    ///////////////////////////////////////////////////////

 	/*ACTIVE_TODO_OC_START
			what other functions we would like to be here? maybe the functions like before_search, no_products_found, preprocess_data(it may contain some of those render_html layer logic like they are in this file or in that sp_tv_template file), find_container/locate_container/determine_target_container, reset_all_filters(should even create rest_filter and then send to that specific functions like reset_icon, reset_slider and so on? maybe yes), apply_filters and so on
				lets do it in 2nd revision at least aspecially the last part of reset hirarchy of functions
	ACTIVE_TODO_OC_END*/ 

    //	published public functions 
    return {
		    	/*ACTIVE_TODO_OC_START
		    	// below before_search function need to make private done
		    		--	however it will continue to broadcast before search notification, and whoever interested in the before_search event should bind to that event notification -- to h and -- to d 
		    		--	and there will be one more function like should_search, which will also be private. and that will handle onle the logic of checking flags and so on like the enable_filter_table flag above 
		    			-- however above enable_filter_table flag need to be handled through some callback mechanisal as planned and stated above also since it is tableview flow, so it will be from tableview layers only -- to d 
		    				--	and for tableview in the first place, if above flag sounds unnecessary and our refactored implementation can do without that then just comment that -- to d 
		    			--	and if there are any such other flags that come around then just implement it from above said should_search function -- to d 


		    		// --	and the whole ajax request layer will be handled by the private instance of the eo_wbc_filter_change_wrapper function -- to h and -- to d done
		    			--	and wherever there are layer specific logic like if tableview, diamond quiz and so on have they own additional or identical logic on their layers then cover it through ovserver pattern callback, and maybe for this we can use simple callback but that would make the process lengthy in terms of the additional code that required. but the observer pattern is not seem ideal in terms of the execution sequence that would become complex so simply have the caller pass the applicable callback in the last parameters arg in the below eo_wbc_filter_change_wrapper -- to d 
		    				--	and pass that to till all applicable functions and layers in this module, and if that become overwhelming process then can matainn the last parameters var in the this object stat but that would be not so standard flow in terms of the stat management especially while this wrapper function is supposed to one way function that can be called any number of times by any layers. so simply need to pass the parameters var everywhere in all function and layers that are called within the module. -- to d 
		    				// --	so now the above tableview flag namely the enable_filter_table will also be handled by such callbacks provided from their calling layer, so now handle that accordingly -- to d 
		    				// INVALID

		    		--	and below public wrapper function namely eo_wbc_filter_change_wrapper will call functios like should_search, before_search and then at delegate the rest to eo_wbc_filter_change_wrapper_private function -- to d 
		    			--	and so should_search function call will be inside if condition and would cancel the entire function call if that returned false -- to d 
		    				--	and that function would in its implementation would be calling the callbacks using if condition like above and return false if the should_search callback provided by tableview returns false -- to d 

		    		--	and the before_search will set flags like enable_filter_table(now the name should be changed, but to maintain trace to older var names need to keep the old flga names commented right above it) and it should not be by the should_search function 
		    			--	find all traces of enable_filter_table flag and show it to me, and now as planned it will be handled only on the tableview layers and will not be set in before_search like said above so need to confirm all its traces -- to d 

		    		// --	and then refactor and implement the eo_wbc_filter_change function instance of this file itself at bottom done
		    				// --	just move all the different sections to their applicable functions, like you did moved all instances of the function eo_wbc_filter_change below and then moved their sections to their applicable functions above -- to d. do it like we did atleast some moving for the prepare_query_data function, so  first cover the one point below related to prepare_query_data,. done
		    				// --	and same for all the other instances that you already moved below, so from there move it to their respective functions, like we did above -- to d done
		    			// -- and then need to focus on loading stack that starts maybe from the load or ready event at the bottom of this file done

		    	regarding events 
		    		--	the variations module would like bind to the render event of the filtrs, which would be broadcasted from the render_html function 
		    			--	so that on each render event, variations module could take care the ops related to variations swatches and gallery changes or modification that is required on each render event -- means simply the loopbox refresh will be required 
		    			all above points might be INVALID
			ACTIVE_TODO_OC_END 	*/

    	init: function() {

			//	NOTE: this function is supposed to be called by parent init layers or simply the init layers of the system so that if there are any filters js module init related ops then they are covered. and it is not related the filter_change(means search event) event but it is about initializing search filter module related ops. so yeah maybe any required core binding, event binding and so on can be invoked from this function. 


    		init_private();	

    	}, 		
		eo_wbc_filter_change_wrapper: function(init_call=false,form_selector=null,render_container='.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products',parameters={}) {
			// //	this eo_wbc_filter.js 
			// jQuery.fn.eo_wbc_filter_change_native= function(init_call=false,form_selector="form#eo_wbc_filter",render_container='',parameters={}) {

			// // /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
			// jQuery.fn.eo_wbc_filter_change=function(init_call=false,form_selector="form[id*='eo_wbc_filter']",render_container='.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products') 

			// // /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
								// jQuery.fn.eo_wbc_filter_change=function(init_call=false) 

			// // /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
			// 				jQuery.fn.eo_wbc_filter_change=function(init_call=false) 

			// // /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/template1.js
			// 		jQuery.fn.eo_wbc_filter_change=function(init_call=false) 

			// // /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/template2.js
			// 	jQuery.fn.eo_wbc_filter_change=function(init_call=false)

			// make sure that any js layers of wbc or any extensions which is calling the eo_wbc_filter_change function should call this function of this filters module -- to d done

				// --	above is done basically but yet to confirm the basic syntax there -- to h and -- to d. done
					// --	first confirm with me calls from wbc and tableview -- to d done
					// --	and then at you your own self be sure to do confirm with me for the rest of the extensions -- to d done

			// and this function will simply call the private wrapper function eo_wbc_filter_change_wrapper_private -- to d done

			eo_wbc_filter_change_wrapper_private(init_call, form_selector, render_container, parameters);

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

			/*ACTIVE_TODO_OC_START							
			--	above call is okay but move it to private wrapper above and also the if statement above it but make that commented -- to d 
			ACTIVE_TODO_OC_END*/
			

			// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/template1.js
			//////// 27-05-2022 - @drashti /////////
			// --add to be confirmed 630 TO 734--

			// if(!init_call){
			// 	jQuery(".reset_all_filters.mobile_2").removeClass('mobile_2_hidden');
			// }	

			// /var/www/html/drashti_project/27-05-2022/sp_tableview/asset/js/publics/sp_tv_template.js
			//////// 27-05-2022 - @drashti /////////
			// --add to be confirmed 2601 TO 2705--

			// if(!init_call){
			// 	jQuery(".reset_all_filters.mobile_2").removeClass('mobile_2_hidden');
			// }

		},

		no_products_found: function(form_selector) {

			no_products_found_private(form_selector);
		},

		set_enable_filter: function(value) {

			set_enable_filter_private(value);
		},

		slider_change_event: function(selector) {

			slider_change_event_listener(selector);
		},
		
		checkbox_change_event: function(event) {

			checkbox_change_event_listener(event);
		},
		
		input_type_icon_click: function(e) {

			input_type_icon_click_listener(e);
		},
		
		input_type_button_click: function(event) {

			input_type_button_click_listener(event);
		},		
    };
};

//  publish it 
// added on 30-06-2023
// NOTE: even though we have checked in below script if the eo_wbc_object is not available then it is created but as per the structure we need to skip execution. And till we do not refactor the loading of scripts and execution further we need below if. Ideally we should not load this js file if the filters widget is not rendered on the particular page. 
if( typeof(eo_wbc_object) != 'undefined'){
	window.document.splugins.wbc.filters.api = window.document.splugins.wbc.filters.core( eo_wbc_object );

	// the pagination js module
	window.document.splugins.wbc.pagination = window.document.splugins.wbc.pagination || {};

	window.document.splugins.wbc.pagination.core = function( configs ) {

		console.log('[pagination]');

	    var _this = this; 

		_this.configs = jQuery.extend({}, {}/*default configs*/, configs);	

		_this.$base_container = null  /*jQuery( ( window.document.splugins.common._o( _this.configs, 'base_container_selector') ? _this.configs.base_container_selector : '' ) )*/;  // ACTIVE_TODO/TODO whenever it become necessary to use base_container for events or so then at that time need to init base_container using standard pagination section conatainer selector.

		var init_private = function(event) {

			console.log('pagination [init_private]');
			// ACTIVE_TODO whenever in future if required  to run compatibility check during run time means after the base container selectore is defined than we can call compatibility layers additionaly from here 
	    	var base_container_selector_callback = null;
			var stat_object = window.document.splugins.events.api.apply_all_observer_filters( 'pagination', 'base_container_selector',{type:_this.$base_container},base_container_selector_callback);  

			/*ACTIVE_TODO_OC_START
			like from the filters module, we may need to raise notification from all key functions of this module as well.
				--	like tableview may like to recieve click notification, but does it require to handle anuy logic related to it? since the wbc layers will only host the pagination module and layers so maybe tableview does not need to manage many or maybe not need to manage none of those things. 
					--	NOTE: and on this regard in case of dapii custom data based feed, when the pagination links are created by the dapii layers even then also all the standard and compatibility listeners of the bind_click for pagination links below will do its job. means roughly except the dapii creating the pagination links the rest all will be handled by the wbc layers. 

					--	so whatever logic tableview requires after the pagination click can be covered by raised notification from here -- to s 
						--	do the same for the other key functions below and raise notification but only if it is necessary otherwise we would skip that and only add when required. -- to s  
			ACTIVE_TODO_OC_END*/
			// --- move this code frome this file
	        jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.woocommerce-pagination,.pagination,jet-filters-pagination').css('visibility','visible');

			on_click_listener(event);

	        sort_order_private();

		};

	    var get_sort_dropdown_container_private = function() {

	    	// -- 10 demo ma aa selector same j hato
	    	return compatability('sort_dropdown_container',{container:jQuery('select[name="orderby"]:eq(0)'),is_return_string_selector:false},null,null).container;
	    }

	    var sort_order_private = function() {
			
			console.log('pagination [sort_order_private]');
			
			// process_events
	        orderby_change_listener(null);
	    }

		var get_pagination_html_private = function(){
			
		}

		var set_pagination_html_private = function(data){
			

			console.log('pagination [set_pagination_html_private]');

			console.log('set_pagination_html_private()');
			console.log('.woocommerce-pagination,.pagination'+compatability('pagination_link_selector',null,null));

			// -- aa function mathi code pagination sub module na module ma move thase ane baki no jo applicable hoy to aa module ma rese. Pan aa point execute karvi te pela niche point confirm karvano rese. -- to a & -- to h INVALID 
			/*ACTIVE_TODO_OC_START
				-- need to confirm ke aa call diamond api mathi j ave se ne ane te jo no male to ani calling sycuance hirenbhai sathe confirm karvi. -- to a
				-- ane je aya compatibility no code dekhay se te aa code je module ma finally implement thay tena compatibility function ma move karva no -- to a
					-- aa code jya thi move thyo teni calling sycuanc(03-08-2022) -- to a
			// --- move this code frome this file in this eo_wbc_filter_render_html()
			-- aa code diamond api ma move nathi kavano aya j implementation karvanu-- to a
			ACTIVE_TODO_OC_END*/
			if(jQuery('.woocommerce-pagination,.pagination'+compatability('pagination_link_selector',null,null),jQuery(data)).html()!==undefined) {

				if(jQuery('.woocommerce-pagination,.pagination'+compatability('pagination_link_selector',null,null)).length>0){

					console.log('set_pagination_html_private() if if');
					console.log(data);
					console.log(jQuery(".woocommerce-pagination,.pagination"+compatability('pagination_link_selector',null,null)));

					jQuery(".woocommerce-pagination,.pagination"+compatability('pagination_link_selector',null,null)).html(jQuery('.woocommerce-pagination,.pagination'+compatability('pagination_link_selector',null,null),jQuery(data)).html());
				} else {

					/*ACTIVE_TODO_OC_START
					@d once all the pagination related layers brought to this function, we need to check if the below incomplete implementation is completely implemented anywhere in our repo -- to d 
						--	if not then test with the elementor created category feed page and also with elementor hello themes custom loop to check if it works. if not then must uncomment the last uncommented line and finish the implementation -- to d or -- to b 
					ACTIVE_TODO_OC_END*/
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

				console.log('set_pagination_html_private() else');

				jQuery(".woocommerce-pagination,.pagination"+compatability('pagination_link_selector',null,null)).html('');	
			}
		}
		
		var on_click_listener = function(e){

			console.log('pagination [on_click_listener]');

			/*ACTIVE_TODO_OC_START
			NOTE : it will bind to all kind of such on_click events of pagination, it will be private but it may broadcast notification with a callback which js layers of like tableview and so on can call when they recieve their own click event or they can simply call below on_click function". so it is private function.
			ACTIVE_TODO_OC_END*/
			/*ACTIVE_TODO_OC_START
			-- aa 3 mate comman click event banavano -- to a
			-- compatibility function mathi selector lavano -- to a 
				-- compatibility function ma section ni condition kem implement karvani(shraddha ne pushvu, compatibility function na example jova hoy to common.js ma swatches module mase) -- to a
			// -- aama click no event binding j khali rese baki andar no code base function ma move thse(shradhha ne pusvu)-- to a	
			// -- click event no code rakhvano baki no base function ma move thase (360 ma karyo te rite)-- to a	
			move all below bind click code to the click function. but instead just create the three functions like we do in the listener style. and then move the code -- to s 
			ACTIVE_TODO_OC_END   */	
			// jQuery('body').on('click','.navigation .page-numbers,.woocommerce-pagination a.page-numbers',function(e){
			// 	e.preventDefault();
			// 	e.stopPropagation();
				
			// 	jQuery('[name="paged"]').val(parseInt(jQuery(this).text().replace(',','')));		
				// // jQuery.fn.eo_wbc_filter_change(false,'form#'+jQuery(this).parents().has('[id$="eo_wbc_filter"]').find('[id$="eo_wbc_filter"]').attr('id'));
				// window.document.splugins.filters.api.eo_wbc_filter_change_wrapper(false,'form#'+jQuery(this).parents().has('[id$="eo_wbc_filter"]').find('[id$="eo_wbc_filter"]').attr('id'));
			// });

			// jQuery("body").on('click','.woocommerce-pagination a,.pagination a,.jet-filters-pagination a,.woocommerce-pagination .jet-filters-pagination__link,.pagination .jet-filters-pagination__link,.jet-filters-pagination .jet-filters-pagination__link,.navigation .page-numbers,.woocommerce-pagination a.page-numbers',function(event){
				
			// 	on_click(event);
			// });

			let pagination_container = jQuery('.woocommerce-pagination a,.pagination a,.navigation .page-numbers,.woocommerce-pagination a.page-numbers');

			_this.$base_pagination_container = compatability('pagination',{pagination_container:pagination_container},1).pagination_container;

			_this.$base_pagination_container.on('click', function(event){
				
				on_click(event,this);
			});

			// --- aa code aa file ma document.ready mathi move karelo se ---
			// jQuery("body").on('click','.woocommerce-pagination a,.pagination a,.jet-filters-pagination a,.woocommerce-pagination .jet-filters-pagination__link,.pagination .jet-filters-pagination__link,.jet-filters-pagination .jet-filters-pagination__link',function(event){
				
			// 	event.preventDefault();
			// 	event.stopPropagation();								
				
			// 	// ACTIVE_TODO page nnumber text would break below with multilanguage so instead use the data attribute to store and read the page number -- to a and/or -- to h
			// 	if(jQuery(this).hasClass("next") || jQuery(this).hasClass("prev")){
					
			// 		--  wherever .val is used then called set page_number from pagination -- to s
			// 			--  wherever .text is used then called get page_number from pagination -- to s

			// 		if(jQuery(this).hasClass("next")){
			// 			jQuery("[name='paged']").val(parseInt(jQuery(".page-numbers.current").text())+1);
			// 		}
			// 		if(jQuery(this).hasClass("prev")){
			// 			jQuery("[name='paged']").val(parseInt(jQuery(".page-numbers.current").text())-1);
			// 		}	
			// 	}		
			// 	else {
			// 		jQuery("[name='paged']").val(jQuery(this).text());
			// 	}		

			// 	// jQuery.fn.eo_wbc_filter_change(false,'form#'+jQuery(this).parents().has('[id$="eo_wbc_filter"]').find('[id$="eo_wbc_filter"]').attr('id'));
			// 	window.document.splugins.filters.api.eo_wbc_filter_change_wrapper(false,'form#'+jQuery(this).parents().has('[id$="eo_wbc_filter"]').find('[id$="eo_wbc_filter"]').attr('id'));
			// });

			/*ACTIVE_TODO_OC_START
			-- confirm with hirenbhai --to a
			ACTIVE_TODO_OC_END*/
			// on_click();

		};

	    var orderby_change_listener = function(type) {
			
			console.log('pagination [orderby_change_listener]');

			var selector = get_sort_dropdown_container_private();
	        
	        jQuery(selector).on('change',function() {

				console.log('pagination [orderby_change_listener] 01');

		    	on_orderby_change(type,this);

	        });
	    }

	    var on_click = function(event,element){

			// NOTE : it will internally implement all flows related to pagination link click event

			click(event,element);

	    };

	    var on_orderby_change = function(type,element) {

	    	orderby_change(type,element);
	    };

	    var click = function(event,element){
	    	
	    	console.log('pagination_click');
	    	console.log(_this.$base_pagination_container);
	    	console.log(element);

	    	/*ACTIVE_TODO_OC_START
	    	-- event var aya sudhi pogadvano se -- to a
	    	ACTIVE_TODO_OC_END*/
	    	event.preventDefault();
			event.stopPropagation();								
			
			// ACTIVE_TODO page nnumber text would break below with multilanguage so instead use the data attribute to store and read the page number -- to a and/or -- to h
			if(/*_this.$base_pagination_container*/jQuery(element).hasClass("next") || /*_this.$base_pagination_container*/jQuery(element).hasClass("prev")){
				
				console.log('pagination click if');
				if(/*_this.$base_pagination_container*/jQuery(element).hasClass("next")){
					console.log(window.document.splugins.wbc.pagination.api.get_page_number());
					// jQuery("[name='paged']").val(parseInt(jQuery(".page-numbers.current").text())+1);
					window.document.splugins.wbc.pagination.api.set_page_number( window.document.splugins.wbc.pagination.api.get_page_number()+1 );
				}
				if(/*_this.$base_pagination_container*/jQuery(element).hasClass("prev")){
					console.log(window.document.splugins.wbc.pagination.api.get_page_number());
					// jQuery("[name='paged']").val(parseInt(jQuery(".page-numbers.current").text())-1);
					window.document.splugins.wbc.pagination.api.set_page_number( window.document.splugins.wbc.pagination.api.get_page_number()-1 );
				}	
			}		
			else {

				console.log('pagination click else');
				console.log(jQuery(element));
				console.log(window.document.splugins.wbc.pagination.api.get_page_number(jQuery(element)));
				// jQuery("[name='paged']").val(jQuery(this).text());
				window.document.splugins.wbc.pagination.api.set_page_number( window.document.splugins.wbc.pagination.api.get_page_number(jQuery(element)));
			}		

			console.log('pagination click() 01');
			console.log(jQuery(element).parents().has('[id$="eo_wbc_filter"]').find('[id$="eo_wbc_filter"]').attr('id'));
			
			// jQuery('[name="paged"]').val(parseInt(jQuery(this).text().replace(',','')));
			// jQuery.fn.eo_wbc_filter_change(false,'form#'+jQuery(this).parents().has('[id$="eo_wbc_filter"]').find('[id$="eo_wbc_filter"]').attr('id'));
			window.document.splugins.wbc.filters.api.eo_wbc_filter_change_wrapper(false, 'form#'+/*_this.$base_pagination_container*/jQuery(element).parents().has('[id$="eo_wbc_filter"]').find('[id$="eo_wbc_filter"]').attr('id') );

	    };

	    var orderby_change = function(type,element) {

			console.log('pagination [orderby_change]');

	    	jQuery('.wbc-filters-sorting-fields').val('');

	    	// reset
			window.document.splugins.wbc.pagination.api.set_page_number( 1 );

			window.document.splugins.wbc.filters.api.eo_wbc_filter_change_wrapper(false, 'form#'+/*_this.$base_pagination_container*/jQuery(element).parents().has('[id$="eo_wbc_filter"]').find('[id$="eo_wbc_filter"]').attr('id') );
	    
	    };

	    var compatability = function(section, object, expected_result, form_selector){

			console.log('pagination [compatability]');

	        if(section == 'pagination'){

				if(object.pagination_container.length<=0) {
			
					object.pagination_container = jQuery(".jet-filters-pagination a,.woocommerce-pagination .jet-filters-pagination__link,.pagination .jet-filters-pagination__link,.jet-filters-pagination .jet-filters-pagination__link");

					if(object.pagination_container.length<=0){
						
						if(window.document.splugins.common.current_theme_key == 'themes___elessi-theme-child'){

							object.pagination_container = jQuery('.nasa-pagination .page-numbers .page-numbers');	
						
						}
					}
				}
	        }else if(section == 'pagination_link_selector'){

	        	object = ',.jet-filters-pagination';

	        	if(window.document.splugins.common.current_theme_key == 'themes___elessi-theme-child'){

		        	object += ',.nasa-paginations-warp';
	        	}

	        }else if(section == 'sort_dropdown_container'){

				if(object.container.length<=0) {
					
					// ACTIVE_TODO here as mentioned in below there is no need of the patch so far as per our checks in the 10 themes, but whenever required simplu uncommonent below jQuery("") and the selector in there according to the patch. and mark it as todo if nothing comes up by third revision. 
						// -- aya 10 theme demo ma selectore jovana se alaga alag ave se k same ave se done
						// -- badhi theme ma selectore same j se @a done
					// object.container = jQuery("");
					
					if(object.container.length<=0){

			    		// example if to set selector specific to theme 
						// ACTIVE_TODO temp. remove below return false when we impliment below if 
						if(false && window.document.splugins.common.current_theme_key == 'themes___elessi-theme-child') {

							object.container = jQuery('.nasa-pagination .page-numbers .page-numbers');
						}
					}
				}

		    }else if(section == 'sort_dropdown_selector'){

		    	// ACTIVE_TODO temp. remove below return false when this layer is implimented becose this is not implimented yet -- to a && -- to h
		    	return false;
		    	
				if(object.container.length<=0) {
			
					object.container = jQuery("");
				}
		    } 

	        return object;
	    };

	    var reset_private = function(){

	    };
		
		return {
			
			init: function(event) {

				init_private(event);	
			},

			// on_click: function() {

			// 	// ACTIVE_TODO_OC_START
			// 	// NOTE : listen to all on_click events
			// 	// ACTIVE_TODO_OC_END

			// 	click();

			// },

			get_page_number: function(selector = null) {
				
				if(selector == null) {
						
					selector = ".page-numbers.current";
				}			
				console.log(jQuery(selector));
				
				if(jQuery(selector).html().indexOf('&nbsp;') >= 0 ){
					
					console.log('get_page_number in nbsp available');
					
					return parseInt(jQuery(selector).html().replace(',','').replace(/\&nbsp;/g, ''));
				}else{

					console.log('get_page_number in nbsp not available');

					return parseInt(jQuery(selector).text().replace(',',''));
				}
			},

			set_page_number: function(page_number) {

				if(page_number == 1 || window.document.splugins.common.is_empty(page_number)) {

					reset_private();
				}

				console.log('[set_page_number] page_number');
				console.log(page_number);

				jQuery("[name='paged']").val(page_number);

			},

			get_pagination_html: function(){

				get_pagination_html_private();
			},

			set_pagination_html: function(data){

				set_pagination_html_private(data);
			},

			reset: function() {

				reset_private();

			},

			get_sort_dropdown_container: function() {

				return get_sort_dropdown_container_private();
			},				

		};

	};

	//  publish it 
	window.document.splugins.wbc.pagination.api = window.document.splugins.wbc.pagination.core( {}/*if required then the php layer configs can be set here by using the js vars defined from the php layer*/ );

	/*ACTIVE_TODO_OC_START
	now this state mantaining flow should be inside its own module so inside the filters module above, but does it mean that we will stop keeping it direcly under the window object or we will keep it but start using the filters module stat everywhere and once everything sound stable then comment out below? 
		--	maybe later is the right idea but the point is that if at some places the calls are still going to below stat vars instead of the modules stat then js layer may not show sign but if comment it now then it will crash and that is enough for us to know. but yeah the fact is also that for sometime some js layers are going to be used un-refactored they will depending on below stat vars so we need keep it as per the former option. 
		--	anyway create the stat vars inside the filters module and set it there also from underneath below statements -- to d 
	ACTIVE_TODO_OC_END*/

	/*<<<<<<< HEAD*/
	/*window.eo_wbc_object = window.eo_wbc_object || {};
	window.eo_wbc_object.enable_filter = window.eo_wbc_object.enable_filter || false;*/
	/*=======*/
	window.eo_wbc_object = window.eo_wbc_object || {};
	// window.eo_wbc_object.enable_filter = window.eo_wbc_object.enable_filter || false;
	/*>>>>>>> dad35916d59c134734156ded85678133f6c607a0*/
	//////////// shraddha ////////////////
	window.document.splugins.eo_wbc_object = window.document.splugins.eo_wbc_object || {};
	// window.document.splugins.eo_wbc_object.enable_filter = window.document.splugins.eo_wbc_object.enable_filter || false;
	// NOTE: now below flag set logic is disabled and initialy the flag is set at page load time only from the init_private function of filters module. 
	// window.document.splugins.wbc.filters.api.set_enable_filter(false);
	/////////////////////////////////////

	// mostly we are not going to do with below fix function flows and how we manage it. but should we need to do anything with it as of now?  
		// --	NO. but yeah better if we move it inside the compatibility private function or in compatibility layer within the filters core js module. and also check if we can put a single line or few line fix instead of putting the long script like below that would be possible by reusing their script and API instead of adding entire script like below. 
			// INVALID since it is not filetrs flow but the wishlist is independent features
			// ACTIVE_TODO but we may like to move it very soon somwhere in common sections of category and item page -- to h & -- to s
	// YITH wishlist fix
	function eowbc_yith_wishlist_fix(){
		jQuery(document).ready((function(t){function i(){void 0!==t.fn.selectBox&&t("select.selectBox").filter(":visible").not(".enhanced").selectBox().addClass("enhanced")}function e(){if(void 0!==t.prettyPhoto){var e={hook:"data-rel",social_tools:!1,theme:"pp_woocommerce",horizontal_padding:20,opacity:.8,deeplinking:!1,overlay_gallery:!1,default_width:500,changepicturecallback:function(){i(),t(".wishlist-select").filter(":visible").change(),t(document).trigger("yith_wcwl_popup_opened",[this])},markup:'<div class="pp_pic_holder"><div class="ppt">&nbsp;</div><div class="pp_top"><div class="pp_left"></div><div class="pp_middle"></div><div class="pp_right"></div></div><div class="pp_content_container"><div class="pp_left"><div class="pp_right"><div class="pp_content"><div class="pp_loaderIcon"></div><div class="pp_fade"><a href="#" class="pp_expand" title="Expand the image">Expand</a><div class="pp_hoverContainer"><a class="pp_next" href="#">next</a><a class="pp_previous" href="#">previous</a></div><div id="pp_full_res"></div><div class="pp_details"><a class="pp_close" href="#">Close</a></div></div></div></div></div></div><div class="pp_bottom"><div class="pp_left"></div><div class="pp_middle"></div><div class="pp_right"></div></div></div><div class="pp_overlay yith-wcwl-overlay"></div>'};t('a[data-rel^="prettyPhoto[add_to_wishlist_"]').add('a[data-rel="prettyPhoto[ask_an_estimate]"]').add('a[data-rel="prettyPhoto[create_wishlist]"]').unbind("click").prettyPhoto(e),t('a[data-rel="prettyPhoto[move_to_another_wishlist]"]').on("click",(function(){var i=t(this),e=t("#move_to_another_wishlist").find("form"),a=e.find(".row-id"),o=i.closest("[data-row-id]").data("row-id");a.length&&a.remove(),e.append('<input type="hidden" name="row_id" class="row-id" value="'+o+'"/>')})).prettyPhoto(e);var a=function(i,e){if(void 0!==i.classList&&i.classList.contains("yith-wcwl-overlay")){var a="remove"===e?"removeClass":"addClass";t("body")[a]("yith-wcwl-with-pretty-photo")}},o=function(t){a(t,"add")},n=function(t){a(t,"remove")};new MutationObserver((function(t){for(var i in t){var e=t[i];"childList"===e.type&&(void 0!==e.addedNodes&&e.addedNodes.forEach(o),void 0!==e.removedNodes&&e.removedNodes.forEach(n))}})).observe(document.body,{childList:!0})}}function a(){t(".wishlist_table").find('.product-checkbox input[type="checkbox"]').off("change").on("change",(function(){var i=t(this);i.parent().removeClass("checked").removeClass("unchecked").addClass(i.is(":checked")?"checked":"unchecked")})).trigger("change")}function o(){t(".add_to_cart").filter("[data-icon]").not(".icon-added").each((function(){var i,e=t(this),a=e.data("icon");i=a.match(/[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi)?t("<img/>",{src:a}):t("<i/>",{class:"fa "+a}),e.prepend(i).addClass("icon-added")}))}function n(){i(),e(),a(),o(),l(),s(),_(),d(),c(),r(),t(document).trigger("yith_wcwl_init_after_ajax")}function s(){yith_wcwl_l10n.enable_tooltip&&t(".yith-wcwl-add-to-wishlist").find("[data-title]").each((function(){var i=t(this);i.hasClass("tooltip-added")||(i.on("mouseenter",(function(){var i,e=t(this),a=null,o=e.outerWidth(),n=0;a=t("<span>",{class:"yith-wcwl-tooltip",text:e.data("title")}),e.append(a),i=a.outerWidth()+6,a.outerWidth(i),n=(o-i)/2,a.css({left:n.toFixed(0)+"px"}).fadeIn(200),e.addClass("with-tooltip")})).on("mouseleave",(function(){var i=t(this);i.find(".yith-wcwl-tooltip").fadeOut(200,(function(){i.removeClass("with-tooltip").find(".yith-wcwl-tooltip").remove()}))})),i.addClass("tooltip-added"))}))}function l(){t(".yith-wcwl-add-button").filter(".with-dropdown").on("mouseleave",(function(){var i=t(this).find(".yith-wcwl-dropdown");i.length&&i.fadeOut(200)})).children("a").on("mouseenter",(function(){var i=t(this).closest(".with-dropdown"),e=i.find(".yith-wcwl-dropdown");e.length&&e.children().length&&i.find(".yith-wcwl-dropdown").fadeIn(200)}))}function d(){void 0!==yith_wcwl_l10n.enable_drag_n_drop&&yith_wcwl_l10n.enable_drag_n_drop&&t(".wishlist_table").filter(".sortable").not(".no-interactions").each((function(){var i=t(this),e=!1;i.sortable({items:"[data-row-id]",scroll:!0,helper:function(i,e){return e.children().each((function(){t(this).width(t(this).width())})),e},update:function(){var a=i.find("[data-row-id]"),o=[],n=0;a.length&&(e&&e.abort(),a.each((function(){var i=t(this);i.find('input[name*="[position]"]').val(n++),o.push(i.data("row-id"))})),e=t.ajax({data:{action:yith_wcwl_l10n.actions.sort_wishlist_items,positions:o,wishlist_token:i.data("token"),page:i.data("page"),per_page:i.data("per-page")},method:"POST",url:yith_wcwl_l10n.ajax_url}))}})}))}function c(){var i,e;t(".wishlist_table").on("change",".product-quantity input",(function(){var a=t(this),o=a.closest("[data-row-id]"),n=o.data("row-id"),s=a.closest(".wishlist_table"),l=s.data("token");clearTimeout(e),o.find(".add_to_cart").attr("data-quantity",a.val()),e=setTimeout((function(){i&&i.abort(),i=t.ajax({beforeSend:function(){b(s)},complete:function(){k(s)},data:{product_id:n,wishlist_token:l,quantity:a.val(),action:yith_wcwl_l10n.actions.update_item_quantity},method:"POST",url:yith_wcwl_l10n.ajax_url})}),1e3)}))}function r(){t(".copy-trigger").on("click",(function(){var i=t(".copy-target");if(i.length>0)if(i.is("input"))S()?i[0].setSelectionRange(0,9999):i.select(),document.execCommand("copy");else{var e=t("<input/>",{val:i.text(),type:"text"});t("body").append(e),S()?e[0].setSelectionRange(0,9999):e.select(),document.execCommand("copy"),e.remove()}}))}function _(){t(".wishlist_table").filter(".images_grid").not(".enhanced").on("click","[data-row-id] .product-thumbnail a",(function(i){var e=t(this).closest("[data-row-id]"),a=e.siblings("[data-row-id]"),o=e.find(".item-details");i.preventDefault(),o.length&&(a.removeClass("show"),e.toggleClass("show"))})).on("click","[data-row-id] a.close",(function(i){var e=t(this).closest("[data-row-id]"),a=e.find(".item-details");i.preventDefault(),a.length&&e.removeClass("show")})).on("click","[data-row-id] a.remove_from_wishlist",(function(i){var e=t(this);return i.stopPropagation(),w(e),!1})).addClass("enhanced"),t(document).on("click",(function(i){t(i.target).closest("[data-row-id]").length||t(".wishlist_table").filter(".images_grid").find(".show").removeClass("show")})).on("added_to_cart",(function(){t(".wishlist_table").filter(".images_grid").find(".show").removeClass("show")}))}function h(i,e,a){i.action=yith_wcwl_l10n.actions.move_to_another_wishlist_action,""!==i.wishlist_token&&""!==i.destination_wishlist_token&&""!==i.item_id&&t.ajax({beforeSend:e,url:yith_wcwl_l10n.ajax_url,data:i,dataType:"json",method:"post",success:function(e){a(e),n(),t("body").trigger("moved_to_another_wishlist",[t(this),i.item_id])}})}function w(i){var e=i.parents(".cart.wishlist_table"),a=i.parents("[data-row-id]"),o=a.data("row-id"),s=e.data("id"),l=e.data("token"),d={action:yith_wcwl_l10n.actions.remove_from_wishlist_action,remove_from_wishlist:o,wishlist_id:s,wishlist_token:l,fragments:j(o)};t.ajax({beforeSend:function(){b(e)},complete:function(){k(e)},data:d,method:"post",success:function(e){void 0!==e.fragments&&T(e.fragments),n(),t("body").trigger("removed_from_wishlist",[i,a])},url:yith_wcwl_l10n.ajax_url})}function f(i){var e=t(this),a=e.closest(".wishlist_table"),o=null;i.preventDefault(),(o=a.length?e.closest("[data-wishlist-id]").find(".wishlist-title"):e.parents(".wishlist-title")).next().show().find('input[type="text"]').focus(),o.hide()}function p(i){var e=t(this);i.preventDefault(),e.parents(".hidden-title-form").hide(),e.parents(".hidden-title-form").prev().show()}function u(i){var e,a=t(this),o=a.closest(".hidden-title-form"),n=a.closest("[data-wishlist-id]").data("wishlist-id"),s=o.find('input[type="text"]'),l=s.val();if(i.preventDefault(),!l)return o.addClass("woocommerce-invalid"),void s.focus();e={action:yith_wcwl_l10n.actions.save_title_action,wishlist_id:n,title:l,fragments:j()},t.ajax({type:"POST",url:yith_wcwl_l10n.ajax_url,data:e,dataType:"json",beforeSend:function(){b(o)},complete:function(){k(o)},success:function(t){var i=t.fragments;t.result?(o.hide(),o.prev().find(".wishlist-anchor").text(l).end().show()):(o.addClass("woocommerce-invalid"),s.focus()),void 0!==i&&T(i)}})}function m(){var i=t(this),e=i.val(),a=i.closest("[data-wishlist-id]").data("wishlist-id"),o={action:yith_wcwl_l10n.actions.save_privacy_action,wishlist_id:a,privacy:e,fragments:j()};t.ajax({type:"POST",url:yith_wcwl_l10n.ajax_url,data:o,dataType:"json",success:function(t){var i=t.fragments;void 0!==i&&T(i)}})}function v(i){if(void 0!==t.prettyPhoto&&void 0!==t.prettyPhoto.close)if(void 0!==i){var e=t(".pp_content_container"),a=e.find(".pp_content"),o=e.find(".yith-wcwl-popup-form"),n=o.closest(".pp_pic_holder");if(o.length){var s=t("<div/>",{class:"yith-wcwl-popup-feedback"});s.append(t("<i/>",{class:"fa fa-check heading-icon"})),s.append(t("<p/>",{class:"feedback",html:i})),s.css("display","none"),a.css("height","auto"),o.after(s),o.fadeOut(200,(function(){s.fadeIn()})),n.addClass("feedback"),n.css("left",t(window).innerWidth()/2-n.outerWidth()/2+"px"),(void 0===yith_wcwl_l10n.auto_close_popup||yith_wcwl_l10n.auto_close_popup)&&setTimeout(v,yith_wcwl_l10n.popup_timeout)}}else try{t.prettyPhoto.close()}catch(t){}}function g(i){var e=t("#yith-wcwl-popup-message"),a=t("#yith-wcwl-message"),o=void 0!==yith_wcwl_l10n.popup_timeout?yith_wcwl_l10n.popup_timeout:3e3;(void 0===yith_wcwl_l10n.enable_notices||yith_wcwl_l10n.enable_notices)&&(a.html(i),e.css("margin-left","-"+t(e).width()+"px").fadeIn(),window.setTimeout((function(){e.fadeOut()}),o))}function y(i){var e=t("select.wishlist-select"),a=t("ul.yith-wcwl-dropdown");e.each((function(){var e=t(this),a=e.find("option"),o=a.filter('[value="new"]');a.not(o).remove(),t.each(i,(function(i,a){t("<option>",{value:a.id,html:a.wishlist_name}).appendTo(e)})),e.append(o)})),a.each((function(){var e=t(this),a=e.find("li"),o=e.closest(".yith-wcwl-add-button").children("a.add_to_wishlist"),n=o.attr("data-product-id"),s=o.attr("data-product-type");a.remove(),t.each(i,(function(i,a){a.default||t("<li>").append(t("<a>",{rel:"nofollow",html:a.wishlist_name,class:"add_to_wishlist",href:a.add_to_this_wishlist_url,"data-product-id":n,"data-product-type":s,"data-wishlist-id":a.id})).appendTo(e)}))}))}function b(i){void 0!==t.fn.block&&i.fadeTo("400","0.6").block({message:null,overlayCSS:{background:"transparent url("+yith_wcwl_l10n.ajax_loader_url+") no-repeat center",backgroundSize:"40px 40px",opacity:1}})}function k(i){void 0!==t.fn.unblock&&i.stop(!0).css("opacity","1").unblock()}function x(){if(navigator.cookieEnabled)return!0;document.cookie="cookietest=1";var t=-1!==document.cookie.indexOf("cookietest=");return document.cookie="cookietest=1; expires=Thu, 01-Jan-1970 00:00:01 GMT",t}function j(i){var e={},a=null;return i?"object"==typeof i?(a=(i=t.extend({fragments:null,s:"",container:t(document),firstLoad:!1},i)).fragments?i.fragments:i.container.find(".wishlist-fragment"),i.s&&(a=a.not("[data-fragment-ref]").add(a.filter('[data-fragment-ref="'+i.s+'"]'))),i.firstLoad&&(a=a.filter(".on-first-load"))):(a=t(".wishlist-fragment"),"string"!=typeof i&&"number"!=typeof i||(a=a.not("[data-fragment-ref]").add(a.filter('[data-fragment-ref="'+i+'"]')))):a=t(".wishlist-fragment"),a.each((function(){var i=t(this),a=i.attr("class").split(" ").filter(t=>t.length&&"exists"!==t).join(yith_wcwl_l10n.fragments_index_glue);e[a]=i.data("fragment-options")})),e}function C(i){if(yith_wcwl_l10n.enable_ajax_loading){var e=j(i=t.extend({firstLoad:!0},i));e&&t.ajax({data:{action:yith_wcwl_l10n.actions.load_fragments,fragments:e},method:"post",success:function(a){void 0!==a.fragments&&(T(a.fragments),n(),t(document).trigger("yith_wcwl_fragments_loaded",[e,a.fragments,i.firstLoad]))},url:yith_wcwl_l10n.ajax_url})}}function T(i){t.each(i,(function(i,e){var a="."+i.split(yith_wcwl_l10n.fragments_index_glue).filter(t=>t.length&&"exists"!==t).join("."),o=t(a),n=t(e).filter(a);n.length||(n=t(e).find(a)),o.length&&n.length&&o.replaceWith(n)}))}function S(){return navigator.userAgent.match(/ipad|iphone/i)}t(document).on("yith_wcwl_init",(function(){var S=t(this),P="undefined"!=typeof wc_add_to_cart_params&&null!==wc_add_to_cart_params?wc_add_to_cart_params.cart_redirect_after_add:"";S.on("click",".add_to_wishlist",(function(i){var e,a=t(this),o=a.attr("data-product-id"),s=t(".add-to-wishlist-"+o),l={add_to_wishlist:o,product_type:a.data("product-type"),wishlist_id:a.data("wishlist-id"),action:yith_wcwl_l10n.actions.add_to_wishlist_action,fragments:j(o)};if((e=t(document).triggerHandler("yith_wcwl_add_to_wishlist_data",[a,l]))&&(l=e),i.preventDefault(),jQuery(document.body).trigger("adding_to_wishlist"),yith_wcwl_l10n.multi_wishlist&&yith_wcwl_l10n.modal_enable){var d=a.parents(".yith-wcwl-popup-footer").prev(".yith-wcwl-popup-content"),c=d.find(".wishlist-select"),r=d.find(".wishlist-name"),_=d.find(".wishlist-visibility").filter(":checked");if(l.wishlist_id=c.is(":visible")?c.val():"new",l.wishlist_name=r.val(),l.wishlist_visibility=_.val(),"new"===l.wishlist_id&&!l.wishlist_name)return r.closest("p").addClass("woocommerce-invalid"),!1;r.closest("p").removeClass("woocommerce-invalid")}if(x())return t.ajax({type:"POST",url:yith_wcwl_l10n.ajax_url,data:l,dataType:"json",beforeSend:function(){b(a)},complete:function(){k(a)},success:function(i){var e=i.result,o=i.message;yith_wcwl_l10n.multi_wishlist?(v(o),void 0!==i.user_wishlists&&y(i.user_wishlists)):g(o),"true"!==e&&"exists"!==e||(void 0!==i.fragments&&T(i.fragments),yith_wcwl_l10n.multi_wishlist&&!yith_wcwl_l10n.hide_add_button||s.find(".yith-wcwl-add-button").remove(),s.addClass("exists")),n(),t("body").trigger("added_to_wishlist",[a,s])}}),!1;window.alert(yith_wcwl_l10n.labels.cookie_disabled)})),S.on("click",".wishlist_table .remove_from_wishlist",(function(i){var e=t(this);return i.preventDefault(),w(e),!1})),S.on("adding_to_cart","body",(function(t,i,e){void 0!==i&&void 0!==e&&i.closest(".wishlist_table").length&&(e.remove_from_wishlist_after_add_to_cart=i.closest("[data-row-id]").data("row-id"),e.wishlist_id=i.closest(".wishlist_table").data("id"),"undefined"!=typeof wc_add_to_cart_params&&(wc_add_to_cart_params.cart_redirect_after_add=yith_wcwl_l10n.redirect_to_cart),"undefined"!=typeof yith_wccl_general&&(yith_wccl_general.cart_redirect=yith_wcwl_l10n.redirect_to_cart))})),S.on("added_to_cart","body",(function(t,i,e,a){if(void 0!==a&&a.closest(".wishlist_table").length){"undefined"!=typeof wc_add_to_cart_params&&(wc_add_to_cart_params.cart_redirect_after_add=P),"undefined"!=typeof yith_wccl_general&&(yith_wccl_general.cart_redirect=P);var o=a.closest("[data-row-id]"),n=o.closest(".wishlist-fragment").data("fragment-options");a.removeClass("added"),o.find(".added_to_cart").remove(),yith_wcwl_l10n.remove_from_wishlist_after_add_to_cart&&n.is_user_owner&&o.remove()}})),S.on("added_to_cart","body",(function(){var i=t(".woocommerce-message");0===i.length?t("#yith-wcwl-form").prepend(yith_wcwl_l10n.labels.added_to_cart_message):i.fadeOut(300,(function(){t(this).replaceWith(yith_wcwl_l10n.labels.added_to_cart_message).fadeIn()}))})),S.on("cart_page_refreshed","body",n),S.on("click",".show-title-form",f),S.on("click",".wishlist-title-with-form h2",f),S.on("click",".remove_from_all_wishlists",(function(i){var e=t(this),a=e.attr("data-product-id"),o=e.data("wishlist-id"),s=e.closest(".content"),l={action:yith_wcwl_l10n.actions.remove_from_all_wishlists,prod_id:a,wishlist_id:o,fragments:j(a)};i.preventDefault(),t.ajax({beforeSend:function(){b(s)},complete:function(){k(s)},data:l,dataType:"json",method:"post",success:function(t){void 0!==t.fragments&&T(t.fragments),n()},url:yith_wcwl_l10n.ajax_url})})),S.on("click",".hide-title-form",p),S.on("click",".save-title-form",u),S.on("change",".wishlist_manage_table .wishlist-visibility",m),S.on("change",".change-wishlist",(function(){var i=t(this),e=i.parents(".cart.wishlist_table"),a=e.data("token"),o=i.parents("[data-row-id]").data("row-id");h({wishlist_token:a,destination_wishlist_token:i.val(),item_id:o,fragments:j()},(function(){b(e)}),(function(t){void 0!==t.fragments&&T(t.fragments),k(e)}))})),S.on("click",".yith-wcwl-popup-footer .move_to_wishlist",(function(){var i=t(this),e=i.attr("data-product-id"),a=i.data("origin-wishlist-id"),o=i.closest("form"),s=o.find(".wishlist-select").val(),l=o.find(".wishlist-name"),d=l.val(),c=o.find(".wishlist-visibility").filter(":checked").val();if("new"===s&&!d)return l.closest("p").addClass("woocommerce-invalid"),!1;l.closest("p").removeClass("woocommerce-invalid"),h({wishlist_token:a,destination_wishlist_token:s,item_id:e,wishlist_name:d,wishlist_visibility:c,fragments:j(e)},(function(){b(i)}),(function(t){var e=t.message;yith_wcwl_l10n.multi_wishlist?(v(e),void 0!==t.user_wishlists&&y(t.user_wishlists)):g(e),void 0!==t.fragments&&T(t.fragments),n(),k(i)}))})),S.on("click",".delete_item",(function(){var i=t(this),e=i.attr("data-product-id"),a=i.data("item-id"),o=t(".add-to-wishlist-"+e);return t.ajax({url:yith_wcwl_l10n.ajax_url,data:{action:yith_wcwl_l10n.actions.delete_item_action,item_id:a,fragments:j(e)},dataType:"json",beforeSend:function(){b(i)},complete:function(){k(i)},method:"post",success:function(e){var a=e.fragments,s=e.message;yith_wcwl_l10n.multi_wishlist&&v(s),i.closest(".yith-wcwl-remove-button").length||g(s),void 0!==a&&T(a),n(),t("body").trigger("removed_from_wishlist",[i,o])}}),!1})),S.on("change",".yith-wcwl-popup-content .wishlist-select",(function(){var i=t(this);"new"===i.val()?i.parents(".yith-wcwl-first-row").next(".yith-wcwl-second-row").show():i.parents(".yith-wcwl-first-row").next(".yith-wcwl-second-row").hide()})),S.on("change","#bulk_add_to_cart",(function(){var i=t(this),e=i.closest(".wishlist_table").find("[data-row-id]").find('input[type="checkbox"]:not(:disabled)');i.is(":checked")?e.attr("checked","checked").change():e.removeAttr("checked").change()})),S.on("submit",".wishlist-ask-an-estimate-popup",(function(){var i=t(this),e=i.closest("form"),a=i.closest(".pp_content"),o=e.serialize();return t.ajax({beforeSend:function(){b(e)},complete:function(){k(e)},data:o+"&action="+yith_wcwl_l10n.actions.ask_an_estimate,dataType:"json",method:"post",success:function(i){if(void 0!==i.result&&i.result){var o=i.template;void 0!==o&&(e.replaceWith(o),a.css("height","auto"),setTimeout(v,yith_wcwl_l10n.time_to_close_prettyphoto))}else void 0!==i.message&&(e.find(".woocommerce-error").remove(),e.find(".popup-description").after(t("<div>",{text:i.message,class:"woocommerce-error"})))},url:yith_wcwl_l10n.ajax_url}),!1})),S.on("click",".yith-wfbt-add-wishlist",(function(i){i.preventDefault();var e=t(this),a=t("#yith-wcwl-form");t("html, body").animate({scrollTop:a.offset().top},500),function(i,e){var a=i.attr("data-product-id"),o=t(document).find(".cart.wishlist_table"),s=o.data("pagination"),l=o.data("per-page"),d=o.data("id"),c=o.data("token"),r={action:yith_wcwl_l10n.actions.reload_wishlist_and_adding_elem_action,pagination:s,per_page:l,wishlist_id:d,wishlist_token:c,add_to_wishlist:a,context:"frontend",product_type:i.data("product-type")};if(!x())return void window.alert(yith_wcwl_l10n.labels.cookie_disabled);t.ajax({type:"POST",url:yith_wcwl_l10n.ajax_url,data:r,dataType:"html",beforeSend:function(){b(o)},complete:function(){k(o)},success:function(i){var a=t(i),o=a.find("#yith-wcwl-form"),s=a.find(".yith-wfbt-slider-wrapper");e.replaceWith(o),t(".yith-wfbt-slider-wrapper").replaceWith(s),n(),t(document).trigger("yith_wcwl_reload_wishlist_from_frequently")}})}(e,a)})),S.on("submit",".yith-wcwl-popup-form",(function(){return!1})),S.on("yith_infs_added_elem",(function(){e()})),S.on("found_variation",(function(i,e){var a=t(i.target).data("product_id"),o=e.variation_id,n=t('[data-product-id="'+a+'"]').add('[data-original-product-id="'+a+'"]'),s=n.closest(".wishlist-fragment");a&&o&&n.length&&(n.each((function(){var i,e=t(this),n=e.closest(".yith-wcwl-add-to-wishlist");e.attr("data-original-product-id",a),e.attr("data-product-id",o),n.length&&(void 0!==(i=n.data("fragment-options"))&&(i.product_id=o,n.data("fragment-options",i)),n.removeClass((function(t,i){return i.match(/add-to-wishlist-\S+/g).join(" ")})).addClass("add-to-wishlist-"+o).attr("data-fragment-ref",o))})),b(s),C({fragments:s,firstLoad:!1}))})),S.on("reset_data",(function(i){var e=t(i.target).data("product_id"),a=t('[data-original-product-id="'+e+'"]'),o=a.closest(".wishlist-fragment");e&&a.length&&(a.each((function(){var i,a=t(this),o=a.closest(".yith-wcwl-add-to-wishlist"),n=a.attr("data-product-id");a.attr("data-product-id",e),a.attr("data-original-product-id",""),o.length&&(void 0!==(i=o.data("fragment-options"))&&(i.product_id=e,o.data("fragment-options",i)),o.removeClass("add-to-wishlist-"+n).addClass("add-to-wishlist-"+e).attr("data-fragment-ref",e))})),b(o),C({fragments:o,firstLoad:!1}))})),S.on("yith_wcwl_reload_fragments",C),S.on("yith_infs_added_elem",(function(t,i){C({container:i,firstLoad:!1})})),S.on("yith_wcwl_fragments_loaded",(function(i,e,a,o){o&&t(".variations_form").find(".variations select").last().change()})),S.on("click",".yith-wcwl-popup-feedback .close-popup",(function(t){t.preventDefault(),v()})),function(){if(void 0!==yith_wcwl_l10n.enable_notices&&!yith_wcwl_l10n.enable_notices)return;if(t(".yith-wcwl-add-to-wishlist").length&&!t("#yith-wcwl-popup-message").length){var i=t("<div>").attr("id","yith-wcwl-message"),e=t("<div>").attr("id","yith-wcwl-popup-message").html(i).hide();t("body").prepend(e)}}(),s(),l(),d(),c(),_(),t(document).on("click",".show-tab",(function(i){var e=t(this),a=e.closest(".yith-wcwl-popup-content"),o=e.data("tab"),n=a.find(".tab").filter("."+o);if(i.preventDefault(),!n.length)return!1;e.addClass("active").siblings(".show-tab").removeClass("active"),n.show().siblings(".tab").hide(),"create"===o?a.prepend('<input type="hidden" id="new_wishlist_selector" class="wishlist-select" value="new">'):a.find("#new_wishlist_selector").remove()})),t(document).on("change",".wishlist-select",(function(){var i=t(this),e=i.closest(".yith-wcwl-popup-content"),a=i.closest(".tab"),o=e.find(".tab.create"),n=e.find(".show-tab"),s=n.filter('[data-tab="create"]');"new"===i.val()&&o.length&&(a.hide(),o.show(),n.removeClass("active"),s.addClass("active"),i.find("option").removeProp("selected"),i.change())})),i(),a(),e(),o(),function(){var i=!1;if(!yith_wcwl_l10n.is_wishlist_responsive)return;t(window).on("resize",(function(){var e=t(".wishlist_table.responsive"),a=e.is(".mobile"),o=window.matchMedia("(max-width: 768px)"),s=e.closest("form"),l=s.attr("class"),d=s.data("fragment-options"),c={},r=!1;e.length&&(o.matches&&e&&!a?(d.is_mobile="yes",r=!0):!o.matches&&e&&a&&(d.is_mobile="no",r=!0),r&&(i&&i.abort(),c[l.split(" ").join(yith_wcwl_l10n.fragments_index_glue)]=d,i=t.ajax({beforeSend:function(){b(e)},complete:function(){k(e)},data:{action:yith_wcwl_l10n.actions.load_mobile_action,fragments:c},method:"post",success:function(i){void 0!==i.fragments&&(T(i.fragments),n(),t(document).trigger("yith_wcwl_responsive_template",[a,i.fragments]))},url:yith_wcwl_l10n.ajax_url})))}))}(),r(),C()})).trigger("yith_wcwl_init")}));
	}

	// ACTIVE_TODO but we may like to move it very soon somwhere in applicable common sections and out of this filter js -- to h & -- to s
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

	/*ACTIVE_TODO_OC_START
	check in all 3 files if in use -- to s
		ACTIVE_TODO check in all filters related js layers & files if in use -- to s
	ACTIVE_TODO_OC_END*/
	var render_data = '';
	var _render_container = '';

	// move all fundamental functions like below inside the filters core js module -- to d. it will be as private functions mostly done
		// -- also wherever you have found the change function instance in any repo then there check for the eo_wbc_filter_render_html function like below and copy their code over to the filters js module where below code is moved, but yeah where you copy above it put a comment stating from which repo and which file line it is moved -- to d done
			// done for 3 files
			// ACTIVE_TODO check in all filters related js layers & files if in use -- to s
	//render products DOM to view
	// function eo_wbc_filter_render_html(data,render_container) {


	// 	/*jQuery("#loading").removeClass('loading');
	// 	return true;*/

	// 	render_data = data;
	// 	_render_container = render_container;

	// 	ACTIVE_TODO_OC_START
	// 	create two function show_loader and hide_loader in filters core js module -- to d 
	// 		--	and then move the below code in the hide_loader -- to d 
	// 		--	and check all the change function implementation and move show related code in the show_loader function and hide related code in the hide_loader function -- to d
	// 		--	needless to say but still note that the loader hide show event should be carefully called from each related search events like search, complete, error and maybe also some other which handle some particular scenarios. -- to d 
	// 			--	so that what happen is that in future if the events namespace is firing the search or any related events around and if by any change any event that the filters module recieve is related to the show hide loader flow then that is taken care of implicitly.  
	// 	ACTIVE_TODO_OC_END
				
	// 	///////////////// shraddha //////////////////////		
	// 	// jQuery("#loading").removeClass('loading');
	// 	/////////////////////////////////////////////////

	// 	// ACTIVE_TODO_OC_START
	// 	// create one function update_result_count in filters core js module -- to d 
	// 	// --	and then move the below code in that -- to d 
	// 	// --	and check all the change function implementation and move show related code in that function -- to d 
	// 	// --	I have some doubt the below condition's logic it is setting to empty when there is not result count container is returned. but I guess that is exceptional scenario which would never be happening but if it happens then we need to handle that exceptional scenario, so for now keeping it open and if no such thing show up after 1st or 2nd revision then remove this task ACTIVE_TODO -- to b 
	// 	// 	--	move above task comment also with the code -- to d 
	// 	// ACTIVE_TODO_OC_END
			
	// 	//Replace Result Count Status...
	// 	if(jQuery('.woocommerce-result-count',jQuery(data)).html()!==undefined){
	// 		if(jQuery(".woocommerce-result-count").length>0){
	// 			jQuery(".woocommerce-result-count").html(jQuery('.woocommerce-result-count',jQuery(data)).html());
	// 		} else {
	// 			jQuery(jQuery('.woocommerce-result-count',jQuery(render_data)).get(0).outerHTML).insertBefore('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products');
	// 		}
	// 	}
	// 	else {
	// 		jQuery(".woocommerce-result-count").html('');	
	// 	}

	// 	//Replacing Product listings....
	// 	// ACTIVE_TODO_OC_START
	// 	// like vars under window object are moved filter core js module, similarly move below var also to filters js module and underneath below statement set it in the filters js module -- to d 
	// 	// ACTIVE_TODO_OC_END

	// 	document.wbc_data = data;
		
	// 	/*console.log(data);*/

	// 	// ACTIVE_TODO_OC_START
	// 	// we can define a compatibility check flow, where the compatibility function will be available in each js module -- to d 
	// 	// 	-- that will recieve a object and second argument will be the excpected result. -- to d 
	// 	// 	-- if that is not matched then the compatibility function will apply its all available compatibility scenarios -- to d. like the below elementor-products-grid class statement would then go inside compatibility if. and .jet-woo-products also belong there, but let it be there and same for any js module layers where we have compatibility patch is mixed with basic/standard implementation statement to avoid the errors while separating them. 
	// 	// ACTIVE_TODO_OC_END
			
	// 	let container_html = jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products',jQuery(data)).html();	
		
	// 	/*if(container_html===undefined || container_html==='') {
	// 		container_html = jQuery(jQuery(data),'.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products').html();
	// 	}*/

	// 	if(container_html===undefined || container_html==='') {
	// 		container_html = jQuery(".elementor-products-grid",jQuery(data)).html();
	// 	}

	// 	if(container_html!==undefined && container_html!=='') {	
	// 		if( typeof(is_card_view_rendered) == undefined || typeof(is_card_view_rendered) == 'undefined' || is_card_view_rendered == false ) {
	// 			if(jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products').length<=0) {
	// 				jQuery(render_container).html(container_html);
	// 			} else {
	// 				jQuery(render_container).html(container_html);
	// 			}			
	// 		}						
	// 		else {

	// 			// ACTIVE_TODO_OC_START
	// 			// we need to track execution of this function so search in all 5 repos and confirm where this function is defined -- to d 
	// 			// 	--	and if that is found then only track above where is_card_view_rendered to see from which different locations it is defined and/or coming -- to d 
	// 			// ACTIVE_TODO_OC_END
					
	// 			wbc_attach_card_views();
	// 		}

	// 		var links=jQuery(".products a,.product-listing a");
	// 		jQuery.each(links,function(index,element) {

	// 			var href=jQuery(element).attr('href');
	// 			if(typeof(href)!==typeof(undefined) && href.hasOwnProperty('indexOf')){
	// 				if(href.indexOf('?')==-1) {
	// 					jQuery(element).attr('href',jQuery(element).attr('href')+eo_wbc_object.eo_product_url);
	// 				} else {
	// 					jQuery(element).attr('href',href.substring(0,href.indexOf('?'))+eo_wbc_object.eo_product_url);
	// 				}
	// 			}
				
	// 		});
	// 	}
	// 	else {

	// 		// ACTIVE_TODO_OC_START
	// 		// ACTIVE_TODO instead of determining if products are found or not on the js layer, it is really if we send a flag var from the php layer. so do it. in the dapii feed layers it is already like that but ensure that in wbc and tableview(in tableview also it is at least almost planned and roughly implemented) -- to h or -- to d 
	// 		// ACTIVE_TODO_OC_END

	// 		// 	ACTIVE_TODO commented below events subject creation, during testing only. so temporary only.
	// 		window.document.splugins.wbc.filters.core.no_products_found();

	// 		// ACTIVE_TODO_OC_START
	// 		// just move below line in the no_products_found function of the filters js module -- to d 
	// 		// 	--	and so now the render_container will recieve one parameter that is render_container, it will defaults to null so from where it is applicable it is passed otherwise it will be left blank -- to d 
	// 		// ACTIVE_TODO_OC_END
				
	// 		jQuery(render_container/*".products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products"*/).html('<p class="woocommerce-info" style="width: 100%;">No products were found matching your selection.</p>');	
	// 	}	

	// 	if(render_container===".products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products"){
	// 		//Replacing Pagination details.....		
	// 		//console.log(jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination',jQuery(data)).html());

	// 		// ACTIVE_TODO_OC_START
	// 		// //done move below logic to the pagination js module -- to d. including the compatibility conditions are there in the if else block, like planned above to keep the compatibility patches as it is if they are already implemented otherwise we will put them in the dedicated compatibility function. 
	// 		// 	-- //done create below functions in that module 
	// 		// 		-- //done 	bind_click -- to d. put comment inside function "it will bind to all kind of such on_click events of pagination, it will be private but it may broadcast notification with a callback which js layers of like tableview and so on can call when they recieve their own click event or they can simply call below on_click function". so it is private function. 
	// 		// 			-- //done 	and from this function call the private click function -- to d 
	// 		// 		-- //done 	on_click -- to d. put comment inside function "listen to all on_click events". so it is public function. 
	// 		// 		-- //done 	click -- to d. put comment inside function "it will internally implement all flows related to pagination link click event". so it is private function. 
	// 		// 			-- //done 	call this function from above on_click -- to d 	
	// 		// 			-- raise on_click notification using notifyAllObservers -- to d 
	// 		// 			-- in init_private function first create the subject for observer pattern also -- to d 
	// 		// 			-- //done  so also create init_private and init(public) function -- to d 
	// 		// 		-- //done 	compatibility -- to d. it is private function. 
	// 		// 		-- //done 	get_page_number -- to d. it is public function. 
	// 		// 		-- //done 	set_page_number -- to d. it is public function. 
	// 		// 			-- raise page_number_udpated notification using notifyAllObservers -- to d 
	// 		// 		-- //done 	on_reset -- to d. it is public function. 
	// 		// 			--	external layers would simply call this function, since observer pattern is not seem necessary here -- to d 
	// 		// 			-- //done 	and from this function call the private reset function -- to d 
	// 		// 		-- //done 	reset -- to d. it is private function. 
	// 		// 			-- raise on_reset notification using notifyAllObservers -- to d 
	// 		// 		tableview and so on would depend on that extended flow of observer pattern where notification will provide a callback, this flow is to be confirmed so either it or something else that is confirmed there on common js variations notes will be used. 
	// 		// 			-- tableview will use it for its flows like binding click event, which is ideal use case of the observer pattern -- to d 
	// 		// 			-- and it will also use it for triggerring the click event, means of its own pagination links dom -- to d 
	// 		// 				-- ACTIVE_TODO but very soon maybe the tableview may not have its own pagination links dom if that is not necessary for it -- to h and -- to d 
	// 		// 			-- and for setting and getting current page_number 
	// 		// 				--	for it may simply need to use the pagination modules published api interface -- to d 
	// 		// ACTIVE_TODO_OC_START

	// 		if(jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination',jQuery(data)).html()!==undefined) {
	// 			if(jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination').length>0){
	// 				jQuery(".woocommerce-pagination,.pagination,jet-filters-pagination").html(jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination',jQuery(data)).html());
	// 			} else {

	// 				// ACTIVE_TODO_OC_START
	// 				// @d once all the pagination related layers brought to this function, we need to check if the below incomplete implementation is completely implemented anywhere in our repo -- to d 
	// 				// 	--	if not then test with the elementor created category feed page and also with elementor hello themes custom loop to check if it works. if not then must uncomment the last uncommented line and finish the implementation -- to d or -- to b 
	// 				// ACTIVE_TODO_OC_END
						
	// 				let product_container = jQuery(".products:eq(0),.product-listing:eq(0),.row-inner>.col-lg-9:eq(0)");
	// 				if(product_container.length<=0) {
	// 					product_container = jQuery(".elementor-products-grid");
	// 					if(product_container.length<=0) {
	// 						product_container = jQuery(".elementor-widget-container").has('[data-elementor-type="loop"]');
	// 						if(product_container.length<=0) {
	// 							product_container = jQuery("[data-widget_type='archive-posts.archive_custom']");						
	// 						}
	// 					}
	// 				}
	// 				//jQuery(product_container).append('<nav class="woocommerce-pagination">'+jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination',jQuery(data)).html()+'</nav>');
	// 			}
	// 		}
	// 		else {
	// 			jQuery(".woocommerce-pagination,.pagination,jet-filters-pagination").html('');	
	// 		}
	// 	/*}*/

	// 	ACTIVE_TODO_OC_START
	// 	and below one to the hide_loader function -- to d 
	// 	ACTIVE_TODO_OC_END

	// 	//jQuery("body").fadeTo('fast','1')	

	// 	/////////////// shraddha //////////////////								
	// 	// jQuery("#loading").removeClass('loading');
	// 	///////////////////////////////////////////
		
	// 	ACTIVE_TODO_OC_START
	// 	almost all of the below seems compatibility related to so move that to compatibility function, and at there we need to have section conditon like this would be broadly as product-listing -- to d 
	// 		--	you already moved below code, which I saw, but there is not comment below that it is moved so please let me know what is going on -- to d 
	// 	ACTIVE_TODO_OC_END
		
		
	// 	jQuery('.products:eq(0),.product-listing:eq(0),.row-inner>.col-lg-9:eq(0)').addClass('product_grid_view');
	// 	//jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.woocommerce-pagination,.pagination').css('visibility','visible');
	// 	if(jQuery(".row-inner>.col-lg-9").length>0){
	// 		jQuery(".row-inner>.col-lg-9 *").each(function(i,e) {		
	// 		    if(jQuery(e).css('opacity') == '0'){
	// 				jQuery(e).css('opacity','1');        
	// 		    }
	// 		});
			
	// 		jQuery(".t-entry-visual-overlay").removeClass('t-entry-visual-overlay');
	// 		jQuery(".double-gutter .tmb").css('width','50%');
	// 		jQuery(".double-gutter .tmb").css('display','inline-flex');
			
	// 	}
		
	// 	jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.woocommerce-pagination,.pagination,jet-filters-pagination').css('visibility','visible');

	// 	// Fix for the yith wishlist.
	// 	if(typeof(yith_wcwl_l10n)=='object'){
	// 		eowbc_yith_wishlist_fix();
	// 	}
	// 	// lazyload
	// 	if(typeof(LazyLoad)=='function'){
	// 		eowbc_lazyload();
	// 	}
	// }

	/*if(eo_wbc_object.disp_regular=='1'){
		*/
	// --	disp_regular aa wbc and tableview ma serch ekaravano -- to s
		// window.eo_wbc_object.enable_filter = true;
		// window.document.splugins.eo_wbc_object.enable_filter = true;
		// NOTE: now below flag set logic is disabled and initialy the flag is set at page load time only from the init_private function of filters module. 
		// window.document.splugins.wbc.filters.api.set_enable_filter(true);

		// jQuery.fn.eo_wbc_filter_change_native= function(init_call=false,form_selector="form#eo_wbc_filter",render_container='',parameters={}) {

			/*ACTIVE_TODO_OC_START
			on an important note there should a 
			function parameter in this main function of the filters module, which specify the filter event is for what. it can be the form_selector but things can get complicated so better to have dedicated parameter so lets just support the dedicated parameter under the parameters object that it recieve, so it will be with the key caller_module -- to d. this will be necessary to manage logic or conditions based on the caller_module condition. 
				but is it enough? 
					--	with only the caller_module condition and the filters js module? 
						--	maybe we need more stat holders, like on dapii we had the dedicated class to encapsulate and maintain the stat of each API and what not 
							--	and maybe the custom attribute filters, diamond quiz and custom numeric filters will need more to maintain their stat and logic since we can not put all of their logic here with mere conditions and also the benefits reusability can be better achieved and maintained with the modularity instead of long if else flows 
					--	and will it be good enough with the js modules and the events stack? 
						--	maybe we will good with dedicated js modules for diamond quiz, custom attribute filters and so on but that will not be reusable and maintaining will be burden so we simply a mature inherited modules flow where this filters module being the based like dapii lib class and the other js module will be extending it but this time not like diamond api but it will be these js modules own unique flow maybe like sp_api and ftp/csv-excel extending it 
							maybe the js modules evolved in 360, darker lighter and diamond meta and alos even 3 set of mudules of shap size and color extension are appropriate and efficiant architecture. : NOTE
			ACTIVE_TODO_OC_END*/
						
			// console.log(form_selector);
		// flag indicates if to show products in tabular view or woocommerce's default style.		

			// if(window.eo_wbc_object.enable_filter===false){
			// 	return false;
			// }

			// and below will be inside the init_search also -- to d done
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

			// return false;
		// }	
		
		/*s: question need to manage this global layer
		if(typeof(window.eo_wbc_filter_change) === 'undefined') {
			window.eo_wbc_filter_change = jQuery.fn.eo_wbc_filter_change_native;
		}*/

		/*s: question need to manage this global layer
		if( (typeof(jQuery.fn.eo_wbc_filter_change)=="undefined" || jQuery.fn.eo_wbc_filter_change==undefined) && typeof(window.eo_wbc_e_tabview) !== 'object' ){		
			jQuery.fn.eo_wbc_filter_change = jQuery.fn.eo_wbc_filter_change_native;
		}*/
	/*}*/

	jQuery(document).ready(function($){

		// if any of the below vars are related to the stat and so on vars that we planned to rename or move then should be covered here also, otherwise at runtime it will break and would not run and crash -- to d done
		
		console.log("filter js ready event"); 	
		window.eo_wbc_object = window.eo_wbc_object || {};
		// window.eo_wbc_object.enable_filter = window.eo_wbc_object.enable_filter || false;

		window.document.splugins.eo_wbc_object = window.document.splugins.eo_wbc_object || {};
		// window.document.splugins.eo_wbc_object.enable_filter = window.document.splugins.eo_wbc_object.enable_filter || false;
		// NOTE: now below flag set logic is disabled and initialy the flag is set at page load time only from the init_private function of filters module. 
		// window.document.splugins.wbc.filters.api.set_enable_filter(false);

		//done move to pagination js modules bind_click function -- to d 
			
			// --	and also be sure to the filter_change function call. and why that is so far not changed? -- to d 
				// --	and comment code below but the pagination modules init function need to be called from here -- to d done
				// 	--	so first export and publish that module under ...api -- to d done	

		// jQuery('body').on('click','.navigation .page-numbers,.woocommerce-pagination a.page-numbers',function(e){
		//     e.preventDefault();
		//     e.stopPropagation();
		    
		// 	jQuery('[name="paged"]').val(parseInt(jQuery(this).text().replace(',','')));		
		// 	jQuery.fn.eo_wbc_filter_change(false,'form#'+jQuery(this).parents().has('[id$="eo_wbc_filter"]').find('[id$="eo_wbc_filter"]').attr('id'));
		// });

		// moved to assets php
		// window.document.splugins.wbc.pagination.api.init();

		/*ACTIVE_TODO_OC_START
		ask t for what it is -- to d 
			-- then need to create if applicable then applicable function in applicable js module and mode code there -- to d 
		
		we most likely need to comment below code but lets confirm one last time -- to h & -- to s
			t ni last follow up aave pachhi if false maravnu. -- to s	
				after if false we need to rely on details from m -- to h
		ACTIVE_TODO_OC_END*/
		if(false) {
			jQuery("[data-toggle_column]").click(function(){
				if(jQuery(this).hasClass('active')){		
					jQuery("[data-toggle_slug='"+jQuery(this).data('toggle_column')+"']").css('display','none');
					jQuery(this).removeClass('active');

				} else {
					jQuery("[data-toggle_slug='"+jQuery(this).data('toggle_column')+"']").css('display','table-cell');
					jQuery(this).addClass('active');
					
				}
			});
		}

		// create function bind_reset_click in filters js module and move below code there -- to d done
			// --	and then from just make call to that private function from the init_private of the same module -- to d done
			// --  and comment code below but the filters modules init function need to be called from here -- to d done
			// 	--	so first export and publish that module under ...api -- to d done

		/*jQuery(document).on('click',".reset_all_filters",function(){
	        jQuery("[data-reset]").each(function(e){
	            eval(jQuery(this).data('reset'));
	        })
	        jQuery.fn.eo_wbc_filter_change();
	        return false;
	    });*/  

	  	// window.document.splugins.filters.core.init();
		// moved to assets php
	  	// window.document.splugins.filters.api.init();

		if(window.eo_wbc_object.disp_regular){

			// create function bind_click in filters js module and move below code there -- to d done
			// 	--	and then from just make call to that private function from the init_private of the same module -- to d done
			//jQuery(".woocommerce-pagination,.pagination,jet-filters-pagination").html('');	

			/*ACTIVE_TODO_OC_START
			s: question niche code block filter module na "on_change_listener" function ma chhe to e fucntion call karavanu -- to s
				this seems to be limited only for the tableview so need top figureout if this is not needed for filter js then should be moved to tableview js and all other such things in this if block of disp_regular condition above -- to h & -- to s
			-- jewellery demo ma apply filter nu button work kare se -- to a
			ACTIVE_TODO_OC_END*/
			if(!window.eo_wbc_object.btnfilter_now){			
				jQuery("#eo_wbc_filter").on('change',"input:not(:checkbox)",function(){
					console.log("btnfilter_now");
					jQuery('[name="paged"]').val('1');
					// jQuery.fn.eo_wbc_filter_change();	
					window.document.splugins.filters.api.eo_wbc_filter_change_wrapper();									
				});
			}

			/*s: question need to manage this global layer
			if(typeof(jQuery.fn.eo_wbc_filter_change) === typeof(undefined) &&  typeof(window.eo_wbc_filter_change) === 'function') {
				jQuery.fn.eo_wbc_filter_change = window.eo_wbc_filter_change;				
			}*/
			

			//changes: mahesh@emptyops.com
			// To prevent initial call for the ajax -- speed optimization -- stop ajax at init load;
			// s: question need to manage this global layer
			// NOTE: now below call which is on opage load is disabled and so now we need to make sujre if any issue during page load occurs then we need to handel it. however if there are any olther call during page load in ready or so then that also should be disabled.
			// if(typeof(eo_wbc_e_tabview)===typeof(undefined) || typeof(eo_wbc_e_tabview.init_data)===typeof(undefined) || typeof(eo_wbc_object)==typeof(eo_wbc_object) ){
			// 	// jQuery.fn.eo_wbc_filter_change(true);
			// 	window.document.splugins.filters.api.eo_wbc_filter_change_wrapper();
			// }

			//pagination for non-table based view

			//done move to pagination js modules bind_click function -- to d 
				// --	and also be sure to the filter_change function call. and why that is so far not changed? -- to d 
			// below block are moved in filter module bind_click function. so do not consider this code block here. -- shraddha -- to s 

			// --- pagination module move this code ---
			// and alredy call filter init function in this ready event and inside that function all listener are called.
			// jQuery("body").on('click','.woocommerce-pagination a,.pagination a,.jet-filters-pagination a,.woocommerce-pagination .jet-filters-pagination__link,.pagination .jet-filters-pagination__link,.jet-filters-pagination .jet-filters-pagination__link',function(event){
				
			// 	event.preventDefault();
			// 	event.stopPropagation();								
				
			// 	// ACTIVE_TODO page nnumber text would break below with multilanguage so instead use the data attribute to store and read the page number -- to a and/or -- to h
			// 	if(jQuery(this).hasClass("next") || jQuery(this).hasClass("prev")){
					
			// 		--  wherever .val is used then called set page_number from pagination -- to s
			// 			--  wherever .text is used then called get page_number from pagination -- to s

			// 		if(jQuery(this).hasClass("next")){
			// 			jQuery("[name='paged']").val(parseInt(jQuery(".page-numbers.current").text())+1);
			// 		}
			// 		if(jQuery(this).hasClass("prev")){
			// 			jQuery("[name='paged']").val(parseInt(jQuery(".page-numbers.current").text())-1);
			// 		}	
			// 	}		
			// 	else {
			// 		jQuery("[name='paged']").val(jQuery(this).text());
			// 	}		

			// 	// jQuery.fn.eo_wbc_filter_change(false,'form#'+jQuery(this).parents().has('[id$="eo_wbc_filter"]').find('[id$="eo_wbc_filter"]').attr('id'));
			// 	window.document.splugins.filters.api.eo_wbc_filter_change_wrapper(false,'form#'+jQuery(this).parents().has('[id$="eo_wbc_filter"]').find('[id$="eo_wbc_filter"]').attr('id'));
			// });
			// --- end ---
			/*ACTIVE_TODO_OC_START
			window.document.splugins.pagination.api.on_click_listener();
			ACTIVE_TODO_OC_END*/
		}
		/////////////////////////
		////////////////////////
		// create function advance_filter_accordian in filters js module and move below code there -- to d done 
			// --	and then from just make call to that private function from the init_private of the same module -- to d done

		// if(jQuery.fn.hasOwnProperty('accordion') && typeof(jQuery.fn.accordion)==='function'){
		// 	jQuery( ".eo_wbc_advance_filter" ).accordion({
		// 	  collapsible: true,
		// 	  active:false
		// 	});
		// }

		// in function bind_reset_click in filters js module and move below code there -- to d done
			// --	just confirm above point and then need to call the bind_reset_click function from below. or if we have better idea to call it from the filters js module itself there. I think it is better to call from thed filters js module. so bind_reset_click will be private function. -- to s done
		// below code are moved in on_reset_click_listener and e function init_private manthi call thay che. shraddha
		//Reset form and display

		
		// below code block are move in 
		/*jQuery(".eo_wbc_srch_btn:eq(2)").click(function(){					
			///////////////////////////////////////////
			document.forms.eo_wbc_filter.reset();
			jQuery(".eo_wbc_srch_btn:eq(2)").trigger('reset');
			jQuery("#eo_wbc_attr_query").val("");
			jQuery('[name="paged"]').val('1');
			// jQuery.fn.eo_wbc_filter_change(true);
			window.document.splugins.filters.api.eo_wbc_filter_change_wrapper(true);
		});*/

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
		console.log('eo_wbc_filter [reset_slider]');
		console.log(selector);
		console.log(first);
		console.log(second);
		jQuery(".ui.slider[data-slug='"+selector+"']").semanticSlider('set rangeValue',first,second);
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
		jQuery(".ui.slider[data-slug='price']").semanticSlider('set rangeValue',min,max);
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

	window.document.splugins.wbc.filter_sets = window.document.splugins.wbc.filter_sets || {};

	window.document.splugins.wbc.filter_sets.core = function( configs ) {

		var _this = this; 

		_this.configs = jQuery.extend({}, {}/*default configs*/, configs);

		var init_private = function() {

			console.log("filter_sets init_private ");

			console.log(_this.configs);

	        window.document.splugins.events.api.createSubject( 'filter_sets', ['filter_set_click_before_loop'] );

			init_preprocess();
		};
	    
	    var init_preprocess = function(event) { 

	        console.log('init_preprocess() 01');

	        preprocess(null, event);

	        console.log('init_preprocess() 02');
	  
	   		jQuery('.filter_setting_advance_two_tabs .item.active, .filter_setting_advance_two_tabs .item .nav-link.active').click();
	    }

	    var preprocess = function(element, event) { 

	        process_types(null,element);
	    }

	    var process_types = function(type=null, element=null) { 

	        process_types_inner(type, element);    
	    }       

	    var process_types_inner = function(type, element) { 

	        process_events(type);
	    }

	    var process_events = function(type) { 
	    
	    	filter_set_click_listener();
	    }

	    var filter_set_click_listener = function() { 
			
			console.log("filter_sets filter_set_click_listener");

			var on_filter_set_click_listener_callback = null ;

			jQuery('.filter_setting_advance_two_tabs .item').on('click',function(event){
				console.log('filter_sets filter_set_click_listener on_click');
				on_filter_set_click(this);
			});

	    	
	    }

	    var on_filter_set_click = function(element) { 
	    
	    	filter_set_click(element);
	    }

	    var filter_set_click = function(element) {

			console.log("filter_sets filter_set_click 11");

	    	// --- aa code woo-bundle-choice/application/view/publics/filters/two_tabs.php mathi move karyo se @a ---
	    	// --- start ---

		    let display_style = 'inline-block';

		    // <?php /*if(wp_is_mobile() and !wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile')):*/ ?>
		    if((window.document.splugins.common.is_mobile) && !(_this.configs.filter_setting_alternate_mobile)){
		    
		      display_style='block';
		    
		    }

		    /*let _category = $("[name='_category']").val();
		    _category = _category.split(',');
		    if(_category.indexOf('_two_tabs')==-1){
		      _category.push('_two_tabs');
		      $("[name='_category']").val(_category.join(','));
		    }

		    $('[name="cat_filter__two_tabs"]').val($(this).data('category'));*/

		    jQuery('[name="_current_category"]').val(jQuery(element/*this*/).data('category'));

		    jQuery('[name="_category"]').val(jQuery(element/*this*/).data('category'));

		    //cat_filter__two_tabs
		    
		    jQuery('.filter_setting_advance_two_tabs .item').removeClass('active');

			jQuery(element/*this*/).addClass('active');

		    let group_id = jQuery(element/*this*/).data('tab-name');

			console.log("filter_sets filter_set_click 22");

		    // $('[data-tab-group="'+group_id+'"]:not(.toggle_sticky_mob_filter.advance_filter_mob)').not('[data-tab-group]:has([data-switch_filter_type-alternate])').css('display',stat_object.display_style);	
		    var filter_set_click_callback = function(stat_object){

		    	console.log('filter_set_click_callback()');
	            jQuery('[data-tab-group="'+group_id+'"]:not(.toggle_sticky_mob_filter.advance_filter_mob)').not('[data-tab-group]:has([data-switch_filter_type-alternate])').css('display',stat_object.display_style);	

	    	};
		    window.document.splugins.events.api.notifyAllObservers( 'filter_sets', 'filter_set_click_before_loop',{display_style:display_style},filter_set_click_callback);          

			
			console.log("filter_sets filter_set_click 33");
			console.log(_this.configs.filter_sets_data);

	        jQuery( _this.configs.filter_sets_data ).each(function (i, tab_data) {

				console.log("filter_sets filter_set_click 33.11");

	        	if(group_id == tab_data.first_tab_id){

	        		//return means continue
	        		return;
	        	}

				let group_id_alt = tab_data.first_tab_id/*$(this).data('tab-altname')*/;
				console.log('tab_data');
				console.log(tab_data);
			    jQuery('[data-tab-group="'+group_id_alt+'"]').css('display','none');        	

				jQuery('[data-tab-group="'+group_id_alt+'"]').each(function(){
			      
			      let reset_script = jQuery(element/*this*/).find('[data-reset]').data('reset');
			      if(typeof(reset_script)!==typeof(undefined) && reset_script!=''){
			       
			        eval(reset_script);
			      }        

			      if(eo_wbc_object.wbc_is_mobile_by_page_sections != 1) {

				      console.log('filter filter_set_click');
				      console.log(_this.configs.filter_setting_alternate_mobile);
				      // <?php if(wp_is_mobile() and !wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile')): ?>
				      if( (eo_wbc_object.wbc_is_mobile_by_page_sections == 1) && (window.document.splugins.common.is_mobile) && !(_this.configs.filter_setting_alternate_mobile)){

				      	console.log('filter filter_set_click 1');
				      	console.log(element);

				        if(jQuery(element/*this*/).hasClass('active')){
				      
				          jQuery(element/*this*/).trigger('click');
				        }
				      
				        reset_script = jQuery(element/*this*/).next().find('[data-reset]').data('reset');
				        if(typeof(reset_script)!==typeof(undefined) && reset_script!=''){
				      
				          eval(reset_script);
				        }        
				      }

				      // <?php if(wp_is_mobile() and wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile')): ?>
				      if( (eo_wbc_object.wbc_is_mobile_by_page_sections == 1) && (window.document.splugins.common.is_mobile) && (_this.configs.filter_setting_alternate_mobile)){

				      	console.log('filter filter_set_click 2');
				      	console.log(element);

				        if(jQuery(element/*this*/).hasClass('active')){
				      
				          jQuery(element/*this*/).trigger('click');
				        }          
				        
				        reset_script = jQuery(element/*this*/).next().find('[data-reset]').data('reset');
				        if(typeof(reset_script)!==typeof(undefined) && reset_script!=''){
				      
				          eval(reset_script);
				        }  

				        jQuery(".close_sticky_mob_filter").trigger('click');

				      }  

			      }
			      
			    });        	
	          
	        });

		    // <?php if(wp_is_mobile() and wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile')): ?>
		    if((window.document.splugins.common.is_mobile) && (_this.configs.filter_setting_alternate_mobile)){
				console.log("filter_sets filter_set_click 44");
				
				jQuery('#advance_filter_mob_alternate').removeClass('status_hidden');

				jQuery( _this.configs.filter_sets_data ).each(function (i, tab_data) {

				  	jQuery(".toggle_sticky_mob_filter.advance_filter_mob[data-tab-group='"+tab_data.first_tab_id/*$(this).data('tab-altname')*/+"'],.toggle_sticky_mob_filter.advance_filter_mob[data-tab-group='']").hide();

			  	});
		      
		    }

			console.log("filter_sets filter_set_click 55");
			
			// reset
			window.document.splugins.wbc.pagination.api.set_page_number( 1 );
		    
		    // window.document.splugins.wbc.filters.core.eo_wbc_filter_change_wrapper(false,'form#<?php echo $filter_ui->filter_prefix; ?>eo_wbc_filter','',{'this':this,'event':event});
		    window.document.splugins.wbc.filters.api.eo_wbc_filter_change_wrapper(false,'form#'+_this.configs.filter_prefix +'eo_wbc_filter','',{'this':element/*this*/,'event':event});

		    // --- end ---	
	    };

		return {

			init: function() {

				init_private();
			}
		};

	};

	console.log(filter_sets_confings);

	window.document.splugins.wbc.filter_sets.api = window.document.splugins.wbc.filter_sets.core( filter_sets_confings );
	// jQuery(document).ready(function(){
		// moved to assets php
		// window.document.splugins.wbc.filter_sets.api.init(); 	
	// });
}
