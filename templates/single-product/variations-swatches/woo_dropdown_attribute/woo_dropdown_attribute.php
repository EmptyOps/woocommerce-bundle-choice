<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */
defined( 'ABSPATH' ) || exit;
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



$template_inner = array();

/*--- a code /woo-bundle-choice/application/model/publics/sp-model-single-product.php no che*/
if ( $woo_dropdown_attribute_html_data['args']['show_option_none'] ) {
    /*echo '<option value="">' . esc_html( $woo_dropdown_attribute_html_data['show_option_none_text'] ) . '</option>';*/

    $template_inner[] =  array(
        'type' => 'option',
        'preHTML' => esc_html( $woo_dropdown_attribute_html_data['show_option_none_text'] ),
        'attr' => array( 'value' => '' ),
    );

}

$options = null;

if ( ! empty( $woo_dropdown_attribute_html_data['options'] ) ) {

    if ( $woo_dropdown_attribute_html_data['product'] && taxonomy_exists( $woo_dropdown_attribute_html_data['attribute'] ) ) {

        $options = $woo_dropdown_attribute_html_data['terms'];  

    } else {

        $options = $woo_dropdown_attribute_html_data['options']; 
    }

    foreach ( $options as $term ) {
            
        if ( !is_object($term) or in_array( $term->slug, $woo_dropdown_attribute_html_data['options'] ) ) {
            if (is_object($term)) {

                $selected_class = ( sanitize_title( $woo_dropdown_attribute_html_data['args'][ 'selected'] ) == $term->slug ) ? 'selected' : '';
            }

            if (!empty($template_data['template_key'])) {
                $template_data['data']['term'] = $term;
                $template_inner[] = wbc()->load->template($template_data['template_sub_dir'].'/'.$template_data['template_key'],(isset($template_data['data'])?$template_data['data']:array()),true,$template_data['singleton_function'],true);
            }
        }
    }
}



// ACTIVE_TODO in below code there are statements which generate data again, for example the wc_variation_attribute_name function should not be call from here since that affects both performance and also and a critical concern for data flow and overall architeture -- to b 
//     --  check for the same in all other templates also -- to b 
// ACTIVE_TODO and we seem have missed to dump the options from here, need to do that asap -- to b 
// ACTIVE_TODO apda class add kerva na che and remove unused -- to b 
if ( $woo_dropdown_attribute_html_data['product'] && taxonomy_exists( $woo_dropdown_attribute_html_data['attribute'] ) ) {
    // echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . esc_attr( $type ) . '" style="display:none" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';


    $template = array(
        'type' => 'select',
        'class' => esc_attr( $woo_dropdown_attribute_html_data['class'] ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . esc_attr($woo_dropdown_attribute_html_data['type']). ' spui-wbc-swatches-raw-select spui-wbc-swatches-raw-select'.$woo_dropdown_attribute_html_data['type'],
        'id' => esc_attr( $woo_dropdown_attribute_html_data['id'] ),
        'name' => esc_attr( $woo_dropdown_attribute_html_data['name'] ),
        'attr' => array( 'style' => 'display:none', 'data-attribute_name' => esc_attr( wc_variation_attribute_name( $woo_dropdown_attribute_html_data['attribute'] ) ), 'data-show_option_none' => ( $woo_dropdown_attribute_html_data['show_option_none'] ? 'yes' : 'no' ) ),
        'child'=>$template_inner
    );

} else {
    // echo '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="' . esc_attr( wc_variation_attribute_name( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';


    $template = array(
        'type' => 'select',
        'class' => esc_attr( $woo_dropdown_attribute_html_data['class'] ) . ' hide woo-variation-raw-select woo-variation-raw-type-' . esc_attr($woo_dropdown_attribute_html_data['type']). ' spui-wbc-swatches-raw-select spui-wbc-swatches-raw-select'.$woo_dropdown_attribute_html_data['type'],
        'id' => esc_attr( $woo_dropdown_attribute_html_data['id'] ),
        'name' => esc_attr( $woo_dropdown_attribute_html_data['name'] ),
        'attr' => array( 'data-attribute_name' => esc_attr( wc_variation_attribute_name( $woo_dropdown_attribute_html_data['attribute'] ) ), 'data-show_option_none' => ( $woo_dropdown_attribute_html_data['show_option_none'] ? 'yes' : 'no' ) ),
        'child'=>$template_inner
    );


}
// echo '</select>';