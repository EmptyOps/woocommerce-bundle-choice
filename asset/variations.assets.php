
<?php

// --- a code /woo-bundle-choice/application/model/publics/sp-model-single-product.php no che
?>

<!-- /*tejas_22_07_2022 it for new QC upgrades so it is permenent*/ -->
<?php
if( is_product() ) {
?>

<style type="text/css">
	form.variations_form.cart table.variations {
	    -webkit-box-shadow: none !important;
	            box-shadow: none !important;
	    border: none !important;
	}
	.woocommerce div.product form.cart {
	    margin-bottom: 30px;
	    float: left;
	    width: 100%;
	}
	.ui.disabled.image, .ui.disabled.images{
		opacity: 0.8;
	}
	.woocommerce .summary.entry-summary table.variations tr{
		border: none;
	}	
</style>

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
		border-width:1px;						
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

<style type="text/css">
	.spui_video_container video {
	    max-width: 454px;
	    -o-object-fit: contain;
	       object-fit: contain;
	    display: block;
	    margin: auto;
	    min-height: 454px;
	}
</style>

<?php 
} 

if(is_shop() || is_product_category()) {
?>

	<!--Color-->
	<style>
		:root{
	            --spui-color-position:center;
	            --spui-webkit-color-position:center;
	            --spui-single-color-product-item-height:30px;
	            --spui-single-color-product-item-width:30px;
	            --spui-selected-item-box-shadow:#000;
            }

	    .spui_color_widget{
	        float: left;
	        width: 100%;
	    }
	    .spui_color_widget {
	        float: left;
	        width: 100%;
	        display: flex;
	        flex-wrap: wrap;
	        justify-content: var(--spui-color-position);
            -webkit-box-pack: var(--spui-webkit-color-position);
            -ms-flex-pack: var(--spui-webkit-color-position);
	        list-style-type: none;
	        padding: 0;
	        margin: 0;
	        margin-bottom: 1rem;
	    }
	    .spui_color_widget li{
	        margin: 4px;
	        padding: 2px;
	        position: relative;
	        width: var(--spui-single-color-product-item-width);
            height: var(--spui-single-color-product-item-height);
	        background: #ffffff;
	        color: #000;
	        border-radius: 2px;
	        box-shadow: 0 0 0 1px #a8a8a8;
	        cursor: pointer;
	        -webkit-transition: all .2s ease;
            -o-transition: all .2s ease;
            transition: all .2s ease;
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
	        box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
            -webkit-box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
	    }
	    .spui_color_widget li.spui_color_variable_item:hover{
            box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);
            -webkit-box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);
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
		:root{
            --spui-button-position:center;
            --spui-webkit-button-position:center;
            --spui-single-button-product-item-height:30px;
            --spui-single-button-product-item-width:30px;
            --spui-selected-item-box-shadow:#000;
        }
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
	        justify-content: var(--spui-button-position);
            -webkit-box-pack: var(--spui-webkit-button-position);
            -ms-flex-pack: var(--spui-webkit-button-position);
	        list-style: none;
	        margin: 0;
	        padding: 0;
	        margin-bottom: 1rem;
	    }
	    .spui_button_widget li{
	        margin: 4px;
	        padding: 2px;
	        position: relative;
	       	min-width: var(--spui-single-button-product-item-width);
            height: var(--spui-single-button-product-item-height);
	        line-height: 30px;
	        text-align: center;
	        background: #ffffff;
	        color: #000;
	        border-radius: 2px;
	        box-shadow: 0 0 0 1px #a8a8a8;
	        cursor: pointer;
	        -webkit-transition: all .2s ease;
            -o-transition: all .2s ease;
            transition: all .2s ease;
	    }

	    .spui_button_widget li.spui_button_variable_item.selected{
	        box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
            -webkit-box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
	    }
	    .spui_button_widget li.spui_button_variable_item:hover{
            box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);
            -webkit-box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);
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
	    	--spui-icon-position:center;
            --spui-webkit-icon-position:center;
            --spui-single-icon-product-item-height:30px;
            --spui-single-icon-product-item-width:30px;
            --spui-selected-item-box-shadow:#000;
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
	        justify-content: var(--spui-icon-position);
            -webkit-box-pack: var(--spui-webkit-icon-position);
            -ms-flex-pack: var(--spui-webkit-icon-position);
	        list-style: none;
	        margin: 0;
	        padding: 0; 
	    	margin-bottom: 1rem;
	    }

	    .spui_color_icon_widget li.spui_color_icon_variable_item{
	        margin: 4px;
	        padding: 2px;
	        position: relative;
	        width: var(--spui-single-icon-product-item-width);
            height: var(--spui-single-icon-product-item-height);
	        line-height: 30px;
	        text-align: center;
	        background: #ffffff;
	        color: #000;
	        border-radius: 2px;
	        box-shadow: 0 0 0 1px #a8a8a8;
	        cursor: pointer;
	        -webkit-transition: all .2s ease;
            -o-transition: all .2s ease;
            transition: all .2s ease;
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
	        box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
            -webkit-box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
	    }
	    .spui_color_icon_widget li.spui_color_icon_variable_item:hover {
            box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);
            -webkit-box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);
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
	        max-width: 100%;
	    }
	</style>


	<style type="text/css">
		
		/*---breadcum----*/
		:root{
		    --spui-border-shade-8-color:#f3e9d6;
		    --spui-bg-shade-10:#f5f5f5;
		    --spui-bg-shade-11:#f5f5f5;
		    --spui-bg-shade-15:#d9d1f4;
		    --spui-border-shade-7-color:#000000;
		    --spui-text-shade-2:#000000;
		    --spui-bg-hover-primary-color:#cda85c;
		}

		.Causal_Main_Wrapper {
			float: left;
			width: 100%;
			margin: 0rem 0 30px;
		}

		.Causal_Main_Wrapper .nav-item, .Causal_Main_Wrapper .nav-tabs {
			background: transparent;
		}

		.Causal_Main_Wrapper .nav-tabs {
			border-bottom: none;
			background: transparent;
			border-radius: 0px;
			justify-content: space-between;
			box-shadow: none !important;
			border: none !important;
		}

		.Causal_Main_Wrapper .nav {
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap;
			padding-left: 0;
			margin-bottom: 0;
			list-style: none;
		}

		body .Causal_Main_Wrapper .nav-item {
			width: 100%;
			position: relative;
			border-radius: 0;
			margin: 0;
			clip-path: none !important;
			flex: 1;
		}


		.Causal_Main_Wrapper ul.nav.nav-tabs li span.nav-link {
			margin: 0;
			padding: 0.9rem 1rem;
			display: block !important;
			position: relative;
			border: 1px solid var(--spui-border-shade-8-color) !important;
			border-top-left-radius: 0.25rem !important;
			border-top-right-radius: 0.25rem !important;
			border-bottom-left-radius: 0.25rem !important;
			border-bottom-right-radius: 0.25rem !important;
		}
		.Causal_Main_Wrapper .nav-tabs .nav-item.show .nav-link, .Causal_Main_Wrapper .nav-tabs .nav-link.active .Left_Word_C {
			font-size: 30px !important;
			line-height: 30px !important;
		}
		body .Causal_Main_Wrapper .nav-tabs .nav-item.show .nav-link,
		body .Causal_Main_Wrapper .nav-tabs .nav-link.active .Left_Word_C,
		body .Causal_Main_Wrapper .nav-tabs .nav-link.active .Right_Word_C p,
		body .Causal_Main_Wrapper .nav-tabs .nav-link.active .Right_Word_C h4,
		body .Causal_Main_Wrapper .nav-tabs .nav-link.active .Bread_cum a {
			color: var(--spui-text-shade-2) !important;
		}
		/*---Active_Breadkum---*/

		body .Causal_Main_Wrapper .nav-tabs .nav-item.show .nav-link, body .Causal_Main_Wrapper .nav-tabs .nav-link.active {
			/* border-color: transparent; */
			/* background-color: transparent; */
			background: linear-gradient(to right,var(--spui-bg-shade-10),var(--spui-bg-shade-11)) !important;
			box-shadow: -4px 4px 3px -3px var(--spui-bg-shade-15) !important;
			height: calc(100% + 4px);
			height: -moz-calc(100% + 4px);
			height: -webkit-calc(100% + 4px);
			height: -o-calc(100% + 4px);
			color: #495057;
			bottom: 2px;
		}

		body .Causal_Main_Wrapper .nav-tabs .nav-link.active::after {
			background: linear-gradient(to right,var(--spui-bg-shade-11),var(--spui-bg-shade-11)) !important;
		}

		body .Causal_Main_Wrapper .nav-tabs .nav-link.active .Left_Word_C {
			border-color: var(--spui-border-shade-7-color) !important;
		}
		body .Causal_Main_Wrapper .nav-tabs .nav-link.active .Bread_cum ul li a:hover,
		body .Causal_Main_Wrapper .nav-tabs .nav-link .Bread_cum ul li a:hover {
			color: var(--spui-bg-hover-primary-color) !important;
		}
		/*---Active_Breadkum_End---*/


		.Causal_Main_Wrapper ul.nav.nav-tabs li span.nav-link::before,
		.Causal_Main_Wrapper ul.nav.nav-tabs li span.nav-link::after {
			background: white;
			bottom: 0;
			-webkit-clip-path: polygon(50% 50%, -50% -50%, 0 100%);
			clip-path: polygon(50% 50%, -50% -50%, 0 100%);
			content: "";
			left: 100%;
			position: absolute;
			top: 0;
			transition: background 0.2s linear;
			width: 3.8em;
			z-index: 1;
		}

		body .Causal_Main_Wrapper ul.nav.nav-tabs li span.nav-link::before {
			background: linear-gradient(var(--spui-border-shade-8-color),var(--spui-border-shade-8-color)) !important;
			margin-left: 1px;
		}
		.Causal_Wrapper_Top_Main {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}
		.Causal_Wrapper_Text {
			display: flex;
			flex-wrap: wrap;
			flex: 1;
		}
		.Causal_Main_Wrapper .nav-tabs li:nth-child(2) .Causal_Wrapper_Top_Main .Causal_Wrapper_Text,
		.Causal_Main_Wrapper .nav-tabs li:nth-child(3) .Causal_Wrapper_Top_Main .Causal_Wrapper_Text {
			padding-left: 1.5em;
		}

		.Left_Word_C {
			flex: 0 1 2em;
			text-align: center;
			font-size: 30px;
			line-height: 30px;
			color: #000;
			margin-right: 10px;
			margin-left: 0px;
			position: relative;
			padding-right: 5px;
			font-weight: 100;
			border-right: 1px solid transparent;
			font-family: var(--spui-headings-font-family);
			align-self: center;
		}

		body .Right_Word_C p {
			font-size: 12px;
			letter-spacing: 0.075em;
			line-height: 1.3;
			margin-bottom: 0;
			text-transform: capitalize;
			font-family: var(--spui-headings-font-family);
			margin: 0;
		}

		body .Right_Word_C h4 {
			background: transparent;
			font-size: 16px;
			letter-spacing: .8px;
			font-weight: 100;
			padding: 0;
			line-height: 1.3;
			font-family: var(--spui-headings-font-family);
			text-transform: capitalize;
			margin-bottom: 0;
			margin: 0;
		}

		.Bread_cum {
			float: left;
			width: 100%;
		}
		.Bread_cum ul {
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap;
		}
		.Bread_cum li:first-child {
			padding-left: 0px;
			border-left: none;
		}
		.Bread_cum li {
			font-size: 0.65rem;
			line-height: 14px;
			padding: 0 10px;
			text-transform: uppercase;
			color: #333;
			border-left: 1px solid #333;
		}

		.Bread_cum ul li a {
			margin: 0;
			text-transform: capitalize;
			font-size: 12px;
			line-height: 1.3;
			letter-spacing: 0.075em;
			text-decoration: underline;
			color: #333;
		    border-radius: 0 !important;
		    border: none;
		    padding: 0;
		}

		.Causal_Wrapper_Right_Icon {
			width: 50px;
			height: 50px;
			line-height: 50px;
			text-align: center;
			background: #fff !important;
			-webkit-box-shadow: 0 0 2px #dfd9e8;
			box-shadow: 0 0 2px #dfd9e8;
			border-radius: 5px;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.Causal_Wrapper_Right_Icon img {
			width: 50%;
			height: 50%;
			object-fit: contain;
		}

		.Causal_Main_Wrapper ul.nav li.nav-item:last-child {
			-webkit-clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 100% 100%, 0% 100%);
			clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 100% 100%, 0% 100%);
		}
		body .Causal_Main_Wrapper .nav-tabs li.nav-item:last-child span::before {
			display: none;
		}
		body .Causal_Main_Wrapper .nav-tabs li.nav-item:last-child span::after {
			display: none;
		}






		/*============Filter_Diamond============*/
		:root{
		    --spui-border-shade-3-color:#a7a7a7;
		    --spui_range_slider_title:12px;
		    --spui-icon-primary-color:#000;
		    --spui-bg-shade-18:#000000;
		    --spui-border-secondary-color:#000000;
		    --spui-border-primary-color:#000000;
		}

		.Top_Daimond_Btn_Content {
			float: left;
			width: 100%;
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
		}

		.Request_Stone {
			float: left;
			width: 100%;
			margin-top: 2rem;
		}
		.Daimond_Casual_shape {
			width: 99%;
		    float: left;
		}
		.Daimond_Casual_shape .CauSal_Box_Main_Content_one {
			margin-bottom: 0rem;
			min-height: inherit;
			height: inherit;
		}
		.Request_Stone .Causal_Box_Name {
			-ms-flex-preferred-size: 140px !important;
			flex-basis: 140px !important;
		}

		.Daimond_Casual_shape .Causal_Right_Images {
			flex: 1;
		}

		.Request_Stone li {
			-webkit-transition: all 1s ease 0s;
			-o-transition: all 1s ease 0s;
			transition: all 1s ease 0s;
			-webkit-transform: scale(0.9);
			-ms-transform: scale(0.9);
			transform: scale(0.9);
			-webkit-filter: drop-shadow(1px 1px 2px #fff);
			filter: drop-shadow(1px 1px 2px #fff);
		    position: relative;
		    flex-basis: auto;
		    z-index: 1;
		}
		.Request_Stone .eo_wbc_filter_icon {
			margin: auto;
		}


		.Causal_Right_Images ul a::before {
			position: absolute;
			content: "";
			left: 0;
			top: 0px;
			width: 100%;
			height: 100%;
			background: #fff;
			z-index: -1;
			border-radius: 50%;
			right: 0;
			margin: auto;
			bottom: 0;
			display: -ms-grid;
			display: grid;
			-webkit-box-align: center;
			-ms-flex-align: center;
			align-items: center;
			-webkit-box-pack: center;
			-ms-flex-pack: center;
			justify-content: center;
			box-shadow: inherit;
		}
		.Images_Shapes_hide {
			width: 100%;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.Causal_Right_Images ul a .img-fluid {
			width: 60px;
		    margin: 0 auto;
		    display: block;
		}
		.Color_Images_Icon {
			position: absolute;
			display: none;
		}

		.Daimond_Casual_shape .CauSal_Box_Main_Content_one .Causal_Right_Images .active {
			-webkit-transform: scale(1);
			-ms-transform: scale(1);
			transform: scale(1);
			filter: inherit;
		}
		.Daimond_Casual_shape .CauSal_Box_Main_Content_one .Causal_Right_Images ul .active a::before {
			background: #fff;
			outline: 1px solid var(--spui-border-shade-3-color);
			box-shadow: 1px 1px 5px 0 var(--spui-border-shade-3-color) !important;
			border-radius: 5px;
		}


		.Top_Daimond_Btn_Content_Left, .Top_Daimond_Btn_Content_Right {
			flex-basis: 48%;
			max-width: 48%;
		}

		.CauSal_Box_Main_Content {
			float: left;
			width: 100%;
			display: flex;
			flex-wrap: wrap;
			align-items: center;
		}

		.CauSal_Box_Main_Content_one {
			float: left;
			width: 100%;
			display: flex;
			flex-wrap: wrap;
			align-items: center;
			justify-content: space-between;
			/* min-height: 78px; */
			height: inherit;
			margin-bottom: 1rem;
		}

		.Causal_Box_Name {
			max-height: 0;
			min-height: 10px;
		    flex-basis: 78px;
		}

		body .Causal_Box_Name h4{
		    font-size:var(--spui_range_slider_title) !important;
		    line-height: 1.2;
		}
		.Causal_Box_Name .material-icons {
			font-size: 20px;
			line-height: 20px;
			position: relative;
			margin-left: 5px;
			top: 6px;
			color: var(--spui-icon-primary-color);
		}
		.material-icons {
			font-family: material icons !important;
		}

		.Causal_Right_Images {
			flex: 0 1 37em;
			position: relative;
		}

		.range-slider {
			float: left;
			width: 100%;
		}
		.Causal_Right_Images .irs--round {
			height: 50px;
		}
		.Top_Daimond_Btn_Content .irs-hidden-input {
			position: relative !important;
			border: none !important;
		}

		.irs--round .irs-bar {
			background: var(--spui-bg-shade-18) !important;
		}

		.Causal_Right_Images .irs--round .irs-handle {
			border: 6px solid var(--spui-border-secondary-color);
			box-shadow: 0 3px 6px rgb(0 0 0 / 32%) !important;
			cursor: pointer;
			top: 28px;
			width: 18px;
			height: 18px;
		}
		.Causal_Right_Images .extra-controls {
			position: absolute;
			bottom: -22px;
		}

		.extra-controls .js-input-from,
		.extra-controls .js-input-to{
		    background: #fff;
		    border-radius: 5px;
		    border: 1px solid var(--spui-border-primary-color) !important;
		    display: inline-block;
		    text-align: center !important;
		    padding: 3px 4px 3px 4px;
		    height: 24px;
		    width: 70px;
		    font-size: 13px;
		    line-height: 13px;
		}

		.Causal_Right_Images .irs--round .irs-grid {
			bottom: -5px;
		}

		.Causal_Right_Images .irs--round .irs-grid .irs-grid-pol {
			top: 6px;
			background: #fff;
			z-index: 1;
			height: 4px;
			width: 1px;
		}

		.Top_Daimond_Btn_Content_Right .Causal_Box_Name {
			justify-content: flex-end;
			/* min-height: 24px !important; */
			display: flex !important;
			/* align-items: flex-start; */
		}






		/*======Setting_Filter(Ring)=======*/

		:root{
		    --spui-border-shade-3-color:#a7a7a7;
		    --spui-border-secondary-color:#000000;
		    --spui-border-primary-color:#000000;
		}

		.Causal_Main_Content {
			float: left;
			width: 100%;
			/* margin-top: 2rem; */
		}

		.Dropdown_sp_purple_theme_new {
			float: left;
			width: 100%;
		}


		.Dropdown_sp_purple_theme_new .navbar-nav {
			-webkit-box-orient: horizontal;
			-webkit-box-direction: normal;
			-ms-flex-direction: row;
			flex-direction: row;
			border-bottom: 1px solid var(--spui-border-shade-3-color) !important;
		}

		.Dropdown_sp_purple_theme_new .nav-fill .nav-item:first-child {
			margin-left: 0px;
		}

		.Dropdown_sp_purple_theme_new .nav-fill .nav-item {
			-webkit-box-flex: inherit;
			-ms-flex: inherit;
			flex: inherit;
			border: 1px solid transparent;
			position: relative;
			/* font-family: amiko,sans-serif; */
			border-top-left-radius: 5px;
			border-top-right-radius: 5px;
			font-family: var(--spui-headings-font-family);
		    text-align: center;
		    padding: 10px 10px;
		    margin-right: 10px;
		}

		.Dropdown_sp_purple_theme_new .nav-fill .nav-item::before {
			position: absolute;
			content: "";
			width: 100%;
			height: 1px;
			background: #fff;
			bottom: -1px;
			left: 0;
		}

		.Dropdown_sp_purple_theme_new .dropdown a {
			color: #333;
			text-transform: uppercase;
			font-size: 0.8rem;
			line-height: 1.2rem;
			padding: 0px;
			cursor: pointer;
			font-family: var(--spui-headings-font-family);
		}


		.Dropdown_sp_purple_theme_new .dropdown-menu {
			top: inherit !important;
			position: absolute !important;
			float: left !important;
			-webkit-transition: all 400ms ease 0s;
			-o-transition: all 400ms ease 0s;
			transition: all 400ms ease 0s;
			display: block;
			opacity: 0;
			visibility: hidden;
			width: 100% !important;
			padding: 10px;
			-webkit-transform: translate3d(0px,20px,0px) !important;
			transform: translate3d(0px,20px,0px) !important;
			border-color: var(--spui-border-shade-3-color) !important;
			left: -1px;
			right: 0;
			margin: auto;
			min-width: 30em !important;
			max-width: 30em !important;
			border-radius: 0;
			border-top: none !important;
		}

		body .Dropdown_sp_purple_theme_new li:hover .dropdown-menu {
			opacity: 1;
			visibility: visible;
			-webkit-transform: translate3d(0,0.9em,0) !important;
			-ms-transform: translate3d(0,0.9em,0) !important;
			transform: translate3d(0,0.9em,0) !important;
			top: inherit !important;
		}

		.Style_sp_purple_theme_contents {
			float: left;
			width: 100%;
			/* overflow: hidden; */
		}
		.Causal_Top_Section_One_Top_Left {
			float: left;
			width: 100%;
			display: flex;
			flex-wrap: wrap;
			-webkit-box-pack: flex-start;
			-ms-flex-pack: flex-start;
			justify-content: flex-start;
			gap: .5em;
		}


		.Box_Causal_Top_Right_Sec {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
			flex-direction: row;
			flex: 0 1 49%;
			padding: 5px;
			gap: 1em;
		}

		.Box_Right_CAUSAL_IMAGE {
			cursor: pointer;
			flex: 0 1 20%;
			position: relative;
			overflow: hidden;
		    border: none !important;
		    float: left;
		    width: 100%;
		}

		.Box_Right_Causal_TEXT {
			margin-top: 0rem;
			flex: 1;
		    float: left;
		    width: 100%;
		}

		.Box_Right_Causal_TEXT p {
			margin-top: 0rem;
			font-family: var(--spui-headings-font-family);
			font-size: 12px;
			text-align: left;
			text-transform: capitalize;
		    line-height: 21px;
		    color: #1b1b1b;
		    font-weight: 400;
		}




		.Box_Causal_Top_Right_Sec .Box_Right_CAUSAL_IMAGE .img-fluid {
			margin-bottom: 0rem;
			margin-top: 0 !important;
		}

		.Box_Right_CAUSAL_IMAGE .img-fluid {
			display: block;
			margin: 0 auto;
			object-fit: contain;
			margin-top: 10px;
		    width: 30px;
			height: 30px;
		}

		div#icon_text_eo_ring_style_cat .Causal_Top_Section_One_Top_Left .Box_Causal_Top_Right_Sec.eo_wbc_filter_icon .Box_Right_CAUSAL_IMAGE img {
			height: 23px;
			width: 47px;
		}
		div#icon_pa_eo_metal_attr .Box_Causal_Top_Right_Sec.eo_wbc_filter_icon .Box_Right_CAUSAL_IMAGE img {
			width: 25px;
			height: 25px;
		}

		div#numeric_slider_price .BOTTOm_RIGHT_CAUSAL .BooTOM_RiGHT_Slider {
			flex-basis: 100%;
		}
		div#numeric_slider_price .BOTTOm_RIGHT_CAUSAL .BooTOM_RiGHT_Slider span.irs.irs--round.js-irs-0 {
			height: 30px;
		}

		div#numeric_slider_price .BOTTOm_RIGHT_CAUSAL .BooTOM_RiGHT_Slider span.irs-handle.from {
			top: 5px;
		    bottom-color:var(--spui-border-secondary-color) !important;
		    box-shadow: 0 3px 6px rgb(0 0 0 / 32%) !important;
		}

		.Box_Right_CAUSAL_IMAGE .sp-purple-theme-small-color-change {
			position: absolute;
			top: 0;
			-webkit-transform: translateY(-70px);
			-ms-transform: translateY(-70px);
			transform: translateY(-70px);
			left: 0;
			right: 0;
		}
		.Causal_Top_Section_One_Top_Left .active .Box_Right_CAUSAL_IMAGE .sp-purple-theme-small {
		    position: relative;
		    -webkit-transform: translateY(55px);
		    -ms-transform: translateY(55px);
		    transform: translateY(55px);
		}
		.Causal_Top_Section_One_Top_Left .active .Box_Right_CAUSAL_IMAGE .sp-purple-theme-small-color-change {
		    -webkit-transform: translateY(0px);
		    -ms-transform: translateY(0px);
		    transform: translateY(0px);
		    display: block;
		    margin: auto;
		    left: 0;
		    right: 0;
		}

		.extra-controls {
			float: left;
			width: 100%;
			margin-top: 10px;
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
		}
		div#numeric_slider_price input {
			padding: 5px;
			height: 100%;
			width: 100px;
			color: #5c5c5c;
			border-radius: 4px;
		    background: #fff;
		    border: 1px solid var(--spui-border-primary-color) !important;
		    display: inline-block;
		    text-align: center !important;
		}

		.Style_sp_purple_theme_contents .Causal_Top_Section_One_Top_Left .active {
			outline: 1px solid var(--spui-border-secondary-color) !important;
			box-shadow: inherit  !important;
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