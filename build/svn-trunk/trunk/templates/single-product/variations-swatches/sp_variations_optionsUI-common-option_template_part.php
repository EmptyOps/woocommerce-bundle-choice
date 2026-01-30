<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

$template = null;

$template_inner = null;

/*--- a code woo-bundle-choice/application/controllers/publics/options.php no che
if(!in_array($variable_item_data['options_loop_type'][$term->slug],array('dropdown_image','dropdown_image_only','dropdown'))) {

    // $data .= sprintf( '<li class="ui image middle aligned variable-item %1$s-variable-item %1$s-variable-item-%2$s %3$s" title="%4$s" data-value="%2$s" role="button" tabindex="0" data-id="%5$s">', esc_attr( $type ), esc_attr( $term->slug ), esc_attr( $selected_class ), esc_html( $term->name ),$id);

}   */

/*ob_start();
wbc()->load->template("publics/swatches/".$woo_dropdown_attribute_html_data['type'], array('args'=>$woo_dropdown_attribute_html_data['args'],'term'=>$term,'type'=>$variable_item_data['options_loop_type'][$term->slug]));
$template_inner = ob_get_clean();*/

/*if(empty($template_inner)){
    $data .= apply_filters( '', '', $term, $woo_dropdown_attribute_html_data['args'], $saved_attribute );
} else {
    $data .= $template_inner;  
} */  


/*ACTIVE_TODO_OC_START
ACTIVE_TODO selected_item nu logic implment -- to b
if(!in_array($variable_item_data['options_loop_type'][$term->slug],array('dropdown_image','dropdown_image_only','dropdown'))) {
   
    --- a code woo-bundle-choice/application/controllers/publics/options.php no che
    woo-bundle-choice/templates/single-product/variations-swatches/dropdown/sp_variations_optionsUI-dropdown.php
    $selected_item =  sprintf( '%s',esc_attr( $selected_item->name ));




    --- a code woo-bundle-choice/application/controllers/publics/options.php no che
    woo-bundle-choice/templates/single-product/variations-swatches/dropdown_image/sp_variations_optionsUI-dropdown_image.php
    $selected_item =  sprintf( '<img class="ui mini avatar image" src="%s">%s', esc_url( $image_url ),esc_attr( $selected_item->name ));


    $template = array(
        'type' => 'img',
        'class' => 'ui mini avatar image',
        'src' => esc_url( $variable_item_data['options_loop_image'][$term->slug] ),
    ),
    'preHTML'=>esc_attr( $variable_item_data['selected_item']->name );



    --- a code woo-bundle-choice/application/controllers/publics/options.php no che
    woo-bundle-choice/templates/single-product/variations-swatches/dropdown_image_only/sp_variations_optionsUI-dropdown_image_only.php
    $selected_item =  sprintf( '<img class="ui mini avatar image" src="%s">', esc_url( $image_url ));


    $template = array(
        'type' => 'img',
        'class' => 'ui mini avatar image',
        'src' => esc_url( $variable_item_data['options_loop_image'][$term->slug] ),
    );

}
ACTIVE_TODO_OC_END*/

$template_data['data']['args'] = $woo_dropdown_attribute_html_data['args']; 
$template_data['data']['term'] = $term; 
$template_data['data']['type'] = $variable_item_data['options_loop_type'][$term->slug]; 

$template_inner = wbc()->load->template($template_sub_dir.'/'.$woo_dropdown_attribute_html_data['type'].'/sp_variations_optionsUI-'.$woo_dropdown_attribute_html_data['type'].'-option_template_part', (isset($template_data['data'])?$template_data['data']:array()),true,'wbc',true);

if(!in_array($variable_item_data['options_loop_type'][$term->slug],array('dropdown_image','dropdown_image_only','dropdown'))) {                 
    //$data .= '</li>';

    $template = array(
        'type' => 'header',
        'tag' => 'li',
        'class' => array(   'ui',
                            'image', 
                            'middle', 
                            'aligned', 
                            'variable-item',
                            esc_attr( $variable_item_data['options_loop_type'][$term->slug] ).'-variable-item',
                            esc_attr( $variable_item_data['options_loop_type'][$term->slug] ).'-variable-item-'.esc_attr( $term->slug ),
                            esc_attr( $variable_item_data['options_loop_selected_class'][$term->slug]),
                            'spui-wbc-swatches-variable-item',
                            'spui-wbc-swatches-variable-item-'.$variable_item_data['options_loop_type'][$term->slug],
                            'spui-wbc-swatches-variable-item-header',
                            'spui-wbc-swatches-variable-item-'.$variable_item_data['options_loop_type'][$term->slug].'-header',
                            'variable-item-'.wbc()->common->current_theme_key(),
                            'variable-item-'.esc_attr( $variable_item_data['options_loop_type'][$term->slug] ).'-'.wbc()->common->current_theme_key(),
                        ),

        // 'ui image middle aligned variable-item '.esc_attr( $variable_item_data['options_loop_type'][$term->slug] ).'-variable-item '.esc_attr( $variable_item_data['options_loop_type'][$term->slug] ).'-variable-item-'.esc_attr( $term->slug ).' '.esc_attr( $variable_item_data['options_loop_selected_class'][$term->slug]).' spui-wbc-swatches-variable-item-header spui-wbc-swatches-variable-item-'.$variable_item_data['options_loop_type'][$term->slug].'-header variable-item-'.wbc()->common->current_theme_key(). ' variable-item-'.esc_attr( $variable_item_data['options_loop_type'][$term->slug] ).'-'.wbc()->common->current_theme_key(),
        'attr' => array_merge ( array( 'title' => esc_attr( $term->name ), 'data-title' => esc_attr( $term->name ), 'data-value' => esc_attr( $term->slug ), 'role' => 'button', 'tabindex' => '0'/*, 'data-id' => $id*/ ) ),
        'child' => $template_inner
    );
}
