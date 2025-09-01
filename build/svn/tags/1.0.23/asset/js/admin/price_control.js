var value = "";
var c_val = null; 
var c_label = null; 
var c_elem = null; 

var jpc_values_drop_id_tmpl = "jpc_values_drop_{i}__dropdown_div"; 

jQuery(document).ready(function(jQuery){
    
    //jQuery('.dropdown').dropdown();

    jQuery("#eowbc_pc_add_rule_btn").prop("type", "button");
    jQuery("#jpc_add_price_ctl").prop("type", "button");
    
    //hide necessary things
    jQuery('.jpc_rule_fields').parent().transition('hide');
    jQuery('.jpc_attribute_vals').parent().transition('hide');
    jQuery('.jpc_rules_table').transition('hide');
    jQuery('.jpc_price_ctl_table').transition('hide');
    jQuery("#jpc_save_price_ctl").transition('hide');

    jQuery('#jpc_field_dropdown_div').dropdown({
        onChange:function(valueLcl,label,elem){

            // console.log('got in change events');
            // console.log(label);
            // console.log(valueLcl);
            // console.log(jQuery(elem).data('type'));


            jQuery('[name="jpc_field_name"]').val(label);
            jQuery('[name="jpc_field_value"]').val(valueLcl);
            jQuery('[name="jpc_field_type"]').val(jQuery(elem).data('type'));
            if(jQuery(elem).data('type')==1){
                // jQuery('#select_values_label_label_div').transition('show');
                // jQuery('#jpc_compare_dropdown_div').transition('show');
                jQuery('.jpc_rule_fields').parent().transition('show');
                
                value = valueLcl;

                //so that underlying dropdowns are updated if they are already loaded with other attributes
                if(c_val != null){
                    jpc_compare_dropdown_div(c_val,c_label,c_elem);    
                }
            }else{
                // jQuery('#select_values_label_label_div').transition('hide');
                // jQuery('#jpc_compare_dropdown_div').transition('hide');
                jQuery('.jpc_rule_fields').parent().transition('hide');
                jQuery('.jpc_attribute_vals').parent().transition('hide');
            }
        },
    });

    //jQuery("#jpc_attribute_vals").find("#jpc_compare_dropdown_div").dropdown({
    jQuery("#jpc_compare_dropdown_div").dropdown({
        onChange: jpc_compare_dropdown_div,
    });

    function jpc_compare_dropdown_div(c_valLcl,c_labelLcl,c_elemLcl){

        c_val = c_valLcl; c_label = c_labelLcl; c_elem = c_elemLcl;

        jQuery('[name="jpc_compare_name"]').val(c_label);
        jQuery('[name="jpc_compare_value"]').val(c_val);

        //hide existing drop downs
        jQuery('.jpc_attribute_vals').parent().transition('hide');

        var loop_size = 0;
        console.log(jpc_values_drop_id_tmpl);

        switch(c_val){
            case 'between':        
                loop_size = 2;
                break;
            case 'in':                                    
                loop_size = 1;
                break;
            default:
                break;
        }

        for(var i=1; i<=loop_size; i++){
            drop_id = jpc_values_drop_id_tmpl.replace("{i}", ""+i);
            target=jQuery("#"+drop_id+" .menu");
            jQuery(target).html('');
            jQuery(window.eo_wbc.attributes[value]).each(function(k,v){
                for (var key in window.eo_wbc.attributes[value]) {
                    if (v.hasOwnProperty(key)) {
                        jQuery(target).append('<div class="item" data-value="'+key+'">'+v[key]+'</div>');
                    }
                }
            });            

            if(i==1){
                jQuery("#"+drop_id).dropdown({ onChange:function(val,lab,ele){
                    jQuery('[name="jpc_values_name_1"]').val(lab);
                    jQuery('[name="jpc_values_value_1"]').val(val);          
                }, });
            }
            else {
                jQuery("#"+drop_id).dropdown({ onChange:function(val,lab,ele){
                    jQuery('[name="jpc_values_name_2"]').val(lab);
                    jQuery('[name="jpc_values_value_2"]').val(val);          
                }, });
            }

            jQuery("#"+drop_id).parent().transition('show');
        }

    }

    console.log( "window.eo_wbc.jpc_data" );
    console.log( window.eo_wbc.jpc_data );
    if(!jQuery.isEmptyObject(window.eo_wbc.jpc_data)) {
        /*Create table*/
        // jQuery('#jpc_price_ctl_table').parent().transition('show');
        jQuery('.jpc_price_ctl_table').transition('show');
        jQuery("#jpc_save_price_ctl").transition('show');

        
        jQuery.each(eo_wbc.jpc_data,function(i,e){                        
            if(e.length>=2){
                rows_data='';
                for(l=0;l<e.length-1;l++){

                    if(e[l]['field_type']=='1'){
                        rows_data+=e[l]['field_name']+': '+e[l]['value_name']+'<br/>';
                    }else{
                        rows_data+='['+e[l]['field_name']+']<br/>';
                    }
                    _data=e[l];                            
                }

                jQuery("#jpc_price_ctl_table tbody").append("<tr><td class='center aligned'><a href='#'><i class='ui icon delete'></i></a></td><td class='left aligned'>Regular Price:"+e[e.length-1]['regular_price']+"<br/>"+(e[e.length-1]['sales_price']!=''?'Sales Price:'+e[e.length-1]['sales_price']:'')+"</td><td class='center aligned'>"+rows_data+"</td></tr>");
            }
        });
        
        jQuery("[name='eo_wbc_jpc_form_data']").val(JSON.stringify(window.eo_wbc.jpc_data));
    }

    // jQuery("#jpc_save_price_ctl").on('click touch',function(){
    //     jQuery("[name='eo_wbc_jpc_form_data']").val(JSON.stringify(window.eo_wbc.jpc_data));
    //     document.forms.eo_wbc_jpc_form_submit.submit();
    // })

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
    });

    jQuery("#jpc_add_price_ctl").on('click touch',function(e){
        e.preventDefault();
        e.stopPropagation();

        _regular_price=jQuery("[name='regular_price']").val().trim();
        _sales_price=jQuery("[name='sales_price']").val().trim();
        if( _regular_price=='' || isNaN(_regular_price) ){
            jQuery('body').toast({ class: 'warning', position: 'bottom right', message: 'Regular price field is required numeric value!' });
            return false;
        } else {

            if( _sales_price!='' ){

                if(isNaN(_sales_price)){
                    jQuery('body').toast({ class: 'warning', position: 'bottom right', message: 'Sales price fields must be numeric value!' });
                    return false;
                } else {

                    if( Number(_sales_price) > Number(_regular_price) ){
                        jQuery('body').toast({ class: 'warning', position: 'bottom right', message: 'Sales price must be lesser than Regular price!' });
                        return false;
                    }
                }                        
            }

            if( jQuery("#jpc_rules_table tbody").find('tr').length <= 0 ){
                jQuery('body').toast({ class: 'warning', position: 'bottom right', message: 'Atleast one rule must be applied!' });
                return false;
            }                    
        }
        
        //jQuery("#jpc_price_ctl_table").parent().transition('show');
        jQuery('.jpc_price_ctl_table').transition('show');
        jQuery("#jpc_save_price_ctl").transition('show');

        
        rows_data='';            
        row_obj=[];

        jQuery("#jpc_rules_table tbody").find('tr').each(function(i,e){
            data=jQuery(e).find('td');                    
            row_obj_data=Object();
            row_obj_data.field_name=jQuery(data[0]).text();
            row_obj_data.field_value=jQuery(data[0]).data('value');
            row_obj_data.field_type=jQuery(data[1]).data('value');

            row_obj_data.cmp_name=jQuery(data[2]).text();
            row_obj_data.cmp_value=jQuery(data[2]).data('value');

            row_obj_data.value_name=jQuery(data[3]).text();
            row_obj_data.value_data=[jQuery(data[3]).data('value_1'),jQuery(data[3]).data('value_2')];

            row_obj.push(row_obj_data);

            if(jQuery(data[1]).data('value')=='1'){
                rows_data+=jQuery(data[0]).text()+': '+jQuery(data[3]).text()+'<br/>';
            }else{
                rows_data+='['+jQuery(data[0]).text()+']<br/>';
            }
        });
        row_obj.push({regular_price:_regular_price,sales_price:_sales_price});

        window.eo_wbc.jpc_data[window.eo_wbc.jpc_data.length]=row_obj;

        jQuery("#jpc_price_ctl_table tbody").append("<tr><td class='center aligned'><a href='#'><i class='ui icon delete'></i></a></td><td class='left aligned'>Regular Price:"+_regular_price+"<br/>"+(_sales_price!=''?'Sales Price:'+_sales_price:'')+"</td><td class='center aligned'>"+rows_data+"</td></tr>");                

        // jQuery("#jpc_value_1").html('');
        // jQuery("#jpc_value_2").html('');

        jQuery('#jpc_form').find('.ui.dropdown').dropdown('restore defaults');

        jQuery('#jpc_form').form('reset');
        jQuery('#jpc_form').form('clear');
        jQuery("#jpc_rules_table tbody").empty();
        //jQuery("#jpc_rules_table").parent().transition('hide');
        jQuery('.jpc_rules_table').transition('hide');

        //for saving the final form
        jQuery("[name='eo_wbc_jpc_form_data']").val(JSON.stringify(window.eo_wbc.jpc_data));
    });

    jQuery("#eowbc_pc_add_rule_btn").on('touch',function(e){
        e.preventDefault();
        e.stopPropagation();
        eowbc_pc_add_rule_btn_click();
    });

});

function eowbc_pc_add_rule_btn_click() {
                
    _field_name=jQuery("[name='jpc_field_name']").val().trim();
    _field_value=jQuery("[name='jpc_field_value']").val().trim();
    _field_type=jQuery("[name='jpc_field_type']").val().trim();

    _compare_name=jQuery("[name='jpc_compare_name']").val().trim();
    _compare_value=jQuery("[name='jpc_compare_value']").val().trim();

    _value_name_1=jQuery("[name='jpc_values_name_1']").val().trim();
    _value_value_1=jQuery("[name='jpc_values_value_1']").val().trim();
    _value_name_2=jQuery("[name='jpc_values_name_2']").val().trim();
    _value_value_2=jQuery("[name='jpc_values_value_2']").val().trim();

    if(_field_name=='' || _field_value=='' || _field_type==''){
        jQuery('body').toast({ class: 'warning', position: 'bottom right', message: 'Field field is required !' });
        return false;
    } else {

        if(_field_type=='1'){

            if(_compare_name=='' || _compare_value=='') {
                jQuery('body').toast({ class: 'warning', position: 'bottom right', message: 'Compare field  is required !' });
                return false;
            } else{
                if(_compare_value=='in' && (_value_name_1=='' || _value_value_1=='') ){

                    jQuery('body').toast({ class: 'warning', position: 'bottom right', message: 'Please add at least one value!' });
                    return false;

                } else {
                    if(_compare_value=='between' && (_value_name_1=='' || _value_value_1=='' || _value_name_2=='' || _value_value_2=='')){
                        jQuery('body').toast({ class: 'warning', position: 'bottom right', message: 'Please select both range values!' });
                        return false;
                    }
                }
            }
        }
    }
    
    jQuery("#jpc_rules_table tbody").append('<tr> <td class="left aligned" data-value="'+_field_value+'">'+_field_name+'</td><td class="left aligned" data-value="'+_field_type+'">'+(_field_type=='1'?'Attribute':'Category')+'</td><td class="center aligned" data-value="'+_compare_value+'">'+_compare_name+'</td><td class="center aligned" data-value_1="'+_value_value_1+'" data-value_2="'+_value_value_2+'">'+_value_name_1+(_value_name_2?'-'+_value_name_2:'')+'</td></tr>')
    //jQuery("#jpc_rules_table").parent().transition('show');
    jQuery('.jpc_rules_table').transition('show');

    // jQuery("#jpc_value_1").html('');
    // jQuery("#jpc_value_2").html('');
    jQuery('.jpc_rule_fields').parent().transition('hide');
    jQuery('.jpc_attribute_vals').parent().transition('hide');

    jQuery('#jpc_form').find('.ui.dropdown').dropdown('restore defaults');

    jQuery('#jpc_form').form('reset');
    jQuery('#jpc_form').form('clear');
}