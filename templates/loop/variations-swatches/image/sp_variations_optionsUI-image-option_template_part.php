<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */


/*<!--Icon-->
<li aria-checked="false" tabindex="0" role="radio" class="spui_color_icon_variable_item">
    <div class="spui_color_icon_variable_item_contents">
        <img class="spui_variable_item_image img-fluid" aria-hidden="true" alt="asset" src="https://demo.getwooplugins.com/woocommerce-variation-swatches/product-details/wp-content/uploads/sites/2/2020/06/watch-4a-150x150.jpg">
    </div>
</li>*/



$temnplate = null;

$slug_or_option = is_object($term) ? $term->slug : $term;

$template = array(
    'type' => 'li',
    'class' => 'spui_color_icon_variable_item '.$woo_dropdown_attribute_html_data['swatches_variable_item_classes'],
    'attr' => array( 'aria-checked' => 'false', 'tabindex' => '0', 'role' => 'radio' ),
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

