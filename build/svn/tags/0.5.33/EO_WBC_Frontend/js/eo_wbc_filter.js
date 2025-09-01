//render products DOM to view
function eo_wbc_filter_render_html(data) {			

	//Replace Result Count Status...
	if(jQuery('.woocommerce-result-count',jQuery(data)).html()!==undefined){								
		jQuery(".woocommerce-result-count").html(jQuery('.woocommerce-result-count',jQuery(data)).html());

	}
	else {
		jQuery(".woocommerce-result-count").html('');	
	}

	//Replacing Product listings....
	if(jQuery('.products,.product-listing',jQuery(data)).html()!==undefined){								
		jQuery(".products,.product-listing").html(jQuery('.products,.product-listing',jQuery(data)).html());
		
		var links=jQuery(".products a,.product-listing a");
		jQuery.each(links,function(index,element) {

			var href=jQuery(element).attr('href');
			if(href.indexOf('?')==-1) {
				jQuery(element).attr('href',jQuery(element).attr('href')+eo_wbc_object.eo_product_url);
			}
			else {

				jQuery(element).attr('href',href.substring(0,href.indexOf('?'))+eo_wbc_object.eo_product_url);
			}									
		});
	}
	else {
		jQuery(".products,.product-listing").html('<p class="woocommerce-info" style="width: 100%;">No products were found matching your selection.</p>');	
	}
	//Replacing Pagination details.....
	if(jQuery('.woocommerce-pagination,.pagination',jQuery(data)).html()!==undefined) {
		
		jQuery(".woocommerce-pagination,.pagination").html(jQuery('.woocommerce-pagination,.pagination',jQuery(data)).html());
	}
	else {
		jQuery(".woocommerce-pagination,.pagination").html('');	
	}

	//jQuery("body").fadeTo('fast','1')									
	jQuery("#loading").removeClass('loading');
	jQuery('.products,.product-listing,.woocommerce-pagination,.pagination').css('visibility','visible');
}

if(eo_wbc_object.disp_regular){
	
	if(typeof(jQuery.fn.eo_wbc_filter_change)=="undefined" || jQuery.fn.eo_wbc_filter_change==undefined){

		jQuery.fn.eo_wbc_filter_change= function(init_call=false) {				
		//flag indicates if to show products in tabular view or woocommerce's default style.

			var form=jQuery("form#eo_wbc_filter");	
			var site_url=eo_wbc_object.eo_cat_site_url;
			var ajax_url=site_url+eo_wbc_object.eo_cat_query;					
			jQuery.ajax({
				url: ajax_url,//form.attr('action'),
				data:form.serialize(), // form data
				type:form.attr('method'), // POST
				beforeSend:function(xhr){
					//jQuery("body").fadeTo('slow','0.3')	
					jQuery("#loading").addClass('loading');							
					//console.log(this.url);
				},
				complete : function(){
					//console.log(this.url);
				},
				success:function(data){		
					//console.log(JSON.stringify(data));
					eo_wbc_filter_render_html(data);
				}
			});
			return false;
		}	
	}
}

jQuery(document).ready(function($){

	if(eo_wbc_object.disp_regular){
	
		jQuery(".woocommerce-pagination,.pagination").html('');		

		$("#eo_wbc_filter").on('change',"input:not(:checkbox)",function(){
			$('[name="paged"]').val('1');
			jQuery.fn.eo_wbc_filter_change();										
		});

		jQuery.fn.eo_wbc_filter_change(true);

		//pagination for non-table based view
		$(".woocommerce-pagination,.pagination").on('click','a',function(event){
			
			event.preventDefault();
			event.stopPropagation();								
			
			if($(this).hasClass("next") || $(this).hasClass("prev")){
			
				if($(this).hasClass("next")){
					$("[name='paged']").val(parseInt($(".page-numbers.current").text())+1);
				}
				if($(this).hasClass("prev")){
					$("[name='paged']").val(parseInt($(".page-numbers.current").text())-1);
				}	
			}		
			else {
				$("[name='paged']").val($(this).text());
			}		
			jQuery.fn.eo_wbc_filter_change();
		});
	}
	/////////////////////////
	////////////////////////

	$( ".eo_wbc_advance_filter" ).accordion({
	  collapsible: true,
	  active:false
	});

	//Reset form and display
	jQuery(".eo_wbc_srch_btn:eq(2)").click(function(){					
		///////////////////////////////////////////
		document.forms.eo_wbc_filter.reset();
		jQuery(".eo_wbc_srch_btn:eq(2)").trigger('reset');
		jQuery("#eo_wbc_attr_query").val("");
		jQuery('[name="paged"]').val('1');
		jQuery.fn.eo_wbc_filter_change(true);

	});	
});