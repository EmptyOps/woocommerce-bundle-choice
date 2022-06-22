/**
 * common js functions and also the common defs for the module, observer, prototype and singleton design patterns 
 * 
 * this asset file will contain the common layer and functions, and if there are common functions which are specific to admin only then that will not go here but on in the admin asset js file, and if there are common functions which are to be used by frontend but in some cases by admin or even if not going to be used by admin then also be added here. so this asset file will be loaded on both admin and frontend. the decision of managing common flows like this and priotizing what goes to frontend is because of the requirement of minimizing the number of assets that would be loaded on frontend. 
 */
window.document.splugins = window.document.splugins || {};
window.document.splugins.common = window.document.splugins.common || {};

window.document.splugins.wbc = window.document.splugins.wbc || {};

//  common functions 
window.document.splugins.common.parseJSON = function(result,confirm_obj_format=true, obj_format='result'/*our standard response result object on any kind of ajax or api calls to our backends and other applicable layers*/) {
    var resjson = null;
    try{
        console.log('called splugins parseJSON');
        resjson = jQuery.parseJSON(result);
    }
    catch(e) {
        try{
            console.log('Normal jQuery parseJSON failed. Trying extract.');
            jsonobjs = window.document.splugins.extractJSON(result);
            // TODO here it is possible that in some rare cases more than one json result object is return in that case we need to find all json string object from response and identify our response only by putting some unique key/identifier like wbc_ajax_response maybe in our response
            if( typeof(jsonobjs[0]) != undefined && typeof(jsonobjs[0]) != 'undefined' ) {
                console.log('splugins parseJSON extracted the json string from response');
                result = JSON.stringify(jsonobjs[0]);   //since we want to use jQuery.parseJSON
                resjson = jQuery.parseJSON(result); 
            }
        }
        catch(e) {
            console.log('Exception handling of splugins parseJSON failed.');
        }
    }

    if( resjson ){

        if( confirm_obj_format ) {

            if( obj_format == 'result' ) {

                if( typeof(resjson["type"]) == undefined || typeof(resjson["type"]) == 'undefined' ) {
                    console.log('splugins parseJSON undefined type detected in the json response');
                    resjson["type"] = "error";
                }

                if( typeof(resjson["msg"]) == undefined || typeof(resjson["msg"]) == 'undefined' ) {
                    console.log('splugins parseJSON undefined msg detected in the json response');
                    resjson["msg"] = "";
                }
            }
        }
        
        return resjson;
    }
    else {
        return {"type":"error","msg":"Unable to parse result json object, please contact Sphere Plugins Support for a quick fix on this issue."};
    }
}


//  TODO publish defs from here of the any design pattern that we define to be used as common patter like design pattern of the wbc.filters module 
    //  below the observer design pattern implemented for Feed.events act as one of published defs



//  Feed 
window.document.splugins.Feed = window.document.splugins.Feed || {};



//  Feed.events 
//  the feeling comes in the mind is it may become overloaded if we create such a broad class like Feed where Feed page can contain many features, events and so on. but there is absolute need of one central observer pattern which let subscribe to any subject(feature) and then later notify them when related event occurs. the need is of central observer and notifier but nothing beyond that so it will be very light and almost like a namespace holding diferent fetures. and in essense Feed will be collection of different subject(feature) where each subject is itself a observer pattern. 
    //  it is supposed to hold the collection of features like pagination, filters, feed render, sorting and so on but yeah its only job is to listen to events and notify to their subscribers. 
    //  NOTE: whenever if any requirements comes up of supporting the jquery events based on their trigger/on api functions then that can as usual be supported internally, all that is needed is is register subject with one additional param that is event_core_backend=jQuery. -- and on this regard the syntax can also bring as much closer as possible to that of jQuery syntax but yeah we will need atleast something like sp_e or so just like _ underscore js have _ in there for everything. 
window.document.splugins.events = window.document.splugins.events || {};

window.document.splugins.events.subject = window.document.splugins.events.subject || {};

window.document.splugins.events.subject.core = function( feature_unique_key, notifications ) {
    this.feature_unique_key = feature_unique_key;
    this.notifications = notifications;     // [];    //  list of notifications it can notify for.  
    this.observers = [];

    return {
    feature_unique_key: function() {

        return this.feature_unique_key;
    },    
    subscribeObserver: function(observer) {
        // ACTIVE_TODO here check the callbacks of observer first and if this subject is not supporting the notifications for particular callback then simply throw error and do not subscriber the observer 

        this.observers.push(observer);
    },
    unsubscribeObserver: function(observer) {
        // ACTIVE_TODO implement as required only
        // var index = this.observers.indexOf(observer);
        // if(index > -1) {
        // this.observers.splice(index, 1);
        // }
    },
    notifyObserver: function(observer) {
        // ACTIVE_TODO implement as required only
        // var index = this.observers.indexOf(observer);
        // if(index > -1) {
        // this.observers[index].notify(index);
        // }
    },
    notifyAllObservers: function(notification) {
        for(var i = 0; i < this.observers.length; i++){
            this.observers[i].notify(i, notification);
        };
    }
    };
};

//  publish it 
window.document.splugins.events.subject.api = window.document.splugins.events.subject.core( {}/*if required then the php layer configs can be set here by using the js vars defined from the php layer*/ );

window.document.splugins.events.observer = window.document.splugins.events.observer || {};

window.document.splugins.events.observer.core = function(callbacks) {
    this.callbacks = callbacks;     // [];    //  list of notifications callbacks it waits for.  

    return {
        notify: function(index, notification) {
            // console.log("Observer " + index + " is notified!");

            // TODO check if observer listens to this notification and if not then return with false
            // var index = this.observers.indexOf(observer);
            // if(index > -1) {
            // this.observers.splice(index, 1);
            // }

            this.callbacks[notification]();
        }
    }
}

//  publish it 
window.document.splugins.events.observer.api = window.document.splugins.events.observer.core( {}/*if required then the php layer configs can be set here by using the js vars defined from the php layer*/ );

window.document.splugins.events.core = function() {
    this.subjects = [];

    return {

        createSubject: function( feature_unique_key, notifications ) {
            // console.log("Observer " + index + " is notified!");

            // TODO check if subject already created and exist then throw error
            // var index = this.observers.indexOf(observer);
            // if(index > -1) {
            // this.observers.splice(index, 1);
            // }

            this.subjects.push( new window.document.splugins.events.subject( feature_unique_key, notifications ) );
        }, 
        subscribeObserver: function(feature_unique_key, callbacks) {
            // console.log("Observer " + index + " is notified!");

            // before subscribing the ovserver check if the feature_unique_key subject is created in the first place, if not then throw error 
            var found_index = null;
            for(var i = 0; i < this.subjects.length; i++){
                if( this.subjects[i].feature_unique_key() == feature_unique_key ) {

                    found_index = i;
                    break;
                }
            }

            if( found_index == -1 ) {

                throw "There is no subject exist for specified feature_unique_key "+feature_unique_key;
            } else {

                this.subjects[found_index].subscribeObserver( new window.document.splugins.events.observer( callbacks ) );
            }
        },
        notifyAllObservers: function(feature_unique_key, notification) {
            // console.log("Observer " + index + " is notified!");

            // check if the feature_unique_key subject is created in the first place, if not then throw error 
            var found_index = null;
            for(var i = 0; i < this.subjects.length; i++){
                if( this.subjects[i].feature_unique_key() == feature_unique_key ) {

                    found_index = i;
                    break;
                }
            }

            if( found_index == -1 ) {

                throw "There is no subject exist for specified feature_unique_key "+feature_unique_key;
            } else {

                this.subjects[found_index].notifyAllObservers( notification );
            }
        }

    }
}


//  publish it 
window.document.splugins.events.api = window.document.splugins.events.core( {}/*if required then the php layer configs can be set here by using the js vars defined from the php layer*/ );

// var subject = new Subject();

// var observer1 = new Observer();
// var observer2 = new Observer();
// var observer3 = new Observer();
// var observer4 = new Observer();

// subject.subscribeObserver(observer1);
// subject.subscribeObserver(observer2);
// subject.subscribeObserver(observer3);
// subject.subscribeObserver(observer4);

// subject.notifyObserver(observer2); // Observer 2 is notified!

// subject.notifyAllObservers();
// // Observer 1 is notified!
// // Observer 2 is notified!
// // Observer 3 is notified!
// // Observer 4 is notified!


//  templating 
window.document.splugins.templating = window.document.splugins.templating || {};

window.document.splugins.templating.core = function( configs ) {

    var _this = this; 

	_this.configs = jQuery.extend({}, {}/*default configs*/, configs);	

    var get_template = function( tmpl_id, templating_lib ) {

        if( templating_lib == 'wp' ) {

            return wp.template( tmpl_id );  
        }
    };

    var apply_data = function( template, template_data, templating_lib ) {

        if( templating_lib == 'wp' ) {

            return template( template_data );   
        }
    };

    //  so far the templates are set from the server layers so no need to set it from here so far  
    var set_template = function( tmpl_id, template_content, templating_lib ) {

        //  TODO implement 
    };

    return {

        get_template: function( tmpl_id, templating_lib ) {

            return get_template( tmpl_id, templating_lib );
        }, 
        apply_data: function( template, template_data, templating_lib ) {

            return apply_data( template, template_data, templating_lib ); 
        }, 
        set_template: function( tmpl_id, template_content, templating_lib ) {

            set_template( tmpl_id, template_content, templating_lib ); 
        }

    };
};

//  publish it 
window.document.splugins.templating.api = window.document.splugins.templating.core( {}/*if required then the php layer configs can be set here by using the js vars defined from the php layer*/ );

///////////// -- 15-06-2022 -- @drashti -- ///////////////////////////////

//  compatability 
window.document.splugins.compatability = window.document.splugins.compatability || {};

window.document.splugins.compatability.core = function(configs) {
    this.configs = jQuery.extend({}, {}/*default configs*/, configs);   

    var get_template = function( tmpl_id, templating_lib ) {

      
    };

    var apply_data = function( template, template_data, templating_lib ) {

       
    };

    //  so far the templates are set from the server layers so no need to set it from here so far  
    var set_template = function( tmpl_id, template_content, templating_lib ) {

        //  TODO implement 
    };

    return {

        get_template: function( tmpl_id, templating_lib ) {

           
        }, 
        apply_data: function( template, template_data, templating_lib ) {

          
        }, 
        set_template: function( tmpl_id, template_content, templating_lib ) {

           
        }

    };
};

////////////////////////////////////////////



// the variations js module
window.document.splugins.wbc.variations = window.document.splugins.wbc.variations || {};

//  TODO right now variations swatches and gallery images are managed through their own js modules and so far there is no need of the central variations core js module, but whenver required we need to create one. 
    have d move to asana, the all below open comments and other comments. for reference keep some part here. and then replace this line only with "moved to asana"
    
    things supposed to be managed by the sp_variations 
        -   data 
            --  attributes 
                --  (input) types like dropdown, button, image swatches and so on 
                --  attribute options/terms 
                    --  properties of options/terms like if out of stock 
            --  extract product_variations and assign in our main data var -- to d 
            --  gallery_images  
                --  images 
                --  videos 
                --  custom_html 
                --  NOTE: since the data in case gallery_images module will be comming from the variation events in the variation etc. event args so nothing needed to be assigned in our main data var. 
        -   template 
            --  will vary based on attribute types, extensions and some other feature related conditions also 
                --  but to simplify it we can simply depend on template_type or if required then in specific scenarios on the particular template_key
            --  we will also need to interact (mainly create) the slider and zoom tempaltes 
                --  the main requirement will be making/creating template dynamic using the image array and so on data 
                    --  it will almost only on php side 
                        --  and what we could do is do it using the hooks in our slider and zoom modules php layers 
                        --  so even our internal slider and zoom js/jquery plugins tempaltes will also be made dynamic using this hooks 
                        --  so that these hooks become publish ready when we decide to publish the hooks and js api for slider and zoom -- and as planned in one of the option of our four option offering for the gallery_images slider and zoom, that we look forward to try supporting the external zoom and slider with our planned level of efforts, we can (and should) provide service to make the slider and zoom template dynamic using our data by implementing those hooks when those plugins are enabled.  
                            --  ACTIVE_TODO when we decide to actually publish php hooks and js api for slider and zoom, based on user demand as mentioned below, then at that above planned php hooks will also be published 
                                --  just for the comments, it seems that as long as any external slider and zoom plugin is providing the key js events like that slider_thumb_click and zoom_area_hover and on php side with above flows we are almost covering the 70-80% of basics requirement to host external slider and zoom dynamically 
            --  since we need to manage the slider and js templating dynamically on the slider and zoom layers 
                --  so gallery_images module will have template related functions that the form builder js module have, so create those functions -- to d 
                --  and yeah in gallery_images module we will need one more object namely template_data so create that under data object that is created -- to d 
                    --  if data object is not created then create that in gallery_images module also -- to d 
                --  and t we need to make sure that our slider and zoom assets are lighter so make sure that they are loading only needed things and are difinitely the minified versions only 
                    --  first confirm if they are loading on the right place like from footer hook and so on, and are also loading once only of course -- to t 
                    --  second make sure that only minified versions are loading and if they are not minified then minify them and load that only -- to t 
                    --  third also make sure that desktop assets only are loading for desktop and the mobile assets only are loading for the mobile -- to t 
            --  react tempaltes -- we will going to one alternate widgets set of templates which would be based on react framework 
            --  what about zoom dom loop template, just create one and replace inside or create all and hide/show? the later is clean and would require less maintainance so should do that. 
        -   pages 
            -- category page 
            -- item page 
            --- like we implicitly assumed for the devices and so on layers, that there will be flgas like is_mobile, is_tablet that will be used throughout this variations js modules and the other layers interacting with it, similar way we can have the flgas for this pages layers also. like is_category_page and is_item_page. 
                    -- create above two flags under ..splugins.common namespace, in js.vars.asset.php so no need to pass those as configs here when this module initiated -- to d 
                --  but yeah since the pages is a significant and major layer so at some place we may like dedicated functions and there would be like some flows will require dedicated functions for the item page while some flows will require dedicated functions for the category page 
        -   slider and zoom 
            --  it will mostly be matter of interest to the variations.gallery_images module but since it is vital for overall stability of functions and the overall experience that is why it is considered as a dedicated thing 
            --  its events -- it may directly or indirectly connect itself to the below events layer mentioned 
                --  it should always be indirectly, and a mature abstraction should be ensured always otherwise our task of providing the php and js api for external and zoom and slider would become challanging 
            --  events it listens to simply the events that it mandatorily expects and the events that is optional for it but accepts 
                --  based on these we can easily define what our hooks (php layer) and js api that we are to provide for slider and zoom would look like or how it will be composed 
            --  media 
                --  images 
                --  in addition to images other things that it may need to support are videos and custom html 
        -   events 
                --  mouse events 
                --  keyboard events 
                --  legacy events (events of woo emitted on certain scenarios) 
                --  events emitted by other plugins/themes which we need to take care of in case of compatiblity matters, so it can be termed as the compatiblity events 
        -   effects and managing after effects 
                --  may need to provide some effects but only where and if necessary, the majority of effects will be provided by the slider and zoom js/jQuery plugin 
                --  will need to manage the after effects very precisely, to ensure smooth and non cluttering experience 
                    --  it may or likely include managing the loading, swaping and updating of images 
        -   devices 
                --  is_mobile and is_tablet - this would be primary 
                        -- create above two flags under ..splugins.common namespace, in js.vars.asset.php so no need to pass those as configs here when this module initiated -- to d 
                    --  for layers which need to have complete different implementation for mobile etc. then for them applicable flgas should be set/initiated from the higher layers layers for example the slider and zoom would be completely different plugin for mobile devices -- but anyway now we will see to it again to reconsider using the new slider also for mobile but only if that is beneficial in terms of setup time and maintainance time, for the later it would be beneficial but not sure about the initial setup and implementation time and challanges that may arise. 
                        --  and we would like to reconsider the zoom also in the same way like above 
                --  browser - will matter so much 
                --  screen size - need to handle occasionally only as long as overall UI/UX layers are mature 
                --  os 
        -   plugins/themes 
                --  there will be list of compatiblity matters that need to be handled so it will go under the compatiblity matter, and clearly it will go in compatiblity layers 
                    --  not related to this section but lets create simply a compatiblity module of its own like at the level where templating module is in namespace -- to d --    ACTIVE_TODO/TODO then each modules like filters, variations and so on can have their own module like ...filters.compatiblity just like there ...filters.core core module. but this is only if necessary, otherwise a function inside core module is much readability friendly. 
                        --  a compatiblity function inside filters, variations.swatches and variations.gallery_images module -- to d 
        -   configs 
                --  will control decision of whether to display certain section or not, for example whether to display template part of attribute name (for us ribbon wrapper)
                --  or whether to show tooltip or not 
                --  ACTIVE_TODO image preload will going to be an important and strategic feature for the gallery_images module, so we will need to add support for that very soon with on admin by default is applicable flag will be on, and user can disable that if they want -- to h and -- to d 
                    --  ACTIVE_TODO/TODO and after the above feature is basically implemented very soon in future we may like add the feasible and effective innovations that would add value to this feature -- to h and -- to d 
                --  ACTIVE_TODO like above thumbnail height and thumbnail position is also something that we need to support very soon -- to h and -- to d 
                    --  ACTIVE_TODO and similarly if there is anything else like above things or related matters in the plugins we were exploring then we should cover them too -- to h and -- to d 
        -   php hooks and js api 
                        --  but yeah it will be served only if the related requirement is enabled, for example external slider and zoom option is enabled. so that extra hook and event are served or events are bound only if required and it will prevent unnecessary resource usage. 
            --  would be used by our extensions and would be used for the hooks/js-api support for slider zoom replacement 
                --  for extensions it would our events module of subject/observer pattern 
                    --  can we create and publish of it for external use also by users, at least not till it is not well thought and confirmed that it will not create any conflict or issues of any kind otherwise it will create mess for our users too 
                --  the events that sp_variations provide so that any slider or zoom can at least cover their mandatory events if not the optional 
                    --  there are two or more important ACTIVE_TODO mentioned here in this common js file, that are important to above point 
                --  the events that sp_variations will listen to 
                    --  so that slider zoom can inject their dom and so on 
                        --  there are two or more important ACTIVE_TODO mentioned here in this common js file, that are important to above point 

// the variations swatches js module
window.document.splugins.wbc.variations.swatches = window.document.splugins.wbc.variations.swatches || {};

window.document.splugins.wbc.variations.swatches.core = function( base_container_selector, configs ) {

    var _this = this; 

    _this.configs = jQuery.extend({}, {}/*default configs*/, configs);

    _this.base_container = jQuery( ...common._o( _this.configs, 'base_container_selector') -- to d. base_container_selector ||  '.variations_form' );    

    _this.data = {};    
    _this.data.product_variations = _this.data('product_variations') || []; not confirm yet if actually this container holds this data or something else     


    this.$wrapper = this._element.closest('.product');
    this.$variations_form = this.$wrapper.find('.variations_form');

    here mostly in the private scope, the variations module should subscribe to search filter events and pass those to variations core which would call the change event so that filters those affecting the variations data like images etc. are rendered accordingly. so that metal color based or shape based images render appropriately. 
        --  however, it is not limited to js layer only and actually js layer here would not be of use except the search is client side only based on the js. but the searches are always carried on the backend so the php layer need to ensure that return appropriate variations images etc. whenever the selected options of the search filters connects with variations instead of the main product. 
            --  m have did it already but need to implement throughly as per standard if not proper yet 

    if below difference and includes functions are provided by underscore js backed by wp/woo maybe then we can port through our common namespace, mainly because maybe on other platforms or so the underscore might not be available then it can be replaced somehow from there. so maybe still it will going to be _(underscore) function only and we will need to call it with long name pattern or we can port even the common namespace as sp_common so the call will be like sp_common._ -- to h 
    var in_stocks = _.difference(selects, disabled_selects);
    if (_.includes(in_stocks, attribute_value)) {

    var initPrivate = function() {


    };

    var legacyBinding? = function() {

        jQuery('#select_attribute_of_variation').on('woocommerce_variation_has_changed', function(){
            // do your magic here...
         }); 


        for optionsUI swatches
            --  the fundamental is ensuring all required ajax bindings 
            --  and of course the fundamental calls to the legacy woo js layer apis like woo variation form or something such and so on 
            --  and accurate management of fundamentals like generated, change and check(which m was triggering) etc. events and also out of stock and other such business logic implementation 
            --  and yeah even supporting the keyboard and mouse events which is vital for the user experience 

        moved here from the wbc options(optionsUI) controller 
        $('.variable-item').on('click',function(){
            var target_selector = $('#'+$(this).data('id'));
            target_selector.val($(this).data('value'));
            $(this).parent().find('.selected').removeClass('selected');
            $(this).addClass('selected');
            jQuery(".variations_form" ).trigger('check_variations');
            $(target_selector).trigger('change');
        });

        jQuery(".variations_form").on('click', '.reset_variations'/*'woocommerce_variation_select_change'*//*'reset'*/,function(){
            jQuery('.variable-items-wrapper .selected').removeClass('selected');
            jQuery('.variable-items-wrapper .dropdown').dropdown('restore defaults');
        });

    }


    var preprocess = function() {

        //
        //  data applicable loops 
        //
        // pre process data and process collections that would be necessary for neat and quick ops 
        preprocess_data( _this.data.product_variations );   

        do necessary bindings for the attribute types to be supported 
            --  will need a dedicated function namely process_attribute_types, under the preprocess_data function below -- to d 
                --  move entire section below inside that function -- to d 
        //  process by type  
        // _this.data.attribute_types.each( function( type ) {

        //     --  so above preprocess_data call should simply prepare two attribute types list, first is attribute_types and second is ... or simply one only. and simply delegate everything else that is not coming under attribute_types, to the extensions layers. and should simply publish this list of attribute_types from backend. 
        //     NOTE: and one of the key benefit of this approach is that these layers will emit the broadcast notification event only if they detect the type to be the premiumly supported type and otherwise not. which would minimize process and little or not hanging processes and less debug console logs that would appear around. 

        //     is the woo input template type means dropdown is mandatorily kept by plugins, not seems likely but still confirm and then we need a way to determine(always) the exact input type based on the field/input type selected on woo panel or otherwise simply support the input_template_type field which will be set in background implicitly based on the field/input type selected on woo panel -- this field is simply better then managing many different template names of extensions and defining based on that -- and it will default to the above field/input type for wbc nothing to manage, only if condition below that if input_template_type is not defined then read simply above field/input type. and in case of extensions that need to be defined based on the template that is selected on their admin panel. so this template option should be only be defining it and passing it where applicable so that is gets here. and it is need to be defined based on that only to avoid confusion and many unnecessary and confusing configuration overheads. no simply need to stick to attribute type only means field/input-type selected on woo panel and that is standard and clean. so implement here based on that only. -- to h or -- to d 


        //     if( type == '?' )
        //      do necessary logic if support is available
        //         --  that means based on type call/process necessary functions/layers for example events functions(some events functions already defined below), template functions/layers, pages functions/layers, like events the effects functions/layers, plugins/themes applicable compatiblity function calls, slider and zoom functions/layers(note that even for swatches modules there might be some conditions or conditional logics that would be required) -- to d 
        //         --  and also do call/process necessary functions/layers for the provided device type(and maybe some of their specifications would also need to be handled in future like width(which would otherwise mostly be dynamically handled), resolution and so on ACTIVE_TODO) and configs, but it will be a specific block here only and the dedicated function for them sound unnecessary -- to d
        //             --  and we need some logic of if function or layer need to be called once only then take care of that, for all above functions, including the devices and configs that are to be handled from here -- to d 
        //             --  and as usual there will going to be if conditions for applicable matters in applicable functions and their layers defined above, to handle the devices and configuration specific matters. and so the dedicated blocks of devices and configs will handle some specific matters which do not necessarily mixed with other things mentioned above like events, template, pages and so on layers. -- to h             
        //     , if not for example slider input is not supported then host the listener event so that extension js do its job or simply skip it and let extension js do their part 
        //         --  and we can and should simply use observer pattern events to host for example the slider listener here and then emit internal change event from here     
        //             --  still in this case the variation.swatches will register its event subject and emit bootstrap level notification like bootstrap/on.load maybe on.load is more user friendly 
        //             --  then at that time applicable extension will bootstrap the js layer 
        //             --  and when the change event occurs the applicable extension will simply call the ...swatches.api function to notify back about their change event or the events module can add support to provide callbacks to subscriber so that they can reply with something when they have done something based on notification. so it can be called the notification_response. -- but it will be about breaking our own rule of keeping the events simple. so even if we must do then in that case it must be till notification_response only and no further callback back and forth can be supported. otherwise it mostly lead to long debug sequences. --  however it has benefit of less maintainance since otherwise extensions need to know about the ...swatches.api but in case of events support of notification_response it only need to learn about and depend on the variations.swatches subject of events module. and as long as we can keep it limited to notification_response only and do not extend it further it will be clean to be frank. 


        //             --  and we are planning to host darker/lighter slider support also from here as usual so it will be just like above slider example 
        //                 --  but yeah after the change event is recieved here that will be emitted to the gallery_images module to let them do their job. since darker lighter is not part of the variation there is no further thing to do from here after the change event is recieved. 
        //                     --  and since it is different kind processing that is required after change event so the input_template_type must be defined uniquely like slider_no_variation 
        //                         NOTE: and yeah on that note everything of the sp_variations module must be dynamic and nothing should be hardcoded so slider_no_variation input template type must be passed right from where the template is defined on admin to till here 
        //     if( type == 'radio' ) 

        //         -   configs 
        //                 --  will control decision of whether to display certain section or not, for example whether to display template part of attribute name (for us ribbon wrapper)
        //                 --  or whether to show tooltip or not 

        //     --  it wil be a specific block here for devices and configs -- to d 
        //     --  while for the rest create dedicated functions like process_template, process_events and so on. for the layers listed below. 
        //         --  create below list of functions after the process_attribute_types function, and apply above peudo flows there and rest of the flows those functions should adapt from the flow notes from the heirachical flow plan at top -- to d and -- to h 
        //             -- process_template -- to d
        //             -- process_pages -- to d
        //             -- process_slider_and_zoom -- to d
        //             -- process_events -- to d
        //             -- process_and_manage_effects -- to d
        //             -- process_compatability_matters -- to d
            
        // }); 


            // Init on Ajax Popup :)
            $(document).on('wc_variation_form.wvs', '.variations_form:not(.wvs-loaded)', function (event) {
              $(this).WooVariationSwatches();
            });

            // Try to cover all ajax data complete
            $(document).ajaxComplete(function (event, request, settings) {
              _.delay(function () {
                $('.variations_form:not(.wvs-loaded)').each(function () {
                  $(this).wc_variation_form();
                });
              }, 100);
            });

            // Composite product load
            // JS API: https://docs.woocommerce.com/document/composite-products/composite-products-js-api-reference/
            $(document.body).on('wc-composite-initializing', '.composite_data', function (event, composite) {
              composite.actions.add_action('component_options_state_changed', function (self) {
                $(self.$component_content).find('.variations_form').removeClass('wvs-loaded wvs-pro-loaded');
              });

              /* composite.actions.add_action('active_scenarios_updated', (self) => {
                 console.log('active_scenarios_updated')
                 $(self.$component_content).find('.variations_form').removeClass('wvs-loaded wvs-pro-loaded')
               })*/
            });

            // Support for Yith Infinite Scroll
            so a call from here to the compatability function of this module, and that will cover all compatability matters of load time inlcuding the promize resolve block of the plugin we were exploring. so call compatability with section=bootstrap -- to d 

            // WooCommerce Filter Nav
            $('body').on('aln_reloaded.wvs', function () {
              _.delay(function () {
                $('.variations_form:not(.wvs-loaded)').each(function () {
                  $(this).wc_variation_form();
                });
              }, 100);
            });

              this.product_variations = this.$element.data('product_variations') || [];
              this.is_ajax_variation = this.product_variations.length < 1;
              this.product_id = this.$element.data('product_id');
              this.reset_variations = this.$element.find('.reset_variations');

              this.$element.addClass('wvs-loaded');

              // Call
              this.init();
              this.update();

              // Trigger
              $(document).trigger('woo_variation_swatches', [this.$element]);

            var _this2 = this;

            var _this = this;


            // Append Selected Item Template
            if (woo_variation_swatches_options.show_variation_label) {
              this.$element.find('.variations .label').each(function (index, el) {
                $(el).append(_this2.selected_item_template);
              });
            }

            this.$element.find('ul.variable-items-wrapper').each(function (i, el) {

              $(this).parent().addClass('woo-variation-items-wrapper');

              var select = $(this).siblings('select.woo-variation-raw-select');
              var selected = '';
              var options = select.find('option');
              var disabled = select.find('option:disabled');
              var out_of_stock = select.find('option.enabled.out-of-stock');
              var current = select.find('option:selected');
              var eq = select.find('option').eq(1);

              var li = $(this).find('li:not(.woo-variation-swatches-variable-item-more)');
              var reselect_clear = $(this).hasClass('reselect-clear');

              var mouse_event_name = 'click.wvs'; // 'touchstart click';

              var attribute = $(this).data('attribute_name');
              // let attribute_values = ((_this.is_ajax_variation) ? [] : _this._generated[attribute])
              // let out_of_stocks = ((_this.is_ajax_variation) ? [] : _this._out_of_stock[attribute])
              var selects = [];
              var disabled_selects = [];
              var out_of_stock_selects = [];
              var $selected_variation_item = $(this).parent().prev().find('.woo-selected-variation-item-name');

              // For Avada FIX
              if (options.length < 1) {
                select = $(this).parent().find('select.woo-variation-raw-select');
                options = select.find('option');
                disabled = select.find('option:disabled');
                out_of_stock = select.find('option.enabled.out-of-stock');
                current = select.find('option:selected');
                eq = select.find('option').eq(1);
              }

              options.each(function () {
                if ($(this).val() !== '') {
                  selects.push($(this).val());
                  selected = current.length === 0 ? eq.val() : current.val();
                }
              });

              disabled.each(function () {
                if ($(this).val() !== '') {
                  disabled_selects.push($(this).val());
                }
              });

              // Out Of Stocks
              out_of_stock.each(function () {
                if ($(this).val() !== '') {
                  out_of_stock_selects.push($(this).val());
                }
              });

              var in_stocks = _.difference(selects, disabled_selects);

              // console.log('out of stock', out_of_stock_selects)
              // console.log('in stock', in_stocks)

              var available = _.difference(in_stocks, out_of_stock_selects);

              // Mark Selected
              li.each(function (index, li) {

                var attribute_value = $(this).attr('data-value');
                var attribute_title = $(this).attr('data-title');

                // Resetting LI
                $(this).removeClass('selected disabled out-of-stock').addClass('disabled');
                $(this).attr('aria-checked', 'false');
                $(this).attr('tabindex', '-1');

                if ($(this).hasClass('radio-variable-item')) {
                  $(this).find('input.wvs-radio-variable-item:radio').prop('disabled', true).prop('checked', false);
                }

                // Default Selected
                // We can't use es6 includes for IE11
                // in_stocks.includes(attribute_value)
                // _.contains(in_stocks, attribute_value)
                // _.includes(in_stocks, attribute_value)

                if (_.includes(in_stocks, attribute_value)) {

                  $(this).removeClass('selected disabled');
                  $(this).removeAttr('aria-hidden');
                  $(this).attr('tabindex', '0');

                  $(this).find('input.wvs-radio-variable-item:radio').prop('disabled', false);

                  if (attribute_value === selected) {

                    $(this).addClass('selected');
                    $(this).attr('aria-checked', 'true');

                    if (woo_variation_swatches_options.show_variation_label) {
                      $selected_variation_item.text(woo_variation_swatches_options.variation_label_separator + ' ' + attribute_title);
                    }

                    if ($(this).hasClass('radio-variable-item')) {
                      $(this).find('input.wvs-radio-variable-item:radio').prop('checked', true);
                    }
                  }
                }

                // Out of Stock

                if (available.length > 0 && _.includes(out_of_stock_selects, attribute_value) && woo_variation_swatches_options.clickable_out_of_stock) {
                  $(this).removeClass('disabled').addClass('out-of-stock');
                }
              });

              // Trigger Select event based on list

              if (reselect_clear) {
                // Non Selected Item Should Select
                $(this).on(mouse_event_name, 'li:not(.selected):not(.radio-variable-item):not(.woo-variation-swatches-variable-item-more)', function (e) {
                  e.preventDefault();
                  e.stopPropagation();
                  var value = $(this).data('value');
                  select.val(value).trigger('change');
                  select.trigger('click');

                  select.trigger('focusin');

                  if (_this.is_mobile) {
                    select.trigger('touchstart');
                  }

                  $(this).trigger('focus'); // Mobile tooltip
                  $(this).trigger('wvs-selected-item', [value, select, _this.$element]); // Custom Event for li
                });

                // Selected Item Should Non Select
                $(this).on(mouse_event_name, 'li.selected:not(.radio-variable-item):not(.woo-variation-swatches-variable-item-more)', function (e) {
                  e.preventDefault();
                  e.stopPropagation();

                  var value = $(this).val();

                  select.val('').trigger('change');
                  select.trigger('click');

                  select.trigger('focusin');

                  if (_this.is_mobile) {
                    select.trigger('touchstart');
                  }

                  $(this).trigger('focus'); // Mobile tooltip

                  $(this).trigger('wvs-unselected-item', [value, select, _this.$element]); // Custom Event for li
                });

                // RADIO

                // On Click trigger change event on Radio button
                $(this).on(mouse_event_name, 'input.wvs-radio-variable-item:radio', function (e) {

                  e.stopPropagation();

                  $(this).trigger('change.wvs', { radioChange: true });
                });

                $(this).on('change.wvs', 'input.wvs-radio-variable-item:radio', function (e, params) {

                  e.preventDefault();
                  e.stopPropagation();

                  if (params && params.radioChange) {

                    var value = $(this).val();
                    var is_selected = $(this).parent('li.radio-variable-item').hasClass('selected');

                    if (is_selected) {
                      select.val('').trigger('change');
                      $(this).parent('li.radio-variable-item').trigger('wvs-unselected-item', [value, select, _this.$element]); // Custom Event for li
                    } else {
                      select.val(value).trigger('change');
                      $(this).parent('li.radio-variable-item').trigger('wvs-selected-item', [value, select, _this.$element]); // Custom Event for li
                    }

                    select.trigger('click');
                    select.trigger('focusin');
                    if (_this.is_mobile) {
                      select.trigger('touchstart');
                    }
                  }
                });
              } else {

                $(this).on(mouse_event_name, 'li:not(.radio-variable-item):not(.woo-variation-swatches-variable-item-more)', function (event) {

                  event.preventDefault();
                  event.stopPropagation();

                  var value = $(this).data('value');
                  select.val(value).trigger('change');
                  select.trigger('click');
                  select.trigger('focusin');
                  if (_this.is_mobile) {
                    select.trigger('touchstart');
                  }

                  $(this).trigger('focus'); // Mobile tooltip

                  $(this).trigger('wvs-selected-item', [value, select, _this._element]); // Custom Event for li
                });

                // Radio
                $(this).on('change.wvs', 'input.wvs-radio-variable-item:radio', function (event) {
                  event.preventDefault();
                  event.stopPropagation();

                  var value = $(this).val();

                  select.val(value).trigger('change');
                  select.trigger('click');
                  select.trigger('focusin');

                  if (_this.is_mobile) {
                    select.trigger('touchstart');
                  }

                  // Radio
                  $(this).parent('li.radio-variable-item').removeClass('selected disabled').addClass('selected');
                  $(this).parent('li.radio-variable-item').trigger('wvs-selected-item', [value, select, _this.$element]); // Custom Event for li
                });
              }

              // Keyboard Access
              $(this).on('keydown.wvs', 'li:not(.disabled):not(.woo-variation-swatches-variable-item-more)', function (event) {
                if (event.keyCode && 32 === event.keyCode || event.key && ' ' === event.key || event.keyCode && 13 === event.keyCode || event.key && 'enter' === event.key.toLowerCase()) {
                  event.preventDefault();
                  $(this).trigger(mouse_event_name);
                }
              });
            });

            this.$element.trigger('woo_variation_swatches_init', [this, this.product_variations]);

            $(document).trigger('woo_variation_swatches_loaded', [this.$element, this.product_variations]);
          }

    };

    var preprocess_data = function() {

        ACTIVE_TODO not sure if this is necessary 
        this._generated = this.product_variations.reduce(function (obj, variation) {

          Object.keys(variation.attributes).map(function (attribute_name) {
            if (!obj[attribute_name]) {
              obj[attribute_name] = [];
            }

            if (variation.attributes[attribute_name]) {
              obj[attribute_name].push(variation.attributes[attribute_name]);
            }
          });

          return obj;
        }, {});

        ACTIVE_TODO but we will make use of it from beginning 
        this._out_of_stock = this.product_variations.reduce(function (obj, variation) {

          Object.keys(variation.attributes).map(function (attribute_name) {
            if (!obj[attribute_name]) {
              obj[attribute_name] = [];
            }

            if (variation.attributes[attribute_name] && !variation.is_in_stock) {
              obj[attribute_name].push(variation.attributes[attribute_name]);
            }
          });

          return obj;
        }, {});
    };

    var process_attribute_types = function() {

        _this.data.attribute_types.each( function( type ) {

            --  so above preprocess_data call should simply prepare two attribute types list, first is attribute_types and second is ... or simply one only. and simply delegate everything else that is not coming under attribute_types, to the extensions layers. and should simply publish this list of attribute_types from backend. 
            NOTE: and one of the key benefit of this approach is that these layers will emit the broadcast notification event only if they detect the type to be the premiumly supported type and otherwise not. which would minimize process and little or not hanging processes and less debug console logs that would appear around. 

            is the woo input template type means dropdown is mandatorily kept by plugins, not seems likely but still confirm and then we need a way to determine(always) the exact input type based on the field/input type selected on woo panel or otherwise simply support the input_template_type field which will be set in background implicitly based on the field/input type selected on woo panel -- this field is simply better then managing many different template names of extensions and defining based on that -- and it will default to the above field/input type for wbc nothing to manage, only if condition below that if input_template_type is not defined then read simply above field/input type. and in case of extensions that need to be defined based on the template that is selected on their admin panel. so this template option should be only be defining it and passing it where applicable so that is gets here. and it is need to be defined based on that only to avoid confusion and many unnecessary and confusing configuration overheads. no simply need to stick to attribute type only means field/input-type selected on woo panel and that is standard and clean. so implement here based on that only. -- to h or -- to d 

            if( type == '?' )
             do necessary logic if support is available
                --  that means based on type call/process necessary functions/layers for example events functions(some events functions already defined below), template functions/layers, pages functions/layers, like events the effects functions/layers, plugins/themes applicable compatiblity function calls, slider and zoom functions/layers(note that even for swatches modules there might be some conditions or conditional logics that would be required) -- to d 
                --  and also do call/process necessary functions/layers for the provided device type(and maybe some of their specifications would also need to be handled in future like width(which would otherwise mostly be dynamically handled), resolution and so on ACTIVE_TODO) and configs, but it will be a specific block here only and the dedicated function for them sound unnecessary -- to d
                    --  and we need some logic of if function or layer need to be called once only then take care of that, for all above functions, including the devices and configs that are to be handled from here -- to d 
                    --  and as usual there will going to be if conditions for applicable matters in applicable functions and their layers defined above, to handle the devices and configuration specific matters. and so the dedicated blocks of devices and configs will handle some specific matters which do not necessarily mixed with other things mentioned above like events, template, pages and so on layers. -- to h    
                    

                process_pages(type);
                process_slider_and_zoom(type); 
                process_events(type); 
                process_and_manage_effects(type);
                process_compatability_matters(type);

                -   devices 
                        --  for layers which need to have complete different implementation for mobile etc. then for them applicable flgas should be set/initiated from the higher layers layers for example the slider and zoom would be completely different plugin for mobile devices -- but anyway now we will see to it again to reconsider using the new slider also for mobile but only if that is beneficial in terms of setup time and maintainance time, for the later it would be beneficial but not sure about the initial setup and implementation time and challanges that may arise. 
                            --  and we would like to reconsider the zoom also in the same way like above 
                    --  browser - will matter so much 
                    --  screen size - need to handle occasionally only as long as overall UI/UX layers are mature 
                    --  os 

                    if(is_mobile){

                        window.document.splugins.common.is_mobile = window.document.splugins.common.is_mobile || {};

                    }else if(is_tablet){

                        window.document.splugins.common.is_tablet = window.document.splugins.common.is_tablet || {};

                    }else if(browser){

                    }else if(screen size){

                    }else if(os){

                    };

                -   configs 
                    --  will control decision of whether to display certain section or not, for example whether to display template part of attribute name (for us ribbon wrapper)
                    --  or whether to show tooltip or not 
                    
                    if( type == 'radio' ) 
          

            }                   
            , if not for example slider input is not supported then host the listener event so that extension js do its job or simply skip it and let extension js do their part 
                --  and we can and should simply use observer pattern events to host for example the slider listener here and then emit internal change event from here     
                    --  still in this case the variation.swatches will register its event subject and emit bootstrap level notification like bootstrap/on.load maybe on.load is more user friendly 
                    --  then at that time applicable extension will bootstrap the js layer 
                    --  and when the change event occurs the applicable extension will simply call the ...swatches.api function to notify back about their change event or the events module can add support to provide callbacks to subscriber so that they can reply with something when they have done something based on notification. so it can be called the notification_response. -- but it will be about breaking our own rule of keeping the events simple. so even if we must do then in that case it must be till notification_response only and no further callback back and forth can be supported. otherwise it mostly lead to long debug sequences. --  however it has benefit of less maintainance since otherwise extensions need to know about the ...swatches.api but in case of events support of notification_response it only need to learn about and depend on the variations.swatches subject of events module. and as long as we can keep it limited to notification_response only and do not extend it further it will be clean to be frank. 


                    --  and we are planning to host darker/lighter slider support also from here as usual so it will be just like above slider example 
                        --  but yeah after the change event is recieved here that will be emitted to the gallery_images module to let them do their job. since darker lighter is not part of the variation there is no further thing to do from here after the change event is recieved. 
                            --  and since it is different kind processing that is required after change event so the input_template_type must be defined uniquely like slider_no_variation 
                                NOTE: and yeah on that note everything of the sp_variations module must be dynamic and nothing should be hardcoded so slider_no_variation input template type must be passed right from where the template is defined on admin to till here 
            if( type == 'radio' ) 

                -   configs 
                        --  will control decision of whether to display certain section or not, for example whether to display template part of attribute name (for us ribbon wrapper)
                        --  or whether to show tooltip or not 

            --  it wil be a specific block here for devices and configs -- to d 
            --  while for the rest create dedicated functions like process_template, process_events and so on. for the layers listed below. 
                --  create below list of functions after the process_attribute_types function, and apply above peudo flows there and rest of the flows those functions should adapt from the flow notes from the heirachical flow plan at top -- to d and -- to h 
                    // -- process_template -- to d done
                    // -- process_pages -- to d done
                    // -- process_slider_and_zoom -- to d done
                    // -- process_events -- to d done
                    // -- process_and_manage_effects -- to d done
                    // -- process_compatability_matters -- to d done
            
        }); 

    }


    var process_template = function() {

        --  or whether to show tooltip or not 
                    
        if( type == 'radio' ) 

    }

    var process_pages = function() {

        if(is_category_page){

            window.document.splugins.common.is_category_page = window.document.splugins.common.is_category_page || {};

        }else if(is_item_page){

            window.document.splugins.common.is_item_page = window.document.splugins.common.is_item_page || {};

        };

    }

    var process_slider_and_zoom = function(type){
        
    }

    var process_events = function(type){
        on_click();

    }

    var process_and_manage_effects = function(type){
        
    }

    var process_compatability_matters = function(type){
        
        if(type == 'buttons'){

            compatability("button_section");

        }else if(type == 'image'){

            compatability("image_section");

        } 

    }

    // -   events 
    // --  mouse events 
    var on_click = function() {


    };

    --  keyboard events 
    var on_keyup or down ? = function() {


    };
            --  legacy events (events of woo emitted on certain scenarios) 
            --  events emitted by other plugins/themes which we need to take care of in case of compatiblity matters, so it can be termed as the compatiblity events 

    // -- base events - after the above events are handled by their particular function/layer, they would call below functions to do the ultimate work         
    var change = function() {

        var _this = this;
        this.$element.off('woocommerce_variation_has_changed.wvs');
        this.$element.on('woocommerce_variation_has_changed.wvs', function (event) {

          // Don't use any propagation. It will disable composit product functionality
          // event.stopPropagation();

          $(this).find('ul.variable-items-wrapper').each(function (index, el) {

            var select = $(this).siblings('select.woo-variation-raw-select');
            var selected = '';
            var options = select.find('option');
            var disabled = select.find('option:disabled');
            var out_of_stock = select.find('option.enabled.out-of-stock');
            var current = select.find('option:selected');
            var eq = select.find('option').eq(1);
            var li = $(this).find('li:not(.woo-variation-swatches-variable-item-more)');

            //let reselect_clear   = $(this).hasClass('reselect-clear');
            //let is_mobile        = $('body').hasClass('woo-variation-swatches-on-mobile');
            //let mouse_event_name = 'click.wvs'; // 'touchstart click';

            var attribute = $(this).data('attribute_name');
            // let attribute_values = ((_this.is_ajax_variation) ? [] : _this._generated[attribute])
            // let out_of_stocks = ((_this.is_ajax_variation) ? [] : _this._out_of_stock[attribute])

            var selects = [];
            var disabled_selects = [];
            var out_of_stock_selects = [];
            var $selected_variation_item = $(this).parent().prev().find('.woo-selected-variation-item-name');

            // For Avada FIX
            if (options.length < 1) {
              select = $(this).parent().find('select.woo-variation-raw-select');
              options = select.find('option');
              disabled = select.find('option:disabled');
              out_of_stock = select.find('option.enabled.out-of-stock');
              current = select.find('option:selected');
              eq = select.find('option').eq(1);
            }

            options.each(function () {
              if ($(this).val() !== '') {
                selects.push($(this).val());
                // selected = current ? current.val() : eq.val()
                selected = current.length === 0 ? eq.val() : current.val();
              }
            });

            disabled.each(function () {
              if ($(this).val() !== '') {
                disabled_selects.push($(this).val());
              }
            });

            // Out Of Stocks
            out_of_stock.each(function () {
              if ($(this).val() !== '') {
                out_of_stock_selects.push($(this).val());
              }
            });

            var in_stocks = _.difference(selects, disabled_selects);

            var available = _.difference(in_stocks, out_of_stock_selects);

            if (_this.is_ajax_variation) {

              li.each(function (index, el) {

                var attribute_value = $(this).attr('data-value');
                var attribute_title = $(this).attr('data-title');

                $(this).removeClass('selected disabled');
                $(this).attr('aria-checked', 'false');

                // To Prevent blink
                if (selected.length < 1 && woo_variation_swatches_options.show_variation_label) {
                  $selected_variation_item.text('');
                }

                if (attribute_value === selected) {
                  $(this).addClass('selected');
                  $(this).attr('aria-checked', 'true');

                  if (woo_variation_swatches_options.show_variation_label) {
                    $selected_variation_item.text(woo_variation_swatches_options.variation_label_separator + ' ' + attribute_title);
                  }

                  if ($(this).hasClass('radio-variable-item')) {
                    $(this).find('input.wvs-radio-variable-item:radio').prop('disabled', false).prop('checked', true);
                  }
                }

                $(this).trigger('wvs-item-updated', [selected, attribute_value, _this]);
              });
            } else {

              li.each(function (index, el) {

                var attribute_value = $(this).attr('data-value');
                var attribute_title = $(this).attr('data-title');

                $(this).removeClass('selected disabled out-of-stock').addClass('disabled');
                $(this).attr('aria-checked', 'false');
                $(this).attr('tabindex', '-1');

                if ($(this).hasClass('radio-variable-item')) {
                  $(this).find('input.wvs-radio-variable-item:radio').prop('disabled', true).prop('checked', false);
                }

                // if (_.contains(selects, value))
                // if (_.indexOf(selects, value) !== -1)
                // if (selects.includes(value))

                // We can't use es6 includes for IE11
                // in_stocks.includes(attribute_value)
                // _.contains(in_stocks, attribute_value)
                // _.includes(in_stocks, attribute_value)

                // Make Selected // selects.includes(attribute_value) // in_stocks
                if (_.includes(in_stocks, attribute_value)) {

                  $(this).removeClass('selected disabled');
                  $(this).removeAttr('aria-hidden');
                  $(this).attr('tabindex', '0');

                  $(this).find('input.wvs-radio-variable-item:radio').prop('disabled', false);

                  // To Prevent blink
                  if (selected.length < 1 && woo_variation_swatches_options.show_variation_label) {
                    $selected_variation_item.text('');
                  }

                  if (attribute_value === selected) {

                    $(this).addClass('selected');
                    $(this).attr('aria-checked', 'true');

                    if (woo_variation_swatches_options.show_variation_label) {
                      $selected_variation_item.text(woo_variation_swatches_options.variation_label_separator + ' ' + attribute_title);
                    }

                    if ($(this).hasClass('radio-variable-item')) {
                      $(this).find('input.wvs-radio-variable-item:radio').prop('checked', true);
                    }
                  }
                }

                // Out of Stock
                if (available.length > 0 && _.includes(out_of_stock_selects, attribute_value) && woo_variation_swatches_options.clickable_out_of_stock) {
                  $(this).removeClass('disabled').addClass('out-of-stock');
                }

                $(this).trigger('wvs-item-updated', [selected, attribute_value, _this]);
              });
            }

            // Items Updated
            $(this).trigger('wvs-items-updated');
          });
        });

    };

    var reset_all = function() {


    };


    var compatability = function() {

        this compatiblity function flow will be as per the commets in the filter js file 
        -   plugins/themes 
        --  there will be list of compatiblity matters that need to be handled so it will go under the compatiblity matter, and clearly it will go in compatiblity layers 
            --  not related to this section but lets create simply a compatiblity module of its own like at the level where templating module is in namespace -- to d --    ACTIVE_TODO/TODO then each modules like filters, variations and so on can have their own module like ...filters.compatiblity just like there ...filters.core core module. but this is only if necessary, otherwise a function inside core module is much readability friendly. 
                --  a compatiblity function inside filters, variations.swatches and variations.gallery_images module -- to d  

        and add all those theme and other patch that the other plugin we were exploring have. -- to d 
                --  but of course in our case it will be as per our flow of how we manage loading and then ajax loading of swatches options -- to h and -- to d 
            --  that other plugin have some more theme specific patch fix, and some other patch for managing unexpected effects like blink and so on -- to d    

    }; 

    return {

        init: function() {

            window.document.splugins.variation.events.api.notifyAllObservers( 'variation', 'before_search' ); 
        },
        before_search: function() {

            window.document.splugins.variation.events.api.notifyAllObservers( 'variation', 'before_search' ); 
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

            window.document.splugins.variation.events.api.notifyAllObservers( 'variation', 'no_products_found' );
        }, 

    }; 
};

//  publish it 
window.document.splugins.wbc.variations.swatches.api = window.document.splugins.wbc.variations.swatches.core( {}/*if required then the php layer configs can be set here by using the js vars defined from the php layer*/ );

// the variations gallery images js module
window.document.splugins.wbc.variations.gallery_images = window.document.splugins.wbc.variations.gallery_images || {};

window.document.splugins.wbc.variations.gallery_images.core = function( configs ) {

    var _this = this; 

	_this.configs = jQuery.extend({}, {}/*default configs*/, configs);	
    
    // this.subjects = [];

    this.$wrapper = this._element.closest('.product');
    this.$variations_form = this.$wrapper.find('.variations_form');

    ///////////// -- 15-06-2022 -- @drashti -- ///////////////////////////////
    var compatability = function(section, object, expected_result) {

        ////////////////////////////////////////////////////
        if(section == 'variations_gallery'){
            jQuery(function ($)
            {
                Promise.resolve().then(function () {
                  return _interopRequireWildcard(__webpack_require__("./src/js/WooVariationGallery.js"));
                }).then(function () {
                // For Single Product
                $('.woo-variation-gallery-wrapper:not(.wvg-loaded)').WooVariationGallery(); // Ajax and Variation Product

                    $(document).on('wc_variation_form', '.variations_form', function () {
                      $('.woo-variation-gallery-wrapper:not(.wvg-loaded)').WooVariationGallery();
                    }); // Support for Jetpack's Infinite Scroll,

                    $(document.body).on('post-load', function () {
                      $('.woo-variation-gallery-wrapper:not(.woo-variation-gallery-product-type-variable):not(.wvg-loaded)').WooVariationGallery();
                    }); // YITH Quickview

                    $(document).on('qv_loader_stop', function () {
                      $('.woo-variation-gallery-wrapper:not(.woo-variation-gallery-product-type-variable):not(.wvg-loaded)').WooVariationGallery();
                    }); // Elementor

                    if (window.elementorFrontend && window.elementorFrontend.hooks) {
                      elementorFrontend.hooks.addAction('frontend/element_ready/woocommerce-product-images.default', function ($scope) {
                        $('.woo-variation-gallery-wrapper:not(.wvg-loaded)').WooVariationGallery();
                      });
                    }
                });
            });

        }    

        /////////////////////////////////////////////////////        

    }
    ///////////////////////////////////////////////////////

    var initPrivate = function() {


    }

    var legacyBinding? = function() {

        jQuery('#select_attribute_of_variation').on('woocommerce_variation_has_changed', function(){
            // do your magic here...
         }); 

    }

    var preprocess = function() {

        //
        //  data applicable loops 
        //
        // pre process data and process collections that would be necessary for neat and quick ops 
        preprocess_data( _this.data );   

        do necessary bindings for the gallery images  
            --done  will need a dedicated function namely process_images -- to d 
                --  and since the actual images would be available only after the variation change event(and specifically the event binding and other stat should be set and maintained for currently active images of current variation only so it must be on variation change event, and in case of simple product types that will not be the cases) so the process_images function should be called on each such stat changes -- to d 
                    --done  move entire section below inside that function -- to d 
        
        //  data applicable loops 
        _this.data.product_variations.each( function() {

            //  pre process data and process collections that would be necessary for neat and quick ops 

            // collect input types to be supported 
            _this.data.template_types = {};   is the woo input template type means dropdown is mandatorily kept by plugins, not seems likely but still confirm and then we need a way to determine(always) the exact input type based on the field/input type selected on woo panel or otherwise simply support the input_template_type field which will be set in background implicitly based on the field/input type selected on woo panel -- this field is simply better then managing many different template names of extensions and defining based on that -- and it will default to the above field/input type for wbc nothing to manage, only if condition below that if input_template_type is not defined then read simply above field/input type. and in case of extensions that need to be defined based on the template that is selected on their admin panel. so this template option should be only be defining it and passing it where applicable so that is gets here. and it is need to be defined based on that only to avoid confusion and many unnecessary and confusing configuration overheads -- to h or -- to d 

        }); 

        //  template 
        _this.data.template_types.each( function( type ) {

            //  do necessary logic if support is available, if not for example custom_html then manage accordingly  
            if( type == 'default'/*means the default template provided by slider and zoom*/ || type == 'custom_html' ) 
                in case of custom_html as long as the slider and zoom events are not emitted and they would not be since we would be doing our custom html, but if they are then need to cancel them using their apis (only) as mentioned in the events functions below 
                    -- but one matter that we need to handle in detail is managing the slider thumb indexes which is providing anything custom like custom_html dom (like 360,  darker lighter, diamond meta and recently purchased) for their main image ares (which is also zoom area) 
                        --  and mostly none of the slider or zoom plugin would be providing such complex apis and even if they do then not sure if all have those and even if they do then not sure if all have it mature 
                            --  so one simple (but tricky, yeah it is trick and not standard) option is to simply hide the zoom area container and show the custom html. 
                                --  but since it is not standard we should find standard, or can use that trick since it is simple and also effective option especially because it is less likely for most slider and zoom to provide support
                                    --  but if we are to use this trick then we need to bring it closer to standard implementation by ensuring the possible flows like always have our classes in zoom area container like sp-variations-zoom-container 
        }); 

              this.$variations_form = this.$wrapper.find('.variations_form');
              this.$attributeFields = this.$variations_form.find('.variations select');
              this.$target = this._element.parent();
              this.$slider = $('.woo-variation-gallery-slider', this._element);
              this.$thumbnail = $('.woo-variation-gallery-thumbnail-slider', this._element);
              this.product_id = this.$variations_form.data('product_id');
              this.is_variation_product = this.$variations_form.length > 0;

              this._element.addClass('wvg-loaded');

              this.defaultDimension();
              this.defaultGallery();

              this.initEvents();
              this.initVariationGallery();

              if (!this.is_variation_product) {
                this.imagesLoaded();
              }

              if (this.is_variation_product) {
                this.initSlick();
                this.initZoom();
                this.initPhotoswipe();
              }

              this._element.data('woo_variation_gallery', this);

              $(document).trigger('woo_variation_gallery_init', [this]);

            _createClass(WooVariationGallery, [{
              key: "init",
              value: function init() {
                var _this = this;

                return _.debounce(function () {
                  _this.initSlick();

                  _this.initZoom();

                  _this.initPhotoswipe();
                }, 500);
              }
            }, {
              key: "getChosenAttributes",
              value: function getChosenAttributes() {
                var data = {};
                var count = 0;
                var chosen = 0;
                this.$attributeFields.each(function () {
                  var attribute_name = $(this).data('attribute_name') || $(this).attr('name');
                  var value = $(this).val() || '';

                  if (value.length > 0) {
                    chosen++;
                  }

                  count++;
                  data[attribute_name] = value;
                });
                return {
                  'count': count,
                  'chosenCount': chosen,
                  'data': data
                };
              }
            }, {
              key: "defaultDimension",
              value: function defaultDimension() {
                var _this2 = this;

                // console.log(this._element.height(), this._element.width());
                this._element.css('min-height', this._element.height()).css('min-width', this._element.width());

                $(window).on('resize.wvg', _.debounce(function (event) {
                  if (event.originalEvent) {
                    _this2._element.css('min-height', _this2._element.height()).css('min-width', _this2._element.width());
                  }
                }, 300));
                $(window).on('resize.wvg', _.debounce(function (event) {
                  if (event.originalEvent) {
                    _this2._element.css('min-height', '').css('min-width', '');
                  }
                }, 100, {
                  'leading': true,
                  'trailing': false
                }));
              }
            }, {
              key: "initEvents",
              value: function initEvents() {
                var _this3 = this;

                this._element.on('woo_variation_gallery_slider_slick_init', function (event, gallery) {
                  if (woo_variation_gallery_options.is_vertical) {
                    //$(window).off('resize.wvg');
                    $(window).on('resize', _this3.enableThumbnailPositionDebounce()); //$(window).on('resize', this.thumbnailHeightDebounce());
                    //this.$slider.on('setPosition', this.enableThumbnailPositionDebounce());

                    _this3.$slider.on('setPosition', _this3.thumbnailHeightDebounce());

                    _this3.$slider.on('afterChange', function () {
                      _this3.thumbnailHeight();
                    });
                  }

                  if (woo_variation_gallery_options.enable_thumbnail_slide) {
                    var thumbnails = _this3.$thumbnail.find('.wvg-gallery-thumbnail-image').length;

                    if (parseInt(woo_variation_gallery_options.gallery_thumbnails_columns) < thumbnails) {
                      _this3.$thumbnail.find('.wvg-gallery-thumbnail-image').removeClass('current-thumbnail');

                      _this3.initThumbnailSlick();
                    } else {
                      _this3.$slider.slick('slickSetOption', 'asNavFor', null, false);
                    }
                  }
                });

                this._element.on('woo_variation_gallery_slick_destroy', function (event, gallery) {
                  if (_this3.$thumbnail.hasClass('slick-initialized')) {
                    _this3.$thumbnail.slick('unslick');
                  }
                });

                this._element.on('woo_variation_gallery_image_loaded', this.init());
              }
            }, {
              key: "initSlick",
              value: function initSlick() {
                var _this4 = this;

                if (this.$slider.is('.slick-initialized')) {
                  this.$slider.slick('unslick');
                }

                this.$slider.off('init');
                this.$slider.off('beforeChange');
                this.$slider.off('afterChange');

                this._element.trigger('woo_variation_gallery_before_init', [this]); // Slider


                this.$slider.on('init', function (event) {
                  if (_this4.initial_load) {
                    _this4.initial_load = false; // this._element.css('min-height', this.$slider.height() + 'px');
                    //_.delay(() => {
                    //    this.$slider.slick('setPosition');
                    //}, 2000)
                  }
                }).on('beforeChange', function (event, slick, currentSlide, nextSlide) {
                  _this4.$thumbnail.find('.wvg-gallery-thumbnail-image').not('.slick-slide').removeClass('current-thumbnail');

                  _this4.$thumbnail.find('.wvg-gallery-thumbnail-image').not('.slick-slide').eq(nextSlide).addClass('current-thumbnail');
                }).on('afterChange', function (event, slick, currentSlide) {
                  _this4.stopVideo(_this4.$slider);

                  _this4.initZoomForTarget(currentSlide);
                }).slick(); // Thumbnails

                this.$thumbnail.find('.wvg-gallery-thumbnail-image').not('.slick-slide').first().addClass('current-thumbnail');
                this.$thumbnail.find('.wvg-gallery-thumbnail-image').not('.slick-slide').each(function (index, el) {
                  $(el).find('div, img').on('click', function (event) {
                    event.preventDefault();
                    event.stopPropagation();

                    _this4.$slider.slick('slickGoTo', index);
                  });
                });

                _.delay(function () {
                  _this4._element.trigger('woo_variation_gallery_slider_slick_init', [_this4]);
                }, 1);

                _.delay(function () {
                  // console.log(this._element.height(), this._element.width());
                  //    this._element.css('min-height', this._element.height())
                  //    this._element.css('min-width', this._element.width())
                  _this4.removeLoadingClass();
                }, 100);
              }
            }, {
              key: "initZoomForTarget",
              value: function initZoomForTarget(currentSlide) {
                if (!woo_variation_gallery_options.enable_gallery_zoom) {
                  return;
                }

                var galleryWidth = parseInt(this.$target.width()),
                    zoomEnabled = false,
                    zoomTarget = this.$slider.slick('getSlick').$slides.eq(currentSlide);
                $(zoomTarget).each(function (index, target) {
                  var image = $(target).find('img');

                  if (parseInt(image.data('large_image_width')) > galleryWidth) {
                    zoomEnabled = true;
                    return false;
                  }
                }); // If zoom not included.

                if (!$().zoom) {
                  return;
                } // But only zoom if the img is larger than its container.


                if (zoomEnabled) {
                  var zoom_options = $.extend({
                    touch: false
                  }, wc_single_product_params.zoom_options);

                  if ('ontouchstart' in document.documentElement) {
                    zoom_options.on = 'click';
                  }

                  zoomTarget.trigger('zoom.destroy');
                  zoomTarget.zoom(zoom_options);
                }
              }
            }, {
              key: "initZoom",
              value: function initZoom() {
                var currentSlide = this.$slider.slick('slickCurrentSlide');
                this.initZoomForTarget(currentSlide);
              }
            }, {
              key: "initPhotoswipe",
              value: function initPhotoswipe() {
                var _this5 = this;

                if (!woo_variation_gallery_options.enable_gallery_lightbox) {
                  return;
                }

                this._element.off('click', '.woo-variation-gallery-trigger');

                this._element.off('click', '.wvg-gallery-image a');

                this._element.on('click', '.woo-variation-gallery-trigger', function (event) {
                  _this5.openPhotoswipe(event);
                });

                this._element.on('click', '.wvg-gallery-image a', function (event) {
                  _this5.openPhotoswipe(event);
                });
              }
            }, {
              key: "stopVideo",
              value: function stopVideo(element) {
                $(element).find('iframe, video').each(function () {
                  var tag = $(this).prop("tagName").toLowerCase();

                  if (tag === 'iframe') {
                    var src = $(this).attr('src'); //   $(this).attr('src', src);
                  }

                  if (tag === 'video') {
                    $(this)[0].pause();
                  }
                });
              }
            }, {
              key: "defaultGallery",
              value: function defaultGallery() {

                we would not like to manage extra layer of ajax to get default gallery and so on, if it is not necessary by standard flow but if by any chance standard flows does require handling any exceptional scenarios then we would need to do it -- to h and -- to d 
            }, {
              key: "showVariationImage",
              value: function showVariationImage(variation) {
                if (variation) {
                  this.addLoadingClass();
                  this.galleryInit(variation.variation_gallery_images || []);
                }
              }
            }, {
              key: "initVariationGallery",
              value: function initVariationGallery() {
                var _this9 = this;

                // show_variation, found_variation
                this.$variations_form.off('reset_image.wvg');
                this.$variations_form.off('click.wvg', '.reset_variations');
                this.$variations_form.off('show_variation.wvg');
                this.$variations_form.off('hide_variation.wvg'); // this.$variations_form.off('found_variation.wvg');
                // Show Gallery
                // console.log(this.$variations_form)

                this.$variations_form.on('show_variation.wvg', function (event, variation) {
                  _this9.showVariationImage(variation);
                });

                if (woo_variation_gallery_options.gallery_reset_on_variation_change) {
                  this.$variations_form.on('hide_variation.wvg', function () {
                    _this9.resetVariationImage();
                  });
                } else {
                  this.$variations_form.on('click.wvg', '.reset_variations', function () {
                    _this9.resetVariationImage();
                  });
                }
              }
            }, {
              key: "galleryInit",
              value: function galleryInit(images) {
                var _this11 = this;

                var hasGallery = images.length > 1;

                this._element.trigger('before_woo_variation_gallery_init', [this, images]);

                this.destroySlick();
                var slider_inner_html = images.map(function (image) {
                  var template = wp.template('woo-variation-gallery-slider-template');
                  return template(image);
                }).join('');
                var thumbnail_inner_html = images.map(function (image) {
                  var template = wp.template('woo-variation-gallery-thumbnail-template');
                  return template(image);
                }).join('');

                if (hasGallery) {
                  this.$target.addClass('woo-variation-gallery-has-product-thumbnail');
                } else {
                  this.$target.removeClass('woo-variation-gallery-has-product-thumbnail');
                }

                this.$slider.html(slider_inner_html);

                if (hasGallery) {
                  this.$thumbnail.html(thumbnail_inner_html);
                } else {
                  this.$thumbnail.html('');
                } //this._element.trigger('woo_variation_gallery_init', [this, images]);


                _.delay(function () {
                  _this11.imagesLoaded();
                }, 1); //this._element.trigger('after_woo_variation_gallery_init', [this, images]);

              }

            }, {
              key: "initThumbnailSlick",
              value: function initThumbnailSlick() {
                var _this13 = this;

                if (this.$thumbnail.hasClass('slick-initialized')) {
                  this.$thumbnail.slick('unslick');
                }

                this.$thumbnail.off('init');
                this.$thumbnail.on('init', function () {}).slick();

                _.delay(function () {
                  _this13._element.trigger('woo_variation_gallery_thumbnail_slick_init', [_this13]);
                }, 1);
              }
            }, {

            for below mattter also research on WooCommerce ajax variations with keywords WooCommerce ajax variations legacy 
            // For Single Product
            $('.woo-variation-gallery-wrapper:not(.wvg-loaded)').WooVariationGallery(); // Ajax and Variation Product

            $(document).on('wc_variation_form', '.variations_form', function () {
              $('.woo-variation-gallery-wrapper:not(.wvg-loaded)').WooVariationGallery();
            }); // Support for Jetpack's Infinite Scroll,
            so a call from here to the compatability function of this module, and that will cover all compatability matters of load time inlcuding the promize resolve block of the plugin we were exploring. so call compatability with section=bootstrap -- to d 


        -   slider and zoom 
            --  it will mostly be matter of interest to the variations.gallery_images module but since it is vital for overall stability of functions and the overall experience that is why it is considered as a dedicated thing 
            --  its events -- it may directly or indirectly connect itself to the below events layer mentioned 
            --  events it listens to simply the events that it mandatorily expects and the events that is optional for it but accepts 
                --  based on these we can easily define what our hooks (php layer) and js api that we are to provide for slider and zoom would look like or how it will be composed 
            --  media 
                --  images 
                --  in addition to images other things that it may need to support are videos (would be covered by custom_html) and custom html 


    --  if our slider/zoom module is enabled then 
        --  simply listen legacy js layer events and on variation change etc. keep updating our dom 
    --  if our slide/zoom module is not enabled and we are binding to slider/zoom module of the user through the flows of theme adaption template file then 
        --  simply listen legacy js layer events and then do our applicable logic as well as call the slider/zoom module api that we are binding to 
    --  if none of the two above then 
        --  then listen to legacy js layer, do our logic and then publish events on our js layer 
            --  in this case sample applies for php layer as well as planned, means publishing the php events/data to the php hooks 
    --  if none of the three above then 
        --  then user would be using one of our recommend slider and zoom modules out of the 5 recommended plugins we planned to present 
            --  in this case it will be second if layer above so carry accoding to that layer flows 

    // -   events 
    //     NOTE: in below events, all those events which falls in category of listener events of the slider or zoom layers, should strictly depend on and use only the underlying slider and zoom js/jquery plugins api. if we make any compromise in that then by definition the functioning of the layers related to it will not be perfect and will not be stable and reliable. -- then these listener category events will call our standard events handler for example slider_thumb_click_listerner would click our on_slider_thumb_click event 
    // --  ACTIVE_TODO so all events of slider/zoom listeners category should be ported as js api through our standard api interface that is published for each js modules or by means of our events observer pattern interface or something best suitable and feasible. -- we need to do it only when we finally want to provide php
    //  hooks and js api for our users to use their own preferred slider and zoom plugin. so it will be as per the user demand or something such. 
    // --  mouse events 
        - listener events 
    
    var preprocess_data = function() {

        ACTIVE_TODO not sure if this is necessary 
        this._generated = this.product_variations.reduce(function (obj, variation) {

          Object.keys(variation.attributes).map(function (attribute_name) {
            if (!obj[attribute_name]) {
              obj[attribute_name] = [];
            }

            if (variation.attributes[attribute_name]) {
              obj[attribute_name].push(variation.attributes[attribute_name]);
            }
          });

          return obj;
        }, {});

        ACTIVE_TODO but we will make use of it from beginning 
        this._out_of_stock = this.product_variations.reduce(function (obj, variation) {

          Object.keys(variation.attributes).map(function (attribute_name) {
            if (!obj[attribute_name]) {
              obj[attribute_name] = [];
            }

            if (variation.attributes[attribute_name] && !variation.is_in_stock) {
              obj[attribute_name].push(variation.attributes[attribute_name]);
            }
          });

          return obj;
        }, {});
    };

    var process_images = function() {

        //  process images
        _this.data.images.each( function( image ) {

            --  the key controller here in case of gallery_images module, for defining the calling sequences and flow will be, the image index(even though we had plan to use index but that is only when it is must to use that), otherwise there should be gallery_item_type field that take care implicitly the things like custom_html images for zoom area and so on 
                    --  so should we plan gallery_item_type field support? maybe it is good idea, to have such field support right from the config file function planned for each extensions, while for wbc gallery items like image and videos it will be gallery_item_type=image or video. -- to h 
            --  so above preprocess_data call should simply prepare two attribute types list, first is attribute_types and second is ... or simply one only. and simply delegate everything else that is not coming under attribute_types, to the extensions layers. and should simply publish this list of attribute_types from backend. 
            NOTE: and one of the key benefit of this approach is that these layers will emit the broadcast notification event only if they detect the type to be the premiumly supported type and otherwise not. which would minimize process and little or not hanging processes and less debug console logs that would appear around. 

            is the woo input template type means dropdown is mandatorily kept by plugins, not seems likely but still confirm and then we need a way to determine(always) the exact input type based on the field/input type selected on woo panel or otherwise simply support the input_template_type field which will be set in background implicitly based on the field/input type selected on woo panel -- this field is simply better then managing many different template names of extensions and defining based on that -- and it will default to the above field/input type for wbc nothing to manage, only if condition below that if input_template_type is not defined then read simply above field/input type. and in case of extensions that need to be defined based on the template that is selected on their admin panel. so this template option should be only be defining it and passing it where applicable so that is gets here. and it is need to be defined based on that only to avoid confusion and many unnecessary and confusing configuration overheads. no simply need to stick to attribute type only means field/input-type selected on woo panel and that is standard and clean. so implement here based on that only. -- to h or -- to d 


            if( type == '?' )
             do necessary logic if support is available
                --  that means based on type call/process necessary functions/layers for example events functions(some events functions already defined below), template functions/layers, pages functions/layers, like events the effects functions/layers, plugins/themes applicable compatiblity function calls, slider and zoom functions/layers(note that even for swatches modules there might be some conditions or conditional logics that would be required) -- to d 
                --  and also do call/process necessary functions/layers for the provided device type(and maybe some of their specifications would also need to be handled in future like width(which would otherwise mostly be dynamically handled), resolution and so on ACTIVE_TODO) and configs, but it will be a specific block here only and the dedicated function for them sound unnecessary -- to d
                    --  and we need some logic of if function or layer need to be called once only then take care of that, for all above functions, including the devices and configs that are to be handled from here -- to d 
                    --  and as usual there will going to be if conditions for applicable matters in applicable functions and their layers defined above, to handle the devices and configuration specific matters. and so the dedicated blocks of devices and configs will handle some specific matters which do not necessarily mixed with other things mentioned above like events, template, pages and so on layers. -- to h    
                    

                    process_template(type);

                    process_pages(type);
                    
                    process_slider_and_zoom(type);
                    
                    process_events(type);

                    process_and_manage_effects(type);

                    process_compatability_matters(type);

                -   devices 
                        --  for layers which need to have complete different implementation for mobile etc. then for them applicable flgas should be set/initiated from the higher layers layers for example the slider and zoom would be completely different plugin for mobile devices -- but anyway now we will see to it again to reconsider using the new slider also for mobile but only if that is beneficial in terms of setup time and maintainance time, for the later it would be beneficial but not sure about the initial setup and implementation time and challanges that may arise. 
                            --  and we would like to reconsider the zoom also in the same way like above 
                    --  browser - will matter so much 
                    --  screen size - need to handle occasionally only as long as overall UI/UX layers are mature 
                    --  os 

                    if(window.document.splugins.common.is_mobile){

                    }else if(window.document.splugins.common.is_tablet){

                    }else if(browser){

                    }else if(screen size){

                    }else if(os){

                    };

                -   configs 
                    --  will control decision of whether to display certain section or not, for example whether to display template part of attribute name (for us ribbon wrapper)
                    --  or whether to show tooltip or not 

                    if( type == 'radio' ) 

            else if( not for example slider input is not supported then host the listener event so that extension js do its job or simply skip it and let extension js do their part )
                --  and we can and should simply use observer pattern events to host for example the slider listener here and then emit internal change event from here     
                    --  still in this case the variation.swatches will register its event subject and emit bootstrap level notification like bootstrap/on.load maybe on.load is more user friendly 
                    --  then at that time applicable extension will bootstrap the js layer 
                    --  and when the change event occurs the applicable extension will simply call the ...swatches.api function to notify back about their change event or the events module can add support to provide callbacks to subscriber so that they can reply with something when they have done something based on notification. so it can be called the notification_response. -- but it will be about breaking our own rule of keeping the events simple. so even if we must do then in that case it must be till notification_response only and no further callback back and forth can be supported. otherwise it mostly lead to long debug sequences. --  however it has benefit of less maintainance since otherwise extensions need to know about the ...swatches.api but in case of events support of notification_response it only need to learn about and depend on the variations.swatches subject of events module. and as long as we can keep it limited to notification_response only and do not extend it further it will be clean to be frank. 


                    --  and we are planning to host darker/lighter slider support also from here as usual so it will be just like above slider example 
                        --  but yeah after the change event is recieved here that will be emitted to the gallery_images module to let them do their job. since darker lighter is not part of the variation there is no further thing to do from here after the change event is recieved. 
                            --  and since it is different kind processing that is required after change event so the input_template_type must be defined uniquely like slider_no_variation 
                                NOTE: and yeah on that note everything of the sp_variations module must be dynamic and nothing should be hardcoded so slider_no_variation input template type must be passed right from where the template is defined on admin to till here 
            

            --  it wil be a specific block here for devices and configs -- to d 
            --  while for the rest create dedicated functions like process_template, process_events and so on. for the layers listed below. 
                --  create below list of functions after the process_attribute_types function, and apply above peudo flows there and rest of the flows those functions should adapt from the flow notes from the heirachical flow plan at top -- to d and -- to h 
                    -- process_template -- to d
                    -- process_pages -- to d
                    -- process_slider_and_zoom -- to d
                    -- process_events -- to d
                    -- process_and_manage_effects -- to d
                    -- process_compatability_matters -- to d
            
        }); 

    }

    var process_template = function() {

        --  or whether to show tooltip or not 
                    
        if( type == 'radio' ) 

    }

    var process_pages = function() {

        if(window.document.splugins.common.is_category_page){

        }else if(window.document.splugins.common.is_item_page){

        };

    }

    var process_slider_and_zoom = function() {

    }

    var process_events = function() {

         on_click();

    }

    var process_and_manage_effects = function() {

    }

    var process_compatability_matters = function() {

        if(type == 'buttons'){

            compatability("button_section");

        }else if(type == 'image'){

            compatability("image_section");

        }; 

    }


    var slider_thumb_click_listener = function() {


    };

    var zoom_area_hover_listener = function() {


    };

    var on_slider_thumb_click = function() {


    };

    var on_zoom_area_hover = function() {

        for certain images or custom html we may need to cancel the zoom event, but I think for extensions like darker lighter, diamond meta, recently purchase which have the custom html requirement then that will not emit the zoom hover event since they would not be on the standard zoom container. -- and even in case when images have such requirement fr any feature or flows then in that case we can simply skip using the standard zoom container for displaying image in the zoom area 
    };


    var on_variation_change = function() {

        //  here it will be recieved by the parent layers, and the parent layer would be bootstrap or dedicated function maybe namely subscribe_to_events which will subscrive to the swatches subject of the ...variations.swatches module for the variation change event 


        //  from here call the internal base event handler of this event which is variation_change 
        variation_change(); 
    };

    var on_custom_input_change = function() {

        //  custom input change is not necessarily for the custom html only, it can be for standard gallery operations also. for example some free or premium widget maybe providing different kind of interface to interact with slider or zoom layers for example diamond meta may have link or button anywhere on surrounding area which would lead to displaying custom html of diamond meta in zoom area, so as per standard flow it should invoke its related thumb click in background which would ultimately lead to displaying of the custom html in zoom area. so check if that is the case then trigger the on_click event or change event from here means call those functions. 


        //  if the it is for the custom html then do accordingly 
            note that it is still not clear if the custom html is approached directly from here for their change event or rather a notification will be broadcasted on which the particular extension do some action and then respond back if it is applicable. here in this case the responding back would be based on how we decide to do it for slider handling in above swatches module. 
    };


    var variation_change = function() {

        //  here it will call the internal function swap_images( variation_id ) which will be doing one of the main process of this gallery_images module 
        swap_images( variation_id );    
    };

    --  keyboard events 
    var on_keyup or down ? = function() {


    };
            --  legacy events (events of woo emitted on certain scenarios) 
            --  events emitted by other plugins/themes which we need to take care of in case of compatiblity matters, so it can be termed as the compatiblity events 

    // -- base events - after the above events are handled by their particular function/layer, they would call below functions to do the ultimate work         
    var change = function() {


    };


    -   effects and managing after effects 
            --  may need to provide some effects but only where and if necessary, the majority of effects will be provided by the slider and zoom js/jQuery plugin 
            --  will need to manage the after effects very precisely, to ensure smooth and non cluttering experience 
                --  it may or likely include managing the loading, swaping and updating of images 


    return {

        init: function() {

            window.document.splugins.variation.events.api.notifyAllObservers( 'variation', 'before_search' ); 
        },
        before_search: function() {

            window.document.splugins.variation.events.api.notifyAllObservers( 'variation', 'before_search' ); 
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

            window.document.splugins.variation.events.api.notifyAllObservers( 'variation', 'no_products_found' );
        }, 

    }; 
};

//  publish it 
window.document.splugins.wbc.variations.gallery_images.api = window.document.splugins.wbc.variations.gallery_images.core( {}/*if required then the php layer configs can be set here by using the js vars defined from the php layer*/ );

put ACTIVE_TODO_OC_START and ACTIVE_TODO_OC_END around each open comments section, and then comment them -- to d 
    --  and need to do the same for filter js and ssm variations class file -- to d 