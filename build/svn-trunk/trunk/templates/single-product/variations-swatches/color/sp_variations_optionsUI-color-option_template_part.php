<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

/*---- a code /woo-bundle-choice/application/view/publics/swatches/color.php no che
$color = sanitize_hex_color( get_term_meta( $term->term_id, 'wbc_color', true ) );
printf( '<div class="variable-item-color-fill variable-item-span-%s" style="background-color:%s;"></div>', esc_attr( $type ), esc_attr( $color ));*/



$slug_or_option = is_object($term) ? $term->slug : $term;
$template = array(
    'type' => 'div',
    'class' => 'variable-item-color-fill variable-item-span-'.esc_attr( $variable_item_data['options_loop_type'][$slug_or_option] ),
    'attr' => array( 'style' => 'background-color:'.esc_attr( $variable_item_data['options_loop_color'][$slug_or_option]['color'] ).';' ),
);