<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

$template = null;


/*echo ">>>>>>>>>>> gallery_images_finel_template";
wbc_pr($image);*/ 
if ( $image['extra_params_org']['type'] == 'video' or $image['extra_params_org']['type'] == 'video_url' ) {
    if ( $image['extra_params_org']['type'] == 'video' and isset( $image['extra_params_org']['embed_type'] ) && $image['extra_params_org']['embed_type'] === 'iframe' ) {
         
        $template = array(
            'type' => 'div',
            'class' => 'spui_thumbnail_shop_video_iframe '.esc_attr( $image['class'] ) .' img-item img-item-'.$image['extra_params_org']['type'] .' img-item-'.$image['extra_params_org']['type'].'-'.wbc()->common->current_theme_key().' '.$image['class'],
            'child' => array(
                array(
                    'type' => 'iframe',
                    'src' => $image['video_src'],
                    'attr' => array( 'webkitallowfullscreen' => '', 'mozallowfullscreen' => '', 'allowfullscreen' => '' ),
                ),
            ),
        );
    }

    if ( $image['extra_params_org']['type'] == 'video' and isset( $image['extra_params_org']['embed_type'] ) && $image['extra_params_org']['embed_type'] === 'video' ) {
        
        $template = array(
            'type' => 'div',
            'class' => 'spui_thumbnail_shop_video '.esc_attr( $image['class'] ) .' img-item img-item-'.$image['extra_params_org']['type'] .' img-item-'.$image['extra_params_org']['type'].'-'.wbc()->common->current_theme_key().' '.$image['class'],
            'child' => array(
                array(
                    'type' => 'video',
                    'attr' => array('controlsList'=>'nodownload','autoplay'=>'','muted'=>''),
                    'child' => array(
                        array(
                            'type'=>'header',
                            'tag' => 'source',
                            'src' => $image['video_src'],
                            'attr' => array( 'type' => 'video/mp4' ),
                        ),
                        array(
                            'type'=>'header',
                            'tag' => 'source',
                            'src' => $image['video_src'],
                            'attr' => array( 'type' => 'video/ogg' ),
                        ),
                    ),
                ),
            ),
        );
    }
}


// $template = apply_filters( 'woocommerce_single_product_image_thumbnail_html',$template, $image['image_id'] );