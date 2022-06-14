<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

--- a code woo-bundle-choice/application/controllers/publics/options.php no che
if(!in_array($type,array('dropdown_image','dropdown_image_only','dropdown'))) {
    $data .= sprintf( '<li class="ui image middle aligned variable-item %1$s-variable-item %1$s-variable-item-%2$s %3$s" title="%4$s" data-value="%2$s" role="button" tabindex="0" data-id="%5$s">', esc_attr( $type ), esc_attr( $term->slug ), esc_attr( $selected_class ), esc_html( $term->name ),$id);
}                       
ob_start();
wbc()->load->template("publics/swatches/${type}", array('args'=>$args,'term'=>$term,'type'=>$type));
$ui_data = ob_get_clean();
if(empty($ui_data)){
    $data .= apply_filters( 'wvs_variable_default_item_content', '', $term, $args, $saved_attribute );
} else {
    $data .= $ui_data;  
}                       
$data .= '</li>';





array(
    'type' => 'header',
    'tag' => 'li',
    'class' => 'ui image middle aligned variable-item %1$s-variable-item %1$s-variable-item-%2$s %3$s',
    'attr' => array( 'title' => '%4$s', 'data-value' => '%2$s', 'role' => 'button', 'tabindex' => '0', 'data-id' => '%5$s' ),
)