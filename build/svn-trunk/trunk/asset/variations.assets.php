
<?php
// --- a code /woo-bundle-choice/application/model/publics/sp-model-single-product.php no che
?>

<?php
if (defined('SP_VARIATIONS_LOADED') && SP_VARIATIONS_LOADED == true) { ?>

<!-- /*tejas_22_07_2022 it for new QC upgrades so it is permenent*/ -->
	<?php
	if( is_product() ) {

		//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
		$custom_css = "
				
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

		";
		wbc()->load->add_inline_style('', $custom_css, 'common');

		//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
		$custom_css = "
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
		";
		wbc()->load->add_inline_style('', $custom_css, 'common');

		//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
		$custom_css = "
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
			";
			wbc()->load->add_inline_style('', $custom_css, 'common');


		$border_hover_color = _e($border_hover_color);
		$dimention = _e($dimention);
		$border_width = _e($border_width);
		$border_color = _e($border_color);
		$border_radius = _e($border_radius);
		$border_hover_width = _e($border_hover_width);
		$bg_color = _e($bg_color);
		$font_color = _e($font_color);
		$bg_hover_color = _e($bg_hover_color);
		$font_hover_color = _e($font_hover_color);

		//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
		$custom_css = "
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
				border-bottom: 2px ".$border_hover_color." solid !important;
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
					transform:rotate(360deg); 
				} 
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
				height: ".$dimention.";
				width: ".$dimention.";
				min-width: 35px;						
				text-align: center;						
				line-height: ".$dimention.";	        			
				cursor: pointer;
				margin: 0.25rem;
				text-align: center;
				border: ".$border_width." solid ".$border_color.";
				border-radius: ".$border_radius.";
				overflow: hidden;
			}	
			.variable-items-wrapper .variable-item:hover,.variable-items-wrapper .selected{
				box-shadow:0px 0px ".$border_hover_width." ".$border_hover_color.";        			
				border: 1px ".$border_hover_color." solid;
			}
			ul.variable-items-wrapper{
				margin: 0px;
			}
			.variable-item-color-fill,.variable-item-span{        			
				height: ".$dimention.";
				width: 100%;
				line-height: ".$dimention.";
			}
			.select2,.select3-selection{
				display: none !important;
			}
			.button-variable-item{
				background-color: ".$bg_color.";
				color: ".$font_color.";
			}
			.button-variable-item:hover{
				background-color: ".$bg_hover_color.";
				color: ".$font_hover_color.";	
			}


			/*--color-disable*/
			.disabled .spui_color_variable_item_contents::before{
			       background-image: var(--spui-dis-check);
			       background-position: 50%;
			       background-repeat: no-repeat;
			       background-size: 100%;
			       content: \" \";
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
			       content: \" \";
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
			       content: \"\";
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
				content: \"\";
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
			       content: \"\";
			       background-image: var(--spui-dis-check);
			       background-position: 50%;
			       background-repeat: no-repeat;
			       background-size: 100%;
			       display: block;
			       height: 100%;
			       width: 100%;
		    	}
		";
		wbc()->load->add_inline_style('', $custom_css, 'common');
	}

}

if(is_shop() || is_product_category()) {
?>
<script>
console.log('is_shop_css');
</script>
	<?php
	if (defined('SP_VARIATIONS_LOADED') && SP_VARIATIONS_LOADED == true) { 
	
				//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
				$custom_css = "
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

					/*        -->> Ooops! error mate ul ni csss 30-10-2023 Nayan*/
					        .ui.grid.centered {
					    		margin: auto;
						}
						.single_add_to_cart_button.button {
					   	 	margin-bottom: 5px;
						}
						.ui.row {
					    		justify-content: center;
						}
						span.ui.inverted.text {
					    		margin-bottom: 10px;
						}
						@media(max-width:480px){
						span.ui.inverted.text {
					    		margin-left: 30px;
						}	
						}
			    		/*form.variations_form table.variations tbody td select {
			        		display: none !important;
			    		}*/
				";
				wbc()->load->add_inline_style('', $custom_css, 'common');

				//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
				$custom_css = "
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
					       content: \" \";
					       display: block;
					       height: 100%;
					       position: absolute;
					       width: 100%;
					} */
				    	/*=====BUTTON_END====*/
					";
					wbc()->load->add_inline_style('', $custom_css, 'common');

				//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
				$custom_css = "
			    		:root {
			        		--spui-check: url(\"data:image/svg+xml;utf8,%3Csvg filter='drop-shadow(0px 0px 2px rgb(0 0 0 / .8))' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='M4 16L11 23 27 7'/%3E%3C/svg%3E\");
			        		--spui-dis-check:url(\"data:image/svg+xml;utf8,%3Csvg filter='drop-shadow(0px 0px 5px rgb(255 255 255 / .6))' xmlns='http://www.w3.org/2000/svg' width='72px' height='72px' viewBox='0 0 24 24'%3E%3Cpath fill='none' stroke='%23ff0000' stroke-linecap='round' stroke-width='0.6' d='M5 5L19 19M19 5L5 19'/%3E%3C/svg%3E\");
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
				        	content: \" \";
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
					       content: \" \";
					       display: block;
					       height: 100%;
					       position: absolute;
					       width: 100%;
				    	}
				";
				wbc()->load->add_inline_style('', $custom_css, 'common');


				?>
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
	<?php
	}
	?>
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
?>

<?php
if (defined('SP_VARIATIONS_LOADED') && SP_VARIATIONS_LOADED == true) { 

	$empty_init_toggle = empty($init_toggle);
	// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
	$inline_script =
		"			jQuery(document).ready(function($){\n" .
		"				// ACTIVE_TODO below sections might be of use so keeping it on for now, but we must double confirm like legacy woo js layers provide full dropdown template supports. but i think still sementic specific matters need to be managed because we are using sementic templates.\n" .
		"					// ACTIVE_TODO_OC_START\n" .
		"					// do we need to disable the blow change event implimention -- to h\n" .
		"					//  	eithere way blowo class would be loading only when the dropdown template of simentic is used on item page -- to h\n" .
		"					// ACTIVE_TODO_OC_END 	\n" .
		"				jQuery(\".dropdown\").dropdown().on('change',function(){\n" .
		"					var target_selector =  $('#'+$(this).find('input[type=\"hidden\"]').data('id'));\n" .
		"					target_selector.val($(this).find('input[type=\"hidden\"]').val());\n" .
		"					/*$(this).parent().find('.selected').removeClass('selected');\n" .
		"					$(this).addClass('selected');*/\n" .
		"					jQuery(\".variations_form\" ).trigger('check_variations');\n" .
		"					$(target_selector).trigger('change');\n" .
		"				});\n" .
		"\n" .
		"\n" .
		"				// ACTIVE_TODO we shoud simply put this class on the perticuler template html dom and coment the code below -- to h & -- to s\n" .
		"					// for now lats comment the code but after confirming with t -- to t\n" .
		"				if($('table.variations tbody>tr').length>0){\n" .
		"					$('table.variations').addClass('ui raised segment');	\n" .
		"				}\n" .
		"				\n" .
		"				$('#wbc_variation_toggle').on('click',function(){\n" .
		"					if($(this).find('.icon').hasClass('rotate-up')) {\n" .
		"						$(this).find('.icon').removeClass('rotate-up');\n" .
		"						$(this).find('.icon').addClass('rotate-down');\n" .
		"						$('table.variations').slideToggle(\"slow\");\n" .
		"					} else {\n" .
		"						$(this).find('.icon').removeClass('rotate-down');\n" .
		"						$(this).find('.icon').addClass('rotate-up');\n" .
		"						$('table.variations').slideToggle(\"slow\");\n" .
		"					}        				\n" .
		"				});\n" .
		"\n" .
		"				if(".$empty_init_toggle."){\n" .
		"					$('#wbc_variation_toggle').trigger('click');\n" .
		"				}\n" .
		"\n" .
		"				// --	below two click events would be implemented in the core variations js module, in that case it will be remove here \n" .
		"				// $('.variable-item').on('click',function(){\n" .
		"				// 	var target_selector = $('#'+$(this).data('id'));\n" .
		"				// 	target_selector.val($(this).data('value'));\n" .
		"				// 	$(this).parent().find('.selected').removeClass('selected');\n" .
		"				// 	$(this).addClass('selected');\n" .
		"				// 	jQuery(\".variations_form\" ).trigger('check_variations');\n" .
		"				// 	$(target_selector).trigger('change');\n" .
		"				// });\n" .
		"\n" .
		"				// jQuery(\".variations_form\").on('click', '.reset_variations'/*'woocommerce_variation_select_change'*//*'reset'*/,function(){\n" .
		"				// 	jQuery('.variable-items-wrapper .selected').removeClass('selected');\n" .
		"				// 	jQuery('.variable-items-wrapper .dropdown').dropdown('restore defaults');\n" .
		"				// });\n" .
		"				\n" .
		"			});\n";
		wbc()->load->add_inline_script('', $inline_script, 'common');
} 
?>

<!-- /*---TOOLTIP--- @tejas*/
/*----JS----*/ -->
<!-- <script type="text/javascript">
jQuery( document ).ready(function() {
    jQuery('[data-toggle="popover"]').popover(); 
});
</script> -->
<!-- /*----CSS---*/ -->
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

$spui_is_product = false;

if( is_product_category() ) {
	$spui_is_product_category = true;
}
	
/*ACTIVE_TODO_OC_START
--	check below two files and check if there is any optionsUI related flow there -- to b 
ACTIVE_TODO_OC_END*/
wbc()->theme->load('css','product');
	wbc()->theme->load('js','product');

	if (defined('SP_VARIATIONS_LOADED') && SP_VARIATIONS_LOADED == true) {
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
	}
?>

<!-- advance options icon up down 19-10-23 -->
<style>
	.sp-advance {
    		transform: rotate(-180deg) !important;
		padding-bottom:7px !important;   
	}
	.sp-advance-collapse{
   		transform: rotate(0deg) !important;
		padding-bottom:3px !important;   
	}
</style>
<script>
	jQuery(document).ready(function(){
		jQuery('span').on("click", function (event) {
	   jQuery('.material-icons').toggleClass('sp-advance');
	   jQuery('.material-icons').toggleClass('sp-advance-collapse');
	});
	});
</script>

<?php
	if (defined('SP_VARIATIONS_LOADED') && SP_VARIATIONS_LOADED == true) { ?>
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
			
		/*	added 11-09-2023 @a*/
			.hide{
				display: none !important;
			}

			.variable-items-wrapper .variable-item {
		   		 width: auto !important;
		    		height: auto !important;
			}
			.spui_engagment_product_change_color ul li {
			    transform: translateY(11em) !important;
			}
			body .spui_button_widget li.spui_button_variable_item.selected {
			    box-shadow: none !important;
			    -webkit-box-shadow:none !important;
			}
			.spui_button_widget li.spui_button_variable_item:hover{
				 box-shadow: none !important;
			    -webkit-box-shadow:none !important;	
			}
		</style>
<?php
	}
?>

<?php
if(wbc()->common->current_theme_key() != 'themes___purple_theme'){
?>
	<style type="text/css">
		a.ui.inverted.secondary.single_add_to_cart_button.button.alt {
    			width: 100%;
    			text-align: center;
    			margin-bottom: 5px;
		}
		a.ui.grey.button.single_add_to_cart_button.alt {
    			width: 100%;
   			text-align: center;
		}
	</style>
<?php
}
?>

<?php
if (defined('SP_VARIATIONS_LOADED') && SP_VARIATIONS_LOADED == true) { ?>

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
}
?>

<?php
// echo ob_get_clean();


if (defined('SP_VARIATIONS_LOADED') && SP_VARIATIONS_LOADED == true) { 

	// ACTIVE_TODO_OC_START
	// ACTIVE_TODO as of now we have implimented this support for the mapping based conditions here but in future if there is better place than we shoud move it over there -- to h
	// 	ACTIVE_TODO as weel as once we have the varations swatches beta update available we may lite to use the disable and hide flow of that version. Especialy the disable flow this much needed for providing apropriate and perfect user experiance -- to h
	// ACTIVE_TODO_OC_END

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
						    display: none !important;
						}

						body form table.variations tbody td ul.spui-wbc-swatches-variable-items-wrapper-<?php echo $_attribute_slug ?>{
							display: none !important;
						}
					</style>

				<?php
			}
		}

	}
}

?>

