<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */


/*<!--Size-->
<li aria-checked="false" tabindex="0" role="radio" class="spui_size_variable_item">
    <div class="spui_size_variable_item_contents">
        <span class="spui_variable_item_span_size">L</span>
    </div>
</li>*/


$template = null;

$slug_or_option = is_object($term) ? $term->slug : $term;

$template = array(
    'type' => 'li',
    'class' => 'spui_button_variable_item '.$woo_dropdown_attribute_html_data['class'],
    'attr' => array( 'aria-checked' => 'false', 'tabindex' => '0', 'role' => 'radio' ),
    'child' => array(
        array(
            'type' => 'div',
            'class' => 'spui_button_variable_item_contents',
            'child' => array(
                array(
                    'type' => 'span',
                    'class' => 'spui_variable_item_span_button',
                    'preHTML' => esc_html( $term->name ),
                ),
            ),
        ),
    ),
);