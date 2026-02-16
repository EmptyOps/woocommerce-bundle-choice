<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */
defined( 'ABSPATH' ) || exit;

/*<!--Size-->
<li aria-checked="false" tabindex="0" role="radio" class="spui_size_variable_item" >
    <div class="spui_size_variable_item_contents">
        <span class="spui_variable_item_span_size">L</span>
    </div>
</li>*/

/*---TOOLTIP---@tejas*/
/*data-placement="top"
title="Header"
data-toggle="popover" data-trigger="hover"*/

$template = null;

$slug_or_option = is_object($term) ? $term->slug : $term;

$name_or_option = is_object($term) ? $term->name : $term;

// wbc_pr('woo_dropdown_attribute_html_data_options_loop_class_1');
// wbc_pr($woo_dropdown_attribute_html_data['options_loop_class'][$slug_or_option]);
$template = array(
    'type' => 'li',
    'class' => 'spui_button_variable_item '.$woo_dropdown_attribute_html_data['class'].' '.$woo_dropdown_attribute_html_data['options_loop_class'][$slug_or_option],
    'attr' => array_merge (array( 'aria-checked' => 'false', 'tabindex' => '0', 'role' => 'radio','data-placement'=>'top','title'=>esc_attr( $term->name ),'data-toggle'=>'popover', 'data-trigger'=>'hover' ), $woo_dropdown_attribute_html_data['options_loop_html_attr'][$term->slug] ),

    'child' => array(
        array(
            'type' => 'div',
            'class' => 'spui_button_variable_item_contents',
            'child' => array(
                array(
                    'type' => 'span',
                    'class' => 'spui_variable_item_span_button',
                    'preHTML' => esc_html( $name_or_option /*$term->name*/ ),
                ),
            ),
        ),
    ),
);