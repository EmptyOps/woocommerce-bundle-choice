<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

/*<div class="spui_thumbnail_shop_wrap">
    <!--asset-->
    <div class="spui_thumbnail_shop_asset">
        <img src="" alt="asset_shop_1" class="img-fluid">
    </div>
    <!--video-->
    <div class="spui_thumbnail_shop_video">
        <video autoplay muted>
            <source src="" type="video/mp4">
            <source src="" type="video/ogg">
        </video>
    </div>
    <!--iframe-->
    <div class="spui_thumbnail_shop_video_iframe">
        <iframe src=""></iframe>
    </div>

</div>
*/

$template = null;
// wbc_pr($image['extra_params_org']['type']);
//     die();
if(empty($image['extra_params_org']['type']) || $image['extra_params_org']['type'] == 'image' ) {

    $template = array(
        'type' => 'div',
        'class' => 'spui_thumbnail_shop_asset '.$image['class'],
        'child' => array(
            'type' => 'image',
            'class' => array('img-fluid','big-img',esc_attr( $image['class'] ) ),
            'src' => $image['src'],
            'attr' => array( /*'loading' => 'lazy',*/ 'width' => esc_attr( $image['src_w'] ), 'height' => esc_attr( $image['src_h'] ), 'alt' => esc_attr( $image['alt'] ), 'title' => esc_attr( $image['title'] ), 'data-caption' => esc_attr( $image['caption'] ), 'data-src' => esc_url( $image['full_src'] ), 'data-large_image' => esc_url( $image['full_src'] ), 'data-large_image_width' => esc_attr( $image['full_src_w'] ), 'data-large_image_height' => esc_attr( $image['full_src_h'] ), 'srcset' => esc_attr( $image['srcset'] ), 'sizes' => esc_attr( $image['sizes'] ) ),
            'preHTML'=>$image['extra_params'],
        )
    );

} else {

    /*echo ">>>>>>>>>>> gallery_images_finel_template";
    wbc_pr($image);*/ 

    if ( $image['extra_params_org']['type'] == 'video' or $image['extra_params_org']['type'] == 'video_url' ) {
        if ( $image['extra_params_org']['type'] == 'video' and isset( $image['extra_params_org']['embed_type'] ) && $image['extra_params_org']['embed_type'] === 'iframe' ) {
             
            $template = array(
                'type' => 'div',
                'class' => 'spui_thumbnail_shop_video_iframe '.esc_attr( $image['class'] ),
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
                'class' => 'spui_thumbnail_shop_video '.esc_attr( $image['class'] ),
                'child' => array(
                    array(
                        'type' => 'video',
                        'attr' => array('controlsList'=>'nodownload','autoplay'=>'','muted'=>''/*,'poster'=>'http://localhost/demo/wp-content/uploads/2023/02/giphy-1.gif'*/),
                        'preHTML'=>'Your browser does not support the video tag.',
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
}

$template = apply_filters( 'woocommerce_single_product_image_thumbnail_html',$template, $image['image_id'] );