function bind_dependency(source,target,action){

	source=jQuery("[data-node-name='"+source+"']");
	target=jQuery("[data-node-name='"+target+"']");
	
	jQuery(target).find('select').prop('disabled',true);

	jQuery(source).on(action,"select",function(evt){

		if(jQuery(source).find('select').children(':eq(0)').val()==jQuery(source).find('select').val()){
			jQuery(target).find('select').prop('disabled',true);				
			jQuery(target).find('select').val(jQuery(target).find('select').children(':eq(0)').val());
			jQuery(target).find('select').trigger('click').trigger('slide').trigger('change');
			jQuery("#woo-custome-filter-redirect").attr('href','#');
		}
		else{			
			if(jQuery(source).find('select').attr('disabled') == undefined){				
				get_control(jQuery(source).find('select').val(),source,target);				
			}				
		}
	});			
}

function get_control(id,source,target){		        	
    jQuery.post(
                filter_obj.ajaxurl,
                {
                    'action': 'eowbc_ajax',
                    'slug': id,
                    'type': 0,
                    '_wpnonce':'get_filters',
                    'resolver':'tiny_filters_control',
                    'title': jQuery(target).find('select').children(':eq(0)').html()
                },
        function (data, textStatus, XMLHttpRequest) {
        	if(data){        		
        		jQuery(target).html(data);
        		jQuery(target).find('select').removeAttr("disabled");
        		jQuery(target).find('select').trigger('click').trigger('slide').trigger('change');
        		jQuery("#woo-custome-filter-redirect").attr('href','#');        		
        	}        	
        }
    );
    return true;    
}

jQuery(document).ready(function($){
	$(document).on('click',".woo-custome-filter-redirect",function(){
		window.location.href = $(this).attr('data-href');
	});
	$(document).on("change",".filter_container select",function(e){

		var list=Array();
		var change_stat=true;
		_root =jQuery(this).parentsUntil('form').filter('.filter_container');

		jQuery(_root).find("select").each(function(){
			
			if(jQuery(this).val().trim()){			 		 	
			 	list.push(jQuery(this).val());
			}
			else{
				change_stat=false;				
			}
		});

		var site_url='';
		/*if($("[name='_category']").val().trim().length){
			var _cat=Array();
			$.each($("[name='_category']").val().split(','),function(key,value){
				_cat.push($('[data-slug="'+value+'"]').val());
			});
			site_url+=filter_obj.cat_url+'/'+_cat.join('+')+'/?';
		}*/
		if(jQuery(_root).find("[data-type='0']").length>0){
			var _cat=Array();
			jQuery.each(jQuery(_root).find("[data-type='0']"),function(i,e){
				if(jQuery(e).val().trim()!==''){
					_cat.push(jQuery(e).val());
				}
			});

			if(_cat.length){
				site_url=filter_obj.cat_url+_cat.join('/')+'/?';	
			} else {
				site_url=filter_obj.shop_url+'?'		
			}			
		}
		else
		{
			site_url=filter_obj.shop_url+'?'
		}

		if(jQuery(_root).parent().find("[name='_attribute']").val().trim().length){
			
			$.each(jQuery(_root).parent().find("[name='_attribute']").val().trim().split(','),function(key,value){
				if(jQuery(_root).find('[data-slug="'+value+'"]').val().trim()!==''){
					site_url+=value+"="+jQuery(_root).find('[data-slug="'+value+'"]').val()+"&";
				}
			});		
		}		
		console.log(site_url);
		console.log(filter_obj.not_required_all_select);
		if(filter_obj.not_required_all_select){
			change_stat = true;
		}
		console.log(change_stat);
		console.log(_root);

		if(change_stat){
			jQuery(_root).find(".woo-custome-filter-redirect").attr('href',site_url);
			jQuery(_root).find(".woo-custome-filter-redirect").attr('data-href',site_url);
			console.log(jQuery(_root).find(".woo-custome-filter-redirect").attr('href'));
		} else {
			jQuery(_root).find(".woo-custome-filter-redirect").attr('href','#');
			jQuery(_root).find(".woo-custome-filter-redirect").attr('data-href','#');
		}
	});
});