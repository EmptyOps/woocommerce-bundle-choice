<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */
defined( 'ABSPATH' ) || exit;





/*ACTIVE_TODO_OC_START
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

ACTIVE_TODO_OC_END*/




global $product;
$template = null;
$template_inner = array();
if(!empty($gallery_images_template_data['attachment_ids_loop_image'])){
    foreach ($gallery_images_template_data['attachment_ids_loop_image'] as $index=>$image) {

        // ACTIVE_TODO nid to lode admin settings here 
        $options = array();

        $defaults = array();
        $options  = wp_parse_args( $options, $defaults );

        //$image             = $this->get_product_attachment_props( $id );
        //$post_thumbnail_id = $product->get_image_id();

        /*ACTIVE_TODO_OC_START
        $remove_featured_image = false;

        if ( $remove_featured_image && absint( $id ) == absint( $post_thumbnail_id ) ) {
            return '';
        }
        ACTIVE_TODO_OC_END*/

        $classes = array( '' );
        if ( isset( $image['video_link'] ) && ! empty( $image['video_link'] ) ) {
            array_push( $classes, '' );
        }
        // echo ">>><<11>>>".$index;
        // wbc_pr(apply_filters('sp_slzm_zoom_image_loop_have_html',false,$index,$image));
        $template_data['data']['image'] = $image;
        $template_data['data']['index'] = $index;
        if (!apply_filters('sp_slzm_zoom_image_loop_have_html',false,$index,$image)){
            if (!empty($template_data['template_key'])) {
                
                $template_inner[] =  wbc()->load->template($template_data['template_sub_dir'].'/'.$template_data['template_key'],(isset($template_data['data'])?$template_data['data']:array()),true,$template_data['singleton_function'],true,true);
            
            }
        } else {
           $template_inner[] =  apply_filters('sp_slzm_zoom_image_loop_html',null,$index,$image,$template_data['data']);
        }

       if ($gallery_images_configs['all_in_dom'] == 0) {
           break;
       }
    }
}


/*---- a code /purple_theme/application/controllers/publics/pages/Content_Single_Product.php no che
    --- check 3 hooks -- to b
    -- main container */
$template = array(
    'type'=>'div',
    'class'=> array('Zoom_Rigt-sec', 'img-wrapper'),
    'child'=>$template_inner,

        // ACTIVE_TODO_OC_START
        // --- /themes/purple_theme/application/controllers/publics/pages/Content_Single_Product.php  file ma line no 265 to 325 ma jovu
        // $pre_image_content,
        // we may like to consider this when we do refactoring 
        // array(
        //     'type'=>'do_action',
        //     'name'=>'purple_theme_product_image_thumb_pre'
        // ),
        // ACTIVE_TODO_OC_END

            //-- move to /woo-bundle-choice/templates/single-product/gallery-zoom/gallery_zoom_image_loop_desktop.php file ma
        /*apply_filters('purple_theme_product_image_thumb',array(
            'type'=>'image',
            'src'=>$product_image
            'class'=>array('img-fluid','big-img'),
            'attr'=>apply_filters('purple_theme_product_image_thumb_attrs',array())
        )),*/

        // array(
        //     'type'=>'html',
        //     'child'=>$after_thumb_image
        // ),

);