<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */
?>

<!--Icon-->
<li aria-checked="false" tabindex="0" role="radio" class="spui_color_icon_variable_item">
    <div class="spui_color_icon_variable_item_contents">
        <img class="spui_variable_item_image img-fluid" aria-hidden="true" alt="asset" src="https://demo.getwooplugins.com/woocommerce-variation-swatches/product-details/wp-content/uploads/sites/2/2020/06/watch-4a-150x150.jpg">
    </div>
</li>

<?php

$temnplate = array();

$template = array(
    'type' => 'div',
    'class' => 'spui_color_icon_widget',
    'child' => array(
        array(
            'type' => 'ul',
            'class' => 'spui_single_product_color_icon_variable_items',
            'attr' => array( 'role' => 'radiogroup', 'aria-label' => 'spui_color_icon' ),
            'child' => array(
                array(
                    'type' => 'li',
                    'class' => 'spui_color_icon_variable_item',
                    'attr' => array( 'aria-checked' => 'false', 'tabindex' => '0', 'role' => 'radio' ),
                    'child' => array(
                        array(
                            'type' => 'div',
                            'class' => 'spui_color_icon_variable_item_contents',
                            'child' => array(
                                array(
                                    'type' => 'img',
                                    'class' => 'spui_variable_item_image img-fluid',
                                    'src' => 'https://demo.getwooplugins.com/woocommerce-variation-swatches/product-details/wp-content/uploads/sites/2/2020/06/watch-4a-150x150.jpg',
                                    'attr' => array( 'aria-hidden' => 'true', 'alt' => 'asset' ),
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'type' => 'li',
                    'class' => 'spui_color_icon_variable_item_more',
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