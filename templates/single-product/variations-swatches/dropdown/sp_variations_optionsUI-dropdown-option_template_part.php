<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

//-- a code woo-bundle-choice/application/view/publics/swatches/dropdown.php no che
//$selected_class = ( sanitize_title( $args[ 'selected' ] ) == $term->slug ) ? 'selected' : '';

//printf( '<div class="item" data-value="%s">%s</div>', esc_attr( $term->slug ), esc_attr( $term->name ));
 


$slug_or_option = is_object($term) ? $term->slug : $term;

$template = array(
    'type' => 'div',
    'class' => 'item',
    'attr' => array( 'data-value' => esc_attr( $variable_item_data['options_loop_type'][$slug_or_option] ) ),
    'preHTML' => esc_html( $term->name ),
);