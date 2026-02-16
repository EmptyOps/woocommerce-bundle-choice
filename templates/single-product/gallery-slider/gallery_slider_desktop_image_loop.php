<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */
defined( 'ABSPATH' ) || exit;



//---- a code /purple_theme/application/controllers/publics/pages/Content_Single_Product.php no che
global $product;
$template = array();
$template_inner = array();
/*if(!empty($ids)){
    foreach ($ids as $id) {
        --if below additional params of original and the second param is for any fix or improvement then drop below if condition and so it will be used for preview page as well
        if (is_previwe) {
           $src = wp_get_attachment_url($id);
        }else{
            $src = wp_get_attachment_image_url($id,'original',false); //wp_get_attachment_url($id);
        }
        $template[] = array(
            'type'=>'li',
            'class'=>'splide__slide',
            'child'=>array(
                'type'=>'image',
                'src'=>$src,
                'class'=>array('img-fluid','small-img')
            )
        );              
    }
}*/


if(!empty($gallery_images_template_data['attachment_ids_loop_image'])){
    foreach ($gallery_images_template_data['attachment_ids_loop_image'] as $index=>$image) {

        // ACTIVE_TODO nid to lode admin settings here 
        $options = array();

        $defaults = array();
        $options  = wp_parse_args( $options, $defaults );

        //$image = \eo\wbc\model\publics\data_model\SP_WBC_Variations::instance()->get_product_attachment_props( $id );
        $post_thumbnail_id = $product->get_image_id();

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

        /*ACTIVE_TODO_OC_START
        //ACTIVE_TODO publish hook if required 
        $classes = apply_filters( '', $classes, $id, $image );
       //return '<div class="' . esc_attr( implode( ' ', array_map( 'sanitize_html_class', array_unique( $classes ) ) ) ) . '"><div>' . $inner_html . '</div></div>';
        ACTIVE_TODO_OC_END*/



       // ACTIVE_TODO Here we have disabled our preview page condition and original etc. settings so on the actual function in variations class where this properties are prepared we may like to manage there if required 
        /*--if below additional params of original and the second param is for any fix or improvement then drop below if condition and so it will be used for preview page as well
        if (is_previwe) {
           $src = wp_get_attachment_url($id);
        }else{
            $src = wp_get_attachment_image_url($id,'original',false); //wp_get_attachment_url($id);
        }*/
        if (!empty($template_data['template_key'])) {
            $template_data['data']['image'] = $image;
            $template_data['data']['index'] = $index;
           $template_inner[] =  wbc()->load->template($template_data['template_sub_dir'].'/'.$template_data['template_key'],(isset($template_data['data'])?$template_data['data']:array()),true,$template_data['singleton_function'],true,true);
        
        }
                       
    }
}


array_push($slider_loop_container_classes, 'exzoom_img_ul');
array_push($slider_loop_container_classes, 'splide__list');

/*---- a code /purple_theme/application/controllers/publics/pages/Content_Single_Product.php no che
-- main container */
$template = array(
    'type'=>'div',
    'class'=>array( 'imgScrollWrap_v', 'img-wrapper' ),
    'id'=>'slider1',
    'child'=>array(
        'type'=>'div',
        'class'=>'splide__track',
        'child'=>array(
            'type'=>'ul',
            'class'=>$slider_loop_container_classes,
            'child'=>$template_inner
        )
    )
);

// wbc_pr($template); die();