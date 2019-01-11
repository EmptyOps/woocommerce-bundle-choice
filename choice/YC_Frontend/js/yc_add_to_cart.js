jQuery(document).ready(function(){	
	jQuery(".summary.entry-summary").on('click','#yc_add_to_cart:not(.disabled)',function(){			
		    window.location.href =yc.url+'&CART='+form_2_json(jQuery('form.cart'));		    			    
	});	
});
function form_2_json(form) {
	console.log(form.length);
	var form_data=form.serializeArray();
	var json={};
	jQuery.each(form_data,function(){
		json[this.name]=this.value || '';		
	});
	console.log(json);
	return JSON.stringify(json);
}