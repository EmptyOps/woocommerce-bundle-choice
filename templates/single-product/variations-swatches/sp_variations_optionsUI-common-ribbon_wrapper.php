<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */


--- a code /woo-bundle-choice/application/controllers/publics/options.php file no che 
 $data = sprintf( '<div class="ui segment">
      <span class="ui ribbon label" style="background-color:%s;border-color:%s;color:white;">%s</span><span><ul class="ui mini images variable-items-wrapper %s" data-attribute_name="%s">%s</ul></span></div>',$ribbon_color,$ribbon_color,$attribute_object->attribute_label,trim( implode( ' ', array_unique( $css_classes ) ) ), esc_attr( wc_variation_attribute_name( $attribute ) ), $contents );





 array(
    'type' => 'div',
    'class' => 'ui segment',
    'child' => array(
        array(
            'type' => 'span',
            'class' => 'ui ribbon label',
            'preHTML' => '%s',
            'attr' => array( 'style' => 'background-color:%s;border-color:%s;color:white;' ),
        ),
        array(
            'type' => 'span',
            'child' => array(
                array(
                    'type' => 'ui',
                    'preHTML' => '%s',
                    'attr' => array( 'data-attribute_name' => '%s')
                )
            )
        ),
    ),
)