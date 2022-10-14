<?php
	/**
	 * Single Product Thumbnails
	 *
	 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
	 *
	 * HOWEVER, on occasion WooCommerce will need to update template files and you
	 * (the theme developer) will need to copy the new files to your theme to
	 * maintain compatibility. We try to do this as little as possible, but it does
	 * happen. When this occurs the version of the template file will be bumped and
	 * the readme will list any important changes.
	 *
	 * @see         https://docs.woocommerce.com/document/template-structure/
	 * @package     WooCommerce/Templates
	 * @version     3.5.1
	 */
	/**
     * 
     * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
     */
	


	// NOTE: Blank because we don't need thumbnails, but keep it


	if(! \eo\wbc\model\SP_WBC_Compatibility::instance()->woo_product_images_template_compatability('default_render_action', $args) ) {

		throw new \Exception("template file /woo-bundle-choice/templates/single-product/product-thumbnails.php called from unconfirmed theme, Sphere Plugins Team Support need to check so please share this message with Sphere Plugins Support.");

	} else{
    
    	\eo\wbc\controllers\publics\Options::instance()->product_images_template_callback();

	}