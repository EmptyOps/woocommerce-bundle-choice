<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */


--- a code /woo-bundle-choice/application/controllers/publics/options.php file no che 
$attribute = $args[ 'attribute' ];
$attribute_object = $args['attribute_object'];

$css_classes = array("{$type}-variable-wrapper");
$ribbon_color = get_term_meta( $attribute_object->attribute_id,'wbc_ribbon_color',true);

 $data = sprintf( '<div class="ui segment">
      <span class="ui ribbon label" style="background-color:%s;border-color:%s;color:white;">%s</span><span><ul class="ui mini images variable-items-wrapper %s" data-attribute_name="%s" data-attribute_values="%s">%s</ul></span></div>',$ribbon_color,$ribbon_color,$attribute_object->attribute_label,trim( implode( ' ', array_unique( $css_classes ) ) ), esc_attr( wc_variation_attribute_name( $attribute ) ),wc_esc_json( wp_json_encode( array_values( $options ) ) ), $contents );


$data = sprintf( '<ul role="radiogroup" aria-label="%1$s"  class="variable-items-wrapper %2$s" data-attribute_name="%3$s" data-attribute_values="%4$s">%5$s</ul>', esc_attr( wc_attribute_label( $attribute ) ), trim( implode( ' ', array_unique( $css_classes ) ) ), esc_attr( \eo\wbc\system\core\data_model\SP_Attribute::instance()->variation_attribute_name($attribute) ), wc_esc_json( wp_json_encode( array_values( $options ) ) ), $contents );


$template = array(
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
                    'type' => 'ui mini images variable-items-wrapper %s',
                    'preHTML' => '%s',
                    'attr' => array( 'data-attribute_name' => '%s','data-attribute_values' =>'%s')
                )
            )
        ),
    ),
);