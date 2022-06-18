<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */


--- a code /woo-bundle-choice/application/model/publics/sp-model-single-product.php no che
    --------------a etlu wvs_default_button_variation_attribute_options alg che
if ( $data['woo_dropdown_attribute_html_data']['product'] ) {
    
    echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . $type . '" style="display:none" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';



    array(
        'type' => 'select',
        'class' => esc_attr( $class ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . $type,
        'id' => esc_attr( $id ),
        'name' => esc_attr( $name ),
        'attr' => array( 'style' => 'display:none', 'data-attribute_name' => esc_attr( wc_variation_attribute_name( $attribute ) ), 'data-show_option_none' => ( $show_option_none ? 'yes' : 'no' ) ),
    )


}
-----------------

-------------- a etlu wvs_default_image_variation_attribute_options alg che
if ( $data['woo_dropdown_attribute_html_data']['product'] ) {

    if ( $data['woo_dropdown_attribute_html_data']['type'] === 'select' ) {
        echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';


        array(
            'type' => 'select',
            'class' => eesc_attr( $class ),
            'id' => esc_attr( $id ),
            'name' => esc_attr( $name ),
            'attr' => array('data-attribute_name' => esc_attr( wc_variation_attribute_name( $attribute ) ), 'data-show_option_none' => ( $show_option_none ? 'yes' : 'no' ) ),
        )


    } else {
        echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . $type . '" style="display:none" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';



        array(
            'type' => 'select',
            'class' => esc_attr( $class ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . $type,
            'id' => esc_attr( $id ),
            'name' => esc_attr( $name ),
            'attr' => array( 'style' => 'display:none', 'data-attribute_name' => esc_attr( wc_variation_attribute_name( $attribute ) ), 'data-show_option_none' => ( $show_option_none ? 'yes' : 'no' ) ),
        )

    }
}
-------------
if ( $data['woo_dropdown_attribute_html_data']['product'] && taxonomy_exists( $data['woo_dropdown_attribute_html_data']['attribute'] ) ) {
    echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . esc_attr( $type ) . '" style="display:none" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';


    array(
        'type' => 'select',
        'class' => esc_attr( $class ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . $type,
        'id' => esc_attr( $id ),
        'name' => esc_attr( $name ),
        'attr' => array( 'style' => 'display:none', 'data-attribute_name' => esc_attr( wc_variation_attribute_name( $attribute ) ), 'data-show_option_none' => ( $show_option_none ? 'yes' : 'no' ) ),
    )

} else {
    echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';


    array(
        'type' => 'select',
        'class' => esc_attr( $class ),
        'name' => esc_attr( $name ),
        'attr' => array( 'data-attribute_name' => esc_attr( wc_variation_attribute_name( $attribute ) ), 'data-show_option_none' => ( $show_option_none ? 'yes' : 'no' ) ),
    )


}



echo '</select>';