
<?php

function eo_wbc_jpc_get_apis() {    

    if(!(is_plugin_active('diamond-api-integrator/diamond-api-integrator.php') or is_plugin_active('xl-csv-import-export/excel-csv-import-export.php'))){ return false; }

    $_data = unserialize(get_option( 'eo_dapii_data', 'a:0:{}' ));      
    if(!empty($_data['apis']) and is_array($_data) ) {

        $api_option='';
        foreach ($_data['apis'] as $key => $value) {            
            $api_option = $api_option . '<div class="item" data-value="'.$key.'">'.$value['name'].'</div>';  
        }  
        $api_option = $api_option . '<div class="item" data-value="GlowStar">Glow Star</div>' .
                  '<div class="item" data-value="Rapnet">Rapnet</div>';
        return $api_option;

    } else {
        return false;
    }
}

function eo_wbc_jpc_list_categories($slug='',$prefix=''){
    $map_base = get_categories(array(
        'exclude'=>array(1),
        'hierarchical' => 1,
        'show_option_none' => '',
        'hide_empty' => 0,
        'parent' => (get_term_by('slug',$slug,'product_cat')?get_term_by('slug',$slug,'product_cat')->term_id:0),
        'taxonomy' => 'product_cat'
    ));
    
    $category_option_list='';
    
    foreach ($map_base as $base) {

        $category_option_list.="<div data-type='0' class='item' data-value='{$base->slug}'>{$prefix}{$base->name}</div>".eo_wbc_jpc_list_categories($base->slug,'--');
    }
    return $category_option_list;
}

function eo_wbc_jpc_list_attributes(){
    $attributes="";        
        foreach (wc_get_attribute_taxonomies() as $item) {                     
            $attributes .= "<div data-type='1' class='item' data-value='{$item->attribute_name}'>{$item->attribute_label}</div>";            
        }
        return $attributes;
}

function eo_wbc_jpc_attributes_values(){
    
    $attr_vals=array();

    foreach (wc_get_attribute_taxonomies() as $item) {         

        $vals=get_terms(array('taxonomy'=>'pa_'.$item->attribute_name,'hide_empty'=>FALSE));        
        if(is_array($vals) || is_object($vals)){

            $attr_vals[$item->attribute_name]=array_map( function( $element ){ return array('value'=>$element->slug,'name'=>$element->name); },$vals);    
        }
    }

    return $attr_vals;
}

wp_register_style( 'eo-wbc-ui',plugin_dir_url(EO_WBC_PLUGIN_FILE).'css/fomantic/semantic.min.css');
wp_enqueue_style( 'eo-wbc-ui');      

wp_register_script( 'eo-wbc-ui',plugin_dir_url(EO_WBC_PLUGIN_FILE).'js/fomantic/semantic.min.js');
wp_enqueue_script( 'eo-wbc-ui' );  


?>
<style type="text/css">
    .info {
        color: grey;
        font-style: italic;
    }
</style>
<div class="wrap woocommerce">
    <h1></h1>
	<?php	EO_WBC_Head_Banner::get_head_banner(); ?>
    <br/>
        <p><a href="https://wordpress.org/support/plugin/woo-bundle-choice" target="_blank"><?php _e('If you are facing any issue, please write to us immediately.',"woo-bundle-choice"); ?></a></p>
	<br/>
    <?php do_action('eo_wbc_menu_tabs','eo-wbc-jewellery-price-control'); ?>
	<hr/>
    <!-- UI Body Begins. -->

    <form class="ui form" id="jpc_form">
        <div class="ui segments">
            <div class="ui segment">
                <h4 class="ui dividing header">Price Control</h4>
                <p class="info">(Set pricing method to update price in bulk. For eg.: based on gold,diamond price changes, you might want to bulk update prices.)</p>
                <?php 
                // Check if API Integrator/CSV_XML_Upload/Download is installed.
                $_api_list = eo_wbc_jpc_get_apis();
                if($_api_list !== false) :                    
                
                ?>
                    <div class="two fields">
                        <div class="field">
                            <label>API/Supplier</label>
                            <div class="ui selection dropdown">
                              <input type="hidden" name="jpc_api">
                              <i class="dropdown icon"></i>
                              <div class="default text">Select API</div>
                              <div class="menu">
                                <!-- <div class="item" data-value="Default">Default</div>
                                <div class="item" data-value="GlowStar">Glow Star</div>
                                <div class="item" data-value="Rapnet">Rapnet</div> -->
                                <?php echo $_api_list; ?>

                              </div>
                            </div>
                        </div> 
                    </div>
                <?php 
                endif;
                ?>

                <div class="two fields">
                    <div class="field">
                        <label>Field</label>    
                        <div class="ui clearable search selection dropdown" id="jpc_field">
                          <input type="hidden" name="jpc_field" value="">
                          <i class="dropdown icon"></i>
                          <div class="default text">Select Field Target</div>
                          <div class="menu">
                            <div class="divider"></div>
                            <div class="header">Category</div>
                                <?php echo eo_wbc_jpc_list_categories(); ?>
                            <div class="divider"></div>
                            <div class="header">Attribute</div>
                                <?php echo eo_wbc_jpc_list_attributes(); ?>                                
                          </div>
                        </div>
                    </div>                        
                </div>
                <div class="two fields">
                    <div class="field hidden" id="jpc_attribute_vals">                
                        <label>Select Value(s)</label>
                        <div class="three fields">
                            <div class="field">
                                <div class="ui clearable search selection dropdown" id="jpc_compare">
                                    <input type="hidden" name="jpc_compare" value="">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Comparison</div>
                                    <div class="menu">
                                        <div class="item" data-value='between'>Between</div>
                                        <div class="item" data-value='in'>In</div>
                                  </div>
                                </div>
                            </div>
                            <div class="field" id="jpc_value_1">
                                   
                            </div>                    
                            <div class="field" id="jpc_value_2">
                                
                            </div>                    
                        </div>
                    </div>            
                </div>
                <div class="two fields">
                    <div class="field">
                        <div class="ui button green aligned right" tabindex="0" style="display:inline-table;" id="jpc_add_rule_btn">Add Pricing Method</div>      
                    </div>                            
                </div>  
            </div>
            <div class="ui segment secondary hidden">
                <table class="ui celled table" id="jpc_rules_table">
                  <thead>
                    <tr><th>Field</th>
                    <th>Type</th>
                    <th>Compare</th>
                    <th>Value</th>                    
                  </tr></thead>
                  <tbody >                    
                  </tbody>
                </table>  
                <div class="two fields">
                    <div class="field">
                    </div>
                    <div class="two fields">                        
                        <div class="field">
                            <label>Regular Price</label>
                            <input type="text" name="regular_price" placeholder="0.00">
                        </div>
                        <div class="field">
                            <label>Sales Price</label>
                            <input type="text" name="sales_price" placeholder="0.00">
                        </div>                                        
                    </div>                    
                </div>    
                <div class="two fields">
                    <div class="field"></div> 
                    <div class="field">                        
                        <div class="ui button primary aligned right" tabindex="1" style="display:inline-table;" id="jpc_add_price_ctl">Save Pricing Method</div>                        
                    </div>
                </div>            
            </div>
        </div>
        <input type="hidden" name="jpc_field_name">        
        <input type="hidden" name="jpc_field_value">
        <input type="hidden" name="jpc_field_type">
        <input type="hidden" name="jpc_compare_name">
        <input type="hidden" name="jpc_compare_value">
        <input type="hidden" name="jpc_values_name_1">
        <input type="hidden" name="jpc_values_value_1">
        <input type="hidden" name="jpc_values_name_2">
        <input type="hidden" name="jpc_values_value_2">
    </form>
    <div class="ui segment hidden" style="padding-bottom: 3em;">
        <table class="ui celled table " id="jpc_price_ctl_table">
            <thead>
                <tr>
                    <th style="width: 1px;">Remove</th>
                    <th>Price</th>                    
                    <th>Rules</th>                    
                </tr>
            </thead>
            <tbody>                    
            </tbody>
        </table>          
        <div class="field">       
                <i class="info">(Upon clicking the 'Save and Update Prices' button, it may take some time to update product prices in bulk.)</i>
                <div class="ui button primary aligned right" tabindex="2" style="display:inline-table;" id="jpc_save_price_ctl">Save and Update Prices</div>                                    
        </div>
    </div>    
    <form name="eo_wbc_jpc_form_submit" method="post">                    
        <?php echo wp_nonce_field('eo_wbc_jpc_save_data'); ?>
        <input type="hidden" name="eo_wbc_action" value="save_jpc_data">
        <input type="hidden" name="eo_wbc_jpc_form_data">
    </form>
    <script>
        jQuery(document).ready(function($){
            
            jQuery('.dropdown').dropdown();

            window.eo_wbc=new Object();

            window.eo_wbc.attributes=JSON.parse('<?php echo json_encode(eo_wbc_jpc_attributes_values()); ?>')

            window.eo_wbc.jpc_data=JSON.parse(<?php echo get_option('eo_wbc_jpc_data',false)?json_encode(unserialize(get_option('eo_wbc_jpc_data'))):"'[]'"; ?>);

            if(!jQuery.isEmptyObject(window.eo_wbc.jpc_data)) {
                /*Create table*/
                $('#jpc_price_ctl_table').parent().transition('show');
                
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

                        $("#jpc_price_ctl_table tbody").append("<tr><td><a href='#'><i class='ui icon delete'></i></a></td><td>Regular Price:"+e[e.length-1]['regular_price']+"<br/>"+(e[e.length-1]['sales_price']!=''?'Sales Price:'+e[e.length-1]['sales_price']:'')+"</td><td>"+rows_data+"</td></tr>");
                    }
                });
                
            }

            $("#jpc_save_price_ctl").on('click touch',function(){
                $("[name='eo_wbc_jpc_form_data']").val(JSON.stringify(window.eo_wbc.jpc_data));
                document.forms.eo_wbc_jpc_form_submit.submit();
            })

            $("#jpc_price_ctl_table").on('click touch','.ui.icon.delete,a>.ui.icon.delete',function(e){
                e.preventDefault();
                e.stopPropagation();
                $this_index=$(this).index('#jpc_price_ctl_table .ui.icon.delete');
                window.eo_wbc.jpc_data=window.eo_wbc.jpc_data.filter(function(e,i){
                    if(i==$this_index){ return false; } else{ return true }
                });

                $(this).parentsUntil('tbody').remove();

                if($("#jpc_price_ctl_table tbody").find('tr').length<=0){
                     $("#jpc_price_ctl_table").parent().transition('hide');
                }                
            });

            $("#jpc_add_price_ctl").on('click touch',function(){

                _regular_price=$("[name='regular_price']").val().trim();
                _sales_price=$("[name='sales_price']").val().trim();
                if( _regular_price=='' || isNaN(_regular_price) ){
                    $('body').toast({ class: 'warning', position: 'bottom right', message: 'Regular price field is required numeric value!' });
                    return false;
                } else {

                    if( _sales_price!='' ){

                        if(isNaN(_sales_price)){
                            $('body').toast({ class: 'warning', position: 'bottom right', message: 'Sales price fields must be numeric value!' });
                            return false;
                        } else {

                            if( Number(_sales_price) > Number(_regular_price) ){
                                $('body').toast({ class: 'warning', position: 'bottom right', message: 'Sales price must be lesser than Regular price!' });
                                return false;
                            }
                        }                        
                    }

                    if( $("#jpc_rules_table tbody").find('tr').length <= 0 ){
                        $('body').toast({ class: 'warning', position: 'bottom right', message: 'Atleast one rule must be applied!' });
                        return false;
                    }                    
                }
                
                $("#jpc_price_ctl_table").parent().transition('show');
                
                rows_data='';            
                row_obj=[];

                $("#jpc_rules_table tbody").find('tr').each(function(i,e){
                    data=$(e).find('td');                    
                    row_obj_data=Object();
                    row_obj_data.field_name=$(data[0]).text();
                    row_obj_data.field_value=$(data[0]).data('value');
                    row_obj_data.field_type=$(data[1]).data('value');

                    row_obj_data.cmp_name=$(data[2]).text();
                    row_obj_data.cmp_value=$(data[2]).data('value');

                    row_obj_data.value_name=$(data[3]).text();
                    row_obj_data.value_data=[$(data[3]).data('value_1'),$(data[3]).data('value_2')];

                    row_obj.push(row_obj_data);

                    if($(data[1]).data('value')=='1'){
                        rows_data+=$(data[0]).text()+': '+$(data[3]).text()+'<br/>';
                    }else{
                        rows_data+='['+$(data[0]).text()+']<br/>';
                    }
                });
                row_obj.push({regular_price:_regular_price,sales_price:_sales_price});

                window.eo_wbc.jpc_data[window.eo_wbc.jpc_data.length]=row_obj;

                $("#jpc_price_ctl_table tbody").append("<tr><td><a href='#'><i class='ui icon delete'></i></a></td><td>Regular Price:"+_regular_price+"<br/>"+(_sales_price!=''?'Sales Price:'+_sales_price:'')+"</td><td>"+rows_data+"</td></tr>");                

                $("#jpc_value_1").html('');
                $("#jpc_value_2").html('');

                $('#jpc_form').find('.ui.dropdown').dropdown('restore defaults');

                $('#jpc_form').form('reset');
                $('#jpc_form').form('clear');
                $("#jpc_rules_table tbody").empty();
                $("#jpc_rules_table").parent().transition('hide');
            });

            $("#jpc_add_rule_btn").on('click touch',function(){

                _field_name=$("[name='jpc_field_name']").val().trim();
                _field_value=$("[name='jpc_field_value']").val().trim();
                _field_type=$("[name='jpc_field_type']").val().trim();

                _compare_name=$("[name='jpc_compare_name']").val().trim();
                _compare_value=$("[name='jpc_compare_value']").val().trim();

                _value_name_1=$("[name='jpc_values_name_1']").val().trim();
                _value_value_1=$("[name='jpc_values_value_1']").val().trim();
                _value_name_2=$("[name='jpc_values_name_2']").val().trim();
                _value_value_2=$("[name='jpc_values_value_2']").val().trim();

                if(_field_name=='' || _field_value=='' || _field_type==''){
                    $('body').toast({ class: 'warning', position: 'bottom right', message: 'Field field is required !' });
                    return false;
                } else {

                    if(_field_type=='1'){

                        if(_compare_name=='' || _compare_value=='') {
                            $('body').toast({ class: 'warning', position: 'bottom right', message: 'Compare field  is required !' });
                            return false;
                        } else{
                            if(_compare_value=='in' && (_value_name_1=='' || _value_value_1=='') ){

                                $('body').toast({ class: 'warning', position: 'bottom right', message: 'Please add at least one value!' });
                                return false;

                            } else {
                                if(_compare_value=='between' && (_value_name_1=='' || _value_value_1=='' || _value_name_2=='' || _value_value_2=='')){
                                    $('body').toast({ class: 'warning', position: 'bottom right', message: 'Please select both range values!' });
                                    return false;
                                }
                            }
                        }
                    }
                }
                
                $("#jpc_rules_table tbody").append('<tr> <td data-value="'+_field_value+'">'+_field_name+'</td><td data-value="'+_field_type+'">'+(_field_type=='1'?'Attribute':'Category')+'</td><td data-value="'+_compare_value+'">'+_compare_name+'</td><td data-value_1="'+_value_value_1+'" data-value_2="'+_value_value_2+'">'+_value_name_1+(_value_name_2?'-'+_value_name_2:'')+'</td></tr>')
                $("#jpc_rules_table").parent().transition('show');

                $("#jpc_value_1").html('');
                $("#jpc_value_2").html('');

                $('#jpc_form').find('.ui.dropdown').dropdown('restore defaults');

                $('#jpc_form').form('reset');
                $('#jpc_form').form('clear');
            });

            $('#jpc_field').dropdown({                
                onChange:function(value,label,elem){

                    $('[name="jpc_field_name"]').val(label);
                    $('[name="jpc_field_value"]').val(value);
                    $('[name="jpc_field_type"]').val($(elem).data('type'));
                    if($(elem).data('type')==1){
                        $('#jpc_attribute_vals').transition('show');
                        $("#jpc_attribute_vals").find("#jpc_compare").dropdown({
                            
                            onChange:function(c_val,c_label,c_elem){

                                $('[name="jpc_compare_name"]').val(c_label);
                                $('[name="jpc_compare_value"]').val(c_val);

                                switch(c_val){
                                    case 'between':                                    
                                        $("#jpc_value_1").html('<div class="ui clearable search selection dropdown" id="jpc_values_drop_1"><input type="hidden" name="jpc_values_drop_1" value=""><i class="dropdown icon"></i><div class="default text">Select value</div><div class="menu"></div></div>');

                                        target=$("#jpc_value_1").find("#jpc_values_drop_1 .menu");
                                        $(window.eo_wbc.attributes[value]).each(function(i,itm){
                                            $(target).append('<div class="item" data-value="'+itm['value']+'">'+itm['name']+'</div>');
                                        });
                                        $("#jpc_value_1").find("#jpc_values_drop_1").dropdown({ onChange:function(val,lab,ele){
                                                $('[name="jpc_values_name_1"]').val(lab);
                                                $('[name="jpc_values_value_1"]').val(val);          
                                            }, });

                                        $("#jpc_value_2").html('<div class="ui clearable search selection dropdown" id="jpc_values_drop_2"><input type="hidden" name="jpc_values_drop_2" value=""><i class="dropdown icon"></i><div class="default text">Select value</div><div class="menu"></div></div>');
                                        target=$("#jpc_value_2").find("#jpc_values_drop_2 .menu");
                                        $(window.eo_wbc.attributes[value]).each(function(i,itm){
                                            $(target).append('<div class="item" data-value="'+itm['value']+'">'+itm['name']+'</div>');
                                        });                                        
                                        $("#jpc_value_2").find("#jpc_values_drop_2").dropdown({ onChange:function(val,lab,ele){
                                                $('[name="jpc_values_name_2"]').val(lab);
                                                $('[name="jpc_values_value_2"]').val(val);          
                                            }, });
                                        break;
                                    case 'in':                                    
                                        $("#jpc_value_1").html('<div class="ui clearable search selection dropdown multiple" id="jpc_values_drop_1"><input type="hidden" name="jpc_values_drop_1" value=""><i class="dropdown icon"></i><div class="default text">Select value</div><div class="menu"></div></div>');
                                        target=$("#jpc_value_1").find("#jpc_values_drop_1 .menu");
                                        $(window.eo_wbc.attributes[value]).each(function(i,itm){
                                            $(target).append('<div class="item" data-value="'+itm['value']+'">'+itm['name']+'</div>');
                                        });                                        
                                        $("#jpc_value_1").find("#jpc_values_drop_1").dropdown({ onChange:function(val,lab,ele){
                                                $('[name="jpc_values_name_1"]').val(val.split(',').map(function(e){ return jQuery("#jpc_values_drop_1").find("div[data-value='"+e+"']").text() }).join());
                                                $('[name="jpc_values_value_1"]').val(val);          
                                            }, });
                                        $("#jpc_value_2").html('');
                                        $('[name="jpc_values_name_1"]').val('');
                                        $('[name="jpc_values_value_1"]').val('');
                                        break;
                                    default:
                                        break;
                                }
                            },
                        });
                    }else{
                        $('#jpc_attribute_vals').transition('hide');
                    }
                },
            });
            
        });
    </script>

    <!-- UI Body Ends. -->
</div>