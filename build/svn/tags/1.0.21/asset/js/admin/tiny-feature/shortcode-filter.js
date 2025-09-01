jQuery(document).ready(function($){
	var parents=Array();
	filters=Array();
	
	$('[data-action="add-shortcode-filter"]').on('click',function(e){
		e.stopPropagation();
		e.preventDefault();
		var filter = $('#shop_cat_shortcode_filter').val();
		var label = $('#shop_cat_shortcode_label').val();
		var unique_id = $('#shop_cat_shortcode_unique_id').val();		

		if(filter.trim()===''){ jQuery('body').toast({class:'warning',position: 'bottom right',message: '`Filter` field is required!'}); return; }
		if(label.trim()===''){ jQuery('body').toast({class:'warning',position: 'bottom right',message: '`Label` field is required!'}); return; }
 		if(unique_id.trim()===''){ jQuery('body').toast({class:'warning',position: 'bottom right',message: '`Unique ID` field is required!'}); return; }

 		var type = isNaN(filter);
 		var parent=$("#shop_cat_shortcode_filter_dropdown_div").find('[data-value="'+filter+'"]').data('parent');
 		if(parent!=undefined){
 			type = false;
 		}

		if($(".tiny_shortcode_no_filter_found").length){
			$(".tiny_shortcode_no_filter_found").parent().remove();
		}			

		html = '';
		html+='<tr data-filter_id="'+filter+'" data-filter_type="'+(type?'1':'0')+'">';			
	     	html+='<td class="center aligned ">'+label+'</td>';
	     	html+='<td class="center aligned ">'+unique_id+'</td>';
	     	html+='<td class="center aligned ">'+(type?'Attribute':'Category')+'</td>';
	     	html+='<td class="center aligned ">'+(parent=='0'||parent==undefined?'Parent':'Child')+'</td>';
	     	html+='<td class="center aligned "><span style="font-size: 2em;cursor: pointer;" class="remove-filter">&times;</span></td>';	     	
	    html+='</tr>';	    
		$("#eowbc_shortcode_table tbody").append(html);		
		if(type==false){
			/*if(parents.indexOf(parent)<=0){*/
			parents.push(parent);			
			$("#shop_cat_shortcode_filter").parent().find('.menu').prepend('<div class="item" data-parent="'+(parents.length)+'" data-value="'+unique_id+'">'+label+'</div>');
			/*}*/
		}

		if($("#shop_cat_shortcode_generate").hasClass('disabled')){
			$("#shop_cat_shortcode_generate").removeClass('disabled');
		}
		eowbc_reorder_filters();
		document.eowbc_tiny_features.reset();
		$('#shop_cat_shortcode_filter_dropdown_div').dropdown('restore defaults');
	});

	function eowbc_reorder_filters(){
		filters=Array();
        jQuery("#eowbc_shortcode_table tbody>tr").each(function(i,e){        	
        	var table_row=Array();
        	table_row.push($(e).data('filter_id'));
        	table_row.push($(e).data('filter_type'));
			jQuery(e).find('td').each(function(i,e){						
				table_row.push(jQuery(e).text());
			});					
			filters.push(table_row);
		});				
	}

	$("#eowbc_shortcode_table tbody").sortable({
	    helper: function(e,tr){
	    	var $originals = tr.children();
		    var $helper = tr.clone();
		    $helper.children().each(function(index) {
		        $(this).width($originals.eq(index).width())
		    });
		    return $helper;
	    },
	    stop: function(e,ui){
	    	$('td.index', ui.item.parent()).each(function (i) {
	            $(this).html(i + 1);
	        });
	    	eowbc_reorder_filters();
	    }
	}).disableSelection();

	//remove filter action
	$("#eowbc_shortcode_table").on('click','.remove-filter',function(){
		var parent=$(this).parentsUntil('tbody').find("td:eq(1)").text();
		$(this).parentsUntil('tbody').remove();			
		if($("#eowbc_shortcode_table tbody>tr").length<1){
			$("#eowbc_shortcode_table tbody").html('<tr class="ui-sortable-handle"><td colspan="10" class="tiny_shortcode_no_filter_found" style="text-align: center">No filter(s) exists, please add some filters.</td></tr>');			
			if(!$("#shop_cat_shortcode_generate").hasClass('disabled')){
				$("#shop_cat_shortcode_generate").addClass('disabled');
			}			
		}									
		if(parents.indexOf(parent)){			
			$("#shop_cat_shortcode_filter_dropdown_div").find("[data-parent][data-value='"+parent+"']").remove();
		}
		eowbc_reorder_filters();
	});

	$("#shop_cat_shortcode_generate").click(function(e){
		e.stopPropagation();
		e.preventDefault();
		if(!$(this).hasClass('disabled')){
			var shortcode="[woo_custome_filter_begin]";								
			$.each(filters,function(i,e){
				shortcode+="[woo_custome_filter input='dropdown' ";
				if(e[5]=='Parent'){
					shortcode+=" id='"+e[0]+"' ";
				}
				shortcode+=" label='"+e[2]+"' type='"+e[1]+"' node_type='"+e[5]+"' "; 
				if(e[5]=='Child'){
					shortcode+="parent_node='"+e[0]+"' ";
				}
				else{
					shortcode+="parent_node='' ";					
				}	
				shortcode+=" node_name='"+e[3]+"']";	
			});				
			$("#shop_cat_shortcode_text").parent().removeClass('hidden');

			shortcode+="[woo_custome_filter_end filter_size='"+$("#eowbc_shortcode_table").find('tbody>tr').length+"']";
			$("#shop_cat_shortcode_text").val(shortcode);
			//$("<textarea style='width: 100%;'>"+shortcode+"</textarea>").insertBefore(this);
		}
	});
});