<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

$template = array();


    
$options = null;

if ( $woo_dropdown_attribute_html_data['product'] && taxonomy_exists( $variable_item_data['attribute'] ) ) {

    $options = $variable_item_data['terms'];  

} else {

    $options = $woo_dropdown_attribute_html_data['options']; 

}

foreach ( $options as $term ) {
        
    if (!is_object($term) or in_array( $term->slug, $woo_dropdown_attribute_html_data['options'] ) ) {
        //$selected_class = ( sanitize_title( $woo_dropdown_attribute_html_data['args'][ 'selected'] ) == $term->slug ) ? 'selected' : '';

        if (!empty($template_data['template_key'])) {
            $template_data['data']['term'] = $term; 
            $template_data['data']['template_sub_dir'] = $template_data['template_sub_dir']; 
            $template_data['data']['template_data'] = $template_data; 
            $template[] = wbc()->load->template($template_data['template_sub_dir'].'/'.$template_data['template_key'],(isset($template_data['data'])?$template_data['data']:array()),true,$template_data['singleton_function'],true,true);
        
        }

    }
}