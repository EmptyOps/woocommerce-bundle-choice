<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

if(in_array($variable_item_data['options_loop_type'][$term->slug],array('dropdown_image','dropdown_image_only','dropdown'))) {

     --- a code woo-bundle-choice/application/controllers/publics/options.php no che
    $data.=sprintf( '<div class="ui fluid selection dropdown" style="min-height: auto;">
          <input type="hidden" name="attribute_%s" data-attribute_name="attribute_%s" data-id="%s">
          <i class="dropdown icon"></i>
          <div class="default text">%s</div>
          <div class="menu">',esc_attr( $variable_item_data['attribute'] ),esc_attr( $variable_item_data['attribute'] ),esc_attr( $variable_item_data['attribute'] ),$variable_item_data['selected_item']);

    if (!empty($template_data['template_key_actual'])) {

        wbc()->load->template($template_dir.$template_key,(isset($woo_dropdown_attribute_html_data['args']['data'])?array('data' => $woo_dropdown_attribute_html_data['args']['data']):array()),true,$woo_dropdown_attribute_html_data['args']['plugin_slug'],true);
        
    }



    if(in_array($variable_item_data['options_loop_type'][$term->slug],array('dropdown_image','dropdown_image_only','dropdown'))) {
        $data.=sprintf('</div></div>');
    }











    array(
        'type' => 'div',
        'class' => 'ui fluid selection dropdown',
        'attr' => array( 'style' => 'min-height: auto;' ),
        'child' => array(
            array(
                'type' => 'input',
                'name' => 'attribute_'.esc_attr( $variable_item_data['attribute'] ),
                'attr' => array( 'type' => 'hidden', 'data-attribute_name' => 'attribute_'.esc_attr( $variable_item_data['attribute'] ), 'data-id' => esc_attr( $variable_item_data['attribute'] ) ),
            ),
            array(
                'type' => 'header',
                'tag' => 'i',
                'class' => 'dropdown icon',
            ),
            array(
                'type' => 'div',
                'class' => 'default text',
                'preHTML' => $variable_item_data['selected_item'],
            ),
            array(
                'type' => 'div',
                'class' => 'menu',
            ),
        ),
    )
}