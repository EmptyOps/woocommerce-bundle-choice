<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */


--- a code /woo-bundle-choice/application/view/publics/swatches/select.php file no che
$selected_class = ( sanitize_title( $args[ 'selected' ] ) == $term->slug ) ? 'selected' : '';
$image_url = get_term_meta( $term->term_id, 'wbc_attachment', true );						
if(wbc()->options->get_option('tiny_features','tiny_features_dropdown_icon_only',false) and !empty($image_url)) {
	printf( '<div class="item" data-value="%s"><img class="ui mini avatar image" src="%s"></div>', esc_attr( $term->slug ), esc_url( $image_url ));	
} else {
	if(!empty($image_url)){
		printf( '<div class="item" data-value="%s"><img class="ui mini avatar image" src="%s">%s</div>', esc_attr( $term->slug ), esc_url( $image_url ),esc_attr( $term->name ));	
	} else {
		printf( '<div class="item" data-value="%s">%s</div>', esc_attr( $term->slug ), esc_attr( $term->name ));	
	}	
}



array(
    'type' => 'div',
    'class' => 'item',
    'attr' => array( 'data-value' => '%s' ),
    'child' => array(
		array(
		    'type' => 'img',
		    'class' => 'ui mini avatar image',
		    'src' => '%s',
		),
    ),
)





array(
    'type' => 'div',
    'class' => 'item',
    'attr' => array( 'data-value' => '%s' ),
    'child' => array(
		array(
		    'type' => 'img',
		    'class' => 'ui mini avatar image',
		    'src' => '%s',
		),
    ),
    'postHTML'=> '%s',
)




array(
    'type' => 'div',
    'class' => 'item',
    'preHTML' => '%s',
    'attr' => array( 'data-value' => '%s' ),
)