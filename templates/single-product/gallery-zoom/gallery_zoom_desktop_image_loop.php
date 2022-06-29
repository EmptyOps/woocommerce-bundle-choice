<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

---- a code /purple_theme/application/controllers/publics/pages/Content_Single_Product.php no che
    --- check 3 hooks -- to b
    -- main container 
array(
    'type'=>'div',
    'class'=>'Zoom_Rigt-sec',
    'child'=>array(
        $pre_image_content,
        array(
            'type'=>'do_action',
            'name'=>'purple_theme_product_image_thumb_pre'
        ),
        -- move to /woo-bundle-choice/templates/single-product/gallery-zoom/gallery_zoom_image_loop_desktop.php file ma
        /*apply_filters('purple_theme_product_image_thumb',array(
            'type'=>'image',
            'src'=>$product_image
            'class'=>array('img-fluid','big-img'),
            'attr'=>apply_filters('purple_theme_product_image_thumb_attrs',array())
        )),*/
        array(
            'type'=>'html',
            'preHTML'=>$after_thumb_image
        ),
    )
)





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
    foreach ($gallery_images_template_data['attachment_ids'] as $index=>$id) {

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

        if (!apply_filters('sp_slzm_zoom_image_loop_have_html',false,$index,$id)){
            if (!empty($template_data['template_key'])) {
                $template[] =  wbc()->load->template($template_data['template_sub_dir'].$template_data['template_key'],(isset($template_data['data'])?array('data' => $template_data['data'],'index'=>$index,'id'=>$id):array()),true,$template_data['singleton_function'],true);
            
            }
        } else {
           $template[] =  apply_filters('sp_slzm_zoom_image_loop_html',null,$index,$id,$template_data['data']);
        }

       
    }
}
