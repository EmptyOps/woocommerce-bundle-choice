<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */
defined( 'ABSPATH' ) || exit;


$template = null;

$attribute = $woo_dropdown_attribute_html_data['args'][ 'attribute' ];

$div_class = null;
$ul_class = null;
$ul_role = null;
$ul_label = null;

if ($woo_dropdown_attribute_html_data['type'] == 'button') {

    $div_class = 'spui_button_widget';
    $ul_class = 'spui_single_product_button_variable_items spui_button_variable_items_wrapper ';
    $ul_role = 'radiogroup';
    $ul_label = 'spui_button';

}elseif ($woo_dropdown_attribute_html_data['type'] == 'color') {

    $div_class = 'spui_color_widget';
    $ul_class = 'spui_single_product_color_variable_items ';
    $ul_role = 'spui_radiogroup';
    $ul_label = 'spui_color';

}elseif ($woo_dropdown_attribute_html_data['type'] == 'image') {

    $div_class = 'spui_color_icon_widget';
    $ul_class = 'spui_single_product_color_icon_variable_items ';
    $ul_role = 'radiogroup';
    $ul_label = 'spui_color_icon';

}

$options = null;

if ( $woo_dropdown_attribute_html_data['product'] && taxonomy_exists( $variable_item_data['attribute'] ) ) {

    $options = $variable_item_data['terms'];  

} else {

    $options = $woo_dropdown_attribute_html_data['options']; 

}
// wbc_pr($woo_dropdown_attribute_html_data['args']['actual_total_options']);
// wbc_pr($woo_dropdown_attribute_html_data['args']['sp_variations_swatches_cat_display_limit']); die();

if ( $woo_dropdown_attribute_html_data['args']['sp_variations_swatches_cat_display_limit'] > 0 && $woo_dropdown_attribute_html_data['args']['actual_total_options'] > $woo_dropdown_attribute_html_data['args']['sp_variations_swatches_cat_display_limit'] ) {
    $template = array(
        'type' => 'li',
        'class' => 'spui-wbc-swatches-variable-item-more spui_swatches_more__container',
        'child' => array(
            array(
                'type' => 'a',
                'class'=>'spui-wbc-swatches-variable-item-more-a',
                'preHTML' => '+'.($woo_dropdown_attribute_html_data['args']['actual_total_options'] - $woo_dropdown_attribute_html_data['args']['sp_variations_swatches_cat_display_limit']).' More',
                'href' => '#',
            ),
        ),  
    );
}

$template = array(
    // 'type' => 'div',
    // 'class' => $div_class,
    // 'child' => array(
    //     array(
            'type' => 'ul',
            'class' => $ul_class . $variable_item_wrapper_data['class_wrapper'] ." ". $div_class,
            'attr' => array( 'data-attribute_name' => esc_attr( wc_variation_attribute_name( $attribute ) ),'data-attribute_values' =>wc_esc_json( wp_json_encode( array_values( $woo_dropdown_attribute_html_data['options'] ) ) ), 'data-type'=>$woo_dropdown_attribute_html_data['type'],'role' => $ul_role, 'aria-label' => $ul_label),
            'child'=>array(
                array(
                    'type'=>'html',
                    'child'=>$variable_item_ui,
                ),
                array(
                    'type'=>'html',
                    'child'=>$template,
                ),
            )
        // )
    // )
);

