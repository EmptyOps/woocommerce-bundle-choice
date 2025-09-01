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
	    height: 250px;
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
				<div class="addons-banner-block-item">
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" src="<?php echo plugins_url('woo-bundle-choice/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/table.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Catelog Grid View</h3>
						<p>Let customers browse your inventory in tabular view, which is handy tool for diamond industry.</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="<?php echo $make_buy.'Catelog%20Grid%20View'; ?>">From: $20</a>
							<a class="addons-button addons-button-solid" target="_blank" href="http://cvddiamond.xyz/product-category/solitaire/?EO_WBC=1&BEGIN=solitaire&STEP=1&EO_WBC_CODE=cmdiKDUxLCA1MSwgNTEpL3JnYigzNSwgMzUsIDM1KQ==">Demo</a>
						</div>
					</div>
				</div>
				<div class="addons-banner-block-item">
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" src="<?php echo plugins_url('woo-bundle-choice/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/mailbox.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Woo Product Bundle Choice - Email</h3>
						<p>Order emails sent to customers from your shop will be customized based on what user have built, which helps in providing users with complete experience.</p>
						<div class="inline-buttons">
								<a class="addons-button addons-button-solid" target="_blank" href="<?php echo $make_buy.'Woo%20Product%20Bundle%20Choice%20-%20Email'; ?>">From: $20</a>
						</div>
					</div>
				</div>
				<div class="addons-banner-block-item">
					<div class="addons-banner-block-item-icon">
						<img class="addons-img" src="<?php echo plugins_url('woo-bundle-choice/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/rapnet.png') ?>">
					</div>
					<div class="addons-banner-block-item-content">
						<h3>Rapnet Instant Inventory</h3>
						<p>Add the Rapnet Instant Inventory showcase to your site. It will be coustomized as per your requirement. (Price From: 100$)</p>
						<div class="inline-buttons">
							<a class="addons-button addons-button-solid" target="_blank" href="<?php echo $make_buy.'Rapnet%20Instant%20Inventory'; ?>">I'm Interested</a>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>