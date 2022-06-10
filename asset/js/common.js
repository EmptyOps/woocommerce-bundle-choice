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

//  publish it 
window.document.splugins.templating.api = window.document.splugins.templating.core( {}/*if required then the php layer configs can be set here by using the js vars defined from the php layer*/ );


// the variations js module
window.document.splugins.wbc.variations = window.document.splugins.wbc.variations || {};

window.document.splugins.wbc.variations.core = function() {
    // this.subjects = [];

    this.$wrapper = this._element.closest('.product');
    this.$variations_form = this.$wrapper.find('.variations_form');

    // here mostly in the private scope, the variations module should subscribe to search filter events and pass those to variations core which would call the change event so that filters those affecting the variations data like images etc. are rendered accordingly. so that metal color based or shape based images render appropriately. 
    //     --  however, it is not limited to js layer only and actually js layer here would not be of use except the search is client side only based on the js. but the searches are always carried on the backend so the php layer need to ensure that return appropriate variations images etc. whenever the selected options of the search filters connects with variations instead of the main product. 
    //         --  m have did it already but need to implement throughly as per standard if not proper yet 

    // --  if our slider/zoom module is enabled then 
    //     --  simply listen legacy js layer events and on variation change etc. keep updating our dom 
    // --  if our slide/zoom module is not enabled and we are binding to slider/zoom module of the user through the flows of theme adaption template file then 
    //     --  simply listen legacy js layer events and then do our applicable logic as well as call the slider/zoom module api that we are binding to 
    // --  if none of the two above then 
    //     --  then listen to legacy js layer, do our logic and then publish events on our js layer 
    //         --  in this case sample applies for php layer as well as planned, means publishing the php events/data to the php hooks 
    // --  if none of the three above then 
    //     --  then user would be using one of our recommend slider and zoom modules out of the 5 recommended plugins we planned to present 
    //         --  in this case it will be second if layer above so carry accoding to that layer flows 

    var initPrivate = function() {


    }

    // var legacyBinding? = function() {

    //     jQuery('#select_attribute_of_variation').on('woocommerce_variation_has_changed', function(){
    //         // do your magic here...
    //      }); 


    //     for optionsUI swatches
    //         --  the fundamental is ensuring all required ajax bindings 
    //         --  and of course the fundamental calls to the legacy woo js layer apis like woo variation form or something such and so on 
    //         --  and accurate management of fundamentals like generated, change and check(which m was triggering) etc. events and also out of stock and other such business logic implementation 
    //         --  and yeah even supporting the keyboard and mouse events which is vital for the user experience 

    //     moved here from the wbc options(optionsUI) controller 
    //     $('.variable-item').on('click',function(){
    //         var target_selector = $('#'+$(this).data('id'));
    //         target_selector.val($(this).data('value'));
    //         $(this).parent().find('.selected').removeClass('selected');
    //         $(this).addClass('selected');
    //         jQuery(".variations_form" ).trigger('check_variations');
    //         $(target_selector).trigger('change');
    //     });

    //     jQuery(".variations_form").on('click', '.reset_variations'/*'woocommerce_variation_select_change'*//*'reset'*/,function(){
    //         jQuery('.variable-items-wrapper .selected').removeClass('selected');
    //         jQuery('.variable-items-wrapper .dropdown').dropdown('restore defaults');
    //     });

    // }

    // we may need to bind to the click of our sp_variations attributes variation widgets option change/click event and based on that pubish/trigger variation change event of the legacy js layers 
    //     --  for this need to study our options UI implementation flow and also the other plugins swatches implementation flow to find out different flows that different sco system can implement 

    // will the category and item page both will use this same module? and all the flows will be same? 


    // and add compatiblity related private function here and add all those theme and other patch that the other plugin we were exploring have. but of course in our case it will be as per our flow of how we manage loading and then ajax loading of swatches options 
    //     --  that other plugin have some more theme specific patch fix, and some other patch for managing unexpected effects like blink and so on 

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

    } 
}