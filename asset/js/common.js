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

window.document.splugins.events.subject = function( feature_unique_key, notifications ) {
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

window.document.splugins.events.observer = function(callbacks) {
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

window.document.splugins.templating.core = function(configs) {
    this.configs = jQuery.extend({}, {}/*default configs*/, configs);   

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

//  publish it 
window.document.splugins.templating.api = window.document.splugins.templating.core( {}/*if required then the php layer configs can be set here by using the js vars defined from the php layer*/ );


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
        -   slider and zoom 
            --  it will mostly be matter of interest to the variations.gallery_images module but since it is vital for overall stability of functions and the overall experience that is why it is considered as a dedicated thing 
            --  its events -- it may directly or indirectly connect itself to the below events layer mentioned 
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

    // we may need to bind to the click of our sp_variations attributes variation widgets option change/click event and based on that pubish/trigger variation change event of the legacy js layers 
    //     --  for this need to study our options UI implementation flow and also the other plugins swatches implementation flow to find out different flows that different sco system can implement 

    // will the category and item page both will use this same module? and all the flows will be same? 


    // and add compatiblity related private function here and add all those theme and other patch that the other plugin we were exploring have. but of course in our case it will be as per our flow of how we manage loading and then ajax loading of swatches options 
    //     --  that other plugin have some more theme specific patch fix, and some other patch for managing unexpected effects like blink and so on 

    var bootstrap = function() {

        //  data applicable loops 
        _this.data.product_variations.each( function() {

            //  pre process data and process collections that would be necessary for neat and quick ops 

            // collect input types to be supported 
            _this.data.input_template_types = {};   is the woo input template type means dropdown is mandatorily kept by plugins, not seems likely but still confirm and then we need a way to determine(always) the exact input type based on the field/input type selected on woo panel or otherwise simply support the input_template_type field which will be set in background implicitly based on the field/input type selected on woo panel -- this field is simply better then managing many different template names of extensions and defining based on that -- and it will default to the above field/input type for wbc nothing to manage, only if condition below that if input_template_type is not defined then read simply above field/input type. and in case of extensions that need to be defined based on the template that is selected on their admin panel. so this template option should be only be defining it and passing it where applicable so that is gets here. and it is need to be defined based on that only to avoid confusion and many unnecessary and confusing configuration overheads. no simply need to stick to attribute type only means field/input-type selected on woo panel and that is standard and clean. so implement here based on that only. -- to h or -- to d 

        }); 

        //  template 
        _this.data.input_template_types.each( function( type ) {

            //  do necessary logic if support is available, if not for example slider input is not supported then host the listener event so that extension js do its job or simply skip it and let extension js do their part 
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

            
        }); 
    };

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


    };

    var reset_all = function() {


    };


    var compatability = function() {

        this compatiblity function flow will be as per the commets in the filter js file 
        -   plugins/themes 
        --  there will be list of compatiblity matters that need to be handled so it will go under the compatiblity matter, and clearly it will go in compatiblity layers 
            --  not related to this section but lets create simply a compatiblity module of its own like at the level where templating module is in namespace -- to d --    ACTIVE_TODO/TODO then each modules like filters, variations and so on can have their own module like ...filters.compatiblity just like there ...filters.core core module. but this is only if necessary, otherwise a function inside core module is much readability friendly. 
                --  a compatiblity function inside filters, variations.swatches and variations.gallery_images module -- to d 
        
        ///////////// -- 15-06-2022 -- @drashti -- ///////////////////////////////
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
        

        eo_wbc_filter_render_html();
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


            add_action( 'wvs_global_attribute_column', function ( $column, $term_id, $taxonomy, $attribute, $fields, $available_types ) {
                if ( class_exists( 'SitePress' ) ) {

                    global $sitepress;

                    $keys = wp_list_pluck( $fields, 'id' );
                    // $keys = array_column($fields, 'id');

                    foreach ( $keys as $key ) {
                        $value = sanitize_text_field( get_term_meta( $term_id, $key, true ) );
                        // $original_element_id = $sitepress->get_original_element_id( $term_id, 'tax_' . $taxonomy );
                        $trid         = $sitepress->get_element_trid( $term_id, 'tax_' . $taxonomy );
                        $translations = $sitepress->get_element_translations( $trid, 'tax_' . $taxonomy );

                        $current_lang = $sitepress->get_current_language();
                        $default_lang = $sitepress->get_default_language();

                        if ( $translations && empty( $value ) ) {
                            // source_language_code
                            $translation = array_values( array_filter( $translations, function ( $translation ) {
                                return isset( $translation->original ) && ! empty( $translation->original );
                            } ) );

                            $translation = array_shift( $translation );

                            if ( empty( $value ) && $translation ) {
                                $original_term_id = $translation->term_id;
                                $original_value   = sanitize_text_field( get_term_meta( $original_term_id, $key, true ) );
                                // Copy term meta from original
                                update_term_meta( $term_id, $key, $original_value );
                            }
                        }

                    }
                }
            }, 10, 6 );
        } 

        ////////////////////////////////////////////////////   

    }; 

    return {

        init: function() {

            window.document.splugins.variation.events.core.notifyAllObservers( 'variation', 'before_search' ); 
        },
        before_search: function() {

            window.document.splugins.variation.events.core.notifyAllObservers( 'variation', 'before_search' ); 
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

            window.document.splugins.variation.events.core.notifyAllObservers( 'variation', 'no_products_found' );
        }, 

    }; 
};

// the variations gallery images js module
window.document.splugins.wbc.variations.gallery_images = window.document.splugins.wbc.variations.gallery_images || {};

window.document.splugins.wbc.variations.gallery_images.core = function() {
    // this.subjects = [];

    this.$wrapper = this._element.closest('.product');
    this.$variations_form = this.$wrapper.find('.variations_form');

    ///////////// -- 15-06-2022 -- @drashti -- ///////////////////////////////
    var compatability = function(section, object, expected_result) {
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
        

        eo_wbc_filter_render_html();
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


            add_action( 'wvs_global_attribute_column', function ( $column, $term_id, $taxonomy, $attribute, $fields, $available_types ) {
                if ( class_exists( 'SitePress' ) ) {

                    global $sitepress;

                    $keys = wp_list_pluck( $fields, 'id' );
                    // $keys = array_column($fields, 'id');

                    foreach ( $keys as $key ) {
                        $value = sanitize_text_field( get_term_meta( $term_id, $key, true ) );
                        // $original_element_id = $sitepress->get_original_element_id( $term_id, 'tax_' . $taxonomy );
                        $trid         = $sitepress->get_element_trid( $term_id, 'tax_' . $taxonomy );
                        $translations = $sitepress->get_element_translations( $trid, 'tax_' . $taxonomy );

                        $current_lang = $sitepress->get_current_language();
                        $default_lang = $sitepress->get_default_language();

                        if ( $translations && empty( $value ) ) {
                            // source_language_code
                            $translation = array_values( array_filter( $translations, function ( $translation ) {
                                return isset( $translation->original ) && ! empty( $translation->original );
                            } ) );

                            $translation = array_shift( $translation );

                            if ( empty( $value ) && $translation ) {
                                $original_term_id = $translation->term_id;
                                $original_value   = sanitize_text_field( get_term_meta( $original_term_id, $key, true ) );
                                // Copy term meta from original
                                update_term_meta( $term_id, $key, $original_value );
                            }
                        }

                    }
                }
            }, 10, 6 );
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

    var bootstrap = function() {

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

    };

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

            window.document.splugins.variation.events.core.notifyAllObservers( 'variation', 'before_search' ); 
        },
        before_search: function() {

            window.document.splugins.variation.events.core.notifyAllObservers( 'variation', 'before_search' ); 
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

            window.document.splugins.variation.events.core.notifyAllObservers( 'variation', 'no_products_found' );
        }, 

    }; 
};
