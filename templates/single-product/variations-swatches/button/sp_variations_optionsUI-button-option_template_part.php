<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

/*---- a code /woo-bundle-choice/application/view/publics/swatches/button.php no che
printf( '<div class="variable-item-span variable-item-span-%s">%s</div>', esc_attr( $type ), esc_html( $term->name ) );
*/



$slug_or_option = is_object($term) ? $term->slug : $term;

$template = array(
    'type' => 'div',
    'class' => 'variable-item-span variable-item-span-'.esc_attr( $variable_item_data['options_loop_type'][$slug_or_option]),
    'preHTML' => esc_html( $term->name ),
);


/*$template = array(
    'type' => 'div',
    'class' => 'variable-item-span variable-item-span-'.esc_attr( $variable_item_data['options_loop_type'][$term->slug]). ' spui-wbc-swatches-variable-item spui-wbc-swatches-variable-item-'.$variable_item_data['options_loop_type'][$term->slug],
    'preHTML' => esc_html( $term->name ),
);*/