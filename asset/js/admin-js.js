// a shared namespace among plugins and extensions of the sphere plugins
window.document.splugins = window.document.splugins || {};

window.document.splugins.is_debug = false; 
window.document.splugins.is_test_script_debug = false;    

window.document.splugins.process_debug_log = function(obj,debug_log) {  
   if( window.document.splugins.is_test_script_debug ) {
        var __debug_log = jQuery(obj).attr('data-debug_log');
        jQuery(obj).attr('data-debug_log', (typeof(__debug_log) != "undefined" && typeof(__debug_log) != undefined ? __debug_log : "" ) + debug_log);
    }
};

window.document.splugins.hasAttr = function(obj,name) {  
   return jQuery(obj).attr(name) !== undefined;
};

window.document.splugins.extractJSON = function(str) {
    var firstOpen, firstClose, candidate;
    firstOpen = str.indexOf('{', firstOpen + 1);
    do {
        firstClose = str.lastIndexOf('}');
        console.log('firstOpen: ' + firstOpen, 'firstClose: ' + firstClose);
        if(firstClose <= firstOpen) {
            return null;
        }
        do {
            candidate = str.substring(firstOpen, firstClose + 1);
            console.log('candidate: ' + candidate);
            try {
                var res = JSON.parse(candidate);
                console.log('...found');
                return [res, firstOpen, firstClose + 1];
            }
            catch(e) {
                console.log('...failed');
            }
            firstClose = str.substr(0, firstClose).lastIndexOf('}');
        } while(firstClose > firstOpen);
        firstOpen = str.indexOf('{', firstOpen + 1);
    } while(firstOpen != -1);
}

window.document.splugins.parseJSON = function(result) {
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

        if( typeof(resjson["type"]) == undefined || typeof(resjson["type"]) == 'undefined' ) {
            console.log('splugins parseJSON undefined type detected in the json response');
            resjson["type"] = "error";
        }

        if( typeof(resjson["msg"]) == undefined || typeof(resjson["msg"]) == 'undefined' ) {
            console.log('splugins parseJSON undefined msg detected in the json response');
            resjson["msg"] = "";
        }
        
        return resjson;
    }
    else {
        return {"type":"error","msg":"Unable to parse result json object, please contact Sphere Plugins Support for a quick fix on this issue."};
    }
}

$ = jQuery;

function eowbc_ready($){

    $(".ui.selection.dropdown:not(.additions)").dropdown();
    $(".ui.selection.dropdown.additions").dropdown({ allowAdditions: true });   
    $(".ui.pointing.secondary.menu>.item").tab();
    $(".exclamation.circle.icon").popup({position:'bottom left',hoverable:true});
    $('.ui.accordion').accordion({selector: {trigger: '.title'}});
    
    jQuery("#d_fconfig_input_type_dropdown_div,#s_fconfig_input_type_dropdown_div").on('change',function(){
        let value = jQuery(this).dropdown('get value')
        let prefix = (jQuery(this).attr('id')=='d_fconfig_input_type_dropdown_div'?'d':'s');
        let tab = jQuery(this).closest('[data-tab]');
        if(value === 'icon' || value === 'icon_text') {            
            $(tab).children('.fields').has('[for="'+prefix+'_fconfig_is_single_select"]').show();
            $(tab).children('.fields').has('#'+prefix+'_fconfig_icon_size_label_label_div').show();
            $(tab).children('.fields').has('#'+prefix+'_fconfig_icon_size').show();
            $(tab).children('.fields').has('#'+prefix+'_fconfig_icon_label_size_label_label_div').show();
            $(tab).children('.fields').has('#'+prefix+'_fconfig_icon_label_size').show();
            
        } else {
            $(tab).children('.fields').has('[for="'+prefix+'_fconfig_is_single_select"]').hide();
            $(tab).children('.fields').has('#'+prefix+'_fconfig_icon_size_label_label_div').hide();
            $(tab).children('.fields').has('#'+prefix+'_fconfig_icon_size').hide();
            $(tab).children('.fields').has('#'+prefix+'_fconfig_icon_label_size_label_label_div').hide();
            $(tab).children('.fields').has('#'+prefix+'_fconfig_icon_label_size').hide();            
        }
    }).trigger('change');

    jQuery("[name='d_fconfig_add_help'],[name='s_fconfig_add_help']").on('change',function(){

        let prefix = (jQuery(this).attr('name')=='d_fconfig_add_help'?'d':'s');
        let tab = jQuery(this).closest('[data-tab]');
        if(jQuery(this).is(':checked')){
            $(tab).children('.fields').has('#'+prefix+'_fconfig_add_help_text').show();
        } else {
            $(tab).children('.fields').has('#'+prefix+'_fconfig_add_help_text').hide();
        }
    }).trigger('change');

    jQuery("#s_fconfig_input_type_dropdown_div").on('change',function(){
        let ids = jQuery(this).parent().data('toggle');
        jQuery(ids).toggle();
    });

    //Open wordpress media manager on button click
    jQuery('.field.upload_image>.ui.button').off('click');
    jQuery('.field.upload_image>.ui.button').on('click',function(event){
        event.preventDefault();
        action_root=$(this).parent();
        // If the media frame already exists, reopen it.
        /*if (typeof(file_frame)!=undefined) {                 
            // Open frame
            file_frame.open();
            return;
        }*/
        // Create the media frame.
        file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select an image to upload',
            button: {
                text: 'Use this image',
            },
            multiple: false // Set to true to allow multiple files to be selected
        });
        file_frame.on('select', function() {
            attachment = file_frame.state().get('selection').first().toJSON();          
            action_root.find("img").attr('src',attachment.url).css( 'width', 'auto' );
            action_root.find("input[type='hidden']").val( attachment.id );
        });
        // Finally, open the modal
        file_frame.open();
    }); 

    $('button.ui.button[data-action="cancel"]').on('click',function(e){
        e.preventDefault();
        e.stopPropagation();

        window.history.back();
        // window.location.href=document.referrer;
    });

    $('button.ui.button[data-action="save"]').on('click',function(e){
        e.preventDefault();
        e.stopPropagation();
        var $this = this;

        var original_txt = jQuery($this).text();
        var original_cursor = jQuery($this).css('cursor');
        var processing_txt = window.document.splugins.hasAttr(this,'data-loading_text') ? jQuery($this).attr('data-loading_text') : 'Processing...';
        if( original_txt == processing_txt ) { 
            window.document.splugins.process_debug_log( $this, "In progress processing detected..." );
            return; 
        }
        else {
            window.document.splugins.process_debug_log( $this, "Starting save process..." );
        }
        jQuery($this).text(processing_txt);
        jQuery($this).css('cursor', 'default');

        // window.document.splugins.process_debug_log( $this, "tmp at here 1" );

        // var is_update_post_values = false;
        // var temp_fcf='';
        // var temp_scf='';
        // if($($this).attr('id')=='d_fconfig_submit_btn' || $($this).attr('id')=='s_fconfig_submit_btn'){
        //     console.log('is_update_post_values here 1');
        //     is_update_post_values = true;
        //     temp_fcf = $('[name="first_category_altr_filt_widgts"]').val();
        //     $('[name="first_category_altr_filt_widgts"]').val('user_manually_added');
        //     console.log('is_update_post_values here 1.1 '+$('[name="first_category_altr_filt_widgts"]').val());
        //     temp_scf = $('[name="second_category_altr_filt_widgts"]').val();
        //     $('[name="second_category_altr_filt_widgts"]').val('user_manually_added');
        // }

        //var form = jQuery(document).find('form').has(this);
        var form = jQuery(this).closest('form');
        
        // window.document.splugins.process_debug_log( $this, "tmp at here 2" );

        /*
        *   send Ajax request to save the configurations.
        *   get response and alert as needed.
        */      
        var form_type = form.attr('method').trim();
        if(form_type == "") {
            form_type = 'POST';
        }

        // window.document.splugins.process_debug_log( $this, "tmp at here 3" );

        if( jQuery(form).data("is_per_tab_save") != undefined && jQuery(form).data("is_per_tab_save") == true ) {
            
            var formid = jQuery(form).attr("id");
            jQuery('#'+formid+' #saved_tab_key').val( jQuery(this).data("tab_key") );
        }

        // window.document.splugins.process_debug_log( $this, "tmp at here 4" );

        var serform = null;
        if( jQuery(form).data("is_serialize") == undefined || jQuery(form).data("is_serialize") == "true" ) {
            serform = jQuery(form).serialize();
        }
        else {
            serform = "";
            var formid = jQuery(form).attr("id");
            jQuery('#'+formid+' input, #'+formid+' select, #'+formid+' textarea').each(
                function(index){  
                    var input = jQuery(this);
                    serform += encodeURIComponent(input.attr('name'))+'='+encodeURIComponent(input.val())+'&';
                }
            );            
        }

        // if(is_update_post_values){            
        //     console.log('is_update_post_values here 2');
        //     $('[name="first_category_altr_filt_widgts"]').val(temp_fcf);             
        //     $('[name="second_category_altr_filt_widgts"]').val(temp_scf);
        // } 

        // window.document.splugins.process_debug_log( $this, "serform " + serform );
        // window.document.splugins.process_debug_log( $this, "tmp at here 5" );

        jQuery.ajax({
            url:eowbc_object.admin_url,
            type: form_type,
            data: serform,
            beforeSend:function(xhr){

            },
            success:function(result,status,xhr){
                window.document.splugins.process_debug_log( $this, " success result " + result );

                var resjson = window.document.splugins.parseJSON(result);     //jQuery.parseJSON(result);
                if( typeof(resjson["type"]) != undefined && resjson["type"] == "success" ){

                    // console.log({
                    //     class:'success',
                    //     position: 'bottom right',
                    //     message: (typeof(resjson["msg"]) != undefined && resjson["msg"] != "" ? resjson["msg"] : `Saved!`)
                    // });
                    if($($this).is('[data-callback]')){
                        $($this).trigger($($this).data('callback'));
                    }
                    $('body').toast({
                        class:'success',
                        position: 'bottom right',
                        message: (typeof(resjson["msg"]) != undefined && resjson["msg"] != "" ? resjson["msg"] : `Saved!`)
                    });

                } else {
                    $('body').toast({
                        class: (typeof(resjson["type"]) != undefined ? resjson["type"] : 'error'),
                        position: 'bottom right',
                        message: (typeof(resjson["msg"]) != undefined && resjson["msg"] != "" ? resjson["msg"] : `Failed! Please check Logs page for for more details.`)
                    });
                }                   
            },
            error:function(xhr,status,error){
                window.document.splugins.process_debug_log( $this, " caught error " + error );

                /*console.log(xhr);*/
                $('body').toast({
                    class:'error',
                    position: 'bottom right',
                    message: `Network Error!`
                });                
            },
            complete:function(xhr,status){
                /*console.log(xhr);*/
                // if($(this).attr('id')=='d_fconfig_submit_btn' || $(this).attr('id')=='s_fconfig_submit_btn'){            
                //     $('[name="first_category_altr_filt_widgts"]').val(temp_fcf);             
                //     $('[name="second_category_altr_filt_widgts"]').val(temp_scf);
                // }                

                jQuery($this).css('cursor', original_cursor);
                jQuery($this).text(original_txt);
            }
        });
    });  

    $('input[data-action="bulk_select_all"]').on('change',function(e){
        e.preventDefault();
        e.stopPropagation();

        var maincb = this;
        var check_uncheck = jQuery(maincb).is(":checked");

        //set all checkboxes checked 
        jQuery( "#" + jQuery(this).data("bulk_table_id") + " > tbody  > tr" ).each(function(i, row) {
            var cb = jQuery(row).find('input[type=checkbox]')[0];
            // if( check_uncheck ) {
                jQuery(cb).prop('checked', check_uncheck);
            // }
            // else {
            //     jQuery(cb).removeAttr('checked');
            // }
        });            
    });

    $('button.ui.button[data-action="bulk"]').on('click',function(e){
        e.preventDefault();
        e.stopPropagation();
        var $this = this;

        var original_txt = jQuery($this).text();
        var original_cursor = jQuery($this).css('cursor');
        var processing_txt = window.document.splugins.hasAttr(this,'data-loading_text') ? jQuery($this).attr('data-loading_text') : 'Processing...';
        if( original_txt == processing_txt ) { return; }
        jQuery($this).text(processing_txt);
        jQuery($this).css('cursor', 'default');

        var complete_callback = function() {
            jQuery($this).css('cursor', original_cursor);
            jQuery($this).text(original_txt);
        }

        //delete

        if( jQuery( "#" + jQuery(this).data("bulk_table_id") + "_bulk" ).val() == "delete") {
            var cbs = [];

            //find table and loop through rows and prepare checked checkboxes
            jQuery( "#" + jQuery(this).data("bulk_table_id") + " > tbody  > tr" ).each(function(i, row) {
                var cb = jQuery(row).find('input[type=checkbox]')[0];
                if( jQuery(cb).is(':checked') ) {
                    cbs.push( cb );    
                }
            });
            
            if(cbs.length>0){
                if(confirm('Are you sure want to delete?')){
                    eowbc_do_delete(cbs, jQuery(this).data("tab_key"), complete_callback);   
                } else {
                    complete_callback();
                    return false;
                }    
            } 
            else {
                eowbc_toast_common( "warning", 'Please select record(s) to proceed');
                complete_callback();
            }
            
        } else if( jQuery( "#" + jQuery(this).data("bulk_table_id") + "_bulk" ).val() == "activate" ) {
            var cbs = [];

            //find table and loop through rows and prepare checked checkboxes
            jQuery( "#" + jQuery(this).data("bulk_table_id") + " > tbody  > tr" ).each(function(i, row) {
                var cb = jQuery(row).find('input[type=checkbox]')[0];
                if( jQuery(cb).is(':checked') ) {
                    cbs.push( cb );    
                }
            });
            
            if(cbs.length>0){
                eowbc_do_activate(cbs, jQuery(this).data("tab_key"), complete_callback);       
            }
            else {
                eowbc_toast_common( "warning", 'Please select record(s) to proceed');
                complete_callback();
            }
        } else if( jQuery( "#" + jQuery(this).data("bulk_table_id") + "_bulk" ).val() == "deactivate" ) {
            var cbs = [];

            //find table and loop through rows and prepare checked checkboxes
            jQuery( "#" + jQuery(this).data("bulk_table_id") + " > tbody  > tr" ).each(function(i, row) {
                var cb = jQuery(row).find('input[type=checkbox]')[0];
                if( jQuery(cb).is(':checked') ) {
                    cbs.push( cb );    
                }
            });
            
            if(cbs.length>0){
                eowbc_do_deactivate(cbs, jQuery(this).data("tab_key"), complete_callback);       
            }
            else {
                eowbc_toast_common( "warning", 'Please select record(s) to proceed');
                complete_callback();
            }
        } else {
            eowbc_toast_common( "warning", "Please select bulk action to apply" );
            complete_callback();
        }
    });

    jQuery(document).ready(function(){
        jQuery(".question.circle.outline.eo_help.icon").popup({hoverable:true,onShow:function(){jQuery('.ui.popup').css('max-height', jQuery(window).height());}});
    });

    $(".ui.negative.message .close.icon").click(function(){
        jQuery(".ui.negative.message").addClass('transition hidden');
    });

    jQuery(document).on('click',"[data-wbc-editid]",function(e){
        e.preventDefault();
        e.stopPropagation();
        let $this = $(this);

        var original_txt = jQuery($this).text();
        var original_cursor = jQuery($this).css('cursor');
        var processing_txt = window.document.splugins.hasAttr(this,'data-loading_text') ? jQuery($this).attr('data-loading_text') : 'Loading...';
        if( original_txt == processing_txt ) { return; }
        jQuery($this).text(processing_txt);
        jQuery($this).css('cursor', 'default');

        var complete_callback = function( is_success ) {
            jQuery($this).css('cursor', original_cursor);
            jQuery($this).text(original_txt);

            if( is_success ) {
                $("html, body").animate({ scrollTop: $(document).height()-$(window).height()-100 }, 1500);
            }
        }

        var form = jQuery($this).closest("form");
        let saved_tab_key = jQuery(".ui.pointing.secondary.menu>.item.active").data('tab');
        let clean_tab_key = jQuery(".ui.pointing.secondary.menu>.item.active").data('clean_tab_key');
        let id = $(this).data('wbc-editid');
        /*console.log($(this).find(':checkbox').val());*/
        
        if( typeof(clean_tab_key) == undefined || typeof(clean_tab_key) == 'undefined' || clean_tab_key == '' ) {
            clean_tab_key = saved_tab_key;
        }

        // if(e.hasOwnProperty('srcElement') && e.srcElement.hasOwnProperty('nodeName') && e.srcElement.nodeName!='INPUT'){
        if( window.document.splugins.hasAttr(this,'data-wbc-editid') ) {

            jQuery.ajax({
                url:eowbc_object.admin_url,
                type: 'POST',
                data: { _wpnonce: jQuery( jQuery(form).find('input[name="_wpnonce"]')[0] ).val(),_wp_http_referer: jQuery( jQuery(form).find('input[name="_wp_http_referer"]')[0] ).val(), action: jQuery( jQuery(form).find('input[name="action"]')[0] ).val(), resolver: jQuery( jQuery(form).find('input[name="resolver"]')[0] ).val(),resolver_path: jQuery( jQuery(form).find('input[name="resolver_path"]')[0] ).val(), saved_tab_key: saved_tab_key, id: id, sub_action: "fetch" },
                beforeSend:function(xhr){

                },
                success:function(result,status,xhr){
                    var resjson = window.document.splugins.parseJSON(result);    //jQuery.parseJSON(result);
                    if( typeof(resjson["type"]) != undefined && resjson["type"] == "success" ){
                        let list = JSON.parse(resjson["msg"]);
                        for(let property in list){
                            if (list.hasOwnProperty(property) && $('#'+property)!==undefined) {
                                
                                
                                if($('.ui.checkbox [name="'+property+'"]').length>0){
                                    if(list[property] !== '' && list[property] != 0){
                                        $('.ui.checkbox [name="'+property+'"]').parent().checkbox('set checked');    
                                    } else {
                                        $('.ui.checkbox [name="'+property+'"]').parent().checkbox('set unchecked');
                                    }
                                    
                                } else if($('.ui.dropdown #'+property).length>0) {
                                    if($('#'+property).parent().hasClass('multiple')){
                                        setTimeout(function(){
                                            $.each(list[property].split(','),function(index,item){
                                                if(item!==''){
                                                    $('#'+property).parent().dropdown('set selected',item);
                                                }
                                            });                                        
                                        },2000);
                                    } else {
                                        $('#'+property).parent().dropdown('set selected',list[property]);    
                                    }                                    
                                } else {
                                    $('#'+property).val(list[property]);    
                                }                                
                                //console.log(list[property]);
                            }
                        }   
                        jQuery("#"+ clean_tab_key+"_id").val(id);

                        complete_callback(true);
                    } else {
                        $('body').toast({
                            class: (typeof(resjson["type"]) != undefined ? resjson["type"] : 'error'),
                            position: 'bottom right',
                            message: (typeof(resjson["msg"]) != undefined && resjson["msg"] != "" ? resjson["msg"] : `Failed! Please check Logs page for for more details.`)
                        });

                        complete_callback(false);
                    }                        
                },
                error:function(xhr,status,error){
                    /*console.log(xhr);*/
                    $('body').toast({
                        class:'error',
                        position: 'bottom right',
                        message: `Network Error!`
                    });

                    complete_callback(false);
                },
                complete:function(xhr,status){
                    /*console.log(xhr);*/
                }
            });
        }
        return false;
    });
}

jQuery(document).ready(function($){
	eowbc_ready($);
});

window.onerror = eowbc_ready(jQuery);

function eowbc_toast_common( toast_type_class, msg, timeout) {

    if(typeof(timeout)==typeof(undefined)){
        timeout=3000;
    }

    jQuery('body').toast({
        class:toast_type_class,
        position: 'bottom right',
        message: msg,
        displayTime:timeout,
    });
}

function eowbc_do_delete( cbs, saved_tab_key, complete_callback ) {

    ids = [];
    for(var i=0; i<cbs.length; i++) {
        ids.push( jQuery(cbs[i]).val() );
    }

    var form = jQuery(cbs[0]).closest("form");    
    jQuery.ajax({
        url:eowbc_object.admin_url,
        type: 'POST',
        data: { _wpnonce: jQuery( jQuery(form).find('input[name="_wpnonce"]')[0] ).val(),_wp_http_referer: jQuery( jQuery(form).find('input[name="_wp_http_referer"]')[0] ).val(), action: jQuery( jQuery(form).find('input[name="action"]')[0] ).val(), resolver: jQuery( jQuery(form).find('input[name="resolver"]')[0] ).val(),resolver_path: jQuery( jQuery(form).find('input[name="resolver_path"]')[0] ).val(), saved_tab_key: saved_tab_key, ids: ids, sub_action: "bulk_delete" },
        beforeSend:function(xhr){

        },
        success:function(result,status,xhr){
            var resjson = window.document.splugins.parseJSON(result);    //jQuery.parseJSON(result);
            if( typeof(resjson["type"]) != undefined && resjson["type"] == "success" ){
                //remove rows 
                for(var i=0; i<cbs.length; i++) {
                    jQuery(cbs[i]).closest('tr').remove();
                }

                $('body').toast({
                    class:'success',
                    position: 'bottom right',
                    message: (typeof(resjson["msg"]) != undefined && resjson["msg"] != "" ? resjson["msg"] : `Saved!`)
                });
            } else {
                $('body').toast({
                    class: (typeof(resjson["type"]) != undefined ? resjson["type"] : 'error'),
                    position: 'bottom right',
                    message: (typeof(resjson["msg"]) != undefined && resjson["msg"] != "" ? resjson["msg"] : `Failed! Please check Logs page for for more details.`)
                });
            }                
        },
        error:function(xhr,status,error){
            /*console.log(xhr);*/
            $('body').toast({
                class:'error',
                position: 'bottom right',
                message: `Network Error!`
            });
        },
        complete:function(xhr,status){
            /*console.log(xhr);*/

            complete_callback();
        }
    });
}

function eowbc_do_activate( cbs, saved_tab_key, complete_callback ) {

    ids = [];
    for(var i=0; i<cbs.length; i++) {
        ids.push( jQuery(cbs[i]).val() );
    }

    var form = jQuery(cbs[0]).closest("form");    
    jQuery.ajax({
        url:eowbc_object.admin_url,
        type: 'POST',
        data: { _wpnonce: jQuery( jQuery(form).find('input[name="_wpnonce"]')[0] ).val(),_wp_http_referer: jQuery( jQuery(form).find('input[name="_wp_http_referer"]')[0] ).val(), action: jQuery( jQuery(form).find('input[name="action"]')[0] ).val(), resolver: jQuery( jQuery(form).find('input[name="resolver"]')[0] ).val(),resolver_path: jQuery( jQuery(form).find('input[name="resolver_path"]')[0] ).val(), saved_tab_key: saved_tab_key, ids: ids, sub_action: "bulk_activate" },
        beforeSend:function(xhr){

        },
        success:function(result,status,xhr){
            var resjson = window.document.splugins.parseJSON(result);    //jQuery.parseJSON(result);
            if( typeof(resjson["type"]) != undefined && resjson["type"] == "success" ){
                //remove rows 
                for(var i=0; i<cbs.length; i++) {
                    jQuery(cbs[i]).closest('tr').find('td:gt(0)').removeClass('disabled');
                }

                $('body').toast({
                    class:'success',
                    position: 'bottom right',
                    message: (typeof(resjson["msg"]) != undefined && resjson["msg"] != "" ? resjson["msg"] : `Saved!`)
                });
            } else {
                $('body').toast({
                    class: (typeof(resjson["type"]) != undefined ? resjson["type"] : 'error'),
                    position: 'bottom right',
                    message: (typeof(resjson["msg"]) != undefined && resjson["msg"] != "" ? resjson["msg"] : `Failed! Please check Logs page for for more details.`)
                });
            }                
        },
        error:function(xhr,status,error){
            /*console.log(xhr);*/
            $('body').toast({
                class:'error',
                position: 'bottom right',
                message: `Network Error!`
            });
        },
        complete:function(xhr,status){
            /*console.log(xhr);*/

            complete_callback();
        }
    });
}

function eowbc_do_deactivate( cbs, saved_tab_key, complete_callback ) {
    ids = [];
    for(var i=0; i<cbs.length; i++) {
        ids.push( jQuery(cbs[i]).val() );
    }

    var form = jQuery(cbs[0]).closest("form");    
    jQuery.ajax({
        url:eowbc_object.admin_url,
        type: 'POST',
        data: { _wpnonce: jQuery( jQuery(form).find('input[name="_wpnonce"]')[0] ).val(),_wp_http_referer: jQuery( jQuery(form).find('input[name="_wp_http_referer"]')[0] ).val(), action: jQuery( jQuery(form).find('input[name="action"]')[0] ).val(), resolver: jQuery( jQuery(form).find('input[name="resolver"]')[0] ).val(),resolver_path: jQuery( jQuery(form).find('input[name="resolver_path"]')[0] ).val(), saved_tab_key: saved_tab_key, ids: ids, sub_action: "bulk_deactivate" },
        beforeSend:function(xhr){

        },
        success:function(result,status,xhr){
            var resjson = window.document.splugins.parseJSON(result);    //jQuery.parseJSON(result);
            if( typeof(resjson["type"]) != undefined && resjson["type"] == "success" ){
                //remove rows 
                for(var i=0; i<cbs.length; i++) {                    
                    jQuery(cbs[i]).closest('tr').find('td:gt(0)').addClass('disabled');
                }

                $('body').toast({
                    class:'success',
                    position: 'bottom right',
                    message: (typeof(resjson["msg"]) != undefined && resjson["msg"] != "" ? resjson["msg"] : `Saved!`)
                });
            } else {
                $('body').toast({
                    class: (typeof(resjson["type"]) != undefined ? resjson["type"] : 'error'),
                    position: 'bottom right',
                    message: (typeof(resjson["msg"]) != undefined && resjson["msg"] != "" ? resjson["msg"] : `Failed! Please check Logs page for for more details.`)
                });
            }                
        },
        error:function(xhr,status,error){
            /*console.log(xhr);*/
            $('body').toast({
                class:'error',
                position: 'bottom right',
                message: `Network Error!`
            });
        },
        complete:function(xhr,status){
            /*console.log(xhr);*/

            complete_callback();
        }
    });

}
