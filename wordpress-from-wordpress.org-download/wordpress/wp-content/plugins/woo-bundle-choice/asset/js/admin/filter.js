// jQuery(document).ready(function($){
// 	$("#d_fconfig_input_type,#d_fconfig_filter").on('change',function(){		
// 		var _val = $('#d_fconfig_input_type').val();				
// 		if((_val == 'icon' || _val == 'icon_text') && isNaN($('#d_fconfig_filter').val())) {
// 			$('#d_fconfig_note_label_label_div').removeClass('hidden');
// 		} else {
// 			$('#d_fconfig_note_label_label_div').addClass('hidden');
// 		}
// 	});

// 	$("#s_fconfig_input_type,#s_fconfig_filter").on('change',function(){		
// 		var _val = $('#s_fconfig_input_type').val();		
// 		if((_val == 'icon' || _val == 'icon_text') && isNaN($('#s_fconfig_filter').val())) {
// 			$('#s_fconfig_note_label_label_div').removeClass('hidden');
// 		} else {
// 			$('#s_fconfig_note_label_label_div').addClass('hidden');
// 		}
// 	});

// 	jQuery("#d_fconfig_filter_dropdown_div").dropdown({ onChange:function(val,lab,ele){
// 		console.log(val);
// 		console.log(lab);
// 		console.log(ele);
//         jQuery('[name="d_fconfig_type"]').val( jQuery(ele).data('type') );          
//     }, });

//     jQuery("#s_fconfig_filter_dropdown_div").dropdown({ onChange:function(val,lab,ele){
//         console.log(val);
// 		console.log(lab);
// 		console.log(ele);
//         jQuery('[name="s_fconfig_type"]').val( jQuery(ele).data('type') );          
//     }, });
// });

jQuery(document).ready(function($){
	$("#d_fconfig_input_type,#d_fconfig_filter").on('change',function(){		
		var _val = $('#d_fconfig_input_type').val();	
		console.log(_val);			
		if((_val == 'icon' || _val == 'icon_text') && $('#d_fconfig_filter').parent().find('[data-value="'+$('#d_fconfig_filter').val()+'"]').data('type')==1 ) {
			$('#d_fconfig_note_label_label_div').removeClass('hidden');
		} else {
			$('#d_fconfig_note_label_label_div').addClass('hidden');
		}

		filter_dd_changed( 'd' );
	});

	$("#s_fconfig_input_type,#s_fconfig_filter").on('change',function(){		
		var _val = $('#s_fconfig_input_type').val();		
		if((_val == 'icon' || _val == 'icon_text') && $('#s_fconfig_filter').parent().find('[data-value="'+$('#s_fconfig_filter').val()+'"]').data('type')==1) {
			$('#s_fconfig_note_label_label_div').removeClass('hidden');
		} else {
			$('#s_fconfig_note_label_label_div').addClass('hidden');
		}

		filter_dd_changed( 's' );
	});

	function filter_dd_changed( prefix ){
		var val = $('#'+prefix+'_fconfig_filter_dropdown_div').dropdown('get value');
		if ( typeof(val) != 'undefined' && val != '' ) {
			console.log( "type " + $( $('#'+prefix+'_fconfig_filter_dropdown_div').dropdown('get item', val) ).data('type') );
			jQuery('[name="'+prefix+'_fconfig_type"]').val( $( $('#'+prefix+'_fconfig_filter_dropdown_div').dropdown('get item', val) ).data('type') );  
		}    
    }
});