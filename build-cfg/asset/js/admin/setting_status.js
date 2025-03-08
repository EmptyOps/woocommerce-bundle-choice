jQuery(document).ready(function($){

	jQuery("#inventory_type").on('change',function(e){
		e.stopPropagation();
		if($(this).val().trim()==''){
			jQuery('[for="features"]').parent().css('display','none');
		} else {


			if($(this).val().trim()=='jewelry'){				

				/*$("#ring_builder").attr('checked','checked');*/
				$("#ring_builder").parent().parent().css('display','block');
				/*$("#rapnet_api").attr('checked','checked');*/
				$("#rapnet_api").parent().parent().css('display','block');
				/*$("#glowstar_api").attr('checked','checked');*/
				$("#glowstar_api").parent().parent().css('display','block');

				$("#jbdiamond_api").parent().parent().css('display','block');
				$("#srk_api").parent().parent().css('display','block');				
			} else {				
				/*$("#ring_builder").removeAttr('checked');*/
				$("#ring_builder").parent().parent().css('display','none');
				/*$("#rapnet_api").removeAttr('checked');*/
				$("#rapnet_api").parent().parent().css('display','none');
				/*$("#glowstar_api").removeAttr('checked');*/
				$("#glowstar_api").parent().parent().css('display','none');

				$("#jbdiamond_api").parent().parent().css('display','none');
				$("#srk_api").parent().parent().css('display','none');
			}

			if($(this).val().trim()=='clothing'){
				/*$("#pair_maker").attr('checked','checked');*/			
				$("#pair_maker").parent().parent().css('display','block');
			} else {
				/*$("#pair_maker").removeAttr('checked');*/
				$("#pair_maker").parent().parent().css('display','none');
			}

			if($(this).val().trim()=='others' || $(this).val().trim()=='home_decor'){
				/*$("#guidance_tool").attr('checked','checked');*/
				$("#guidance_tool").parent().parent().css('display','block');
			} else {
				/*$("#guidance_tool").removeAttr('checked');*/
				$("#guidance_tool").parent().parent().css('display','none');
			}				
			jQuery('[for="features"]').parent().css('display','block');
		}		
	}).trigger('change');
});