<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

$template = null;

foreach ( $terms as $term ) {
    if ( in_array( $term->slug, $options ) ) {
        $selected_class = ( sanitize_title( $args[ 'selected' --nid to use staderd data dtaobject hiyer ] ) == $term->slug ) ? 'selected' : '';

        if (!empty($template_data['template_key'])) {
            -- nid to macit re useabul -- to h
            wbc()->load->template($template_sub_dir.$template_key,(isset($args['data'])?array('data' => $args['data'],'term'=>$term):array()),true,$args['plugin_slug'],true);
        
        }

    }
}