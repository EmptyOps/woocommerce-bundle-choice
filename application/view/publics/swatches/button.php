<?php
defined( 'ABSPATH' ) || exit;
printf( '<div class="variable-item-span variable-item-span-%s">%s</div>', esc_attr( $type ), esc_html( $term->name ) );