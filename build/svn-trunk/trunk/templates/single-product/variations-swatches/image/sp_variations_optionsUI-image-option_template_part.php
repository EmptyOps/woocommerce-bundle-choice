<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

// ---- a code /woo-bundle-choice/application/view/publics/swatches/image.php no che
// $image_url = get_term_meta( $term->term_id, 'wbc_attachment', true );                               
// printf( '<img alt="%s" src="%s" width="%d" height="%d" />', esc_attr( $term->name ), esc_url( $image_url ), 40, 40);




$template = array(
    'type' => 'img',
    'src' => esc_url( $variable_item_data['image_url'] ),
    'attr' => array( 'alt' => esc_attr( $term->name ), 'width' => '40', 'height' => '40' ),
);