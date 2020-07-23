$ = jQuery;

jQuery(document).ready(function($){
	$(".ui.selection.dropdown").dropdown();	
	$(".ui.pointing.secondary.menu>.item").tab();
    $(".exclamation.circle.icon").popup({position:'bottom left',hoverable:true});

	//Open wordpress media manager on button click
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
        //var form = jQuery(document).find('form').has(this);
        var form = jQuery(this).closest('form');
        
        /*
        *   send Ajax request to save the configurations.
        *   get response and alert as needed.
        */      
        var form_type = form.attr('method').trim();
        if(form_type == "") {
            form_type = 'POST';
        }
        var temp_fcf='';
        var temp_scf='';
        if($(this).attr('id')=='d_fconfig_submit_btn' || $(this).attr('id')=='s_fconfig_submit_btn'){
            temp_fcf = $('[name="first_category_altr_filt_widgts"]').val();
            $('[name="first_category_altr_filt_widgts"]').val('user_manually_added');
            temp_scf = $('[name="second_category_altr_filt_widgts"]').val();
            $('[name="second_category_altr_filt_widgts"]').val('user_manually_added');
        }

        console.log( "is_per_tab_save " + jQuery(form).data("is_per_tab_save") );
        if( jQuery(form).data("is_per_tab_save") != undefined && jQuery(form).data("is_per_tab_save") == true ) {
            console.log( "is_per_tab_save in if" );
            var formid = jQuery(form).attr("id");
            jQuery('#'+formid+' #saved_tab_key').val( jQuery(this).data("tab_key") );
        }

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
            console.log(serform);
        }

        jQuery.ajax({
            url:eowbc_object.admin_url,
            type: form_type,
            data: serform,
            beforeSend:function(xhr){

            },
            success:function(result,status,xhr){
                var resjson = jQuery.parseJSON(result);
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
                /*console.log(xhr);*/
                $('body').toast({
                    class:'error',
                    position: 'bottom right',
                    message: `Network Error!`
                });                
            },
            complete:function(xhr,status){
                /*console.log(xhr);*/
                if($(this).attr('id')=='d_fconfig_submit_btn' || $(this).attr('id')=='s_fconfig_submit_btn'){            
                    $('[name="first_category_altr_filt_widgts"]').val(temp_fcf);             
                    $('[name="second_category_altr_filt_widgts"]').val(temp_scf);
                }                
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

        //delete

        if( jQuery( "#" + jQuery(this).data("bulk_table_id") + "_bulk" ).val() == "delete") {
            if(confirm('Are you sure want to delete?')){
                var cbs = [];

                //find table and loop through rows and prepare checked checkboxes
                jQuery( "#" + jQuery(this).data("bulk_table_id") + " > tbody  > tr" ).each(function(i, row) {
                    var cb = jQuery(row).find('input[type=checkbox]')[0];
                    if( jQuery(cb).is(':checked') ) {
                        cbs.push( cb );    
                    }
                });
                
                if(cbs.length>0){
                    eowbc_do_delete(cbs, jQuery(this).data("tab_key"));       
                }
            } else {
                return false
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
                eowbc_do_activate(cbs, jQuery(this).data("tab_key"));       
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
                eowbc_do_deactivate(cbs, jQuery(this).data("tab_key"));       
            }
        } else {
            eowbc_toast_common( "warning", "Please select bulk action to apply" );
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
        var form = jQuery($this).closest("form");
        let saved_tab_key = jQuery(".ui.pointing.secondary.menu>.item.active").data('tab');
        let clean_tab_key = jQuery(".ui.pointing.secondary.menu>.item.active").data('clean_tab_key');
        let id = $(this).data('wbc-editid');
        /*console.log($(this).find(':checkbox').val());*/
        
        if( typeof(clean_tab_key) == undefined || typeof(clean_tab_key) == 'undefined' || clean_tab_key == '' ) {
            clean_tab_key = saved_tab_key;
        }

        console.log(e.srcElement.nodeName);
        if(e.srcElement.nodeName!='INPUT'){
            console.log('in');
            jQuery.ajax({
                url:eowbc_object.admin_url,
                type: 'POST',
                data: { _wpnonce: jQuery( jQuery(form).find('input[name="_wpnonce"]')[0] ).val(),_wp_http_referer: jQuery( jQuery(form).find('input[name="_wp_http_referer"]')[0] ).val(), action: jQuery( jQuery(form).find('input[name="action"]')[0] ).val(), resolver: jQuery( jQuery(form).find('input[name="resolver"]')[0] ).val(), saved_tab_key: saved_tab_key, id: id, sub_action: "fetch" },
                beforeSend:function(xhr){

                },
                success:function(result,status,xhr){
                    var resjson = jQuery.parseJSON(result);
                    if( typeof(resjson["type"]) != undefined && resjson["type"] == "success" ){
                        let list = JSON.parse(resjson["msg"]);
                        for(let property in list){
                            if (list.hasOwnProperty(property) && $('#'+property)!==undefined) {
                                
                                
                                if($('.ui.checkbox [name="'+property+'"]').length>0 && list[property] !== ''){
                                    console.log(list[property]);
                                    $('.ui.checkbox [name="'+property+'"]').parent().checkbox('set checked');
                                } else if($('.ui.dropdown #'+property).length>0) {
                                    $('#'+property).parent().dropdown('set selected',list[property]);
                                } else {
                                    $('#'+property).val(list[property]);    
                                }                                
                                //console.log(list[property]);
                            }
                        }   
                        jQuery("#"+ clean_tab_key+"_id").val(id);
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
                }
            });
        }
        return false;
    });
});

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

function eowbc_do_delete( cbs, saved_tab_key ) {

    ids = [];
    for(var i=0; i<cbs.length; i++) {
        ids.push( jQuery(cbs[i]).val() );
    }

    var form = jQuery(cbs[0]).closest("form");
    console.log(form);
    jQuery.ajax({
        url:eowbc_object.admin_url,
        type: 'POST',
        data: { _wpnonce: jQuery( jQuery(form).find('input[name="_wpnonce"]')[0] ).val(),_wp_http_referer: jQuery( jQuery(form).find('input[name="_wp_http_referer"]')[0] ).val(), action: jQuery( jQuery(form).find('input[name="action"]')[0] ).val(), resolver: jQuery( jQuery(form).find('input[name="resolver"]')[0] ).val(), saved_tab_key: saved_tab_key, ids: ids, sub_action: "bulk_delete" },
        beforeSend:function(xhr){

        },
        success:function(result,status,xhr){
            var resjson = jQuery.parseJSON(result);
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
        }
    });
}

function eowbc_do_activate( cbs, saved_tab_key ) {

    ids = [];
    for(var i=0; i<cbs.length; i++) {
        ids.push( jQuery(cbs[i]).val() );
    }

    var form = jQuery(cbs[0]).closest("form");
    console.log(form);
    jQuery.ajax({
        url:eowbc_object.admin_url,
        type: 'POST',
        data: { _wpnonce: jQuery( jQuery(form).find('input[name="_wpnonce"]')[0] ).val(),_wp_http_referer: jQuery( jQuery(form).find('input[name="_wp_http_referer"]')[0] ).val(), action: jQuery( jQuery(form).find('input[name="action"]')[0] ).val(), resolver: jQuery( jQuery(form).find('input[name="resolver"]')[0] ).val(), saved_tab_key: saved_tab_key, ids: ids, sub_action: "bulk_activate" },
        beforeSend:function(xhr){

        },
        success:function(result,status,xhr){
            var resjson = jQuery.parseJSON(result);
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
        }
    });
}

function eowbc_do_deactivate( cbs, saved_tab_key ) {
    ids = [];
    for(var i=0; i<cbs.length; i++) {
        ids.push( jQuery(cbs[i]).val() );
    }

    var form = jQuery(cbs[0]).closest("form");
    console.log(form);
    jQuery.ajax({
        url:eowbc_object.admin_url,
        type: 'POST',
        data: { _wpnonce: jQuery( jQuery(form).find('input[name="_wpnonce"]')[0] ).val(),_wp_http_referer: jQuery( jQuery(form).find('input[name="_wp_http_referer"]')[0] ).val(), action: jQuery( jQuery(form).find('input[name="action"]')[0] ).val(), resolver: jQuery( jQuery(form).find('input[name="resolver"]')[0] ).val(), saved_tab_key: saved_tab_key, ids: ids, sub_action: "bulk_deactivate" },
        beforeSend:function(xhr){

        },
        success:function(result,status,xhr){
            var resjson = jQuery.parseJSON(result);
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
        }
    });

}
