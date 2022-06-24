<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

--- a code /woo-bundle-choice/application/view/publics/swatches/radio.php no che
$id   = uniqid( $term->slug );
printf( '<input name="%1$s" id="%2$s" class="wvs-radio-variable-item" %3$s  type="radio" value="%4$s" data-value="%4$s" /><label for="%2$s">%5$s</label>', $name, $id, checked( sanitize_title( $args[ 'selected' ] ), $term->slug, false ), esc_attr( $term->slug ), esc_html( $term->name ) );



$template = array(
    'type' => 'input',
    'class' => 'wvs-radio-variable-item '.checked( sanitize_title( $woo_dropdown_attribute_html_data['options_loop_selected'][ $term->slug ] ), $term->slug, false ),
    'name' => $variable_item_data['name'],
    'id' => $variable_item_data['options_loop_id'][$term->slug],
    'attr' => array( 'type' => 'radio', 'value' => '%4$s', 'data-value' => esc_attr( $term->slug ) ),
);

$template = array(
    'type' => 'label',
    'preHTML' => esc_html( $term->name ),
    'attr' => array( 'for' => $variable_item_data['options_loop_id'][$term->slug]),
);