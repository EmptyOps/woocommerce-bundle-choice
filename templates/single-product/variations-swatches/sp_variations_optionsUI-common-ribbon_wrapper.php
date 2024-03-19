<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */



/*--- a code /woo-bundle-choice/application/controllers/publics/options.php file no che */
$attribute = $woo_dropdown_attribute_html_data['args'][ 'attribute' ];
$attribute_object = $variable_item_wrapper_data['attribute_object'];

// $css_classes = array("{$woo_dropdown_attribute_html_data['type']}-variable-wrapper");

// array_push($css_classes, 'spui-wbc-swatches-variable-items-wrapper spui-wbc-swatches-variable-items-wrapper-'.$woo_dropdown_attribute_html_data['type']);

$ribbon_color = get_term_meta( $attribute_object->attribute_id,'wbc_ribbon_color',true);

 /*$data = sprintf( '<div class="ui segment"><span class="ui ribbon label" style="background-color:%s;border-color:%s;color:white;">%s</span><span><ul class="ui mini images variable-items-wrapper %s" data-attribute_name="%s" data-attribute_values="%s">%s</ul></span></div>'
    ,$ribbon_color,$ribbon_color,$attribute_object->attribute_label,trim( implode( ' ', array_unique( $css_classes ) ) ), esc_attr( wc_variation_attribute_name( $attribute ) ),wc_esc_json( wp_json_encode( array_values( $woo_dropdown_attribute_html_data['options'] ) ) ), $contents );*/


$template = array(
    'type' => 'ul',
    'class' => array(
                    'ui',
                    'mini',
                    'segment',
                    'images',
                    'variable-items-wrapper',
                    /*trim( implode( ' ', array_unique( $css_classes ) ) ),*/
                    'spui-wbc-swatches-variable-items-wrapper',
                    'spui-wbc-swatches-variable-items-wrapper-'.esc_attr($woo_dropdown_attribute_html_data['type']),
                    esc_attr($woo_dropdown_attribute_html_data['type'])."-variable-wrapper",
                    'spui-wbc-swatches-variable-items-wrapper-'.$woo_dropdown_attribute_html_data['args'][ 'attribute' ]
                ), 
    'attr' => array( 'data-attribute_name' => esc_attr( wc_variation_attribute_name( $attribute ) ),'data-attribute_values' =>wc_esc_json( wp_json_encode( array_values( $woo_dropdown_attribute_html_data['options'] ) ) ), 'data-type' => esc_attr($woo_dropdown_attribute_html_data['type'])),
    'child' => array(
        array(
            'type' => 'span',
            'class' => 'ui ribbon label',
            'preHTML' => esc_html($attribute_object->attribute_label),
            'attr' => array( 'style' => esc_attr('background-color:'.$ribbon_color.';border-color:'.$ribbon_color.';color:white;') ),
        ),
        array(
            'type' => 'span',
            'child' => array(
                array(
                    'type' =>'ul',
                    'class' =>'', 
                    // 'preHTML' => $contents,
                    'child' => $variable_item_ui
                   
                )
            )
        ),
    ),
);
