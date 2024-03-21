/**
 * common js functions and also the common defs for the module, observer, prototype and singleton design patterns 
 * 
 * this asset file will contain the common layer and functions, and if there are common functions which are specific to admin only then that will not go here but on in the admin asset js file, and if there are common functions which are to be used by frontend but in some cases by admin or even if not going to be used by admin then also be added here. so this asset file will be loaded on both admin and frontend. the decision of managing common flows like this and priotizing what goes to frontend is because of the requirement of minimizing the number of assets that would be loaded on frontend. 
 */
class SP_SPlugins {

    // NOTE: we needed to set element in the constructor since right now the class heirarchy is just following the name space. but very soon in future in 2nd or 3rd revision we should and must define standard class heirarchy where widget module class would be extending from some base widget module class and the class heirarchy for the same we could define. or we can simply follow the php class heirarchy to create the js layers class heirarchies or maybe the mix of both is what we need. 
    //     NOTE: however in the meantime for the classes which are extended from here, which would be all for now, could extend simply pass null in first parameter during the object creation. 
    constructor(element, configs) {
        
    }

    // ACTIVE_TODO_OC_START
    // ACTIVE_TODO/TODO We had turned off the #use since it is not reliably available on all browser versions that are in use. so we need to enable the # in the future but only when we can confirm that all the browsers have the # support now available so it may starch for a longer timeline of even more than two-three years. So in that case by the third revision let's simply mark it as todo -- to a && -- to h
    // NOTE: So now since we are replacing # with _private specifier in the function name and in the variable name so we must now make sure that we do not access the private property from the child class and the property in concern here are function and variables. And we must respect it all the time otherwise whenever we make decisions based on the understanding that private is not called from outside and restructure them or duplicate them then it will break the child class flows and functions.
    // ACTIVE_TODO_OC_END
    /*#*/init_private(){

    } 

    init() {

        var _this = this; 

        // ACTIVE_TODO_OC_START
        // ACTIVE_TODO It should be well noted that mere droping # for same name functions in parent and child class results in recurtion so we had to call it using prototype. When we enable back the support for # at that time simply uncomment below line and comment the line under neth it.
        // ACTIVE_TODO_OC_END
        // _this./*#*/init_private();
        SP_SPlugins.prototype.init_private.call(_this);
    }  
    
}
window.document.splugins = window.document.splugins || {};

window.document.splugins.common = window.document.splugins.common || {};

class SP_WBC extends SP_SPlugins {

    constructor(element, configs) {
        
        // Calling parent's constructor
        super(element, configs); 
    }
}
window.document.splugins.wbc = window.document.splugins.wbc || {};
 
 // port the very base namespace and also some key and common libraries and functions 
var splugins = window.document.splugins;    

// put the is item page and is category page conditions for below underscore js port statement -- to s done
//     --  and also put same both conditions for while during exporting the three modules namely swatches, gallery_images and sp_slzm -- to s done
//     --  and the is_category_page and is_item_page flgs are not set properly on the js.vars asset php file so set it there. look at public handler file if required -- to s done 
//     --  and also put the php side is_category_page and is_item_page conditions for underscore js loading since that is going to be used on these two page only -- to s done
//     --  and also the export statement still miss one line of calling init, I think. so look at the form builder asset php and if that is the case then put init function call under is js module where it is exported under .api object -- to s done
//         --  all modules means also the pagination and filters module in the filters js. and also the module in sp tv template js file. -- to s done
if(window.document.splugins.common.is_item_page || window.document.splugins.common.is_category_page) {

    splugins._ = _;    //   underscore js 
}
 
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
 
 window.document.splugins.common._o = function(object, property) {
 
     return Object.prototype.hasOwnProperty.call(object, property);
    
 }
 
 window.document.splugins.common._b = function(binding_stats, event, key) {
     
     // console.log("_b called");
     // console.log(binding_stats );

     binding_stats[event] = binding_stats[event]  || {};

     // console.log('[binding_stats]');
     // console.log(window.document.splugins.common._o(binding_stats[event], key));
     // console.log(binding_stats[event]);
     // console.log(key);

    
     if( !window.document.splugins.common._o(binding_stats[event], key) ){
    
     // console.log("_b called if");

          binding_stats[event][key] = true;
          return false;
 
     }
 
     return true;
 
 }  

 window.document.splugins.common.is_empty = function(val) {
    
    return (val == undefined || val == null || val.length <= 0) ? true : false;
 }

 window.document.splugins.common.find_get_parameter = function(parameterName) {
    
    var result = null,
        tmp = [];
    location.search
        .substr(1)
        .split("&")
        .forEach(function (item) {
            tmp = item.split("=");
            if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
        });

    return result;
 }

 // reference: https://stackoverflow.com/a/175787
 window.document.splugins.common.isNumeric = function(str) {
    
    // if (typeof str != "string") return false; // we only process strings!  
    return !isNaN(str) && // use type coercion to parse the _entirety_ of the string (`parseFloat` alone does not do this)...
     !isNaN(parseFloat(str)); // ...and ensure strings of whitespace fail
 }

 var images = [];
 window.document.splugins.common.preload_images = function(src) {
    
    console.log('window.document.splugins.common.preload_images');
    console.log(src);

    // for (var i = 0; i < arguments.length; i++) {
        var image/*s[i]*/ = new Image();
        image/*s[i]*/.src = /*preload.arguments[i]*/src;

    // }
    
    images.push(image);
 }

/**
 * http://stackoverflow.com/a/10997390/11236
 */ 
 window.document.splugins.common.updateURLParameter = function(url, param, paramVal){
    // console.log('updateURLParameter()');
    var TheAnchor = null;
    var newAdditionalURL = "";
    var tempArray = url.split("?");
    var baseURL = tempArray[0];
    var additionalURL = tempArray[1];
    var temp = "";

    if (additionalURL) 
    {
        var tmpAnchor = additionalURL.split("#");
        var TheParams = tmpAnchor[0];
            TheAnchor = tmpAnchor[1];
        if(TheAnchor)
            additionalURL = TheParams;

        tempArray = additionalURL.split("&");

        for (var i=0; i<tempArray.length; i++)
        {
            if(tempArray[i].split('=')[0] != param)
            {
                newAdditionalURL += temp + tempArray[i];
                temp = "&";
            }
        }        
    }
    else
    {
        var tmpAnchor = baseURL.split("#");
        var TheParams = tmpAnchor[0];
            TheAnchor  = tmpAnchor[1];

        if(TheParams)
            baseURL = TheParams;
    }

    if(TheAnchor)
        paramVal += "#" + TheAnchor;

    var rows_txt = temp + "" + param + "=" + paramVal;
    return baseURL + "?" + newAdditionalURL + rows_txt;
 } 

 window.document.splugins.common.get_variation_url_part = function(variation_id, base_url) {

    var attributes = [];        

    jQuery(jQuery('.variations_form').find('table.variations select')).each(function() {
        
        var value = jQuery(this).val();
        if (value) {
            attributes.push({
                id: jQuery(this).attr('name'),
                value: value
            });
        }/* else {
            allAttributesSet = false;
        }*/
    });

    var url = base_url;

    var attributeSlug_global = '';
    jQuery.each(attributes,function(key, val) {
        
        var attributeSlug = val.id.replace('attribute_',''); //val.id.replace('attribute_pa_','');
        // url += '&_attribute=' + attributeSlug + '&checklist_' + attributeSlug + "=" + val.value;
        attributeSlug_global += ',' + attributeSlug;
        url = window.document.splugins.common.updateURLParameter(url, 'checklist_' + attributeSlug, val.value);
    });

    url = window.document.splugins.common.updateURLParameter(url, '_attribute', attributeSlug_global);

    return url;

 }

 window.document.splugins.common.get_device_visible_screen_height_width = function() {
    
    // Visible Height
    var visibleHeight = window.innerHeight || document.documentElement.clientHeight;

    // Visible Width
    var visibleWidth = window.innerWidth || document.documentElement.clientWidth;  
    
    return {
        // width: jQuery(window).width(),
        // height: jQuery(window).height(),
        width: visibleWidth,
        height: visibleHeight,

    };
 } 

 window.document.splugins.common.load_script_url = function(url,is_show_loading,callback) {
 
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = false;
    s.src = url;

    // s.onload = callback;

    var x = document.getElementsByTagName('head')[0];
    x.appendChild(s);

 }

 window.document.splugins.common.load_css_url = function(url,is_show_loading,callback) {
 
    var l = document.createElement('link');
    l.rel = 'stylesheet';
    l.type = 'text/css';
    // l.async = false;
    l.href = url;

    // l.onload = l.onreadystatechange = callback;

    var x = document.getElementsByTagName('head')[0];
    x.appendChild(l);
 }

/*ACTIVE_TODO_OC_START
var newURL = updateURLParameter(window.location.href, 'locId', 'newLoc');
newURL = updateURLParameter(newURL, 'resId', 'newResId');

window.history.replaceState('', '', updateURLParameter(window.location.href, "param", "value"));
ACTIVE_TODO_OC_END*/
 
 //  TODO publish defs from here of the any design pattern that we define to be used as common patter like design pattern of the wbc.filters module 
     //  below the observer design pattern implemented for Feed.events act as one of published defs
 
 
 
 //  Feed 
 window.document.splugins.Feed = window.document.splugins.Feed || {};

 //  single product 
 window.document.splugins.single_product = window.document.splugins.single_product || {};

 
 
 
 //  (Feed.) events 
 //  the feeling comes in the mind is it may become overloaded if we create such a broad class like Feed where Feed page can contain many features, events and so on. but there is absolute need of one central observer pattern which let subscribe to any subject(feature) and then later notify them when related event occurs. the need is of central observer and notifier but nothing beyond that so it will be very light and almost like a namespace holding diferent fetures. and in essense Feed will be collection of different subject(feature) where each subject is itself a observer pattern. 
     //  it is supposed to hold the collection of features like pagination, filters, feed render, sorting and so on but yeah its only job is to listen to events and notify to their subscribers. 
     //  NOTE: whenever if any requirements comes up of supporting the jquery events based on their trigger/on api functions then that can as usual be supported internally, all that is needed is is register subject with one additional param that is event_core_backend=jQuery. -- and on this regard the syntax can also bring as much closer as possible to that of jQuery syntax but yeah we will need atleast something like sp_e or so just like _ underscore js have _ in there for everything. -- a potential TODO
     //  NOTE: and regarding our syntax of exporting and consuming the modules, if we ever feel the need to instead export it is as _jQueryInterface, and then consume as per the _jQueryInterface standard, then we can export our modules as per that flow also. and it seems that we would need little refactoring but not a lot and on this regard in each modules like in the swatches and gallery_images module below we have the provision for the _base_container which is assumed to be conterpart of the base selector in the _jQueryInterface style standards. -- a potential TODO
 window.document.splugins.events = window.document.splugins.events || {};
 
 window.document.splugins.events.subject = window.document.splugins.events.subject || {};
 
 window.document.splugins.events.subject.core = function( feature_unique_key, notifications ) {

    var _this = this;

     _this.feature_unique_key = feature_unique_key;
     _this.notifications = notifications;     // [];    //  list of notifications it can notify for.  
     _this.observers = [];


     return {
         feature_unique_key: function() {
     
             return _this.feature_unique_key;
         },    
         subscribeObserver: function(observer) {
             // ACTIVE_TODO here check the callbacks of observer first and if this subject is not supporting the notifications for particular callback then simply throw error and do not subscriber the observer 
     
             _this.observers.push(observer);

             return observer;
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
         notifyAllObservers: function(notification, stat_object, notification_response) {
             for(var i = 0; i < _this.observers.length; i++){
                 _this.observers[i].notify(i, notification, stat_object, notification_response);
             };
         },
         get_observer: function(subscriber_key) {
            
            var found_index = null;
            for(var i = 0; i < _this.observers.length; i++){
               if( _this.observers[i].subscriber_key() == subscriber_key ) {

                    found_index = i;
                    break;
                }
            }

            if( found_index == -1 ) {

                return null;
            } else {

                return _this.observers[found_index];
            }
         }
     };
 };
 
 // NOTE: below statement will not have any use since we need to export separate modules for each subujects, it is necesary for cleanlieness. and same is applicable for other modules of events namespace like observer and so on. 
 //  publish it 
 window.document.splugins.events.subject.api = window.document.splugins.events.subject.core( {} );
 
 window.document.splugins.events.observer = window.document.splugins.events.observer || {};
 
 window.document.splugins.events.observer.core = function(subscriber_key) {

    var _this = this;

    _this.subscriber_key = subscriber_key; 
    _this.callbacks = {};     // [];    //  list of notifications callbacks it waits for. 
 
    return {
        subscriber_key: function() {
     
            return _this.subscriber_key;
        },  
        notify: function(index, notification, stat_object, notification_response) {
            // console.log("Observer " + index + " is notified!");
 
            // TODO check if observer listens to this notification and if not then return with false
            // var index = this.observers.indexOf(observer);
            // if(index > -1) {
            // this.observers.splice(index, 1);
            // }

            if(window.document.splugins.common._o( _this.callbacks, notification)){

                _this.callbacks[notification](stat_object, notification_response);
            }
        },
        subscribe_notification: function(notification, callback) {
            
            _this.callbacks[notification] = callback;
        },
        unsubscribe_notification: function(notification, callback) {
            
            // TODO implement
        }

    }
 }
 
 //  publish it 
 window.document.splugins.events.observer.api = window.document.splugins.events.observer.core( {} );
 
 window.document.splugins.events.core = function( configs ) {
 
     var _this = this; 
 
     _this.configs = jQuery.extend({}, {}/*default configs*/, configs);  

     _this.subjects = [];

     var init_private = function(){

        events_host_node();

     };

     var get_events_host_node = function($selector) {

        if( $selector != null ){

            return $selector;
        } else {

            return _this.$events_host_node;
        }
     };

     var events_host_node = function() {

        _this.$events_host_node = jQuery('<div />').appendTo('body');
        _this.$events_host_node.attr('id', 'splugins_events_host_node');  

     };

     var event_key = function(feature_unique_key, notification_key) {

        return 'splugins.events.'+feature_unique_key+'.'+notification_key;
     };
 
     return {
        
         createSubject: function( feature_unique_key, notifications ) {

            if(window.document.splugins.common._o( _this.configs, 'events_backend') && _this.configs.events_backend == 'jquery' ) {



            } else {
                 // console.log("Observer " + index + " is notified!");
     
                 // TODO check if subject already created and exist then throw error
                 // var index = this.observers.indexOf(observer);
                 // if(index > -1) {
                 // this.observers.splice(index, 1);
                 // }
     
                 _this.subjects.push( window.document.splugins.events.subject.core( feature_unique_key, notifications ) );
             }
         },
         
         subscribeObserver: function(feature_unique_key, subscriber_key, notification_key, callback, $selector = null) {

            if(window.document.splugins.common._o( _this.configs, 'events_backend') && _this.configs.events_backend == 'jquery' ) {

                jQuery(/*_this.$events_host_node*/ get_events_host_node($selector)).on(event_key(feature_unique_key, notification_key), callback);

            } else {

                 // console.log("Observer " + index + " is notified!");
     
                 // before subscribing the ovserver check if the feature_unique_key subject is created in the first place, if not then throw error 
                 var found_index = null;
                 for(var i = 0; i < _this.subjects.length; i++){
                     if( _this.subjects[i].feature_unique_key() == feature_unique_key ) {
     
                         found_index = i;
                         break;
                     }
                 }

                 if( found_index == null || found_index == -1 ) {
     
                     throw "There is no subject exist for specified feature_unique_key "+feature_unique_key;

                 } else {

                    console.log('found_index '+found_index);
                    console.log('found_index_subject '+_this.subjects[found_index]);

                    
                    var observer = _this.subjects[found_index].get_observer( subscriber_key );
                    
                    if(observer != null) {

                        observer = _this.subjects[found_index].subscribeObserver( observer );

                    } else {

                        observer = _this.subjects[found_index].subscribeObserver( window.document.splugins.events.observer.core( subscriber_key ) );

                    }

                    observer.subscribe_notification(notification_key, callback);
                 }
             }
         },
         
         unsubscribe_observer: function(feature_unique_key, subscriber_key, notification_key, callback = null) {

            if(window.document.splugins.common._o( _this.configs, 'events_backend') && _this.configs.events_backend == 'jquery' ) {

                jQuery(_this.$events_host_node).off(event_key(feature_unique_key, notification_key), callback);

            } else {

                 // console.log("Observer " + index + " is notified!");
     
                 // before subscribing the ovserver check if the feature_unique_key subject is created in the first place, if not then throw error 
                 var found_index = null;
                 for(var i = 0; i < _this.subjects.length; i++){
                     if( _this.subjects[i].feature_unique_key() == feature_unique_key ) {
     
                         found_index = i;
                         break;
                     }
                 }

                 if( found_index == null || found_index == -1 ) {
     
                     throw "There is no subject exist for specified feature_unique_key "+feature_unique_key;

                 } else {

                    console.log('found_index '+found_index);
                    console.log('found_index_subject '+_this.subjects[found_index]);

                    
                    var observer = _this.subjects[found_index].get_observer( subscriber_key );
                    
                    if(observer != null) {

                        observer = _this.subjects[found_index].unsubscribeObserver( observer );

                    } else {

                        observer = _this.subjects[found_index].unsubscribeObserver( window.document.splugins.events.observer.core( subscriber_key ) );

                    }

                    observer.unsubscribe_notification(notification_key, callback);
                 }
             }
         },
         notifyAllObservers: function(feature_unique_key, notification_key, stat_object=null, notification_response=null, $selector = null ) {
            
            if(window.document.splugins.common._o( _this.configs, 'events_backend') && _this.configs.events_backend == 'jquery' ) {

                stat_object = stat_object || {};
                stat_object.event_key = event_key(feature_unique_key, notification_key);

                jQuery(/*_this.$events_host_node*/ get_events_host_node($selector) ).trigger(stat_object.event_key, [stat_object, notification_response]);

            } else {

                 // NOTE: now the events module will officially support one way callback on the notification that is recieved by subscriber. and also the one more stat_object var. and the callback is strictly one way only and there is no plan to extend it further. and even if it is required for any flow then the base flow and architecture should be refactored to achieve that which will ensure simple and clean flow, and if extend callback flow further then it would help achieve high dynamics but would also lead to unnecessarily complex, sensitive to regression effects and the messy architecture resulting in many long debug sessions also. so instead in such cases js modules should refine there architecture a little as needed and simply publish public function under their api which would do the job. and if even by any chance we required to do this then it must be confirmed with the expertly designed architectures and design patterns which confirms that more level of callbacks would be fine and not lead to complex or messy flows or race conditions if followed certain standards. -- and on a side note one can make use of stat_object and some additional mechanisam to implement back and forth callbacks but as usual since we are not supporting the callbacks officially similarly we neither intend to implement or approve any such flow. so that should not be done in the first place. 
     
                 // console.log("Observer " + index + " is notified!");
     
                 // check if the feature_unique_key subject is created in the first place, if not then throw error 
                 var found_index = null;
                 for(var i = 0; i < _this.subjects.length; i++){
                     if( _this.subjects[i].feature_unique_key() == feature_unique_key ) {
     
                         found_index = i;
                         break;
                     }
                 }
     
                 if( found_index == -1 ) {
     
                     throw "There is no subject exist for specified feature_unique_key "+feature_unique_key;
                 } else {
     
                     _this.subjects[found_index].notifyAllObservers( notification_key, stat_object, notification_response );
                 }
             }
         },
         subscribe_observer_filter: function(feature_unique_key, subscriber_key, notification_key, callback) {

            if(window.document.splugins.common._o( _this.configs, 'events_backend') && _this.configs.events_backend == 'jquery' ) {

                jQuery(_this.$events_host_node).on(event_key(feature_unique_key, notification_key), callback);

            } else {

            }

         },
         
         unsubscribe_observer_filter: function(feature_unique_key, subscriber_key, notification_key, callback = null) {

            if(window.document.splugins.common._o( _this.configs, 'events_backend') && _this.configs.events_backend == 'jquery' ) {

                jQuery(_this.$events_host_node).off(event_key(feature_unique_key, notification_key), callback);

            } else {

            }

         },
         apply_all_observer_filters: function(feature_unique_key, notification_key, stat_object=null, notification_response=null) {

            if(window.document.splugins.common._o( _this.configs, 'events_backend') && _this.configs.events_backend == 'jquery' ) {

                stat_object = stat_object || {};
                stat_object.event_key = event_key(feature_unique_key, notification_key);

                return jQuery(_this.$events_host_node).triggerHandler(stat_object.event_key, [stat_object, notification_response]);

            } else {

            }

         },
         init: function() {

            init_private();

         }
 
     }
 }
 
 
 //  publish it 
 window.document.splugins.events.api = window.document.splugins.events.core( {events_backend:'jquery'} );
 window.document.splugins.events.api.init();

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
                
            wp = (window || root || global || GLOBAL || this || self || {wp: undefined}).wp;
            return wp.template( tmpl_id );  
         }
     };
 
     var apply_data = function( template, template_data, templating_lib ) {
        

         // template_data = {gallery_thumbnail_src:'http://54.162.191.228/staging/wp-content/uploads/2022/07/r-a-2-100x100.jpg'};
         // console.log("template");
         // console.log(template);
         // console.log("template_data");
         // console.log(template_data);

         if( templating_lib == 'wp' ) {
 
             return template( template_data );   
         }
     };
 
     //  so far the templates are set from the server layers so no need to set it from here so far  
     var set_template = function( tmpl_id, template_content, templating_lib ) {
 
         //  TODO implement 
     };
 
     var is_template_exists_private = function( tmpl_id, templating_lib ) {
 
         //  TODO need to upgrade logic if below condition is not relible 
         if(jQuery('#tmpl-'+tmpl_id).length > 0) {
            
            return true;
         } else{
           
            return false;
         }
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
         },
         is_template_exists: function( tmpl_id, templating_lib ) {
 
             return is_template_exists_private( tmpl_id, templating_lib ); 
         }
 
     };
 };
 
 //  publish it 
 window.document.splugins.templating.api = window.document.splugins.templating.core( {}/*if required then the php layer configs can be set here by using the js vars defined from the php layer*/ );

 // port it to access it easily
 splugins.tmpl_lib = window.document.splugins.templating.api; 
 
 ///////////// -- 15-06-2022 -- @drashti -- ///////////////////////////////
 
 //  compatability 
 window.document.splugins.compatability = window.document.splugins.compatability || {};
 
 window.document.splugins.compatability.core = function(configs) {

    var _this = this;

     _this.configs = jQuery.extend({}, {}/*default configs*/, configs);   
 
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
class SP_WBC_Variations extends SP_WBC {

    constructor(element, configs) {
        
        // Calling parent's constructor
        super(element, configs);
        
    }
}
window.document.splugins.wbc.variations = window.document.splugins.wbc.variations || {};
 
 // ACTIVE_TODO_OC_START
 // //  TODO right now variations swatches and gallery images are managed through their own js modules and so far there is no need of the central variations core js module, but whenver required we need to create one. 
 //     have d move to asana, the all below open comments and other comments. for reference keep some part here. and then replace this line only with "moved to asana"
     
 //     things supposed to be managed by the sp_variations 
 //         -   data 
 //             --  attributes 
 //                 --  (input) types like dropdown, button, image swatches and so on 
 //                     --  ACTIVE_TODO so do we need to host any additional events beyond basics done, maybe not but still need to confirm, before launching the beta. so test all widget input types that we support on wbc free version -- to d and -- to h 
 //                 // --  attribute options/terms 
 //                 //     --  properties of options/terms like if out of stock 
 //                 //         --  it maybe already coming in that variable-items-wrapper dump, if not then we need to dump it from there -- to b 
 //             // --  extract product_variations and assign in our main data var -- to d 
 //             --  gallery_images  
 //                 --  images 
 //                 --  videos 
 //                         --  video can be served using custom_html also but maybe its own specific type for video is necessary? need to decide on it -- to h 
 //                 --  custom_html 
 //                 --  NOTE: since the data in case gallery_images module will be comming from the variation events in the variation etc. event args so nothing needed to be assigned in our main data var. 
 //                         // --  and like for swatches if required then need to dump the data in images container dom element, like for swatches it is on variable-items-wrapper element dom -- to h and -- to b done
 //                                // --  need to finalize now the process_images_template function and see if we fall short there of any data. so lets just finalize the data and everything there -- to a done
 //                             // --  check if that plugin we were exploring does have, but either way we will do only if it is necessary for us on the js layer -- to b done
 //                                 --  all this data would be available in the variation_gallery_images var of the variation -- to h 
 //         -   template 
 //             // --  will vary based on attribute types, extensions and some other feature related conditions also 
 //             //     --  but to simplify it we can simply depend on template_type or if required then in specific scenarios on the particular template_key 
 //             //         --  maybe adding anything else is unnecessary, and the attribute_types for swatches and gallery_item_type for the gallery_images is enough. so adding anything additional would make it unnecessarily complex. and either way both attribute_types and the gallery_item_type does conncets to the templates. so nothing to do here. 
 //                         // --  however need to ensure that gallery_item_type support is in place -- to h 
 //                         //     --  on the backend legacy admin form we may already have type field which would be used as this -- to b 
 //                         //     --  and on js layers put appropriate conditions at needed layers -- to d 
 //                         //     --  and the name/key gallery_item_type may change, so lets just use the right one only -- to d and -- to b 
 //                                 --  lets simply name it type but within that e params that we thought of -- to h 
 //                                     --  and if this type param is detected then even though still the image or video base type is resepcted on applicable layers to achieve optimum reusability like we envision for the swatches module with base_type field, but the responsibility of managing templates will be on their applicable layers of extensions and they would either repond with template or just replace there on their layers -- to h 
 //                                                --  now during implementation of the vwsz, after a through thought and study it feels that instead of implementing the base_type support further or even the idea of using the base types independently(and implement the template of vwsz using the attribute condition and publish 1-2 more hook from wbc for rendering template) felt unnecessary because with the first idea we had to invent some new structures or atleast ensure some necessary conditions while with the second the situation is similar where new strtucre and flow would be required. so instead just mimic the base type(now actually the flow of vwds) flow and so duplicated some few lines of template code. the reason was simple that we can simply reuse the same fundamental struycture and no need to implement and test new strctures but yeah some additional code will be required to implement the vwsz slider but that will its unique and standard. - but later we may like to try the either of the two ideas but anyway as of now it felt unnecessary and maybe in future also it may feel unnecessary. -- to h 
 //                                         --  so for this need to work out that now that js tempalte hook let the extensions to create and dump their own tempalte and manage simply on their end, this hook simply need to give that ability when above additional type is detected -- to b or -- to s or -- to a 
 //                                                -- the hook and tamplate neet to be at index leval  -- to a 
 //                                         --  and also need to publish configs accordingly for applicable extensions, and on this note publish configs of all extensions -- to s or -- to a 
 //                                             // --  and the applicable extensions will hold their own template var under configs and the template id in it -- to s or -- to a INVALID
 //                                                --  and like the types var is to be prepaired for gallery_images module, same way on gallery_images bound extensions prepare types there also -- to a 
 //                                                    --  which will be used for implementing if conditions on notifications -- to a 
 //             // --  we will also need to interact (mainly create) the slider and zoom tempaltes 
 //             //     --  the main requirement will be making/creating template dynamic using the image array and so on data 
 //             //         --  it will almost only on php side 
 //             //             --  and what we could do is do it using the hooks in our slider and zoom modules php layers 
 //             //             --  so even our internal slider and zoom js/jquery plugins tempaltes will also be made dynamic using this hooks 
 //             //             --  so that these hooks become publish ready when we decide to publish the hooks and js api for slider and zoom -- and as planned in one of the option of our four option offering for the gallery_images slider and zoom, that we look forward to try supporting the external zoom and slider with our planned level of efforts, we can (and should) provide service to make the slider and zoom template dynamic using our data by implementing those hooks when those plugins are enabled.  
 //                             // --  ACTIVE_TODO when we decide to actually publish php hooks and js api for slider and zoom, based on user demand as mentioned below, then at that above planned php hooks will also be published 
 //             // --  since we need to manage the slider and js templating dynamically on the slider and zoom layers 
 //             //     --  so gallery_images module will have template related functions that the form builder js module have, so create those functions -- to d or -- to a done
 
 //                 // --  ACTIVE_TODO and yeah in gallery_images module we will need one more object namely template_data so create that under data object that is created -- to d or -- to a  
 //                 //     --  ACTIVE_TODO if data object is not created then create that in gallery_images module also -- to d or -- to a  
 
 //                 //     -- Above two points might not be necessary so check if form builder module had any flow that requires it otherwise just keep it on hold. and mark above two and these as ACTIVE_TODO and then we would remove it after 1st revision -- to d and -- to h or -- to a  
 
 //                 --  and t we need to make sure that our slider and zoom assets are lighter so make sure that they are loading only needed things and are difinitely the minified versions only 
 //                     --  first confirm if they are loading on the right place like from footer hook and so on, and are also loading once only of course -- to t 
 //                     --  second make sure that only minified versions are loading and if they are not minified then minify them and load that only -- to t 
 //                     --  third also make sure that desktop assets only are loading for desktop and the mobile assets only are loading for the mobile -- to t 
 //             --  react tempaltes -- we will going to one alternate widgets set of templates which would be based on react framework 
 //                 --  what if same data which is coming from model and passed to load view is given to react as json, maybe that is the option, and our layers on php data layer and tempalting layer does match with templating layer of the react so just replace the php templating layer with react. need to confim if this is the flow we should do and yeah it is not close enough to our plan of reusability and even using executable instructions that is mentioned there in that ssm class notes -- to h 
 //                     --  and even if above is confirmed still in that case also we would like to continue using (and we must do it for reusability and above all we can not manage two application layers) the same js modules of particular extensions (which is rendering react widget instead of regular widgets) as the application layer specifically one which is managing events and application stat and logical insteractions(so not the UI level events, stat or logical interactions that would still be handled by react only). but is possible, confirm with t -- to h. 
 //             --  what about zoom dom loop template, just create one and replace inside or create all and hide/show? the later is clean and would require less maintainance so should do that. -- to h or -- to a . related tasks are in the events section below. 
 //                     --  and in case some zoom must need only one tempalte then we can simply enable that setting using a hook for zoom core layers and php and publish that under the configsfor variations gallery_images and swatches as well.  or -- to a 
 //                         --  on js layer such configs we can keep on common parent later of the variations js module itself. ACTIVE_TODO/TODO 
 //                            // --  for now that is just needed on the gallery_images layer, so lets just use there or -- to a done
 //            --  selected option template for swatches
 //                --  research on the woo standards for it -- to h 
 //                    there is that selected variation template that m also has implemented on js layers which is now in variations.assets.php, however it is not related to selected option template. 
 //                    --  search related or alternatives of the selected variation template and we may find something -- to s 
 //                    --  and once we confirm flow we need to have each type providing their own tempalte selected item(maybe in community instead of option it is called selected item so lets just use that name only) template -- to s 
 //                        --  and the extension types should also provide the templates for it -- to s 
 //                        --  and it will always be loaded from the loop base file -- to s 
 //                            --  (now its better to rename that templates to wrapper(we already named it ribbon wrapper so that is fine), the second would be variable-item-loop and third would be variable-item-loop-content), but still lets keep it as ACTIVE_TODO since there are many other priorities -- to s 

 //                    --  we will simply follow the flow of plugin we are exploring and extend it where necessary 
 //                        --  so firstly set the default template in the js var that is there in the module -- to s 
 //                        --  and whichever type want to provide their own template then they will simply dump js template, with id format of spui-wbc-swatches-{type}-selected-item-name(here if required then confirm if selected-item-name is what the template is called) -- to s 
 //                            --  here there will be one concern that none the type can dump this template directly, so we may need additional hook. but hooks for such things and developing such flows would add up in overall time needed in development and maintainance, in maintainance also because then for any new templates of new or existing types must find our this all flow and do the development. so we simply need to create additional script node in ui-array and if script tag is not supported in ui array then simply add support for that since the preHtml will not work since sooner or later users would be needing to customize the apprearance of this tiny templates as well. -- to s or -- to b. here the script node will be attached to wrapper template from wrapper template file. 
 //                        --  and if any type do not want to show even the default template then they can specify data flag in their wrapper node element like data-no-selected-item-name=true -- to s 
 //                        --  and if any extensions want to show the selected-item-name at specific location then they should handle it on their own, so in this case extensions should still dump the js templates but then from their own js module they should manage updating template in their container. and for this we can simply set standard format for container id like spui-wbc-swatches-{type}-selected-item-name-container. -- to s. we must let this flow handling to extensions only since otherwise the free base modules will be unnecessarily messy and complex. 
 //                            --  and so extensions in this case will be interested in variation change and/or variable-item click event, so we simply need to add support for that notification since sooner or later this notification will going to be needed -- to s 
 //                            --  and since the variation asset file and js module for ssm module is already planned, lets just implement there so that we do not need to do duplicate code in all three extensions. so simply create variation file, load and init js module as if it is just another extension and we already have the single product model on ssm so just need to confirm if render_ui of it is called. -- to s 
 //                                -- but yeah above loading sequence should be once only no matter how many extensions call it. -- to s. wp has enqueue script which take care of it but since we have php asset so maybe the constant is what we could do if there is nothing else that we can find. 
 //            --  the very swatches templates 
 //                --  it seems that we have no other option but to do the ui/li based templates very soon, because otherwise with other elements we need to avoid many other nodes by means of updating selectors and so on. so it is better we simply add ul/li layers and simply stick to that since that is standard. 
 //                        --  but we should confirm once if we actually need to do it, and it will not be so challanging. but if we want to do then we should do asap otherwise we will waste time firstly in managing the div other such nodes. 
 //                    --  so if we confirm to do then t please convert all templates of wbc and extension to ul/li -- to t 
 //                        --  I think for wbc you can not change any node since that is semantic ui but you can simply add the ul/li in there -- to t 
 //                    --  and once that is done we need to update the ui array -- to s 
 //                        --  and together with that just move the classes to the ul/li only, so you only should do this task -- to s 
 //         -   pages 
 //             // -- category page 
 //             // -- item page 
 //             // --- like we implicitly assumed for the devices and so on layers, that there will be flgas like is_mobile, is_tablet that will be used throughout this variations js modules and the other layers interacting with it, similar way we can have the flgas for this pages layers also. like is_category_page and is_item_page. 
 //             //         -- create above two flags under ..splugins.common namespace, in js.vars.asset.php so no need to pass those as configs here when this module initiated -- to d done
 //                 --  but yeah since the pages is a significant and major layer so at some place we may like dedicated functions and there would be like some flows will require dedicated functions for the item page while some flows will require dedicated functions for the category page 
 //                     --  also see function process_pages of the swatches module below. 

 //                --  need to research woo standards and community plugins for the swatches on category page -- to h and -- to s 
 //                    --  first of all list all standard woo flows that are popular and approachable -- to s 
 //                    --  then check the popular community plugins that provides it -- to s 
 //                        --  and then we need to plan the flow of our data mode, feed controll and model, and load_view/getUI/get_ui_definition (classes) and functions heirarchy about how we will going to implement it there on backend layers -- to s 
 //                        --  and also need to plan the js layers flow parellaly to be precise on overall architecture -- to s 
 //                    --  also check once that theme flows to confirm about what will go in wbc and what will in extensions -- to h and -- to s 
 //                    --  if we do not find any standard and mature flow then we can simply flow the same acrhictetucre that is there for the item pages, and for absense of all the variation and swatches hooks, we can simply host/implement our own counter part hooks for the category page and then fire those hooks from right execution sequence and place.  
 //                        --  I think WooCommerce must have atleast sopme variations layers on the shop/category page 
 //                            --  so lets make use of whatever is available by woo and other such standards, like atleast dropdown options might be available. if that is available then lets set that as default. -- to s 
 //                            --  and for the rest we may need to implement our flow but in that closest possible to as if woo had did then how would it so that we put in place the optimum possible reusability, extendability and maintainability in terms of the overall architecture. 

 //                            --  check if WooCommerce have any kind of (dropdown or any other) variation option selection feature or if any free plugins on wordpress.org does provide it. note that we do research only in plugins or themes available on wordpress.org since they are gpl only. -- to s 
 //                                    --  alreaedy found https://wordpress.org/plugins/display-product-variations-dropdown-on-shop-page/ so check if there is anything additional. 
 //                                --  and if there is no support for variations then still we can make use of the quick view flow to implement our flow and quick view must have the variation flow atleast in ajax if not otherwise. but yeah in this case we must implement our flow in wbc due to licence compliance. -- to h and -- to s 
 //                                    --  setup and see if the variations form is coming in quick view popup on this plugin https://wordpress.org/plugins/quick-view-woocommerce/ -- to s. ask d to do so if required. 

 //                        --  and yeah we most likely need to provide the ajax support, means by default the select optons would not load anything and on click loader show up which would load the options to choose from for particular attribute variable-items-wrapper -- to s 
 //                            --  but yeah we may like to implement this feature on non wbc layers means on the pro layers, so in this case we may like to provide option on admin to upgrade to pro -- to s ACTIVE_TODO 
 //                                --  anyway implement above option later when required but for now the implementation will most likely be on the non wbc layers. so do we need one more variations assets file in the ssm module of variations and one more js module in that file? -- to s. is this the right and only option? this js module by the way can do its all job by simply subscribing to notification and provide this additional feature. 
 //         -   slider and zoom 
 //             --  it will mostly be matter of interest to the variations.gallery_images module but since it is vital for overall stability of functions and the overall experience that is why it is considered as a dedicated thing 
 //             --  its events -- it may directly or indirectly connect itself to the below events layer mentioned 
 //                 --  it should always be indirectly, and a mature abstraction should be ensured always otherwise our task of providing the php and js api for external and zoom and slider would become challanging 
 //             --  events it listens to simply the events that it mandatorily expects and the events that is optional for it but accepts 
 //                        --  here we need to confirm if the slider thumb click listener is well set here, with our own slider container class we need to set the click listener. and there will be no dependancy on external slider since we have the container class -- to a 
 //                            // --  for now set the container class hardcoded -- to a INVALID
 //                                --  ACTIVE_TODO but very soon we need to provide it through configs, so on php layer on model there need to have one static function which would provide class to both hook and js layer configs -- to s 
 //                            --  and on click we need to update the zoom template based on the zoom template settings, means whether if that is one template dom(and update dom each time using js template) or is it the all template dom(and just hide the all zoom dom images first and then show the (current) index image) -- to a 
 //                 --  based on these we can easily define what our hooks (php layer) and js api that we are to provide for slider and zoom would look like or how it will be composed 
 //             // --  media 
 //             //     --  images 
 //             //     --  in addition to images other things that it may need to support are videos and custom html 
 
 //             --  configurations 
 //                 --  regarding configurations we would like to find out the way to use the legacy zoom optons settings provided maybe, first confirm if its actually legacy -- to h 
 //                                       var zoom_options = $.extend({
 //                     touch: false
 //                   }, wc_single_product_params.zoom_options);
 //                     --  and if it is legacy then first need to confirm if it has any use for other zoom plugins, or is it useful only when the legacy zoom theme support is enabled? -- to h 
 //                         --  that will most likely be the case, but in that case is it better idea to make the legacy zoom, lightbox, slider theme suppoort as default slider and zoom implementation? it may seems like that so in that case we must do it and asap -- to h 
 //                                --  ACTIVE_TODO what we can do is provide lite box as default and slick themes slider and zoom as alternate option providing advanced ui/ux experience
 //                             --  however note that lightbox seems to be specific only to the photo swipe and so on feature in the plugin we were exploring -- to h 
 //         -   events 
 //                 --  mouse events 
 //                 --  keyboard events 
 //                 --  legacy events (events of woo emitted on certain scenarios) 
 //                 --  events emitted by other plugins/themes which we need to take care of in case of compatiblity matters, so it can be termed as the compatiblity events 
 //                 --  just for the comments, it seems that as long as any external slider and zoom plugin is providing the key js events like that slider_thumb_click and zoom_area_hover and on php side with above flows we are almost covering the 70-80% of basics requirement to host external slider and zoom dynamically 
 //                     --  maybe we all we need to do is have our main container classes emitting through the base configs of particular modules -- to b 
 //                         --  then bind events here based on that class, so maybe dependancy on slider and zoom js/jQuery plugins is not necessary -- to h or -- to a   
 //                             --  yeah but some jquery plugins might be preventing the events from reaching to their parent elements so in such cases we need to handle the exceptional scenarios by depending on the slider/zoom plugin to provide that event api or we may have still some other work around or compatiblity layers would help if we add there section for handling compatiblity for these required events and then if we put patches for specific slider/zoom or theme or mix of both then that will work. -- and last sort would be to depend on the external slider/zoom to provide the event API -- to h ACTIVE_TODO or would be on going TODO 
 //                             --  and in case when the only option that is left is to depend on the external slider/zoom jquery plugin does provide the api then in that case out gallery_images and swatches module should publish public functions under ...api namely on_click and on_hover functions which directly call the internal private functions of click and hover etc events. so in this case the listener fucntions would not be in picture and the external plugins api should be connected directly to private functions and that would achieve clean flow. -- to h ACTIVE_TODO 
 //                                 --  and the flow for making this connection between the external plugin api and our modules published api namespace would be provided by maube a dedicated module that will provide the very planned js api for external slider/zoom plugins. -- to h ACTIVE_TODO 
 //                                     --  so we may like to create one such module when we do implementation to provide api for external slider/zoom plugins. -- to h ACTIVE_TODO  
 //                         --  and on that regard the fundamental job of the slider thumb click listener is to replace the zoom are container dom with whatever the particular related zoom template at that index provide -- to h or -- to a  
 //                             --  and the fundamental job of the hover event of the zoom area is nothing as of now, since even the extensions handle their own business logic -- to hv. so we can let the function be there and bind only when there is requirement. 
 //                         --  and on that regard the fundamental job of the swatches change event is to 
 //                             // --  emit the necessary events based on the current attribute_types to be processed. so check what m had did in service class, and other extensions js -- to d 
 //                                // INVALID
 //                             --  and on this regard the base event of reset_all/reset has to emit the wc reset_variations but that must be handled by legacy layers so not sure why m did that but maybe it is raising reset event from our layers that is what m may have did in which case need to handle that -- to h or -- to a  
 //                             --  and on this regard when we clear the old js layers of wbc, service class and extensions then we will know many such things -- to h 
 //                                    --  basically it is covered but still confirm if anything is missed slider and zoom assets.php, and especially the 360 and darker lighter variation assets.php since there were code there which was actually of use to the wbc layers or -- to a 
 //                                        --  and same way swatches module should check for if anything is missed on the variations assets.php of wbc or -- to s 
 //                         // --  and on this regard gallery_images module also need to create listener function for variation change event and listen to that, and when that is detected -- to h or -- to a done
 //                                // --  do cover the sub tasks below also or -- to a done 
 //                             // --  then do erase the slider and zoom dom done
 //                                 // --  it may create blink and jump effects, so could we handle that using the effects and after effect management done
 //                                    // --  to be sure here and ensure neat flow check once how that other plugin we were exploring does updating the templates, means are they erasing and then appending or -- to a done
 //                                        // --  it just crossed the mind that they were actually updating the html so erase and append at once, but at there must be some resolve or other smoothing function calls which might be of interest to us or -- to a done
 //                             // --  then append new templates in the loop in both slider and zoom, there would be their own function and loop done

 //                                 // --  but is it good idea to do it from single function and single loop then so if certain conditions need to be managed then slider and zoom does work in sync by default without having to worry about anything INVALID
 //                             --  then need to refresh the slider and zoom, so here the external slider and zoom must be binding to api events so that they does refresh their plugin when the event is recieved -- to a 
 //                                    // --  from slider assets.php call the sp_slzm init_listener and refresh_listener and provide that the callbacks -- to a done
 //                                    //     --  and when the callaback function is called just init or refresh the slider using their particular api function call -- to a done

 //                                    //     --  and do both points above for the zoom assets.php -- to a  done
 //                                 // --  so here now maybe we need to simply publish the api with very few basics covered but atleast that would help start flow experimented and our default slider and zoom implementation can simply use that and that will help in experiment. so simply publish the api under .gallery_images.sp_slzm(confirm namespace on variations class).core and export it under ...api as usual. done
 //                                 // --  and for now just provide one public function refresh_listener and one private refresh_listener which would subscribe internally to the gallery_images notification done
 //                                        // --  here notification part not done, so subscribe that notification  or -- to a done 
 //                                            // --  and the notification will be raised from the process_images_template or so function which was called from last in the on_variation_change or -- to a done

 //                                     // --  and private function upon recieving the notification from the gallery_images module it would just call the callback function -- to h and -- to a done
 //                                     //     --  so the public refresh_listener function would accept the callback -- to h and -- to a  done 

 //                                    // --  do all four points above for the init_listener function also, but not sure from where the init notification will be raised from gallery_images module -- to a done 
 //                                    //     --  I think it should be raised from that process template function, from below that comment, and if any page load time events come there in future then that will be after that load time event handling. so briefly at last -- to a done

 //                                    // --  and name both private listener function as the refresh_listener_private and so on -- to a done
 //                                     --  ACTIVE_TODO in future though we may like to move the .gallery_images.sp_slzm module to separate asset file and separate it from our other noisy code of all js modules so that users find it clean also. 
 //                                         --  ACTIVE_TODO and definitely it is very basic approach with which we are going, but we would like to do research on how to build and publish api layers and api. and definitely we would like to do mature implementation from the initial versions. 
 
                                   
 //                     else if( not for example slider input is not supported then host the listener event so that extension js do its job or simply skip it and let extension js do their part )
 //                         // ACTIVE_TODO_OC_START
 //                         // --  and we can and should simply use observer pattern events to host for example the slider listener here and then emit internal change event from here     
 //                         //     --  still in this case the variation.swatches will register its event subject and emit bootstrap level notification like bootstrap/on.load maybe on.load is more user friendly 
 //                         //     --  then at that time applicable extension will bootstrap the js layer 
 //                         //     --  and when the change event occurs the applicable extension will simply call the ...swatches.api function to notify back about their change event or the events module can add support to provide callbacks to subscriber so that they can reply with something when they have done something based on notification. so it can be called the notification_response. -- but it will be about breaking our own rule of keeping the events simple. so even if we must do then in that case it must be till notification_response only and no further callback back and forth can be supported. otherwise it mostly lead to long debug sequences. --  however it has benefit of less maintainance since otherwise extensions need to know about the ...swatches.api but in case of events support of notification_response it only need to learn about and depend on the variations.swatches subject of events module. and as long as we can keep it limited to notification_response only and do not extend it further it will be clean to be frank. 
 
 //                         //     --  and we are planning to host darker/lighter slider support also from here as usual so it will be just like above slider example 
 //                         //        --  but yeah after the change event is recieved here that will be emitted to the gallery_images module to let them do their job. since darker lighter is not part of the variation there is no further thing to do from here after the change event is recieved. -- to h. so it will involve the observer pattern notifications. INVALID
 //                                     // --  and since it is different kind processing that is required after change event so the input_template_type must be defined uniquely like slider_no_variation -- to h. just do the needful. INVALID
 //                                         NOTE: and yeah on that note everything of the sp_variations module must be dynamic and nothing should be hardcoded so slider_no_variation input template type must be passed right from where the template is defined on admin to till here 
 //                                         --  first of all, the change event will be hosted, recieved and processed by darker lighter extension layer only -- to a 
 //                                             --  and there will be nothing here for that from here in the swatches module but it will be from gallery_images module -- to h or -- to a. the gallery_images module will emit notification on its similar flow like here. I think gallery_images module will do it and there is nothing else to do. 
 //                                             --  and the extension would respond back with anything that it think can be handled on common layers here based on base type(here its very image or video type) -- to h or -- to a 
 //                                                --  so will that be our recursive flow? I think that is what we thought ofm with simple and precise condition that would avoid the recursion in any scenarios -- to a 
 //                                             NOTE: and there is no input_template_type implementation, but the type will be considered as base type while the e param provide type will be specific extended type. INVALID there is slight change in this flow 
 //                                                // --  so extra param will host one type field and additionally a types object within which there would be single type  -- to a done 
 //                                                    // --  and when the types is prepared, at that time simply type is considered -- to a done
 //                                                        // --  and then it extensions would respond back with object (base) type which could be further processed with recursive call -- to a done
 //                                                            // -- extentions can return object (base) type -- to a done
 //                         // ACTIVE_TODO_OC_END                
 
 //                     //  data applicable loops 
 //                     _this.data.product_variations.each( function() {
 
 //                         //  pre process data and process collections that would be necessary for neat and quick ops 
 
 //                         // collect input types to be supported 
 //                         _this.data.template_types = {};   
 //                         // ACTIVE_TODO_OC_START
 //                         // is the woo input template type means dropdown is mandatorily kept by plugins, not seems likely but still confirm and then we need a way to determine(always) the exact input type based on the field/input type selected on woo panel or otherwise simply support the input_template_type field which will be set in background implicitly based on the field/input type selected on woo panel -- this field is simply better then managing many different template names of extensions and defining based on that -- and it will default to the above field/input type for wbc nothing to manage, only if condition below that if input_template_type is not defined then read simply above field/input type. and in case of extensions that need to be defined based on the template that is selected on their admin panel. so this template option should be only be defining it and passing it where applicable so that is gets here. and it is need to be defined based on that only to avoid confusion and many unnecessary and confusing configuration overheads -- to h or -- to d 
 //                         // ACTIVE_TODO_OC_END
 
 //                     }); 
 
 //                     //  template 
 //                     _this.data.template_types.each( function( type ) {
 
 //                         //  do necessary logic if support is available, if not for example custom_html then manage accordingly  
 //                         if( type == 'default'/*means the default template provided by slider and zoom*/ || type == 'custom_html' ) 
 //                             // ACTIVE_TODO_OC_START
 //                             in case of custom_html as long as the slider and zoom events are not emitted and they would not be since we would be doing our custom html, but if they are then need to cancel them using their apis (only) as mentioned in the events functions below  -- to h 
 //                                 -- but one matter that we need to handle in detail is managing the slider thumb indexes which is providing anything custom like custom_html dom (like 360,  darker lighter, diamond meta and recently purchased) for their main image ares (which is also zoom area) 
 //                                     --  and mostly none of the slider or zoom plugin would be providing such complex apis and even if they do then not sure if all have those and even if they do then not sure if all have it mature 
 //                                         --  so one simple (but tricky, yeah it is trick and not standard) option is to simply hide the zoom area container and show the custom html. NOTE: this statement and above statement are very true, and it is a fact that even if we put our custom tempalte in zoom area but still as long as we are not completely overriding the container of zoom, means the div within which we allow zoom to put their content and init their plugin on the div, then that mean that zoom can create issues in this area. 
 //                                                --  and the zoom plugin would be binding something on parent div/nodes as well so it is not reliable either if we create one more level of div and simply hide the zoom_container div, while the extra div that we preserved is what will be used to put inside the custom tempaltes. but yeah it can make quite a difference and I think neat zoom plugins would not be doing single thing outside their base container. so we should do this very soon. -- to h and -- to s 
 //                                                    --  and in any case the standard and ultimate solution is to simply publish a api function stop zoom listener in our external plugins api sp_slzm, so that binding zoom plugins simply stop their plugin or say detach their plugin until next refresh listener or even mature is till next resume listener. so in this case it is better to provide pause(appropriate in terminology against the stop) and resume and avoid relying on refresh_listener for such matter. -- to h and -- to s 
 //                                             --  but since it is not standard we should find standard, or can use that trick since it is simple and also effective option especially because it is less likely for most slider and zoom to provide support
 //                                                 --  but if we are to use this trick then we need to bring it closer to standard implementation by ensuring the possible flows like always have our classes in zoom area container like sp-variations-zoom-container -- we already implemented the class heirarchy, but see if there is anything else we can do to make this trick mature. 

 //                                                // --  now simply the zoom template would be provided based on type so just make sure that type based template is provided by each applicable extensions listed above -- to a DONE
 //                             // ACTIVE_TODO_OC_END                    
 //                     }); 
 
 //                     NOTE: note that we may have planned some unnecessary events below that from swatches module notifies the gallery_images module, and vice-versa. but it is pretty standard that both should abstract our each other and work on abstraction level only where they do not directly interacts with each other but depend on the global variation change and so on(for gallery_images) events to do their job. and similarly slider and zoom module work on their own level of abstraction and just init or refresh their js/jQuery module if the related event is detected from the js api that is to be published for the external slider and zoom module. 
                    
 //                    --  all applicable points listed above for darker lighter also need to be done for other extensions in their own regard -- to a 
 //                        --  first we will do it for the 360 in their own regard, means whatever is necessary for it would be done there like event binding, and further processing on those events and so on -- to a 

 //         -   effects and managing after effects 
 //                 --  may need to provide some effects but only where and if necessary, the majority of effects will be provided by the slider and zoom js/jQuery plugin 
 //                 --  will need to manage the after effects very precisely, to ensure smooth and non cluttering experience 
 //                     --  it may or likely include managing the loading, swaping and updating of images 
 
 //                 // --  we may like to use the underscore js, I think we must use it from very beginning -- to h 
 //                 //     --  first of all confirm that if wp/woo legacy stack is loading it and if they are then we should not load our own versions to ensure optimum performance -- to t and -- to h 
 //                 //         --  either way if we required to load it then we must load as per the wp, woo and theme/plugins standards so that we can avoid unnecessary versions and mostly load the similar versions -- to a and -- to t. here the catch is that we need to find our the wp standards to let load the common version used by most to save on the performance and so on. 
 //                     //  DONE
 //                     --  and note that while we are planning to use the underscore js for effects management and smoothing among its other users that we may do, we should note that mostly we need to manage smoothing of broad or specific layers or mianly of extensions events/effects but apart from that the slider and zoom plugins internal smoothing and effects should managed by that plugins and that include all those image effects, smoothing including maybe also the image preload management among other things and if the particular slider and zoom is not providing it or if their support is not mature then can simply change the slider and zoom js/jquery plugin -- to h. just for the notes. 
 //                        --  need to make sure that we do the needful for smoothing the dom events(html/css updates/changes) of darker lighter, diamond meta and lastly the explainer widgets -- to h and -- to a 

 //         -   devices 
 //                 --  is_mobile and is_tablet - this would be primary 
 //                         -- create above two flags under ..splugins.common namespace, in js.vars.asset.php so no need to pass those as configs here when this module initiated -- to d done
 //                     --  for layers which need to have complete different implementation for mobile etc. then for them applicable flgas should be set/initiated from the higher layers layers for example the slider and zoom would be completely different plugin for mobile devices -- but anyway now we will see to it again to reconsider using the new slider also for mobile but only if that is beneficial in terms of setup time and maintainance time, for the later it would be beneficial but not sure about the initial setup and implementation time and challanges that may arise. -- to h 
 //                         --  and we would like to reconsider the zoom also in the same way like above -- to h 
 //                            --  here we must research ground up and plan heirarchically, like whether if woo has any specific, different or certain responsiveness standards for their themes. and same applies for the wp also. 
 //                                --  like how different plugins in community does take care of it. 
 //                                --  as far as purple theme is concerned the matter is that mobile specific slider and zoom are alredy adapting and perfect. 
 //                                --  but for other themes adaption the standards and flows that are popular in wp, woo and themes community is what help us adapt faster and go clean on the way ahead. 
 //                                    --  so should we do two implementation for mobile? 
 //                                        --  if so then we can consider the community standard solution as default while the purple theme specific slider and zoom mobile would be impelemented based on theme condition but in this case this condition will be implemented in the process_compatability_matters, compatiblity and other such heirarchy of functions. 
 //                 --  browser - will matter so much 
 //                 --  screen size - need to handle occasionally only as long as overall UI/UX layers are mature 
 //                 --  os 
 //         -   plugins/themes 
 //                 --  there will be list of compatiblity matters that need to be handled so it will go under the compatiblity matter, and clearly it will go in compatiblity layers 
 //                     --  not related to this section but lets create simply a compatiblity module of its own like at the level where templating module is in namespace -- to d --    ACTIVE_TODO/TODO then each modules like filters, variations and so on can have their own module like ...filters.compatiblity just like there ...filters.core core module. but this is only if necessary, otherwise a function inside core module is much readability friendly. 
 //                         // --  a compatiblity function inside filters, variations.swatches and variations.gallery_images module -- to d done
 
 //                     --  initially even in 1st revision we must implement some fundamental compatiblity matters -- to h 
 //                         --  make sure that all the compatiblity matters are covered from the plugins we were exploring -- to h or -- to s 
 //         -   configs 
 //                 --  will control decision of whether to display certain section or not, for example whether to display template part of attribute name (for us ribbon wrapper)
 //                 --  or whether to show tooltip or not 
 //                 --  ACTIVE_TODO image preload will going to be an important and strategic feature for the gallery_images module, so we will need to add support for that very soon with on admin by default is applicable flag will be on, and user can disable that if they want -- to h and -- to d 
 //                     --  ACTIVE_TODO/TODO and after the above feature is basically implemented very soon in future we may like add the feasible and effective innovations that would add value to this feature -- to h and -- to d 
 //                 --  ACTIVE_TODO like above thumbnail height and thumbnail position is also something that we need to support very soon -- to h and -- to d 
 //                     --  ACTIVE_TODO and similarly if there is anything else like above things or related matters in the plugins we were exploring then we should cover them too -- to h and -- to d 
 //         -   php hooks and js api 
 //                         --  but yeah it will be served only if the related requirement is enabled, for example external slider and zoom option is enabled. so that extra hook and event are served or events are bound only if required and it will prevent unnecessary resource usage. 
 //             --  would be used by our extensions and would be used for the hooks/js-api support for slider zoom replacement 
 //                 --  for extensions it would our events module of subject/observer pattern 
 //                     --  can we create and publish of it for external use also by users, at least not till it is not well thought and confirmed that it will not create any conflict or issues of any kind otherwise it will create mess for our users too 
 //                 --  the events that sp_variations provide so that any slider or zoom can at least cover their mandatory events if not the optional 
 //                     --  there are two or more important ACTIVE_TODO mentioned here in this common js file, that are important to above point 
 //                 --  the events that sp_variations will listen to 
 //                     --  so that slider zoom can inject their dom and so on 
 //                         --  there are two or more important ACTIVE_TODO mentioned here in this common js file, that are important to above point 
 
 
 //         -   random 
 //             // --  each extensions will have their own module, so create variations.assets.php file in each 7 extensions. in some b had already created -- to a. ask b if you have questions. 
 //             //     --  also create load asset function in model -- to a. ask b if questions. 
 //             //     --  and then always call load_asset from render_ui calling stack -- to a. 
 //                 --  so confirm that render_ui is called from the controller init stack, the flow for it is set in either size or shape extensions so follow that -- to a 
 //                 // --  and then load asset should load above variations.assets.php so put that loading statements -- to a. ask d or b 
 //                 // --  and then inside variations.assets.php crete the js module, the module name should be based on the singleton function name -- to a 
 //                 // --  and then inside module create the general fucntions like init, init_private, bootstrap, preprocess, preprocess_data and so on -- to s 
 //                 --  and then from here mostly instead of hosting things like managing events or binding clicks etc. it will just listen to events. so implement all subscribe statements -- to a 
 //                 --  and then it will additionally implement logic of when the notification recieved like doing business logic on notification or doing some processing and then calling back the callback, since now events api support one way calling back on notification -- to a  
 //                 // --  and also export publish the module under ...api -- to a 
 
 //             --  size extensions host its own change event based on its selector, so move that applicable code to the applicable function in the function heirarchy -- to a 
 //                 --  so we may need to create one or two applicable from our function heirarchy in swatches module to over there -- to a 
 //                 --  and then move inside those functions the applicable existing code of the size extension -- to a 
 //                 --  and some of the existing code need to be commented, which I will update you about -- to h and -- to a 
 //                 --  and then after that if any code remains there then discuss with me -- to a 
 //                 // --  and then listen for process_attribute_types notification and upon recieving that notification call the above functions which hosts the events -- to a 
 //                 --  and from there when the change event is detected then call this js modules on_change or so base event handler -- to a 
 //                 --  and that would simply call the callback function -- to a 
 //                 --  so the callback function need to be saved under _this object with var name _this.on_change_callback, when the notification is recieved -- to a 
 //                 --  and on the core swatches module the inline function of callback (would be created from where the notification is sent) would recieve the callaback and simply pass the call to the base on_change or change function of the swatches module -- to a 
 //                    --  instead of above flow what if we simply trigger variations change event, that m had also did for other such matters -- to a 
 //                        --   I think we need to do that only since otherwise our variable item s input type implementation would not be considered a standard implementation and that will lead do many unnecessary development and maintainance -- to a 
 
 //             // --  360 extensions host its own hover event based on its selector, so move that applicable code to the applicable function in the function heirarchy -- to a done 
 //                 // --  so we may need to create one or two applicable from our function heirarchy in gallery_images module to over there -- to a done
 //                     --  and one more additional event that need to be host is slider thumb hover, here the thumb is of 360 extension -- to a 
 //                         --  and please do check once and also talk with both k and t about if hover is now should be replaced with the click or not, if click is standard experience and most sites are doing that then we should switch to that -- to a. but maybe hover is what most sites are doing and that is why we did that actually. 
 //                 --  and then move inside those functions the applicable existing code of the particular extension -- to a 
 //                     --  in this extension there will be code of playing and pausing the video so need to create base functions for them and then call them -- to a 
 //                         // --- play and pause aa 2 function banava na done
 //                             ---- play and pause no code bhavesh bhai pase thi levanose
 //                     --  and also there will be code of implementing the top left height and width properties of iframe, so implement that accordingly but whichever is applicable for the item page -- to a
 //                             // --- process_properties_template (position - top left valo code , item and catary vali condition mukvi) 
 //                         // --  so there there will be item page condition, just implement that as it is in the swatches etc module -- to a 
 //                         --  and this layers will also host or recieve many logics and flows of the 360 overall improvements and major upgrades we planned -- to h and -- to a 
 //                     // --  and additionally there are 360 related handling inside the zoom assets.php file so move that at right place in the this 360 js module -- to a (360 related code levano baki hoy to check karvu) 
 //                 --  and some of the existing code need to be commented, which I will update you about -- to h and -- to a 
 //                 --  and then after that if any code remains there then discuss with me -- to a 
 //                 --  and then listen for process_images notification and upon recieving that notification call the above functions which hosts the events -- to a 
 //                 --  and from there when the change event is detected then call this js modules on_change or so base event handler -- to a 
 //                 --  and that would simply call the callback function -- to a 
 //                 --  so the callback function need to be saved under _this object with var name _this.on_change_callback, when the notification is recieved -- to a 
 //                 --  and on the core swatches module the inline function of callback (would be created from where the notification is sent) would recieve the callaback and simply pass the call to the base on_change or change function of the swatches module -- to a 
 //                    --  so this sounds like specific (base) type recursion -- to a. and using this maybe is necessary since otherwise there is no other way for base module to listen to those events -- to a 
 //                 -- init - initprivate - preprocess - (prepocessdata)   
 
 //             // --  darker lighter extensions host its own hover event based on its selector, so move that applicable code to the applicable function in the function heirarchy -- to a done
 //                 // --  so we may need to create one or two applicable from our function heirarchy in gallery_images module to over there -- to a done
 //                     // --  and one more additional event that need to be host is slider thumb hover, here the thumb is of darker lighter extension -- to a 
 //                         // --  and please do check once and also talk with both k and t about if hover is now should be replaced with the click or not, if click is standard experience and most sites are doing that then we should switch to that -- to a. but maybe hover is what most sites are doing and that is why we did that actually. 
 //                 --  and then move inside those functions the applicable existing code of the particular extension -- to a 
 //                         --  and this layers will also host or recieve many logics and flows of the darker lighter overall improvements and major upgrades we planned -- to h and -- to a (omar ni site ma virtual try on check karvanu darker lighter , darker lighter mobile ni javascript all point)
 //                     // --  and additionally there maybe darker lighter related code handling inside the zoom assets.php file so move that at right place in the this darker lighter js module -- to a (aa file mathi code levano se)
 //                 --  and some of the existing code need to be commented, which I will update you about -- to h and -- to a 
 //                 --  and then after that if any code remains there then discuss with me -- to a 
 //                 --  and then listen for process_images notification and upon recieving that notification call the above functions which hosts the events -- to a 
 //                 --  and from there when the change event is detected then call this js modules on_change or so base event handler -- to a 
 //                 --  and that would simply call the callback function -- to a 
 //                 --  so the callback function need to be saved under _this object with var name _this.on_change_callback, when the notification is recieved -- to a 
 //                 --  and on the core swatches module the inline function of callback (would be created from where the notification is sent) would recieve the callaback and simply pass the call to the base on_change or change function of the swatches module -- to a 
 
 //             --  diamond meta 
 
 //             --  advanced info 
 
 //             --  recently purchased 

            // - testing

            //     --  10 + 20 theme ma functionality + ui testing
 
 // ACTIVE_TODO_OC_END
 
// the variations swatches js module
class SP_WBC_Variations_Swatches extends SP_WBC_Variations {


    constructor(element, configs) {
            
        // console.log("SP_WBC_Variations_Swatches constructor");

        // Calling parent's constructor
        super(element, configs);
        console.log("SP_WBC_Variations_Swatches constructor called");
        // ACTIVE_TODO_OC_START
        // ACTIVE_TODO Till the safari incompatablity issue is not solwed we needed to move below variable decleration insight constructore. As soon as this safari compatiblity issue is fixed as soon move it move this variable declearation section back to the above constuctore.  
        // ACTIVE_TODO_OC_END
        this./*#*/configs_private;
        this./*#*/$base_container_private;
        this./*#*/data_private;
        this./*#*/binding_stats_private;

        var _this = this; 

        _this./*#*/configs_private = jQuery.extend({}, {}/*default configs*/, configs);

        _this./*#*/configs_private.attribute_types_keys = Object.keys( _this./*#*/configs_private.attribute_types );

        _this./*#*/$base_container_private = jQuery(element);    // jQuery( ( window.document.splugins.common._o( _this.configs, 'base_container_selector') ? _this.configs.base_container_selector : '.variations_form' ) );      

        _this./*#*/data_private = {};
        _this./*#*/binding_stats_private = {};     

    }



    // var _this = this; 

    // ACTIVE_TODO_OC_START
    // here mostly in the private scope, the variations module should subscribe to search filter events and pass those to variations core which would call the change event so that filters those affecting the variations data like images etc. are rendered accordingly. so that metal color based or shape based images render appropriately. 
    //     --  however, it is not limited to js layer only and actually js layer here would not be of use except the search is client side only based on the js. but the searches are always carried on the backend so the php layer need to ensure that return appropriate variations images etc. whenever the selected options of the search filters connects with variations instead of the main product. 
    //         --  m have did it already but need to implement throughly as per standard if not proper yet 
    
    // if below difference and includes functions are provided by underscore js backed by wp/woo maybe then we can port through our common namespace, mainly because maybe on other platforms or so the underscore might not be available then it can be replaced somehow from there. so maybe still it will going to be _(underscore) function only and we will need to call it with long name pattern or we can port even the common namespace as sp_common so the call will be like splugins._ -- to h. --   and when required we can do splugins.c for the common namespace maybe.  

    // var in_stocks = _.difference(selects, disabled_selects);
    // if (_.includes(in_stocks, attribute_value)) {
    // ACTIVE_TODO_OC_END

            
            // --  and then will do one more cycle finalizing the code implementation like confirming selector, find and so on statements, other such layers and definitely applying the remaining class structure everywhere -- to s done

    /*#*/init_private() {
    
        console.log('vs [init_private]');

        var _this = this; 

        window.document.splugins.events.api.createSubject( 'swatches', ['process_attribute_types', 'sp_variations_swatches_loaded'] );

        // init on all applicable events 
        jQuery(document).on('wc_variation_form', _this./*#*/$base_container_private/*'.variations_form:not(.spui-wbc-swatches-loaded)'*/, function (event) {

            console.log('vs [init_private] wc_variation_form');

            // if( !( jQuery(this).has('.spui-wbc-swatches-loaded') ) ){
            if( !( jQuery(_this./*#*/$base_container_private).hasClass('spui-wbc-swatches-loaded') ) ){
                
                console.log('vs [init_private] wc_variation_form if');
            
                //  had we used the _jQueryInterface style the _jQueryInterface call would have started from here 
                _this./*#*/preprocess_private( _this./*#*/$base_container_private, event );  

            }
            
        });
        // // ACTIVE_TODO temp. 
        // // jQuery('.variations_form').wc_variation_form();
        // preprocess( jQuery('.variations_form'), event );  

        // below do apply our flows like -- to s 
            // --  change with _this.base_container done
            // --  change $ with jQuery but only where it is used as $() var done
            // --  replace _ (underscore) js calls with sp_common._ done
            // --  replace loaded classs done
            // --  and other such matters if any done 
            // --  remove variation form
            // Try to cover all ajax data complete
        // console.log("init_private before ajaxComplete");

        jQuery(document).ajaxComplete(function (event, request, settings) {

          splugins._.delay(function () {
           
            jQuery( _this./*#*/$base_container_private /*'.variations_form:not(.spui-wbc-swatches-loaded)'*/).each(function () {

                console.log('vs [init_private] ajaxComplete');
                console.log(jQuery(this));
                console.log(jQuery(this).attr('class'));
                if( !( jQuery(this).hasClass('spui-wbc-swatches-loaded') ) ){
                    
                    console.log('vs [init_private] ajaxComplete 1');
                    console.log(this);
                    jQuery(this).wc_variation_form();
                }
            });
          }, 1000);
        });

        // Composite product load
        // JS API: https://docs.woocommerce.com/document/composite-products/composite-products-js-api-reference/

        // console.log("init_private before wc-composite-initializing");

        jQuery(document.body).on('wc-composite-initializing', '.composite_data', function (event, composite) {

            console.log("init_private after wc-composite-initializing");

          composite.actions.add_action('component_options_state_changed', function (self) {
           
            // ACTIVE_TODO whenever we remove loaded classs we also need to flush bindingf stats and also turn of event binding -- to s
                // ACTIVE_TODO same for gallery_images module -- to a
            jQuery(self.$component_content).find('.variations_form').removeClass('spui-wbc-swatches-loaded .spui-wbc-swatches-pro__type__-loaded');
          });

          /* composite.actions.add_action('active_scenarios_updated', (self) => {
             console.log('active_scenarios_updated')
             $(self.$component_content).find('.variations_form').removeClass('wvs-loaded wvs-pro-loaded')
           })*/
        });

        // ACTIVE_TODO_OC_START
        // // Support for Yith Infinite Scroll

        // so a call from here to the compatability function of this module, and that will cover all compatability matters of load time inlcuding the promize resolve block of the plugin we were exploring. so call compatability with section=preprocess -- to d done
            // ACTIVE_TODO we nedd to add promise resolve as required -- to s
        _this./*#*/compatability_private('init_private');
        // ACTIVE_TODO_OC_END

        // WooCommerce Filter Nav

        // console.log("init_private before aln_reloaded");

        jQuery('body').on('aln_reloaded', function () {

            splugins._.delay(function () {
           
                jQuery( _this./*#*/$base_container_private /*'.variations_form:not(.spui-wbc-swatches-loaded)'*/).each(function () {
                    
                    if( !( jQuery(this).hasClass('spui-wbc-swatches-loaded') ) ){

                        jQuery(this).wc_variation_form();
                    }
                });
            }, 100);
        });
    }

    /*#*/preprocess_private( element, event ) {

        console.log('vs [preprocess]');

        var _this = this; 

        // NOTE: in future if insted of jQuery some other frontend library is used then that can managed from here that is why we are receiving this reference in element insted of jQuery object 
        _this.base_element = element;
        _this.$base_element = jQuery( _this.base_element );


        _this./*#*/data_private.product_variations = _this.$base_element.data('product_variations') || [];      


        _this./*#*/data_private.is_ajax_variation = _this./*#*/data_private.product_variations.length < 1;
        _this./*#*/data_private.product_id = _this.$base_element.data('product_id');

        _this.$base_element.addClass('spui-wbc-swatches-loaded');


        //
        //  data applicable loops 
        //
        // pre process data and process collections that would be necessary for neat and quick ops 
        _this./*#*/data_private = _this./*#*/preprocess_data_private( _this./*#*/data_private );   

        // do necessary bindings for the attribute types to be supported 
        _this./*#*/process_attribute_types_private();  

        /*  ACTIVE_TODO/TODO we may also like raise some broad general level event triggers(for us its observer pattern notifications), it seems important for establish mature and generc structure of events and overall flow on js layers. 
        // Trigger
        $(document).trigger('woo_variation_swatches', [this.$element]);*/

        /*ACTIVE_TODO_OC_START
        // ACTIVE_TODO basicaly implemented below disable, stock etc flows but need to confirm everything once css and templates are finalized. -- to h & -- to s 
        most part of below code developes the logic for the stock based disable and enable feature 
            --  so we may like to consider the fundamentals for now and would do mature implementation in the 2nd revision -- to h 
        ACTIVE_TODO_OC_END*/

        /*ACTIVE_TODO_OC_START
        ----SELECTED FLOW 
        this would be determined based on admin options settings, and we may already have that admin options settings and if not then we need to add that -- to h and -- to s 
            --  and the options object should be loaded from the variations.assets.php file, and that is already recieving many admin options related to apprearance from the model. all this options or required options should be passed to this js module under configs parameter but admin settings options should reside under key options within the configs object. -- to h and -- to s 
            --  and view with shape was already supporting this selected item label, so need to manage this asap. and atleast we can first execute this point so that shape extension does function as expected -- to h 
                --  we still first need to see all flows of the plugins we were exploring so look for keywords like selected, and I will see the snaps -- to s 
                    --  then will need to finalize our flow and heirachical structure -- to h. lets confim below flow with the flow of plugins we were exploring have  
                        --  I think the layers that would be involved in the heirachical structure would be 
                            --  configs from admin 
                                --  and applicable section conditions here 
                            --  templates from php layers 
                                --  and applicable template function calls from here 
                                    --  and updating templates with applicable data on variation change and so on events, but mainly it will be variation change event 
        // // Append Selected Item Template
        // if (woo_variation_swatches_options.show_variation_label) {
        //   this.$element.find('.variations .label').each(function (index, el) {
        //     $(el).append(_this2.selected_item_template);
        //   });
        // }
        ACTIVE_TODO_OC_END*/


        /*ACTIVE_TODO_OC_START
        heirachical classes 
            --  add three level classes in our swatches templates -- to s 
                    --  inlcuding in extensions -- to s 
                    --  and while you do remove the unnecessary classes of plugins we were exploring and other such (maybe we can drop the unused classes of m also but I think lets just be there till they are not marked as deprecated) -- to s 
                --  first would be spui-wbc-swatches-variation-items-wrapper and second would be spui-wbc-swatches-variable-item (still confirm the actual class name used by woo)
                --  and third is not any level but create the class for woo select dropdown that stays there in hidden, it would be something like wbc-swatches-raw-select -- to s 
                    --  but first confirm if that dropdown is actually given the name of the raw and if saw is it on select of their parent raw? -- to s 
            --  ACTIVE_TODO and similarly and already implemented most classes for gallery_images, for gallery_images we need to make sure that the heirarchy of classes normally been applied by woo and the plugins we were exploring are followed in our templates layers and all the applicable classes are in place -- to s and -- to a 
                --  ACTIVE_TODO and then t and a you need to appropriately plan the css for all those classes taking into consideration all different popular themes. but yeah css structuring should be generic so that it adapats as planned to all different themes. -- to t and -- to a. this task need to be executed very soon or now while we are approaching to finalize the 10 theme demos. 
                heirachical and/or applicable css -- to t 
                    --  just research all the different classes, elements, events and flows and then plan the generic yet elegant css which I discussed with you about -- to t 
                        --  and look at the li.each loop below they had create and applied a common and generic selected class, which would be relied upon by all their templates of different types -- to t 
                            --  so we need to create similar for our types -- to t 
                            --  and also for types of the extensions -- to t 
        ACTIVE_TODO_OC_END*/

                /*ACTIVE_TODO_QC_START
                our own heirachical structure -- to s and -- to a 
                    // --  the variable-items-wrapper loop below will work as type loop for us now, so implement similar there and comment from here -- to s done 
                        // --  and from within that loop all those functions will be called, and with function call pass the attribute type and if that is not available even in the variable-items-wrapper element then we will simply dump it there from our common woo attribute dropdown element -- to s done
                        // --  and together with the type, always pass the this object from any each loop to ensure optimum stability -- to s done
                        // --  there will be process function for options under the process_template function heirarchy -- to s done
                            // --  so call the process_attribute_template function from the process_template function -- to s done 
                                // --  and within that function the main options loop and if there is any other loop then that will implemented -- to s done
                        // --  for the rest follow the task given below for entire swatches module -- to s done

                    --  for the gallery_images module, a you need to follow the tasks given in the gallery_images module -- to a 

                additional our own flow that we may like to use beyond notifications and so on, that may help in future exnteding or improving flows/features as well as scalling. -- I think it would be mature heirachical structure, mature data keeping (brief client side caching for smooth UI and effects) and data flows throughout the funnel, precise and neat notification (events) definitions, simple to the point selectors and neat & clean overall implementation and execution 


                and some things that still is not came to the attention 
                ACTIVE_TODO_QC_END*/

            // this.$element.find('ul.variable-items-wrapper').each(function (i, el) {

             
              // $(this).parent().addClass('woo-variation-items-wrapper');
 
              // var select = $(this).siblings('select.woo-variation-raw-select');
              // var selected = '';
              // var options = select.find('option');
              // var disabled = select.find('option:disabled');
              // var out_of_stock = select.find('option.enabled.out-of-stock');
              // var current = select.find('option:selected');
              // var eq = select.find('option').eq(1);


                      // var li = $(this).find('li:not(.woo-variation-swatches-variable-item-more)');
                      //       ACTIVE_TODO however not this, for this once t gives conclusion our final implementation will follow -- to t 
                      // var reselect_clear = $(this).hasClass('reselect-clear');

                      // var mouse_event_name = 'click.wvs'; // 'touchstart click';

                      // var attribute = $(this).data('attribute_name');
                      // // let attribute_values = ((_this.is_ajax_variation) ? [] : _this._generated[attribute])
                      // // let out_of_stocks = ((_this.is_ajax_variation) ? [] : _this._out_of_stock[attribute])
                      // var selects = [];
                      // var disabled_selects = [];
                      // var out_of_stock_selects = [];
                      // var $selected_variation_item = $(this).parent().prev().find('.woo-selected-variation-item-name');

                      // this need to be moved to compatability function, so from here there would be call to the compatability function -- to s 
                      // // For Avada FIX
                      // if (options.length < 1) {
                      //   select = $(this).parent().find('select.woo-variation-raw-select');
                      //   options = select.find('option');
                      //   disabled = select.find('option:disabled');
                      //   out_of_stock = select.find('option.enabled.out-of-stock');
                      //   current = select.find('option:selected');
                      //   eq = select.find('option').eq(1);
                      // }

                    /*ACTIVE_TODO_OC_START
                    all below to attribute data function -- to s 
                    --  and they will return data object of local scope -- to s 
                        --  ACTIVE_TODO/TODO but whenever it make sense we can keep such data in global data var of module to benefit from the caching as planned. 
                    there will be dedicated functions under preprocess_data function heirarchy, for managing stock status and other limitations 
                    --  the functions names would be namely preprocess_stock_status_data -- to h 
                    --  and the other such functions which would be required is manging other such conditions, managing the legacy number of variations limit and other such limitations of supporting 30 variations only for certain functions which was there in the plugin we were exploring -- to h. it may be ACTIVE_TODO 
                    ACTIVE_TODO_OC_END*/

                  // options.each(function () {
                  //   if ($(this).val() !== '') {
                  //     selects.push($(this).val());
                  //     selected = current.length === 0 ? eq.val() : current.val();
                  //   }
                  // });

                  // disabled.each(function () {
                  //   if ($(this).val() !== '') {
                  //     disabled_selects.push($(this).val());
                  //   }
                  // });

                  // // Out Of Stocks
                  // out_of_stock.each(function () {
                  //   if ($(this).val() !== '') {
                  //     out_of_stock_selects.push($(this).val());
                  //   }
                  // });

                  // var in_stocks = _.difference(selects, disabled_selects);

                  // // console.log('out of stock', out_of_stock_selects)
                  // // console.log('in stock', in_stocks)

                  // var available = _.difference(in_stocks, out_of_stock_selects);


            /*ACTIVE_TODO_OC_START
            the type specific matters are rarely found above due to abstraction that was not needed 
            --  however like below the type specific things handled, we would have type specific condition in function process_attribute_template. as below will going to be moved there -- to s 
            ACTIVE_TODO_OC_END*/
              // Mark Selected
            //   li.each(function (index, li) {

            //     var attribute_value = $(this).attr('data-value');
            //     var attribute_title = $(this).attr('data-title');

            //     // Resetting LI
            //     $(this).removeClass('selected disabled out-of-stock').addClass('disabled');
            //     $(this).attr('aria-checked', 'false');
            //     $(this).attr('tabindex', '-1');

            //     if ($(this).hasClass('radio-variable-item')) {
            //       $(this).find('input.wvs-radio-variable-item:radio').prop('disabled', true).prop('checked', false);
            //     }

            //     // Default Selected
            //     // We can't use es6 includes for IE11
            //     // in_stocks.includes(attribute_value)
            //     // _.contains(in_stocks, attribute_value)
            //     // _.includes(in_stocks, attribute_value)

            //     if (_.includes(in_stocks, attribute_value)) {

            //       $(this).removeClass('selected disabled');
            //       $(this).removeAttr('aria-hidden');
            //       $(this).attr('tabindex', '0');

            //       $(this).find('input.wvs-radio-variable-item:radio').prop('disabled', false);

            //       if (attribute_value === selected) {

            //         $(this).addClass('selected');
            //         $(this).attr('aria-checked', 'true');

            //         if (woo_variation_swatches_options.show_variation_label) {
            //           $selected_variation_item.text(woo_variation_swatches_options.variation_label_separator + ' ' + attribute_title);
            //         }

            //         if ($(this).hasClass('radio-variable-item')) {
            //           $(this).find('input.wvs-radio-variable-item:radio').prop('checked', true);
            //         }
            //       }
            //     }

            //     // Out of Stock

            //     if (available.length > 0 && _.includes(out_of_stock_selects, attribute_value) && woo_variation_swatches_options.clickable_out_of_stock) {
            //       $(this).removeClass('disabled').addClass('out-of-stock');
            //     }
            //   });
            // // });
          // }

    }

    /*#*/preprocess_data_private(data) {

        return data;
    
    }

    /*#*/process_attribute_data_private(type, element, data, mode = null) {

        console.log('vs [process_attribute_data]');
        console.log(data.options);

        data.options.each(function () {
            if (jQuery(this).val() !== '') {
                console.log(jQuery(this));
                data.selects.push(jQuery(this).val());
                data.selected = data.current.length === 0 ? data.eq.val() : data.current.val();
            }
        });

        // console.log(data.options);
        // console.log(data.selects);

        data.disabled.each(function () {
            if (jQuery(this).val() !== '') {
                data.disabled_selects.push(jQuery(this).val());
            }
        });

          // Out Of Stocks
        data.out_of_stock.each(function () {
            if (jQuery(this).val() !== '') {
                data.out_of_stock_selects.push($(this).val());
            }
        });

        console.log('process_attribute_data selects', data.selects)
        console.log('process_attribute_data disabled_selects', data.disabled_selects)
        data.in_stocks = splugins._.difference(data.selects, data.disabled_selects);
        console.log('data.in_stocks', data.in_stocks)

        // console.log('out of stock', out_of_stock_selects)
        // console.log('in stock', in_stocks)

        data.available = splugins._.difference(data.in_stocks, data.out_of_stock_selects);

        return data;

    }

    /*#*/process_attribute_types_private( type=null, element=null ) {

        console.log('vs [process_attribute_types]');

        var _this = this; 

        if( window.document.splugins.common.is_item_page ) {
            // Append Selected Item Template
            if (_this./*#*/configs_private.options.show_variation_label) { 
                // ACTIVE_TODO t need to provide details -- to t & to s
                this.$element.find('.variations .label').each(function (index, el) {
                $(el).append(_this2.selected_item_template);
              });
            }
        }

        if(type == null){

            // console.log("swatches process_attribute_types");

            // _this.data.attribute_types.each( function( i, type ) {
            // _this.$base_element.find('ul.spui-wbc-swatches-variable-item,.spui-wbc-swatches-variable-item').each(function (i, element) {
            _this.$base_element.find('ul.variable-items-wrapper').each(function (i, element) {

                var type_inner = jQuery(element).data('type');
                // console.log("process_attribute_types data type" +type_inner);
                // ACTIVE_TODO_OC_START
                // --  so above preprocess_data call should simply prepare two attribute types list, first is attribute_types and second is ... or simply one only. and simply delegate everything else that is not coming under attribute_types, to the extensions layers. and should simply publish this list of attribute_types from backend. 
                // NOTE: and one of the key benefit of this approach is that these layers will emit the broadcast notification event only if they detect the type to be the premiumly supported type and otherwise not. which would minimize process and little or not hanging processes and less debug console logs that would appear around. 

                // is the woo input template type means dropdown is mandatorily kept by plugins, not seems likely but still confirm and then we need a way to determine(always) the exact input type based on the field/input type selected on woo panel or otherwise simply support the input_template_type field which will be set in background implicitly based on the field/input type selected on woo panel -- this field is simply better then managing many different template names of extensions and defining based on that -- and it will default to the above field/input type for wbc nothing to manage, only if condition below that if input_template_type is not defined then read simply above field/input type. and in case of extensions that need to be defined based on the template that is selected on their admin panel. so this template option should be only be defining it and passing it where applicable so that is gets here. and it is need to be defined based on that only to avoid confusion and many unnecessary and confusing configuration overheads. no simply need to stick to attribute type only means field/input-type selected on woo panel and that is standard and clean. so implement here based on that only. -- to h or -- to d 
                // ACTIVE_TODO_OC_END

                if ( true || window.document.splugins.common._o(_this./*#*/configs_private.attribute_types_keys, type_inner)) {

                     _this./*#*/process_attribute_types_inner_private(type_inner, element);

                }                          
                else {
                    console.log('vs [process_attribute_types] loop else');

                    // ACTIVE_TODO_OC_START
                    // --  and we can and should simply use observer pattern events to host for example the slider listener here and then emit internal change event from here     
                    //     --  still in this case the variation.swatches will register its event subject and emit bootstrap level notification like bootstrap/on.load maybe on.load is more user friendly 
                    //     --  then at that time applicable extension will bootstrap the js layer 
                    //     --  and when the change event occurs the applicable extension will simply call the ...swatches.api function to notify back about their change event or the events module can add support to provide callbacks to subscriber so that they can reply with something when they have done something based on notification. so it can be called the notification_response. -- but it will be about breaking our own rule of keeping the events simple. so even if we must do then in that case it must be till notification_response only and no further callback back and forth can be supported. otherwise it mostly lead to long debug sequences. --  however it has benefit of less maintainance since otherwise extensions need to know about the ...swatches.api but in case of events support of notification_response it only need to learn about and depend on the variations.swatches subject of events module. and as long as we can keep it limited to notification_response only and do not extend it further it will be clean to be frank. 

                    var process_attribute_types_callback = function(type_inner_1) {

                        if (window.document.splugins.common._o(_this./*#*/configs_private.attribute_types_keys, type_inner_1)) {
                            _this.process_attribute_types(type_inner_1, element);
                            console.log("type_inner_1" +type_inner_1);
                            
                        }

                    };
                    window.document.splugins.events.api.notifyAllObservers( 'swatches', 'process_attribute_types', {type:type_inner}, process_attribute_types_callback, _this./*#*/$base_container_private );

                    //     --  and we are planning to host darker/lighter slider support also from here as usual so it will be just like above slider example 
                    //         --  but yeah after the change event is recieved here that will be emitted to the gallery_images module to let them do their job. since darker lighter is not part of the variation there is no further thing to do from here after the change event is recieved. 
                    //             --  and since it is different kind processing that is required after change event so the input_template_type must be defined uniquely like slider_no_variation 
                    //                 NOTE: and yeah on that note everything of the sp_variations module must be dynamic and nothing should be hardcoded so slider_no_variation input template type must be passed right from where the template is defined on admin to till here 
                    // ACTIVE_TODO_OC_END  

                    // if( type == 'radio' ) 

                    // ACTIVE_TODO_OC_START    
                    // //     -   configs 
                    // //             --  will control decision of whether to display certain section or not, for example whether to display template part of attribute name (for us ribbon wrapper)
                    // //             --  or whether to show tooltip or not 

                    // // --  it wil be a specific block here for devices and configs -- to d 
                    // // --  while for the rest create dedicated functions like process_template, process_events and so on. for the layers listed below. 
                    //     --  create below list of functions after the process_attribute_types function, and apply above peudo flows there and rest of the flows those functions should adapt from the flow notes from the heirachical flow plan at top -- to d and -- to h 
                    // //         // -- process_template -- to d done
                    // //         // -- process_pages -- to d done
                    // //         // -- process_slider_and_zoom -- to d done
                    // //         // -- process_events -- to d done
                    // //         // -- process_and_manage_effects -- to d done
                    // //         // -- process_compatability_matters -- to d done
                    // ACTIVE_TODO_OC_END  

                }      
                
            }); 
        } else {

            _this./*#*/process_attribute_types_inner_private(type, element);

        }  


        var sp_variations_swatches_loaded_callback = null ;
        window.document.splugins.events.api.notifyAllObservers( 'swatches', 'sp_variations_swatches_loaded', {type:type}, sp_variations_swatches_loaded_callback, _this./*#*/$base_container_private );

    }

    /*#*/process_attribute_types_inner_private( type, element ) {

        console.log('vs [process_attribute_types_inner]');

        var _this = this; 

        // ACTIVE_TODO_OC_START    
        // do necessary logic if support is available
        //     --  that means based on type call/process necessary functions/layers for example events functions(some events functions already defined below), template functions/layers, pages functions/layers, like events the effects functions/layers, plugins/themes applicable compatiblity function calls, slider and zoom functions/layers(note that even for swatches modules there might be some conditions or conditional logics that would be required) -- to d 
        //     --  and also do call/process necessary functions/layers for the provided device type(and maybe some of their specifications would also need to be handled in future like width(which would otherwise mostly be dynamically handled), resolution and so on ACTIVE_TODO) and configs, but it will be a specific block here only and the dedicated function for them sound unnecessary -- to d
        //         --  and we need some logic of if function or layer need to be called once only then take care of that, for all above functions, including the devices and configs that are to be handled from here -- to d 
        //         --  and as usual there will going to be if conditions for applicable matters in applicable functions and their layers defined above, to handle the devices and configuration specific matters. and so the dedicated blocks of devices and configs will handle some specific matters which do not necessarily mixed with other things mentioned above like events, template, pages and so on layers. -- to h    
        // ACTIVE_TODO_OC_END   
        
        _this./*#*/process_template_private(type, element); 

        _this./*#*/process_pages_private(type, element);

        _this./*#*/process_slider_and_zoom_private(type, element); 

        _this./*#*/process_events_private(type, element); 

        _this./*#*/process_and_manage_effects_private(type, element);

        _this./*#*/process_compatability_matters_private(type, element);

        // ACTIVE_TODO_OC_START
        // -   devices 
        //         --  for layers which need to have complete different implementation for mobile etc. then for them applicable flgas should be set/initiated from the higher layers layers for example the slider and zoom would be completely different plugin for mobile devices -- but anyway now we will see to it again to reconsider using the new slider also for mobile but only if that is beneficial in terms of setup time and maintainance time, for the later it would be beneficial but not sure about the initial setup and implementation time and challanges that may arise. 
        //             --  and we would like to reconsider the zoom also in the same way like above 
        //     --  browser - will matter so much 
        //     --  screen size - need to handle occasionally only as long as overall UI/UX layers are mature 
        //     --  os 
        // ACTIVE_TODO_OC_END    

        if(window.document.splugins.common.is_mobile){

        }else if(window.document.splugins.common.is_tablet){


        }else if(false/*browser*/){

        }else if(false/*screen size*/){

        }else if(false/*os*/){

        }

        // ACTIVE_TODO_OC_START    
        // -   configs 
        //     --  will control decision of whether to display certain section or not, for example whether to display template part of attribute name (for us ribbon wrapper)
        //     --  or whether to show tooltip or not 
        // ACTIVE_TODO_OC_END

        // if( type == 'radio' )

        var process_attribute_types_inner_callback = null;
        window.document.splugins.events.api.notifyAllObservers( 'swatches', 'process_attribute_types_inner', {type:type}, process_attribute_types_inner_callback, _this./*#*/$base_container_private );              
    }

    /*#*/process_template_private(type, element) {

        console.log('vs [process_template]');

        var _this = this; 
        
        // ACTIVE_TODO_OC_START
        // --  or whether to show tooltip or not 
        // ACTIVE_TODO_OC_END 

        _this./*#*/process_attribute_template_private(type, element);

    }


    /*#*/process_attribute_template_private(type, element, mode = null, is_reusability_recursion = false) {

        console.log('vs [process_attribute_template]');

        var _this = this; 

        // console.log("swatches process_attribute_template product id="+ _this./*#*/data_private.product_id +" type="+ type);
        // console.log(element);
        
        var data = {};

        // NOTE : uniquely_managed_type is not needed to be managed here
        /*var uniquely_managed_type = null;
        if(type == 'radio') {

            uniquely_managed_type = type;

        } else {

            uniquely_managed_type = 'default';            
            
        }*/

        // ACTIVE_TODO is it needed? and why they did it? -- to s. check and update me 
        jQuery(element).parent().addClass('woo-variation-items-wrapper');

        /*ACTIVE_TODO_OC_START
        --  however also check the logic and use of eq below -- to s 
        // --  and as mentioned above this object will always be passed from all .each loops under element, so use that element inside the process_attribute_template -- to s done
        ACTIVE_TODO_OC_END*/

        console.log('data.select creat');
        console.log(element);

        // -- data.select 28-08-2023 @a
        // data.select = jQuery(element).siblings('select.woo-variation-raw-select');
        data.select = jQuery(element).parent().find('select.woo-variation-raw-select');
        data.selected = '';
        data.options = data.select.find('option');
        data.disabled = data.select.find('option:disabled');
        data.out_of_stock = data.select.find('option.enabled.out-of-stock');
        data.current = data.select.find('option:selected');
        data.eq = data.select.find('option').eq(1);

        // console.log("select and disable log");
        // console.log(data.options);
        // console.log(data.disabled);
        // console.log(data.select);

        // ACTIVE_TODO we do not have any more (class woo-variation-swatches-variable-item-more) class related flow yet. but t you need to first plan the template structure -- to t
            // ACTIVE_TODO -- then once template ready then implaemnt on php side and do the needful on js layers -- to s
       /* data.*/var inner_list = jQuery(element).find('li:not(.spui-wbc-swatches-variable-item-more)');
            // ACTIVE_TODO however note that, for this once t gives conclusion our final implementation will follow -- to t 
        data.reselect_clear = jQuery(element).hasClass('reselect-clear');

        // data.mouse_event_name = 'click'; // 'touchstart click';
        _this./*#*/configs_private.mouse_event_name = ( window.document.splugins.common._o( _this./*#*/configs_private, 'mouse_event_name') ? _this./*#*/configs_private.mouse_event_name : 'click'  ); // 'touchstart click';

        data.attribute = jQuery(element).data('attribute_name');
        // let attribute_values = ((_this.is_ajax_variation) ? [] : _this._generated[attribute])
        // let out_of_stocks = ((_this.is_ajax_variation) ? [] : _this._out_of_stock[attribute])
        data.selects = [];
        data.disabled_selects = [];
        data.out_of_stock_selects = [];

        // page condition 
        if( window.document.splugins.common.is_item_page ){

            if (_this./*#*/configs_private.options.show_variation_label ) {
                // ACTIVE_TODO need to manage selector and we need to do it after the selected template task in template secion above is covered 
                $selected_variation_item = jQuery(element).parent().prev().find('.woo-selected-variation-item-name');
            }
        }
       
        // this need to be moved to compatability function, so from here there would be call to the compatability function -- to s done
        // attribute_template
        // if (options.length < 1) {
        //     select = $(this).parent().find('select.woo-variation-raw-select');
        //     options = select.find('option');
        //     disabled = select.find('option:disabled');
        //     out_of_stock = select.find('option.enabled.out-of-stock');
        //     current = select.find('option:selected');
        //     eq = select.find('option').eq(1);
        // }
        var object = _this./*#*/compatability_private('attribute_options', {'element':element, 'data':data});
        data = object.data;
        console.log('vs [process_attribute_template] data');
        console.log(data);

        data = _this./*#*/process_attribute_data_private(type, element, data, mode);
        
        inner_list.each(function (index, inner_element ) {

            // console.log("inner element in loop");
            // console.log(inner_element);
            data.attribute_value = jQuery(inner_element).attr('data-value');
            data.attribute_title = jQuery(inner_element).attr('data-title');

            console.log('process_attribute_template');
            console.log(inner_element);
            console.log(element);
            // Resetting LI
            jQuery(inner_element).removeClass('selected disabled out-of-stock').addClass('disabled');
            jQuery(inner_element).attr('aria-checked', 'false');
            jQuery(inner_element).attr('tabindex', '-1');

            if (jQuery(inner_element).hasClass('radio-variable-item')) {
              jQuery(inner_element).find('input.spui-wbc-swatches-variable-item-radio:radio').prop('disabled', true).prop('checked', false);
            }

            // Default Selected
            // We can't use es6 includes for IE11
            // in_stocks.includes(attribute_value)
            // _.contains(in_stocks, attribute_value)
            // _.includes(in_stocks, attribute_value)
           
            console.log("process_attribute_template outer if product id="+ _this./*#*/data_private.product_id +" type="+ type);
            console.log(data.in_stocks);
            console.log(data.attribute_value);

            if (splugins._.includes(data.in_stocks, data.attribute_value)) {
        
                // console.log("process_attribute_template selected disabled in if product id="+ _this./*#*/data_private.product_id +" type="+ type);
                // console.log(inner_element);
                console.log('process_attribute_template_01');
    
              jQuery(inner_element).removeClass('selected disabled');
              jQuery(inner_element).removeAttr('aria-hidden');
              jQuery(inner_element).attr('tabindex', '0');

              jQuery(inner_element).find('input.spui-wbc-swatches-variable-item-radio:radio').prop('disabled', false);

              console.log('vs [process_attribute_template] 1');
              console.log(data.attribute_value);
              console.log(data.selected);

              if (data.attribute_value === data.selected) {
                
                console.log("process_attribute_template selected in if if product id="+ _this./*#*/data_private.product_id +" type="+ type);

                jQuery(inner_element).addClass('selected');
                console.log(jQuery(inner_element).attr('class'));
                console.log(inner_element);
                
                // console.log("process_attribute_template after selected in if if");

                jQuery(inner_element).attr('aria-checked', 'true');

                // page condition 
                if( window.document.splugins.common.is_item_page ){

                    if (_this./*#*/configs_private.options.show_variation_label ) {
                        $selected_variation_item.text(woo_variation_swatches_options.variation_label_separator + ' ' + data.attribute_title);
                    }
                }

                if (jQuery(inner_element).hasClass('radio-variable-item')) {
                    jQuery(inner_element).find('input.pui-wbc-swatches-variable-item-radio:radio').prop('checked', true);
                }
              }
            }

            // Out of Stock

            if (data.available.length > 0 && splugins._.includes(data.out_of_stock_selects, data.attribute_value) && _this./*#*/configs_private.options.clickable_out_of_stock) {
              $(data.inner_element).removeClass('disabled').addClass('out-of-stock');
            }
        });
        // });
        console.log('vs [process_attribute_template] 01');

        if(is_reusability_recursion === false) {
            
            _this./*#*/on_click_listener_private(type, element, data.reselect_clear, data);

            _this./*#*/on_keydown_listener_private(type, element);   

            _this./*#*/on_change_listener_private(type, element, data.reselect_clear, null, data); 
        }

    }

    /*#*/process_pages_private(type, element) {

        // console.log('vs [process_pages]');

        /*ACTIVE_TODO_OC_START
        fundamentally we are going to put here page specific handling and management 
            --  but how we can make the many layers common which can work semalessly in common(means many things of different layers, not necessarily entire layers)? -- to h 
                --  data layers already be common and that should remain common for most part except some conditions -- to h 
                --  while we shuold do little or no common for events and effects since they are strictly ui bound layers so that would result in weak balance between modules -- to h 
                --  what else?
        ACTIVE_TODO_OC_END*/ 
        if(window.document.splugins.common.is_category_page){

        }else if(window.document.splugins.common.is_item_page){

        }

    }

    /*#*/process_slider_and_zoom_private(type, element){
        
    }
    
    /*#*/process_events_private(type, element){

        // on_change_listener(type, element);    

        // on_click_listener(type, element);

        // on_keydown_listener(type, element);   

    }

    /*#*/process_and_manage_effects_private(type, element){
     
    }

    /*#*/process_compatability_matters_private(type, element){
        
        var _this = this; 
        
        if(type == 'buttons'){

            _this./*#*/compatability_private("button_section");

        }else if(type == 'image'){

            _this./*#*/compatability_private("image_section");

        } 

    }

    // -   events 
    // --  mouse events 
    /*#*/on_change_listener_private(type, element, reselect_clear, uniquely_managed_type, data) {

        console.log('vs [on_change_listener]');
        console.log(element);

        var _this = this; 
        
        // console.log("swatches on_change_listener");
        // // var uniquely_managed_type = null;
        // if(type == 'radio'/*change radio with your uniquely managed type*/) {

        //     uniquely_managed_type = type;

        // } else {

        //     uniquely_managed_type = 'default';            

        // }

        // if(window.document.splugins.common._b(_this./*#*/binding_stats_private, 'on_change_listener', uniquely_managed_type)){
        //     return false;
        // }

        console.log('vs [on_change_listener] after false');

        /*jQuery('#select_attribute_of_variation').on('woocommerce_variation_has_changed', function(){
            // do your magic here...
         }); */
        
        console.log("swatches on_change_listener after if");
        console.log(_this.$base_element);

        _this.$base_element.off('woocommerce_variation_has_changed');
        _this.$base_element.on('woocommerce_variation_has_changed', function (event) {

            // console.log("swatches on_change_listener after if woocommerce_variation_has_changed");
          // Don't use any propagation. It will disable composit product functionality
          // event.stopPropagation();

          // $(this).find('ul.variable-items-wrapper').each(function (index, el) {

          //   var select = $(this).siblings('select.woo-variation-raw-select');
          //   var selected = '';
          //   var options = select.find('option');
          //   var disabled = select.find('option:disabled');
          //   var out_of_stock = select.find('option.enabled.out-of-stock');
          //   var current = select.find('option:selected');
          //   var eq = select.find('option').eq(1);
          //   var li = $(this).find('li:not(.woo-variation-swatches-variable-item-more)');

          //   //let reselect_clear   = $(this).hasClass('reselect-clear');
          //   //let is_mobile        = $('body').hasClass('woo-variation-swatches-on-mobile');
          //   //let mouse_event_name = 'click.wvs'; // 'touchstart click';

          //   var attribute = $(this).data('attribute_name');
          //   // let attribute_values = ((_this.is_ajax_variation) ? [] : _this._generated[attribute])
          //   // let out_of_stocks = ((_this.is_ajax_variation) ? [] : _this._out_of_stock[attribute])

          //   var selects = [];
          //   var disabled_selects = [];
          //   var out_of_stock_selects = [];
          //   var $selected_variation_item = $(this).parent().prev().find('.woo-selected-variation-item-name');

          //   // For Avada FIX
          //   if (options.length < 1) {
          //     select = $(this).parent().find('select.woo-variation-raw-select');
          //     options = select.find('option');
          //     disabled = select.find('option:disabled');
          //     out_of_stock = select.find('option.enabled.out-of-stock');
          //     current = select.find('option:selected');
          //     eq = select.find('option').eq(1);
          //   }

          //   options.each(function () {
          //     if ($(this).val() !== '') {
          //       selects.push($(this).val());
          //       // selected = current ? current.val() : eq.val()
          //       selected = current.length === 0 ? eq.val() : current.val();
          //     }
          //   });

          //   disabled.each(function () {
          //     if ($(this).val() !== '') {
          //       disabled_selects.push($(this).val());
          //     }
          //   });

          //   // Out Of Stocks
          //   out_of_stock.each(function () {
          //     if ($(this).val() !== '') {
          //       out_of_stock_selects.push($(this).val());
          //     }
          //   });

          //   var in_stocks = _.difference(selects, disabled_selects);

          //   var available = _.difference(in_stocks, out_of_stock_selects);

          //   if (_this.is_ajax_variation) {

          //     li.each(function (index, el) {

          //       var attribute_value = $(this).attr('data-value');
          //       var attribute_title = $(this).attr('data-title');

          //       $(this).removeClass('selected disabled');
          //       $(this).attr('aria-checked', 'false');

          //       // To Prevent blink
          //       if (selected.length < 1 && woo_variation_swatches_options.show_variation_label) {
          //         $selected_variation_item.text('');
          //       }

          //       if (attribute_value === selected) {
          //         $(this).addClass('selected');
          //         $(this).attr('aria-checked', 'true');

          //         if (woo_variation_swatches_options.show_variation_label) {
          //           $selected_variation_item.text(woo_variation_swatches_options.variation_label_separator + ' ' + attribute_title);
          //         }

          //         if ($(this).hasClass('radio-variable-item')) {
          //           $(this).find('input.wvs-radio-variable-item:radio').prop('disabled', false).prop('checked', true);
          //         }
          //       }

          //       $(this).trigger('wvs-item-updated', [selected, attribute_value, _this]);
          //     });
          //   } else {

          //     li.each(function (index, el) {

          //       var attribute_value = $(this).attr('data-value');
          //       var attribute_title = $(this).attr('data-title');

          //       $(this).removeClass('selected disabled out-of-stock').addClass('disabled');
          //       $(this).attr('aria-checked', 'false');
          //       $(this).attr('tabindex', '-1');

          //       if ($(this).hasClass('radio-variable-item')) {
          //         $(this).find('input.wvs-radio-variable-item:radio').prop('disabled', true).prop('checked', false);
          //       }

          //       // if (_.contains(selects, value))
          //       // if (_.indexOf(selects, value) !== -1)
          //       // if (selects.includes(value))

          //       // We can't use es6 includes for IE11
          //       // in_stocks.includes(attribute_value)
          //       // _.contains(in_stocks, attribute_value)
          //       // _.includes(in_stocks, attribute_value)

          //       // Make Selected // selects.includes(attribute_value) // in_stocks
          //       if (_.includes(in_stocks, attribute_value)) {

          //         $(this).removeClass('selected disabled');
          //         $(this).removeAttr('aria-hidden');
          //         $(this).attr('tabindex', '0');

          //         $(this).find('input.wvs-radio-variable-item:radio').prop('disabled', false);

          //         // To Prevent blink
          //         if (selected.length < 1 && woo_variation_swatches_options.show_variation_label) {
          //           $selected_variation_item.text('');
          //         }

          //         if (attribute_value === selected) {

          //           $(this).addClass('selected');
          //           $(this).attr('aria-checked', 'true');

          //           if (woo_variation_swatches_options.show_variation_label) {
          //             $selected_variation_item.text(woo_variation_swatches_options.variation_label_separator + ' ' + attribute_title);
          //           }

          //           if ($(this).hasClass('radio-variable-item')) {
          //             $(this).find('input.wvs-radio-variable-item:radio').prop('checked', true);
          //           }
          //         }
          //       }

          //       // Out of Stock
          //       if (available.length > 0 && _.includes(out_of_stock_selects, attribute_value) && woo_variation_swatches_options.clickable_out_of_stock) {
          //         $(this).removeClass('disabled').addClass('out-of-stock');
          //       }

          //       // $(this).trigger('wvs-item-updated', [selected, attribute_value, _this]);
          //     });
          //   }

          //   // Items Updated
          //   // $(this).trigger('wvs-items-updated');
          // });
          
            console.log('vs [on_change_listener] 1');
            console.log(element);

            // NOTE: since now we are trying to move towards the micro services like architecture, with the attempts like below loop so eventually this very on_change_listener_private function call should also be refactored and instead of monolithic structure of calling it for all the types and maintaing entire monolitihic chain we should simply call it maybe once only. 
            // _this./*#*/process_attribute_template_private(type, element, 'change', true);  
            _this.$base_element.find('ul.variable-items-wrapper').each(function (i, element_inner) {
                
                var type_inner = jQuery(element_inner).data('type');

                _this./*#*/process_attribute_template_private(type_inner, element_inner, 'change', true);  
            });
            _this./*#*/on_change_private(type, element, event);

        });

        if (reselect_clear) {
 
            if(type == 'radio') {      

                jQuery(element).on('change', 'input.spui-wbc-swatches-variable-item-radio:radio', function (e, params) {

                  element_inner = this;

                  e.preventDefault();
                  e.stopPropagation();

                  if (params && params.radioChange) {

                        var value = jQuery(element_inner).val();

                        var is_selected = jQuery(element_inner).parent('li.spui-wbc-swatches-variable-item-radio, .spui-wbc-swatches-variable-item-radio').hasClass('selected');

                        if (is_selected) {
                          data.select.val('').trigger('change');

                          // ACTIVE_TODO we do not need this, drop below commentd code after 2 revision 
                          // jQuery(element_inner).parent('li.spui-wbc-swatches-variable-item-radio').trigger('wvs-selected-item', [value, select, _this.$element]); // Custom Event for li

                        } else {
                          data.select.val(value).trigger('change');

                          // ACTIVE_TODO we do not need this, drop below commentd code after 2 revision 
                          // jQuery(element_inner).parent('li.spui-wbc-swatches-variable-item-radio').trigger('wvs-selected-item', [value, select, _this.$element]); // Custom Event for li
                        }

                        data.select.trigger('click');
                        data.select.trigger('focusin');
                        if (window.document.splugins.common.is_mobile) {
                          data.select.trigger('touchstart');
                        }
                  }

                  _this./*#*/on_change_private(type, element_inner, event);

                });
            }
 
        } else {

            if(type == 'radio') {

                jQuery(element).on('change', 'input.spui-wbc-swatches-variable-item-radio:radio', function (event, element_inner) {
                  event.preventDefault();
                  event.stopPropagation();

                  var value = jQuery(element_inner).val();

                  data.select.val(value).trigger('change');
                  data.select.trigger('click');
                  data.select.trigger('focusin');

                  if (window.document.splugins.common.is_mobile) {
                    data.select.trigger('touchstart');
                  }

                  // Radio
                  jQuery(element_inner).parent('li.spui-wbc-swatches-variable-item-radio,.spui-wbc-swatches-variable-item-radio').removeClass('selected disabled').addClass('selected');
                  jQuery(element_inner).parent('li.spui-wbc-swatches-variable-item-radio,.spui-wbc-swatches-variable-item-radio').trigger('wvs-selected-item', [value, select, _this.$element]); // Custom Event for li

                  _this./*#*/on_change_private(type, element_inner, event);

                });
            }
        }

    }

    /*#*/on_click_listener_private(type, element, reselect_clear, data) {
        
        console.log('vs [on_click_listener]');

        var _this = this; 

        console.log("on_click_listener__ " + type );

        /*var uniquely_managed_type = null;
        if(type == 'radio') {

            uniquely_managed_type = type;

        } else {

            uniquely_managed_type = 'default';            
            
        }*/

        // if(window.document.splugins.common._b(_this.binding_stats, 'on_click_listener', type)){
        // console.log("on_click_listener inner if");

        //     return false;
        // }
        
        // var mouse_event_name = 'click';

        /*ACTIVE_TODO_OC_START
        here it seems that m have explicitly handled the click event, but we should do if it is by standard require and the legacy flows does need us to take care of it. so confirm first with the plugin we are exploring -- to h 
        jQuery('.variable-item').on('click',function(){
            var target_selector = $('#'+$(this).data('id'));
            target_selector.val(jQuery(element).data('value'));
            jQuery(element).parent().find('.selected').removeClass('selected');
            jQuery(element).addClass('selected');
            // ACTIVE_TODO do we need this check variations flow?
            jQuery(_this.base_container).trigger('check_variations');
            jQuery(target_selector).trigger('change');
            on_click(type, element, event);
        });
        ACTIVE_TODO_OC_END*/

        
        // for all sections of update layers in below sections and elsewhere in this plugin, what we can do is simply call the process_attribute_template function but with mode param equal to update or so -- to s done
            /*ACTIVE_TODO_OC_START
            --  and also ensure to make the duplicate code common in the base functions where below events are ultimatly routing.  -- to s
            ACTIVE_TODO_OC_END*/
        // Trigger Select event based on list

        // console.log("on_click_listener binding");

        if (reselect_clear) {

            console.log("on_click_listener reselect_clear");

            // Non Selected Item Should Select
            // ACTIVE_TODO here we need to manage non li templates
            jQuery(element).on(_this./*#*/configs_private.mouse_event_name, 'li:not(.selected):not(.radio-variable-item):not(.spui-wbc-swatches-variable-item-more)', function (event) {

                var element_inner = this;

                console.log("on_click_listener reselect_clear li, div");


              // e.preventDefault();
              // e.stopPropagation();
              // var value = jQuery(element_inner).data('value');
              // select.val(value).trigger('change');
              // select.trigger('click');

              // select.trigger('focusin');

              // if (window.document.splugins.common.is_mobile) {
              //   select.trigger('touchstart');
              // }

              // jQuery(element_inner).trigger('focus'); // Mobile tooltip
              // jQuery(element_inner).trigger('wvs-selected-item', [value, select, _this.$element]); // Custom Event for li
              
              _this./*#*/on_click_private(type, element_inner, event, reselect_clear, false, data);
            });

            // Selected Item Should Non Select
            // ACTIVE_TODO here we need to manage non li templates
                // ACTIVE_TODO for the notes below event is most likely also used for category page or is maybe for category page only, so we may need to apply category page condition as applicable.
            jQuery(element).on(_this./*#*/configs_private.mouse_event_name, 'li.selected:not(.radio-variable-item):not(.spui-wbc-swatches-variable-item-more)', function (event) {

                var element_inner = this;

                console.log("on_click_listener reselect_clear li, selected, div");


              // e.preventDefault();
              // e.stopPropagation();

              // var value = jQuery(element_inner).val();

              // select.val('').trigger('change');
              // select.trigger('click');

              // select.trigger('focusin');

              // if (window.document.splugins.common.is_mobile) {
              //   select.trigger('touchstart');
              // }

              // jQuery(element_inner).trigger('focus'); // Mobile tooltip

              // jQuery(element_inner).trigger('wvs-unselected-item', [value, select, _this.$element]); // Custom Event for li

              _this./*#*/on_click_private(type, element_inner, event, reselect_clear, true, data);
            });

            

            if(type == 'radio') {

                // RADIO

                // On Click trigger change event on Radio button

                jQuery(element_inner).on(_this./*#*/configs_private.mouse_event_name, 'input.spui-wbc-swatches-variable-item-radio:radio', function (event) {

                    var element_inner = this;

                  // e.stopPropagation();

                  // jQuery(element_inner).trigger('change', { radioChange: true });

                    _this./*#*/on_click_private(type, element_inner, event, reselect_clear, false, data);
                });
            }

            /*jQuery(element).on('change', 'input.spui-wbc-swatches-variable-item-radio:radio', function (e, params) {
              e.preventDefault();
              e.stopPropagation();
              if (params && params.radioChange) {
                var value = jQuery(element).val();
                var is_selected = jQuery(element).parent('li.spui-wbc-swatches-variable-item-radio').hasClass('selected');
                if (is_selected) {
                  select.val('').trigger('change');
                  jQuery(element).parent('li.spui-wbc-swatches-variable-item-radio').trigger('spui-wbc-swatches-variable-item-unselected', [value, select, _this.$element]); // Custom Event for li
                } else {
                  select.val(value).trigger('change');
                  jQuery(element).parent('li.spui-wbc-swatches-variable-item-radio').trigger('spui-wbc-swatches-variable-item-selected', [value, select, _this.$element]); // Custom Event for li
                }
                select.trigger('click');
                select.trigger('focusin');
                if (_this.is_mobile) {
                  select.trigger('touchstart');
                }
              }
            });*/
        } else {

            jQuery(element).on(_this./*#*/configs_private.mouse_event_name, 'li:not(.radio-variable-item):not(.spui-wbc-swatches-variable-item-more)', function (event) {

                event.preventDefault();
                event.stopPropagation();

                var element_inner = this;

                console.log("on_click_listener else li, selected, div");
                // console.log(element_inner);
 
              // event.preventDefault();
              // event.stopPropagation();

              // var value = jQuery(element_inner).data('value');
              // select.val(value).trigger('change');
              // select.trigger('click');
              // select.trigger('focusin');
              // if (window.document.splugins.common.is_mobile) {
              //   select.trigger('touchstart');
              // }

              // jQuery(element_inner).trigger('focus'); // Mobile tooltip

              // jQuery(element_inner).trigger('wvs-selected-item', [value, select, _this._element]); // Custom Event for li

              _this./*#*/on_click_private(type, element_inner, event, reselect_clear, false, data);
            });

            /* // Radio
            jQuery(element).on('change', 'input.spui-wbc-swatches-variable-item-radio:radio', function (event) {
              event.preventDefault();
              event.stopPropagation();
              var value = jQuery(element).val();
              select.val(value).trigger('change');
              select.trigger('click');
              select.trigger('focusin');
              if (_this.is_mobile) {
                select.trigger('touchstart');
              }
              // Radio
              jQuery(element).parent('li.spui-wbc-swatches-variable-item-radio').removeClass('selected disabled').addClass('selected');
              jQuery(element).parent('li.spui-wbc-swatches-variable-item-radio').trigger('spui-wbc-swatches-variable-item-selected', [value, select, _this.$element]); // Custom Event for li
            });*/
        }
    }

    /*#*/on_reset_listener_private(type, element) {

        console.log('vs [on_reset_listener]');

        var _this = this; 

        /*var uniquely_managed_type = null;
        if(type == 'radio') {

            uniquely_managed_type = type;

        } else {

            uniquely_managed_type = 'default';            
            
        }*/

        jQuery( _this.$base_element /*'.variations_form'*/).on('click', '.reset_variations'/*'woocommerce_variation_select_change'*//*'reset'*/,function(){

            // ACTIVE_TODO need to implement reset logic as applicable, need to confirm all reset flows of plugin we are exploring and also uncomment below m code if required and move to base reset function. -- to h & -- to s
            // jQuery('.variable-items-wrapper .selected').removeClass('selected');
            // jQuery('.variable-items-wrapper .dropdown').dropdown('restore defaults');

            _this./*#*/on_reset_private(type, element, event);
        });

    }

    /*#*/on_keydown_listener_private(type, element) {
        
        var _this = this; 

        // console.log("on_keydown_listener in starting");
        /*var uniquely_managed_type = null;
        if(type == 'radio') {

            uniquely_managed_type = type;

        } else {

            uniquely_managed_type = 'default';            
            
        }*/

        if(window.document.splugins.common._b(_this./*#*/binding_stats_private, 'on_keydown_listener', type)){
            return false;
        }
        
        // console.log("on_keydown_listener after if");

        // Keyboard Access
        jQuery(element).on('keydown', 'li:not(.disabled):not(.spui-wbc-swatches-variable-item-more)', function (event) {

            // console.log("on_keydown_listener in event");

            _this./*#*/on_keydown_private(type, element, event);

        }); 

    }


    /*#*/on_change_private(type, element, event, data) {

        var _this = this; 
        
        _this./*#*/change_private(type, element, data);

    }

    /*#*/on_click_private(type, element_inner, event, reselect_clear, is_selected_selctor, data) {

        var _this = this; 
        
        _this./*#*/click_private(type, element_inner, event, reselect_clear, is_selected_selctor, data);

    }

    /*#*/on_reset_private(type, element, event) {

        var _this = this; 
        
        _this./*#*/reset_private(type, element, event);
    }

    // ACTIVE_TODO_OC_START
    // --  keyboard events 
    // ACTIVE_TODO_OC_END
    /*#*/on_keydown_private(type, element, event) {

        var _this = this; 
        
        _this./*#*/keydown_private(type, element);  
    }
            // ACTIVE_TODO_OC_START
            // --  legacy events (events of woo emitted on certain scenarios) 
            // --  events emitted by other plugins/themes which we need to take care of in case of compatiblity matters, so it can be termed as the compatiblity events 
            // ACTIVE_TODO_OC_END


    // -- base events - after the above events are handled by their particular function/layer, they would call below functions to do the ultimate work         
    /*#*/change_private(type, element, data) {

    }

    /*#*/click_private(type, element_inner, event, reselect_clear, is_selected_selctor, data) {

        console.log('vs [click]');

        if(reselect_clear) {
            
            console.log('swatches click if');
          
            event.preventDefault();
            event.stopPropagation();
            var value = null;

            if (is_selected_selctor == true) {
             
                value = jQuery(element_inner).val();
            } else {

                value = jQuery(element_inner).data('value');

            }

            data.select.val(value).trigger('change');
            data.select.trigger('click');
            data.select.trigger('focusin');
            if (window.document.splugins.common.is_mobile) {
                data.select.trigger('touchstart');
            }
            jQuery(element_inner).trigger('focus'); // Mobile tooltip

            if (is_selected_selctor == true) {

                jQuery(element_inner).trigger('wvs-unselected-item', [value, select, _this.$element]);

            } else {

                jQuery(element_inner).trigger('wvs-selected-item', [value, select, _this.$element]); // Custom Event for li

            }

            if(type == 'radio') {
                
                event.stopPropagation();
                jQuery(element_inner).trigger('change', { radioChange: true });
            }

        } else {
            
            console.log('swatches click else');
            console.log(data);

            event.preventDefault();
            event.stopPropagation();

            var value = jQuery(element_inner).data('value');
            console.log(value);

            // console.log("gggggggg");
            // console.log(element_inner);
            // console.log(data.select);
            // console.log("value" +value);
            data.select.val(value).trigger('change');
            
            console.log('swatches click else 1');

            data.select.trigger('click');
            
            console.log('swatches click else 2');

            data.select.trigger('focusin'); 
            
            console.log('swatches click else 3');

            if (window.document.splugins.common.is_mobile) {
                data.select.trigger('touchstart');
            }

            jQuery(element_inner).trigger('focus'); // Mobile tooltip
            console.log('swatches click else 4');

            // ACTIVE_TODO here we may like to raise our notification evemnt to completly implement and finish our notifications structure and hierarchic 
            // jQuery(element_inner).trigger('wvs-selected-item', [value, select, _this._element]); // Custom Event for li
        }

    }

    /*#*/reset_private(type, element, event) {

        // jQuery('.variable-items-wrapper .selected').removeClass('selected');
        // jQuery('.variable-items-wrapper .dropdown').dropdown('restore defaults');

    }

    /*#*/keydown_private(type, element) {

        if (event.keyCode && 32 === event.keyCode || event.key && ' ' === event.key || event.keyCode && 13 === event.keyCode || event.key && 'enter' === event.key.toLowerCase()) {
            event.preventDefault();
            jQuery(element).trigger(_this./*#*/configs_private.mouse_event_name);
        }
    }

    /*#*/compatability_private(section, object, expected_result) {
       
        console.log('vs [compatability]');

        // ACTIVE_TODO_OC_START
        // this compatiblity function flow will be as per the commets in the filter js file 
        // -   plugins/themes 
        // --  there will be list of compatiblity matters that need to be handled so it will go under the compatiblity matter, and clearly it will go in compatiblity layers 
        //     --  not related to this section but lets create simply a compatiblity module of its own like at the level where templating module is in namespace -- to d --    ACTIVE_TODO/TODO then each modules like filters, variations and so on can have their own module like ...filters.compatiblity just like there ...filters.core core module. but this is only if necessary, otherwise a function inside core module is much readability friendly. 
        //         --  a compatiblity function inside filters, variations.swatches and variations.gallery_images module -- to d  

        // and add all those theme and other patch that the other plugin we were exploring have. -- to d 
        //         --  but of course in our case it will be as per our flow of how we manage loading and then ajax loading of swatches options -- to h and -- to d 
        //     --  that other plugin have some more theme specific patch fix, and some other patch for managing unexpected effects like blink and so on -- to d    
        // ACTIVE_TODO_OC_END    

        if(section == 'init_private'){

            console.log("compatability before yith_infs_added_elem");

            jQuery(document).on('yith_infs_added_elem', function () {

                // console.log("compatability inner yith_infs_added_elem");

                jQuery( _this./*#*/$base_container_private /*'.variations_form:not(.spui-wbc-swatches-loaded)'*/).each(function () {

                    if( !( jQuery(this).hasClass('spui-wbc-swatches-loaded') ) ){

                        console.log("compatability before yith_infs_added_elem inner");

                        jQuery(this).wc_variation_form();
                    }
                });
            });
        } else if (section == 'attribute_options'){

            if (object.data.options.length < 1) {
                // ACTIVE_TODO it will not work for our dropdown type, so need to manage that may be simply using if for that type so that stability of this default statemnet is not efected
                // object.data.select = jQuery(object.element).parent().find('select.woo-variation-raw-select');
                object.data.select = jQuery(object.element).closest('select.woo-variation-raw-select');
                object.data.options = object.data.select.find('option');
                object.data.disabled = object.data.select.find('option:disabled');
                object.data.out_of_stock = object.data.select.find('option.enabled.out-of-stock');
                object.data.current = object.data.select.find('option:selected');
                object.data.eq = object.data.select.find('option').eq(1);
            }

        }

        return object;
    } 

    get_configs() {

        var _this = this; 

        return _this./*#*/configs_private;
    }

    set_configs(configs) {

        var _this = this; 

        _this./*#*/configs_private = configs;
    }

    init() {
        
        console.log('vs [init]');

        var _this = this; 
        
        // _this./*#*/init_private();
        SP_WBC_Variations_Swatches.prototype.init_private.call(_this);

    }
}

window.document.splugins.wbc.variations.swatches = window.document.splugins.wbc.variations.swatches || {};

window.document.splugins.wbc.variations.swatches.core = function( configs ) {

    // console.log("[vs] core function called");
    jQuery.fn.sp_wbc_variations_swatches = function () {
        
        console.log("[vs] module called");

        return this.each(function () {

            // console.log("[vs] [jQuery.fn.sp_wbc_variations_swatches] each_loop");

            (new SP_WBC_Variations_Swatches(this,configs)).init();
        });
    };

};

jQuery(document).ready(function(){

    if (!window.document.splugins.common.is_admin) {
        //  publish it 
        window.document.splugins.wbc.variations.swatches.api = window.document.splugins.wbc.variations.swatches.core( common_configs.swatches_config );
    }
}); 

// if(window.document.splugins.common.is_item_page) {

//     jQuery(document).ready(function() {
    
//         // window.setTimeout(function(){

//             // window.document.splugins.wbc.variations.swatches.api.init();
//             base_container = jQuery( ( window.document.splugins.common._o( common_configs.configs, 'base_container_selector') ? common_configs.configs.base_container_selector : '.variations_form' ) );      
//             jQuery(base_container).sp_wbc_variations_swatches();

//         // },2000);    

//     } );

// }

// the variations gallery_images js module
class SP_WBC_Variations_Gallery_Images extends SP_WBC_Variations {


    constructor(element, configs){
        
        console.log("gim [init]");
        
        // Calling parent's constructor
        super(element, configs);

        this./*#*/configs_private;
        // #base_container_selector;
        this./*#*/$base_container_private;
        this./*#*/data_private;
        this./*#*/binding_stats_private;
        this./*#*/child_obj_private;
        this./*#*/$additional_container_private/*base_element*/;
        this./*#*/$slider_container_private;
        this./*#*/$zoom_container_private;
        this./*#*/$slider_loop_container_private;
        this./*#*/$wrapper_private;
        this./*#*/$variations_form_private;

        var _this = this; 
        
        _this./*#*/configs_private = jQuery.extend({}, {}/*default configs*/, configs);  

        // console.log('_this./*#*/configs_private');
        // console.log(_this./*#*/configs_private);

        // NOTE: base_container_selector is no more used after the module is upgraded to jQuery interface style, so it should be not supported. and must not be used in future. so commented below statment.
        // _this.#base_container_selector = ( window.document.splugins.common._o( _this./*#*/configs_private, 'base_container_selector') ? _this./*#*/configs_private.base_container_selector : ''  );     

        // NOTE: for the notes base_container object is the base_element if we consider it with analogy of _jQueryInterface style modules
        _this./*#*/$base_container_private = jQuery(element);   //( _this.base_container_selector );     
        console.log('gim [init] base_container_private');
        console.log(_this./*#*/$base_container_private);
        // console.log(element);

        _this./*#*/data_private = {};
        _this./*#*/binding_stats_private = {};
        
        _this./*#*/data_private.is_skip_sp_slzm = false;  
        _this./*#*/data_private.is_skip_sp_slider = false;  

        // NOTE: for products with simple type will not need this, but for variable products it will be needed. 
        _this./*#*/data_private.current_variation = null;
        // jQuery(document).ready(function(){
        //     setTimeout(function(){
        //         console.log('_this./*#*/data_private.current_variation_01');
        //         console.log(_this./*#*/data_private.current_variation);                
        //     },5000)

        // })
    
    }

     // and move below function at right place -- to a done
             // --  then need to call it from init_private function with section=init -- to a done
         // --  and remove the resolve part from it -- to a done
         // --  and the first statement need to be moved to init_private, but anyway comment that there after moving -- to a done
             // --  and instead of that create our planned module for external slider and zoom inside common js for now -- to a. done
                 // --  it will have name sp_slzm, actually search with sp_slzm and there are related tasks above -- to a done
                 // --  and then as mentioned there call the init function of api from appropriate place, but I think it is not mentioned there and we need to decide right place if there is better place then above mentioned init_private location -- to a done 
 
     ///////////////////////////////////////////////////////    
 
    /*#*/init_private() {

        console.log("gim [init_private]");
        console.log(this);

        var _this = this;

        super.init();

        console.log("gim [init_private] 01");

        if(window.document.splugins.common.is_category_page){

            _this./*#*/data_private.is_skip_sp_slzm = true; 
        }

        if(window.document.splugins.common.is_category_page){

            _this./*#*/data_private.is_skip_sp_slider = true; 
        }

        console.log("gim [init_private] 02");

        window.document.splugins.events.api.createSubject( 'gallery_images', ['process_images','sp_slzm_refresh', 'sp_variations_gallery_images_loaded', 'sp_slzm_init', 'sp_slzm_refresh_zoom', 'slider_thumb_click', 'process_zoom_template'] );

        // // For Single Product
        // $('.woo-variation-gallery-wrapper:not(.wvg-loaded)').WooVariationGallery(); // Ajax and Variation Product
        
        // ACTIVE_TODO_OC_START
        // ACTIVE_TODO It should be well noted that mere droping # for same name functions in parent and child class results in recurtion so we had to call it using prototype. When we enable back the support for # at that time simply uncomment below line and comment the line under neth it.
        // ACTIVE_TODO_OC_END
        // _this./*#*/init_preprocess_private(null);
        SP_WBC_Variations_Gallery_Images.prototype.init_preprocess_private.call(_this);
 
        // _this./*#*/compatability_private('init');
        SP_WBC_Variations_Gallery_Images.prototype.compatability_private.call(_this,'init');

    }
 
    /*#*/init_preprocess_private(event) {

        var _this = this;
        console.log("gim [init_preprocess]");
        console.log(this);
        console.log(_this./*#*/$base_container_private);
        
        // if(jQuery(_this.#base_container_selector+':not(.spui-wbc-gallery_images-product-type-variable):not(.spui-wbc-gallery_images-loaded)').length>0) {
        if( ! jQuery(_this./*#*/$base_container_private).hasClass('spui-wbc-gallery_images-product-type-variable') && ! jQuery(_this./*#*/$base_container_private).hasClass('spui-wbc-gallery_images-loaded') ) {

            console.log("gim [init_preprocess] if");

            // _this./*#*/preprocess_private(jQuery(_this.#base_container_selector+':not(.spui-wbc-gallery_images-product-type-variable):not(.spui-wbc-gallery_images-loaded)'), event);
            // _this./*#*/preprocess_private(_this./*#*/$base_container_private, event);
            SP_WBC_Variations_Gallery_Images.prototype.preprocess_private.call(_this,_this./*#*/$base_container_private, event);

        }

    }
 
    /*#*/preprocess_private(element, event) {

        var _this = this;
        console.log("gim [preprocess] m");

        // _this.additional_container/*base_element*/ = element;
        _this./*#*/$additional_container_private/*base_element*/ = /*jQuery( _this.base_element )*/jQuery(".spui-sp-variations-gallery-images");
        
            /*ACTIVE_TODO_OC_START
                 --  then I will tell you which to keep and which to drop -- to a 
            ACTIVE_TODO_OC_END*/
            _this./*#*/$wrapper_private = _this./*#*/$additional_container_private/*base_element*/.closest('.product');  /*ACTIVE_TODO we may need to manage this selector stability.*/
            // NOTE: since we are using .variations_form as the base_container_selector and it is our almost plan to use the .variations_form as base_container_selector for this module, so we have set $variations_form below from the $base_container.
            //     NOTE: however if we ever need to use other selector as base_container_selector for this module then we need to apply ternry operator condition below to handle such scenario 
            _this./*#*/$variations_form_private = _this./*#*/$base_container_private; //_this./*#*/$wrapper_private.find('.variations_form');
            // console.log("gim [preprocess] _this./*#*/$base_container_private");
            // console.log(_this./*#*/$base_container_private); 
             
        // ACTIVE_TODO_OC_START
        // ACTIVE_TODO need to add produce class at the appropriate container, if rerequired then simply take a look at different theme demos of ours and at demos of other plugins we were exploring -- to t 
        //     ACTIVE_TODO once the container is confirmed give its details to b or s to add it -- to b or -- to s 
        //         ACTIVE_TODO and below conditional logic will go in compatability matters, and it will apply to all the themes. since it is about finding .product container -- to s 
        //             --  ACTIVE_TODO and same for the variations_form and that will also go compatability matters for all the themes. and there is high chances that some theme might have the product class missing for the product container so lets do it asap -- to s 
        // ACTIVE_TODO_OC_END
        if( _this./*#*/$wrapper_private == null || _this./*#*/$wrapper_private.length == 0 ) {

            _this./*#*/$wrapper_private = jQuery( '.product' );  //  ACTIVE_TODO need to mature workaround here, the body class might be so broad so maybe need to look for post class or woo post class hooks classes and consider them as selector. this selector matter may going to be so important. we wind out soon as we roll out -- to s
        }
        if( _this./*#*/$variations_form_private == null || _this./*#*/$variations_form_private.length == 0 ) {

            /*ACTIVE_TODO_OC_START
            -- need to manage here selectore -- to s
            ACTIVE_TODO_OC_END*/
            _this./*#*/$variations_form_private = jQuery( 'form.variations_form' );  //  ACTIVE_TODO need to mature workaround here, or is it mature enough? -- to s
        }

        // _this./*#*/data_private.product_variations = _this./*#*/$variations_form_private.data('product_variations') || [];    

               /*ACTIVE_TODO_OC_START
               this.$attributeFields = this.$variations_form.find('.variations select');
               this.$target = this._element.parent();
               this.$slider = $('.woo-variation-gallery-slider', this._element);
               this.$thumbnail = $('.woo-variation-gallery-thumbnail-slider', this._element);
                ACTIVE_TODO_OC_END*/

        // console.log("gim [preprocess] _this./*#*/$variations_form_private");
        // console.log(_this./*#*/$variations_form_private);

        _this.product_id = _this./*#*/$variations_form_private.data('product_id');

        _this./*#*/data_private.is_variation_product =  (!window.document.splugins.common.is_empty(_this./*#*/configs_private.product_type) && _this./*#*/configs_private.product_type == 'simple') ? false : true; //_this./*#*/$variations_form_private.length > 0;
 
        console.log('gim [preprocess] is_variation_product');
        console.log(_this./*#*/data_private.is_variation_product);
        
        if(_this./*#*/data_private.is_variation_product) {

            _this./*#*/data_private.product_variations = _this./*#*/$variations_form_private.data('product_variations') || [];      

        } else{

            _this./*#*/data_private.product_variations = _this./*#*/$variations_form_private.data('product_simple') || [];      
        }

        _this./*#*/data_private.is_ajax_variation =  _this./*#*/data_private.product_variations.length < 1;

        // _this.#$additional_container/*base_element*/.addClass('spui-wbc-gallery_images-loaded');
        _this./*#*/$base_container_private.addClass('spui-wbc-gallery_images-loaded');
 
        _this./*#*/$slider_container_private = window.document.splugins.common.is_item_page ? _this./*#*/$additional_container_private/*base_element*/.find( '.'+ _this./*#*/configs_private.classes.slider.container ) : _this./*#*/$additional_container_private/*base_element*/.closest( '.'+ _this./*#*/configs_private.classes.slider.container );
        _this./*#*/$zoom_container_private = window.document.splugins.common.is_item_page ? _this./*#*/$additional_container_private/*base_element*/.find( '.'+ _this./*#*/configs_private.classes.zoom.container ) : jQuery( _this./*#*/configs_private.classes.zoom.container.replace('{product_id}', _this.product_id) );

        console.log("gim [preprocess] _this./*#*/$zoom_container_private");
        console.log(_this./*#*/$zoom_container_private);

        console.log("gim [preprocess] _this./*#*/$slider_container_private");
        console.log(_this);

        _this./*#*/$slider_loop_container_private = _this./*#*/$slider_container_private.find( '.'+ _this./*#*/configs_private.classes.slider.loop_container );

        
               // ACTIVE_TODO if required then need to init def for simple product and so on.
               // this.defaultGallery();
 
         // --  in our flow the events and other functions heirarchy called from this preprocess is, for us the initEvents level of flow -- to h. just for the notes. done
             // --  and then the init or refresh function of the external slider/zoom api that is to be called, after the dom updated with slider/zoom templates is what will cover the image loaded flow of plugin we are exploring. done
                // ACTIVE_TODO however we are still not managing the reset layer so need to implement that in base reset_variation function. 
 
         /*ACTIVE_TODO_OC_START
         --  we need to call the update dom templates functions on page load when it is non variation product -- to h -- to a. tally this and all sub tasks below.  
             // --  while for variation products it will be called by woo legacy api when the variation change event does fire on page load, so nothing to do in that case 
                 --  but yeah in either case after dom templates functions are done then need to call the required functions heirarchy which would cover something similar like what init set of functions doing in the plugin we were exploring -- to h. and so this function heirarchy calling would definitely include the call to init function of the js api for slider and zoom.  
                     --  so some set of functions heirarchy would not be called initially for variation products -- to h 
                         --  otherwise if required then we can simply call it during init and then it will be called again on woo legacy change event called during page load so in this case it would be called twice during page load -- to h 
                             --  so this in essense clears the loading stack quest and points mentioned/planned in the process_template function of this module -- to h. just for the notes. 
                            NOTE : some part of the above  are covered but confirm to be sure  
         if (!this.is_variation_product) {
         this.imagesLoaded();
         }
 
         if (this.is_variation_product) {
         this.initSlick();
         this.initZoom();
         this.initPhotoswipe();
         }
         ACTIVE_TODO_OC_END*/
 
                
                /*ACTIVE_TODO_OC_START
                 even if the plugin we are exploring does doing it or not, we would like to do it most likely. and it seems related to resize events so might be connecting to the responsive ness matters, so have to confirm on that -- to t 
                     --  and then lets do it -- to h and -- to s 
               key: "defaultDimension",
               value: function defaultDimension() {
                 var _this2 = this;
                // ACTIVE_TODO php mathi setting lavana and ahiya apply karavana -- to h & -- to s & -- to t 
                 // console.log(this._element.height(), this._element.width());
                 this._element.css('min-height', this._element.height()).css('min-width', this._element.width());
    
                // -- ACTIVE_TODO need to double discuss with to t -- to t
                 $(window).on('resize.wvg', splugins._.debounce(function (event) {
                   if (event.originalEvent) {
                     _this2._element.css('min-height', _this2._element.height()).css('min-width', _this2._element.width());
                   }
                 }, 300));
                 $(window).on('resize.wvg', splugins._.debounce(function (event) {
                   if (event.originalEvent) {
                     _this2._element.css('min-height', '').css('min-width', '');
                   }
                 }, 100, {
                   'leading': true,
                   'trailing': false
                 }));
               
               }
               ACTIVE_TODO_OC_END*/


                 /*ACTIVE_TODO_OC_START
                 we would not like to manage extra layer of ajax to get default gallery and so on, if it is not necessary by standard flow but if by any chance standard flows does require handling any exceptional scenarios then we would need to do it -- to h and -- to d 
                     --  here check if that wc ajax event is if invoked by the plugin we were exploring? it might not be but still confirm and in the first place check if the execution even reaching till ajax since it was not noticed in the browser console -- to h 
                         --  still need to research about the ajax variation but above two tasks is mostly unnecessary so we can mark them invalid after 2nd revision -- to h
                             --  research about the ajax variation, but after discussing with me -- to s 
                                ACTIVE_TODO we need to start very soon 
                                    When your variable product has more than 30 variations, WooCommerce starts to use ajax to load your selected variation
                                    https://iconicwp.com/blog/modify-ajax-variation-threshold/
                
                    for below mattter also research on WooCommerce ajax variations with keywords WooCommerce ajax variations legacy -- to h 
                    --  research about the ajax variation, but after discussing with me -- to s 
             // For Single Product
             $('.woo-variation-gallery-wrapper:not(.wvg-loaded)').WooVariationGallery(); // Ajax and Variation Product
            ACTIVE_TODO_OC_END*/
 
             
 
             // $(document).on('wc_variation_form', '.variations_form', function () {
             //   $('.woo-variation-gallery-wrapper:not(.wvg-loaded)').WooVariationGallery();
             // }); // Support for Jetpack's Infinite Scroll,
        /*ACTIVE_TODO_OC_START
            //  so a call from here to the compatability function of this module, and that will cover all compatability matters of load time inlcuding the promize resolve block of the plugin we were exploring. so call compatability with section=bootstrap -- to d done
                 // ACTIVE_TODO we may like to mack use of promise resolve
 
 
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
        ACTIVE_TODO_OC_END*/

        // console.log(" gallery_images preprocess debounce called " );
        splugins._.debounce(function () {   
 
            // console.log(" gallery_images debounce in  " );

            // since we are going to provide the refresh api for external slider and zoom so similarly we should provide the init api function also, and it would most like be from here -- to h or -- to s. from here means after all the preprocess and everything else is covered. done
                // -- ACTIVE_TODO right now it is done from template functions, but if required then need to move init call after all function calls of events and effects are done. 
            
            /*ACTIVE_TODO_OC_START
            have t research on the photo swipe events and effects management that we might need to do -- to t. explore the plugin we are exploring and confirm the events and effects management that we would like to do. 
            _this.initPhotoswipe();
            ACTIVE_TODO_OC_END*/
 
            /*ACTIVE_TODO_OC_START
            note that apart from above most important for us is to test extensively and that 10 demo and 5 slider zoom experiements must be covered in details, and we should research on what available on all community plugins and list out the set of things which we have issues, things that we would like to do and innovations that should be brought to community -- to t and -- to kk and -- to ks and -- to a 
            ACTIVE_TODO_OC_END*/

            //
            //  data applicable loops 
            //
            // pre process data and process collections that would be necessary for neat and quick ops 
            _this./*#*/data_private = _this./*#*/preprocess_data_private( _this./*#*/data_private );   

            // ACTIVE_TODO_OC_START
            // do necessary bindings for the gallery images  
            //     --done  will need a dedicated function namely process_images -- to d 
            //         --  and since the actual images would be available only after the variation change event(and specifically the event binding and other stat should be set and maintained for currently active images of current variation only so it must be on variation change event, and in case of simple product types that will not be the cases) so the process_images function should be called on each such stat changes -- to d 
            //             --done  move entire section below inside that function -- to d 
            // ACTIVE_TODO_OC_END
            // _this./*#*/process_images_private();   
            SP_WBC_Variations_Gallery_Images.prototype.process_images_private.call(_this);

         
        }, 500)();

    }

    /*#*/preprocess_data_private(data) {

        var _this = this;
         // console.log("gim [preprocess_data]");
         // console.log( data.product_variations ); 

        data.types = [];
        if(!_this./*#*/data_private.is_ajax_variation) {

            jQuery( data.product_variations ).each(function (i, variation) {

               // -- variation_gallery_images -> gallery_images data

              jQuery(variation.variation_gallery_images).each(function (index,image) {
               
                // -- data.types -> gallery_images types(images,video,360)

                data.types.push(image.extra_params_org.type);
              });

              return false;
            });
            
        }else{
            
            // ACTIVE_TODO Temp Below if is temporary and as soon as we refectory the loading sequence for something such to ensure that we have the types available here even for the ajax variation are enabled than at that time just remove the below hardcoded section and use something like in above if.
            data.types.push('image');
            data.types.push('video');
        }


        return data;
    
    }
 
    /*#*/process_images_private(type=null, element=null) {
        
        // console.log("gim [process_images]");

        var _this = this;

        // below types var neet to be prepaired in preprocess_data -- to a done
          // -- also neet to clear type managment in wbc variation class. simply set type in extra perance -- to b or -- to a done
            // -- also we neet to check base type flow and especially key to set , in shape config file -- to s done

        if(type == null) {
            
            console.log("gim [process_images] if");

            // //-- aa types temp banavelo se @a --

            // _this./*#*/data_private.types = ["image", 'video', 'darklight_hand_image', '360_video_url'];
            // console.log(_this./*#*/data_private.types);

            //  process images
            jQuery( _this./*#*/data_private.types ).each( function( i, type_inner ) {
    
               console.log("gim [process_images] if innner loop " + type_inner);
               // console.log(_this.#configs.types);
 
                 // ACTIVE_TODO_OC_START
                 // --  the key controller here in case of gallery_images module, for defining the calling sequences and flow will be, the image index(even though we had plan to use index but that is only when it is must to use that), otherwise there should be gallery_item_type field that take care implicitly the things like custom_html images for zoom area and so on 
                 //         --  so should we plan gallery_item_type field support? maybe it is good idea, to have such field support right from the config file function planned for each extensions, while for wbc gallery items like image and videos it will be gallery_item_type=image or video. -- to h 
                 // --  so above preprocess_data call should simply prepare two attribute types list, first is attribute_types and second is ... or simply one only. and simply delegate everything else that is not coming under attribute_types, to the extensions layers. and should simply publish this list of attribute_types from backend. 
                 // NOTE: and one of the key benefit of this approach is that these layers will emit the broadcast notification event only if they detect the type to be the premiumly supported type and otherwise not. which would minimize process and little or not hanging processes and less debug console logs that would appear around. 
     
                 // is the woo input template type means dropdown is mandatorily kept by plugins, not seems likely but still confirm and then we need a way to determine(always) the exact input type based on the field/input type selected on woo panel or otherwise simply support the input_template_type field which will be set in background implicitly based on the field/input type selected on woo panel -- this field is simply better then managing many different template names of extensions and defining based on that -- and it will default to the above field/input type for wbc nothing to manage, only if condition below that if input_template_type is not defined then read simply above field/input type. and in case of extensions that need to be defined based on the template that is selected on their admin panel. so this template option should be only be defining it and passing it where applicable so that is gets here. and it is need to be defined based on that only to avoid confusion and many unnecessary and confusing configuration overheads. no simply need to stick to attribute type only means field/input-type selected on woo panel and that is standard and clean. so implement here based on that only. -- to h or -- to d 
                 // ACTIVE_TODO_OC_END
                
                 // console.log(_this./*#*/configs_private.types);

                // ACTIVE_TODO temp. this is temparary but if we can confirm it as meture structure than lets make it final and remove active_todo temp.-- to a -- to h
                //     ACTIVE_TODO Before validating the structure to be mature or not there is a consern that this null type of item which is actually product default thumb, so the concern is that it is not part of the prime data layer of variations. While taking this dicesion we would like to go throgh the flow and notes of the simple type implimentation on our whole php data layer and js layer. -- to h -- to a
                if(window.document.splugins.common.is_empty(type_inner)) {
                   type_inner = 'image'; 
                }
                 if (window.document.splugins.common._o(_this./*#*/configs_private.types, type_inner)) {
                    
                    console.log("gim [process_images] if innner loop if");
                    // console.log("gallery_images process_images inner if");

                    // _this./*#*/process_images_inner_private(type_inner, element);    
                    SP_WBC_Variations_Gallery_Images.prototype.process_images_inner_private.call(_this,type_inner, element);   
                
                } else {
                        // console.log("gim [process_images] if innner loop else");

                        //     ACTIVE_TODO_OC_START
                        //     --  and we can and should simply use observer pattern events to host for example the slider listener here and then emit internal change event from here     
                        //         --  still in this case the variation.swatches will register its event subject and emit bootstrap level notification like bootstrap/on.load maybe on.load is more user friendly 
                        //         --  then at that time applicable extension will bootstrap the js layer 
                        //         --  and when the change event occurs the applicable extension will simply call the ...swatches.api function to notify back about their change event or the events module can add support to provide callbacks to subscriber so that they can reply with something when they have done something based on notification. so it can be called the notification_response. -- but it will be about breaking our own rule of keeping the events simple. so even if we must do then in that case it must be till notification_response only and no further callback back and forth can be supported. otherwise it mostly lead to long debug sequences. --  however it has benefit of less maintainance since otherwise extensions need to know about the ...swatches.api but in case of events support of notification_response it only need to learn about and depend on the variations.swatches subject of events module. and as long as we can keep it limited to notification_response only and do not extend it further it will be clean to be frank. -- to a .check other related task
                        //     ACTIVE_TODO_OC_END

                        //         --  and we are planning to host darker/lighter slider support also from here as usual so it will be just like above slider example -- to a
                        //         -- subcribe kariye tyare type and callback perameter malse -- to a
                        //                 --  and since it is different kind processing that is required after change event so the input_template_type must be defined uniquely like slider_no_variation 
                        //                     NOTE: and yeah on that note everything of the sp_variations module must be dynamic and nothing should be hardcoded so slider_no_variation input template type must be passed right from where the template is defined on admin to till here


                    var process_images_callback = function(type_inner_1) {

                        if (window.document.splugins.common._o(_this./*#*/data_private.types, type_inner_1)) {
                            // _this./*#*/process_images_private(type_inner_1, element);
                            SP_WBC_Variations_Gallery_Images.prototype.process_images_private.call(_this,type_inner_1, element);

                        }

                    };

                    window.document.splugins.events.api.notifyAllObservers( 'gallery_images', 'process_images', {type:type_inner}, process_images_callback, _this./*#*/$base_container_private );

                    /*ACTIVE_TODO_OC_START
                    // --  it wil be a specific block here for devices and configs -- to d done
                    // --  while for the rest create dedicated functions like process_template, process_events and so on. for the layers listed below. 
                     --  create below list of functions after the process_attribute_types function, and apply above peudo flows there and rest of the flows those functions should adapt from the flow notes from the heirachical flow plan at top -- to d and -- to h
                    //         --done process_template -- to d
                    //         --done process_pages -- to d
                    //         --done process_slider_and_zoom -- to d
                    //         --done process_events -- to d
                    //         --done process_and_manage_effects -- to d
                    //         --done process_compatability_matters -- to d
                    ACTIVE_TODO_OC_END*/
                    
                }
            }); 
        } else {
            
            // console.log("gim [process_images] else");

            // _this./*#*/process_images_inner_private(type, element);
            SP_WBC_Variations_Gallery_Images.prototype.process_images_inner_private.call(_this,type, element);

        }

        // ACTIVE_TODO temp. 
        // _this.data.current_variation = _this.data.product_variations[4];
        // _this.#process_images_template(_this.data.product_variations[0].variation_gallery_images);
        
        if (!_this./*#*/data_private.is_variation_product) {

            console.log("gim [process_images] if2");
            console.log(_this./*#*/data_private);

            _this./*#*/data_private.current_variation = _this./*#*/data_private.product_variations[0];
            
            console.log(_this./*#*/$zoom_container_private);
            console.log(_this./*#*/data_private.current_variation);

            // _this./*#*/process_images_template_private(_this./*#*/data_private.current_variation.variation_gallery_images);        
            _this.process_gallery_images_data_private(_this./*#*/data_private.current_variation.variation_gallery_images);
        }

        var sp_variations_gallery_images_loaded_callback = null ;
        window.document.splugins.events.api.notifyAllObservers( 'gallery_images', 'sp_variations_gallery_images_loaded', {}, sp_variations_gallery_images_loaded_callback, _this./*#*/$base_container_private );
 
    }

    /*#*/process_images_inner_private(type, element){

        console.log("gim [process_images_inner]");

        var _this = this;
         // ACTIVE_TODO_OC_START   
          //  do necessary logic if support is available
          //     --  that means based on type call/process necessary functions/layers for example events functions(some events functions already defined below), template functions/layers, pages functions/layers, like events the effects functions/layers, plugins/themes applicable compatiblity function calls, slider and zoom functions/layers(note that even for swatches modules there might be some conditions or conditional logics that would be required) -- to d 
          //     --  and also do call/process necessary functions/layers for the provided device type(and maybe some of their specifications would also need to be handled in future like width(which would otherwise mostly be dynamically handled), resolution and so on ACTIVE_TODO) and configs, but it will be a specific block here only and the dedicated function for them sound unnecessary -- to d
          //         --  and we need some logic of if function or layer need to be called once only then take care of that, for all above functions, including the devices and configs that are to be handled from here -- to d 
          //         --  and as usual there will going to be if conditions for applicable matters in applicable functions and their layers defined above, to handle the devices and configuration specific matters. and so the dedicated blocks of devices and configs will handle some specific matters which do not necessarily mixed with other things mentioned above like events, template, pages and so on layers. -- to h    
          // ACTIVE_TODO_OC_END                    

              _this./*#*/process_template_private(type);

              _this./*#*/process_pages_private(type);
              
              if(!_this./*#*/data_private.is_skip_sp_slider) {

                _this./*#*/process_slider_and_zoom_private(type);  
              }
              
              // _this./*#*/process_events_private(type);
              SP_WBC_Variations_Gallery_Images.prototype.process_events_private.call(_this,type);

              _this./*#*/process_and_manage_effects_private(type);

              _this./*#*/process_compatability_matters_private(type);

          // ACTIVE_TODO_OC_START    
          // -   devices 
          //         --  for layers which need to have complete different implementation for mobile etc. then for them applicable flgas should be set/initiated from the higher layers layers for example the slider and zoom would be completely different plugin for mobile devices -- but anyway now we will see to it again to reconsider using the new slider also for mobile but only if that is beneficial in terms of setup time and maintainance time, for the later it would be beneficial but not sure about the initial setup and implementation time and challanges that may arise. 
          //             --  and we would like to reconsider the zoom also in the same way like above 
          //     --  browser - will matter so much 
          //     --  screen size - need to handle occasionally only as long as overall UI/UX layers are mature 
          //     --  os 
          // ACTIVE_TODO_OC_END
              
              if(window.document.splugins.common.is_mobile){

              }else if(window.document.splugins.common.is_tablet){

              }else if(false/*browser*/){

              }else if(false/*screen size*/){

              }else if(false/*os*/){

              }
          // ACTIVE_TODO_OC_START    
          // -   configs 
          //     --  will control decision of whether to display certain section or not, for example whether to display template part of attribute name (for us ribbon wrapper)
          //     --  or whether to show tooltip or not 
          // ACTIVE_TODO_OC_END    
              // if( type == 'radio' ) 

        if(!window.document.splugins.common.is_empty(_this./*#*/child_obj_private)) {

            _this./*#*/child_obj_private.process_images_inner();
        }
         
    }
    
    /*#*/template_private( tmpl_id, templating_lib ) {

        // console.log("gim [template]");
        // console.log(tmpl_id);
        // console.log(templating_lib);
        
        var _this = this;

        return window.document.splugins.templating.api.get_template( tmpl_id, templating_lib );
    
    }

    template_public( tmpl_id, templating_lib ) {

        var _this = this;

        return _this./*#*/template_private( tmpl_id, templating_lib );
    
    }

    /*#*/apply_template_data_private( template, template_data, templating_lib ) {
        
        var _this = this;

        console.log("gim [apply_template_data]");

        return window.document.splugins.templating.api.apply_data( template, template_data, templating_lib );
    
    }

    apply_template_data_public( template, template_data, templating_lib ) {
        
        var _this = this;

        return _this./*#*/apply_template_data_private( template, template_data, templating_lib );
    
    }

    /*#*/process_template_private(type) {
    
        // console.log("gim [process_template]");
        var _this = this;
         // ACTIVE_TODO_OC_START
         // --  or whether to show tooltip or not 
         // if( type == 'radio' ) 
         // ACTIVE_TODO_OC_END            
         
 


        /*ACTIVE_TODO_OC_START
         note that we may like to create some dedicated functions for updating the actual templates in dom, since this process_template function is broad layer for handling all template related -- to h 
             --  and should we update templates on the init_private means page load event also, I think we should only if it is required by community standards. and since it would help in avoiding load time hangs to we must confirm with legacy standards and the plugin we were is doing -- to h 
                 --  and once the dom updated of the slider and zoom area the we would like to call many functions or simply can call the init layers functions like preprocess is kind of init level of function -- to h 
        ACTIVE_TODO_OC_END*/
    
         // --  there will be two functions that will be called from here like, process_slider_template and process_zoom_template -- to a done
             // --  and this two function would recieve all images at once so that they can instantly update template -- to a done
                 // --  and these functions would most likely be called from variation_change base event handling function, and since we do not have any requirement so far or managing the template at page load time so that is fine -- to a done
                     // --  but need to confirm if the function calls are as per heirachical structure flow we are planning -- to h. done 


        // NOTE: from here the process images template will be called only if we need to manage the templates at load time which is not required so far     
        
        if(!_this./*#*/data_private.is_skip_sp_slzm) {

            if (!_this./*#*/data_private.is_variation_product) {
             
                _this./*#*/sp_slzm_init_private();
            }
        }

    }
 
    /*#*/process_images_template_private(images) {
 
     console.log("gim [process_images_template]");
        
      var _this = this;  

      var hasGallery = images.length > 1;

      // this._element.trigger('before_woo_variation_gallery_init', [this, images]);

      // ACTIVE_TODO if requared we may neet to provide destroy or stop listener in our sp_slzm api 
      // this.destroySlick();    

      if(!_this./*#*/data_private.is_skip_sp_slider){

        _this./*#*/process_slider_template_private(images,hasGallery);  
      }
      
      var index = 0;
      if (typeof _this./*#*/$slider_loop_container_private.data('selected-index') !== 'undefined') {
        index = _this./*#*/$slider_loop_container_private.data('selected-index');
      }
        console.log('aa_process_images_template_private2');


      _this./*#*/process_zoom_template_private(images,index,hasGallery);

      if (hasGallery) {
        _this./*#*/$zoom_container_private.addClass('spui-wbc-gallery_images-has-product-thumbnail');
      } else {
        _this./*#*/$zoom_container_private.removeClass('spui-wbc-gallery_images-has-product-thumbnail');
      }

      console.log('gim [process_images_template] is_skip_sp_slzm');
      console.log(_this./*#*/data_private.is_skip_sp_slzm);
      if(!_this./*#*/data_private.is_skip_sp_slzm){
        console.log('gim [process_images_template] not is_skip_sp_slzm');
        splugins._.delay(function () {
            
            if (_this./*#*/data_private.is_variation_product) {
                
                // if(typeof(_this.data.is_sp_slzm_init_done) == undefined || _this.data.is_sp_slzm_init_done == false) {
                if( !window.document.splugins.common._o(_this./*#*/data_private, 'is_sp_slzm_init_done') ){

                    // ACTIVE_TODO debug should be called once -- to s
                    _this./*#*/data_private.is_sp_slzm_init_done = true;
                    _this./*#*/sp_slzm_init_private();

                }
               
            }

            var sp_slzm_refresh_callback = null;
            window.document.splugins.events.api.notifyAllObservers( 'gallery_images', 'sp_slzm_refresh', {}, sp_slzm_refresh_callback, _this./*#*/$base_container_private );

        }, 1); 

      }

        // var process_images_template_callback = null;
        // window.document.splugins.events.api.notifyAllObservers( 'gallery_images', 'process_images_template', { current_variation : _this./*#*/data_private.current_variation }, process_images_template_callback, _this.$base_container_private );

    };
    
    process_gallery_images_data_private(images) {

        var _this = this;

        _this.process_images_template_private(images);

        var process_gallery_images_data_callback = null;
        window.document.splugins.events.api.notifyAllObservers( 'gallery_images', 'process_gallery_images_data', { /*images: images,*/ current_variation : _this./*#*/data_private.current_variation }, process_gallery_images_data_callback, _this.$base_container_private );
    };

    /*#*/process_slider_template_private(images,hasGallery){

        // console.log("gim [process_images_template]");

        var _this = this;

        var templating_lib = window.document.splugins.common._o( _this./*#*/configs_private, 'templating_lib') ? _this./*#*/configs_private.templating_lib : 'wp';
        
        var template_var = _this./*#*/template_private( _this./*#*/configs_private.template.slider.id, templating_lib );
        
        var slider_inner_html= '';
        // var slider_inner_html = images.map(function (image) {
        jQuery( images).each(function (index_inner,image) {

            image.index = index_inner;

            slider_inner_html += _this./*#*/apply_template_data_private(template_var, image, templating_lib);
        });

        if(hasGallery){

            _this./*#*/$slider_loop_container_private.html(slider_inner_html);
        }else{

            _this./*#*/$slider_loop_container_private.html('');
        }

    };

    /*#*/process_zoom_template_private(images,index,hasGallery){

        console.log("gim [process_images_template]");

        var _this = this;

        var templating_lib = window.document.splugins.common._o( _this./*#*/configs_private, 'templating_lib') ? _this./*#*/configs_private.templating_lib : 'wp';
        
        var zoom_inner_html = '';

        console.log("gim [process_images_template] images");
        console.log(images);

        jQuery( images).each(function (index_inner,image) {
            
            var type_template = null;

            if( _this./*#*/configs_private.product_variations_configs.is_gallery_images_type_based_template == 1 ){

                type_template = !window.document.splugins.common.is_empty(image.extra_params_org.type) ? image.extra_params_org.type : '';
            } else {

                type_template = index_inner;
            }

            image.index = index_inner;

            // console.log("gim [process_images_template] images_loop");
            // console.log(index_inner);

            if(_this./*#*/configs_private.template.zoom.all_in_dom == 0){
                
                if(index == index_inner){
                    
                    console.log("gim [process_images_template] images_loop if if " + index_inner);
                    console.log(_this./*#*/configs_private.template.zoom.id+'_'+/*index_inner*/type_template, templating_lib);

                    var template_var = _this./*#*/template_private( _this./*#*/configs_private.template.zoom.id+'_'+/*index_inner*/type_template, templating_lib );

                    zoom_inner_html += _this./*#*/apply_template_data_private(template_var, image, templating_lib);

                }else{

                    // console.log("gim [process_images_template] images_loop if else");

                    // return '';
                }

            }else{
                // console.log("gim [process_images_template] images_loop else");

                var template_var = _this./*#*/template_private( _this./*#*/configs_private.template.zoom.id+'_'+/*index_inner*/type_template, templating_lib );

                zoom_inner_html += _this./*#*/apply_template_data_private(template_var, image, templating_lib);
            }
            
        // }).join('');
        });

        console.log("gim [process_images_template] $zoom_container");
        console.log(_this./*#*/$zoom_container_private);

        // if (hasGallery) {

           _this./*#*/$zoom_container_private.html(zoom_inner_html);
       
        // } else {

        //   _this./*#*/$zoom_container_private.html('');
        // } //this._element.trigger('woo_variation_gallery_init', [this, images]);

        // console.log("gim [process_images_template] 01");

        // ACTIVE_TODO/TODO it is better hierarchically, if the click is bind on our img-item class stuctor only, and then we receive here that element only in above function Arguments.
        //     -- and than we can simply get type from element data-type which is mentanable due to well maintained heirachy insted of below index based image data read which is bound to change.
        var process_zoom_template_callback = null;
        window.document.splugins.events.api.notifyAllObservers( 'gallery_images', 'process_zoom_template', {type:images[index].extra_params_org.type,image:images[index]}, process_zoom_template_callback, _this./*#*/$base_container_private ); 

    }

    /*#*/process_pages_private(type) {
        
        // console.log("gim [process_pages]");

        var _this = this;

        if(window.document.splugins.common.is_category_page){
 
        }else if(window.document.splugins.common.is_item_page){
 
        };
 
    }
 
    /*#*/process_slider_and_zoom_private(type) {
 
    }
 
    /*#*/process_events_private(type) {

        console.log("gim [process_events]");

        var _this = this;
    
        if(!_this./*#*/data_private.is_skip_sp_slider){

            console.log("gim [process_events] if");

            _this./*#*/slider_thumb_click_listener_private(type);   
        }    
 
        _this./*#*/zoom_area_hover_listener_private(type);
 
        _this./*#*/variation_change_listener_private(type);
 
        _this./*#*/reset_variation_listener_private(type);

        _this./*#*/swatches_more_click_listener_private(type);
 
    }
 
    /*#*/process_and_manage_effects_private(type) {
 
    }
 
    /*#*/process_compatability_matters_private(type) {
        
        var _this = this;

        if(type == 'image'){
 
            // _this./*#*/compatability_private("image_section");
            SP_WBC_Variations_Gallery_Images.prototype.compatability_private.call(_this,"image_section");
 
        }else if(type == 'video'){
 
            // _this./*#*/compatability_private("video_section");
            SP_WBC_Variations_Gallery_Images.prototype.compatability_private.call(_this,"video_section");
 
        }
 
    }

    /*#*/slider_thumb_click_listener_private(type) {
        
        var _this = this;

        console.log("gim [slider_thumb_click_listener]");

        /*ACTIVE_TODO_OC_START
        // as per the one of the fundamental objective of the heirachical and layered calling sequence structures in these two modules, the type variable will be overridden here if there is anything in unique need to be handled in these layers. and the rest all will default to type equal to default. -- to s done
            -- so here there will be radio type that will be allowed as is -- to s 
                --  and since the actual type var would be needed down the layers for some business logic, to ensure dynamics, which is also one of the objectives of these looped, layered calling flow, so type var will be kept as it is and the new var uniquely_managed_type will be created -- to s 
                    --  and uniquely_managed_type will be set to value radio for radio. -- to s 
                        --  this might be invalid, we most likely only need to keep or put if condition based on type variable so uniquely_managed_type can be set to default even for radio. but lets give it a cross thought before doing so. -- to h & -- to s
                            --  and since now all three listeners of swatches module are deriving from the attribute_template loop so uniquely_managed_type may not be needed even in rest of the functions down the listners layers. -- to h & -- to s
                                    --  however for gallery_images module we most likely need it because our event binding is general based on slider thumb mostly. so lets confirm once before doing so. -- to h & -- to s 
                        // --  and will be set to default for the rest all -- to s done
            ACTIVE_TODO whenever we need to extend above logical peudo then that must be well thought and cross confirmed to avoid adding complexity or issues through peudo. 
        ACTIVE_TODO_OC_END*/

        var uniquely_managed_type = null;
        if(type == 'radio'/*change radio with your uniquely managed type*/) {

            uniquely_managed_type = type;

        } else {

            uniquely_managed_type = 'default';            

        }

        if(window.document.splugins.common._b(_this./*#*/binding_stats_private, 'slider_thumb_click_listener', uniquely_managed_type)){
            return false;
        }
        
        // console.log("gim [slider_thumb_click_listener] _this./*#*/$slider_loop_container_private");
        // console.log(_this./*#*/$slider_loop_container_private);

        _this./*#*/$slider_loop_container_private.on('click', 'img', function () {
            console.log("gim [slider_thumb_click_listener] on_click");
            _this./*#*/on_slider_thumb_click_private(type,this);            
        });
 
    }
 
    /*#*/zoom_area_hover_listener_private(type) {

        // console.log("gim [zoom_area_hover_listener]");
        
        var _this = this;

        var uniquely_managed_type = null;
        if(type == 'radio'/*change radio with your uniquely managed type*/) {

            uniquely_managed_type = type;

        } else {

            uniquely_managed_type = 'default';            
            
        }

        if(window.document.splugins.common._b(_this./*#*/binding_stats_private, 'zoom_area_hover_listener', uniquely_managed_type)){
            return false;
        }
 
        _this./*#*/on_zoom_area_hover_private(type);
 
    }
 
    /*#*/variation_change_listener_private(type) {

        console.log("gim [variation_change_listener]");

        var _this = this;

        // console.log("variation_change_listener");
        var uniquely_managed_type = null;
        if(type == 'radio'/*change radio with your uniquely managed type*/) {

            uniquely_managed_type = type;

        } else {

            uniquely_managed_type = 'default';            
            
        }

        if(window.document.splugins.common._b(_this./*#*/binding_stats_private, 'variation_change_listener', uniquely_managed_type)){
            // console.log('variation_change_listener return false');
            return false;
        }
        
        console.log("gim [variation_change_listener] 01");
        console.log(_this./*#*/$variations_form_private);

        _this./*#*/$variations_form_private.on('show_variation', function (event, variation) {
            
            console.log("gim [variation_change_listener] show_variation");
            // console.log(_this.#$variations_form);
            console.log(variation);

           // -- aya only is_category_page ni if condition mari se 02-11-2022 @a --
           if(window.document.splugins.common.is_category_page) {
               
               if(!window.document.splugins.common.is_empty(event) && !window.document.splugins.common.is_empty(variation)) {

                    console.log("gim [variation_change_listener] show_variation if");

                    _this./*#*/set_variation_url_private(event, variation);

               }
           }

           _this./*#*/on_variation_change_private(event, variation);
         
        });
 
    }

    /*#*/swatches_more_click_listener_private(type) {

        var _this = this;
        console.log('gim [swatches_more_click_listener_private]');
        console.log(_this./*#*/$variations_form_private.find('.spui-wbc-swatches-variable-item-more'));

        jQuery(_this./*#*/$variations_form_private.find('.spui-wbc-swatches-variable-item-more')).on('click', function () {

            console.log('gim [swatches_more_click_listener_private] click');
           _this./*#*/on_swatches_more_click_private(type,this);
         
        });
 
    }

    /*#*/create_variation_url_private(element, event, variation) {

        // console.log("gim [create_variation_url]");

        var _this = this;
        var attributes = [];        

        // https://stackoverflow.com/questions/54965487/get-currently-selected-variation-and-data-from-woocommerce-variable-product
        jQuery(_this./*#*/$base_container_private.find('table.variations select')).each(function() {
            
            var value = jQuery(this).val();
            if (value) {
                attributes.push({
                    id: jQuery(this).attr('name'),
                    value: value
                });
            }/* else {
                allAttributesSet = false;
            }*/
        });

        var url = element.attr('href');

        url = url +'?variation_id='+ variation.variation_id;

        console.log('create_variation_url_private_11');
        console.log(url);

        // ACTIVE_TODO as soon as required we need to enabled url support if applicable for simple type product 
        //     ACTIVE_TODO very soon we should also use here the php layer router class Query perams function layer instant of directly using hard coded_attr_checklist etc formate  
        var attributeSlug_global = '';
        jQuery.each(attributes,function(key, val) {
            
            var attributeSlug = val.id.replace('attribute_',''); //val.id.replace('attribute_pa_','');
            // url += '&_attribute=' + attributeSlug + '&checklist_' + attributeSlug + "=" + val.value;
            attributeSlug_global += ',' + attributeSlug;
            url = window.document.splugins.common.updateURLParameter(url, 'checklist_' + attributeSlug, val.value);
        });

        url = window.document.splugins.common.updateURLParameter(url, '_attribute', attributeSlug_global);
        
        _this./*#*/$zoom_container_private.data('sp_variation_url',url);
        
        console.log('create_variation_url_private_22');
        console.log(url);

        return url;
    
    }    

    /*#*/get_loop_box_anchor_private(event, variation) {

        // console.log("gim [get_loop_box_anchor_private]");

        var _this = this;       

        if(!window.document.splugins.common.is_empty(_this.$finalAnchor)) {
            
            console.log("gim [get_loop_box_anchor_private] if");
            console.log(_this.$finalAnchor);      
            
            return _this.$finalAnchor;
        }

        console.log("gim [get_loop_box_anchor_private] 01");

        var aLocateclass_p = 'woocommerce-LoopProduct-link';
        var liLocate_class_p = 'product';

        var liLocate = _this./*#*/$base_container_private.closest('.' + liLocate_class_p);

        if( window.document.splugins.common.is_empty(liLocate)){

            var liLocate = _this./*#*/$base_container_private.closest('li');
            
            if(window.document.splugins.common.is_empty(liLocate)){

                // liLocate = _this./*#*/$base_container_private.closest(_this./*#*/compatability_private('selectore_loop_box_for_Anchor_tag'));
                liLocate = _this./*#*/$base_container_private.closest(SP_WBC_Variations_Gallery_Images.prototype.compatability_private.call(_this,'selectore_loop_box_for_Anchor_tag'));

            }

        }

        var aLocate = liLocate.find('a');

        if(!window.document.splugins.common.is_empty(aLocate)) {

            for (let i = 0; i < aLocate.length; i++){

                // console.log("gim [get_loop_box_anchor_private] if2 aLocate index : " + i);
                // console.log(aLocate[i]);
                
                if(!window.document.splugins.common.is_empty(jQuery(aLocate[i]).attr('class'))){
                    
                    if(jQuery(aLocate[i]).attr('class').indexOf(' ') >= 0){

                        var aLocateclassAll = jQuery(aLocate[i]).attr('class').split(" ");

                        var aLocateclassAll_index = aLocateclassAll.indexOf(aLocateclass_p);

                        if( aLocateclassAll_index != -1 && aLocateclassAll[aLocateclassAll_index] == aLocateclass_p) {

                            _this.$finalAnchor = jQuery(aLocate[i]);
                                
                        }

                    }

                    var aLocateclass = jQuery(aLocate[i]).attr('class');

                    if(aLocateclass == aLocateclass_p){

                        _this.$finalAnchor = jQuery(aLocate[i]);
                    }
                

                }

                if(!window.document.splugins.common.is_empty(jQuery(aLocate[i]).attr("href")) && (jQuery(aLocate[i]).attr("href").indexOf("/product/") >= 0 || jQuery(aLocate[i]).attr("href").indexOf("/producto/") >= 0 )) {

                    _this.$finalAnchor = jQuery(aLocate[i]);

                }

                if(!window.document.splugins.common.is_empty(_this.$finalAnchor)) {

                   break; 
                }

            }                
        }

        console.log("gim [get_loop_box_anchor_private] _this.$finalAnchor");
        console.log(_this.$finalAnchor);

        return _this.$finalAnchor; 
    }

    /*#*/set_variation_url_private(event, variation) {

        // console.log("gim [set_variation_url]");

        // ACTIVE_TODO temp
        // return false;

        /*ACTIVE_TODO_OC_START
        -- aa function swatchis module ma mukvanu hatu and gallery module ma mukelu se, since show_variation event swatches ma nathi -- to a
        ACTIVE_TODO_OC_END*/
        var _this = this;
    
        var variation_url = _this./*#*/create_variation_url_private(_this./*#*/get_loop_box_anchor_private(), event, variation);
        var base_url = _this./*#*/get_loop_box_anchor_private().attr('href', variation_url);

    }

    /*#*/reset_variation_listener_private(type) {

        // console.log("gim [reset_variation_listener]");

        var _this = this;

        var uniquely_managed_type = null;
        if(type == 'radio'/*change radio with your uniquely managed type*/) {

            uniquely_managed_type = type;

        } else {

            uniquely_managed_type = 'default';            
            
        }

        if(window.document.splugins.common._b(_this./*#*/binding_stats_private, 'reset_variation_listener', uniquely_managed_type)){
            return false;
        }

        if (_this./*#*/configs_private.options.gallery_reset_on_variation_change) {
            
            // console.log("gim [reset_variation_listener] if");

            _this./*#*/$variations_form_private.on('hide_variation', function () {

                _this./*#*/on_reset_variation_private(type);

            });
        } else {
            
            // console.log("gim [reset_variation_listener] else");

            _this./*#*/$variations_form_private.on('click', '.reset_variations', function () {

                _this./*#*/on_reset_variation_private(type);

            });
        }
 
    }
 
    /*#*/on_slider_thumb_click_private(type,element) {
        
        // console.log("gim [on_slider_thumb_click]");

        var _this = this;

        /*ACTIVE_TODO_OC_START
         --  among other things the fundamental things to do are changing zoom are active image, we would be doing it like hiding all the templates within the zoom area container first and the showing the current index template -- to h 
             --  very first do it basically by hiding maybe all nodes within the main zoom container class and then just show the node/element at index which need to be shows -- to h. since we need to start testing 1st revision asap so lets do this asap. 
                  --  then eventually we may like to maintain based on the image template class(so hook would be required for it) and index, or just based on index. to ensure that maximum adaptability is ensured for external slider and zoom and even if within the main zoom area container the dom has complex structure then also things work fine, and it is like that slider/zoom plugins would have complex dom. -- to h 
 
         --  what could be other things that we need to do or would like to cover? -- to a  
             --  we need to stop the video of the current index(means the index which was already set before click) is actually gallery_item_type=video -- to h 
             --  and of course if clicked thumb represents the gallery_item_type=video(note that gallery_item_type video would be providing the base video support means mp4 videos while for the other formats inlcuding 360 will have other premium types support) then call the play_video function(so there will be play_video and pause_video functions) but however the play_video may have nothing since by default we are implementing auto play support for the videos -- to h 
                 --  ACTIVE_TODO so on this regard very soon on admin we may like to provide setting to disable preload and/or auto play support for the videos -- to h 
             --  and of course other are covering the points mentioned in main flow above related to events, templates, compatability and so on as applicable if there are any there or anywhere else -- to h 
                 --  and yeah need to make sure that if any additional notification is required then that is emitted from here, or if any extensions need to respond on notification_response callback then that is implemented -- to h 
             // --  and zoom refresh seems to be needed to be called on each on_slider_thumb_click event, so just call that refresh event of the js api -- to h done
                 --  but yeah if the clicked gallery_item_type of the slider thumb is not image then skip above call -- to h 
                    I think it is invalid statements so above point might be INVALID
        ACTIVE_TODO_OC_END*/

        _this./*#*/slider_thumb_click_private(type,element);
    
    }
 
    /*#*/on_zoom_area_hover_private(type) {
        
        var _this = this;

         // ACTIVE_TODO_OC_START
         // for certain images or custom html we may need to cancel the zoom event, but I think for extensions like darker lighter, diamond meta, recently purchase which have the custom html requirement then that will not emit the zoom hover event since they would not be on the standard zoom container. -- and even in case when images have such requirement fr any feature or flows then in that case we can simply skip using the standard zoom container for displaying image in the zoom area 
         // ACTIVE_TODO_OC_END   

         _this./*#*/zoom_area_hover_private(type); 
     
    }
 
    /*#*/on_variation_change_private(event, variation) {

        var _this = this;
         //  here it will be recieved by the parent layers, and the parent layer would be bootstrap or dedicated function maybe namely subscribe_to_events which will subscrive to the swatches subject of the ...variations.swatches module for the variation change event 
 
 
         //  from here call the internal base event handler of this event which is variation_change 
         _this./*#*/variation_change_private(event, variation); 
 
    }
 
    /*#*/on_reset_variation_private(type) {
        
        var _this = this;
        
        _this./*#*/reset_variation_private(type);
     
    }
 
    /*#*/on_custom_input_change_private() {
 
        var _this = this;
         // ACTIVE_TODO_OC_START
         // //  custom input change is not necessarily for the custom html only, it can be for standard gallery operations also. for example some free or premium widget maybe providing different kind of interface to interact with slider or zoom layers for example diamond meta may have link or button anywhere on surrounding area which would lead to displaying custom html of diamond meta in zoom area, so as per standard flow it should invoke its related thumb click in background which would ultimately lead to displaying of the custom html in zoom area. so check if that is the case then trigger the on_click event or change event from here means call those functions. 
 
 
         // //  if the it is for the custom html then do accordingly 
         //     note that it is still not clear if the custom html is approached directly from here for their change event or rather a notification will be broadcasted on which the particular extension do some action and then respond back if it is applicable. here in this case the responding back would be based on how we decide to do it for slider handling in above swatches module. 
         // ACTIVE_TODO_OC_END    
     
    }
 
    /*#*/on_swatches_more_click_private(type,element) {

        console.log('gim [on_swatches_more_click_private]');
        
        var _this = this;

        _this.swatches_more_click_private(type,element);
    }

    /*#*/slider_thumb_click_private(type,element){

        // console.log("gim [slider_thumb_click]");

        var _this = this;
        // ACTIVE_TODO_OC_START
        // mobile zoom logic

        // - need to check if darker and 360 dom is coming in that top side single image zoom like dom -- if required then check the darker lighter and 360 javascript to understand it

        // -- then we most likely need to move the both mobile zoom template code inside the slider templates 
        // -- now slider templates should drop the dom that is assumed to be rendered by zoom templates 

        // -- and the zoom loop template will contain loop content templates will contain content will host all contents for js template.
        // --- so zoom loop file will be empty

        // -- and then if condition inside the slider thumb click for mobile
        // --- and implement swipe or change event detection inside mobile block
        // put below comment there
        // NOTE: to develop the analogy of the quite significant slider click event, the mobile slider swipe event detection is implemented here 

        // -- and once above flow is implemented also implement the mobile templates of darker lighter and 360 

        // - and on wbc single product model id condition for mobile, to put zoom div at top. It is standard now for mobile but if any slider or zoom implementation differ than we may need to publish filter hook to let external slider and zoom specify the div priority. 

        // - and now zoom loop and loop content need to be implemented
        // -- however xzoom does updates the zoom area images but we are doing additionally so that maybe be fine 
        // --- ACTIVE_TODO all below points applicable when slider/zoom thumb click event's template switching creates issues for either mobile or desktop implementation 
        // ---- if the zoom do not allow any other html dom in their area(like needed for the darker lighter and 360) then what we could do is two different solutions.
        //     // -----   first is broadcast pause/stop zoom notification which is simple but in this case we will have dependancy on external zoom to provide pause/stop api. 
        //     //         INVALID
        //     -----   ACTIVE_TODO second is hide zoom container div and create another one put the new template inside so that the zoom would even if active but will remain hidden. 
        //             --  for this second option what we could do is simply maintain the valid structure. 
        //                 --  so remove the zoom_container class from current zoom container div 
        //                 --  then hide that div 
        //                 --  create new div and add zoom_container class to that div 
        //                 --  and then update the $zoom_container varible to point to new div. so this process will confirm that only one and the right zoom_container div is kept under $zoom_container which is under _this. 
        //                 --  then reverse the process on out thumb click. 
        //     // ------   but the other and even neat option is remove the zoom container div on the fly and create new one and apply the new templates on new one, it is when the next template to apply is some non zoom custom html like 360 and so on. with this option it would work for zooms with only one img-item in dom but with zoom with all_in_dom setting to true it will not work. so above second option is what seems optimal. 
        //     // INVALID 
        // ACTIVE_TODO_OC_END

        var index = jQuery(element).data('index'); 


        _this./*#*/$slider_loop_container_private.data('selected-index',index);

        if(_this./*#*/configs_private.template.zoom.all_in_dom == 0){
            // update one tamplate 

            _this./*#*/process_zoom_template_private(_this./*#*/data_private.current_variation.variation_gallery_images,index,_this./*#*/data_private.current_variation.variation_gallery_images.length > 1);             

        }else{
            // ACTIVE_TODO hide and show image elements
            // process_zoom_template(_this.data.current_variation.variation_gallery_images,index,_this.data.current_variation.variation_gallery_images.length > 1);          
        }

        if(!_this./*#*/data_private.is_skip_sp_slzm){

            var sp_slzm_refresh_zoom_callback = null;
            window.document.splugins.events.api.notifyAllObservers( 'gallery_images', 'sp_slzm_refresh_zoom', {}, sp_slzm_refresh_zoom_callback, _this./*#*/$base_container_private );

        }

        // ACTIVE_TODO/TODO it is better heirachically, if the click is bind on our img-item class stuctor only, and then we recive here that element only in above function Arguments.
        //     -- and than we can simply get type from element data-type which is mentanable due to well maintained heirachy insted of below index based image data read which is bound to change.
        var slider_thumb_click_callback = null;
        window.document.splugins.events.api.notifyAllObservers( 'gallery_images', 'slider_thumb_click', {type:_this./*#*/data_private.current_variation.variation_gallery_images[index].extra_params_org.type,image:_this./*#*/data_private.current_variation.variation_gallery_images[index]}, slider_thumb_click_callback, _this./*#*/$base_container_private ); 
        
    }

    /*#*/variation_change_private(event, variation) {

        console.log("gim [variation_change]");
        console.log(variation);

        var _this = this;

        _this./*#*/data_private.current_variation = variation;
        // console.log("gallary_zoom variation_change");
        // console.log(_this./*#*/data_private.current_variation);

        /*ACTIVE_TODO_OC_START
         -- to a  
         for gallery_images it is not only the variation_change event but below list of events that also need to be listened to, so implement them -- to h 
             --  show_variation
             --  hide_variation
             --  click on .reset_variations
         --  and one strange matter is that there is not seem to be the variation_change event in the plugin we were exploring, but double check and it is likely be there -- to h. so either way need to implement all above events including variation_change since we may have had it and it make no sense to skip that. 
             --  and on this regard better to create functions like init_gallery, init_variation_gallery and maybe also default_gallery and default_variation_gallery as this would create proper heirarchy like in the plugin we were exploring -- to h 
                -- this might be invalid
            
             --  it is confirmed that there is no dependancy on the variations change function in the plugin we were exploring, however it still makes sense to use that only. but in the first place confirm if above show_variation and hide_variation events are actually available, and if they are available then decide which we should use. see we can use all of them but that can create mess if not always then in certain scenarios so to ensure neat execution lets just do the best suitable only -- to h 
                
                -- this might be invalid, because variation  change event is there
         
         //  here it will call the internal function swap_images( variation_id ) which will be doing one of the main process of this gallery_images module 
             --  here the function should be named something like show_gallery_images, which would simply show initially or update and after that show, and also there would be show_variation_gallery_images which would be doing the same but for variation gallery images -- to h 
                 --  and both above function from inside call the process_template heirarchy of function like process_gallery_images_template -- to h   
                    --  we may not need show_gallery_images and show_variation_gallery_images, as long as we pass the right variable to process_images_template. and process_images_template is already created.      
        ACTIVE_TODO_OC_END*/
        // _this./*#*/process_images_template_private(variation.variation_gallery_images);
        _this.process_gallery_images_data_private(variation.variation_gallery_images);

        // ACTIVE_TODO/TODO below notification is disabled becose is no more in use. But if required we can simply enable it by removing false condition. 
        if(false) {

            var variation_change_private_callback = null;
            window.document.splugins.events.api.notifyAllObservers( 'gallery_images', 'variation_change_private', { current_variation : variation }, variation_change_private_callback, _this.$base_container_private );         
        }

    }
 
    /*#*/reset_variation_private(type) {

    }

    /*#*/zoom_area_hover_private(type) {

    }
 
     /*ACTIVE_TODO_OC_START    
     // --  keyboard events 
     var on_keyup or down ? = function() {
 
 
     };
     ACTIVE_TODO_OC_END*/
 
     
             // ACTIVE_TODO_OC_START
             // --  legacy events (events of woo emitted on certain scenarios) 
             // --  events emitted by other plugins/themes which we need to take care of in case of compatiblity matters, so it can be termed as the compatiblity events 
             // ACTIVE_TODO_OC_END
 
     // -- base events - after the above events are handled by their particular function/layer, they would call below functions to do the ultimate work         
        // NOTE : so far this not in use since base function variation change is handling all base logic but if requared central base logic of change couled be moved here 

    /*#*/change_private() {
 
    }
 
         ///////////// -- 15-06-2022 -- @drashti -- ///////////////////////////////

    /*#*/compatability_private(section, object, expected_result) {

        console.log("gim [compatability]");
        
        var _this = this;
         ////////////////////////////////////////////////////
        if(section == 'init'){
            jQuery(function (jQuery)
            {
                /*ACTIVE_TODO_OC_START
                -- ama '.variations_form' aa selectore base_container thi manage nay atle biji rite manage karvo padse aa selectore -- to a
                ACTIVE_TODO_OC_END*/
                
                 jQuery(document).on('wc_variation_form', '.variations_form', function (event) {
                   // $jQuery('.woo-variation-gallery-wrapper:not(.wvg-loaded)').WooVariationGallery();
            
                    console.log("gim [compatability] init wc_variation_form");

                   // _this./*#*/init_preprocess_private(event);
                    SP_WBC_Variations_Gallery_Images.prototype.init_preprocess_private.call(_this,event);
                 
                 }); // Support for Jetpack's Infinite Scroll,

                 jQuery(document.body).on('post-load', function (event) {
                   // $jQuery('.woo-variation-gallery-wrapper:not(.woo-variation-gallery-product-type-variable):not(.wvg-loaded)').WooVariationGallery();

                    console.log("gim [compatability] init post-load");

                   // _this./*#*/init_preprocess_private(event);
                    SP_WBC_Variations_Gallery_Images.prototype.init_preprocess_private.call(_this,event);
                 
                 }); // YITH Quickview

                 jQuery(document).on('qv_loader_stop', function (event) {
                   // $jQuery('.woo-variation-gallery-wrapper:not(.woo-variation-gallery-product-type-variable):not(.wvg-loaded)').WooVariationGallery();

                    console.log("gim [compatability] init qv_loader_stop");

                   // _this./*#*/init_preprocess_private(event);
                    SP_WBC_Variations_Gallery_Images.prototype.init_preprocess_private.call(_this,event);
                 
                 }); // Elementor

                 if (window.elementorFrontend && window.elementorFrontend.hooks) {
                   elementorFrontend.hooks.addAction('frontend/element_ready/woocommerce-product-images.default', function ($scope, event) {
                     // $jQuery('.woo-variation-gallery-wrapper:not(.wvg-loaded)').WooVariationGallery();

                    console.log("gim [compatability] init if");
                     
                     // _this./*#*/init_preprocess_private(event);
                    SP_WBC_Variations_Gallery_Images.prototype.init_preprocess_private.call(_this,event);

                   });
                 }
            });     
        }else if(section == 'selectore_loop_box_for_Anchor_tag') {
           
            if(window.document.splugins.common.current_theme_key == 'themes___purple_theme') {

                object = '.col-xl-3';
            }
        }/*aa else if simple type mate add kareli se confirm karvani baki se @a*/else if(section == 'simple_type') {
            
            console.log('compatability_simple_type');

            object = '.product';
        
        }    
        
        return object;
         /////////////////////////////////////////////////////        
 
    }

    /*#*/sp_slzm_init_private() {

        var _this = this;
        console.log('sp_slzm_init_private');
        console.log(_this./*#*/data_private.is_skip_sp_slzm);
        if(!_this./*#*/data_private.is_skip_sp_slzm){
            
            console.log("sp_slzm_init notification");

            var sp_slzm_init_callback = null;

            window.document.splugins.events.api.notifyAllObservers( 'gallery_images', 'sp_slzm_init', {} , sp_slzm_init_callback, _this./*#*/$base_container_private);
        }
        
    }

    /*#*/set_child_obj_private(child_obj) {

        console.log('gim [set_child_obj_private]');
        var _this = this;

        // NOTE: right now we are setting the child obj at broad leval but we may like to refactore it to make me more apropre at by only passing it only for the function highrisy where it is needed.
        _this./*#*/child_obj_private = child_obj;


    }

    /*#*/swatches_more_click_private(type,element) {

        console.log('gim [swatches_more_click_private]');
        
        var _this = this;

        window.location.href = _this./*#*/get_loop_box_anchor_private().attr('href');
    }

    get_configs() {

        var _this = this; 

        return _this./*#*/configs_private;
    }

    set_configs(configs) {

        var _this = this; 
        
        _this./*#*/configs_private = configs;

    }
 
     // ACTIVE_TODO_OC_START
     // -   effects and managing after effects 
     //         --  may need to provide some effects but only where and if necessary, the majority of effects will be provided by the slider and zoom js/jQuery plugin 
     //         --  will need to manage the after effects very precisely, to ensure smooth and non cluttering experience 
     //             --  it may or likely include managing the loading, swapping and updating of images 
     // ACTIVE_TODO_OC_END
 
    get_current_variation() {

        var _this = this; 
        
        console.log("gim [get_current_variation]");
        console.log(_this./*#*/data_private.current_variation);

        return _this./*#*/data_private.current_variation;    

    }

    get_zoom_container() {

        var _this = this; 
        
        return _this./*#*/$zoom_container_private;    
    }

    get_base_container() {

        var _this = this; 

        return _this./*#*/$base_container_private;
    }

    is_variation_product() {
        
        var _this = this;
    
        return _this./*#*/data_private.is_variation_product;

    }

    data() {

        var _this = this;

        return _this./*#*/data_private;
    }

    process_zoom_template_public(images,index,hasGallery) {

        var _this = this; 
    
        return _this./*#*/process_zoom_template_private(images,index,hasGallery);            
    }

    get_loop_box_anchor() {

        var _this = this; 
    
        return _this./*#*/get_loop_box_anchor_private();
    }

    init() { 

        console.log("gim [init]");
        console.log(this);

        var _this = this; 

       // ACTIVE_TODO_OC_START
        // ACTIVE_TODO It should be well noted that mere droping # for same name functions in parent and child class results in recurtion so we had to call it using prototype. When we enable back the support for # at that time simply uncomment below line and comment the line under neth it.
        // ACTIVE_TODO_OC_END
        // _this./*#*/init_private();
        SP_WBC_Variations_Gallery_Images.prototype.init_private.call(_this,_this);    

    } 

    set_child_obj(child_obj) {

        console.log('gim [set_child_obj]');

        var _this = this; 

        _this./*#*/set_child_obj_private(child_obj);
    }
 
}

window.document.splugins.wbc.variations.gallery_images = window.document.splugins.wbc.variations.gallery_images || {};

window.document.splugins.wbc.variations.gallery_images.core = function( default_options ) {

    jQuery.fn.sp_wbc_variations_gallery_images = function ( options ) {

        console.log("[gim] module called");

        options = jQuery.extend({}, default_options, options);

        return this.each(function () {

            // console.log("[gim] [jQuery.fn.sp_wbc_variations_gallery_images] each_loop");

            (new SP_WBC_Variations_Gallery_Images(this,options)).init();
        });
    };

};

jQuery(document).ready(function(){
    
    if (!window.document.splugins.common.is_admin) {
        //  publish it 
        window.document.splugins.wbc.variations.gallery_images.api = window.document.splugins.wbc.variations.gallery_images.core( common_configs.gallery_images_configs );
    }
});

// if(window.document.splugins.common.is_item_page) {

//     jQuery(document).ready(function() {

//         // window.setTimeout(function(){

//             // window.document.splugins.wbc.variations.gallery_images.api.init();
//             base_container = jQuery( ( window.document.splugins.common._o( common_configs.configs, 'base_container_selector') ? common_configs.configs.base_container_selector : '.variations_form' ) );      
//             jQuery(base_container).sp_wbc_variations_gallery_images();

//         // },2000);
//     });

// }

// ACTIVE_TODO_OC_START
// put ACTIVE_TODO_OC_START and ACTIVE_TODO_OC_END around each open comments section, and then comment them -- to d 
//     --  and need to do the same for filter js and ssm variations class file -- to d 
// ACTIVE_TODO_OC_END  

// the variations sp_slzm js module
window.document.splugins.wbc.variations.gallery_images.sp_slzm = window.document.splugins.wbc.variations.gallery_images.sp_slzm || {};

window.document.splugins.wbc.variations.gallery_images.sp_slzm.core = function( configs ) {
   
    var _this = this; 

    // _this.init_callbacks = [];
    // _this.refresh_callbacks = [];
    // _this.zoom_callbacks = [];

    var init_private = function(){

        window.document.splugins.events.api.createSubject( 'gallery_images.sp_slzm', ['sp_slzm_init', 'sp_slzm_refresh', 'sp_slzm_refresh_zoom'] );

        init_listener_private();
        refresh_listener_private();
    };

    var init_listener_private = function() {
    
        console.log('init_listener_private');

        // ACTIVE_TODO whenever slzm need to support selector based notification then at that time it should here bind subscriber for all the applicable loopbox gallery_images containers while the subscriber of this slzm listeners should pass the gallery_images container of perticular loopbox. that we need to implement whenever we needs support of selectro based notification. 
        window.document.splugins.events.api.subscribeObserver( 'gallery_images', 'sp_slzm', 'sp_slzm_init',function(event, stat_object, notification_response){

            console.log('init_listener_private 11111');

            /*jQuery(_this.init_callbacks).each(function (index,callback) {

                console.log('init_listener_private 22222');

                callback();     
            });*/
            var sp_slzm_init_callback = null ;
            window.document.splugins.events.api.notifyAllObservers( 'gallery_images.sp_slzm', 'sp_slzm_init', {}, sp_slzm_init_callback );         
        },jQuery('.variations_form,.spui-sp-variations-gallery-images-simple'));

    };
 
    var refresh_listener_private = function() {

        // console.log('refresh_listener_private');

        window.document.splugins.events.api.subscribeObserver( 'gallery_images', 'sp_slzm', 'sp_slzm_refresh',function(event, stat_object, notification_response){

            console.log('refresh_listener_private 1.11111');

            // jQuery.each(_this.refresh_callbacks, function (index,callback) {

            //     console.log('refresh_listener_private 1.22222');

            //     callback();     
            // });  
            /*var i;
            for (i = 0; i < _this.refresh_callbacks.length; ++i) {

                console.log('refresh_listener_private 1.22222');
                console.log(_this.refresh_callbacks[i]);
                // _this.refresh_callbacks[i]();  
            }*/
            var sp_slzm_refresh_callback = null ;
            window.document.splugins.events.api.notifyAllObservers( 'gallery_images.sp_slzm', 'sp_slzm_refresh', {}, sp_slzm_refresh_callback );   
       
        });

        window.document.splugins.events.api.subscribeObserver( 'gallery_images', 'sp_slzm', 'sp_slzm_refresh_zoom',function(event, stat_object, notification_response){

            console.log('refresh_listener_private 2.11111');

            /*jQuery(_this.zoom_callbacks).each(function (index,callback) {

                console.log('refresh_listener_private 2.22222');

                callback();     
            });*/
            var sp_slzm_refresh_zoom_callback = null ;
            window.document.splugins.events.api.notifyAllObservers( 'gallery_images.sp_slzm', 'sp_slzm_refresh_zoom', {}, sp_slzm_refresh_zoom_callback );         
        },jQuery('.variations_form,.spui-sp-variations-gallery-images-simple'));
    };

    return {
 
        init: function(){

            init_private();
        },

        init_listener: function(subscriber_key, callback) {

            console.log("sp_slzm init_listener");

            // _this.init_callbacks.push(callback);
            window.document.splugins.events.api.subscribeObserver( 'gallery_images.sp_slzm', 'gallery_images.sp_slzm.'+subscriber_key, 'sp_slzm_init', callback );
        },
 
        refresh_listener: function(subscriber_key, callback) {

            console.log("sp_slzm refresh_listener");
            
            // _this.refresh_callbacks.push(callback);
            window.document.splugins.events.api.subscribeObserver( 'gallery_images.sp_slzm', 'gallery_images.sp_slzm.'+subscriber_key, 'sp_slzm_refresh', callback );

            window.document.splugins.events.api.subscribeObserver( 'gallery_images.sp_slzm', 'gallery_images.sp_slzm.'+subscriber_key, 'sp_slzm_refresh_zoom', callback );
        }
    };    
 
};

if(window.document.splugins.common.is_item_page || window.document.splugins.common.is_category_page) {
    
    jQuery(document).ready(function() {

        // window.setTimeout(function(){

            //  publish it 
            window.document.splugins.wbc.variations.gallery_images.sp_slzm.api = window.document.splugins.wbc.variations.gallery_images.sp_slzm.core( {}/*if required then the php layer configs can be set here by using the js vars defined from the php layer*/ );


            // window.document.splugins.wbc.variations.gallery_images.sp_slzm.api.init();
        // }, 2500);
    });

}






// the variations swatches js module
class SP_WBC_Variations_Swatches_Feed_Page extends SP_WBC_Variations_Swatches {


    constructor(element, configs) {

        // Calling parent's constructor
        super(element, configs);

        this./*#*/configs_private;
        this./*#*/data_private;
        this./*#*/binding_stats_private;

        var _this = this; 

        _this./*#*/configs_private = jQuery.extend({}, {}/*default configs*/, configs);

        _this./*#*/configs_private.attribute_types_keys = Object.keys( _this./*#*/configs_private.attribute_types );

        _this./*#*/data_private = {};
        _this./*#*/binding_stats_private = {};     
        
    }


    /*#*/init_private() {

        var _this = this; 

        super.init();

        // ACTIVE_TODO/TODO enable below call when required otherwise remove the TODO from here if it is not necessary ever.
        // _this./*#*/update_configs_private();
    }

    init() {
        
        var _this = this; 

        _this./*#*/init_private();

    }

}
window.document.splugins.wbc.variations.swatches.feed_page = window.document.splugins.wbc.variations.swatches.feed_page || {};

window.document.splugins.wbc.variations.swatches.feed_page.core = function( configs ) {

    // console.log("SP_WBC_Variations_Swatches_Feed_Page .core child");

    jQuery.fn.sp_wbc_variations_swatches_feed_page = function () {
       
        // console.log("SP_WBC_Variations_Swatches_Feed_Page function child");
       
        return this.each(function () {

            // console.log("SP_WBC_Variations_Swatches_Feed_Page object child");

            (new SP_WBC_Variations_Swatches_Feed_Page(this,configs)).init();

        });
    };
};

if(window.document.splugins.common.is_category_page) {

    jQuery(document).ready(function() {
    
        // window.setTimeout(function(){

            //  publish it 
            window.document.splugins.wbc.variations.swatches.feed_page.api = window.document.splugins.wbc.variations.swatches.feed_page.core( common_configs.swatches_config );

            // window.document.splugins.wbc.variations.swatches.feed_page.api.init();
            // base_container = jQuery( ( window.document.splugins.common._o( common_configs.configs, 'base_container_loop_selector') ? common_configs.configs.base_container_selector : '.variations_form' ) );      
            // jQuery(base_container).sp_wbc_variations_swatches_feed_page();

        // },2000);    

    } );

}

// the variations gallery images js module
class SP_WBC_Variations_Gallery_Images_Feed_Page extends SP_WBC_Variations_Gallery_Images {



    constructor(element, configs) {

        // Calling parent's constructor
        super(element, configs);
        
        this./*#*/$configs_private;
        this./*#*/data_private;
        this./*#*/$binding_stats_private;
        this./*#*/$zoom_container_private;

        var _this = this; 
     
        _this./*#*/$configs_private = jQuery.extend({}, {}/*default configs*/, configs);  
     
        _this./*#*/data_private = {};
        _this./*#*/$binding_stats_private = {};        

    }
 
    /*#*/init_private() {

        console.log('gim_feed [init_private]');
        console.log(this);

        var _this = this; 

        _this./*#*/update_configs_private();

        super.set_child_obj(_this);

        super.init();

        // _this./*#*/init_preprocess_private(null);

    }

    /*#*/init_preprocess_private(event) {

        // console.log('gim_feed [init_preprocess]');
      
        var _this = this; 

        _this./*#*/preprocess_private(null, event)
    
    }

    /*#*/preprocess_private(element, event) {

        // console.log('gim_feed [preprocess]');

        var _this = this; 

        _this./*#*/process_images_private(null,element);
    
    }

    /*#*/process_images_private(type=null, element=null) {

        // console.log('gim_feed [process_images]');

        var _this = this; 

        _this./*#*/process_images_inner_private(type, element);    
    
    }       

    /*#*/process_images_inner_private(type, element) {

        // console.log('gim_feed [process_images_inner_private]');

        var _this = this; 

        _this./*#*/process_events_private(type);
    
    }

    /*#*/process_events_private(type) {

        // console.log('gim_feed [process_events]');

        var _this = this; 

        _this./*#*/zoom_area_hover_in_listener_private(type);
    
        _this./*#*/zoom_area_hover_out_listener_private(type);

        // ACTIVE_TODO for simple type also we may need to use below click lisner so in that case simply comment or remove below if.
        // if(super.is_variation_product()) {
    
        _this./*#*/zoom_area_click_listener_private();

        // }

    }

    /*#*/zoom_area_click_listener_private(type) {

        console.log('gim_feed [zoom_area_click_listener]');

        var _this = this; 

        console.log(super.get_zoom_container());

        super.get_zoom_container().on('click',function() {

            console.log('gim_feed [zoom_area_click_listener] on_click');

            _this./*#*/on_zoom_area_click_private();

        })

    }

    /*#*/zoom_area_hover_in_listener_private(type) {

        console.log('gim_feed [zoom_area_hover_in_listener]');

        var _this = this; 

        var uniquely_managed_type = null;
        if(type == 'radio'/*change radio with your uniquely managed type*/) {

            uniquely_managed_type = type;

        } else {

            uniquely_managed_type = 'default';            
            
        }

        if(window.document.splugins.common._b(_this./*#*/$binding_stats_private, 'zoom_area_hover_in_listener', type)){
            return false;
        }
                
        console.log('gim_feed [zoom_area_hover_in_listener] get_zoom_container');
        console.log(super.get_zoom_container());

        //Flag var, set to false below to avoid undefine error on first execution.
        _this./*#*/data_private.is_zoom_area_hover_in_progress = false;
       
        // _this./*#*/$zoom_container_private.on("mouseenter","",function() {
        super.get_zoom_container().on('mouseenter', '', function() {

            console.log('gim_feed [zoom_area_hover_in_listener] on_mouseenter');

            _this./*#*/on_zoom_area_hover_in_private(type);                   
        });  

    }

    /*#*/zoom_area_hover_out_listener_private(type) {

        console.log('gim_feed [zoom_area_hover_out_listener]');

        var _this = this; 
        
        var uniquely_managed_type = null;
        if(type == 'radio'/*change radio with your uniquely managed type*/) {

            uniquely_managed_type = type;

        } else {

            uniquely_managed_type = 'default';            
            
        }

        if(window.document.splugins.common._b(_this./*#*/$binding_stats_private, 'zoom_area_hover_out_listener', type)){
            return false;
        }   
        
        // _this./*#*/$zoom_container_private.on("mouseleave","",function() {
        super.get_zoom_container().on("mouseleave","",function() {

            // console.log('gim_feed [zoom_area_hover_out_listener] on_mouseleave');

            _this./*#*/on_zoom_area_hover_out_private(type); 

        });   
         
    }

    /*#*/on_zoom_area_hover_in_private(type) {
        
        var _this = this; 

        _this./*#*/zoom_area_hover_in_private(type);
    
    }

    /*#*/on_zoom_area_hover_out_private(type) {

        var _this = this; 

        _this./*#*/zoom_area_hover_out_private(type);
    
    }

    /*#*/on_zoom_area_click_private(type) {

        var _this = this; 

        _this./*#*/zoom_area_click_private();
    }

    /*#*/zoom_area_hover_in_private(type) {
 
        console.log('gim_feed [zoom_area_hover_in]');

        var _this = this; 

        if(_this./*#*/data_private.is_zoom_area_hover_in_progress) {

            return false;            
        }
        _this./*#*/data_private.is_zoom_area_hover_in_progress = true; 

        if(window.document.splugins.common.is_empty(_this./*#*/$configs_private.options.tiny_features_option_ui_loop_box_hover_media_index)) {

            console.log('gim_feed [zoom_area_hover_in] false1');

            return false;
        }

        console.log(_this./*#*/$configs_private.options.tiny_features_option_ui_loop_box_hover_media_index);
        console.log(super.get_current_variation());

        if (super.get_current_variation() == null) {

            console.log('gim_feed [zoom_area_hover_in] false2');

            return false;
        }

        // TODO if in loop box ever need to manage index like if slider is supported in loop box for example in purple theme than at that time need to recive or read the index from the apllicable container of perant module.
        var index = 0;

        var templating_lib = window.document.splugins.common._o( _this./*#*/$configs_private, 'templating_lib') ? _this./*#*/$configs_private.templating_lib : 'wp';

        /*-- index config add @a --*/
        // var template_id = _this./*#*/configs_private.template.zoom.id+'_'+index_inner (?) + '_hover';
        var template_id = _this./*#*/$configs_private.template.zoom.id+'_'+_this./*#*/$configs_private.options.tiny_features_option_ui_loop_box_hover_media_index + '_hover';

        console.log('gim_feed [zoom_area_hover_in] 01');

        if(splugins.tmpl_lib.is_template_exists(template_id, templating_lib)) {

            var zoom_inner_html = '';

            var images = super.get_current_variation().variation_gallery_images;

            var hasGallery = images.length > 1;

            var hover_media_index = null;

            console.log('gim_feed [zoom_area_hover_in] images');
            console.log(images);

            var found_count = 0;

            jQuery(images).each(function (index_inner,image) {
                
                console.log('gim_feed zoom_area_hover_in each_loop');

                console.log(_this./*#*/$configs_private.options.tiny_features_option_ui_loop_box_hover_media_index);
                console.log(image.extra_params_org.type);

                image.index = index_inner;

                if(
                    _this./*#*/$configs_private.options.tiny_features_option_ui_loop_box_hover_media_index == image.extra_params_org.type 
                    ||
                    (_this./*#*/$configs_private.options.tiny_features_option_ui_loop_box_hover_media_index == 'image' && window.document.splugins.common.is_empty(image.extra_params_org.type)/*empty value means default type which is considerd as image type*/)
                    ) {

                    found_count ++;
                    
                    if(_this./*#*/$configs_private.options.tiny_features_option_ui_loop_box_hover_media_index == 'image' && found_count == 1){

                        return;
                    }

                    console.log('gim_feed [zoom_area_hover_in] each_loop if');

                    hover_media_index = index_inner;
                    
                    console.log(hover_media_index);

                    var type_template = null;

                    if( _this./*#*/$configs_private.product_variations_configs.is_gallery_images_type_based_template == 1 ){

                        template_id = _this./*#*/$configs_private.template.zoom.id+'_' + (!window.document.splugins.common.is_empty(image.extra_params_org.type) ? image.extra_params_org.type : '') + '_hover';
                    } else {

                        template_id = _this./*#*/$configs_private.template.zoom.id+'_'+_this./*#*/$configs_private.options.tiny_features_option_ui_loop_box_hover_media_index + '_hover';
                    }


                    var template_var = _this.template_public( template_id, templating_lib );

                    zoom_inner_html += _this.apply_template_data_public(template_var, image, templating_lib);

                    console.log('gim_feed zoom_area_hover_in each_loop if zoom_inner_html');
                    console.log(zoom_inner_html);

                    return false;
                }
                
            // }).join('');
            });

            if(hover_media_index === null) {

                return false;
            }

            if (hasGallery) {

                super.get_zoom_container().html(zoom_inner_html);
           
            } else {

              // _this./*#*/$zoom_container_private.html('');
              super.get_zoom_container().html('');
            } //this._element.trigger('woo_variation_gallery_init', [this, images]);

            // ACTIVE_TODO/TODO it is better heirachically, if the click is bind on our img-item class stuctor only, and then we recive here that element only in above function Arguments.
            //     -- and than we can simply get type from element data-type which is mentanable due to well maintained heirachy insted of below index based image data read which is bound to change.



            if(hover_media_index !== null) {

                console.log('gim_feed [zoom_area_hover_in] if_01');

                // window.document.splugins.events.api.notifyAllObservers( 'gallery_images_feed_page', 'zoom_area_hover_in', {type:images[index].extra_params_org.type,image:images[index]}, zoom_area_hover_in_callback, super.get_base_container() );            
                var zoom_area_hover_in_callback = null;
                window.document.splugins.events.api.notifyAllObservers( 'gallery_images_feed_page', 'zoom_area_hover_in', {type:images[hover_media_index].extra_params_org.type, 
                    hover_index_type: window.document.splugins.common._o(images,hover_media_index) ? images[hover_media_index].extra_params_org.type : null
                , image:images[hover_media_index], container:super.get_zoom_container()}, zoom_area_hover_in_callback, super.get_base_container() );            
            }

        } 

    }

    /*#*/zoom_area_hover_out_private(type) {

        // console.log('gim_feed [zoom_area_hover_out]');
        
        var _this = this; 
        
        _this./*#*/data_private.is_zoom_area_hover_in_progress = false; 
        
        if (super.get_current_variation() == null) {

            return false;
        }

        // TODO if in loop box ever need to manage index like if slider is supported in loop box for example in purple theme than at that time need to recive or read the index from the apllicable container of perant module.
        var index = 0;

        var images = super.get_current_variation().variation_gallery_images;
        
        super.process_zoom_template_public(images, 0, true/*we are simply setting it to true but if requred than need to manage it*/);

        var zoom_area_hover_out_callback = null;
        window.document.splugins.events.api.notifyAllObservers( 'gallery_images_feed_page', 'zoom_area_hover_out', {type:images[index].extra_params_org.type,image:images[index]}, zoom_area_hover_out_callback, super.get_base_container(), super.get_base_container() );       
                
    }  

    /*#*/zoom_area_click_private(type) {

        // console.log('gim_feed [zoom_area_click]');

        var _this = this; 

        var sp_anchor_url = super.get_loop_box_anchor().attr('href');

        console.log(sp_anchor_url);
        
        if(!window.document.splugins.common.is_empty(sp_anchor_url)) {
            
            window.location.href = sp_anchor_url;
        }

        // _this/*#*/compatability_private('zoom_area_click');
    }
    
    /*#*/compatability_private(section, object, expected_result) {

        // console.log('gim_feed [compatability]');
        
        var _this = this;

        // if(section == 'zoom_area_click') {

        //     var sp_variation_url = super.get_zoom_container().data('sp_variation_url'); 
        //     console.log('sp_variation_url');
        //     console.log(sp_variation_url);
       
        //     if(!window.document.splugins.common.is_empty(sp_variation_url)) {
                
        //         window.location.href = sp_variation_url;

        //     }else {

        //         var sp_anchor_url = super.get_loop_box_anchor().attr('href');
                
        //         window.location.href = sp_anchor_url;
        //     }

        // }

        return object;
    }

    /*#*/update_configs_private() {

        var _this = this; 

        // NOTE: In future if we find better flow or structure which is mature standard then we can deprecate this function

        var configs = super.get_configs();

        configs.template = configs.template_loop;
        configs.classes = configs.classes_loop;

        super.set_configs(configs);

        // NOTE: update in child module too.
        _this./*#*/$configs_private = super.get_configs();
    
    }        
 
    init() { 

        console.log('gim_feed [init]');
        console.log(this);
        var _this = this; 

       // ACTIVE_TODO_OC_START
        // ACTIVE_TODO It should be well noted that mere droping # for same name functions in parent and child class results in recurtion so we had to call it using prototype. When we enable back the support for # at that time simply uncomment below line and comment the line under neth it.
        // ACTIVE_TODO_OC_END
        // _this./*#*/init_private();
        SP_WBC_Variations_Gallery_Images_Feed_Page.prototype.init_private.call(_this,);
    
    }

    process_images_inner() {

        console.log('gim_feed [process_images_inner]');

        var _this = this; 

        _this./*#*/process_images_inner_private();
    }

}
window.document.splugins.wbc.variations.gallery_images.feed_page = window.document.splugins.wbc.variations.gallery_images.feed_page || {};

window.document.splugins.wbc.variations.gallery_images.feed_page.core = function( default_options ) {

    jQuery.fn.sp_wbc_variations_gallery_images_feed_page = function (options) {
        
        options = jQuery.extend({}, default_options, options);

        console.log("[gim_feed] module called");
        
        // console.log("gim_feed 'this'");
        // console.log(this);
        
        return this.each(function () {
            
            // console.log("[gim_feed] each_loop");
            (new SP_WBC_Variations_Gallery_Images_Feed_Page(this,options)).init();

        });
    };
};

if(window.document.splugins.common.is_category_page) {

    jQuery(document).ready(function() {

        // window.setTimeout(function(){

            //  publish it 
            window.document.splugins.wbc.variations.gallery_images.feed_page.api = window.document.splugins.wbc.variations.gallery_images.feed_page.core( common_configs.gallery_images_configs );

            // window.document.splugins.wbc.variations.gallery_images.single_product.api.init();
            // base_container = jQuery( ( window.document.splugins.common._o( common_configs.configs, 'base_container_loop_selector') ? common_configs.configs.base_container_selector : '.variations_form' ) );      
            // jQuery(base_container).SP_WBC_Variations_Gallery_Images_Feed_Page();

        // },2000);
    });

}

//NOTE: some business logic related common functions. we may like to move it to some other place if ever required. 
if(window.document.splugins.common.is_item_page) {

    window.document.splugins.single_product.wbc_atb_submin_form = function() {

        jQuery('form.cart').attr('action',document.location.href);
        jQuery('form.cart').submit();
    }
}
