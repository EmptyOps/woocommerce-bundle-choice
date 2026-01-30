<?php
$color = sanitize_hex_color( get_term_meta( $term->term_id, 'wbc_color', true ) );
printf( '<div class="variable-item-color-fill variable-item-span-%s" style="background-color:%s;"></div>', esc_attr( $type ), esc_attr( $color ));