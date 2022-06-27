<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */



--- a code /woo-bundle-choice/application/model/publics/sp-model-single-product.php no che
if ( $args['hook_callback_args']['hook_args']['show_option_none'] ) {
	echo '<option value="">' . esc_html( $woo_dropdown_attribute_html_data['show_option_none_text'] ) . '</option>';

	array(
	    'type' => 'option',
        'preHTML' => esc_html( $woo_dropdown_attribute_html_data['show_option_none_text'] ),
        'attr' => array( 'value' => '' ),
	)

}

if ( ! empty( $woo_dropdown_attribute_html_data['options'] ) ) {
	if ( $woo_dropdown_attribute_html_data['product'] && taxonomy_exists( $woo_dropdown_attribute_html_data['attribute'] ) ) {
		// Get terms if this is a taxonomy - ordered. We need the names too.

		foreach ( $woo_dropdown_attribute_html_data['terms'] as $term ) {
			if ( in_array( $term->slug, $woo_dropdown_attribute_html_data['options'], true ) ) {
				
					echo '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $woo_dropdown_attribute_html_data['args']['selected'] ), $term->slug, false ) . '>' . esc_html( \eo\wbc\system\core\data_model\SP_Attribute()::instance()->variation_option_name( $term_name, $term, $woo_dropdown_attribute_html_data['attribute'], $woo_dropdown_attribute_html_data['product']) ) . '</option>';



					$attr = array( 'value' => esc_attr( $term->slug ) );
					if (!empty(selected( sanitize_title( $woo_dropdown_attribute_html_data['args']['selected'] ), $term->slug, false ))) {
						$attr['selected'] = 'selected';
					}
					array(
					    'type' => 'option',
				        'preHTML' => esc_html( \eo\wbc\system\core\data_model\SP_Attribute()::instance()->variation_option_name( $term_name, $term, $woo_dropdown_attribute_html_data['attribute'], $woo_dropdown_attribute_html_data['product']) ),
				        'attr' =>$attr ,
					)

			}
		}
	} else {
		foreach ( $data['woo_dropdown_attribute_html_data']['options'] as $option ) {
			// This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
			echo '<option value="' . esc_attr( $option ) . '" ' . $woo_dropdown_attribute_html_data['options_loop_selected'][$option] . '>' . esc_html( \eo\wbc\system\core\data_model\SP_Attribute()::instance()->variation_option_name( $term_name, $term, $woo_dropdown_attribute_html_data['attribute'], $woo_dropdown_attribute_html_data['product']) . '</option>';


				$attr = array( 'value' => esc_attr( $option ) );
				if (!empty($woo_dropdown_attribute_html_data['options_loop_selected'][$option])) {
					$attr['selected'] = 'selected';
				}
				array(
				    'type' => 'option',
			        'preHTML' => esc_html( \eo\wbc\system\core\data_model\SP_Attribute()::instance()->variation_option_name( $term_name, $term, $woo_dropdown_attribute_html_data['attribute'], $woo_dropdown_attribute_html_data['product']),
			        'attr' => $attr,
				)


		}
	}
}