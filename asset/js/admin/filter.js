jQuery(document).ready(function($){
	$("#d_fconfig_input_type,#d_fconfig_filter").on('change',function(){		
		var _val = $('#d_fconfig_input_type').val();				
		if((_val == 'icon' || _val == 'icon_text') && isNaN($('#d_fconfig_filter').val())) {
			$('#d_fconfig_note_label_label_div').removeClass('hidden');
		} else {
			$('#d_fconfig_note_label_label_div').addClass('hidden');
		}
	});

	$("#s_fconfig_input_type,#s_fconfig_filter").on('change',function(){		
		var _val = $('#s_fconfig_input_type').val();		
		if((_val == 'icon' || _val == 'icon_text') && isNaN($('#s_fconfig_filter').val())) {
			$('#s_fconfig_note_label_label_div').removeClass('hidden');
		} else {
			$('#s_fconfig_note_label_label_div').addClass('hidden');
		}
	});
});