<i <?php echo (!empty($class) ? 'class="'.esc_attr($class)/*$class*/.'"':''); ?> <?php echo (!empty($id) ? 'id="'.esc_attr($id)/*$id*/.'"':''); ?> <?php echo (!empty($attr)? esc_attr($attr)/*$attr*/: ''); ?> <?php echo (!empty($style) ? 'style="'.$style.'"':''); ?> >
	<?php echo isset($preHTML)?esc_html($preHTML)/*$preHTML*/:''; ?>
</i>
