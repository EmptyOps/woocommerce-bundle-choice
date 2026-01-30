<?php
$image_url = get_term_meta( $term->term_id, 'wbc_attachment', true );								
printf( '<img alt="%s" src="%s" width="%d" height="%d" />', esc_attr( $term->name ), esc_url( $image_url ), 40, 40);
								