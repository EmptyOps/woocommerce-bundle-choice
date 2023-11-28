<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

$template = null;

// /*echo '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $woo_dropdown_attribute_html_data['args']['selected'] ), $term->slug, false ) . '>' . esc_html( \eo\wbc\system\core\data_model\SP_Attribute()::instance()->variation_option_name( $term_name, $term, $woo_dropdown_attribute_html_data['attribute'], $woo_dropdown_attribute_html_data['product']) ) . '</option>';*/



// $attr = array( 'value' => esc_attr( $term->slug ) );
// if (!empty(selected( sanitize_title( $woo_dropdown_attribute_html_data['args']['selected'] ), $term->slug, false ))) {
// 	$attr['selected'] = 'selected';
// }
// array(
//     'type' => 'option',
//        'preHTML' => esc_html( \eo\wbc\system\core\data_model\SP_Attribute()::instance()->variation_option_name( $term_name, $term, $woo_dropdown_attribute_html_data['attribute'], $woo_dropdown_attribute_html_data['product']) ),
//        'attr' =>$attr ,
// )



// This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
/*echo '<option value="' . esc_attr( $option ) . '" ' . $woo_dropdown_attribute_html_data['options_loop_selected'][$option] . '>' . esc_html( \eo\wbc\system\core\data_model\SP_Attribute()::instance()->variation_option_name( $term_name, $term, $woo_dropdown_attribute_html_data['attribute'], $woo_dropdown_attribute_html_data['product']) . '</option>';*/  


if( wbc()->sanitize->get('is_test') == 1 ) {

    var_dump('woo_dropdown_attribute-template_part m');
}  

$attr = null;
$variation_option_name = null;
if (is_object($term)) {
//var_dump($term); 
	// $attr = array( 'value' => esc_attr( $term->slug ) );
	$attr = array_merge( array( 'value' => esc_attr( $term->slug ) ), $woo_dropdown_attribute_html_data['options_loop_html_attr'][$term->slug] );
	if (!empty(selected( sanitize_title( $woo_dropdown_attribute_html_data['args']['selected'] ), $term->slug, false ))) {
		$attr['selected'] = 'selected';
	}
   	
   	$variation_option_name = \eo\wbc\system\core\data_model\SP_Attribute::variation_option_name( $term->name, $term, $woo_dropdown_attribute_html_data['attribute'], $woo_dropdown_attribute_html_data['product']);

} else{
	
	if( wbc()->sanitize->get('is_test') == 1 ) {

	    var_dump('woo_dropdown_attribute-template_part m else');
	}  

	$attr = array_merge( array( 'value' => esc_attr( $term ) ), $woo_dropdown_attribute_html_data['options_loop_html_attr'][$term] );
	if (!empty($woo_dropdown_attribute_html_data['options_loop_selected'][$term])) {
		$attr['selected'] = 'selected';
	}

	$variation_option_name = $term;
}
//var_dump($variation_option_name); die();
$template = array(
    'type' => 'option',
    'preHTML' => esc_html( $variation_option_name ),
    'attr' => $attr,
    // -- aa temp mukelu se @a
    // 'class' => array('attached','enabled'),
);
