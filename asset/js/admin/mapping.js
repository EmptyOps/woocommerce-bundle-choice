jQuery(document).ready(function($){
    
    //hide necessary things
    jQuery('.range_section').transition('hide');
    jQuery('.range_section').css('display', 'none');
    jQuery('#eo_wbc_first_category_range').parent().transition('hide');
    jQuery('#eo_wbc_second_category_range').parent().transition('hide');

    $('#range_first_1').on('change',function(e){
        e.preventDefault();
        e.stopPropagation();

        hide_show_range(this, true);                
    });

    $('#range_second_1').on('change',function(e){
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
            if( ( is_first && !jQuery('#range_second_1').is(":checked") ) || ( !is_first && !jQuery('#range_first_1').is(":checked") ) ) {
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

    $('.ui.fluid.selection.dropdown').on('keyup',function(){
        
        $this = $(this);         
        $form = $($this).closest('form');
        
        $.post(eowbc_object.admin_url,{
                    action:$form.find('[name="action"]').val(),
                    term:$($this).find('.search').val(),
                    _wpnonce:$form.find('[name="_wpnonce"]:eq(0)').val(),
                    _wp_http_referer:$form.find('[name="_wp_http_referer"]:eq(0)').val(),
                    resolver:$form.find('[name="resolver"]:eq(0)').val(),
                    sub_action:'fetch_product'
                },
            function(data){

            if(data!==false){
                //$target=$($this).find("[data-search-tag]");
                $target=$($this).find(".menu");
                
                $target.find('[data-search-product]').remove();
                $html='';
                $.each(data,function(i,e){                            
                    $html=$html+'<div class="item" data-search-product="1" data-value="pid_'+i+'"><img class="ui avatar image" src="'+e[1]+'">'+e[0]+'</div>';                                                        
                });                           
                $target.prepend($html);
            }
        });
    });

    $('.ui.fluid.selection.dropdown .menu').on('click keyup','[data-search-product]',function(){
        $('[data-search-product]').remove();
    });


});

