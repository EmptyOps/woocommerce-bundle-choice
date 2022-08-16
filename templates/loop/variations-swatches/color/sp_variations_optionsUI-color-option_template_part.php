<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */
?>

<li aria-checked="false" tabindex="0" role="radio" class="spui_color_variable_item">
    <div class="spui_color_variable_item_contents">
        <span class="spui_variable_item_span_color" style="background-color:#353535;"></span>
    </div>
</li>


<?php

$template = array();

$template = array(
    'type' => 'div',
    'class' => 'spui_color_widget',
    'child' => array(
        array(
            'type' => 'ul',
            'class' => 'spui_single_product_color_variable_items',
            'attr' => array( 'role' => 'spui_radiogroup', 'aria-label' => 'spui_color' ),
            'child' => array(
                array(
                    'type' => 'li',
                    'class' => 'spui_color_variable_item',
                    'attr' => array( 'aria-checked' => 'false', 'tabindex' => '0', 'role' => 'radio' ),
                    'child' => array(
                        array(
                            'type' => 'div',
                            'class' => 'spui_color_variable_item_contents',
                            'child' => array(
                                array(
                                    'type' => 'span',
                                    'class' => 'spui_variable_item_span_color',
                                    'attr' => array( 'style' => 'background-color:#353535;' ),
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'type' => 'li',
                    'class' => 'spui_color_variation_item_more',
                    'child' => array(
                        array(
                            'type' => 'a',
                            'preHTML' => '+2 More',
                            'href' => '#',
                        ),
                    ),
                ),
            ),
        ),
    ),
);