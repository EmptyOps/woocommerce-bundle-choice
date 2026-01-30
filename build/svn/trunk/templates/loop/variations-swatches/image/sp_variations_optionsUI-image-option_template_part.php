<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */
defined( 'ABSPATH' ) || exit;

/*<!--Icon-->
<li aria-checked="false" tabindex="0" role="radio" class="spui_color_icon_variable_item">
    <div class="spui_color_icon_variable_item_contents">
        <img class="spui_variable_item_image img-fluid" aria-hidden="true" alt="asset" src="https://demo.getwooplugins.com/woocommerce-variation-swatches/product-details/wp-content/uploads/sites/2/2020/06/watch-4a-150x150.jpg">
    </div>
</li>*/

/*---TOOLTIP---@tejas*/
/*data-placement="top"
title="Header"
data-toggle="popover" data-trigger="hover"*/


$temnplate = null;

$slug_or_option = is_object($term) ? $term->slug : $term;

$template = array(
    'type' => 'li',
    'class' => 'spui_color_icon_variable_item '.$woo_dropdown_attribute_html_data['class'].' '.$woo_dropdown_attribute_html_data['options_loop_class'][$slug_or_option],
    'attr' => array_merge (array( 'aria-checked' => 'false', 'tabindex' => '0', 'role' => 'radio','data-placement'=>'top','title'=>esc_attr( $term->name ),'data-toggle'=>'popover', 'data-trigger'=>'hover' ), $woo_dropdown_attribute_html_data['options_loop_html_attr'][$term->slug] ),

    'child' => array(
        array(
            'type' => 'div',
            'class' => 'spui_color_icon_variable_item_contents',
            'child' => array(
                array(
                    'type' => 'img',
                    'class' => 'spui_variable_item_image img-fluid',
                    'src' => esc_url( $variable_item_data['image_url'] ),
                    'attr' => array( 'aria-hidden' => 'true', 'alt' => esc_attr( $term->name ) ),
                ),
            ),
        ),
    ),
);

