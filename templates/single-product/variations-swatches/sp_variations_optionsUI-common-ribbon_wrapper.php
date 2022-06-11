<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

 --- a code woo-bundle-choice/application/controllers/publics/options.php no che
$data.=sprintf( '<div class="ui fluid selection dropdown" style="min-height: auto;">
      <input type="hidden" name="attribute_%s" data-attribute_name="attribute_%s" data-id="%s">
      <i class="dropdown icon"></i>
      <div class="default text">%s</div>
      <div class="menu">',esc_attr( $attribute ),esc_attr( $attribute ),esc_attr( $attribute ),$selected_item);





if(in_array($type,array('dropdown_image','dropdown_image_only','dropdown'))) {
    $data.=sprintf('</div></div>');
}