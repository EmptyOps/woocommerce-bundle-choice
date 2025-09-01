<?php
$selected_class = ( sanitize_title( $args[ 'selected' ] ) == $term->slug ) ? 'selected' : '';

printf( '<div class="item" data-value="%s">%s</div>', esc_attr( $term->slug ), esc_attr( $term->name ));	

