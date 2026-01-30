jQuery(document).ready(function(){	
	jQuery("body").off('click','#eo_wbc_add_to_cart:not(.disabled)');
	jQuery("body").on('click','#eo_wbc_add_to_cart:not(.disabled)',function(e){			
		e.stopPropagation();
		e.preventDefault();

		if( typeof(window.document.splugins.common.is_handle_variation_id_pair_builder_step_2) != 'undefined' && !window.document.splugins.common.is_empty(window.document.splugins.common.is_handle_variation_id_pair_builder_step_2) ){

			// var variation_id_input = jQuery('.variation_id').val();
            // window.eo_wbc_object.url = window.document.splugins.common.updateURLParameter(window.eo_wbc_object.url,'variation_id',variation_id_input);
            window.eo_wbc_object.url = window.document.splugins.common.get_variation_url_part(null,window.eo_wbc_object.url);            
		}
		
		//console.log("LOG : "+eo_wbc_object.url+'&CART='+window.btoa(form_2_json(jQuery('form.cart'))));
		window.location.href =eo_wbc_object.url+'&CART='+window.btoa(form_2_json(jQuery('form.cart')));		    			    
		
	});
});

function form_2_json(form) {
	//console.log(form.length);
	var form_data=form.serializeArray();
	var json={};
	jQuery.each(form_data,function(){
		json[this.name]=this.value || '';		
	});
	//console.log(json);
	return JSON.stringify(json);
}