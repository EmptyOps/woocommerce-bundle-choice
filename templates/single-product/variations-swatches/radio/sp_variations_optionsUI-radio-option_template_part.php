<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

--- a code /woo-bundle-choice/application/view/publics/swatches/radio.php no che
$id   = uniqid( $term->slug );
printf( '<input name="%1$s" id="%2$s" class="wvs-radio-variable-item" %3$s  type="radio" value="%4$s" data-value="%4$s" /><label for="%2$s">%5$s</label>', $name, $id, checked( sanitize_title( $args[ 'selected' ] ), $term->slug, false ), esc_attr( $term->slug ), esc_html( $term->name ) );



array(
    'type' => 'input',
    'class' => 'wvs-radio-variable-item',
    'name' => '%1$s',
    'id' => '%2$s',
    'attr' => array( 'type' => 'radio', 'value' => '%4$s', 'data-value' => '%4$s' ),
),
array(
    'type' => 'label',
    'preHTML' => '%5$s',
    'attr' => array( 'for' => '%2$s' ),
)