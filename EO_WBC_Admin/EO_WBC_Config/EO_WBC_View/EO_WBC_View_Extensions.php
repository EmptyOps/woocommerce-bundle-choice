<style type="text/css">
	.wc_addons_wrap {
 	   max-width: 1200px;
	}
	.wc_addons_wrap .addons-featured {
	    margin: 0;
	}
	.wc_addons_wrap .addons-banner-block, .wc_addons_wrap .addons-wcs-banner-block {
	    background: #fff;
	    border: 1px solid #ddd;
	    margin: 0 0 1em 0;
	    padding: 2em 2em 1em;
	}
	.wc_addons_wrap .addons-banner-block-items {
	    display: -webkit-box;
	    display: -webkit-flex;
	    display: flex;
	    -webkit-box-orient: horizontal;
	    -webkit-box-direction: normal;
	    -webkit-flex-direction: row;
	    flex-direction: row;
	    -webkit-flex-wrap: wrap;
	    flex-wrap: wrap;
	    -webkit-justify-content: space-around;
	    justify-content: space-around;
	    margin: 0 -10px 0 -10px;
	}

	.wc_addons_wrap .addons-banner-block-item:nth-child(-n+3) {
	    display: block;
	}
	.wc_addons_wrap .addons-banner-block-item, .wc_addons_wrap .addons-column-block-item {
	    display: none;
	}
	.wc_addons_wrap .addons-banner-block-item {
	    border: 1px solid #e6e6e6;
	    border-radius: 3px;
	    -webkit-box-flex: 1;
	    -webkit-flex: 1;
	    flex: 1;
	    margin: 1em;
	    min-width: 200px;
	    width: 30%;
	}
	.wc_addons_wrap .addons-banner-block-item-icon {
	    background: #f7f7f7;
	    height: 143px;
	}
	.wc_addons_wrap .addons-banner-block-item-icon, .wc_addons_wrap .addons-column-block-item-icon {
	    -webkit-box-align: center;
	    -webkit-align-items: center;
	    align-items: center;
	    display: -webkit-box;
	    display: -webkit-flex;
	    display: flex;
	    -webkit-box-pack: center;
	    -webkit-justify-content: center;
	    justify-content: center;
	}
	.wc_addons_wrap .addons-banner-block-item-content {
	    display: -webkit-box;
	    display: -webkit-flex;
	    display: flex;
	    -webkit-box-orient: vertical;
	    -webkit-box-direction: normal;
	    -webkit-flex-direction: column;
	    flex-direction: column;
	    height: 500px;
	    -webkit-box-pack: justify;
	    -webkit-justify-content: space-between;
	    justify-content: space-between;
	    padding: 24px;
	}
	.wc_addons_wrap .addons-button-solid {
	    background-color: #955a89;
	    color: #fff;
	}
	.wc_addons_wrap .addons-button {
	    border-radius: 3px;
	    cursor: pointer;
	    display: block;
	    height: 37px;
	    line-height: 37px;
	    text-align: center;
	    text-decoration: none;
	    width: 100%;
	    margin-left: 1em;	    
	}

	.inline-buttons{
		grid-column-gap: 1em;
		display: grid;
		grid-template-columns: auto auto;
	}
</style>

<?php $make_buy= "https://sphereplugins.com/buy-a-plugin-extension/?cemail=".wp_get_current_user()->data->user_email."&cpname="; ?>

<div class="wrap woocommerce">
    <h1></h1>
    <?php   EO_WBC_Head_Banner::get_head_banner(); ?>
    <br/>
        <p><a href="https://wordpress.org/support/plugin/woo-bundle-choice" target="_blank"><?php _e('If you are facing any issue, please write to us immediately.','woo-bundle-choice'); ?></a></p>
    <br/>   
    <?php do_action('eo_wbc_menu_tabs','eo-wbc-extensions'); ?>
    <hr/>    
    <div class="addons-featured wc_addons_wrap">
		<div class="addons-banner-block">
			<h1>Take your store beyond the typical - sell anything</h1>
			<p>From services to content, there's no limit to what you can sell with WooCommerce.</p>
			<div class="addons-banner-block-items">
				<!-- Table View Extension -->
				<div class="addons-banner-block-item">
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/grid_view_ext.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Catelog Grid View</h3>
						<p>Let customers browse your inventory in a tabular view, which is a handy tool for diamond industry, <a target="_blank" href="https://www.emptyops.com/demo/jewelry-demo/product-category/eo_diamond_shape_cat/?EO_WBC=1&BEGIN=eo_diamond_shape_cat&STEP=1">Click here for demo.</a> </p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/woocommerce-product-bundle-table-view/">Buy Now</a>							
						</div>
					</div>
				</div>
				<!-- Email Extension -->
				<div class="addons-banner-block-item">
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/email_ext.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Woo Product Bundle Choice - Email</h3>
						<p>Order emails sent to customers from your shop will be customized based on what users have built, which helps in providing users with a complete experience.</p>
						<div class="inline-buttons">
								<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/woocommerce-product-bundle-e-mail-view/">Buy Now</a>
						</div>
					</div>
				</div>
				<!-- Rapnet Extension -->
				<div class="addons-banner-block-item">
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/rapnet_ext.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Rapnet Instant Inventory</h3>
						<p>Add the Rapnet Instant Inventory showcase to your site. It will be customized as per your requirements.</p>

						<p style="font-size: x-small;"><strong>Entire list of APIs we support</strong><br/>
				          1. Rapnet Instant Inventory API<br/>
				          2. Glow star Diamond API<br/>
				          3. Under development, you can pre-order!
				      	</p>
			              <ol style="font-size: x-small;">
			                <li>IDEX (International Diamond Exchange)</li>
			                <li>MID House of Diamonds Api</li>
			                <li>POLYGON Vertual Inventory Api</li>
			                <li>GEMFIND Diamond Link Api</li>
			                <li>Virtual Diamond Boutique Api</li>
			                <li>JewelCloud Api</li>
			              </ol>
			            <p style="font-size: x-small;">
				          4. You can also send us <a href="https://sphereplugins.com/contact-us/">Request</a> to have us support missing API
				        </p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/woocommerce-rapnet-integration-extension/">I'm Interested</a>							
						</div>
					</div>
				</div>
			</div>
			<div class="addons-banner-block-items">
				<!-- N-Step Extension -->
				<div class="addons-banner-block-item">
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/multi_step_ext.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Multi Category/Multi Step navigation Extension</h3>
						<p>This extension will let you use more than two main categories and more than two-step based navigation experience for any inventory.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/multi-category-multi-step-navigation-extension-woo-product-bundle-choice/">I'm Interested</a>							
						</div>
					</div>
				</div>
				<div class="addons-banner-block-item">
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/ring_maker.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>AI powered diamond ring image maker</h3>
						<p>We are building a machine learning-powered ring image-maker extension. If you allow access to your data(images) for research, we offer you free access to our extension when it's ready. Note that it's not ready yet, and we provide no guarantee it will be ready as it's in the research stage.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/ai-powered-diamond-ring-image-maker/">Get free access</a>							
						</div>
					</div>					
				</div>
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/suggesion_giver.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>AI powered suggestion for clothig pair maker</h3>
						<p>We are building a machine learning-powered suggestion tool for clothing pair makers. If you allow access to your data(images) for research, we offer you free access to our extension when it's ready. Note that it's not ready yet, and we provide no guarantee it will be ready as it's in the research stage.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/ai-powered-suggestion-for-clothing-pair-maker/">Get free access</a>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php EO_WBC_Head_Banner::get_footer_line(); ?>