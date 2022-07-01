<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */


$template = null;

// ACTIVE_TODO_OC_START
// --- a code /woo-bundle-choice/application/model/publics/sp-model-single-product.php no che
//     --------------a etlu wvs_default_button_variation_attribute_options alg che
// if ( $woo_dropdown_attribute_html_data['product'] ) {
    
//     echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . $type . '" style="display:none" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';



//     array(
//         'type' => 'select',
//         'class' => esc_attr( $woo_dropdown_attribute_html_data['class'] ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . $woo_dropdown_attribute_html_data['type'],
//         'id' => esc_attr( $woo_dropdown_attribute_html_data['id'] ),
//         'name' => esc_attr( $woo_dropdown_attribute_html_data['name'] ),
//         'attr' => array( 'style' => 'display:none', 'data-attribute_name' => esc_attr( wc_variation_attribute_name( $woo_dropdown_attribute_html_data['attribute'] ) ), 'data-show_option_none' => ( $woo_dropdown_attribute_html_data['show_option_none'] ? 'yes' : 'no' ) ),
//     )


// }
// -----------------

// -------------- a etlu wvs_default_image_variation_attribute_options alg che
// if ( $woo_dropdown_attribute_html_data['product'] ) {

//     if ( $woo_dropdown_attribute_html_data['type'] === 'select' ) {
//         echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';


//         array(
//             'type' => 'select',
//             'class' => eesc_attr( $woo_dropdown_attribute_html_data['class'] ),
//             'id' => esc_attr( $woo_dropdown_attribute_html_data['id'] ),
//             'name' => esc_attr( $woo_dropdown_attribute_html_data['name'] ),
//             'attr' => array('data-attribute_name' => esc_attr( wc_variation_attribute_name( $woo_dropdown_attribute_html_data['attribute'] ) ), 'data-show_option_none' => ( $woo_dropdown_attribute_html_data['show_option_none'] ? 'yes' : 'no' ) ),
//         )


//     } else {
//         echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . $type . '" style="display:none" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';



//         array(
//             'type' => 'select',
//             'class' => esc_attr( $woo_dropdown_attribute_html_data['class'] ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . $woo_dropdown_attribute_html_data['type'],
//             'id' => esc_attr( $woo_dropdown_attribute_html_data['id'] ),
//             'name' => esc_attr( $woo_dropdown_attribute_html_data['name'] ),
//             'attr' => array( 'style' => 'display:none', 'data-attribute_name' => esc_attr( wc_variation_attribute_name( $woo_dropdown_attribute_html_data['attribute'] ) ), 'data-show_option_none' => ( $woo_dropdown_attribute_html_data['show_option_none'] ? 'yes' : 'no' ) ),
//         )

//     }
// }
// -------------
// ACTIVE_TODO_OC_END

// ACTIVE_TODO in below code there are statements which generate data again, for example the wc_variation_attribute_name function should not be call from here since that affects both performance and also and a critical concern for data flow and overall architeture -- to b 
//     --  check for the same in all other templates also -- to b 
// ACTIVE_TODO and we seem have missed to dump the options from here, need to do that asap -- to b 
if ( $woo_dropdown_attribute_html_data['product'] && taxonomy_exists( $data['woo_dropdown_attribute_html_data']['attribute'] ) ) {
    // echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . esc_attr( $type ) . '" style="display:none" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';


    $template = array(
        'type' => 'select',
        'class' => esc_attr( $woo_dropdown_attribute_html_data['class'] ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . esc_attr($woo_dropdown_attribute_html_data['type']),
        'id' => esc_attr( $woo_dropdown_attribute_html_data['id'] ),
        'name' => esc_attr( $woo_dropdown_attribute_html_data['name'] ),
        'attr' => array( 'style' => 'display:none', 'data-attribute_name' => esc_attr( wc_variation_attribute_name( $woo_dropdown_attribute_html_data['attribute'] ) ), 'data-show_option_none' => ( $woo_dropdown_attribute_html_data['show_option_none'] ? 'yes' : 'no' ) ),
    );

} else {
    // echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';


    $template = array(
        'type' => 'select',
        'class' => esc_attr( $woo_dropdown_attribute_html_data['class'] ),
        'id' => esc_attr( $woo_dropdown_attribute_html_data['id'] ),
        'name' => esc_attr( $woo_dropdown_attribute_html_data['name'] ),
        'attr' => array( 'data-attribute_name' => esc_attr( wc_variation_attribute_name( $woo_dropdown_attribute_html_data['attribute'] ) ), 'data-show_option_none' => ( $woo_dropdown_attribute_html_data['show_option_none'] ? 'yes' : 'no' ) ),
    );


}



// echo '</select>';