
jQuery(document).ready(function($){
	/*$('#shop_cat_filter_location_cat,#sc_shop_cat_filter_location_cat').on('change',function(){				
		if(typeof($(this).attr('checked'))!=typeof(undefined)){
			$("#shop_cat_filter_category").parent().parent().removeClass('hidden');	
		} else {
			$("#shop_cat_filter_category").parent().parent().addClass('hidden');
		}		
	}).trigger('change');*/

	$('#shop_cat_filter_location_cat').on('change',function(){				
		if(typeof($(this).attr('checked'))!=typeof(undefined)){
			$("#shop_cat_filter_category").parent().parent().removeClass('hidden');	
		} else {
			$("#shop_cat_filter_category").parent().parent().addClass('hidden');
		}		
	}).trigger('change');

	$('#shop_cat_filter_two_filter').on('change',function(){
		if(typeof($(this).attr('checked'))!=typeof(undefined)){
			$("#shop_cat_filter_two_filter_first").parent().parent().removeClass('hidden');
			$("#shop_cat_filter_two_filter_first_title").parent().removeClass('hidden');
			$("#shop_cat_filter_two_filter_second").parent().parent().removeClass('hidden');
			$("#shop_cat_filter_two_filter_second_title").parent().removeClass('hidden');	
		} else {
			$("#shop_cat_filter_two_filter_first").parent().parent().addClass('hidden');
			$("#shop_cat_filter_two_filter_first_title").parent().addClass('hidden');
			$("#shop_cat_filter_two_filter_second").parent().parent().addClass('hidden');
			$("#shop_cat_filter_two_filter_second_title").parent().addClass('hidden');
		}		
	}).trigger('change');

	$('#shop_cat_filter_add_input_type').on('change',function(){
		if($(this).val()=='icon'){
			$("#shop_cat_filter_add_icon_size").parent().removeClass('hidden');
			$("#shop_cat_filter_add_icon_label_size").parent().addClass('hidden');
		} else if($(this).val()=='icon' || $(this).val()=='icon_text'){
			$("#shop_cat_filter_add_icon_size").parent().removeClass('hidden');
			$("#shop_cat_filter_add_icon_label_size").parent().removeClass('hidden');			
		} else {
			$("#shop_cat_filter_add_icon_size").parent().addClass('hidden');
			$("#shop_cat_filter_add_icon_label_size").parent().addClass('hidden');			
		}		
	}).trigger('change');

	$('#shop_cat_filter_add_child_filter').on('change',function(){
		if(jQuery("#shop_cat_filter_add_child_filter").is(':checked')){
			$("#shop_cat_filter_add_child_label").parent().removeClass('hidden');
		} else {
			$("#shop_cat_filter_add_child_label").parent().addClass('hidden');
		}
	});

	$("#shop_cat_filter_add_submit_btn").on('cleanup',function(){
		var html = ''
		var $id = $('#shop_cat_filter_add_category').val();
		html+='<tr>';
			html+='<td class="center aligned ">';
	     			html+='<div class="ui fitted checkbox ">';
				  		html+='<input type="checkbox" name="'+$id+'" id="'+$id+'" value="'+$id+'">';
				  	html+='<label> </label>';
				html+='</div>';
			html+='</td>';
	     	html+='<td class="center aligned ">'+$('#shop_cat_filter_add_category').parent().find('[data-value="'+$id+'"]').text()+'</td>';
	     	html+='<td class="center aligned ">'+$('#shop_cat_filter_add_label').val()+'</td>';
	     	html+='<td class="center aligned ">'+($('#shop_cat_filter_add_is_advanced').is(':checked')?'Yes':'No')+'</td>';
	     	html+='<td class="center aligned ">'+$('#shop_cat_filter_add_column_width').val()+'</td>';
	     	html+='<td class="center aligned ">'+$('#shop_cat_filter_add_order').val()+'</td>';
	     	html+='<td class="center aligned ">'+$('#shop_cat_filter_add_input_type').val()+'</td>';
	     	html+='<td class="center aligned ">'+($('#shop_cat_filter_add_input_type').val()=='icon'||$('#shop_cat_filter_add_input_type').val()=='icon_text'?$('#shop_cat_filter_add_icon_size').val():'-')+'</td>';
	     	html+='<td class="center aligned ">'+($('#shop_cat_filter_add_input_type').val()=='icon_text'?$('#shop_cat_filter_add_icon_label_size').val():'-')+'</td>';
	      	html+='<td class="center aligned ">'+($('#shop_cat_filter_add_reset_link').is(':checked')?'Yes':'No')+'</td>';
	    html+='</tr>';	    
	    $('#eowbc_filter_widget_table tbody').append(html);
	    $('.tiny_filter_no_filter_found').parent().remove();
		document.forms.eowbc_tiny_features_filter_add_form.reset();
		$('#shop_cat_filter_add_input_type_dropdown_div,#shop_cat_filter_add_category_dropdown_div').dropdown('restore defaults');
	});	
});