<?php
/*
*	Displays the setup wizard's basic config page
*/
?>
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.css"
    integrity="sha512-KXol4x3sVoO+8ZsWPFI/r5KBVB/ssCGB5tsv2nVOKwLg33wTFP3fmnXa47FdSVIshVTgsYk/1734xSk9aFIa4A=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
/>

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
    integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
></script>

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js"
    integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
></script>

<div
    class="ui segment container"
    style="
        height: 100%;
        margin-bottom: 0px;
        border: none !important;
        box-shadow: none;
    "
>
<style type="text/css">
    .dimaond_img_1 {
        width: 100%;
        float: left;
        display: flex;
        height: 17em;
    }
    img {
        width: 50%;
        margin: auto;
    }
    .section_container {
        margin-top: 4em;
    }
    .dimaond_img_3 img {
        width: 100%;
    }
    body {
        height: 100em;
    }
    .thierd_section_expand {
        width: 100% !important;
    }
    span.ui.grey.text {
        color: #767676;
    }
    span.ui.small.text {
        font-size: .75em;
    }
    span.ui.text {
        line-height: 1;
    }
    .description{
        line-height: 4 !important;
    }
    .other_field{
        margin: 1.5em 0 !important;
    }
    .n_button{
        padding-top: 1em;
    }
</style>


			<input type="hidden" name="action" value="basic_config">
            <input type="hidden" name="select_option" value="">

			<div class="ui form segment">
			  	<div class="inline fields" style="display:none;">
			    	<label><?php _e('Inventory Type','woo-bundle-choice'); ?></label>
			    	<div class="three wide field">
			      		<div class="ui selection dropdown fluid">
						  	<input type="hidden" name="eo_wbc_inventory_type" id="eo_wbc_inventory_type">
						  	<i class="dropdown icon"></i>
						  	<div class="default text"><?php _e('Inventory Type','woo-bundle-choice'); ?></div>
						  	<div class="menu">
							    <div class="item" data-value="jewelry"><?php _e('Jewelry','woo-bundle-choice'); ?></div>
							    <div class="item" data-value="clothing"><?php _e('Clothing','woo-bundle-choice'); ?></div>
							    <div class="item" data-value="home_decor"><?php _e('Home Decor','woo-bundle-choice'); ?></div>
							    <div class="item" data-value="others"><?php _e('Others','woo-bundle-choice'); ?></div>
						  	</div>
						</div>
			    	</div>		
			    	<i class="exclamation circle icon" data-content="Please select the Inventory you are selling on this site, if you are selling more than one then select Others." data-variation="very wide"></i>
			  	</div>
			  	<br/>

                <div class="section_container">
                    <h2 class="ui floated header">Section 1</h2>

                    <div class="ui clearing divider"></div>

                    <div class="ui special cards">
                        <div class="card bn-rbald">
                            <div class="blurring dimmable image">
                                <div class="ui dimmer">
                                    <div class="content">
                                        <div class="center">
                                            <div class="ui inverted button select_value" data-value_name="jewelry" data-select_option="bn-rbald">Select</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dimaond_img_1">
                                    <img src=<?php echo constant('EOWBC_ASSET_URL').'img/setup_wizard/wedding-ring.png'; ?> />
                                </div>
                            </div>
                            <div class="content">
                                <a class="header"
                                    >Ring builder & Loose diamond search page</a
                                >
                                <div class="meta">
                                    <span class="date"
                                        >Lorem Ipsum is simply dummy text of the printing
                                        and typesetting industry. Lorem Ipsum has been the
                                        industry's standard dummy text ever since the
                                        1500s</span
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="card bn-vs">
                            <div class="blurring dimmable image">
                                <div class="ui dimmer">
                                    <div class="content">
                                        <div class="center">
                                            <div class="ui inverted button select_value" data-value_name="others" data-select_option="bn-vs">Select</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dimaond_img_3">
                                    <img
                                        src=<?php echo constant('EOWBC_ASSET_URL').'img/setup_wizard/vs.png'; ?>
                                    />
                                </div>
                            </div>
                            <div class="content">
                                <a class="header">Variation Swatches</a>
                                <div class="meta">
                                    <span class="date"
                                        >Free swatches on shop page and free video swatches
                                        on product page</span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section_container">
                    <h2 class="ui floated header">Section 2</h2>

                    <div class="ui clearing divider"></div>

                    <div class="ui special cards">
                        <div class="card bn-ajdf">
                            <div class="blurring dimmable image">
                                <div class="ui dimmer">
                                    <div class="content">
                                        <div class="center">
                                            <div class="ui inverted button select_value" data-value_name="jewelry" data-select_option="bn-ajdf">Select</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dimaond_img_1">
                                    <img src=<?php echo constant('EOWBC_ASSET_URL').'img/setup_wizard/diamond.png'; ?> />
                                </div>
                            </div>
                            <div class="content">
                                <a class="header">All jewelry and diamond features </a>
                                <div class="meta">
                                    <span class="date"
                                        >Lorem Ipsum is simply dummy text of the printing
                                        and typesetting industry. Lorem Ipsum has been the
                                        industry's standard dummy text ever since the
                                        1500s</span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section_container">
                    <h2 class="ui floated header">Section 3</h2>

                    <div class="ui clearing divider"></div>

                    <div class="ui styled accordion thierd_section_expand">
                        <div class="title">
                            <i class="dropdown icon"></i>
                            Other
                        </div>
                        <div class="content">
                            

                            <div class="ui form">
                                <div class="grouped fields">
                                    <label
                                        >For clothing and fashion sites it is a perfect tool
                                    </label>
                                    <div class="field other_field bn-pm">
                                        <div class="ui slider checkbox">
                                            <input
                                                type="radio"
                                                class="check_value"
                                                name="throughput"
                                                checked="checked"
                                                data-value_name="clothing"
                                                data-select_option="bn-pm"
                                            />
                                            <label>Pair Maker</label>
                                            <span class="ui grey text small description">Enables to set the variation form open at initial.</span>
                                        </div>
                                    </div>
                                    <div class="field other_field bn-gt">
                                        <div class="ui slider checkbox">
                                            <input type="radio" class="check_value" name="throughput" data-value_name="home_decor" data-select_option="bn-gt"/>
                                            <label>Gaidance tool(Home Decore)</label>
                                            <span class="ui grey text small description">It is a perfect tool for home decor and so 
                                                on categories.</span>
                                        </div>
                                    </div>
                                    <div class="field other_field bn-other">
                                        <div class="ui slider checkbox">
                                            <input type="radio" class="check_value" name="throughput" data-value_name="others" data-select_option="bn-other"/>
                                            <label>Other</label>
                                            <span class="ui grey text small description"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>






                            <!-- <div class="ui special cards">
                                <div class="card bn-pm">
                                    <div class="blurring dimmable image">
                                        <div class="ui dimmer">
                                            <div class="content">
                                                <div class="center">
                                                    <div class="ui inverted button select_value" data-value_name="clothing">
                                                        Select
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dimaond_img_3">
                                            <img
                                                src="001.png"
                                            />
                                        </div>
                                    </div>
                                    <div class="content">
                                        <a class="header">Pair Maker</a>
                                        <div class="meta">
                                            <span class="date"
                                                >For clothing and fashion sites it is a
                                                perfect tool.</span
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="card bn-gt">
                                    <div class="blurring dimmable image">
                                        <div class="ui dimmer">
                                            <div class="content">
                                                <div class="center">
                                                    <div class="ui inverted button select_value" data-value_name="home_decor">
                                                        Select
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dimaond_img_3">
                                            <img
                                                src="001.png"
                                            />
                                        </div>
                                    </div>
                                    <div class="content">
                                        <a class="header">Gaidance tool(Home Decore)</a>
                                        <div class="meta">
                                            <span class="date"
                                                >It is a perfect tool for home decore and so
                                                on categories.</span
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="card bn-other">
                                    <div class="blurring dimmable image">
                                        <div class="ui dimmer">
                                            <div class="content">
                                                <div class="center">
                                                    <div class="ui inverted button select_value" data-value_name="others">
                                                        Select
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dimaond_img_3">
                                            <img
                                                src="001.png"
                                            />
                                        </div>
                                    </div>
                                    <div class="content">
                                        <a class="header">Other</a>
                                        <div class="meta">
                                            <span class="date"></span>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

			  	<div class="inline fields n_button">			  		
			  		<div class="field">
			  			<button class="ui inverted primary button" type="submit"><?php echo eowbc_lang('Next');?></button>
			  		</div>
			  	</div>
			</div>

<script type="text/javascript">
            
    window.site_url_c = null;

    var select_option;

    // card js
    // https://fomantic-ui.com/views/card.html#card
    $('.special.cards .image').dimmer({
    // As hover is not working on mobile, you might use click on those devices as fallback
      on: 'ontouchstart' in document.documentElement ? 'click' : 'hover'
    });

    $('.ui.accordion').accordion({selector: {trigger: '.title'}});




    // -- click --
    jQuery('.select_value').on('click',function(){

        var value_name = jQuery(this).data('value_name');
        var select_option = jQuery(this).data('select_option');

        jQuery('[data-value="'+ value_name +'"] ').trigger('click');
        jQuery('[name="select_option"]').attr('value',select_option);
    });
    // -- change --
    jQuery('.check_value').on('change',function(){

        var value_name = jQuery(this).data('value_name');
        var select_option = jQuery(this).data('select_option');

        jQuery('[data-value="'+ value_name +'"] ').trigger('click');
        jQuery('[name="select_option"]').attr('value',select_option);
    });




    // temp
    $('.ui.dropdown')
      .dropdown()
    ;


</script>
