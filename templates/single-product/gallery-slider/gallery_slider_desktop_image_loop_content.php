<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

//wbc_pr($image); die();

$template = null;
$template = array(
    'type'=>'li',
    'class'=>array(     
        'small-img',
        'splide__slide', 
        'img-item', 
        'img-item-'.$image['extra_params_org']['type'], 
        'img-item-'.$image['extra_params_org']['type'].'-'.wbc()->common->current_theme_key() 
    ),
    'child'=>array(
        'type'=>'image',
        'src'=>$image['gallery_thumbnail_src'],
        'class'=>array('img-fluid','small-img',esc_attr( $image['gallery_thumbnail_class'] )),
        'attr' => array( 'width' => esc_attr( $image['gallery_thumbnail_src_w'] ), 'height' => esc_attr( $image['gallery_thumbnail_src_h'] ), 'alt' => esc_attr( $image['alt'] ), 'title' => esc_attr( $image['title'] ), 'data-index' => $image['index'] ),
    )
);

$template = apply_filters( 'woocommerce_single_product_image_thumbnail_html',$template, $image['image_id'] );