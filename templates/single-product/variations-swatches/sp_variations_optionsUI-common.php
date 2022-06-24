<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

$template = null;

foreach ( $variable_item_data['terms'] as $term ) {
    if ( in_array( $term->slug, $woo_dropdown_attribute_html_data['options'] ) ) {
        $selected_class = ( sanitize_title( $woo_dropdown_attribute_html_data['args'][ 'selected'] ) == $term->slug ) ? 'selected' : '';

        if (!empty($template_data['template_key'])) {
            -- nid to macit re useabul -- to h
            wbc()->load->template($template_sub_dir.$template_key,(isset($woo_dropdown_attribute_html_data['args']['data'])?array('data' => $woo_dropdown_attribute_html_data['args']['data'],'term'=>$term):array()),true,$woo_dropdown_attribute_html_data['args']['plugin_slug'],true);
        
        }

    }
}