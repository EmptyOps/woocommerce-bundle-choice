<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

if(in_array($type,array('dropdown_image','dropdown_image_only','dropdown'))) {

     --- a code woo-bundle-choice/application/controllers/publics/options.php no che
    $data.=sprintf( '<div class="ui fluid selection dropdown" style="min-height: auto;">
          <input type="hidden" name="attribute_%s" data-attribute_name="attribute_%s" data-id="%s">
          <i class="dropdown icon"></i>
          <div class="default text">%s</div>
          <div class="menu">',esc_attr( $attribute ),esc_attr( $attribute ),esc_attr( $attribute ),$selected_item);

    if (!empty($template_data['template_key_actual'])) {

        wbc()->load->template($template_dir.$template_key,(isset($args['data'])?array('data' => $args['data']):array()),true,$args['plugin_slug'],true);
        
    }



    if(in_array($type,array('dropdown_image','dropdown_image_only','dropdown'))) {
        $data.=sprintf('</div></div>');
    }











    array(
        'type' => 'div',
        'class' => 'ui fluid selection dropdown',
        'attr' => array( 'style' => 'min-height: auto;' ),
        'child' => array(
            array(
                'type' => 'input',
                'name' => 'attribute_%s',
                'attr' => array( 'type' => 'hidden', 'data-attribute_name' => 'attribute_%s', 'data-id' => '%s' ),
            ),
            array(
                'type' => 'header',
                'tag' => 'i',
                'class' => 'dropdown icon',
            ),
            array(
                'type' => 'div',
                'class' => 'default text',
                'preHTML' => '%s',
            ),
            array(
                'type' => 'div',
                'class' => 'menu',
            ),
        ),
    )
}