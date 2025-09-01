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

			<div class="addons-banner-block-items">
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_Cart.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Color images on category & item page</h3>
						<p>Help users see item images in different colors as they switch the color on category and item pages.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/color-images-on-category-item-page/">Get free access</a>							
						</div>
					</div>
				</div>
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_Cart.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Add An Inscription</h3>
						<p>Let your users to specify the text to engrave on the ring.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/add-an-inscription/">Get free access</a>							
						</div>
					</div>
				</div>
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_Cart.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Recently viewed tab</h3>
						<p>This extention will add a recently viewed thumbnail action to the tumbnail gethering of the item page apo click in which it will show to users the recently viewed item.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/recently-viewed-tab/">Get free access</a>							
						</div>
					</div>
				</div>
			</div>

			<div class="addons-banner-block-items">
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_Cart.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Earring, pendant etc builder</h3>
						<p>Like ring builder an extension to create earring, pendant etc builder.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/earring-and-pendant-etc-builder/">Get free access</a>							
						</div>
					</div>
				</div>
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_Cart.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Diamond Inspection feature</h3>
						<p></p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/diamond-inspection-feature/">Get free access</a>							
						</div>
					</div>
				</div>
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_Cart.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Request a diamond</h3>
						<p>A feature where user can send request to avail a specific diamond with specific characteristics if the diamond isn’t found in the exsting inventory.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/request-a-diamond/">Get free access</a>							
						</div>
					</div>
				</div>
			</div>

			<div class="addons-banner-block-items">
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_Cart.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>360/3d interactive videos – Diamond</h3>
						<p>This extension will help embed 360 video of the diamond into website category page and item page given that you have 360 video available form the provider.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/360-3d-interactive-videos-diamond/">Get free access</a>							
						</div>
					</div>
				</div>
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_Cart.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>360/3d interactive videos – Ring</h3>
						<p>This extension will help embed 360 video of the ring into website category page and item page given that you have 360 video available form the provider.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/360-3d-interactive-videos-ring/">Get free access</a>							
						</div>
					</div>
				</div>
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_Cart.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Find my ring size</h3>
						<p>This extension will provide detailed help and demonstration to users about how to figure out what their ring size is.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/find-my-ring-size/">Get free access</a>							
						</div>
					</div>
				</div>
			</div>

			<div class="addons-banner-block-items">
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_ViewWithShape.jpg') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>View with different shape</h3>
						<p>This extension will provide detailed help and demonstration to users about how to figure out what their ring size is.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/view-with-different-shape/">Get free access</a>							
						</div>
					</div>
				</div>
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_ViewWithCarat.jpg') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>View with real carat size</h3>
						<p>An extension for viewing diamond size in real perspective & a option in filters for real view available filter.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/view-with-real-carat-size/">Get free access</a>							
						</div>
					</div>
				</div>
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_DarkerLighterSkin.jpg') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Darker/lighter skin</h3>
						<p>This extension helps users visualize how the ring will look on their hand skin.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/darker-lighter-skin/">Get free access</a>							
						</div>
					</div>
				</div>
			</div>

			<div class="addons-banner-block-items">
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_Cart.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Diamond API Integrations</h3>
						<p>In this extension, we are providing API Integration service, you will need to get account for particular diamond exchange however in case of some free providers like Glowstar Diamond etc. that is not the case and we will guide you in the process of getting the approval(s)</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/woocommerce-diamond-api-integration/">Get free access</a>							
						</div>
					</div>
				</div>
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_Importexport.svg') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Excel/CSV Import/Export</h3>
						<p>Manage diamond inventory in excel or csv files, it is helpful when you want to manage and upload external inventories having no API or when you are getting them directly</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/import-export-csv-or-excel-needed-for-diamond-other-inventories/">Get free access</a>							
						</div>
					</div>
				</div>
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_Cart.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Social Integrations</h3>
						<p>Facebook like and share feature, twitter twit button and Pinterest pin button.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/social-integrations/">Get free access</a>							
						</div>
					</div>
				</div>
			</div>

			<div class="addons-banner-block-items">
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_Cart.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Facebook shop/store</h3>
						<p>Integrates WooCommere products for sell on Facebook shop/store</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/facebook-shop-store/">Get free access</a>							
						</div>
					</div>
				</div>
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_Cart.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Drop a hint</h3>
						<p>Cutomer engagement feature drop a hint.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/drop-a-hint/">Get free access</a>							
						</div>
					</div>
				</div>
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_Cart.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Recently purchased</h3>
						<p>Cutomer engagement feature recently purchased.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/recently-purchased/">Get free access</a>							
						</div>
					</div>
				</div>
			</div>

			<div class="addons-banner-block-items">
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_Cart.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Request more info/inquiry</h3>
						<p>Cutomer engagement feature request more info/inquiry.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/request-more-info-inquiry/">Get free access</a>							
						</div>
					</div>
				</div>
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_Cart.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Schedule viewing</h3>
						<p>Cutomer engagement feature schedule viewing.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/schedule-viewing/">Get free access</a>							
						</div>
					</div>
				</div>
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_Cart.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Email a friend</h3>
						<p>Cutomer engagement feature email a friend.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/email-a-friend/">Get free access</a>							
						</div>
					</div>
				</div>
			</div>

			<div class="addons-banner-block-items">
				<div class="addons-banner-block-item">						
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" style="height: inherit;" src="<?php echo plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_Cart.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Promotions</h3>
						<p>Cutomer engagement feature promotions.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="https://sphereplugins.com/product/promotions/">Get free access</a>							
						</div>
					</div>
				</div>
				
				<div class="addons-banner-block-item" style="visibility: hidden;">
				</div>
				<div class="addons-banner-block-item" style="visibility: hidden;">
				</div>

			</div>
		</div>
	</div>
</div>

<?php EO_WBC_Head_Banner::get_footer_line(); ?>