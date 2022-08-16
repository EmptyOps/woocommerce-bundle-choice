<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */
?>

<!--Size-->
<li aria-checked="false" tabindex="0" role="radio" class="spui_size_variable_item">
    <div class="spui_size_variable_item_contents">
        <span class="spui_variable_item_span_size">L</span>
    </div>
</li>

<?php 

$template = array();

$template = array(
    'type' => 'div',
    'class' => 'spui_button_widget',
    'child' => array(
        array(
            'type' => 'ul',
            'class' => 'spui_single_product_button_variable_items spui_button_variable_items_wrapper',
            'attr' => array( 'role' => 'radiogroup', 'aria-label' => 'spui_button' ),
            'child' => array(
                array(
                    'type' => 'li',
                    'class' => 'spui_button_variable_item',
                    'attr' => array( 'aria-checked' => 'false', 'tabindex' => '0', 'role' => 'radio' ),
                    'child' => array(
                        array(
                            'type' => 'div',
                            'class' => 'spui_button_variable_item_contents',
                            'child' => array(
                                array(
                                    'type' => 'span',
                                    'class' => 'spui_variable_item_span_button',
                                    'preHTML' => 'L',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'type' => 'li',
                    'class' => 'spui_button_variation_item_more',
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