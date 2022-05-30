/**
 * common js functions and also the common defs for the module, observer, prototype and singleton design patterns 
 * 
 * this asset file will contain the common layer and functions, and if there are common functions which are specific to admin only then that will not go here but on in the admin asset js file, and if there are common functions which are to be used by frontend but in some cases by admin or even if not going to be used by admin then also be added here. so this asset file will be loaded on both admin and frontend. the decision of managing common flows like this and priotizing what goes to frontend is because of the requirement of minimizing the number of assets that would be loaded on frontend. 
 */
window.document.splugins = window.document.splugins || {};
window.document.splugins.common = window.document.splugins.common || {};


//  TODO publish defs from here of the any design pattern that we define to be used as common patter like design pattern of the wbc.filters module 
    //  below the observer design pattern implemented for Feed.events act as one of published defs



//  Feed 
window.document.splugins.Feed = window.document.splugins.Feed || {};



//  Feed.events 
//  the feeling comes in the mind is it may become overloaded if we create such a broad class like Feed where Feed page can contain many features, events and so on. but there is absolute need of one central observer pattern which let subscribe to any subject(feature) and then later notify them when related event occurs. the need is of central observer and notifier but nothing beyond that so it will be very light and almost like a namespace holding diferent fetures. and in essense Feed will be collection of different subject(feature) where each subject is itself a observer pattern. 
    //  it is supposed to hold the collection of features like pagination, filters, feed render, sorting and so on but yeah its only job is to listen to events and notify to their subscribers. 
window.document.splugins.Feed.events = window.document.splugins.Feed.events || {};

window.document.splugins.Feed.events.subject = function( feature_unique_key, notifications ) {
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

window.document.splugins.Feed.events.observer = function(callbacks) {
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

            this.subjects.push( new window.document.splugins.Feed.events.subject( feature_unique_key, notifications ) );
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

                this.subjects[found_index].subscribeObserver( new window.document.splugins.Feed.events.observer( callbacks ) );
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

// the variations js module
window.document.splugins.wbc.variations = window.document.splugins.wbc.variations || {};

window.document.splugins.wbc.variations.core = function() {
    // this.subjects = [];

    this.$wrapper = this._element.closest('.product');
    this.$variations_form = this.$wrapper.find('.variations_form');

    here mostly in the private scope, the variations module should subscribe to search filter events and pass those to variations core which would call the change event so that filters those affecting the variations data like images etc. are rendered accordingly. so that metal color based or shape based images render appropriately. 
        --  however, it is not limited to js layer only and actually js layer here would not be of use except the search is client side only based on the js. but the searches are always carried on the backend so the php layer need to ensure that return appropriate variations images etc. whenever the selected options of the search filters connects with variations instead of the main product. 
            --  m have did it already but need to implement throughly as per standard if not proper yet 

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

    var initPrivate = function() {


    }

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

    we may need to bind to the click of our sp_variations attributes variation widgets option change/click event and based on that pubish/trigger variation change event of the legacy js layers 
        --  for this need to study our options UI implementation flow and also the other plugins swatches implementation flow to find out different flows that different sco system can implement 

    will the category and item page both will use this same module? and all the flows will be same? 


    and add compatiblity related private function here and add all those theme and other patch that the other plugin we were exploring have. but of course in our case it will be as per our flow of how we manage loading and then ajax loading of swatches options 
        --  that other plugin have some more theme specific patch fix, and some other patch for managing unexpected effects like blink and so on 

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

                    global $product,$post;
                    if(empty($product)) {
                        $product = wbc()->wc->get_product($post->ID);
                    }

                    if(!empty($first_collection)) {
                        foreach ($first_collection as $url_index => $url) {
                            $first_collection[$url_index] = implode('.', array_slice( explode('.',(wp_get_attachment_url($url))) ,0,-1) );
                        }
                    }

                    if(!empty($first_collection)) {



                        ?>
                        <!-- <style type="text/css">
                            .woocommerce-product-gallery__image:first-child,.flex-control-thumbs>li:first-child{
                                display: none !important;
                            }
                        </style> -->
                        <?php
                    }

                    ?>

                    
                    <script type="text/javascript">

                        jQuery(document).ready(function(){

                            <?php 
                            now we will let the below big imag flow also work as per the standard, so we should not need to enable any of the below things.  -- like we had planned to use first variation images that woocommerce supports so similarly here also that image would come on its own. -- however we had certain flows of disabling default and also the requirement will come of what variation user had selected on the category page that is the one that should be loaded on the item page. so that need to be covered. 
                            if(get_post_meta($product->get_id(),'__spvw_flush_images',true)!=-1 and (!empty(get_post_meta($post->ID,'__spvw_images',true))) and is_array($first_collection_image) and !empty($first_collection_image) and !empty(array_filter($first_collection_image))): ?>
                                if(jQuery('.big-img').length>0){
                                    <?php if(!empty($first_collection_image)): ?>
                                        jQuery('.big-img').get(0).src = '<?php echo wp_get_attachment_url(array_values($first_collection_image)[0]); ?>'
                                    <?php else: ?>
                                        jQuery('.big-img').get(0).src=jQuery(jQuery('.exzoom_img_ul .small-img,.xzoom-thumbs .dots-sp-product').get(0)).attr('src');
                                    <?php endif; ?>
                                }
                            <?php endif; ?>

                            <?php if(!empty($first_collection)): ?>
                            jQuery('.variations_form').on('woocommerce_variation_select_change',function(){
                                //jQuery('.woocommerce-product-gallery').data('flexslider').removeSlide(0);
                                /*jQuery('.woocommerce-product-gallery').data('flexslider').controlNav[0].remove();

                                var times_it = 0;
                                let interval = setInterval(function () {
                                    jQuery('.woocommerce-product-gallery').flexslider(1);                                   
                                   if (++times_it === 1000) {
                                       window.clearInterval(interval);
                                   }
                                },1);*/

                                //jQuery(jQuery('.woocommerce-product-gallery').data('flexslider').controlNav[1]).trigger('click');
                                //window.setTimeout(function(){      },10);                             
                            });                 
                            <?php  endif; ?>
                            
                            window.__spvw_images = JSON.parse('<?php echo json_encode($__spvw_images_src); ?>');
                            window.__spvw_terms = JSON.parse('<?php echo json_encode($attributes_list); ?>');
                            window.__spvw_initial_images = JSON.parse('<?php echo json_encode( ((is_array($first_collection) and !empty($first_collection)) ? array_values($first_collection) : array() )); ?>');

                            <?php 
                                global $product,$post;
                                if(empty($product) and !is_object($product)) {
                                    $product = wbc()->wc->get_product($post->ID);
                                }

                                $default_attributes = $product->get_default_attributes(); 

                                $size_slug = get_option('view_with_size_select','eo_size_attr');
                                if(!empty($size_slug) and strpos($size_slug,'pa_')!==0) {
                                    $size_slug = 'pa_'.$size_slug;
                                }

                                $shape_slug = get_option('view_with_shape_select','pa_shape');
                                if(!empty($shape_slug) and strpos($shape_slug,'pa_')!==0) {
                                    $shape_slug = 'pa_'.$shape_slug;
                                }

                                $metal_slug = wbc()->options->get_option('sp_metal_color','metal_color_images_field',false);
                                if(!empty($metal_slug) and strpos($metal_slug,'pa_')!==0) {
                                    $metal_slug = 'pa_'.$metal_slug;
                                }

                                $_size_slug = '';
                                $_shape_slug = '';
                                $_metal_slug = '';

                                if(!empty($default_attributes[$size_slug])) {
                                    $_size_slug = $default_attributes[$size_slug];
                                }

                                if(!empty($default_attributes[$shape_slug])) {
                                    $_shape_slug = $default_attributes[$shape_slug];    
                                }

                                if(!empty($default_attributes[$metal_slug])) {
                                    $_metal_slug = $default_attributes[$metal_slug];
                                }                               
                            ?>

                            if(typeof(window.__vw_first_slug) == typeof(undefined)){
                                window.__vw_first_slug = '<?php echo apply_filters('spvw_vw_first_slug', $_size_slug ); ?>';
                                <?php if(!empty($_size_slug)): ?>
                                    window.__vw_first_slug = '<?php echo $_size_slug; ?>';
                                <?php endif; ?>
                            }

                            if(typeof(window.__vw_second_slug) == typeof(undefined)){
                                window.__vw_second_slug = '<?php echo apply_filters('spvw_vw_second_slug', $_shape_slug ); ?>';
                                <?php if(!empty($_shape_slug)): ?>
                                    window.__vw_second_slug = '<?php echo $_shape_slug; ?>';
                                <?php endif; ?>
                            }

                            if(typeof(window.__vw_third_slug) == typeof(undefined)){
                                window.__vw_third_slug = '<?php echo apply_filters('spvw_vw_third_slug',$_metal_slug); ?>';

                                <?php if(!empty($_metal_slug)): ?>
                                    window.__vw_third_slug = '<?php echo $_metal_slug; ?>';

                                <?php endif; ?>

                                if(window.__vw_third_slug===''){
                                    window.__vw_third_slug = jQuery(".metal_color_images_option:eq(0)").data('slug');
                                }
                            }


                            /*Fix if the size attribute do not exists in the images section*/
                            if(!window.__spvw_images.hasOwnProperty(window.__vw_first_slug) && window.__spvw_images.hasOwnProperty(window.__vw_second_slug)) {
                                window.__spvw_images[window.__vw_first_slug] = window.__spvw_images;
                            }


                            console.log(window.__vw_first_slug);
                            console.log(window.__vw_second_slug);
                            console.log(window.__vw_third_slug);
                            <?php if(empty($_GET['WBC_PREVIEW'])): ?>

                            window.spvw_findimage = function(data,value) {

                                if(Object.keys(data).indexOf('0')!==-1 || Object.keys(data).indexOf(0)!==-1) {
                                    data = data[0];
                                    if( typeof(data)==='object' && Object.keys(data).length>0 && typeof( Object.values(data)[0] )!=='object' ) {
                                        return data;
                                    } else {
                                        return window.spvw_findimage(data,value);
                                    }                                   
                                } else {
                                    
                                    let is_traversed = false;
                                    if(window.__vw_first_slug.length>0 && typeof(window.__vw_first_slug)==='string') {
                                        if(Object.keys(data).indexOf(window.__vw_first_slug)!==-1) {
                                            data = data[window.__vw_first_slug];
                                            is_traversed = true;
                                        }                                       
                                    }
                                    
                                    if(window.__vw_second_slug.length>0 && typeof(window.__vw_second_slug)==='string') {
                                        if(Object.keys(data).indexOf(window.__vw_second_slug)!==-1) {
                                            data = data[window.__vw_second_slug];
                                            is_traversed = true;
                                        }
                                    }
                                    
                                    if(window.__vw_third_slug.length>0 && typeof(window.__vw_third_slug)==='string') {
                                        if(Object.keys(data).indexOf(window.__vw_third_slug)!==-1) {
                                            data = data[window.__vw_third_slug];
                                            is_traversed = true;
                                        }
                                    }

                                    if(!is_traversed) {
                                        data = Object.values(data)[0];
                                    }

                                    if( typeof(data)==='object' && Object.keys(data).length>0 && typeof( Object.values(data)[0] )!=='object' ) {
                                        return data;
                                    } else {                                        
                                        return window.spvw_findimage(data,value);
                                    }                                   
                                }
                            }

                            window.spvw = function($slug,$val) {

                                console.log(window.__vw_first_slug);
                                console.log(window.__vw_second_slug);
                                console.log(window.__vw_third_slug);

                                console.log(window.__spvw_images);

                                console.log($slug);

                                if(jQuery("#pa_"+$slug).length>0){
                                    jQuery("#pa_"+$slug).val($val);
                                    
                                    how other plugin teams would be getting it to work, without managin flexslider and so on hardcoded? 
                                    if(typeof(jQuery.fn.flexslider) === 'function' && jQuery('.woocommerce-product-gallery').data('flexslider')!==undefined) {
                                        
                                        /*let image_index = jQuery('.flex-control-thumbs li .flex-active').closest(".flex-control-thumbs li").index();
                                        jQuery("#pa_"+$slug).trigger('change');
                                        jQuery('.woocommerce-product-gallery').flexslider(image_index);*/
                                        //jQuery('.woocommerce-product-gallery').data('flexslider').update();

                                        let image_index = jQuery('.flex-control-thumbs li .flex-active').closest(".flex-control-thumbs li").index();
                                        
                                        /*jQuery("#pa_shape").trigger('change');*/
                                        jQuery("#pa_"+$slug).trigger('change');
                                        window.setTimeout(function(){
                                                jQuery('.woocommerce-product-gallery').flexslider(image_index);
                                        },0);
                                        jQuery('.woocommerce-product-gallery').flexslider(image_index);


                                    } else {
                                        jQuery("#pa_"+$slug).trigger('change');
                                    }
                                }

                                if( /*(window.__vw_first_slug.length<=0 ^ window.__spvw_images.hasOwnProperty(window.__vw_first_slug)) && (window.__vw_second_slug.length<=0 ^ (window.__spvw_images.hasOwnProperty(window.__vw_first_slug) && window.__spvw_images[window.__vw_first_slug].hasOwnProperty(window.__vw_second_slug))) && (window.__vw_third_slug.length<=0 ^ (window.__spvw_images.hasOwnProperty(window.__vw_first_slug) && window.__spvw_images[window.__vw_first_slug].hasOwnProperty(window.__vw_second_slug) && window.__spvw_images[window.__vw_first_slug][window.__vw_second_slug].hasOwnProperty(window.__vw_third_slug)))*/ true) {

                                    //alert();

                                    let image = [];

                                    if(window.__spvw_images.hasOwnProperty(window.__vw_first_slug) && window.__spvw_images[window.__vw_first_slug].hasOwnProperty(window.__vw_second_slug) && window.__spvw_images[window.__vw_first_slug][window.__vw_second_slug].hasOwnProperty(window.__vw_third_slug)) {
                                        image = window.__spvw_images[window.__vw_first_slug][window.__vw_second_slug][window.__vw_third_slug];
                                        console.log('Simple', image);
                                    } else {
                                        image = window.spvw_findimage(window.__spvw_images,$val);

                                        console.log(image);

                                    }
                                     
                                    /*console.log(image);*/
                                    
                                    if(typeof(image)==='object') {
                                        /*console.log('OBJECT');*/
                                        image = Object.values(image);
                                        jQuery.each(image,function(i,e){ 
                                            
                                            console.log(jQuery('.spvw_images_'+ (i).toString()), jQuery('.spvw_images_'+ (i).toString()).length);

                                            if(jQuery('.spvw_images_'+ (i).toString()).length>0) {
                                                if(e!==false && e){                                             
                                                    jQuery('[src^="'+jQuery('.spvw_images_'+(i).toString()).attr('src')+'"]').attr('src',e);
                                                }
                                            } else {

                                                let spvw_target_image = jQuery('[src^="'+window.__spvw_initial_images[i]+'"]');
                                                spvw_target_image.attr('data-src','');
                                                spvw_target_image.attr('srcset','');
                                                console.log(e);
                                                spvw_target_image.attr('src',e);
                                                spvw_target_image.addClass('spvw_images_'+(i).toString());
                                            }
                                        });
                                    } else {
                                        
                                        jQuery('.woocommerce-product-gallery__image:eq(0) img:eq(0)').attr('data-src','');
                                        jQuery('.woocommerce-product-gallery__image:eq(0) img:eq(0)').attr('srcset','');
                                        jQuery(".img-fluid.big-img,.woocommerce-product-gallery__image:eq(0) img:eq(0)").attr('src',image); 
                                    }
                                }

                                jQuery('tr:has(td>#pa_'+$slug+')').val($val);
                                jQuery('tr:has(td>#pa_'+$slug+')').trigger('change');
                            }
                            <?php else: ?>
                                window.spvw = function($slug,$val) {
                                    
                                }
                            <?php endif; ?>

                            <?php foreach ($attributes_list as $attribute_slug): ?>
                                jQuery('tr:has(td>#pa_<?php echo $attribute_slug; ?>)').css('display','none');  
                            <?php endforeach; ?>                            

                            /*jQuery(document).on('click','.metal_color_images_options li',function(){
                                jQuery('.metal_color_images_option').css('border','none');
                                jQuery(this).find('.metal_color_images_option').css('border','1px solid');
                            });*/
                        });

                        

                    </script>

    } 
}