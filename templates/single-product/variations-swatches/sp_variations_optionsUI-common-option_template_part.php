<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

$template = null;

$template_inner = null;

--- a code woo-bundle-choice/application/controllers/publics/options.php no che
if(!in_array($variable_item_data['options_loop_type'][$term->slug],array('dropdown_image','dropdown_image_only','dropdown'))) {

    // $data .= sprintf( '<li class="ui image middle aligned variable-item %1$s-variable-item %1$s-variable-item-%2$s %3$s" title="%4$s" data-value="%2$s" role="button" tabindex="0" data-id="%5$s">', esc_attr( $type ), esc_attr( $term->slug ), esc_attr( $selected_class ), esc_html( $term->name ),$id);

}   

ob_start();
wbc()->load->template("publics/swatches/$woo_dropdown_attribute_html_data['type']", array('args'=>$woo_dropdown_attribute_html_data['args'],'term'=>$term,'type'=>$variable_item_data['options_loop_type'][$term->slug]));
$template_inner = ob_get_clean();

if(empty($template_inner)){
    $data .= apply_filters( 'wvs_variable_default_item_content', '', $term, $woo_dropdown_attribute_html_data['args'], $saved_attribute );
} else {
    $data .= $template_inner;  
}      

if(!in_array($variable_item_data['options_loop_type'][$term->slug],array('dropdown_image','dropdown_image_only','dropdown'))) {                 
    //$data .= '</li>';

    $template = array(
        'type' => 'header',
        'tag' => 'li',
        'class' => 'ui image middle aligned variable-item '.esc_attr( $variable_item_data['options_loop_type'][$term->slug] ).'-variable-item '.esc_attr( $variable_item_data['options_loop_type'][$term->slug] ).'-variable-item-'.esc_attr( $term->slug ) esc_attr( $variable_item_data['options_loop_selected_class'][$term->slug] ),
        'attr' => array( 'title' => esc_html( $term->name ), 'data-value' => esc_attr( $term->slug ), 'role' => 'button', 'tabindex' => '0', 'data-id' => $id ),
        'preHTML'=> $template_inner
    );
}





