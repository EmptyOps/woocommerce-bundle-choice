
<?php
// --- a code /woo-bundle-choice/application/model/publics/sp-model-single-product.php no che
?>

<!-- /*tejas_22_07_2022 it for new QC upgrades so it is permenent*/ -->
<?php
if($asset_param['disable_swatches_plugin_stylesheet'] != 'tiny_features_disable_swatches_plugin_stylesheet') {

if( is_product() ) {
?>
<style type="text/css">
	
	/*----Variation_th------*/
	:root{
	   --spui-variable-th-text-align: left;
	   --spui-variable-th-text-size:15px;
	   --spui-variable-th-text-color:#242424;
	}

	.variations_form .variations th.label {
	    display: table-cell !important;
	    text-align: var(--spui-variable-th-text-align) !important;
	    vertical-align: top;
	    border: none !important;
	}

	.woocommerce div.product form.cart .variations th.label label {
	    font-size: var(--spui-variable-th-text-size) !important;
	    line-height: 1.1;
	    text-transform: capitalize;
	    text-align: left;
	    display: inline-block;
	    vertical-align: middle;
	    font-weight: normal;
	    color: var(--spui-variable-th-text-color) !important;
	}

	body .variations_form .variations td {
	    padding-left: 1rem !important;
	    padding: 0 0 20px 0;
	    width: 100%;
	    border: none !important;	
	}

	.variations_form .variations td .ui.segment .label {
	    background: transparent !important;
	    border-color: transparent !important;
	    color: #333 !important;
	    left: 0;
	    margin-right: 0;
	    padding-left: 0;
	    display: none !important;
	}
	.variations_form .variations td .ui.segment {
	    border: none;
	    box-shadow: none;
	    margin-top: 0;
	    background: transparent !important;
	    padding: 0;
	    margin: 0;
	}
	body .variations_form table.variations .value a.reset_variations {
	    margin: 0;
	    margin-top: 1rem !important;
	    font-size: 12px !IMPORTANT;
	    color: #242424 !important;
	    text-transform: uppercase;
	    width: 100%;
	    float: left !important;
	    text-decoration: none !important;
	    border: none !important;
	    padding: 0 !important;
	}
	table.variations .value ul {
	    margin: 0;
	    padding: 0;
	}

	/*------Variable-btn----*/
	:root{
	        --spui-single-button-product-item-height:30px;
            --spui-single-button-product-item-width:30px;
            --spui-selected-item-box-shadow:#000;
        }

       <?php if(wbc()->options->get_option('tiny_features','tiny_features_disabled_attribute_style') == 'blur_with_cross'){ ?>
	       .spui-wbc-swatches-variable-item.disabled{
	   		opacity: .8;
		}	
		.spui-wbc-swatches-variable-item.disabled::before {
			position: absolute;
			content: " " !important;
			width: 100%;
			height: 1px;
			background: #FF0000 !important;
			left: 0;
			right: 0;
			bottom: 0;
			top: 50%;
			visibility: visible;
			opacity: 1;
			border: 0;
			margin: 0 !important;
			padding: 0 !important;
			min-width: auto;
			-webkit-transform-origin: center;
			transform-origin: center;
			z-index: 0;
			pointer-events: none;
			cursor: not-allowed;
			transform: rotate(45deg);
			z-index: 1;
		}

		.spui-wbc-swatches-variable-item.disabled::after {
			position: absolute;
			content: " " !important;
			width: 100%;
			height: 1px;
			background: #FF0000 !important;
			left: 0;
			right: 0;
			bottom: 0;
			top: 50%;
			visibility: visible;
			opacity: 1;
			border: 0;
			margin: 0 !important;
			padding: 0 !important;
			min-width: auto;
			-webkit-transform-origin: center;
			transform-origin: center;
			z-index: 0;
			pointer-events: none;
			cursor: not-allowed;
			transform: rotate(-45deg);
			z-index: 1;
		}
       <?php }elseif(wbc()->options->get_option('tiny_features','tiny_features_disabled_attribute_style') == 'blur_without_cross'){ ?>
		.spui-wbc-swatches-variable-item.disabled{
	   		opacity: .3;
		}
       <?php }elseif(wbc()->options->get_option('tiny_features','tiny_features_disabled_attribute_style') == 'hide'){ ?>
		.spui-wbc-swatches-variable-item.disabled{
			display: none !important;
		}
       <?php } ?>

	.spui-wbc-swatches-variable-items-wrapper-button li.variable-item {
/*	    margin: 4px !important;*/
/*	    padding: 2px !important;*/
	    position: relative;
	    /*min-width: var(--spui-single-button-product-item-width);
    	height: var(--spui-single-button-product-item-height) !important;*/
	    /*line-height: 30px;
	    text-align: center;
	    background: #ffffff;
	    color: #000;
	    border-radius: 2px;
	    -webkit-box-shadow: 0 0 0 1px #a8a8a8;
               box-shadow: 0 0 0 1px #a8a8a8;
	    cursor: pointer;
	    -webkit-transition: all .2s ease;
	    -o-transition: all .2s ease;
	    transition: all .2s ease;
	    border: none !important;*/
	    
	}
	.spui-wbc-swatches-variable-items-wrapper-button li.variable-item .variable-item-span-button {
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
	    padding: 0 5px;
	}
/*
	.spui-wbc-swatches-variable-items-wrapper-button li.variable-item.selected{
		box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
    	-webkit-box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
	}*/
	/*.spui-wbc-swatches-variable-items-wrapper-button li.variable-item:hover{
		box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);
    	-webkit-box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);	
	}*/

	/*----Variable-Color-----*/
	:root{
	    --spui-single-color-product-item-height:30px;
	    --spui-single-color-product-item-width:30px;
	    --spui-selected-item-box-shadow:#000;
    }

	.spui-wbc-swatches-variable-items-wrapper-color li.variable-item{
		margin: 4px !important;
        padding: 2px !important;
        position: relative;
        width: var(--spui-single-color-product-item-width) !important;
        height: var(--spui-single-color-product-item-height) !important;
        background: #ffffff;
        color: #000;
        border-radius: 2px;
        -webkit-box-shadow: 0 0 0 1px #a8a8a8;
               box-shadow: 0 0 0 1px #a8a8a8;
        cursor: pointer;
        -webkit-transition: all .2s ease;
        -o-transition: all .2s ease;
        transition: all .2s ease;
        border: none !important;
        min-width: auto;
	}
	.spui-wbc-swatches-variable-items-wrapper-color li.variable-item .variable-item-span-button {
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

	.spui-wbc-swatches-variable-items-wrapper-color li.variable-item.selected{
		box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
    	-webkit-box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
	}
	.spui-wbc-swatches-variable-items-wrapper-color li.variable-item:hover{
		box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);
    	-webkit-box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);	
	}

	/*---Variable-Images----*/
	:root {
		--spui-single-icon-product-item-height:30px;
        --spui-single-icon-product-item-width:30px;
        --spui-selected-item-box-shadow:#000;
	}

	.spui-wbc-swatches-variable-items-wrapper-image li.variable-item{
		margin: 4px !important;
        padding: 2px !important;
        position: relative;
        width: var(--spui-single-icon-product-item-width) !important;
        height: var(--spui-single-icon-product-item-height) !important;
        line-height: 30px;
        text-align: center;
        background: #ffffff;
        color: #000;
        border-radius: 2px;
        -webkit-box-shadow: 0 0 0 1px #a8a8a8;
               box-shadow: 0 0 0 1px #a8a8a8;
        cursor: pointer;
        -webkit-transition: all .2s ease;
                -o-transition: all .2s ease;
                transition: all .2s ease;
                border: none !important;
        min-width: auto !important;
	}
	.spui-wbc-swatches-variable-items-wrapper-image li.variable-item img {
	    webkit-box-orient: vertical;
	    -webkit-box-direction: normal;
	    -webkit-box-pack: center;
	    -ms-flex-pack: center;
	    display: -webkit-box;
	    display: -ms-flexbox;
	    display: flex;
	    -ms-flex-direction: column;
	    flex-direction: column;
	    height: 100% !important;
	    justify-content: center;
	    position: relative;
	    width: 100% !important;
	    max-width: 100%;
	    margin: auto;
	}
	.spui-wbc-swatches-variable-items-wrapper-image li.variable-item.selected{
		box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
        -webkit-box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
	}
	.spui-wbc-swatches-variable-items-wrapper-image li.variable-item:hover{
		box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);
        -webkit-box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);
	}


	/*---Variable-select---*/
	:root{
        --spui-single-select-product-item-height:30px;
        --spui-single-select-product-item-width:30px;
        --spui-selected-item-box-shadow:#000;
    }

	/*.spui-wbc-swatches-variable-items-wrapper-select li.variable-item{
		margin: 4px !important;
	    padding: 2px !important;
	    position: relative;
	    min-width: var(--spui-single-select-product-item-width);
    	height: var(--spui-single-select-product-item-height) !important;
	    line-height: 30px;
	    text-align: center;
	    background: #ffffff;
	    color: #000;
	    border-radius: 2px;
	    -webkit-box-shadow: 0 0 0 1px #a8a8a8;
               box-shadow: 0 0 0 1px #a8a8a8;
	    cursor: pointer;
	    -webkit-transition: all .2s ease;
	    -o-transition: all .2s ease;
	    transition: all .2s ease;
	    border: none !important;
	}*/
	.spui-wbc-swatches-variable-items-wrapper-select li.variable-item .item{
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
	    padding: 0 5px;
	}
	/*.spui-wbc-swatches-variable-items-wrapper-select li.variable-item.selected{
		box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
        -webkit-box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
	}
	.spui-wbc-swatches-variable-items-wrapper-select li.variable-item:hover{
		box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);
        -webkit-box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);
	}*/

	/*----Image_text-----*/
	:root{
        --spui-single-image-text-product-item-height:30px;
        --spui-single-image-text-product-item-width:30px;
        --spui-selected-item-box-shadow:#000;
    }

	.spui-wbc-swatches-variable-items-wrapper-image_text li.variable-item{
		margin: 4px !important;
	    padding: 2px !important;
	    position: relative;
	    min-width: var(--spui-single-image-text-product-item-width);
    	height: var(--spui-single-image-text-product-item-height) !important;
	    /*line-height: 30px;*/
	    text-align: center;
	    background: #ffffff;
	    color: #000;
	    border-radius: 2px;
	    -webkit-box-shadow: 0 0 0 1px #a8a8a8;
               box-shadow: 0 0 0 1px #a8a8a8;
	    cursor: pointer;
	    -webkit-transition: all .2s ease;
	    -o-transition: all .2s ease;
	    transition: all .2s ease;
	    border: none !important;
	    display: -webkit-box !important;
	    display: -ms-flexbox !important;
	    display: flex !important;
	    -webkit-box-align: center;
	        -ms-flex-align: center;
	            align-items: center;
    	gap: 0.2em;
	}
	.spui-wbc-swatches-variable-items-wrapper-image_text li.variable-item img{
		width: 100% !important;
	    height: 100% !important;
	    max-width: 100%;
	    display: block !important;
	    margin: auto;
	}
	.spui-wbc-swatches-variable-items-wrapper-image_text li.variable-item.selected{
		box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
        -webkit-box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
	}
	.spui-wbc-swatches-variable-items-wrapper-image_text li.variable-item:hover{
		box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);
        -webkit-box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);
	}


	/*---Dropdown-icon----*/
	:root{
        --spui-single-dropdown-icon-product-item-height:30px;
        --spui-single-dropdown-icon-product-item-width:30px;
        --spui-selected-item-box-shadow:#000;
    }

	.spui-wbc-swatches-variable-items-wrapper-dropdown_image li.variable-item{
		margin: 4px !important;
	    padding: 2px !important;
	    position: relative;
	    min-width: var(--spui-single-dropdown-icon-product-item-width);
    	height: var(--spui-single-dropdown-icon-product-item-height) !important;
	    line-height: 30px;
	    text-align: center;
	    background: #ffffff;
	    color: #000;
	    border-radius: 2px;
	    -webkit-box-shadow: 0 0 0 1px #a8a8a8;
               box-shadow: 0 0 0 1px #a8a8a8;
	    cursor: pointer;
	    -webkit-transition: all .2s ease;
	    -o-transition: all .2s ease;
	    transition: all .2s ease;
	    border: none !important;
	    display: -webkit-box !important;
	    display: -ms-flexbox !important;
	    display: flex !important;
	    -webkit-box-align: center;
	        -ms-flex-align: center;
	            align-items: center;
    	gap: 0.2em;
	}
	.spui-wbc-swatches-variable-items-wrapper-dropdown_image li.variable-item .item {
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
	    padding: 0 5px;
	}

	.spui-wbc-swatches-variable-items-wrapper-dropdown_image li.variable-item.selected{
		box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
        -webkit-box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
	}
	.spui-wbc-swatches-variable-items-wrapper-dropdown_image li.variable-item:hover{
		box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);
        -webkit-box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);
	}


	/*---Dropdown-icon-only----*/
	:root{
        --spui-single-dropdown-icon-only-product-item-height:30px;
        --spui-single-dropdown-icon-only-product-item-width:30px;
        --spui-selected-item-box-shadow:#000;
    }

	.spui-wbc-swatches-variable-items-wrapper-dropdown_image_only li.variable-item{
		margin: 4px !important;
	    padding: 2px !important;
	    position: relative;
	    min-width: var(--spui-single-dropdown-icon-only-product-item-width);
    	height: var(--spui-single-dropdown-icon-only-product-item-height) !important;
	    /*line-height: 30px;*/
	    text-align: center;
	    background: #ffffff;
	    color: #000;
	    border-radius: 2px;
	    -webkit-box-shadow: 0 0 0 1px #a8a8a8;
               box-shadow: 0 0 0 1px #a8a8a8;
	    cursor: pointer;
	    -webkit-transition: all .2s ease;
	    -o-transition: all .2s ease;
	    transition: all .2s ease;
	    border: none !important;
	    display: -webkit-box !important;
	    display: -ms-flexbox !important;
	    display: flex !important;
	    -webkit-box-align: center;
	        -ms-flex-align: center;
	            align-items: center;
    	gap: 0.2em;
	}
	.spui-wbc-swatches-variable-items-wrapper-dropdown_image_only li.variable-item.selected{
		box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
        -webkit-box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
	}
	.spui-wbc-swatches-variable-items-wrapper-dropdown_image_only li.variable-item:hover{
		box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);
        -webkit-box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);
	}


	/*----Variation-Dropdown---*/
	:root{
	        --spui-single-dropdown-product-item-height:30px;
            --spui-single-dropdown-product-item-width:30px;
            --spui-selected-item-box-shadow:#000;
      }
	.spui-wbc-swatches-variable-items-wrapper-dropdown li.variable-item{
		margin: 4px !important;
	    padding: 2px !important;
	    position: relative;
	    min-width: var(--spui-single-dropdown-product-item-width);
    	height: var(--spui-single-dropdown-product-item-height) !important;
	    line-height: 30px;
	    text-align: center;
	    background: #ffffff;
	    color: #000;
	    border-radius: 2px;
	    -webkit-box-shadow: 0 0 0 1px #a8a8a8;
               box-shadow: 0 0 0 1px #a8a8a8;
	    cursor: pointer;
	    -webkit-transition: all .2s ease;
	    -o-transition: all .2s ease;
	    transition: all .2s ease;
	    border: none !important;
	}
	.spui-wbc-swatches-variable-items-wrapper-dropdown li.variable-item .item{
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
	    padding: 0 5px;
	}

	.spui-wbc-swatches-variable-items-wrapper-dropdown li.variable-item.selected{
		box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
        -webkit-box-shadow: 0 0 0 2px var(--spui-selected-item-box-shadow);
	}
	.spui-wbc-swatches-variable-items-wrapper-dropdown li.variable-item:hover{
		box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);
        -webkit-box-shadow: 0 0 0 3px var(--spui-selected-item-box-shadow);
	}

</style>


<style type="text/css">
	#wbc_variation_toggle .caret {
	    border-top: 0px dashed;
	    margin: 0 auto;
	}
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
	.ui.disabled.image, .ui.disabled.images,.disabled{
		opacity: 0.8;
	}
	.woocommerce .summary.entry-summary table.variations tr{
		border: none;
	}
	table.variations.ui.raised.segment .ui.mini.images .variable-item.image {
	    padding: 0 2px;
	}
	table.variations.ui.raised.segment .ui.mini.images .variable-item.image .variable-item-span-button {
	    padding: 0 5px;
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
		border:1px solid #d8d3d3;
		display: inline-block;
		color: #2d2d2d;
		font-size:1rem;
		cursor: pointer;
		border-radius: 5px !important;
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
<script>
console.log('is_shop_css');
</script>
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
	        -webkit-box-shadow: 0 0 0 1px #a8a8a8;
               box-shadow: 0 0 0 1px #a8a8a8;
	        cursor: pointer;
	        -webkit-transition: all .2s ease;
            -o-transition: all .2s ease;
            transition: all .2s ease;
            -webkit-box-flex: 1 !important;
	    -ms-flex: 1 1 auto !important;
	        flex: 1 1 auto !important;
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

        form.variations_form table.variations tbody th.label,
        form.variations_form table.variations tbody td.label {
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

		/*form.variations_form table.variations tbody td select {
		    display: none !important;
		}*/

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
            --spui-button-item-box-font-size:1rem;
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
	        /*background: #ffffff;
	        color: #000;*/
	        border-radius: 2px;
	        -webkit-box-shadow: 0 0 0 1px #a8a8a8;
               box-shadow: 0 0 0 1px #a8a8a8;
	        cursor: pointer;
	        -webkit-transition: all .2s ease;
            -o-transition: all .2s ease;
            transition: all .2s ease;
	    -webkit-box-flex: 1 !important;
	    -ms-flex: 1 1 auto !important;
	        flex: 1 1 auto !important;
	    
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
	        font-size: var(--spui-button-item-box-font-size) !important;
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
	        -webkit-box-shadow: 0 0 0 1px #a8a8a8;
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
	        cursor: pointer;
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
	        cursor: pointer;
	    }
	</style>


	
	
<?php	
}
}
?>

<script>
	<?php 
	if(is_product() && !has_action('woocommerce_before_variations_form')) {
	?>
		// jQuery(".variations_form").before('<span id="wbc_variation_toggle" class="ui raised segment"><?php _e($toggle_text); ?><i class="caret up icon" style="text-align: center;line-height: 1em;"></i></span>');	

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
<!-- <script type="text/javascript">
jQuery( document ).ready(function() {
    jQuery('[data-toggle="popover"]').popover(); 
});
</script> -->
<!-- /*----CSS---*/ -->
<?php 
if($asset_param['disable_swatches_plugin_stylesheet'] != 'tiny_features_disable_swatches_plugin_stylesheet') {
?>
<style type="text/css">
	:root{
        --spui_tooltip_bg:#8224e3;
        --spui_tooltip_text:#fff;
        --spui_tooltip_textsize:0.8rem;
        --spui_tooltip_padding:.5rem 1.75rem;
        --spui_tooltip_body:none;
    }
    .popover{
    	height: auto !important;
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

    /*----Loader-css----*/
    	:root{

    		--spui-loader-background-color:rgba(255,255,255, 0.6);
    	}

    	.loading {
	    /*background-image: url(https://kuyum.crewmedya.com/wp-content/plugins/woo-bundle-choice/asset/icon/spinner.gif);*/
	    background-image:url(".constant('EOWBC_ASSET_URL')."icon/spinner.gif);
	    background-color: var(--spui-loader-background-color) !important;
	    background-position: center center;
	    background-repeat: no-repeat;
	    margin: 0;
	    position: fixed !important;
	    top: 0 !important;
	    left: 0 !important;
	    z-index: 10000 !important;
	    width: 100vw !important;
	    height: 100vh !important;
	}
	/*----Loader-cssEnd----*/

	/*----Breadcum----*/
	body .ui.grid>.column:not(.row) {
	    padding-top: 1rem;
	    padding-bottom: 1rem;
	}
	/*---Breadcum-End----*/
	
	/*---Filter-tab---*/
	.tax-product_cat .eo-wbc-container.filters .ui.menu {
                -ms-flex-wrap: wrap;
                    flex-wrap: wrap;
                -webkit-box-pack: center;
                    -ms-flex-pack: center;
                        justify-content: center;
            }
            .tax-product_cat .eo-wbc-container.filters .ui.menu a.item.center {
                margin-left: 0 !important;
            }
        /*---Filter-tabEnd---*/  
</style>

<?php 
}

$spui_is_product = false;

if( is_product_category() ) {
	$spui_is_product_category = true;
}
	
/*ACTIVE_TODO_OC_START
--	check below two files and check if there is any optionsUI related flow there -- to b 
ACTIVE_TODO_OC_END*/
wbc()->theme->load('css','product');
	wbc()->theme->load('js','product');
// Toggle Button
$toggle_status = true;
//wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_status',true);

/*ACTIVE_TODO_OC_START
--	and by default the expand collapse should be disabled, and when that is disabled nothing related to that will be loaded on frontend -- to b. if required ask t to take care of html css js etc -- to t 
ACTIVE_TODO_OC_END*/
$init_toggle = wbc()->options->get_option('tiny_features','tiny_features_product_page_option_ui_toggle_init_status');			

$toggle_text = wbc()->options->get_option('tiny_features','tiny_features_product_page_option_ui_toggle_text',__('CUSTOMIZE THIS PRODUCT'));
/*ACTIVE_TODO_OC_START
--	have t update defaults to a general kind of theme -- to t. current style is so catchy and dark and need to have grayish like general theme that works mostly if not updated. 
ACTIVE_TODO_OC_END*/
// Variation item non-hovered
// $dimention = wbc()->options->get_option('tiny_features',$spui_is_product ? 'tiny_features_product_page_option_ui_option_dimention' : 'tiny_features_shop_page_option_ui_option_dimention','2em');
$dimention = wbc()->options->get_option('tiny_features',$spui_is_product_category ? 'tiny_features_shop_page_option_ui_option_dimention':'tiny_features_option_ui_option_dimention','2em');

$border_color = wbc()->options->get_option('tiny_features',$spui_is_product_category ? 'tiny_features_shop_page_option_ui_border_color':'tiny_features_option_ui_border_color','#ECECEC');

$border_width = wbc()->options->get_option('tiny_features',$spui_is_product_category ? 'tiny_features_shop_page_option_ui_border_width':'tiny_features_option_ui_border_width','2px');

$border_radius = wbc()->options->get_option('tiny_features',$spui_is_product_category ? 'tiny_features_shop_page_option_ui_border_radius':'tiny_features_option_ui_border_radius','1px');

// Variation item hovered
$border_hover_color = wbc()->options->get_option('tiny_features',$spui_is_product_category ? 'tiny_features_shop_page_option_ui_border_color_hover':'tiny_features_option_ui_border_color_hover','#3D3D3D');

$border_hover_width = wbc()->options->get_option('tiny_features',$spui_is_product_category ? 'tiny_features_shop_page_option_ui_border_width_hover':'tiny_features_option_ui_border_width_hover','2px');

// button only
$font_color = wbc()->options->get_option('tiny_features',$spui_is_product_category ? 'tiny_features_shop_page_option_ui_font_color':'tiny_features_option_ui_font_color','#DBDBDB');

$font_hover_color = wbc()->options->get_option('tiny_features',$spui_is_product_category ? 'tiny_features_shop_page_option_ui_font_color_hover':'tiny_features_option_ui_font_color_hover','#AA7D7D');

$bg_color = wbc()->options->get_option('tiny_features',$spui_is_product_category ? 'tiny_features_shop_page_option_ui_bg_color':'tiny_features_option_ui_bg_color','#ffffff');

$bg_hover_color = wbc()->options->get_option('tiny_features',$spui_is_product_category ? 'tiny_features_shop_page_option_ui_bg_color_hover':'tiny_features_option_ui_bg_color_hover','#DCC7C7');

// ob_start();
if($asset_param['disable_swatches_plugin_stylesheet'] != 'tiny_features_disable_swatches_plugin_stylesheet') {
?>
<style type="text/css">
	/*.ui.mini.images .variable-item.image{
		width: auto;						
	}*/					
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
		//display: table-cell !important;
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
	.ui .button-variable-item{
		background-color: <?php _e($bg_color); ?>;
		color: <?php _e($font_color); ?>;
	}
	.ui .button-variable-item:hover{
		background-color: <?php _e($bg_hover_color); ?>;
		color: <?php _e($font_hover_color); ?>;	
	}

	/*-- loader background img ashish added this css 31-08-2023 --*/
	.sp-variations-gallery-images-zoom-loader{
		background: transparent url('<?php echo constant('EOWBC_ASSET_URL').'img/spinner.gif'; ?>') center no-repeat;
	}
</style>
<?php 

if(wbc()->wc->is_shop_or_category()) {

	// -- aa only woo-bundle na 10 demo se tena mate patch se jema ring builder and show option swatches enable hase tyare category page ma quintity and select option na button sivay badhu hide thay jase 154.23
	// themes___botiga
	// themes___rife-free
	// themes___hello-elementor
	// themes___neve
	// themes___oceanwp
	// themes___astra
	// themes___storefront
	// themes___customify
	if($asset_param['is_ring_builder_enabled'] && $asset_param['is_show_options_ui_enabled']) {

		echo $asset_param['archive_loop_swatches_css_patch'];
	}

	// -- jyare ring builder ni switch on hoy tyare aa file load j nathi thati te hirenbhai ne jovu padse 154.23
	// themes___zakra
	// themes___astra
	// themes___blossom-shop
	// themes___bosa
	// themes___bosa-storefront
	// themes___botiga
	// themes___customify
	// themes___ecommerce-solution
	// themes___enwoo
	// themes___estore
	// themes___generatepress
	// themes___hello-elementor
	// themes___hestia
	// themes___jewelry-store
	// themes___kadence
	// themes___laventa
	// themes___neve
	// themes___oceanwp
	// themes___open-shop
	// themes___qi
	// themes___rife-free
	// themes___shoper
	// themes___shopper-shop
	// themes___shoppingcart
	// themes___storefront
	// themes___storeship
	// themes___sydney
	// themes___th-shop-mania
	// themes___twentytwenty
	// themes___twentytwentyone
	// themes___twentytwentythree
	// themes___twentytwentytwo
	// themes___vogue
	// themes___vw-ecommerce-store 
	// themes___woostify
	if(!$asset_param['is_ring_builder_enabled'] && $asset_param['is_show_options_ui_enabled']) {
	?>
		<style type="text/css">
/*			-- aa css ring builder disable and show option ui switch enable hoy tyare select valu button category page ma none thay jase*/
			.product_type_variable.add_to_cart_button {
			    display: none !important;
			}
		</style>
	<?php
	}

} 
}
?>

<script>
	jQuery(document).ready(function($){
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

		// ACTIVE_TODO_OC_START
		// --	below two click events would be implemented in the core variations js module, in that case it will be remove here 
	// ACTIVE_TODO_OC_END
		$('.variable-item').on('click',function(){
			var target_selector = $('#'+$(this).data('id'));
			target_selector.val($(this).data('value'));
			// $(this).parent().find('.selected').removeClass('selected');
			// $(this).addClass('selected');
			jQuery(".variations_form" ).trigger('check_variations');
			$(target_selector).trigger('change');
		});

		jQuery(".variations_form").on('click', '.reset_variations'/*'woocommerce_variation_select_change'*//*'reset'*/,function(){
			jQuery('.variable-items-wrapper .selected').removeClass('selected');
			jQuery('.variable-items-wrapper .dropdown').dropdown('restore defaults');
		});
		
	});
</script>
<?php
// echo ob_get_clean();

// ACTIVE_TODO_OC_START
// ACTIVE_TODO as of now we have implimented this support for the mapping based conditions here but in future if there is better place than we shoud move it over there -- to h
// 	ACTIVE_TODO as weel as once we have the varations swatches beta update available we may lite to use the disable and hide flow of that version. Especialy the disable flow this much needed for providing apropriate and perfect user experiance -- to h
// ACTIVE_TODO_OC_END

if($asset_param['disable_swatches_plugin_stylesheet'] != 'tiny_features_disable_swatches_plugin_stylesheet') {

if(is_product()) {

	// $_attribute_perams = explode(',', \eo\wbc\model\SP_WBC_Router::get_query_params('_attribute', 'REQUEST') );	
	$_attribute_perams = explode(',', wbc()->sanitize->get('__mapped_attribute') );	

	// wbc_pr('__attribute_perams');
	// wbc_pr($_attribute_perams);

	foreach($_attribute_perams as $_attribute_slug) {
		
		// NOTE: so far no need to check if checklist is empty so true or condition is added for now. 
		if(true || !empty( wbc()->sanitize->get('checklist_'.$_attribute_slug) )) {
			?> 
			<style type="text/css">

				label[for = <?php echo $_attribute_slug ?>] {
				    display: none;
				}

				body form table.variations tbody td .spui-wbc-swatches-variable-items-wrapper-<?php echo $_attribute_slug ?>{
					display: none !important;
				}
			</style>

			<?php
		}
	}

}

}
?>

