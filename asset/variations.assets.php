
<?php

// --- a code /woo-bundle-choice/application/model/publics/sp-model-single-product.php no che
?>

<!-- /*tejas_22_07_2022 it for new QC upgrades so it is permenent*/ -->
<?php
if( is_product() ) {
?>

<style type="text/css">
	table.variations tbody>tr:nth-child(odd)>td, table.variations tbody>tr:nth-child(odd)>th {
	    background: transparent;
	}

	.woocommerce div.product form.cart .variations {
	    display: inline-block;
	}
	.woocommerce div.product form.cart .variations th.label {
	    padding: 15px 5px;
	}
	table.variations tbody tr:hover>td, table.variations tbody tr:hover>th {
	    background-color: #fff;
	}
	.woocommerce div.product form.cart .variations th.label label {
	    font-size: 15px;
	    line-height: 1.1;
	    text-transform: capitalize;
	    text-align:left;
	}
	.woocommerce div.product form.cart .variations td, .woocommerce div.product form.cart .variations th {
	    vertical-align: top;
	}
</style>

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


	/*--color-disable*/
	.disabled .spui_color_variable_item_contents::before{
        background-image: var(--spui-dis-check);
        background-position: 50%;
        background-repeat: no-repeat;
        background-size: 100%;
        content: " ";
        display: block;
        height: 100%;
        position: absolute;
        width: 100%;
    }

	/*coman*/
    .disabled {
        cursor: not-allowed !important;
        overflow: hidden;
        pointer-events: all;
        position: relative;
        color: rgba(101,101,101,.5)!important;
    }

    
	/*--btn-disabled--*/

	.disabled .spui_button_variable_item_contents::before{
        background-image: var(--spui-dis-check);
        background-position: 50%;
        background-repeat: no-repeat;
        background-size: 100%;
        content: " ";
        display: block;
        height: 100%;
        position: absolute;
        width: 100%;
    }

    /*------Out-OF-Stock-----*/
    .out-of-stock {
        cursor: not-allowed !important;
        display: inline-block;
        pointer-events: none;
    }
    /*--OutStock_Color--*/
     .out-of-stock .spui_color_variable_item_contents {
        opacity: .6;
    }
    
    .out-of-stock .spui_color_variable_item_contents::before {
        position: absolute;
        content: "";
        background-image: var(--spui-dis-check);
        background-position: 50%;
        background-repeat: no-repeat;
        background-size: 100%;
        display: block;
        height: 100%;
        width: 100%;
    }
    /*--OutStock_button--*/
     .out-of-stock .spui_button_variable_item_contents{
        opacity: .6;
    }

    .out-of-stock .spui_button_variable_item_contents::before {
        position: absolute;
        content: "";
        background-image: var(--spui-dis-check);
        background-position: 50%;
        background-repeat: no-repeat;
        background-size: 100%;
        display: block;
        height: 100%;
        width: 100%;
    }
    /*--Outstck_Image---*/

   .out-of-stock .spui_color_icon_variable_item_contents {
       opacity: .6;
    }
   

    .out-of-stock .spui_color_icon_variable_item_contents::before {
        position: absolute;
        content: "";
        background-image: var(--spui-dis-check);
        background-position: 50%;
        background-repeat: no-repeat;
        background-size: 100%;
        display: block;
        height: 100%;
        width: 100%;
    }

</style>

<?php 
} 

if(is_shop() || is_product_category()) {
?>

	<!--Color-->
	<style>
	    .spui_color_widget{
	        float: left;
	        width: 100%;
	    }
	    .spui_color_widget {
	        float: left;
	        width: 100%;
	        display: flex;
	        flex-wrap: wrap;
	        justify-content: flex-start;
	        list-style-type: none;
	        padding: 0;
	        margin: 0;
	    }
	    .spui_color_widget li{
	        margin: 4px;
	        padding: 2px;
	        position: relative;
	        width: 30px;
	        height: 30px;
	        background: #ffffff;
	        color: #000;
	        border-radius: 2px;
	        box-shadow: 0 0 0 1px #a8a8a8;
	        cursor: pointer;
	    }

	    .spui_color_widget li .spui_color_variable_item_contents {
	        float: left;
	        -webkit-box-orient: vertical;
	        -webkit-box-direction: normal;
	        -webkit-box-pack: center;
	        -ms-flex-pack: center;
	        display: -webkit-box;
	        display: -ms-flexbox;
	        display: flex;
	        -ms-flex-direction: column;
	        flex-direction: column;
	        height: 100%;
	        justify-content: center;
	        position: relative;
	        width: 100%;
	    }
	    .spui_color_widget li.spui_color_variable_item.selected {
	        box-shadow: 0 0 0 2px #000000;
	    }
	    .spui_color_widget li .spui_color_variable_item_contents span.spui_variable_item_span_color {
	        display: block;
	        height: 100%;
	        width: 100%;
	    }

	    /*===Variation_css====*/
        form.variations_form {
            float: left;
            width: 100%;
        }
        form.variations_form a {
		    width: 100%;
		    float: left;
		}
        form.variations_form table.variations {
            border: none !important;
            margin: 0;
            padding: 0;
            width: 100%;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
        }
        
        form.variations_form table.variations tbody {
            width: 100%;
            float: left;
        }
        form.variations_form table.variations tbody tr {
            width: 100%;
            float: left;
            display: table-row !important;
        	border: none !important;
        }

        form.variations_form table.variations tbody th.label {
            display: none;
        }
        form.variations_form table.variations tbody th, form.variations_form table.variations tbody td {
            padding: 0;
            border: none;
            background: #fff !important;
        }
        form.variations_form table.variations tbody td {
            width: 100%;
            float: left;
        }

        form.variations_form table.variations tbody td ul{
            list-style-type: none;
        }

		form.variations_form table.variations tbody td select {
		    display: none !important;
		}

	</style>

	<!--button-->
	<style>
	    /*.spui_size_widget{
	        float: left;
	        width: 100%;
	    }
	    .spui_size_widget ul{
	        -webkit-box-pack: start;
	        -ms-flex-pack: start;
	        display: -webkit-box;
	        display: -ms-flexbox;
	        display: flex;
	        -ms-flex-wrap: wrap;
	        flex-wrap: wrap;
	        justify-content: flex-start;
	        list-style: none;
	        margin: 0;
	        padding: 0;
	    }
	    .spui_size_widget ul li{
	        margin: 4px;
	        padding: 2px;
	        position: relative;
	        width: 30px;
	        height: 30px;
	        line-height: 30px;
	        text-align: center;
	        background: #ffffff;
	        color: #000;
	        border-radius: 2px;
	        box-shadow: 0 0 0 1px #a8a8a8;
	        cursor: pointer;
	    }
	    .spui_size_widget ul li.spui_size_variable_item.selected{
	        box-shadow: 0 0 0 2px #000000;
	    }
	    .spui_size_widget ul li .spui_size_variable_item_contents {
	        -webkit-box-orient: vertical;
	        -webkit-box-direction: normal;
	        -webkit-box-pack: center;
	        -ms-flex-pack: center;
	        display: -webkit-box;
	        display: -ms-flexbox;
	        display: flex;
	        -ms-flex-direction: column;
	        flex-direction: column;
	        height: 100%;
	        justify-content: center;
	        position: relative;
	        width: 100%;
	    }
	    .spui_size_widget ul li .spui_size_variable_item_contents span.spui_variable_item_span_size {
	        padding: 0 5px;
	    }*/
		/*=====BUTTON_START====*/
	    .spui_button_widget{
	        float: left;
	        width: 100%;
	    }
	    .spui_button_widget {
	        -webkit-box-pack: start;
	        -ms-flex-pack: start;
	        display: -webkit-box;
	        display: -ms-flexbox;
	        display: flex;
	        -ms-flex-wrap: wrap;
	        flex-wrap: wrap;
	        justify-content: flex-start;
	        list-style: none;
	        margin: 0;
	        padding: 0;
	    }
	    .spui_button_widget li{
	        margin: 4px;
	        padding: 2px;
	        position: relative;
	        min-width: 30px;
	        height: 30px;
	        line-height: 30px;
	        text-align: center;
	        background: #ffffff;
	        color: #000;
	        border-radius: 2px;
	        box-shadow: 0 0 0 1px #a8a8a8;
	        cursor: pointer;
	    }
	    .spui_button_widget li.spui_button_variable_item.selected{
	        box-shadow: 0 0 0 2px #000000;
	    }
	    .spui_button_widget li .spui_button_variable_item_contents {
	        -webkit-box-orient: vertical;
	        -webkit-box-direction: normal;
	        -webkit-box-pack: center;
	        -ms-flex-pack: center;
	        display: -webkit-box;
	        display: -ms-flexbox;
	        display: flex;
	        -ms-flex-direction: column;
	        flex-direction: column;
	        height: 100%;
	        justify-content: center;
	        position: relative;
	        width: 100%;
	    }
	    .spui_button_widget li .spui_button_variable_item_contents span.spui_variable_item_span_button {
	        padding: 0 5px;
	    }


	    /*.disabled .spui_button_variable_item_contents::before{
	        background-image: var(--spui-dis-check);
	        background-position: 50%;
	        background-repeat: no-repeat;
	        background-size: 100%;
	        content: " ";
	        display: block;
	        height: 100%;
	        position: absolute;
	        width: 100%;
	    } */
    /*=====BUTTON_END====*/


	</style>

	<!--image-->
	<style>
	   :root {
	        --spui-check: url("data:image/svg+xml;utf8,%3Csvg filter='drop-shadow(0px 0px 2px rgb(0 0 0 / .8))' xmlns='http://www.w3.org/2000/svg'  viewBox='0 0 30 30'%3E%3Cpath fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='M4 16L11 23 27 7'/%3E%3C/svg%3E");
	        --spui-dis-check:url("data:image/svg+xml;utf8,%3Csvg filter='drop-shadow(0px 0px 5px rgb(255 255 255 / .6))' xmlns='http://www.w3.org/2000/svg' width='72px' height='72px' viewBox='0 0 24 24'%3E%3Cpath fill='none' stroke='%23ff0000' stroke-linecap='round' stroke-width='0.6' d='M5 5L19 19M19 5L5 19'/%3E%3C/svg%3E");
	    }
	    .spui_color_icon_widget{
	        float: left;
	        width: 100%; 
	    }
	    .spui_color_icon_widget {
	        -webkit-box-pack: start;
	        -ms-flex-pack: start;
	        display: -webkit-box;
	        display: -ms-flexbox;
	        display: flex;
	        -ms-flex-wrap: wrap;
	        flex-wrap: wrap;
	        justify-content: flex-start;
	        list-style: none;
	        margin: 0;
	        padding: 0; 
	    }
	    .spui_color_icon_widget li.spui_color_icon_variable_item{
	        margin: 4px;
	        padding: 2px;
	        position: relative;
	        width: 30px;
	        height: 30px;
	        line-height: 30px;
	        text-align: center;
	        background: #ffffff;
	        color: #000;
	        border-radius: 2px;
	        box-shadow: 0 0 0 1px #a8a8a8;
	        cursor: pointer;
	    }
	    .spui_color_icon_widget li.spui_color_icon_variable_item .spui_color_icon_variable_item_contents{
	        webkit-box-orient: vertical;
	        -webkit-box-direction: normal;
	        -webkit-box-pack: center;
	        -ms-flex-pack: center;
	        display: -webkit-box;
	        display: -ms-flexbox;
	        display: flex;
	        -ms-flex-direction: column;
	        flex-direction: column;
	        height: 100%;
	        justify-content: center;
	        position: relative;
	        width: 100%;
	    }
	    .spui_color_icon_widget li.spui_color_icon_variable_item .spui_color_icon_variable_item_contents img.spui_variable_item_image {
	        display: block;
	        max-width: 100%;
	        margin: auto;
	    }
	    .spui_color_icon_widget li.spui_color_icon_variable_item.selected {
	        box-shadow: 0 0 0 2px #000000;
	    }
	    .spui_color_icon_widget li.spui_color_icon_variable_item.selected .spui_color_icon_variable_item_contents::before{
	        background-image: var(--spui-check);
	        background-position: 50%;
	        background-repeat: no-repeat;
	        background-size: 60%;
	        content: " ";
	        display: block;
	        height: 100%;
	        position: absolute;
	        width: 100%;
	    }
	    .spui_color_icon_widget li.spui_color_icon_variable_item.disabled .spui_color_icon_variable_item_contents::before{
	        background-image: var(--spui-dis-check);
	        background-position: 50%;
	        background-repeat: no-repeat;
	        background-size: 60%;
	        content: " ";
	        display: block;
	        height: 100%;
	        position: absolute;
	        width: 100%;
	    }

	</style>
	<style type="text/css">
		/*---more-css---*/
	    .spui_swatches_more__container {
	        width: auto !important;
	        height: auto !important;
	        box-shadow: none !important;
	        border-radius: 0 !important;
	        align-self: center !important;
	    }
	    .spui_swatches_more__container a{ 
	        color: #0274be !important;
	        text-decoration: none !important;
	        display: block !important;
	    }
	</style>

	<!--LoopBox-->
	<style type="text/css">
		:root {
			--spui_thumbnail_shop_asset_height: 300px;
		}

		.spui_thumbnail_shop_wrap{
	        float: left;
	        width: 100%;
	    }
	    .spui_thumbnail_shop_asset{
	        float: left;
	        width: 100%;
	    }
	    .spui_thumbnail_shop_asset img{
	        min-height: var(--spui_thumbnail_shop_asset_height);
	        max-height: var(--spui_thumbnail_shop_asset_height);
	        display: block;
	        margin: auto;
	        -o-object-fit: contain;
	        object-fit: contain;
	    }
	    .spui_thumbnail_shop_video{
	        float: left;
	        width: 100%;
	    }
	    .spui_thumbnail_shop_video video{
	        min-height: var(--spui_thumbnail_shop_asset_height);
	        max-height: var(--spui_thumbnail_shop_asset_height);
	        display: block;
	        margin: auto;
	        -o-object-fit: contain;
	        object-fit: contain;
	    }
	</style>
	
<?php	
}
?>

<script>
	<?php 
	if(is_product() && !has_action('woocommerce_before_variations_form')) {
	?>
		jQuery(".variations_form").before('<span id="wbc_variation_toggle" class="ui raised segment"><?php _e($toggle_text); ?><i class="caret up icon" style="text-align: center;line-height: 1em;"></i></span>');	

	<?php } ?>
	
	jQuery(document).ready(function($){
		// ACTIVE_TODO below sections might be of use so keeping it on for now, but we must double confirm like legacy woo js layers provide full dropdown template supports. but i think still sementic specific matters need to be managed because we are using sementic templates.
			// ACTIVE_TODO_OC_START
			// do we need to disable the blow change event implimention -- to h
			//  	eithere way blowo class would be loading only when the dropdown template of simentic is used on item page -- to h
			// ACTIVE_TODO_OC_END 	
		jQuery(".dropdown").dropdown().on('change',function(){
			var target_selector =  $('#'+$(this).find('input[type="hidden"]').data('id'));
			target_selector.val($(this).find('input[type="hidden"]').val());
			/*$(this).parent().find('.selected').removeClass('selected');
			$(this).addClass('selected');*/
			jQuery(".variations_form" ).trigger('check_variations');
			$(target_selector).trigger('change');
		});


		// ACTIVE_TODO we shoud simply put this class on the perticuler template html dom and coment the code below -- to h & -- to s
			// for now lats comment the code but after confirming with t -- to t
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

<!-- /*---TOOLTIP--- @tejas*/
/*----JS----*/ -->
<script type="text/javascript">
jQuery( document ).ready(function() {
    jQuery('[data-toggle="popover"]').popover(); 
});
</script>
<!-- /*----CSS---*/ -->
<style type="text/css">
	:root{
        --spui_tooltip_bg:#8224e3;
        --spui_tooltip_text:#fff;
        --spui_tooltip_textsize:0.8rem;
        --spui_tooltip_padding:.5rem 1.75rem;
        --spui_tooltip_body:none;
    }
    .popover-header{
        background: var(--spui_tooltip_bg) !important;
        color: var(--spui_tooltip_text) !important;
        font-size: var(--spui_tooltip_textsize) !important;
        font-weight: normal;
        padding: var(--spui_tooltip_padding) !important;
    }
    .popover-body{
        display: var(--spui_tooltip_body);
    }
    .bs-popover-auto[x-placement^=top]>.arrow::after, .bs-popover-top>.arrow::after{
        border-top-color:var(--spui_tooltip_bg) !important;
    }
</style>