
<?php
// --- a code /woo-bundle-choice/application/model/publics/sp-model-single-product.php no che
?>
<style type="text/css">
	.ui.mini.images .variable-item.image{
		width: auto;						
	}					
	.image-variable-item{
		border: none !important;
		border-bottom: 2px solid transparent !important;
	}
	.image-variable-item.selected,.image-variable-item:hover{	        			
		box-shadow: none !important;        			
		border-bottom: 2px <?php _e($border_hover_color) ?> solid !important;
	}
	.image_text-variable-item{
		border: none !important;
	}
	.image_text-variable-item:not(.selected) div{
		visibility: hidden;
	}

	.image_text-variable-item:hover div{
		visibility: visible;
	}

	.image_text-variable-item.selected,.image_text-variable-item:hover{	        			
		box-shadow: none !important;
	}
	.woocommerce .summary.entry-summary table.variations tr{
		width: auto !important;
	}
	.rotate-up{
		-webkit-animation:spin-up 0.3s linear ;
	    -moz-animation:spin-up 0.3s linear ;
	    animation:spin-up 0.3s linear ;
	    animation-fill-mode: forwards;
	}
	@-moz-keyframes spin-up { 100% { -moz-transform: rotate(-180deg); } }
	@-webkit-keyframes spin-up { 100% { -webkit-transform: rotate(-180deg); } }
	@keyframes spin-up { 100% { -webkit-transform: rotate(-180deg); transform:rotate(-180deg); } }

	.rotate-down{
		-webkit-animation:spin-down 0.3s linear;
	    -moz-animation:spin-down 0.3s linear;
	    animation:spin-down 0.3s linear;
	    animation-fill-mode: forwards;
	}

	@-moz-keyframes spin-down { 
		0% { -moz-transform: rotate(180deg); } 
		100% { -moz-transform: rotate(360deg); } 
	}
	@-webkit-keyframes spin-down { 
		0% { -webkit-transform: rotate(180deg); } 
		100% { -webkit-transform: rotate(360deg); } 
	}
	@keyframes spin-down { 
		0% { 
			-webkit-transform: rotate(180deg); 
			transform:rotate(180deg); 
		} 					
		100% { 
			-webkit-transform: rotate(360deg); 
			transform:rotate(360deg); } 
		}

	#wbc_variation_toggle
	{
		padding: 0.7em;
		margin-bottom: 0.7em;
		border:1px solid #5e5c5b;
		display: inline-block;
		color: #2d2d2d;
		font-size:1rem;
		cursor: pointer;
		border-radius: 1px !important;
	} 
	table.variations{
		padding: 5px;
		border: 1px solid #5e5c5b;
	}
	table.variations td{
		/*display: table-cell !important;*/
		border: none !important;
	}
	table.variations td:first-child{
		/*border-right: 1px solid #5e5c5b !important;*/
		/*text-align: center;*/
	}
	
	.ui.images {
			width: 100% !important;
			margin: auto !important;
			float: none !important;
		}
	}
	table.variations {
	    table-layout: auto !important;
	    margin: inherit !important;
	}
	table.variations td.label{
		display: none !important;
	}
	table.variations .value{
		padding-left: 1rem !important;
	}
	.variable-items-wrapper{
		list-style: none;
		display: table-cell !important;	        			
	}
	.ui.red.ribbon.label{
		margin-bottom: 5px !important;
	}
	.variable-items-wrapper .variable-item div{
		margin: auto;
		display: block;
	}
	.variable-items-wrapper .variable-item{        			
		/*display: inline-table;*/
		height: <?php _e($dimention); ?>;
		width: <?php _e($dimention); ?>;
		min-width: 35px;						
		text-align: center;						
		line-height: <?php _e($dimention); ?>;	        			
		cursor: pointer;
		margin: 0.25rem;
		text-align: center;
		border: <?php _e($border_width) ?> solid <?php _e($border_color) ?>;
		border-radius: <?php _e($border_radius); ?>;
		overflow: hidden;
	}	
	.variable-items-wrapper .variable-item:hover,.variable-items-wrapper .selected{
		box-shadow:0px 0px <?php _e($border_hover_width) ?> <?php _e($border_hover_color) ?>;        			
		border: 1px <?php _e($border_hover_color) ?> solid;
	}
	ul.variable-items-wrapper{
		margin: 0px;
	}
	.variable-item-color-fill,.variable-item-span{        			
		height: <?php _e($dimention); ?>;
		width: 100%;
		line-height: <?php _e($dimention); ?>;
	}
	.select2,.select3-selection{
		display: none !important;
	}
	.button-variable-item{
		background-color: <?php _e($bg_color); ?>;
		color: <?php _e($font_color); ?>;
	}
	.button-variable-item:hover{
		background-color: <?php _e($bg_hover_color); ?>;
		color: <?php _e($font_hover_color); ?>;	
	}
</style>
<script>
	<?php 
	if(!has_action('woocommerce_before_variations_form')) {
	?>
		jQuery(".variations_form").before('<span id="wbc_variation_toggle" class="ui raised segment"><?php _e($toggle_text); ?><i class="caret up icon" style="text-align: center;line-height: 1em;"></i></span>');	

	<?php } ?>
	
	jQuery(document).ready(function($){
		// ACTIVE_TODO below sections might be of use so keeping it on for now, but we must double confirm like legacy woo js layers provide full dropdown template supports. but i think still sementic specific matters need to be managed because we are using sementic templates.
		jQuery(".dropdown").dropdown().on('change',function(){
			var target_selector =  $('#'+$(this).find('input[type="hidden"]').data('id'));
			target_selector.val($(this).find('input[type="hidden"]').val());
			/*$(this).parent().find('.selected').removeClass('selected');
			$(this).addClass('selected');*/
			jQuery(".variations_form" ).trigger('check_variations');
			$(target_selector).trigger('change');
		});
		if($('table.variations tbody>tr').length>0){
			$('table.variations').addClass('ui raised segment');	
		}
		
		$('#wbc_variation_toggle').on('click',function(){
			if($(this).find('.icon').hasClass('rotate-up')) {
				$(this).find('.icon').removeClass('rotate-up');
				$(this).find('.icon').addClass('rotate-down');
				$('table.variations').slideToggle("slow");
			} else {
				$(this).find('.icon').removeClass('rotate-down');
				$(this).find('.icon').addClass('rotate-up');
				$('table.variations').slideToggle("slow");
			}        				
		});

		<?php if(empty($init_toggle)): ?>
			$('#wbc_variation_toggle').trigger('click');
		<?php endif; ?>

		// --	below two click events would be implemented in the core variations js module, in that case it will be remove here 
		// $('.variable-item').on('click',function(){
		// 	var target_selector = $('#'+$(this).data('id'));
		// 	target_selector.val($(this).data('value'));
		// 	$(this).parent().find('.selected').removeClass('selected');
		// 	$(this).addClass('selected');
		// 	jQuery(".variations_form" ).trigger('check_variations');
		// 	$(target_selector).trigger('change');
		// });

		// jQuery(".variations_form").on('click', '.reset_variations'/*'woocommerce_variation_select_change'*//*'reset'*/,function(){
		// 	jQuery('.variable-items-wrapper .selected').removeClass('selected');
		// 	jQuery('.variable-items-wrapper .dropdown').dropdown('restore defaults');
		// });
		
	});
</script>