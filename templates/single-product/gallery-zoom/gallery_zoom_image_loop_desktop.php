<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

$html = null;

---- a code /woo-bundle-choice/templates/single-product/gallery-zoom/gallery_zoom_desktop.php no che
apply_filters('purple_theme_product_image_thumb',array(
    'type'=>'image',
    'src'=>$product_image
    'class'=>array('img-fluid','big-img'),
    'attr'=>apply_filters('purple_theme_product_image_thumb_attrs',array())
)),



if ($custom_html_required) {
	
	$html = apply_filters('sp_slzm_zoom_image_loop_custom_html',null);


}

$template = $html;