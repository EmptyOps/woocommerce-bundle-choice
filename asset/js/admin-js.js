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

        jQuery.ajax({
            url:eowbc_object.admin_url,
            type: form_type,
            data:$(form).serialize(),
            beforeSend:function(xhr){

            },
            success:function(result,status,xhr){
                
                resjson = jQuery.parseJson(result);
                if( typeof(resjson["type"]) != undefined && resjson["type"] == "success" ){
                    $('body').toast({
                        class:'success',
                        position: 'bottom right',
                        message: `Saved!`
                    });
                } else {
                    $('body').toast({
                        class: (typeof(resjson["type"]) != undefined ? resjson["type"] : 'error'),
                        position: 'bottom right',
                        message: (typeof(resjson["msg"]) != undefined ? resjson["msg"] : `Failed! Please check Logs page for for more details.`)
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
});