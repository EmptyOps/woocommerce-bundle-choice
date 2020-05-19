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

    $('button.ui.button[data-action="save"]').on('click',function(e){
        e.preventDefault();
        e.stopPropagation();
        var form = jQuery(document).find('form').has(this);
        
        /*
        *   send Ajax request to save the configurations.
        *   get response and alert as needed.
        */      
        var form_type = form.attr('method').trim();
        if(form_type == "") {
            form_type = 'POST';
        }

        if( jQuery(form).data("is_per_tab_save") != undefined && jQuery(form).data("is_per_tab_save") == "true" ) {
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
                    console.log({
                        class:'success',
                        position: 'bottom right',
                        message: (typeof(resjson["msg"]) != undefined && resjson["msg"] != "" ? resjson["msg"] : `Saved!`)
                    });
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
    });  


    jQuery("#jpc_price_ctl_table").on('click touch','.ui.icon.delete,a>.ui.icon.delete',function(e){
        e.preventDefault();
        e.stopPropagation();
        jQuerythis_index=jQuery(this).index('#jpc_price_ctl_table .ui.icon.delete');
        window.eo_wbc.jpc_data=window.eo_wbc.jpc_data.filter(function(e,i){
            if(i==jQuerythis_index){ return false; } else{ return true }
        });

        jQuery(this).parentsUntil('tbody').remove();

        if(jQuery("#jpc_price_ctl_table tbody").find('tr').length<=0){
            //jQuery("#jpc_price_ctl_table").parent().transition('hide');
            jQuery('.jpc_price_ctl_table').transition('hide');
            jQuery("#jpc_save_price_ctl").transition('hide');
        }  

        do_delete();              
    });

    $('button.ui.button[data-bulk_action="delete"], ').on('click',function(e){
        e.preventDefault();
        e.stopPropagation();
        
        do_delete();
    }); 

    function do_delete() {

    }

});