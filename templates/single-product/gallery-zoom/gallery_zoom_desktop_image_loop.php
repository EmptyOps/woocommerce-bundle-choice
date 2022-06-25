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






global $product;
$template = null;
if(!empty($gallery_images_template_data['attachment_ids'])){
    foreach ($gallery_images_template_data['attachment_ids'] as $id) {

        // ACTIVE_TODO nid to lode admin settings here 
        $options = array();

        $defaults = array();
        $options  = wp_parse_args( $options, $defaults );

        $image             = $this->get_product_attachment_props( $id );
        $post_thumbnail_id = $product->get_image_id();

        $remove_featured_image = false;

        if ( $remove_featured_image && absint( $id ) == absint( $post_thumbnail_id ) ) {
            return '';
        }

        $classes = array( '' );
        if ( isset( $image['video_link'] ) && ! empty( $image['video_link'] ) ) {
            array_push( $classes, '' );
        }

        //ACTIVE_TODO do loading
        $template = lode templte /woo-bundle-choice/templates/single-product/gallery-zoom/gallery_zoom_desktop_image_loop_content.php
    }
}
