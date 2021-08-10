jQuery(document).ready(function($){
	$("[name='config_buttons_page']").change(function(){            
        if($(this).val()==1 || $(this).val()==3 ){ //Default setting routine is selected
            // $(".eo_wbc_btn_setting_position_toggle").show();
            // $(".eo_wbc_btn_setting_page_toggle").hide();
            // $(".eo_wbc_position_toggle").show();                
            $('#config_buttons_position').show();
            $('#config_view_custom_landing_link').hide();
            // toggle_btn_position();
        }
        else{ //Shortcode setting routine is selected
            if($(this).val()==0){
                $('#config_view_custom_landing_link').show();
            } else {
                $('#config_view_custom_landing_link').hide();
            }
            
            // $(".eo_wbc_btn_setting_page_toggle").show();
            // $(".eo_wbc_btn_setting_position_toggle").hide();
            $('#config_buttons_position').hide();
        }            
    })/*.val("<?php echo get_option('eo_wbc_btn_setting')?get_option('eo_wbc_btn_setting'):"0"; ?>")*/.trigger('change');
});