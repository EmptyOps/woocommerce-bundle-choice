<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

// ---- a code /woo-bundle-choice/application/view/publics/swatches/image.php no che
// $image_url = get_term_meta( $term->term_id, 'wbc_attachment', true );                               
// printf( '<img alt="%s" src="%s" width="%d" height="%d" />', esc_attr( $term->name ), esc_url( $image_url ), 40, 40);



$slug_or_option = is_object($term) ? $term->slug : $term;
$template = array(
    'type' => 'img',
    'class' => $woo_dropdown_attribute_html_data['class'].' '.$woo_dropdown_attribute_html_data['options_loop_class'][$slug_or_option],
    'src' => esc_url( $variable_item_data['options_loop_image'][$slug_or_option]/*$variable_item_data['image_url']*/ ),
    'attr' => array( 'alt' => esc_attr( $term->name ), 'width' => '40', 'height' => '40' ),
);