<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */




$template = array(
    'type' => 'image',
    'class' => array('img-fluid','big-img',esc_attr( $image['class'] )),
    'src' => esc_url( $image['src'] ),
    'attr' => array( /*'loading' => 'lazy',*/ 'width' => esc_attr( $image['src_w'] ), 'height' => esc_attr( $image['src_h'] ), 'alt' => esc_attr( $image['alt'] ), 'title' => esc_attr( $image['title'] ), 'data-caption' => esc_attr( $image['caption'] ), 'data-src' => esc_url( $image['full_src'] ), 'data-large_image' => esc_url( $image['full_src'] ), 'data-large_image_width' => esc_attr( $image['full_src_w'] ), 'data-large_image_height' => esc_attr( $image['full_src_h'] ), 'srcset' => esc_attr( $image['srcset'] ), 'sizes' => esc_attr( $image['sizes'] ) ),
    'preHTML'=>$image['extra_params'],
);

if ( ! $options['has_only_thumbnail'] ) {
    if ( isset( $image['video_link'] ) && ! empty( $image['video_link'] ) && $image['video_embed_type'] === 'iframe' ) {
        
        $template = array(
            'type' => 'div',
            'class' => 'spui_iframes_video_container',
            'child' => array(
                array(
                    'type' => 'iframe',
                    'src' => $image['video_embed_url'],
                    'attr' => array( 'width' => '454', 'height' => '454', 'frameborder' => '0', 'webkitallowfullscreen' => '', 'mozallowfullscreen' => '', 'allowfullscreen' => '' ),
                ),
            ),
        );
    }

    if ( isset( $image['video_link'] ) && ! empty( $image['video_link'] ) && $image['video_embed_type'] === 'video' ) {
        
        $template = array(
            'type' => 'div',
            'class' => 'spui_360_video_container',
            'child' => array(
                array(
                    'type' => 'video',
                    'attr' => array( 'preload'=>'auto'. 'controlsList'=>'nodownload','autoplay'=>''),
                    'child' => array(
                        array(
                            'type' => 'source',
                            'src' => $image['video_link'],
                            'attr' => array( 'type' => 'video/mp4' ),
                        ),
                    ),
                ),
            ),
        );
    }
}

$template = apply_filters( 'woocommerce_single_product_image_thumbnail_html',$template, $post_thumbnail_id );