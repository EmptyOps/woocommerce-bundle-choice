jQuery(document).ready(function(jQuery){
    
    //hide necessary things
    jQuery('.range_section').transition('hide');
    jQuery('.range_section').css('display', 'none');
    jQuery('#eo_wbc_first_category_range').parent().transition('hide');
    jQuery('#eo_wbc_second_category_range').parent().transition('hide');

    $('#range_first').on('change',function(e){
        e.preventDefault();
        e.stopPropagation();

        hide_show_range(this, true);                
    });

    $('#range_second').on('change',function(e){
        e.preventDefault();
        e.stopPropagation();

        hide_show_range(this, false);                
    });

    function hide_show_range(changed_obj, is_first) {
        if( jQuery(changed_obj).is(":checked") ) {
            jQuery('.range_section').removeAttr('style');
            jQuery('.range_section').parent().transition('show'); 
            if( is_first ) {
                jQuery('#eo_wbc_first_category_range').parent().transition('show');
            }
            else {
                jQuery('#eo_wbc_second_category_range').parent().transition('show');
            }
        }
        else {
            if( ( is_first && !jQuery('#range_second').is(":checked") ) || ( !is_first && !jQuery('#range_first').is(":checked") ) ) {
                console.log("remove all");
                jQuery('.range_section').transition('hide'); 
                jQuery('.range_section').css('display', 'none');
                jQuery('#eo_wbc_first_category_range').parent().transition('hide');
                jQuery('#eo_wbc_second_category_range').parent().transition('hide');
            }
            else {
                console.log("remove one");
                
                if( is_first ) {
                    jQuery('#eo_wbc_first_category_range').parent().transition('hide');
                }
                else {
                    jQuery('#eo_wbc_second_category_range').parent().transition('hide');
                }
            }
        }
    }

});

