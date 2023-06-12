<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

$template = null;
if(empty($image['extra_params_org']['type']) || $image['extra_params_org']['type'] == 'image' ) {

    $template = array(
        'type' => 'image',
        'class' => array('img-fluid','big-img',esc_attr( $image['class'] ), 'img-item', 'img-item-'.$image['extra_params_org']['type'], 'img-item-'.$image['extra_params_org']['type'].'-'.wbc()->common->current_theme_key() ),
        'src' => $image['src'],
        'attr' => array( /*'loading' => 'lazy',*/ 'width' => esc_attr( $image['src_w'] ), 'height' => esc_attr( $image['src_h'] ), 'alt' => esc_attr( $image['alt'] ), 'title' => esc_attr( $image['title'] ), 'data-caption' => esc_attr( $image['caption'] ), 'data-src' => $image['full_src'], 'data-large_image' => $image['full_src'], 'data-large_image_width' => esc_attr( $image['full_src_w'] ), 'data-large_image_height' => esc_attr( $image['full_src_h'] ), 'srcset' => esc_attr( $image['srcset'] ), 'sizes' => esc_attr( $image['sizes'] ) ),
        'preHTML'=>$image['extra_params'],
    );

} else {

    /*echo ">>>>>>>>>>> gallery_images_finel_template";
    wbc_pr($image);*/ 
    if ( $image['extra_params_org']['type'] == 'video' or $image['extra_params_org']['type'] == 'video_url' ) {
        if ( $image['extra_params_org']['type'] == 'video' and isset( $image['extra_params_org']['embed_type'] ) && $image['extra_params_org']['embed_type'] === 'iframe' ) {
            
            $template = array(
                'type' => 'div',
                'class' => array('spui_iframes_video_container',esc_attr( $image['class'] ), 'img-item', 'img-item-'.$image['extra_params_org']['type'], 'img-item-'.$image['extra_params_org']['type'].'-'.wbc()->common->current_theme_key() ),
                'child' => array(
                    array(
                        'type' => 'iframe',
                        'src' => $image['video_src'],
                        'attr' => array( 'width' => '454', 'height' => '454', 'frameborder' => '0', 'webkitallowfullscreen' => '', 'mozallowfullscreen' => '', 'allowfullscreen' => '' ),
                    ),
                ),
            );
        }

        if ( $image['extra_params_org']['type'] == 'video' and isset( $image['extra_params_org']['embed_type'] ) && $image['extra_params_org']['embed_type'] === 'video' ) {
            
            $template = array(
                'type' => 'div',
                'class' => array('spui_video_container',esc_attr( $image['class'] ), 'img-item', 'img-item-'.$image['extra_params_org']['type'], 'img-item-'.$image['extra_params_org']['type'].'-'.wbc()->common->current_theme_key() ),
                'child' => array(
                    array(
                        'type' => 'video',

                        'attr' => array('preload'=>'auto', 'controlsList'=>'nodownload','autoplay'=>'','muted' => '','loop' => ''/*,'poster'=>'http://localhost/demo/wp-content/uploads/2023/02/giphy-1.gif'*/),
                        'preHTML'=>'Your browser does not support the video tag.',
                        'child' => array(
                            array(
                                'type'=>'header',
                                'tag' => 'source',
                                'src' => $image['video_src'],
                                'attr' => array( 'type' => 'video/mp4' ),
                            ),
                        ),
                    ),
                ),
            );
        }
    }
}

$template = apply_filters( 'woocommerce_single_product_image_thumbnail_html',$template, $image['image_id'] );